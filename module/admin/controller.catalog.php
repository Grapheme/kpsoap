<?
class catalog_admin extends TAdminController {
	public function catalog($code_name){
		$this->content = $this->load_module($code_name);
			
		if (!isset($_SESSION['group']) ||
			!isset($_SESSION['prarticle']) ||
			!isset($_SESSION['prtitle']) ||
			!isset($_SESSION['prsubtype']) ||
			!isset($_SESSION['prshow'])) {
			$_SESSION['group'] = (isset($_SESSION['group']) || @$_SESSION['group']>0)?@$_SESSION['group']:0;
			$_SESSION['prarticle'] = (isset($_SESSION['prarticle']) || @$_SESSION['prarticle']!='')?@$_SESSION['prarticle']:'';
			$_SESSION['prtitle'] = (isset($_SESSION['prtitle']) || @$_SESSION['prtitle']!='')?@$_SESSION['prtitle']:'';
			$_SESSION['prsubtype'] = (isset($_SESSION['prsubtype']) || @$_SESSION['prsubtype']>0)?@$_SESSION['prsubtype']:-1;
			$_SESSION['prshow'] = (isset($_SESSION['prshow']) || @$_SESSION['prshow']>0)?@$_SESSION['prshow']:0;
		}
		
		if ($_SESSION['group'] == 0) {
			$tmp = $this->core->sql->query("SELECT `id` FROM `dat_catalog_type` LIMIT 0,1");
			$_SESSION['group'] = ($_SESSION['group'] == 0)?$tmp->cell[0]['id']:$_SESSION['group'];
		}
		
		$filter = (($_SESSION['group']>0)?" AND `dat_catalog_list`.`type_id` = '{$_SESSION['group']}'":NULL). 
				  (($_SESSION['prarticle']!='')?" AND (`article` LIKE '%{$_SESSION['prarticle']}%')":NULL).
				  (($_SESSION['prtitle']!='')?" AND `dat_catalog_list`.`title` LIKE '%".mysql_real_escape_string($_SESSION['prtitle'])."%'":NULL).
				  (($_SESSION['prsubtype']>=0)?" AND `dat_catalog_list`.`subtype` = '{$_SESSION['prsubtype']}'":NULL).
				  (($_SESSION['prshow']==1)?" AND (`dat_catalog_list`.`count`!='' AND `dat_catalog_list`.`count`>0)":(($_SESSION['prshow']==2)?" AND (`dat_catalog_list`.`count`='' OR `dat_catalog_list`.`count`=0)":NULL));
			
		$group = $this->core->sql->query("SELECT * FROM `dat_catalog_type`");
		foreach($group->cell as $key => $val)
			if ($val['id'] == $_SESSION['group']) {
				$GROUP_ALIAS = $val['alias'];
				$GROUP_NAME = $val['name'];
				$GROUP_ID = $_SESSION['group'];
				break;
			}
			
		$subtype = $this->core->sql->query("SELECT * FROM `dat_catalog_subtype` WHERE `type_id`={$GROUP_ID} ORDER BY `priority`");
			
		$list = $this->core->sql->query("	SELECT 
												`dat_catalog_list`.`id`
											FROM 
												`dat_catalog_list`
											WHERE 
												(1 {$filter})");
		func::sqlTestError($this->core->sql);
		
		$row_length=$list->num_rows;
		$pg_max=ceil($row_length/row_out_length_60);
		$pg=pg;
		$pg =($res=(pg)>($pg_max-1)?$pg_max-1:pg)<0?0:$res;
		$row_out_start = $pg*row_out_length_60;
		
		if (action == 'testarticle') {
			$test = $this->core->sql->query("SELECT `article` FROM `dat_catalog_list` WHERE (`article`='{$_POST['article']}')");
			echo $test->num_rows;
			exit;
		} elseif (action == 'setfilter') {
			$_SESSION[$_POST['filter']] = $_POST['value'];
			$_SESSION['focus'] = $_POST['filter'];
			echo 'succes';
			exit;
		} elseif (action == 'setvalue') {
			$_POST['value'] = round((float)$_POST['value'],2);
			$this->core->sql->update('dat_catalog_list', array($_POST['field']), array($_POST['value']), "`id` = {$_POST['id']}");
			//func::sqlTestError($this->core->sql);			
			if ($_POST['field'] == 'count') {
				$count = $this->core->sql->query("SELECT COUNT(`id`) as `count` FROM `dat_catalog_list` WHERE (`type_id`='{$GROUP_ID}' AND `dat_catalog_list`.`count`>0)");
				$this->core->sql->update('dat_catalog_type', array('count'), array($count->cell[0]['count']), "`alias`='{$GROUP_ALIAS}'");
				//func::sqlTestError($this->core->sql);
			}			
			echo $_POST['value'];
			exit;
		} else
		if (action == 'setphoto') {
			$path = preg_split('#[/]#', "data/dbimage/catalog/{$GROUP_ALIAS}");
			$dir = '';
			foreach($path as $key => $val) {
				$dir.="{$val}/";
				if (!file_exists($dir))
					mkdir($dir,0777);
			}
			$filename = func::GetUploadFileName($_FILES['photo']['name']);
			if (!empty($filename[1]) &&
				@preg_match('#^(jpg|jpeg|png|gif)$#i',$filename[2])) {
				$file = "tmp_{$filename[1]}.{$filename[2]}";
				if (move_uploaded_file($_FILES['photo']['tmp_name'], "{$dir}{$file}")) {
					$preview = "http://{$_SERVER['SERVER_NAME']}/img-dbimage/catalog/{$GROUP_ALIAS}/tmp_{$filename[1]}-{$filename[2]}-90x90-EEEEEE-85.jpg";
					echo "{$file};{$preview}";
				} else
					echo 'error none';
			} else
				echo 'error type';
			exit;
		}
		
		if (action == NULL) { ###			
			$list = $this->core->sql->query("
				SELECT
					`dat_catalog_list`.*,
					`dat_catalog_subtype`.`title` as `subtype_name`,
					`dat_catalog_type{$_SESSION['group']}_field`.* 
				FROM 
					`dat_catalog_list`
					left join `dat_catalog_subtype` on (`dat_catalog_list`.`subtype` = `dat_catalog_subtype`.`id`),
					`dat_catalog_type{$_SESSION['group']}_field` 
				WHERE 
					(`dat_catalog_type{$_SESSION['group']}_field`.`id_rec` = `dat_catalog_list`.`id`
					{$filter})
				ORDER BY
					`dat_catalog_list`.`priority` DESC,
					`dat_catalog_list`.`article`
				LIMIT {$row_out_start},".row_out_length_60
			);
			
			if ($list->num_rows == 0) {
				if($group->num_rows == 0)
					$cnt1 = array('empty_group' => true);
				else
					$cnt1 = array('group' => $group->cell);
				$cnt2 = array(
					'empty_list' => true,
					'subtype' => $subtype->cell,
					'filter_focus' => $_SESSION['focus'],
					'filter' =>
						array(
							'group' => ($_SESSION['group']>0)?$_SESSION['group']:0,
							'prarticle' => ($_SESSION['prarticle']!='')?$_SESSION['prarticle']:'',
							'prtitle' => ($_SESSION['prtitle']!='')?$_SESSION['prtitle']:'',
							'prsubtype' => ($_SESSION['prsubtype']!='')?$_SESSION['prsubtype']:0,
							'prshow' => ($_SESSION['prshow']>0)?$_SESSION['prshow']:0
						)
				);
				$this->content['content'] = array_merge((array)$cnt1, (array)$cnt2);
			} else {
				$catalog = array();
				$pg_url = array();
				for($i=0; $i<$list->num_rows; $i++) {
					foreach($group->cell as $key => $val) {
						if ($val['id'] == $_SESSION['group'])
							break;
					}
					if (!preg_match('#^http:#', $list->cell[$i]['photo'])) {
						if (!empty($list->cell[$i]['photo'])) {
							$list->cell[$i]['photo'] = preg_replace('#;.*#','',$list->cell[$i]['photo']);
							$list->cell[$i]['photo'] = "http://{$_SERVER['SERVER_NAME']}/img-dbimage/catalog/{$val['alias']}/".preg_replace('#\.([a-z]{3}$)#i','-$1',$list->cell[$i]['photo'])."-80c70-EEEEEE-85.jpg";
						} else 
							$list->cell[$i]['photo'] = "http://{$_SERVER['SERVER_NAME']}/img-dbimage/catalog/admnophoto-gif-80c70-EEEEEE-85.jpg";
					} 
					$list->cell[$i]['psize'] = func::imageGetSizeInfo($list->cell[$i]['photo']);
					if ($list->cell[$i]['psize'][1] > 70) {
						$list->cell[$i]['psize'][0] = round(70/$list->cell[$i]['psize'][1]*$list->cell[$i]['psize'][0]);
						$list->cell[$i]['psize'][1] = 70;
					} else
					if ($list->cell[$i]['psize'][0] > 80) {
						$list->cell[$i]['psize'][1] = round(80/$list->cell[$i]['psize'][0]*$list->cell[$i]['psize'][1]);
						$list->cell[$i]['psize'][0] = 80;
					}
					array_push($catalog, $list->cell[$i]);
				}
				
				for($i=0; $i<$pg_max; $i++)
					array_push($pg_url, func::url_delget("http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}").(($i>0)?":pg={$i}":NULL));
							
				$this->content['content'] = array(
					'list' => $catalog,
					'pg_max' => $pg_max,
					'pg_url' => $pg_url,
					'pg' => $pg,
					'group' => $group->cell,
					'subtype' => $subtype->cell,
					'filter_focus' => isset($_SESSION['focus'])?$_SESSION['focus']:'',
					'filter' => 
						array(
							'group' => ($_SESSION['group']>0)?$_SESSION['group']:0,
							'prarticle' => ($_SESSION['prarticle']!='')?$_SESSION['prarticle']:'',
							'prtitle' => ($_SESSION['prtitle']!='')?$_SESSION['prtitle']:'',
							'prsubtype' => ($_SESSION['prsubtype']!='')?$_SESSION['prsubtype']:0,
							'prshow' => ($_SESSION['prshow']>0)?$_SESSION['prshow']:0
						)
				);
				$_SESSION['focus'] = '';
			}
			
		} elseif (action == 'add') { ###
			if($group->num_rows > 0) {
				$columns = $this->core->sql->get_columns("dat_catalog_type{$_SESSION['group']}_field");
				//print_r($columns);
				$subtitles = $this->core->sql->query("SELECT `subtitle` FROM `dat_catalog_list` GROUP BY `subtitle` ORDER BY `subtitle`");
				
				$this->content['page_tpl'] = "adm.{$this->module}_add.tpl";
				$this->content['content'] = array('columns' => $columns,
												  'nowyear' => date("Y"),
												  'subtype' => $subtype->cell,
												  'subtitles' => $subtitles->cell,
												  'type_id' => $GROUP_ID,
												  'group_name' => $GROUP_NAME,
												  'group_alias' => $GROUP_ALIAS);
			} else {
				header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
				exit;
			}
		} elseif (action == 'insert') { ###
			$dir = "data/dbimage/catalog/{$GROUP_ALIAS}";
			$photo = preg_split('#[;]#', $_POST['photo'], NULL, PREG_SPLIT_NO_EMPTY);
			$_POST['photo'] = '';
			foreach($photo as $key => $val) {
				$photo[$key] = preg_replace('#^tmp_#','',$val);
				@rename("{$dir}/{$val}","{$dir}/{$photo[$key]}");
				$_POST['photo'] .= "{$photo[$key]};";
			}
			$list = glob("{$dir}/tmp_*");
			foreach($list as $file) {
				if ((time()-filemtime($file))>=600)
					unlink("{$file}");
			}
			
			$main_columns = $this->core->sql->get_columns('dat_catalog_list');
			$exts_columns = $this->core->sql->get_columns("dat_catalog_type{$GROUP_ID}_field");
			$next_id = $this->core->sql->get_next_auto_increment('dat_catalog_list');
			
			$main_field = array();
			$main_value = array();
			
			$exts_field = array();
			$exts_value = array();
			
			$_POST['type_id'] = $GROUP_ID;
			$_POST['subtitle'] = $GROUP_ID."[{$_POST['subtitle']}]";
			$_POST['weight'] = "{$_POST['weight_type']};{$_POST['weight']}";
			$_POST['last_update'] = date("Y-m-d H:i:s");
			
			foreach($main_columns as $key => $val) {
				if (preg_match('#^(id|count|price|price_rest|priority|rating)$#i',$val['Field'])) {
					unset($main_columns[$key]);
					continue;
				}
				array_push($main_field, $val['Field']);
				array_push($main_value, $_POST[$val['Field']]);
			}
			
			$_POST['id_rec'] = $next_id;
			foreach($exts_columns as $key => $val) {
				array_push($exts_field, $val['Field']);
				array_push($exts_value, $_POST[$val['Field']]);
			}
			
			$this->core->sql->insert('dat_catalog_list', $main_field, $main_value);
			$this->core->sql->insert("dat_catalog_type{$GROUP_ID}_field", $exts_field, $exts_value);
			
			$count = $this->core->sql->query("SELECT COUNT(`id`) as `count` FROM `dat_catalog_list` WHERE (`type_id`='{$GROUP_ID}' AND `dat_catalog_list`.`count`>0)");
			$this->core->sql->update('dat_catalog_type', array('count'), array($count->cell[0]['count']), "`alias`='{$GROUP_ALIAS}'");
			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
		} elseif (action == 'del') { ###
			
			$target = $this->core->sql->query("SELECT `type_id`, `photo` FROM `dat_catalog_list` WHERE `id`='".id."' LIMIT 0,1");
			$FIELD_TYPE = $target->cell[0]['type_id'];
			$PHOTO_LIST = $target->cell[0]['photo'];
			if (!preg_match('#^http:#', $PHOTO_LIST)) {
				$dir = "data/dbimage/catalog/{$GROUP_ALIAS}";
				$photo = preg_split('#[;]#', $PHOTO_LIST, NULL, PREG_SPLIT_NO_EMPTY);
				foreach($photo as $key => $val)
					@unlink("{$dir}/{$val}");
			}
			
			$this->core->sql->delete('dat_catalog_list', "`id` = '{$_GET['id']}'");
			$this->core->sql->delete("dat_catalog_type{$FIELD_TYPE}_field", "`id_rec` = '{$_GET['id']}'");
			
			$count = $this->core->sql->query("SELECT COUNT(`id`) as `count` FROM `dat_catalog_list` WHERE (`type_id`='{$GROUP_ID}' AND `dat_catalog_list`.`count`>0)");
			$this->core->sql->update('dat_catalog_type', array('count'), array($count->cell[0]['count']), "`alias`='{$GROUP_ALIAS}'");
			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
			
		} elseif (action == 'edit') { ###
			if (id>=0) {
				$content = $this->core->sql->query("SELECT 
														`dat_catalog_list`.*,
														`dat_catalog_type{$_SESSION['group']}_field`.* 
													FROM 
														`dat_catalog_list`, 
														`dat_catalog_type{$_SESSION['group']}_field` 
													WHERE 
														(`dat_catalog_type{$_SESSION['group']}_field`.`id_rec` = `dat_catalog_list`.`id`
														AND `dat_catalog_list`.`id` = '".id."') LIMIT 0,1");
				if ($content->num_rows>0) {
					$columns = $this->core->sql->get_columns("dat_catalog_type{$_SESSION['group']}_field");
					
					if (!preg_match('#^http:#', $content->cell[0]['photo'])) {
						$content->cell[0]['photo'] = preg_split('#[;]#', $content->cell[0]['photo'], NULL, PREG_SPLIT_NO_EMPTY);
						$content->cell[0]['photo_preview'] = array();
						foreach($content->cell[0]['photo'] as $key => $val) {
							array_push($content->cell[0]['photo_preview'], "http://{$_SERVER['SERVER_NAME']}/img-dbimage/catalog/{$GROUP_ALIAS}/".preg_replace('#\.([a-z]{3}$)#i','-$1',$val)."-90x90-EEEEEE-85.jpg");
						}
					}
					
					$subtitles = $this->core->sql->query("SELECT `subtitle` FROM `dat_catalog_list` GROUP BY `subtitle` ORDER BY `subtitle`");
					
					$this->content['page_tpl'] = "adm.{$this->module}_add.tpl";
					$this->content['content'] = array('edit' => true,
													  'columns' => $columns,
													  'subtype' => $subtype->cell,
													  'subtitles' => $subtitles->cell,
													  'data' => $content->cell[0],
													  'nowyear' => date("Y"),
													  'group_name' => $GROUP_NAME,
													  'group_alias' => $GROUP_ALIAS);
				} else
					header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			} else
				header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
				
		} elseif (action == 'save') { ###
			if (id>=0) {
				$photo = $this->core->sql->query("SELECT `photo` FROM `dat_catalog_list` WHERE (`dat_catalog_list`.`id` = '".id."') LIMIT 0,1");
				$dir = "data/dbimage/catalog/{$GROUP_ALIAS}";
				
				$l_photo = preg_split('#[;]#', $photo->cell[0]['photo'], NULL, PREG_SPLIT_NO_EMPTY);
				$photo = preg_split('#[;]#', $_POST['photo'], NULL, PREG_SPLIT_NO_EMPTY);
				$_POST['photo'] = '';
				foreach($l_photo as $key => $val) {
					if (!in_array($val, $photo)) {
						unlink("{$dir}/{$val}");
					}
				}
				foreach($photo as $key => $val) {
					if (preg_match('#^tmp_.*#',$val)) {
						$photo[$key] = preg_replace('#^tmp_#','',$val);
						@rename("{$dir}/{$val}","{$dir}/{$photo[$key]}");
					}
					$_POST['photo'] .= "{$photo[$key]};";
				}
				$_POST['photo'] = "{$photo->cell[0]['photo']}{$_POST['photo']}";
				
				$list = glob("{$dir}/tmp_*");
				foreach($list as $file) {
					if ((time()-filemtime($file))>=600)
						unlink("{$file}");
				}
				
				$main_columns = $this->core->sql->get_columns('dat_catalog_list');
				$exts_columns = $this->core->sql->get_columns("dat_catalog_type{$GROUP_ID}_field");
				$next_id = $this->core->sql->get_next_auto_increment('dat_catalog_list');
				
				$main_field = array();
				$main_value = array();
				
				$exts_field = array();
				$exts_value = array();
				
				$_POST['type_id'] = $GROUP_ID;
				$_POST['weight'] = "{$_POST['weight_type']};{$_POST['weight']}";
				$_POST['last_update'] = date("Y-m-d H:i:s");
					
				foreach($main_columns as $key => $val) {
					if (preg_match('#^(id|count|price|price_rest|priority|rating)$#i',$val['Field'])) {
						unset($main_columns[$key]);
						continue;
					}
					array_push($main_field, $val['Field']);
					array_push($main_value, $_POST[$val['Field']]);
				}
				
				if (isset($_POST['geography']) && !empty($_POST['geography']))
					$_POST['geography'] = base64_encode($_POST['geography']);
				
				$_POST['id_rec'] = id;
				foreach($exts_columns as $key => $val) {
					array_push($exts_field, $val['Field']);
					array_push($exts_value, $_POST[$val['Field']]);
				}
				
				$this->core->sql->update('dat_catalog_list', $main_field, $main_value, "`id`='".id."'");
				$this->core->sql->update("dat_catalog_type{$GROUP_ID}_field", $exts_field, $exts_value, "`id_rec`='".id."'");
			}
			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
			
		} elseif (action == 'inssubtype') { ###
			$newId = $this->core->sql->get_next_auto_increment('dat_catalog_subtype');
			$this->core->sql->insert('dat_catalog_subtype', 
				array('type_id', 'alias', 'priority', 'title', 'description'),
				array($GROUP_ID, $_POST['alias'], $_POST['priority'], $_POST['title'], $_POST['description'])
			);
			$this->content['page_tpl'] = "adm.{$this->module}_inssubtype.tpl";
			$this->content['content'] = array("new_id" => $newId);
			
		} elseif (action == 'delsubtype') {
			$list = preg_split('#[;]#', $_POST["id_list"]);
			$where = '(';
			$length = count($list);
			for ($i=0; $i<$length; $i++) {
				$where.="`id`='{$list[$i]}'".(($i<$length-1)?' or ':')');
			}
			$this->core->sql->delete('dat_catalog_subtype', $where);
			exit;
			
		} elseif (action == 'savsubtype') { ###
			$list = preg_split('#\n\n#', $_POST["save_list"]);
			foreach($list as $key => $block) {
				$field = preg_split('#\n#', $block);
				$this->core->sql->update('dat_catalog_subtype', array('alias', 'priority', 'title', 'description'),
													   array($field[1], $field[2], $field[3], $field[4]),
													   "`id`='".$field[0]."'");
			}
			exit;
			
		} elseif (action == 'saveattach') { ###
			$this->core->sql->delete('page_panels', "`alias` = '{$code_name}'");
			for ($i=0; $i < count($_POST['panel']); $i++) {
				$this->core->sql->insert('page_panels', array('alias', 'priority', 'id_panels_list'), array($code_name, 0, "{$_POST['panel'][$i]}"));
			}
			$this->core->sql->delete(
				'page_client',
				"`alias` = '{$code_name}'"
			);
			$this->core->sql->insert(
				'page_client',
				array(
					'alias',
					'title',
					'keywords',
					'description',
					'page_tpl'
				), 
				array(
					$code_name,
					$_POST['title'],
					$_POST['keywords'],
					$_POST['description'],
					($_POST['tpl'] == 'null')?NULL:$_POST['tpl']
				)
			);
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));

		} 
		return $this->content;
	}
}
?>