<script type="text/javascript" src="{$SERVER_URL_NAME}{#tiny_mce#}"></script>
<script type="text/javascript">
		var prewId = '';
		var max=50;
		for (var i=0; i<max; i++)
			prewId+='text'+i+(i<max-1?',':'');
		tinyMCE.init({
		mode : "exact",
		elements : prewId,
		theme : "advanced",
		theme_advanced_resizing : false,
		readonly : true,
		content_css : "{$SERVER_URL_NAME}client/styles/main.css"
		});	
</script> 

<div id="tabline" rev="tabline;texts;{$page.mark};top.gif;sel;top_grey.gif;no_sel"></div>
<div mode="mark" rev="Баннера">
	<panel title="Список баннеров">
		{if !empty($page.content.empty_list)}
			<empty>Баннера отсутствуют</empty>
		{else}
			{foreach from=$page.content.list item=row key=listindex}
			<div class="block-item min:610" style="width:282px">
				<div class="news">
					<div style="background: #f8fafd; width: 270px; height: 270px; margin-bottom: 13px; padding: 0; line-height: 270px; text-align: center">
						{if count($row.photo)==4}
						{strip}
						{foreach from=$row.photo item=photo key=photoindex}
						<div style="width:135px; height:135px; float:left; padding: 0; background: url({$photo.src}) no-repeat center"><!-- --></div>
						{/foreach}
						<div class="clear"><!-- --></div>
						{/strip}
						{else if count($row.photo)==1}
						<div style="width:270px; height:270px; float:left; padding: 0; background: url({$row.photo[0].src}) no-repeat center"><!-- --></div>
						{else}
						Нет фото
						{/if}
					</div>
					<div class="clear"><!-- --></div>
					<div class="buttons">
						<a class="edit" href="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}:action=edit&id={$row.id}"></a>
						<a class="del" href="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}:action=del&id={$row.id}"></a>
					</div>
					<div class="clear"><!-- --></div>
				</div>
				<div class="news-down"><!-- --></div>
				<div class="clear"><!-- --></div>
			</div>
			{/foreach}
			<div class="clear"><!-- --></div>
		{/if}
	</panel>
	<operation>
		{if !empty($page.content.pg_max)}
			{if $page.content.pg_max>1}
				<div class="pages">
				{foreach from=$page.content.pg_url item=url key=num}
					{if $num!=$page.content.pg}
					<a href="{$url}">{$num+1}</a>
					{else}
					<span>{$num+1}</span>
					{/if}
				{/foreach}
				</div>
			{/if}
		{/if}
		<input class="button{if !empty($page.content.empty_group)} disabled{/if}" id="add" type="button" value="Добавить" {if !empty($page.content.empty_group)}disabled="disabled" {/if}onclick="javascript:button.disable(this); javascript:self.location.href='{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}:action=add'" />
		<div class="clear"><!----></div>
	</operation>
</div>