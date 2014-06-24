<?php /* Smarty version Smarty-3.1.8, created on 2014-03-26 15:51:13
         compiled from "design/client/templates/submenu.blog_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7262395265332bf314b0b12-15449103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac98703adf8294d88a229017989ad6fe54162d3a' => 
    array (
      0 => 'design/client/templates/submenu.blog_list.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7262395265332bf314b0b12-15449103',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'num' => 0,
    'row' => 0,
    'SITE_SECTION_PAGE' => 0,
    'SITE_SECTION_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5332bf315494b1_24764995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332bf315494b1_24764995')) {function content_5332bf315494b1_24764995($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
?><div class="tags">
	<p>ТЕГИ</p>
	<?php $_smarty_tpl->tpl_vars["num"] = new Smarty_variable("0", null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['tagmenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
		<!--<?php echo $_smarty_tpl->tpl_vars['num']->value++;?>
-->
		<?php if (preg_match('#^tag_#',$_smarty_tpl->tpl_vars['row']->value['alias'])){?>
			<?php if (isset($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)&&$_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value==$_smarty_tpl->tpl_vars['row']->value['alias']){?>
	<a class="selected" href="/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
<?php if ($_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value!=''){?>/<?php }?><?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
<?php if ($_smarty_tpl->tpl_vars['row']->value['alias']!=''){?>/<?php }?>"><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row']->value['title'],"/\[!-\]([0-9]+)\[-!\]/"," <small>(\\1)</small>");?>
</a><?php if ($_smarty_tpl->tpl_vars['num']->value<count($_smarty_tpl->tpl_vars['page']->value['tagmenu'])){?>,<?php }else{ ?>.<?php }?>
			<?php }else{ ?>
	<a href="/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
<?php if ($_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value!=''){?>/<?php }?><?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
<?php if ($_smarty_tpl->tpl_vars['row']->value['alias']!=''){?>/<?php }?>"><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row']->value['title'],"/\[!-\]([0-9]+)\[-!\]/"," <small>(\\1)</small>");?>
</a><?php if ($_smarty_tpl->tpl_vars['num']->value<count($_smarty_tpl->tpl_vars['page']->value['tagmenu'])){?>,<?php }else{ ?>.<?php }?>
			<?php }?>
		<?php }?> 
	<?php } ?>
</div><?php }} ?>