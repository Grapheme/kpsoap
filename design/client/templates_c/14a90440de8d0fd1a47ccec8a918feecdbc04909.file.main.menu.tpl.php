<?php /* Smarty version Smarty-3.1.8, created on 2014-03-26 15:50:33
         compiled from "design/client/templates/main.menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13235520655332bf09c14297-81296146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14a90440de8d0fd1a47ccec8a918feecdbc04909' => 
    array (
      0 => 'design/client/templates/main.menu.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13235520655332bf09c14297-81296146',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu_list' => 0,
    'item' => 0,
    'SITE_SECTION_NAME' => 0,
    'SERVER_URL_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5332bf09c69f21_41159752',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332bf09c69f21_41159752')) {function content_5332bf09c69f21_41159752($_smarty_tpl) {?><div class="menu">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<?php if ($_smarty_tpl->tpl_vars['item']->value['alias']!=''&&$_smarty_tpl->tpl_vars['item']->value['alias']!="info"){?>
		<?php if ($_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value==$_smarty_tpl->tpl_vars['item']->value['alias']){?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['alias'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['alias']!=''){?>/<?php }?>" class="select"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>              
		<?php }else{ ?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['alias'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['alias']!=''){?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
		<?php }?>
	<?php }?>
<?php } ?>
	<div class="clear"><!-- --></div>
</div><?php }} ?>