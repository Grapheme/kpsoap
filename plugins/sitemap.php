<?
set_time_limit(1000);

include_once('../system/core.php');
$core = new TCore(NULL);

$db_parram = new TDb_Parram();

class TSitemap {
	private $xml = null;
	private $xml_url_tpl = "\t<url>\n\t\t<loc>[LOC]</loc>\n\t\t<lastmod>[LASTMOD]</lastmod>\n\t\t<priority>[PRIORITY]</priority>\n\t</url>\n";
	
	public function __construct() {
		$this->xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
	}
	
	public function page($loc, $lastmod, $priority) {
		$this->xml .= preg_replace(array('/\[LOC\]/', '/\[LASTMOD\]/', '/\[PRIORITY\]/'), array($loc, $this->getW3CDateTime($lastmod), $priority), $this->xml_url_tpl);
	}
	
	public function out() {
		return $this->xml."</urlset>";
	}
	
	private function getW3CDateTime($datetime) {
		return str_replace(' ','T',($datetime == '0000-00-00 00:00:00')?date('Y-m').'-01 00:00:00':$datetime)."+04:00";
	}
}

$sitemap = new TSitemap();

$domain = "http://".$_SERVER["SERVER_NAME"]."/";
$cache_dir = '../cache/';
$priority_index = 1;
$priority_text_2 = 0.5;
$priority_text_3 = 0.5;
$priority_complex_2 = 0.6;
$priority_complex_3 = 0.4;
$priority_complex_4 = 0.5;
$t_correct = array();
$t_ucorrect = array();

function get_tables($db) { // функция получения массива таблиц базы данных
	$result = mysql_list_tables($db);
    for ($i = 0; $i < mysql_num_rows($result); $i++)
        $tablenames[$i] = mysql_tablename($result, $i);
	return $tablenames;
    mysql_free_result($result);
}

function get_columns($table) { //функция получения всех полей заданной таблицы
	$result = mysql_query("SHOW COLUMNS FROM ". $table); 
	if (!$result) 
		echo 'Could not run query: ' . mysql_error(); 
	$fieldnames=array(); 
	if (mysql_num_rows($result) > 0) { 
		while ($row = mysql_fetch_assoc($result))
			array_push($fieldnames, $row['Field']);  
	}
	return $fieldnames; 
}

$last_update_index = date('Y-m-d ').(($H=(floor(date('H')/6)*6))<10?'0'.$H:$H).':00:00';
//echo $last_update_index."\n";

if (!file_exists("{$cache_dir}/sitemap/"))
	mkdir($cache_dir.'/sitemap/', 0777);
	
$date_cache = 0;
if (file_exists("{$cache_dir}/sitemap/date.ch"))
	$date_cache = (int)file_get_contents("{$cache_dir}/sitemap/date.ch");

if (file_exists("{$cache_dir}sitemap/ucorrect.ch")) 
	$t_ucorrect = explode(",",file_get_contents("{$cache_dir}/sitemap/ucorrect.ch"));

