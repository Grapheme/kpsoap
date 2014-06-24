<?php /* Smarty version Smarty-3.1.8, created on 2014-05-06 12:08:45
         compiled from "design/admin/templates/adm.panels.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11719063895368988d2077d7-35869766%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8f94402255d691d998e34337aae6692069b33d4' => 
    array (
      0 => 'design/admin/templates/adm.panels.tpl',
      1 => 1395827320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11719063895368988d2077d7-35869766',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
    'page' => 0,
    'row' => 0,
    'SITE_SECTION_NAME' => 0,
    'SITE_SECTION_PAGE' => 0,
    'num' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5368988d33abe7_06455518',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5368988d33abe7_06455518')) {function content_5368988d33abe7_06455518($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
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

<div id="tabline"></div>
<div id="texts[0]" style="display: none">
	<table class="panels">
		<tr>
			<td class="panel">
				<div class="title">Список панелей</div>
				<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['empty_list'])){?>
					<div class="no_data">Панели отсутствуют</div>
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
							<div class="texttitle main"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</div>
							<div><span>Псевдоним:</span> <?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
</div>
							<div><span>Приоритет:</span> <?php echo $_smarty_tpl->tpl_vars['row']->value['priority'];?>
</div>
							<div><span>Тип:</span> <?php if ($_smarty_tpl->tpl_vars['row']->value['align']==0){?>Левая панель<?php }else{ ?>Правая панель<?php }?></div>
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
			</td>
		</tr>
	</table>

	<div class="panel-operation">
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
	</div>
</div>

<script language="javascript">
	marks.init(new Array(new Array('mark1','Списки панелей')), "tabline", "texts", <?php if ($_smarty_tpl->tpl_vars['page']->value['mark']!=''){?><?php echo $_smarty_tpl->tpl_vars['page']->value['mark'];?>
<?php }else{ ?>0<?php }?>, "top.gif", "sel", "top_grey.gif", "no_sel");
</script><?php }} ?>