<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "IN_ZYADS" ) )
{
		exit( );
}
include( TPL_DIR."/header.php" );
echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/javascript/temp.js\"></script>\r\n<script src=\"/javascript/jquery/jtip.js\" language='JavaScript'></script>\r\n<link href=\"/javascript/jquery/css/question.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"active\"> <a   href=\"do.php?action=plan\"><span>����";
echo $action == "editplan" ? "�༭" : "����";
echo "�ƻ���Ŀ</span></a> </li>\r\n                    <li class=\"link\"> <a   href=\"do.php?action=plan\"><span>���ؼƻ��б�</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td><form id=\"create\" name=\"create\" method=\"post\" action=\"?action=";
if ( $action == "createplan" )
{
		echo "createplan&actiontype=postcreateplan";
}
if ( $action == "editplan" )
{
		echo "editplan&actiontype=postupplan";
}
echo "\"onsubmit=\"return post_submit()\">\r\n\t\t  \t <input name=\"planid\" type=\"hidden\" value=\"";
echo $plan['planid'];
echo "\" />\r\n              <input name=\"minprice\" id=\"minprice\" type=\"hidden\" value=\"";
echo $GLOBALS['C_ZYIIS']['cpcmin_price'];
echo "\" />\r\n              <table width=\"90%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tr>\r\n                  <td valign=\"top\">\r\n\t\t\t\t  ";
if ( $statetype == "success" )
{
		echo "\t\t\t\t<table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"100%\" >\r\n\t\t\t\t  <tr>\r\n\t\t\t\t\t<td height=\"30\"><img  src='/templates/";
		echo Z_TPL;
		echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">�����ɹ���</span></td>\r\n\t\t\t\t\t<td>&nbsp;</td>\r\n\t\t\t\t  </tr>\r\n\t\t\t\t</table>\r\n\t\t\t\t<script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\t\tnoneSuccess();\r\n\t\t\t\t</script>\r\n\t\t\t\t";
}
echo "\t\t\t<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border :1px solid #CCCCCC; margin-top:20px\"  >\r\n                      <tr>\r\n                        <td width=\"90\" height=\"30\" align=\"right\" bgcolor=\"#2098C8\" ><span style=\"color:#FFFFFF\">";
echo $action == "editplan" ? "�༭" : "����";
echo "��Ŀ&nbsp;&nbsp; <img src=\"/templates/";
echo Z_TPL;
echo "/images/3h.jpg\" alt=\"\" align=\"absmiddle\"></span></td>\r\n                        ";
if ( $action == "editplan" )
{
		echo "                        <td width=\"200\"  align=\"left\" bgcolor=\"#E4E4E4\" >&nbsp;&nbsp;\r\n                          <sapn style=\"font-size:13px;\"><strong>";
		echo $plan['planname']."(#".$plan['planid'].")";
		echo "</strong></sapn></td>\r\n                        <td width=\"15\" ><img src=\"/templates/";
		echo Z_TPL;
		echo "/images/3b.jpg\" alt=\"\" align=\"absmiddle\" /></td>\r\n                        <td >&nbsp;</td>\r\n                        ";
}
else
{
		echo "                        <td width=\"90\" align=\"right\" bgcolor=\"#E4E4E4\" ><span style=\"\">�������&nbsp;&nbsp; <img src=\"/templates/";
		echo Z_TPL;
		echo "/images/3b.jpg\" alt=\"\" align=\"absmiddle\" /></span></td>\r\n                        <td >&nbsp;</td>\r\n                        ";
}
echo "                      </tr>\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/bulb.gif\" width=\"19\" height=\"19\" /> <strong>��ʾ��</strong> �����Ŀ������֯Ҫ�����Ĳ�Ʒ��档ͬһ�����Ŀ�е����й���ʹ����ͬ�ĵ��ۡ�ÿ��Ԥ�㡢����λ��ʱ�䶨λ���������� ��</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"20\">&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"cpt\">����</td>\r\n                </tr>\r\n                <tr>\r\n                  <td><table width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td>&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">���ڹ����</td>\r\n                        <td><select name=\"uid\" id=\"uid\" onchange=\"SetUmoney(this.options[this.selectedIndex].text)\" ";
if ( $action == "editplan" )
{
		echo "disabled='disabled'";
}
echo ">\r\n                            <option value=\"\">��ѡ��һ�������</option>\r\n                            ";
foreach ( ( array )$u as $u )
{
		echo "                            <option value=\"";
		echo $u['uid'];
		echo "\" ";
		if ( $plan['uid'] == $u['uid'] || ( integer )$_GET['uid'] == $u['uid'] )
		{
				echo "selected";
		}
		echo ">";
		echo $u['username'];
		// echo "  ��";
		// echo round( $u['money'], 2 );
		echo " </option>\r\n                            ";
}
echo "                          </select>\r\n                          &nbsp;<span id=\"umoney\"></span><br />\r\n                          <span class=\"gray\">�ƻ�������һ������̡�</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td width=\"100\" valign=\"top\">�ƻ���Ŀ���� </td>\r\n                        <td><input name=\"planname\" type=\"text\" id=\"planname\" value=\"";
echo $plan['planname'];
echo "\" />\r\n                          <br />\r\n                          <span class=\"gray\">����д�����Ŀ���ơ�</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td>�Ʒ���ʽ</td>\r\n                        <td><select name=\"plantype\" id=\"plantype\"  ";
if ( $action == "editplan" )
{
		echo "disabled='disabled'";
}
echo "  onchange=\"Dodata()\">\r\n                            ";
foreach ( ( array )$plantype as $pt )
{
		echo "                            <option value=\"";
		echo $pt['plantype'];
		echo "\" ";
		if ( $plan['plantype'] == $pt['plantype'] )
		{
				echo "selected";
		}
		echo ">";
		echo strtoupper( $pt['plantype'] );
		echo " &nbsp;&nbsp;";
		echo $pt['name'];
		echo "</option>\r\n                            ";
}
echo "                          </select>\r\n                          <br />\r\n                          <span class=\"gray\">�ƻ�Ӧ������һ�ּƷ���ʽ��</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td>�������</td>\r\n                        <td><select name=\"top\" id=\"plantype\"  ";
// if ( $action == "editplan" )
// {
// 		echo "disabled='disabled'";
// }
echo " >\r\n                            ";
foreach ( ( array )$sitetype as $st )
{
		echo "                            <option value=\"";
		echo $st['sid'];
		echo "\" ";
		if ( $plan['top'] == $st['sid'] )
		{
				echo "selected";
		}
		echo ">";
		// echo strtoupper( $st['sitename'] );
		// echo " &nbsp;&nbsp;";
		echo $st['sitename'];
		echo "</option>\r\n                            ";
}
echo "                          </select>\r\n                          <br />\r\n                          <span class=\"gray\">�ƻ��еĹ���������ֹ�����͡�</span></td>\r\n                      </tr>\r\n<tr>\r\n                        <td>&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"cpt\">������Ԥ��</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><table width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td>&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td width=\"100\" height=\"40\" valign=\"top\">����̵���(arpuֵ)</td>\r\n                        <td>��\r\n                          <input name=\"priceadv\" type=\"text\" id=\"priceadv\" size=\"8\"  value=\"";
echo $plan['priceadv'] ? abs( $plan['priceadv'] ) : "";
echo "\"/>\r\n                          <span id='plan_p'>";
if ( $plan['plantype'] == "cps" )
{
		echo "%";
}
else
{
		echo "Ԫ";
}
echo "</span><br />\r\n                          <span class=\"gray\">ÿ/IP�����Ը��֧������߷��á�</span></td>\r\n                      </tr>\r\n <tr>\r\n                        <td width=\"100\" height=\"40\" valign=\"top\">ʵ�ʹ���̵���(ʵ��arpuֵ)</td>\r\n                        <td>��\r\n                          <input name=\"price\" type=\"text\" id=\"price\" size=\"8\"  value=\"";
echo $plan['price'] ? abs( $plan['price'] ) : "";
echo "\"/>\r\n                          <span id='plan_p'>";
if ( $plan['plantype'] == "cps" )
{
		echo "%";
}
else
{
		echo "Ԫ";
}
echo "</span><br />\r\n                          <span class=\"gray\">ÿ/IP�����ʵ��֧������߷��á�</span></td>\r\n                      </tr>\r\n                                           <tr>\r\n                        <td height=\"60\" valign=\"top\"><span class=\"t14b\">ÿ�յ������</span></td>\r\n                        <td>\r\n                          <input name=\"budget\" type=\"text\" id=\"budget\"  size=\"8\" value=\"";
echo $plan['budget'];
echo "\"/>\r\n                          ��<br />\r\n                          <span class=\"gray\">ÿ��Ԥ��������ķ��á�������ԣ��ڴﵽÿ��Ԥ���޶�ʱ�����Ĺ��ͻ��ڵ���ֹͣչʾ</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" valign=\"top\">�۸�˵��</td>\r\n                        <td><input name=\"priceinfo\" type=\"text\" id=\"priceinfo\"  value=\"";
echo $plan['priceinfo'];
echo "\" size=\"40\" maxlength=\"16\"/>\r\n                          <br />\r\n                          <span class=\"gray\">���ƷѼ�Ҫ˵����</span></td>\r\n                      </tr>\r\n                      \r\n</table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td  >&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"cpt\">��������������</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><table width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td>&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td width=\"100\" height=\"30\">��������</td>\r\n                        <td><input type=\"radio\" name=\"expire_date\" checked=\"checked\" value=\"0000-00-00\" onclick=\"expire(&quot;expire&quot;, true)\" ";
if ( $plan['expire'] == "0000-00-00" || !$plan )
{
		echo "checked";
}
echo "/>\r\n                          û����������</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input name=\"expire_date\" type=\"radio\"  onclick=\"expire(&quot;expire&quot;, false)\" value=\"no\" ";
if ( $plan['expire'] != "0000-00-00" && $plan )
{
		echo "checked";
}
echo "/>\r\n                          <select name=\"effective_year\" id=\"effective_year\" ";
if ( $plan['effective'] == "0000-00-00" || !$plan )
{
		// echo "disabled='disabled'";
}
echo ">\r\n                            ";
$effective = @explode( "-", $plan['effective'] );
$i = date( "Y" );
for ( ;	$i < date( "Y" ) + 21;	++$i	)
{
		echo "                            <option value=\"";
		echo $i;
		echo "\" ";
		if (  $effective[0] == $i )
		{
				echo "selected";
		}
		echo ">";
		echo $i;
		echo "��</option>\r\n                            ";
}
echo "                          </select>\r\n                          <select name=\"effective_month\" id=\"effective_month\" ";
if ( $plan['effective'] == "0000-00-00" || !$plan )
{
		// echo "disabled='disabled'";
}
echo ">\r\n                            ";
$i = 1;
for ( ;	$i < 13;	++$i	)
{
		echo "                            <option value=\"";
		echo $i;
		echo "\" ";
		if ( ($effective[1] == $i ))
		{
				echo "selected";
		}
		echo ">";
		echo $i;
		echo "��</option>\r\n                            ";
}
echo "                          </select>\r\n                          <select name=\"effective_day\" id=\"effective_day\" ";
if ( $plan['effective'] == "0000-00-00" || !$plan )
{
		// echo "disabled='disabled'";
}
echo ">\r\n                            ";
$i = 1;
for ( ;	$i < 32;	++$i	)
{
		echo "                            <option value=\"";
		echo $i;
		echo "\" ";
		if ( ($effective[2] == $i ))
		{
				echo "selected";
		}
		echo ">";
		echo $i;
		echo "��</option>\r\n                            ";
}
echo "                          </select>-------<select name=\"expire_year\" id=\"expire_year\" ";
if ( $plan['expire'] == "0000-00-00" || !$plan )
{
		echo "disabled='disabled'";
}
echo ">\r\n                            ";
$expire = @explode( "-", $plan['expire'] );
$i = date( "Y" );
for ( ;	$i < date( "Y" ) + 21;	++$i	)
{
		echo "                            <option value=\"";
		echo $i;
		echo "\" ";
		if ( $expire[0] == $i )
		{
				echo "selected";
		}
		echo ">";
		echo $i;
		echo "��</option>\r\n                            ";
}
echo "                          </select>\r\n                          <select name=\"expire_month\" id=\"expire_month\" ";
if ( $plan['expire'] == "0000-00-00" || !$plan )
{
		echo "disabled='disabled'";
}
echo ">\r\n                            ";
$i = 1;
for ( ;	$i < 13;	++$i	)
{
		echo "                            <option value=\"";
		echo $i;
		echo "\" ";
		if ( $expire[1] == $i )
		{
				echo "selected";
		}
		echo ">";
		echo $i;
		echo "��</option>\r\n                            ";
}
echo "                          </select>\r\n                          <select name=\"expire_day\" id=\"expire_day\" ";
if ( $plan['expire'] == "0000-00-00" || !$plan )
{
		echo "disabled='disabled'";
}
echo ">\r\n                            ";
$i = 1;
for ( ;	$i < 32;	++$i	)
{
		echo "                            <option value=\"";
		echo $i;
		echo "\" ";
		if ($expire[2] == $i )
		{
				echo "selected";
		}
		echo ">";
		echo $i;
		echo "��</option>\r\n                            ";
}
echo "                          </select>\r\n\t\t\t\t\t\t  \r\n                          <br />\r\n                          <div class=\"tips\" id=\"tip1\" style=\"display:none\">���Ĺ�������һ������չʾ��ֱ�����Ժ������һ���á�</div>\r\n                          <br /></td>\r\n                      </tr>\r\n                      <tr style='display: none'>\r\n                        <td height=\"30\" valign=\"top\">��Ա����</td>\r\n                        <td><input type=\"radio\" name=\"restrictions\" value=\"1\" onclick=\"\$i('resuids').style.display = 'none';\"   ";
if ( $plan['restrictions'] == "1" || !$plan )
{
		echo "checked";
}
echo "/>\r\n                          ������\r\n                          <input name=\"restrictions\" type=\"radio\" value=\"2\"  onclick=\"\$i('resuids').style.display = '';\"  ";
if ( $plan['restrictions'] == "2" )
{
		echo "checked";
}
echo "/>\r\n                          �������»�Ա\r\n                          <input name=\"restrictions\" type=\"radio\" value=\"3\"  onclick=\"\$i('resuids').style.display = '';\"  ";
if ( $plan['restrictions'] == "3" )
{
		echo "checked";
}
echo "/>\r\n                          �������»�Ա<br />\r\n                          <span class=\"gray\">�����εĻ�Ա�޷�Ͷ�ŵ�ǰ�ƻ���Ŀ�µ����й�棬����б���Ҳ�ǲ��ɼ��ġ�</span></td>\r\n                      </tr>\r\n                      <tr id=\"resuids\"   ";
if ( $plan['restrictions'] == "1" || !$plan )
{
		echo "style='display:none'";
}
echo ">\r\n                        <td height=\"30\" valign=\"top\">���ƵĻ�ԱID</td>\r\n                        <td><textarea name=\"resuid\" id=\"resuid\" style=\"width:380px\">";
echo $plan['resuid'];
echo "</textarea>\r\n                          <br />\r\n                          <span class=\"gray\">��ID���Ƹ�ʽ��,�����Ÿ������磺1000,1100,����س����С�</span></td>\r\n                      </tr>\r\n\t\t\t\t\t  \r\n\t\t\t\t\t   <tr>\r\n                        <td height=\"30\" valign=\"top\">��վ����</td>\r\n                        <td><input type=\"radio\" name=\"sitelimit\" value=\"1\" onclick=\"\$i('limitsiteids').style.display = 'none';\"   ";
if ( $plan['sitelimit'] == "1" || !$plan )
{
		echo "checked";
}
echo "/>\r\n                          ������\r\n                          <input name=\"sitelimit\" type=\"radio\" value=\"2\"  onclick=\"\$i('limitsiteids').style.display = '';\"  ";
if ( $plan['sitelimit'] == "2" )
{
		echo "checked";
}
echo "/>\r\n                          ����������վ\r\n                          <input name=\"sitelimit\" type=\"radio\" value=\"3\"  onclick=\"\$i('limitsiteids').style.display = '';\"  ";
if ( $plan['sitelimit'] == "3" )
{
		echo "checked";
}
echo "/>\r\n                          ����������վ<br />\r\n                          <span class=\"gray\">�����ε���վ�޷�Ͷ�ŵ�ǰ�ƻ���Ŀ�µ����й�档</span></td>\r\n                      </tr>\r\n                      <tr id=\"limitsiteids\"   ";
if ( $plan['sitelimit'] == "1" || !$plan )
{
		echo "style='display:none'";
}
echo ">\r\n                        <td height=\"30\" valign=\"top\">���Ƶ���վ����</td>\r\n                        <td><textarea name=\"limitsiteid\" id=\"limitsiteid\" style=\"width:380px\">";
echo $plan['limitsiteid'];
echo "</textarea>\r\n                          <br />\r\n                          <span class=\"gray\">���������Ƹ�ʽ��,�����Ÿ������磺didi,baidu,����س����С�</span></td>\r\n                      </tr>\r\n\t\t\t\t\t  \r\n                      <!--<tr >\r\n                        <td height=\"30\" valign=\"top\">��������</td>\r\n                        <td><input type=\"radio\" name=\"in_site\" value=\"0\"  ";
if ( $plan['in_site'] == "0" || !$plan )
{
		echo "checked";
}
echo "/>\r\n                        Ĭ��\r\n                          <input type=\"radio\" name=\"in_site\" value=\"1\"  ";
if ( $plan['in_site'] == "1" )
{
		echo "checked";
}
echo "/>\r\n����\r\n<input type=\"radio\" name=\"in_site\" value=\"2\"  ";
if ( $plan['in_site'] == "2" )
{
		echo "checked";
}
echo "/> \r\n������</td>\r\n                      </tr>-->\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                        <td align=\"center\"></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td>&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"cpt\">����λ������վ���͡�ʱ�䡢���ڶ���</td>\r\n                </tr>\r\n               \r\n                <tr >\r\n                  <td height=\"50\"><table width=\"86%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td>&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td width=\"120\" height=\"30\" align=\"center\">λ�� <a href=\"?action=faq&width=250&type=createplan&typeval=aclcity\" class=\"jTip\" id=\"aclcityhelp\"  name=\"����λ�ö�λ\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td>��ϣ���������Щ����λ��չʾ��</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input id=\"acl[1][isacl]\" class='aclcity' onclick=\"showtype('2','n');\$i('aclcity_c').style.display = 'none'\" type=\"radio\"   value=\"all\" name=\"acl[1][isacl]\" ";
if ( !$aclcity )
{
		echo " checked";
}
echo "/>\r\n                          �����еط���ʾ<br />\r\n                          <input id=\"acl[1][isacl]\" onclick=\"showtype('2','y');\$i('aclcity_c').style.display = ''\" type=\"radio\" value=\"acls\" name=\"acl[1][isacl]\"  ";
if ( $aclcity )
{
		echo " checked";
}
echo "/>\r\n                          ָ������\r\n                          <div id=\"aclcity_c\" ";
if ( !$aclcity )
{
		echo "style=\"display:none;margin-top:3px\"";
}
echo ">����Ҫ��<br />\r\n                            <input id=\"radio\"  type=\"radio\"  value=\"==\" name=\"acl[1][comparison]\" ";
if ( $citycom == "==" || $citycom == "" || !$plan )
{
		echo " checked";
}
echo "/>\r\n                            ����\r\n                            <input id=\"radio\"  type=\"radio\" value=\"!=\" name=\"acl[1][comparison]\" ";
if ( $citycom == "!=" )
{
		echo " checked";
}
echo "/>\r\n                            �ܾ�\r\n                            <div class=\"tips\">������վ�ǵ����Եģ�ѡ��ָ��������ʾ���������ڹ��Ч����</div>\r\n                          </div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\"></td>\r\n                        <td><table width=\"550\" height=\"200\" id=\"s2\"   ";
if ( !$aclcity )
{
		echo "style=\"display:none\"";
}
echo ">\r\n                            <tr>\r\n                              <td width=\"200\" height=\"100\"><table width=\"580\" align=\"center\">\r\n                                  <tr>\r\n                                    <td width=\"220\"><span class=\"create-city_s1\"> <span class=\"create-city_s2\" >\r\n                                      <script language=\"JavaScript\" type=\"text/javascript\">\r\ndocument.write('<select id=\"city_more\" class=\"create-city_select\" name=\"city_more\" size=\"12\">');\r\n\tfor(k=1;k<where.length;k++) {\r\n\t\t document.write('<optgroup label=\"'+where[k].loca+'\" >');\r\n\t\tloca3 = (where[k].locacity).split(\"|\");\r\n\t\tfor(l=1;l<loca3.length;l++) { \r\n\t\tdocument.write('<option value=\"'+loca3[l]+'\">'+loca3[l]+'</option>');\r\n\t}\r\n}\r\ndocument.write('</select>');\r\n                    </script>\r\n                                      </span> </span></td>\r\n                                    <td width=\"100\" align=\"center\"><img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/addcity.gif\" onclick=\"add()\" style=\"cursor: pointer;\" />\r\n                                      <div style=\"height:80px\"></div>\r\n                                      <img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/removecity.gif\" onclick=\"remove()\" style=\"cursor: pointer;\" /></td>\r\n                                    <td><span class=\"create-city_s1\"> <span class=\"create-city_s2\">\r\n                                      <input type='hidden' name='acl[1][type]' value='city' />\r\n                                      <input value=\"";
echo $citydata;
echo "\" name=\"acl[1][data][]\" id=\"adcitystr\" type=\"hidden\" />\r\n                                      <select id=\"city_choose\" name=\"city_choose\" size=\"12\" class=\"create-city_select\">\r\n                                        ";
foreach ( ( array )$cityarr as $cityarr )
{
		echo "                                        <option value=\"";
		echo $cityarr;
		echo "\">";
		echo $cityarr;
		echo "</option>\r\n                                        ";
}
echo "                                      </select>\r\n                                      </span> </span></td>\r\n                                  </tr>\r\n                                </table></td>\r\n                            </tr>\r\n                          </table></td>\r\n                      </tr>\r\n                                           <tr style='display:none'>\r\n                        <td height=\"30\" align=\"center\">���� <a href=\"?action=faq&width=250&type=createplan&typeval=aclwebtype\" class=\"jTip\" id=\"aclwebtypehelp\"  name=\"��վ���Ͷ�λ\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td>��ϣ���������Щ��վ����չʾ��</td>\r\n                      </tr>\r\n                      <tr style='display:none'>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input id=\"acl[0][isacl]\" onclick=\"showtype('1','n');\$i('webtype_c').style.display = 'none'\" type=\"radio\"   value=\"all\" name=\"acl[0][isacl]\" class='aclwebtype' ";
if ( !$webtype )
{
		echo " checked";
}
echo "/>\r\n                          ��������ĿͶ��<br />\r\n                          <input id=\"acl[0][isacl]\" onclick=\"showtype('1','y');\$i('webtype_c').style.display = ''\" type=\"radio\" value=\"acls\" name=\"acl[0][isacl]\" class='aclwebtype' ";
if ( $webtype )
{
		echo " checked";
}
echo "/>\r\n                          ��ָ����Ŀ����վͶ��\r\n                          <div id=\"webtype_c\" ";
if ( !$webtype )
{
		echo "style=\"display:none;margin-top:3px\"";
}
echo ">����Ҫ��<br />\r\n                            <input id=\"radio\"  type=\"radio\"   value=\"==\" name=\"acl[0][comparison]\" ";
if ( $webtypecom == "==" || $webtypecom == "" || !$plan )
{
		echo " checked";
}
echo "/>\r\n                            ����\r\n                            <input id=\"radio\"  type=\"radio\" value=\"!=\" name=\"acl[0][comparison]\" ";
if ( $webtypecom == "!=" )
{
		echo " checked";
}
echo "/>\r\n                            �ܾ�\r\n                            <div class=\"tips\">ѡ��������ĿͶ�ţ�ϵͳ����Ϊ���Զ��Ż�ѡ����վͶ�����Ĺ�棬����Ϊָ����Ŀ��</div>\r\n                          </div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td   align=\"center\"></td>\r\n                        <td><div style=\"position:relative;z-index:100; width:100%;\" onmouseover=\"os(event)\" onmouseout=\"oe(event)\">\r\n                            <input type='hidden' name='acl[0][type]' value='webtype' />\r\n                            \r\n                            <table width=\"100%\"  id=\"s1\"   class=\"tp\" ";
if ( !$webtype )
{
		echo "style=\"display:none\"";
}
echo ">\r\n                              <tr> \r\n\t\t\t\t\t\t\t\t";
$i = 1;
foreach ( $sitetype as $s )
{
		echo "<td><input type=\"checkbox\" name=\"acl[0][data][]\" id=\"aclsitetype\" value=\"".$s['sid']."\"";
		echo "\t\t\t\t\t\t\t\t\t";
		if ( is_array( $webtype ) && in_array( $s['sid'], $webtype ) )
		{
				echo " checked";
		}
		echo " class=\"aclwebtypeval\"/>".$s['sitename']."</td>";
		if ( $i % 6 == 0 )
		{
				echo "</tr>";
		}
		++$i;
}
echo "                              </tr>\r\n                            </table>                           </td>\r\n                      </tr>\r\n                      <tr style='display: none'>\r\n                        <td height=\"30\" align=\"center\">ʱ�� <a href=\"?action=faq&width=250&type=createplan&typeval=acltimetype\" class=\"jTip\" id=\"acltimetypehelp\"  name=\"ʱ�䶨λ\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td>��ϣ������ڼ�ʱչʾ��</td>\r\n                      </tr>\r\n                      <tr style='display: none'>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input id=\"acl[2][isacl]\" onclick=\"showtype('3','n');\$i('time_c').style.display = 'none'\" type=\"radio\"   value=\"all\" name=\"acl[2][isacl]\"  class=\"acltime\" ";
if ( !$acltime )
{
		echo " checked";
}
echo "/>\r\n                          ȫ��Ͷ��<br />\r\n                          <input id=\"acl[2][isacl]\" onclick=\"showtype('3','y');\$i('time_c').style.display = ''\" type=\"radio\" value=\"acls\" name=\"acl[2][isacl]\" class=\"acltime\" ";
if ( $acltime )
{
		echo " checked";
}
echo "/>\r\n                          ��ָ����ʱ��Ͷ��\r\n                          <div class=\"tips\" id=\"time_c\"  ";
if ( !$acltime )
{
		echo "style=\"display:none;margin-top:3px\"";
}
echo ">��ָ����ʱ��Ͷ�ţ�ϵͳ����Ϊ���ڹ涨��ʱ����ʾ��档</div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\"></td>\r\n                        <td><input type='hidden' name='acl[2][type]' value='time' />\r\n                          <table width='100%' cellpadding='0' cellspacing='0' border='0'  id='s3' class=\"tp\" ";
if ( !$acltime )
{
		echo "style=\"display:none;margin-top:10px\"";
}
echo ">\r\n                            ";
$n = 0;
$i = 0;
for ( ;	$i < 6;	++$i	)
{
		echo "                            <tr>\r\n                              ";
		$j = 0;
		for ( ;	$j < 4;	++$j	)
		{
				echo "                              <td><input type='checkbox' name='acl[2][data][]' value='";
				echo $n;
				echo "' ";
				if ( is_array( $timedata ) )
				{
						if ( in_array( $n, $timedata ) )
						{
								echo " checked";
						}
				}
				else
				{
						echo " checked";
				}
				echo "   class=\"acltimeval\"/>\r\n                                &nbsp;";
				echo $n;
				echo ":00-";
				echo $n;
				echo ":59&nbsp;&nbsp;</td>\r\n                              ";
				++$n;
		}
		echo "                            </tr>\r\n                            ";
}
echo "                          </table></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\" align=\"center\"></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr style='display: none'>\r\n                        <td height=\"30\" align=\"center\">һ�� <a href=\"?action=faq&width=250&type=createplan&typeval=aclweekdaytype\" class=\"jTip\" id=\"aclweekdaytypehelp\"  name=\"���ڶ�λ\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td>��ϣ��һ�����ڼ�չʾ��棿</td>\r\n                      </tr>\r\n                      <tr style='display: none'>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input id=\"acl[3][isacl]\" onclick=\"showtype('4','n');\$i('weekday_c').style.display = 'none'\" type=\"radio\"   value=\"all\" name=\"acl[3][isacl]\"  class=\"aclweekday\" ";
if ( !$aclweekday )
{
		echo " checked";
}
echo "/>\r\n                          ȫ����Ͷ��<br />\r\n                          <input id=\"acl[3][isacl]\" onclick=\"showtype('4','y');\$i('weekday_c').style.display = ''\" type=\"radio\" value=\"acls\" name=\"acl[3][isacl]\" class=\"aclweekday\" ";
if ( $aclweekday )
{
		echo " checked";
}
echo "/>\r\n                          ��ָ��������Ͷ��\r\n                          <div class=\"tips\" id=\"weekday_c\"  ";
if ( !$aclweekday )
{
		echo "style=\"display:none;margin-top:3px\"";
}
echo ">��ָ����һ�����ڼ���ʾ��档</div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input type='hidden' name='acl[3][type]' value='weekday' />\r\n                          <table width='100%' cellpadding='0' cellspacing='0' border='0'  id='s4' class=\"tp\" ";
if ( !$aclweekday )
{
		echo "style=\"display:none;margin-top:3px\"";
}
echo ">\r\n                            ";
$i = 0;
for ( ;	$i < 7;	++$i	)
{
		if ( $i % 4 == 0 )
		{
				echo "<tr>";
		}
		echo "<td><input type='checkbox'  name='acl[3][data][]' value='";
		echo $i;
		echo "' class='aclweekdayval'                            ";
		if ( is_array( $weekdaydata ) )
		{
				if ( in_array( $i, $weekdaydata ) )
				{
						echo " checked";
				}
		}
		else
		{
				echo " checked";
		}
		echo ">&nbsp;��".isweekday( $i )."&nbsp;&nbsp;</td>";
		if ( ( $i + 1 ) % 4 == 0 )
		{
				echo "</tr>";
		}
}
if ( ( $i + 1 ) % 4 != 0 )
{
		echo "</tr>";
}
//��ʼ

