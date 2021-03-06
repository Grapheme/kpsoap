<script type="text/javascript" src="{$SERVER_URL_NAME}{#tiny_mce#}"></script>
<script type="text/javascript" src="{$SERVER_URL_NAME}{#calendar_ru#}"></script>
	
<script type="text/javascript">
			tinyMCE.init({
				mode : "exact",
				elements : "",
				theme : "advanced",
				language : "ru",
				skin : "o2k7",
				skin_variant : "silver",
				plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,images",
				theme_advanced_buttons1 : "newdocument,|,undo,redo,|,bold,italic,underline,strikethrough,|,bullist,numlist,|,formatselect,styleselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,fullscreen",
				theme_advanced_buttons2 : "link,unlink,anchor,image,images,|,tablecontrols,|,sub,sup,|,charmap,emotions,iespell,media,|,cleanup,removeformat,code",
				theme_advanced_buttons3 : "",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : false,
				convert_urls : false,
				content_css : "{$SERVER_URL_NAME}client/styles/main.css"
			});
</script> 

<div id="tabline"></div>
	
<form id="photouploader" action="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/:axah=out&action=setphoto" method="post" enctype="multipart/form-data">
	<input type="file" name="photo" />						
</form>
<form action="{$SERVER_URL_NAME}admin/{$SITE_SECTION_NAME}/" method="post">
<input type="hidden" name="action" value="save" />
<input type="hidden" name="id" value="{$page.content.id}" />

<div id="texts[0]" style="display: none">
	<table class="panels">
		<tr>
			<td class="panel">
				<div class="title">Заголовок описательной части и текстовое наполнение страницы</div>
				<div class="form">

					<div class="line">
						<div class="f_title">Приоритет <span>(вывода)</span></div>
						<input class="text width:50px" name="priority" type="text" value="{$page.content.data.priority}" />
						
						<div class="f_title">URL для перехода <span>(не обязательно)</span></div>
						<input class="text width:550px" name="url" type="text" value="{$page.content.data.url}" />
					</div>
					
					<div class="line">
						
						<div class="f_title">Баннер <span>(550px &times; 386px | rate: авто выравнивание | max: 1)</span></div>
						<div class="photouploader-panel" count="1" size="200">
							<div class="response">Загрузка</div>
							<div class="photos">
								<div class="content">
									{if isset($page.content.data.photo) && is_array($page.content.data.photo) && count($page.content.data.photo)>0}
										{foreach from=$page.content.data.photo item=row key=index}
										<div class="item">
											<img src="{$row.url}" width="40" height="40" alt="{$row.src}" /><span class="del"><!-- --></span><span class="left"><!-- --></span><span class="right"><!-- --></span>
										</div>
										{/foreach}
									{/if}
								</div>
								<div class="clear"><!-- --></div>
							</div>
							<input type="button" class="button" value="Добавить" />
							<input name="photo" type="hidden" value="" />
						</div>
						
						<div class="f_title">HTML <span>интерактивный контент</span></div>
						<div style="padding-right: 56px; ">
							<textarea name="html" 
									  class="height:650px max-height:650px min-height:650px width:100% max-width:100% min-width:100%" style="border: 1px solid #ccc;">{$page.content.data.html}</textarea>
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