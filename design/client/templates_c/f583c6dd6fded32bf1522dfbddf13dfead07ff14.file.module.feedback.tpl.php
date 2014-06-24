<?php /* Smarty version Smarty-3.1.8, created on 2014-06-24 13:04:10
         compiled from "design/client/templates\module.feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23953a93f0a321eb9-93168473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f583c6dd6fded32bf1522dfbddf13dfead07ff14' => 
    array (
      0 => 'design/client/templates\\module.feedback.tpl',
      1 => 1403596861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23953a93f0a321eb9-93168473',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53a93f0a456870_22872284',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53a93f0a456870_22872284')) {function content_53a93f0a456870_22872284($_smarty_tpl) {?>					<div class="basket-panel">
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