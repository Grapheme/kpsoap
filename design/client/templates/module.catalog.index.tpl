{if count($page.submenu)>0}
				<div class="panel-left">
{section name=left_panel loop=$page.panels.left}
	{include file=$page.panels.left[left_panel]}
{/section}
				</div>
				<div class="panel-right">
{else}
				<div class="panel-center">
{/if}
{foreach from=$page.produce_list item=group key=index}
					<div class="h1">{$group.title} ({$group.count})</div>
					<table class="produce-list">
						<tr>
	{foreach from=$group.list item=row key=index}
							<td>
								{assign var="koef" value="`$row.psize[1]/140`"}
								<a href="/{$SITE_SECTION_NAME}/{$group.alias}/{$row.article}/">
									<img src="{$row.photo}" height="140" width="{$row.psize[0]/$koef|string_format:'%d'}" alt="" />
									<span class="descript">{$row.title_eng}</span>
									<span class="price">{if $row.price>0}{$row.price|strrev|regex_replace:"/([0-9][0-9][0-9])/":"\\1 "|strrev|trim|regex_replace:"/(\.[0-9])/":"\\000"} руб{else}&nbsp;{/if}</span>
								</a>
							</td>
	{/foreach}
						</tr>
					</table>
					<a class="c-button right" href="/{$SITE_SECTION_NAME}/{$group.alias}/"><span>Смотреть все {$group.title} &raquo;</span></a>
					<div class="end-float"><!-- --></div>
{foreachelse}
					<div class="h1">Каталог ///</div>
					<br />
					<br />
					<p style="text-align:center">Продукция отсутствует</p>
					<br />
					<br />
					<br />
					<br />
{/foreach}
				</div>
				<div class="end-float"><!-- --></div>