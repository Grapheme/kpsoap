<?php /* Smarty version Smarty-3.1.8, created on 2014-05-06 12:09:29
         compiled from "design/admin/templates/adm.access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112819439536898b9e8d577-26822893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '262596a9a77224ec221db3e7e45e1fbd8e2d0117' => 
    array (
      0 => 'design/admin/templates/adm.access.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112819439536898b9e8d577-26822893',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
    'page' => 0,
    'site_section' => 0,
    'new_site_section' => 0,
    'SITE_SECTION_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_536898ba21a404_58063670',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536898ba21a404_58063670')) {function content_536898ba21a404_58063670($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
if (!is_callable('smarty_modifier_truncate')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.truncate.php';
?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('ui_tablesorter');?>
"></script><table id="roles" class="tablesorter">	<thead>		<tr>			<th class="id"><div>ID</div></th>			<th class="role"><div>Роль</div></th>			<th class="roledesc"><div>Описание</div></th>			<th><div>Права доступа</div></th>			<th class="oper" onclick="void(0)">&nbsp;</th>		</tr>	</thead>	<tbody>	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['roles'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['roles']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['name'] = 'roles';
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['roles']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['roles']['total']);
?>		<tr>			<td><?php if ($_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['id']<0){?><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['id'],"/[\-]+/","&bull;&nbsp;");?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['id'];?>
<?php }?></td>			<td><?php echo $_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['name'];?>
</td>			<td width="100px">				<?php if ($_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['description']==''){?>					<span class="empty">Отсутствует</span>				<?php }else{ ?>					<span class="descript"><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['description']),30,'');?>
</span>				<?php }?>			</td>			<td class="roledesc">				<?php $_smarty_tpl->tpl_vars["site_section"] = new Smarty_variable("_", null, 0);?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['name'] = 'sitesection';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['rights']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['total']);
?><?php if ($_smarty_tpl->getVariable('smarty')->value['section']['sitesection']['first']){?><div id="right_full_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['roles']['iteration'];?>
" class="window_fulltext"><div class="close" onclick="showWindow.close('right_full_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['roles']['iteration'];?>
');"></div><ul class="right_list"><?php }?><?php $_smarty_tpl->tpl_vars["new_site_section"] = new Smarty_variable(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['rights'][$_smarty_tpl->getVariable('smarty')->value['section']['sitesection']['index']]['description'],"/\[(.+)\].*/","\\1"), null, 0);?><?php if (($_smarty_tpl->tpl_vars['site_section']->value==$_smarty_tpl->tpl_vars['new_site_section']->value)){?>,<?php }elseif(($_smarty_tpl->tpl_vars['site_section']->value!=$_smarty_tpl->tpl_vars['new_site_section']->value)){?><?php if ($_smarty_tpl->tpl_vars['site_section']->value!="_"){?>&nbsp;)</li><?php }?><li><?php echo $_smarty_tpl->tpl_vars['new_site_section']->value;?>
 (<?php $_smarty_tpl->tpl_vars["site_section"] = new Smarty_variable($_smarty_tpl->tpl_vars['new_site_section']->value, null, 0);?><?php }?><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['rights'][$_smarty_tpl->getVariable('smarty')->value['section']['sitesection']['index']]['description'],"/\[.+\]/"," ");?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['sitesection']['last']){?> )</li></ul></div><?php }?><?php endfor; endif; ?><?php $_smarty_tpl->tpl_vars["site_section"] = new Smarty_variable("_", null, 0);?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['name'] = 'sitesection';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['rights']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sitesection']['total']);
?><?php if ($_smarty_tpl->getVariable('smarty')->value['section']['sitesection']['first']){?><div class="right_list" onclick="showWindow.open('right_full_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['roles']['iteration'];?>
')"><?php }?><?php $_smarty_tpl->tpl_vars["new_site_section"] = new Smarty_variable(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['rights'][$_smarty_tpl->getVariable('smarty')->value['section']['sitesection']['index']]['description'],"/\[(.+)\].*/","\\1"), null, 0);?><?php if (($_smarty_tpl->tpl_vars['site_section']->value!=$_smarty_tpl->tpl_vars['new_site_section']->value)){?><?php echo $_smarty_tpl->tpl_vars['new_site_section']->value;?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['sitesection']['last']){?>, <?php }else{ ?></div><?php }?><?php $_smarty_tpl->tpl_vars["site_section"] = new Smarty_variable($_smarty_tpl->tpl_vars['new_site_section']->value, null, 0);?><?php }?><?php endfor; else: ?><span class="empty">Отсутствуют</span><?php endif; ?>				</td>			<td class="oper">				<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/:action=edit&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['id'];?>
" title="Редактировать"><div class="edit"></div></a>				<?php if ($_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['id']>0){?>					<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/:action=del&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['id'];?>
"title="Удалить"onclick="return confirm('Удалить роль &quot;<?php echo $_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['name'];?>
&quot; (id: <?php echo $_smarty_tpl->tpl_vars['page']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['roles']['index']]['id'];?>
) ?')"><div class="del"></div></a>				<?php }?>			</td>		</tr><?php endfor; endif; ?>	</tbody></table><input class="button" id="add" type="button" value="Добавить" onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/:action=add'" /><script language="javascript">	//marks.init(new Array(new Array('mark1','Управление субъектами',150)), "tabline", "texts", <?php if ($_smarty_tpl->tpl_vars['page']->value['mark']!=''){?><?php echo $_smarty_tpl->tpl_vars['page']->value['mark'];?>
<?php }else{ ?>0<?php }?>, "top.gif", "sel", "top_grey.gif", "no_sel");	$(document).ready(function() {	// ---- tablesorter -----		$("#roles").tablesorter({			sortList:[[0,0]],			widgets: ['zebra']		});	// ---- tablesorter -----	});</script><?php }} ?>