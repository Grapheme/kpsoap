{if !isset($rows)}
	<div id="mc-container">
	<h3>КОММЕНТАРИИ</h3>
	{if isset($page.comments->num_rows) && $page.comments->num_rows>0}
		<div class="mc-cleanslate mc-content">
			<ul class="mc-comment-list">
				{include file='unit.comments.tpl' rows=$page.comments->cell}
			</ul>
		</div>
	{/if}
	</div>
	<script type="text/javascript">
	if (document.getElementsByTagName('html')[0].className.match(/msie(6|7)/) == null) {
		var mcSite = '19981';
		var mcSize = '5';
		var mcAvatarSize = '32';
		var mcTextSize = '150';
		var mcTitleSize = '40';
		var mcJqueryOff = true;
		var mcChannel = (new String(document.location.href)).replace(/^http:\/\/(|[^.]*\.)([^.]*\.[^\/\.]*\/.*)/i,'http://$2').replace(/#.*/,'');
		(function() {
			var mc = document.createElement('script');
			mc.type = 'text/javascript';
			mc.async = false;
			mc.src = 'http://cackle.me/mc.widget-min.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(mc);
		})();
	}
	</script>
{else}
	{foreach from=$rows item=item key=posts}
			<li id="mc-{$item.id}>">
				<div class="mc-comment-user">
					<a class="mc-comment-author" href="{$item.author_www}">
						<img src="{$item.author_avatar}" width="36" height="36" />
					</a>
				</div>
				<div class="mc-comment-wrapper mc-comment-approved">
					<div class="mc-comment-head">
						<a class="mc-comment-username" href="{$item.author_www}" target="_blank" rel="nofollow">{$item.author_name}</a>
						<span class="mc-comment-bullet"> • </span>
						<a class="mc-comment-created" href="{$item.channel}#mc-{$item.id}" timestamp="{$item.created}">{$item.created|date_format:"%d %B %Y %H:%M":"":"rus"}</a>
					</div>
					<div class="mc-comment-body">{$item.message}</div>
				</div>
				<div class="clear"></div>
				{if count($item.sub)>0}
				<ul class="mc-comment-child">
					{include file='unit.comments.tpl' rows=$item.sub->cell}
				</ul>
				{/if}
			</li>
	{/foreach}
{/if}