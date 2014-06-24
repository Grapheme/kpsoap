					<div class="line_big"></div>
					<div class="column left">
{include file=$page.submenu_tpl}
{include file="panel.basket.tpl"}
					</div>
					<div class="column right">
						<h1>{$page.content.produce.group_name} &laquo;{$page.content.produce.title}&raquo;</h1>
						<div class="column left">
						{if !isset($page.content.produce.nophoto)}
							<p>
								{foreach from=$page.content.produce.photo item=row key=index}
								<img src="{$row.src}" {$row.size[3]} src_width="{$row.size.src.width}" src_height="{$row.size.src.height}" alt="{$page.content.produce.group_name} &laquo;{$page.content.header}&raquo; ( {$page.content.produce.article} )" />
								{/foreach}
							</p>
						{else}
							<div class="img">
								<img src="{$page.content.produce.photo[0].src}" {$page.content.produce.photo[0].size[3]} alt="{$page.content.produce.group_name} &laquo;{$page.content.header}&raquo; ( {$page.content.produce.article} )" />
							</div>
						{/if}
						</div>
						<div class="column right action">
							{if $page.content.produce.price > 0}
								{if $page.content.produce.price_sell > 0}
									{assign var="sell" value="last_"}
								{else}
									{assign var="sell" value=""} <!--|strrev|trim  -->
								{/if}
							<span class="{$sell}price">{$page.content.produce.price|number_format:2:'.':' '|regex_replace:'/\.00/':'.―'}</span>
								{if $sell}
							<span class="price sell_price">{$page.content.produce.price_sell|number_format:2:'.':' '} р</span>
								{/if}
							{assign var=weight value=";"|explode:$page.content.produce.weight}
							{assign var=weight_type value=['г','кг','мл','л']}
							<span class="weight">Вес:<span>{$weight[1]} {$weight_type[$weight[0]]}.</span></span>
							<div class="addbasket-panel" rev="{$page.content.produce.id|base64_encode}">
								<div class="count hide">
									<span class="text">Кол-во:</span>
									<span class="button-count inc disable" onselectstart="event.returnValue=false;"><!-- --></span>
									<span class="input">1</span>
									<span class="button-count dec disable" onselectstart="event.returnValue=false;"><!-- --></span>
									<div class="clear"><!-- --></div>
								</div>
								<span class="button add">В корзину</span>
							</div>
							{/if}
						</div>
						<div class="clear"></div>
						<div class="column left descript">
							{$page.content.produce.about_product}
						</div>
						<div class="column right info">
						{if !empty($page.content.produce.use)}
							<p>
								<span>Применение:</span>
								{$page.content.produce.use|strip_tags|strip|regex_replace:'/\n/':'<br />'}
							</p>
						{/if}
						{if !empty($page.content.produce.consist)}
							<p>
								<span>Состав:</span>
								{$page.content.produce.consist|strip_tags|strip|regex_replace:'/\n/':'<br />'}
							</p>
						{/if}
						{if !empty($page.content.produce.storage)}
							<p>
								<span>Условия хранения:</span>
								{$page.content.produce.storage|strip_tags|strip|regex_replace:'/\n/':'<br />'}
							</p>
						{/if}
						{if !empty($page.content.produce.expiration)}
							<p>
								<span>Срок годности:</span>
								{$page.content.produce.expiration|strip_tags|strip|regex_replace:'/\n/':'<br />'}
							</p>
						{/if}
						{if !empty($page.content.produce.contr)}
							<p>
								<span>Противопоказания:</span>
								{$page.content.produce.contr|strip_tags|strip|regex_replace:'/\n/':'<br />'}
							</p>
						{/if}
						{if !empty($page.content.produce.extra)}
							<p>
								<span>Дополнительно:</span>
								{$page.content.produce.extra|strip_tags|strip|regex_replace:'/\n/':'<br />'}
							</p>
						{/if}
						</div>
						<div class="clear"></div>
						{if !empty($page.content.similarity)}
						<div class="similarity">
							<h2>Рекомендуем</h2>
							<div class="products-gallery" id="{$page.content.produce.id}" index_similarity="{$page.content.produce.index_similarity}">
								<div class="parrent">
									<div class="motion">
									{foreach from=$page.content.similarity item=row key=index}
										<div class="item{if $row.new == 1} new{/if}"> <!-- news -->
											<a href="/catalog/{$row.group}/{$row.article}/" class="img">
													<img src="{$row.photo}" {$row.psize[3]} alt="{$row.title_eng}" /><samp></samp>
												<span class="title">{$row.title_eng}</span>
											</a>
											<span class="price{if $row.price_sell>0} last_price{/if}">&nbsp;{$row.price|strrev|regex_replace:"/([0-9][0-9][0-9])/":"\\1 "|strrev|trim|regex_replace:"/(\.[0-9])/":"\\000"} руб&nbsp;</span>
											{if $row.price_sell>0}
												<span class="price">{$row.price_sell|strrev|regex_replace:"/([0-9][0-9][0-9])/":"\\1 "|strrev|trim|regex_replace:"/(\.[0-9])/":"\\000"} руб</span>
											{/if}
										</div>
									{/foreach}
									</div>
								</div>
								<div class="prev"><!-- --></div>
								<div class="next"><!-- --></div>
							</div>
							<div class="clear"></div>
						</div>
						{/if}
					</div>
					<div class="clear"></div>
						
					