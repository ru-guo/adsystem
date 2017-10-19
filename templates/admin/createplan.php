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
echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/javascript/temp.js\"></script>\r\n<script src=\"/javascript/jquery/jtip.js\" language='JavaScript'></script>\r\n<link href=\"/javascript/jquery/css/question.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"active\"> <a   href=\"do.php?action=plan\"><span>正在";
echo $action == "editplan" ? "编辑" : "创建";
echo "计划项目</span></a> </li>\r\n                    <li class=\"link\"> <a   href=\"do.php?action=plan\"><span>返回计划列表</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td><form id=\"create\" name=\"create\" method=\"post\" action=\"?action=";
if ( $action == "createplan" )
{
		echo "createplan&actiontype=postcreateplan";
}
if ( $action == "editplan" )
{
		echo "editplan&actiontype=postupplan";
}
echo "\"onsubmit=\"return post_submit()\">\r\n\t\t  \t <input name=\"planid\" type=\"hidden\" value=\"";
echo $plan['planid'];
echo "\" />\r\n              <input name=\"minprice\" id=\"minprice\" type=\"hidden\" value=\"";
echo $GLOBALS['C_ZYIIS']['cpcmin_price'];
echo "\" />\r\n              <table width=\"90%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tr>\r\n                  <td valign=\"top\">\r\n\t\t\t\t  ";
if ( $statetype == "success" )
{
		echo "\t\t\t\t<table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"100%\" >\r\n\t\t\t\t  <tr>\r\n\t\t\t\t\t<td height=\"30\"><img  src='/templates/";
		echo Z_TPL;
		echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">操作成功！</span></td>\r\n\t\t\t\t\t<td>&nbsp;</td>\r\n\t\t\t\t  </tr>\r\n\t\t\t\t</table>\r\n\t\t\t\t<script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\t\tnoneSuccess();\r\n\t\t\t\t</script>\r\n\t\t\t\t";
}
echo "\t\t\t<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border :1px solid #CCCCCC; margin-top:20px\"  >\r\n                      <tr>\r\n                        <td width=\"90\" height=\"30\" align=\"right\" bgcolor=\"#2098C8\" ><span style=\"color:#FFFFFF\">";
echo $action == "editplan" ? "编辑" : "创建";
echo "项目&nbsp;&nbsp; <img src=\"/templates/";
echo Z_TPL;
echo "/images/3h.jpg\" alt=\"\" align=\"absmiddle\"></span></td>\r\n                        ";
if ( $action == "editplan" )
{
		echo "                        <td width=\"200\"  align=\"left\" bgcolor=\"#E4E4E4\" >&nbsp;&nbsp;\r\n                          <sapn style=\"font-size:13px;\"><strong>";
		echo $plan['planname']."(#".$plan['planid'].")";
		echo "</strong></sapn></td>\r\n                        <td width=\"15\" ><img src=\"/templates/";
		echo Z_TPL;
		echo "/images/3b.jpg\" alt=\"\" align=\"absmiddle\" /></td>\r\n                        <td >&nbsp;</td>\r\n                        ";
}
else
{
		echo "                        <td width=\"90\" align=\"right\" bgcolor=\"#E4E4E4\" ><span style=\"\">创建广告&nbsp;&nbsp; <img src=\"/templates/";
		echo Z_TPL;
		echo "/images/3b.jpg\" alt=\"\" align=\"absmiddle\" /></span></td>\r\n                        <td >&nbsp;</td>\r\n                        ";
}
echo "                      </tr>\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/bulb.gif\" width=\"19\" height=\"19\" /> <strong>提示：</strong> 广告项目用于组织要宣传的产品广告。同一广告项目中的所有广告均使用相同的单价、每日预算、地域定位、时间定位、结束日期 。</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"20\">&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"cpt\">常规</td>\r\n                </tr>\r\n                <tr>\r\n                  <td><table width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td>&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">属于广告商</td>\r\n                        <td><select name=\"uid\" id=\"uid\" onchange=\"SetUmoney(this.options[this.selectedIndex].text)\" ";
if ( $action == "editplan" )
{
		echo "disabled='disabled'";
}
echo ">\r\n                            <option value=\"\">请选择一个广告商</option>\r\n                            ";
foreach ( ( array )$u as $u )
{
		echo "                            <option value=\"";
		echo $u['uid'];
		echo "\" ";
		if ( $plan['uid'] == $u['uid'] || ( integer )$_GET['uid'] == $u['uid'] )
		{
				echo "selected";
		}
		echo ">";
		echo $u['username'];
		echo "  ￥";
		echo round( $u['money'], 2 );
		echo " </option>\r\n                            ";
}
echo "                          </select>\r\n                          &nbsp;<span id=\"umoney\"></span><br />\r\n                          <span class=\"gray\">计划属于哪一个广告商。</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td width=\"100\" valign=\"top\">计划项目名称 </td>\r\n                        <td><input name=\"planname\" type=\"text\" id=\"planname\" value=\"";
echo $plan['planname'];
echo "\" />\r\n                          <br />\r\n                          <span class=\"gray\">请填写广告项目名称。</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td>计费形式</td>\r\n                        <td><select name=\"plantype\" id=\"plantype\"  ";
if ( $action == "editplan" )
{
		echo "disabled='disabled'";
}
echo "  onchange=\"Dodata()\">\r\n                            ";
foreach ( ( array )$plantype as $pt )
{
		echo "                            <option value=\"";
		echo $pt['plantype'];
		echo "\" ";
		if ( $plan['plantype'] == $pt['plantype'] )
		{
				echo "selected";
		}
		echo ">";
		echo strtoupper( $pt['plantype'] );
		echo " &nbsp;&nbsp;";
		echo $pt['name'];
		echo "</option>\r\n                            ";
}
echo "                          </select>\r\n                          <br />\r\n                          <span class=\"gray\">计划应用于哪一种计费形式。</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td>需要审核</td>\r\n                        <td><input name=\"audit\" type=\"radio\" value=\"n\" ";
if ( $plan['audit'] == "n" || !$plan )
{
		echo "checked";
}
echo " />\r\n                          不需要\r\n                          <input type=\"radio\" name=\"audit\" value=\"y\" ";
if ( $plan['audit'] == "y" )
{
		echo "checked";
}
echo " />\r\n                          需要<br />\r\n                          <span class=\"gray\">需要审核的计划只有广告商或是联盟管理员在网站主申请通过后，方可投放。</span></td>\r\n                      </tr>\r\n                      <tr id=\"datadatev\"  ";
if ( !in_array( $plan['plantype'], array( "cpa", "cps" ) ) || !$plan )
{
		echo "style=\"display:none\"";
}
echo ">\r\n                        <td>数据返回</td>\r\n                        <td><input type=\"radio\" name=\"datatime\" value=\"0\" onclick=\"\$i('datadates').style.display = 'none';\$i('serveripids').style.display = '';\"   ";
if ( empty( $plan['datatime'] ) )
{
		echo "checked";
}
echo "/>\r\n                          实时\r\n                          <input name=\"datatime\" type=\"radio\" value=\"1\"  onclick=\"\$i('datadates').style.display = '';\$i('serveripids').style.display = 'none';\"  ";
if ( "0" < $plan['datatime'] && !empty( $plan ) )
{
		echo "checked";
}
echo "/>\r\n                          延时<span id=\"datadates\" ";
if ( empty( $plan['datatime'] ) )
{
		echo "style=\"display:none\"";
}
echo ">\r\n                          <input name=\"datadate\" type=\"text\" id=\"datadate\" style=\"width:30px;\" value=\"";
echo $plan['datatime'] == "" ? 1 : $plan['datatime'];
echo "\" />\r\n                          天</span></span><br />\r\n                          <span class=\"gray\">延时为联盟手动确认订单后方可入帐会员帐户，统计报表同时显示结算数。</span></td>\r\n                      </tr>\r\n                      <tr id=\"serveripids\"  ";
if ( $plan['datatime'] == "1" || !$plan )
{
		echo "style=\"display:none\"";
}
echo ">\r\n                        <td>接口认证IP</td>\r\n                        <td><input name=\"serverip\" type=\"text\" id=\"serverip\" style=\"width:180px;\"  value=\"";
echo $plan['serverip'];
echo "\"/>\r\n                          <br />\r\n                          <span class=\"gray\">广告商广告服务器IP地址，多IP请“,”分开。</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td>结算周期</td>\r\n                        <td><select name=\"clearing\">\r\n                            ";
if ( in_array( "day", explode( ",", $GLOBALS['C_ZYIIS']['clearing_cycle'] ) ) )
{
		echo "                            <option value=\"day\" ";
		if ( $plan['clearing'] == "day" )
		{
				echo "selected";
		}
		echo ">日结计划项目</option>\r\n                            ";
}
echo "                            ";
if ( in_array( "week", explode( ",", $GLOBALS['C_ZYIIS']['clearing_cycle'] ) ) )
{
		echo "                            <option value=\"week\" ";
		if ( $plan['clearing'] == "week" || !$plan )
		{
				echo "selected";
		}
		echo ">周结计划项目</option>\r\n                            ";
}
echo "                            ";
if ( in_array( "month", explode( ",", $GLOBALS['C_ZYIIS']['clearing_cycle'] ) ) )
{
		echo "                            <option value=\"month\" ";
		if ( $plan['clearing'] == "month" )
		{
				echo "selected";
		}
		echo ">月结计划项目</option>\r\n                            ";
}
echo "                          </select>\r\n                          <br />\r\n                          <span class=\"gray\">联盟给网站主结算的一个周期。</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td>&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"cpt\">出价与预算</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><table width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td>&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td width=\"100\" height=\"40\" valign=\"top\">广告商单价</td>\r\n                        <td>￥\r\n                          <input name=\"priceadv\" type=\"text\" id=\"priceadv\" size=\"8\"  value=\"";
echo $plan['priceadv'] ? abs( $plan['priceadv'] ) : "";
echo "\"/>\r\n                          <span id='plan_p'>";
if ( $plan['plantype'] == "cps" )
{
		echo "%";
}
else
{
		echo "元";
}
echo "</span><br />\r\n                          <span class=\"gray\">每/IP广告商愿意支付的最高费用。</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" valign=\"top\">网站主单价</td>\r\n                        <td><input type=\"radio\" name=\"gradeprice\" value=\"0\" onclick=\"sPrice(0)\"  ";
if ( $plan['gradeprice'] == "0" || !$plan )
{
		echo "checked";
}
echo "/>\r\n不分网站等级\r\n  <input type=\"radio\" name=\"gradeprice\" value=\"1\" onclick=\"sPrice(1)\" ";
if ( $plan['gradeprice'] == "1" )
{
		echo "checked";
}
echo "/>\r\n按网站等级\r\n  <table width=\"90%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n                           <div  id=\"s_price\" ";
if ( $plan['gradeprice'] == "1" )
{
		echo "style='display:none'";
}
echo "> \r\n                              &nbsp; ￥\r\n                              <input name=\"price\" type=\"text\" id=\"price\" size=\"8\"  value=\"";
echo $plan['price'] ? abs( $plan['price'] ) : "";
echo "\"/>\r\n                              <font color=\"#FF0000\"> <span id='minprices'></span> </font> \r\n                             \r\n                            </div>\r\n                          <tr  id=\"s0_price\"  ";
if ( $plan['gradeprice'] == "0" || !$plan )
{
		echo "style='display:none'";
}
echo ">\r\n                            <td width=\"8%\" align=\"center\" height=\"25\">0星级</td>\r\n                            <td width=\"92%\">￥\r\n                              <input name=\"s0price\" type=\"text\" id=\"s0price\"  value=\"";
echo $plan['s0price'] ? abs( $plan['s0price'] ) : "";
echo "\" size=\"8\"/></td>\r\n                          </tr>\r\n                           <tr  id=\"s1_price\"  ";
if ( $plan['gradeprice'] == "0" || !$plan )
{
		echo "style='display:none'";
}
echo ">\r\n                            <td align=\"center\" height=\"25\">1星级</td>\r\n                            <td>￥\r\n                              <input name=\"s1price\" type=\"text\" id=\"s1price\" size=\"8\"  value=\"";
echo $plan['s1price'] ? abs( $plan['s1price'] ) : "";
echo "\"/></td>\r\n                          </tr>\r\n                          <tr  id=\"s2_price\"  ";
if ( $plan['gradeprice'] == "0" || !$plan )
{
		echo "style='display:none'";
}
echo ">\r\n                            <td align=\"center\" height=\"25\">2星级</td>\r\n                            <td>￥\r\n                              <input name=\"s2price\" type=\"text\" id=\"s2price\" size=\"8\"  value=\"";
echo $plan['s2price'] ? abs( $plan['s2price'] ) : "";
echo "\"/></td>\r\n                          </tr>\r\n                          <tr  id=\"s3_price\"  ";
if ( $plan['gradeprice'] == "0" || !$plan )
{
		echo "style='display:none'";
}
echo ">\r\n                            <td align=\"center\" height=\"25\">3星级</td>\r\n                            <td>￥\r\n                              <input name=\"s3price\" type=\"text\" id=\"s3price\" size=\"8\"  value=\"";
echo $plan['s3price'] ? abs( $plan['s3price'] ) : "";
echo "\"/></td>\r\n                            </tr>\r\n                        </table>\r\n                         \r\n                        <span class=\"gray\">联盟愿意支付给网站主的最高费用。</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"60\" valign=\"top\"><span class=\"t14b\">每日限额</span></td>\r\n                        <td>￥\r\n                          <input name=\"budget\" type=\"text\" id=\"budget\"  size=\"8\" value=\"";
echo $plan['budget'];
echo "\"/>\r\n                          元<br />\r\n                          <span class=\"gray\">每日预算控制您的费用。总体而言，在达到每日预算限额时，您的广告就会在当天停止展示</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" valign=\"top\">价格说明</td>\r\n                        <td><input name=\"priceinfo\" type=\"text\" id=\"priceinfo\"  value=\"";
echo $plan['priceinfo'];
echo "\" size=\"40\" maxlength=\"16\"/>\r\n                          <br />\r\n                          <span class=\"gray\">广告计费简要说明。</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" valign=\"top\">项目扣量</td>\r\n                        <td><input name=\"deduction\" type=\"text\" id=\"deduction\"  value=\"";
echo $plan['deduction'];
echo "\" size=\"10\" maxlength=\"3\"/>\r\n                          %<br />\r\n                          <span class=\"gray\">此项扣量优先全局设定的扣量，为空既按全局值。</span></td>\r\n                      </tr>\r\n<tr>\r\n                        <td height=\"30\" valign=\"top\">项目补量</td>\r\n                        <td><input name=\"dosage\" type=\"text\" id=\"dosage\"  value=\"";
echo $plan['dosage'];
echo "\" size=\"10\" maxlength=\"3\"/>\r\n                          %<br />\r\n                          <span class=\"gray\"></span></td>\r\n                      </tr>\r\n</table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td  >&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"cpt\">结束日期与限制</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><table width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td>&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td width=\"100\" height=\"30\">结束日期</td>\r\n                        <td><input type=\"radio\" name=\"expire_date\" checked=\"checked\" value=\"0000-00-00\" onclick=\"expire(&quot;expire&quot;, true)\" ";
if ( $plan['expire'] == "0000-00-00" || !$plan )
{
		echo "checked";
}
echo "/>\r\n                          没有结束日期</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input name=\"expire_date\" type=\"radio\"  onclick=\"expire(&quot;expire&quot;, false)\" value=\"no\" ";
if ( $plan['expire'] != "0000-00-00" && $plan )
{
		echo "checked";
}
echo "/>\r\n                          <select name=\"expire_year\" id=\"expire_year\" ";
if ( $plan['expire'] == "0000-00-00" || !$plan )
{
		echo "disabled='disabled'";
}
echo ">\r\n                            ";
$expire = @explode( "-", $plan['expire'] );
$i = date( "Y" );
for ( ;	$i < date( "Y" ) + 21;	++$i	)
{
		echo "                            <option value=\"";
		echo $i;
		echo "\" ";
		if ( !( $i == date( "Y" ) + 1 ) || !$plan || $expire[0] == $i )
		{
				echo "selected";
		}
		echo ">";
		echo $i;
		echo "年</option>\r\n                            ";
}
echo "                          </select>\r\n                          <select name=\"expire_month\" id=\"expire_month\" ";
if ( $plan['expire'] == "0000-00-00" || !$plan )
{
		echo "disabled='disabled'";
}
echo ">\r\n                            ";
$i = 1;
for ( ;	$i < 13;	++$i	)
{
		echo "                            <option value=\"";
		echo $i;
		echo "\" ";
		if ( !( $i == date( "n" ) ) || !$plan || $expire[1] == $i )
		{
				echo "selected";
		}
		echo ">";
		echo $i;
		echo "月</option>\r\n                            ";
}
echo "                          </select>\r\n                          <select name=\"expire_day\" id=\"expire_day\" ";
if ( $plan['expire'] == "0000-00-00" || !$plan )
{
		echo "disabled='disabled'";
}
echo ">\r\n                            ";
$i = 1;
for ( ;	$i < 32;	++$i	)
{
		echo "                            <option value=\"";
		echo $i;
		echo "\" ";
		if ( !( $i == date( "j", TIMES ) ) || !$plan || $expire[2] == $i )
		{
				echo "selected";
		}
		echo ">";
		echo $i;
		echo "日</option>\r\n                            ";
}
echo "                          </select>\r\n\t\t\t\t\t\t  \r\n                          <br />\r\n                          <div class=\"tips\" id=\"tip1\" style=\"display:none\">您的广告会在这一日期停止展示，直到您以后更改这一设置。</div>\r\n                          <br /></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" valign=\"top\">会员限制</td>\r\n                        <td><input type=\"radio\" name=\"restrictions\" value=\"1\" onclick=\"\$i('resuids').style.display = 'none';\"   ";
if ( $plan['restrictions'] == "1" || !$plan )
{
		echo "checked";
}
echo "/>\r\n                          不限制\r\n                          <input name=\"restrictions\" type=\"radio\" value=\"2\"  onclick=\"\$i('resuids').style.display = '';\"  ";
if ( $plan['restrictions'] == "2" )
{
		echo "checked";
}
echo "/>\r\n                          允许以下会员\r\n                          <input name=\"restrictions\" type=\"radio\" value=\"3\"  onclick=\"\$i('resuids').style.display = '';\"  ";
if ( $plan['restrictions'] == "3" )
{
		echo "checked";
}
echo "/>\r\n                          屏蔽以下会员<br />\r\n                          <span class=\"gray\">被屏蔽的会员无法投放当前计划项目下的所有广告，广告列表下也是不可见的。</span></td>\r\n                      </tr>\r\n                      <tr id=\"resuids\"   ";
if ( $plan['restrictions'] == "1" || !$plan )
{
		echo "style='display:none'";
}
echo ">\r\n                        <td height=\"30\" valign=\"top\">限制的会员ID</td>\r\n                        <td><textarea name=\"resuid\" id=\"resuid\" style=\"width:380px\">";
echo $plan['resuid'];
echo "</textarea>\r\n                          <br />\r\n                          <span class=\"gray\">多ID限制格式“,”逗号隔开，如：1000,1100,请勿回车换行。</span></td>\r\n                      </tr>\r\n\t\t\t\t\t  \r\n\t\t\t\t\t   <tr>\r\n                        <td height=\"30\" valign=\"top\">网站限制</td>\r\n                        <td><input type=\"radio\" name=\"sitelimit\" value=\"1\" onclick=\"\$i('limitsiteids').style.display = 'none';\"   ";
if ( $plan['sitelimit'] == "1" || !$plan )
{
		echo "checked";
}
echo "/>\r\n                          不限制\r\n                          <input name=\"sitelimit\" type=\"radio\" value=\"2\"  onclick=\"\$i('limitsiteids').style.display = '';\"  ";
if ( $plan['sitelimit'] == "2" )
{
		echo "checked";
}
echo "/>\r\n                          允许以下网站\r\n                          <input name=\"sitelimit\" type=\"radio\" value=\"3\"  onclick=\"\$i('limitsiteids').style.display = '';\"  ";
if ( $plan['sitelimit'] == "3" )
{
		echo "checked";
}
echo "/>\r\n                          屏蔽以下网站<br />\r\n                          <span class=\"gray\">被屏蔽的网站无法投放当前计划项目下的所有广告，广告列表下也是不可见的。</span></td>\r\n                      </tr>\r\n                      <tr id=\"limitsiteids\"   ";
if ( $plan['sitelimit'] == "1" || !$plan )
{
		echo "style='display:none'";
}
echo ">\r\n                        <td height=\"30\" valign=\"top\">限制的网站ID</td>\r\n                        <td><textarea name=\"limitsiteid\" id=\"limitsiteid\" style=\"width:380px\">";
echo $plan['limitsiteid'];
echo "</textarea>\r\n                          <br />\r\n                          <span class=\"gray\">多ID限制格式“,”逗号隔开，如：1000,1100,请勿回车换行。</span></td>\r\n                      </tr>\r\n\t\t\t\t\t  \r\n                      <!--<tr >\r\n                        <td height=\"30\" valign=\"top\">域名限制</td>\r\n                        <td><input type=\"radio\" name=\"in_site\" value=\"0\"  ";
if ( $plan['in_site'] == "0" || !$plan )
{
		echo "checked";
}
echo "/>\r\n                        默认\r\n                          <input type=\"radio\" name=\"in_site\" value=\"1\"  ";
if ( $plan['in_site'] == "1" )
{
		echo "checked";
}
echo "/>\r\n启用\r\n<input type=\"radio\" name=\"in_site\" value=\"2\"  ";
if ( $plan['in_site'] == "2" )
{
		echo "checked";
}
echo "/> \r\n不启用</td>\r\n                      </tr>-->\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"cpt\">项目其它</td>\r\n                </tr>\r\n                <tr>\r\n                  <td><table width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td>&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\">推荐</td>\r\n                        <td><input type=\"radio\" name=\"top\" value=\"0\" ";
if ( $plan['top'] == "0" || !$plan )
{
		echo "checked";
}
echo "/>\r\n                        不推荐\r\n                          <input type=\"radio\" name=\"top\" value=\"1\"  ";
if ( $plan['top'] == "1" )
{
		echo "checked";
}
echo "/>\r\n推荐</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" valign=\"top\">Logo</td>\r\n                        <td><input name=\"logo\" type=\"text\" id=\"logo\"  value=\"";
echo $plan['logo'];
echo "\" size=\"40\"/>\r\n                          <br />\r\n                          <span class=\"gray\">请使用绝对地址比如：http://www.zyiis.com/abc/logo.jpg,大小控制在120x60。</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td width=\"100\" height=\"30\">项目介绍</td>\r\n                        <td><textarea name=\"planinfo\" id=\"planinfo\" style=\"width:320px;height:100px\">";
echo $plan['planinfo'];
echo "</textarea></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\"></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td>&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"cpt\">地理位置与网站类型、时间、星期定向</td>\r\n                </tr>\r\n               \r\n                <tr >\r\n                  <td height=\"50\"><table width=\"86%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td>&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td width=\"120\" height=\"30\" align=\"center\">位置 <a href=\"?action=faq&width=250&type=createplan&typeval=aclcity\" class=\"jTip\" id=\"aclcityhelp\"  name=\"地理位置定位\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td>您希望广告在哪些地理位置展示？</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input id=\"acl[1][isacl]\" class='aclcity' onclick=\"showtype('2','n');\$i('aclcity_c').style.display = 'none'\" type=\"radio\"   value=\"all\" name=\"acl[1][isacl]\" ";
if ( !$aclcity )
{
		echo " checked";
}
echo "/>\r\n                          在所有地方显示<br />\r\n                          <input id=\"acl[1][isacl]\" onclick=\"showtype('2','y');\$i('aclcity_c').style.display = ''\" type=\"radio\" value=\"acls\" name=\"acl[1][isacl]\"  ";
if ( $aclcity )
{
		echo " checked";
}
echo "/>\r\n                          指定区域\r\n                          <div id=\"aclcity_c\" ";
if ( !$aclcity )
{
		echo "style=\"display:none;margin-top:3px\"";
}
echo ">您的要求？<br />\r\n                            <input id=\"radio\"  type=\"radio\"  value=\"==\" name=\"acl[1][comparison]\" ";
if ( $citycom == "==" || $citycom == "" || !$plan )
{
		echo " checked";
}
echo "/>\r\n                            允许\r\n                            <input id=\"radio\"  type=\"radio\" value=\"!=\" name=\"acl[1][comparison]\" ";
if ( $citycom == "!=" )
{
		echo " checked";
}
echo "/>\r\n                            拒绝\r\n                            <div class=\"tips\">您的网站是地区性的，选择指定区域显示，将有利于广告效果。</div>\r\n                          </div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\"></td>\r\n                        <td><table width=\"550\" height=\"200\" id=\"s2\"   ";
if ( !$aclcity )
{
		echo "style=\"display:none\"";
}
echo ">\r\n                            <tr>\r\n                              <td width=\"200\" height=\"100\"><table width=\"580\" align=\"center\">\r\n                                  <tr>\r\n                                    <td width=\"220\"><span class=\"create-city_s1\"> <span class=\"create-city_s2\" >\r\n                                      <script language=\"JavaScript\" type=\"text/javascript\">\r\ndocument.write('<select id=\"city_more\" class=\"create-city_select\" name=\"city_more\" size=\"12\">');\r\n\tfor(k=1;k<where.length;k++) {\r\n\t\t document.write('<optgroup label=\"'+where[k].loca+'\" >');\r\n\t\tloca3 = (where[k].locacity).split(\"|\");\r\n\t\tfor(l=1;l<loca3.length;l++) { \r\n\t\tdocument.write('<option value=\"'+loca3[l]+'\">'+loca3[l]+'</option>');\r\n\t}\r\n}\r\ndocument.write('</select>');\r\n                    </script>\r\n                                      </span> </span></td>\r\n                                    <td width=\"100\" align=\"center\"><img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/addcity.gif\" onclick=\"add()\" style=\"cursor: pointer;\" />\r\n                                      <div style=\"height:80px\"></div>\r\n                                      <img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/removecity.gif\" onclick=\"remove()\" style=\"cursor: pointer;\" /></td>\r\n                                    <td><span class=\"create-city_s1\"> <span class=\"create-city_s2\">\r\n                                      <input type='hidden' name='acl[1][type]' value='city' />\r\n                                      <input value=\"";
echo $citydata;
echo "\" name=\"acl[1][data][]\" id=\"adcitystr\" type=\"hidden\" />\r\n                                      <select id=\"city_choose\" name=\"city_choose\" size=\"12\" class=\"create-city_select\">\r\n                                        ";
foreach ( ( array )$cityarr as $cityarr )
{
		echo "                                        <option value=\"";
		echo $cityarr;
		echo "\">";
		echo $cityarr;
		echo "</option>\r\n                                        ";
}
echo "                                      </select>\r\n                                      </span> </span></td>\r\n                                  </tr>\r\n                                </table></td>\r\n                            </tr>\r\n                          </table></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\" align=\"center\"></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\">类型 <a href=\"?action=faq&width=250&type=createplan&typeval=aclwebtype\" class=\"jTip\" id=\"aclwebtypehelp\"  name=\"网站类型定位\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td>您希望广告在哪些网站类型展示？</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input id=\"acl[0][isacl]\" onclick=\"showtype('1','n');\$i('webtype_c').style.display = 'none'\" type=\"radio\"   value=\"all\" name=\"acl[0][isacl]\" class='aclwebtype' ";
if ( !$webtype )
{
		echo " checked";
}
echo "/>\r\n                          在所有类目投放<br />\r\n                          <input id=\"acl[0][isacl]\" onclick=\"showtype('1','y');\$i('webtype_c').style.display = ''\" type=\"radio\" value=\"acls\" name=\"acl[0][isacl]\" class='aclwebtype' ";
if ( $webtype )
{
		echo " checked";
}
echo "/>\r\n                          在指定类目的网站投放\r\n                          <div id=\"webtype_c\" ";
if ( !$webtype )
{
		echo "style=\"display:none;margin-top:3px\"";
}
echo ">您的要求？<br />\r\n                            <input id=\"radio\"  type=\"radio\"   value=\"==\" name=\"acl[0][comparison]\" ";
if ( $webtypecom == "==" || $webtypecom == "" || !$plan )
{
		echo " checked";
}
echo "/>\r\n                            允许\r\n                            <input id=\"radio\"  type=\"radio\" value=\"!=\" name=\"acl[0][comparison]\" ";
if ( $webtypecom == "!=" )
{
		echo " checked";
}
echo "/>\r\n                            拒绝\r\n                            <div class=\"tips\">选择所有类目投放，系统将会为您自动优化选择网站投放您的广告，否则为指定类目。</div>\r\n                          </div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td   align=\"center\"></td>\r\n                        <td><div style=\"position:relative;z-index:100; width:100%;\" onmouseover=\"os(event)\" onmouseout=\"oe(event)\">\r\n                            <input type='hidden' name='acl[0][type]' value='webtype' />\r\n                            \r\n                            <table width=\"100%\"  id=\"s1\"   class=\"tp\" ";
if ( !$webtype )
{
		echo "style=\"display:none\"";
}
echo ">\r\n                              <tr> \r\n\t\t\t\t\t\t\t\t";
$i = 1;
foreach ( $sitetype as $s )
{
		echo "<td><input type=\"checkbox\" name=\"acl[0][data][]\" id=\"aclsitetype\" value=\"".$s['sid']."\"";
		echo "\t\t\t\t\t\t\t\t\t";
		if ( is_array( $webtype ) && in_array( $s['sid'], $webtype ) )
		{
				echo " checked";
		}
		echo " class=\"aclwebtypeval\"/>".$s['sitename']."</td>";
		if ( $i % 6 == 0 )
		{
				echo "</tr>";
		}
		++$i;
}
echo "                              </tr>\r\n                            </table>                           </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\">时间 <a href=\"?action=faq&width=250&type=createplan&typeval=acltimetype\" class=\"jTip\" id=\"acltimetypehelp\"  name=\"时间定位\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td>您希望广告在几时展示？</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input id=\"acl[2][isacl]\" onclick=\"showtype('3','n');\$i('time_c').style.display = 'none'\" type=\"radio\"   value=\"all\" name=\"acl[2][isacl]\"  class=\"acltime\" ";
if ( !$acltime )
{
		echo " checked";
}
echo "/>\r\n                          全天投放<br />\r\n                          <input id=\"acl[2][isacl]\" onclick=\"showtype('3','y');\$i('time_c').style.display = ''\" type=\"radio\" value=\"acls\" name=\"acl[2][isacl]\" class=\"acltime\" ";
if ( $acltime )
{
		echo " checked";
}
echo "/>\r\n                          在指定的时间投放\r\n                          <div class=\"tips\" id=\"time_c\"  ";
if ( !$acltime )
{
		echo "style=\"display:none;margin-top:3px\"";
}
echo ">在指定的时间投放，系统将会为您在规定的时间显示广告。</div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\"></td>\r\n                        <td><input type='hidden' name='acl[2][type]' value='time' />\r\n                          <table width='100%' cellpadding='0' cellspacing='0' border='0'  id='s3' class=\"tp\" ";
if ( !$acltime )
{
		echo "style=\"display:none;margin-top:10px\"";
}
echo ">\r\n                            ";
$n = 0;
$i = 0;
for ( ;	$i < 6;	++$i	)
{
		echo "                            <tr>\r\n                              ";
		$j = 0;
		for ( ;	$j < 4;	++$j	)
		{
				echo "                              <td><input type='checkbox' name='acl[2][data][]' value='";
				echo $n;
				echo "' ";
				if ( is_array( $timedata ) )
				{
						if ( in_array( $n, $timedata ) )
						{
								echo " checked";
						}
				}
				else
				{
						echo " checked";
				}
				echo "   class=\"acltimeval\"/>\r\n                                &nbsp;";
				echo $n;
				echo ":00-";
				echo $n;
				echo ":59&nbsp;&nbsp;</td>\r\n                              ";
				++$n;
		}
		echo "                            </tr>\r\n                            ";
}
echo "                          </table></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\" align=\"center\"></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\">一周 <a href=\"?action=faq&width=250&type=createplan&typeval=aclweekdaytype\" class=\"jTip\" id=\"aclweekdaytypehelp\"  name=\"星期定位\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td>您希望一周星期几展示广告？</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input id=\"acl[3][isacl]\" onclick=\"showtype('4','n');\$i('weekday_c').style.display = 'none'\" type=\"radio\"   value=\"all\" name=\"acl[3][isacl]\"  class=\"aclweekday\" ";
if ( !$aclweekday )
{
		echo " checked";
}
echo "/>\r\n                          全星期投放<br />\r\n                          <input id=\"acl[3][isacl]\" onclick=\"showtype('4','y');\$i('weekday_c').style.display = ''\" type=\"radio\" value=\"acls\" name=\"acl[3][isacl]\" class=\"aclweekday\" ";
if ( $aclweekday )
{
		echo " checked";
}
echo "/>\r\n                          在指定的星期投放\r\n                          <div class=\"tips\" id=\"weekday_c\"  ";
if ( !$aclweekday )
{
		echo "style=\"display:none;margin-top:3px\"";
}
echo ">在指定的一周星期几显示广告。</div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input type='hidden' name='acl[3][type]' value='weekday' />\r\n                          <table width='100%' cellpadding='0' cellspacing='0' border='0'  id='s4' class=\"tp\" ";
if ( !$aclweekday )
{
		echo "style=\"display:none;margin-top:3px\"";
}
echo ">\r\n                            ";
$i = 0;
for ( ;	$i < 7;	++$i	)
{
		if ( $i % 4 == 0 )
		{
				echo "<tr>";
		}
		echo "<td><input type='checkbox'  name='acl[3][data][]' value='";
		echo $i;
		echo "' class='aclweekdayval'                            ";
		if ( is_array( $weekdaydata ) )
		{
				if ( in_array( $i, $weekdaydata ) )
				{
						echo " checked";
				}
		}
		else
		{
				echo " checked";
		}
		echo ">&nbsp;周".isweekday( $i )."&nbsp;&nbsp;</td>";
		if ( ( $i + 1 ) % 4 == 0 )
		{
				echo "</tr>";
		}
}
if ( ( $i + 1 ) % 4 != 0 )
{
		echo "</tr>";
}
//开始

