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
echo "\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td  valign=\"top\">";
if ( $statetype == "success" )
{
		echo "            <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"97%\" >\r\n              <tr>\r\n                <td height=\"30\"><img  src='/templates/";
		echo Z_TPL;
		echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">�����ɹ���</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
}
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          <li style=\"padding-right:10px\"><a href=\"do.php?action=";
echo $action;
echo "&actiontype=add&TB_iframe=true&height=500&width=730\"  title=\"�½�ģ��\"   class=\"thickbox\"><img  src='/templates/";
echo Z_TPL;
echo "/images/add.gif' align='absmiddle' /> <strong>�½�ģ��</strong></a></li>  \r\n\t\t\t\t\t\t  <li>|</li>\r\n                           <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=reatp\">�ؽ�����</a></li>\r\n                       \r\n                        </ul></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"20\">&nbsp;</td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"11\">&nbsp;</td>\r\n                        <td width=\"160\">��ʾ����</td>\r\n                        <td width=\"300\" nowrap=\"nowrap\">ģ��˵��</td>\r\n                        <td width=\"100\" nowrap=\"nowrap\">ģ��</td>\r\n                        <td width=\"120\" nowrap=\"nowrap\">����</td>\r\n                        <td nowrap=\"nowrap\">״̬</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n\t\t\t\t\t  \r\n                     ";
foreach ( ( array )$plantype as $p )
{
		$adstype = $adstypemodel->admingetplanttypeadstype( $p['plantype'] );
		echo "                      <tr>\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                        <td><strong>";
		echo strtoupper( $p['plantype'] )." ".$p['name']."��";
		echo "</strong> </td>\r\n                        <td nowrap=\"nowrap\">&nbsp;</td>\r\n                        <td nowrap=\"nowrap\">&nbsp;</td>\r\n                        <td nowrap=\"nowrap\"><a href=\"do.php?action=";
		echo $action;
		echo "&actiontype=editstatus&adstypeid=";
		echo $p['adstypeid'];
		echo "&status=0\" onclick=\"return confirm('��ȷ������?\\n���غ��Ա�޷��������')\">����</a>&nbsp;|&nbsp;<a href=\"do.php?action=";
		echo $action;
		echo "&actiontype=editstatus&adstypeid=";
		echo $p['adstypeid'];
		echo "&status=1\">��ʾ</a>&nbsp;</td>\r\n                        <td nowrap=\"nowrap\">";
		if ( $p['status'] == "0" )
		{
				echo "<font color=\"red\">����</font>";
		}
		if ( $p['status'] == "1" )
		{
				echo "<font color=\"green\">��ʾ</font>";
		}
		echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n\t\t\t\t\t  \t\r\n\t\t\t\t\t";
		foreach ( ( array )$adstype as $a )
		{
				echo "                      <tr>\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                        <td><span style=\"padding-left:30px\">";
				echo $a['name'];
				echo "</span></td>\r\n                        <td nowrap=\"nowrap\"><span style=\"padding-left:30px\"><script language='javascript'>";
				echo $a['info'];
				echo "</script></span></td>\r\n                        <td nowrap=\"nowrap\"><a href=\"do.php?action=";
				echo $action;
				echo "&actiontype=edit&adstypeid=";
				echo $a['adstypeid'];
				echo "&TB_iframe=true&height=500&width=730&inlineId=DenySite\"  title=\"�½�ģ��\"   class=\"thickbox\">�༭</a></td>\r\n                        <td nowrap=\"nowrap\"><a href=\"do.php?action=";
				echo $action;
				echo "&actiontype=editstatus&adstypeid=";
				echo $a['adstypeid'];
				echo "&status=0\" onclick=\"return confirm('��ȷ������?\\n���غ��Ա�޷��������')\">����</a>&nbsp;|&nbsp;<a href=\"do.php?action=";
				echo $action;
				echo "&actiontype=editstatus&adstypeid=";
				echo $a['adstypeid'];
				echo "&status=1\">��ʾ</a>";
				if ( 10 < $a['adstypeid'] )
				{
						echo "\t\t\t\t\t\t";
						if ( 24 < $a['adstypeid'] )
						{
								echo "\t\t\t\t\t\t&nbsp;|&nbsp;<a href=\"do.php?action=";
								echo $action;
								echo "&actiontype=dleadstype&adstypeid=";
								echo $a['adstypeid'];
								echo "\" onclick=\"return confirm('��ȷ��ɾ��?\\nɾ�������µĹ���Ϊֹͣ״̬���޷�������ʾ')\">ɾ��</a>";
						}
						echo "\t\t\t\t\t\t";
				}
				echo "\t\t\t\t\t\t</td>\r\n                        <td nowrap=\"nowrap\">\r\n\t\t\t\t\t\t";
				if ( $a['status'] == "0" )
				{
						echo "<font color=\"red\">����</font>";
				}
				if ( $a['status'] == "1" )
				{
						echo "<font color=\"green\">��ʾ</font>";
				}
				echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n\t\t\t\t\t  \r\n\t\t\t\t\t  \r\n\t\t\t\t\t   ";
		}
		echo "                      ";
}
echo "\t\t\t\t\t  \r\n\t\t\t\t\t  \r\n\t\t\t\t\t  \r\n                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td >&nbsp;</td>\r\n                        <td >��ʾ����</td>\r\n                        <td nowrap=\"nowrap\">ģ��˵��</td>\r\n                        <td nowrap=\"nowrap\">&nbsp;</td>\r\n                        <td nowrap=\"nowrap\">&nbsp;</td>\r\n                        <td nowrap=\"nowrap\">״̬</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\">&nbsp;</td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = 'ɾ��';\t\r\n\tif(v == 'unlock')  t= '����';\t\r\n\tif(v == 'deny') t = '�ܾ�';\r\n\tif(t=='') {alert('����ѡ��δѡ��');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('��ѡ����Ҫ��������վ'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('��ȷ��Ҫ'+ t +'��' + numchecked + '����վ����\\n�㡰ȷ�ϡ�'+ t +'���㡰ȡ����ȡ��������')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\n\r\n</script>\r\n \r\n";
include( TPL_DIR."/footer.php" );
?>
