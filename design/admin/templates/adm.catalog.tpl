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
	<div class="filter {$page.content.filter_focus}">
		{if $page.content.filter.prarticle == '' && $page.content.filter.prtitle == '' && $page.content.filter.prsubtype == -1 && $page.content.filter.prshow == 0}
			{assign var="filter_status" value="0"}
		{else}
			{assign var="filter_status" value="1"}
		{/if}
		<b>Раздел:</b> 
		<select class="group">
			{foreach from=$page.content.group item=row key=groupindex}
			<option value="{$row.id}"{if $page.content.filter.group == $row.id} selected="selected"{/if}>{$row.name}</option>
			{/foreach}
		</select>
		<span class="properties-button{if $filter_status==1} enabled{/if}">Фильтр: {if $filter_status==0}выключен{else}включен{/if}</span>
		<div class="clear"><!-- --></div>
		<div class="properties-panel{if $filter_status==1} enabled{/if}">
			<table>
				<tr>
					<td>по Названию:</td>
					<td><input class="prtitle" style="width:100px" value="{$page.content.filter.prtitle}"></td>
				</tr>
				<tr>
					<td>по Артиклу:</td>
					<td><input class="prarticle" style="width:180px" value="{$page.content.filter.prarticle}"></td>
				</tr>
				<!--<tr>
					<td>по Коллекцим:</td>
					<td>
						<select class="prsubtype">
							<option value="-1"{if $page.content.filter.prsubtype == -1} selected="selected"{/if}>Все</option>
							<option value="0"{if $page.content.filter.prsubtype == 0} selected="selected"{/if}>Без коллекции</option>
							{foreach from=$page.content.subtype item=cn_row key=cn_index}
								<option value="{$cn_row.id}"{if $page.content.filter.prsubtype == $cn_row.id} selected="selected"{/if}>{$cn_row.title}</option>
							{/foreach}
						</select>
					</td>
				</tr>-->
				<tr class="global">
					<td>показывать</td>
					<td>
						<select class="prshow">
							<option value="0"{if $page.content.filter.prshow == 0} selected="selected"{/if}>Все</option>
							<option value="1"{if $page.content.filter.prshow == 1} selected="selected"{/if}>Только в наличии</option>
							<option value="2"{if $page.content.filter.prshow == 2} selected="selected"{/if}>Только отсутствующие</option>
						</select>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<table class="panels">
		<tr>
			<td class="panel">
				<div class="title">Список</div>
				{if !empty($page.content.empty_list)}
					<div class="no_data">{if !empty($page.content.empty_group)}Добавьте хотя бы одну группу{else}Продукция отсутствует{/if}</div>
				{else}
					{foreach from=$page.content.list item=row key=blogindex}
					<div class="block-item">
						
						<div class="catalog">
							<div class="title">
							{if $page.content.filter.prtitle!=''}
								{$row.title|regex_replace:"/\((.*)\)/i":"<small><br />\\1</small>"|regex_replace:"/(`$page.content.filter.prtitle`)/i":"<span class='search'>\\1</span>"}
							{else}
								{$row.title|regex_replace:"/\((.*)\)/i":"<small><br />\\1</small>"}
							{/if}
							</div>
							{assign var="koef" value="`$row.psize[1]/70`"}
							<div class="photo">
								<img src="{$row.photo}" height="70" width="{$row.psize[0]/$koef|string_format:"%d"}" alt="{$row.title}" />
							</div>
							<div class="info">
								<div class="clear"><!-- --></div>
								<div class="article"><span>Артикул:</span>
								{if $page.content.filter.prarticle!=''}
									{$row.article|regex_replace:"/`$page.content.filter.prarticle`/i":"<span class='search'>`$page.content.filter.prarticle`</span>"} <small>({$row.article|regex_replace:"/`$page.content.filter.prarticle`/i":"<span class='search'>`$page.content.filter.prarticle`</span>"})</small>
								{else}
									{$row.article} <small>({$row.article})</small>
								{/if}
								</div>
								<div class="subtype"><span>Подраздел:</span> {if $row.subtype==0}<span class="no">Без подраздела</span>{else}{$row.subtype_name}{/if}</div>
								<table>
									<tr>
										<td><div class="count"><span>В наличии:</span></td>
										<td><input class="edit_count id{$row.id}" value="{$row.count}" maxlength="4" /> шт.</div></td>
									</tr>
									<tr>
										<td><div class="price"><span>Цена:</span></td>
										<td><input class="edit_price id{$row.id}" value="{$row.price}" maxlength="10" /> р.</div></td>
									</tr>
									<tr>
										<td><div class="price"><span>Цена по скидке:</span></td>
										<td><input class="edit_price_sell id{$row.id}" value="{$row.price_sell}" maxlength="10" /> р.</div></td>
									</tr>
								</table>
							</div>
							<div class="clear"><!-- --></div>
							<div class="priority">
								<div class="count"><span>Приоритет:</span>
								<input class="edit_priority id{$row.id}" value="{$row.priority}" maxlength="5" /></div>
							</div>
							<div class="buttons">
								<a class="edit" href="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}:action=edit&id={$row.id}"></a>
								<a class="del" href="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}:action=del&id={$row.id}"></a>
							</div>
							<div class="clear"><!-- --></div>
						</div>
						<div class="news-down"><!-- --></div>
					</div>
					{/foreach}
					<div class="clear"><!-- --></div>
				{/if}
			</td>
		</tr>
	</table>
	{if !empty($page.content.pg_max)}
		{if $page.content.pg_max>1}
			<div class="pages">
			{if $page.content.pg_max <= 18}
				{section name="pages" loop=$page.content.pg_max}
					{if $smarty.section.pages.index == $page.content.pg}
				<span>{$smarty.section.pages.index+1}</span>
					{else}
				<a href="/admin/{$SITE_SECTION_NAME}/{if $smarty.section.pages.index>=0}:pg={$smarty.section.pages.index}{/if}">{$smarty.section.pages.index+1}</a>
					{/if}
				{/section}
			{else}
				{if $page.content.pg > 0}
				<a href="/admin/{$SITE_SECTION_NAME}/">&laquo;</a>
				{/if}
				{if $page.content.pg > 8}
				...
				{/if}
				
				{if $page.content.pg < 8}
					{assign var="lstart" value="0"}
				{elseif $page.content.pg-8+17 > $page.content.pg_max}
					{assign var="lstart" value="`$page.content.pg_max-17`"}
				{else}
					{assign var="lstart" value="`$page.content.pg-8`"}
				{/if}
				
				{section name="pages" start="`$lstart`" loop="`$lstart+17`"}
					{if $smarty.section.pages.index == $page.content.pg}
				<span>{$smarty.section.pages.index+1}</span>
					{else}
				<a href="/admin/{$SITE_SECTION_NAME}/{if $smarty.section.pages.index>0}:pg={$smarty.section.pages.index}{/if}">{$smarty.section.pages.index+1}</a>
					{/if}
				{/section}
				
				{if $lstart+17 < $page.content.pg_max}
				...
				{/if}
				{if $page.content.pg < $page.content.pg_max-1}
				<a href="/admin/{$SITE_SECTION_NAME}/:pg={$page.content.pg_max-1}">&raquo;</a>
				{/if}
			{/if}
			</div>
		{/if}
	{/if}
	<div class="panel-operation">
		<input class="button{if !empty($page.content.empty_group)} disabled{/if}" id="add" type="button" value="Добавить" {if !empty($page.content.empty_group)}disabled="disabled" {/if}onclick="javascript:button.disable(this); javascript:self.location.href='{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}:action=add'" />
		<div class="clear"><!----></div>
	</div>
