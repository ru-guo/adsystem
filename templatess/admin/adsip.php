<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !_obfuscate_X29iZnVzY2F0ZV94Z2tsY2c0N2Jx8ÿ( "IN_ZYADS" ) )
{
		exit( );
}
include( TPL_DIR."/header.php" );
echo "<SCRIPT LANGUAGE=\"JavaScript\" src=\"/javascript/jiandate.js\"></SCRIPT>\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td  valign=\"top\">";
if ( $statetype == "success" )
{
		echo "            <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"97%\" >\r\n              <tr>\r\n                <td height=\"30\"><img  src='/templates/";
		echo Z_TPL;
		echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">²Ù×÷³É¹¦£¡</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
}
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\"> \r\n\t\t\t\t\t \r\n                          <li><a href=\"javascript:doShow()\">´ò¿ª/¹Ø±ÕIPÐÅÏ¢</a> </li> \r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=";
echo DAYS;
echo "\" ";
if ( $timerange == DAYS )
{
		echo "class=\"li-active\"";
}
echo ">½ñÈÕ±¨±í</a></li>\r\n\t\t\t\t\t\t  \r\n\t\t\t\t\t\t  \r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=";
echo $zday;
echo "\" ";
if ( $timerange == $zday )
{
		echo "class=\"li-active\"";
}
echo ">×òÈÕ±¨±í</a> </li>\r\n\t\t\t\t\t\t    \r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=delipinfo\"   onclick=\"if ( confirm('Äú½«É¾³ýËùÓÐIPÏà¹ØÐÅÏ¢\\nÄúÈ·¶¨Ã´£¿') ) { return true;}return false;\">Ò»¼üÇå¿ÕËùÓÐIPÊý¾Ý</a> </li>\r\n\t\t\t\t\t\t  \r\n\t\t\t\t\t\t  \r\n\t\t\t\t\t\t  ";
if ( $actiontype == "search" )
{
		echo "\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"javascript:void(0)\" class=\"li-active\">";
		echo $timerange;
		echo "</a> </li>\r\n\t\t\t\t\t\t  ";
}
echo "                        </ul></td>\r\n                      <td width=\"500\" align=\"right\"></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"choosetype\" class=\"select\" id=\"choosetype\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>ÅúÁ¿²Ù×÷</option>\r\n                    <option value=\"del\">É¾³ý</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"Ìá½»\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"16\"/>\r\n                    &nbsp;\r\n                    <select name=\"searchtype\" id=\"searchtype\">\r\n                      <option value=\"1\" selected=\"selected\" ";
if ( $searchtype == "1" )
{
		echo "selected";
}
echo ">»áÔ±ID</option>\r\n                      <option value=\"2\" ";
if ( $searchtype == "2" )
{
		echo "selected";
}
echo ">¼Æ»®ID</option>\r\n                      <option value=\"3\" ";
if ( $searchtype == "3" )
{
		echo "selected";
}
echo ">¹ã¸æID</option>\r\n                      <option value=\"4\" ";
if ( $searchtype == "4" )
{
		echo "selected";
}
echo ">IPµØÖ·</option>\r\n\t\t\t\t\t  <option value=\"5\" ";
if ( $searchtype == "5" )
{
		echo "selected";
}
echo ">ÍøÕ¾ID</option>\r\n                    </select>\r\n                    <select name=\"planid\" id=\"planid\">\r\n                       <option value=\"\">ËùÓÐ²úÆ·</option>\r\n\t\t\t\t\t\t\t\t\t ";
foreach ( ( array )$plantypearr as $ptr )
{
		echo "\t\t\t\t\t\t\t\t\t  <optgroup  label=\"";
		echo _obfuscate_X29iZnVzY2F0ZV9tcjE2amd1cmVn8ÿ( $ptr['plantype'] );
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
						echo _obfuscate_X29iZnVzY2F0ZV9tcjE2amd1cmVn8ÿ( $pt['plantype'] );
						echo "]</option>\r\n\t\t\t\t\t\t\t\t\t\t";
				}
		}
		echo "\t\t\t\t\t\t\t\t\t\t </optgroup>\r\n\t\t\t\t\t\t\t\t\t\t";
}
echo "                    </select>\r\n                    <select name=\"adstypeid\"   id=\"adstypeid\">\r\n\t\t\t\t\t<option value=\"\">ËùÓÐ¹ã¸æÀàÐÍ</option>\r\n\t\t\t\t\t ";
foreach ( ( array )$plantypearr as $pt )
{
		$ats = $adstypemodel->_obfuscate_X29iZnVzY2F0ZV9CQ1lfYUdkc0IzNTRBV3BrY3pZwÿÿ( $pt['plantype'] );
		echo " \t\t\t\t\t\t<optgroup  label=\"";
		echo _obfuscate_X29iZnVzY2F0ZV9tcjE2amd1cmVn8ÿ( $pt['plantype'] );
		echo "\">\r\n\t\t\t\t\t\t\t\t\t\t";
		foreach ( ( array )$ats as $at )
		{
				echo "                                        <option value=\"";
				echo $at['adstypeid'];
				echo "\" ";
				if ( $adstypeid == $at['adstypeid'] )
				{
						echo "selected";
				}
				echo " >";
				echo $at['name'];
				echo "</option> ";
		}
		echo "\t\t\t\t\t  </optgroup>\r\n\t\t\t\t\t ";
}
echo "\t\t\t\t\t \r\n                    </select>\r\n                    <input name=\"timerange\" type=\"text\" id=\"timerange\" value=\"";
echo $timerange;
echo "\" />\r\n                    <img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','1')\"/>\r\n                    <input name=\"Submit\" type=\"submit\" class=\"submit-x\" id=\"Submit\" value=\"²éÑ¯\" />\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=del\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'id')\" /></td>\r\n                        <td width=\"80\">ÀàÐÍ</td>\r\n                        <td width=\"100\">»áÔ±</td>\r\n                        <td width=\"120\">¼Æ»®</td>\r\n                        <td width=\"80\">¹ã¸æID</td>\r\n                        <td width=\"190\">IP</td>\r\n                        <td width=\"65\">ÓÐÐ§</td>\r\n                        <td width=\"60\">ÖØ¸´</td>\r\n                        <td width=\"70\">ÏÔÊ¾Ê±¼ä</td>\r\n                        <td>¼ÇÂ¼Ê±¼ä</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
if ( !$adsip )
{
		echo "<tr><td height=\"60\"   class=\"td_b_4 \" id=\"b-bottom\" >&nbsp;</td>\r\n\t\t\t\t\t\t\t\t  <td colspan=\"10\" align=\"center\">ÎÞ±¨±í</td>\r\n\t\t\t\t\t\t\t\t  <td  class=\"td_b_5\">&nbsp;</td>\r\n\t\t\t\t\t\t\t\t</tr>";
}
foreach ( ( array )$adsip as $ip )
{
		$info = $adsipmodel->_obfuscate_DnRtbylienM_cBcE( $ip['ipinfoid'], _obfuscate_X29iZnVzY2F0ZV95d2pqbWfwÿÿ( "Y-m-d", $ip['clicktime'] ) );
		$ref = $adsipmodel->_obfuscate_X29iZnVzY2F0ZV9CSEpwRnlnM2VnZ39kd( $ip['ip'], $info['refererid'] );
		$siteurl = $adsipmodel->_obfuscate_X29iZnVzY2F0ZV9kUUY1YTJSf0RpVVJDQWRzRFhJwÿÿ( $ip['ip'], $info['siteurlid'] );
		$agent = $adsipmodel->_obfuscate_X2IgZGMIbSNueCdw( $ip['ip'], $info['useragentid'] );
		$u = $usermodel->_obfuscate_X29iZnVzY2F0ZV9BV2R2TDJwdlFESmdKR3d6Wngwwÿÿ( $ip['uid'] );
		$plan = $planmodel->admingetplanone( $ip['planid'] );
		$at = $adstypemodel->getadstypeid( $ip['adstypeid'] );
		$ip['ip'] = _obfuscate_X29iZnVzY2F0ZV9uMmNqZng1eGR38ÿ( $ip['ip'] );
		echo "                      <tr>\r\n                        <td height=\"40\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input name=\"id[]\" type=\"checkbox\" id=\"id[]\"  value=\"";
		echo _obfuscate_X29iZnVzY2F0ZV95d2pqbWfwÿÿ( "d", $ip['clicktime'] )."/".$ip['ipinfoid'];
		echo "\" />\r\n                        </td>\r\n                        <td><font color=\"#FF0000\">";
		echo $at['plantype'];
		echo " (";
		echo $at['name'];
		echo ")</font></td>\r\n                        <td width=\"100\"><a href=\"do.php?action=adsip&timerange=";
		echo $timerange;
		echo "&actiontype=search&searchval=";
		echo $u['uid'];
		echo "&searchtype=1\">";
		echo $u['username'] == "" ? "ÒÑÉ¾³ýµÄ»áÔ±" : $u['username'];
		echo "</a> <a href=\"do.php?action=affiliate&actiontype=search&searchval=";
		echo $u['uid'];
		echo "&searchtype=2\">#";
		echo $u['uid'];
		echo "</a> </td>\r\n                        <td><strong><a href=\"do.php?action=adsip&timerange=";
		echo $timerange;
		echo "&actiontype=search&searchval=";
		echo $ip['planid'];
		echo "&searchtype=2\">";
		echo $plan['planname'];
		echo "</a></strong> <a href=\"do.php?action=plan&actiontype=search&searchval=";
		echo $ip['planid'];
		echo "&searchtype=2\">#";
		echo $ip['planid'];
		echo "</a> </td>\r\n                        <td><a href=\"do.php?action=adsip&timerange=";
		echo $timerange;
		echo "&actiontype=search&searchval=";
		echo $ip['adsid'];
		echo "&searchtype=3\"><font color=\"#333333\">";
		echo $ip['adsid'];
		echo "</font></a></td>\r\n                        <td><a href=\"do.php?action=adsip&timerange=";
		echo $timerange;
		echo "&actiontype=search&searchval=";
		echo $ip['ip'];
		echo "&searchtype=4\" title=\"²éÑ¯IP\"><font color=\"#333333\">";
		echo $ip['ip']."&nbsp;&nbsp;";
		echo convertip( $ip['ip'] );
		echo "</font></a>";
		if ( $adsipmodel->_obfuscate_X29iZnVzY2F0ZV9JaTRGWkNsclpB8ÿ( $info ) )
		{
				echo "<br /><font color=\"#FF0000\">!¿ÉÒÉ</font>";
		}
		echo "</td>\r\n                        <td>";
		if ( $ip['status'] == "n" )
		{
				echo "<font  color=#FF0000>ÎÞ</font><br>";
				if ( $ip['deduction'] != "0" )
				{
						echo "<font  color=gray>¿ÛÁ¿</font>";
				}
				else if ( $ip['info'] == "cookie" )
				{
						echo "<font  color=gray>ÖØ¸´</font>";
				}
				else if ( $ip['info'] == "viewtime" )
				{
						echo "<font  color=gray>3ÃëÄÚ</font>";
				}
		}
		else if ( $ip['status'] == "y" && $ip['deduction'] != "0" )
		{
				echo "<font  color=#FF0000>¿ÛÁ¿</font>";
		}
		else
		{
				echo "ÓÐÐ§";
		}
		echo "</td>\r\n                        <td>µÚ<font color=\"#FF0000\">";
		echo $info['clicks'];
		echo "</font>´Î</td>\r\n                        <td>";
		echo _obfuscate_c2sscnw1( _obfuscate_X29iZnVzY2F0ZV95d2pqbWfwÿÿ( "Y-m-d H:i:s", $info['viewtime'] ), 10 );
		echo "</td>\r\n                        <td>";
		echo _obfuscate_X29iZnVzY2F0ZV95d2pqbWfwÿÿ( "Y-m-d H:i:s", $ip['clicktime'] );
		echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr  class=\"td_b_m\" style=\"display:none\">\r\n                        <td height=\"40\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  >&nbsp;</td>\r\n                        <td colspan=\"9\"><ul class=\"ipul\">\r\n                            <li>AGENT:";
		echo $agent['useragent'];
		echo "</li>\r\n                            <li  onclick=\"tourl('";
		echo $siteurl['siteurl'];
		echo "')\" style=\"cursor:pointer\">Í¶·ÅÒ³Ãæ:";
		echo _obfuscate_chz5d254ajnmdbec( $siteurl['siteurl'] );
		echo "</li>\r\n                            <li onclick=\"tourl('";
		echo $ref['referer'];
		echo "')\" style=\"cursor:pointer\">À´Ô´ÓÚ:";
		echo $ref['referer'];
		echo "</li>\r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t  <li>Î»ÖÃ:";
		echo $info['scrollh'];
		echo "</li>\r\n\t\t\t\t\t\t\t  <li>ÆÁÄ»:";
		echo $info['screen'];
		echo "</li>\r\n\t\t\t\t\t\t\t  <li>µã»÷×ø±ê:";
		echo $info['x'];
		echo "_";
		echo $info['y'];
		echo "</li>\r\n\t\t\t\t\t\t\t  <li>¹ì¼£:";
		echo $info['xx'];
		echo "_";
		echo $info['yy'];
		echo "</li>\r\n\t\t\t\t\t\t\t    <li>²å¼þÐÅÏ¢:";
		echo $info['plugins'];
		echo "</li>\r\n                          </ul></td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'id','chkallde')\" /></td>\r\n                        <td>ÀàÐÍ</td>\r\n                        <td>»áÔ±</td>\r\n                        <td>¼Æ»®</td>\r\n                        <td>¹ã¸æID</td>\r\n                        <td>IP</td>\r\n                        <td>ÓÐÐ§</td>\r\n                        <td>ÖØ¸´</td>\r\n                        <td>ÏÔÊ¾Ê±¼ä</td>\r\n                        <td>¼ÇÂ¼Ê±¼ä</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"choosetype\" class=\"select\" id=\"choosetype\" onchange=\"\$i('choosetype').value=this.value\">\r\n                          <option>ÅúÁ¿²Ù×÷</option>\r\n                          <option value=\"del\">É¾³ý</option>\r\n                        </select>\r\n                        <input type=\"button\" name=\"Submit\" value=\"Ìá½»\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                        <samp onclick=\"window.scrollTo(0,0);\" style=\" cursor:pointer\">&nbsp;&nbsp;TOP</samp></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = 'É¾³ý';\t\r\n\tif(t=='') {alert('ÅúÁ¿Ñ¡ÏîÎ´Ñ¡Ôñ');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('ÇëÑ¡ÖÐÄúÒªÉ¾³ýµÄ±¨±í'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('ÄúÈ·ÈÏÒª'+ t +'Õâ' + numchecked + '¸ö¹ã¸æÎ»±¨±í£¿\\n¡°È·ÈÏ¡±ºóÕâ¸ö¹ã¸æÎ»µÄÒ»ÌìÊý¾Ý¡¾²»·Ö¹ã¸æ¡¿µÄ±¨±íÈ«²¿É¾³ý£¡¡£\\nµã¡°È·ÈÏ¡±'+ t +'£¬µã¡°È¡Ïû¡±È¡Ïû²Ù×÷¡£')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction doShow(){\r\nvar theAnswer = \$(\".td_b_m\");\r\nif(theAnswer.is(\":hidden\")) theAnswer.show();   \r\nelse theAnswer.hide();   \r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
