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
echo "<SCRIPT LANGUAGE=\"JavaScript\" src=\"/javascript/jiandate.js\"></SCRIPT>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td  valign=\"top\"> \r\n            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n             \r\n              <tr>\r\n                <td height=\"50\"><form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                  <input name=\"timerange\" type=\"text\" id=\"timerange\" value=\"";
echo $timerange == "" ? DAYS : "";
echo "\" />\r\n                    <img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','1')\"/>\r\n                    <input name=\"Submit\" type=\"submit\" class=\"submit-x\" id=\"Submit\" value=\"��ѯ\" />\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=del\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td>����</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n \t\t\t\t\t\r\n                      <tr>\r\n                        <td height=\"40\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td>";
if ( !count( $tracking ) )
{
		echo "�������ݣ�";
}
else
{
		foreach ( ( array )$tracking as $c )
		{
				$u = $usermodel->getusersuidrow( $c['uid'] );
				echo "\t\t\t\t\t\t\t\t<span ><a href=\"do.php?action=adsip&timerange=";
				echo $day;
				echo "&actiontype=search&searchval=";
				echo $c['uid'];
				echo "&searchtype=1\" style=\"display:block; width:100px; height:30px; float:left\">";
				echo $u['username'];
				echo "  </a></span>\r\n\t\t\t\t\t\t\t\t</a>\r\n\t\t\t\t\t  ";
		}
}
echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      \r\n                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td>����</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"10\">&nbsp;</td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = 'ɾ��';\t\r\n\tif(t=='') {alert('����ѡ��δѡ��');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('��ѡ����Ҫɾ���ı���'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('��ȷ��Ҫ'+ t +'��' + numchecked + '�����λ����\\n��ȷ�ϡ���������λ��һ�����ݡ����ֹ�桿�ı���ȫ��ɾ������\\n�㡰ȷ�ϡ�'+ t +'���㡰ȡ����ȡ��������')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction doShow(){\r\nvar theAnswer = \$(\".td_b_m\");\r\nif(theAnswer.is(\":hidden\")) theAnswer.show();   \r\nelse theAnswer.hide();   \r\n}\r\n\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
