					<div class="line_big"></div>
					<div class="column left">
{if count($page.content.post_list) > 0}
	{foreach from=$page.content.post_list item=row key=index}
						<div class="blog_item{if $index==0} first-child{/if}">
							<div class="column left">
								<div class="date">
									<span class="number">{$row.date.day}</span>
									<span class="month">{$row.date.month}</span>
									<span class="year">{$row.date.year}</span>
									<span class="day">{$row.date.week}</span>
								</div>
							</div>
							<div class="column right">
								<h1><a href="{if isset($row.group_alias)}/{$SITE_SECTION_NAME}/{$row.group_alias}/{else}./{/if}{$row.alias}/">{$row.title}</a></h1>
								<div class="comments"><a href="{if isset($row.group_alias)}/{$SITE_SECTION_NAME}/{$row.group_alias}/{else}./{/if}{$row.alias}/#mc-container">{$row.comments}</a> комментарий</div>
								<a href="{if isset($row.group_alias)}/{$SITE_SECTION_NAME}/{$row.group_alias}/{else}./{/if}{$row.alias}/"><img src="{$row.imgs.src}" {$row.imgs.size[2]} /></a>
								<p>{$row.text}</p>
								{if count($row.tags)>0 && !empty($row.tags[0])}
								<p class="tags-list">
									ТЕГИ: 
									{foreach from=$row.tags item=row_tags key=tags_index}
									<a href="/{$SITE_SECTION_NAME}/tag_{$row_tags|regex_replace:'#\s#':'_'}/">{$row_tags}</a>{if $tags_index < count($row.tags)-1},{else}.{/if}
									{/foreach}
								</p>
								{/if}
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
	{/foreach}
{else}
						<br />
						<br />
						<p style="text-align:center">Записей пока нет</p>
						<br />
						<br />
						<br />
						<br />
{/if}
						
					</div>
					<div class="column right">
{if !empty($page.submenu_tpl)}
	{include file=$page.submenu_tpl}
{/if}

{if $page.panels.count.left>0}

{/if}
{section name=left_panel loop=$page.panels.module.left}
	{include file=$page.panels.module.left[left_panel]}
{/section}
					</div>
					<div class="clear"></div>
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
{/if}
					</div>