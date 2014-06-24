<div class="tags">
	<p>ТЕГИ</p>
	{assign var="num" value="0"}
	{foreach from=$page.tagmenu item=row key=index}
		<!--{$num++}-->
		{if preg_match('#^tag_#',$row.alias)}
			{if isset($SITE_SECTION_PAGE) && $SITE_SECTION_PAGE == $row.alias}
	<a class="selected" href="/{$SITE_SECTION_NAME}{if $SITE_SECTION_NAME != ""}/{/if}{$row.alias}{if $row.alias != ""}/{/if}">{$row.title|regex_replace:"/\[!-\]([0-9]+)\[-!\]/":" <small>(\\1)</small>"}</a>{if $num < count($page.tagmenu) },{else}.{/if}
			{else}
	<a href="/{$SITE_SECTION_NAME}{if $SITE_SECTION_NAME != ""}/{/if}{$row.alias}{if $row.alias != ""}/{/if}">{$row.title|regex_replace:"/\[!-\]([0-9]+)\[-!\]/":" <small>(\\1)</small>"}</a>{if $num < count($page.tagmenu)},{else}.{/if}
			{/if}
		{/if} 
	{/foreach}
</div>