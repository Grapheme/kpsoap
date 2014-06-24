<div class="menu">
{foreach from=$menu_list item=item key=index}
	{if $item.alias != "" && $item.alias != "info"}
		{if $SITE_SECTION_NAME == $item.alias}
	<a href="{$SERVER_URL_NAME}{$item.alias}{if $item.alias != ""}/{/if}" class="select">{$item.name}</a>              
		{else}
	<a href="{$SERVER_URL_NAME}{$item.alias}{if $item.alias != ""}/{/if}">{$item.name}</a>
		{/if}
	{/if}
{/foreach}
	<div class="clear"><!-- --></div>
</div>