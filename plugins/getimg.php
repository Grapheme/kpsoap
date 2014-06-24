<?
/*foreach ($_GET as $key => $val)
	echo "GET[{$key}] = {$val}<br />";
exit;*/

/* { Загрузка конфигураций (если есть)} */
$mod = !empty($_GET['mod']) ? trim($_GET['mod'],'-') : 'default';

define('cfg',"getimg/{$mod}/config.ini");
define('main','getimg/');
define('imgpath','../data/');

function load_config() { // Загрузчик конфигураций
	$config = array();
	if (file_exists(cfg)) {
		$tmp = parse_ini_file(cfg,true);
		foreach($tmp as $sectionkey => $sectionval)
			foreach($sectionval as $configkey => $configval)
				if (preg_match('/ /',$configval)) {
					$new_config = preg_split('/ /',$configval);
					foreach($new_config as $key => $value)
						$config[$sectionkey][$configkey][$key]=$value;
				} else {
					$config[$sectionkey][$configkey] = $configval;
				}
	}
	if (count($config) != 0)
		return $config;
	else
		return false;
}
/* } */

/* { Установка свойств */
$errmes	 = NULL;
$src	 = isset($_GET['src']) ? imgpath.$_GET['src'] : NULL;
$bsrc	 = isset($_GET['bsrc']) ? preg_split('/;/',$_GET['bsrc']) : NULL;
if (isset($_GET['size'])) {
	if (preg_match('/([0-9]{1,4})(x|c|v)([0-9]{1,4})/', $_GET['size'], $size)) {
		$width  = $size[1];
		$vmode 	= $size[2];
		$height = $size[3];
	}
}
$vector  = !empty($_GET['vector']) ? trim($_GET['vector'],'-') : ($vmode=='c'?'050030':'050050100');
$bgcolor = (isset($_GET['bgcolor']) ? '0x'.$_GET['bgcolor']	: 0xFFFFFF)+0x000000;
$border  = (empty($_GET['border'])?array('size'=>'0','color'=>0xFFFFFF):(preg_match('/-([0-9]*)x([A-z0-9]*)/i', $_GET['border'], $tmp)?array('size'=>$tmp[1],'color'=>('0x'.$tmp[2])+0x000000):array('size'=>'0','color'=>0xFFFFFF)));
$quality = isset($_GET['quality']) ? $_GET['quality'] : 100;
$format  = (!empty($_GET['format']) && preg_match('/(|s)(jpg|png|gif)/i',$_GET['format'], $tmp))?array('method'=>empty($tmp[1])?'f':$tmp[1],'type'=>$tmp[2]):array('method'=>'f','type'=>'jpg');

$flag = NULL;
/* } */

/* { Загружает картинки для трансформации*/
if ($bsrc != NULL) { // Если из БД
	include_once($bsrc[0]);
	$connection=mysql_connect($dbserver,$dblogin,$dbpassword,$dbname) or die(mysql_error());
	$db = mysql_select_db($dbname, $connection);
	mysql_query("SET NAMES cp1251", $connection);
	if (mysql_num_rows($result = mysql_query("SELECT `{$bsrc[1]}` FROM `{$bsrc[2]}` WHERE `{$bsrc[3]}`='{$bsrc[4]}'",$connection)) == 1) {
		$result_arr = mysql_fetch_array($result);
		$bsrc = $result_arr[$bsrc[1]];
	} else
		$errmes.= 'Ошибка в источнике'; // Ненверный алиас
} else { // Иначе из файла
	(preg_match("#(\.[A-z]{1,4})$#i", $src, $exf))?$exf['exif']=($exf['lower']=strtolower($exf[1])).';'.($exf['upper']=strtoupper($exf[1])):false;
	if (file_exists($src = preg_replace("#(\.[A-z]{1,4})$#i", $exf['lower'], $src)));
	else
	if (file_exists($src = preg_replace("#(\.[A-z]{1,4})$#i", $exf['upper'], $src)));
	else
	if (preg_match('/jpg/i',$src)) {
		$exf['lower'] = '.jpeg';
		$exf['upper'] = '.JPEG';
		if (file_exists($src = preg_replace("#(\.[A-z]{1,4})$#i", $exf['lower'], $src)));
		else
		if (file_exists($src = preg_replace("#(\.[A-z]{1,4})$#i", $exf['upper'], $src)));
		else
			$errmes.= !file_exists($src) ? !empty($src) ? 'Файл \''.$src.'\' не найден<br>' : 'Источник не определён<br>' : NULL; // Файл отсутствует
	} else
		$errmes.= !file_exists($src) ? !empty($src) ? 'Файл \''.$src.'\' не найден<br>' : 'Источник не определён<br>' : NULL; // Файл отсутствует
}
/* } */

