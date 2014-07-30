<?php /* Smarty version Smarty-3.1.8, created on 2014-07-04 11:24:48
         compiled from "design/admin/templates/adm.subjects_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22113107053b656c080fa17-77193284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9927169df33637e4d57996456b2e411029ccf7c9' => 
    array (
      0 => 'design/admin/templates/adm.subjects_edit.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22113107053b656c080fa17-77193284',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
    'SITE_SECTION_NAME' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53b656c0931261_29302009',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b656c0931261_29302009')) {function content_53b656c0931261_29302009($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('tiny_mce');?>
"></script>
  <script type="text/javascript">

			tinyMCE.init({
				mode : "textareas",
				theme : "advanced",
				language : "ru",
				skin : "o2k7",
				skin_variant : "default",
				plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,images",
		 
				theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,images,cleanup,code,|,insertdate,preview,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : false,
		 
				content_css : "<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
client/styles/styles.css"

			});
		
  </script> 

<form action="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/" method="post" onsubmit="javascript:button.disable(getElementById('submit'))" enctype="multipart/form-data">
<input type="hidden" name="action" value="save" />
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['edit_id'];?>
" />
<table class="panels">
	<tr>
  	<td class="panel">
    	<div class="title">Новый субъект - общие данные</div>
      
      <div class="form">
        <div class="line">
        <div class="f_title">Логин</div><input class="text" name="login" type="text" maxlength="20" style="width: 150px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['login'];?>
" /><br />
        <div class="f_title">Пароль</div><input class="text" id="password" name="password" type="password" maxlength="20" style="width: 150px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['password'];?>
" /><br />
        <div class="f_title">Подтверждение</div><input class="text" id="passwordconf" name="passwordconf" type="password" maxlength="20" style="width: 150px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['password'];?>
" />
				<div style="margin: 3px 0px 3px 10px;"><label><input type="checkbox" onclick="if (this.checked) {
																																																	document.getElementById('password').type='text';
																																																	document.getElementById('passwordconf').type='text';
																																																} else {	
																																																	document.getElementById('password').type='password';
																																																	document.getElementById('passwordconf').type='password';
																																																}" />Показать пароль</label></div></div>
        
        <div class="line">
        <div class="f_title">Алиас</div><input class="text" name="alias" type="text" maxlength="100" style="width: 400px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['alias'];?>
" /><br />
        <div class="f_title">Приоритет</div><input class="text" name="priority" type="text" style="width: 50px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['priority'];?>
" /></div>
        
        <div class="line">
        <div class="f_title">Фамилия</div><input class="text" name="name0" type="text" maxlength="30" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['name'][0];?>
" /><br />
        <div class="f_title">Имя</div><input class="text" name="name1" type="text" maxlength="30" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['name'][1];?>
" /><br />
        <div class="f_title">Отчество</div><input class="text" name="name2" type="text" maxlength="30" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['name'][2];?>
" /></div>
        
        <div class="line">
        <div class="f_title">Описание</div><div class="border"><textarea name="description" style="width: 100%; height: 250px;"><?php echo $_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['description'];?>
</textarea></div></div>

        <div class="line">
					<div id="is_teacher"<?php if (($_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['personal_page'])){?> style="display: none"<?php }?>>
						<label><input name="is_teacher" type="checkbox" <?php if (($_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['is_teacher'])){?>checked="checked" <?php }?>onclick="if (this.checked) {
																																													document.getElementById('personal_page').style.display='none';
																																													document.getElementById('photoname').style.display='block';
																																												}	else {
																																													document.getElementById('personal_page').style.display='block';
																																													document.getElementById('photoname').style.display='none';
																																												}	" />Преподаватель</label><br />
					</div>
					<div id="personal_page"<?php if (($_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['is_teacher'])){?> style="display: none"<?php }?>>
						<label><input name="personal_page" type="checkbox" <?php if (($_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['personal_page'])){?>checked="checked" <?php }?>onclick=" if (this.checked) {
																																															document.getElementById('is_teacher').style.display='none';
																																															document.getElementById('photoname').style.display='block';
																																														}	else {
																																															document.getElementById('is_teacher').style.display='block';
																																															document.getElementById('photoname').style.display='none';
																																														}	" />Персональная страница</label><br />
					</div>
					<div id="photoname"<?php if ((!$_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['is_teacher']&&!$_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['personal_page'])){?> style="display: none"<?php }?>>
					<?php if ((($_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['is_teacher']||$_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['personal_page'])&&$_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['photoname']!='')){?>
						<div id="del_photo">
							<div class="pdelet"><div class="but" onclick="
																														document.getElementById('pdelet').value='delete';
																														document.getElementById('del_photo').style.display='none';
																														document.getElementById('del_photo_info').style.display='block';
																														document.getElementById('phtitle').innerHTML='Новая фотография:';
																														"></div></div>
							<input id="pdelet" name="pdelet" type="hidden" value="" />
							<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>
/img-dbimage/<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['photoname'],"/([0-9]+)\.(jpg|png|gif)/i","\\1-\\2");?>
-200xauto-85.<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['photoname'],"/[0-9]+\.(jpg|png|gif)/i","\\1");?>
" width="200px" />
						</div>
						<div id="del_photo_info" class="del_photo_info">Фотография удалена. <a href="javascript:void(0)" onclick="
																														document.getElementById('pdelet').value='';
																														document.getElementById('del_photo').style.display='block';
																														document.getElementById('del_photo_info').style.display='none';
																														document.getElementById('phtitle').innerHTML='Обновить фотографию:';
																														">Восстановить</a></div>
					<?php }?>
						<div class="f_title" id="phtitle"><?php if (($_smarty_tpl->tpl_vars['page']->value['subject_info'][0]['photoname']=='')){?>Новая фотография<?php }else{ ?>Обновить фотографию<?php }?>:</div>
						<input name="photoname" type="file" />
					</div>
				</div>
      </div>
      
    </td>
  	<td class="panel right">
    	<div class="title">Группы и Роли</div>
		
      <div class="form">
      	<div class="line">Принадлежность к группам<br />
        	<select name="group_list[]" multiple="multiple" style="width: 100%; height: 300px; background-color: #EEF5FC;">
          	<option value="null" style=" color: #C0C0C0" <?php if ($_smarty_tpl->tpl_vars['page']->value['subjects_in_group_count']==0){?>selected="selected"<?php }?>>Нет группы</option>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['group_list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['name'] = 'group_list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['group_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']['total']);
?>                
						<option value="<?php echo $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['name'] = 'subjects_in_group';
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['subjects_in_group']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_in_group']['total']);
?><?php if (($_smarty_tpl->tpl_vars['page']->value['subjects_in_group'][$_smarty_tpl->getVariable('smarty')->value['section']['subjects_in_group']['index']]['id_subject_in_group']==$_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['id'])){?> selected="selected" <?php }?><?php endfor; endif; ?>><?php echo $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['name'][0];?>
</option>
<?php endfor; endif; ?>
          </select>
        </div>
      	<div class="line">Дополнительные роли<br />
        	<select name="role_list[]" multiple="multiple" style="width: 100%; height: 300px; background-color: #EEF5FC">
          	<option value="null" style=" color: #C0C0C0" <?php if ($_smarty_tpl->tpl_vars['page']->value['roles_subjects_count']==0){?>selected="selected"<?php }?>>Нет ролей (только Гость)</option>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['role_list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['name'] = 'role_list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['role_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['role_list']['total']);
?>                
						<option value="<?php echo $_smarty_tpl->tpl_vars['page']->value['role_list'][$_smarty_tpl->getVariable('smarty')->value['section']['role_list']['index']]['id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['name'] = 'roles_subjects';
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['roles_subjects']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['roles_subjects']['total']);
?><?php if (($_smarty_tpl->tpl_vars['page']->value['roles_subjects'][$_smarty_tpl->getVariable('smarty')->value['section']['roles_subjects']['index']]['id_role']==$_smarty_tpl->tpl_vars['page']->value['role_list'][$_smarty_tpl->getVariable('smarty')->value['section']['role_list']['index']]['id'])){?> selected="selected" <?php }?><?php endfor; endif; ?>><?php echo $_smarty_tpl->tpl_vars['page']->value['role_list'][$_smarty_tpl->getVariable('smarty')->value['section']['role_list']['index']]['name'][0];?>
</option>
<?php endfor; endif; ?>
          </select>
        </div>
      </div>


    </td>
  </tr>
</table>
  <input class="button" type="button" value="Отмена" onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/'" />
  <input class="button" id="submit" type="submit" value="Сохранить" />
</form><?php }} ?>