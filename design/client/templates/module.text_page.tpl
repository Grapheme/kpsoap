					<div class="line_big"></div>
					<h1>{$page.content.title}</h1>
{if !empty($page.submenu_tpl)}
					<div class="column left">
{include file=$page.submenu_tpl}
					</div>
					<div class="column right">
					{$page.content.text}
					</div>
					<div class="clear"></div>
{else}
					<div class="column center">
					{$page.content.text}
					</div>
{/if}