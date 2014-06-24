<?php /* Smarty version Smarty-3.1.8, created on 2014-03-27 09:21:58
         compiled from "design/admin/templates/adm.menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11542109335333b576953890-44945929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c12d00d1d5f178d831cd8c3617b79db5babb8fe7' => 
    array (
      0 => 'design/admin/templates/adm.menu.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11542109335333b576953890-44945929',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu_list' => 0,
    'SITE_SECTION_NAME' => 0,
    'SITE_SECTION_PAGE' => 0,
    'SERVER_URL_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5333b576b09e32_80120059',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333b576b09e32_80120059')) {function content_5333b576b09e32_80120059($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
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
	<?php if ($_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value==$_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias']){?>
	<div id="line_sel"><div class="main"><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['name'];?>
</div></div><?php if (empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php if (is_array($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'])){?><div class="sub"><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['name'] = 'subpage';
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['total']);
?><a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
/<?php if (!preg_match('/^(_|__)$/',$_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['alias'])){?><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['alias'];?>
/<?php }else{ ?>" class="base sel<?php }?>"><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['menutitle'];?>
</a><?php if (!preg_match('/^(_|__)$/',$_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['alias'])){?><a class="del" href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['alias'];?>
/:action=delgroup" onclick="return confirm('Удалить подраздел &quot;<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['menutitle'];?>
&quot;')"></a><?php }else{ ?><div class="base-mode<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['alias'];?>
"><!-- --></div><?php }?><?php endfor; endif; ?><?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_subpages']==true){?><div class="but_menu"><input class="button" type="button" value="Добавить подраздел" onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
/:action=addgroup'" style="margin: 2px 2px 0px 0px; width: 120px;" /></div><?php }?></div><?php }elseif(!empty($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['menu']['index']]['subpage'])){?><div class="sub"><div class="but_menu"><input class="button" type="button" value="Добавить подраздел" onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
/:action=addgroup'" style="margin: 2px 2px 0px 0px; width: 120px;" /></div></div><?php }?><?php }elseif(!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php if (is_array($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'])){?><div class="sub"><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['name'] = 'subpage';
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['subpage']['total']);
?><?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['alias']==$_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value){?><div class="sel"><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['menutitle'];?>
</div><a class="del" href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/:action=delgroup" onclick="return confirm('Удалить подраздел &quot;<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['menutitle'];?>
&quot;')"></a><?php }else{ ?><a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
/<?php if (!preg_match('/^(_|__)$/',$_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['alias'])){?><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['alias'];?>
/<?php }else{ ?>" class="base<?php }?>"><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['menutitle'];?>
</a><?php if (!preg_match('/^(_|__)$/',$_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['alias'])){?><a class="del" href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/:action=delgroup" onclick="return confirm('Удалить подраздел &quot;<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['menutitle'];?>
&quot;')"></a><?php }else{ ?><div class="base-mode<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['subpage'][$_smarty_tpl->getVariable('smarty')->value['section']['subpage']['index']]['alias'];?>
"><!-- --></div><?php }?><?php }?><?php endfor; endif; ?><?php if ($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_subpages']==true){?><div class="but_menu"><input class="button" type="button" value="Добавить подраздел" onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
/:action=addgroup'" style="margin: 2px 2px 0px 0px; width: 120px;" /></div><?php }?></div><?php }?><?php }?>
	<?php }else{ ?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php if (!empty($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['menu']['index']]['alias'])){?><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
/<?php }?>" class="main"><div class="main"><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['name'];?>
</div></a>
	<?php }?>
<?php endfor; endif; ?><?php }} ?>