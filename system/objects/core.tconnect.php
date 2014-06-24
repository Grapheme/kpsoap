<?

interface iTConnect {
	public function __construct($db_parram);
	public function __destruct();
	public function get_state();
}

class TConnect extends TBase implements iTConnect {
	private $db_parram = NULL;
	public $id = NULL;
	protected $connect_state = false;
	
	public function __construct($db_parram) {
		
		@$this->id = mysql_connect($db_parram->server, $db_parram->login, $db_parram->password);
		if ($this->sql_is_error('SQL connect error', $this->error)) {
			$this->connect_state = false;
			return true;
		}
		@mysql_select_db($db_parram->db_name, $this->id);
		if ($this->sql_is_error('DataBase not exists', $this->error)) {
			$this->connect_state = false;
			return true;
		}
		@mysql_query("SET NAMES utf8", $this->id);
		$this->connect_state = true;
		return true;
	}
	
	public function __destruct() {
		@mysql_close($this->id);
		$this->connect_state = false;		
	}
		
	public function get_state() {
		return $this->connect_state;
	}
}
?>