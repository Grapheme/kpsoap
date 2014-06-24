<script type="text/javascript" src="{$SERVER_URL_NAME}{#tiny_mce#}"></script>
  <script type="text/javascript">
{literal}
			tinyMCE.init({
				mode : "textareas",
				theme : "advanced",
				language : "ru",
				skin : "o2k7",
				skin_variant : "default",
				plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,images",
		 
				theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough",
				theme_advanced_buttons2 : "",
				theme_advanced_buttons3 : "",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_resizing : false,
{/literal}		 
				content_css : "{$SERVER_URL_NAME}client/styles/styles.css"
{literal}
			});
{/literal}		
  </script> 

<form action="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/" method="post" onsubmit="javascript:button.disable(getElementById('submit'))" enctype="multipart/form-data">
<input type="hidden" name="action" value="savegroup" />
<input type="hidden" name="id" value="{$page.edit_id}" />
<table class="panels">
	<tr>
  	<td class="panel">
    	<div class="title">Редактирование группы</div>
      
      <div class="form">
        <div class="line">
        <div class="f_title">Название</div><input class="text" name="name" type="text" maxlength="20" style="width: 150px" onkeyup="aliasConvert.setCnvVal(this, 'alias', 'aliasfield', '')" value="{$page.group[0].name}" /></div>
        
        <div class="line">
        <input id="alias" name="alias" type="hidden" value="{$page.group[0].alias}" />
        <div class="f_title">Алиас</div><input class="text" id="aliasfield" type="text" maxlength="100" style="width: 400px" value="{$page.group[0].alias}" readonly="readonly" /><br />
        <div class="f_title">Приоритет</div><input class="text" name="priority" type="text" style="width: 50px" value="{$page.group[0].priority}" /></div>
                
        <div class="line">
        <div class="f_title">Описание</div><div class="border"><textarea name="description" style="width: 100%; height: 250px;">{$page.group[0].description}</textarea></div></div>

			</div>
      
    </td>
  	<td class="panel right">
    	<div class="title">Назначение роли</div>
		
      <div class="form">
      	<div class="line">
        	<select name="role_list[]" multiple="multiple" style="width: 100%; height: 400px; background-color: #EEF5FC">
          	<option value="null" style=" color: #C0C0C0"{if $page.group_role.num_rows==0} selected="selected"{/if}>Нет ролей (только Гость)</option>
				{section name=role_list loop=$page.role_list}   
					{strip}<option value="{$page.role_list[role_list].id}"
																																{section name=role_sel loop=$page.group_role.cell}
																																	{if $page.group_role.cell[role_sel].id == $page.role_list[role_list].id} selected="selected"{/if}
																																{/section}
																																>{$page.role_list[role_list].name}</option>{/strip}
				{/section}
          </select>
        </div>
      </div>

    </td>
  </tr>
</table>
  <input class="button" type="button" value="Отмена" onclick="javascript:button.disable(this); javascript:self.location.href='{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/'" />
  <input class="button" id="submit" type="submit" value="Сохранить" />
</form>