echo "                          </table></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\" align=\"center\"></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\">平台<a href=\"?action=faq&width=250&type=createplan&typeval=aclpttype\" class=\"jTip\" id=\"aclpttypehelp\"  name=\"星期定位\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td>您希望在那个平台展示广告？</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input id=\"acl[4][isacl]\" onclick=\"showtype('5','n');\$i('pt_c').style.display = 'none'\" type=\"radio\"   value=\"all\" name=\"acl[4][isacl]\"  class=\"aclpt\" ";
if ( !$aclpt )
{
    echo " checked";
}
echo "/>\r\n                          全平台投放<br />\r\n                          <input id=\"acl[4][isacl]\" onclick=\"showtype('5','y');\$i('pt_c').style.display = ''\" type=\"radio\" value=\"acls\" name=\"acl[4][isacl]\" class=\"aclpt\" ";
if ( $aclpt )
{
    echo " checked";
}
echo "/>\r\n                          在指定的平台投放\r\n                          <div class=\"tips\" id=\"pt_c\"  ";
if ( !$aclpt )
{
    echo "style=\"display:none;margin-top:3px\"";
}
echo ">在指定的平台显示广告。</div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" align=\"center\"></td>\r\n                        <td><input type='hidden' name='acl[4][type]' value='pt' />\r\n                          <table width='100%' cellpadding='0' cellspacing='0' border='0'  id='s4' class=\"tp\" ";
if ( !$aclpt )
{
    echo "style=\"margin-top:3px\"";
}
echo ">\r\n                            ";
echo "
<tr>
                            <td height='30' align='center'></td>
                            <td><input type='hidden' name='acl[4][type]' value='pt' />
                                <table width='100%' cellpadding='0' cellspacing='0' border='0'  id='s5' class='tp'";
