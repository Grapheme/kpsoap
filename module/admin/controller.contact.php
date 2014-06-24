<?
class contact_admin extends TAdminController {
	public function contact($code_name){
		$this->content = $this->load_module($code_name);
		
		$content = $this->core->sql->query("	SELECT
													`dat_contact`.*
												FROM 
													`dat_contact`
												LIMIT 0,1");
		func::sqlTestError($this->core->sql);
			
		if ($content->num_rows>0) {
			if (!empty($content->cell[0]['address'])) {
				$tmp = explode(';', $content->cell[0]['address']);
				$content->cell[0]['address'] = array(base64_decode($tmp[0]),base64_decode($tmp[1]));
			} else
				$content->cell[0]['address'] = array(null,null);
			
			if (!empty($content->cell[0]['short_about'])) {
				$tmp = explode(';', $content->cell[0]['short_about']);
				$content->cell[0]['short_about'] = array(base64_decode($tmp[0]),base64_decode($tmp[1]));
			} else
				$content->cell[0]['short_about'] = array(null,null);
		}
		if (action == NULL) {###
			$this->content['content'] = $content->cell[0];
		} elseif (action == 'edit') {###
			$this->content['content'] = $content->cell[0];
			$this->content['page_tpl'] = "adm.{$this->module}_edit.tpl";
		} elseif (action == 'save') { ###
			$content = $this->core->sql->query("SELECT * FROM `dat_contact` LIMIT 0,1");
			func::sqlTestError($this->core->sql);
			$state = $content->num_rows==0?false:true;
			
			$main_columns = $this->core->sql->get_columns("dat_contact");
			$next_id = $this->core->sql->get_next_auto_increment("dat_contact");
			
			$main_field = array();
			$main_value = array();
			
			$_POST['last_update'] = date("Y-m-d H:i:s");
			$_POST['address'] = base64_encode($_POST['address_short']).';'.base64_encode($_POST['address_full']);
			$_POST['short_about'] = base64_encode($_POST['short_about_title']).';'.base64_encode($_POST['short_about_text']);
			foreach($main_columns as $key => $val) {
				if (preg_match('#^(id|priority|short_about_title|short_about_text|address_short|address_full)$#i',$val['Field'])) {
					unset($main_columns[$key]);
					continue;
				}
				array_push($main_field, $val['Field']);
				array_push($main_value, $_POST[$val['Field']]);
			}
			
			if ($state)
				$this->core->sql->update("dat_contact", $main_field, $main_value, "1");
			else
				$this->core->sql->insert("dat_contact", $main_field, $main_value);
			func::sqlTestError($this->core->sql);
			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
			
		} elseif (action == 'saveattach') {###
			$this->core->sql->delete('page_panels', "`alias` = '{$code_name}'");
			for ($i=0; $i < count($_POST['panel']); $i++) {
				$this->core->sql->insert('page_panels', array('alias', 'priority', 'id_panels_list'), array($code_name, 0, "{$_POST['panel'][$i]}"));
			}
			$this->core->sql->delete('page_client', "`alias` = '{$code_name}'");
			$this->core->sql->insert('page_client', array('alias', 'title', 'keywords', 'description', 'page_tpl'), 
																							array($code_name, $_POST['title'], $_POST['keywords'], $_POST['description'], ($_POST['tpl'] == 'null')?NULL:$_POST['tpl']));
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));

		}

		return $this->content;
	}
}
?>