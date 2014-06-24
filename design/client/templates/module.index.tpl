					<div class="banner">
						<div class="basis">
							<div class="images">
								<div class="banners 570x386 [/banner.xml]" style="float:right"></div>
							</div>
						</div>
						<div class="scotch top left"><!-- --></div>
						<div class="scotch top right"><!-- --></div>
						<div class="scotch bottom left"><!-- --></div>
						<div class="scotch bottom right"><!-- --></div>
					</div>
					{if is_array($page.produce_sell) && count($page.produce_sell)>0}
					<div class="products-gallery">
						<div class="parrent">
							<div class="motion">
							{foreach from=$page.produce_sell item=row key=index}
								<div class="item{if $row.new == 1} new{/if}"> <!-- news -->
									<a href="/catalog/{$row.groupalias}/{$row.article}/" class="img">
										<img src = "{$row.photo}"><samp></samp>
										<span class="title">{$row.title_eng}</span>
									</a>
									<span class="price{if $row.price_sell>0} last_price{/if}">&nbsp;{$row.price|strrev|regex_replace:"/([0-9][0-9][0-9])/":"\\1 "|strrev|trim|regex_replace:"/(\.[0-9])/":"\\000"} руб&nbsp;</span>
									{if $row.price_sell>0}
										<span class="price">{$row.price_sell|strrev|regex_replace:"/([0-9][0-9][0-9])/":"\\1 "|strrev|trim|regex_replace:"/(\.[0-9])/":"\\000"} руб</span>
									{/if}
								</div>
							{/foreach}
								<div class="clear"></div>
							</div>
						</div>
						<div class="prev"><!-- --></div>
						<div class="next"><!-- --></div>
					</div>
					{/if}
					
					<div class="index-text">
						<div class="center">
							<h2>{$page.content.title}</h2>
						</div>
						{assign var="word" value=$page.content.text|strip_tags|strip|trim|regex_replace:'/([^ ]+).*/':'\1'}
						{assign var="word_c" value=$word|mb_substr:0:1:'utf-8'|upper}
						{assign var="word_b" value=$word|lower|mb_substr:1}
						{$page.content.text|regex_replace:('/<p>(.*)'|cat:$word|cat:'/'):('<div class="forlitter">'|cat:$word_c|cat:'</div><p>\1'|cat:$word_b):1}
					</div>
					<div class="clear"></div>