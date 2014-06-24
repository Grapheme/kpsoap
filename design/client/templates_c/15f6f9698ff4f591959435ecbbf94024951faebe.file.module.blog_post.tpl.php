<?php /* Smarty version Smarty-3.1.8, created on 2014-03-27 02:17:11
         compiled from "design/client/templates/module.blog_post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:990878752533351e74e5ad6-21055017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15f6f9698ff4f591959435ecbbf94024951faebe' => 
    array (
      0 => 'design/client/templates/module.blog_post.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '990878752533351e74e5ad6-21055017',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'word' => 0,
    'word_c' => 0,
    'word_b' => 0,
    'SITE_SECTION_NAME' => 0,
    'row_tags' => 0,
    'tags_index' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533351e76ee307_58274534',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533351e76ee307_58274534')) {function content_533351e76ee307_58274534($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
?>					<div class="line_big"></div>
					<div class="column left">
						<div class="blog_item">
							<div class="column left">
								<div class="date">
									<span class="number"><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['date']['day'];?>
</span>
									<span class="month"><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['date']['month'];?>
</span>
									<span class="year"><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['date']['year'];?>
</span>
									<span class="day"><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['date']['week'];?>
</span>
								</div>
							</div>
							<div class="column right">
								<h1><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['title'];?>
</h1>
								<div class="comments"><a href="#mc-container"><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['comments'];?>
</a> комментарий</div>
								<?php if (10==2){?>
								<?php $_smarty_tpl->tpl_vars["word"] = new Smarty_variable(smarty_modifier_regex_replace(trim(preg_replace('!\s+!u', ' ',preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['text']))),'/([^ ]+).*/','\1'), null, 0);?>
								<?php $_smarty_tpl->tpl_vars["word_c"] = new Smarty_variable(mb_strtoupper(mb_substr($_smarty_tpl->tpl_vars['word']->value,0,1,'utf-8'), 'UTF-8'), null, 0);?>
								<?php $_smarty_tpl->tpl_vars["word_b"] = new Smarty_variable(mb_substr(mb_strtolower($_smarty_tpl->tpl_vars['word']->value, 'UTF-8'),1), null, 0);?>
								
								<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['text'],((('/<p>(.*)').($_smarty_tpl->tpl_vars['word']->value)).('/')),(((('<div class="forlitter">').($_smarty_tpl->tpl_vars['word_c']->value)).('</div><p>\1')).($_smarty_tpl->tpl_vars['word_b']->value)));?>

								<?php }?>
								<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['text'];?>

								<?php if (count($_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['tags'])>0&&!empty($_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['tags'][0])){?>
								<p class="tags-list">
									ТЕГИ: 
									<?php  $_smarty_tpl->tpl_vars['row_tags'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row_tags']->_loop = false;
 $_smarty_tpl->tpl_vars['tags_index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row_tags']->key => $_smarty_tpl->tpl_vars['row_tags']->value){
$_smarty_tpl->tpl_vars['row_tags']->_loop = true;
 $_smarty_tpl->tpl_vars['tags_index']->value = $_smarty_tpl->tpl_vars['row_tags']->key;
?>
									<a href="/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/tag_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row_tags']->value,'#\s#','_');?>
/"><?php echo $_smarty_tpl->tpl_vars['row_tags']->value;?>
</a><?php if ($_smarty_tpl->tpl_vars['tags_index']->value<count($_smarty_tpl->tpl_vars['page']->value['content']['post_cont']['tags'])-1){?>,<?php }else{ ?>.<?php }?>
									<?php } ?>
								</p>
								<?php }?>
								
								<?php echo $_smarty_tpl->getSubTemplate ('unit.share.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('type'=>'count','list'=>'fb;vk;gp;tw'), 0);?>

								<?php echo $_smarty_tpl->getSubTemplate ('unit.comments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="column right">
						<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['submenu_tpl'])){?>
							<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page']->value['submenu_tpl'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

						<?php }?>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['name'] = 'left_panel';
$_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels']['module']['left']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['left_panel']['total']);
?>
							<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page']->value['panels']['module']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['left_panel']['index']], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

						<?php endfor; endif; ?>
					</div>
					<div class="clear"></div><?php }} ?>