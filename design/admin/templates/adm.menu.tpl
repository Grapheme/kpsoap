{section name=menu loop=$menu_list}
	{if $SITE_SECTION_NAME == $menu_list[menu].alias}
	{strip}
	<div id="line_sel">
		<div class="main">{$menu_list[menu].name}</div>
		</div>
		{if empty($SITE_SECTION_PAGE)}
			{if is_array($menu_list[menu].subpage)}
		<div class="sub">
			{section name=subpage loop=$menu_list[menu].subpage}
			<a href="{$SERVER_URL_NAME}admin/{$menu_list[menu].alias}/{if !preg_match('/^(_|__)$/',$menu_list[menu].subpage[subpage].alias)}{$menu_list[menu].subpage[subpage].alias}/{else}" class="base sel{/if}">{$menu_list[menu].subpage[subpage].menutitle}</a>
			{if !preg_match('/^(_|__)$/',$menu_list[menu].subpage[subpage].alias)}
			<a class="del" href="{$SERVER_URL_NAME}admin/{$menu_list[menu].alias}/{$menu_list[menu].subpage[subpage].alias}/:action=delgroup" onclick="return confirm('Удалить подраздел &quot;{$menu_list[menu].subpage[subpage].menutitle}&quot;')"></a>
			{else}
			<div class="base-mode{$menu_list[menu].subpage[subpage].alias}"><!-- --></div>
			{/if}
			{/section}
			{if $menu_list[menu].menu_subpages == true}
			<div class="but_menu">
				<input class="button" type="button" value="Добавить подраздел" onclick="javascript:button.disable(this); javascript:self.location.href='{$SERVER_URL_NAME}admin/{$menu_list[menu].alias}/:action=addgroup'" style="margin: 2px 2px 0px 0px; width: 120px;" />
			</div>
			{/if}
		</div>
			{elseif !empty($menu_list[menu].subpage)}
		<div class="sub">
			<div class="but_menu">
				<input class="button" type="button" value="Добавить подраздел" onclick="javascript:button.disable(this); javascript:self.location.href='{$SERVER_URL_NAME}admin/{$menu_list[menu].alias}/:action=addgroup'" style="margin: 2px 2px 0px 0px; width: 120px;" />
			</div>
			</div>
			{/if}
		{elseif !empty($SITE_SECTION_PAGE)}
			{if is_array($menu_list[menu].subpage)}
			<div class="sub">
				{section name=subpage loop=$menu_list[menu].subpage}
				{if $menu_list[menu].subpage[subpage].alias == $SITE_SECTION_PAGE}
					<div class="sel">{$menu_list[menu].subpage[subpage].menutitle}</div>
					<a class="del" href="{$SERVER_URL_NAME}admin/{$menu_list[menu].alias}/{$SITE_SECTION_PAGE}/:action=delgroup" onclick="return confirm('Удалить подраздел &quot;{$menu_list[menu].subpage[subpage].menutitle}&quot;')"></a>
				{else}
					<a href="{$SERVER_URL_NAME}admin/{$menu_list[menu].alias}/{if !preg_match('/^(_|__)$/',$menu_list[menu].subpage[subpage].alias)}{$menu_list[menu].subpage[subpage].alias}/{else}" class="base{/if}">{$menu_list[menu].subpage[subpage].menutitle}</a>
					{if !preg_match('/^(_|__)$/',$menu_list[menu].subpage[subpage].alias)}
					<a class="del" href="{$SERVER_URL_NAME}admin/{$menu_list[menu].alias}/{$SITE_SECTION_PAGE}/:action=delgroup" onclick="return confirm('Удалить подраздел &quot;{$menu_list[menu].subpage[subpage].menutitle}&quot;')"></a>
					{else}
					<div class="base-mode{$menu_list[menu].subpage[subpage].alias}"><!-- --></div>
					{/if}
				{/if}
				{/section}
				{if $menu_list[menu].menu_subpages == true}
				<div class="but_menu">
				<input class="button" type="button" value="Добавить подраздел" onclick="javascript:button.disable(this); javascript:self.location.href='{$SERVER_URL_NAME}admin/{$menu_list[menu].alias}/:action=addgroup'" style="margin: 2px 2px 0px 0px; width: 120px;" />
				</div>
				{/if}
			</div>
			{/if}		
		{/if}
	{/strip}
	{else}
	<a href="{$SERVER_URL_NAME}admin/{if !empty($menu_list[menu].alias)}{$menu_list[menu].alias}/{/if}" class="main"><div class="main">{$menu_list[menu].name}</div></a>
	{/if}
{/section}