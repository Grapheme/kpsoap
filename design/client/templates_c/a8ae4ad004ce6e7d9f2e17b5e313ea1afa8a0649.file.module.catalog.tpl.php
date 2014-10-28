<?php /* Smarty version Smarty-3.1.8, created on 2014-07-30 11:39:43
         compiled from "design/client/templates\module.catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2381153a933bfbb3f78-15349667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8ae4ad004ce6e7d9f2e17b5e313ea1afa8a0649' => 
    array (
      0 => 'design/client/templates\\module.catalog.tpl',
      1 => 1405411538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2381153a933bfbb3f78-15349667',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53a933bfd07d47_61257085',
  'variables' => 
  array (
    'page' => 0,
    'row' => 0,
    'SITE_SECTION_NAME' => 0,
    'index' => 0,
    'SITE_SECTION_PAGE' => 0,
    'lstart' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53a933bfd07d47_61257085')) {function content_53a933bfd07d47_61257085($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include 'Y:\\home\\kpsoap\\www\\system\\smarty\\plugins\\modifier.regex_replace.php';
?>					<div class="line_big"></div>
					<div class="column left">
<?php echo $_smarty_tpl->getSubTemplate ("submenu.catalog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

						<div class="filter">
							<div class="block type_id">
								<select class="selector">
									<option parid="0" value="0" visible="false">Все</option>
									<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['filter_data']['type_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['page']->value['filter']['selection'])&&$_smarty_tpl->tpl_vars['page']->value['filter']['selection']['type_id']===$_smarty_tpl->tpl_vars['row']->value['id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
									<?php } ?>
								</select>
							</div>
							<div class="block subtype">
								<select class="subselector" parent="type_id">
									<option parid="0" value="0">Все</option>
									<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['filter_data']['subtype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
									<option parid="<?php echo $_smarty_tpl->tpl_vars['row']->value['type_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['page']->value['filter']['selection'])&&$_smarty_tpl->tpl_vars['page']->value['filter']['selection']['subtype']===$_smarty_tpl->tpl_vars['row']->value['id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</option>
									<?php } ?>
								</select>
							</div>
						</div>

						<!--
						<div class="h1">Каталог не работает?</div>
						<p>Если у Вас возникли сложности с каталогом или Вы не можете сделать заказ, пожалуйста обратитесь в службу техничесской поддержки с описанием Вашей проблемы.</p><p>Так же по возможности укажите название и версию Вашего браузера, и операционную систему.</p><p><a href="mailto:support@stylewoods.ru">support@stylewoods.ru</a></p>
						-->
					</div>
					<div class="column right">
						<div class="catalog-contaner">
							<div class="products-gallery">
	<?php if (count($_smarty_tpl->tpl_vars['page']->value['content']['produce_list'])>0){?>
		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['produce_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
								<div class="item <?php if ((time()-strtotime($_smarty_tpl->tpl_vars['row']->value['last_update']))<2592000){?>news<?php }?>"> <!-- top news -->
									<a href="/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['group'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['article'];?>
/" class="img">
										<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" <?php echo $_smarty_tpl->tpl_vars['row']->value['psize'][3];?>
 alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title_eng'];?>
" />
										<samp></samp>
										<span class="title"><?php echo $_smarty_tpl->tpl_vars['row']->value['title_eng'];?>
</span>
									</a>
									<span class="price<?php if ($_smarty_tpl->tpl_vars['row']->value['price_sell']>0){?> last_price<?php }?>""><?php echo smarty_modifier_regex_replace(trim(strrev(smarty_modifier_regex_replace(strrev($_smarty_tpl->tpl_vars['row']->value['price']),"/([0-9][0-9][0-9])/","\\1 "))),"/(\.[0-9])/","\\000");?>
 руб</span>
									<?php if ($_smarty_tpl->tpl_vars['row']->value['price_sell']>0){?>
										<span class="price"><?php echo smarty_modifier_regex_replace(trim(strrev(smarty_modifier_regex_replace(strrev($_smarty_tpl->tpl_vars['row']->value['price_sell']),"/([0-9][0-9][0-9])/","\\1 "))),"/(\.[0-9])/","\\000");?>
 руб</span>
									<?php }?>
                                    <?php if (($_smarty_tpl->tpl_vars['row']->value['count'])==0){?>
                                        <div><span class="price">Товар в производстве</span></div>
                                    <?php }?>
								</div>
							<?php if (($_smarty_tpl->tpl_vars['index']->value+1)%3==0&&$_smarty_tpl->tpl_vars['index']->value<47){?>
								<div class="clear"></div>
							<?php }?>
		<?php } ?>
	<?php }?>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="pagenation">
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
							</div>
	<?php }?>
						</div>
						<div class="clear"></div>
						<div class="subinfo">
						<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['subinfo'])){?>
						<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['subinfo'];?>

						<?php }?>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div><?php }} ?>