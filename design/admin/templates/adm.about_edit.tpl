{include file='unit.tiny.tpl' type='edit'}<form action="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}" method="post" method="post" {strip}	{if $page.content.alias != '_'}		  onSubmit="return validation.test([{ name:'menutitle',title:'Название страницы (в меню)' },											{ name:'alias',title:'Псевдоним' },											{ name:'title',title:'Заголовок' }],'submit')"	{/if}	{/strip}>	<input type="hidden" name="action" value="save" />	<input id="lastalias" name="lastalias" type="hidden" value="{$page.content.alias}" />	<table class="panels">		<tr>			<td class="panel">				<div class="title">Заголовок описательной части и текстовое наполнение страницы</div>				<div class="form">					{if $page.content.alias != '_'}					<div class="line">						<div class="f_title">Название страницы (в меню)</div><input class="text" name="menutitle" type="text" maxlength="30" style="width: 200px" value="{$page.content.menutitle}" />					</div>					<div class="line">						<div class="f_title">Псевдоним</div><input class="text" name="alias" type="text" maxlength="100" style="width: 400px" value="{$page.content.alias}" />						<div class="f_title">Приоритет</div><input class="text" name="priority" type="text" style="width: 50px" value="{$page.content.priority}" />					</div>					{/if}										<div class="line">						<div class="f_title">Заголовок</div><input class="text width:80%" name="title" type="text" value="{$page.content.title}" />						<div class="f_title">Контент (доступен полноэкранный режим редактирования)</div>						<textarea name="text" 								  class="height:350px max-height:350px min-height:350px width:95% max-width:95% min-width:95%">{$page.content.text}</textarea>					</div>				</div>			</td>		</tr>	</table>	<div class="panel-operation">		<input class="button" type="button" value="Отмена" onclick="javascript:button.disable(this); javascript:self.location.href='{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/{if !empty($SITE_SECTION_PAGE)}{$SITE_SECTION_PAGE}/{/if}'" />		<input class="button" id="submit" type="submit" value="Сохранить" />	</div></form>