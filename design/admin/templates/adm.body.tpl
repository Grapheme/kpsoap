{config_load file='global.conf' section="setup"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<title>Панель управления | учётная запись: {$subject.info.login} ({$subject.info.name[0]} {$subject.info.name[1]})</title>
	
	<script src="{$SERVER_URL_NAME}{#jquery_min#}" 			language="JavaScript" type="text/javascript"></script>
	<script src="{$SERVER_URL_NAME}{#jquery_ui_min#}" 		language="JavaScript" type="text/javascript"></script>
	<script src="{$SERVER_URL_NAME}{#jquery_zclip_min#}" 	language="JavaScript" type="text/javascript"></script>
	<script src="{$SERVER_URL_NAME}{#jquery_cookie#}" 		language="JavaScript" type="text/javascript"></script>
	<script src="{$SERVER_URL_NAME}{#datetime_picker#}" 	language="JavaScript" type="text/javascript"></script>
	<script src="{$SERVER_URL_NAME}{#main#}" 				language="JavaScript" type="text/javascript"></script>
	<script src="{$SERVER_URL_NAME}{#fullajax#}" 			language="JavaScript" type="text/javascript"></script>
	<link href="{$SERVER_URL_NAME}{#ui_theme#}"			rel="stylesheet" type="text/css" />
	<link href="{$SERVER_URL_NAME}{#styles#}" 		rel="stylesheet" type="text/css" />
	<link href="{$SERVER_URL_NAME}{#tabs#}" 		rel="stylesheet" type="text/css" />
	<link href="{$SERVER_URL_NAME}{#tablesorte#}"	rel="stylesheet" type="text/css" />
	<link rel="SHORTCUT ICON" href="/favicon.ico" type="image/x-icon" />
</head>

<body>
	<table id="root">
		<tr>
			<td id="up">
				<div id="pagetitle">
					<div id="logotextadmin">Панель управления | учётная запись: {$subject.info.login} ({$subject.info.name[0]} {$subject.info.name[1]})</div>
					<form id="logoff" method="post" action="http://{$smarty.server.SERVER_NAME}">
						<input name="logoff" type="hidden" value="true" />
						<div class="autorr_01">
							{literal}<div id="close" onClick="document.getElementById('logoff').submit();"{/literal} title="Завершить сеанс {$subject.info.login}"></div>
						</div>
					</form>
				</div>
				<img src="http://{$smarty.server.SERVER_NAME}/design/admin/templates/images/empty.gif" width="900px" height="1px" style="margin: -1px 0px 0px 0px; height: 1px; position: relative; display: block;" />
			</td>
		</tr>
		<tr>
			<td id="center">
				<table id="page">
					<tr>
						<td id="left" style="width: {$page.cookie.separate}px">
							<div id="title">Разделы сайта</div>
							<div id="mainmenu">
								{include file="adm.menu.tpl"}
							</div>
						</td>
						<td id="sep"></td>
						<td id="right">
							<div id="title">{include file="adm.location.tpl"}<span id="grouptitle"></span></div>
							<div id="content">
								{include file=$page.page_tpl}
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>