					<div class="basket-panel">
						<div class="top"><!-- --></div>
						<div class="content">
							{if count($page.panels_data.basket) > 0}
							<h1>Ваш заказ</h1>
							<div class="order-marks">
								<div class="item-basket" title="Корзина">
									{include file='panel.basket-order.tpl'}
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
							{else if isset($page.pay)}
								{if $page.pay.code == 'AlreadyPaid'}
							<h1 class="order-info">Информация о заказе №{$page.pay.id}</h1>
							<p class="centered">Уважаемый(ая) {$page.pay.name}, оплата за Ваш заказ уже произведена. Для подучения более подробной информации Вы можете обратиться к нам по бесплатному телефону {$page.contact.phone}.</p>
							<p class="centered">Благодарим за выбор нашего магазина!</p>
								{else if $page.pay.code == 'ErrorId'}
							<h1 class="order-info">Заказ не найден</h1>
							<p class="centered">Уважаемый Гость, к сожалению, мы не смогли найти запрашиваемый Вами заказ, возможно его не существует вовсе. Если Вы все же уверены, что заказ существует и Вам необходимо получить информацию или произвести оплату, Вы можете связаться с нами по бесплатному телефону {$page.contact.phone} и задать все интересующие Вас вопросы.</p>
								{else if $page.pay.code == 'PaySuccess'}
{*
http://kpsoap.git/order/:axah=out&action=success?inv_id=241&InvId=241&out_summ=10.000000&OutSum=10.000000&crc=1e12b35091e0f405744c7a73c9468f83&SignatureValue=1e12b35091e0f405744c7a73c9468f83&Culture=ru
*}
							<h1 class="order-info">Оплата произведена</h1>
							{*<p>В ближайшее время с Вами свяжется менеджер нашей компании. Так же заказ можно сделать по бесплатному телефону {$page.contact.phone} в наше рабочее время.</p>*}
							<p class="centered">Благодарим за выбор нашего магазина!</p>
								{else}
							<h1 class="order-info">Для того, чтобы совершить покупку</h1>
							<p class="centered">В ближайшее время с Вами свяжется менеджер нашей компании. Так же заказ можно сделать по бесплатному телефону {$page.contact.phone} в рабочее время, либо Вы можете оставить свой обратный телефон и мы Вам перезвоним!</p>
								{/if}
							{else}
							<div class="empty{if isset($page.order_success)} order-success{/if}">
								{if isset($page.order_success)}
								<h1>ВАШ ЗАКАЗ</h1>
								<div>Спасибо, что вы выбрали нашу продукцию!<br />
								Ваш заказ успешно принят.</div>
								<p>Номер вашего заказа <b>№ {$page.order_number}.</b></p>
								<p>На ваш электронный ящик мы выслали вам письмо с номером вашего заказа и образец платежного документа.</p>
								<p>Вернуться на <a href="/">главную страницу сайта.</a></p>
								{else}
								<h1>Ваша корзина пуста</h1>
								<p>У Вас нет покупок.</p>
								<a href="/catalog/">Перейти в магазин</a>
								{/if}
							</div>
							{/if}
						</div>
						<div class="bottom"><!-- --></div>
					</div>