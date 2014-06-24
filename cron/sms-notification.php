<?
date_default_timezone_set('Europe/Moscow');
define('DIR',preg_replace('#(.*\/httpd\/).*$#','$1',$_SERVER['SCRIPT_FILENAME']));

require_once DIR.'plugins/sms24x7.php';
include_once(DIR.'system/core.php');

$hour = date('H');
$phones	= array("79034300210","79034064690","79185447788","79612722100");

if ($hour>=9 && $hour<=22) {
	$core = new TCore(NULL);
	
	$order = $core->sql->select("SELECT * FROM `dat_catalog_order` WHERE (`sms_notification` = 0)");
	func::sqlTestError($core->sql);
	
	if ($order->num_rows > 0) {	
		$core->sql->update("dat_catalog_order", array('sms_notification'), array('1'), "`sms_notification`='0'");
		func::sqlTestError($core->sql);
	
		$verb = function($ret) {
			return is_null($ret)?"связи с API":$ret[0];
		};
		$ret = smsapi_login("[LOGIN]", "[PASSWORD]");
		if(is_null($ret) || $ret[0] != 0){
			die("Невозможно представиться системе: ошибка ".$verb($ret)."\n");
		}
		$cookie = $ret[1];
		foreach($phones as $P) {
			$ret = smsapi_push_msg($cookie, $P, "Поступило {$order->num_rows} новых заказа(ов).", array("sender_name"=>"StyleWoods"));
			if(is_null($ret) || $ret[0] != 0){
				die("Невозможно отправить сообщение: ошибка ".$verb($ret)."\n");
			}
		}	
	}
	
	$order = $core->sql->select("SELECT * FROM `dat_catalog_order` WHERE (`payment` = 1)");
	func::sqlTestError($core->sql);
	
	if ($order->num_rows > 0) {
		$core->sql->update("dat_catalog_order", array('payment'), array('10'), "`payment`='1'");
		func::sqlTestError($core->sql);
		
		$verb = function($ret) {
			return is_null($ret)?"связи с API":$ret[0];
		};
		$ret = smsapi_login("[LOGIN]", "[PASSWORD]");
		if(is_null($ret) || $ret[0] != 0){
			die("Невозможно представиться системе: ошибка ".$verb($ret)."\n");
		}
		$cookie = $ret[1];
		foreach($phones as $P) {
			$ret = smsapi_push_msg($cookie, $P, "Статус {$order->num_rows} заказа(ов) изменился.", array("sender_name"=>"StyleWoods"));
			if(is_null($ret) || $ret[0] != 0){
				die("Невозможно отправить сообщение: ошибка ".$verb($ret)."\n");
			}
		}	
	}
}

?>