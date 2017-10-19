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
echo "<script LANGUAGE=\"JavaScript\" src=\"/javascript/jiandate.js\"></script>\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n      <tr>\r\n        <td  valign=\"top\">";
if ( $statetype == "success" )
{
		echo "              <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"97%\" >\r\n                <tr>\r\n                  <td height=\"30\"><img  src='/templates/";
		echo Z_TPL;
		echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">操作成功！</span></td>\r\n                  <td>&nbsp;</td>\r\n                </tr>\r\n              </table>\r\n          <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n              ";
}
echo "              <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"   >\r\n                <tr>\r\n                  <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tr>\r\n                        <td><ul id=\"li-type\">\r\n                            <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=a\" ";
if ( $timerange == "a" )
{
		echo "class=\"li-active\"";
}
echo ">全部</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=";
echo DAYS."/".DAYS;
echo "\" ";
if ( $time_end == DAYS || $timerange == "" )
{
		echo "class=\"li-active\"";
}
echo ">今日报表</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=t\" ";
if ( $timerange == "t" )
{
		echo "class=\"li-active\"";
}
echo ">昨日报表</a> </li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=0&timerange=a\" ";
if ( $status == "0" )
{
		echo "class=\"li-active\"";
}
echo ">待确认</a> </li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=1&timerange=a\" ";
if ( $status == "1" )
{
		echo "class=\"li-active\"";
}
echo ">已确认</a> </li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=2&timerange=a\" ";
if ( $status == "2" )
{
		echo "class=\"li-active\"";
}
echo ">无效</a> </li>\r\n\t\t\t\t\t\t  ";
if ( $actiontype == "search" && 3 < strlen( $timerange ) )
{
		echo "\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"javascript:void(0)\" class=\"li-active\">";
		echo $timerange;
		echo "</a> </li>\r\n\t\t\t\t\t\t  ";
}
echo "\t\t\t  \r\n                        </ul></td>\r\n                        <td width=\"500\" align=\"right\"></td>\r\n                      </tr>\r\n                  </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><select name=\"select\"  onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n                    <option value=\"del\">删除</option>\r\n\t\t\t\t\t<option value=\"y\">有效</option>\r\n\t\t\t\t\t<option value=\"n\">无效</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                    &nbsp;\r\n                    &nbsp;\r\n                    <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n<input name=\"searchval\" type=\"text\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"16\"/>\r\n                                      &nbsp;\r\n                                      <select name=\"searchtype\" class=\"searchtype\" id=\"searchtype\">\r\n                                        <option value=\"1\" ";
if ( $searchtype == 1 )
{
		echo "selected";
}
echo " >会员名称</option>\r\n\t\t\t\t\t\t\t\t\t\t <option value=\"2\" ";
if ( $searchtype == 2 )
{
		echo "selected";
}
echo " >订单号</option>\r\n                                      </select>\r\n                                      <select name=\"plantype\" class=\"plantype\" id=\"plantype\">\r\n                                        <option value=\"\">所有类型</option>\r\n                                        ";
foreach ( ( array )$plantypearr as $pt )
{
		echo "                                        <option value=\"";
		echo $pt['plantype'];
		echo "\" ";
		if ( $plantype == $pt['plantype'] )
		{
				echo "selected";
		}
		echo " >";
		echo ucfirst( $pt['plantype'] );
		echo "类型</option>\r\n                                        ";
}
echo "                                      </select>\r\n                                      <select name=\"planid\" id=\"planid\">\r\n                                         <option value=\"\">所有产品</option>\r\n\t\t\t\t\t\t\t\t\t ";
foreach ( ( array )$plantypearr as $ptr )
{
		echo "\t\t\t\t\t\t\t\t\t  <optgroup  label=\"";
		echo ucfirst( $ptr['plantype'] );
		echo "\">\r\n\t\t\t\t\t\t\t\t\t\t";
		foreach ( ( array )$allplan as $pt )
		{
				if ( !( $pt['plantype'] !== $ptr['plantype'] ) )
				{
						echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
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
						echo "]</option>\r\n\t\t\t\t\t\t\t\t\t\t";
				}
		}
		echo "\t\t\t\t\t\t\t\t\t\t </optgroup>\r\n\t\t\t\t\t\t\t\t\t\t";
}
echo "                                      </select>\r\n                                      <select name=\"timerange\" id=\"timerange\" style=\"width:200px\">\r\n\t\t\t\t\t\t\t\t\t  <option value=\"";
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
echo "\">";
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
echo "</option>\r\n\t\t\t\t\t\t\t\t\t  <option  value=\"a\" ";
echo $timerange == "a" ? "selected " : "";
echo ">所有时间段</option>\r\n\t\t\t\t\t\t\t\t\t  <option value=\"t\" ";
echo $timerange == "t" ? " selected" : "";
echo " >昨天</option>\r\n\t\t\t\t\t\t\t\t\t  <option value=\"w\" ";
echo $timerange == "w" ? " selected" : "";
echo " >过去一周内</option>\r\n\t\t\t\t\t\t\t\t\t  <option value=\"m\" ";
echo $timerange == "m" ? " selected" : "";
echo ">本月内</option>\r\n\t\t\t\t\t\t\t\t\t  <option value=\"l\" ";
echo $timerange == "l" ? " selected" : "";
echo ">上月的</option>\r\n\t\t\t\t\t\t\t\t\t</select> \r\n\t\t\t\t\t\t\t\t\t  <img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','2')\"/>\r\n\t\t\t\t\t\t\t\t\t  <input name=\"Submit\" type=\"submit\" class=\"submit-x\" id=\"Submit\" value=\"查询\"/>\r\n                    </form>\t\t\t\t  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                      <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n\t\t\t\t\t   <input name=\"reurl\"  id=\"reurl\"  type=\"hidden\" value=\"";
echo $reurl;
echo "\" />\r\n                      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                        <tr class=\"td_b_2\">\r\n                          <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                          <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'id')\" /></td>\r\n                          <td width=\"50\">类型</td>\r\n                          <td width=\"120\">订单号</td>\r\n                          <td width=\"120\">IP地址</td>\r\n                          <td width=\"80\">会员名称</td>\r\n                          <td width=\"160\">计划名称</td>\r\n                          <td width=\"65\">广告ID</td>\r\n                          <td width=\"65\">扣量</td>\r\n                          <td width=\"80\">结算金额</td>\r\n                          <td width=\"70\">操作</td>\r\n                          <td>状态</td>\r\n                          <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                        </tr>\r\n \r\n\t\t\t\t\t    ";
if ( !$orders )
{
		echo "<tr><td height=\"60\"   class=\"td_b_4 \" id=\"b-bottom\" >&nbsp;</td>\r\n\t\t\t\t\t\t\t\t  <td colspan=\"11\" align=\"center\">无报表</td>\r\n\t\t\t\t\t\t\t\t  <td  class=\"td_b_5\">&nbsp;</td>\r\n\t\t\t\t\t\t\t\t</tr>";
}
foreach ( ( array )$orders as $o )
{
		$u = $usermodel->getusersuidrow( $o['uid'] );
		echo "                        <tr>\r\n                          <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                          <td  >\r\n\t\t\t\t\t\t  ";
		if ( $u['status'] != "2" )
		{
				echo "<span style=\"color: red;font-size: 9px;\">X</span>";
		}
		else
		{
				echo "\t\t\t\t\t\t  <input name=\"orderid[]\" type=\"checkbox\" id=\"orderid[]\" value=\"";
				echo $o['orderid'];
				echo "\" />\r\n\t\t\t\t\t\t  ";
		}
		echo "\t\t\t\t\t\t  </td>\r\n                          <td>";
		echo ucfirst( $o['plantype'] );
		echo "</td>\r\n                          <td width=\"120\"> ";
		echo $o['orders'];
		echo "</td>\r\n                          <td width=\"120\">";
		echo $o['ip']."<br/>".convertip( $o['ip'] );
		echo "</td>\r\n                          <td><a href=\"do.php?action=affiliate&actiontype=search&searchval=";
		echo $o['uid'];
		echo "&searchtype=2\">";
		echo $o['username'];
		echo "</a></td>\r\n                          <td width=\"160\"><a href=\"do.php?action=plan&&actiontype=search&searchval=";
		echo $o['planid'];
		echo "&searchtype=2\">";
		echo $o['planname'] == "" ? "已删除的计划" : $o['planname'];
		echo "</a><br>";
		if ( $o['datatime'] == "0" )
		{
				echo "实时";
		}
		else
		{
				echo "延时".$o['datatime']."天";
		}
		echo "</td>\r\n                          <td>";
		echo $o['adsid'];
		echo "</td>\r\n                          <td>";
		if ( $o['deduction'] == 1 )
		{
				echo "<font  color=#FF0000>是</font>";
		}
		else
		{
				echo "否";
		}
		echo "</td>\r\n                          <td>";
		echo abs( $o['price'] );
		echo "\t\t\t\t\t\t\t<br />\r\n\t\t\t\t\t\t\t<font color=\"gray\">";
		echo abs( $o['priceadv'] );
		echo "</font></td>\r\n                          <td>";
		if ( $o['status'] != "0" )
		{
				echo "已确认";
		}
		else if ( $u['status'] != "2" )
		{
				echo "<font color=\"ff0000\">无法操作</font>";
		}
		else
		{
				echo "<a href='do.php?action=orders&actiontype=postchoose&choosetype=y&orderid[]=".$o['orderid']."&reurl=".$reurl."' onclick=\"return confirm('确定为有效\\?')\">有效</a> <a href='do.php?action=orders&actiontype=postchoose&choosetype=n&orderid[]=".$o['orderid']."&reurl=".$reurl."' onclick=\"return confirm('确定为无效\\?')\">无效</a>";
		}
		echo "\t </td>\r\n                          <td>";
		if ( $u['status'] != "2" )
		{
				echo "<font color=\"ff0000\">会员未激活</font>";
		}
		else if ( $o['status'] == "1" )
		{
				echo "<font color=\"blue\">有效</font>";
		}
		else if ( $o['status'] == "0" )
		{
				echo "<font color=\"ff0000\">待确认</font>";
		}
		else if ( $o['status'] == "2" )
		{
				echo "<font color=\"ff0000\">无效</font>";
		}
		echo "</td>\r\n                          <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                        </tr>\r\n\t\t\t\t\t\t \r\n\t\t\t\t\t     <tr class=\"td_b_m\" style=\"color:gray\">\r\n                          <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                          <td  >&nbsp;</td>\r\n                          <td colspan=\"10\" style=\"padding-bottom:5px;padding-top:5px;\">\r\n\t\t\t\t\t\t  下单：";
		echo $o['addtime'];
		if ( $o['confirmtime'] != "0000-00-00" )
		{
				echo "&nbsp;&nbsp;确认：".$o['confirmtime'];
		}
		if ( $o['like'] != "" )
		{
				echo "<br>信息：".$o['like'];
		}
		if ( $o['referer'] != "" )
		{
				echo "<br>下单来源：".$o['referer'];
		}
		echo "</td>\r\n                          <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                        </tr>\r\n\t\t\t\t\t\t\r\n\t\t\t\t\t\t ";
}
echo "                        <tr class=\"td_b_7\">\r\n                          <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                          <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'id','chkallde')\" /></td>\r\n                          <td>类型</td>\r\n                          <td>订单号</td>\r\n                          <td>IP地址</td>\r\n                          <td>会员名称</td>\r\n                          <td>计划名称</td>\r\n                          <td>广告ID</td>\r\n                          <td>扣量</td>\r\n                          <td>结算金额</td>\r\n                          <td>操作</td>\r\n                          <td>状态</td>\r\n                          <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                        </tr>\r\n                      </table>\r\n                  </form></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tr>\r\n                        <td width=\"200\"><select name=\"select\"  onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n                    <option value=\"del\">删除</option>\r\n\t\t\t\t\t<option value=\"y\">有效</option>\r\n\t\t\t\t\t<option value=\"n\">无效</option>\r\n                  </select>\r\n                    <input type=\"button\" name=\"Submit\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                        <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                      </tr>\r\n                  </table></td>\r\n                </tr>\r\n            </table></td>\r\n      </tr>\r\n    </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = '删除';\t\r\n\tif(v == 'y') t = '有效';\t\r\n\tif(v == 'n') t = '无效';\t\r\n\tif(t=='') {alert('批量选项未选择');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('请选中您要操作的订单'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('您确认要'+ t +'这' + numchecked + '个订单？。\\n点“确认”'+ t +'，点“取消”取消操作。')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\n\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
