<div class="basket">
	<div class="count">{if isset($page.panels_data.basket.count)}{$page.panels_data.basket.count}{else}0{/if}</div>
	<div class="contaner">
		<table class="products">
{if count($page.panels_data.basket) > 0}
	{foreach from=$page.panels_data.basket.list item=row key=index}
			<tr class="item{$row.id}" hash="{($row.id|cat:'-'|cat:$row.max|cat:'-'|cat:$row.count|cat:'-'|cat:$row.price|cat:'-'|cat:($row.count*$row.price))|base64_encode}">
				<td>
					<div class="mod del"><!-- --></div>
					<div class="photo">
						<img src="{$row.photo}" {$row.p_url_size[3]} alt="{$row.title_eng}" />
					</div>
						<div class="title"><a href="/catalog/{$row.group}/{$row.article}/">{$row.grouptitle}<br />{$row.title}</a></div>
						<div class="price"><span class="price">{($row.count*$row.price)|number_format:2:'.':' '|regex_replace:'/\.00/':'.―'}</span>&nbsp;</div>
						<div class="mod inc button-count"><!-- --></div>
						<div class="count"><span class="count">{$row.count}</span></div>
						<div class="mod dec button-count"><!-- --></div>
						{assign var=weight value=";"|explode:$row.weight}
						{assign var=weight_type value=['г','кг','мл','л']}
						<div class="weight">{$weight[1]} {$weight_type[$weight[0]]}.</div>
					<div class="clear"><!-- --></div>
				</td>
			</tr>
	{/foreach}
{/if}
		</table>
	</div>
	<div class="info">Ваша корзина пуста</div>
	<div class="result {if count($page.panels_data.basket) == 0}hidden{/if}"><span title="Точная сумма заказа будет известна после сборки груза, так мыло режется вручную и вес колеблется. По факту кусок может быть меньше или больше. И счет выставлен будет из расчета стоимости одного грамма мыла.">Предварительная</span> сумма заказа: <span class="price">{if !empty($page.panels_data.basket.price)}{$page.panels_data.basket.price|number_format:2:'.':' '|regex_replace:'/\.00/':'.―'}{else}0.―{/if}</span></div>
	<div class="roller{if ($page.panels_data.basket.sell_val==0)} hide{/if}">
		<div class="sell">Скидка: <span>{$page.panels_data.basket.sell_val} %</span></div>
		<div class="clear"><!-- --></div>
		<div class="total-result">Итого сумма заказа<br />с учетом скидки:<span>{$page.panels_data.basket.sell_price}</span></div>
		<div class="clear"><!-- --></div>
	</div>
	<div class="clear"><!-- --></div>
</div>