					<div class="line_big"></div>
					<div class="column left">
{include file="submenu.catalog.tpl"}
						<div class="filter">
							<div class="block type_id">
								<select class="selector">
									<option parid="0" value="0" visible="false">Все</option>
									{foreach from=$page.content.filter_data.type_id item=row key=index}
									<option value="{$row.id}"{if isset($page.filter.selection) && $page.filter.selection.type_id === $row.id} selected="selected"{/if}>{$row.name}</option>
									{/foreach}
								</select>
							</div>
							<div class="block subtype">
								<select class="subselector" parent="type_id">
									<option parid="0" value="0">Все</option>
									{foreach from=$page.content.filter_data.subtype item=row key=index}
									<option parid="{$row.type_id}" value="{$row.id}"{if isset($page.filter.selection) && $page.filter.selection.subtype === $row.id} selected="selected"{/if}>{$row.title}</option>
									{/foreach}
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
	{if count($page.content.produce_list) > 0}
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
                                    {if ($row.count) == 0}
                                        <div><span class="price">Товар в производстве</span></div>
                                    {/if}
								</div>
							{if ($index+1)%3==0 && $index<47}
								<div class="clear"></div>
							{/if}
		{/foreach}
	{/if}
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="pagenation">
	{if $page.content.pages>1}
							<div class="pages">
							{if $page.content.pages <= 10}
								{section name="pages" loop=$page.content.pages}
									{if $smarty.section.pages.index == $page.content.page}
								        <span><span>{$smarty.section.pages.index+1}</span></span>
									{else}
								        <a href="/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}{if $smarty.section.pages.index>0}:pg={$smarty.section.pages.index}{/if}"><span>{$smarty.section.pages.index+1}</span></a>
									{/if}
								{/section}
							{else}
								{if $page.content.page > 0}
								<a href="/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}"><span>&laquo;</span></a>
								{/if}
								{if $page.content.page > 4}
								<span class="empty">..</span>
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
								<span><span>{$smarty.section.pages.index+1}</span></span>
									{else}
								<a href="/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}{if $smarty.section.pages.index>0}:pg={$smarty.section.pages.index}{/if}"><span>{$smarty.section.pages.index+1}</span></a>
									{/if}
								{/section}

								{if $lstart+9 < $page.content.pages}
								<span class="empty">..</span>
								{/if}
								{if $page.content.page < $page.content.pages-1}
								<a href="/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}:pg={$page.content.pages-1}"><span>&raquo;</span></a>
								{/if}
							{/if}
								<span class="clear"><!-- --></span>
							</div>
	{/if}
						</div>
						<div class="clear"></div>
						<div class="subinfo">
						{if !empty($page.content.subinfo)}
						{$page.content.subinfo}
						{/if}
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>