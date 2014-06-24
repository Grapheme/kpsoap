<script type="text/javascript" src="{$SERVER_URL_NAME}{#edit_area_ful#}"></script>
						
<script type="text/javascript">
	editAreaLoader.init({
		id: "php",
		start_highlight: true,
		allow_resize: "yes",
		allow_toggle: false,
		language: "ru",
		syntax: "php",
		toolbar: "search, go_to_line, fullscreen, |, undo, redo, |, select_font, |, change_smooth_selection, highlight, reset_highlight, |, help",
		load_callback: "my_load",
		save_callback: "my_save",
		replace_tab_by_spaces: 4,
		syntax_selection_allow: "php"
	});
	editAreaLoader.init({
		id: "tpl",
		start_highlight: true,
		allow_resize: "yes",
		allow_toggle: false,
		language: "ru",
		syntax: "html",
		toolbar: "search, go_to_line, fullscreen, |, undo, redo, |, select_font, |, change_smooth_selection, highlight, reset_highlight, |, help",
		load_callback: "my_load",
		save_callback: "my_save",
		replace_tab_by_spaces: 4,
		syntax_selection_allow: "html"
	});
</script> 

<div id="tabline"></div>
	
<form action="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/" method="post">
<input type="hidden" name="action" value="save" />
<input type="hidden" name="id" value="{$page.content.id}" />

<div id="texts[0]" style="display: none">
	<table class="panels">
		<tr>
			<td class="panel">
				<div class="title">Настройки панели</div>
				<div class="form">
					<div class="line">
						<div class="f_title">Псевдоним</div>
						<input name="lastalias" type="hidden" value="{$page.content.data.alias}" />
						<input class="text width:350px" name="alias" type="text" value="{$page.content.data.alias}" />
						
						<div class="f_title">Название</div>
						<input class="text width:350px" name="name" type="text" value="{$page.content.data.name}" />
						
						<div style="position: relative; float: right; right: 60px; top: -80px; height: 80px; margin-bottom: -80px">
							<div class="f_title">Тип</div>
							<select name="align" style="width:120px;">
								<option value="0"{if $page.content.data.align==0}selected="selected"{/if}>Левая панель</option>
								<option value="1"{if $page.content.data.align==1}selected="selected"{/if}>Правая панель</option>
							</select>
							
							<div class="f_title">Приоритет <span>(вывода)</span></div>
							<input class="text width:116px" name="priority" type="text" value="{$page.content.data.priority}" />
						</div>
					</div>
					
					<div class="line">
						<div style="padding-right: 60px;">
							<div style="float: left; width: 50%;">
								<div class="f_title">PHP Модуль</div>
								<textarea id="php" name="php" 
										  class="height:650px width:100%">{$page.content.data.php}</textarea>
							</div>
							<div style="width: 50%; margin: 0 0 0 50%">
								<div class="f_title">HTML Шаблон (Smarty)</div>
								<textarea id="tpl" name="tpl" 
										  class="height:650px width:100%">{$page.content.data.tpl}</textarea>
							</div>
							<div class="clear"><!-- --></div>
						</div>
					</div>
					
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
	marks.init(new Array(new Array('mark1','Баннер')), "tabline", "texts", {if $page.mark != ''}{$page.mark}{else}0{/if}, "top.gif", "sel", "top_grey.gif", "no_sel");
</script>