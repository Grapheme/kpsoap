<?
interface iTBase {
	public function __call($methid, $arg);
	public function get_error();
	public function sql_is_error($head, &$p_error_content);
}

abstract class TBase implements iTBase {
	protected $error = NULL;
	
	public function __call($methid, $arg) {
		$this->error = array('Error', "Unable methid \"{$methid}\"");
		func::methodTestError($this);
		exit;
	}

	public function get_error() {
		return $this->error;
	}
	
	public function sql_is_error($head, &$p_error_content, $query = '') {
		if (mysql_errno()) {
			$p_error_content = array($head, mysql_error(), $query);
			return true;
		}	else
			return false;
	}
}
?>