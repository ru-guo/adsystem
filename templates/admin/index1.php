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
echo "<script type=\"text/javascript\" src=\"/javascript/swfobject.js\"></script>\r\n<script language=\"JavaScript\">\r\nfunction loadings(url,i){ \r\n\t\$.get(\"dos.php?action=cpu&url=\"+url,null,function callback(data){\r\n\t\t\$(\"#cpus\"+i).css('width',data);\r\n\t\t\$(\"#cpun\"+i).html(data+'%');\r\n\t});\r\n}\r\n</script>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"";
if ( $type == "" )
{
		echo "active";
}
else
{
		echo "link";
}
echo "\"> <a href=\"do.php?action=index\"><span>控制面版</span></a> </li>\r\n\t\t\t\r\n                    <li class=\"";
if ( $type == "system" )
{
		echo "active";
}
else
{
		echo "link";
}
echo "\"> <a   href=\"do.php?action=index&type=system\"><span>版本信息</span></a> </li>\r\n                    <li class=\"";
if ( $type == "copyright" )
{
		echo "active";
}
else
{
		echo "link";
}
echo "\"> <a   href=\"do.php?action=index&type=copyright\"><span>版权所有</span></a> </li>\t\t \r\n\t\t\t\t\t";
if ( PHP_OS == "Linux" )
{
		echo "\t\t\t\t\t<li class=\"";
		if ( $type == "server" )
		{
				echo "active";
		}
		else
		{
				echo "link";
		}
		echo "\"> <a   href=\"dos.php?action=index&type=server\"><span>服务器负载</span></a></li>\r\n\t\t\t\t\t";
}
echo "                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td>";
if ( $type == "" )
{
		echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td width=\"65%\"  valign=\"top\" bgcolor=\"#FFFFFF\">\r\n\t\t \r\n\t\t  <table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n\t\t    <div style=\"margin-top:10px; display:none\" id=\"updates\"></div>\r\n              <tr>\r\n                <td height=\"50\"><span style=\" font-size:14px; font-weight:bold\">当日PV：";
		echo $views;
		echo "</span> </td>\r\n              </tr>\r\n              <tr>\r\n                <td><div id=\"w\"> <strong>You need to upgrade your Flash Player</strong>\r\n                      <script type=\"text/javascript\">\t\r\n\t\t\t\t\t\tvar so = new SWFObject(\"/templates/admin/charts/line.swf\", \"amcolumn\", \"100%\", \"250\", \"8\", \"#FFFFFF\");\r\n\t\t\t\t\t\tso.addVariable(\"path\", \"/templates/admin/charts/\");\r\n\t\t\t\t\t\tso.addVariable(\"settings_file\", escape(\"/templates/admin/charts/line_settings.xml\")); \r\n\t\t\t\t\t\tso.addVariable(\"data_file\", escape(\"dos.php?action=trenddata&actiontype=line&timerange=";
		echo DAYS."/".DAYS;
		echo "dos.php?&searchtype=&searchval=\"));\t\t\r\n\t\t\t\t\t\tso.addVariable(\"preloader_color\", \"#999999\");\t\r\n\t\t\t\t\t\tso.write(\"w\");\r\n\t\t\t\t\t</script>\r\n                  </div></td>\r\n              </tr>\r\n            </table></td>\r\n          <td width=\"35%\" valign=\"top\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"dddddd\" align=center style=\"border-left:1px solid #DDDDDD;border-top:0px solid #dddddd; border-bottom:1px solid #DDDDDD;\">\r\n              <tr align=\"center\" bgcolor=\"#CCCCCC\">\r\n                <td height=\"30\" colspan=\"7\"align=\"left\" style=\"color:#333; font-size:18px; background-color:#eeeeee; padding-left:10px\">日历</td>\r\n              </tr>\r\n              <tr align=\"center\" bgcolor=\"#CCCCCC\">\r\n                <td height=\"19\" bgcolor=\"#F8F8F8\"><table width=\"98%\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#eeeeee\" align=center>\r\n                    <tr align=\"center\" bgcolor=\"#CCCCCC\">\r\n                      <td height=\"25\" colspan=\"7\" align=\"left\" bgcolor=\"#F8F8F8\" style=\"color:#333;padding-left:10px;font-size:20px;\">";
		echo date( "Y", TIMES );
		echo "年";
		echo date( "m", TIMES );
		echo "月</td>\r\n                    </tr>\r\n                    <tr align=\"center\" bgcolor=\"#CCCCCC\">\r\n                      <td width=\"14%\" height=\"19\" bgcolor=\"#F8F8F8\"> 日</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> 一</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> 二</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> 三</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> 四</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> 五</td>\r\n                      <td width=\"14%\" height=\"25\" bgcolor=\"#F8F8F8\"> 六</td>\r\n                    </tr>\r\n                  </table>\r\n                  <table width=\"98%\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#eeeeee\" align=center>\r\n                    <tr align=center>\r\n                      ";
		$doYear = date( "Y", TIMES );
		$doMonth = date( "m", TIMES );
		$doDate = date( "Y-m-j", TIMES );
		$doStart = date( "w", mktime( 0, 0, 0, $doMonth, 1, $doYear ) );
		$doEnd = date( "t", mktime( 0, 0, 0, $doMonth, 1, $doYear ) );
		$i = 1;
		for ( ;	$i < 36;	++$i	)
		{
				$ws = date( "w", mktime( 0, 0, 0, $doMonth, $d + 1, $doYear ) );
				$d = $i - $doStart;
				if ( $doStart < $i && $i <= $doEnd + $doStart )
				{
						if ( $d == date( "d", TIMES ) && date( "n", TIMES ) == $doMonth && date( "Y", TIMES ) == $doYear )
						{
								echo "<td align=center bgcolor=#ffaaaa height=41 style='position:relative;width:14.3%'>";
								if ( $GLOBALS['C_ZYIIS']['clearing_weekdata'] == $ws )
								{
										echo "<span  class='d2if'>结算</span>";
								}
								if ( $GLOBALS['C_ZYIIS']['clearing_monthdata'] == $d )
								{
										echo "<span  class='d2if'>月结</span>";
								}
								echo "<a href='do.php?action=stats&timerange=".$doYear."-".$doMonth."-".$d."/".$doYear."-".$doMonth."-".$d."' >".$d."</a></td>";
						}
						else
						{
								echo "<td align=center height=41 bgcolor=#ffffff style='position:relative;width:14.3%'>";
								if ( $GLOBALS['C_ZYIIS']['clearing_weekdata'] == $ws )
								{
										echo "<span class='d2if'>周结</span>";
								}
								if ( $GLOBALS['C_ZYIIS']['clearing_monthdata'] == $d )
								{
										echo "<span  class='d2if'>月结</span>";
								}
								echo "<a href='do.php?action=stats&timerange=".$doYear."-".$doMonth."-".$d."/".$doYear."-".$doMonth."-".$d."'>".$d."</a></td>";
						}
				}
				else
				{
						echo "<td bgcolor=#ffffff> </td>";
				}
				if ( $i % 7 == 0 )
				{
						echo "</tr><tr>";
				}
		}
		echo "                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n          </table></td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" >\r\n        <tr>\r\n          <td height=\"111\"  ><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"1\" class=\"table1b\">\r\n              <tr>\r\n                <td height=\"30\" class=\"td-_obfuscate_le\"><strong>当日新增情况</strong></td>\r\n                <td class=\"td-_obfuscate_le\">&nbsp;</td>\r\n                <td class=\"td-_obfuscate_le\">&nbsp;</td>\r\n                <td class=\"td-_obfuscate_le\">&nbsp;</td>\r\n              </tr>\r\n              <tr>\r\n                <td class=\"td-_obfuscate_le\"><img src=\"/templates/";
		echo Z_TPL;
		echo "/images/add.gif\" border=\"0\" align=\"absmiddle\"> 新增会员 <a href=\"do.php?action=affiliate&amp;actiontype=waitact\">";
		echo $addusernum;
		echo "</a> 个 </td>\r\n                <td class=\"td-_obfuscate_le\"> 当日新增网站 <a href=\"do.php?action=site&status=0\">";
		echo $addsitenum;
		echo "</a> 个</td>\r\n                <td class=\"td-_obfuscate_le\"> 当日新增广告 <a href=\"do.php?action=ads&status=1\">";
		echo $addadsnum;
		echo "</a> 个</td>\r\n                <td class=\"td-_obfuscate_le\"> 未读短信 <a href=\"do.php?action=pm&isadmin=1\">";
		echo $pmnum;
		echo "</a> 个</td>\r\n              </tr>\r\n              <tr>\r\n                <td>&nbsp;</td>\r\n                <td>&nbsp;</td>\r\n                <td>&nbsp;</td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table>\r\n      ";
}
if ( $type == "system" )
{
		echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">组件信息</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" height=\"200\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr class=\"t1\">\r\n                <td width=\"500\" class=\"locked\">MYSQL版本:</td>\r\n                <td  >";
		echo $dbversion;
		echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">服务器时间:</td>\r\n                <td>";
		echo DATETIMES;
		echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">操作系统及 PHP:</td>\r\n                <td >";
		echo $serverinfo;
		echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">文件上传:</td>\r\n                <td >";
		if ( $fileupload )
		{
				$fileupload = "允许 ".ini_get( "upload_max_filesize" );
		}
		else
		{
				$fileupload = "<font color=\"red\">禁止</font>";
		}
		echo $fileupload;
		echo "                </td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">Register_Globals:</td>\r\n                <td >";
		echo $globals == 1 ? "打开" : "关闭";
		echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">GD Library:</td>\r\n                <td>";
		echo $gd_version;
		echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">联盟版本:</td>\r\n                <td>V";
		echo ZYIIS_VERSION;
		echo "</td>\r\n              </tr>\r\n              <tr  >\r\n                <td  >&nbsp;</td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      ";
}
if ( $type == "copyright" )
{
		echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">所有权声明</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr  >\r\n                <td  ><ul style=\"line-height:30px; padding:10px\">\r\n                    <li>中易广联盟系统属于赣州盈众信息科技有限公司版权所有，官方网站（<a href=\"http://www.zyiis.com\" target=\"_blank\">www.zyiis.com</a>）。 </li>\r\n                  </ul>\r\n　                   </td>\r\n              </tr>\r\n              <tr  ></tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">版权声明</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr  >\r\n                <td  ><ul style=\"line-height:30px; padding:10px\">\r\n                    <li>1、本软件为商业软件,未经官方授权，不得向任何第三方提供本软件系统。 </li>\r\n                    <li>2、本软件受中华人民共和国《著作权法》《计算机软件保护条例》等相关法律、法规保护，作者保留一切权利。 </li>\r\n                    <li>3、用户自由选择是否使用,在使用中出现任何问题和由此造成的一切损失中易软件将不承担任何责任。 </li>\r\n                    <li>4、任何公司或是人个盗版或是破解中易软件行为,将承担全部责任 。 </li>\r\n                    <li>5、如果中易确定他人行为有损其企业的利益，则中易和其关联企业或是个人将对其进行法律诉讼以保障自身权益。 </li>\r\n                  </ul>\r\n　                   </td>\r\n              </tr>\r\n              <tr  ></tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">免责声明</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr  >\r\n                <td  ><ul style=\"line-height:30px; padding:10px\">\r\n                    <li>任何公司或是个人所购买的中易产品运作的联盟，中易软件明确地声明就该联盟的可靠性 安全性,在运营的过程中所有由用户自己所发布的广告或是其它第三方信息所引起的一切问题或纠纷，本软件概不承担任何责任，也不提供任何明确的或暗示的保证。 </li>\r\n                  </ul>\r\n　                   </td>\r\n              </tr>\r\n              <tr  ></tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">联系方式</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr  >\r\n                <td  ><ul style=\"line-height:30px; padding:10px\">\r\n                    <li>公司名称：赣州盈众信息科技有限公司<br>\r\n                      The YingZhong Network Science and Technology CO.Ltd </li>\r\n                    <li>Q Q：381611116&nbsp;&nbsp;&nbsp; 599682&nbsp;&nbsp;&nbsp; 93714 </li>\r\n                    <li>咨询电话：<span id=\"A_KFDH\">0797-8126582</span> </li>\r\n                    <li>非上班时间：<span id=\"A_KFDH\">13807972686</span></li>\r\n                    <li>信箱：<a href=\"mailto:a@zyiis.com\">a@zyiis.com</a> </li>\r\n                    <li>MSN：<a href=\"msnim:chat?contact=zjq8188@hotmail.com\">zjq8188@hotmail.com</a></li>\r\n                  </ul>\r\n　                   </td>\r\n              </tr>\r\n              <tr  ></tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n \r\n\t  \r\n\t   ";
}
if ( $type == "server" )
{
		echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">\r\n\t\t   <table width=\"96%\" height=\"30\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tr>\r\n    <td><span class=\"td-_obfuscate_le\"><img src=\"/templates/";
		echo Z_TPL;
		echo "/images/bulb.gif\" border=\"0\" align=\"absmiddle\" />只针对Linux系统检测。</span></td>\r\n    </tr>\r\n</table>\r\n\r\n\t\t";
		$server = explode( ",", $GLOBALS['C_ZYIIS']['sync_setting'].",".$GLOBALS['C_ZYIIS']['authorized_url'] );
		foreach ( $server as $key => $val )
		{
				if ( $val )
				{
						echo "\t\t  <table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\" style=\"margin-top:10px\">\r\n              <tr >\r\n                <td style=\"padding:10px\"><h2 class=\"page-title\">";
						echo $val;
						echo "</h2></td>\r\n              </tr>\r\n              <tr  >\r\n                <td style=\"padding:10px\"><table width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                  <tr>\r\n                    <td width=\"60\" height=\"40\">CPU：</td>\r\n                    <td><span class=\"slpb\"><span style=\"width:0%;\" class=\"slpt\" id=\"cpus";
						echo $key;
						echo "\" ></span> </span> <span id=\"cpun";
						echo $key;
						echo "\" style=\"padding-left:310px; padding-top:10px;display:block\">分析中..</span></td>\r\n                  </tr>\r\n                </table></td>\r\n              </tr>\r\n              \r\n            </table>\r\n\t\t\t<script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\t\tloadings('";
						echo $val;
						echo "','";
						echo $key;
						echo "');\r\n\t\t\t</script>\t\r\n\t\t\t";
				}
		}
		echo "\t\t\t\t\t\r\n\t\t  </td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      ";
}
echo "\t  \r\n      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n        <tr>\r\n          <td>&nbsp;</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\n";
echo "</script>\r\n \r\n\r\n";
include( TPL_DIR."/footer.php" );
?>
