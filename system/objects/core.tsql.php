<?
class TSelectObject {
	public $num_rows = 0;
	public $num_fields = 0;
	public $cell = array();
}

class TSQL extends TBase {
  private $sql_id = NULL;
	private $db_name = NULL;
	private $select_object = NULL;
	
	private $request_damp = array();
	
	public function __construct($sql_id, $db_name) {
		$this->select_object = new TSelectObject();
		$this->sql_id = $sql_id;
		$this->db_name = $db_name;
		$this->db_choose = false;
		return true;
	}
	
	public function query($query, $db_name = null) {
		if (!empty($db_name))
			$this->database_choose($db_name);
		$this->select_object->cell = array();
		@$res = mysql_query($query, $this->sql_id);
		if ($this->sql_is_error('SQL error', $this->error, $query)) {
			func::sqlTestError($this);
			return false;
		}
		if ($this->db_choose)
			$this->database_return();
		$this->select_object->num_rows = mysql_num_rows($res);
		$this->select_object->num_fields = mysql_num_fields($res);
		for($i = 0;$i < $this->select_object->num_rows; $i++) {
			$rowdata = mysql_fetch_assoc($res);
			foreach ($rowdata as $key => $val)
				$this->select_object->cell[$i][$key] = $val;
		}
		$this->request_damp[count($this->request_damp)] = clone $this->select_object;
		return $this->request_damp[count($this->request_damp)-1];
	}
	
	public function select($tables, $fields, $where = null, $group = null, $order = null, $limit = null, $db_name = null) {
		$query = "SELECT\n";
		$tables = is_array($tables)?$tables:array($tables);
		$fields = is_array($fields)?$fields:array($fields);
		$where = is_array($where)?$where:(!empty($where)?array($where):array());
		$group = is_array($group)?$group:(!empty($group)?array($group):array());
		$order = is_array($order)?$order:(!empty($order)?array($order):array());
		if (!function_exists("parsetable")) {
			function parsetable(&$tables, $data) {
				$result = preg_replace(
					array(
						"/^.(L|R)\./i",
						"/(|[ ]*):.*/i"
					),
					"",
					$tables[$data]
				);
				return $result;
			}
		}
		while($val = array_shift($fields)) {
			$til = !preg_match('/[*]/i',$val)?true:false;
			$val = preg_replace(
				'/[ \s\t]*>[ \s\t]*/i',
				' as ',
				!preg_match('/\$[0-9]{1,2}/',$val)?preg_replace(
					array(
						'/\(([a-z]*)\)/',
						'/^([a-z]*)/',
						'/\$\.([a-z]*\()/i',
						'/\$/'
					),
					array(
						'(\$.$1)',
						'\$.$1',
						'$1',
						'\$0'
					),
					$val,
					1
				):$val
			);
			$query.="\t{$val}".(count($fields)>0?",\n":"\nFROM\n\t`{$tables[0]}`");
		}
		if (count($tables)>1) {
			for ($i=1; $i<count($tables); $i++) {
				$join = !preg_match('/\$(L|R)/i',$tables[$i])?false:true;
				$query.=(!$join?',':'')."\n\t".preg_replace(
					array(
						'/\$L\./',
						'/\$R\./',
						'/(|[ ]*):(|[ ]*)(.*)/i',
						'/[ \n\s\t]*\&[ \n\s\t]*/i',
						'/[ \n\s\t]*\|[ \n\s\t]*/i'
					),
					array(
						"\tLEFT JOIN `",
						"\tRIGHT JOIN `",
						'` ON ($3)',
						' AND ',
						' OR '
					),
					!$join?"{$tables[$i]}":$tables[$i]
				);
			}
			$query.="\n";
		}
		if (($c=count($where))>0) {
			$query.="WHERE (\n";
			while($val = array_shift($where)) {
				$val = preg_replace(
					array(
						'/\&[ \n\s\t]*/i',
						'/\|[ \n\s\t]*/i'
					),
					array(
						'AND ',
						'OR '
					),
					(!preg_match('/(\&|\|)/i',$val) && $c-1!=count($where))?"& {$val}":$val
				);
				$query.="\t{$val}\n";
			}
			$query.=")\n";
		}
		if (count($group)>0) {
			$query.="\nGROUP BY \n";
			while($val = array_shift($group)) {
				$val = (count($group)>0?"{$val},":$val);
				$query.="\t{$val}\n";
			}
		}
		if (count($order)>0) {
			$query.="ORDER BY \n";
			while($val = array_shift($order)) {
				$val = (count($order)>0?"{$val},":$val);
				$query.="\t{$val}\n";
			}
		}
		if (!empty($limit))
			$query.="LIMIT {$limit}";
		
		$query = preg_replace(
			array(
				'/\$([0-9]{1,2})/ie',
				'/([^\. ()=<>,\n\s]*)\.([^\. ()=<>,\n\s]*)/i',
				'/`\*`/'
			),
			array(
				'parsetable($tables, $1)',
				'`$1`.`$2`',
				'*'
			),
			$query
		);
		
		return $this->query($query, $db_name);
	}
	
