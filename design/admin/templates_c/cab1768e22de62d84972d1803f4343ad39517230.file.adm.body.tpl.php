<?php /* Smarty version Smarty-3.1.8, created on 2014-03-27 09:21:58
         compiled from "design/admin/templates/adm.body.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6982516315333b57685f094-21874476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cab1768e22de62d84972d1803f4343ad39517230' => 
    array (
      0 => 'design/admin/templates/adm.body.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6982516315333b57685f094-21874476',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subject' => 0,
    'SERVER_URL_NAME' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5333b576949e39_35348784',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333b576949e39_35348784')) {function content_5333b576949e39_35348784($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config('global.conf', $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<title>Панель управления | учётная запись: <?php echo $_smarty_tpl->tpl_vars['subject']->value['info']['login'];?>
 (<?php echo $_smarty_tpl->tpl_vars['subject']->value['info']['name'][0];?>
 <?php echo $_smarty_tpl->tpl_vars['subject']->value['info']['name'][1];?>
)</title>
	
	<script src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('jquery_min');?>
" 			language="JavaScript" type="text/javascript"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('jquery_ui_min');?>
" 		language="JavaScript" type="text/javascript"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('jquery_zclip_min');?>
" 	language="JavaScript" type="text/javascript"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('jquery_cookie');?>
" 		language="JavaScript" type="text/javascript"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('datetime_picker');?>
" 	language="JavaScript" type="text/javascript"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('main');?>
" 				language="JavaScript" type="text/javascript"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('fullajax');?>
" 			language="JavaScript" type="text/javascript"></script>
	<link href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('ui_theme');?>
"			rel="stylesheet" type="text/css" />
	<link href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('styles');?>
" 		rel="stylesheet" type="text/css" />
	<link href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('tabs');?>
" 		rel="stylesheet" type="text/css" />
	<link href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('tablesorte');?>
"	rel="stylesheet" type="text/css" />
	<link rel="SHORTCUT ICON" href="/favicon.ico" type="image/x-icon" />
</head>

<body>
	<table id="root">
		<tr>
			<td id="up">
				<div id="pagetitle">
					<div id="logotextadmin">Панель управления | учётная запись: <?php echo $_smarty_tpl->tpl_vars['subject']->value['info']['login'];?>
 (<?php echo $_smarty_tpl->tpl_vars['subject']->value['info']['name'][0];?>
 <?php echo $_smarty_tpl->tpl_vars['subject']->value['info']['name'][1];?>
)</div>
					<form id="logoff" method="post" action="http://<?php echo $_SERVER['SERVER_NAME'];?>
">
						<input name="logoff" type="hidden" value="true" />
						<div class="autorr_01">
							<div id="close" onClick="document.getElementById('logoff').submit();" title="Завершить сеанс <?php echo $_smarty_tpl->tpl_vars['subject']->value['info']['login'];?>
"></div>
						</div>
					</form>
				</div>
				<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>
/design/admin/templates/images/empty.gif" width="900px" height="1px" style="margin: -1px 0px 0px 0px; height: 1px; position: relative; display: block;" />
			</td>
		</tr>
		<tr>
			<td id="center">
				<table id="page">
					<tr>
						<td id="left" style="width: <?php echo $_smarty_tpl->tpl_vars['page']->value['cookie']['separate'];?>
px">
							<div id="title">Разделы сайта</div>
							<div id="mainmenu">
								<?php echo $_smarty_tpl->getSubTemplate ("adm.menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

							</div>
						</td>
						<td id="sep"></td>
						<td id="right">
							<div id="title"><?php echo $_smarty_tpl->getSubTemplate ("adm.location.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<span id="grouptitle"></span></div>
							<div id="content">
								<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page']->value['page_tpl'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html><?php }} ?>