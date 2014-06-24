	<table class="produce-list">
		<tr>
{foreach from=$page.content.similarity item=row key=index}
			<td>
				<a href="/{$SITE_SECTION_NAME}/{$row.group}/{$row.article}/">
					<img src="{$row.photo}" {$row.psize[3]} alt="{$row.title_eng}" />
					<span class="article">{$row.article}</span>
					<span class="descript">{$row.title_eng}</span>
					<span class="price{if $row.price_sell>0} last_price{/if}">{$row.price|strrev|regex_replace:"/([0-9][0-9][0-9])/":"\\1 "|strrev|trim|regex_replace:"/(\.[0-9])/":"\\000"} руб</span>
					{if $row.price_sell>0}
						<span class="price">{$row.price_sell|strrev|regex_replace:"/([0-9][0-9][0-9])/":"\\1 "|strrev|trim|regex_replace:"/(\.[0-9])/":"\\000"} руб</span>
					{/if}
				</a>
			</td>
	{if (($index+1)%5)==0}
		</tr>
		<tr>
	{/if}
{/foreach}
		</tr>
	</table>