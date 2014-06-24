<?php /* Smarty version Smarty-3.1.8, created on 2014-05-06 12:08:47
         compiled from "design/admin/templates/adm.banners.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12453787885368988f5f97b8-69647746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45847d083b0a146d4ae5188de68fb42908a8de17' => 
    array (
      0 => 'design/admin/templates/adm.banners.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12453787885368988f5f97b8-69647746',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
    'page' => 0,
    'row' => 0,
    'photo' => 0,
    'SITE_SECTION_NAME' => 0,
    'SITE_SECTION_PAGE' => 0,
    'num' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5368988f741ad2_14388617',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5368988f741ad2_14388617')) {function content_5368988f741ad2_14388617($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('tiny_mce');?>
"></script>
<script type="text/javascript">
		var prewId = '';
		var max=50;
		for (var i=0; i<max; i++)
			prewId+='text'+i+(i<max-1?',':'');
		tinyMCE.init({
		mode : "exact",
		elements : prewId,
		theme : "advanced",
		theme_advanced_resizing : false,
		readonly : true,
		content_css : "<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
client/styles/main.css"
		});	
</script> 

<div id="tabline" rev="tabline;texts;<?php echo $_smarty_tpl->tpl_vars['page']->value['mark'];?>
;top.gif;sel;top_grey.gif;no_sel"></div>
<div mode="mark" rev="Баннера">
	<panel title="Список баннеров">
		<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['empty_list'])){?>
			<empty>Баннера отсутствуют</empty>
		<?php }else{ ?>
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['listindex'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['listindex']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
			<div class="block-item min:610" style="width:282px">
				<div class="news">
					<div style="background: #f8fafd; width: 270px; height: 270px; margin-bottom: 13px; padding: 0; line-height: 270px; text-align: center">
						<?php if (count($_smarty_tpl->tpl_vars['row']->value['photo'])==4){?>
						<?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['photo']->_loop = false;
 $_smarty_tpl->tpl_vars['photoindex'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value['photo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value){
$_smarty_tpl->tpl_vars['photo']->_loop = true;
 $_smarty_tpl->tpl_vars['photoindex']->value = $_smarty_tpl->tpl_vars['photo']->key;
?><div style="width:135px; height:135px; float:left; padding: 0; background: url(<?php echo $_smarty_tpl->tpl_vars['photo']->value['src'];?>
) no-repeat center"><!-- --></div><?php } ?><div class="clear"><!-- --></div>
						<?php }elseif(count($_smarty_tpl->tpl_vars['row']->value['photo'])==1){?>
						<div style="width:270px; height:270px; float:left; padding: 0; background: url(<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'][0]['src'];?>
) no-repeat center"><!-- --></div>
						<?php }else{ ?>
						Нет фото
						<?php }?>
					</div>
					<div class="clear"><!-- --></div>
					<div class="buttons">
						<a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>:action=edit&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"></a>
						<a class="del" href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>:action=del&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"></a>
					</div>
					<div class="clear"><!-- --></div>
				</div>
				<div class="news-down"><!-- --></div>
				<div class="clear"><!-- --></div>
			</div>
			<?php } ?>
			<div class="clear"><!-- --></div>
		<?php }?>
	</panel>
	<operation>
		<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['pg_max'])){?>
			<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['pg_max']>1){?>
				<div class="pages">
				<?php  $_smarty_tpl->tpl_vars['url'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['url']->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['pg_url']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['url']->key => $_smarty_tpl->tpl_vars['url']->value){
$_smarty_tpl->tpl_vars['url']->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars['url']->key;
?>
					<?php if ($_smarty_tpl->tpl_vars['num']->value!=$_smarty_tpl->tpl_vars['page']->value['content']['pg']){?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['num']->value+1;?>
</a>
					<?php }else{ ?>
					<span><?php echo $_smarty_tpl->tpl_vars['num']->value+1;?>
</span>
					<?php }?>
				<?php } ?>
				</div>
			<?php }?>
		<?php }?>
		<input class="button<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['empty_group'])){?> disabled<?php }?>" id="add" type="button" value="Добавить" <?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['empty_group'])){?>disabled="disabled" <?php }?>onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>:action=add'" />
		<div class="clear"><!----></div>
	</operation>
</div><?php }} ?>