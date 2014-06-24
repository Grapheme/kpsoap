<?php /* Smarty version Smarty-3.1.8, created on 2014-06-24 13:04:27
         compiled from "design/client/templates\main.body.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1844353a933b5bbd732-45343794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a35172da7eac0ba342c6c604dcd311388858338b' => 
    array (
      0 => 'design/client/templates\\main.body.tpl',
      1 => 1403600666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1844353a933b5bbd732-45343794',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53a933b5ca3ef6_24075060',
  'variables' => 
  array (
    'page' => 0,
    'SERVER_URL_NAME' => 0,
    'SITE_SECTION_NAME' => 0,
    'menu_list' => 0,
    'mitem' => 0,
    'subpage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53a933b5ca3ef6_24075060')) {function content_53a933b5ca3ef6_24075060($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config('global.conf', $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru"><head><title><?php if (isset($_smarty_tpl->tpl_vars['page']->value['headers'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['headers']['title'];?>
<?php }?></title><meta http-equiv="content-type" content="text/html; charset=UTF-8" /><meta id="metaKeywords" name="KEYWORDS" content="<?php if (isset($_smarty_tpl->tpl_vars['page']->value['headers'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['headers']['keywords'];?>
<?php }?>" /><meta id="metaDescription" name="DESCRIPTION" content="<?php if (isset($_smarty_tpl->tpl_vars['page']->value['headers'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['headers']['description'];?>
<?php }?>" /><link rel="SHORTCUT ICON" href="/favicon.ico" type="image/x-icon" /><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('swfobject');?>
"></script><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('jquery');?>
"></script><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('jquery_cookies');?>
"></script><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('jquery_base64');?>
"></script><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('jquery_browser');?>
"></script><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('jquery_color');?>
"></script><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('jquery_mousewheel');?>
"></script><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('jquery_scrollto');?>
"></script><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('scripts');?>
"></script><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('fancybox');?>
"></script><style type="text/css">/*<![CDATA[*/@import url(<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('css_fancybox');?>
);/*]]>*/</style><style type="text/css">/*<![CDATA[*/@import url(<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('main');?>
);/*]]>*/</style><script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script><!--[if lte IE 7]><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('fixpng');?>
"></script><style type="text/css">/*<![CDATA[*/@import url(<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('for_ie');?>
);/*]]>*/</style><![endif]--><?php if (isset($_smarty_tpl->tpl_vars['page']->value['photo_like'])&&isset($_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value)&&($_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value=='blog'||$_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value=='catalog')){?><meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['page']->value['photo_like'];?>
" /><link rel="image_src" href="<?php echo $_smarty_tpl->tpl_vars['page']->value['photo_like'];?>
"><?php }?></head><body<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['subclass'])){?> class="<?php echo $_smarty_tpl->tpl_vars['page']->value['subclass'];?>
"<?php }?>><!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter21415363 = new Ya.Metrika({ id:21415363, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/21415363" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter --><?php if ($_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value=='blog'){?><script type="text/javascript" src="http://vk.com/js/api/share.js?11" charset="windows-1251"></script><script type="text/javascript" src="http://userapi.com/js/api/openapi.js?50"></script><script type="text/javascript">VK.init({ apiId: 3063818, onlyWidgets: true });</script><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><?php }?><div class="contaner"><div class="header"><div class="contaner"><a href="/" class="logo"><!-- --></a><div class="phone"><span class="text">Контактный телефон:</span><span class="number"><?php echo $_smarty_tpl->tpl_vars['page']->value['contact']['phone'];?>
</span></div><div class="basket<?php if (!isset($_smarty_tpl->tpl_vars['page']->value['cookie']['basket_count'])||(isset($_smarty_tpl->tpl_vars['page']->value['cookie']['basket_count'])&&$_smarty_tpl->tpl_vars['page']->value['cookie']['basket_count']==0)){?> empty<?php }?>"><span class="more">В корзине <a href="/order/"><span class="count"><?php if (isset($_smarty_tpl->tpl_vars['page']->value['cookie']['basket_count'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['cookie']['basket_count'];?>
<?php }else{ ?>0<?php }?></span> <span class="item" mask="товар,а,ов">товаров</span> на <span class="price"><?php if (isset($_smarty_tpl->tpl_vars['page']->value['cookie']['basket_price'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['cookie']['basket_price'];?>
<?php }else{ ?>0<?php }?></span> руб</a></span><span class="zero">Ваша <a href="/order/">корзина</a> пуста</span></div><span class="slogan">НАТУРАЛЬНОЕ МЫЛО И КОСМЕТИКА РУЧНОЙ РАБОТЫ</span><?php echo $_smarty_tpl->getSubTemplate ("main.menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div><div class="content"><div class="contaner"><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page']->value['page_tpl'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="clear"></div></div></div></div><div class="footer"><div class="contaner"><div class="shop_guide"><?php  $_smarty_tpl->tpl_vars['mitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mitem']->_loop = false;
 $_smarty_tpl->tpl_vars['mindex'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mitem']->key => $_smarty_tpl->tpl_vars['mitem']->value){
$_smarty_tpl->tpl_vars['mitem']->_loop = true;
 $_smarty_tpl->tpl_vars['mindex']->value = $_smarty_tpl->tpl_vars['mitem']->key;
?><?php if ($_smarty_tpl->tpl_vars['mitem']->value['alias']=='info'){?><?php  $_smarty_tpl->tpl_vars['subpage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subpage']->_loop = false;
 $_smarty_tpl->tpl_vars['pindex'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mitem']->value['subpage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subpage']->key => $_smarty_tpl->tpl_vars['subpage']->value){
$_smarty_tpl->tpl_vars['subpage']->_loop = true;
 $_smarty_tpl->tpl_vars['pindex']->value = $_smarty_tpl->tpl_vars['subpage']->key;
?><a href="/<?php echo $_smarty_tpl->tpl_vars['mitem']->value['alias'];?>
/<?php echo $_smarty_tpl->tpl_vars['subpage']->value['alias'];?>
/"><?php echo $_smarty_tpl->tpl_vars['subpage']->value['menutitle'];?>
</a><?php } ?><?php }?><?php } ?><a href="/info/feedback/">Обратная связь</a></div><span class="text">Следите за нами:</span><div class="group"><?php if ($_smarty_tpl->tpl_vars['page']->value['contact']['vk']){?><span class="vkontakte"><a href="<?php echo $_smarty_tpl->tpl_vars['page']->value['contact']['vk'];?>
" target="_blank" title="Мы Вконтакте"></a></span><?php }?><?php if ($_smarty_tpl->tpl_vars['page']->value['contact']['fb']){?><span class="facebook"><a href="<?php echo $_smarty_tpl->tpl_vars['page']->value['contact']['fb'];?>
" target="_blank" title="Мы в FaceBook"></a></span><?php }?><?php if ($_smarty_tpl->tpl_vars['page']->value['contact']['od']){?><span class="mailru"><a href="<?php echo $_smarty_tpl->tpl_vars['page']->value['contact']['od'];?>
" target="_blank" title="Мы в Моем мире"></a></span><?php }?></div><div class="logo"></div></div></div></body></html><?php }} ?>