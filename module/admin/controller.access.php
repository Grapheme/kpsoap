<?
class access_admin extends TAdminController {
	public function access($code_name){
		$this->content = $this->load_module($code_name);
		
		if (action == NULL) {
		
			$roles = $this->core->sql->query("SELECT * FROM `role` ORDER BY `id`");
			$roles = $roles->cell;
			for ($i = 0; $i < count($roles); $i++) {
				$roles[$i]['rights'] = $this->core->sql->query("SELECT `operation`.`description` FROM `operation_rights`, `operation` WHERE (`operation_rights`.`id_operation`=`operation`.`id` AND `operation_rights`.`id_role`={$roles[$i]['id']})");
				$roles[$i]['rights'] = $roles[$i]['rights']->cell;
			}
			$this->content['page_tpl'] = "adm.{$this->module}.tpl";
			$this->content['roles'] = $roles;
			//print_r($roles);
		
		} elseif (action == 'del') {
		
			$this->core->sql->delete('operation_rights', "`id_role` = '{$_GET['id']}'");
			$this->core->sql->delete('subjects_role', "`id_role` = '{$_GET['id']}'");
			$this->core->sql->delete('role', "`id` = '{$_GET['id']}'");
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
		
		} elseif (action == 'add') {
		
			$operation = $this->core->sql->query("SELECT * FROM `operation` ORDER BY `operation`.`id_site_section` ASC");
			$this->content['page_tpl'] = "adm.{$this->module}_add.tpl";
			$this->content['operation'] = $operation->cell;
		
		} elseif (action == 'insert') {
			
			$insert_id = $this->core->sql->get_next_auto_increment('role');
			$this->core->sql->insert('role',array('id', 'name', 'description'),
																			array($insert_id, func::sc_html($_POST['name']), $_POST['description']));

			if (isset($_POST['operation_rights']) && @(int)count($_POST['operation_rights'])>0)
				for ($i=0; $i<count($_POST['operation_rights']); $i++)
					if (!preg_match('/^null$/i',$_POST['operation_rights'][$i]))
						$this->core->sql->insert('operation_rights',array('id_operation', 'id_role'),
																					 							array($_POST['operation_rights'][$i], $insert_id));
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
		
		} elseif (action == 'edit') {
			
			$operation = $this->core->sql->query("SELECT * FROM `operation` ORDER BY `operation`.`id_site_section` ASC");
			$operation_select = $this->core->sql->query("SELECT `id_operation` FROM `operation_rights` WHERE `id_role` = '{$_GET['id']}'");
			$role_info = $this->core->sql->query("SELECT * FROM `role` WHERE `id`={$_GET['id']}");
						
			$this->content['edit_id'] = $_GET['id'];
			$this->content['page_tpl'] = "adm.{$this->module}_edit.tpl";
			$this->content['role_info'] = array('name' => $role_info->cell[0]['name'], 'description' => $role_info->cell[0]['description']);
			$this->content['operation_select'] = $operation_select->cell;
			$this->content['operation_select_count'] = count($operation_select->cell);
			$this->content['operation'] = $operation->cell;
			
		} elseif (action == 'save') {
			
			$this->core->sql->update('role',array('name', 'description'),
																			array(func::sc_html($_POST['name']), $_POST['description']), "`id` = {$_POST['id']}");
			$this->core->sql->delete('operation_rights', "id_role = '{$_POST['id']}'");
			
			if (isset($_POST['operation_rights']) && @(int)count($_POST['operation_rights'])>0)
				for ($i=0; $i<count($_POST['operation_rights']); $i++)
					if (!preg_match('/^null$/i',$_POST['operation_rights'][$i]))
						$this->core->sql->insert('operation_rights',array('id_operation', 'id_role'),
																					 							array($_POST['operation_rights'][$i], $_POST['id']));
																			
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			
		}
		
		return $this->content;
	}
}	
?>