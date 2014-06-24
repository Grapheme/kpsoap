<?
//$a = '050050100';
//preg_match('/^([0-9]{3})([0-9]{3})([0-9]{3}|)$/i', $a, $b);
//print_r($b);
//exit;
define('MODULE_DIR', 'module/');
define('CLIENT_DIR', MODULE_DIR.'client/');
define('ADMIN_DIR', MODULE_DIR.'admin/');
//define('SCRIPT_DIR',preg_replace('#(.*\/httpd\/).*$#','$1',$_SERVER['SCRIPT_FILENAME']));
define('SCRIPT_DIR', "{$_SERVER['DOCUMENT_ROOT']}/");

function __autoload($class_name) { 
	$core_includes = array('system/objects',
						   'system/statics',
						   SCRIPT_DIR.'system/objects',
						   SCRIPT_DIR.'system/statics',
						   MODULE_DIR);
	$find_controller = false;
	foreach($core_includes as $key => $val)
		if (file_exists("{$val}/core.".strtolower($class_name).'.php')) {
			include_once("{$val}/core.".strtolower($class_name).'.php');
			break;
		}
		elseif (file_exists("{$val}/".preg_replace('#^([A-z_0-9]*)_(admin|client)#i','\\2/controller.\\1',strtolower($class_name)).'.php')) {
			include_once("{$val}/".preg_replace('#^([A-z_0-9]*)_(admin|client)#i','\\2/controller.\\1',strtolower($class_name)).'.php');
			break;
		}
	if (file_exists("system/smarty/{$class_name}.class.php"))
		require_once("system/smarty/{$class_name}.class.php");
	if (file_exists("system/smarty/sysplugins/".strtolower($class_name).".php"))
		require_once("system/smarty/sysplugins/".strtolower($class_name).".php");
	
	//require_once '../plugins/phpmailer/class.phpmailer.php';
}
interface iTCore {
	public function __construct($db_parram);
	public function smarty_init(&$smarty, $compile_check, $caching, $debugging, $name);
	public function __destruct();
}

class TCore extends TBase implements iTCore {
	private $sql_id = NULL;
	public $connect = NULL;
	public $sql = NULL;
	public $subjects = NULL;
	public $SITE_SECTION_NAME = NULL;
	
	public function __construct($db_parram) {
		session_start();
		ob_start();
		date_default_timezone_set('Europe/Moscow');
		
		iconv_set_encoding("internal_encoding", "UTF-8");
		iconv_set_encoding("input_encoding", "UTF-8");
		iconv_set_encoding("output_encoding", "UTF-8");

		if (isset($_POST['get_query']) && @$_POST['get_query']=='emulate') {
			$query_string = '';
			foreach($_POST as $key => $val)
				$query_string.= ($key!='get_query')?$key.'='.$val.'&':NULL;
			$query_string = substr($query_string,0,-1);
			header("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}:{$query_string}");
		}
		
		$_GET['moduls'] = isset($_GET['moduls'])?$_GET['moduls']:NULL;
		$_GET['alias'] = isset($_GET['alias'])?$_GET['alias']:NULL;
		$this->SITE_SECTION_NAME = $_GET['moduls'];
		if (empty($db_parram))
			$db_parram = new TDb_Parram(NULL, NULL, NULL, NULL);
		$this->connect = new TConnect($db_parram);
		if ($this->connect->get_state()) {
			$this->sql_id = $this->connect->id;
			$this->sql = new TSQL($this->sql_id, $db_parram->db_name);
			$this->subjects = new TSubjects($this->sql_id, $this->sql);
			return true;
		}
		
		return false;
	}
	
