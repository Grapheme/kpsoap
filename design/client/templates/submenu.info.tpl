						<div class="submenu">
{section name=menu loop=$menu_list}
  {if $menu_list[menu].alias == "info"}
		{section name=submenu loop=$menu_list[menu].subpage}
			{if $SITE_SECTION_PAGE == $menu_list[menu].subpage[submenu].alias}
							<a class="selected" href="{$SERVER_URL_NAME}{$menu_list[menu].alias}{if $menu_list[menu].alias != ""}/{/if}{$menu_list[menu].subpage[submenu].alias}{if $menu_list[menu].subpage[submenu].alias != ""}/{/if}">{$menu_list[menu].subpage[submenu].menutitle}</a>
			{else}
							<a href="{$SERVER_URL_NAME}{$menu_list[menu].alias}{if $menu_list[menu].alias != ""}/{/if}{$menu_list[menu].subpage[submenu].alias}{if $menu_list[menu].subpage[submenu].alias != ""}/{/if}">{$menu_list[menu].subpage[submenu].menutitle}</a>
			{/if}
		{/section}
	{/if}
{/section}
						</div>