<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !_obfuscate_XGkLCg47bQ��( "IN_ZYADS" ) )
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
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=add&TB_iframe=true&height=400&width=500\"  title=\"������Ʒ\" class=\"thickbox\"><img  src='/templates/";
echo Z_TPL;
echo "/images/add.gif' align='absmiddle' /> <strong>������Ʒ</strong></a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "\" ";
if ( $top == "" )
{
		echo "class=\"li-active\"";
}
echo ">��Ʒ�б�</a></li>\r\n\t\t\t\t\t\t  \r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=exchange\"  >�ҽ��������</a></li>\r\n\t\t\t\t\t \r\n\t\t\t\t\t\t  \r\n                        </ul></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>��������</option>\r\n                    <option value=\"del\">ɾ��</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n\t\t\t\t   <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                  ���ƣ�\r\n                  <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"25\" />\r\n                  <select name=\"type\" id=\"type\">\r\n\t\t\t\t\t  <option value=\"\">���з���</option>\r\n\t\t\t\t\t  ";
foreach ( ( array )$GLOBALS['C_IntegralType'] as $key => $val )
{
		echo "\t\t\t\t\t  <option value=\"";
		echo $key;
		echo "\"  ";
		if ( $type == $key && _obfuscate_BB84ZzB6bXMtaQ��( $type ) )
		{
				echo "selected";
		}
		echo ">";
		echo $val;
		echo "</option>\r\n\t\t\t\t\t  ";
}
echo "\t\t\t\t  </select>\r\n                  <select name=\"status\" id=\"status\">\r\n                    <option  value=\"\">����״̬</option>\r\n                     \r\n                    <option value=\"1\"  ";
if ( $status == "1" )
{
		echo "selected";
}
echo ">���</option>\r\n\t\t\t\t\t <option value=\"0\"  ";
if ( $status == "0" )
{
		echo "selected";
}
echo ">ֹͣ��</option>\r\n                   \r\n                  </select>\r\n                <input type=\"submit\" name=\"Submitx\" value=\"����\" class=\"submit-x\"/> </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n\t\t\t\t\t<input name=\"reurl\"  id=\"reurl\"  type=\"hidden\" value=\"";
echo $reurl;
echo "\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'sid')\" /></td>\r\n                        <td width=\"260\">��Ʒ����</td>\r\n                        <td width=\"100\">��Ʒ����</td>\r\n                        <td width=\"100\">�ҽ�����</td>\r\n                        <td width=\"100\">�ҽ�����</td>\r\n                        <td width=\"80\">�Ƽ�</td>\r\n                        <td width=\"80\">״̬</td>\r\n                        <td>����ʱ��</td>\r\n                        <td>�޸�</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
foreach ( ( array )$integral as $i )
{
		echo "                      <tr>\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"id[]\" value=\"";
		echo $i['id'];
		echo "\" />                        </td>\r\n                        <td><a href=\"do.php?action=";
		echo $action;
		echo "&actiontype=edit&id=";
		echo $i['id'];
		echo "&TB_iframe=true&height=400&width=500\"  class=\"thickbox\">";
		echo $i['name'];
		echo "</a></td>\r\n                        <td>";
		echo $GLOBALS['C_IntegralType'][$i['type']];
		echo "</td>\r\n                        <td>";
		echo $i['integral'];
		echo "</td>\r\n                        <td>";
		echo $i['num'];
		echo "</td>\r\n                        <td>";
		if ( $i['top'] == 1 )
		{
				echo "<font color=blue>�Ƽ�</font>";
		}
		else
		{
				echo "���Ƽ�";
		}
		echo "</td>\r\n                        <td>";
		if ( $i['status'] == 0 )
		{
				echo "<font color=blue>ֹͣ�һ�</font>";
		}
		else
		{
				echo "�һ���";
		}
		echo "</td>\r\n                        <td>";
		echo $i['addtime'];
		echo "</td>\r\n                        <td><a href=\"do.php?action=integral&actiontype=postchoose&id[]=";
		echo $i['id'];
		echo "&choosetype=unlock&reurl=";
		echo $reurl;
		echo "\" >����</a>&nbsp;&nbsp;<a href=\"do.php?action=integral&actiontype=postchoose&id[]=";
		echo $i['id'];
		echo "&choosetype=lock&reurl=";
		echo $reurl;
		echo "\" >����</a>&nbsp;&nbsp; <a href=\"do.php?action=";
		echo $action;
		echo "&actiontype=edit&id=";
		echo $i['id'];
		echo "&TB_iframe=true&height=400&width=500\"  title=\"�޸� ��";
		echo $i['name'];
		echo "��\"   class=\"thickbox\" >�޸�</a></td> \r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td >��Ʒ����</td>\r\n                        <td >��Ʒ����</td>\r\n                        <td >�ҽ�����</td>\r\n                        <td >�ҽ�����</td>\r\n                        <td >�Ƽ�</td>\r\n                        <td >״̬</td>\r\n                        <td >����ʱ��</td>\r\n                        <td>�޸�</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select2\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                          <option>��������</option>\r\n                          <option value=\"del\">ɾ��</option>\r\n                        </select>\r\n                        <input type=\"button\" name=\"Submit3\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = 'ɾ��';\t\r\n\tif(t=='') {alert('����ѡ��δѡ��');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('��ѡ����Ҫ�����Ĺ���'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('��ȷ��Ҫ'+ t +'��' + numchecked + '������ ����\\n�㡰ȷ�ϡ�'+ t +'���㡰ȡ����ȡ��������')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
