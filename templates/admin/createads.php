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
echo " \r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"active\"> <a   href=\"do.php?action=ads\"><span>正在";
echo $action == "editplan" ? "编辑" : "创建";
echo "广告</span></a> </li>\r\n                    <li class=\"link\"> <a   href=\"do.php?action=ads\"><span>返回广告列表</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td><form action=\"?action=";
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
		echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">操作成功！</span></td>\r\n\t\t\t\t\t<td>&nbsp;</td>\r\n\t\t\t\t  </tr>\r\n\t\t\t\t</table>\r\n\t\t\t\t<script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\t\tnoneSuccess();\r\n\t\t\t\t</script>\r\n\t\t\t\t";
}
echo "\t\t\t<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border :1px solid #CCCCCC; margin-top:20px\"  >\r\n                      <tr>\r\n                        <td width=\"110\" height=\"30\" align=\"right\" bgcolor=\"#E4E4E4\" ><span style=\"\">";
echo $action == "editplan" ? "编辑" : "创建";
echo "计划项目&nbsp;&nbsp; <img src=\"/templates/";
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
		echo "                        <td width=\"90\" align=\"right\" bgcolor=\"#2098C8\" ><span style=\"color:#FFFFFF\">创建广告&nbsp;&nbsp; <img src=\"/templates/";
		echo Z_TPL;
		echo "/images/3h1.jpg\" alt=\"\" align=\"absmiddle\" /></span></td>\r\n                        <td >&nbsp;</td>\r\n                        ";
}
echo "                      </tr>\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/bulb.gif\" width=\"19\" height=\"19\" /> <strong>提示：</strong> 广告项目用于组织要宣传的产品广告。同一广告项目中的所有广告均使用相同的单价、每日预算、地域定位、时间定位、结束日期 。</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"20\">&nbsp;</td>\r\n                </tr>\r\n\t\t\t\t";
if ( $a['status'] == 2 )
{
		echo "                <tr>\r\n                  <td height=\"20\"><div class=\"info\" id=\"info\">\r\n                  <div class=\"r1\"></div>\r\n                <div class=\"r2\"></div>\r\n                <div class=\"text\" id=\"text\">上次修改后未曾审核</div>\r\n                <div class=\"l1\"></div>\r\n                <div class=\"l2\"></div></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"30\" class=\"cpt\">修改日志</td>\r\n                </tr>\r\n                <tr>\r\n                  <td><br>";
		foreach ( ( array )$olddata as $key => $val )
		{
				if ( $key == "htmlcode" )
				{
						echo "<b>".$key."</b>：<textarea style=\"width:220px;height:50px\">".$val."</textarea>-><textarea style=\"width:220px;height:50px\">".$updata[$key]."</textarea><br>";
				}
				else
				{
						echo "<b>".$key."</b>：".$val."-><font color=\"#ff0000\">".$updata[$key]."</font><br>";
				}
		}
		echo "<br></td>\r\n                </tr>\r\n\t\t\t\t";
}
echo "                <tr>\r\n                  <td class=\"cpt\">选项</td>\r\n                </tr>\r\n                <tr>\r\n                  <td><table width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td width=\"100\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">属于广告计划</td>\r\n                        <td><select name=\"planid\" id=\"planid\" onChange=\"location.href = 'do.php?action=createads&planid='+this.options[selectedIndex].value\" ";
if ( $action == "editads" )
{
		echo "disabled='disabled'";
}
echo ">\r\n\t\t\t\t\t\t\r\n                            <option value=\"\">请选择一个计划项目</option>\r\n\t\t\t\t\t\t";
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
echo "                          </select>\r\n                          &nbsp;<span id=\"umoney\"></span><br />\r\n                          <span class=\"gray\">广告属于广告计划项目。</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">广告类型</td>\r\n                        <td><select name=\"adstypeid\" id=\"adstypeid\"  onChange=\"location.href = 'do.php?action=createads&planid=";
echo $planid;
echo "&adstypeid='+this.options[selectedIndex].value\" ";
if ( $action == "editads" )
{
		echo "disabled='disabled'";
}
echo ">\r\n\t\t\t\t\t\t\t<option value=\"\">请选择一个广告类型</option>\r\n                            ";
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
echo "                          </select>\r\n                          <br />\r\n                          <span class=\"gray\">广告应用于哪一种类型展现。</span></td>\r\n                      </tr>\r\n                      <tr id=\"_imageurl_\" style=\"display:none\">\r\n                      <td valign=\"top\">图片/Flash<font color=\"#FF0000\">*</font></td>\r\n                      <td >\r\n                        <input type=\"radio\" name=\"files\" value=\"up\" ";
if ( $action == "createads" || $files != "http" )
{
		echo " checked";
}
echo " onclick=\"\$('#_up').show();\$('#_url').hide()\"/>上传&nbsp;&nbsp;&nbsp;<input type=\"radio\" name=\"files\" value=\"url\" ";
if ( $files == "http" )
{
		echo " checked";
}
echo " onclick=\"\$('#_up').hide();\$('#_url').show()\"/>远程<br /><br />\r\n\t\t\t\t\t\t<span id=\"_up\" style=\"display:";
if ( $action == "createads" || $files != "http" )
{
		echo "''";
}
else
{
		echo "'none'";
}
echo "\">\r\n                        &nbsp;&nbsp;&nbsp;<input name=\"imageurl\" type=\"file\" id=\"imageurl\" size=\"40\"  style=\"width:336px;height:22px\"/> \r\n                        <br />\r\n                        <span class=\"gray\">&nbsp;&nbsp;&nbsp;只能上传.jpg .gif .swf .png .bmp格式文件,文件小大需小于500KB。</span>\t\t\t\t\t\t</span>\r\n\t\t\t\t\t\t<span id=\"_url\" style=\"display:";
if ( $files == "http" )
{
		echo "''";
}
else
{
		echo "'none'";
}
echo "\">\r\n                        &nbsp;&nbsp;&nbsp;\r\n                        <input name=\"urlfile\" type=\"text\" id=\"urlfile\" size=\"40\"  style=\"width:336px;height:22px\" value=\"";
if ( $files == "http" )
{
		echo $a['imageurl'];
}
echo "\"/> <br />\r\n                        <span class=\"gray\">&nbsp;&nbsp;&nbsp;远程绝对地址。</span>\t\t\t\t\t\t</span>\t\t\t\t\t\t</td>\r\n                      </tr>\r\n                     <tr id=\"_specs_\" style=\"display:none\">\r\n                        <td valign=\"top\">常用尺寸</td>\r\n                        <td><select name=\"specs\" id=\"specs\"  ";
if ( $action == "editplan" )
{
		echo "disabled='disabled'";
}
echo " onchange=\"doSpecs(this.value)\">\r\n                          <option value=\"\">----自定义----</option>\r\n                          ";
foreach ( ( array )$GLOBALS['C_Specs'] as $as )
{
		echo "                          <option value=\"";
		echo $as;
		echo "\" >";
		echo $as;
		echo "</option>\r\n                          ";
}
echo "\t\t\t\t\t\t  <option value=\"0x0\">全屏弹出</option>\r\n                        </select>\r\n                          <br />\r\n                          <span class=\"gray\">快速度选取广告尺寸。</span></td>\r\n                      </tr>\r\n                      <tr id=\"_width_\" style=\"display:none\">\r\n                        <td valign=\"top\">宽度<font color=\"#FF0000\">*</font></td>\r\n                        <td><input name=\"width\" type=\"text\" id=\"width\" value=\"";
echo $a['width'];
echo "\" size=\"30\" maxlength=\"4\" />\r\n                          <br />\r\n                          <span class=\"gray\">广告宽度,弹窗类0既为全屏弹出。</span></td>\r\n                      </tr>\r\n                      <tr id=\"_height_\" style=\"display:none\">\r\n                        <td valign=\"top\">高度<font color=\"#FF0000\">*</font></td>\r\n                        <td><input name=\"height\" type=\"text\"  id=\"height\" value=\"";
echo $a['height'];
echo "\" size=\"30\" maxlength=\"4\"/>\r\n                          <br />\r\n                          <span class=\"gray\">广告高度,弹窗类0既为全屏弹出。</span></td>\r\n                      </tr>\r\n\t\t\t\t\t    <tr id=\"_headline_\" style=\"display:none\">\r\n                        <td valign=\"top\">标题<font color=\"#FF0000\">*</font></td>\r\n                        <td><input name=\"headline\" type=\"text\" id=\"headline\" value=\"";
echo $a['headline'];
echo "\" size=\"30\" maxlength=\"40\"/>\r\n                          <br />\r\n                          <span class=\"gray\">主题广告标题内容,最多20个汉字。</span></td>\r\n                      </tr>\r\n\t\t\t\t\t    <tr id=\"_description_\" style=\"display:none\">\r\n                        <td valign=\"top\">内容描述<font color=\"#FF0000\">*</font></td>\r\n                        <td><textarea name=\"description\" cols=\"35\" rows=\"3\" id=\"description\">";
echo $a['description'];
echo "</textarea>\r\n                          <br />\r\n                          <span class=\"gray\">主题广告内容描述，简要说明广告。</span></td>\r\n                      </tr>\r\n                      <tr id=\"_url_\" style=\"display:none\">\r\n                        <td valign=\"top\">广告网址<font color=\"#FF0000\">*</font></td>\r\n                        <td><input name=\"url\" type=\"text\" id=\"url\" value=\"";
echo $a['url'];
echo "\"  size=\"30\" maxlength=\"1024\"/>\r\n                          <br />\r\n                          <span class=\"gray\">点击或是弹出的广告地址。</span></td>\r\n                      </tr>\r\n\t\t\t\t\t  <tr id=\"_dispurl_\" style=\"display:none\">\r\n                        <td valign=\"top\">显示网址<font color=\"#FF0000\">*</font></td>\r\n                        <td><input name=\"dispurl\" type=\"text\" id=\"dispurl\" value=\"";
echo $a['dispurl'];
echo "\" size=\"30\" maxlength=\"1024\"/>\r\n                          <br />\r\n                          <span class=\"gray\">广告中显示的网站地址。</span></td>\r\n                      </tr>\r\n                      <tr id=\"_htmlcode_\" style=\"display:none\">\r\n                        <td valign=\"top\">自定义代码<font color=\"#FF0000\">*</font></td>\r\n                        <td><textarea name=\"htmlcode\" cols=\"60\" rows=\"10\" id=\"htmlcode\"  style=\"width:600px;height:300px\">";
echo $a['htmlcode'];
echo "</textarea>\r\n                          <br />\r\n                          <span class=\"gray\">标准的HTML代码格式。</span></td>\r\n\t\t\t\t\t\t  </tr>\r\n                       <tr id=\"_zlink_\"  style=\"display:none\">\r\n                        <td valign=\"top\">自定义链接</td>\r\n                        <td>\r\n                          <input type=\"radio\" name=\"zlink\" value=\"1\" ";
if ( $a['zlink'] == 1 )
{
		echo " checked";
}
echo "/>\r\n                          开启  <input name=\"zlink\" type=\"radio\" value=\"0\" ";
if ( $action == "createads" || $a['zlink'] == 0 )
{
		echo " checked";
}
echo "/>\r\n                          禁用\r\n                          <br />\r\n                         <span class=\"gray\">启用广告的自定义地址，通过一个超链接地址投放广告,通称直链广告。</span></td>\r\n                      </tr>\r\n                    \r\n                       <tr id=\"_adinfo_\">\r\n                        <td valign=\"top\">广告描述</td>\r\n                        <td>\r\n                          <textarea name=\"adinfo\" cols=\"30\" id=\"adinfo\" style=\"width:400px;height:50px\">";
echo $a['adinfo'];
echo "</textarea> <br />\r\n                         <span class=\"gray\">简要的描述。</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                    </table>                    </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><input type=\"submit\" name=\"Submit\" class=\"form-submit\" value=\" 提 交 \" />\r\n\t\t\t\t  ";
if ( $action != "editplan" )
{
		echo "                    <input name=\"status\" type=\"checkbox\" id=\"status\" value=\"1\" checked=\"checked\" />\r\n                    直接审核通过\r\n\t\t\t\t\t ";
}
echo "\t\t\t\t\t</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\">&nbsp;</td>\r\n                </tr>\r\n              </table>\r\n            </form></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction doSpecs(v){\r\n\tv = v.split('x');\r\n\t\$i(\"height\").value='';\r\n\t\$i(\"width\").value='';\r\n\tif(v[0]){\r\n\t\t\$i(\"height\").value=v[1];\r\n\t\t\$i(\"width\").value=v[0];\r\n\t}\r\n}\r\nfunction post_submit(){ \r\n\tvar planid = get_Select_Value(\$i(\"planid\"));\r\n\tvar adstypeid = get_Select_Value(\$i(\"adstypeid\"));\r\n\tif(isNULL(planid)){\r\n        \talert(\"请选择一个广告计划项目\");\r\n\t\t\treturn false;\r\n     }\r\n\t if(isNULL(adstypeid)){\r\n        \talert(\"请选择一个广告展现类型\");\r\n\t\t\treturn false;\r\n     }\r\n\t ";
foreach ( ( array )$htmlcontrol as $h )
{
		echo "\t \r\n\t ";
		if ( $h == "imageurl" )
		{
				echo "\t \t\tvar f = get_radio_value(\$n(\"files\"));\r\n\t\t\tvar c = '";
				echo $action;
				echo "';\r\n\t\t\tvar reg=/^.*?\\.(jpg|bmp|png|jpeg|gif|swf|JPG|BMP|PNG|JPEG|GIF|SWF)\$/;\r\n\t\t\tif(f=='up'){\r\n\t\t\t\tvar fileToUpload = \$(\"#imageurl\").val();\r\n\t\t\t\tif(isNULL(fileToUpload) &&  c=='createads'){\r\n\t\t\t\t\talert(\"请选择要上传的文件\"); \r\n\t\t\t\t\t\$(\"#imageurl\").focus();\r\n\t\t\t\t\treturn false;\r\n\t\t\t\t}\r\n\t\t\t\t \r\n\t\t\t\t\r\n\t\t\t}else {\r\n\t\t\t\tif(isNULL(\$(\"#urlfile\").val())){\r\n\t\t\t\t\talert(\"请填写远程文件\");\r\n\t\t\t\t\t\$(\"#urlfile\").focus();\r\n\t\t\t\t\treturn false;\r\n\t\t\t\t}\r\n\t\t\t\telse if(!reg.test(\$(\"#urlfile\").val()))\r\n\t\t\t\t{\r\n\t\t\t\t\talert(\"远程文件格式文件不对请使用“http”开头\");  \r\n\t\t\t\t\t\$(\"#urlfile\").focus();\r\n\t\t\t\t\treturn false;\r\n\t\t\t\t}\r\n\t\t\t}\r\n\t \r\n\t ";
		}
		else
		{
				echo "\t \r\n\tif(isNULL(\$(\"#";
				echo $h;
				echo "\").val())){\r\n\t\t\talert(\"请填写带有“*”星号的选项\");\r\n\t\t\t\$(\"#";
				echo $h;
				echo "\").focus();\r\n\t\t\treturn false;\r\n\t}\r\n\t";
		}
		if ( $h == "url" )
		{
				echo "\t\r\n\tif(!isValidURL(\$(\"#url\").val())){\r\n\t\t\talert(\"广告网址输入不合法\"); \r\n\t\t\t\$(\"#url\").focus();\r\n        \treturn false;\r\n    \t}\r\n\t\t\r\n\t";
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
