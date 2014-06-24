<?php /* Smarty version Smarty-3.1.8, created on 2014-03-27 09:21:58
         compiled from "design/admin/templates/adm.main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5269444305333b576c02dc3-45601381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11d66f930cab1f4047f9e5d515ad239bb7bea692' => 
    array (
      0 => 'design/admin/templates/adm.main.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5269444305333b576c02dc3-45601381',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
    'menu_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5333b576c49ef0_27950382',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333b576c49ef0_27950382')) {function content_5333b576c49ef0_27950382($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
?><table class="panels">	<tr>		<td class="panel">			<div class="title" style="text-align: center"><h2>Панель управления <b><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value,"/^http:\/\/([^\/]*)\/"."$"."/i","$"."1");?>
</b></h2></div>			<div class="main-page">				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
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
?>					<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php if (!empty($_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['menu']['index']]['alias'])){?><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
/<?php }?>"><img src="/module/admin/ico.<?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['alias'];?>
.png" width="160" height="160" /><br /><?php echo $_smarty_tpl->tpl_vars['menu_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['name'];?>
</a>				<?php endfor; endif; ?>				</tr>			</div>		</td>	</tr></table><?php }} ?>