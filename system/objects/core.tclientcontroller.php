<?
class TClientController extends TController {

	final public function init() {
		if (action != NULL) {
			$method = action;
			$this->$method();
		} else
			$this->base();
	}
	
	final public function load_module($code_name) {
		$this->content['headers'] = $this->core->get_headers($code_name);
		$this->content['panels'] = $this->core->get_panels($code_name);
		$this->content['contact'] = $this->core->get_contact();
		$this->content['comments'] = $this->core->get_comments();
		$this->content['page_tpl'] = $this->core->get_templates($this->module, $this->pagelevel);
		$this->content['cookie'] = $this->cookie;
		return $this->content;
	}

	final public function noaccess($code_name) {
		$this->content['contact'] = $this->core->get_contact();
		$this->content['headers'] = $this->core->get_headers($code_name, 1);
		$this->content['page_tpl'] = "module.noaccess.tpl";
		return $this->content;
	}
	
	final public function error404($code_name) {
		$this->content['contact'] = $this->core->get_contact();
		$this->content['headers'] = $this->core->get_headers($code_name, 2);
		$this->content['page_tpl'] = "module.error404.tpl";
		return $this->content;
	}
	
	public function __destruct() {
		
	}
	
}
?>