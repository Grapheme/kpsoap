{config_load file='global.conf' section="setup"}
{strip}
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru"> 
	<head> 
		<title>{if isset($page.headers)}{$page.headers.title}{/if}</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		
		<meta id="metaKeywords" name="KEYWORDS" content="{if isset($page.headers)}{$page.headers.keywords}{/if}" /> 
		<meta id="metaDescription" name="DESCRIPTION" content="{if isset($page.headers)}{$page.headers.description}{/if}" />
		<link rel="SHORTCUT ICON" href="/favicon.ico" type="image/x-icon" />
		
		<script type="text/javascript" src="{$SERVER_URL_NAME}{#swfobject#}"></script>
		<script type="text/javascript" src="{$SERVER_URL_NAME}{#jquery#}"></script>
		<script type="text/javascript" src="{$SERVER_URL_NAME}{#jquery_cookies#}"></script>
		<script type="text/javascript" src="{$SERVER_URL_NAME}{#jquery_base64#}"></script>
		<script type="text/javascript" src="{$SERVER_URL_NAME}{#jquery_browser#}"></script>
		<script type="text/javascript" src="{$SERVER_URL_NAME}{#jquery_color#}"></script>
		<script type="text/javascript" src="{$SERVER_URL_NAME}{#jquery_mousewheel#}"></script>
		<script type="text/javascript" src="{$SERVER_URL_NAME}{#jquery_scrollto#}"></script>
		<script type="text/javascript" src="{$SERVER_URL_NAME}{#scripts#}"></script>
		<script type="text/javascript" src="{$SERVER_URL_NAME}{#fancybox#}"></script>
		<style type="text/css">/*<![CDATA[*/@import url({$SERVER_URL_NAME}{#css_fancybox#});/*]]>*/</style> 
		<style type="text/css">/*<![CDATA[*/@import url({$SERVER_URL_NAME}{#main#});/*]]>*/</style> 
		<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
		<!--[if lte IE 7]>
			<script type="text/javascript" src="{$SERVER_URL_NAME}{#fixpng#}"></script>
			<style type="text/css">/*<![CDATA[*/@import url({$SERVER_URL_NAME}{#for_ie#});/*]]>*/</style>
		<![endif]-->

		{if isset($page.photo_like) && isset($SITE_SECTION_NAME) && ($SITE_SECTION_NAME=='blog' || $SITE_SECTION_NAME=='catalog')}
		<meta property="og:image" content="{$page.photo_like}" />
		<link rel="image_src" href="{$page.photo_like}">
		{/if}
	</head> 
	
	<body{if !empty($page.subclass)} class="{$page.subclass}"{/if}>
		<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter21415363 = new Ya.Metrika({ id:21415363, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/21415363" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
		{if $SITE_SECTION_NAME=='blog'}
			<script type="text/javascript" src="http://vk.com/js/api/share.js?11" charset="windows-1251"></script>
			<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?50"></script>
			<script type="text/javascript">
				VK.init({ apiId: 3063818, onlyWidgets: true });
			</script>
			<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
		{/if}
		<div class="contaner">
			<div class="header">
				<div class="contaner">
					<a href="/" class="logo"><!-- --></a>
					<div class="phone">
						<span class="text">Контактный телефон:</span>
						<span class="number">{$page.contact.phone}</span>
					</div>
					<div class="basket{if !isset($page.cookie.basket_count) || (isset($page.cookie.basket_count) && $page.cookie.basket_count==0)} empty{/if}">
						<span class="more">В корзине <a href="/order/"><span class="count">{if isset($page.cookie.basket_count)}{$page.cookie.basket_count}{else}0{/if}</span> <span class="item" mask="товар,а,ов">товаров</span> на <span class="price">{if isset($page.cookie.basket_price)}{$page.cookie.basket_price}{else}0{/if}</span> руб</a></span>
						<span class="zero">Ваша <a href="/order/">корзина</a> пуста</span>
					</div>
					<span class="slogan">НАТУРАЛЬНОЕ МЫЛО И КОСМЕТИКА РУЧНОЙ РАБОТЫ</span>
{include file="main.menu.tpl"}
				</div>
			</div>
			<div class="content">
				<div class="contaner">
{include file=$page.page_tpl}
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="contaner">
					<div class="shop_guide">
					{foreach from=$menu_list item=mitem key=mindex}
						{if $mitem.alias=='info'}
							{foreach from=$mitem.subpage item=subpage key=pindex}
						<a href="/{$mitem.alias}/{$subpage.alias}/">{$subpage.menutitle}</a>
							{/foreach}
						{/if}
					{/foreach}
						<a href="/info/feedback/">Обратная связь</a>
					</div>
					<span class="text">Следите за нами:</span>
					<div class="group">
						{if $page.contact.vk}
						<span class="vkontakte"><a href="{$page.contact.vk}" target="_blank" title="Мы Вконтакте"></a></span>
						{/if}
						{if $page.contact.fb}
						<span class="facebook"><a href="{$page.contact.fb}" target="_blank" title="Мы в FaceBook"></a></span>
						{/if}
						{if $page.contact.od}
						<span class="mailru"><a href="{$page.contact.od}" target="_blank" title="Мы в Моем мире"></a></span>
						{/if}
					</div>
				<div class="logo"></div>
			</div>
		</div>

	</body>  
</html>
{/strip}