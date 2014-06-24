<?
class blog_admin extends TAdminController {
	public function blog($code_name){
		$this->content = $this->load_module($code_name);
		
		$_SESSION['blog_group'] = (isset($_SESSION['blog_group']) || @$_SESSION['blog_group']>0)?@$_SESSION['blog_group']:0;
		if (action == 'setfilter') {
			$_SESSION["blog_{$_POST['filter']}"] = $_POST['value'];
			echo 'succes';
			exit;
		}
		$filter = (($_SESSION['blog_group']>0)?" AND `dat_blog_list`.`group_id` = '{$_SESSION['blog_group']}'":NULL);
		
		$group = $this->core->sql->query("
			SELECT
				*
			FROM
				`dat_blog_group`
			ORDER BY
				`priority`
		");
		$list = $this->core->sql->query("
			SELECT
				`id`
			FROM
				`dat_blog_list`
			WHERE (
				1 {$filter}
			)
		");
		
		$row_length=$list->num_rows;
		$pg_max=ceil($row_length/row_out_length);
		$pg=pg;
		$pg =($res=(pg)>($pg_max-1)?$pg_max-1:pg)<0?0:$res;
		$row_out_start = $pg*row_out_length;
				
		if (action == NULL) { ###
			
			$group_list = array();
			for($i=0; $i<$group->num_rows; $i++)// echo ($group->cell[$i]['title']);
				array_push($group_list, array('id' => $group->cell[$i]['id'],
											  'alias' => $group->cell[$i]['alias'],
											  'priority' => $group->cell[$i]['priority'],
											  'title' => $group->cell[$i]['title']));
											
			$list = $this->core->sql->query("
				SELECT
					`dat_blog_list`.`id`,
					`dat_blog_list`.`group_id`,
					`dat_blog_list`.`alias`,
					`dat_blog_group`.`alias` as `group_alias`,
					`dat_blog_list`.`title`,
					`dat_blog_list`.`menutitle`,
					`dat_blog_list`.`text`,
					`dat_blog_list`.`tags`,
					`dat_blog_list`.`livejournal`,
					`dat_blog_list`.`datetime`
				FROM
					`dat_blog_list`
						LEFT JOIN `dat_blog_group` ON (`dat_blog_group`.`id` = `dat_blog_list`.`group_id`)
				WHERE (
					1 {$filter}
				)
				ORDER BY
					`dat_blog_list`.`datetime` DESC,
					`dat_blog_list`.`id`
				DESC LIMIT {$row_out_start},".row_out_length);
			
			if ($list->num_rows == 0)
				if($group->num_rows == 0)
					$this->content['content'] = array('empty_list' => true,
													  'empty_group' => true);
				else
					$this->content['content'] = array('empty_list' => true,
													  'group' => $group_list);
			else {
				$pg_url = array();
				for($i=0; $i<$list->num_rows; $i++) {
					$list->cell[$i]['tags'] = func::extractTags($list->cell[$i]['tags']);
					$list->cell[$i]['href'] = "/{$code_name}/{$list->cell[$i]['group_alias']}/{$list->cell[$i]['alias']}/";
				}
				for($i=0; $i<$pg_max; $i++)
					array_push($pg_url, func::url_delget("http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}").":pg={$i}");
				
				$this->content['content'] = array("list" => $list->cell,
												  "pg_max" => $pg_max,
												  "pg_url" => $pg_url,
												  "pg" => $pg,
												  'group' => $group_list);
			}
			$this->content['content'] = array_merge((array)$this->content['content'], array(
				'filter' => array('blog_group' => $_SESSION['blog_group'])
			));
			
			
		} elseif (action == 'add') { ###
			if($group->num_rows > 0) {
				$group_list = array();
				for($i=0; $i<$group->num_rows; $i++)
					array_push($group_list, array('id' => $group->cell[$i]['id'],
												  'alias' => $group->cell[$i]['alias'],
												  'priority' => $group->cell[$i]['priority'],
												  'title' => $group->cell[$i]['title']));
				$tags = $this->core->sql->query("
					SELECT
						`tags`
					FROM
						`dat_blog_list`
					GROUP BY
						`tags`
				");
				$tags_list = array();
				$test_list = array();
				for ($i=0; $i<$tags->num_rows; $i++) {
					$tmp = func::extractTags($tags->cell[$i]['tags']);
					foreach($tmp as $key => $val) {
						$val = func::strToLower(trim($val));
						if (preg_match('#[\'"]#',$val)) {
							continue;
						}
						if (!in_array($val, $test_list) && !empty($val)) {
							array_push($test_list, $val);
							$count = $this->core->sql->query("
								SELECT
									count(`id`) as `count`
								FROM
									`dat_blog_list`
								WHERE (
									`tags` LIKE '%[{$val}]%'
								)
							");
							array_push($tags_list, array("name" => $val,
														 "count" => $count->cell[0]['count']));
						}
					}
				}
				unset($test_list);
				uasort($tags_list, "func::absArrayCountSort");
			
				$this->content['page_tpl'] = "adm.{$this->module}_add.tpl";
				$this->content['content'] = array('group' => $group_list,
												  'tags_list' => $tags_list);
			} else {
				header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
				exit;
			}
		} elseif (action == 'insert') {###
			
			$_POST['date'] = (!empty($_POST['date']) && preg_match('#^[0-9]{2}-[0-9]{2}-[0-9]{4}$#',$_POST['date']))?preg_replace('#([0-9]{2})-([0-9]{2})-([0-9]{4})#', '$3-$2-$1 00:00:00', $_POST['date']):NULL;
			
			$result = $this->core->sql->insert('dat_blog_list', array('group_id', 'alias', 'title', 'menutitle', 'text', 'tags', 'livejournal', 'datetime'),	
															array($_POST['group'], $_POST['alias'], $_POST['texttitle'], $_POST['menutitle'], func::imageDelUrlRelative($_POST['text']), func::packTags($_POST['tags']), $_POST['livejournal'], $_POST['date']));
				
			$group = $this->core->sql->query("	SELECT
													`alias`
												FROM
													`dat_blog_group`
												WHERE
													`id` = '{$_POST['group']}'");
			
			$this->core->sql->delete('page_panels', "`alias` = '{$code_name}_{$group->cell[0]['alias']}_{$_POST['alias']}'");
			for ($i=0; $i < count($_POST['panel']); $i++) {
				$this->core->sql->insert('page_panels', array('alias', 'priority', 'id_panels_list'), 
														array($code_name."_".$group->cell[0]['alias']."_".$_POST['alias'], 0, "{$_POST['panel'][$i]}"));
			}
			
			$this->core->sql->delete('page_client', "`alias` = '{$code_name}_{$group->cell[0]['alias']}_{$_POST['alias']}'");
			$this->core->sql->insert('page_client', array('alias', 'title', 'keywords', 'description', 'page_tpl'), 
													array($code_name."_".$group->cell[0]['alias']."_".$_POST['alias'], $_POST['title'], $_POST['keywords'], $_POST['description'], ($_POST['tpl'] == 'null')?NULL:$_POST['tpl']));
			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
			
		} elseif (action == 'del') { ###
			
			$target = $this->core->sql->query("SELECT
													`dat_blog_list`.`id`,
													`dat_blog_list`.`alias`,
													`dat_blog_group`.`alias` as `group`
												FROM
													`dat_blog_list` LEFT JOIN `dat_blog_group` ON (`dat_blog_list`.`group_id` = `dat_blog_group`.`id`)
												WHERE `dat_blog_list`.`id`='{$_GET['id']}' LIMIT 0,1");
			
			$this->core->sql->delete('dat_blog_list', "`id` = '{$_GET['id']}'");
			$this->core->sql->delete('page_panels', "`alias` = '{$code_name}_{$target->cell[0]['group']}_{$target->cell[0]['alias']}'");
			$this->core->sql->delete('page_client', "`alias` = '{$code_name}_{$target->cell[0]['group']}_{$target->cell[0]['alias']}'");
			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
			
		} elseif (action == 'edit') { ###
			if (id>=0) {
				$content = $this->core->sql->query("SELECT
														`dat_blog_list`.*,
														`dat_blog_group`.`alias` as `group`
													FROM
														`dat_blog_list` LEFT JOIN `dat_blog_group` ON (`dat_blog_list`.`group_id` = `dat_blog_group`.`id`)
													WHERE `dat_blog_list`.`id`='".id."' LIMIT 0,1");
				
				if ($content->num_rows>0) {
					$group_list = array();
					for($i=0; $i<$group->num_rows; $i++)// echo ($group->cell[$i]['title']);
						array_push($group_list, array('id' => $group->cell[$i]['id'],
													  'alias' => $group->cell[$i]['alias'],
													  'priority' => $group->cell[$i]['priority'],
													  'title' => $group->cell[$i]['title']));
													  
					$this->content['page_tpl'] = "adm.{$this->module}_add.tpl";
					$meta = $this->core->sql->query("SELECT * FROM `page_client` WHERE `alias` = '{$code_name}_{$content->cell[0]['group']}_{$content->cell[0]['alias']}' LIMIT 0,1");
					$panels = $this->core->sql->query("SELECT * FROM `page_panels` WHERE `alias` = '{$code_name}_{$content->cell[0]['group']}_{$content->cell[0]['alias']}'");
					
					$tags = $this->core->sql->query("SELECT `tags` FROM `dat_blog_list` GROUP BY `tags`");
					$tags_list = array();
					$test_list = array();
					for ($i=0; $i<$tags->num_rows; $i++) {
						$tmp = func::extractTags($tags->cell[$i]['tags']);
						foreach($tmp as $key => $val) {
							$val = func::strToLower(trim($val));
							if (preg_match('#[\'"]#',$val)) {
								continue;
							}
							if (!in_array($val, $test_list) && !empty($val)) {
								array_push($test_list, $val);
								$count = $this->core->sql->query("SELECT count(`id`) as `count` FROM `dat_blog_list` WHERE (`tags` LIKE '%[{$val}]%')");
								array_push($tags_list, array("name" => $val,
															 "count" => $count->cell[0]['count']));
							}
						}
					}
					unset($test_list);
					uasort($tags_list, "func::absArrayCountSort");

					if ($content->num_rows>0) {
						$this->content['content'] = array('id' => $content->cell[0]['id'],
														  'group_id' => $content->cell[0]['group_id'],
														  'alias' => $content->cell[0]['alias'],
														  'title' => $content->cell[0]['title'],
														  'menutitle' => $content->cell[0]['menutitle'],
														  'text' => $content->cell[0]['text'],
														  'tags' => func::extractTags($content->cell[0]['tags']),
														  'livejournal' => $content->cell[0]['livejournal'],
														  'datetime' => preg_replace('#([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}):([0-9]{2})#', '$3-$2-$1 $4:$5:$6', $content->cell[0]['datetime']),
														  'group' => $group_list,
														  'tags_list' => $tags_list);
						$this->content['page_tpl'] = "adm.{$this->module}_edit.tpl";
					} else {
						header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
						exit;
					}
					if ($meta->num_rows>0) {
						$this->content['meta'] = array("title" => $meta->cell[0]['title'],
													   "keywords" => $meta->cell[0]['keywords'],
													   "description" => $meta->cell[0]['description']);
					} else {
						$this->content['meta'] = array("title" => '',
													   "keywords" => '',
													   "description" => '');
					}
					if ($panels->num_rows>0) {
						$panel_list = array();
						for ($i=0; $i < $panels->num_rows; $i++) {
							array_push($panel_list, array("id" => $panels->cell[$i]['id_panels_list'],
														  "alias" => $panels->cell[$i]['alias']));
						}
						$this->content['panels'] = $panel_list;
					} else {
						$this->content['panels'] = array();
					}
				} else
					header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			} else
				header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
				
		} elseif (action == 'save') { ###
			if (id>=0) {
				$target = $this->core->sql->query("SELECT
														`dat_blog_list`.`id`,
														`dat_blog_list`.`alias`,
														`dat_blog_group`.`alias` as `group`
													FROM
														`dat_blog_list` LEFT JOIN `dat_blog_group` ON (`dat_blog_list`.`group_id` = `dat_blog_group`.`id`)
													WHERE `dat_blog_list`.`id`='".id."' LIMIT 0,1");
				
				$group = $this->core->sql->query("	SELECT
														`alias`
													FROM
														`dat_blog_group`
													WHERE
														`id` = '{$_POST['group']}'");				
			
				if ($target->num_rows>0) {
					$_POST['date'] = (!empty($_POST['date']) && preg_match('#^[0-9]{2}-[0-9]{2}-[0-9]{4}$#',$_POST['date']))?preg_replace('#([0-9]{2})-([0-9]{2})-([0-9]{4})#', '$3-$2-$1 00:00:00', $_POST['date']):NULL;
					
					$this->core->sql->delete('page_panels', "`alias` = '{$code_name}_{$target->cell[0]['group']}_{$target->cell[0]['alias']}'");
					if (isset($_POST['panel'])) {
						for ($i=0; $i < count($_POST['panel']); $i++) {
							$this->core->sql->insert('page_panels', array('alias', 'priority', 'id_panels_list'), 
																	array("{$code_name}_{$group->cell[0]['alias']}_{$_POST['alias']}", 0, "{$_POST['panel'][$i]}"));
						}
					}
					$this->core->sql->delete('page_client', "`alias` = '{$code_name}_{$target->cell[0]['group']}_{$target->cell[0]['alias']}'");
					$this->core->sql->insert('page_client', array('alias', 'title', 'keywords', 'description', 'page_tpl'), 
															array("{$code_name}_{$group->cell[0]['alias']}_{$_POST['alias']}", $_POST['title'], $_POST['keywords'], $_POST['description'], ($_POST['tpl'] == 'null')?NULL:$_POST['tpl']));
					
					$this->core->sql->update('dat_blog_list', array('group_id', 'alias', 'title', 'menutitle', 'text', 'tags', 'livejournal', 'datetime'),
															 array($_POST['group'], $_POST['alias'], $_POST['texttitle'], $_POST['menutitle'], func::imageDelUrlRelative($_POST['text']), func::packTags($_POST['tags']), $_POST['livejournal'], $_POST['date']),
															 "`id`='".id."'");
				}
			}
				
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
			
		} elseif (action == 'insertgroup') { ###
			$newId = $this->core->sql->get_next_auto_increment('dat_blog_group');
			$this->core->sql->insert('dat_blog_group', array('alias', 'priority', 'title'),
												   array($_POST['alias'], $_POST['priority'], $_POST['title']));
			$this->content['page_tpl'] = "adm.{$this->module}_insertgroup.tpl";
			$this->content['content'] = array("new_id" => $newId);
			
		} elseif (action == 'delgroup') {
			$list = preg_split('#[;]#', $_POST["id_list"]);
			$where = '(';
			$length = count($list);
			for ($i=0; $i<$length; $i++) {
				$where.="`id`='{$list[$i]}'".(($i<$length-1)?' or ':')');
			}
			$this->core->sql->delete('dat_blog_group', $where);
			exit;
			
		} elseif (action == 'savegroup') { ###
			$list = preg_split('#\n\n#', $_POST["save_list"]);
			foreach($list as $key => $block) {
				$field = preg_split('#\n#', $block);
				$this->core->sql->update('dat_blog_group', array('alias', 'priority', 'title'),
													   array($field[1], $field[2], $field[3]),
													   "`id`='".$field[0]."'");
			}
			exit;
			
		} elseif (action == 'saveattach') { ###
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