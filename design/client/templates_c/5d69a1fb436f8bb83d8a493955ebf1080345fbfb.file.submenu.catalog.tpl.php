<?php /* Smarty version Smarty-3.1.8, created on 2014-06-24 12:15:59
         compiled from "design/client/templates\submenu.catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1344053a933bfd138c9-77079917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d69a1fb436f8bb83d8a493955ebf1080345fbfb' => 
    array (
      0 => 'design/client/templates\\submenu.catalog.tpl',
      1 => 1403596861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1344053a933bfd138c9-77079917',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'SITE_SECTION_PAGE' => 0,
    'row' => 0,
    'SERVER_URL_NAME' => 0,
    'SITE_SECTION_NAME' => 0,
    'sub' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53a933bfdafcf9_84233191',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53a933bfdafcf9_84233191')) {function content_53a933bfdafcf9_84233191($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include 'E:\\home\\kpsoap\\www\\system\\smarty\\plugins\\modifier.regex_replace.php';
?><div class="submenu">
	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['submenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
		<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)&&$_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value==$_smarty_tpl->tpl_vars['row']->value['alias']){?>
	<a class="selected<?php if (count($_smarty_tpl->tpl_vars['page']->value['content']['subtype'])>0){?> sub<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
/"><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row']->value['title'],"/\[!-\]([0-9]+)\[-!\]/"," <span>(\\1)</span>");?>
</a>
	<?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['subtype'])&&count($_smarty_tpl->tpl_vars['page']->value['content']['subtype'])>0){?>
	<span class="subblock">
		<?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['subtype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value){
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
/<?php echo smarty_modifier_regex_replace(mb_strtolower($_smarty_tpl->tpl_vars['sub']->value['title'], 'UTF-8'),'/[ ]/i','_');?>
/"<?php if ((isset($_smarty_tpl->tpl_vars['page']->value['content']['produce'])&&$_smarty_tpl->tpl_vars['page']->value['content']['produce']['subtype']==$_smarty_tpl->tpl_vars['sub']->value['id'])||$_smarty_tpl->tpl_vars['page']->value['content']['subsel']==$_smarty_tpl->tpl_vars['sub']->value['id']){?> class="select"<?php }?>><?php echo $_smarty_tpl->tpl_vars['sub']->value['title'];?>
</a>
		<?php } ?>
	</span>
	<?php }else{ ?>
	<span class="subblock"></span>
	<?php }?>
		<?php }else{ ?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
/"><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row']->value['title'],"/\[!-\]([0-9]+)\[-!\]/"," <span>(\\1)</span>");?>
</a>
		<?php }?>
	<div class="clear"><!-- --></div>
	<?php } ?>
</div>


<!--
<div class="submenu">
	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['submenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
		<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)&&$_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value==$_smarty_tpl->tpl_vars['row']->value['alias']){?>
	<a class="selected<?php if (count($_smarty_tpl->tpl_vars['page']->value['content']['subtype'])>0){?> sub<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/#select[type_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
;subtype=Все]"><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row']->value['title'],"/\[!-\]([0-9]+)\[-!\]/"," <span>(\\1)</span>");?>
</a>
	<?php if (count($_smarty_tpl->tpl_vars['page']->value['content']['subtype'])>0){?>
	<span class="subblock">
		<?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['subtype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value){
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/#select[type_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
;subtype=<?php echo smarty_modifier_regex_replace(mb_strtolower($_smarty_tpl->tpl_vars['sub']->value['title'], 'UTF-8'),'/[ ]/i','_');?>
]"<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['produce']['subtype']==$_smarty_tpl->tpl_vars['sub']->value['id']){?> class="select"<?php }?>><?php echo $_smarty_tpl->tpl_vars['sub']->value['title'];?>
</a>
		<?php } ?>
	</span>
	<?php }?>
		<?php }else{ ?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/#select[type_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
;subtype=Все]"><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row']->value['title'],"/\[!-\]([0-9]+)\[-!\]/"," <span>(\\1)</span>");?>
</a>
		<?php }?>
	<div class="clear"></div>
	<?php } ?>
</div>
--><?php }} ?>