	private function database_choose($db_name) {
		@mysql_select_db($db_name, $this->sql_id);
		if ($this->sql_is_error('DataBase not exists', $this->error, "SELECT DATABASE {$db_name}")) {
			$this->connect_state = false;
			func::sqlTestError($this);
			return true;
		}
		@mysql_query("SET NAMES utf8", $this->sql_id);
		$this->connect_state = true;
		$this->db_choose = true;
		return true;
	}
	
	private function database_return() {
		@mysql_select_db($this->db_name, $this->sql_id);
		if ($this->sql_is_error('DataBase not exists', $this->error, "SELECT DATABASE {$this->db_name}")) {
			$this->connect_state = false;
			func::sqlTestError($this);
			return true;
		}
		@mysql_query("SET NAMES utf8", $this->sql_id);
		$this->connect_state = true;
		$this->db_choose = false;
		return true;
	}
 
	public function insert($table, $fields, $value) {
		$query = "INSERT INTO `{$table}` (";
		foreach($fields as $key => $val) {
			$query.="`{$val}`,";
		}
		$query.=') VALUES (';
		foreach($value as $key => $val) {
			$query.="'".mysql_escape_string($val)."',";
		}
		$query.=')';
		$query=preg_replace('/,\)/i',')',$query);
		@$result = mysql_query($query, $this->sql_id);
		if ($this->sql_is_error('SQL error', $this->error, $query)) {
			func::sqlTestError($this);
			return false;
		}
		$this->insert_log($table,'I',false);
		return $result;
	}
 
 	public function delete($table, $where) {
		$query = "DELETE FROM `{$table}` WHERE ({$where})";
		$this->insert_log($table,'D',$where);
		@$result = mysql_query($query, $this->sql_id);
		if ($this->sql_is_error('SQL error', $this->error, $query)) {
			func::sqlTestError($this);
			return false;
		}
		return $result;
	}

	public function update($table, $fields, $value, $where) {
		//print_r($this->get_columns($table));
		$query = "UPDATE `{$table}` SET ";
		foreach($fields as $key => $val) {
			$query.="`{$val}` = '".mysql_escape_string($value[$key])."',";
		}
		$query = substr($query,0,-1)." WHERE ({$where})";
		$this->insert_log($table,'U',$where);
		@$result = mysql_query($query, $this->sql_id);
		if ($this->sql_is_error('SQL error', $this->error, $query)) {
			func::sqlTestError($this);
			return false;
		}
		return $result;
 	}
 
