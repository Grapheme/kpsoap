<?
class main_admin extends TAdminController {
	public function main($code_name){
		$this->content = $this->load_module($code_name);
		return $this->content;
	}
}
?>