if ( !$aclpt )
{
	echo " style='display:none;margin-top:3px'";
}
	echo ">
<td><input type='radio'  name='acl[4][data][]' value='苹果' class='aclptval'";
if($ptdata[0]=='苹果'){echo 'checked';}
echo "checked>苹果</td>
<td><input type='radio'  name='acl[4][data][]' value='安卓' class='aclptval'";
if($ptdata[0]=='安卓'){echo 'checked';}
echo ">安卓</td>
</table></td>
</tr>";
//结束

echo "                          </table></td>\r\n                      </tr>\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><input type=\"submit\" name=\"Submit\" class=\"form-submit\" value=\" 提 交 \" />\r\n\t\t\t\t  ";
if ( $action != "editplan" )
{
		echo "                    <input name=\"status\" type=\"checkbox\" id=\"status\" value=\"1\" checked=\"checked\" />\r\n                    直接审核通过\r\n\t\t\t\t  ";
}
echo "\t\t\t\t\t</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\">&nbsp;</td>\r\n                </tr>\r\n              </table>\r\n            </form></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\" src=\"/javascript/plan.js\"></script>\r\n<script  type=\"text/javascript\">\r\nvar cpc_minprice=";
echo $GLOBALS['C_ZYIIS']['cpcmin_price'];
echo ";\r\nvar cpm_minprice=";
echo $GLOBALS['C_ZYIIS']['cpmmin_price'];
echo ";\r\nvar cpv_minprice=";
echo $GLOBALS['C_ZYIIS']['cpvmin_price'];
echo ";\r\nvar cpa_minprice=";
echo $GLOBALS['C_ZYIIS']['cpamin_price'];
echo ";\r\nvar cps_minprice=";
echo $GLOBALS['C_ZYIIS']['cpsmin_price'];
echo ";\r\nfunction post_submit(){\r\n\tvar create = \$i('create');\r\n\tvar uid = get_Select_Value(\$i(\"uid\"));\r\n\tvar datatime = get_radio_value(\$n(\"datatime\"));\r\n\tvar gradeprice = get_radio_value(\$n(\"gradeprice\"));\r\n\tvar serverip  = \$i('serverip').value;\r\n\tvar plantype = \$(\"#plantype\").val();\r\n\tvar priceadv =  create.priceadv.value;\r\n\tif(isNULL(uid)){\r\n        \talert(\"请选择一个广告商\");\r\n\t\t\treturn false;\r\n     }\r\n\tif(create.planname.value==\"\" ){\r\n\t\talert(\"请填写广告项目！ \");\r\n\t\tcreate.planname.focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(datatime==0 && serverip=='' && (plantype=='cpa' || plantype=='cps' )){\r\n\t\talert(\"时实数据返回接口认证IP不能为空！ \");\r\n\t\tcreate.serverip.focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(create.priceadv.value<=0){\r\n\t\talert(\"广告商的单价不能小于0！ \");\r\n\t\tcreate.priceadv.focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(!checkPrice(create.priceadv.value)){\r\n\t\tcreate.priceadv.focus();\r\n\t\treturn false;\r\n\t}\t\r\n\tif(gradeprice==1) {\r\n\t\tif(create.s0price.value<=0 ){\r\n\t\t\talert(\"0星级的单价不能小于0！ \");\r\n\t\t\tcreate.s0price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(create.s0price.value)){\r\n\t\t\tcreate.s0price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s0price.value>priceadv)\r\n\t\t{\r\n\t\t\talert(\"0星级的单价不能大于广告主的价格！\");\r\n\t\t\t\$i('s0price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s1price.value<=0 ){\r\n\t\t\talert(\"1星级的单价不能小于0！ \");\r\n\t\t\tcreate.s1price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(create.s1price.value)){\r\n\t\t\tcreate.s1price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s1price.value>priceadv)\r\n\t\t{\r\n\t\t\talert(\"1星级的单价不能大于广告主的价格！\");\r\n\t\t\t\$i('s1price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s2price.value<=0 ){\r\n\t\t\talert(\"2星级的单价不能小于0！ \");\r\n\t\t\tcreate.s2price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(create.s2price.value)){\r\n\t\t\tcreate.s2price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s2price.value>priceadv)\r\n\t\t{\r\n\t\t\talert(\"2星级的单价不能大于广告主的价格！\");\r\n\t\t\t\$i('s2price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s3price.value<=0 ){\r\n\t\t\talert(\"3星级的单价不能小于0！ \");\r\n\t\t\tcreate.s3price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(create.s3price.value)){\r\n\t\t\tcreate.s3price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.s3price.value>priceadv)\r\n\t\t{\r\n\t\t\talert(\"3星级的单价不能大于广告主的价格！\");\r\n\t\t\t\$i('s3price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\r\n\t}else {\r\n\t\tif(create.price.value<=0 ){\r\n\t\t\talert(\"网站主的单价不能小于0！ \");\r\n\t\t\tcreate.price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(create.price.value-0>priceadv-0)\r\n\t\t{\r\n\t\t\talert(\"单价不能大于广告主的价格！\");\r\n\t\t\t\$i('price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(create.price.value)){\r\n\t\t\tcreate.price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\t\r\n\tif(!checkBudget(create.budget.value)){\r\n\t\tcreate.budget.focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n\tif(!checkBudget(create.budget.value)){\r\n\t\tcreate.budget.focus();\r\n\t\treturn false;\r\n\r\n\t}\r\n\r\n\tif( parseInt(create.deduction.value)<=parseInt(create.dosage.value) && create.dosage.value>0){\r\n\t\talert(\"项目扣量数值需要大于项目补量数值！\");\r\n\t\t\$i('dosage').focus();\r\n\t\treturn false;\r\n\t}\r\n\t\tif(\$('.aclwebtypeval[@checked]').val() === null && \$('.aclwebtype[@checked]').val() != 'all'){\r\n\t\talert(\"最少需要选择一个网站类型！\");\r\n\t\treturn false;\r\n\t}\r\n\tif(\$i('adcitystr').value == '' && \$('.aclcity[@checked]').val() != 'all'){\r\n\t\talert(\"最少需要选择一个地域！\");\r\n\t\treturn false;\r\n\t}\r\n\tif(\$('.acltimeval[@checked]').val() === null && \$('.acltime[@checked]').val() != 'all'){\r\n\t\talert(\"最少需要选择一个时间！\");\r\n\t\treturn false;\r\n\t}\r\n\tif(\$('.aclweekdayval[@checked]').val() === null && \$('.aclweekday[@checked]').val() != 'all'){\r\n\t\talert(\"最少需要选择一个时间！\");\r\n\t\treturn false;\r\n\t}\r\n\t//return false\r\n}\r\n\r\nfunction checkPrice(str){\r\n    minprice = \$i('minprice').value;\r\n\tvar i;\t\r\n\tfor(i=0;i<str.length;i++)  {\r\n\t   if ((str.charAt(i)<\"0\" || str.charAt(i)>\"9\")&& str.charAt(i) != '.'){\r\n\t\t\talert(\"单次价格:只能输入0--9之间的数字,不能有空格！\");\r\n\t\t\treturn false;\r\n\t   }\r\n\t}\r\n\tif(str>parseFloat(100) ){\r\n\t   alert(\"单次价格:不能大于100元！\");\r\n\t   return false;\r\n\t}\r\n\tif(str<0){\r\n\t\talert(\"单次价格:不能小于0！\\n\");\r\n\t\treturn false;\r\n\t}\r\n\tvar re = /([0-9]+\\.[0-9]{4})[0-9]*/;\r\n    aNew = str.replace(re,\"\$1\");\r\n    if(str.length>aNew.length){\r\n\t   str=aNew;\r\n\t   alert(\"单次价格:小数点后位数不能超过4位,请检查！\");\r\n\t   return false;\r\n\t}\r\n\treturn true;\r\n}\r\n\r\nfunction checkBudget(str){\r\n    \r\n\tvar i;\t\r\n\tif(str==\"\" ){\r\n\t\talert(\"请填写每日预算！\\n\");\r\n\t\treturn false;\r\n\t}\r\n\tfor(i=0;i<str.length;i++)  {\r\n\t   if ((str.charAt(i)<\"0\" || str.charAt(i)>\"9\")&& str.charAt(i) != '.'){\r\n\t\t\talert(\"每日预算:只能输入0--9之间的数字,不能有空格！\");\r\n\t\t\treturn false;\r\n\t   }\r\n\t}\r\n\tif(str<parseFloat(";
echo $GLOBALS['C_ZYIIS']['min_budeget'];
echo ")){\r\n\t\talert(\"每日限额:不能小于";
echo $GLOBALS['C_ZYIIS']['min_budeget'];
echo "！\\n\");\r\n\t\treturn false;\r\n\t}\r\n\t\r\n\treturn true;\r\n}\r\nfunction doPay(){\r\n\tvar m = \$i('imoney').value;\r\n\tif(isNULL(m)){\r\n        \talert(\"请填写充值金额\");\r\n\t\t\t\$i('imoney').focus();\r\n\t\t\treturn false;\r\n     }\r\n\t if(m<";
echo $GLOBALS['C_ZYIIS']['min_pay'];
echo "){\r\n        \talert(\"充值金额不能小于";
echo $GLOBALS['C_ZYIIS']['min_pay'];
echo "元\");\r\n\t\t\t\$i('imoney').focus();\r\n\t\t\treturn false;\r\n     }\r\n\tdocument.forms[\"pays\"].submit();\t\t\r\n}\r\nfunction Dodata(){\r\n    var _p = '元';\r\n\tvar plantype = \$(\"#plantype\").val();\r\n\t\$(\"#datadatev\").hide();\r\n\t\r\n\tif(plantype=='cpa' || plantype=='cps'  ){\r\n\t\t\$(\"#datadatev\").show();\r\n\t}else {\r\n\t\t\$(\"#serveripids\").hide();\r\n\t}\r\n\tif(plantype=='cps') _p='%';\r\n\t\$i('plan_p').innerHTML = _p;\r\n}\r\nfunction SetUmoney(v){\r\n\tif(v){\r\n\t\tv = v.split('￥');\r\n\t\tif(v[1]<100){\r\n\t\t\tif(!confirm('当前广告商的余额低于100元\\n确认么？\\n点击“取消”进入充值?')){\r\n\t\t\t\tsetTimeout(\"tb_show('在线充值','do.php?action=onlinepay&actiontype=add&username=\"+jsTrim(v[0])+\"&type=2=&TB_iframe=true&height=260&width=600')\",500);\r\n\t\t\t}\r\n\t\t}\r\n\t}\r\n}\r\nfunction sPrice(t){\r\n\tif(t==1) {\r\n\t\t\$(\"#s0_price\").show();\r\n\t\t\$(\"#s1_price\").show();\r\n\t\t\$(\"#s2_price\").show();\r\n\t\t\$(\"#s3_price\").show();\r\n\t\t\$(\"#s_price\").hide();\r\n\t}else {\r\n\t\t\$(\"#s0_price\").hide();\r\n\t\t\$(\"#s1_price\").hide();\r\n\t\t\$(\"#s2_price\").hide();\r\n\t\t\$(\"#s3_price\").hide();\r\n\t\t\$(\"#s_price\").show();\r\n\t}\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
