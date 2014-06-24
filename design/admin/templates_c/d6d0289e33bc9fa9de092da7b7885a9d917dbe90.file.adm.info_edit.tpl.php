<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 09:59:16
         compiled from "design/admin/templates/adm.info_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1185579183533e4a34e1a912-23182253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6d0289e33bc9fa9de092da7b7885a9d917dbe90' => 
    array (
      0 => 'design/admin/templates/adm.info_edit.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1185579183533e4a34e1a912-23182253',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
    'SITE_SECTION_NAME' => 0,
    'SITE_SECTION_PAGE' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533e4a34ecb331_28100608',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533e4a34ecb331_28100608')) {function content_533e4a34ecb331_28100608($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('tiny_mce');?>
"></script><script type="text/javascript">			tinyMCE.init({				mode : "exact",				elements : "text",				theme : "advanced",				language : "ru",				skin : "o2k7",				skin_variant : "silver",				plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,images",				theme_advanced_buttons1 : "newdocument,|,undo,redo,|,bold,italic,underline,strikethrough,|,bullist,numlist,|,formatselect,styleselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,fullscreen",				theme_advanced_buttons2 : "link,unlink,anchor,image,images,|,tablecontrols,|,sub,sup,|,charmap,emotions,iespell,media,|,cleanup,removeformat,code",				theme_advanced_buttons3 : "",				theme_advanced_toolbar_location : "top",				theme_advanced_toolbar_align : "left",				theme_advanced_statusbar_location : "bottom",				theme_advanced_resizing : false,				convert_urls : false,				content_css : "<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
client/styles/main-admin.css"			});</script><form action="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>" method="post" method="post" <?php if ($_smarty_tpl->tpl_vars['page']->value['content']['alias']!='_'){?>onSubmit="return validation.test([{ name:'menutitle',title:'Название страницы (в меню)' },{ name:'alias',title:'Псевдоним' },{ name:'title',title:'Заголовок' }],'submit')"<?php }?>>	<input type="hidden" name="action" value="save" />	<input id="lastalias" name="lastalias" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['alias'];?>
" />	<table class="panels">		<tr>			<td class="panel">				<div class="title">Заголовок описательной части и текстовое наполнение страницы</div>				<div class="form">					<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['alias']!='_'){?>					<div class="line">						<div class="f_title">Название страницы (в меню)</div><input class="text" name="menutitle" type="text" maxlength="30" style="width: 200px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['menutitle'];?>
" />					</div>					<div class="line">						<div class="f_title">Псевдоним</div><input class="text" name="alias" type="text" maxlength="100" style="width: 400px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['alias'];?>
" />						<div class="f_title">Приоритет</div><input class="text" name="priority" type="text" style="width: 50px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['priority'];?>
" />					</div>					<?php }?>										<div class="line">						<div class="f_title">Заголовок</div><input class="text width:80%" name="title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['title'];?>
" />						<div class="f_title">Контент (доступен полноэкранный режим редактирования)</div>						<textarea name="text" 								  class="height:350px max-height:350px min-height:350px width:95% max-width:95% min-width:95%"><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['text'];?>
</textarea>					</div>				</div>			</td>		</tr>	</table>	<div class="panel-operation">		<input class="button" type="button" value="Отмена" onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>'" />		<input class="button" id="submit" type="submit" value="Сохранить" />	</div></form><?php }} ?>