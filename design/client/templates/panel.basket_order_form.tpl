<div class="popup-contaner">
	<div id="order_form" class="popup">
		<h1>Оформление заказа ///</h1>
		<div class="order-panels">
			<div class="order-panel basket-info">
				<h2>в вашей корзине:</h2>
				<div class="product-list">
					<table class="products">
				
			{if count($page.panels_data.basket) > 0}
				{foreach from=$page.panels_data.basket.list item=row key=index}
						<tr>
							<td class="count">
								<span>{$row.count}x</span> 
							</td>
							<td>{$row.title_eng}</td>
						</tr>
				{/foreach}
			{/if}
					</table>
				</div>
				<h2 class="sub">На общую сумму:</h2>
				<span class="match">{$page.panels_data.basket.price|strrev|regex_replace:"/([0-9][0-9][0-9])/":"\\1 "|strrev|trim|regex_replace:"/(\.[0-9])/":"\\000"} руб</span>
			</div>
			<div class="order-panel user-data">
				<h2>контактные данные:</h2>
				<div class="fields">
					<p>Имя<input id="name" value="" /></p>
					<p>Телефон<input id="phone" value="" /></p>
				</div>
				<h2 class="sub">старше ли вы 18 лет ?</h2>
				<label>ДА <input name="age" class="radio" type="radio" value="1"{if $page.order_try} checked="checked"{/if}/></label>
				<label>НЕТ <input name="age" class="radio" type="radio" value="2"{if !$page.order_try} checked="checked"{/if}/></label>
			</div>
			<div class="order-panel info">
				<h2>Что далее?</h2>
				<p>Ваш заказ поступит менеджеру 
					нашего магазина. С Вами свяжутся 
					по телефону и предложат 
					удобные для Вас способы 
					оплаты и получения товара.</p>
				<p>Спасибо!</p>
				<div class="send{if !$page.order_try} disable{/if}">Оформить</div>
				<div class="end-float"><!-- --></div>
			</div>
			<div class="end-float"><!-- --></div>
		</div>
	</div>
</div>