</div>
<div id="texts[1]" style="display: none">
	<table class="panels">
		<tr>
			<td class="panel nospace noleftspace">
				<div class="title">
					<table>
						<tr>
							<th class="sort">Позиция</th>
							<th class="title">Название</th>
							<th>Описание раздела (html)</th>
						</tr>
					</table>
				</div>
				<div class="list">
				{if !empty($page.content.empty_subtype)}
					<div class="no_data">Группы отсутствуют</div>
				{else}
					<table>
					{foreach from=$page.content.subtype item=row key=index}
						<tr class="row{$index%2}" rowid={$row.id} alias="{$row.alias}">
							<td class="sort">{$row.priority}</td>
							<td class="title">{$row.title}</td>
							<td name="description"><xmp>{$row.description|regex_replace:array("/\[\/(T|K|D)\]/i", "/<\/(h[0-9]|span|div|p)>/i"):array("[/$1]\n", "</$1>\n")}</xmp></td>
							<td class="cmd"><label><input type="checkbox" /></label></td>
						</tr>
					{/foreach}
					</table>
				{/if}
				</div>
			</td>
		</tr>
	</table>
	<input class="button list_btn_delete" cmd="delsubtype" id="delgroup" type="button" value="Удалить" />
	<input class="button list_btn_edit 1" cmd="savsubtype" id="editgroup" type="button" value="Редактировать" />
	<input class="button list_btn_insert 1" cmd="inssubtype" id="addgroup" type="button" value="Добавить" />
