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
echo ") ��Ϣ</td>\r\n                      <td class=\"f16\"><a href=\"\" onclick=\"javascript:history.go(-1);return false;\">������һҳ</a></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td><table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"  class=\"s-edit\">\r\n                    <tr>\r\n                      <th colspan=\"2\" align=\"left\" class=\"cpt\">������Ϣ</th>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >״̬</td>\r\n                      <td width=\"85%\" >";
if ( $s['status'] == "3" )
{
		echo "<font color=\"green\">��ͨ��</font>";
}
if ( $s['status'] == "0" )
{
		echo "<font color=\"red\">��������</font>";
}
if ( $s['status'] == "1" )
{
		echo "<font color=\"red\">�ѱ��ܾ�</font>";
}
if ( $s['status'] == "2" )
{
		echo "<font color=\"red\">�ѱ�����</font>";
}
echo "                      </td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >��Ա</td>\r\n                      <td ><a href=\"do.php?action=affiliate&actiontype=search&searchval=";
echo $u['uid'];
echo "&searchtype=2\">";
echo $u['username']."(#".$u['uid'].")";
echo "</a></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >��վID</td>\r\n                      <td >";
echo $s['siteid'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >��վ����</td>\r\n                      <td >";
echo $s['sitename'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >��վ������</td>\r\n                      <td ><a href=\"javascript:tourl('http://";
echo $s['siteurl'];
echo "')\">";
echo $s['siteurl'];
echo "</a></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >������</td>\r\n                      <td >";
echo $s['beian'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >��������</td>\r\n                      <td >";
echo $s['pertainurl'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td >��վ����</td>\r\n                      <td >";
echo $s['siteinfo'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td  >��վ����</td>\r\n                      <td  >";
echo $sid['sitename'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td  >Alexa/PR</td>\r\n                      <td  ><span id=\"s_";
echo $s['siteid'];
echo "\">";
echo $s['alexapr'];
echo "</span> <img src=\"/templates/";
echo Z_TPL;
echo "/images/alexa.jpg\" alt=\"�������\" align=\"absmiddle\" style=\"\tcursor:pointer\" onclick=\"doAlexaPr('";
echo trim( $s['siteurl'] );
echo "',";
echo $s['siteid'];
echo ")\" /></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td  >����ʱ��</td>\r\n                      <td  >";
echo $s['addtime'];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <th colspan=\"2\" align=\"left\" class=\"cpt\">��վ���λ</th>\r\n                    </tr>\r\n                    \r\n                    <tr>\r\n                      <td colspan=\"2\" >";
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
echo "</td>\r\n                    </tr>\r\n                   \r\n                    <tr>\r\n                      <th colspan=\"2\" align=\"left\" class=\"cpt\">Alexa��������ͼ</th>\r\n                    </tr>\r\n                    <tr>\r\n                      <td colspan=\"2\" ><div><a href=\"javascript:alexaImg(6)\">������</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:alexaImg(3)\">������</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:alexaImg(1)\">һ����</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:alexaImg('15.0')\">ʮ����</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:alexaImg('7.0')\">����</a></div>\r\n                        <br />\r\n                        <div id=\"alexaimg\"><img src=\"http://traffic.alexa.com/graph?w=700&h=280&r=3m&y=t&u=";
echo trim( $s['siteurl'] );
echo "\" alt=\" ���������ͼƬ���뵥���Ҽ�ѡ�� [��ʾͼƬ] \" /></div></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <th colspan=\"2\" align=\"left\" class=\"cpt\">һ������������ͼ</th>\r\n                    </tr>\r\n                    <tr>\r\n                      <td colspan=\"2\" ><div id=\"w\"> <strong>You need to upgrade your Flash Player</strong> </div>                        \r\n\t\t\t\t\t  <script type=\"text/javascript\">\t\r\n\t\t\t\t\t\tvar so = new SWFObject(\"/templates/admin/charts/line.swf\", \"amcolumn\", \"100%\", \"250\", \"8\", \"#FFFFFF\");\r\n\t\t\t\t\t\tso.addVariable(\"path\", \"/templates/admin/charts/\");\r\n\t\t\t\t\t\tso.addVariable(\"settings_file\", escape(\"/templates/admin/charts/line_settings.xml\")); \r\n\t\t\t\t\t\tso.addVariable(\"data_file\", escape(\"do.php?action=trenddata&actiontype=line&timerange=w&searchtype=4&searchval=";
echo $s['siteid'];
echo "\"));\t\t\r\n\t\t\t\t\t\tso.addVariable(\"preloader_color\", \"#999999\");\t\r\n\t\t\t\t\t\tso.write(\"w\");\r\n\t\t\t\t\t</script></td>\r\n                    </tr>\r\n                </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction doAlexaPr(url,siteid){\r\n\t\tsid = 's_'+siteid;\r\n\t\t\$('#'+sid).html('<img src=\"/templates/";
echo Z_TPL;
echo "/images/loading.gif\"> '); \r\n\t\t\r\n\t\t\$.ajax({\r\n           url: \"do.php?action=site&actiontype=alexapr&url=\"+url,\r\n\t\t   type: 'GET',\r\n\t\t   dataType: 'html',\r\n           timeout: 5000,\r\n           error: function () {\r\n                  \$('#'+sid).html('<font color=red>��ʱ</font>');\r\n           },\r\n\t\t   success: function(data){\r\n        \t\t\$('#'+sid).html(data);\r\n\t\t\t}\r\n        });\r\n\r\n}\r\nfunction alexaImg(t){\r\n\t\$('#alexaimg').html('<img src=http://traffic.alexa.com/graph?w=700&h=280&r='+t+'m&y=t&u=";
echo $s['siteurl'];
echo ">');\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
