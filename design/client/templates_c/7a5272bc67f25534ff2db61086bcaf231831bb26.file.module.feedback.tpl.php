<?php /* Smarty version Smarty-3.1.8, created on 2014-03-26 19:43:46
         compiled from "design/client/templates/module.feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8492436275332f5b247bc23-23538160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a5272bc67f25534ff2db61086bcaf231831bb26' => 
    array (
      0 => 'design/client/templates/module.feedback.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8492436275332f5b247bc23-23538160',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5332f5b24cee53_84444734',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332f5b24cee53_84444734')) {function content_5332f5b24cee53_84444734($_smarty_tpl) {?>					<div class="basket-panel">
						<div class="top"><!-- --></div>
						<div class="content<?php if (isset($_smarty_tpl->tpl_vars['page']->value['feedback_success'])){?> success<?php }?>">
							<?php if (isset($_smarty_tpl->tpl_vars['page']->value['feedback_success'])){?>
							<h1>Обратная связь</h1>
							<p>Спасибо! Ваше сообщение успешно<br />отправлено.</p>
							<?php }else{ ?>
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
							<?php }?>
						</div>
						<div class="bottom"><!-- --></div>
					</div><?php }} ?>