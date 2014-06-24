<?
class banners_admin extends TAdminController {
	public function banners($code_name){
		$this->content = $this->load_module($code_name);
		
		if (action == 'setphoto') {
			echo func::imagePhotoUploaderSave('photo', $this->core->SITE_SECTION_NAME);
			exit;
		}
		
		$list = $this->core->sql->query("SELECT `id` FROM `dat_banners`");
		
		$row_length=$list->num_rows;
		$pg_max=ceil($row_length/row_out_length);
		$pg=pg;
		$pg =($res=(pg)>($pg_max-1)?$pg_max-1:pg)<0?0:$res;
		$row_out_start = $pg*row_out_length;
				
		if (action == NULL) { ###
			
			$list = $this->core->sql->query("
				SELECT
					`dat_banners`.*
				FROM
					`dat_banners`
				ORDER BY
					`dat_banners`.`priority` DESC
				LIMIT {$row_out_start},".row_out_length
			);
			
			if ($list->num_rows == 0)
				$this->content['content'] = array('empty_list' => true);
			else {
				$blog = array();
				$pg_url = array();
				for($i=0; $i<$list->num_rows; $i++)
					$list->cell[$i]['photo'] = func::imageLoadSizeRestrict($list->cell[$i]['photo'], 'banners', null, 270, 270, 80);
					
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
			
			$field = 'photo';
			func::imageSave(NULL, $field, $code_name);
			
			$main_columns = $this->core->sql->get_columns("dat_banners");
			$next_id = $this->core->sql->get_next_auto_increment("dat_banners");
			
			$main_field = array();
			$main_value = array();
				
			foreach($main_columns as $key => $val) {
				if (preg_match('#^(id)$#i',$val['Field'])) {
					unset($main_columns[$key]);
					continue;
				}
				array_push($main_field, $val['Field']);
				array_push($main_value, $_POST[$val['Field']]);
			}
			
			$this->core->sql->insert("dat_banners", $main_field, $main_value);
			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
			
		} elseif (action == 'del') { ###
			$target = $this->core->sql->query("SELECT `photo` FROM `dat_banners` WHERE `id`='".id."' LIMIT 0,1");
			if ($target->num_rows==1) {
				func::imageDelete($target->cell[0]['photo'], $code_name, NULL);
				$this->core->sql->delete('dat_banners', "`id` = '".id."'");
			}
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
			
		} elseif (action == 'edit') { ###
			if (id>=0) {
				$content = $this->core->sql->query("
					SELECT
						`dat_banners`.*
					FROM
						`dat_banners`
					WHERE 
						`dat_banners`.`id`='".id."' 
					LIMIT 0,1
				");
				if ($content->num_rows>0) {
					$this->content['page_tpl'] = "adm.{$this->module}_add.tpl";
					
					if ($content->num_rows>0) {
						$content->cell[0] = func::imagePhotoUploaderLoad($content->cell[0], 'photo', $this->core->SITE_SECTION_NAME);
						
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
				$target = $this->core->sql->query("
					SELECT
						`photo`
					FROM
						`dat_banners`
					WHERE
						(`dat_banners`.`id` = '".id."')
					LIMIT 0,1
				");
				$field = 'photo';
				func::imageSave($target->cell[0]['photo'], $field, $code_name);
				
				$main_columns = $this->core->sql->get_columns("dat_banners");
				$next_id = $this->core->sql->get_next_auto_increment("dat_banners");
				
				$main_field = array();
				$main_value = array();
					
				foreach($main_columns as $key => $val) {
					if (preg_match('#^(id)$#i',$val['Field'])) {
						unset($main_columns[$key]);
						continue;
					}
					array_push($main_field, $val['Field']);
					array_push($main_value, $_POST[$val['Field']]);
				}
				
				$this->core->sql->update("dat_banners", $main_field, $main_value, "`id`='".id."'");
			}
			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
			
		}
		return $this->content;
	}
}
?>