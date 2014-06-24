{if $SITE_SECTION_NAME == null}
	{assign var="pwidth" value="310"}
{elseif $SITE_SECTION_NAME == "turizm"}
	{if $SITE_SECTION_PAGE}
		{assign var="pwidth" value="295"}
	{else}
		{assign var="pwidth" value="335"}
	{/if}
{else}
	{assign var="pwidth" value="295"}
{/if}

<div class="h1"><a href="http://stylewoods.ru/blog/">Wood Blog</a></div>
<div class="blog">
	{foreach from=$page.panels_data.blog item=row key=index}
	<div class="blog-row">
		<a href="{$row.href}" class="title">{$row.title}</a>
		{if $row.imgs_list!=false}
			<p>{strip}<a href="{$row.href}">
			{foreach from=$row.imgs_list item=img key=img_index}
				{if $img.transform == false}
					{assign var="koef" value="`$img.size[0]/$pwidth`"}
				<img src="{$img.src}" width="{$pwidth}" height="{$img.size[1]/$koef|string_format:"%d"}" alt="{$img.alt}" />
				{else}
				<img src="{$img.src|replace:"image":"img-image"|replace:".jpg":"-jpg-"}{$pwidth}xauto-87.jpg" width="{$pwidth}" alt="{$img.alt}" />
				{/if}
			{/foreach}
			</a>
			{/strip}</p>
		{/if}
		{if $row.text!=false}
		<p>{$row.text}</p>
		{/if}
		{if count($row.tags)>0 && !empty($row.tags[0])}
		<div class="tags">
			Tags: 
			{foreach from=$row.tags item=row_tags key=tags_index}
			<a href="{$row.module_href}tag_{$row_tags|regex_replace:'#\s#':'_'}/">{$row_tags}</a>{if $tags_index < count($row.tags)-1},{/if}
			{/foreach}
		</div>
		{/if}
	</div>
	{/foreach}
	<a href="/blog/" class="to-blog">Все статьи</a>
</div>