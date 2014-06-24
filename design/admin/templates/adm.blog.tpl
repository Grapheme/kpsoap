{include file='unit.tiny.tpl' type='list'}

<div id="tabline"></div>
<div id="texts[0]" style="display: none">
	<div class="filter">
		<b>Рубрика:</b> 
		<select class="group">
			<option value="0"{if $page.content.filter.blog_group == 0} selected="selected"{/if}>Все</option>
			{foreach from=$page.content.group item=row key=groupindex}
			<option value="{$row.id}"{if $page.content.filter.blog_group == $row.id} selected="selected"{/if}>{$row.title}</option>
			{/foreach}
		</select>
	</div>
	<table class="panels">
		<tr>
			<td class="panel">
				<div class="title">Список блогов</div>
				{if !empty($page.content.empty_list)}
					<div class="no_data">{if !empty($page.content.empty_group)}Добавьте хотя бы одну группу тем{else}Блоги отсутствуют{/if}</div>
				{else}
					{foreach from=$page.content.list item=row key=blogindex}
					<div class="block-item min:610" style="width:49%;"> <!--  style="width:49%;" -->
						<div class="news">
							<div class="href">{$row.href}</div>
							<div class="texttitle main">{$row.title|strip_tags}</div>
							<div class="clear"><!-- --></div>
							<div class="group"><span>Рубрика:</span> 
							{foreach from=$page.content.group item=grow key=index}
								{if $grow.id == $row.group_id}
									{$grow.title}
								{/if}
							{/foreach}
							</div>
							<div class="alias"><span>Псевдоним: </span>{$row.alias}</div>
							<textarea class="text width:100% height:270px" id="text{$blogindex}">{$row.text}</textarea>
							<div class="clear"><!-- --></div>
							<div class="tags">
								<span>Tags:</span>
								{if count($row.tags)>0}
									{foreach from=$row.tags item=row_tags key=tags_index}
									<u>{$row_tags}</u>{if $tags_index < count($row.tags)-1},{/if}
									{/foreach}
								{else}
								отсутствуют
								{/if}
							</div>
							
							<div class="livejournal"><span>livejournal: </span>{if isset($row.livejournal)}<a href="{$row.livejournal}" target="_blank">{$row.livejournal}</a>{else}отсутствуют{/if}</div>
							
							<div class="datetime down">{$row.datetime|date_format:"%d.%m.%Y"}</div>
							<div class="buttons">
								<div class="html gethtml" title="Импорт HTML"></div>
								<a class="edit" href="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}:action=edit&id={$row.id}"></a>
								<a class="del" href="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}:action=del&id={$row.id}"></a>
							</div>
							<div class="clear"><!-- --></div>
						</div>
						<div class="news-down"><!-- --></div>
						<div class="clear"><!-- --></div>
					</div>
					{if ($blogindex+1)%2==0}
					<div class="clear"><!-- --></div>
					{/if}
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
	
<div id="texts[1]" style="display: none">
	<table class="panels">
		<tr>
			<td class="panel nospace noleftspace">
				<div class="title">
					<table>
						<tr>
							<th class="sort">Позиция</th>
							<th>Название</th>
						</tr>
					</table>
				</div>
				<div class="list">
				{if !empty($page.content.empty_group)}
					<div class="no_data">Группы отсутствуют</div>
				{else}
					<table>
					{foreach from=$page.content.group item=row key=index}
						<tr class="row{$index%2}" rowid={$row.id} alias="{$row.alias}">
							<td class="sort">{if $row.id<5}{else}{$row.priority}{/if}</td>
							<td{if $row.id<5} class="blocked"{/if}>{if $row.id<5}{$row.title} <small>(недоступен к редактирвоанию)</small>{else}{$row.title}{/if}</td>
							<td class="cmd"><label><input type="checkbox"{if $row.id<5} class="hidden"{/if} /></label></td>
						</tr>
					{/foreach}
					</table>
				{/if}
				</div>
			</td>
		</tr>
	</table>
	<input class="button list_btn_delete" cmd="delgroup" id="delgroup" type="button" value="Удалить" />
	<input class="button list_btn_edit 0" cmd="savegroup" id="editgroup" type="button" value="Редактировать" />
	<input class="button list_btn_insert 0" cmd="insertgroup" id="addgroup" type="button" value="Добавить" />
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
	marks.init(new Array(new Array('mark1','Списки блогов'),
						 new Array('mark2','Рубрики'),
						 new Array('mark3','Настройки')), "tabline", "texts", {if $page.mark != ''}{$page.mark}{else}0{/if}, "top.gif", "sel", "top_grey.gif", "no_sel");
</script>