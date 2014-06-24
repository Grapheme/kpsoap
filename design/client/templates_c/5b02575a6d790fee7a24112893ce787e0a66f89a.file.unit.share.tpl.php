<?php /* Smarty version Smarty-3.1.8, created on 2014-03-27 02:17:11
         compiled from "design/client/templates/unit.share.tpl" */ ?>
<?php /*%%SmartyHeaderCode:780702942533351e76f5572-53600005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b02575a6d790fee7a24112893ce787e0a66f89a' => 
    array (
      0 => 'design/client/templates/unit.share.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '780702942533351e76f5572-53600005',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'type' => 0,
    'SERVER_URL_NAME' => 0,
    'SITE_SECTION_SUBPAGE' => 0,
    'domain' => 0,
    'SITE_SECTION_NAME' => 0,
    'SITE_SECTION_PAGE' => 0,
    'items' => 0,
    'item' => 0,
    'shareurl' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533351e77b1d69_56402506',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533351e77b1d69_56402506')) {function content_533351e77b1d69_56402506($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
if (!is_callable('smarty_modifier_truncate')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.truncate.php';
?><?php if (preg_match('/(fb|vk|gp|tw)/i',$_smarty_tpl->tpl_vars['list']->value)){?>
<div class="likes <?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
	<?php $_smarty_tpl->tpl_vars['items'] = new Smarty_variable(explode(";",$_smarty_tpl->tpl_vars['list']->value), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['domain'] = new Smarty_variable(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value,'/^http:\/\/(|[^.]*\.)([^.]*\.[^\/\.]*\/.*)/i','http://$2'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['shareurl'] = new Smarty_variable(empty($_smarty_tpl->tpl_vars['SITE_SECTION_SUBPAGE']->value) ? ($_smarty_tpl->tpl_vars['domain']->value).($_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value)."/".($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)."/" : ($_smarty_tpl->tpl_vars['domain']->value).($_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value)."/".($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)."/".($_smarty_tpl->tpl_vars['SITE_SECTION_SUBPAGE']->value)."/", null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['posts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['posts']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['item']->value=='fb'){?>
	<div class="blike facebook">
		<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo $_smarty_tpl->tpl_vars['shareurl']->value;?>
&send=false&layout=button_count&width=135&show_faces=false&action=like&colorscheme=light&font=tahoma&height=20&appId=203451913117132" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:135px; height:20px;" allowTransparency="true"></iframe>
	</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['item']->value=='vk'){?>		
	<div class="blike vk">
		<div id="vk_like"></div>
		<script type="text/javascript">
			document.write(VK.Share.button(
				{
					url: "<?php echo $_smarty_tpl->tpl_vars['shareurl']->value;?>
",
					title: "<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['title'];?>
",
					description: "<?php echo smarty_modifier_truncate(preg_replace('!\s+!u', ' ',preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['text'])),180,'...',true);?>
",
					image: "<?php echo $_smarty_tpl->tpl_vars['page']->value['photo_like'];?>
",
					noparse: true
				},{ type: "round", text: "Мне нравится" })
			);
		</script>
	</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['item']->value=='gp'){?>
	<div class="blike gplus">
		<g:plusone size="medium"></g:plusone>
	</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['item']->value=='tw'){?>
	<div class="blike tweet">
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $_smarty_tpl->tpl_vars['shareurl']->value;?>
" data-lang="ru">Твитнуть</a>
		<script>!function(d,s,id) { var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)) { js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs); } } (document,"script","twitter-wjs");</script>
	</div>
		<?php }?>
	<?php } ?>
	<div class="clear"><!-- --></div>
</div>
<?php }?><?php }} ?>