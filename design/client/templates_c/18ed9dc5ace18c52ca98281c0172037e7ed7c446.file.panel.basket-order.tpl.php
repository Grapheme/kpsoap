<?php /* Smarty version Smarty-3.1.8, created on 2014-07-14 14:33:30
         compiled from "design/client/templates/panel.basket-order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:301460965333bb83f393d5-51661289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18ed9dc5ace18c52ca98281c0172037e7ed7c446' => 
    array (
      0 => 'design/client/templates/panel.basket-order.tpl',
      1 => 1405333688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '301460965333bb83f393d5-51661289',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5333bb841600d6_26381236',
  'variables' => 
  array (
    'page' => 0,
    'row' => 0,
    'weight' => 0,
    'weight_type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333bb841600d6_26381236')) {function content_5333bb841600d6_26381236($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
?><div class="basket">
	<div class="count"><?php if (isset($_smarty_tpl->tpl_vars['page']->value['panels_data']['basket']['count'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['panels_data']['basket']['count'];?>
<?php }else{ ?>0<?php }?></div>
	<div class="contaner">
		<table class="products">
<?php if (count($_smarty_tpl->tpl_vars['page']->value['panels_data']['basket'])>0){?>
	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['panels_data']['basket']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
			<tr class="item<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" hash="<?php echo base64_encode(((((((((($_smarty_tpl->tpl_vars['row']->value['id']).('-')).($_smarty_tpl->tpl_vars['row']->value['max'])).('-')).($_smarty_tpl->tpl_vars['row']->value['count'])).('-')).($_smarty_tpl->tpl_vars['row']->value['price'])).('-')).(($_smarty_tpl->tpl_vars['row']->value['count']*$_smarty_tpl->tpl_vars['row']->value['price']))));?>
">
				<td>
					<div class="mod del"><!-- --></div>
					<div class="photo">
						<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" <?php echo $_smarty_tpl->tpl_vars['row']->value['p_url_size'][3];?>
 alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title_eng'];?>
" />
					</div>
						<div class="title"><a href="/catalog/<?php echo $_smarty_tpl->tpl_vars['row']->value['group'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['article'];?>
/"><?php echo $_smarty_tpl->tpl_vars['row']->value['grouptitle'];?>
<br /><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></div>
						<div class="price"><span class="price"><?php echo smarty_modifier_regex_replace(number_format(($_smarty_tpl->tpl_vars['row']->value['count']*$_smarty_tpl->tpl_vars['row']->value['price']),2,'.',' '),'/\.00/','.―');?>
</span>&nbsp;</div>
						<div class="mod inc button-count"><!-- --></div>
						<div class="count"><span class="count"><?php echo $_smarty_tpl->tpl_vars['row']->value['count'];?>
</span></div>
						<div class="mod dec button-count"><!-- --></div>
						<?php $_smarty_tpl->tpl_vars['weight'] = new Smarty_variable(explode(";",$_smarty_tpl->tpl_vars['row']->value['weight']), null, 0);?>
						<?php $_smarty_tpl->tpl_vars['weight_type'] = new Smarty_variable(array('г','кг','мл','л'), null, 0);?>
						<div class="weight"><?php echo $_smarty_tpl->tpl_vars['weight']->value[1];?>
 <?php echo $_smarty_tpl->tpl_vars['weight_type']->value[$_smarty_tpl->tpl_vars['weight']->value[0]];?>
.</div>
					<div class="clear"><!-- --></div>
				</td>
			</tr>
	<?php } ?>
<?php }?>
		</table>
	</div>
	<div class="info">Ваша корзина пуста</div>
	<div class="result <?php if (count($_smarty_tpl->tpl_vars['page']->value['panels_data']['basket'])==0){?>hidden<?php }?>"><span title="Точная сумма заказа будет известна после сборки груза, так мыло режется вручную и вес колеблется. По факту кусок может быть меньше или больше. И счет выставлен будет из расчета стоимости одного грамма мыла.">Предварительная</span> сумма заказа: <span class="price"><?php if (!empty($_smarty_tpl->tpl_vars['page']->value['panels_data']['basket']['price'])){?><?php echo smarty_modifier_regex_replace(number_format($_smarty_tpl->tpl_vars['page']->value['panels_data']['basket']['price'],2,'.',' '),'/\.00/','.―');?>
<?php }else{ ?>0.―<?php }?></span></div>
	<div class="CostOfDelivery" <?php if (count($_smarty_tpl->tpl_vars['page']->value['panels_data']['basket']['price'])>=2000){?>style="disaplay:none;"<?php }?>>
		<div class="clear"><!-- --></div>
		<div class="result"><span title="При заказе на сумму более 2000 рублей доставка осуществляется бесплатно.">Стоимость</span> доставки: <span class="price-cost-delivery">250</span></div>
		<div class="clear"><!-- --></div>
		<div class="result">Итого: <span class="price-with-cost-delivery"><?php echo $_smarty_tpl->tpl_vars['page']->value['panels_data']['basket']['price']+250;?>
</span></div>
	</div>
	<div class="roller<?php if (($_smarty_tpl->tpl_vars['page']->value['panels_data']['basket']['sell_val']==0)){?> hide<?php }?>">
		<div class="sell">Скидка: <span><?php echo $_smarty_tpl->tpl_vars['page']->value['panels_data']['basket']['sell_val'];?>
 %</span></div>
		<div class="clear"><!-- --></div>
		<div class="total-result">Итого сумма заказа<br />с учетом скидки:<span><?php echo $_smarty_tpl->tpl_vars['page']->value['panels_data']['basket']['sell_price'];?>
</span></div>
		<div class="clear"><!-- --></div>
	</div>
	<div class="clear"><!-- --></div>
</div><?php }} ?>