echo "                          </table></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\" align=\"center\"></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr >\r\n                        <td height=\"30\" align=\"center\">ƽ̨<a href=\"?action=faq&width=250&type=createplan&typeval=aclpttype\" class=\"jTip\" id=\"aclpttypehelp\"  name=\"���ڶ�λ\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td>��ϣ�����Ǹ�ƽ̨չʾ��棿</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input id=\"acl[4][isacl]\" onclick=\"showtype('5','n');\$i('pt_c').style.display = 'none'\" type=\"radio\"   value=\"all\" name=\"acl[4][isacl]\"  class=\"aclpt\" ";
if ( !$aclpt )
{
    echo " checked";
}
echo "/>\r\n                          ȫƽ̨Ͷ��<br />\r\n                          <input id=\"acl[4][isacl]\" onclick=\"showtype('5','y');\$i('pt_c').style.display = ''\" type=\"radio\" value=\"acls\" name=\"acl[4][isacl]\" class=\"aclpt\" ";
if ( $aclpt )
{
    echo " checked";
}
echo "/>\r\n                          ��ָ����ƽ̨Ͷ��\r\n                          <div class=\"tips\" id=\"pt_c\"  ";
if ( !$aclpt )
{
    echo "style=\"display:none;margin-top:3px\"";
}
echo ">��ָ����ƽ̨��ʾ��档</div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input type='hidden' name='acl[4][type]' value='pt' />\r\n                          <table width='100%' cellpadding='0' cellspacing='0' border='0'  id='s4' class=\"tp\" ";
if ( !$aclpt )
{
    echo "style=\"margin-top:3px\"";
}
echo ">\r\n                            ";
echo "
<tr>
                            <td height='30' align='center'></td>
                            <td><input type='hidden' name='acl[4][type]' value='pt' />
                                <table width='100%' cellpadding='0' cellspacing='0' border='0'  id='s5' class='tp'";
