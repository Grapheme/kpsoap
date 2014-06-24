<div class="h1">Партнёрам</div>
<div class="submenu">
{section name=menu loop=$menu_list}
  {if $menu_list[menu].alias == "partners"}
		{section name=submenu loop=$menu_list[menu].subpage}
			{if $SITE_SECTION_PAGE == $menu_list[menu].subpage[submenu].alias}
	<a class="selected" href="{$SERVER_URL_NAME}{$menu_list[menu].alias}{if $menu_list[menu].alias != ""}/{/if}{$menu_list[menu].subpage[submenu].alias}{if $menu_list[menu].subpage[submenu].alias != ""}/{/if}">{$menu_list[menu].subpage[submenu].menutitle}</a>
			{else}
	<a href="{$SERVER_URL_NAME}{$menu_list[menu].alias}{if $menu_list[menu].alias != ""}/{/if}{$menu_list[menu].subpage[submenu].alias}{if $menu_list[menu].subpage[submenu].alias != ""}/{/if}">{$menu_list[menu].subpage[submenu].menutitle}</a>
			{/if}
	<div class="end-float"><!-- --></div>
		{/section}
	{/if}
{/section}
</div>