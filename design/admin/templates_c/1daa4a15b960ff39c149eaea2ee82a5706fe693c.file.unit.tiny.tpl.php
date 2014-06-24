<?php /* Smarty version Smarty-3.1.8, created on 2014-03-27 18:19:10
         compiled from "design/admin/templates/unit.tiny.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20074998715334335e415b97-27854229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1daa4a15b960ff39c149eaea2ee82a5706fe693c' => 
    array (
      0 => 'design/admin/templates/unit.tiny.tpl',
      1 => 1395827320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20074998715334335e415b97-27854229',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'SERVER_URL_NAME' => 0,
    'blocks' => 0,
    'block' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5334335e466669_25473209',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5334335e466669_25473209')) {function content_5334335e466669_25473209($_smarty_tpl) {?><?php if (preg_match('/(preview|edit|list)/i',$_smarty_tpl->tpl_vars['type']->value)){?>
	<?php $_smarty_tpl->tpl_vars['blocks'] = new Smarty_variable(explode(";",$_smarty_tpl->tpl_vars['type']->value), null, 0);?>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('tiny_mce');?>
"></script>
	<script type="text/javascript">
	<?php  $_smarty_tpl->tpl_vars['block'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['block']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blocks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['block']->key => $_smarty_tpl->tpl_vars['block']->value){
$_smarty_tpl->tpl_vars['block']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['block']->value=='preview'){?>
			tinyMCE.init({
				mode					:"exact",
				elements				:"text",
				theme 					:"advanced",
				theme_advanced_resizing	:false,
				readonly 				:true,
				content_css : "<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
client/styles/main-admin.css"
			});
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['block']->value=='edit'){?>
			tinyMCE.init({
				mode : "exact",
				elements : "text",
				theme : "advanced",
				language : "ru",
				skin : "o2k7",
				skin_variant : "silver",
				plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,images",
				theme_advanced_buttons1 : "newdocument,|,undo,redo,|,bold,italic,underline,strikethrough,|,bullist,numlist,|,formatselect,styleselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,fullscreen",
				theme_advanced_buttons2 : "link,unlink,anchor,image,images,|,tablecontrols,|,sub,sup,|,charmap,emotions,iespell,media,|,cleanup,removeformat,code",
				theme_advanced_buttons3 : "",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : false,
				convert_urls : false,
				content_css : "<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
client/styles/main-admin.css"
			});
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['block']->value=='list'){?>
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
client/styles/main-admin.css"
				});
		<?php }?>
	<?php } ?>
	</script>
<?php }?><?php }} ?>