if ( !$aclpt )
{
	echo " style='display:none;margin-top:3px'";
}
	echo ">
<td><input type='radio'  name='acl[4][data][]' value='ƻ��' class='aclptval'";

echo "checked>ƻ��</td>
<td><input type='radio'  name='acl[4][data][]' value='��׿' class='aclptval'";
if($ptdata[0]=='��׿'){echo 'checked';}
echo ">��׿</td>
</table></td>
</tr>";
//����

echo "                          </table></td>\r\n                      </tr>\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><input type=\"submit\" name=\"Submit\" class=\"form-submit\" value=\" �� �� \" />\r\n\t\t\t\t  ";
if ( $action != "editplan" )
{
		echo "                    <input name=\"status\" type=\"checkbox\" id=\"status\" value=\"1\" checked=\"checked\" />\r\n                    ֱ�����ͨ��\r\n\t\t\t\t  ";
}
echo "\t\t\t\t\t</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\">&nbsp;</td>\r\n                </tr>\r\n              </table>\r\n            </form></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\" src=\"/javascript/plan.js\"></script>\r\n<script  type=\"text/javascript\">\r\nvar cpc_minprice=";
echo $GLOBALS['C_ZYIIS']['cpcmin_price'];
echo ";\r\nvar cpm_minprice=";
echo $GLOBALS['C_ZYIIS']['cpmmin_price'];
echo ";\r\nvar cpv_minprice=";
echo $GLOBALS['C_ZYIIS']['cpvmin_price'];
echo ";\r\nvar cpa_minprice=";
echo $GLOBALS['C_ZYIIS']['cpamin_price'];
echo ";\r\nvar cps_minprice=";
echo $GLOBALS['C_ZYIIS']['cpsmin_price'];
echo ";\r\nfunction post_submit(){\r\n\tvar create = \$i('create');\r\n\tvar uid = get_Select_Value(\$i(\"uid\"));\r\n\tvar datatime = get_radio_value(\$n(\"datatime\"));\r\n\tvar gradeprice = get_radio_value(\$n(\"gradeprice\"));\r\n\tvar serverip  = \$i('serverip').value;\r\n\tvar plantype = \$(\"#plantype\").val();\r\n\tvar priceadv =  create.priceadv.value;\r\n\tif(isNULL(uid)){\r\n        \talert(\"��ѡ��һ�������\");\r\n\t\t\treturn false;\r\n     }\r\n\tif(create.planname.value==\"\" ){\r\n\t\talert(\"����д�����Ŀ�� \");\r\n\t\tcreate.planname.focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(datatime==0 && serverip=='' && (plantype=='cpa' || plantype=='cps' )){\r\n\t\talert(\"ʱʵ���ݷ��ؽӿ���֤IP����Ϊ�գ� \");\r\n\t\tcreate.serverip.focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(create.priceadv.value<=0){\r\n\t\talert(\"����̵ĵ��۲���С��0�� \");\r\n\t\tcreate.priceadv.focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(!checkPrice(create.priceadv.value)){\r\n\t\tcreate.priceadv.focus();\r\n\t\treturn false;\r\n\t}\t\r\n\tif(gradeprice==1) {\r\n\t\tif(create.s0price.value<=0 ){\r\n\t\t\talert(\"0�Ǽ��ĵ��۲���С��0�� \");\r\n\t\t\tcreate.s0price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(create.s0price.value)){\r\n\t\t\tcreate.s0price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s0price.value>priceadv)\r\n\t\t{\r\n\t\t\talert(\"0�Ǽ��ĵ��۲��ܴ��ڹ�����ļ۸�\");\r\n\t\t\t\$i('s0price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s1price.value<=0 ){\r\n\t\t\talert(\"1�Ǽ��ĵ��۲���С��0�� \");\r\n\t\t\tcreate.s1price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(create.s1price.value)){\r\n\t\t\tcreate.s1price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s1price.value>priceadv)\r\n\t\t{\r\n\t\t\talert(\"1�Ǽ��ĵ��۲��ܴ��ڹ�����ļ۸�\");\r\n\t\t\t\$i('s1price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s2price.value<=0 ){\r\n\t\t\talert(\"2�Ǽ��ĵ��۲���С��0�� \");\r\n\t\t\tcreate.s2price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(create.s2price.value)){\r\n\t\t\tcreate.s2price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s2price.value>priceadv)\r\n\t\t{\r\n\t\t\talert(\"2�Ǽ��ĵ��۲��ܴ��ڹ�����ļ۸�\");\r\n\t\t\t\$i('s2price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s3price.value<=0 ){\r\n\t\t\talert(\"3�Ǽ��ĵ��۲���С��0�� \");\r\n\t\t\tcreate.s3price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(create.s3price.value)){\r\n\t\t\tcreate.s3price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s3price.value>priceadv)\r\n\t\t{\r\n\t\t\talert(\"3�Ǽ��ĵ��۲��ܴ��ڹ�����ļ۸�\");\r\n\t\t\t\$i('s3price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\r\n\t}else {\r\n\t\tif(create.price.value<=0 ){\r\n\t\t\talert(\"��վ���ĵ��۲���С��0�� \");\r\n\t\t\tcreate.price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.price.value-0>priceadv-0)\r\n\t\t{\r\n\t\t\talert(\"���۲��ܴ��ڹ�����ļ۸�\");\r\n\t\t\t\$i('price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(create.price.value)){\r\n\t\t\tcreate.price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\t\r\n\tif(!checkBudget(create.budget.value)){\r\n\t\tcreate.budget.focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n\tif(!checkBudget(create.budget.value)){\r\n\t\tcreate.budget.focus();\r\n\t\treturn false;\r\n\r\n\t}\r\n\r\n\tif( parseInt(create.deduction.value)<=parseInt(create.dosage.value) && create.dosage.value>0){\r\n\t\talert(\"��Ŀ������ֵ��Ҫ������Ŀ������ֵ��\");\r\n\t\t\$i('dosage').focus();\r\n\t\treturn false;\r\n\t}\r\n\t\tif(\$('.aclwebtypeval[@checked]').val() === null && \$('.aclwebtype[@checked]').val() != 'all'){\r\n\t\talert(\"������Ҫѡ��һ����վ���ͣ�\");\r\n\t\treturn false;\r\n\t}\r\n\tif(\$i('adcitystr').value == '' && \$('.aclcity[@checked]').val() != 'all'){\r\n\t\talert(\"������Ҫѡ��һ������\");\r\n\t\treturn false;\r\n\t}\r\n\tif(\$('.acltimeval[@checked]').val() === null && \$('.acltime[@checked]').val() != 'all'){\r\n\t\talert(\"������Ҫѡ��һ��ʱ�䣡\");\r\n\t\treturn false;\r\n\t}\r\n\tif(\$('.aclweekdayval[@checked]').val() === null && \$('.aclweekday[@checked]').val() != 'all'){\r\n\t\talert(\"������Ҫѡ��һ��ʱ�䣡\");\r\n\t\treturn false;\r\n\t}\r\n\t//return false\r\n}\r\n\r\nfunction checkPrice(str){\r\n    minprice = \$i('minprice').value;\r\n\tvar i;\t\r\n\tfor(i=0;i<str.length;i++)  {\r\n\t   if ((str.charAt(i)<\"0\" || str.charAt(i)>\"9\")&& str.charAt(i) != '.'){\r\n\t\t\talert(\"���μ۸�:ֻ������0--9֮�������,�����пո�\");\r\n\t\t\treturn false;\r\n\t   }\r\n\t}\r\n\tif(str>parseFloat(100) ){\r\n\t   alert(\"���μ۸�:���ܴ���100Ԫ��\");\r\n\t   return false;\r\n\t}\r\n\tif(str<0){\r\n\t\talert(\"���μ۸�:����С��0��\\n\");\r\n\t\treturn false;\r\n\t}\r\n\tvar re = /([0-9]+\\.[0-9]{4})[0-9]*/;\r\n    aNew = str.replace(re,\"\$1\");\r\n    if(str.length>aNew.length){\r\n\t   str=aNew;\r\n\t   alert(\"���μ۸�:С�����λ�����ܳ���4λ,���飡\");\r\n\t   return false;\r\n\t}\r\n\treturn true;\r\n}\r\n\r\nfunction checkBudget(str){\r\n    \r\n\tvar i;\t\r\n\tif(str==\"\" ){\r\n\t\talert(\"����дÿ��Ԥ�㣡\\n\");\r\n\t\treturn false;\r\n\t}\r\n\tfor(i=0;i<str.length;i++)  {\r\n\t   if ((str.charAt(i)<\"0\" || str.charAt(i)>\"9\")&& str.charAt(i) != '.'){\r\n\t\t\talert(\"ÿ��Ԥ��:ֻ������0--9֮�������,�����пո�\");\r\n\t\t\treturn false;\r\n\t   }\r\n\t}\r\n\tif(str<parseFloat(";
echo $GLOBALS['C_ZYIIS']['min_budeget'];
echo ")){\r\n\t\talert(\"ÿ���޶�:����С��";
echo $GLOBALS['C_ZYIIS']['min_budeget'];
echo "��\\n\");\r\n\t\treturn false;\r\n\t}\r\n\t\r\n\treturn true;\r\n}\r\nfunction doPay(){\r\n\tvar m = \$i('imoney').value;\r\n\tif(isNULL(m)){\r\n        \talert(\"����д��ֵ���\");\r\n\t\t\t\$i('imoney').focus();\r\n\t\t\treturn false;\r\n     }\r\n\t if(m<";
echo $GLOBALS['C_ZYIIS']['min_pay'];
echo "){\r\n        \talert(\"��ֵ����С��";
echo $GLOBALS['C_ZYIIS']['min_pay'];
echo "Ԫ\");\r\n\t\t\t\$i('imoney').focus();\r\n\t\t\treturn false;\r\n     }\r\n\tdocument.forms[\"pays\"].submit();\t\t\r\n}\r\nfunction Dodata(){\r\n    var _p = 'Ԫ';\r\n\tvar plantype = \$(\"#plantype\").val();\r\n\t\$(\"#datadatev\").hide();\r\n\t\r\n\tif(plantype=='cpa' || plantype=='cps'  ){\r\n\t\t\$(\"#datadatev\").show();\r\n\t}else {\r\n\t\t\$(\"#serveripids\").hide();\r\n\t}\r\n\tif(plantype=='cps') _p='%';\r\n\t\$i('plan_p').innerHTML = _p;\r\n}\r\nfunction SetUmoney(v){\r\n\tif(v){\r\n\t\tv = v.split('��');\r\n\t\tif(v[1]<100){\r\n\t\t\tif(!confirm('��ǰ����̵�������100Ԫ\\nȷ��ô��\\n�����ȡ���������ֵ?')){\r\n\t\t\t\tsetTimeout(\"tb_show('���߳�ֵ','do.php?action=onlinepay&actiontype=add&username=\"+jsTrim(v[0])+\"&type=2=&TB_iframe=true&height=260&width=600')\",500);\r\n\t\t\t}\r\n\t\t}\r\n\t}\r\n}\r\nfunction sPrice(t){\r\n\tif(t==1) {\r\n\t\t\$(\"#s0_price\").show();\r\n\t\t\$(\"#s1_price\").show();\r\n\t\t\$(\"#s2_price\").show();\r\n\t\t\$(\"#s3_price\").show();\r\n\t\t\$(\"#s_price\").hide();\r\n\t}else {\r\n\t\t\$(\"#s0_price\").hide();\r\n\t\t\$(\"#s1_price\").hide();\r\n\t\t\$(\"#s2_price\").hide();\r\n\t\t\$(\"#s3_price\").hide();\r\n\t\t\$(\"#s_price\").show();\r\n\t}\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
