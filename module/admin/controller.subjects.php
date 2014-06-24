<?
class subjects_admin extends TAdminController {
	public function subjects($code_name){
		$this->content = $this->load_module($code_name);
		
		if (action == NULL) {
		
			$subjects = $this->core->sql->query("SELECT * FROM `sys_subjects` ORDER BY `priority`");
			$tmp_sbj = array();
			for ($i = 0; $i < $subjects->num_rows; $i++) {
				$subjects_role = $this->core->sql->query("
					SELECT
						`role`.`id`,
						`role`.`name`
					FROM
						`subjects_role`,
						`role`
					where (
						`subjects_role`.`id_subject` = '{$subjects->cell[$i]['id']}'
							AND `subjects_role`.`id_role` = `role`.`id`
					)
				");
				$subjects_group = $this->core->sql->query("
					SELECT
						`sys_subjects`.`id`,
						`sys_subjects`.`name`
					FROM
						`sys_subjects`,
						`subjects_groups`
					WHERE (
						`subjects_groups`.`id_subject` = '{$subjects->cell[$i]['id']}'
							AND `subjects_groups`.`id_subject_in_group` = `sys_subjects`.`id`
							AND `sys_subjects`.`is_group` = 1
					)
				");
				$tmp_sbj[$subjects->cell[$i]['is_group']][] = array(
					'id' => $subjects->cell[$i]['id'],
					'alias' => $subjects->cell[$i]['alias'],
					'priority' => $subjects->cell[$i]['priority'],
					'login' => $subjects->cell[$i]['login'],
					'password' => cript::auth_decode($subjects->cell[$i]['password']),
					'hash' => $subjects->cell[$i]['hash'],
					'name' => preg_split('#[;]#',$subjects->cell[$i]['name']),
					'description' => $subjects->cell[$i]['description'],
					'is_teacher' => (bool)$subjects->cell[$i]['is_teacher'],
					'discipline' => $subjects->cell[$i]['discipline'],
					'photoname' => $subjects->cell[$i]['photoname'],
					'personal_page' => (bool)$subjects->cell[$i]['personal_page'],
					'subjects_role' => array(
						'num_rows' => count($subjects_role->cell),
						'cell' => $subjects_role->cell
					),
					'subjects_group' => array(
						'num_rows' => count($subjects_group->cell),
						'cell' => $subjects_group->cell
					)
				);
			}
			$this->content['subject_list'] = $tmp_sbj[0];
			$this->content['group_list'] = $tmp_sbj[1];			
			
		} elseif (action == 'add') {
			
			/*$operations = $this->core->sql->query("SELECT `operation`.`id`, `operation`.`alias`, `operation`.`id_site_section`, `operation`.`description`,  `site_section`.`name` FROM `operation`, `site_section` WHERE `site_section`.`id` = `operation`.`id_site_section` ORDER BY `operation`.`id_site_section`");
			$tmp_opr = array();
			for ($i = 0; $i < $operations->num_rows; $i++) {
				$tmp_opr[] = array('id' => $operations->cell[$i]['id'],
						 							 'alias' => $operations->cell[$i]['alias'],
													 'id_site_section' => $operations->cell[$i]['id_site_section'],
													 'name' => $operations->cell[$i]['name'],
													 'description' => $operations->cell[$i]['description']);
			}*/
			
			$subjects = $this->core->sql->query("
				SELECT
					*
				FROM
					`sys_subjects`
				WHERE
					`is_group`='1'
				ORDER BY
					`priority`
			");
			$tmp_sbj = array();
			for ($i = 0; $i < $subjects->num_rows; $i++) {
				array_push($tmp_sbj, array(
					'id' => $subjects->cell[$i]['id'],
					'alias' => $subjects->cell[$i]['alias'],
					'priority' => $subjects->cell[$i]['priority'],
					'name' => preg_split('#[;]#',$subjects->cell[$i]['name']),
					'description' => $subjects->cell[$i]['description']
				));
			}

			$roles = $this->core->sql->query("
				SELECT
					*
				FROM
					`role`
				WHERE `id`!=-1
			");
			$tmp_rls = array();
			for ($i = 0; $i < $roles->num_rows; $i++) {
				array_push($tmp_rls, array(
					'id' => $roles->cell[$i]['id'],
					'name' => preg_split('#[;]#',$roles->cell[$i]['name']),
					'description' => $roles->cell[$i]['description']
				));
			}
			
			$this->content['page_tpl'] = "adm.{$this->module}_add.tpl";
			$this->content['group_list'] = $tmp_sbj;
			$this->content['role_list'] = $tmp_rls;
			$subjects = $this->core->sql->query("
				SELECT
					*
				FROM
					`sys_subjects`
				WHERE
					`is_group`!='1'
				ORDER BY
					`priority` DESC
				LIMIT 0,1
			");
			$this->content['priority'] = round($subjects->cell[0]['priority']+10,-1);
			
		} elseif (action == 'insert') {
			
			$photoname = NULL;
			if (!isset($_POST['is_teacher']) && !isset($_POST['personal_page'])) {
				$photoname = NULL;
			} else {
				if (!empty($_FILES['photoname']['name'])) {
					$photoname = func::RandomPref(18).func::GetFileExt($_FILES['photoname']['name']);
					if (!move_uploaded_file($_FILES['photoname']['tmp_name'], 'data/dbimage/'.$photoname))
						$photoname = NULL;
				} 
			}

			$id = $this->core->sql->get_next_auto_increment('sys_subjects');
			$this->core->sql->insert('sys_subjects', array('id', 'login', 'password', 'hash', 'alias', 'priority', 'name', 'description', 'is_teacher', 'photoname', 'personal_page', 'is_group'),
													 array($id, strtolower($_POST['login']), cript::auth_encode($_POST['password']), md5($_POST['password'].cript::auth_encode($_POST['password'])), $_POST['alias'], $_POST['priority'], $_POST['name0'].";".$_POST['name1'].";".$_POST['name2'], $_POST['description'], isset($_POST['is_teacher'])?'1':'0', $photoname, isset($_POST['personal_page'])?'1':'0', '0'));
			
			if (isset($_POST['group_list']) && @(int)count($_POST['group_list'])>0)
				for ($i=0; $i<count($_POST['group_list']); $i++)
					if (!preg_match('/^null$/i',$_POST['group_list'][$i]))
						$this->core->sql->insert('subjects_groups', array('id_subject', 'id_subject_in_group'),
																					 							array($id, $_POST['group_list'][$i]));
			
			$_POST['role_list'][] = '-1';
			if (isset($_POST['role_list']) && @(int)count($_POST['role_list'])>0)
				for ($i=0; $i<count($_POST['role_list']); $i++)
					$this->core->sql->insert('subjects_role', array('id_subject', 'id_role'),
																											array($id, $_POST['role_list'][$i]));
			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
		
		} elseif (action == 'del') {

			$photoname = $this->core->sql->query("
				SELECT
					`id`,
					`photoname`
				FROM
					`sys_subjects`
				WHERE `id`='{$_GET['id']}'
			");
			@unlink('data/dbimage/'.$photoname->cell[0]['photoname']);
			$this->core->sql->delete('subjects_role', "`id_subject` = '{$_GET['id']}'");
			$this->core->sql->delete('sys_subjects', "`id` = '{$_GET['id']}'");
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
		
		} elseif (action == 'edit') { #!!#
			$subjects = $this->core->sql->query("SELECT * FROM `sys_subjects` WHERE `is_group`='1' ORDER BY `priority`");
			$tmp_sbj = array();
			for ($i = 0; $i < $subjects->num_rows; $i++)
				array_push($tmp_sbj, array(
					'id' => $subjects->cell[$i]['id'],
					'alias' => $subjects->cell[$i]['alias'],
					'priority' => $subjects->cell[$i]['priority'],
					'name' => preg_split('#[;]#',$subjects->cell[$i]['name']),
					'description' => $subjects->cell[$i]['description']
				));

			$roles = $this->core->sql->query("SELECT * FROM `role` WHERE `id`!=-1");
			$tmp_rls = array();
			for ($i = 0; $i < $roles->num_rows; $i++)
				array_push($tmp_rls, array(
					'id' => $roles->cell[$i]['id'],
					'name' => preg_split('#[;]#',$roles->cell[$i]['name']),
					'description' => $roles->cell[$i]['description']
				));

			$subjects_in_group = $this->core->sql->query("SELECT * FROM `subjects_groups`,`sys_subjects` WHERE (`subjects_groups`.`id_subject` = '{$_GET['id']}')");
			$roles_subjects = $this->core->sql->query("SELECT * FROM `subjects_role` WHERE (`id_subject` = '{$_GET['id']}' AND `id_role` != '-1')");

			$subject = $this->core->sql->query("SELECT * FROM `sys_subjects` WHERE `id`='{$_GET['id']}'");
			$subject->cell[0]['password'] = cript::auth_decode($subject->cell[0]['password']);
			$subject->cell[0]['name'] = func::sbj_getFullName($subject->cell[0]['name']);
			
			$this->content['page_tpl'] = "adm.{$this->module}_edit.tpl";
			$this->content['edit_id'] = $_GET['id'];
			$this->content['subject_info'] = $subject->cell;
			$this->content['group_list'] = $tmp_sbj;
			$this->content['role_list'] = $tmp_rls;
			$this->content['subjects_in_group_count'] = count($subjects_in_group->cell);
			$this->content['subjects_in_group'] = $subjects_in_group->cell;
			$this->content['roles_subjects_count'] = count($roles_subjects->cell);
			$this->content['roles_subjects'] = $roles_subjects->cell;
		
		} elseif (action == 'save') {

			$subject = $this->core->sql->query("SELECT * FROM `sys_subjects` WHERE `id` = '{$_POST['id']}'");
			$photoname = $subject->cell[0]['photoname'];
			if (!empty($_POST['pdelet'])) {
				@unlink('data/dbimage/'.$photoname);
				$photoname = NULL;
			}
			if (!empty($_FILES['photoname']['name'])) {
				if (!empty($photoname)) {
					@unlink('data/dbimage/'.$photoname);
				}
				$photoname = func::RandomPref(18).func::GetFileExt($_FILES['photoname']['name']);
				if (!move_uploaded_file($_FILES['photoname']['tmp_name'], 'data/dbimage/'.$photoname))
					$photoname = NULL;
			}
			
			$this->core->sql->update(
				'sys_subjects',
				array(
					'login',
					'password',
					'hash',
					'alias',
					'priority',
					'name',
					'description',
					'is_teacher',
					'photoname',
					'personal_page',
					'is_group'
				),
				array(
					strtolower($_POST['login']),
					cript::auth_encode($_POST['password']),
					md5($_POST['password'].cript::auth_encode($_POST['password'])),
					$_POST['alias'],
					$_POST['priority'],
					$_POST['name0'].";".$_POST['name1'].";".$_POST['name2'],
					$_POST['description'],
					isset($_POST['is_teacher'])?'1':'0',
					$photoname,
					isset($_POST['personal_page'])?'1':'0',
					'0'
				),
				"`id` = {$_POST['id']}"
			);
			
			$this->core->sql->delete(
				'subjects_groups',
				"`id_subject` = '{$_POST['id']}'"
			);
			$this->core->sql->delete(
				'subjects_role',
				"`id_subject` = '{$_POST['id']}'"
			);
			
			if (isset($_POST['group_list']) && @(int)count($_POST['group_list'])>0)
				for ($i=0; $i<count($_POST['group_list']); $i++)
					if (!preg_match('/^null$/i',$_POST['group_list'][$i]))
						$this->core->sql->insert(
							'subjects_groups',
							array(
								'id_subject',
								'id_subject_in_group'
							),
							array(
								$_POST['id'],
								$_POST['group_list'][$i]
							)
						);
			
			$_POST['role_list'][] = '-1';
			if (isset($_POST['role_list']) && @(int)count($_POST['role_list'])>0)
				for ($i=0; $i<count($_POST['role_list']); $i++)
					$this->core->sql->insert(
						'subjects_role',
						array(
							'id_subject',
							'id_role'
						),
						array(
							$_POST['id'],
							$_POST['role_list'][$i]
						)
					);
			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
		
		} elseif (action == 'addgroup') {
		
			$subjects = $this->core->sql->query("
				SELECT
					*
				FROM
					`sys_subjects`
				WHERE `is_group`='1'
				ORDER BY `priority` DESC
				LIMIT 0,1
			");
			$role_list = $this->core->sql->query("
				SELECT
					*
				FROM
					`role`
				WHERE `id`!=-1
			");
			
			$this->content['page_tpl'] = "adm.{$this->module}_addgroup.tpl";
			$this->content['role_list'] = $role_list->cell;
			$this->content['priority'] = round($subjects->cell[0]['priority']+10,-1);
			
		} elseif (action == 'insertgroup') {

			$id = $this->core->sql->get_next_auto_increment('sys_subjects');
			$this->core->sql->insert(
				'sys_subjects',
				array(
					'id',
					'alias',
					'priority',
					'name',
					'description',
					'is_group'
				),
				array(
					$id,
					$_POST['alias'],
					$_POST['priority'],
					$_POST['name'],
					$_POST['description'],
					'1'
				)
			);
				
			$_POST['role_list'][] = '-1';
			if (isset($_POST['role_list']) && @(int)count($_POST['role_list'])>0)
				for ($i=0; $i<count($_POST['role_list']); $i++)
					$this->core->sql->insert(
						'subjects_role',
						array(
							'id_subject',
							'id_role'
						),
						array(
							$id,
							$_POST['role_list'][$i]
						)
					);
																										
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			
		} elseif (action == 'delgroup') {
			
			$this->core->sql->delete('subjects_groups', "`id_subject_in_group` = '{$_GET['id']}'");
			$this->core->sql->delete('subjects_groups', "`id_subject` = '{$_GET['id']}'");
			$this->core->sql->delete('subjects_role', "`id_subject` = '{$_GET['id']}'");
			$this->core->sql->delete('sys_subjects', "`id` = '{$_GET['id']}'");
			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			
		} elseif (action == 'editgroup') {
			
			$group = $this->core->sql->query("SELECT * FROM `sys_subjects` WHERE (`is_group` = '1' AND `id` = '{$_GET['id']}')");
			$role_list = $this->core->sql->query("SELECT * FROM `role` WHERE `id`!='-1'");
			$group_role = $this->core->sql->query("SELECT `role`.`id`, `role`.`name` FROM `subjects_role`, `role` where (`subjects_role`.`id_subject` = '{$_GET['id']}' and `subjects_role`.`id_role` = `role`.`id` and `role`.`id`!='-1')");
			
			$this->content['page_tpl'] = "adm.{$this->module}_editgroup.tpl";
			$this->content['edit_id'] = $_GET['id'];
			$this->content['group'] = $group->cell;
			$this->content['role_list'] = $role_list->cell;
			$this->content['group_role'] = array('num_rows' => count($group_role->cell),'cell' => $group_role->cell);
			
		} elseif (action == 'savegroup') {
			$this->core->sql->update('sys_subjects', array('alias', 'priority', 'name', 'description', 'is_group'),
																					 array($_POST['alias'], $_POST['priority'], $_POST['name'], $_POST['description'], '1'), "`id` = '{$_POST['id']}'");
			$this->core->sql->delete('subjects_role', "`id_subject`='{$_POST['id']}'");	
			$_POST['role_list'][] = '-1';
			if (isset($_POST['role_list']) && @(int)count($_POST['role_list'])>0)
				for ($i=0; $i<count($_POST['role_list']); $i++) {
					if ($_POST['role_list'][$i] != 'null')
						$this->core->sql->insert(
							'subjects_role',
							array(
								'id_subject',
								'id_role'
							),
							array(
								$_POST['id'],
								$_POST['role_list'][$i]
							)
						);
					else
						continue;
				}
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
		
		}
		
		return $this->content;
	}
}
?>