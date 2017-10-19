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
echo "\n<script src=\"/javascript/jquery/jquery.js\" language='JavaScript'></script>\n<script src=\"/javascript/jquery/thickbox.js\" language='JavaScript'></script>\n<div class=\"Wrapper\">\n<div class=\"AD_title\">\n<ul>\n\t<li class=\"AD_1\"><a href=\"?action=planlist\">广告计划</a></li>\n\t<li class=\"AD_2\"><a href=\"?action=zonelist\">广告位</a></li>\n\t<li class=\"AD_2\"><a href=\"?action=adslist\">智能广告</a></li>\n</ul>\n</div>\n<div class=\"AD_main\">\n<form id=\"form1\" name=\"form1\" method=\"post\" action=\"?action=planlist\">\n<table class=\"AD_table1\">\n\t<tr>\n\t\t<td class=\"AD_td1\">请选择网站：</td>\n\t\t<td><select name=\"select\"\n\t\t\tonchange=\"location.href = this.options[selectedIndex].value\">                    ";
foreach ( ( array )$site as $key => $s )
{
		echo "<option value = '?action=planlist&siteid=".$s['siteid']."&kv=".$key."&plantype=".$plantype."&audit=".$audit."'";
		if ( $s['siteid'] == $siteid )
		{
				echo "selected";
		}
		echo ">".$s['sitename']."</option>";
}
echo "</select>&nbsp;&nbsp;网址：<a\n\t\t\thref=\"http://";
echo $site[$kv]['siteurl'];
echo "\" target=\"_blank\">";
echo $site[$kv]['siteurl'];
echo "</a>&nbsp;<a href=\"?action=createsite\">增加网站</a></td>\n\t</tr>\n</table>\n<table class=\"AD_table2\">\n\t<tr>\n\t\t<td class=\"AD_td2\">计费类型：</td>\n\t\t<td class=\"AD_td3\">";
foreach ( ( array )$plantypearr as $pt )
{
		$n = $adsmodel->getPlanTypeAds( $pt['plantype'], $siteid );
		if ( $n )
		{
				echo "                  <input name=\"plantype[]\" type=\"checkbox\"\n\t\t\tid=\"plantype\" value=\"";
				echo $pt['plantype'];
				echo "\"\n\t\t\t";
				if ( in_array( $pt['plantype'], ( array )$plantypear ) )
				{
						echo "checked";
				}
				echo " />\n                  ";
				echo ucfirst( $pt['plantype'] );
				echo "                  ";
		}
}
echo "</td>\n\t\t<td class=\"AD_td2\">审核状态：</td>\n\t\t<td><input name=\"audit\" type=\"radio\" value=\"all\"\n\t\t\t";
if ( $audit == "all" || !$audit )
{
		echo "checked";
}
echo " /> 全部 <input name=\"audit\" type=\"radio\" value=\"n\"\n\t\t\t";
if ( $audit == "n" )
{
		echo "checked";
}
echo " /> 不需要申请 <input name=\"audit\" type=\"radio\" value=\"y\"\n\t\t\t";
if ( $audit == "y" )
{
		echo "checked";
}
echo " /> 需要申请 <span style=\"margin-left: 30px;\"></td>\n\t\t<td><input name=\"Input\" type=\"submit\" value=\"\" class=\"Table_sub1\" /></td>\n\t</tr>\n</table>\n<table class=\"AD_table3\" cellpadding=\"0\" cellspacing=\"0\">\n\t<tr class=\"AD_tr\">\n\t\t<td width=\"120\">计划LOGO</td>\n\t\t<td width=\"160\">计划</td>\n\t\t<td width=\"100\">类型</td>\n\t\t<td width=\"100\">展现模式</td>\n\t\t<td width=\"100\">佣金</td>\n\t\t<td width=\"100\">结算周期</td>\n\t\t<td width=\"160\">审核状态</td>\n\t\t<td width=\"120\">操作</td>\n\t</tr>\n\t\t                 ";
foreach ( ( array )$plan as $p )
{
		$isok = FALSE;
		$at = $adstypemodel->getPlanTypeName( $p['plantype'] );
		$planaclcomparison = $planmodel->getPlanWebTypeAclComparison( $p['planid'] );
		$siteacl = explode( ",", $planaclcomparison['data'] );
		if ( $planaclcomparison['comparison'] == "==" )
		{
				if ( in_array( $siteinfo['sitetype'], $siteacl ) )
				{
						$isok = TRUE;
				}
		}
		else if ( !in_array( $siteinfo['sitetype'], $siteacl ) )
		{
				$isok = TRUE;
		}
		echo "    <tr class=\"AD_TR1\">\n\t\t<td><img\n\t\t\tsrc=\"";
		if ( $p['logo'] )
		{
				echo $p['logo'];
		}
		else
		{
				echo "/templates/".Z_TPL."/images/no.gif";
		}
		echo "\"></td>\n\t\t<td>";
		echo $p['planname'];
		echo "</td>\n\t\t<td>";
		echo $p['plantype'];
		echo "</td>\n\t\t<td>";
		echo $at['name'];
		if ( !( $p['plantype'] != "cps" ) )
		{
				echo "(%)";
		}
		echo "</td>\n\t\t<td><font color=\"#FF7E00\">\n                      ";
		if ( $p['gradeprice'] == 1 )
		{
				if ( $site[$kv]['grade'] == "" )
				{
						$site[$kv]['grade'] = 0;
				}
				$sprice = "s".$site[$kv]['grade']."price";
				$price = $p[$sprice];
		}
		else
		{
				$price = $p['price'];
		}
		if ( $p['plantype'] == "cps" )
		{
				echo abs( $price )."%";
		}
		else
		{
				echo abs( $price );
		}
		echo "                      </font></td>\n\t\t<td>                      ";
		if ( $p['clearing'] == "day" )
		{
				echo "日结";
		}
		else if ( $p['clearing'] == "week" )
		{
				echo "周结";
		}
		else if ( $p['clearing'] == "month" )
		{
				echo "月结";
		}
		echo "\t\t\t\t\t\t</td>\n\t\t<td>            ";
		if ( $p['status'] == 3 )
		{
				echo "<span>饱和</span>";
		}
		else if ( !$isok )
		{
				echo "<span>类型不匹配</span>";
		}
		else if ( $p['audit'] == "y" )
		{
				$audit = $auditmodel->ckPlanIdAudit( $p['planid'], $siteid );
				if ( $audit == "re" )
				{
						echo "<span>申请中</span>";
				}
				else if ( $audit == "deny" )
				{
						echo "<span>拒绝申请</span>";
				}
				else if ( $audit == "ok" )
				{
						echo "<a href='?action=planads&planid=".$p['planid']."&siteid=".$siteid."'><strong>获取代码</strong></a>";
				}
				else
				{
						echo "<span id='e_".$p['planid']."'><a href='javascript:void(0)' onclick='doAudit(".$p['planid'].",".$siteid.")'><strong>申请广告</strong></a></span>";
				}
		}
		else
		{
				echo "<a href='?action=planads&planid=".$p['planid']."&siteid=".$siteid."'><strong >获取代码</strong></a>";
		}
		echo "</td>\n\t\t<td><a\n\t\t\thref=\"?action=planads&planid=";
		echo $p['planid'];
		echo "&siteid=";
		echo $siteid;
		echo "\">查看广告</a></td>\n\n\t</tr> \n\t          ";
}
echo "\n       \n   </table>\n\n</form>\n</div>\n<script language=\"JavaScript\" type=\"text/javascript\">\nfunction doAudit(pid,sid){\n\tif(!sid){ \n\t\talert(\"网站未选择\");\n\t\treturn false;\n\t}\n\t\$.get(\"?action=postaudit&actiontype=audit&planid=\"+pid+\"&siteid=\"+sid+\"\");\n\t\$i(\"e_\"+pid).innerHTML = \"<font color='#FF830A'>申请中</font>\";\n\tsetTimeout(\"tb_show('申请成功','#TB_inline?height=100&width=300&inlineId=aContent')\",500);\n}\nfunction doCreateSite(){\n\tt = setTimeout(\"tb_show('无法获取代码','#TB_inline?height=150&width=500&inlineId=sContent')\",1000);\n}\n             var tmpHeight = 0;\n            var leftHeight = \$('#leftID').height();\n            var rightHeight = \$('#rightID').height();\n            tmpHeight = rightHeight >= leftHeight ? rightHeight : leftHeight;\n            \$('#leftID').height(tmpHeight);\n            \$('#rightID').height(tmpHeight);\n";
if ( !$siteid )
{
		echo "\tsetTimeout(\"tb_show('无法获取代码','#TB_inline?height=150&width=500&inlineId=sContent')\",500);\n";
}
echo "       </script></div>\n";
include( TPL_DIR."/footer.php" );
?>
