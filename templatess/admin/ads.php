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
echo "            <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" ";
if ( $plantype == "" )
{
		echo "style=\"display:none\"";
}
echo " >\r\n              <tr>\r\n                <td><ul id=\"li-ad-type\" >\r\n                    <li><a href=\"do.php?action=";
echo $action;
echo "&plantype=";
echo $plantype;
echo "\" ";
if ( $adstypeid == "" )
{
		echo "class=\"li-active\"";
}
echo ">所有";
echo ucfirst( $plantype );
echo "</a></li>\r\n                  ";
foreach ( ( array )$adstype as $at )
{
		$an = $adsmodel->getnumzyadstypeid( $at['adstypeid'] );
		echo "                    <li>|</li>\r\n                  <li><a href=\"do.php?action=";
		echo $action;
		echo "&plantype=";
		echo $plantype;
		echo "&adstypeid=";
		echo $at['adstypeid'];
		echo "\" ";
		if ( $adstypeid == $at['adstypeid'] )
		{
				echo "class=\"li-active\"";
		}
		echo ">";
		echo $at['name']."(".$an['num'].")";
		echo "</a> </li>\r\n                  ";
}
echo "                </ul></td>\r\n                <td width=\"100%\">&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\"> <li style=\"padding-right:10px\"><a href=\"do.php?action=createads\"><img  src='/templates/";
echo Z_TPL;
echo "/images/add.gif' align='absmiddle' /> <strong>新建广告</strong></a></li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=3\" ";
if ( $status == "3" )
{
		echo "class=\"li-active\"";
}
echo ">投放中</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=0\" ";
if ( $status == "0" )
{
		echo "class=\"li-active\"";
}
echo ">新建待审</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=2\" ";
if ( $status == "2" )
{
		echo "class=\"li-active\"";
}
echo ">修改待审</a> </li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=4\" ";
if ( $status == "4" )
{
		echo "class=\"li-active\"";
}
echo ">锁定中</a> </li>\r\n \t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&zlink=1\" ";
if ( $zlink == "1" )
{
		echo "class=\"li-active\"";
}
echo ">直链广告</a> </li>\r\n                        </ul></td>\r\n                     \r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n                    <option value=\"unlock\">激活</option>\r\n                    <option value=\"lock\">停止</option>\r\n                    <option value=\"del\">删除</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
echo $action;
echo "\" method=\"post\">\r\n                    <input name=\"actiontype\" type=\"hidden\" value=\"";
echo $actiontype;
echo "\" />\r\n                    <select name=\"sortingm\" class=\"select\" id=\"sortingm\">\r\n                      <option value=\"DESC\" ";
if ( $sortingm == "DESC" )
{
		echo "selected";
}
echo " >降序</option>\r\n                      <option value=\"ASC\" ";
if ( $sortingm == "ASC" )
{
		echo "selected";
}
echo " >升序</option>\r\n                    </select>\r\n                    <select name=\"sortingtype\" class=\"select\" id=\"sortingtype\">\r\n                      <option value=\"priority\" ";
if ( $sortingtype == "priority" )
{
		echo "selected";
}
echo ">权重</option>>\r\n                    </select>\r\n                    <input type=\"submit\" name=\"Submit2\" value=\"排序\" class=\"submit-x\">\r\n                  </form> \r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"20\" />\r\n                    <select name=\"searchtype\">\r\n                      <option value=\"1\" ";
if ( $searchtype == "1" )
{
		echo "selected";
}
echo ">广告ID</option>\r\n                      <option value=\"2\" ";
if ( $searchtype == "2" )
{
		echo "selected";
}
echo ">计划ID</option>\r\n                      <option value=\"3\" ";
if ( $searchtype == "3" )
{
		echo "selected";
}
echo ">广告商ID</option>\r\n                    </select>\r\n                    <input type=\"submit\" name=\"Submit22\" value=\"搜索\" class=\"submit-x\"/>\r\n                  </form></td>\r\n\t\t\t\t  \r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    \r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'uid')\" /></td>\r\n                        <td width=\"60\">广告Id</td>\r\n                        <td width=\"80\">规格</td>\r\n                        <td width=\"110\">计划名称</td>\r\n                        <td width=\"80\">广告商</td>\r\n                        <td width=\"70\">类型</td>\r\n                        <td width=\"60\">计费</td>\r\n                        <td width=\"60\">权重</td>\r\n                        <td width=\"100\">当日浏览量</td>\r\n                        <td width=\"90\">当日结算数</td>\r\n                        <td width=\"90\">状态</td>\r\n                        <td>&nbsp;</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                        ";
foreach ( ( array )$ads as $a )
{
		$at = $adstypemodel->getadstypeid( $a['adstypeid'] );
		$user = $usermodel->getusersuidrow( $a['uid'] );
		echo "                         <tr  onmouseover=\"\$('#e_";
		echo $a['adsid'];
		echo "').show()\" onmouseout=\"\$('#e_";
		echo $a['adsid'];
		echo "').hide()\">\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  > \r\n                          <input type=\"checkbox\" name=\"adsid[]\" value=\"";
		echo $a['adsid'];
		echo "\" />                       </td>\r\n                        <td>";
		echo $a['adsid'];
		echo "</td>\r\n                        <td><strong>";
		echo $a['width']."x".$a['height'];
		echo "</strong></td>\r\n                        <td><a href=\"do.php?action=plan&&actiontype=search&searchval=";
		echo $a['planid'];
		echo "&searchtype=2\">";
		echo $a['planname'];
		echo "</a></td>\r\n                        <td><a href=\"do.php?action=advertiser&actiontype=search&searchtype=2&searchval=";
		echo $user['uid'];
		echo "\">";
		echo $user['username'];
		echo "</a></td>\r\n                        <td>";
		echo $at['name'];
		echo "</td>\r\n                        <td>";
		echo ucfirst( $a['plantype'] );
		echo "</td>\r\n                        <td>";
		echo $a['priority'];
		echo " <a href=\"?action=ads&actiontype=editpriority&adsid=";
		echo $a['adsid'];
		echo "&keepThis=true&TB_iframe=true&height=120&width=380\"  title=\"设置权重 “#";
		echo $a['adsid'];
		echo "”\"   class=\"thickbox\">设置</a></td>\r\n                        <td>";
		echo ( integer )$a['v'];
		echo "</td>\r\n                        <td>";
		echo ( integer )$a['n'];
		echo "</td>\r\n                        <td>";
		if ( $user['status'] != "2" )
		{
				echo " <font color=\"red\">广告商未激活</font>";
		}
		else if ( $a['planstatus'] != "1" )
		{
				echo "<font color=\"red\">计划未激活</font>";
		}
		else if ( $a['status'] == "3" )
		{
				echo "<font color=\"green\">投放中</font>";
		}
		else if ( $a['status'] == "0" )
		{
				echo "<font color=\"red\">新增待审</font>";
		}
		else if ( $a['status'] == "1" )
		{
				echo "<font color=\"red\">已被拒绝</font>";
		}
		else if ( $a['status'] == "2" )
		{
				echo "<font color=\"red\">修改待审</font>";
		}
		else if ( $a['status'] == "4" )
		{
				echo "<font color=\"red\">已被锁定</font>";
		}
		echo "</td>\r\n                        <td>创建于</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      \r\n                      \r\n                       <tr class=\"td_b_m\" onmouseover=\"\$('#e_";
		echo $a['adsid'];
		echo "').show()\" onmouseout=\"\$('#e_";
		echo $a['adsid'];
		echo "').hide()\">\r\n                         <td height=\"33\"  class=\"td_b_4\" >&nbsp;</td>\r\n                         <td style=\"padding-left:3px\">\r\n\t\t\t \r\n\t\t\t\t\t\t<img  src='/templates/";
		echo Z_TPL;
		echo "/images/ico-bj.jpg' width=\"16\" height=\"16\" align='absmiddle' id=\"mark_";
		echo $a['adsid'];
		echo "\"  ";
		if ( $a['mark'] == 0 )
		{
				echo " style=\"display:none\"";
		}
		echo "/>&nbsp;</td>\r\n                         <td>&nbsp;</td>\r\n                         <td colspan=\"8\"><span style=\"display:none\" id=\"e_";
		echo $a['adsid'];
		echo "\"><a href=\"do.php?action=showads&adsid=";
		echo $a['adsid'];
		echo "\" target=\"_blank\">浏览</a>&nbsp;| <a href=\"do.php?action=editads&planid=";
		echo $a['planid'];
		echo "&adsid=";
		echo $a['adsid'];
		echo "&adstypeid=";
		echo $a['adstypeid'];
		echo "\">编辑</a>&nbsp;|&nbsp;<a href=\"do.php?action=ads&actiontype=postchoose&adsid[]=";
		echo $a['adsid'];
		echo "&choosetype=unlock\" onclick=\"return confirm('确定激活广告么?')\">激活</a>&nbsp;|&nbsp; <a href=\"?action=ads&actiontype=statudeny&adsid=";
		echo $a['adsid'];
		echo "&keepThis=true&TB_iframe=true&height=160&width=400\"  title=\"拒绝 “#";
		echo $a['adsid'];
		echo "”\"   class=\"thickbox\">拒绝</a>&nbsp;|&nbsp; <a href=\"do.php?action=ads&actiontype=postchoose&adsid[]=";
		echo $a['adsid'];
		echo "&choosetype=lock\" onclick=\"return confirm('确定锁定广告么?')\">锁定</a>&nbsp;|&nbsp; <a href=\"do.php?action=ads&actiontype=postchoose&adsid[]=";
		echo $a['adsid'];
		echo "&choosetype=del\" onclick=\"return confirm('确定删除广告么?')\">删除</a>&nbsp;|&nbsp; <a title=\"给这个广告做一个标记\" href=\"javascript:mark(";
		echo $a['adsid'];
		echo ",";
		echo $a['mark'];
		echo ")\" >标记</a>&nbsp;|&nbsp; <a href=\"do.php?action=statsads&timerange=a&searchtype=1&searchval=";
		echo $a['adsid'];
		echo "\">报表</a>\r\n\t\t\t\t\t\t";
		if ( $a['adstypeid'] != 13 )
		{
				echo " &nbsp;|&nbsp; <a href=\"do.php?action=ads&actiontype=inzone&adsid=";
				echo $a['adsid'];
				echo "&TB_iframe=true&height=120&width=400\"  title=\"“#";
				echo $a['adsid'];
				echo "”植入到广告位 \"   class=\"thickbox\" >植入到广告位</a>";
		}
		echo "\t\t\t\t\t\t </span>&nbsp;</td>\r\n                         <td colspan=\"2\" align=\"right\">";
		echo $a['addtime'];
		echo "</td>\r\n                         <td  class=\"td_b_5\">&nbsp;</td>\r\n                       </tr>\r\n\t\t\t\t\t   \r\n\t\t\t\t\t    ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td>Id</td>\r\n                        <td>规格</td>\r\n                        <td>计划名称</td>\r\n                        <td>广告商</td>\r\n                        <td>类型</td>\r\n                        <td>计费</td>\r\n                        <td>权重</td>\r\n                        <td>当日浏览量</td>\r\n                        <td>当日结算数</td>\r\n                        <td>状态</td>\r\n                        <td>&nbsp;</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n            \r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n                    <option value=\"unlock\">激活</option>\r\n                    <option value=\"lock\">停止</option>\r\n                    <option value=\"del\">删除</option>\r\n                  </select>\r\n                        <input type=\"button\" name=\"Submit3\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = '删除';\t\r\n\tif(v == 'unlock')  t= '激活';\t\r\n\tif(v == 'lock') t = '停止';\r\n\tif(t=='') {alert('批量选项未选择');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('请选中您要操作的广告'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('您确认要'+ t +'这' + numchecked + '条广告？。\\n点“确认”'+ t +'，点“取消”取消操作。')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction mark(adsid,t){\r\n\tvar m = \$('#mark_'+adsid);\r\n\tif (m.is(':hidden')) {\r\n\t\tt=1;\r\n\t\tm.show();\r\n\t}else {\r\n\t\tt=0;\r\n\t\tm.hide();\r\n\t}\r\n\tajax(\"do.php?action=";
echo $action;
echo "&actiontype=mark&mark=\"+t+\"&adsid=\"+adsid+\"\");\t\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
