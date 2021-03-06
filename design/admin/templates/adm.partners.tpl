<script type="text/javascript" src="{$SERVER_URL_NAME}{#tiny_mce#}"></script>
<script type="text/javascript">
			tinyMCE.init({
				mode : "exact",
				elements : "text",
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
				<div class="title">Заголовок описательной части и текстовое наполнение страницы</div>
				<div class="f_title">Заголовок</div>
				<div class="field">{$page.content.title}</div>
				<div class="f_title">Текст</div>
				<textarea id="text" style="width: 100%; height: 350px;">{$page.content.text}</textarea>
			</td>
		</tr>
	</table>
	<input class="button" id="add" type="button" value="Редактировать" onclick="javascript:button.disable(this); javascript:self.location.href='{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}:action=edit'" />
</div>

<div id="texts[1]" style="display: none">
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
						<div class="f_title">Заголовок страницы</div><input class="text" name="title" type="text" style="width: 100%" value="{$page.header.title}" />
						<div class="f_title">Keywords</div><div class="border"><textarea name="keywords" style="width: 100%; height: 80px;">{$page.header.keywords}</textarea></div>
						<div class="f_title">Description</div><div class="border"><textarea name="description" style="width: 100%; height: 100px;">{$page.header.description}</textarea></div>
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
	marks.init(new Array(new Array('mark1','Содержимое страницы',150),
						 new Array('mark2','Настройки',85)), "tabline", "texts", {if !empty($page.mark)}{$page.mark}{else}0{/if}, "top.gif", "sel", "top_grey.gif", "no_sel");
</script>