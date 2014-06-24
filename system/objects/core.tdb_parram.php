<?
class TDb_Parram {
	public $server = 'localhost';
	public $login = 'root';
	public $password = '';
	public $db_name = 'kpsoap';
	
	public function __construct($server = NULL, $login = NULL, $password = NULL, $db_name = NULL) {
		$this->server = !empty($server)?$server:$this->server;
		$this->login = !empty($login)?$login:$this->login;
		$this->password = !empty($password)?$password:$this->password;
		$this->db_name = !empty($db_name)?$db_name:$this->db_name;
	}
}
?>
