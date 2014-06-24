<?
set_time_limit(1000);

include_once('../system/core.php');
$core = new TCore(NULL);
$db_parram = new TDb_Parram();
$domain = "http://".$_SERVER["SERVER_NAME"]."/";
$name_shop = "stylewoods";
$cache_dir = '../cache/';

class TYml {
	private $xml = null;
	
	private $xml_url_tpl_header = null;
	private $xml_url_tpl_category = null;
	
	private $xml_url_tpl_open = null;
	private $xml_url_tpl_clos = null;
	private $xml_url_tpl_fied = null;
	private $xml_url_tpl_parm = null;
	
	public function __construct($datetime, $name, $company, $url, $category) {
		$this->xml_url_tpl_header =
			"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n".
			"<!DOCTYPE yml_catalog SYSTEM \"shops.dtd\">\n".
			"<yml_catalog date=\"[DATETIME]\">\n".
			"\t<shop>\n".
			"\t\t<name>[NAME]</name>\n".
			"\t\t<company>[COMPANY]</company>\n".
			"\t\t<url>[URL]</url>\n".
			"\t\t<currencies>\n".
			"\t\t\t<currency id=\"RUR\" rate=\"1\" plus=\"0\"/>\n".
			"\t\t</currencies>\n".
			"\t\t<categories>\n";
		
		$this->xml_url_tpl_category =
			"\t\t\t<category id=\"[ID]\">[NAME]</category>\n";
			
		$this->xml_url_tpl_open = 
			"\t\t\t<offer id=\"[ID]\" available=\"true\">\n".
			"\t\t\t\t<url>[URL]</url>\n".
			"\t\t\t\t<price>[PRICE]</price>\n".
			"\t\t\t\t<currencyId>RUR</currencyId>\n".
			"\t\t\t\t<categoryId>[CATEGORYID]</categoryId>\n".
			"[PICTURE]".
			"\t\t\t\t<store>false</store>\n".
			"\t\t\t\t<pickup>false</pickup>\n".
			"\t\t\t\t<delivery>true</delivery>\n".
			"\t\t\t\t<local_delivery_cost>0</local_delivery_cost>\n".
			"\t\t\t\t<name>[NAME]</name>\n".
			"\t\t\t\t<vendor>[VENDOR]</vendor>\n".
			"\t\t\t\t<vendorCode>[VENDORCODE]</vendorCode>\n".
			"\t\t\t\t<description>[DESCRIPTION]</description>\n";
		
		$this->xml_url_tpl_fied =
			"\t\t\t\t<[NAME]>[VALUE]</[NAME]>\n";
			
		$this->xml_url_tpl_parm =
			"\t\t\t\t<param name=\"[NAME]\"[ADD]>[VALUE]</param>\n";
			
		$this->xml_url_tpl_clos = 
			"\t\t\t</offer>\n";
			
		$this->xml = preg_replace(array('/\[DATETIME\]/', '/\[NAME\]/', '/\[COMPANY\]/', '/\[URL\]/'), array($datetime, $name, $company, $url), $this->xml_url_tpl_header);
		while ($row = array_shift($category))
			$this->xml .= preg_replace(array('/\[ID\]/', '/\[NAME\]/'), array($row['id'], $row['name']), $this->xml_url_tpl_category );
		$this->xml .=
			"\t\t</categories>\n".
			"\t\t<offers>\n";
	}
	
	public function page($url, $id, $price, $categoryId, $picture, $name, $vendor, $vendorCode, $model, $description, $ext_field = null) {
		$ext_types = array(
			'material' => array(
				'name' =>'Материал', 'add'=>''
			),
			'height' => array(
				'name' =>'Высота', 'add'=>' unit="см"'
			),
			'width' => array(
				'name' =>'Ширина', 'add'=>' unit="см"'
			),
			'weight' => array(
				'name' =>'Вес', 'add'=>' unit="кг"'
			)
		);
		if (count($picture) == 0)
			return false;
		$this->xml .= preg_replace(array('/\[URL\]/', '/\[ID\]/', '/\[PRICE\]/', '/\[CATEGORYID\]/', '/\[NAME\]/', '/\[VENDOR\]/', '/\[VENDORCODE\]/', '/\[MODEL\]/', '/\[DESCRIPTION\]/'), array($url, $id, $price, $categoryId, $name, $vendor, $vendorCode, $model, trim(preg_replace('/[\t\n\r]|(&nbsp;)/i', '', strip_tags($description)))), $this->xml_url_tpl_open);
		$pictures = '';
		if (is_array($picture) && count($picture)>0)
			while ($img = array_shift($picture))
				$pictures .= preg_replace(array('/\[NAME\]/', '/\[VALUE\]/'), array('picture', $img['src']), $this->xml_url_tpl_fied);
		$this->xml = preg_replace('/\[PICTURE\]/', $pictures, $this->xml);
		if (is_array($ext_field) && count($ext_field)>0)
			while ($row = array_shift($ext_field))
				if (isset($ext_types[$row['name']]) && strlen(trim($row['value'],'0'))>0)
					$this->xml .= preg_replace(array('/\[NAME\]/', '/\[ADD\]/', '/\[VALUE\]/'), array($ext_types[$row['name']]['name'], $ext_types[$row['name']]['add'], $row['value']), $this->xml_url_tpl_parm);
		$this->xml .= $this->xml_url_tpl_clos;
	}

