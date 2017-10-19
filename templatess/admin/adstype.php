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
		echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">操作成功！</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
}
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          <li style=\"padding-right:10px\"><a href=\"do.php?action=";
echo $action;
echo "&actiontype=add&TB_iframe=true&height=500&width=730\"  title=\"新建模版\"   class=\"thickbox\"><img  src='/templates/";
echo Z_TPL;
echo "/images/add.gif' align='absmiddle' /> <strong>新建模版</strong></a></li>  \r\n\t\t\t\t\t\t  <li>|</li>\r\n                           <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=reatp\">重建缓存</a></li>\r\n                       \r\n                        </ul></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"20\">&nbsp;</td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"11\">&nbsp;</td>\r\n                        <td width=\"160\">显示名称</td>\r\n                        <td width=\"300\" nowrap=\"nowrap\">模板说明</td>\r\n                        <td width=\"100\" nowrap=\"nowrap\">模板</td>\r\n                        <td width=\"120\" nowrap=\"nowrap\">操作</td>\r\n                        <td nowrap=\"nowrap\">状态</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n\t\t\t\t\t  \r\n                     ";
foreach ( ( array )$plantype as $p )
{
		$adstype = $adstypemodel->admingetplanttypeadstype( $p['plantype'] );
		echo "                      <tr>\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                        <td><strong>";
		echo strtoupper( $p['plantype'] )." ".$p['name']."类";
		echo "</strong> </td>\r\n                        <td nowrap=\"nowrap\">&nbsp;</td>\r\n                        <td nowrap=\"nowrap\">&nbsp;</td>\r\n                        <td nowrap=\"nowrap\"><a href=\"do.php?action=";
		echo $action;
		echo "&actiontype=editstatus&adstypeid=";
		echo $p['adstypeid'];
		echo "&status=0\" onclick=\"return confirm('您确定隐藏?\\n隐藏后会员无法看到广告')\">隐藏</a>&nbsp;|&nbsp;<a href=\"do.php?action=";
		echo $action;
		echo "&actiontype=editstatus&adstypeid=";
		echo $p['adstypeid'];
		echo "&status=1\">显示</a>&nbsp;</td>\r\n                        <td nowrap=\"nowrap\">";
		if ( $p['status'] == "0" )
		{
				echo "<font color=\"red\">隐藏</font>";
		}
		if ( $p['status'] == "1" )
		{
				echo "<font color=\"green\">显示</font>";
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
				echo "&TB_iframe=true&height=500&width=730&inlineId=DenySite\"  title=\"新建模版\"   class=\"thickbox\">编辑</a></td>\r\n                        <td nowrap=\"nowrap\"><a href=\"do.php?action=";
				echo $action;
				echo "&actiontype=editstatus&adstypeid=";
				echo $a['adstypeid'];
				echo "&status=0\" onclick=\"return confirm('您确定隐藏?\\n隐藏后会员无法看到广告')\">隐藏</a>&nbsp;|&nbsp;<a href=\"do.php?action=";
				echo $action;
				echo "&actiontype=editstatus&adstypeid=";
				echo $a['adstypeid'];
				echo "&status=1\">显示</a>";
				if ( 10 < $a['adstypeid'] )
				{
						echo "\t\t\t\t\t\t";
						if ( 24 < $a['adstypeid'] )
						{
								echo "\t\t\t\t\t\t&nbsp;|&nbsp;<a href=\"do.php?action=";
								echo $action;
								echo "&actiontype=dleadstype&adstypeid=";
								echo $a['adstypeid'];
								echo "\" onclick=\"return confirm('您确定删除?\\n删除后旗下的广告变为停止状态，无法正常显示')\">删除</a>";
						}
						echo "\t\t\t\t\t\t";
				}
				echo "\t\t\t\t\t\t</td>\r\n                        <td nowrap=\"nowrap\">\r\n\t\t\t\t\t\t";
				if ( $a['status'] == "0" )
				{
						echo "<font color=\"red\">隐藏</font>";
				}
				if ( $a['status'] == "1" )
				{
						echo "<font color=\"green\">显示</font>";
				}
				echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n\t\t\t\t\t  \r\n\t\t\t\t\t  \r\n\t\t\t\t\t   ";
		}
		echo "                      ";
}
echo "\t\t\t\t\t  \r\n\t\t\t\t\t  \r\n\t\t\t\t\t  \r\n                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td >&nbsp;</td>\r\n                        <td >显示名称</td>\r\n                        <td nowrap=\"nowrap\">模板说明</td>\r\n                        <td nowrap=\"nowrap\">&nbsp;</td>\r\n                        <td nowrap=\"nowrap\">&nbsp;</td>\r\n                        <td nowrap=\"nowrap\">状态</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\">&nbsp;</td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = '删除';\t\r\n\tif(v == 'unlock')  t= '激活';\t\r\n\tif(v == 'deny') t = '拒绝';\r\n\tif(t=='') {alert('批量选项未选择');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('请选中您要操作的网站'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('您确认要'+ t +'这' + numchecked + '个网站？。\\n点“确认”'+ t +'，点“取消”取消操作。')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\n\r\n</script>\r\n \r\n";
include( TPL_DIR."/footer.php" );
?>
