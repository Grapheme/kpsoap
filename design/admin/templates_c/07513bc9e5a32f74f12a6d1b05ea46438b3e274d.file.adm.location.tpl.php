<?php /* Smarty version Smarty-3.1.8, created on 2014-03-27 09:21:58
         compiled from "design/admin/templates/adm.location.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2436900795333b576b148b7-09729998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07513bc9e5a32f74f12a6d1b05ea46438b3e274d' => 
    array (
      0 => 'design/admin/templates/adm.location.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2436900795333b576b148b7-09729998',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_SECTION_NAME' => 0,
    'SERVER_URL_NAME' => 0,
    'SITE_SECTION_PAGE' => 0,
    'menu_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5333b576bfa5a5_57068115',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333b576bfa5a5_57068115')) {function content_5333b576bfa5a5_57068115($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value==''){?><a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/">Панель управления</a><?php }elseif(!empty($_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value)&&empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/">Панель управления</a>&nbsp;&raquo;&nbsp;<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['location'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['location']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['name'] = 'location';
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menu_list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['location']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['location']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['location']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['location']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['location']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['location']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['total']);
?><?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['alias']==$_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value){?><a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['alias'];?>
/"><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['name'];?>
</a><?php }?><?php endfor; endif; ?><?php }elseif(!empty($_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value)&&!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/">Панель управления</a>&nbsp;&raquo;&nbsp;<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['location'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['location']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['name'] = 'location';
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menu_list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['location']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['location']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['location']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['location']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['location']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['location']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['location']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['location']['total']);
?><?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['alias']==$_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value){?><?php if (is_array($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['subpage'])){?><a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['alias'];?>
/"><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['name'];?>
</a>&nbsp;&raquo;&nbsp;<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['subloc'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['name'] = 'subloc';
$_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['subpage']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['subloc']['total']);
?><?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subloc']['index']]['alias']==$_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value){?><a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['alias'];?>
/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subloc']['index']]['alias'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subloc']['index']]['menutitle'];?>
</a><?php }?><?php endfor; endif; ?><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['location']['index']]['name'];?>
1<?php }?><?php }?><?php endfor; endif; ?><?php }?><?php }} ?>