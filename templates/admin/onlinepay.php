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
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          <li><a  href=\"do.php?action=onlinepay&actiontype=add&TB_iframe=true&height=260&width=600\"  title=\"手动充值\"   class=\"thickbox\" ><img  src='/templates/";
echo Z_TPL;
echo "/images/add.gif' align='absmiddle' /> <strong>手动充值</strong></a></li>\r\n                          <li>|</li>\r\n\t\t\t\t\t\t  <li><a href=\"do.php?action=onlinepay\" ";
if ( $status == "" && $paytype == "" )
{
		echo "class=\"li-active\"";
}
echo ">全部</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=onlinepay&paytype=0\" ";
if ( $paytype == "0" )
{
		echo "class=\"li-active\"";
}
echo ">手动充值记录</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=onlinepay&paytype=1\" ";
if ( $paytype == "1" )
{
		echo "class=\"li-active\"";
}
echo ">在线充值记录</a> </li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=onlinepay&status=3\" ";
if ( $status == "3" )
{
		echo "class=\"li-active\"";
}
echo ">手动增加记录</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=onlinepay&status=4\" ";
if ( $status == "4" )
{
		echo "class=\"li-active\"";
}
echo ">在线扣除记录</a> </li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=onlinepay&status=0\" ";
if ( $status == "0" )
{
		echo "class=\"li-active\"";
}
echo ">充值没有完成</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=onlinepay&status=1\" ";
if ( $status == "1" )
{
		echo "class=\"li-active\"";
}
echo ">充值失败</a> </li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=onlinepay&paytype=bc\" ";
if ( $paytype == "bc" )
{
		echo "class=\"li-active\"";
}
echo ">补尝记录</a> </li>\r\n                        </ul></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n                    <option value=\"del\">删除</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"20\" />\r\n                    <select name=\"searchtype\">\r\n                     \t<option value=\"1\" >会员名称</option>\r\n                    </select>\r\n                    <input type=\"submit\" name=\"Submit22\" value=\"搜索\" class=\"submit-x\"/>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                  \r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid; \">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'id')\" /></td>\r\n                        <td width=\"80\">会员</td>\r\n                        <td width=\"220\">订单号</td>\r\n                        <td width=\"90\">金额(元)</td>\r\n                        <td width=\"90\">网关</td>\r\n                        <td width=\"120\">说明</td>\r\n                        <td width=\"140\">时间</td>\r\n                        <td width=\"80\">充值人</td>\r\n                        <td>状态</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                       ";
foreach ( ( array )$pay as $p )
{
		$u = $usermodel->gettusernamerow( $p['username'] );
		echo "\t\t\t\t\t  \r\n                      <tr class=\"td_b_m_d\"> \r\n                        <td height=\"35\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td><input type=\"checkbox\" name=\"onlineid[]\" value=\"";
		echo $p['onlineid'];
		echo "\" />                        </td>\r\n                        <td><a href=\"do.php?action=";
		if ( $u['type'] == 1 )
		{
				echo "affiliate";
		}
		else
		{
				echo "advertiser";
		}
		echo "&actiontype=search&searchval=";
		echo $p['username'];
		echo "&searchtype=1\">";
		echo $p['username'] == "" ? "已删除的会员" : $p['username'];
		echo "</a></td>\r\n                        <td>";
		if ( $p['orderid'] == "" )
		{
				echo "无";
		}
		echo $p['orderid'];
		if ( $p['paytype'] == "bc" )
		{
				echo " 补尝 ";
		}
		echo "</td>\r\n                        <td><font color=\"#FF0000\">";
		echo abs( $p['imoney'] );
		echo "</font></td>\r\n                        <td>";
		if ( $p['paytype'] == "" )
		{
				echo "手动";
		}
		else
		{
				echo $p['paytype'];
		}
		echo "</td>\r\n                        <td>";
		if ( $p['payinfo'] == "" )
		{
				echo "无";
		}
		echo $p['payinfo'];
		echo "</td>\r\n                        <td>";
		echo $p['addtime'];
		echo "</td>\r\n                        <td>";
		echo $p['adminuser'];
		echo "&nbsp;</td>\r\n                        <td>";
		if ( $p['status'] == "0" )
		{
				echo "<font color=red>充值没有完成</font>";
		}
		else if ( $p['status'] == "1" )
		{
				echo "<font color=blue>充值失败</font>";
		}
		else if ( $p['status'] == "2" )
		{
				echo " <font color=#ff6600>充值完成</font>";
		}
		else if ( $p['status'] == "3" )
		{
				echo " <font color=blue>增加</font>";
		}
		else if ( $p['status'] == "4" )
		{
				echo " <font color=red>扣除</font>";
		}
		echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      \r\n                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td >会员</td>\r\n                        <td>订单号</td>\r\n                        <td>金额(元)</td>\r\n                        <td>网关</td>\r\n                        <td>说明</td>\r\n                        <td>时间</td>\r\n                        <td>充值人</td>\r\n                        <td>状态</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                          <option>批量操作</option>\r\n                          <option value=\"del\">删除</option>\r\n                        </select>\r\n                        <input type=\"button\" name=\"Submit3\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n\r\n\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = '删除';\t\r\n\tif(t=='') {alert('批量选项未选择');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('请选中您要操作的项'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('您确认要'+ t +'这' + numchecked + '个 ？。\\n点“确认”'+ t +'，点“取消”取消操作。')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\n </script>\r\n \r\n";
include( TPL_DIR."/footer.php" );
?>