	private function insert_log($table_name, $command, $where_block) {
		if ($command == 'U' ||
			$command == 'D') {
			if (is_string($where_block)) { 
				$num_match = preg_match_all("/`[a-z]{2,5}_([a-z_]+)`[ ]{0,3}=[ ]{0,3}'([a-z_0-9]+)'/i",$where_block,$match,PREG_SET_ORDER);
				for ($i = 1; $i <= $num_match; $i++) {
					if ($match[0][$i*2-1] == 'key')
						$record_id = $match[0][$i*2];
					else
						$record_id = '0';
					mysql_query("
						INSERT INTO `sys_tsqllog` (`table_name`, `record_id`, `command`, `datetime`) VALUES ('{$table_name}', '{$record_id}', '$command', NOW())", $this->sql_id);
					if ($this->sql_is_error('SQL error', $this->error, 'SYSTEM ERROR'))
						return false;
				}
			} else {
				mysql_query("INSERT INTO `sys_tsqllog` (`table_name`, `record_id`, `command`, `datetime`) VALUES ('{$table_name}', '{$record_id}', '$command', NOW())", $this->sql_id);
				if ($this->sql_is_error('SQL error', $this->error, 'SYSTEM ERROR'))
					return false;
			}
		} elseif ($command == 'I') {
			$record_id = $this->get_next_auto_increment($this->db_name,$table_name);
			mysql_query("INSERT INTO `sys_tsqllog` (`table_name`, `record_id`, `command`, `datetime`) VALUES ('{$table_name}', '{$record_id}', '$command', NOW())", $this->sql_id);
			if ($this->sql_is_error('SQL error', $this->error, 'SYSTEM ERROR'))
				return false;
		}
		return true;
	}
 
	public function get_next_auto_increment($table) { 
		$query = "SHOW TABLE STATUS FROM `{$this->db_name}` LIKE '{$table}'"; 
		$result = mysql_query($query, $this->sql_id); 
		if ($this->sql_is_error('SQL error', $this->error, $query)) {
			func::sqlTestError($this);
			return false;
		}
		$row = mysql_fetch_assoc($result); 
		return $row['Auto_increment']; 
	}
	
	public function get_columns($table) {
		$result = mysql_query("SHOW COLUMNS FROM `{$table}`");
		if (!$result)
			return false;
		else
		if (mysql_num_rows($result) > 0) {
			$list = array();
			while ($row = mysql_fetch_assoc($result))
				array_push($list, $row);
			return $list;
		}
	}
	
	public function get_num_rows($table, $where = NULL, $key = NULL) {
		if ($key == NULL) {
			$tmp = $this->get_columns($table);
			$key = $tmp[0]['Field'];
			unset($tmp);
		}
		$where = empty($where)?'1':$where;
		$query = "SELECT COUNT(`{$key}`) as `count` FROM `{$table}` WHERE ({$where})";
		$result = mysql_query($query);
		if ($this->sql_is_error('SQL error', $this->error, $query)) {
			func::sqlTestError($this);
			return false;
		}
		$row = mysql_fetch_assoc($result); 
		return $row['count'];
	}
	
	public function get_max_value($table, $field, $where = '1') {
		$query = "SELECT MAX({$field}) as `max` FROM `{$table}` WHERE ({$where})";
		$result = mysql_query($query);
		if ($this->sql_is_error('SQL error', $this->error, $query)) {
			func::sqlTestError($this);
			return false;
		}
		$row = mysql_fetch_assoc($result); 
		return $row['max'];
	}
	
	public function get_min_value($table, $field, $where = '1') {
		$query = "SELECT MIN({$field}) as `min` FROM `{$table}` WHERE ({$where})";
		$result = mysql_query($query);
		if ($this->sql_is_error('SQL error', $this->error, $query)) {
			func::sqlTestError($this);
			return false;
		}
		$row = mysql_fetch_assoc($result); 
		return $row['min'];
	}
	
	public function table_exists($table) {
		$tables = $this->get_tables();
		return in_array($table,$tables);
	}
	
	public function get_tables() {
		$ret = array();
		$r = mysql_query("SHOW TABLES");
		if (mysql_num_rows($r)>0) {
			while($row = mysql_fetch_array($r, MYSQL_NUM)) {
				$ret[] = $row[0];
			}
		}
		return $ret;
	}
	
	public function __destruct() {
		for ($i=0; $i<count($this->request_damp); $i++)
			unset($this->request_damp[$i]);
	}
}
?>