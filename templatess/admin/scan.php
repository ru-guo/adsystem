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
echo "<script LANGUAGE=\"JavaScript\" src=\"/javascript/jiandate.js\"></script>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td><form id=\"formescan\" name=\"formescan\" target=\"scans\"  method=\"post\">\r\n\t\t   <input name=\"surl\" id=\"surl\" type=\"hidden\" value=\"\" />\r\n              <table width=\"97%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tr>\r\n                  <td valign=\"top\">";
if ( $statetype != "" )
{
		echo "                    <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"100%\" >\r\n                      <tr>\r\n                        <td height=\"30\"><img  src='/templates/";
		echo Z_TPL;
		echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">";
		echo $statetype == "success" ? "发送成功" : "发送失败";
		echo "！</span></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\t\tnoneSuccess();\r\n\t\t\t\t</script>\r\n                    ";
}
echo "</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/bulb.gif\" width=\"19\" height=\"19\" /> <strong>提示：</strong>扫描报表中的会员数据时，结算数低于100的不做扫描。</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"20\">&nbsp;</td>\r\n                </tr>\r\n \r\n                <tr>\r\n                  <td class=\"cpt\">云端扫描作弊</td>\r\n                </tr>\r\n                <tr>\r\n                  <td><table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td width=\"170\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\">扫描选项 </td>\r\n                        <td> \r\n                          <input name=\"alone\" type=\"radio\" value=\"0\" checked=\"checked\" onclick=\"\$('#n_1').hide();\$('#n_2').show()\"/>\r\n\t\t\t\t\t\t \r\n                           扫描报表中的数据\r\n                          <input type=\"radio\" name=\"alone\" value=\"1\" onclick=\"\$('#n_2').hide();\$('#n_1').show()\"/>\r\n                          扫描单个会员</td>\r\n                      </tr>\r\n                      <tr id=\"n_2\">\r\n                        <td height=\"40\">扫描时间</td>\r\n                        <td ><select name=\"timerange\" id=\"timerange\" style=\"width:200px\">\r\n                          <option value=\"";
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
echo "\">\r\n                          ";
if ( $time_begin == "" )
{
		echo DAYS;
}
else
{
		echo $time_begin;
}
echo " 至 ";
if ( $time_end == "" )
{
		echo DAYS;
}
else
{
		echo $time_end;
}
echo "                          </option>\r\n                          <option value=\"t\" ";
echo $timerange == "t" ? " selected" : "";
echo " >昨天</option>\r\n                          <option value=\"w\" ";
echo $timerange == "w" ? " selected" : "";
echo " >过去一周内</option>\r\n                          <option value=\"m\" ";
echo $timerange == "m" ? " selected" : "";
echo ">本月内</option>\r\n                          <option value=\"l\" ";
echo $timerange == "l" ? " selected" : "";
echo ">上月的</option>\r\n                        </select>\r\n                          <img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','2')\"/> </td>\r\n                      </tr>\r\n                      <tr id=\"n_1\"  style=\"display:none\">\r\n                        <td height=\"40\">会员名称<font color=\"#FF0000\">*</font></td>\r\n                        <td ><input name=\"touser\" type=\"text\"   id=\"touser\" value=\"";
echo $_GET['username'];
echo "\" size=\"20\" /></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                        <td><input type=\"button\" name=\"button\" class=\"form-submit\" value=\"开始扫描\"  onclick=\"Posts()\"/>\r\n                         <span id=\"loading\" style=\"display:none;background:#FF5A00;width:180px;height:20px;line-height:20px;color:#ffffff;font-size:12px;text-align:center;\"> 开始扫描...请勿关闭窗口</span> </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\" valign=\"top\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                        <td><iframe width=\"700\" height=\"150\" name=\"scans\" id=\"scans\"  marginwidth=\"0\" marginheight=\"0\"     allowtransparency=\"true\"  frameborder=0  src=\"scan.php\"></iframe></td> \r\n                      </tr>\r\n                  </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\">&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\">&nbsp;</td>\r\n                </tr>\r\n              </table>\r\n            </form></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\n \r\nfunction Posts(){\r\n\twindow.status=\" \";\r\n\t\$.get(\"do.php?action=scan&actiontype=u\", function(data){\r\n\t\tif( data ){\r\n\t\t\tdocument.forms[\"formescan\"].action= data;\r\n\t\t\tvar alone  = get_radio_value(\$n('alone'));\r\n\t\t\tif(alone==1) {\r\n\t\t\t\tvar touser  = \$i('touser').value;\r\n\t\t\t\tif(isNULL(touser)){\r\n\t\t\t\t\talert(\"请输入会员名称！\");\r\n\t\t\t\t\t\$i('touser').focus();\r\n\t\t\t\t\treturn false;\r\n\t\t\t\t}\r\n\t\t\t}\r\n\t\t\tif(alone==1) {\r\n\t\t\t\t\$.get(\"do.php?action=userinfo&username=\"+touser, function(data){\r\n\t\t\t\t\tif( data == \"0\" ){\r\n\t\t\t\t\t\t\$.post(\"do.php?action=scan\",{ \"touser\": touser,\"alone\" : 1}, function(data){\r\n\t\t\t\t\t\t\tif( data ){\r\n\t\t\t\t\t\t\t\t\$i('surl').value = data;\r\n\t\t\t\t\t\t\t\t\$('#loading').show()\r\n\t\t\t\t\t\t\t\tdocument.forms[\"formescan\"].submit();\r\n\t\t\t\t\t\t\t\t\$('#scans').show();\r\n\t\t\t\t\t\t\t}else {\r\n\t\t\t\t\t\t\t\talert('没有扫描的数据');\r\n\t\t\t\t\t\t\t\treturn false;\r\n\t\t\t\t\t\t\t}\r\n\t\t\t\t\t\t});\r\n\t\t\t\t\t}\r\n\t\t\t\t\telse{\r\n\t\t\t\t\t\talert('没有这个会员');\r\n\t\t\t\t\t\treturn false;\r\n\t\t\t\t\t}\r\n\t\t\t\t});\r\n\t\t\t} else {\r\n\t\t\t\tvar timerange = \$(\"#timerange\").val();\r\n\t\t\t\t\$.post(\"do.php?action=scan\",{ \"timerange\": timerange,\"alone\" : 0}, function(data){\r\n\t\t\t\t\tif( data  ){\r\n\t\t\t\t\t\t\$('#loading').show()\r\n\t\t\t\t\t\t\$i('surl').value = data;\r\n\t\t\t\t\t\t\$('#loading').show()\r\n\t\t\t\t\t\tdocument.forms[\"formescan\"].submit();\r\n\t\t\t\t\t\t\$('#scans').show();\r\n\t\t\t\t\t}else {\r\n\t\t\t\t\t\talert('没有扫描的数据');\r\n\t\t\t\t\t\treturn false;\r\n\t\t\t\t\t}\r\n\t\t\t\t});\r\n\t\t\t}\r\n\t\t}\r\n\t\telse{\r\n\t\t\talert('出现错误，请刷新一下再尝试扫描');\r\n\t\t\treturn false;\r\n\t\t}\r\n\t});\r\n\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