	public function out() {
		return $this->xml.
			"\t\t</offers>".
			"\t</shop>".
			"</yml_catalog>";
	}
}


if (!file_exists("{$cache_dir}/yml/"))
	mkdir($cache_dir.'/yml/', 0777);
	
$date_cache = 0;

if (file_exists("{$cache_dir}/yml/date.ch"))
	$date_cache = (int)file_get_contents("{$cache_dir}/yml/date.ch");

if (!file_exists("{$cache_dir}yml/yml.ch") || (time() - $date_cache) > 43200) {
	$select_category = mysql_query("
		SELECT
			`id`, `name`
		FROM 
			`dat_catalog_type`"
	);
	$datetime = date('Y-m-d H:i');
	$category = array();
	while ($row = mysql_fetch_assoc($select_category)) {
		array_push($category, array(
			"id" => $row['id'],
			"name" => $row['name']
		));
	}	
	$yml = new TYml($datetime, $name_shop, $name_shop, $domain, $category);
	while ($row = array_shift($category)) {
		$select_product = mysql_query("
			SELECT 
				`dat_catalog_list`.*,
				`dat_catalog_collection`.`title` AS `collection_name`,
				`dat_catalog_type`.`alias` AS `type_name`,
				`dat_catalog_type{$row['id']}_field`.*
			FROM
				`dat_catalog_list` 
					LEFT JOIN `dat_catalog_collection` ON (`dat_catalog_list`.`collection` = `dat_catalog_collection`.`id`)
					LEFT JOIN `dat_catalog_type` ON (`dat_catalog_list`.`type_id` = `dat_catalog_type`.`id`)
					LEFT JOIN `dat_catalog_type{$row['id']}_field` ON (`dat_catalog_type{$row['id']}_field`.`id_rec` = `dat_catalog_list`.`id`)
			WHERE (
				`dat_catalog_list`.`type_id` = '{$row['id']}'
			)				
			ORDER BY
				`dat_catalog_list`.`type_id`"
		);
		while ($product = mysql_fetch_assoc($select_product)) {
			$picture = func::imageParseSizeRestrict($product['photo'], 'catalog', $product['type_name'], 900, 900, 90);
			for ($i=0; $i<count($picture); $i++)
				$picture[$i]['src'] = preg_replace('/([А-я]*)/uie',"urlencode('$1')",$picture[$i]['src']);
			$name = trim($product['title']," \t");
			$model = ucfirst($product['collection']>0?trim($product['collection_name'])." ":NULL).$product['article'];
			
			$ext_field = array();
			foreach($product as $key => $val) {
				if (preg_match('/^(material|max_diameter|length|height|width|depth)$/i',$key))
					array_push($ext_field, array(
						"name" => $key,
						"value" => $val
					));
			}
			array_push($ext_field, array(
				"name" => 'weight',
				"value" => $product['weight']
			));
			
			
			$yml->page(
				$domain."catalog/".urlencode($product['type_name'])."/".$product['article']."/",
				$product['id'],
				($product['price_sell']>0?$product['price_sell']:$product['price']),
				$product['type_id'],
				$picture,
				$name.' - '.$model,
				$product['manufacturer'],
				$product['article'],
				'',
				$product['about_product'],
				$ext_field
			);
		}
	}
	file_put_contents("{$cache_dir}yml/yml.ch", $yml->out());
	file_put_contents("{$cache_dir}yml/date.ch", time());
}

echo file_get_contents("{$cache_dir}yml/yml.ch");
?>