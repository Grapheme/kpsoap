<?php /* Smarty version Smarty-3.1.8, created on 2014-05-06 12:09:23
         compiled from "design/admin/templates/adm.subjects.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2095550026536898b3bf02c9-29557883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83edca145800b3fe73b5df186227305f2e43e47d' => 
    array (
      0 => 'design/admin/templates/adm.subjects.tpl',
      1 => 1395827320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2095550026536898b3bf02c9-29557883',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
    'page' => 0,
    'SITE_SECTION_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_536898b4069376_11549048',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536898b4069376_11549048')) {function content_536898b4069376_11549048($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
if (!is_callable('smarty_modifier_truncate')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.truncate.php';
?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('ui_tablesorter');?>
"></script><div id="tabline"></div><div id="texts[0]" style="display: none">	<table id="subject_list" class="tablesorter">  	<thead>    	<tr>        <th class="id"><div>ID</div></th>        <th class="sort"><div>Сорт</div></th>        <th><div>ФИО</div></th>        <th class="info"><div>Информация</div></th>        <th class="desc"><div>Группы/Роли</div></th>        <th class="prep"><div>Лич.&nbsp;стр</div></th>        <th class="oper" onclick="void(0)">&nbsp;</th>			</tr>    </thead>    <tbody>	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['name'] = 'subject_list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['subject_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['subject_list']['total']);
?>      <tr>        <td><?php if ($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['id']<0){?><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['id'],"/[\-]+/","&bull;&nbsp;");?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['id'];?>
<?php }?></td>        <td><?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['priority'];?>
</td>        <td><?php if ($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['photoname']!=''){?><div id="photo_preview_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['iteration'];?>
" class="photo_preview"><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>
/img-dbimage/<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['photoname'],"/([0-9]+)\.(jpg|png|gif)/i","\\1-\\2");?>
-200xauto-85.<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['photoname'],"/[0-9]+\.(jpg|png|gif)/i","\\1");?>
" width="200px" title="Закрыть" onclick="showWindow.close('photo_preview_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['iteration'];?>
');" /></div><?php }?><span class="subject_<?php if ($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['photoname']==''){?>no_<?php }?>img"<?php if ($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['photoname']!=''){?> onclick="showWindow.open('photo_preview_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['iteration'];?>
')" <?php }?>><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['name'] = 's_name';
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['name']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total']);
?><?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['name'][$_smarty_tpl->getVariable('smarty')->value['section']['s_name']['index']];?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['s_name']['last']){?> <?php }?><?php endfor; endif; ?></span></td>        <td>        													<div id="right_full_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['iteration'];?>
" class="window_fulltext width2">							<div class="close" onclick="showWindow.close('right_full_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['iteration'];?>
');"></div>							<div class="text_group">								<b>ФИО:</b> <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['name'] = 's_name';
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['name']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total']);
?><?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['name'][$_smarty_tpl->getVariable('smarty')->value['section']['s_name']['index']];?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['s_name']['last']){?> <?php }?><?php endfor; endif; ?></div><div class="text_group">								<b>Логин:</b> <?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['login'];?>
<br />								<b>Пароль:</b> <?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['password'];?>
							</div>							<div class="text_group">								<b>Алиас:</b> <?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['alias'];?>
<br />								<b>Статус:</b> <?php if ($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['personal_page']||$_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['is_teacher']){?><?php if ($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['is_teacher']){?>Преподаватель<?php }else{ ?>Имеет личную страничку<?php }?><?php }else{ ?>Субъект<?php }?>							</div>							<?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['description'], $tmp)>30){?>							<div class="text_group">								<b>Дополнительная информация:</b><br />								<div class="dof_info">								<?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['description'];?>
								</div>							</div>							<?php }?>						</div>												          	<span class="descript d_point" onclick="showWindow.open('right_full_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['iteration'];?>
')"><span class="full_info">Просмотреть</span></span>        	       	</td>        <td width="150px">									<span class="descript">• Роли (<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['name'] = 'subjects_role';
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['subjects_role']['cell']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['total']);
?><?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['subjects_role']['cell'][$_smarty_tpl->getVariable('smarty')->value['section']['subjects_role']['index']]['name'];?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['subjects_role']['last']){?>, <?php }else{ ?>)<?php }?><?php endfor; endif; ?></span>					<?php if ($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['subjects_group']['num_rows']>0){?>						<br /><span class="descript">• Группы (<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['name'] = 'subjects_group';
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['subjects_group']['cell']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_group']['total']);
?><?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['subjects_group']['cell'][$_smarty_tpl->getVariable('smarty')->value['section']['subjects_group']['index']]['name'];?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['subjects_group']['last']){?>, <?php }else{ ?>)<?php }?><?php endfor; endif; ?></span>					<?php }?>									</td>        <td><?php if ($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['personal_page']||$_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['is_teacher']){?><?php if ($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['is_teacher']){?><span title="Субъект отмечен как Преподаватель">Да (ПРЕП)</span><?php }else{ ?>Да<?php }?><?php }else{ ?>Нет<?php }?></td>        <td class="oper">        	<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/:action=edit&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['id'];?>
" title="Редактировать"><div class="edit"></div></a>        	<?php if ($_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['id']>0){?>        		<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/:action=del&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['id'];?>
"title="Удалить"onclick="return confirm('Удалить субъект &quot;<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['name'] = 's_name';
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['name']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total']);
?><?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['name'][$_smarty_tpl->getVariable('smarty')->value['section']['s_name']['index']];?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['s_name']['index']<($_smarty_tpl->getVariable('smarty')->value['section']['s_name']['total']-1)){?>&nbsp;<?php }?><?php endfor; endif; ?>&quot; (id: <?php echo $_smarty_tpl->tpl_vars['page']->value['subject_list'][$_smarty_tpl->getVariable('smarty')->value['section']['subject_list']['index']]['id'];?>
) ?')"><div class="del"></div></a>        	<?php }?>        </td>      </tr>  <?php endfor; endif; ?>  	</tbody>  </table>  <input class="button" id="add" type="button" value="Добавить" onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/:action=add'" /></div><div id="texts[1]" style="display: none">	<table id="group_list" class="tablesorter">  	<thead>    	<tr>        <th class="id"><div>ID</div></th>        <th class="alias"><div>Алиас</div></th>        <th class="sort"><div>Сорт</div></th>        <th><div>Имя&nbsp;группы</div></th>        <th class="desc"><div>Описание</div></th>        <th class="desc"><div>Роли&nbsp;группы</div></th>        <th class="oper" onclick="void(0)">&nbsp;</th>			</tr>    </thead>    <tbody>	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['group_list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['group_list']);
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
?>      <tr>        <td><?php if ($_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['id']<0){?><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['id'],"/[\-]+/","&bull;&nbsp;");?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['id'];?>
<?php }?></td>        <td><?php echo $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['alias'];?>
</td>        <td><?php echo $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['priority'];?>
</td>        <td>        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['name'] = 's_name';
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['name']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total']);
?>        	<?php echo $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['name'][$_smarty_tpl->getVariable('smarty')->value['section']['s_name']['index']];?>
        <?php endfor; endif; ?>       	</td>        <td width="150px">        	<?php if ($_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['description']==''){?>        		<span class="empty">Отсутствует</span>          <?php }else{ ?>          	<?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['description'], $tmp)>30){?>						<div id="grdesc_full_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['group_list']['iteration'];?>
" class="window_fulltext width2 marleft50">							<div class="close" onclick="showWindow.close('grdesc_full_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['group_list']['iteration'];?>
');"></div>							<?php echo $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['description'];?>
						</div>												<?php }?>          	<span class="descript<?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['description'], $tmp)>30){?> d_point<?php }?>"<?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['description'], $tmp)>30){?> onclick="showWindow.open('grdesc_full_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['group_list']['iteration'];?>
')"<?php }?>><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['description']),30,"...");?>
</span>        	<?php }?>        </td>				<td width="150px">					<span class="descript">					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['name'] = 'subjects_role';
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['subjects_role']['cell']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['subjects_role']['total']);
?>						<?php echo $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['subjects_role']['cell'][$_smarty_tpl->getVariable('smarty')->value['section']['subjects_role']['index']]['name'];?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['subjects_role']['last']){?>, <?php }?>					<?php endfor; endif; ?>					</div>				</td>        <td class="oper">        	<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/:action=editgroup&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['id'];?>
" title="Редактировать"><div class="edit"></div></a>       		<?php if ($_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['id']>0){?>          	<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/:action=delgroup&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['id'];?>
"title="Удалить группу"onclick="return confirm('Удалить группу &quot;<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['name'] = 's_name';
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['name']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['s_name']['total']);
?><?php echo $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['name'][$_smarty_tpl->getVariable('smarty')->value['section']['s_name']['index']];?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['s_name']['index']<($_smarty_tpl->getVariable('smarty')->value['section']['s_name']['total']-1)){?>&nbsp;<?php }?><?php endfor; endif; ?>&quot; (id: <?php echo $_smarty_tpl->tpl_vars['page']->value['group_list'][$_smarty_tpl->getVariable('smarty')->value['section']['group_list']['index']]['id'];?>
) ?')"><div class="del"></div></a>        	<?php }?>        	</td>      </tr>  <?php endfor; endif; ?>  	</tbody>  </table>  <input class="button" id="add" type="button" value="Добавить" onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/:action=addgroup'" /></div><script language="javascript">	marks.init(new Array(new Array('mark1','Управление субъектами',150),											 new Array('mark2','Управление группами',130)), "tabline", "texts", <?php if ($_smarty_tpl->tpl_vars['page']->value['mark']!=''){?><?php echo $_smarty_tpl->tpl_vars['page']->value['mark'];?>
<?php }else{ ?>0<?php }?>, "top.gif", "sel", "top_grey.gif", "no_sel");	$(document).ready(function() {	// ---- tablesorter -----		$("#subject_list").tablesorter({			sortList:[[3,0]],			widgets: ['zebra']		});		$("#group_list").tablesorter({			sortList:[[2,0]],			widgets: ['zebra']		});	// ---- tablesorter -----	});</script><?php }} ?>