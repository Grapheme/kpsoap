<?php /* Smarty version Smarty-3.1.8, created on 2014-03-30 16:53:24
         compiled from "design/client/templates/module.noaccess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1386821188533813c417bd64-45078318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1dbe39d61ca1b46e205f0cc85ec6cd69cb67d7c' => 
    array (
      0 => 'design/client/templates/module.noaccess.tpl',
      1 => 1395827319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1386821188533813c417bd64-45078318',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SERVER_URL_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533813c42e4d85_48314030',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533813c42e4d85_48314030')) {function content_533813c42e4d85_48314030($_smarty_tpl) {?>	            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="big_str">&nbsp;</td>
                  <td>
                    <div class="zggg">
                      <h1>Ограничение доступа</h1>
                    </div>
                  </td>
                </tr>
              </table>
              
              
              <div class="tipainfo">
                <table border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>
                      <h2>Доступ закрыт</h2>
                      <br />
                      Для получени€ доступа к данному разделу Вам необходимо иметь соответствующие права.
                      <br />
                      <br />
                      <a href="<?php echo $_smarty_tpl->tpl_vars['SERVER_URL_NAME']->value;?>
">Перейти на главную</a>
                    </td>
                  </tr>
                </table>
              </div><?php }} ?>