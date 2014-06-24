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

<div id="tabline"></div>
<div id="texts[0]" style="display: none">
	<table class="panels">
		<tr>
			<td class="panel">
				<div class="title">Список панелей</div>
				{if !empty($page.content.empty_list)}
					<div class="no_data">Панели отсутствуют</div>
				{else}
					{foreach from=$page.content.list item=row key=listindex}
					<div class="block-item min:610" style="width:282px">
						<div class="news">
							<div class="texttitle main">{$row.name}</div>
							<div><span>Псевдоним:</span> {$row.alias}</div>
							<div><span>Приоритет:</span> {$row.priority}</div>
							<div><span>Тип:</span> {if $row.align==0}Левая панель{else}Правая панель{/if}</div>
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
			</td>
		</tr>
	</table>

	<div class="panel-operation">
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
	</div>
</div>

<script language="javascript">
	marks.init(new Array(new Array('mark1','Списки панелей')), "tabline", "texts", {if $page.mark != ''}{$page.mark}{else}0{/if}, "top.gif", "sel", "top_grey.gif", "no_sel");
</script>