if (!file_exists("{$cache_dir}sitemap/sitemap.ch") || (time() - $date_cache) > 3600) {
	$sitemap->page("{$domain}index/", $last_update_index, $priority_index);
	$tmp = get_tables($db_parram->db_name);
	while ($table = array_shift($tmp)) {
		if (in_array($table, $t_ucorrect)) 
			continue;
		if (preg_match('/^(dat)_([^_]*)_(.*)$|^(dat)_([^_]*)$/', $table, $matches)) { //проверяем, к какой маске отнести таблицу
			array_push($t_correct, $table); // заполняем массив используемых таблиц
			if (!preg_match('/^(group|type)$/', $matches[3])) {
				$table_columns = get_columns($table);
				if (!in_array("last_update", $table_columns) || $table == 'dat_catalog') {
					array_push($t_ucorrect, $table);
					$ucorrect = array_pop($t_correct);
					continue;
				}
				if (($matches[3] == "list") && (in_array("group_id", $table_columns) || in_array("type_id", $table_columns)))
					continue;
				//print_r($table_columns);
				//echo "{$table} \n";
				if (in_array("alias", $table_columns)) {
					$result = mysql_query("SELECT `alias`, `last_update` FROM `{$table}`");// делаем выборку из таблицы
					if (!$result) {
						echo mysql_error();
						exit;
					} else {
						$sort_3 = NULL;
						while ($row = mysql_fetch_assoc($result)) {// Заносим в массив
							if (preg_match('/[^_]/', $row['alias'])) { // проверяем алиас на "_"
								if (preg_match('/^.*_list/', $table)) {
									if ($sort_3 != $matches[2]) {
										$select_last_upd = mysql_query("
											SELECT 
												`last_update` 
											FROM
												`dat_{$matches[2]}_list`
											ORDER BY 
												`last_update` 
											DESC"
										);// делаем выборку из таблицы для поиска последнего обновления, строится 2 уровень по разделу типа blog
										$max = mysql_fetch_assoc($select_last_upd);
										//echo "{$domain.$matches[2]."/"} >> {$max['last_update']}\n";
										$sitemap->page($domain.$matches[2]."/", $max['last_update'], $priority_text_2);
										$sort_3 = $matches[2];
									}
									$domain_xml = $domain.$matches[2]."/".$row['alias']."/"; //строим адрес без алиаса "_"
								} else 
									$domain_xml = $domain.$matches[5]."/".$row['alias']."/"; //строим адрес без алиаса "_"
								//echo "{$domain_xml} >> {$row['last_update']} \n";
								$sitemap->page($domain_xml, $row['last_update'], $priority_text_2);
							} else
							if ($row['alias'] != '_' || mysql_num_rows($result) == 1)
								$sitemap->page($domain.$matches[5]."/", $row['last_update'], $priority_text_2);
						}
					}
				} else {
					$result = mysql_query("SELECT `last_update` FROM `{$table}`");// делаем выборку из таблицы
					$row = mysql_fetch_assoc($result);
					$domain_xml = $domain.$matches[5]."/"; 
					//echo "{$domain_xml} >> {$row['last_update']}  \n";
					$sitemap->page($domain_xml, $row['last_update'], $priority_text_2);
				}
			} else {
				//echo ">> {$matches[2]} \n";
				if (in_array('dat_config', get_tables($db_parram->db_name))) {
					$config = mysql_query("SELECT * FROM `dat_config` WHERE (`table` = 'dat_{$matches[2]}_list') LIMIT 0,1");
					if (mysql_num_rows($config)) {
						$config = mysql_fetch_assoc($config);
						$config = explode(';', $config['parrams']);
						while ($parram = array_shift($config)) {
							if (!empty($parram)) {
								$parram = explode('=',$parram);
								if ($parram[0] == 'rows_on_page') {
									$rows = mysql_fetch_assoc(mysql_query("SELECT COUNT(`id`) as `count` FROM `dat_{$matches[2]}_list`"));
									$config_pages = ceil($rows['count']/$parram[1]);
								}
							}
						}
					}
				}
				if (($gr=in_array("dat_{$matches[2]}_group", ($tbs=get_tables($db_parram->db_name)))) || ($tp=in_array("dat_{$matches[2]}_type",$tbs))) {
					$sufix = ($gr?'group':'type');
					$alias = ($gr?'alias':'article');
				} else
					continue;
				
				$querry = mysql_query("
					SELECT
						`dat_{$matches[2]}_{$sufix}`.`alias` AS `{$sufix}`,
						`dat_{$matches[2]}_{$sufix}`.`last_update` AS `{$sufix}_update`,
						`dat_{$matches[2]}_list`.*
					FROM 
						`dat_{$matches[2]}_list` LEFT JOIN `dat_{$matches[2]}_{$sufix}` ON (`dat_{$matches[2]}_{$sufix}`.`id` = `dat_{$matches[2]}_list`.`{$sufix}_id`) 
					ORDER BY 
						`{$sufix}`, `last_update`
					DESC"
				);
				$sort = NULL;
				$sort_2 = NULL;
				//echo mysql_error();
				while ($row = mysql_fetch_array($querry)) {
					$domain_xml_2 = $domain.$matches[2]."/"; //построение адреса 2 уровня
					$domain_xml_3 = $domain.$matches[2]."/".$row[$sufix]."/"; //построение адреса 3 уровня
					$domain_xml_4 = $domain.$matches[2]."/".$row[$sufix]."/".$row[$alias]."/"; //построение адреса 4 уровня
					if (($sort != $row[$sufix])) {
						if ($sort_2 != $matches[2]) {
							$select_last_upd = mysql_query("
								SELECT 
									`last_update` 
								FROM
									`dat_{$matches[2]}_list`
								ORDER BY 
									`last_update` 
								DESC"
							);// делаем выборку из таблицы для поиска последнего обновления, строится 2 уровень по разделу типа blog
							$max = mysql_fetch_array($select_last_upd);
							//echo "{$domain_xml_2} >> {$max['last_update']} \n";
							if (isset($config_pages))
								for ($i=0; $i<$config_pages; $i++)
									$sitemap->page($domain_xml_2.($i>0?":pg={$i}":''), $max['last_update'], $priority_complex_2);
							else
								$sitemap->page($domain_xml_2, $max['last_update'], $priority_complex_2);
							$sort_2 = $matches[2];
						}
						//echo "{$domain_xml_3} >> {$row['last_update']} \n";
						$sitemap->page($domain_xml_3, ($row["{$sufix}_update"] < $row['last_update'])?$row['last_update']:$row["{$sufix}_update"], $priority_complex_3);
					}
					//echo "{$domain_xml_4} >> {$row['last_update']}  \n";
					$sitemap->page($domain_xml_4, $row['last_update'], $priority_complex_4);
					$sort = $row[$sufix];
				}
			}
		} else 
			array_push($t_ucorrect, $table); //заполняем массив неиспользуемых таблиц
		unset($matches);
	}
	file_put_contents("{$cache_dir}sitemap/sitemap.ch", $sitemap->out());
	file_put_contents("{$cache_dir}sitemap/date.ch", time());
	file_put_contents("{$cache_dir}sitemap/ucorrect.ch", implode(",", $t_ucorrect));
} 
echo file_get_contents("{$cache_dir}sitemap/sitemap.ch");
?>