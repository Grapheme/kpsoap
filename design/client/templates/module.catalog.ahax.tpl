				<responce hash="{$page.content.hash}">
					<produce>
						<div class="produce-list">
{if count($page.content.produce_list) > 0}
							<div class="products-gallery">
	{foreach from=$page.content.produce_list item=row key=index}
								<div class="item {if (time() - strtotime($row.last_update)) < 2592000}news{/if}"> <!-- top news -->
									<a href="/{$SITE_SECTION_NAME}/{$row.group}/{$row.article}/" class="img">
										<img src="{$row.photo}" {$row.psize[3]} alt="{$row.title_eng}" />
										<samp></samp>
										<span class="title">{$row.title_eng}</span>
									</a>
									<span class="price{if $row.price_sell>0} last_price{/if}"">{$row.price|strrev|regex_replace:"/([0-9][0-9][0-9])/":"\\1 "|strrev|trim|regex_replace:"/(\.[0-9])/":"\\000"} руб</span>
									{if $row.price_sell>0}
										<span class="price">{$row.price_sell|strrev|regex_replace:"/([0-9][0-9][0-9])/":"\\1 "|strrev|trim|regex_replace:"/(\.[0-9])/":"\\000"} руб</span>
									{/if}
								</div>
							{if ($index+1)%3==0 && $index<47}
								<div class="clear"></div>
							{/if}
	{/foreach}
								<div class="clear"></div>
							</div>
{else}
							<p class="no-list">Продукция отсутствует</p>
{/if}
						</div>
					</produce>
					<pagenation>
{if $page.content.pages>1}
						<div class="pages ajax">
							<div class="navigation">
								{if $page.content.pages <= 10}
									{section name="pages" loop=$page.content.pages}
										{if $smarty.section.pages.index == $page.content.page}
									<span><a href="javascript:void(0)">{$smarty.section.pages.index+1}</a></span>
										{else}
									<a href="javascript:void(0)" rev="{if $smarty.section.pages.index>0}{$smarty.section.pages.index}{/if}">{$smarty.section.pages.index+1}</a>
										{/if}
									{/section}
								{else}
									{if $page.content.page > 0}
									<a href="/{$SITE_SECTION_NAME}/">&laquo;</a>
									{/if}
									{if $page.content.page < 4}
										{assign var="lstart" value="0"}
									{elseif $page.content.page-4+9 > $page.content.pages}
										{assign var="lstart" value="`$page.content.pages-9`"}
									{else}
										{assign var="lstart" value="`$page.content.page-4`"}
									{/if}
									
									{section name="pages" start="`$lstart`" loop="`$lstart+9`"}
										{if $smarty.section.pages.index == $page.content.page}
									<span><a href="javascript:void(0)">{$smarty.section.pages.index+1}</a></span>
										{else}
									<a href="javascript:void(0)" rev="{if $smarty.section.pages.index>0}{$smarty.section.pages.index}{/if}"><span>{$smarty.section.pages.index+1}</span></a>
										{/if}
									{/section}
									
									{if $lstart+9 < $page.content.pages}
									<span class="empty">..</span>
									{/if}
									{if $page.content.page < $page.content.pages-1}
									<a href="/{$SITE_SECTION_NAME}/:pg={$page.content.pages-1}"><span>&raquo;</span></a>
									{/if}
								{/if}
							</div>
						</div>
						<span class="end-float"><!-- --></span>
{/if}
					</pagenation>
					<control>
						
					</control>
				</responce>