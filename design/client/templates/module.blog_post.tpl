					<div class="line_big"></div>
					<div class="column left">
						<div class="blog_item">
							<div class="column left">
								<div class="date">
									<span class="number">{$page.content.post_cont.date.day}</span>
									<span class="month">{$page.content.post_cont.date.month}</span>
									<span class="year">{$page.content.post_cont.date.year}</span>
									<span class="day">{$page.content.post_cont.date.week}</span>
								</div>
							</div>
							<div class="column right">
								<h1>{$page.content.post_cont.title}</h1>
								<div class="comments"><a href="#mc-container">{$page.content.post_cont.comments}</a> комментарий</div>
								{if 10==2}
								{assign var="word" value=$page.content.post_cont.text|strip_tags|strip|trim|regex_replace:'/([^ ]+).*/':'\1'}
								{assign var="word_c" value=$word|mb_substr:0:1:'utf-8'|upper}
								{assign var="word_b" value=$word|lower|mb_substr:1}
								
								{$page.content.post_cont.text|regex_replace:('/<p>(.*)'|cat:$word|cat:'/'):('<div class="forlitter">'|cat:$word_c|cat:'</div><p>\1'|cat:$word_b)}
								{/if}
								{$page.content.post_cont.text}
								{if count($page.content.post_cont.tags)>0 && !empty($page.content.post_cont.tags[0])}
								<p class="tags-list">
									ТЕГИ: 
									{foreach from=$page.content.post_cont.tags item=row_tags key=tags_index}
									<a href="/{$SITE_SECTION_NAME}/tag_{$row_tags|regex_replace:'#\s#':'_'}/">{$row_tags}</a>{if $tags_index < count($page.content.post_cont.tags)-1},{else}.{/if}
									{/foreach}
								</p>
								{/if}
								
								{include file='unit.share.tpl' type='count' list='fb;vk;gp;tw'}
								{include file='unit.comments.tpl'}
								
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="column right">
						{if !empty($page.submenu_tpl)}
							{include file=$page.submenu_tpl}
						{/if}
						{section name=left_panel loop=$page.panels.module.left}
							{include file=$page.panels.module.left[left_panel]}
						{/section}
					</div>
					<div class="clear"></div>