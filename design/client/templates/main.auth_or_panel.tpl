<div class="autoriz">
{if $subject.auth_state === true}
  «дравствуйте,<br />{$subject.info.name[0]} {$subject.info.name[1]}<br />
  <div class="autotrr_04">
  {if is_array($subject.group_list)}  
    <span style="font-size:13px">&raquo;</span>&nbsp;<a href="javascript:void(0)" onclick="element.show('apDiv2')">ѕринадлежность</a> к группам<br />
    <div id="apDiv2">
      <div class="apDiv1_canvas" onmouseout="element.time_hide('apDiv2',5)"></div>
      <table border="0" cellpadding="0" cellspacing="0" >
        <tr>
          <td class="mens_sinlv">&nbsp;</td>
          <td class="mens_sinv">&nbsp;</td>
          <td class="mens_sinvr">&nbsp;</td>
        </tr>
        <tr>
          <td class="mens_sinl">&nbsp;</td>
          <td class="mens_singr">
          <div class="krest" onclick="element.hide('apDiv2')" onmouseover="element.stopwhite('apDiv2')">
            <div class="apDiv1_but"></div>
            <h2>ѕринадлежность к группам</h2>
            <div class="br10"></div>
            <table border="0" cellpadding="0" cellspacing="0">
      {section name=group_list loop=$subject.group_list}                
              <tr>
                <td class="inf_01">{$subject.group_list[group_list].name}</td>
              </tr>
      {/section}    
            </table>
          </div>
            <p>&nbsp;</p>
          </td>
          <td class="mens_sinr">&nbsp;</td>
        </tr>
        <tr>
          <td class="mens_sinln">&nbsp;</td>
          <td class="mens_sinn">&nbsp;</td>
          <td class="mens_sinrn">&nbsp;</td>
        </tr>
      </table>
    </div>
  {/if}
    <span style="font-size:13px">&raquo;</span>&nbsp;<a href="javascript:void(0)" onclick="element.show('apDiv1')">ѕросмотреть</a> ¬аши права<br />
    <div id="apDiv1">
      <div class="apDiv1_canvas" onmouseout="element.time_hide('apDiv1',5)"></div>
      <table border="0" cellpadding="0" cellspacing="0" >
        <tr>
          <td class="mens_sinlv">&nbsp;</td>
          <td class="mens_sinv">&nbsp;</td>
          <td class="mens_sinvr">&nbsp;</td>
        </tr>
        <tr>
          <td class="mens_sinl">&nbsp;</td>
          <td class="mens_singr">
          <div class="krest" onclick="element.hide('apDiv1')" onmouseover="element.stopwhite('apDiv1')">
            <div class="apDiv1_but"></div>
            <h2>ѕрава вашей учетной записи</h2>
            <div class="br10"></div>
            <table border="0" cellpadding="0" cellspacing="0">
    {assign var="tmp_id_site_section" value="false"}
    {section name=sitesection loop=$subject.right_list}                
    	{if $tmp_id_site_section != $subject.right_list[sitesection].id_site_section}
    		{assign var="tmp_id_site_section" value=$subject.right_list[sitesection].id_site_section}
              <tr>
                <td class="inf_01"><strong>{$subject.right_list[sitesection].name}</strong></td>
              </tr>
      {/if}
              <tr>
                <td class="inf_01">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$subject.right_list[sitesection].description|regex_replace:"/\[.+\]/":" "}</td>
              </tr>
    {/section}            
            </table>
          </div>
            <p>&nbsp;</p>
          </td>
          <td class="mens_sinr">&nbsp;</td>
        </tr>
        <tr>
          <td class="mens_sinln">&nbsp;</td>
          <td class="mens_sinn">&nbsp;</td>
          <td class="mens_sinrn">&nbsp;</td>
        </tr>
      </table>
    </div>
  {if !is_array($subject.group_list)}
  	<span style="font-size:13px">&nbsp;</span>
  {/if}
  {if $subject.is_admin_access}
  <span style="font-size:13px">&raquo;</span>&nbsp;<a href="http://{$smarty.server.SERVER_NAME}/admin/">¬ойти</a> в панель управлени€
  {else}
	<span style="font-size:13px">&nbsp;</span>
  {/if}
  </div>
  <form id="logoff" method="post" action="http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}">
    <input name="logoff" type="hidden" value="true" />
    <div class="autorr_01">
      {literal}<div class="autorr_03" onclick="document.getElementById('logoff').submit();"></div>{/literal}
    </div>
	</form>
{else}
	«дравствуйте, √ость<br />
  јвторизаци€:
  <form id="logon" method="post" action="http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}">
    <input name="login" type="text" class="imputt_01" id="textfield" style="margin-top: 4px;" />
    <input name="password" type="password" class="imputt_01" id="textfield2" />
    <input name="logon" type="hidden" value="true" />
    <div class="autorr_01">
    	{literal}<div class="autorr_02" onclick="document.getElementById('logon').submit();"></div>{/literal}
    </div>
	</form>
{/if}
</div>