{if preg_match('/(fb|vk|gp|tw)/i',$list)}
<div class="likes {$type}">
	{assign var=items value=";"|explode:$list}
	{assign var=domain value=$SERVER_URL_NAME|regex_replace:'/^http:\/\/(|[^.]*\.)([^.]*\.[^\/\.]*\/.*)/i':'http://$2'}
	{assign var=shareurl value=(empty($SITE_SECTION_SUBPAGE))?"{$domain}{$SITE_SECTION_NAME}/{$SITE_SECTION_PAGE}/":"{$domain}{$SITE_SECTION_NAME}/{$SITE_SECTION_PAGE}/{$SITE_SECTION_SUBPAGE}/"}
	{foreach from=$items item=item key=posts}
		{if $item=='fb'}
	<div class="blike facebook">
		<iframe src="http://www.facebook.com/plugins/like.php?href={$shareurl}&send=false&layout=button_count&width=135&show_faces=false&action=like&colorscheme=light&font=tahoma&height=20&appId=203451913117132" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:135px; height:20px;" allowTransparency="true"></iframe>
	</div>
		{/if}
		{if $item=='vk'}		
	<div class="blike vk">
		<div id="vk_like"></div>
		<script type="text/javascript">
			document.write(VK.Share.button(
				{
					url: "{$shareurl}",
					title: "{$page.content.post_cont.title}",
					description: "{$page.content.post_cont.text|strip_tags|strip|truncate:180:'...':true}",
					image: "{$page.photo_like}",
					noparse: true
				},{ type: "round", text: "Мне нравится" })
			);
		</script>
	</div>
		{/if}
		{if $item=='gp'}
	<div class="blike gplus">
		<g:plusone size="medium"></g:plusone>
	</div>
		{/if}
		{if $item=='tw'}
	<div class="blike tweet">
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="{$shareurl}" data-lang="ru">Твитнуть</a>
		<script>!function(d,s,id) { var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)) { js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs); } } (document,"script","twitter-wjs");</script>
	</div>
		{/if}
	{/foreach}
	<div class="clear"><!-- --></div>
</div>
{/if}