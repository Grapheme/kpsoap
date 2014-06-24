<?php /* Smarty version Smarty-3.1.8, created on 2014-04-13 23:14:48
         compiled from "design/admin/templates/adm.catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:433962321534ae228916dd4-23430953%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '220d52f79a0256506697a1c24e119754108cbe77' => 
    array (
      0 => 'design/admin/templates/adm.catalog.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '433962321534ae228916dd4-23430953',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
    'page' => 0,
    'row' => 0,
    'filter_status' => 0,
    'cn_row' => 0,
    'koef' => 0,
    'SITE_SECTION_NAME' => 0,
    'SITE_SECTION_PAGE' => 0,
    'lstart' => 0,
    'index' => 0,
    'ischeck' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_534ae228e93019_22327980',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534ae228e93019_22327980')) {function content_534ae228e93019_22327980($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/kpsoap.ru/system/smarty/plugins/modifier.regex_replace.php';
?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
<?php echo $_smarty_tpl->getConfigVariable('tiny_mce');?>
"></script>
<script type="text/javascript">
		var prewId = '';
		var max=50;
		for (var i=0; i<max; i++)
			prewId+='text'+i+(i<max-1?',':'');
		tinyMCE.init({
			mode : "exact",
			elements : prewId,
			theme : "advanced",
			theme_advanced_resizing : false,
			readonly : true,
			content_css : "<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
client/styles/main.css"
		});
</script> 

<div id="tabline"></div>

<div id="texts[0]" style="display: none">
	<div class="filter <?php echo $_smarty_tpl->tpl_vars['page']->value['content']['filter_focus'];?>
">
		<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prarticle']==''&&$_smarty_tpl->tpl_vars['page']->value['content']['filter']['prtitle']==''&&$_smarty_tpl->tpl_vars['page']->value['content']['filter']['prsubtype']==-1&&$_smarty_tpl->tpl_vars['page']->value['content']['filter']['prshow']==0){?>
			<?php $_smarty_tpl->tpl_vars["filter_status"] = new Smarty_variable("0", null, 0);?>
		<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars["filter_status"] = new Smarty_variable("1", null, 0);?>
		<?php }?>
		<b>Раздел:</b> 
		<select class="group">
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['groupindex'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['groupindex']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['filter']['group']==$_smarty_tpl->tpl_vars['row']->value['id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
			<?php } ?>
		</select>
		<span class="properties-button<?php if ($_smarty_tpl->tpl_vars['filter_status']->value==1){?> enabled<?php }?>">Фильтр: <?php if ($_smarty_tpl->tpl_vars['filter_status']->value==0){?>выключен<?php }else{ ?>включен<?php }?></span>
		<div class="clear"><!-- --></div>
		<div class="properties-panel<?php if ($_smarty_tpl->tpl_vars['filter_status']->value==1){?> enabled<?php }?>">
			<table>
				<tr>
					<td>по Названию:</td>
					<td><input class="prtitle" style="width:100px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['filter']['prtitle'];?>
"></td>
				</tr>
				<tr>
					<td>по Артиклу:</td>
					<td><input class="prarticle" style="width:180px" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['filter']['prarticle'];?>
"></td>
				</tr>
				<!--<tr>
					<td>по Коллекцим:</td>
					<td>
						<select class="prsubtype">
							<option value="-1"<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prsubtype']==-1){?> selected="selected"<?php }?>>Все</option>
							<option value="0"<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prsubtype']==0){?> selected="selected"<?php }?>>Без коллекции</option>
							<?php  $_smarty_tpl->tpl_vars['cn_row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cn_row']->_loop = false;
 $_smarty_tpl->tpl_vars['cn_index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['subtype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cn_row']->key => $_smarty_tpl->tpl_vars['cn_row']->value){
$_smarty_tpl->tpl_vars['cn_row']->_loop = true;
 $_smarty_tpl->tpl_vars['cn_index']->value = $_smarty_tpl->tpl_vars['cn_row']->key;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['cn_row']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prsubtype']==$_smarty_tpl->tpl_vars['cn_row']->value['id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cn_row']->value['title'];?>
</option>
							<?php } ?>
						</select>
					</td>
				</tr>-->
				<tr class="global">
					<td>показывать</td>
					<td>
						<select class="prshow">
							<option value="0"<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prshow']==0){?> selected="selected"<?php }?>>Все</option>
							<option value="1"<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prshow']==1){?> selected="selected"<?php }?>>Только в наличии</option>
							<option value="2"<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prshow']==2){?> selected="selected"<?php }?>>Только отсутствующие</option>
						</select>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<table class="panels">
		<tr>
			<td class="panel">
				<div class="title">Список</div>
				<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['empty_list'])){?>
					<div class="no_data"><?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['empty_group'])){?>Добавьте хотя бы одну группу<?php }else{ ?>Продукция отсутствует<?php }?></div>
				<?php }else{ ?>
					<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['blogindex'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['blogindex']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
					<div class="block-item">
						
						<div class="catalog">
							<div class="title">
							<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prtitle']!=''){?>
								<?php echo smarty_modifier_regex_replace(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row']->value['title'],"/\((.*)\)/i","<small><br />\\1</small>"),"/(".($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prtitle']).")/i","<span class='search'>\\1</span>");?>

							<?php }else{ ?>
								<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row']->value['title'],"/\((.*)\)/i","<small><br />\\1</small>");?>

							<?php }?>
							</div>
							<?php $_smarty_tpl->tpl_vars["koef"] = new Smarty_variable(($_smarty_tpl->tpl_vars['row']->value['psize'][1]/70), null, 0);?>
							<div class="photo">
								<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" height="70" width="<?php echo $_smarty_tpl->tpl_vars['row']->value['psize'][0]/sprintf("%d",$_smarty_tpl->tpl_vars['koef']->value);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" />
							</div>
							<div class="info">
								<div class="clear"><!-- --></div>
								<div class="article"><span>Артикул:</span>
								<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prarticle']!=''){?>
									<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row']->value['article'],"/".($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prarticle'])."/i","<span class='search'>".($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prarticle'])."</span>");?>
 <small>(<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row']->value['article'],"/".($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prarticle'])."/i","<span class='search'>".($_smarty_tpl->tpl_vars['page']->value['content']['filter']['prarticle'])."</span>");?>
)</small>
								<?php }else{ ?>
									<?php echo $_smarty_tpl->tpl_vars['row']->value['article'];?>
 <small>(<?php echo $_smarty_tpl->tpl_vars['row']->value['article'];?>
)</small>
								<?php }?>
								</div>
								<div class="subtype"><span>Подраздел:</span> <?php if ($_smarty_tpl->tpl_vars['row']->value['subtype']==0){?><span class="no">Без подраздела</span><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['subtype_name'];?>
<?php }?></div>
								<table>
									<tr>
										<td><div class="count"><span>В наличии:</span></td>
										<td><input class="edit_count id<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['count'];?>
" maxlength="4" /> шт.</div></td>
									</tr>
									<tr>
										<td><div class="price"><span>Цена:</span></td>
										<td><input class="edit_price id<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['price'];?>
" maxlength="10" /> р.</div></td>
									</tr>
									<tr>
										<td><div class="price"><span>Цена по скидке:</span></td>
										<td><input class="edit_price_sell id<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['price_sell'];?>
" maxlength="10" /> р.</div></td>
									</tr>
								</table>
							</div>
							<div class="clear"><!-- --></div>
							<div class="priority">
								<div class="count"><span>Приоритет:</span>
								<input class="edit_priority id<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['priority'];?>
" maxlength="5" /></div>
							</div>
							<div class="buttons">
								<a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>:action=edit&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"></a>
								<a class="del" href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>:action=del&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"></a>
							</div>
							<div class="clear"><!-- --></div>
						</div>
						<div class="news-down"><!-- --></div>
					</div>
					<?php } ?>
					<div class="clear"><!-- --></div>
				<?php }?>
			</td>
		</tr>
	</table>
	<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['pg_max'])){?>
		<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['pg_max']>1){?>
			<div class="pages">
			<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['pg_max']<=18){?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['name'] = "pages";
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['content']['pg_max']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total']);
?>
					<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']==$_smarty_tpl->tpl_vars['page']->value['content']['pg']){?>
				<span><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']+1;?>
</span>
					<?php }else{ ?>
				<a href="/admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']>=0){?>:pg=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index'];?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']+1;?>
</a>
					<?php }?>
				<?php endfor; endif; ?>
			<?php }else{ ?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['pg']>0){?>
				<a href="/admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/">&laquo;</a>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['pg']>8){?>
				...
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['pg']<8){?>
					<?php $_smarty_tpl->tpl_vars["lstart"] = new Smarty_variable("0", null, 0);?>
				<?php }elseif($_smarty_tpl->tpl_vars['page']->value['content']['pg']-8+17>$_smarty_tpl->tpl_vars['page']->value['content']['pg_max']){?>
					<?php $_smarty_tpl->tpl_vars["lstart"] = new Smarty_variable(($_smarty_tpl->tpl_vars['page']->value['content']['pg_max']-17), null, 0);?>
				<?php }else{ ?>
					<?php $_smarty_tpl->tpl_vars["lstart"] = new Smarty_variable(($_smarty_tpl->tpl_vars['page']->value['content']['pg']-8), null, 0);?>
				<?php }?>
				
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['name'] = "pages";
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'] = (int)($_smarty_tpl->tpl_vars['lstart']->value);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'] = is_array($_loop=($_smarty_tpl->tpl_vars['lstart']->value+17)) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["pages"]['total']);
?>
					<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']==$_smarty_tpl->tpl_vars['page']->value['content']['pg']){?>
				<span><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']+1;?>
</span>
					<?php }else{ ?>
				<a href="/admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']>0){?>:pg=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index'];?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']+1;?>
</a>
					<?php }?>
				<?php endfor; endif; ?>
				
				<?php if ($_smarty_tpl->tpl_vars['lstart']->value+17<$_smarty_tpl->tpl_vars['page']->value['content']['pg_max']){?>
				...
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value['content']['pg']<$_smarty_tpl->tpl_vars['page']->value['content']['pg_max']-1){?>
				<a href="/admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/:pg=<?php echo $_smarty_tpl->tpl_vars['page']->value['content']['pg_max']-1;?>
">&raquo;</a>
				<?php }?>
			<?php }?>
			</div>
		<?php }?>
	<?php }?>
	<div class="panel-operation">
		<input class="button<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['empty_group'])){?> disabled<?php }?>" id="add" type="button" value="Добавить" <?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['empty_group'])){?>disabled="disabled" <?php }?>onclick="javascript:button.disable(this); javascript:self.location.href='<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>:action=add'" />
		<div class="clear"><!----></div>
	</div>
</div>
<div id="texts[1]" style="display: none">
	<table class="panels">
		<tr>
			<td class="panel nospace noleftspace">
				<div class="title">
					<table>
						<tr>
							<th class="sort">Позиция</th>
							<th class="title">Название</th>
							<th>Описание раздела (html)</th>
						</tr>
					</table>
				</div>
				<div class="list">
				<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['content']['empty_subtype'])){?>
					<div class="no_data">Группы отсутствуют</div>
				<?php }else{ ?>
					<table>
					<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value['content']['subtype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
						<tr class="row<?php echo $_smarty_tpl->tpl_vars['index']->value%2;?>
" rowid=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
 alias="<?php echo $_smarty_tpl->tpl_vars['row']->value['alias'];?>
">
							<td class="sort"><?php echo $_smarty_tpl->tpl_vars['row']->value['priority'];?>
</td>
							<td class="title"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</td>
							<td name="description"><xmp><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['row']->value['description'],array("/\[\/(T|K|D)\]/i","/<\/(h[0-9]|span|div|p)>/i"),array("[/"."$"."1]\n","</"."$"."1>\n"));?>
</xmp></td>
							<td class="cmd"><label><input type="checkbox" /></label></td>
						</tr>
					<?php } ?>
					</table>
				<?php }?>
				</div>
			</td>
		</tr>
	</table>
	<input class="button list_btn_delete" cmd="delsubtype" id="delgroup" type="button" value="Удалить" />
	<input class="button list_btn_edit 1" cmd="savsubtype" id="editgroup" type="button" value="Редактировать" />
	<input class="button list_btn_insert 1" cmd="inssubtype" id="addgroup" type="button" value="Добавить" />
</div>
<div id="texts[2]" style="display: none">
	<form action="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
admin/<?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_NAME']->value;?>
/<?php if (!empty($_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value)){?><?php echo $_smarty_tpl->tpl_vars['SITE_SECTION_PAGE']->value;?>
/<?php }?>" method="post" onsubmit="javascript:button.disable(getElementById('submit'))">
		<input type="hidden" name="action" value="saveattach" />
		<table class="panels">
			<tr>
				<td class="panel">
					<div class="title">Подключение боковых панелей</div>
					<table>
						<tr>
							<td>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['name'] = 'pleft';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels_list']['left']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pleft']['total']);
?>
						<?php $_smarty_tpl->tpl_vars["ischeck"] = new Smarty_variable(false, null, 0);?>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['name'] = 'tstchech';
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels']['left']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total']);
?>
							<?php if ($_smarty_tpl->tpl_vars['page']->value['panels']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['tstchech']['index']]==$_smarty_tpl->tpl_vars['page']->value['panels_list']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['pleft']['index']]['id']){?>
								<?php $_smarty_tpl->tpl_vars["ischeck"] = new Smarty_variable(true, null, 0);?>
						<?php }?>
						<?php endfor; endif; ?>	
								<label><input name="panel[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['panels_list']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['pleft']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['ischeck']->value==true){?>checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['page']->value['panels_list']['left'][$_smarty_tpl->getVariable('smarty')->value['section']['pleft']['index']]['name'];?>
</label><br />
					<?php endfor; endif; ?>
							</td>
							<td>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pright'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['name'] = 'pright';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels_list']['right']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pright']['total']);
?>
						<?php $_smarty_tpl->tpl_vars["ischeck"] = new Smarty_variable(false, null, 0);?>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['name'] = 'tstchech';
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['panels']['right']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['tstchech']['total']);
?>
							<?php if ($_smarty_tpl->tpl_vars['page']->value['panels']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['tstchech']['index']]==$_smarty_tpl->tpl_vars['page']->value['panels_list']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['pright']['index']]['id']){?>
								<?php $_smarty_tpl->tpl_vars["ischeck"] = new Smarty_variable(true, null, 0);?>
						<?php }?>
						<?php endfor; endif; ?>
								<label><input name="panel[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['panels_list']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['pright']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['ischeck']->value==true){?>checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['page']->value['panels_list']['right'][$_smarty_tpl->getVariable('smarty')->value['section']['pright']['index']]['name'];?>
</label><br />
					<?php endfor; endif; ?>
							</td>
						</tr>
					</table>
				</td>
				<td class="panel meta">
					<div class="title">Заголовки, meta, шаблон</div>
					<div class="form">
						<div class="f_title">Заголовок страницы</div><input class="text" name="title" type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['page']->value['header']['title'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['header']['title'];?>
<?php }?>" />
						<div class="f_title">Keywords</div><div class="border"><textarea name="keywords" style="height: 80px;"><?php if (!empty($_smarty_tpl->tpl_vars['page']->value['header']['keywords'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['header']['keywords'];?>
<?php }?></textarea></div>
						<div class="f_title">Description</div><div class="border"><textarea name="description" style="height: 100px;"><?php if (!empty($_smarty_tpl->tpl_vars['page']->value['header']['description'])){?><?php echo $_smarty_tpl->tpl_vars['page']->value['header']['description'];?>
<?php }?></textarea></div>
						<div class="f_title">Шаблон</div>
						<select name="tpl">
							<option value="null" style=" color: #C0C0C0" selected="selected">По умолчанию</option>
							<!--<option value="module.index.tpl">module.index.tpl</option>
							<option value="module.text_page.tpl">module.text_page.tpl</option>-->
						</select>
					</div>
				</td>
			</tr>
		</table>
		<input class="button" id="submit" type="submit" value="Обновить" />
	</form>
</div>

<script language="javascript">
	marks.init(new Array(new Array('mark1','Продукция'),
						 new Array('mark2','Подразделы'),
						 new Array('mark3','Настройки')), "tabline", "texts", <?php if ($_smarty_tpl->tpl_vars['page']->value['mark']!=''){?><?php echo $_smarty_tpl->tpl_vars['page']->value['mark'];?>
<?php }else{ ?>0<?php }?>, "top.gif", "sel", "top_grey.gif", "no_sel");
</script><?php }} ?>