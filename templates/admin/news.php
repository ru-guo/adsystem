<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/
//var_dump($news);die();
if ( !defined( "IN_ZYADS" ) )
{
		exit( );
}
include( TPL_DIR."/header.php" );
echo "\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"00\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td  valign=\"top\">";
if ( $statetype == "success" )
{
		echo "            <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"97%\" >\r\n              <tr>\r\n                <td height=\"30\"><img  src='/templates/";
		echo Z_TPL;
		echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">操作成功！</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
}
echo "            <table width=\"97%\" border=\"00\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"00\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=add&TB_iframe=true&height=250&width=600\"  title=\"发布公告\" class=\"thickbox\"><img  src='/templates/";
echo Z_TPL;
echo "/images/add.gif' align='absmiddle' /> <strong>发布公告</strong></a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "\" ";
if ( $top == "" )
{
		echo "class=\"li-active\"";
}
echo ">全部公告</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&top=1\" ";
if ( $top == "1" )
{
		echo "class=\"li-active\"";
}
echo ">置顶公告</a> </li> \r\n                        </ul></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n                    <option value=\"del\">删除</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"20\" />\r\n                    <select name=\"searchtype\">\r\n          \t\t\t\t<option value=\"2\" ";
if ( $searchtype == "2" )
{
		echo "selected";
}
echo ">标题内容</option>\r\n                    </select>\r\n                    <input type=\"submit\" name=\"Submit22\" value=\"搜索\" class=\"submit-x\"/>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"00\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'id')\" /></td>\r\n                        <td width=\"280\">标题</td>\r\n                        <td width=\"280\">内容</td>\r\n                        <td width=\"80\">置顶</td>\r\n                        <td width=\"150\">发布时间</td>\r\n                        <td>修改</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
foreach ( ( array )$news as $n )
{
		echo "                      <tr>\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"id[]\" value=\"";
		echo $n['id'];
		echo "\" />                        </td>\r\n                        <td><font color=\"";
		echo $n['color'];
		echo "\">";
		echo str(  $n['tit'] , 40 );
		echo "</font></td>\r\n                        <td>";
		echo str( strip_tags( $n['conn'] ), 50 );
		echo "</td>\r\n                        <td>";
		if ( $n['top'] == 1 )
		{
				echo "是";
		}
		else
		{
				echo "否";
		}
		echo "</td>\r\n                        <td>";
		echo $n['time'];
		echo "</td>\r\n                        <td><a href=\"?action=news&actiontype=edit&id=";
		echo $n['id'];
		echo "&TB_iframe=true&height=250&width=600\" title=\"修改公告信息\" class=\"thickbox\">修改</a></td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td >标题</td>\r\n                        <td>内容</td>\r\n                        <td>置顶</td>\r\n                        <td>发布时间</td>\r\n                        <td>修改</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"00\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select2\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                        <option>批量操作</option>\r\n                        <option value=\"del\">删除</option>\r\n                      </select>\r\n                      <input type=\"button\" name=\"Submit3\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = '删除';\t\r\n\tif(t=='') {alert('批量选项未选择');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('请选中您要操作的公告'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('您确认要'+ t +'这' + numchecked + '个公告 ？。\\n点“确认”'+ t +'，点“取消”取消操作。')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\n</script>\r\n \r\n";
include( TPL_DIR."/footer.php" );
?>
