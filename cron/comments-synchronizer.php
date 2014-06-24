<?
set_time_limit(1000);

$PATH = preg_replace('#(.*\/httpd\/).*$#','$1',$_SERVER['SCRIPT_FILENAME']);
include_once("{$PATH}system/core.php");
$core = new TCore(NULL);

$SiteAPIKey = "[KEY1]";
$AcntAPIKey = "[KEY2]";

class Cackle {
	private $SiteAPIKey;
	private $AcntAPIKey;
	
	public function cackle($SiteAPIKey, $AcntAPIKey) {
		$this->SiteAPIKey = $SiteAPIKey;
		$this->AcntAPIKey = $AcntAPIKey;
	}
	
	public function get_update($url) {
		$result = $this->cackle_json_decodes($this->request($url));
		return $result;
	}
	
	private function request($url) {
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL,$url);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
		curl_setopt ($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		
		return $result;
	}
	
	private function cackle_json_decodes($response){
		$response_without_jquery = str_replace('jQuery(', '', $response);
		$response = str_replace(');', '', $response_without_jquery);
		$obj = json_decode($response,true);
		return $obj;
	}
}

$cackle = new Cackle($SiteAPIKey, $AcntAPIKey); //APPROVED
$update = $cackle->get_update("cackle.me/api/comment/list?siteApiKey={$SiteAPIKey}&accountApiKey={$AcntAPIKey}".(($id = $core->sql->get_max_value('sys_comments', 'id')) == 0?'':"&id={$id}"));

if (is_array($update) && count($update)>0) {
	$fields = $core->sql->get_columns('sys_comments');
	$length = count($fields);
	for ($i=0; $i<$length; $i++) {
		$item = array_shift($fields);
		array_push($fields, $item['Field']);
	}
	
	while ($item = array_shift($update['comments'])) {
		$values = array();
		for ($i=0; $i<count($fields); $i++) {
			$field = explode('_',$fields[$i]);
			$value = (count($field)==1)?$item[$field[0]]:$item[$field[0]][$field[1]];
			if ($field[0] == 'created')
				$value = strftime("%Y-%m-%d %H:%M:%S", $value/1000);
			array_push($values, $value);
		}
		$core->sql->insert('sys_comments', $fields, $values);
	}
}
?>