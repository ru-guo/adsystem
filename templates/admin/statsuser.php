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
echo "<script LANGUAGE=\"JavaScript\" src=\"/javascript/jiandate.js\"></script>\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n      <tr>\r\n        <td  valign=\"top\">";
if ( $statetype == "success" )
{
		echo "              <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"97%\" >\r\n                <tr>\r\n                  <td height=\"30\"><img  src='/templates/";
		echo Z_TPL;
		echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">�����ɹ���</span></td>\r\n                  <td>&nbsp;</td>\r\n                </tr>\r\n              </table>\r\n          <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n              ";
}
echo "              <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tr>\r\n                  <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tr>\r\n                        <td><ul id=\"li-type\">\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=";
echo DAYS."/".DAYS;
echo "\" ";
if ( 3 < strlen( $timerange ) )
{
		echo "class=\"li-active\"";
}
echo ">���ձ���</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=t\" ";
if ( $timerange == "t" )
{
		echo "class=\"li-active\"";
}
echo ">���ձ���</a> </li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=w\" ";
if ( $timerange == "w" )
{
		echo "class=\"li-active\"";
}
echo ">��ȥһ����</a> </li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=m\" ";
if ( $timerange == "m" )
{
		echo "class=\"li-active\"";
}
echo ">���±���</a> </li>\r\n\t\t\t\t\t\t  ";
if ( $actiontype == "search" && 3 < strlen( $timerange ) )
{
		echo "\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"javascript:void(0)\" class=\"li-active\">";
		echo $timerange;
		echo "</a> </li>\r\n\t\t\t\t\t\t  ";
}
echo "\t\t\t  \t\t\t\t <li>|</li>\r\n                          <li><a href=\"e.php?actiontype=dostatsuaz&searchtype=";
echo $searchtype;
echo "&searchval=";
echo $searchval;
echo "&timerange=";
echo $timerange;
echo "&planid=";
echo $planid;
echo "&plantype=";
echo $plantype;
echo "&type=user\"    title=\"�����ѯ���ٵ���\" ><img src=\"/templates/";
echo Z_TPL;
echo "/images/excel.jpg\" align=\"absmiddle\"  />����Excel</a> </li>\r\n                        </ul></td>\r\n                        <td width=\"500\" align=\"right\"></td>\r\n                      </tr>\r\n                  </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><select name=\"choosetype\" class=\"select\" id=\"choosetype\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>��������</option>\r\n                    <option value=\"del\">ɾ��</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                    &nbsp;\r\n                    &nbsp;\r\n                    <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n<input name=\"searchval\" type=\"text\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"12\"/>\r\n                                      &nbsp;\r\n                                      <select name=\"searchtype\" class=\"searchtype\" id=\"searchtype\">\r\n                                        <option value=\"1\" ";
if ( $searchtype == 1 )
{
		echo "selected";
}
echo " >��ԱID</option>\r\n                                        <option value=\"2\" ";
if ( $searchtype == 2 )
{
		echo "selected";
}
echo " >��ѯ����</option>\r\n                                      </select>\r\n<select name=\"sortingm\" class=\"select\" id=\"select\">\r\n                                        <option value=\"DESC\" ";
if ( $sortingm == "DESC" )
{
		echo "selected";
}
echo " >����</option>\r\n                                        <option value=\"ASC\" ";
if ( $sortingm == "ASC" )
{
		echo "selected";
}
echo " >����</option>\r\n                      </select>\r\n                                      <select name=\"sortingtype\" class=\"select\" id=\"select2\">\r\n\t\t\t\t\t\t\t\t\t   <option value=\"day\" ";
if ( $sortingtype == "day" )
{
		echo "selected";
}
echo ">����</option>\r\n                                        <option value=\"views\" ";
if ( $sortingtype == "views" )
{
		echo "selected";
}
echo ">�����</option>\r\n                                        <option value=\"num\" ";
if ( $sortingtype == "num" )
{
		echo "selected";
}
echo ">������</option>\r\n                                        <option value=\"deduction\" ";
if ( $sortingtype == "deduction" )
{
		echo "selected";
}
echo ">����</option>\r\n                                        <option value=\"clicks\" ";
if ( $sortingtype == "clicks" )
{
		echo "selected";
}
echo ">���ε��</option>\r\n                                        <option value=\"orders\" ";
if ( $sortingtype == "orders" )
{
		echo "selected";
}
echo ">Ч����</option>\r\n                                        <option value=\"sumpay\" ";
if ( $sortingtype == "sumpay" )
{
		echo "selected";
}
echo ">Ӧ�����</option>\r\n                                        <option value=\"sumprofit\" ";
if ( $sortingtype == "sumprofit" )
{
		echo "selected";
}
echo ">ӯ��</option>\r\n                      </select>\r\n                                      <select name=\"planid\" id=\"planid\">\r\n\t\t\t\t\t\t\t\t\t  <option value=\"\">���в�Ʒ</option>\r\n\t\t\t\t\t\t\t\t\t ";
foreach ( ( array )$plantypearr as $ptr )
{
		echo "\t\t\t\t\t\t\t\t\t  <optgroup  label=\"";
		echo ucfirst( $ptr['plantype'] );
		echo "\">\r\n\t\t\t\t\t\t\t\t\t\t";
		foreach ( ( array )$allplan as $pt )
		{
				if ( !( $pt['plantype'] !== $ptr['plantype'] ) )
				{
						echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
						echo $pt['planid'];
						echo "\" ";
						if ( $pt['planid'] == $planid )
						{
								echo "selected";
						}
						echo ">";
						echo $pt['planname'];
						echo "[";
						echo ucfirst( $pt['plantype'] );
						echo "]</option>\r\n\t\t\t\t\t\t\t\t\t\t";
				}
		}
		echo "\t\t\t\t\t\t\t\t\t\t </optgroup>\r\n\t\t\t\t\t\t\t\t\t\t";
}
echo "\t\t\t\t\t\t\t\t\t</select>\r\n                                      <select name=\"timerange\" id=\"timerange\" style=\"width:200px\">\r\n\t\t\t\t\t\t\t\t\t  <option value=\"";
if ( $time_begin == "" )
{
		echo DAYS;
}
else
{
		echo $time_begin;
}
echo " / ";
if ( $time_end == "" )
{
		echo DAYS;
}
else
{
		echo $time_end;
}
echo "\">";
if ( $time_begin == "" )
{
		echo DAYS;
}
else
{
		echo $time_begin;
}
echo " �� ";
if ( $time_end == "" )
{
		echo DAYS;
}
else
{
		echo $time_end;
}
echo "</option>\r\n\t\t\t\t\t\t\t\t\t  <option  value=\"a\" ";
echo $timerange == "a" ? "selected " : "";
echo ">����ʱ���</option>\r\n\t\t\t\t\t\t\t\t\t  <option value=\"t\" ";
echo $timerange == "t" ? " selected" : "";
echo " >����</option>\r\n\t\t\t\t\t\t\t\t\t  <option value=\"w\" ";
echo $timerange == "w" ? " selected" : "";
echo " >��ȥһ����</option>\r\n\t\t\t\t\t\t\t\t\t  <option value=\"m\" ";
echo $timerange == "m" ? " selected" : "";
echo ">������</option>\r\n\t\t\t\t\t\t\t\t\t  <option value=\"l\" ";
echo $timerange == "l" ? " selected" : "";
echo ">���µ�</option>\r\n\t\t\t\t\t\t\t\t\t</select> \r\n\t\t\t\t\t\t\t\t\t  <img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','2')\"/>\r\n\t\t\t\t\t\t\t\t\t  <input name=\"Submit\" type=\"submit\" class=\"submit-x\" id=\"Submit\" value=\"��ѯ\"/>\r\n                    </form>\t\t\t\t  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=del\">\r\n                      <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                        <tr class=\"td_b_2\">\r\n                          <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                          <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'id')\" /></td>\r\n                          <td width=\"100\">��Ա����</td>\r\n                          <td width=\"75\">��ԱID</td>\r\n                          <td width=\"65\">�����</td>\r\n                          <td width=\"65\">������</td>\r\n                          <td width=\"65\">�����</td>\r\n                          <td width=\"65\">����</td>\r\n                          <td width=\"75\">���ε��</td>\r\n                          <td width=\"75\">Ч����</td>\r\n                          <td width=\"60\">CTR</td>\r\n                          <td width=\"80\">Ӧ�����</td>\r\n                          <td>ӯ��</td>\r\n                          <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                        </tr>\r\n \r\n\t\t\t\t\t    ";
if ( !$stats )
{
		echo "<tr><td height=\"60\"   class=\"td_b_4 \" id=\"b-bottom\" >&nbsp;</td>\r\n\t\t\t\t\t\t\t\t  <td colspan=\"12\" align=\"center\">�ޱ���</td>\r\n\t\t\t\t\t\t\t\t  <td  class=\"td_b_5\">&nbsp;</td>\r\n\t\t\t\t\t\t\t\t</tr>";
}
foreach ( ( array )$stats as $s )
{
		$u = $usermodel->getusersuidrow( $s['uid'] );
		echo "\t\t\t\t\t\r\n                        <tr onmouseover=\"\$('#s_";
		echo $s['uid'];
		echo "').show()\" onmouseout=\"\$('#s_";
		echo $s['uid'];
		echo "').hide()\">\r\n                          <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                          <td  ><input name=\"id[]\" type=\"checkbox\" id=\"id[]\" value=\"";
		echo $s['day']."/".$s['uid'];
		echo "\" /></td>\r\n                          <td><a href=\"do.php?action=affiliate&actiontype=search&searchval=";
		echo $s['uid'];
		echo "&searchtype=2\">";
		echo $u['username'] == "" ? "��ɾ���Ļ�Ա" : $u['username'];
		echo "</a></td>\r\n                          <td>#";
		echo $s['uid'];
		echo "</td>\r\n                          <td>";
		echo $s['views'];
		echo "</td>\r\n                          <td>";
		echo $s['num'];
		echo "</td>\r\n                          <td>";
		echo $s['clicks'];
		echo "</td>\r\n                          <td>";
		echo abs( $s['deduction'] );
		echo "</td>\r\n                          <td>";
		echo $s['do2click'];
		echo "</td>\r\n                          <td>";
		echo $s['orders'];
		echo "</td>\r\n                          <td>";
		echo ctr( $s['views'], $s['num'] + $s['deduction'] );
		echo "</td>\r\n                          <td>��";
		echo $s['sumpay'];
		echo "</td>\r\n                          <td>��";
		echo $s['sumprofit'];
		echo "</td>\r\n                          <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                        </tr>\r\n\t\t\t\t\t ";
		if ( $searchtype != 2 )
		{
				echo "                     <tr  onmouseover=\"\$('#s_";
				echo $s['uid'].$s['day'];
				echo "').show()\" onmouseout=\"\$('#s_";
				echo $s['uid'].$s['day'];
				echo "').hide()\"  class=\"td_b_m\">\r\n                           <td height=\"30\"   class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                           <td>&nbsp;</td>\r\n                           <td align=\"center\"><img  src='/templates/";
				echo Z_TPL;
				echo "/images/date.png' align='absmiddle' /> ";
				echo $s['day'];
				echo "</td>\r\n                           <td colspan=\"10\"><span style=\"display:none\" id=\"s_";
				echo $s['uid'].$s['day'];
				echo "\"><a href=\"do.php?action=statsads&timerange=";
				echo $s['day'];
				echo "/";
				echo $s['day'];
				echo "&actiontype=search&searchval=";
				echo $s['uid'];
				echo "&searchtype=2\">Ͷ�Ź��</a>&nbsp;|&nbsp;<a href=\"do.php?action=statszone&actiontype=search&timerange=";
				echo $s['day'];
				echo "/";
				echo $s['day'];
				echo "&searchval=";
				echo $s['uid'];
				echo "&searchtype=3\">Ͷ�Ź��λ</a>&nbsp;|&nbsp;<a href=\"do.php?action=adsip&timerange=";
				echo $s['day'];
				echo "&actiontype=search&searchval=";
				echo $s['uid'];
				echo "&searchtype=1\">�ÿ�IP</a>&nbsp;|&nbsp;<a href=\"do.php?action=trend&actiontype=dayadnweek&searchtype=2&searchval=";
				echo $s['uid'];
				echo "&timerange=";
				echo $s['day']."/".$s['day'];
				echo "&TB_iframe=true&height=300&width=700\"  title=\"��";
				echo $u['username']." ".$s['day'];
				echo "����24Сʱ����ͼ\"   class=\"thickbox\" >[";
				echo $s['day'];
				echo "]&nbsp;24Сʱ����ͼ</a> &nbsp;|&nbsp;<a href=\"do.php?action=trend&actiontype=dayadnweek&searchtype=2&searchval=";
				echo $s['uid'];
				echo "&timerange=w&TB_iframe=true&height=300&width=700\"  title=\"��";
				echo $u['username']."";
				echo "�������һ��������ͼ\"   class=\"thickbox\" >���һ��������ͼ</a> &nbsp;|&nbsp;<a href=\"do.php?action=trend&actiontype=trendarea&searchtype=2&searchval=";
				echo $s['uid'];
				echo "&timerange=w&TB_iframe=true&height=300&width=700\"  title=\"��";
				echo $u['username']."";
				echo "���ĵ����ֲ�\"   class=\"thickbox\" >�����ֲ�</a></span>&nbsp;</span> </td>\r\n                           <td  class=\"td_b_5\">&nbsp;</td>\r\n                         </tr>\r\n\t\t\t\t\t\t ";
		}
		$sumnum += $s['num'];
		$sumviews += $s['views'];
		$sumclicks += $s['clicks'];
		$sumdo2click += $s['do2click'];
		$sumorders += $s['orders'];
		$sumdodeduction += $s['deduction'];
		$sumsumpay += $s['sumpay'];
		$sumsumprofit += $s['sumprofit'];
}
echo "\t\t\t\t\t\t\r\n                       \r\n\t\t\t\t\t\t \r\n                        <tr class=\"td_b_t\">\r\n                          <td height=\"30\"   class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                          <td>&nbsp;</td>\r\n                          <td><strong>��ҳ����</strong></td>\r\n                          <td>&nbsp;</td>\r\n                          <td>";
echo number_format( $sumviews );
echo "&nbsp;</td>\r\n                          <td>";
echo number_format( $sumnum );
echo "&nbsp;</td>\r\n                          <td>";
echo number_format( $sumclicks );
echo "&nbsp;</td>\r\n                          <td>";
echo number_format( $sumdodeduction );
echo "&nbsp;</td>\r\n                          <td>";
echo number_format( $sumdo2click );
echo "&nbsp;</td>\r\n                          <td>";
echo number_format( $sumorders );
echo "&nbsp;</td>\r\n                          <td>&nbsp;</td>\r\n                          <td>";
echo $sumsumpay;
echo "&nbsp;</td>\r\n                          <td>";
echo $sumsumprofit;
echo "&nbsp;</td>\r\n                          <td  class=\"td_b_5\">&nbsp;</td>\r\n                        </tr>\r\n                        <tr class=\"td_b_7\">\r\n                          <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                          <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'id','chkallde')\" /></td>\r\n                          <td>��Ա����</td>\r\n                          <td>��ԱID</td>\r\n                          <td>�����</td>\r\n                          <td>������</td>\r\n                          <td>�����</td>\r\n                          <td>����</td>\r\n                          <td>���ε��</td>\r\n                          <td>Ч����</td>\r\n                          <td>CTR</td>\r\n                          <td>Ӧ�����</td>\r\n                          <td>ӯ��</td>\r\n                          <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                        </tr>\r\n                      </table>\r\n                  </form></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tr>\r\n                        <td width=\"200\"><select name=\"choosetype\" class=\"select\" id=\"choosetype\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>��������</option>\r\n                    <option value=\"del\">ɾ��</option>\r\n                  </select>\r\n                    <input type=\"button\" name=\"Submit\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                        <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                      </tr>\r\n                  </table></td>\r\n                </tr>\r\n            </table></td>\r\n      </tr>\r\n    </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = 'ɾ��';\t\r\n\tif(t=='') {alert('����ѡ��δѡ��');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('��ѡ����Ҫɾ���ı���'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('��ȷ��Ҫ'+ t +'��' + numchecked + '����Ա����\\n��ȷ�ϡ��������Ա��һ������ȫ��ɾ������\\n�㡰ȷ�ϡ�'+ t +'���㡰ȡ����ȡ��������')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\n\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
