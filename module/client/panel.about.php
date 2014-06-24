<?
class panel_about extends TPanelController {
	public function about() {
		$text = $this->core->sql->query("SELECT * FROM `dat_about` where `alias`='_' LIMIT 0,1");
		$parr = func::getParragrafs($text->cell[0]['text']);
		$imgs = func::getImagesURL($text->cell[0]['text']);
		$img = $imgs;
		if ($imgs) {
			$img_num = rand(0,count($imgs)-1);
			$img = array("src" => $imgs[$img_num][1],
						 "alt" => $imgs[$img_num][2],
						 "size" => @getimagesize($imgs[$img_num][1]));
		}
		return array("text" => $parr[0], "img" => $img);
	}
}
?>