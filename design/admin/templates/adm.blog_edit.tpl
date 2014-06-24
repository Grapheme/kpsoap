{include file='unit.tiny.tpl' type='edit'}

<div id="tabline"></div>
	
<form action="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/" method="post" {strip}onSubmit="return validation.test([{ name:'alias',title:'Псевдоним' },
																													{ name:'date',title:'Дата' },
																													{ name:'texttitle',title:'Заголовок' },
																													{ name:'menutitle',title:'Заголовок в списке' }],'submit')"{/strip}">
<input type="hidden" name="action" value="save" />
<input type="hidden" name="id" value="{$page.content.id}" />

<div id="texts[0]" style="display: none">
	<table class="panels">
		<tr>
			<td class="panel">
				<div class="title">Редактирование новости</div>
				<div class="form">
					<div class="line">
						<div class="f_title">Псевдоним</div>
						<input class="text maxlength:300 width:80%"
							   name="alias" type="text"
							   value="{$page.content.alias}"/>
						
						<div class="f_title">Дата</div>
						<input class="text maxlength:20 width:150px"
							   name="date" type="text"
							   value="{$page.content.datetime}" />
						
						<div class="f_title">Заголовок</div>
						<input class="text maxlength:300 width:80%"
							   name="texttitle" type="text"
							   value="{$page.content.title}" />
						
						<div class="f_title">Рубрика</div>
						<select name="group">
						{foreach from=$page.content.group item=row key=index}
							<option value="{$row.id}"{if $row.id == $page.content.group_id} selected="selected"{/if}>{$row.title}</option>
						{/foreach}
						</select>
						
						<div class="f_title">Подзаголовок</div>
						<input class="text maxlength:300 width:50%" 
							   name="menutitle" type="text"
							   value="{$page.content.menutitle}" />
						
						<div class="f_title">Контент (доступен полноэкранный режим редактирования)</div>
						<textarea name="text" 
								  class="height:350px max-height:350px min-height:350px width:95% max-width:95% min-width:95%">{$page.content.text}</textarea>
						
						<div class="f_title">Теги <span>(Вводить через запятую)</span></div>
						<div class="tags_list">
						{assign var="tag_index" value="0"}
						{foreach from=$page.content.tags_list item=tag}
							<span><u>{$tag.name}</u> ({$tag.count})</span>{if $tag_index++ < count($page.content.tags_list)-1},{/if}
						{/foreach}
						</div>
						{strip}<textarea name="tags" 
								  class="border height:45px max-height:45px min-height:45px width:95% max-width:95% min-width:95%">
						{if count($page.content.tags)>0 && !empty($page.content.tags[0])}
							{foreach from=$page.content.tags item=row_tags key=tags_index}
							{$row_tags}{if $tags_index < count($page.content.tags)-1}, {/if}
							{/foreach}
						{/if}	
						</textarea>{/strip}
						
						<div class="f_title">Ссылка на livejournal</div>
						<input class="text maxlength:200 width:80%" 
							   name="livejournal" type="text"
							   value="{$page.content.livejournal}" />
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>

<div id="texts[1]" style="display: none">
<table class="panels">
	<tr>
		<td class="panel">
			<div class="title">Подключение боковых панелей</div>
			<table>
				<tr>
					<td>
	{section name=pleft loop=$page.panels_list.left}
		{assign var="ischeck" value=false}
		{section name=tstchech loop=$page.panels}
			{if $page.panels[tstchech].id == $page.panels_list.left[pleft].id}
				{assign var="ischeck" value=true}
			{/if}
		{/section}
						<label><input name="panel[]" type="checkbox" value="{$page.panels_list.left[pleft].id}" {if $ischeck == true}checked="checked"{/if} />{$page.panels_list.left[pleft].name}</label><br />
	{/section}
					</td>
					<td>
	{section name=pright loop=$page.panels_list.right}
		{assign var="ischeck" value=false}
		{section name=tstchech loop=$page.panels}
			{if $page.panels.right[tstchech].id == $page.panels_list.right[pright].id}
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
				<div class="f_title">Заголовок страницы (title)</div><input class="text" name="title" type="text" value="{$page.meta.title}" />
				<div class="f_title">Ключевын слова (meta Keywords)</div><div class="border"><textarea name="keywords" style="height: 80px;">{$page.meta.keywords}</textarea></div>
				<div class="f_title">Описание (meta Description)</div><div class="border"><textarea name="description" style="height: 100px;">{$page.meta.description}</textarea></div>
				<input type="hidden" name="tpl" value="null" />
			</div>
		</td>
	</tr>
</table>
</div>
<div class="panel-operation">
	<input class="button" type="button" value="Отмена" onclick="javascript:button.disable(this); javascript:self.location.href='{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/'" />
	<input class="button" id="submit" type="submit" value="Применить" />
</div>
</form>

<script language="javascript">
	marks.init(new Array(new Array('mark1','Содержимое страницы'),
						 new Array('mark2','Настройки и метаданные')), "tabline", "texts", {if $page.mark != ''}{$page.mark}{else}0{/if}, "top.gif", "sel", "top_grey.gif", "no_sel");
</script>