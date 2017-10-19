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
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><ul id=\"li-type\">\r\n                    <li><a href=\"do.php?action=";
echo $action;
echo "\" ";
if ( $plantype == "" )
{
		echo "class=\"li-active\"";
}
echo ">全部</a></li>\r\n                    ";
foreach ( ( array )$plantypearr as $pt )
{
		$pn = $sitemodel->adszonecount( $pt['plantype'] );
		echo "                    <li>|</li>\r\n                    <li><a href=\"do.php?action=";
		echo $action;
		echo "&plantype=";
		echo $pt['plantype'];
		echo "\" ";
		if ( $plantype == $pt['plantype'] )
		{
				echo "class=\"li-active\"";
		}
		echo ">";
		echo $pt['name']."(".ucfirst( $pt['plantype'] ).")(".$pn['num'].") ";
		echo "</a> </li>\r\n                    ";
}
echo "                  </ul></td>\r\n              </tr>\r\n            </table>\r\n            <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" ";
if ( $plantype == "" || !$adstype )
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
echo "</a></li>\r\n                    ";
foreach ( ( array )$adstype as $at )
{
		$an = $sitemodel->tzyads_zone_num( $at['adstypeid'] );
		echo "                    <li>|</li>\r\n                    <li><a href=\"do.php?action=";
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
		echo "</a> </li>\r\n                    ";
}
echo "                  </ul></td>\r\n                <td width=\"100%\">&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"50\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n                    <option value=\"del\">删除</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"20\" />\r\n                    <select name=\"searchtype\">\r\n                      <option value=\"1\" ";
if ( $searchtype == "1" )
{
		echo "selected";
}
echo ">广告位ID</option>\r\n                      <option value=\"2\" ";
if ( $searchtype == "2" )
{
		echo "selected";
}
echo ">会员ID</option>\r\n                      <option value=\"3\" ";
if ( $searchtype == "3" )
{
		echo "selected";
}
echo ">网站ID</option>\r\n                    </select>\r\n                    <span id=\"sidv\">\r\n                   \r\n                    </span>\r\n                    <input type=\"submit\" name=\"Submit22\" value=\"搜索\" class=\"submit-x\"/>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form)\" /></td>\r\n                        <td width=\"70\">广告位ID</td>\r\n                        <td width=\"140\">广告位名称</td>\r\n                        <td width=\"90\">属于会员</td>\r\n                        <td width=\"120\">属于网站</td>\r\n                        <td width=\"80\">计费形式</td>\r\n                        <td width=\"80\">广告类型</td>\r\n                        <td width=\"80\">尺寸</td>\r\n                        <td>描述</td>\r\n                        <td width=\"60\">修改</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
foreach ( ( array )$zone as $z )
{
		$user = $usermodel->getusersuidrow( $z['uid'] );
		$s = $sitemodel->getzoneandsite( $z['zoneid'] );
		$a = $adstypemodel->getadstypeid( $z['adstypeid'] );
		$toeurl = $z['adstypeid'] == 13 ? "createzt" : "zone";
		echo "                      <tr>\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input name=\"zoneid[]\" type=\"checkbox\" id=\"zoneid[]\" value=\"";
		echo $z['zoneid'];
		echo "\" />\r\n                        </td>\r\n                        <td>";
		echo $z['zoneid'];
		echo "</td>\r\n                        <td width=\"140\">";
		echo str( $z['zonename'], 16 );
		echo "</td>\r\n                        <td><a href=\"do.php?action=affiliate&actiontype=search&searchtype=2&searchval=";
		echo $user['uid'];
		echo "\">";
		echo $user['username'];
		echo "</a></td>\r\n                        <td><a href=\"do.php?action=site&actiontype=search&searchtype=4&searchval=";
		echo $s['siteid'];
		echo "\">";
		echo $s['sitename'];
		echo "</a></td>\r\n                        <td>";
		echo ucfirst( $z['plantype'] );
		echo "</td>\r\n                        <td>";
		echo $a['name'];
		echo "</td>\r\n                        <td>";
		echo $z['width']."x".$z['height'];
		echo "</td>\r\n                        <td>";
		echo str( $z['zoneinfo'], 20 );
		echo "</td>\r\n                        <td><a href=\"do.php?action=userlogin&uid=";
		echo $z['uid'];
		echo "&url=";
		echo base64_encode( "/affiliate/?action=".$toeurl."&actiontype=edit&zoneid=".$z['zoneid']."&siteid=".$z['siteid']."" );
		echo "\" target=\"_blank\"  >修改</a></td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'zoneid','chkallde')\" /></td>\r\n                        <td >广告位ID</td>\r\n                        <td>广告位名称</td>\r\n                        <td>属于会员</td>\r\n                        <td>属于网站</td>\r\n                        <td>计费模式</td>\r\n                        <td>广告类型</td>\r\n                        <td>尺寸</td>\r\n                        <td>描述</td>\r\n                        <td>修改</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                          <option>批量操作</option>\r\n                          <option value=\"del\">删除</option>\r\n                        </select>\r\n                        <input type=\"button\" name=\"Submit3\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = '删除';\t\r\n\tif(t=='') {alert('批量选项未选择');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('请选中您要删除的广告位'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('您确认要'+ t +'这' + numchecked + '个广告位 ？。\\n点“确认”'+ t +'，点“取消”取消操作。')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\n \r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
