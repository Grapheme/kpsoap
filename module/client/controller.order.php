<?
class order_client extends TClientController {
	protected $access = 'public';

	public function order($code_name){

		$this->content = $this->load_module($code_name);
        if (preg_match('/^result$/i',action)) {

            ## Debug - url
            ## http://www.kpsoap.git/order/:axah=out&action=result&InvId=246&OutSum=190&SignatureValue=96dee85ac74945bbb3f7059f1057a504

			$id = @intval($_GET['InvId']); // получаем номер транзакции
			$pwd2 = "HFG86dhjFnas3";

			$order = $this->core->sql->query("SELECT * FROM `dat_catalog_order` WHERE (`id`='{$id}') LIMIT 0,1");
			if ($order->num_rows>0) {
				$client = json_decode($order->cell[0]['client']);
				$products = json_decode($order->cell[0]['products']);

				$sum = 0;
				for ($i=0; $i<count($products); $i++) {
					$sum+=$products[$i]->price*$products[$i]->count;
				}

				if ($sum != floatval($_GET['OutSum'])) {
					echo "ERR: invalid amount";
					exit();
				}

                #echo strtolower(md5($_GET['OutSum'] . ":" . $id . ":" . $pwd2));
				if (strtolower($_GET['SignatureValue']) != strtolower(md5($_GET['OutSum'] . ":" . $id . ":" . $pwd2)) ) {
					echo "ERR: invalid signature";
					exit();
				}

				$name = base64_decode($client->last_name).' '.base64_decode($client->first_name);
				if (!empty($client->e_mail)) {
					$title = "Заказ №{$id} оплачен.";

					$text = "<h2>Статус заказа №{$id} изменился.</h2>
							 <p>Уважаемый(ая) {$name}! Ваш заказ №{$id} успешно оплачен.</p>";
					$info = "<p>Это письмо отправлено автоматически, и Вам не следует на него отвечать. Для получения более подробной информации Вы также можете обратиться к нам по номеру: 8 (800) 775-25-10 (звонок бесплатный).</p>
							 <p>Благодарим Вас за выбор нашего магазина.</p>";
					$subject="Заказ №{$id} оплачен.";

					$to=base64_decode($client->e_mail);
					$from=array('address' => "order@kpsoap.ru",
								'name' => "Краснополянское Мыло");
					$message = "
					<html>
						<head>
							<title>{title}</title>
						</head>
						<body>
							{text}
							<p>&nbsp;</p>
							{info}
						</body>
					</html>";
					$message = preg_replace(array('/\{title\}/','/\{text\}/','/\{info\}/'), array($title, $text, $info), $message);
					func::send_mail($from, $to, $subject, $message);
				}

				$title = "Произведена оплата заказа №{$id}";
				$text = "<h2>{$title}</h2>
						 <p>{$name} произвел(а) оплату заказа №{$id} на сумму {$sum}р. через систему Robokassa.</p>";
				$info = "<p>Для управления заказами <a href=\"http://{$_SERVER['SERVER_NAME']}/admin/order/\">войдите</a> в панель управления, используя свой логин и пароль.</p>";
				$subject=$title;

				$to=array("order@kpsoap.ru", "support@grapheme.ru");
				#$to=array("az@grapheme.ru"); # debug
				$from=array('address' => "order@kpsoap.ru",
							'name' => "Краснополянское Мыло");
				$message = "
					<html>
						<head>
							<title>{title}</title>
						</head>
						<body>
							{text}
							<p>&nbsp;</p>
							{info}
						</body>
					</html>";
				#$message = preg_replace(array('/\{title\}/','/\{text\}/','/\{order_list\}/','/\{info\}/'), array($title, $text, $info), $message);
				$message = preg_replace(array('/\{title\}/','/\{text\}/','/\{info\}/'), array($title, $text, $info), $message);
				func::send_mail($from, $to, $subject, $message);

				$this->core->sql->update('dat_catalog_order', array('payment'), '1', "`id`='{$id}'");

			} else {
				echo "ERR: invalid id";
				exit();
			}

			echo "OK" . $id;
			exit();

		} else
		if (preg_match('/^success$/i',action)) {
			$_SESSION['pay_sucess'] = true;
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
		} else
		if (preg_match('/^fail$/i',action)) {
			header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
			exit;
		} else
		if (action == 'valid') {
			$request = json_decode($_POST['valid']);
			if ($request) {
				$response = '';
				$payment = '';
				for ($i=0; $item = array_shift($request->request); $i++) {
					$name = urldecode(base64_decode($item->name));
					$type = urldecode(base64_decode($item->type));
					$value = urldecode(base64_decode($item->value));
					$checked = urldecode(base64_decode($item->checked));
					if ($type == 'text') {
						if (empty($value))
							$response.="\"{$i}\",";
					} else
					if ($type == 'phone') {
						$value = preg_replace('/[^0-9]*/i', '', $value);
						if (empty($value) /*|| strlen($value)<11*/)
							$response.="\"{$i}\",";
					} else
					if ($type == 'email') {
						if (empty($value) || !preg_match("/[0-9a-z_\.\-]+@[0-9a-z]+\.[a-z]{2,3}/i", $value))
							$response.="\"{$i}\",";
					} else
					if ($type == 'online') {
						$payment = $checked;
					}
				}
				if (empty($response)) {
					$_SESSION['secret'] = rand(100000,999999);
					unset($_SESSION["cookie_basket_count"]);
					unset($_SESSION["cookie_basket_price"]);
					echo '{"response":{"secret":"'.$_SESSION['secret'].'"}}';
				} else {
					echo '{"error":['.(substr($response,0,-1)).']}';
				}
			} else
				echo '{"error":0}';
			exit;
		} else
		if (action == 'confirmorder') {
			if (isset($_POST['secret']) && @$_POST['secret'] == $_SESSION['secret']) {
				foreach ($_POST as $key => $val) {
					if (!preg_match('/action|secret/i', $key))
						$_POST[$key] = urldecode(base64_decode($val));
				}
				$_POST['phone'] = preg_replace(array('#[^0-9]*#', '#.*(.{10})$#'), array('', '7$1'), $_POST['phone']);
				$sms = !preg_match('#79[0-9]{9}#', $_POST['phone'])?false:true;

				$where = '';
				foreach($_SESSION['basket'] as $key => $value) {
					$where.="`id`='$key' OR ";
				}
				$where = "WHERE (".substr($where,0,-4).")";
				$basket = $this->core->sql->query("SELECT * FROM `dat_catalog_list` {$where}");
				func::sqlTestError($this->core->sql);

				$products = '[';
				for ($i=0; $i<$basket->num_rows; $i++) {
					$basket->cell[$i]['title'] = preg_replace('#[\[\];]#','',$basket->cell[$i]['title']);
					$products.='{"id":"'.base64_encode($basket->cell[$i]['id']).'"'.
							   ',"article":"'.base64_encode($basket->cell[$i]['article']).'"'.
							   ',"title":"'.base64_encode($basket->cell[$i]['title']).'"'.
							   ',"price":"'.(($basket->cell[$i]['price_sell']>0)?$basket->cell[$i]['price_sell']:$basket->cell[$i]['price']).'"'.
							   ',"count":"'.$_SESSION['basket'][$basket->cell[$i]['id']].'"},';
				}
				$products = substr($products,0,-1).']';

				$client = '{';
				foreach($_POST as $key => $val) {
					$client.= "\"{$key}\":\"".base64_encode($val)."\",";
				}
				$client = substr($client,0,-1).'}';

				$order_number = $this->core->sql->get_next_auto_increment("dat_catalog_order");
				$this->core->sql->insert("dat_catalog_order", array('phone', 'client', 'products', 'date'), array($_POST['phone'], $client, $products, date('Y-m-d H:i:s')));
				func::sqlTestError($this->core->sql);

				// уведовление на email
				$list = '';
				for ($i=0; $i<$basket->num_rows; $i++)
					$list.= "`dat_catalog_list`.`id` = '{$basket->cell[$i]['id']}' or ";
				$list = substr($list, 0, -3);
				$produce = $this->core->sql->query("
					SELECT
						`dat_catalog_list`.*,
						`dat_catalog_type`.`alias` as `group`
					FROM
						`dat_catalog_list`
							LEFT JOIN `dat_catalog_type` ON (`dat_catalog_type`.`id` = `dat_catalog_list`.`type_id`)
					WHERE (
						({$list})
					)
				");
				func::sqlTestError($this->core->sql);
				$price_result = 0;
				$order_list = '';
				for ($i=0; $i<$produce->num_rows; $i++) {
					$produce->cell[$i]['photo'] = preg_replace('#;.*#','',$produce->cell[$i]['photo']);
					$produce->cell[$i]['title'] = trim(preg_replace('#^(.*)\(.*\)$#','$1',$produce->cell[$i]['title']));
					$price_last = $produce->cell[$i]['price_sell']>0?$produce->cell[$i]['price']:0;
					$produce->cell[$i]['price'] = $produce->cell[$i]['price_sell']>0?$produce->cell[$i]['price_sell']:$produce->cell[$i]['price'];
					$count =$_SESSION['basket'][$basket->cell[$i]['id']];
					$price_result += $price = ($produce->cell[$i]['price']*$count);
					$order_list .= "
							<tr>
								<td rowspan=\"4\" width=\"100px\" valign=\"top\"><img src=\"http://{$_SERVER['SERVER_NAME']}/img-dbimage/catalog/{$produce->cell[$i]['group']}/".preg_replace('#\.([a-z]{3}$)#i','-$1',$produce->cell[$i]['photo'])."-100c100-85.jpg\" title=\"{$produce->cell[$i]['title']}\" /></td>
								<td width=\"400px\"><a href=\"http://{$_SERVER['SERVER_NAME']}/catalog/{$produce->cell[$i]['group']}/{$produce->cell[$i]['article']}/\"><b><font color=\"#005dcd\">{$produce->cell[$i]['title']}</font><b></a></td>
							</tr>
							<tr>
								<td width=\"400px\">
									<font color=\"#333333\"><small>
										-&nbsp;&nbsp;Артикул: {$produce->cell[$i]['article']}<br />
										-&nbsp;&nbsp;Количество: {$count} шт<br />
										-&nbsp;&nbsp;Цена за штуку: <b>{$produce->cell[$i]['price']}</b> руб ".($produce->cell[$i]['price_sell']>0?"<small>(<strike>&nbsp;{$price_last} руб&nbsp;</strike>)</small> ":'')."<br />
									</small></font>
								</td>
							</tr>
							<tr>
								<td width=\"400px\" align=\"right\"><b>{$price} руб<b></td>
							</tr>
							<tr>
								<td colspan=\"2\" height=\"30px\"><p>&nbsp;</p></td>
							</tr>";
				}

                /*
                 * Итоговая сумма с учетом доставки
                 */
                if($price_result < 2500){
                    $price_result += 300;
                }

                $message_template = "
				<html>
					<head>
						<title>{title}</title>
					</head>
					<body>
						{text}
						<table width=\"500px\">
							<tr>
								<td colspan=\"2\" align=\"left\">
									{order_title}
									<hr />
								</td>
							</tr>
							{order_list}
							<tr>
								<td colspan=\"2\" align=\"right\">
									<hr />
									Общая стоимость заказа: <b>{$price_result} руб 00 коп</b>".($this->sell_val($price_result)>0?"
									<br /><a href=\"http://{$_SERVER['SERVER_NAME']}/partners/sistema_skidok/\">Скидка: <b>".$this->sell_val($price_result).' %</b></a><br />
									<br />Итого сумма заказа с учетом скидки: <b>'.$this->sell_price($price_result).' руб 00 коп</b>':'')."
								</td>
							</tr>
						</table>
						{info}
					</body>
				</html>";

				$payhash = base64_encode("{$order_number}-{$_POST['phone']}");
				if (!empty($_POST['e_mail'])) {
					$title = "Вашему заказу присвоен номер {$order_number}";
					$order_title = "Ваш заказ:";
                    $text = "
<p>Вас приветствует «Краснополянская косметика»!</p>
<p>Заказ, который Вы только что сделали, принят, зарегистрирован под номером {$order_number} и получил статус «в обработке».</p>
<p>Наша частная мыловарня расположена в поселке «Медовеевка» Краснополянского района г.Сочи. Поэтому мы пришлем Вам заказ по почте. Стоимость доставки одной посылки – 300 руб, в случае осуществления заказа на сумму свыше 2 500 руб – бесплатно!</p>
<p>Если вы не хотите получать заказ через «Почту России», то возможна отправка ТК «ПЭК». В этом случае вам нужно будет поехать за вашим заказом в представительство этой компании. Доставка также обойдется в 300 руб.</p>
<p>Отправка готовой продукции происходит один раз в неделю по четвергам. В этот день мы передаем все заказы за неделю в отделение «Почты России» и получаем трекинг по каждой посылке.</p>
<p>Пожалуйста, ожидайте трек-номер вашей посылки в будущую пятницу.</p>
";
					#$text = "<p>Ужаваемый, {$_POST['last_name']} {$_POST['first_name']}. Ваш заказ принят под номером <b>{$order_number}</b> и поставлен в очередь. В ближайшее время с Вами свяжется наш менеджер для подтверждения заказа.</p>";
					$info = "<p>&nbsp;</p>
							 <p>Вы можете в любое время оплатить Ваш заказ он-лайн по этой ссылке: http://{$_SERVER['SERVER_NAME']}/order/:pay-{$payhash}</p>
							 <p>&nbsp;</p>
							 <p>Это письмо отправлено автоматически, и Вам не следует на него отвечать. Для получения более подробной информации Вы так же можете обратиться к нам по номеру +7 928 665-46-96.</p>
							 <p>Благодарим Вас за выбор нашего магазина.</p>"; //http://{$_SERVER['SERVER_NAME']}/order/:pay-{$payhash}
                    $info = "";
					$subject = "Вашему заказу присвоен номер {$order_number}.";

					$to=$_POST['e_mail'];
					$from=array('address' => "order@kpsoap.ru",
								'name' => "Краснополянское Мыло");
					$message = preg_replace(array('/\{title\}/','/\{order_title\}/','/\{text\}/','/\{order_list\}/','/\{info\}/'), array($title, $order_title, $text, $order_list, $info), $message_template);
					func::send_mail($from, $to, $subject, $message);
				}

				$title = "Новый заказ от {$_POST['last_name']} {$_POST['first_name']} (номер заказа: {$order_number})";
				$order_title = "<b>Заказ:</b>";
				$text = "<p><h2>Заказчик: {$_POST['last_name']} {$_POST['first_name']}".(!empty($_POST['middle_name'])?" {$_POST['middle_name']}":"")."</h2></p>
						 <p><b>Контактные данные:</b><br />
						 &nbsp;&nbsp;&nbsp;Телефон: {$_POST['phone']}".(!empty($_POST['second_phone'])?", {$_POST['second_phone']}":'')."<br />
						 ".(!empty($_POST['e_mail'])?"&nbsp;&nbsp;&nbsp;E-Mail: {$_POST['e_mail']}":'')."<br />
						 </p>
						 <p><b>Адрес доставки:</b> ".(!empty($_POST['zip'])?"{$_POST['zip']} ":'')." Россия, {$_POST['city']}, {$_POST['address']}</p>
						 <p><b>Способ оплаты:</b> {$_POST['payment']}</p>
						 ".(!empty($_POST['comment'])?"<p><b>Комментарий:</b></p><ul>{$_POST['comment']}</ul>":'')."
						 <p></p>";
				$info = "<p>Для управления заказами <a href=\"http://{$_SERVER['SERVER_NAME']}/admin/order/\">войдите</a> в панель управления используя свой логин и пароль.</p>";
				$subject=$title;

				$to=array("order@kpsoap.ru", "support@grapheme.ru");
				$from=array('address' => "order@kpsoap.ru",
							'name' => "Краснополянское Мыло");

				$message = preg_replace(array('/\{title\}/','/\{order_title\}/','/\{text\}/','/\{order_list\}/','/\{info\}/'), array($title, $order_title, $text, $order_list, $info), $message_template);
				func::send_mail($from, $to, $subject, $message);

				unset($_SESSION['secret']);
				unset($_SESSION['basket']);
				$this->content['order_success'] = true;
				$this->content['order_number'] = $order_number;

				require_once "plugins/sms24x7.php";
				smsapi_push_msg_nologin('andrew.samoilov@gmail.com', 'UdYpm6e', $_POST['phone'], "Вашему заказу присвоен номер {$order_number}. Благодарим за выбор нашего магазина.", array("sender_name"=>"KPSOAP.RU"));

				if ($_POST['payment'] == 'Robokassa') {
					$login 		= "Medoveevka";
					$price 		= floatval($this->sell_price($price_result));
					#$price 		= floatval(10.0); ## For test payment
					$id		 	= $order_number;
					$descript	= "Краснополянское Мыло: Оплата заказа номер №{$order_number}";
					$signature 	= md5($login . ":" . $price . ":" . $id . ":" . 'pS4df7Rh5gn8F');

					$descript	= urlencode($descript);

                    #echo "<pre>" . print_r($_POST, 1) . "</pre>";
					$goto = "https://merchant.roboxchange.com/Index.aspx?MrchLogin={$login}&OutSum={$price}&InvId={$id}&Des={$descript}&SignatureValue={$signature}";
					#echo $goto; die;

					header("location: {$goto}");
					exit();
				}
			} else {
				header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
				exit;
			}
		} else {
			if ((bool)action != false) {
				header(func::url_delget("location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}"));
				exit;
			}
		}
		$payment = preg_match("/pay-([A-z0-9\+=]*)/i",$_SERVER['QUERY_STRING'],$match);
		if (isset($match[1])) {
			$payment = explode('-',base64_decode($match[1]));
			$order = $this->core->sql->query("SELECT * FROM `dat_catalog_order` WHERE (`id`='{$payment[0]}' AND `phone`='{$payment[1]}') LIMIT 0,1");
			func::sqlTestError($this->core->sql);
			if ($order->num_rows>0) {
				if ($order->cell[0]['payment'] == 0) {
					$products = json_decode($order->cell[0]['products']);

					$price_result = 0;
					for ($i=0; $i<count($products); $i++) {
						$price_result+=$products[$i]->price*$products[$i]->count;
					}
					$name = base64_decode($client->last_name).' '.base64_decode($client->first_name);

					$login 		= "Medoveevka";
					$price 		= floatval($this->sell_price($price_result));
					$id		 	= $order->cell[0]['id'];
					$descript	= urlencode("Оплата заказа номер №{$order->cell[0]['id']}");
					$signature 	= md5($login . ":" . $price . ":" . $id . ":" . 'pS4df7Rh5gn8F');

					header("location: https://merchant.roboxchange.com/Index.aspx?MrchLogin={$login}&OutSum={$price}&InvId={$id}&Des={$descript}&SignatureValue={$signature}");
					exit();
				} else {
					$client = json_decode($order->cell[0]['client']);
					$products = json_decode($order->cell[0]['products']);

					$price_result = 0;
					for ($i=0; $i<count($products); $i++) {
						$price_result+=$products[$i]->price*$products[$i]->count;
					}
					$name = base64_decode($client->last_name).' '.base64_decode($client->first_name);

					$this->content['pay'] = array('code' => 'AlreadyPaid',
												  'id' => $payment[0],
												  'price' => $this->sell_price($price_result),
												  'name' => $name);
				}
			} else { //'text' => "Заказ под номером \"{$match[1]}\" не найден. Если в Вашем письме указан именно этот номер заказа, пожалуйста обратитесь в службу техничесской поддержки #MAIL#"
				$this->content['pay'] = array('code' => 'ErrorId',
											  'id' => $payment[0]);
			}

			$this->content['panels_data'] = array('basket' => array());
		} else
		if (isset($_SESSION['pay_sucess'])) {
			unset($_SESSION['pay_sucess']);

			$this->content['pay'] = array('code' => 'PaySuccess');
			$this->content['panels_data'] = array('basket' => array());
		}
		if (isset($_SESSION['basket'])) {
			if (count($_SESSION['basket'])>0) {
				$where = '';
				foreach($_SESSION['basket'] as $key => $value) {
					$where.="`dat_catalog_list`.`id`='$key' OR ";
				}
				$where = "(".substr($where,0,-4).")";
				$basket = $this->core->sql->query("SELECT
														`dat_catalog_list`.`id`,
														`dat_catalog_list`.`article`,
														`dat_catalog_list`.`title`,
														`dat_catalog_list`.`price`,
														`dat_catalog_list`.`price_sell`,
														`dat_catalog_list`.`photo`,
														`dat_catalog_list`.`count`,
														`dat_catalog_list`.`weight`,
														`dat_catalog_type`.`alias` as `group`,
														`dat_catalog_type`.`name` as `grouptitle`
													FROM
														`dat_catalog_list`
															LEFT JOIN `dat_catalog_type` ON (`dat_catalog_list`.`type_id` = `dat_catalog_type`.`id`)
													WHERE (
														{$where}
													)");
				func::sqlTestError($this->core->sql);
				$count = 0;
				$price = 0;
				for ($i=0; $i<$basket->num_rows; $i++) {
					$basket->cell[$i]['price'] = $basket->cell[$i]['price_sell']>0?$basket->cell[$i]['price_sell']:$basket->cell[$i]['price'];
					$basket->cell[$i]['title_eng'] = preg_replace('/(\(.+\))/i','',$basket->cell[$i]['title']);
					$basket->cell[$i]['max'] = $basket->cell[$i]['count'];
					$basket->cell[$i]['count'] = $_SESSION['basket'][$basket->cell[$i]['id']];
					if (empty($basket->cell[$i]['photo']))
						$basket->cell[$i]['photo'] = 'nophoto-small.png';
					if (!preg_match('#^http:#', $basket->cell[$i]['photo'])) {
						$basket->cell[$i]['photo'] = preg_replace('#;.*#','',$basket->cell[$i]['photo']);
						$basket->cell[$i]['photo'] = "http://{$_SERVER['SERVER_NAME']}/img-dbimage/catalog/{$basket->cell[$i]['group']}/".preg_replace('#\.([a-z]{3}$)#i','-$1',$basket->cell[$i]['photo'])."-70c50-85.jpg";
					}
					$basket->cell[$i]['p_url_size'] = func::imageGetSizeRestric($basket->cell[$i]['photo'], 70, 50);
					$count+=$basket->cell[$i]['count'];
					$price+=$basket->cell[$i]['count']*$basket->cell[$i]['price'];
				}
				$this->content['panels_data'] = array('basket' => array("list" => $basket->cell,
																		"count" => $count,
																		"price" => $price,
																		"sell_val" => $this->sell_val($price),
																		"sell_price" => $this->sell_price($price)));
			} else {
				$this->content['panels_data'] = array('basket' => array());
			}
		} else {
			/*$sell = $this->core->sql->query("	SELECT
													`dat_catalog_list`.`id`,
													`dat_catalog_list`.`article`,
													`dat_catalog_list`.`title`,
													`dat_catalog_type`.`alias` as `groupalias`,
													`dat_catalog_list`.`photo`,
													`dat_catalog_list`.`price`,
													`dat_catalog_list`.`price_sell`
												FROM
													`dat_catalog_list` LEFT JOIN `dat_catalog_type` ON (`dat_catalog_type`.`id` = `dat_catalog_list`.`type_id`)
												WHERE (
													`dat_catalog_list`.`count`>0
												)
												ORDER BY
													if(`dat_catalog_list`.`price_sell`>0,1,0) DESC,
													rand(),
													`dat_catalog_list`.`priority` DESC,
													`dat_catalog_list`.`rating` DESC,
													`dat_catalog_list`.`last_update`
												LIMIT
													0, 6");
			func::sqlTestError($this->core->sql);

			for ($i=0; $i<$sell->num_rows; $i++) {
				if (empty($sell->cell[$i]['photo']))
					$sell->cell[$i]['photo'] = 'nophoto.gif';

				if (!preg_match('#^http:#', $sell->cell[$i]['photo'])) {
					$sell->cell[$i]['photo'] = preg_replace('#;.*#','',$sell->cell[$i]['photo']);
					$sell->cell[$i]['photo'] = "http://{$_SERVER['SERVER_NAME']}/img-dbimage/catalog/{$sell->cell[$i]['groupalias']}/".preg_replace('#\.([a-z]{3}$)#','-$1',$sell->cell[$i]['photo'])."-130x140-85.jpg";
				}
				$sell->cell[$i]['psize'] = func::imageGetSizeRestric($sell->cell[$i]['photo'], 130, 140);
				$sell->cell[$i]['title_eng'] = preg_replace('/(\(.+\))/i','',$sell->cell[$i]['title']);
			}
			$this->content['produce_sell'] = isset($sell)?$sell->cell:null;*/

			$this->content['panels_data'] = array('basket' => array());
		}
		$this->content['title'] = "Заказ";
		$this->content['subclass'] = "catalog order_card";
		$this->content['content'] = array('catalog' => '');
		return $this->content;
	}

	private function sell_val($price) {
		if ($price > 5000000)
			return 20;
		else
		if ($price > 1500000)
			return 15;
		else
		if ($price > 1000000)
			return 10;
		else
		if ($price > 500000)
			return 5;
		return 0;
	}

	private function sell_price($price) {
		return floor(floor($price-($price*($this->sell_val($price)/100)))/10)*10;
	}
}
?>