<?
if (preg_match('#\.com#',$_SERVER['SERVER_NAME'])) {
	header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: http://".preg_replace('#\.com#','.ru',$_SERVER['SERVER_NAME']).$_SERVER['REQUEST_URI']); 
	exit(); 
}

include_once('system/core.php');
$core = new TCore(NULL);

//echo $_SERVER['QUERY_STRING'];//$_GET['a'];

if ($core->connect->get_state()) {
	
	if (!isset($_GET['admin'])) {
		$menu_right = NULL;
		foreach ($core->subjects->right_list as $key => $val)
			if (preg_match('#(_viewing)#i',$val['alias'])) 
				$menu_right.= " or `id`={$val['id_site_section']}";
				
		$menu = $core->sql->query("
			SELECT
				`sys_site_section`.*
			FROM
				`sys_site_section`
			WHERE (
				`is_show`=1 and (`id`='0'{$menu_right})
			)
			ORDER BY
				`priority`"
		);
		
		for ($i=0; $i<$menu->num_rows; $i++) {
			if (!empty($menu->cell[$i]['subpage'])) {
				$subpage = $core->sql->query("
					SELECT
						`{$menu->cell[$i]['subpage']}`.*
					FROM
						`{$menu->cell[$i]['subpage']}`
					WHERE
						(`alias`<>'_' and `alias`<>'__')
					ORDER BY
						`priority`"
				);
				if ($subpage->num_rows>0) {
					$sub_list = array();
					for ($f=0; $f<$subpage->num_rows; $f++)
						$sub_list[$f] = array('id' => $subpage->cell[$f]['id'],'alias' => $subpage->cell[$f]['alias'],'menutitle' => $subpage->cell[$f]['menutitle']);
					$menu->cell[$i]['subpage']=$sub_list;
				}
			}
		}
		
		//personal_page
		
		//$_GET['moduls'] = 'personal';
		
		if (count($domain = explode('.',$_SERVER['SERVER_NAME']))==3 && !preg_match('/^(demo|www)$/i',$domain[0])) {
			$_GET['moduls'] = 'personal_client';
			
		}
		
		$controller_name = (!empty($_GET['moduls'])?$_GET['moduls']:'index')."_client";
		if (file_exists(MODULE_DIR.preg_replace('#^([A-z_0-9]*)_(admin|client)#i','\\2/controller.\\1',strtolower($controller_name)).'.php'))
			$module = new $controller_name($core);
		else {
			$_GET['moduls'] = 'error404';
			$module = new TClientController($core);
		}

		$page = $module->buildPage();
		$core->smarty_init($smarty, true, false, false, 'client');
		
		$smarty->assign("menu_list",$menu->cell);
		$smarty->assign("subject",array("auth_state" => $core->subjects->get_authstate(),
										"info" => $core->subjects->info,
										"group_list" => $core->subjects->group_list,
										"right_list" => $core->subjects->right_list,
										"is_admin_access" => $core->subjects->is_admin_access));
		$smarty->assign("page",$page);
		
		if (isset($_GET['axah'])) {
			if (strtolower($_GET['axah']) == 'out') {
				$smarty->display($page['page_tpl']);}
			elseif (strtolower($_GET['axah']) == 'noout') {}
		} else
			$smarty->display('main.body.tpl');

	} elseif (isset($_GET['admin']) && @(bool)$_GET['admin']==true) {

		$menu_right = NULL;
		foreach ($core->subjects->right_list as $key => $val)
			if (preg_match('#(_add)|(_del)|(_edit)|(_сhoice)#i',$val['alias']) && !preg_match("#`id`={$val['id_site_section']}#i",$menu_right))
				$menu_right.=  (!empty($menu_right)?" or ":'')."`id`={$val['id_site_section']}";
		$menu_right = empty($menu_right)?'1':$menu_right;
		
		$menu = $core->sql->query("
			SELECT
				`sys_site_section`.*
			FROM
				`sys_site_section`
			WHERE (
				{$menu_right}
			)
			ORDER BY
				`priority`"
		);
		
		for ($i=0; $i<@$menu->num_rows; $i++) {
			$menu_subpages = false;
			$menu->cell[$i]['alias'] = empty($menu->cell[$i]['alias'])?'index':$menu->cell[$i]['alias'];
			if (!empty($menu->cell[$i]['subpage'])) {
				$count = $core->sql->get_num_rows($menu->cell[$i]['subpage']);
				$subpage = $core->sql->query("
					SELECT
						`{$menu->cell[$i]['subpage']}`.*
					FROM
						`{$menu->cell[$i]['subpage']}`
					WHERE (
						1".($count==1?" and (`alias`<>'_' and `alias`<>'__')":'')."
					)
					ORDER BY
						`priority`"
				);
				if ($subpage->num_rows>0) {
					$sub_list = array();
					for ($f=0; $f<$subpage->num_rows; $f++) {
						$sub_list[$f] = array('id' => $subpage->cell[$f]['id'],'alias' => $subpage->cell[$f]['alias'],'menutitle' => $subpage->cell[$f]['menutitle']);
					}
					$menu->cell[$i]['subpage']=$sub_list;
				}
				$menu_subpages = true;
			}
			$menu->cell[$i]['menu_subpages'] = $menu_subpages;
		}
		
		$controller_name = (!empty($_GET['moduls'])?$_GET['moduls']:'index')."_admin";
		if (file_exists(MODULE_DIR.preg_replace('#^([A-z_0-9]*)_(admin|client)#i','\\2/controller.\\1',strtolower($controller_name)).'.php')) {
			$module = new $controller_name($core);
		} else {
			$_GET['moduls'] = 'error404';
			$module = new TAdminController($core);
		}

		$page = $module->buildPage();
		$core->smarty_init($smarty, true, false, false, 'admin');
		
		$smarty->assign("menu_list",@$menu->cell);
		$smarty->assign("subject",
			array(
				"auth_state" => $core->subjects->get_authstate(),
				"info" => $core->subjects->info,
				"group_list" => $core->subjects->group_list,
				"right_list" => $core->subjects->right_list,
				"is_admin_access" => $core->subjects->is_admin_access
			)
		);
		//print_r($page);
		$smarty->assign("page",$page);
																		
		if (isset($_GET['axah'])) {
			if (strtolower($_GET['axah']) == 'out')
				$smarty->display($page['page_tpl']);
			elseif (strtolower($_GET['axah']) == 'noout') {}
		} else {
			if ($core->subjects->is_admin_access)
				$smarty->display('adm.body.tpl');
			else
				$smarty->display('adm.auth.tpl');
		}
	}

} else {
	$error = $core->connect->get_error();
	echo "<h1>{$error[0]}</h1><hr />{$error[1]}";
}
unset($core);
?>