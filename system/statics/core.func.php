<?
interface iSpec_Char {
	static public function sc_html($string);
	static public function sc_htmltags($string);
}

interface iUrl {
	static public function url_delget($string);
}

interface iImage {
	static public function imageDelUrlRelative($string);
	static public function imageGetSizeInfo($url);
	static public function imageGetSizeQuadRestric($url, $max);
	static public function imageGetSizeRestric($url, $width, $height);
	static public function imageLoadSizeRestrict($data, $module, $alias, $width, $height, $qality);
	static public function imageSave($data, $field, $modul, $alias = NULL);
	static public function imageDelete($data, $modul, $alias = NULL);
	static public function imagePhotoUploaderLoad($data, $field, $module, $alias = NULL);
	static public function imagePhotoUploaderSave($field, $module, $alias = NULL);
	static public function imageParseSizeRestrict($data, $module, $alias, $width, $height, $qality = 85);
}

interface iFile {
	static public function GetFileExt($fileName);
	static public function RandomPref($bytes);
	static public function GetUploadFileName($fileName);
}

interface iSubjects {
	static public function sbj_getFullName($name);
}

interface iDate {
	static public function dateGetMonthName($num);
	static public function dateGetWeekDay($day,$month,$year);
	static public function dateGetWeekFullDay($day, $month, $year);
	static public function dateGetDate($datetime);
	static public function dateGetTime($datetime);
}

interface iTextTransform {
	static public function subText($text, $length);
	static public function getParragrafs($text);
	static public function getImagesURL($text);
	static public function getImages($text, $count);
	static public function getShortTagText($text);
	static public function delShortTagText($text);
	static public function strToLower($text);
	static public function packTags($text);
	static public function extractTags($text);
	static public function convertTagToURI($tag);
	static public function articleCompress($article);
}

interface iError {
	static public function sqlTestError($object);
	static public function methodTestError($object);
}

interface iSort {
	static public function absArrayCountSort($elem1, $elem2);
	static public function descArrayCountSort($elem1, $elem2);
}

interface iMedia {
	static public function correctMediaSize($text, $width);
	static public function setMaxImageSize($text, $width, $height, $parram = null, $domain = null);
}

interface iNumber {
	static public function numberToRoman($value);
}

interface iHttp {
	static public function httpRequest($url);
}

