<?
abstract class TPanelController {
	protected $core = NULL;
	protected $module = NULL;
	protected $site_section_alias = NULL;

	final public function __construct(&$core, $site_section_alias, $module) {
		$this->core = $core;
		$this->module = $module;
		$this->site_section_alias = $site_section_alias;
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
			return $this->$module($module.(!empty($this->page)?"_{$this->page}":NULL).(!empty($this->subpage)?"_{$this->subpage}":NULL));
		} while(false);	
		return false;
	}
}
?>