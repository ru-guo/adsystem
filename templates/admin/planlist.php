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
echo "\n<script src=\"/javascript/jquery/jquery.js\" language='JavaScript'></script>\n<script src=\"/javascript/jquery/thickbox.js\" language='JavaScript'></script>\n<div class=\"Wrapper\">\n<div class=\"AD_title\">\n<ul>\n\t<li class=\"AD_1\"><a href=\"?action=planlist\">���ƻ�</a></li>\n\t<li class=\"AD_2\"><a href=\"?action=zonelist\">���λ</a></li>\n\t<li class=\"AD_2\"><a href=\"?action=adslist\">���ܹ��</a></li>\n</ul>\n</div>\n<div class=\"AD_main\">\n<form id=\"form1\" name=\"form1\" method=\"post\" action=\"?action=planlist\">\n<table class=\"AD_table1\">\n\t<tr>\n\t\t<td class=\"AD_td1\">��ѡ����վ��</td>\n\t\t<td><select name=\"select\"\n\t\t\tonchange=\"location.href = this.options[selectedIndex].value\">                    ";
foreach ( ( array )$site as $key => $s )
{
		echo "<option value = '?action=planlist&siteid=".$s['siteid']."&kv=".$key."&plantype=".$plantype."&audit=".$audit."'";
		if ( $s['siteid'] == $siteid )
		{
				echo "selected";
		}
		echo ">".$s['sitename']."</option>";
}
echo "</select>&nbsp;&nbsp;��ַ��<a\n\t\t\thref=\"http://";
echo $site[$kv]['siteurl'];
echo "\" target=\"_blank\">";
echo $site[$kv]['siteurl'];
echo "</a>&nbsp;<a href=\"?action=createsite\">������վ</a></td>\n\t</tr>\n</table>\n<table class=\"AD_table2\">\n\t<tr>\n\t\t<td class=\"AD_td2\">�Ʒ����ͣ�</td>\n\t\t<td class=\"AD_td3\">";
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
echo "</td>\n\t\t<td class=\"AD_td2\">���״̬��</td>\n\t\t<td><input name=\"audit\" type=\"radio\" value=\"all\"\n\t\t\t";
if ( $audit == "all" || !$audit )
{
		echo "checked";
}
echo " /> ȫ�� <input name=\"audit\" type=\"radio\" value=\"n\"\n\t\t\t";
if ( $audit == "n" )
{
		echo "checked";
}
echo " /> ����Ҫ���� <input name=\"audit\" type=\"radio\" value=\"y\"\n\t\t\t";
if ( $audit == "y" )
{
		echo "checked";
}
echo " /> ��Ҫ���� <span style=\"margin-left: 30px;\"></td>\n\t\t<td><input name=\"Input\" type=\"submit\" value=\"\" class=\"Table_sub1\" /></td>\n\t</tr>\n</table>\n<table class=\"AD_table3\" cellpadding=\"0\" cellspacing=\"0\">\n\t<tr class=\"AD_tr\">\n\t\t<td width=\"120\">�ƻ�LOGO</td>\n\t\t<td width=\"160\">�ƻ�</td>\n\t\t<td width=\"100\">����</td>\n\t\t<td width=\"100\">չ��ģʽ</td>\n\t\t<td width=\"100\">Ӷ��</td>\n\t\t<td width=\"100\">��������</td>\n\t\t<td width=\"160\">���״̬</td>\n\t\t<td width=\"120\">����</td>\n\t</tr>\n\t\t                 ";
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
				echo "�ս�";
		}
		else if ( $p['clearing'] == "week" )
		{
				echo "�ܽ�";
		}
		else if ( $p['clearing'] == "month" )
		{
				echo "�½�";
		}
		echo "\t\t\t\t\t\t</td>\n\t\t<td>            ";
		if ( $p['status'] == 3 )
		{
				echo "<span>����</span>";
		}
		else if ( !$isok )
		{
				echo "<span>���Ͳ�ƥ��</span>";
		}
		else if ( $p['audit'] == "y" )
		{
				$audit = $auditmodel->ckPlanIdAudit( $p['planid'], $siteid );
				if ( $audit == "re" )
				{
						echo "<span>������</span>";
				}
				else if ( $audit == "deny" )
				{
						echo "<span>�ܾ�����</span>";
				}
				else if ( $audit == "ok" )
				{
						echo "<a href='?action=planads&planid=".$p['planid']."&siteid=".$siteid."'><strong>��ȡ����</strong></a>";
				}
				else
				{
						echo "<span id='e_".$p['planid']."'><a href='javascript:void(0)' onclick='doAudit(".$p['planid'].",".$siteid.")'><strong>������</strong></a></span>";
				}
		}
		else
		{
				echo "<a href='?action=planads&planid=".$p['planid']."&siteid=".$siteid."'><strong >��ȡ����</strong></a>";
		}
		echo "</td>\n\t\t<td><a\n\t\t\thref=\"?action=planads&planid=";
		echo $p['planid'];
		echo "&siteid=";
		echo $siteid;
		echo "\">�鿴���</a></td>\n\n\t</tr> \n\t          ";
}
echo "\n       \n   </table>\n\n</form>\n</div>\n<script language=\"JavaScript\" type=\"text/javascript\">\nfunction doAudit(pid,sid){\n\tif(!sid){ \n\t\talert(\"��վδѡ��\");\n\t\treturn false;\n\t}\n\t\$.get(\"?action=postaudit&actiontype=audit&planid=\"+pid+\"&siteid=\"+sid+\"\");\n\t\$i(\"e_\"+pid).innerHTML = \"<font color='#FF830A'>������</font>\";\n\tsetTimeout(\"tb_show('����ɹ�','#TB_inline?height=100&width=300&inlineId=aContent')\",500);\n}\nfunction doCreateSite(){\n\tt = setTimeout(\"tb_show('�޷���ȡ����','#TB_inline?height=150&width=500&inlineId=sContent')\",1000);\n}\n             var tmpHeight = 0;\n            var leftHeight = \$('#leftID').height();\n            var rightHeight = \$('#rightID').height();\n            tmpHeight = rightHeight >= leftHeight ? rightHeight : leftHeight;\n            \$('#leftID').height(tmpHeight);\n            \$('#rightID').height(tmpHeight);\n";
if ( !$siteid )
{
		echo "\tsetTimeout(\"tb_show('�޷���ȡ����','#TB_inline?height=150&width=500&inlineId=sContent')\",500);\n";
}
echo "       </script></div>\n";
include( TPL_DIR."/footer.php" );
?>
