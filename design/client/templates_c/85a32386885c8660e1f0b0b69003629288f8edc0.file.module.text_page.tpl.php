<?php /* Smarty version Smarty-3.1.8, created on 2014-12-01 13:34:34
         compiled from "design/client/templates/module.text_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2903039125332bf1c657625-22807736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85a32386885c8660e1f0b0b69003629288f8edc0' => 
    array (
      0 => 'design/client/templates/module.text_page.tpl',
      1 => 1417426464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2903039125332bf1c657625-22807736',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5332bf1c6b4658_04492740',
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332bf1c6b4658_04492740')) {function content_5332bf1c6b4658_04492740($_smarty_tpl) {?>﻿					<div class="line_big"></div>
					<h1><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['title'];?>
</h1>
<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['submenu_tpl'])){?>
					<div class="column left">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page']->value['submenu_tpl'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					</div>
					<div class="column right">
					<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['text'];?>

					</div>
					<div class="clear"></div>
<?php }else{ ?>
					<div class="column center">
					<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['text'];?>

					</div>
<?php }?><?php }} ?>