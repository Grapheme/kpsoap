<?php /* Smarty version Smarty-3.1.8, created on 2014-06-24 13:04:02
         compiled from "design/client/templates\submenu.about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2708653a93f02222354-31635462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fea53d714b9ad54b55eaa1f0f57efb33784570e6' => 
    array (
      0 => 'design/client/templates\\submenu.about.tpl',
      1 => 1403596861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2708653a93f02222354-31635462',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu_list' => 0,
    'SITE_SECTION_PAGE' => 0,
    'SERVER_URL_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53a93f028e8af8_96672072',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53a93f028e8af8_96672072')) {function content_53a93f028e8af8_96672072($_smarty_tpl) {?>						<div class="submenu">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menu_list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total']);
?>
  <?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias']=="about"){?>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['submenu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['name'] = 'submenu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['submenu']['total']);
?>
			<?php if ($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value==$_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['submenu']['index']]['alias']){?>
							<a class="selected" href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
<?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias']!=''){?>/<?php }?><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['submenu']['index']]['alias'];?>
<?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['submenu']['index']]['alias']!=''){?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['submenu']['index']]['menutitle'];?>
</a>
			<?php }else{ ?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
<?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias']!=''){?>/<?php }?><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['submenu']['index']]['alias'];?>
<?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['submenu']['index']]['alias']!=''){?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['submenu']['index']]['menutitle'];?>
</a>
			<?php }?>
		<?php endfor; endif; ?>
	<?php }?>
<?php endfor; endif; ?>
						</div><?php }} ?>