</div>
<div id="texts[2]" style="display: none">
	<form action="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}" method="post" onsubmit="javascript:button.disable(getElementById('submit'))">
		<input type="hidden" name="action" value="saveattach" />
		<table class="panels">
			<tr>
				<td class="panel">
					<div class="title">Подключение боковых панелей</div>
					<table>
						<tr>
							<td>
					{section name=pleft loop=$page.panels_list.left}
						{assign var="ischeck" value=false}
						{section name=tstchech loop=$page.panels.left}
							{if $page.panels.left[tstchech] == $page.panels_list.left[pleft].id}
								{assign var="ischeck" value=true}
						{/if}
						{/section}	
								<label><input name="panel[]" type="checkbox" value="{$page.panels_list.left[pleft].id}" {if $ischeck == true}checked="checked"{/if} />{$page.panels_list.left[pleft].name}</label><br />
					{/section}
							</td>
							<td>
					{section name=pright loop=$page.panels_list.right}
						{assign var="ischeck" value=false}
						{section name=tstchech loop=$page.panels.right}
							{if $page.panels.right[tstchech] == $page.panels_list.right[pright].id}
								{assign var="ischeck" value=true}
						{/if}
						{/section}
								<label><input name="panel[]" type="checkbox" value="{$page.panels_list.right[pright].id}" {if $ischeck == true}checked="checked"{/if} />{$page.panels_list.right[pright].name}</label><br />
					{/section}
							</td>
						</tr>
					</table>
				</td>
				<td class="panel meta">
					<div class="title">Заголовки, meta, шаблон</div>
					<div class="form">
						<div class="f_title">Заголовок страницы</div><input class="text" name="title" type="text" value="{if !empty($page.header.title)}{$page.header.title}{/if}" />
						<div class="f_title">Keywords</div><div class="border"><textarea name="keywords" style="height: 80px;">{if !empty($page.header.keywords)}{$page.header.keywords}{/if}</textarea></div>
						<div class="f_title">Description</div><div class="border"><textarea name="description" style="height: 100px;">{if !empty($page.header.description)}{$page.header.description}{/if}</textarea></div>
						<div class="f_title">Шаблон</div>
						<select name="tpl">
							<option value="null" style=" color: #C0C0C0" selected="selected">По умолчанию</option>
							<!--<option value="module.index.tpl">module.index.tpl</option>
							<option value="module.text_page.tpl">module.text_page.tpl</option>-->
						</select>
					</div>
				</td>
			</tr>
		</table>
		<input class="button" id="submit" type="submit" value="Обновить" />
	</form>
</div>

<script language="javascript">
	marks.init(new Array(new Array('mark1','Продукция'),
						 new Array('mark2','Подразделы'),
						 new Array('mark3','Настройки')), "tabline", "texts", {if $page.mark != ''}{$page.mark}{else}0{/if}, "top.gif", "sel", "top_grey.gif", "no_sel");
</script>