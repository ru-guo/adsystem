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
		echo "/images/ico_success_16.gif' align='absmiddle'><span style=\"margin-left:10px;\">操作成功！</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
}
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "\" ";
if ( !$actiontype )
{
		echo "class=\"li-active\"";
}
echo ">全部</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=unlock\" ";
if ( $actiontype == "unlock" )
{
		echo "class=\"li-active\"";
}
echo ">已审核</a></li>\r\n                          ";
if ( $action == "affiliate" || $action == "advertiser" )
{
		echo "                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
		echo $action;
		echo "&actiontype=waitact\" ";
		if ( $actiontype == "waitact" )
		{
				echo "class=\"li-active\"";
		}
		echo ">等待审核</a> </li>\r\n                          ";
}
echo "                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=lock\" ";
if ( $actiontype == "lock" )
{
		echo "class=\"li-active\"";
}
echo ">已锁定</a></li>\r\n                        </ul></td>\r\n                      <td width=\"500\" align=\"right\">";
if ( $_SESSION['adminusertype'] == "1" )
{
		echo "                        <ul id=\"li-type\">\r\n                          <li><span style='font-size:14px; color:#FF0000;font-weight: bold;padding-right: 30px;padding-left: 120px;'><font color='blue'>未结算:</font>￥";
		echo abs( $sumpay );
		echo " </span> <span style='font-size:14px; color:#FF0000;font-weight: bold;padding-right: 10px;'><font color='blue'>可结算:</font>￥";
		echo abs( $sumpayok );
		echo "</span> </li>\r\n                        </ul>\r\n                        ";
}
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n                    <option value=\"unlock\">激活</option>\r\n                    <option value=\"lock\">锁定</option>\r\n                    <option value=\"del\">删除</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  ";
if ( $action == "affiliate" || $action == "advertiser" )
{
		echo "                  <form action=\"?action=";
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
		echo " >升序</option>\r\n                    </select>\r\n                    <select name=\"sortingtype\" class=\"select\" id=\"sortingtype\">\r\n                      <option value=\"money\" ";
		if ( $sortingtype == "money" )
		{
				echo "selected";
		}
		echo ">总余额</option>\r\n                      ";
		if ( $action != "advertiser" )
		{
				echo "                      <option value=\"daymoney\" ";
				if ( $sortingtype == "daymoney" )
				{
						echo "selected";
				}
				echo ">日余额</option>\r\n                      <option value=\"weekmoney\" ";
				if ( $sortingtype == "weekmoney" )
				{
						echo "selected";
				}
				echo ">周余额</option>\r\n                      <option value=\"monthmoney\" ";
				if ( $sortingtype == "monthmoney" )
				{
						echo "selected";
				}
				echo ">月余额</option>\r\n                      <option value=\"xmoney\" ";
				if ( $sortingtype == "xmoney" )
				{
						echo "selected";
				}
				echo ">下线金额</option>\r\n                      <option value=\"cpcdeduction\" ";
				if ( $sortingtype == "cpcdeduction" )
				{
						echo "selected";
				}
				echo ">点击扣量</option>\r\n                      <option value=\"cpmdeduction\" ";
				if ( $sortingtype == "cpmdeduction" )
				{
						echo "selected";
				}
				echo ">弹窗扣量</option>\r\n                      <option value=\"cpadeduction\" ";
				if ( $sortingtype == "cpadeduction" )
				{
						echo "selected";
				}
				echo ">注册扣量</option>\r\n                      <option value=\"cpsdeduction\" ";
				if ( $sortingtype == "cpsdeduction" )
				{
						echo "selected";
				}
				echo ">销售扣量</option>\r\n                      <option value=\"cpvdeduction ";
				if ( $sortingtype == "cpvdeduction" )
				{
						echo "selected";
				}
				echo "\">展示扣量</option>\r\n                      ";
		}
		echo "                    </select>\r\n                    <input type=\"Submit\" name=\"Submit2\" value=\"排序\" class=\"submit-x\"  />\r\n                  </form>\r\n                  <form action=\"?action=";
		echo $action;
		echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"userval\" value=\"";
		echo $searchval;
		echo "\" size=\"20\" />\r\n                    <select name=\"searchtype\">\r\n                      <option value=\"1\" ";
		if ( $searchtype == "1" )
		{
				echo "selected";
		}
		echo ">会员名称</option>\r\n                      <option value=\"2\" ";
		if ( $searchtype == "2" )
		{
				echo "selected";
		}
		echo ">会员ID</option>\r\n\t\t\t\t\t  ";
		if ( $action == "affiliate" )
		{
				echo "                      <option value=\"4\" ";
				if ( $searchtype == "4" )
				{
						echo "selected";
				}
				echo ">属于客服</option>\r\n\t\t\t\t\t   <option value=\"6\" ";
				if ( $searchtype == "6" )
				{
						echo "selected";
				}
				echo ">收款人</option>\r\n                      ";
		}
		echo "\t\t\t\t\t  ";
		if ( $action == "advertiser" )
		{
				echo "                      <option value=\"5\" ";
				if ( $searchtype == "5" )
				{
						echo "selected";
				}
				echo ">属于商务</option>\r\n                      ";
		}
		echo "                      ";
		if ( $action != "advertiser" )
		{
				echo "                      <option value=\"3\" ";
				if ( $searchtype == "3" )
				{
						echo "selected";
				}
				echo ">查询下线</option>\r\n                      ";
		}
		echo "                    </select>\r\n                    <input type=\"submit\" name=\"Submit22\" value=\"搜索\" class=\"submit-x\"/>\r\n                  </form>\r\n                  ";
}
echo "                </td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    ";
if ( $action == "affiliate" )
{
		echo "                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'uid')\" /></td>\r\n                        <td width=\"60\">Uid</td>\r\n                        <td width=\"100\">用户名</td>\r\n                        <td width=\"75\">总余额</td>\r\n                        <td width=\"75\">日余额</td>\r\n                        <td width=\"75\">周余额</td>\r\n                        <td width=\"75\">月余额</td>\r\n                        <td width=\"75\">下线余额</td>\r\n                        <td width=\"80\">可用积分</td>\r\n                        <td width=\"80\">扣量</td>\r\n                        <td width=\"60\">步长值</td>\r\n                        <td width=\"60\">状态</td>\r\n                        <td>最后登录</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
		foreach ( ( array )$users as $u )
		{
				if ( $u['cpcdeduction'] != 0 || $u['cpmdeduction'] != 0 || $u['cpadeduction'] != 0 || $u['cpsdeduction'] != 0 || $u['cpvdeduction'] != 0 )
				{
						$koudian = $u['cpcdeduction'].",".$u['cpmdeduction'].",".$u['cpadeduction'].",".$u['cpsdeduction'].",".$u['cpvdeduction'];
				}
				else
				{
						$koudian = "全局";
				}
				echo "                      <tr onmouseover=\"\$('#e_";
				echo $u['uid'];
				echo "').show()\" onmouseout=\"\$('#e_";
				echo $u['uid'];
				echo "').hide()\">\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input name=\"uid[]\" type=\"checkbox\" id=\"uid[]\" value=\"";
				echo $u['uid'];
				echo "\" /></td>\r\n                        <td><a href=\"do.php?action=userlogin&uid=";
				echo $u['uid'];
				echo "\" title=\"跳转到会员管理后台\" target=\"_blank\">";
				echo $u['uid'];
				echo "</a></td>\r\n                        <td><strong>";
				echo $u['username'];
				echo "</strong></td>\r\n                        <td>";
				echo round( $u['money'], 2 );
				echo "</td>\r\n                        <td>";
				echo round( $u['daymoney'], 2 );
				echo "</td>\r\n                        <td>";
				echo round( $u['weekmoney'], 2 );
				echo "</td>\r\n                        <td>";
				echo round( $u['monthmoney'], 2 );
				echo "</td>\r\n                        <td>";
				echo round( $u['xmoney'], 2 );
				echo "</td>\r\n                        <td>";
				echo $u['integral'];
				echo "</td>\r\n                        <td>";
				echo $koudian;
				echo "</td>\r\n                        <td>";
				echo $u['pvstep'];
				echo "</td>\r\n                        <td>";
				if ( $u['status'] == 0 )
				{
						echo "<font color=\"ff0000\">待审</font>";
				}
				if ( $u['status'] == 1 )
				{
						echo "<font color=\"ff0000\">邮件激活</font>";
				}
				if ( $u['status'] == 2 )
				{
						echo "<font color=\"\">活动</font>";
				}
				if ( $u['status'] == 3 )
				{
						echo "<font color=\"ff0000\">拒绝</font>";
				}
				if ( $u['status'] == 4 )
				{
						echo "<font color=\"ff0000\">锁定</font>";
				}
				echo "</td>\r\n                        <td>";
				echo $u['logintime'] == "" ? "未登入" : substr( $u['logintime'], 0, 10 );
				echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr  class=\"td_b_m\" onmouseover=\"\$('#e_";
				echo $u['uid'];
				echo "').show()\" onmouseout=\"\$('#e_";
				echo $u['uid'];
				echo "').hide()\">\r\n                        <td height=\"25\"  class=\"td_b_4\" >&nbsp;</td>\r\n                        <td>&nbsp;\r\n                          ";
				if ( TIMES - 604800 < strtotime( $u['logintime'] ) )
				{
						echo "                          <img  src='/templates/";
						echo Z_TPL;
						echo "/images/active.png' align='absmiddle' alt=\"活跃\" />\r\n                          ";
				}
				else
				{
						echo "                          <img  src='/templates/";
						echo Z_TPL;
						echo "/images/inactive.png' align='absmiddle' alt=\"非活跃\" />\r\n                          ";
				}
				echo "                        </td>\r\n                        <td>&nbsp;</td>\r\n                        <td colspan=\"11\"><span style=\"display:none\" id=\"e_";
				echo $u['uid'];
				echo "\"><a href=\"dos.php?action=";
				echo $action;
				echo "&actiontype=editusers&uid=";
				echo $u['uid'];
				echo "\" title=\"编辑这个会员\">编辑</a> | <a href=\"do.php?action=";
				echo $action;
				echo "&actiontype=postchoose&choosetype=unlock&uid[]=";
				echo $u['uid'];
				echo "\" title=\"激活这个会员\"  onclick=\"return activate()\">激活</a> | <a href=\"do.php?action=";
				echo $action;
				echo "&actiontype=postchoose&choosetype=lock&uid[]=";
				echo $u['uid'];
				echo "\" title=\"锁定这个会员\" onclick=\"return locks(";
				echo $u['uid'];
				echo ")\">锁定<a/> | <a title=\"删除这个会员\" href=\"do.php?action=";
				echo $action;
				echo "&actiontype=postchoose&choosetype=del&uid[]=";
				echo $u['uid'];
				echo "\" onclick=\"if ( confirm('您将删除这个会员“";
				echo $u['username'];
				echo "”\\n您确定么？') ) { return true;}return false;\">删除</a> | <a href=\"dos.php?action=onlinepay&actiontype=add&username=";
				echo $u['username'];
				echo "&type=";
				echo $u['type'];
				echo "&TB_iframe=true&height=260&width=600\"  title=\"手动充值\"   class=\"thickbox\" >增/扣款项</a> | <a href=\"do.php?action=statsuser&actiontype=search&searchtype=1&searchval=";
				echo $u['uid'];
				echo "&timerange=a\" title=\"查看\" >报表</a> | <a href=\"do.php?action=site&actiontype=search&searchtype=2&searchval=";
				echo $u['uid'];
				echo "\" title=\"查看\" >网站</a> | <a href=\"do.php?action=zone&actiontype=search&searchtype=2&searchval=";
				echo $u['uid'];
				echo "\" title=\"查看\" >广告位</a> | <a href=\"do.php?action=pm&actiontype=add&username=";
				echo $u['username'];
				echo "&TB_iframe=true&height=250&width=600\" title=\"发送消息\" class=\"thickbox\">发送短信</a> | <a href=\"do.php?action=email&username=";
				echo $u['username'];
				echo "\" title=\"发送邮件\" target=\"_blank\" >发送邮件</a> | <a href=\"dos.php?action=trend&actiontype=dayadnweek&searchtype=2&searchval=";
				echo $u['uid'];
				echo "&timerange=w&TB_iframe=true&height=300&width=700\"  title=\"“";
				echo $u['username']."";
				echo "”的最近一星期走势图\"   class=\"thickbox\" >一星期走势图</a>&nbsp;|&nbsp;<a href=\"do.php?action=trend&actiontype=trendarea&searchtype=2&searchval=";
				echo $u['uid'];
				echo "&timerange=w&TB_iframe=true&height=300&width=700\"  title=\"“";
				echo $u['username']."";
				echo "”的地区分布\"   class=\"thickbox\" >地区分布</a>&nbsp;|&nbsp;<a href=\"do.php?action=";
				echo $action;
				echo "&actiontype=editdeduction&uid=";
				echo $u['uid'];
				echo "&TB_iframe=true&height=360&width=560\"  title=\"“";
				echo $u['username']."";
				echo "”的相关设置\"   class=\"thickbox\" >扣量等设置</a></span>&nbsp;</span></td>\r\n                        <td  class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
		}
		echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td>Uid</td>\r\n                        <td>用户名</td>\r\n                        <td>总余额</td>\r\n                        <td>日余额</td>\r\n                        <td>周余额</td>\r\n                        <td>月余额</td>\r\n                        <td>下线余额</td>\r\n                        <td>可用积分</td>\r\n                        <td>扣量</td>\r\n                        <td>步长值</td>\r\n                        <td>状态</td>\r\n                        <td>&nbsp;</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    ";
}
if ( $action == "advertiser" )
{
		echo "                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'uid')\" /></td>\r\n                        <td width=\"60\">Uid</td>\r\n                        <td width=\"100\">用户名</td>\r\n                        <td width=\"75\">余额</td>\r\n                        <td width=\"75\">联系人</td>\r\n                        <td width=\"85\">Email</td>\r\n                        <td width=\"100\">电话</td>\r\n                        <td width=\"95\">手机</td>\r\n                        <td width=\"85\">QQ</td>\r\n                        <td width=\"60\">状态</td>\r\n                        <td>&nbsp;</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
		foreach ( ( array )$users as $u )
		{
				echo "                      <tr onmouseover=\"\$('#e_";
				echo $u['uid'];
				echo "').show()\" onmouseout=\"\$('#e_";
				echo $u['uid'];
				echo "').hide()\">\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input name=\"uid[]\" type=\"checkbox\" id=\"uid[]\" value=\"";
				echo $u['uid'];
				echo "\" /></td>\r\n                        <td><a href=\"do.php?action=userlogin&uid=";
				echo $u['uid'];
				echo "\" title=\"跳转到会员管理后台\" target=\"_blank\">";
				echo $u['uid'];
				echo "</a></td>\r\n                        <td><strong>";
				echo $u['username'];
				echo "</strong></td>\r\n                        <td>";
				echo round( $u['money'], 2 );
				echo "</td>\r\n                        <td>";
				echo $u['contact'];
				echo "</td>\r\n                        <td>";
				echo $u['email'];
				echo "</td>\r\n                        <td>";
				echo $u['tel'];
				echo "</td>\r\n                        <td>";
				echo $u['mobile'];
				echo "</td>\r\n                        <td>";
				echo $u['qq'];
				echo "</td>\r\n                        <td>";
				if ( $u['status'] == 0 )
				{
						echo "<font color=\"ff0000\">待审</font>";
				}
				if ( $u['status'] == 1 )
				{
						echo "<font color=\"ff0000\">邮件激活</font>";
				}
				if ( $u['status'] == 2 )
				{
						echo "<font color=\"\">活动</font>";
				}
				if ( $u['status'] == 3 )
				{
						echo "<font color=\"ff0000\">拒绝</font>";
				}
				if ( $u['status'] == 4 )
				{
						echo "<font color=\"ff0000\">锁定</font>";
				}
				echo "</td>\r\n                        <td>最后登入</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr  class=\"td_b_m\" onmouseover=\"\$('#e_";
				echo $u['uid'];
				echo "').show()\" onmouseout=\"\$('#e_";
				echo $u['uid'];
				echo "').hide()\">\r\n                        <td height=\"25\"  class=\"td_b_4\" >&nbsp;</td>\r\n                        <td  >&nbsp;\r\n                          ";
				if ( TIMES - 604800 < strtotime( $u['logintime'] ) )
				{
						echo "                          <img  src='/templates/";
						echo Z_TPL;
						echo "/images/active.png' align='absmiddle' alt=\"活跃\" />\r\n                          ";
				}
				else
				{
						echo "                          <img  src='/templates/";
						echo Z_TPL;
						echo "/images/inactive.png' align='absmiddle' alt=\"非活跃\" />\r\n                          ";
				}
				echo "</td>\r\n                        <td>&nbsp;</td>\r\n                        <td colspan=\"7\" ><span style=\"display:none\" id=\"e_";
				echo $u['uid'];
				echo "\"><a href=\"dos.php?action=";
				echo $action;
				echo "&actiontype=editusers&uid=";
				echo $u['uid'];
				echo "\" title=\"编辑这个会员\">编辑</a> | <a href=\"do.php?action=";
				echo $action;
				echo "&actiontype=postchoose&choosetype=unlock&uid[]=";
				echo $u['uid'];
				echo "\" title=\"激活这个会员\"  onclick=\"return activate()\">激活</a> | <a href=\"do.php?action=";
				echo $action;
				echo "&actiontype=postchoose&choosetype=lock&uid[]=";
				echo $u['uid'];
				echo "\" title=\"锁定这个会员\" onclick=\"if ( confirm('您将锁定这个会员“";
				echo $u['username'];
				echo "”\\n您确定么？') ) { return true;}return false;\">锁定<a/> | <a title=\"删除这个会员\" href=\"do.php?action=";
				echo $action;
				echo "&actiontype=postchoose&choosetype=del&uid[]=";
				echo $u['uid'];
				echo "\" onclick=\"if ( confirm('您将删除这个会员“";
				echo $u['username'];
				echo "”\\n您确定么？') ) { return true;}return false;\">删除</a> | <a href=\"do.php?action=onlinepay&actiontype=add&username=";
				echo $u['username'];
				echo "&type=";
				echo $u['type'];
				echo "=&TB_iframe=true&height=260&width=600\"  title=\"手动充值\"   class=\"thickbox\" >增/扣款项</a> | <a href=\"do.php?action=plan&actiontype=search&searchtype=3&searchval=";
				echo $u['uid'];
				echo "\" title=\"查看\" >广告计划</a> | <a href=\"do.php?action=createplan&uid=";
				echo $u['uid'];
				echo "\" title=\"新建计划\" >  新建计划</a>  | <a href=\"do.php?action=ads&actiontype=search&searchtype=3&searchval=";
				echo $u['uid'];
				echo "\" title=\"查看\" >广告</a> | <a href=\"do.php?action=pm&actiontype=add&username=";
				echo $u['username'];
				echo "&TB_iframe=true&height=250&width=600\" title=\"发送消息\" class=\"thickbox\">发送短信</a> | <a href=\"do.php?action=users&actiontype=editusers&usertype=&uid=";
				echo $u['uid'];
				echo "\" title=\"查看\" >发送邮件</a></span>&nbsp;</td>\r\n                        <td colspan=\"2\" align=\"right\">";
				echo $u['logintime'] == "" ? "未登入" : substr( $u['logintime'], 0, 10 );
				echo "</td>\r\n                        <td  class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
		}
		echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td>Uid</td>\r\n                        <td>用户名</td>\r\n                        <td>余额</td>\r\n                        <td>联系人</td>\r\n                        <td>Email</td>\r\n                        <td>电话</td>\r\n                        <td>手机</td>\r\n                        <td>QQ</td>\r\n                        <td>状态</td>\r\n                        <td>&nbsp;</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    ";
}
if ( $action == "service" || $action == "commercial" )
{
		echo "                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'uid')\" /></td>\r\n                        <td width=\"60\">Uid</td>\r\n                        <td width=\"100\">用户名称</td>\r\n                        <td width=\"80\">联系人</td>\r\n                        <td width=\"95\">QQ</td>\r\n                        <td width=\"90\">业绩</td>\r\n                        <td width=\"50\">活跃</td>\r\n                        <td width=\"180\">管理</td>\r\n                        <td width=\"60\">状态</td>\r\n                        <td>最后登入</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
		foreach ( ( array )$users as $u )
		{
				if ( $action == "service" )
				{
						$s = $statsmodel->sumpayusers( $u['uid'] );
				}
				if ( $action == "commercial" )
				{
						$s = $statsmodel->sumadvpay( $u['uid'] );
				}
				echo "                      <tr onmouseover=\"\$('#e_";
				echo $u['uid'];
				echo "').show()\" onmouseout=\"\$('#e_";
				echo $u['uid'];
				echo "').hide()\">\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input name=\"uid[]\" type=\"checkbox\" id=\"uid[]\" value=\"";
				echo $u['uid'];
				echo "\" /></td>\r\n                        <td>\r\n\t\t\t\t\t\t";
				if ( $action == "service" )
				{
						echo "\t\t\t\t\t\t<a href=\"do.php?action=userlogin&uid=";
						echo $u['uid'];
						echo "\" title=\"跳转到会员管理后台\" target=\"_blank\">";
						echo $u['uid'];
						echo "</a>\r\n\t\t\t\t\t\t";
				}
				echo "\t\t\t\t\t\t";
				if ( $action == "commercial" )
				{
						echo "\t\t\t\t\t\t<a href=\"do.php?action=userlogin&uid=";
						echo $u['uid'];
						echo "\" title=\"跳转到会员管理后台\" target=\"_blank\">";
						echo $u['uid'];
						echo "</a>\r\n\t\t\t\t\t\t";
				}
				echo "\t\t\t\t\t\t</td>\r\n                        <td><strong>";
				echo $u['username'];
				echo "</strong></td>\r\n                        <td>";
				echo $u['contact'];
				echo "</td>\r\n                        <td>";
				echo $u['qq'];
				echo "</td>\r\n                        <td>";
				echo abs( $s['pay'] );
				echo "</td>\r\n                        <td>&nbsp;\r\n                          ";
				if ( TIMES - 259200 < strtotime( $u['logintime'] ) )
				{
						echo "                          <img  src='/templates/";
						echo Z_TPL;
						echo "/images/active.png' align='absmiddle' alt=\"活跃\" />\r\n                          ";
				}
				else
				{
						echo "                          <img  src='/templates/";
						echo Z_TPL;
						echo "/images/inactive.png' align='absmiddle' alt=\"非活跃\" />\r\n                          ";
				}
				echo "</td>\r\n                        <td><a href=\"dos.php?action=";
				echo $action;
				echo "&actiontype=editusers&uid=";
				echo $u['uid'];
				echo "\" title=\"编辑这个会员\">编辑</a> | <a href=\"do.php?action=";
				echo $action;
				echo "&actiontype=postchoose&choosetype=unlock&uid[]=";
				echo $u['uid'];
				echo "\" title=\"激活这个会员\">激活</a> | <a href=\"do.php?action=";
				echo $action;
				echo "&actiontype=postchoose&choosetype=lock&uid[]=";
				echo $u['uid'];
				echo "\" title=\"锁定这个会员\">锁定<a/> | <a title=\"删除这个会员\" href=\"do.php?action=";
				echo $action;
				echo "&actiontype=postchoose&choosetype=del&uid[]=";
				echo $u['uid'];
				echo "\" onclick=\"if ( confirm('您将删除这个会员“";
				echo $u['username'];
				echo "”\\n您确定么？') ) { return true;}return false;\">删除</a> | \r\n\t\t\t\t\t\t";
				if ( $action == "service" )
				{
						echo "\t\t\t\t\t\t<a href=\"do.php?action=affiliate&actiontype=search&searchval=";
						echo $u['uid'];
						echo "&searchtype=4\">我的会员</a>\r\n\t\t\t\t\t\t";
				}
				echo "\t\t\t\t\t\t";
				if ( $action == "commercial" )
				{
						echo "\t\t\t\t\t\t<a href=\"do.php?action=advertiser&actiontype=search&searchval=";
						echo $u['uid'];
						echo "&searchtype=5\">我的广告商</a>\r\n\t\t\t\t\t\t";
				}
				echo "\t\t\t\t\t    </td>\r\n                        <td>";
				if ( $u['status'] == 2 )
				{
						echo "<font color=\"\">活动</font>";
				}
				if ( $u['status'] == 3 )
				{
						echo "<font color=\"ff0000\">拒绝</font>";
				}
				if ( $u['status'] == 4 )
				{
						echo "<font color=\"ff0000\">锁定</font>";
				}
				echo "</td>\r\n                        <td>";
				echo $u['logintime'] == "" ? "未登入" : $u['logintime'];
				echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
		}
		echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td>Uid</td>\r\n                        <td>用户名称</td>\r\n                        <td>联系人</td>\r\n                        <td>QQ</td>\r\n                        <td>业绩</td>\r\n                        <td>活跃</td>\r\n                        <td>&nbsp;</td>\r\n                        <td>状态</td>\r\n                        <td>最后登入</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    ";
}
echo "                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                          <option>批量操作</option>\r\n                          <option value=\"unlock\">激活</option>\r\n                          <option value=\"lock\">锁定</option>\r\n                          <option value=\"del\">删除</option>\r\n                        </select>\r\n                        <input type=\"button\" name=\"Submit3\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = '删除';\t\r\n\tif(v == 'unlock')  t= '激活';\r\n\tif(v == 'lock') t = '锁定';\r\n\tif(t=='') {alert('批量选项未选择');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('请选中您要操作的会员'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('您确认要'+ t +'这' + numchecked + '个会员？。\\n点“确认”'+ t +'，点“取消”取消操作。')){\r\n\t\t";
if ( in_array( "useractivate", explode( ",", $GLOBALS['C_ZYIIS']['tomail'] ) ) )
{
		echo "\t\tif(v == 'unlock') addLoading('正在发送邮件...');\r\n\t\t";
}
echo "\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction activate(){\r\n\tvar psub=confirm(\"确认激活么？\");\r\n\tif(psub){\r\n\t\t";
if ( in_array( "useractivate", explode( ",", $GLOBALS['C_ZYIIS']['tomail'] ) ) )
{
		echo "\t\t\taddLoading('正在发送邮件...');\r\n\t\t";
}
echo "\t}else{\r\n\t\treturn false;\r\n\t}\r\n}\r\nfunction locks(uid){\r\n\tvar psub=confirm(\"作弊会员么？\\n把这个会员的信息提交到中易官方黑名单？\\n点“确认[推荐]”提交，点“取消”不提交。\");\r\n\tif(psub){\r\n\t\t\$.post(\"do.php?action=lockusertozy\",{ \"uid\": uid}, function(data){\r\n\t\t\tif(data == 'ok') {\r\n\t\t\t\talert('感谢您的提交');\r\n\t\t\t\tdocument.location.reload();\r\n\t\t\t}\r\n\t\t\telse {\r\n\t\t\t \talert('提交失败');\r\n\t\t\t}\r\n\t\t})\r\n\t\treturn false;\r\n\t} \r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\twindow.location.href = \"";
echo $reurl;
echo "\";\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