	public function smarty_init(&$smarty, $compile_check, $caching, $debugging, $name) {
		$smarty = new Smarty;
		$smarty->template_dir = "design/{$name}/templates/";
		$smarty->compile_dir = "design/{$name}/templates_c/";
		$smarty->config_dir = "design/{$name}/configs/";
		$smarty->cache_dir = "design/{$name}/cache/";
		$smarty->compile_check = $compile_check;
		$smarty->caching = $caching;
		$smarty->debugging = $debugging;
		$smarty->cache_lifetime = 120;
		$smarty->assign("SERVER_URL_NAME", "http://{$_SERVER['SERVER_NAME']}/");
		$smarty->assign("SITE_SECTION_NAME", $_GET['moduls']);
		if (isset($_GET['page']))
			$smarty->assign("SITE_SECTION_PAGE", $_GET['page']);
		if (isset($_GET['subpage'])) {
			$smarty->assign("SITE_SECTION_SUBPAGE", $_GET['subpage']); // echo $_GET['subpage'];
		}
		
		return true;
	}
	
	public function get_templates($module, $level = 0) {
		$result = $this->sql->query("SELECT * FROM `sys_site_section` WHERE `alias`='{$module}' LIMIT 0,1");
		$result = array(
			!empty($result->cell[0]['default_tpl'])?$result->cell[0]['default_tpl']:NULL,
			!empty($result->cell[0]['default_tpl_page'])?$result->cell[0]['default_tpl_page']:NULL,
			!empty($result->cell[0]['default_tpl_subpage'])?$result->cell[0]['default_tpl_subpage']:NULL
		);
		return empty($result[$level])?(empty($this->content['page_tpl'])?"module.{$module}.tpl":$this->content['page_tpl']):$result[$level];
	}
	
	public function get_headers($code_name, $error = 0) {
		$errors = array(
			"Доступ запрещен",
			"Страница отсутствует"
		);
		$result = array(
			'alias' => '',
			'title' => '',
			'keywords' => '',
			'description' => '',
			'page_tpl' => ''
		);
		if ($error==0) {
			$header = $this->sql->query("SELECT * FROM `page_client` WHERE `alias`='{$code_name}' LIMIT 0,1");
			if ($header->num_rows>0)
				foreach ($header->cell[0] as $key => $val)
					$result[$key] = $val;
		} else
			$result['title'] = $errors[$error-1];
		return $result;
	}
	
