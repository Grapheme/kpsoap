<?php /* Smarty version Smarty-3.1.8, created on 2014-10-28 13:54:52
         compiled from "design/client/templates/module.order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8731799885333996ac25798-04421673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff71e0bd4b66996f8533035675e233d26d3d6fd7' => 
    array (
      0 => 'design/client/templates/module.order.tpl',
      1 => 1414490025,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8731799885333996ac25798-04421673',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5333996ad9f001_33227849',
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333996ad9f001_33227849')) {function content_5333996ad9f001_33227849($_smarty_tpl) {?>					<div class="basket-panel">
						<div class="top"><!-- --></div>
						<div class="content">
							<?php if (count($_smarty_tpl->tpl_vars['page']->value['panels_data']['basket'])>0){?>
							<h1>Ваш заказ</h1>
							<div class="order-marks">
								<div class="item-basket" title="Корзина">
									<?php echo $_smarty_tpl->getSubTemplate ('panel.basket-order.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

									<a href="/catalog/" class="back-catalog">Вернуться в магазин</a>
								</div>
								<div class="item-order" title="Доставка и оплата">
									<form class="form-order" action="" method="post">
										<h4>Данные получателя</h4>
										<!--<div class="button autorization">Авторизация</div>-->
										<div class="field last_name">
											<span>Личные данные *</span>
											<input type="text" placeholder="Фамилия" valid="text" maxlength="25" ecolor="#ffffff:#de8785" eout="field" error="Ошибка;Не заполнено" />
										</div>
										<div class="field first_name">
											<input type="text" placeholder="Имя" valid="text" maxlength="25" ecolor="#ffffff:#de8785" eout="field" error="Ошибка;Не заполнено" />
										</div>
										<div class="field middle_name">
											<input type="text" placeholder="Отчество" valid="text" maxlength="25" ecolor="#ffffff:#de8785" eout="field" error="Ошибка;Не заполнено" />
										</div>
										<div class="clear"><!-- --></div>
										<div class="field phone">
											<span>Контакты *</span>
											<input type="text" placeholder="8-903-000-0000" valid="phone" maxlength="15" ecolor="#ffffff:#de8785" eout="field" error="Ошибка;Пусто или неверный формат" />
										</div>
										<div class="field e_mail">
											<input type="text" placeholder="mail@domain.ru" valid="email" maxlength="40" ecolor="#ffffff:#de8785" eout="field" error="Ошибка;Пусто или неверный формат" />
										</div>
										<div class="clear"><!-- --></div>
										<div class="field city">
											<span>Адрес *</span>
											<input type="text" placeholder="Город" valid="text" maxlength="40" ecolor="#ffffff:#de8785" eout="field" error="Ошибка;Укажите Ваш город" />
										</div>
										<div class="field zip">
											<input type="text" placeholder="Индекс" valid="text" maxlength="6" ecolor="#ffffff:#de8785" eout="field" error="Ошибка;XXXXXX" />
										</div>
										<div class="clear"><!-- --></div>
										<div class="field address">
											<span></span>
											<input type="text" placeholder="улица, дом (корпус), квартира (офис)" valid="text" maxlength="150" ecolor="#ffffff:#de8785" eout="field" error="Ошибка;Не заполнено, укажите Ваш настоящий адрес" />
										</div>
										<div class="clear"><!-- --></div>
										<div class="field comment">
											<span>Комментарии</span>
											<textarea></textarea>
										</div>
										<div class="clear"><!-- --></div>
										<p>Вы должны указать ваши подлинные данные, на ваше имя будет отправлен товар, так же с Вами предварительно свяжутся по указанному телефону.</p>
										<p>Поля помененные * обязательны для заполнения.</p>

										<h4 class="sub">Способ оплаты</h4>
										<div class="field payment">
											<label><input type="radio" value="Банковский перевод" description="" /> Банковский перевод</label>
											<p>При выборе этого способа оплаты менеджер вышлет вам номер карты (реквизиты) Сбербанка, на которую вы можете произвести оплату через систему “Сбербанк-онлайн”, банкомат или сделать перевод в ближайшем отделении банка.</p>

											<!--!!!--><label><input type="radio" value="Robokassa" description="" /> Электронные деньги</label>
											<p>Банковские карты, электронная валюта, сервис мобильной коммерции (МТС, Мегафон, Билайн), интернет-банк, банкоматы, терминалы мгновенной оплаты, система денежных переводов Contact, приложение для iOS(iPhone, iPad) / Android, Qiwi wallet, Яндекс Деньги, WebMoney, Элекснет, Visa, Mastercard, Альфа-Клик, Евросеть, Связной.</p><!--/!!!-->

											<label><input type="radio" value="Наложным платежом" description="" /> Наложенным платежом</label>
											<p>Оплата наличными при получении на Почте России</p>
										</div>
										<div class="description"><!-- --></div>
										<div class="clear"><!-- --></div>

										<input type="hidden" name="action" value="confirmorder" />
									</form>
								</div>
								<div class="item-success" title="Подтверждение">
									<h4>Заказчик</h4>
									<p class="name"></p>
									<h4>Адрес доставки</h4>
									<p class="address"></p>
									<h4>Ваш заказ</h4>
									<p class="order"></p>
									<h4>Способ оплаты</h4>
									<p class="payment"></p>
								</div>
							</div>
							<?php }elseif(isset($_smarty_tpl->tpl_vars['page']->value['pay'])){?>
								<?php if ($_smarty_tpl->tpl_vars['page']->value['pay']['code']=='AlreadyPaid'){?>
							<h1 class="order-info">Информация о заказе №<?php echo $_smarty_tpl->tpl_vars['page']->value['pay']['id'];?>
</h1>
							<p class="centered">Уважаемый(ая) <?php echo $_smarty_tpl->tpl_vars['page']->value['pay']['name'];?>
, оплата за Ваш заказ уже произведена. Для подучения более подробной информации Вы можете обратиться к нам по бесплатному телефону <?php echo $_smarty_tpl->tpl_vars['page']->value['contact']['phone'];?>
.</p>
							<p class="centered">Благодарим за выбор нашего магазина!</p>
								<?php }elseif($_smarty_tpl->tpl_vars['page']->value['pay']['code']=='ErrorId'){?>
							<h1 class="order-info">Заказ не найден</h1>
							<p class="centered">Уважаемый Гость, к сожалению, мы не смогли найти запрашиваемый Вами заказ, возможно его не существует вовсе. Если Вы все же уверены, что заказ существует и Вам необходимо получить информацию или произвести оплату, Вы можете связаться с нами по бесплатному телефону <?php echo $_smarty_tpl->tpl_vars['page']->value['contact']['phone'];?>
 и задать все интересующие Вас вопросы.</p>
								<?php }elseif($_smarty_tpl->tpl_vars['page']->value['pay']['code']=='PaySuccess'){?>

							<h1 class="order-info">Оплата произведена</h1>
							
							<p class="centered">Благодарим за выбор нашего магазина!</p>
								<?php }else{ ?>
							<h1 class="order-info">Для того, чтобы совершить покупку</h1>
							<p class="centered">В ближайшее время с Вами свяжется менеджер нашей компании. Так же заказ можно сделать по бесплатному телефону <?php echo $_smarty_tpl->tpl_vars['page']->value['contact']['phone'];?>
 в рабочее время, либо Вы можете оставить свой обратный телефон и мы Вам перезвоним!</p>
								<?php }?>
							<?php }else{ ?>
							<div class="empty<?php if (isset($_smarty_tpl->tpl_vars['page']->value['order_success'])){?> order-success<?php }?>">
								<?php if (isset($_smarty_tpl->tpl_vars['page']->value['order_success'])){?>
								<h1>ВАШ ЗАКАЗ</h1>
								<div>Спасибо, что вы выбрали нашу продукцию!<br />
								Ваш заказ успешно принят.</div>
								<p>Номер вашего заказа <b>№ <?php echo $_smarty_tpl->tpl_vars['page']->value['order_number'];?>
.</b></p>
								<p>На ваш электронный ящик мы выслали вам письмо с номером вашего заказа и образец платежного документа.</p>
								<p>Вернуться на <a href="/">главную страницу сайта.</a></p>
								<?php }else{ ?>
								<h1>Ваша корзина пуста</h1>
								<p>У Вас нет покупок.</p>
								<a href="/catalog/">Перейти в магазин</a>
								<?php }?>
							</div>
							<?php }?>
						</div>
						<div class="bottom"><!-- --></div>
					</div><?php }} ?>