<?
class info_admin extends TAdminController {
	public function info($code_name){
		$this->content = $this->load_module($code_name);
		
		if (action == NULL) {###

			$content = $this->core->sql->query("SELECT * FROM `dat_info` WHERE `alias`='".(empty($this->page)?'_':$this->page)."' LIMIT 0,1");
			if ($content->num_rows == 0)
				header("location: http://{$_SERVER['SERVER_NAME']}/admin/{$this->module}/");
			
			$this->content['content'] = array('title' => $content->cell[0]['title'],
																				'text' => $content->cell[0]['text']);
		
		} elseif (action == 'edit') {###

			$content = $this->core->sql->query("SELECT * FROM `dat_info` WHERE `alias`='".(empty($this->page)?'_':$this->page)."' LIMIT 0,1");
			$this->content['content'] = array('alias' => $content->cell[0]['alias'],
																				'priority' => $content->cell[0]['priority'],
																				'title' => $content->cell[0]['title'],
																				'menutitle' => $content->cell[0]['menutitle'],
																				'text' => $content->cell[0]['text']);
			$this->content['page_tpl'] = "adm.{$this->module}_edit.tpl";

		} elseif (action == 'save') {###
			$_POST['alias'] = empty($_POST['alias'])?$_POST['lastalias']:$_POST['alias'];
			$this->core->sql->update('page_panels', array('alias'), array(preg_replace("#{$_POST['lastalias']}#i",$_POST['alias'],$code_name)), "`alias` = '{$code_name}'");
			$this->core->sql->update('page_client', array('alias'), array(preg_replace("#{$_POST['lastalias']}#i",$_POST['alias'],$code_name)), "`alias` = '{$code_name}'");
			$this->core->sql->update('dat_info', array('alias', 'priority', 'title', 'menutitle', 'text'),
																							array($_POST['alias'], $_POST['priority'], $_POST['title'], $_POST['menutitle'], $_POST['text']),
																							"`alias`='".(empty($this->page)?'_':$this->page)."'");
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));

		} elseif (action == 'saveattach') {###
			$this->core->sql->delete('page_panels', "`alias` = '{$code_name}'");
			for ($i=0; $i < count($_POST['panel']); $i++) {
				$this->core->sql->insert('page_panels', array('alias', 'priority', 'id_panels_list'), array($code_name, 0, "{$_POST['panel'][$i]}"));
			}
			$this->core->sql->delete('page_client', "`alias` = '{$code_name}'");
			$this->core->sql->insert('page_client', array('alias', 'title', 'keywords', 'description', 'page_tpl'), 
																							array($code_name, $_POST['title'], $_POST['keywords'], $_POST['description'], ($_POST['tpl'] == 'null')?NULL:$_POST['tpl']));
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));

		} elseif (action == 'addgroup') {###

			$content = $this->core->sql->query("SELECT max(`priority`) as `priority` FROM `dat_info`"); //`priority` as MAX(
			$priority = round($content->cell[0]['priority']+10,-1);
			//echo '>> '.$content->cell[0]['priority'];
			
			$this->content['page_tpl'] = "adm.{$this->module}_addsect.tpl";
			$this->content['priority'] = $priority;
			//echo $this->core->sql->get_next_auto_increment('dat_info');

		} elseif (action == 'insertgroup') {###

			$this->core->sql->insert('dat_info', array('alias', 'priority', 'title', 'menutitle', 'text'),	
													  array($_POST['alias'], $_POST['priority'], $_POST['title'], $_POST['menutitle'], $_POST['text']));
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));

		} elseif (action == 'delgroup') {###
			
			$this->core->sql->delete('page_panels', "`alias` = '{$code_name}'");
			$this->core->sql->delete('page_client', "`alias` = '{$code_name}'");
			$this->core->sql->delete('dat_info', "`alias` = '{$this->page}'");
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
		}

		return $this->content;
	}
}
?>