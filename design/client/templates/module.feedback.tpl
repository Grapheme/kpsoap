					<div class="basket-panel">
						<div class="top"><!-- --></div>
						<div class="content{if isset($page.feedback_success)} success{/if}">
							{if isset($page.feedback_success)}
							<h1>Обратная связь</h1>
							<p>Спасибо! Ваше сообщение успешно<br />отправлено.</p>
							{else}
							<h1>Обратная связь</h1>
							<p class="descript">
								Форма обратной связи — самый быстрый и удобный способ<br />
								для вопросов, пожеланий и критики.
							</p>
							<form class="form-feedback" action="" method="post">
								<div class="field name">
									<span>Вас зовут</span>
									<input type="text" placeholder="" valid="text" maxlength="55" eout="field" error=";Укажите Ваше имя" ecolor="#ffffff:#de8785" />
									<div class="clear"><!-- --></div>
								</div>
								<div class="field e_mail">
									<span>Эл. почта</span>
									<input type="text" placeholder="" valid="email" maxlength="40" eout="field" error=";Пожалуйста заполните поле правильно" ecolor="#ffffff:#de8785" />
									<div class="clear"><!-- --></div>
								</div>
								<div class="field comment"> 
									<span>Сообщение</span>
									<div>
										<textarea></textarea>
									</div>
									<div class="clear"><!-- --></div>
								</div>
								<input type="submit" class="feedback" value="Отправить">
								<div class="clear"><!-- --></div>
								<input type="hidden" name="action" value="confirmfeedback" />
							</form>
							{/if}
						</div>
						<div class="bottom"><!-- --></div>
					</div>