$errmes.= (empty($width) && $width!=0) ? 'Результирующая ширина не определена<br>' : NULL;  // если не задана ширина
$errmes.= (empty($height) && $height!=0) ? 'Результирующая высота не определена<br>' : NULL; // если не задана высота

$autosize = ($height == 0)?'height':($width == 0 ? 'width' : NULL); // если одна из сторон автовычисление, проверяем какая и устанавливаем флаг

$config = load_config(); // получение конфигураций

if (empty($errmes) && $format['method'] == 'f') { // если нет ошибки, устанавливаем MIME тип вывода
	$mime = array('jpg' => IMAGETYPE_JPEG,
				  'png' => IMAGETYPE_PNG,
				  'gif' => IMAGETYPE_GIF);
	header("Content-type: " . image_type_to_mime_type($mime[$format['type']]));
} else
if (empty($errmes) && $format['method'] == 's') {
	header('Content-type: text/html');
} else { // Иначе вывод ошибки
	header('Content-type: text/html');
	echo $errmes;
	exit();
}

/* Формируем имя КЭШ файла и проверяем есть ли ф наличии. Если нет создаем*/
$file = preg_replace('#^.*/([^/]*)$#','\\1',$src)."-cache-{$width}{$vmode}{$height}-{$vector}-{$format['type']}-{$border['size']}-{$border['color']}-{$mod}-{$quality}";
if (!file_exists("../cache/getimg/{$file}.ch")) {
	if ($bsrc != NULL) { // если из БД
		$isrc = imagecreatefromstring($bsrc); // Создает изображение из строки полученной от БД
		$size = array (imagesx($isrc), imagesy($isrc)); // Получает размеры
	} else { // Иначе из файла
		$size = getimagesize($src); // Получает информацию о картинке
		$icfunc = 'imagecreatefrom'.strtolower(preg_replace('/\C+\//','',$size['mime'])); // Создает изображение заданного размера из указанного формата и загружает информацию из файла. Используется строковое формирование функции
		$isrc = $icfunc($src); // выполнение сгенерированной функции выше
	}
	
	if ($autosize == 'height')
		$height = ceil($size[1] / ($size[0] / $width)); // вычисление автовысоты по пропорциям и известной ширине
	else if ($autosize == 'width')
		$width = ceil($size[0] / ($size[1] / $height)); // вычисление автоширины по пропорциям и известной высоте
	
	$x_ratio = $width / $size[0];
	$y_ratio = $height / $size[1];
	
	$use_x_ratio = ($x_ratio == ($ratio = min($x_ratio, $y_ratio)));
	
	$idest = imagecreatetruecolor($width, $height);
	imagealphablending($idest, true);
	
	if ($border['size']>=0)
		imagefill($idest, 0, 0, $border['color']);
	
	if ($autosize == 'height' || $autosize == 'width') { // ресэмплинг если один из размеров вычислен автоматически
		/*if (($width*$height)/($size[0]*$size[1])>1.6) {
			$width = round($size[0]*1.6);
			$height = round($size[1]*1.6);
			imagedestroy($idest);
			$idest = imagecreatetruecolor($width, $height);
		}*/
		imagecopyresampled($idest, $isrc, $border['size'], $border['size'], 0, 0, $width-($border['size']*2), $height-($border['size']*2), $size[0], $size[1]);
	} else
	if ($autosize != 'height' && $autosize != 'width' && $vmode=='x') { // ресэмплинг если оба значения заданы. В этом случае происходит ресыэплинг типа contaner
		$new_width	= $use_x_ratio  ? $width  : floor($size[0] * $ratio);
		$new_height	= !$use_x_ratio ? $height : floor($size[1] * $ratio);
		$new_left	= $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
		$new_top	= !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);
		$brd_x1		= $new_left;
		$brd_y1		= $new_top;
		$brd_x2		= $new_top>0?$new_width-$new_left-1:$new_width+$new_left-1;
		$brd_y2		= $new_left>0?$new_height-$new_top-1:$new_height+$new_top-1;
		
		//imagefill($idest, 0, 0, $bgcolor);
		imagecopyresampled($idest, $isrc, $new_left+$border['size'], $new_top+$border['size'], 0, 0, $new_width-($border['size']*2), $new_height-($border['size']*2), $size[0], $size[1]);
	} else
	if ($autosize != 'height' && $autosize != 'width' && $vmode=='c') { // ресэмплинг если оба значения заданы. В этом случае происходит ресыэплинг типа cover
		$x = (int)substr($vector, 0, 3) / 100;
		$y = (int)substr($vector, 3, 3) / 100;
		$ratio = $use_x_ratio ? $height/$size[1] : $width/$size[0];
		$nheight = $height/$ratio;
		$nwidth = $width/$ratio;
		imagecopyresampled($idest, $isrc, 0, 0, round(($size[0] - $nwidth)*$x), round(($size[1] - $nheight)*$y), $width, $height, $nwidth, $nheight);
	} else
	if ($autosize != 'height' && $autosize != 'width' && $vmode=='v') { // ресэмплинг если оба значения заданы. В этом случае происходит ресыэплинг типа vector
		$x = ($tmp = ((int)substr($vector, 0, 3) / 100)) > 1 ? 1 : $tmp;
		$y = ($tmp = ((int)substr($vector, 3, 3) / 100)) > 1 ? 1 : $tmp;
		$scale = ($tmp = ((int)substr($vector, 6, 4) / 100)) > 1 ? 1 : $tmp;
		$ratio = $use_x_ratio ? $height/$size[1] : $width/$size[0];
		$nheight = $height/$ratio*$scale;
		$nwidth = $width/$ratio*$scale;
		imagecopyresampled($idest, $isrc, 0, 0, round(($size[0] - $nwidth)*$x), round(($size[1] - $nheight)*$y), $width, $height, $nwidth, $nheight);
	}
	
	/* { применение конфигураций (пост обработка) если конфигурации заданы*/
	if (!empty($config)) {
		foreach($config as $sectionkey => $sectionval) {
			if (preg_match('/water_mark_[0-9]{1,3}/i',$sectionkey)) {
				$attribut = array('src' => false, 'align' => array('left', 'top'), 'margin' => array(0, 0), 'transparent' => 100);
				foreach($sectionval as $configkey => $configval)
					$attribut[$configkey] = $configval;
				if ($attribut['src'] !== false) {
					if (file_exists(main."{$mod}/".$attribut['src'])) {
						$mark = imagecreatefrompng(main."{$mod}/".$attribut['src']);
						imagealphablending($mark, true);
						$attribut['size'] = array(0 => imagesx($mark), 1 => imagesy($mark));
						$markleft = $attribut['align'][0] == 'left' ? $attribut['margin'][0] : ($attribut['align'][0] == 'center' ? ceil($width / 2 - $attribut['size'][0] / 2) + $attribut['margin'][0] : ($attribut['align'][0] == 'right' ? $width - $attribut['size'][0] - $attribut['margin'][0] : 0));
						$marktop = $attribut['align'][1] == 'top' ? $attribut['margin'][1] : ($attribut['align'][1] == 'center' ? ceil($height / 2 - $attribut['size'][1] / 2) + $attribut['margin'][1] : ($attribut['align'][1] == 'bottom' ? $height - $attribut['size'][1] - $attribut['margin'][1] : 0));
						if ($attribut['transparent'] == 'png24')
							imagecopyresampled($idest,$mark,$markleft,$marktop,0,0,$attribut['size'][0],$attribut['size'][1],$attribut['size'][0],$attribut['size'][1]);
						else
							imagecopymerge($idest,$mark,$markleft,$marktop,0,0,$attribut['size'][0],$attribut['size'][1],$attribut['transparent']);
						imagedestroy($mark);
					}
				}
			}
		}
	}
	/* } */
	
	/* { вывод и сохранение кэша */
	imageinterlace($idest, true);
	if ($format['type']=='jpg') {
		imagejpeg($idest,"../cache/getimg/{$file}.ch",$quality);
	} else {
		$outfunc='image'.$format['type'];
		$outfunc($idest,"../cache/getimg/{$file}.ch");
	}
	/* } */
}
if ($format['method'] == 'f') {
	echo file_get_contents("../cache/getimg/{$file}.ch");
} else
if ($format['method'] == 's') {
	echo "data:image/{$format['type']};base64,".base64_encode(file_get_contents("../cache/getimg/{$file}.ch"));
}
if (isset($isrc) && isset($idest)) {
	imagedestroy($isrc);
	imagedestroy($idest);
}
?>