<?php /* Smarty version Smarty-3.1.8, created on 2014-06-24 13:04:02
         compiled from "design/client/templates\module.text_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3245753a93f0200b063-76138800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd04e27edf814d817fddbf207bf5f24239afe9e96' => 
    array (
      0 => 'design/client/templates\\module.text_page.tpl',
      1 => 1403596861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3245753a93f0200b063-76138800',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53a93f022167d3_53715607',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53a93f022167d3_53715607')) {function content_53a93f022167d3_53715607($_smarty_tpl) {?>﻿					<div class="line_big"></div>
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