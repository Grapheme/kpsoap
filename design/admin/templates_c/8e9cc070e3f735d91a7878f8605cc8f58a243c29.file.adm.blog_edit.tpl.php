<?php /* Smarty version Smarty-3.1.8, created on 2014-03-27 18:27:24
         compiled from "design/admin/templates/adm.blog_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10886111545334354ccc1d50-91248822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e9cc070e3f735d91a7878f8605cc8f58a243c29' => 
    array (
      0 => 'design/admin/templates/adm.blog_edit.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10886111545334354ccc1d50-91248822',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
    'SITE_SECTION_NAME' => 0,
    'page' => 0,
    'row' => 0,
    'tag' => 0,
    'tag_index' => 0,
    'row_tags' => 0,
    'tags_index' => 0,
    'ischeck' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5334354ce844c8_83970505',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5334354ce844c8_83970505')) {function content_5334354ce844c8_83970505($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('unit.tiny.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('type'=>'edit'), 0);?>


<div id="tabline"></div>
	
<form action="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/" method="post" onSubmit="return validation.test([{ name:'alias',title:'Псевдоним' },{ name:'date',title:'Дата' },{ name:'texttitle',title:'Заголовок' },{ name:'menutitle',title:'Заголовок в списке' }],'submit')"">
<input type="hidden" name="action" value="save" />
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['id'];?>
" />

<div id="texts[0]" style="display: none">
	<table class="panels">
		<tr>
			<td class="panel">
				<div class="title">Редактирование новости</div>
				<div class="form">
					<div class="line">
						<div class="f_title">Псевдоним</div>
						<input class="text maxlength:300 width:80%"
							   name="alias" type="text"
							   value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['alias'];?>
"/>
						
						<div class="f_title">Дата</div>
						<input class="text maxlength:20 width:150px"
							   name="date" type="text"
							   value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['datetime'];?>
" />
						
						<div class="f_title">Заголовок</div>
						<input class="text maxlength:300 width:80%"
							   name="texttitle" type="text"
							   value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['title'];?>
" />
						
						<div class="f_title">Рубрика</div>
						<select name="group">
						<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['row']->value['id']==$_smarty_tpl->tpl_vars['page']->value['content']['group_id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</option>
						<?php } ?>
						</select>
						
						<div class="f_title">Подзаголовок</div>
						<input class="text maxlength:300 width:50%" 
							   name="menutitle" type="text"
							   value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['menutitle'];?>
" />
						
						<div class="f_title">Контент (доступен полноэкранный режим редактирования)</div>
						<textarea name="text" 
								  class="height:350px max-height:350px min-height:350px width:95% max-width:95% min-width:95%"><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['text'];?>
</textarea>
						
						<div class="f_title">Теги <span>(Вводить через запятую)</span></div>
						<div class="tags_list">
						<?php $_smarty_tpl->tpl_vars["tag_index"] = new Smarty_variable("0", null, 0);?>
						<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['tags_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
							<span><u><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</u> (<?php echo $_smarty_tpl->tpl_vars['tag']->value['count'];?>
)</span><?php if ($_smarty_tpl->tpl_vars['tag_index']->value++<count($_smarty_tpl->tpl_vars['page']->value['content']['tags_list'])-1){?>,<?php }?>
						<?php } ?>
						</div>
						<textarea name="tags"class="border height:45px max-height:45px min-height:45px width:95% max-width:95% min-width:95%"><?php if (count($_smarty_tpl->tpl_vars['page']->value['content']['tags'])>0&&!empty($_smarty_tpl->tpl_vars['page']->value['content']['tags'][0])){?><?php  $_smarty_tpl->tpl_vars['row_tags'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row_tags']->_loop = false;
 $_smarty_tpl->tpl_vars['tags_index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row_tags']->key => $_smarty_tpl->tpl_vars['row_tags']->value){
$_smarty_tpl->tpl_vars['row_tags']->_loop = true;
 $_smarty_tpl->tpl_vars['tags_index']->value = $_smarty_tpl->tpl_vars['row_tags']->key;
?><?php echo $_smarty_tpl->tpl_vars['row_tags']->value;?>
<?php if ($_smarty_tpl->tpl_vars['tags_index']->value<count($_smarty_tpl->tpl_vars['page']->value['content']['tags'])-1){?>, <?php }?><?php } ?><?php }?></textarea>
						
						<div class="f_title">Ссылка на livejournal</div>
						<input class="text maxlength:200 width:80%" 
							   name="livejournal" type="text"
							   value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['livejournal'];?>
" />
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>

<div id="texts[1]" style="display: none">
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
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<?php if ($_smarty_tpl->tpl_vars['page']->value['panels'][$_smarty_tpl->getVariable('smarty')->value['section']['tstchech']['index']]['id']==$_smarty_tpl->tpl_vars['page']->value['panels_list']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['pleft']['index']]['id']){?>
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
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<?php if ($_smarty_tpl->tpl_vars['page']->value['panels']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['tstchech']['index']]['id']==$_smarty_tpl->tpl_vars['page']->value['panels_list']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['pright']['index']]['id']){?>
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
				<div class="f_title">Заголовок страницы (title)</div><input class="text" name="title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['meta']['title'];?>
" />
				<div class="f_title">Ключевын слова (meta Keywords)</div><div class="border"><textarea name="keywords" style="height: 80px;"><?php echo $_smarty_tpl->tpl_vars['page']->value['meta']['keywords'];?>
</textarea></div>
				<div class="f_title">Описание (meta Description)</div><div class="border"><textarea name="description" style="height: 100px;"><?php echo $_smarty_tpl->tpl_vars['page']->value['meta']['description'];?>
</textarea></div>
				<input type="hidden" name="tpl" value="null" />
			</div>
		</td>
	</tr>
</table>
</div>
<div class="panel-operation">
	<input class="button" type="button" value="Отмена" onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/'" />
	<input class="button" id="submit" type="submit" value="Применить" />
</div>
</form>

<script language="javascript">
	marks.init(new Array(new Array('mark1','Содержимое страницы'),
						 new Array('mark2','Настройки и метаданные')), "tabline", "texts", <?php if ($_smarty_tpl->tpl_vars['page']->value['mark']!=''){?><?php echo $_smarty_tpl->tpl_vars['page']->value['mark'];?>
<?php }else{ ?>0<?php }?>, "top.gif", "sel", "top_grey.gif", "no_sel");
</script><?php }} ?>