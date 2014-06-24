<?php /* Smarty version Smarty-3.1.8, created on 2014-06-24 12:15:49
         compiled from "design/client/templates\module.index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1664153a933b5cda9f5-64627226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64358189f5d53bff61a580f484f66c148be65435' => 
    array (
      0 => 'design/client/templates\\module.index.tpl',
      1 => 1403596861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1664153a933b5cda9f5-64627226',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'row' => 0,
    'word' => 0,
    'word_c' => 0,
    'word_b' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53a933b5d44198_97528535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53a933b5d44198_97528535')) {function content_53a933b5d44198_97528535($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include 'E:\\home\\kpsoap\\www\\system\\smarty\\plugins\\modifier.regex_replace.php';
?>					<div class="banner">
						<div class="basis">
							<div class="images">
								<div class="banners 570x386 [/banner.xml]" style="float:right"></div>
							</div>
						</div>
						<div class="scotch top left"><!-- --></div>
						<div class="scotch top right"><!-- --></div>
						<div class="scotch bottom left"><!-- --></div>
						<div class="scotch bottom right"><!-- --></div>
					</div>
					<?php if (is_array($_smarty_tpl->tpl_vars['page']->value['produce_sell'])&&count($_smarty_tpl->tpl_vars['page']->value['produce_sell'])>0){?>
					<div class="products-gallery">
						<div class="parrent">
							<div class="motion">
							<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['produce_sell']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
								<div class="item<?php if ($_smarty_tpl->tpl_vars['row']->value['new']==1){?> new<?php }?>"> <!-- news -->
									<a href="/catalog/<?php echo $_smarty_tpl->tpl_vars['row']->value['groupalias'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['article'];?>
/" class="img">
										<img src = "<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
"><samp></samp>
										<span class="title"><?php echo $_smarty_tpl->tpl_vars['row']->value['title_eng'];?>
</span>
									</a>
									<span class="price<?php if ($_smarty_tpl->tpl_vars['row']->value['price_sell']>0){?> last_price<?php }?>">&nbsp;<?php echo smarty_modifier_regex_replace(trim(strrev(smarty_modifier_regex_replace(strrev($_smarty_tpl->tpl_vars['row']->value['price']),"/([0-9][0-9][0-9])/","\\1 "))),"/(\.[0-9])/","\\000");?>
 руб&nbsp;</span>
									<?php if ($_smarty_tpl->tpl_vars['row']->value['price_sell']>0){?>
										<span class="price"><?php echo smarty_modifier_regex_replace(trim(strrev(smarty_modifier_regex_replace(strrev($_smarty_tpl->tpl_vars['row']->value['price_sell']),"/([0-9][0-9][0-9])/","\\1 "))),"/(\.[0-9])/","\\000");?>
 руб</span>
									<?php }?>
								</div>
							<?php } ?>
								<div class="clear"></div>
							</div>
						</div>
						<div class="prev"><!-- --></div>
						<div class="next"><!-- --></div>
					</div>
					<?php }?>
					
					<div class="index-text">
						<div class="center">
							<h2><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['title'];?>
</h2>
						</div>
						<?php $_smarty_tpl->tpl_vars["word"] = new Smarty_variable(smarty_modifier_regex_replace(trim(preg_replace('!\s+!u', ' ',preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['content']['text']))),'/([^ ]+).*/','\1'), null, 0);?>
						<?php $_smarty_tpl->tpl_vars["word_c"] = new Smarty_variable(mb_strtoupper(mb_substr($_smarty_tpl->tpl_vars['word']->value,0,1,'utf-8'), 'UTF-8'), null, 0);?>
						<?php $_smarty_tpl->tpl_vars["word_b"] = new Smarty_variable(mb_substr(mb_strtolower($_smarty_tpl->tpl_vars['word']->value, 'UTF-8'),1), null, 0);?>
						<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['content']['text'],((('/<p>(.*)').($_smarty_tpl->tpl_vars['word']->value)).('/')),(((('<div class="forlitter">').($_smarty_tpl->tpl_vars['word_c']->value)).('</div><p>\1')).($_smarty_tpl->tpl_vars['word_b']->value)),1);?>

					</div>
					<div class="clear"></div><?php }} ?>