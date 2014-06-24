<?php /* Smarty version Smarty-3.1.8, created on 2014-03-27 18:19:10
         compiled from "design/admin/templates/adm.blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14658160245334335e0ceed8-02986572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd904ac211a0e6b7bc5e8e9e1a89e3f964ce68913' => 
    array (
      0 => 'design/admin/templates/adm.blog.tpl',
      1 => 1395827320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14658160245334335e0ceed8-02986572',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'row' => 0,
    'grow' => 0,
    'blogindex' => 0,
    'row_tags' => 0,
    'tags_index' => 0,
    'SERVER_URL_NAME' => 0,
    'SITE_SECTION_NAME' => 0,
    'SITE_SECTION_PAGE' => 0,
    'num' => 0,
    'url' => 0,
    'index' => 0,
    'ischeck' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5334335e4085b3_55004459',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5334335e4085b3_55004459')) {function content_5334335e4085b3_55004459($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('unit.tiny.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('type'=>'list'), 0);?>


<div id="tabline"></div>
<div id="texts[0]" style="display: none">
	<div class="filter">
		<b>Рубрика:</b> 
		<select class="group">
			<option value="0"<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['filter']['blog_group']==0){?> selected="selected"<?php }?>>Все</option>
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['groupindex'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['groupindex']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['filter']['blog_group']==$_smarty_tpl->tpl_vars['row']->value['id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</option>
			<?php } ?>
		</select>
	</div>
	<table class="panels">
		<tr>
			<td class="panel">
				<div class="title">Список блогов</div>
				<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['empty_list'])){?>
					<div class="no_data"><?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['empty_group'])){?>Добавьте хотя бы одну группу тем<?php }else{ ?>Блоги отсутствуют<?php }?></div>
				<?php }else{ ?>
					<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['blogindex'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['blogindex']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
					<div class="block-item min:610" style="width:49%;"> <!--  style="width:49%;" -->
						<div class="news">
							<div class="href"><?php echo $_smarty_tpl->tpl_vars['row']->value['href'];?>
</div>
							<div class="texttitle main"><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['row']->value['title']);?>
</div>
							<div class="clear"><!-- --></div>
							<div class="group"><span>Рубрика:</span> 
							<?php  $_smarty_tpl->tpl_vars['grow'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['grow']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['grow']->key => $_smarty_tpl->tpl_vars['grow']->value){
$_smarty_tpl->tpl_vars['grow']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['grow']->key;
?>
								<?php if ($_smarty_tpl->tpl_vars['grow']->value['id']==$_smarty_tpl->tpl_vars['row']->value['group_id']){?>
									<?php echo $_smarty_tpl->tpl_vars['grow']->value['title'];?>

								<?php }?>
							<?php } ?>
							</div>
							<div class="alias"><span>Псевдоним: </span><?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
</div>
							<textarea class="text width:100% height:270px" id="text<?php echo $_smarty_tpl->tpl_vars['blogindex']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['text'];?>
</textarea>
							<div class="clear"><!-- --></div>
							<div class="tags">
								<span>Tags:</span>
								<?php if (count($_smarty_tpl->tpl_vars['row']->value['tags'])>0){?>
									<?php  $_smarty_tpl->tpl_vars['row_tags'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row_tags']->_loop = false;
 $_smarty_tpl->tpl_vars['tags_index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row_tags']->key => $_smarty_tpl->tpl_vars['row_tags']->value){
$_smarty_tpl->tpl_vars['row_tags']->_loop = true;
 $_smarty_tpl->tpl_vars['tags_index']->value = $_smarty_tpl->tpl_vars['row_tags']->key;
?>
									<u><?php echo $_smarty_tpl->tpl_vars['row_tags']->value;?>
</u><?php if ($_smarty_tpl->tpl_vars['tags_index']->value<count($_smarty_tpl->tpl_vars['row']->value['tags'])-1){?>,<?php }?>
									<?php } ?>
								<?php }else{ ?>
								отсутствуют
								<?php }?>
							</div>
							
							<div class="livejournal"><span>livejournal: </span><?php if (isset($_smarty_tpl->tpl_vars['row']->value['livejournal'])){?><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['livejournal'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['row']->value['livejournal'];?>
</a><?php }else{ ?>отсутствуют<?php }?></div>
							
							<div class="datetime down"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['datetime'],"%d.%m.%Y");?>
</div>
							<div class="buttons">
								<div class="html gethtml" title="Импорт HTML"></div>
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
					<?php if (($_smarty_tpl->tpl_vars['blogindex']->value+1)%2==0){?>
					<div class="clear"><!-- --></div>
					<?php }?>
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
	
<div id="texts[1]" style="display: none">
	<table class="panels">
		<tr>
			<td class="panel nospace noleftspace">
				<div class="title">
					<table>
						<tr>
							<th class="sort">Позиция</th>
							<th>Название</th>
						</tr>
					</table>
				</div>
				<div class="list">
				<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['empty_group'])){?>
					<div class="no_data">Группы отсутствуют</div>
				<?php }else{ ?>
					<table>
					<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
						<tr class="row<?php echo $_smarty_tpl->tpl_vars['index']->value%2;?>
" rowid=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
 alias="<?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
">
							<td class="sort"><?php if ($_smarty_tpl->tpl_vars['row']->value['id']<5){?><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['priority'];?>
<?php }?></td>
							<td<?php if ($_smarty_tpl->tpl_vars['row']->value['id']<5){?> class="blocked"<?php }?>><?php if ($_smarty_tpl->tpl_vars['row']->value['id']<5){?><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
 <small>(недоступен к редактирвоанию)</small><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
<?php }?></td>
							<td class="cmd"><label><input type="checkbox"<?php if ($_smarty_tpl->tpl_vars['row']->value['id']<5){?> class="hidden"<?php }?> /></label></td>
						</tr>
					<?php } ?>
					</table>
				<?php }?>
				</div>
			</td>
		</tr>
	</table>
	<input class="button list_btn_delete" cmd="delgroup" id="delgroup" type="button" value="Удалить" />
	<input class="button list_btn_edit 0" cmd="savegroup" id="editgroup" type="button" value="Редактировать" />
	<input class="button list_btn_insert 0" cmd="insertgroup" id="addgroup" type="button" value="Добавить" />
</div>

<div id="texts[2]" style="display: none">
	<form action="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>" method="post" onsubmit="javascript:button.disable(getElementById('submit'))">
		<input type="hidden" name="action" value="saveattach" />
		<table class="panels">
			<tr>
				<td class="panel">
				<div class="title">Подключение боковых панелей</div>
					<table>
						<tr>
							<td>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['name'] = 'pleft';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels_list']['left']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total']);
?>
			<?php $_smarty_tpl->tpl_vars["ischeck"] = new Smarty_variable(false, null, 0);?>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['name'] = 'tstchech';
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels']['left']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total']);
?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value['panels']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['tstchech']['index']]==$_smarty_tpl->tpl_vars['page']->value['panels_list']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['pleft']['index']]['id']){?>
					<?php $_smarty_tpl->tpl_vars["ischeck"] = new Smarty_variable(true, null, 0);?>
			<?php }?>
			<?php endfor; endif; ?>
								<label><input name="panel[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['panels_list']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['pleft']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['ischeck']->value==true){?>checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['page']->value['panels_list']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['pleft']['index']]['name'];?>
</label><br />
		<?php endfor; endif; ?>
							</td>
							<td>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pright'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['name'] = 'pright';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels_list']['right']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total']);
?>
			<?php $_smarty_tpl->tpl_vars["ischeck"] = new Smarty_variable(false, null, 0);?>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['name'] = 'tstchech';
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels']['right']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total']);
?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value['panels']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['tstchech']['index']]==$_smarty_tpl->tpl_vars['page']->value['panels_list']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['pright']['index']]['id']){?>
					<?php $_smarty_tpl->tpl_vars["ischeck"] = new Smarty_variable(true, null, 0);?>
			<?php }?>
			<?php endfor; endif; ?>
								<label><input name="panel[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['panels_list']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['pright']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['ischeck']->value==true){?>checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['page']->value['panels_list']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['pright']['index']]['name'];?>
</label><br />
		<?php endfor; endif; ?>
							</td>
						</tr>
					</table>
				</td>
				<td class="panel meta">
					<div class="title">Заголовки, meta, шаблон</div>
					<div class="form">
						<div class="f_title">Заголовок страницы</div><input class="text" name="title" type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['header']['title'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['header']['title'];?>
<?php }?>" />
						<div class="f_title">Keywords</div><div class="border"><textarea name="keywords" style="height: 80px;"><?php if (!empty($_smarty_tpl->tpl_vars['page']->value['header']['keywords'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['header']['keywords'];?>
<?php }?></textarea></div>
						<div class="f_title">Description</div><div class="border"><textarea name="description" style="height: 100px;"><?php if (!empty($_smarty_tpl->tpl_vars['page']->value['header']['description'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['header']['description'];?>
<?php }?></textarea></div>
						<div class="f_title">Шаблон</div>
						<select name="tpl">
							<option value="null" style=" color: #C0C0C0" selected="selected">По умолчанию</option>
							<!--<option value="module.index.tpl">module.index.tpl</option>
							<option value="module.text_page.tpl">module.text_page.tpl</option>-->
						</select>
					</div>
				</td>
			</tr>
		</table>
		<input class="button" id="submit" type="submit" value="Обновить" />
	</form>
</div>

<script language="javascript">
	marks.init(new Array(new Array('mark1','Списки блогов'),
						 new Array('mark2','Рубрики'),
						 new Array('mark3','Настройки')), "tabline", "texts", <?php if ($_smarty_tpl->tpl_vars['page']->value['mark']!=''){?><?php echo $_smarty_tpl->tpl_vars['page']->value['mark'];?>
<?php }else{ ?>0<?php }?>, "top.gif", "sel", "top_grey.gif", "no_sel");
</script><?php }} ?>