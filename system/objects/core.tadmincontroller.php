<?
class TAdminController extends TController {
	
	final public function init() {
		if (action != NULL) {
			$method = action;
			$this->$method();
		} else
			$this->base();
	}
	
	final public function load_module($code_name) {
		/*if (!defined("pg"))
			define('pg', !isset($_GET['pg'])?(!isset($_POST['pg'])?0:$_POST['pg']):$_GET['pg']);
		*/
		//$_SESSION["page_{$code_name}"] = !pg?0:pg;
		//runkit_constant_redefine('pg', $_SESSION["page_{$code_name}"]);
		
//		$content = array();

		$header = $this->core->sql->query("
			SELECT
				*
			FROM
				`page_client`
			WHERE
				`alias`='{$code_name}'
			LIMIT 0,1"
		);
		$tmp = array();
		if ($header->num_rows>0)
			foreach ($header->cell[0] as $key => $val)
				$tmp[$key] = $val;
		$this->content['header'] = $tmp;

		$panels = $this->core->sql->query("
			SELECT
				`sys_panels_list`.`id`,
				`sys_panels_list`.`description`,
				`sys_panels_list`.`panel_tpl`,
				`sys_panels_list`.`align`
			FROM
				`page_panels`,
				`sys_panels_list`
			WHERE (
				`page_panels`.`alias` = '{$code_name}' AND
				`page_panels`.`id_panels_list` = `sys_panels_list`.`id` )
			ORDER BY
				`sys_panels_list`.`align`,
				`page_panels`.`priority`"
		);
		$tmp_palels = array();
		for ($i = 0; $i < @$panels->num_rows; $i++) {
			$tmp_palels[(int)$panels->cell[$i]['align']][] = "{$panels->cell[$i]['id']}";
		}
		$this->content['panels'] = array(
			'left' => @$tmp_palels[0],
			'right' => @$tmp_palels[1]
		);

		$tmp_panels_list = array();
		$panels_list = $this->core->sql->query("SELECT * FROM `sys_panels_list` ORDER BY `align`");
		for ($i = 0; $i < $panels_list->num_rows; $i++) {
			$tmp_panels_list[(int)$panels_list->cell[$i]['align']][] = array(
				'id' => $panels_list->cell[$i]['id'],
				'name' => $panels_list->cell[$i]['name'],
				'description' => $panels_list->cell[$i]['description'],
				'panel_tpl' => $panels_list->cell[$i]['panel_tpl']
			);
		}
		$this->content['panels_list'] = array(
			'left' => @$tmp_panels_list[0],
			'right' => @$tmp_panels_list[1]
		);

		$template = $this->core->sql->query("SELECT * FROM `sys_site_section` WHERE `alias`='{$this->module}' LIMIT 0,1");
		$template = array(
			@$template->cell[0]['default_tpl_admin']
		);

		$this->content['page_tpl'] = empty($template[$this->pagelevel])?"adm.{$this->module}.tpl":$template[$this->pagelevel];
		
		if (isset($_GET['mark'])) {
			if (!session_is_registered("mark_{$this->module}{$_GET['markattr']}"))
				session_register("mark_{$this->module}{$_GET['markattr']}");
			$_SESSION["mark_{$this->module}{$_GET['markattr']}"] = (int)$_GET['mark'];
			
			$_SESSION["prev"] = "mark_{$this->module}{$_GET['markattr']}";
		}

		$attr_page = preg_match_all('/([a-z]+)=([a-z_0-9]+)/', $_SERVER["REQUEST_URI"], $matches, PREG_SET_ORDER);
		$add_attr = '';
		for ($i=0; $i<count($matches); $i++)
			$add_attr.="_{$matches[$i][2]}";
		
		//echo $_SESSION["prev"]." = ".$_SESSION["mark_{$this->module}{$add_attr}"];
		
		if (isset($_SESSION["mark_{$this->module}{$add_attr}"]))
			$this->content['mark'] = $_SESSION["mark_{$this->module}{$add_attr}"];
		else
			$this->content['mark'] = 0;
		
		$this->content['cookie'] = $this->cookie;
		
		return $this->content;
	}

	final public function noaccess($code_name) {
		$this->content['headers'] = $this->core->get_headers($code_name, 1);
		$this->content['page_tpl'] = "adm.noaccess.tpl";
		return $this->content;
	}
	
	final public function error404($code_name) {
		$this->content['headers'] = $this->core->get_headers($code_name, 2);
		$this->content['page_tpl'] = "adm.error404.tpl";
		return $this->content;
	}
}
?>