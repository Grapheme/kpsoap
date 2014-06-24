<div class="submenu">
	{foreach from=$page.submenu item=row key=index}
		{if !empty($SITE_SECTION_PAGE) && $SITE_SECTION_PAGE == $row.alias}
	<a class="selected{if count($page.content.subtype)>0} sub{/if}" href="{$SERVER_URL_NAME}{$SITE_SECTION_NAME}/{$row.alias}/">{$row.title|regex_replace:"/\[!-\]([0-9]+)\[-!\]/":" <span>(\\1)</span>"}</a>
	{if isset($page.content.subtype) && count($page.content.subtype)>0}
	<span class="subblock">
		{foreach from=$page.content.subtype item=sub}
		<a href="{$SERVER_URL_NAME}{$SITE_SECTION_NAME}/{$row.alias}/{$sub.title|lower|regex_replace:'/[ ]/i':'_'}/"{if (isset($page.content.produce) && $page.content.produce.subtype == $sub.id) || $page.content.subsel == $sub.id} class="select"{/if}>{$sub.title}</a>
		{/foreach}
	</span>
	{else}
	<span class="subblock"></span>
	{/if}
		{else}
	<a href="{$SERVER_URL_NAME}{$SITE_SECTION_NAME}/{$row.alias}/">{$row.title|regex_replace:"/\[!-\]([0-9]+)\[-!\]/":" <span>(\\1)</span>"}</a>
		{/if}
	<div class="clear"><!-- --></div>
	{/foreach}
</div>


<!--
<div class="submenu">
	{foreach from=$page.submenu item=row key=index}
		{if !empty($SITE_SECTION_PAGE) && $SITE_SECTION_PAGE == $row.alias}
	<a class="selected{if count($page.content.subtype)>0} sub{/if}" href="{$SERVER_URL_NAME}{$SITE_SECTION_NAME}/#select[type_id={$row.alias};subtype=Все]">{$row.title|regex_replace:"/\[!-\]([0-9]+)\[-!\]/":" <span>(\\1)</span>"}</a>
	{if count($page.content.subtype)>0}
	<span class="subblock">
		{foreach from=$page.content.subtype item=sub}
		<a href="{$SERVER_URL_NAME}{$SITE_SECTION_NAME}/#select[type_id={$row.alias};subtype={$sub.title|lower|regex_replace:'/[ ]/i':'_'}]"{if $page.content.produce.subtype == $sub.id} class="select"{/if}>{$sub.title}</a>
		{/foreach}
	</span>
	{/if}
		{else}
	<a href="{$SERVER_URL_NAME}{$SITE_SECTION_NAME}/#select[type_id={$row.alias};subtype=Все]">{$row.title|regex_replace:"/\[!-\]([0-9]+)\[-!\]/":" <span>(\\1)</span>"}</a>
		{/if}
	<div class="clear"></div>
	{/foreach}
</div>
-->