<?
include_once('../system/core.php');
$core = new TCore(NULL);
?>
<?='<?'?>xml version="1.0" encoding="UTF-8"<?='?>'?>

<banners time="5000" skin="/client/imgs/other/skin.png|14x14x5|Cx410">
<?
	$list = $core->sql->query("SELECT * FROM `dat_banners` WHERE `photo`<>'' ORDER BY `priority` DESC, rand()");
	func::sqlTestError($core->sql);
	
	if ($list->num_rows>0) {
		for ($i=0; $row = array_shift($list->cell); $i++) {
			$tmp = preg_replace('#;.*#','',$row['photo']);
			$row['photo'] = "/img-dbimage/banners/".preg_replace('#\.([A-z]{3}$)#','-$1',$tmp)."-750c386-050050-87.jpg";
?>
	<layer background="<?=$row['photo']?>" url="<?=empty($row['url'])?'javascript:void(0)':$row['url']?>" active="0:0-0:0">
		<?=$row['html']?>
	</layer>
<?
		}
	}
?>
</banners>