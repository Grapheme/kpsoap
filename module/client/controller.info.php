﻿<?class info_client extends TClientController {	public function info($code_name){		$this->content = $this->load_module($code_name);				if (action == 'valid') {			$request = json_decode($_POST['valid']);			if ($request) {				$response = '';				for ($i=0; $item = array_shift($request->request); $i++) {					$name = urldecode(base64_decode($item->name));					$type = urldecode(base64_decode($item->type));					$value = urldecode(base64_decode($item->value));					$checked = urldecode(base64_decode($item->checked));					if ($type == 'text') {						if (empty($value))							$response.="\"{$i}\",";					} else					if ($type == 'phone') {						$value = preg_replace('/[^0-9]*/i', '', $value);						if (empty($value) /*|| strlen($value)<11*/)							$response.="\"{$i}\",";					} else					if ($type == 'email') {						if (empty($value) || !preg_match("/^[0-9a-z_\.\-]+@[0-9a-z_\-]+\.[a-z]{2,4}$/i", $value))							$response.="\"{$i}\",";					}				}				if (empty($response)) {					$_SESSION['secret'] = rand(100000,999999);					echo '{"response":{"secret":"'.$_SESSION['secret'].'"}}';				} else {					echo '{"error":['.(substr($response,0,-1)).']}';				}			} else				echo '{"error":0}';			exit;		} else		if (action == 'confirmfeedback') {			if (isset($_POST['secret']) && @$_POST['secret'] == $_SESSION['secret']) {				$message_template = " 				<html> 					<head> 						<title>{title}</title> 					</head> 					<body>						{text}					</body>				</html>";								$_POST['to'] = 'snow_snow@mail.ru';				$_POST['e_mail'] = strip_tags($_POST['e_mail']);				$_POST['comment'] = mb_substr(preg_replace('/\n/','<br />',htmlspecialchars($_POST['comment'])), 0, 10000, 'UTF-8'); 								$title = "Получено новое сообщение от клиента {$_POST['name']}";				$text = "<p>Имя клиента: {$_POST['name']}</p>						 <p>".(!empty($_POST['e_mail'])?"E-Mail: {$_POST['e_mail']}":'')."<br /></p>						 ".(!empty($_POST['comment'])?"<p>Сообщение:<br />{$_POST['comment']}</p>":''); 				$subject=$title;								$to=$_POST['to'];				$from=array('address' => 'order@kpsoap.ru',							'name' => 'Краснополянское Мыло');								$message = preg_replace(array('/\{title\}/','/\{text\}/'), array($title, $text), $message_template);				func::send_mail($from, $to, $subject, $message);								unset($_SESSION['secret']);				$this->content['feedback_success'] = true;			} else {				header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));				exit;			}		} else {			if ((bool)action != false) {				header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));				exit;			}		}				$content = $this->core->sql->query("SELECT * FROM `dat_info` ORDER BY `priority`");				if (empty($this->page) && $content->num_rows>1)			header("location: ./".$content->cell[1]['alias']);				$submenu = array();				for ($i=0; $i<$content->num_rows; $i++) {			if ($content->cell[$i]['alias'] == $this->page) {				$title = $content->cell[$i]['title'];				$text = $content->cell[$i]['text'];			}			if ($content->cell[$i]['alias'] != '_')				array_push($submenu, $content->cell[$i]['alias']);		}		if ($this->page=='feedback') {			$title='Обратная связь';			$text='Обратная связь';		}				if (!isset($title) && !isset($text)) {			$this->content = $this->error404($code_name);			return $this->content;		}				$this->content['content'] = array(			'title' => $title,			'text' => func::correctMediaSize(func::setMaxImageSize(func::delEmptyParagraph(func::delShortTagText($text)), 676, 676, "0xfbf6ea:85"), 676)		);		$this->content['subclass'] = "inner info";		if ($this->page=='feedback') {			$this->content['page_tpl']='module.feedback.tpl';			$this->content['subclass'].=' feedback';		}		return $this->content;	}}?>