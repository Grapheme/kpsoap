<?php /* Smarty version Smarty-3.1.8, created on 2014-04-15 20:57:18
         compiled from "design/admin/templates/adm.catalog_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41364828534d64ee6bbdf4-81787312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c860c798709c983d08927bc360d99b99dbb953bf' => 
    array (
      0 => 'design/admin/templates/adm.catalog_add.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41364828534d64ee6bbdf4-81787312',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
    'SITE_SECTION_NAME' => 0,
    'page' => 0,
    'row' => 0,
    'index' => 0,
    'cn_row' => 0,
    'cl_row' => 0,
    'sub_id' => 0,
    'sub_vl' => 0,
    'weight' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_534d64ee9d03f1_39412950',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534d64ee9d03f1_39412950')) {function content_534d64ee9d03f1_39412950($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('tiny_mce');?>
"></script><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/script/calendar/calendar_ru.js"></script>						<script type="text/javascript">tinyMCE.init({	mode : "exact",	elements : "about_product,used_interior",	theme : "advanced",	language : "ru",	skin : "o2k7",	skin_variant : "default",	plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,images",	theme_advanced_buttons1 : "newdocument,|,undo,redo,|,bold,italic,underline,strikethrough,|,bullist,numlist,|,formatselect,|,cut,copy,paste,pastetext,pasteword",	theme_advanced_buttons2 : "search,replace,|,link,unlink,anchor,image,images,cleanup,removeformat,code,|,sub,sup,|,charmap,emotions,iespell,media,|,fullscreen",	theme_advanced_buttons3 : "",	theme_advanced_toolbar_location : "top",	theme_advanced_toolbar_align : "left",	theme_advanced_statusbar_location : "bottom",	theme_advanced_resizing : false,	convert_urls : false,	content_css : "<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
client/styles/main.css"});</script> <div id="tabline"></div><form id="photouploader" action="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/:axah=out&action=setphoto" method="post" enctype="multipart/form-data">	<input type="file" name="photo" />						</form><form name="insert" action="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/" method="post" onSubmit="return validation.test([{ name:'article',title:'Артикул' },{ name:'title',title:'Название / Название EN (RU)' }],'submit')">	<?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['edit'])){?>	<input type="hidden" name="action" value="save" />	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['id'];?>
" />	<?php }else{ ?>	<input type="hidden" name="action" value="insert" />	<?php }?>	<div id="texts[0]" style="display: none">		<table class="panels">			<tr>				<td class="panel">					<div class="title"><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['group_name'];?>
 &raquo; <?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['edit'])){?>Редактирование<?php }else{ ?>Новая позиция<?php }?></div>					<div class="form">						<div class="line">							<div class="f_title">Фото</div>							<div class="photouploader-panel" count="10" size="120">								<div class="response">Загрузка</div>								<div class="photos">									<div class="content">									<?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?>										<?php if (is_array($_smarty_tpl->tpl_vars['page']->value['content']['data']['photo'])&&count($_smarty_tpl->tpl_vars['page']->value['content']['data']['photo'])>0){?>											<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['data']['photo_preview']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>										<div class="item">											<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['photo'][$_smarty_tpl->tpl_vars['index']->value];?>
" /><span class="del"><!-- --></span>										</div>											<?php } ?>										<?php }?>									<?php }?>									</div>									<div class="clear"><!-- --></div>								</div>								<input type="button" class="button" value="Добавить" />								<input name="photo" type="hidden" value="" />							</div>														<div id="tst"></div>							<div class="f_title">Артикул <span class="article_alert"></span></div>							<input class="text maxlength:300 width:80%"								   name="article" type="text"								   value="<?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['article'];?>
<?php }?>" />														<div class="f_title">Название / Название EN (RU)</div>							<input class="text maxlength:300 width:80%"								   name="title" type="text"								   value="<?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['title'];?>
<?php }?>" />														<div class="f_title">Подраздел</div>							<select name="subtype" class="display:inline">								<option value="0">Без подраздела</option>							<?php  $_smarty_tpl->tpl_vars['cn_row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cn_row']->_loop = false;
 $_smarty_tpl->tpl_vars['cn_index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['subtype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cn_row']->key => $_smarty_tpl->tpl_vars['cn_row']->value){
$_smarty_tpl->tpl_vars['cn_row']->_loop = true;
 $_smarty_tpl->tpl_vars['cn_index']->value = $_smarty_tpl->tpl_vars['cn_row']->key;
?>								<option value="<?php echo $_smarty_tpl->tpl_vars['cn_row']->value['id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])&&$_smarty_tpl->tpl_vars['page']->value['content']['data']['subtype']==$_smarty_tpl->tpl_vars['cn_row']->value['id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cn_row']->value['title'];?>
</option>							<?php } ?>							</select>															<div class="f_title">Доп заголовок</div>							<select class="subtitle-changer" change="<?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['subtitle'];?>
<?php }?>">								<option value="">Отсутствует</option>								<option value="[new-subtitle-element]">Новый</option>							<?php  $_smarty_tpl->tpl_vars['cl_row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cl_row']->_loop = false;
 $_smarty_tpl->tpl_vars['cn_index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['subtitles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cl_row']->key => $_smarty_tpl->tpl_vars['cl_row']->value){
$_smarty_tpl->tpl_vars['cl_row']->_loop = true;
 $_smarty_tpl->tpl_vars['cn_index']->value = $_smarty_tpl->tpl_vars['cl_row']->key;
?>								<?php if ((!empty($_smarty_tpl->tpl_vars['cl_row']->value['subtitle']))){?>									<?php $_smarty_tpl->tpl_vars["sub_id"] = new Smarty_variable(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['cl_row']->value['subtitle'],'/([0-9]*).*/','\\1'), null, 0);?>									<?php $_smarty_tpl->tpl_vars["sub_vl"] = new Smarty_variable(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['cl_row']->value['subtitle'],'/[0-9]*\[(.*)\]/','\\1'), null, 0);?>									<?php if (($_smarty_tpl->tpl_vars['page']->value['content']['type_id']==$_smarty_tpl->tpl_vars['sub_id']->value)){?>								<option value="<?php echo $_smarty_tpl->tpl_vars['cl_row']->value['subtitle'];?>
"><?php echo $_smarty_tpl->tpl_vars['sub_vl']->value;?>
</option>									<?php }?>								<?php }?>							<?php } ?>							</select>														<div class="f_title">Вес / Объем (X.XX)</div>							<?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?>							<?php $_smarty_tpl->tpl_vars['weight'] = new Smarty_variable(explode(";",$_smarty_tpl->tpl_vars['page']->value['content']['data']['weight']), null, 0);?>							<?php }?>							<input class="dat-float text maxlength:10 width:100px display:inline"									name="weight" type="text"									value="<?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['weight']->value[1];?>
<?php }else{ ?>0<?php }?>" />							<select name="weight_type" class="display:inline">								<option value="0"<?php if (isset($_smarty_tpl->tpl_vars['weight']->value[0])&&$_smarty_tpl->tpl_vars['weight']->value[0]=='0'){?> selected="selected"<?php }?>>граммы (г)</option>								<option value="1"<?php if (isset($_smarty_tpl->tpl_vars['weight']->value[0])&&$_smarty_tpl->tpl_vars['weight']->value[0]=='1'){?> selected="selected"<?php }?>>килограммы (кг)</option>								<option value="2"<?php if (isset($_smarty_tpl->tpl_vars['weight']->value[0])&&$_smarty_tpl->tpl_vars['weight']->value[0]=='2'){?> selected="selected"<?php }?>>милилитры (мл)</option>								<option value="3"<?php if (isset($_smarty_tpl->tpl_vars['weight']->value[0])&&$_smarty_tpl->tpl_vars['weight']->value[0]=='3'){?> selected="selected"<?php }?>>литры (л)</option>							</select>														<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>								<?php if ($_smarty_tpl->tpl_vars['row']->value['Field']=='weight'){?>									<div class="f_title">Вес (X.XX) кг</div>									<input class="dat-float text maxlength:10 width:100px display:inline"										   name="weight" type="text"										   value="<?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['weight'];?>
<?php }?>" />								<?php }?>								<?php if ($_smarty_tpl->tpl_vars['row']->value['Field']=='use'){?>									<div class="f_title">Применение</div>									<textarea name="use" 											  class="border height:50px max-height:50px min-height:50px width:80% max-width:80% min-width:80%"><?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['use'];?>
<?php }?></textarea>								<?php }?>								<?php if ($_smarty_tpl->tpl_vars['row']->value['Field']=='consist'){?>									<div class="f_title">Состав</div>									<textarea name="consist" 											  class="border height:50px max-height:50px min-height:50px width:80% max-width:80% min-width:80%"><?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['consist'];?>
<?php }?></textarea>								<?php }?>								<?php if ($_smarty_tpl->tpl_vars['row']->value['Field']=='storage'){?>									<div class="f_title">Условия хранения</div>									<textarea name="storage" 											  class="border height:50px max-height:50px min-height:50px width:80% max-width:80% min-width:80%"><?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['storage'];?>
<?php }?></textarea>								<?php }?>								<?php if ($_smarty_tpl->tpl_vars['row']->value['Field']=='expiration'){?>									<div class="f_title">Срок годности</div>									<textarea name="expiration" 											  class="border height:50px max-height:50px min-height:50px width:80% max-width:80% min-width:80%"><?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['expiration'];?>
<?php }?></textarea>								<?php }?>								<?php if ($_smarty_tpl->tpl_vars['row']->value['Field']=='contr'){?>									<div class="f_title">Противопоказания</div>									<textarea name="contr" 											  class="border height:50px max-height:50px min-height:50px width:80% max-width:80% min-width:80%"><?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['contr'];?>
<?php }?></textarea>								<?php }?>							<?php } ?>							<div class="f_title">О товаре</div>							<textarea id="about_product" name="about_product" 									  class="border height:250px max-height:250px min-height:250px width:80% max-width:80% min-width:80%"><?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['about_product'];?>
<?php }?></textarea>							<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>								<?php if ($_smarty_tpl->tpl_vars['row']->value['Field']=='extra'){?>									<div class="f_title">Дополнительно</div>									<textarea name="extra" 											  class="border height:50px max-height:50px min-height:50px width:80% max-width:80% min-width:80%"><?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['extra'];?>
<?php }?></textarea>								<?php }?>							<?php } ?>							<div class="f_title">ИПТ</div>							<input class="text maxlength:20 width:100px display:inline"								   name="index_similarity" type="text"								   value="<?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['data'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['data']['index_similarity'];?>
<?php }?>" />						</div>											</div>				</td>			</tr>		</table>	</div>			<div class="panel-operation">																<input class="button" type="button" value="Отмена" onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/'; return true" />		<input class="button" id="submit" type="submit" value="<?php if (isset($_smarty_tpl->tpl_vars['page']->value['content']['edit'])){?>Сохранить<?php }else{ ?>Добавить<?php }?>" />	</div></form><script language="javascript">	marks.init(new Array(new Array('mark1','Содержимое страницы')), "tabline", "texts", <?php if (!empty($_smarty_tpl->tpl_vars['page']->value['mark'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['mark'];?>
<?php }else{ ?>0<?php }?>, "top.gif", "sel", "top_grey.gif", "no_sel");</script><?php }} ?>