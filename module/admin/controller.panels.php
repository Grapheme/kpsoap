<?
class panels_admin extends TAdminController {
	public function panels($code_name){
		$this->content = $this->load_module($code_name);
		
		$list = $this->core->sql->query("
			SELECT
				`id`
			FROM
				`sys_panels_list`
		");
		
		$row_length=$list->num_rows;
		$pg_max=ceil($row_length/row_out_length);
		$pg=pg;
		$pg =($res=(pg)>($pg_max-1)?$pg_max-1:pg)<0?0:$res;
		$row_out_start = $pg*row_out_length;
				
		if (action == NULL) { ###
			
			$list = $this->core->sql->query("
				SELECT
					`sys_panels_list`.*,
					`sys_site_section`.`name` as `site_section_name`
				FROM
					`sys_panels_list`
						LEFT JOIN `sys_site_section` ON (`sys_panels_list`.`site_section_id` = `sys_site_section`.`id`)
				ORDER BY
					`sys_panels_list`.`priority` DESC
				LIMIT {$row_out_start},".row_out_length
			);
			
			if ($list->num_rows == 0)
				$this->content['content'] = array('empty_list' => true);
			else {
				$blog = array();
				$pg_url = array();
					
				for($i=0; $i<$pg_max; $i++)
					array_push($pg_url, func::url_delget("http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}").(($i>0)?":pg={$i}":NULL));
					
				$this->content['content'] = array(
					"list" => $list->cell,
					"pg_max" => $pg_max,
					"pg_url" => $pg_url,
					"pg" => $pg
				);
			}
			
		} elseif (action == 'add') { ###
			
			$this->content['page_tpl'] = "adm.{$this->module}_add.tpl";
			$this->content['content'] = array();
			
		} elseif (action == 'insert') {###
			
			$php = "module/client/panel.NAME.php";
			$tpl = "design/client/templates/panel.NAME.tpl";

			$_POST['module'] = "panel.{$_POST['alias']}.php";
			$_POST['panel_tpl'] = "panel.{$_POST['alias']}.tpl";
			
			$main_columns = $this->core->sql->get_columns("sys_panels_list");
			
			$main_field = array();
			$main_value = array();
			foreach($main_columns as $key => $val) {
				if (preg_match('#^(id)$#i',$val['Field']) || !isset($_POST[$val['Field']])) {
					unset($main_columns[$key]);
					continue;
				}
				array_push($main_field, $val['Field']);
				array_push($main_value, $_POST[$val['Field']]);
			}
			
			file_put_contents(preg_replace('/NAME/', $_POST['alias'], $php), $_POST['php']);
			file_put_contents(preg_replace('/NAME/', $_POST['alias'], $tpl), $_POST['tpl']);
			
			$this->core->sql->update("sys_panels_list", $main_field, $main_value, "`id`='".id."'");
				
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
			
		} elseif (action == 'del') { ###
			$content = $this->core->sql->query("
				SELECT
					`sys_panels_list`.`alias`
				FROM
					`sys_panels_list`
				WHERE 
					`sys_panels_list`.`id`='".id."' 
				LIMIT 0,1
			");
			if ($content->num_rows == 1) {
				unlink("module/client/panel.{$content->cell[0]['alias']}.php");
				unlink("design/client/templates/panel.{$content->cell[0]['alias']}.tpl");
				$this->core->sql->delete('sys_panels_list', "`alias` = '{$content->cell[0]['alias']}'");
			}
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
			
		} elseif (action == 'edit') { ###
			if (id>=0) {
				$content = $this->core->sql->query("
					SELECT
						`sys_panels_list`.*
					FROM
						`sys_panels_list`
					WHERE 
						`sys_panels_list`.`id`='".id."' 
					LIMIT 0,1
				");
				if ($content->num_rows>0) {
					$this->content['page_tpl'] = "adm.{$this->module}_add.tpl";
					
					if ($content->num_rows>0) {
						$php = "module/client/panel.{$content->cell[0]['alias']}.php";
						$tpl = "design/client/templates/panel.{$content->cell[0]['alias']}.tpl";
						$content->cell[0] = array_merge($content->cell[0], array(
							'php'=>(file_exists($php))?file_get_contents($php):'',
							'tpl'=>(file_exists($tpl))?file_get_contents($tpl):''
						));
						$this->content['content'] = array('id' => $content->cell[0]['id'],
														  'data' => $content->cell[0]);
						$this->content['page_tpl'] = "adm.{$this->module}_edit.tpl";
					} else {
						header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
						exit;
					}
				} else
					header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			} else
				header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
				
		} elseif (action == 'save') { ###
			if (id>=0) {
				$php = "module/client/panel.NAME.php";
				$tpl = "design/client/templates/panel.NAME.tpl";
				
				$_POST['module'] = "panel.{$_POST['alias']}.php";
				$_POST['panel_tpl'] = "panel.{$_POST['alias']}.tpl";
				
				$main_columns = $this->core->sql->get_columns("sys_panels_list");
				
				$main_field = array();
				$main_value = array();
				foreach($main_columns as $key => $val) {
					if (preg_match('#^(id)$#i',$val['Field']) || !isset($_POST[$val['Field']])) {
						unset($main_columns[$key]);
						continue;
					}
					array_push($main_field, $val['Field']);
					array_push($main_value, $_POST[$val['Field']]);
				}
				
				if ($_POST['lastalias'] != $_POST['alias']) {
					unlink(preg_replace('/NAME/', $_POST['lastalias'], $php));
					unlink(preg_replace('/NAME/', $_POST['lastalias'], $tpl));
				}
				
				file_put_contents(preg_replace('/NAME/', $_POST['alias'], $php), $_POST['php']);
				file_put_contents(preg_replace('/NAME/', $_POST['alias'], $tpl), $_POST['tpl']);
				
				$this->core->sql->update("sys_panels_list", $main_field, $main_value, "`id`='".id."'");
			}
			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
			
		}
		return $this->content;
	}
}
?>