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
echo " \r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"active\"> <a   href=\"do.php?action=ads\"><span>����";
echo $action == "editplan" ? "�༭" : "����";
echo "���</span></a> </li>\r\n                    <li class=\"link\"> <a   href=\"do.php?action=ads\"><span>���ع���б�</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td><form action=\"?action=";
if ( $action == "createads" )
{
		echo "createads&actiontype=postcreateads";
}
if ( $action == "editads" )
{
		echo "editads&actiontype=postupads";
}
echo "\" method=\"post\" enctype=\"multipart/form-data\" name=\"create\" id=\"create\"onsubmit=\"return post_submit()\">\r\n\t\t  <input name=\"adsid\" type=\"hidden\" value=\"";
echo $a['adsid'];
echo "\" />\r\n \t\t\t<input name=\"htmlcontrol\" type=\"hidden\" value=\"";
echo implode( ",", $htmlcontrol );
echo "\" />\r\n              <table width=\"90%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tr>\r\n                  <td valign=\"top\">\r\n\t\t\t\t  ";
if ( $statetype == "success" )
{
		echo "\t\t\t\t<table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"100%\" >\r\n\t\t\t\t  <tr>\r\n\t\t\t\t\t<td height=\"30\"><img  src='/templates/";
		echo Z_TPL;
		echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">�����ɹ���</span></td>\r\n\t\t\t\t\t<td>&nbsp;</td>\r\n\t\t\t\t  </tr>\r\n\t\t\t\t</table>\r\n\t\t\t\t<script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\t\tnoneSuccess();\r\n\t\t\t\t</script>\r\n\t\t\t\t";
}
echo "\t\t\t<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border :1px solid #CCCCCC; margin-top:20px\"  >\r\n                      <tr>\r\n                        <td width=\"110\" height=\"30\" align=\"right\" bgcolor=\"#E4E4E4\" ><span style=\"\">";
echo $action == "editplan" ? "�༭" : "����";
echo "�ƻ���Ŀ&nbsp;&nbsp; <img src=\"/templates/";
echo Z_TPL;
echo "/images/3b1.jpg\" alt=\"\" align=\"absmiddle\"></span></td>\r\n                        ";
if ( $action == "editplan" )
{
		echo "                        <td width=\"200\"  align=\"left\" bgcolor=\"#E4E4E4\" >&nbsp;&nbsp;\r\n                          <sapn style=\"font-size:13px;color:#FFFFFF\"><strong>";
		echo $plan['planname']."(#".$plan['planid'].")";
		echo "</strong></sapn></td>\r\n                        <td width=\"15\" ><img src=\"/templates/";
		echo Z_TPL;
		echo "/images/3h1.jpg\" alt=\"\" align=\"absmiddle\" /></td>\r\n                        <td >&nbsp;</td>\r\n                        ";
}
else
{
		echo "                        <td width=\"90\" align=\"right\" bgcolor=\"#2098C8\" ><span style=\"color:#FFFFFF\">�������&nbsp;&nbsp; <img src=\"/templates/";
		echo Z_TPL;
		echo "/images/3h1.jpg\" alt=\"\" align=\"absmiddle\" /></span></td>\r\n                        <td >&nbsp;</td>\r\n                        ";
}
echo "                      </tr>\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/bulb.gif\" width=\"19\" height=\"19\" /> <strong>��ʾ��</strong> �����Ŀ������֯Ҫ�����Ĳ�Ʒ��档ͬһ�����Ŀ�е����й���ʹ����ͬ�ĵ��ۡ�ÿ��Ԥ�㡢����λ��ʱ�䶨λ���������� ��</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"20\">&nbsp;</td>\r\n                </tr>\r\n\t\t\t\t";
if ( $a['status'] == 2 )
{
		echo "                <tr>\r\n                  <td height=\"20\"><div class=\"info\" id=\"info\">\r\n                  <div class=\"r1\"></div>\r\n                <div class=\"r2\"></div>\r\n                <div class=\"text\" id=\"text\">�ϴ��޸ĺ�δ�����</div>\r\n                <div class=\"l1\"></div>\r\n                <div class=\"l2\"></div></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"30\" class=\"cpt\">�޸���־</td>\r\n                </tr>\r\n                <tr>\r\n                  <td><br>";
		foreach ( ( array )$olddata as $key => $val )
		{
				if ( $key == "htmlcode" )
				{
						echo "<b>".$key."</b>��<textarea style=\"width:220px;height:50px\">".$val."</textarea>-><textarea style=\"width:220px;height:50px\">".$updata[$key]."</textarea><br>";
				}
				else
				{
						echo "<b>".$key."</b>��".$val."-><font color=\"#ff0000\">".$updata[$key]."</font><br>";
				}
		}
		echo "<br></td>\r\n                </tr>\r\n\t\t\t\t";
}
echo "                <tr>\r\n                  <td class=\"cpt\">ѡ��</td>\r\n                </tr>\r\n                <tr>\r\n                  <td><table width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td width=\"100\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">���ڹ��ƻ�</td>\r\n                        <td><select name=\"planid\" id=\"planid\" onChange=\"location.href = 'do.php?action=createads&planid='+this.options[selectedIndex].value\" ";
if ( $action == "editads" )
{
		echo "disabled='disabled'";
}
echo ">\r\n\t\t\t\t\t\t\r\n                            <option value=\"\">��ѡ��һ���ƻ���Ŀ</option>\r\n\t\t\t\t\t\t";
foreach ( ( array )$plantypearr as $ptr )
{
		echo "\t\t\t\t\t\t  <optgroup  label=\"";
		echo ucfirst( $ptr['plantype'] );
		echo "\">\r\n                            ";
		foreach ( ( array )$allplan as $pt )
		{
				if ( !( $pt['plantype'] !== $ptr['plantype'] ) )
				{
						echo "                            <option value=\"";
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
						echo "]</option>\r\n                            ";
				}
		}
		echo "\t\t\t\t\t\t\t </optgroup>\r\n\t\t\t\t\t\t\t";
}
echo "                          </select>\r\n                          &nbsp;<span id=\"umoney\"></span><br />\r\n                          <span class=\"gray\">������ڹ��ƻ���Ŀ��</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">�������</td>\r\n                        <td><select name=\"adstypeid\" id=\"adstypeid\"  onChange=\"location.href = 'do.php?action=createads&planid=";
echo $planid;
echo "&adstypeid='+this.options[selectedIndex].value\" ";
if ( $action == "editads" )
{
		echo "disabled='disabled'";
}
echo ">\r\n\t\t\t\t\t\t\t<option value=\"\">��ѡ��һ���������</option>\r\n                            ";
foreach ( ( array )$adstype as $at )
{
		echo "                            <option value=\"";
		echo $at['adstypeid'];
		echo "\" ";
		if ( $at['adstypeid'] == $adstypeid )
		{
				echo "selected";
		}
		echo ">";
		echo $at['name'];
		echo "</option>\r\n                            ";
}
echo "                          </select>\r\n                          <br />\r\n                          <span class=\"gray\">���Ӧ������һ������չ�֡�</span></td>\r\n                      </tr>\r\n ";
echo "<tr>	
      <td>�ϴ�ͼƬ(��ͼ)</td><input name='files'  value='up' type='hidden'/>
      <td><input type='file' name='imageurl' id='urlfile'>";
