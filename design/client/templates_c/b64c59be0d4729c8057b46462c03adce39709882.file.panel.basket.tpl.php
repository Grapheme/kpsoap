<?php /* Smarty version Smarty-3.1.8, created on 2014-06-24 12:17:04
         compiled from "design/client/templates\panel.basket.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38953a93400390b67-04958493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b64c59be0d4729c8057b46462c03adce39709882' => 
    array (
      0 => 'design/client/templates\\panel.basket.tpl',
      1 => 1403596861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38953a93400390b67-04958493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53a934003fe183_88570935',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53a934003fe183_88570935')) {function content_53a934003fe183_88570935($_smarty_tpl) {?><div class="basket" style="display:none">
	<div class="count"><?php if (isset($_smarty_tpl->tpl_vars['page']->value['panels']['data']['basket']['count'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['panels']['data']['basket']['count'];?>
<?php }else{ ?>0<?php }?></div>
	<div class="info">Ваша корзина пуста</div>
	<div class="contaner">
		<table class="products">
<?php if (count($_smarty_tpl->tpl_vars['page']->value['panels']['data']['basket'])>0){?>
	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['panels']['data']['basket']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
			<tr class="item<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" hash="<?php echo base64_encode(((((((((($_smarty_tpl->tpl_vars['row']->value['id']).('-')).($_smarty_tpl->tpl_vars['row']->value['max'])).('-')).($_smarty_tpl->tpl_vars['row']->value['count'])).('-')).($_smarty_tpl->tpl_vars['row']->value['price'])).('-')).(($_smarty_tpl->tpl_vars['row']->value['count']*$_smarty_tpl->tpl_vars['row']->value['price']))));?>
">
				<td>
					<div class="photo">
						<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['row']->value['p_url_size'][0];?>
" height="<?php echo $_smarty_tpl->tpl_vars['row']->value['p_url_size'][1];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title_eng'];?>
" />
					</div>
					<div class="mod del"><!-- --></div>
					<div class="mod dec disable"><!-- --></div>
					<div class="mod inc disable"><!-- --></div>
					<div class="clear"><!-- --></div>
					<div class="data">
						<span class="count" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['count'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['count'];?>
x</span> <a href="/catalog/<?php echo $_smarty_tpl->tpl_vars['row']->value['group'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['article'];?>
/"><?php echo $_smarty_tpl->tpl_vars['row']->value['article'];?>
</a>
					</div>
				</td>
				<td class="basket-price"><span class="price" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['count']*$_smarty_tpl->tpl_vars['row']->value['price'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['count']*$_smarty_tpl->tpl_vars['row']->value['price'];?>
</span> р</td>
			</tr>
	<?php } ?>
<?php }?>
		</table>
	</div>
	<div class="result <?php if (count($_smarty_tpl->tpl_vars['page']->value['panels']['data']['basket'])==0){?>hidden<?php }?>">Товаров на сумму: <span><?php if (!empty($_smarty_tpl->tpl_vars['page']->value['panels']['data']['basket']['price'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['panels']['data']['basket']['price'];?>
<?php }else{ ?>0<?php }?> р</span></div>
	<div class="roller<?php if (($_smarty_tpl->tpl_vars['page']->value['panels']['data']['basket']['sell_val']==0)){?> hide<?php }?>">
		<div class="sell">Скидка:<span><?php echo $_smarty_tpl->tpl_vars['page']->value['panels']['data']['basket']['sell_val'];?>
 %</span></div>
		<div class="clear"><!-- --></div>
		<a href="/partners/sistema_skidok/" class="discounts">Читать условия<br />получения скидки</a>
		<div class="clear"><!-- --></div>
		<div class="total-result">Итого сумма заказа<br />с учетом скидки:<span><?php echo $_smarty_tpl->tpl_vars['page']->value['panels']['data']['basket']['sell_price'];?>
</span></div>
		<div class="clear"><!-- --></div>
	</div>
	<a href="/order/" class="order_href">Оформление заказа</a>
</div><?php }} ?>