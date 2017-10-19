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
echo "<script type=\"text/javascript\" src=\"/javascript/swfobject.js\"></script>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td><table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                    <tr>\r\n                      <td height=\"10\" align=\"center\">&nbsp;</td>\r\n                      <td class=\"f16\">&nbsp;</td>\r\n                      <td width=\"100\" class=\"f16\">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td width=\"40\" height=\"50\"><img src=\"/templates/";
echo Z_TPL;
echo "/images/info.jpg\" border=\"0\" /></td>\r\n                      <td class=\"f16\">";
echo $s['sitename'];
echo "(";
echo $s['siteurl'];
echo ") 信息</td>\r\n                      <td class=\"f16\"><a href=\"\" onclick=\"javascript:history.go(-1);return false;\">返回上一页</a></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td><table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"  class=\"s-edit\">\r\n                    <tr>\r\n                      <th colspan=\"2\" align=\"left\" class=\"cpt\">基本信息</th>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >状态</td>\r\n                      <td width=\"85%\" >";
if ( $s['status'] == "3" )
{
		echo "<font color=\"green\">已通过</font>";
}
if ( $s['status'] == "0" )
{
		echo "<font color=\"red\">新增待审</font>";
}
if ( $s['status'] == "1" )
{
		echo "<font color=\"red\">已被拒绝</font>";
}
if ( $s['status'] == "2" )
{
		echo "<font color=\"red\">已被锁定</font>";
}
echo "                      </td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >会员</td>\r\n                      <td ><a href=\"do.php?action=affiliate&actiontype=search&searchval=";
echo $u['uid'];
echo "&searchtype=2\">";
echo $u['username']."(#".$u['uid'].")";
echo "</a></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >网站ID</td>\r\n                      <td >";
echo $s['siteid'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >网站名称</td>\r\n                      <td >";
echo $s['sitename'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >网站主域名</td>\r\n                      <td ><a href=\"javascript:tourl('http://";
echo $s['siteurl'];
echo "')\">";
echo $s['siteurl'];
echo "</a></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >备案号</td>\r\n                      <td >";
echo $s['beian'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >附属域名</td>\r\n                      <td >";
echo $s['pertainurl'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >网站描述</td>\r\n                      <td >";
echo $s['siteinfo'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td  >网站类型</td>\r\n                      <td  >";
echo $sid['sitename'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td  >Alexa/PR</td>\r\n                      <td  ><span id=\"s_";
echo $s['siteid'];
echo "\">";
echo $s['alexapr'];
echo "</span> <img src=\"/templates/";
echo Z_TPL;
echo "/images/alexa.jpg\" alt=\"点击更新\" align=\"absmiddle\" style=\"\tcursor:pointer\" onclick=\"doAlexaPr('";
echo trim( $s['siteurl'] );
echo "',";
echo $s['siteid'];
echo ")\" /></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td  >申请时间</td>\r\n                      <td  >";
echo $s['addtime'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <th colspan=\"2\" align=\"left\" class=\"cpt\">网站广告位</th>\r\n                    </tr>\r\n                    \r\n                    <tr>\r\n                      <td colspan=\"2\" >";
foreach ( ( array )$zone as $z )
{
		echo "<a href=\"do.php?action=zone&searchtype=1&searchval=";
		echo $z['zoneid'];
		echo "\">#";
		echo $z['zoneid'];
		echo "(";
		echo $z['zonename'];
		echo ")</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}
echo "</td>\r\n                    </tr>\r\n                   \r\n                    <tr>\r\n                      <th colspan=\"2\" align=\"left\" class=\"cpt\">Alexa排名走势图</th>\r\n                    </tr>\r\n                    <tr>\r\n                      <td colspan=\"2\" ><div><a href=\"javascript:alexaImg(6)\">六个月</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:alexaImg(3)\">三个月</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:alexaImg(1)\">一个月</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:alexaImg('15.0')\">十五天</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:alexaImg('7.0')\">七天</a></div>\r\n                        <br />\r\n                        <div id=\"alexaimg\"><img src=\"http://traffic.alexa.com/graph?w=700&h=280&r=3m&y=t&u=";
echo trim( $s['siteurl'] );
echo "\" alt=\" 如果看不到图片，请单击右键选择 [显示图片] \" /></div></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <th colspan=\"2\" align=\"left\" class=\"cpt\">一星期流量走势图</th>\r\n                    </tr>\r\n                    <tr>\r\n                      <td colspan=\"2\" ><div id=\"w\"> <strong>You need to upgrade your Flash Player</strong> </div>                        \r\n\t\t\t\t\t  <script type=\"text/javascript\">\t\r\n\t\t\t\t\t\tvar so = new SWFObject(\"/templates/admin/charts/line.swf\", \"amcolumn\", \"100%\", \"250\", \"8\", \"#FFFFFF\");\r\n\t\t\t\t\t\tso.addVariable(\"path\", \"/templates/admin/charts/\");\r\n\t\t\t\t\t\tso.addVariable(\"settings_file\", escape(\"/templates/admin/charts/line_settings.xml\")); \r\n\t\t\t\t\t\tso.addVariable(\"data_file\", escape(\"do.php?action=trenddata&actiontype=line&timerange=w&searchtype=4&searchval=";
echo $s['siteid'];
echo "\"));\t\t\r\n\t\t\t\t\t\tso.addVariable(\"preloader_color\", \"#999999\");\t\r\n\t\t\t\t\t\tso.write(\"w\");\r\n\t\t\t\t\t</script></td>\r\n                    </tr>\r\n                </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction doAlexaPr(url,siteid){\r\n\t\tsid = 's_'+siteid;\r\n\t\t\$('#'+sid).html('<img src=\"/templates/";
echo Z_TPL;
echo "/images/loading.gif\"> '); \r\n\t\t\r\n\t\t\$.ajax({\r\n           url: \"do.php?action=site&actiontype=alexapr&url=\"+url,\r\n\t\t   type: 'GET',\r\n\t\t   dataType: 'html',\r\n           timeout: 5000,\r\n           error: function () {\r\n                  \$('#'+sid).html('<font color=red>超时</font>');\r\n           },\r\n\t\t   success: function(data){\r\n        \t\t\$('#'+sid).html(data);\r\n\t\t\t}\r\n        });\r\n\r\n}\r\nfunction alexaImg(t){\r\n\t\$('#alexaimg').html('<img src=http://traffic.alexa.com/graph?w=700&h=280&r='+t+'m&y=t&u=";
echo $s['siteurl'];
echo ">');\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
