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
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          <li><a href=\"do.php?action=setting&actiontype=add\"  title=\"�������\" class=\"thickbox\"><img  src='/templates/";
echo Z_TPL;
echo "/images/add.gif' align='absmiddle' /> <strong>�������</strong></a></li>\r\n </ul></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr style='display: none'>\r\n                <td height=\"50\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\" >\r\n                    <option>��������</option>\r\n                    <option value=\"del\">ɾ��</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"20\" />\r\n                    <select name=\"searchtype\">\r\n                     \t<option value=\"1\" selected=\"selected\" ";
if ( $searchtype == "1" )
{
	echo "selected";
}
echo ">������</option>\r\n          \t\t\t\t<option value=\"2\" ";
if ( $searchtype == "2" )
{
	echo "selected";
}
echo ">��������</option>\r\n                    </select>\r\n                    <input type=\"submit\" name=\"Submit22\" value=\"����\" class=\"submit-x\"/>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                                                <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'msgid')\" /></td>\r\n                        <td width=\"80\">id</td>\r\n                        <td width=\"80\">��������</td>\r\n                        <td width=\"80\">��ʾ����</td>\r\n                        <td width=\"80\">ͼƬ1</td>\r\n                        <td width=\"150\">ͼƬ��</td>\r\n                        <td width=\"150\">�޸�</td>\r\n                                                <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
foreach ( ( array )$myset as $set )
{
	echo "<tr height=\"30\">
			<td></td>
			<td>".$set['id']."</td>
			<td>".$set['settingname']."</td>
			<td>".$set['value']."</td>
			<td><a href='".$set['imgurl']." ' target=\'_black\'>�鿴</a></td>
			<td><a href='".$set['imgurl1']." ' target=\'_black\'>�鿴</a></td>
			<td><a href=\"do.php?action=setting&actiontype=up&id=".$set['id']." class=\"thickbox\" \">�༭</a>|<a href=\"do.php?action=setting&actiontype=del&id=".$set['id']."\">ɾ��</a></td>
</tr>";
}

include( TPL_DIR."/footer.php" );
