<?php /* Smarty version Smarty-3.1.8, created on 2014-03-27 02:17:11
         compiled from "design/client/templates/unit.comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1450859589533351e77b6790-05438287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e14f0dc74f63ee90229256752e4efb36d0e4acc' => 
    array (
      0 => 'design/client/templates/unit.comments.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1450859589533351e77b6790-05438287',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
    'page' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533351e7838fd4_61886901',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533351e7838fd4_61886901')) {function content_533351e7838fd4_61886901($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.date_format.php';
?><?php if (!isset($_smarty_tpl->tpl_vars['rows']->value)){?>
	<div id="mc-container">
	<h3>КОММЕНТАРИИ</h3>
	<?php if (isset($_smarty_tpl->tpl_vars['page']->value['comments']->num_rows)&&$_smarty_tpl->tpl_vars['page']->value['comments']->num_rows>0){?>
		<div class="mc-cleanslate mc-content">
			<ul class="mc-comment-list">
				<?php echo $_smarty_tpl->getSubTemplate ('unit.comments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('rows'=>$_smarty_tpl->tpl_vars['page']->value['comments']->cell), 0);?>

			</ul>
		</div>
	<?php }?>
	</div>
	<script type="text/javascript">
	if (document.getElementsByTagName('html')[0].className.match(/msie(6|7)/) == null) {
		var mcSite = '19981';
		var mcSize = '5';
		var mcAvatarSize = '32';
		var mcTextSize = '150';
		var mcTitleSize = '40';
		var mcJqueryOff = true;
		var mcChannel = (new String(document.location.href)).replace(/^http:\/\/(|[^.]*\.)([^.]*\.[^\/\.]*\/.*)/i,'http://$2').replace(/#.*/,'');
		(function() {
			var mc = document.createElement('script');
			mc.type = 'text/javascript';
			mc.async = false;
			mc.src = 'http://cackle.me/mc.widget-min.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(mc);
		})();
	}
	</script>
<?php }else{ ?>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['posts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['posts']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<li id="mc-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
>">
				<div class="mc-comment-user">
					<a class="mc-comment-author" href="<?php echo $_smarty_tpl->tpl_vars['item']->value['author_www'];?>
">
						<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['author_avatar'];?>
" width="36" height="36" />
					</a>
				</div>
				<div class="mc-comment-wrapper mc-comment-approved">
					<div class="mc-comment-head">
						<a class="mc-comment-username" href="<?php echo $_smarty_tpl->tpl_vars['item']->value['author_www'];?>
" target="_blank" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['item']->value['author_name'];?>
</a>
						<span class="mc-comment-bullet"> • </span>
						<a class="mc-comment-created" href="<?php echo $_smarty_tpl->tpl_vars['item']->value['channel'];?>
#mc-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" timestamp="<?php echo $_smarty_tpl->tpl_vars['item']->value['created'];?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['created'],"%d %B %Y %H:%M",'',"rus");?>
</a>
					</div>
					<div class="mc-comment-body"><?php echo $_smarty_tpl->tpl_vars['item']->value['message'];?>
</div>
				</div>
				<div class="clear"></div>
				<?php if (count($_smarty_tpl->tpl_vars['item']->value['sub'])>0){?>
				<ul class="mc-comment-child">
					<?php echo $_smarty_tpl->getSubTemplate ('unit.comments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('rows'=>$_smarty_tpl->tpl_vars['item']->value['sub']->cell), 0);?>

				</ul>
				<?php }?>
			</li>
	<?php } ?>
<?php }?><?php }} ?>