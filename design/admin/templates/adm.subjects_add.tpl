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
		 
				theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,images,cleanup,code,|,insertdate,preview,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : false,
{/literal}		 
				content_css : "{$SERVER_URL_NAME}client/styles/styles.css"
{literal}
			});
{/literal}		
  </script> 

<form action="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/" 
			method="post" 
			onsubmit="javascript:button.disable(getElementById('submit'))" 
			enctype="multipart/form-data">
<input type="hidden" name="action" value="insert" />
<table class="panels">
	<tr>
  	<td class="panel">
    	<div class="title">Новый субъект - общие данные</div>
      
      <div class="form">
        <div class="line">
        <div class="f_title">Логин</div><input class="text" name="login" type="text" maxlength="20" style="width: 150px" /><br />
        <div class="f_title">Пароль</div><input class="text" name="password" type="password" maxlength="20" style="width: 150px" /><br />
        <div class="f_title">Подтверждение</div><input class="text" name="passwordconf" type="password" maxlength="20" style="width: 150px" /></div>
        
        <div class="line">
        <div class="f_title">Алиас</div><input class="text" name="alias" type="text" maxlength="100" style="width: 400px" /><br />
        <div class="f_title">Приоритет</div><input class="text" name="priority" type="text" style="width: 50px" value="{$page.priority}" /></div>
        
        <div class="line">
        <div class="f_title">Фамилия</div><input class="text" name="name0" type="text" maxlength="30" style="width: 200px" /><br />
        <div class="f_title">Имя</div><input class="text" name="name1" type="text" maxlength="30" style="width: 200px" /><br />
        <div class="f_title">Отчество</div><input class="text" name="name2" type="text" maxlength="30" style="width: 200px" /></div>
        
        <div class="line">
        <div class="f_title">Описание</div><div class="border"><textarea name="description" style="width: 100%; height: 250px;"></textarea></div></div>

        <div class="line">
					<div id="is_teacher">
						<label><input name="is_teacher" type="checkbox" value="1" onclick="{literal}if (this.checked) {
																																													document.getElementById('personal_page').style.display='none';
																																													document.getElementById('photoname').style.display='block';
																																												}	else {
																																													document.getElementById('personal_page').style.display='block';
																																													document.getElementById('photoname').style.display='none';
																																												}	{/literal}" />Преподаватель</label><br />
					</div>
					<div id="personal_page" />
						<label><input name="personal_page" type="checkbox" value="1" onclick="{literal} if (this.checked) {
																																															document.getElementById('is_teacher').style.display='none';
																																															document.getElementById('photoname').style.display='block';
																																														}	else {
																																															document.getElementById('is_teacher').style.display='block';
																																															document.getElementById('photoname').style.display='none';
																																														}	{/literal}" />Персональная страница</label><br />
					</div>
					<div id="photoname" style="display: none">
						<div class="f_title">Фотография:</div>
						<input name="photoname" type="file" />
					</div>
				</div>
      </div>
      
    </td>
  	<td class="panel right">
    	<div class="title">Группы и Роли</div>
		
      <div class="form">
      	<div class="line">Принадлежность к группам<br />
        	<select name="group_list[]" multiple="multiple" style="width: 100%; height: 300px; background-color: #EEF5FC;">
          	<option value="null" style=" color: #C0C0C0" selected="selected">Нет группы</option>
{section name=group_list loop=$page.group_list}                
						<option value="{$page.group_list[group_list].id}">{$page.group_list[group_list].name[0]}</option>
{/section}
          </select>
        </div>
      	<div class="line">Дополнительные роли<br />
        	<select name="role_list[]" multiple="multiple" style="width: 100%; height: 300px; background-color: #EEF5FC">
          	<option value="null" style=" color: #C0C0C0" selected="selected">Нет ролей (только Гость)</option>
{section name=role_list loop=$page.role_list}                
						<option value="{$page.role_list[role_list].id}">{$page.role_list[role_list].name[0]}</option>
{/section}
          </select>
        </div>
      </div>


    </td>
  </tr>
</table>
  <input class="button" type="button" value="Отмена" onclick="javascript:button.disable(this); javascript:self.location.href='{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/'" />
  <input class="button" id="submit" type="submit" value="Добавить" />
</form>