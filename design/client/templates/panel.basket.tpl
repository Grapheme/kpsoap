<div class="basket" style="display:none">
	<div class="count">{if isset($page.panels.data.basket.count)}{$page.panels.data.basket.count}{else}0{/if}</div>
	<div class="info">Ваша корзина пуста</div>
	<div class="contaner">
		<table class="products">
{if count($page.panels.data.basket) > 0}
	{foreach from=$page.panels.data.basket.list item=row key=index}
			<tr class="item{$row.id}" hash="{($row.id|cat:'-'|cat:$row.max|cat:'-'|cat:$row.count|cat:'-'|cat:$row.price|cat:'-'|cat:($row.count*$row.price))|base64_encode}">
				<td>
					<div class="photo">
						<img src="{$row.photo}" width="{$row.p_url_size[0]}" height="{$row.p_url_size[1]}" alt="{$row.title_eng}" />
					</div>
					<div class="mod del"><!-- --></div>
					<div class="mod dec disable"><!-- --></div>
					<div class="mod inc disable"><!-- --></div>
					<div class="clear"><!-- --></div>
					<div class="data">
						<span class="count" value="{$row.count}">{$row.count}x</span> <a href="/catalog/{$row.group}/{$row.article}/">{$row.article}</a>
					</div>
				</td>
				<td class="basket-price"><span class="price" value="{$row.count*$row.price}">{$row.count*$row.price}</span> р</td>
			</tr>
	{/foreach}
{/if}
		</table>
	</div>
	<div class="result {if count($page.panels.data.basket) == 0}hidden{/if}">Товаров на сумму: <span>{if !empty($page.panels.data.basket.price)}{$page.panels.data.basket.price}{else}0{/if} р</span></div>
	<div class="roller{if ($page.panels.data.basket.sell_val==0)} hide{/if}">
		<div class="sell">Скидка:<span>{$page.panels.data.basket.sell_val} %</span></div>
		<div class="clear"><!-- --></div>
		<a href="/partners/sistema_skidok/" class="discounts">Читать условия<br />получения скидки</a>
		<div class="clear"><!-- --></div>
		<div class="total-result">Итого сумма заказа<br />с учетом скидки:<span>{$page.panels.data.basket.sell_price}</span></div>
		<div class="clear"><!-- --></div>
	</div>
	<a href="/order/" class="order_href">Оформление заказа</a>
</div>