	public function get_panels($code_name) {
		$panels = $this->sql->query("
			SELECT
				`sys_panels_list`.`alias`,
				`sys_panels_list`.`priority`,
				`sys_site_section`.`alias` as `site_section_alias`,
				`sys_panels_list`.`name`,
				`sys_panels_list`.`module`,
				`sys_panels_list`.`description`,
				`sys_panels_list`.`panel_tpl`,
				`sys_panels_list`.`align`
			FROM
				`page_panels`,
				`sys_panels_list` LEFT JOIN `sys_site_section` ON (`sys_panels_list`.`site_section_id` = `sys_site_section`.`id`)
			WHERE (
				`page_panels`.`alias` = '{$code_name}' AND
				`page_panels`.`id_panels_list` = `sys_panels_list`.`id` )
			ORDER BY
				`sys_panels_list`.`align`,
				`page_panels`.`priority`,
				`sys_panels_list`.`priority`
		");
		if ($panels->num_rows>0) {
			$tmp_palels = array(
				array(),
				array()
			);
			$panels_result = array();
			for ($i = 0; $i < $panels->num_rows; $i++) {
				$tmp_palels[(int)$panels->cell[$i]['align']][] = "{$panels->cell[$i]['panel_tpl']}";
				if (file_exists(CLIENT_DIR."{$panels->cell[$i]['module']}")) {
					include_once(CLIENT_DIR."{$panels->cell[$i]['module']}");
					$panel_class = "panel_{$panels->cell[$i]['alias']}";
					$panel = new $panel_class($this, $panels->cell[$i]['site_section_alias'], $panels->cell[$i]['alias']);
					$panels_result[$panels->cell[$i]['alias']] = $panel->buildPage();
				}
			}
			return array(
				'count' => array(
					'left' => count($tmp_palels[0]),
					'right' => count($tmp_palels[1])
				),
				'data' => $panels_result,
				'item' => array(
					'left' => $tmp_palels[0],
					'right' => $tmp_palels[1]
				),
				'module' => array(
					'left' => 'unit.panel_left.tpl',
					'right' => 'unit.panel_right.tpl',
				)
			);
		} else
			return array(
				'count' => array(
					'left' => 0,
					'right' => 0
				),
				'module' => array(
					'left' => 'unit.panel_left.tpl',
					'right' => 'unit.panel_right.tpl',
				)
			);
	}
	
	public function get_comments() {
		$result = array(
			'tpl' => 'unit.comments.tpl',
			'data' => array(),
			'count' => 0
		);
		$table = 'sys_comments';
		function process($channel, $table, $parent, $level, $sql) {
			$result = (object)array(
				'num_rows' => 0,
				'cell' => array()
			);
			$items = $sql->query("
				SELECT 
					`c1`.*,
					(
						SELECT 
							COUNT(`c2`.`id`) 
						FROM 
							`sys_comments` as `c2`
						WHERE 
							`c1`.`id` = `c2`.`parent`
					) as `sub`
				FROM `{$table}` as `c1`
				WHERE (
					`c1`.`channel` = '{$channel}' AND 
					`c1`.`status` = 'APPROVED' AND
					`c1`.`parent` = '{$parent}' 
				)
				ORDER BY
					`c1`.`created` DESC,
					`c1`.`id` DESC
			");
			if ($items->num_rows>0) {
				$result->num_rows = $items->num_rows;
				while($item = array_shift($items->cell)) {
					$item['level'] = $level;
					if ($item['sub'] > 0) {
						/*$subs = process($channel, $table, $item['id'], $level+1, $sql);
						$result->cell = array_merge($result->cell, $subs->cell);
						$result->num_rows += $subs->num_rows;*/
						$item['sub'] = process($channel, $table, $item['id'], $level+1, $sql);
					} else
						$item['sub'] = array();
					array_push($result->cell, $item);
				}
			}
			return $result;
		}
		if ($this->sql->table_exists($table)) {
			$channel = "http://".preg_replace("/^(|[^.]*\.)([^.]*\.[^\/\.]*\/.*)/i",'$2',"{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}");
			$parent = 0;
			$comments = process($channel, $table, $parent, 0, $this->sql);
			if ($comments->num_rows>0) {
				$result = $comments;
			}
		}
		return $result;
	}
	
	public function get_contact() {
		$result = NULL;
		$tables = $this->sql->get_tables();
		while($table = array_shift($tables)) {
			if (preg_match("#contact#", $table)) {
				$contact = $this->sql->query("SELECT * FROM `{$table}` LIMIT 0,1");
				$result = $contact->cell[0];
				break;
			}
		}
		return $result;
	}
	
	private $pagination = array();
	public function get_pagination($table, $where = NULL, $field = NULL) {
		$key = "buffer_pagination_{$_GET['moduls']}";
		$inp = isset($_GET['pg'])?$_GET['pg']:(isset($_POST['pg'])?$_POST['pg']:false);
		$_SESSION[$key] = ($inp!==false)?$inp:$_SESSION[$key];
		if ($inp === 0)
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
		
		$row_on_page = 40;
		$num_rows = $this->sql->get_num_rows($table, $where, $field);
		$page_max=ceil($num_rows/$row_on_page);
		$point = ($tmp=($_SESSION[$key])>($page_max-1)?$page_max-1:$_SESSION[$key])<0?0:$tmp;
		
		$result = (object)array(
			'query' => 0+$_SESSION[$key],
			'point' => 0+$point,
			'count' => $page_max,
			'limit' => (object)array(
				'start' => $point*$row_on_page,
				'count' => $row_on_page
			)
		);
		$this->pagination[$table] = $result;
		return $result;
	}
	public function get_pagination_list() {
		return $this->pagination;
	}
	
	public function __destruct() {
		if ($this->connect->get_state())
			unset($this->connect);
	}
}
?>