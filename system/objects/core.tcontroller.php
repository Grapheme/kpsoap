<?
abstract class TController {
	protected $core = NULL;
	protected $module = NULL;
	protected $page = NULL;
	protected $subpage = NULL;
	protected $pagelevel = 0;
	protected $is_admin_access = false;
	protected $is_client_access = false;
	protected $content = NULL;
	protected $cookie = NULL;
	
	public final function __construct(&$core) {
		$this->core = $core;
		if (!isset($_GET['admin']))
			$this->module = empty($_GET['moduls'])?'index':$_GET['moduls'];
		else
			$this->module = empty($_GET['moduls'])?'main':$_GET['moduls'];
		$this->page = empty($_GET['page'])?NULL:$_GET['page'];
		$this->subpage = empty($_GET['subpage'])?NULL:$_GET['subpage'];
		$this->pagelevel = abs((int)(bool)$this->page) + abs((int)(bool)$this->subpage);
		
		if (!defined("action"))
			define('action', !isset($_GET['action'])?(!isset($_POST['action'])?NULL:$_POST['action']):$_GET['action']);
		if (!defined("id"))
			define('id', !isset($_GET['id'])?(!isset($_POST['id'])?-1:$_POST['id']):$_GET['id']);
		if (!defined("pg")) {
			if (isset($_GET['admin'])) {
				if (isset($_GET['pg']) && @$_GET['pg']==0) {
					$_SESSION["buffer_page_{$_GET['moduls']}"] = 0;
					header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
				}
				if (!isset($_GET['pg']) && !isset($_POST['pg']))
					$_POST['pg'] = isset($_SESSION["buffer_page_{$_GET['moduls']}"])?$_SESSION["buffer_page_{$_GET['moduls']}"]:0;
			}
			define('pg', !isset($_GET['pg'])?(!isset($_POST['pg'])?0:$_POST['pg']):$_GET['pg']);
			$_SESSION["buffer_page_{$_GET['moduls']}"] = pg;
		}
		if (!defined("row_out_length"))
			define('row_out_length', 20);
		if (!defined("row_out_length_2"))
			define('row_out_length_2', 40);
		if (!defined("row_out_length_3"))
			define('row_out_length_3', 80);
		if (!defined("row_out_length_60"))
			define('row_out_length_60', 60);
		
		if (action == 'cookie') {
			foreach($_POST as $key => $val) {
				$_SESSION["cookie_{$key}"] = $val;
			}
			exit;
		}
		
		$this->cookie = Array();
		foreach($_SESSION as $key => $val) {
			if (preg_match('#^cookie_(.*)#i', $key, $key))
				$this->cookie[$key[1]] = $val;
		}
	}
	
	private function is_access_action() {
		if (isset($this->access)) { 
			if ($this->access == 'public')
				return true;
		}
		$access = false;
		if ($this->module=='main')
			$this->core->subjects->right_list[]['alias'] = 'main_viewing';
		foreach ($this->core->subjects->right_list as $key => $val) {
			if (preg_match("#^{$this->module}(.*)".action."(.*)$#i",$val['alias'].'_main')) {
				$access = true;
				break;
			}
		}
		if (!$access)
			return false;
		return true;
	}
	
	public final function buildPage() {
		$module = &$this->module;
		do{
			if (substr($module, 0, 1) == '_' or empty($module)) 
				break;
			if (method_exists(__CLASS__, $module))
				break;
			if (!method_exists($this, $module))
				break;
			$method = new ReflectionMethod($this, $module);
			if (!$method->isPublic())
				break;
			if (isset($_GET['admin']) && !$this->core->subjects->is_admin_access)
				return $this->noaccess($module.(!empty($this->page)?"_{$this->page}":NULL).(!empty($this->subpage)?"_{$this->subpage}":NULL));
			if ($this->core->subjects->is_client_access) {
				if ($this->is_access_action())
					return $this->$module($module.(!empty($this->page)?"_{$this->page}":NULL).(!empty($this->subpage)?"_{$this->subpage}":NULL));
				else
					return $this->noaccess($module.(!empty($this->page)?"_{$this->page}":NULL).(!empty($this->subpage)?"_{$this->subpage}":NULL));
			} else
				return $this->noaccess($module.(!empty($this->page)?"_{$this->page}":NULL).(!empty($this->subpage)?"_{$this->subpage}":NULL));
				
		} while(false);	
		return $this->error404($module.(!empty($this->page)?"_{$this->page}":NULL).(!empty($this->subpage)?"_{$this->subpage}":NULL));
	}
	
	abstract public function noaccess($code_name);

	abstract public function error404($code_name);
}
?>