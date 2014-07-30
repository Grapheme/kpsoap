<?php /* Smarty version Smarty-3.1.8, created on 2014-07-04 11:23:32
         compiled from "design/admin/templates/adm.access_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22266654553b656748c5de9-86013390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31a394a430565b7570cb5b4bcf896d5b7e73e8de' => 
    array (
      0 => 'design/admin/templates/adm.access_edit.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22266654553b656748c5de9-86013390',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
    'SITE_SECTION_NAME' => 0,
    'page' => 0,
    'operation_group' => 0,
    'new_operation_group' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53b65674a08421_22805795',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b65674a08421_22805795')) {function content_53b65674a08421_22805795($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('tiny_mce');?>
"></script><script type="text/javascript">			tinyMCE.init({				mode : "textareas",				theme : "advanced",				language : "ru",				skin : "o2k7",				skin_variant : "default",				plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,images",				theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough",				theme_advanced_buttons2 : "",				theme_advanced_buttons3 : "",				theme_advanced_toolbar_location : "top",				theme_advanced_toolbar_align : "left",				theme_advanced_resizing : false,				content_css : "<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
client/styles/styles.css"			});</script> 	<form action="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/" method="post" onsubmit="javascript:button.disable(getElementById('submit'))">	<input type="hidden" name="action" value="save" />	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['edit_id'];?>
" />	<table class="panels">		<tr>			<td class="panel">				<div class="title">Новая роль</div>				<div class="form">					<div class="line">					<div class="f_title">Название</div><input class="text" name="name" type="text" maxlength="20" style="width: 150px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['role_info']['name'];?>
" /><br />					<div class="f_title">Описание</div><div class="border"><textarea name="description" style="width: 100%; height: 250px;"><?php echo $_smarty_tpl->tpl_vars['page']->value['role_info']['description'];?>
</textarea></div></div>
				</div>				<!--<div class="title">ВНИМАНИЕ</div>				<div class="form">						  Вы редактируете зарезервированную системную роль имеющую супер права. 				</div>				<?php echo $_smarty_tpl->tpl_vars['page']->value['edit_id'];?>
-->			</td>			<td class="panel right2">				<div class="title">Назначение прав для Роли</div>				<div class="form">					<div class="line">						<select name="operation_rights[]" multiple="multiple" style="width: 100%; height: 500px; background-color: #EEF5FC;">							<option value="null" style=" color: #C0C0C0" <?php if ($_smarty_tpl->tpl_vars['page']->value['operation_select_count']==0){?>selected="selected"<?php }?>>Права отсутствуют</option>						<?php $_smarty_tpl->tpl_vars["operation_group"] = new Smarty_variable("_", null, 0);?>						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['operation'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['operation']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['name'] = 'operation';
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['operation']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['operation']['total']);
?>                							<?php $_smarty_tpl->tpl_vars["new_operation_group"] = new Smarty_variable(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['operation'][$_smarty_tpl->getVariable('smarty')->value['section']['operation']['index']]['description'],"/\[(.+)\].*/","\\1"), null, 0);?>							<?php if (($_smarty_tpl->tpl_vars['operation_group']->value!=$_smarty_tpl->tpl_vars['new_operation_group']->value)){?>								<?php if ($_smarty_tpl->tpl_vars['operation_group']->value!="_"){?>							</optgroup>								<?php }?>							<optgroup label="<?php echo $_smarty_tpl->tpl_vars['new_operation_group']->value;?>
">								<?php $_smarty_tpl->tpl_vars["operation_group"] = new Smarty_variable($_smarty_tpl->tpl_vars['new_operation_group']->value, null, 0);?>							<?php }?>							<option value="<?php echo $_smarty_tpl->tpl_vars['page']->value['operation'][$_smarty_tpl->getVariable('smarty')->value['section']['operation']['index']]['id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['name'] = 'operation_select';
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['operation_select']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['operation_select']['total']);
?><?php if (($_smarty_tpl->tpl_vars['page']->value['operation_select'][$_smarty_tpl->getVariable('smarty')->value['section']['operation_select']['index']]['id_operation']==$_smarty_tpl->tpl_vars['page']->value['operation'][$_smarty_tpl->getVariable('smarty')->value['section']['operation']['index']]['id'])){?>selected="selected"<?php }?><?php endfor; endif; ?>><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['operation'][$_smarty_tpl->getVariable('smarty')->value['section']['operation']['index']]['description'],"/\[.+\]/"," ");?>
</option>							<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['sitesection']['last']){?> 							</optgroup>							<?php }?>						<?php endfor; endif; ?>						</select>					</div>				</div>			</td>		</tr>	</table>	<input class="button" type="button" value="Отмена" onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/'" />	<input class="button" id="submit" type="submit" value="Сохранить" /></form><?php }} ?>