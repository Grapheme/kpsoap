<?
class TSubjects extends TBase {
	private $sql_id = NULL;
	private $sql = NULL;
	public $info = NULL;
	public $group_list = NULL;
	public $right_list = NULL;
	public $is_admin_access = false;
	public $is_client_access = false;
	
	private $is_auth = false;
	
	public function __construct($sql_id, $sql) {
		$this->sql_id = $sql_id;
		$this->sql = $sql;
		if (isset($_POST['logon']))
			$this->logon();
		elseif(isset($_POST['logoff']))
			$this->logoff();
		$this->authsession(@$_SESSION['login'], cript::auth_decode(@$_SESSION['password']));
	}
	
	public function logon() {
		if (isset($_POST['logon']) && isset($_POST['login']) && isset($_POST['password'])) {
			$this->authsession($_POST['login'], $_POST['password']);
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
		}
		return false;
	}

	public function logoff() {
		if (isset($_POST['logoff'])) {
			unset($_SESSION['login']);
			unset($_SESSION['password']);
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			$this->is_auth = false;
		}
		return $this->is_auth;
	}
	
	public function get_authstate() {
		return $this->is_auth;
	}
	
	private function authsession($login, $password) {
		if (!$this->is_auth) {
			$login = strtolower(empty($login)?'_':(string)$login);
			if ($subjects = $this->sql->query("SELECT * FROM `sys_subjects` WHERE (`login`='{$login}' AND `is_group`='0') LIMIT 0,1")) {
				if ($subjects->num_rows>0) {
					$password = cript::auth_encode($password);

					if ($subjects->cell[0]['password'] === $password && 
							$subjects->cell[0]['hash'] === md5(cript::auth_decode($password).$password)) {
						if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) {
							$_SESSION['login'] = NULL;
							$_SESSION['password'] = NULL;
						}
						$_SESSION['login'] = $login;
						$_SESSION['password'] = $password;
						$this->info['id'] = $subjects->cell[0]['id'];
						$this->info['priority'] = $subjects->cell[0]['priority'];
						$this->info['login'] = $subjects->cell[0]['login'];
						$this->info['name'] =  preg_split('/[;]/', $subjects->cell[0]['name']);
						$this->info['description'] = $subjects->cell[0]['description'];
						$this->info['personal_page'] = $subjects->cell[0]['personal_page'];
						$this->get_group_right($this->group_list, $this->right_list);
						$this->get_access($this->is_admin_access, $this->is_client_access, $this->right_list);
						$this->is_auth = true;
						return $this->is_auth;
					}
				}
			}
		}
		$this->info['id'] = '-1';
		$this->get_group_right($this->group_list, $this->right_list);
		$this->get_access($this->is_admin_access, $this->is_client_access, $this->right_list);
		return $this->is_auth;
	}

	private function get_access(&$is_admin_access, &$is_client_access, &$right_list) {
		foreach ($right_list as $key => $val)
			if (preg_match('#(_add)|(_del)|(_edit)|(_ñhoice)#i',$val['alias'])) {
				$is_admin_access = true;
				break;
			}
		foreach ($right_list as $key => $val)
			if (@preg_match("#{$module}_viewing#i",$val['alias'])) {
				$is_client_access = true;
				break;
			}
	}
	
	private function get_group_right(&$group_list, &$right_list) {
		$group_list = array();
		$right_list = array();
		$next_id = $this->info['id'];
		do {
			$groups = $this->sql->query("
				SELECT
					`subjects_groups`.`id`,
					`subjects_groups`.`id_subject`,
					`subjects_groups`.`id_subject_in_group`,
					`sys_subjects`.`id`,
					`sys_subjects`.`name`
				FROM
					`subjects_groups`,
					`sys_subjects`
				WHERE (
					`subjects_groups`.`id_subject_in_group` = `sys_subjects`.`id`
						AND `subjects_groups`.`id_subject`='{$next_id}'
				)
				ORDER BY
					`sys_subjects`.`priority`
			");
			for ($i = 0; $i < $groups->num_rows; $i++) {
				$next_id = $groups->cell[$i]['id_subject_in_group'];
				$group_list[] = array('id' => $groups->cell[$i]['id'],
											 				'name' => $groups->cell[$i]['name']);
			}

		} while ($groups->num_rows>0);
		
		$tmp = NULL;
		if (count($group_list) > 0) {
			foreach ($group_list as $key => $val) {
				$tmp .= " OR `subjects_role`.`id_subject`={$val['id']}";
			}
		}
		$rights = $this->sql->query("
			SELECT
				`subjects_role`.`id_role`,
				`subjects_role`.`id_subject`,
				`operation_rights`.`id_operation`,
				`operation`.`alias`,
				`operation`.`id_site_section`,
				`operation`.`description`,
				`sys_site_section`.`name`
			FROM
				`subjects_role`,
				`operation_rights`,
				`operation`,
				`sys_site_section`
			WHERE (
				`subjects_role`.`id_role` = `operation_rights`.`id_role` AND
				`operation`.`id` = `operation_rights`.`id_operation` AND
				`sys_site_section`.`id` = `operation`.`id_site_section` AND
				(`subjects_role`.`id_subject`={$this->info['id']}{$tmp})
			)
			GROUP BY
				`operation_rights`.`id_operation`
			ORDER BY
				`operation`.`id_site_section`");
		for ($i = 0; $i < $rights->num_rows; $i++)
			$right_list[] = array(
				'id_operation' => $rights->cell[$i]['id_operation'],
				'alias' => $rights->cell[$i]['alias'],
				'name' => $rights->cell[$i]['name'],
				'id_site_section' => $rights->cell[$i]['id_site_section'],
				'description' => $rights->cell[$i]['description']
			);
		return true;
	}

}
?>