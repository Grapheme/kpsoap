<?php /* Smarty version Smarty-3.1.8, created on 2014-07-30 12:55:38
         compiled from "design/client/templates/module.catalog_card.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175034715332f523241507-87901246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aad8e1130c0f101a83fd9b240563b08ec113c8e0' => 
    array (
      0 => 'design/client/templates/module.catalog_card.tpl',
      1 => 1406710375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175034715332f523241507-87901246',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5332f52355bd88_99829878',
  'variables' => 
  array (
    'page' => 0,
    'row' => 0,
    'sell' => 0,
    'weight' => 0,
    'weight_type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332f52355bd88_99829878')) {function content_5332f52355bd88_99829878($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
?>					<div class="line_big"></div>
					<div class="column left">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page']->value['submenu_tpl'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("panel.basket.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					</div>
					<div class="column right">
						<h1><?php echo $_smarty_tpl->tpl_vars['page']->value['content']['produce']['group_name'];?>
 &laquo;<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['produce']['title'];?>
&raquo;</h1>
						<div class="column left">
						<?php if (!isset($_smarty_tpl->tpl_vars['page']->value['content']['produce']['nophoto'])){?>
							<p>
								<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['produce']['photo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['src'];?>
" <?php echo $_smarty_tpl->tpl_vars['row']->value['size'][3];?>
 src_width="<?php echo $_smarty_tpl->tpl_vars['row']->value['size']['src']['width'];?>
" src_height="<?php echo $_smarty_tpl->tpl_vars['row']->value['size']['src']['height'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['produce']['group_name'];?>
 &laquo;<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['header'];?>
&raquo; ( <?php echo $_smarty_tpl->tpl_vars['page']->value['content']['produce']['article'];?>
 )" />
								<?php } ?>
							</p>
						<?php }else{ ?>
							<div class="img">
								<img src="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['produce']['photo'][0]['src'];?>
" <?php echo $_smarty_tpl->tpl_vars['page']->value['content']['produce']['photo'][0]['size'][3];?>
 alt="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['produce']['group_name'];?>
 &laquo;<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['header'];?>
&raquo; ( <?php echo $_smarty_tpl->tpl_vars['page']->value['content']['produce']['article'];?>
 )" />
							</div>
						<?php }?>
						</div>
						<div class="column right action">
							<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['produce']['price']>0){?>
								<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['produce']['price_sell']>0){?>
									<?php $_smarty_tpl->tpl_vars["sell"] = new Smarty_variable("last_", null, 0);?>
								<?php }else{ ?>
									<?php $_smarty_tpl->tpl_vars["sell"] = new Smarty_variable('', null, 0);?> <!--|strrev|trim  -->
								<?php }?>
							<span class="<?php echo $_smarty_tpl->tpl_vars['sell']->value;?>
price"><?php echo smarty_modifier_regex_replace(number_format($_smarty_tpl->tpl_vars['page']->value['content']['produce']['price'],2,'.',' '),'/\.00/','.―');?>
</span>
								<?php if ($_smarty_tpl->tpl_vars['sell']->value){?>
							<span class="price sell_price"><?php echo number_format($_smarty_tpl->tpl_vars['page']->value['content']['produce']['price_sell'],2,'.',' ');?>
 р</span>
								<?php }?>
							<?php $_smarty_tpl->tpl_vars['weight'] = new Smarty_variable(explode(";",$_smarty_tpl->tpl_vars['page']->value['content']['produce']['weight']), null, 0);?>
							<?php $_smarty_tpl->tpl_vars['weight_type'] = new Smarty_variable(array('г','кг','мл','л'), null, 0);?>
							<span class="weight">Вес:<span><?php echo $_smarty_tpl->tpl_vars['weight']->value[1];?>
 <?php echo $_smarty_tpl->tpl_vars['weight_type']->value[$_smarty_tpl->tpl_vars['weight']->value[0]];?>
.</span></span>
							<div class="addbasket-panel" rev="<?php echo base64_encode($_smarty_tpl->tpl_vars['page']->value['content']['produce']['id']);?>
">
								<div class="count hide">
									<span class="text">Кол-во:</span>
									<span class="button-count inc disable" onselectstart="event.returnValue=false;"><!-- --></span>
									<span class="input">1</span>
									<span class="button-count dec disable" onselectstart="event.returnValue=false;"><!-- --></span>
									<div class="clear"><!-- --></div>
								</div>
                                <?php if (($_smarty_tpl->tpl_vars['page']->value['content']['produce']['count'])>0){?>
                                    <span class="button add">В корзину</span>
                                <?php }?>
							</div>
                                <?php if (($_smarty_tpl->tpl_vars['page']->value['content']['produce']['count'])==0){?>
                                <div class="weight"><span style="margin-left:20px;">Товар в производстве</span></div>
                                <?php }?>
							<?php }?>
						</div>
						<div class="clear"></div>
						<div class="column left descript">
							<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['produce']['about_product'];?>

						</div>
						<div class="column right info">
						<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['produce']['use'])){?>
							<p>
								<span>Применение:</span>
								<?php echo smarty_modifier_regex_replace(preg_replace('!\s+!u', ' ',preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['content']['produce']['use'])),'/\n/','<br />');?>

							</p>
						<?php }?>
						<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['produce']['consist'])){?>
							<p>
								<span>Состав:</span>
								<?php echo smarty_modifier_regex_replace(preg_replace('!\s+!u', ' ',preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['content']['produce']['consist'])),'/\n/','<br />');?>

							</p>
						<?php }?>
						<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['produce']['storage'])){?>
							<p>
								<span>Условия хранения:</span>
								<?php echo smarty_modifier_regex_replace(preg_replace('!\s+!u', ' ',preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['content']['produce']['storage'])),'/\n/','<br />');?>

							</p>
						<?php }?>
						<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['produce']['expiration'])){?>
							<p>
								<span>Срок годности:</span>
								<?php echo smarty_modifier_regex_replace(preg_replace('!\s+!u', ' ',preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['content']['produce']['expiration'])),'/\n/','<br />');?>

							</p>
						<?php }?>
						<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['produce']['contr'])){?>
							<p>
								<span>Противопоказания:</span>
								<?php echo smarty_modifier_regex_replace(preg_replace('!\s+!u', ' ',preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['content']['produce']['contr'])),'/\n/','<br />');?>

							</p>
						<?php }?>
						<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['produce']['extra'])){?>
							<p>
								<span>Дополнительно:</span>
								<?php echo smarty_modifier_regex_replace(preg_replace('!\s+!u', ' ',preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['page']->value['content']['produce']['extra'])),'/\n/','<br />');?>

							</p>
						<?php }?>
						</div>
						<div class="clear"></div>
						<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['similarity'])){?>
						<div class="similarity">
							<h2>Рекомендуем</h2>
							<div class="products-gallery" id="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['produce']['id'];?>
" index_similarity="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['produce']['index_similarity'];?>
">
								<div class="parrent">
									<div class="motion">
									<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['similarity']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
										<div class="item<?php if ($_smarty_tpl->tpl_vars['row']->value['new']==1){?> new<?php }?>"> <!-- news -->
											<a href="/catalog/<?php echo $_smarty_tpl->tpl_vars['row']->value['group'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['article'];?>
/" class="img">
													<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" <?php echo $_smarty_tpl->tpl_vars['row']->value['psize'][3];?>
 alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title_eng'];?>
" /><samp></samp>
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
									</div>
								</div>
								<div class="prev"><!-- --></div>
								<div class="next"><!-- --></div>
							</div>
							<div class="clear"></div>
						</div>
						<?php }?>
					</div>
					<div class="clear"></div>

<?php }} ?>