<?php /* Smarty version Smarty-3.1.8, created on 2014-03-27 09:21:55
         compiled from "design/admin/templates/adm.auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19387004285333b573576fe0-95160838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '389723260ef0b60f27c5b878f41dac99a50ec06f' => 
    array (
      0 => 'design/admin/templates/adm.auth.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19387004285333b573576fe0-95160838',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5333b5735e6fd8_31434211',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333b5735e6fd8_31434211')) {function content_5333b5735e6fd8_31434211($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config('global.conf', $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?><style>html, body {	height: 100%;	width: 100%;}</style><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">	<head>		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />		<title>Доступ закрыт</title>				<link href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('auth');?>
" rel="stylesheet" type="text/css" />	</head>	<body>		<table id="auth">			<tr>				<td valign="middle" align="center">					<form id="logon" method="post" action="http://<?php echo $_SERVER['SERVER_NAME'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
">					<input name="logon" type="hidden" value="true" />					<div id="authwindow">						<table>							<tr>								<td id="login"><input id="login" name="login" /></td>							</tr>							<tr>								<td id="password"><input id="password" name="password" type="password" /></td>							</tr>							<tr>								<td id="button"><input id="button" value="Войти" type="submit" /></td>							</tr>						</table>					</div>					</form>					<br /><br /><br /><br />				</td>			</tr>		</table>	</body></html><?php }} ?>