class func extends TBase implements iSpec_Char,
									iUrl,
									iFile,
									iSubjects,
									iDate,
									iTextTransform,
									iImage,
									iError,
									iSort,
									iMedia,
									iNumber,
									iHttp {

	#iHtml_Spec_Char
	static public function sc_html($string) {
		return htmlspecialchars(urldecode($string),ENT_QUOTES);
	}
	
	static public function sc_htmltags($string) {
		$in =  array('/&amp;/i','/&lt;/i','/&gt;/i','/&quot;/i','/&#039;/i');
		$out = array('&'	  ,'<'		,'>'	  ,'\"'	   	  ,"\'");
		return preg_replace($in,$out,htmlspecialchars(urldecode($string),ENT_QUOTES));
	}
	#

	#iUrl
	static public function url_delget($string) {
		return preg_replace('#(/:.*)#i','/',$string);
	}
	#
	
	#iImage
	static public function imageDelUrlRelative($string) {
		return preg_replace('#(\.\./)+data/#i','/data/',$string);
	}
	
	static public function imageGetSizeInfo($url) {
		//$base = preg_replace(array('/.*httpd\//i', '/[^\/]*\//i', '/[^\/]*$/i'), array('', '../', ''), $_SERVER['SCRIPT_FILENAME']);
		$base = "{$_SERVER['DOCUMENT_ROOT']}/";
		$url = preg_match('#^/data/#',$url)?preg_replace('#^/data/#',"http://{$_SERVER['SERVER_NAME']}/data/",$url):$url;
		$file = preg_replace('#^.*/([^/]*)$#','\\1',$url);
		if (!file_exists("{$base}cache/getimagesize/{$file}.ch")) {
			if ($cache = getimagesize($url)) {
				$data = '';
				foreach($cache as $key => $val)
					$data.="{$key}:{$val};";
				file_put_contents("{$base}cache/getimagesize/{$file}.ch", $data);
			}
		} else {
			$data = file_get_contents("{$base}cache/getimagesize/{$file}.ch");
			$tmp = preg_split('#[;]#',$data,0,PREG_SPLIT_NO_EMPTY);
			foreach($tmp as $key => $val) {
				$keyval = preg_split('#[:]#',$val,0,PREG_SPLIT_NO_EMPTY);
				$cache[$keyval[0]] = $keyval[1];
			}
		}
		return $cache;
	}
	
	static public function imageGetSizeQuadRestric($url, $max) {
		$size = func::imageGetSizeInfo($url);
		if ($size[0] > $size[1]) {
			if ($size[0] > $max) {
				$size[0] = $max;
				$size[1] = 0;
			}
		} else {
			if ($size[1] > $max) {
				$size[1] = $max;
				$size[0] = 0;
			}
		}
		return $size;
	}
	
	static public function imageGetSizeRestric($url, $width, $height) {
		$size = func::imageGetSizeInfo($url);
		$size['src'] = array (
			'width' => $size[0],
			'height' => $size[1]
		);
		if ($width == 0) {
			if ($size[1] > $height) {
				$size[0] = round($height/$size[1]*$size[0]);
				$size[1] = $height;
			}
		} else
		if ($height == 0) {
			if ($size[0] > $width) {
				$size[1] = round($width/$size[0]*$size[1]);
				$size[0] = $width;
			}
		} else {
			$size[0] = $width;
			$size[1] = $height;
		}
		$size[3] = preg_replace('#width="([0-9]*)" height="([0-9]*)"#i',"width=\"{$size[0]}\" height=\"{$size[1]}\"", $size[3]);
		return $size;
	}
	
	static public function imageLoadSizeRestrict($data, $module, $alias, $width, $height, $qality = 85) {
		//$base = preg_replace(array('/.*httpd\//i', '/[^\/]*\//i', '/[^\/]*$/i'), array('', '../', ''), $_SERVER['SCRIPT_FILENAME']);
		$base = "{$_SERVER['DOCUMENT_ROOT']}/";
		$tmp = preg_split('#[;]#', $data, NULL, PREG_SPLIT_NO_EMPTY);
		$photos = array();
		foreach($tmp as $key => $val) {
			$path = $module.(!preg_match('/^[_]{1,2}$/', $alias)?"/{$alias}":'');
			array_push($photos, array(
					"src" => "http://{$_SERVER['SERVER_NAME']}/img-dbimage/{$path}/".preg_replace('#\.([A-z]{3}$)#','-$1',$val)."-{$width}x{$height}-{$qality}.jpg",
					"size" => func::imageGetSizeRestric("{$base}data/dbimage/{$path}/{$val}", $width, $height)
				)
			);
		}
		return $photos;
	}
	
	static public function imageSave($data, $field, $module, $alias = NULL) {
		$sub = !empty($alias)?"/{$alias}":NULL;
		$dir = "data/dbimage/{$module}{$sub}";
		
		$last_image = preg_split('#[;]#', $data, NULL, PREG_SPLIT_NO_EMPTY);
		$image = preg_split('#[;]#', $_POST[$field], NULL, PREG_SPLIT_NO_EMPTY);
		$_POST[$field] = '';
		foreach($last_image as $key => $val) {
			if (!in_array($val, $image)) {
				unlink("{$dir}/{$val}");
			}
		}
		foreach($image as $key => $val) {
			if (preg_match('#^tmp_.*#',$val)) {
				$image[$key] = preg_replace('#^tmp_#','',$val);
				@rename("{$dir}/{$val}","{$dir}/{$image[$key]}");
			}
			$_POST[$field] .= "{$image[$key]};";
		}
			
		$list = glob("{$dir}/tmp_*");
		foreach($list as $file) {
			if ((time()-filemtime($file))>=600)
				unlink("{$file}");
		}
		
		return true;
	}
	
	static public function imageDelete($data, $module, $alias = NULL) {
		$sub = !empty($alias)?"/{$alias}":NULL;
		$dir = "data/dbimage/{$module}{$sub}";
		$photo = preg_split('#[;]#', $data, NULL, PREG_SPLIT_NO_EMPTY);
		foreach($photo as $key => $val) {
			@unlink("{$dir}/{$val}");
			echo "{$dir}/{$val}";
		}
	}
	
	static public function imagePhotoUploaderLoad($data, $field, $module, $alias = NULL) {
		$sub = !empty($alias)?"/{$alias}":NULL;
		$path = preg_split('#[/]#', "data/dbimage/{$module}{$sub}");
	
		$tmp = preg_split('#[;]#', $data['photo'], NULL, PREG_SPLIT_NO_EMPTY);
		$data['photo'] = array();
		foreach($tmp as $key => $val)
			array_push($data['photo'], array(
				'url' => "http://{$_SERVER['SERVER_NAME']}/img-dbimage/{$module}{$sub}/".preg_replace('#\.([A-z]{3}$)#','-$1',$val)."-40x40-151515-85.jpg",
				'src' => $val
				)
			);
		return $data;
	}
	
	static public function imagePhotoUploaderSave($field, $module, $alias = NULL) {
		$sub = !empty($alias)?"/{$alias}":NULL;
		$path = preg_split('#[/]#', "data/dbimage/{$module}{$sub}");
		$dir = '';
		foreach($path as $key => $val) {
			$dir.="{$val}/";
			if (!file_exists($dir))
				mkdir($dir,0777);
		}
		$filename = func::GetUploadFileName($_FILES[$field]['name']);
		if (!empty($filename[1]) &&
			@preg_match('#^(jpg|jpeg|png|gif)$#i',$filename[2])) {
			$file = "tmp_{$filename[1]}.{$filename[2]}";
			if (move_uploaded_file($_FILES[$field]['tmp_name'], "{$dir}{$file}")) {
				$preview = "http://{$_SERVER['SERVER_NAME']}/img-dbimage/{$module}{$sub}/tmp_{$filename[1]}-{$filename[2]}-40x40-000000-0x151515-60.jpg";
				return "{$file};{$preview}";
			}
		} else
			return 'error type';
		return 'error none';
	}
	
	static public function imageParseSizeRestrict($data, $module, $alias, $width, $height, $qality = 85) {
		//$base = preg_replace(array('/.*httpd\//i', '/[^\/]*\//i', '/[^\/]*$/i'), array('', '../', ''), $_SERVER['SCRIPT_FILENAME']);
		$base = "{$_SERVER['DOCUMENT_ROOT']}/";
		$tmp = preg_split('#[;]#', $data, NULL, PREG_SPLIT_NO_EMPTY);
		$photos = array();
		foreach($tmp as $key => $val) {
			$path = $module.(!preg_match('/^[_]{1,2}$/', $alias)?"/{$alias}":'');
			array_push($photos, array(
					"src" => "http://{$_SERVER['SERVER_NAME']}/img-dbimage/{$path}/".preg_replace('#\.([a-z]{3}$)#','-$1',$val)."-{$width}x{$height}-{$qality}.jpg",
					"size" => func::imageGetSizeRestric("{$base}data/dbimage/{$path}/{$val}", $width, $height)
				)
			);
		}
		return $photos;
	}
	#
	
	#iFile
	static public function GetFileExt($fileName) {
  	return strrchr($fileName,'.');
	}

	static public function RandomPref($bytes) {
		$tmp=NULL;
		for ($i=0;$i<$bytes;$i++)
			$tmp.=rand(0,9);
		return $tmp;
	}
	
	static public function GetUploadFileName($fileName) {
		$preg_from = Array('#[аA]#iu','#[бB]#iu','#[вV]#iu','#[гG]#iu','#[дD]#iu','#[еэE]#iu','#(ё)|(YE)#iu','#(ж)|(ZH)#iu','#[зZ]#iu','#[иI]#iu','#[йыY]#iu','#[кK]#iu','#[лL]#iu','#[мM]#iu','#[нN]#iu','#[оO]#iu','#[пP]#iu','#[рR]#iu','#[сS]#iu','#[тT]#iu','#[уU]#iu','#[фF]#iu','#(C)#iu','#(H)#iu','#(J)#iu','#(Q)#iu','#(W)#iu','#(X)#iu','#(х)|(KH)#iu','#(ц)|(TS)#iu','#(ч)|(CH)#iu','#(ш)|(SH)#iu','#(щ)|(SHCH)#iu','#[ъь"\'\(\)]#iu','#(ю)|(YU)#iu','#(я)|(YA)#iu','#[\-\\\/:\.,%^!;:?& ]#iu','#[_]{2,}#iu','#[^A-z_0-9]#iu');
		$preg_to = Array('a','b','v','g','d','e','ye','zh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','c','h','j','q','w','x','kh','ts','ch','sh','shch','','yu','ya','_','_','');
		preg_match('#([^\.]*)\.([a-z]{3,4})#i', $fileName, $file);
		$file[1] = preg_replace($preg_from,$preg_to,$file[1]).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
		return $file;
	}
	#
	
	#iSubjects
	static public function sbj_getFullName($name) {
		return preg_split('#[;]#',$name,0,PREG_SPLIT_NO_EMPTY);
	}
	#
	
	#iError
	static public function sqlTestError($object) {
		if ($error = $object->get_error()) {
			echo "<h1>{$error[0]}</h1><hr /><p><b>ERR:</b> {$error[1]}</p><p><b>SQL:</b> {$error[2]}</p>";
			exit;
		}
	}
	static public function methodTestError($object) {
		if ($error = $object->get_error()) {
			echo "<h1>{$error[0]}</h1><hr /><p><b>ERR:</b> {$error[1]}</p><p>";
			exit;
		}
	}
	#
	
	#iDate
	static public function dateGetMonthName($num) {
		$convert = array('1' => 'января',
						 '2' => 'февраля',
						 '3' => 'марта',
						 '4' => 'апреля',
						 '5' => 'мая',
						 '6' => 'июня',
						 '7' => 'июля',
						 '8' => 'августа',
						 '9' => 'сентября',
						 '10' => 'октября',
						 '11' => 'ноября',
						 '12' => 'декабря');
		return @$convert[(int)$num];
	}
	
	static public function dateGetWeekDay($day, $month, $year) {
		$weekday = array('вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб');
		return $weekday[date('w',mktime(0,0,0,$month,$day,$year))];
	}
	
	static public function dateGetWeekFullDay($day, $month, $year) {
		$weekday = array('воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота');
		return $weekday[date('w',mktime(0,0,0,$month,$day,$year))];
	}

	static public function dateGetDate($datetime) {
		$date = preg_split("#[ ]#", $datetime, -1, PREG_SPLIT_NO_EMPTY);
		return $date[0];
	}
	
	static public function dateGetTime($datetime) {
		$time = preg_split("#[ ]#", $datetime, -1, PREG_SPLIT_NO_EMPTY);
		return $time[1];
	}
	#
	
	#iTextTransform
	static public function subText($text, $length) {
		$notag = trim(strip_tags($text),"/&nbsp;\r\n\t\s/");
		if (mb_strlen($notag,"UTF-8")>0) {
			$point = mb_strlen($notag,"UTF-8")>$length?@mb_strpos($notag,".",$length,"UTF-8"):null;
			$subText = mb_substr($notag, 0, ($point)?$point:$length, "UTF-8").(($point == null)?'...':((!$point)?'...':'.'));
		} else
			$subText = false;
		return $subText;
	}
	
	static public function getParragrafs($text) {
		$notag = preg_match_all('#<p>.*</p>#',$text,$parrag,PREG_PATTERN_ORDER);
		return $parrag[0]; //(alt="([^"\']*)|)"[a-zA-Z0-9_/:\."\'= ]*
	}
	
	static public function getImagesURL($text) {
		$res = preg_match_all('#<img[ ]{0,2}([a-zA-Z]{2,6}="[^"\']*"|)[ ]{0,2}([a-zA-Z]{2,6}="[^"\']*"|)[ ]{0,2}([a-zA-Z]{2,6}="[^"\']*"|)[ ]{0,2}([a-zA-Z]{2,6}="[^"\']*"|).*>#',$text,$images,PREG_SET_ORDER);
		$result = array();
		if ($res>0) {
			foreach($images as $key => $image) {
				$property = array();
				for ($i=1; $i<count($image); $i++) {
					if (!empty($image[$i])) {
						$split = preg_split('#=#', $image[$i],0,PREG_SPLIT_NO_EMPTY);
						$property[strtolower($split[0])] = preg_replace('#["\']#',"",$split[1]);
					}
				}
				array_push($result, array($images[0][0],
							isset($property["src"])?preg_replace('#\/http#i','http','/'.preg_replace("#(^http:\/\/{$_SERVER['SERVER_NAME']}\/)|(^http:\/\/{$_SERVER['SERVER_NAME']}\/)|(\.\.\/)|(^\/)#i",'',$property["src"])):null,
							isset($property["alt"])?$property["alt"]:null));
			}
		}
		return ($res>0)?$result:false;
	}
	
	static public function getImages($text, $count, $parram=null) {
		$imgs = func::getImagesURL($text);
		if ($imgs) {
			$result = array();
			if ($parram!=null) {
				$parram = explode(":",$parram);
				$parram[3] = !isset($parram[3])?'0x000000':$parram[3];
			}
					
			for ($i=0; $i<(count($imgs)>$count?$count:count($imgs)); $i++) {
				if ($parram!=null)
					$imgs[$i][1] = preg_replace('#/data/image/(.*)\.(jpg|png|gif)$#i',"http://{$_SERVER['SERVER_NAME']}/img-image/$1-$2-{$parram[0]}c{$parram[1]}-{$parram[3]}-{$parram[2]}.$2",$imgs[$i][1]);
				array_push($result, array(
					"src" => $imgs[$i][1],
					"size" => func::imageGetSizeInfo($imgs[$i][1]),
					"alt" => $imgs[$i][2]
				));
			}
		} else
			$result = false;
		return $result;
	}
	
	static public function getShortTagText($text) {
		$text = preg_replace('#<p class="preview-post">(.*)</p>#i', '[s]$1[/s]', $text);
		$notag = trim(strip_tags($text),"/&nbsp;\r\n\t\s/");
		$stag = preg_match('#\[s\](.*)\[/s\]#i', $notag, $matches);
		return ($stag)?$matches[1]:false;
	}
	
	static public function delShortTagText($text) {
		//return preg_replace('#\[s\](.*)\[/s\]#i', '', $text);
		return preg_replace('#<p class="preview-post">(.*)</p>#i', '', $text);
	}
	
	static public function delEmptyParagraph($text) {
		return preg_replace(array('#<p></p>#i','#<p>&nbsp;</p>#i'), '', $text);
	}
	
	static public function strToLower($text) {
		return mb_strtolower($text, 'UTF-8');
	}
	
	static public function packTags($text) {
		$pack = '['.preg_replace('#([\s\t ]*),([\s\t ]*)#','],[',trim(strip_tags($text),"/ /")).']';
		return $pack;
	}
	
	static public function extractTags($packedTags) {
		$array = preg_split('#\],\[#',func::strToLower(trim($packedTags,'[]')));
		return empty($array[0])?array():$array;
	}
	
	static public function convertTagToURI($tag) {
		return preg_replace('#\s#','_',$tag);
	}
	
	static public function articleCompress($article) {
		$matched_chr = preg_replace("/[^A-z]*/i", '', strtoupper($article.md5($article)));
		$matched_num = preg_replace("/[^0-9]*/i", '', strtoupper($article));
		$num_count = 4;
		$ord = '';
		if (strlen($matched_chr)>2) {
			for ($i=2; $i<strlen($matched_chr); $i++)
				$ord.=ord($matched_chr[$i]);
			$matched_chr=substr($matched_chr, 0, 2);
			$matched_num=$ord.$matched_num;
		} else
			$matched_chr = 'AA';
		if (strlen($matched_num)>$num_count) {
			$matched_num = preg_split('//', $matched_num, 0, PREG_SPLIT_NO_EMPTY);
			do {
				$operant_1 = array_shift($matched_num);
				$operant_2 = array_shift($matched_num);
				$result = preg_split('//', (string)((int)$operant_1+(int)$operant_2), 0, PREG_SPLIT_NO_EMPTY);
				$matched_num = array_merge($matched_num, $result);
			} while (count($matched_num)>$num_count);
			$matched_num = implode('',$matched_num);
		} else {
			$tmp = '';
			for ($i=0; $i<$num_count-strlen($matched_num); $i++)
				$tmp.='0';
			$matched_num = $tmp.$matched_num;
		}
		return $matched_chr.$matched_num;
	}
	#
	
	#iSort
	static public function absArrayCountSort($elem1, $elem2) {
		if($elem1['count'] < $elem2['count'])
			return 1;
		elseif($elem1['count'] > $elem2['count'])
			return -1;
		else
			return 0;
	}
	
	static public function descArrayCountSort($elem1, $elem2) {
		if($elem1['count'] < $elem2['count'])
			return -1;
		elseif($elem1['count'] > $elem2['count'])
			return 1;
		else
			return 0;
	}
	#
	
	#iMedia
	static public function correctMediaSize($text, $width) {
		function extractMedia($object, $width) {
			$object = stripslashes($object);
			preg_match_all('#(width|height)=([\'"0-9]*)#i', $object, $matched, PREG_PATTERN_ORDER);
			$matched = array($matched[1],$matched[2]);
			$wkey = strtolower($matched[0][0]) == 'width'?0:1;
			$hkey = 1-$wkey;
			$height = ceil($width/trim($matched[1][$wkey],"\"'")*trim($matched[1][$hkey],"\"'"));
			$object = preg_replace('#(width|height)=([\'"0-9]*)#ie', "correctParram('$1', {$width}, {$height})", $object);
			return $object;
		}
		function correctParram($parram, $width, $height) {
			$val = array('width' => "\"{$width}\"",
						 'height' => "\"{$height}\"");
			return "{$parram}={$val[$parram]}";
		}
		return preg_replace('#(<iframe[^>]*>)#ie', "extractMedia('$1', '$width')", $text);
	}
	
	static public function setMaxImageSize($text, $width, $height, $parram = null, $domain = null) {
		if ($parram!=null)
			$parram = explode(":",$parram);
		else
			$parram = array('0xffffff', '86');
		
		$domain = ($domain == null?"":$domain);
		function extractImage($object, $width, $height, $domain, $border, $quality) {
			$object = stripslashes($object);
			preg_match_all('#(src|width|height)=.([^"\']*).#i', $object, $matched, PREG_PATTERN_ORDER);
			
			if (array_search('width',$matched[1]) != false &&
				array_search('height',$matched[1]) != false) {
				$wtmp = $matched[2][array_search('width',$matched[1])];
				$htmp = $matched[2][array_search('height',$matched[1])];
				$rect = min($wtmp,$htmp)/max($wtmp,$htmp);
				$sizer = $wtmp>=$htmp?'width':'height';
				if ($sizer == 'width') {
					$height = round($width*$rect);
				} else
				if ($sizer == 'height') {
					$width = round($height*$rect);
				} 
			} else {
				$width=0;
				$height=0;
			}
			$src = preg_replace('#/data/image/(.*)\.(jpg|png|gif)$#i',"{$domain}/img-image/$1-$2-{$width}x{$height}-{$border}-{$quality}.$2",$matched[2][array_search('src',$matched[1])]);
			$object = preg_replace('#(src|width|height)=.([^"\']*).#ie', "correctImageParram('$1', '{$src}', '{$width}', '{$height}')", $object);
			return $object;
		}
		function correctImageParram($parram, $src, $width, $height) {
			$val = array('src' => "\"{$src}\"",
						 'width' => "\"{$width}\"",
						 'height' => "\"{$height}\"");
			return "{$parram}={$val[$parram]}";
		}
		return preg_replace('#(<img[^>]* />)#ie', "extractImage('$1', '$width', '$height', '$domain', '$parram[0]', '$parram[1]')", $text);
	}
	#
	
	#iNumber
	static public function numberToRoman($value) {
		if($value<0)
			return "";
		if(!$value)
			return "0";
		$thousands=(int)($value/1000);
		$value-=$thousands*1000;
		$result=str_repeat("M",$thousands);
		$table=array(
			900=>"CM",500=>"D",400=>"CD",100=>"C",
			90=>"XC",50=>"L",40=>"XL",10=>"X",
			9=>"IX",5=>"V",4=>"IV",1=>"I"
		);
		while($value) {
			foreach($table as $part=>$fragment)
				if($part<=$value)
					break;
			$amount=(int)($value/$part);
			$value-=$part*$amount;
			$result.=str_repeat($fragment,$amount);
		}
		return $result;
	}
	#
	
	#iHttp
	static public function httpRequest($url) {
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL,$url);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
		curl_setopt ($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec ($ch);
		curl_close($ch);
		
		return $result;
	}
	#
	
	static public function send_mail($from, $to, $subject, $message) {
		require_once 'plugins/phpmailer/class.phpmailer.php';
		if (mb_detect_encoding($subject, "UTF-8")==FALSE)
			$subject= mb_encode_mimeheader($subject,"UTF-8", "B", "\n");
		try {
			$mail = new PHPMailer(true); 
			$mail->IsSMTP();
			$mail->SMTPAuth   = true;
			$mail->Port       = 465;
			$mail->Host       = "ssl://in.mailjet.com";
			$mail->Username   = "0d8dd8623bd38b41c43683c41c0558eb";
			$mail->Password   = "465c500abd5f680f0b20405deb967b36";
			$mail->CharSet 	  = "UTF-8";
			
			$mail->AddReplyTo($from['address'], $from['name']);
			$mail->From       = $from['address'];
			$mail->FromName   = $from['name'];
			$mail->Sender	  = $from['address'];
			if (is_string($to))
				$mail->AddAddress($to);
			else
			if (is_array($to))
				while ($row = array_shift($to))
					$mail->AddAddress($row);
			$mail->Subject  = $subject;
			// $mail->AltBody    = "Для просмотра сообщения, пожалуйста, воспользуйтесь HTML-совместимым почтовым клиентом!"; 
			// $mail->WordWrap   = 80;
			$mail->MsgHTML($message);
			$mail->IsHTML(true); 
			$mail->Send();
		} catch (phpmailerException $e) {
			echo $e->errorMessage();
			exit;
		}
	}
	
	static public function jsonDataForm_encode($string) {
		return base64_encode(urlencode($string));
	}
	static public function jsonDataForm_decode($string) {
		return base64_encode(urlencode($string));
		return urldecode(base64_decode($string));
	}
	
	static public function jsonData_encode($string) {
		return base64_encode(convert_uuencode($string));
		/*while ($char = array_shift($string)) {
			echo $char;
		}*/
		//print_r($string);
	}
	static public function jsonData_decode($string) {
		return urldecode(base64_decode($string));
	}
}
?>