if (isset($a)){
	echo "<img height=\"100\" src='".$a['imageurl']."''>";
}
echo  "  <font color='red'></font></td>
</tr>\r\n\t\t\t\t\t\t<br><br>";
	echo "<tr id=\"_imageurl_\" style=\"display:none\">\r\n                      <td valign=\"top\">ͼƬ(Сͼ)<font color=\"#FF0000\">*</font></td>\r\n                      <td >\r\n                       \r\n <input name='files'  value='up' type='hidden'/>                      <input name=\"imageurl1\" type=\"file\" id=\"imageurl\" size=\"40\"  >";
if (isset($a)){
	echo "<img height=\"80\" src='".$a['imageurl1']."''>";
}
echo "<br />\r\n                        <span class=\"gray\">&nbsp;&nbsp;&nbsp;ֻ���ϴ�.jpg .gif .swf .png .bmp��ʽ�ļ�,�ļ�С����С��500KB��</span>\t\t\t\t\t\t</span>\r\n\t\t\t\t\t\t<span id=\"_url\" style=\"display:";
if ( $files == "http" )
{
		echo "''";
}
else
{
		echo "'none'";
}
echo "\">\r\n                        &nbsp;&nbsp;&nbsp;\r\n                        </span>\t\t\t\t\t\t</span>\t\t\t\t\t\t</td>\r\n                      </tr>\r\n                     <tr id=\"_specs_\" style=\"display:none\">\r\n                        <td valign=\"top\">���óߴ�</td>\r\n                        <td><select name=\"specs\" id=\"specs\"  ";
if ( $action == "editplan" )
{
		echo "disabled='disabled'";
}
echo " onchange=\"doSpecs(this.value)\">\r\n                          <option value=\"\">----�Զ���----</option>\r\n                          ";
foreach ( ( array )$GLOBALS['C_Specs'] as $as )
{
		echo "                          <option value=\"";
		echo $as;
		echo "\" >";
		echo $as;
		echo "</option>\r\n                          ";
}
echo "\t\t\t\t\t\t  <option value=\"0x0\">ȫ������</option>\r\n                        </select>\r\n                          <br />\r\n                          <span class=\"gray\">���ٶ�ѡȡ���ߴ硣</span></td>\r\n                      </tr>\r\n                      <tr id=\"_width_\" style=\"display:none\">\r\n                        <td valign=\"top\">���<font color=\"#FF0000\">*</font></td>\r\n                        <td><input name=\"width\" type=\"text\" id=\"width\" value=\"";
echo $a['width'];
echo "\" size=\"30\" maxlength=\"4\" />\r\n                          <br />\r\n                          <span class=\"gray\">�����,������0��Ϊȫ��������</span></td>\r\n                      </tr>\r\n                      <tr id=\"_height_\" style=\"display:none\">\r\n                        <td valign=\"top\">�߶�<font color=\"#FF0000\">*</font></td>\r\n                        <td><input name=\"height\" type=\"text\"  id=\"height\" value=\"";
echo $a['height'];
echo "\" size=\"30\" maxlength=\"4\"/>\r\n                          <br />\r\n                          <span class=\"gray\">���߶�,������0��Ϊȫ��������</span></td>\r\n                      </tr>\r\n\t\t\t\t\t    <tr id=\"_headline_\" style=\"display:none\">\r\n                        <td valign=\"top\">����<font color=\"#FF0000\">*</font></td>\r\n                        <td><input name=\"headline\" type=\"text\" id=\"headline\" value=\"";
echo $a['headline'];
echo "\" size=\"30\" maxlength=\"40\"/>\r\n                          <br />\r\n                          <span class=\"gray\">�������������,���20�����֡�</span></td>\r\n                      </tr>\r\n\t\t\t\t\t    <tr id=\"_description_\" style=\"display:none\">\r\n                        <td valign=\"top\">��������<font color=\"#FF0000\">*</font></td>\r\n                        <td><textarea name=\"description\" cols=\"35\" rows=\"3\" id=\"description\">";
echo $a['description'];
echo "</textarea>\r\n                          <br />\r\n                          <span class=\"gray\">������Ӣ��/�ָ�����</span></td>\r\n                      </tr>\r\n                      <tr id=\"_url_\" style=\"display:none\">\r\n                        <td valign=\"top\">�����ַ<font color=\"#FF0000\">*</font></td>\r\n                        <td><input name=\"url\" type=\"text\" id=\"url\" value=\"";
echo $a['url'];
echo "\"  size=\"30\" maxlength=\"1024\"/>\r\n                          <br />\r\n                          <span class=\"gray\">������ǵ����Ĺ���ַ��</span></td>\r\n                      </tr>\r\n\t\t\t\t\t  <tr id=\"_dispurl_\" style=\"display:none\">\r\n                        <td valign=\"top\">��ʾ��ַ<font color=\"#FF0000\">*</font></td>\r\n                        <td><input name=\"dispurl\" type=\"text\" id=\"dispurl\" value=\"";
echo $a['dispurl'];
echo "\" size=\"30\" maxlength=\"1024\"/>\r\n                          <br />\r\n                          <span class=\"gray\">�������ʾ����վ��ַ��</span></td>\r\n                      </tr>\r\n                      <tr id=\"_htmlcode_\" style=\"display:none\">\r\n                        <td valign=\"top\">�Զ������<font color=\"#FF0000\">*</font></td>\r\n                        <td><textarea name=\"htmlcode\" cols=\"60\" rows=\"10\" id=\"htmlcode\"  style=\"width:600px;height:300px\">";
echo $a['htmlcode'];
echo "</textarea>\r\n                          <br />\r\n                          <span class=\"gray\">��׼��HTML�����ʽ��</span></td>\r\n\t\t\t\t\t\t  </tr>\r\n                       <tr id=\"_zlink_\"  style=\"display:none\">\r\n                        <td valign=\"top\" style='display: none'>�Զ�������</td>\r\n                        <td style='display: none'>\r\n                          <input type=\"radio\" name=\"zlink\" value=\"1\" ";
if ( $a['zlink'] == 1 )
{
		echo " checked";
}
echo "/>\r\n                          ����  <input name=\"zlink\" type=\"radio\" value=\"0\" ";
if ( $action == "createads" || $a['zlink'] == 0 )
{
		echo " checked";
}
echo "/>\r\n                          ����\r\n                          <br />\r\n                         <span class=\"gray\">���ù����Զ����ַ��ͨ��һ�������ӵ�ַͶ�Ź��,ͨ��ֱ����档</span></td>\r\n                      </tr>\r\n                    \r\n                       <tr id=\"_adinfo_\">\r\n                        <td valign=\"top\">�������</td>\r\n                        <td>\r\n                          <textarea name=\"adinfo\" cols=\"30\" id=\"adinfo\" style=\"width:400px;height:50px\">";
echo $a['adinfo'];
echo "</textarea> <br />\r\n                         <span class=\"gray\">��Ҫ��������������ͣ���</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                    </table>                    </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><input type=\"submit\" name=\"Submit\" class=\"form-submit\" value=\" �� �� \" />\r\n\t\t\t\t  ";
if ( $action != "editplan" )
{
		echo "                    <input name=\"status\" type=\"checkbox\" id=\"status\" value=\"1\" checked=\"checked\" />\r\n                    ֱ�����ͨ��\r\n\t\t\t\t\t ";
}
echo "\t\t\t\t\t</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\">&nbsp;</td>\r\n                </tr>\r\n              </table>\r\n            </form></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction doSpecs(v){\r\n\tv = v.split('x');\r\n\t\$i(\"height\").value='';\r\n\t\$i(\"width\").value='';\r\n\tif(v[0]){\r\n\t\t\$i(\"height\").value=v[1];\r\n\t\t\$i(\"width\").value=v[0];\r\n\t}\r\n}\r\nfunction post_submit(){ \r\n\tvar planid = get_Select_Value(\$i(\"planid\"));\r\n\tvar adstypeid = get_Select_Value(\$i(\"adstypeid\"));\r\n\tif(isNULL(planid)){\r\n        \talert(\"��ѡ��һ�����ƻ���Ŀ\");\r\n\t\t\treturn false;\r\n     }\r\n\t if(isNULL(adstypeid)){\r\n        \talert(\"��ѡ��һ�����չ������\");\r\n\t\t\treturn false;\r\n     }\r\n\t ";
foreach ( ( array )$htmlcontrol as $h )
{
		echo "\t \r\n\t ";
		if ( $h == "imageurl" )
		{
				echo "\t \t\tvar f = get_radio_value(\$n(\"files\"));\r\n\t\t\tvar c = '";
				echo $action;
				echo "';\r\n\t\t\tvar reg=/^.*?\\.(jpg|bmp|png|jpeg|gif|swf|JPG|BMP|PNG|JPEG|GIF|SWF)\$/;\r\n\t\t\tif(f=='up'){\r\n\t\t\t\tvar fileToUpload = \$(\"#imageurl\").val();\r\n\t\t\t\tif(isNULL(fileToUpload) &&  c=='createads'){\r\n\t\t\t\t\talert(\"��ѡ��Ҫ�ϴ����ļ�\"); \r\n\t\t\t\t\t\$(\"#imageurl\").focus();\r\n\t\t\t\t\treturn false;\r\n\t\t\t\t}\r\n\t\t\t\t \r\n\t\t\t\t\r\n\t\t\t}else {\r\n\t\t\t\tif(false){\r\n\t\t\t\t\talert(\"���ϴ�ͼƬ\");\r\n\t\t\t\t\t\$(\"#urlfile\").focus();\r\n\t\t\t\t\treturn false;\r\n\t\t\t\t}\r\n\t\t\t\telse if(false)\r\n\t\t\t\t{\r\n\t\t\t\t\talert(\"Զ���ļ���ʽ�ļ�������ʹ�á�http����ͷ\");  \r\n\t\t\t\t\t\$(\"#urlfile\").focus();\r\n\t\t\t\t\t\r\n\t\t\t\t}\r\n\t\t\t}\r\n\t \r\n\t ";
		}
		else
		{
				echo "\t \r\n\tif(isNULL(\$(\"#";
				echo $h;
				echo "\").val())){\r\n\t\t\talert(\"����д���С�*���Ǻŵ�ѡ��\");\r\n\t\t\t\$(\"#";
				echo $h;
				echo "\").focus();\r\n\t\t\treturn false;\r\n\t}\r\n\t";
		}
		if ( $h == "url" )
		{
				echo "\t\r\n\tif(!isValidURL(\$(\"#url\").val())){\r\n\t\t\talert(\"�����ַ���벻�Ϸ�\"); \r\n\t\t\t\$(\"#url\").focus();\r\n        \treturn false;\r\n    \t}\r\n\t\t\r\n\t";
		}
}
echo "}\r\n";
foreach ( ( array )$htmlcontrol as $h )
{
		echo "\$(\"#_";
		echo $h;
		echo "_\").show();\r\n";
		if ( $h == "width" )
		{
				echo " \$(\"#_specs_\").show();";
		}
		if ( $h == "url" )
		{
				echo " \$(\"#_zlink_\").show();";
		}
		if ( $h == "headline" )
		{
				echo " \$(\"#_zlink_\").hide();";
		}
}
echo "</script>\r\n\r\n";
include( TPL_DIR."/footer.php" );
?>
