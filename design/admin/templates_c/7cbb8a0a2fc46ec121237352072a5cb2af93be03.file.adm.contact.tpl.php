<?php /* Smarty version Smarty-3.1.8, created on 2014-05-06 12:08:49
         compiled from "design/admin/templates/adm.contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2107369371536898918a0868-29173249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cbb8a0a2fc46ec121237352072a5cb2af93be03' => 
    array (
      0 => 'design/admin/templates/adm.contact.tpl',
      1 => 1395827320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2107369371536898918a0868-29173249',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
    'page' => 0,
    'SITE_SECTION_NAME' => 0,
    'SITE_SECTION_PAGE' => 0,
    'ischeck' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53689891a99835_40387953',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53689891a99835_40387953')) {function content_53689891a99835_40387953($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/script/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">

	tinyMCE.init({
		mode : "exact",
		elements : "text",
		theme : "advanced",
		theme_advanced_resizing : false,
		readonly : true,
		
		content_css : "<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
client/styles/main.css"

	});

</script> 

<div id="tabline"></div>


<div id="texts[0]" style="display: none">
	<table class="panels">
		<tr>
			<td class="panel">
				<div class="title">Заголовок описательной части и текстовое наполнение страницы</div>
				<div class="f_title">Заголовок страницы:</div>
				<div class="field"><?php if (!$_smarty_tpl->tpl_vars['page']->value['content']['title']){?><div class="empty_field">отсутствует</div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['title'];?>
<?php }?></div>
						
				<div class="f_title">Контактный телефон:</div>
				<div class="field"><?php if (!$_smarty_tpl->tpl_vars['page']->value['content']['phone']){?><div class="empty_field">отсутствует</div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['phone'];?>
<?php }?></div>
				
				<div class="f_title">Факс:</div>
				<div class="field"><?php if (!$_smarty_tpl->tpl_vars['page']->value['content']['fax']){?><div class="empty_field">отсутствует</div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['fax'];?>
<?php }?></div>
				
				<div class="f_title">E-Mail:</div>
				<div class="field"><?php if (!$_smarty_tpl->tpl_vars['page']->value['content']['email']){?><div class="empty_field">отсутствует</div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['email'];?>
<?php }?></div>						
				
				<div class="f_title">Skype:</div>
				<div class="field"><?php if (!$_smarty_tpl->tpl_vars['page']->value['content']['skype']){?><div class="empty_field">отсутствует</div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['skype'];?>
<?php }?></div>						
						
				<div class="f_title">Адрес (страна, город):</div>
				<div class="field"><?php if (!$_smarty_tpl->tpl_vars['page']->value['content']['address'][0]){?><div class="empty_field">отсутствует</div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['address'][0];?>
<?php }?></div>
				
				<div class="f_title">Адрес (улица, дом):</div>
				<div class="field"><?php if (!$_smarty_tpl->tpl_vars['page']->value['content']['address'][1]){?><div class="empty_field">отсутствует</div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['address'][1];?>
<?php }?></div>
				
				<div class="f_title">Вконтакте:</div>
				<div class="field"><?php if (!$_smarty_tpl->tpl_vars['page']->value['content']['vk']){?><div class="empty_field">отсутствует</div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['vk'];?>
<?php }?></div>
				
				<div class="f_title">FaceBook:</div>
				<div class="field"><?php if (!$_smarty_tpl->tpl_vars['page']->value['content']['fb']){?><div class="empty_field">отсутствует</div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['fb'];?>
<?php }?></div>
				
				<div class="f_title">Одноклассники:</div>
				<div class="field"><?php if (!$_smarty_tpl->tpl_vars['page']->value['content']['od']){?><div class="empty_field">отсутствует</div><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['od'];?>
<?php }?></div>
				
				<div class="clear"><!-- --></div>
			</td>
		</tr>
	</table>
	<div class="panel-operation">
		<input class="button" id="add" type="button" value="Редактировать" onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>:action=edit'" />
	</div>
</div>

<div id="texts[1]" style="display: none">
	<form action="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>" method="post" onsubmit="javascript:button.disable(getElementById('submit'))">
		<input type="hidden" name="action" value="saveattach" />
		<table class="panels">
			<tr>
				<td class="panel">
				<div class="title">Подключение боковых панелей</div>
					<table>
						<tr>
							<td>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['name'] = 'pleft';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels_list']['left']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total']);
?>
			<?php $_smarty_tpl->tpl_vars["ischeck"] = new Smarty_variable(false, null, 0);?>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['name'] = 'tstchech';
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels']['left']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total']);
?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value['panels']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['tstchech']['index']]==$_smarty_tpl->tpl_vars['page']->value['panels_list']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['pleft']['index']]['id']){?>
					<?php $_smarty_tpl->tpl_vars["ischeck"] = new Smarty_variable(true, null, 0);?>
			<?php }?>
			<?php endfor; endif; ?>
								<label><input name="panel[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['panels_list']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['pleft']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['ischeck']->value==true){?>checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['page']->value['panels_list']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['pleft']['index']]['name'];?>
</label><br />
		<?php endfor; endif; ?>
							</td>
							<td>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pright'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['name'] = 'pright';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels_list']['right']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total']);
?>
			<?php $_smarty_tpl->tpl_vars["ischeck"] = new Smarty_variable(false, null, 0);?>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['name'] = 'tstchech';
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels']['right']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total']);
?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value['panels']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['tstchech']['index']]==$_smarty_tpl->tpl_vars['page']->value['panels_list']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['pright']['index']]['id']){?>
					<?php $_smarty_tpl->tpl_vars["ischeck"] = new Smarty_variable(true, null, 0);?>
			<?php }?>
			<?php endfor; endif; ?>
								<label><input name="panel[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['panels_list']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['pright']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['ischeck']->value==true){?>checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['page']->value['panels_list']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['pright']['index']]['name'];?>
</label><br />
		<?php endfor; endif; ?>
							</td>
						</tr>
					</table>
				</td>
				<td class="panel meta">
					<div class="title">Заголовки, meta, шаблон</div>
					<div class="form">
						<div class="f_title">Заголовок страницы</div><input class="text" name="title" type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['header']['title'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['header']['title'];?>
<?php }?>" />
						<div class="f_title">Keywords</div><div class="border"><textarea name="keywords" style="height: 80px;"><?php if (!empty($_smarty_tpl->tpl_vars['page']->value['header']['keywords'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['header']['keywords'];?>
<?php }?></textarea></div>
						<div class="f_title">Description</div><div class="border"><textarea name="description" style="height: 100px;"><?php if (!empty($_smarty_tpl->tpl_vars['page']->value['header']['description'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['header']['description'];?>
<?php }?></textarea></div>
						<div class="f_title">Шаблон</div>
						<select name="tpl">
							<option value="null" style=" color: #C0C0C0" selected="selected">По умолчанию</option>
							<!--<option value="module.index.tpl">module.index.tpl</option>
							<option value="module.text_page.tpl">module.text_page.tpl</option>-->
						</select>
					</div>
				</td>
			</tr>
		</table>
		<input class="button" id="submit" type="submit" value="Обновить" />
	</form>
</div>

<script language="javascript">
	marks.init(new Array(new Array('mark1','Содержимое страницы',150),
						 new Array('mark2','Настройки',85)), "tabline", "texts", <?php if ($_smarty_tpl->tpl_vars['page']->value['mark']!=''){?><?php echo $_smarty_tpl->tpl_vars['page']->value['mark'];?>
<?php }else{ ?>0<?php }?>, "top.gif", "sel", "top_grey.gif", "no_sel");
</script><?php }} ?>