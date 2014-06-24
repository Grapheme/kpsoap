{if preg_match('/(preview|edit|list)/i',$type)}
	{assign var=blocks value=";"|explode:$type}
	<script type="text/javascript" src="{$SERVER_URL_NAME}{#tiny_mce#}"></script>
	<script type="text/javascript">
	{foreach from=$blocks item=block}
		{if $block=='preview'}
			tinyMCE.init({
				mode					:"exact",
				elements				:"text",
				theme 					:"advanced",
				theme_advanced_resizing	:false,
				readonly 				:true,
				content_css : "{$SERVER_URL_NAME}client/styles/main-admin.css"
			});
		{/if}
		{if $block=='edit'}
			tinyMCE.init({
				mode : "exact",
				elements : "text",
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
				content_css : "{$SERVER_URL_NAME}client/styles/main-admin.css"
			});
		{/if}
		{if $block=='list'}
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
					content_css : "{$SERVER_URL_NAME}client/styles/main-admin.css"
				});
		{/if}
	{/foreach}
	</script>
{/if}