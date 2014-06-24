<?php /* Smarty version Smarty-3.1.8, created on 2014-03-26 15:51:13
         compiled from "design/client/templates/module.blog_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16822626365332bf3120e0e9-13280718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc0099d278c8eb62fef2bc3feab6347437b7753f' => 
    array (
      0 => 'design/client/templates/module.blog_list.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16822626365332bf3120e0e9-13280718',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'index' => 0,
    'row' => 0,
    'SITE_SECTION_NAME' => 0,
    'row_tags' => 0,
    'tags_index' => 0,
    'SITE_SECTION_PAGE' => 0,
    'lstart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5332bf314a5ec7_52532480',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332bf314a5ec7_52532480')) {function content_5332bf314a5ec7_52532480($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
?>					<div class="line_big"></div>
					<div class="column left">
<?php if (count($_smarty_tpl->tpl_vars['page']->value['content']['post_list'])>0){?>
	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['post_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
						<div class="blog_item<?php if ($_smarty_tpl->tpl_vars['index']->value==0){?> first-child<?php }?>">
							<div class="column left">
								<div class="date">
									<span class="number"><?php echo $_smarty_tpl->tpl_vars['row']->value['date']['day'];?>
</span>
									<span class="month"><?php echo $_smarty_tpl->tpl_vars['row']->value['date']['month'];?>
</span>
									<span class="year"><?php echo $_smarty_tpl->tpl_vars['row']->value['date']['year'];?>
</span>
									<span class="day"><?php echo $_smarty_tpl->tpl_vars['row']->value['date']['week'];?>
</span>
								</div>
							</div>
							<div class="column right">
								<h1><a href="<?php if (isset($_smarty_tpl->tpl_vars['row']->value['group_alias'])){?>/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['group_alias'];?>
/<?php }else{ ?>./<?php }?><?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
/"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></h1>
								<div class="comments"><a href="<?php if (isset($_smarty_tpl->tpl_vars['row']->value['group_alias'])){?>/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['group_alias'];?>
/<?php }else{ ?>./<?php }?><?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
/#mc-container"><?php echo $_smarty_tpl->tpl_vars['row']->value['comments'];?>
</a> комментарий</div>
								<a href="<?php if (isset($_smarty_tpl->tpl_vars['row']->value['group_alias'])){?>/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['group_alias'];?>
/<?php }else{ ?>./<?php }?><?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
/"><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['imgs']['src'];?>
" <?php echo $_smarty_tpl->tpl_vars['row']->value['imgs']['size'][2];?>
 /></a>
								<p><?php echo $_smarty_tpl->tpl_vars['row']->value['text'];?>
</p>
								<?php if (count($_smarty_tpl->tpl_vars['row']->value['tags'])>0&&!empty($_smarty_tpl->tpl_vars['row']->value['tags'][0])){?>
								<p class="tags-list">
									ТЕГИ: 
									<?php  $_smarty_tpl->tpl_vars['row_tags'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row_tags']->_loop = false;
 $_smarty_tpl->tpl_vars['tags_index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row_tags']->key => $_smarty_tpl->tpl_vars['row_tags']->value){
$_smarty_tpl->tpl_vars['row_tags']->_loop = true;
 $_smarty_tpl->tpl_vars['tags_index']->value = $_smarty_tpl->tpl_vars['row_tags']->key;
?>
									<a href="/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/tag_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row_tags']->value,'#\s#','_');?>
/"><?php echo $_smarty_tpl->tpl_vars['row_tags']->value;?>
</a><?php if ($_smarty_tpl->tpl_vars['tags_index']->value<count($_smarty_tpl->tpl_vars['row']->value['tags'])-1){?>,<?php }else{ ?>.<?php }?>
									<?php } ?>
								</p>
								<?php }?>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
	<?php } ?>
<?php }else{ ?>
						<br />
						<br />
						<p style="text-align:center">Записей пока нет</p>
						<br />
						<br />
						<br />
						<br />
<?php }?>
						
					</div>
					<div class="column right">
<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['submenu_tpl'])){?>
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page']->value['submenu_tpl'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['page']->value['panels']['count']['left']>0){?>

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
					<div class="clear"></div>
<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['pages']>1){?>
					<div class="pages">
					<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['pages']<=10){?>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['name'] = "pages";
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['content']['pages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total']);
?>
							<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']==$_smarty_tpl->tpl_vars['page']->value['content']['page']){?>
						<span><span><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']+1;?>
</span></span>
							<?php }else{ ?>
						<a href="/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']>0){?>:pg=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index'];?>
<?php }?>"><span><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']+1;?>
</span></a>
							<?php }?>
						<?php endfor; endif; ?>
					<?php }else{ ?>
						<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['page']>0){?>
						<a href="/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>"><span>&laquo;</span></a>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['page']>4){?>
						<span class="empty">..</span>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['page']<4){?>
							<?php $_smarty_tpl->tpl_vars["lstart"] = new Smarty_variable("0", null, 0);?>
						<?php }elseif($_smarty_tpl->tpl_vars['page']->value['content']['page']-4+9>$_smarty_tpl->tpl_vars['page']->value['content']['pages']){?>
							<?php $_smarty_tpl->tpl_vars["lstart"] = new Smarty_variable(($_smarty_tpl->tpl_vars['page']->value['content']['pages']-9), null, 0);?>
						<?php }else{ ?>
							<?php $_smarty_tpl->tpl_vars["lstart"] = new Smarty_variable(($_smarty_tpl->tpl_vars['page']->value['content']['page']-4), null, 0);?>
						<?php }?>
						
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['name'] = "pages";
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'] = (int)($_smarty_tpl->tpl_vars['lstart']->value);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'] = is_array($_loop=($_smarty_tpl->tpl_vars['lstart']->value+9)) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total']);
?>
							<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']==$_smarty_tpl->tpl_vars['page']->value['content']['page']){?>
						<span><span><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']+1;?>
</span></span>
							<?php }else{ ?>
						<a href="/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']>0){?>:pg=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index'];?>
<?php }?>"><span><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']+1;?>
</span></a>
							<?php }?>
						<?php endfor; endif; ?>
						
						<?php if ($_smarty_tpl->tpl_vars['lstart']->value+9<$_smarty_tpl->tpl_vars['page']->value['content']['pages']){?>
						<span class="empty">..</span>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['page']<$_smarty_tpl->tpl_vars['page']->value['content']['pages']-1){?>
						<a href="/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>:pg=<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['pages']-1;?>
"><span>&raquo;</span></a>
						<?php }?>
					<?php }?>
						<span class="clear"><!-- --></span>
<?php }?>
					</div><?php }} ?>