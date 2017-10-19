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
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "\" ";
if ( $status == "" )
{
		echo "class=\"li-active\"";
}
echo ">所有申请</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=2\" ";
if ( $status == "2" )
{
		echo "class=\"li-active\"";
}
echo ">已审网站</a></li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=0\" ";
if ( $status == "0" )
{
		echo "class=\"li-active\"";
}
echo ">新增待审</a> </li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=1\" ";
if ( $status == "1" )
{
		echo "class=\"li-active\"";
}
echo ">已被拒绝</a> </li>\r\n                        </ul></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n                    <option value=\"unlock\">激活</option>\r\n                    <option value=\"deny\">拒绝</option>\r\n                    <option value=\"del\">删除</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"20\" />\r\n                    <select name=\"planid\" id=\"planid\">\r\n                      <option value=\"\">所有产品</option>\r\n                       ";
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
echo "                    </select>\r\n                    <select name=\"searchtype\">\r\n\t\t\t\t\t<option value=\"3\" ";
if ( $searchtype == "3" )
{
		echo "selected";
}
echo ">会员名称</option>\r\n\t\t\t\t\t  <option value=\"1\" ";
if ( $searchtype == "1" )
{
		echo "selected";
}
echo ">网站名称</option>\r\n\t\t\t\t\t   <option value=\"2\" ";
if ( $searchtype == "2" )
{
		echo "selected";
}
echo ">网站地址</option>\r\n                    </select>\r\n                    <input type=\"submit\" name=\"Submit22\" value=\"搜索\" class=\"submit-x\"/>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'auditid','chkall')\" /></td>\r\n                        <td width=\"100\">申请会员</td>\r\n                        <td width=\"100\">申请计划</td>\r\n                        <td width=\"120\">网站名称</td>\r\n                        <td width=\"110\">Alexa/PR</td>\r\n                        <td width=\"90\">网站类型</td>\r\n                        <td width=\"90\">操作</td>\r\n                        <td width=\"60\">申请时间</td>\r\n                        <td width=\"60\">审核时间</td>\r\n                        <td width=\"60\">审核人 </td>\r\n                        <td nowrap=\"nowrap\">状态</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
foreach ( ( array )$audit as $s )
{
		$sid = $sitetypemodel->admingetsitetypesid( $s['sitetype'] );
		echo "                      <tr>\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"auditid[]\" value=\"";
		echo $s['auditid'];
		echo "\" />                        </td>\r\n                        <td height=\"45\">";
		echo $s['username'];
		echo "</td>\r\n                        <td>";
		echo $s['planname'];
		echo "</td>\r\n                        <td width=\"120\"><strong>";
		echo str( $s['sitename'], 16 );
		echo "</strong><br><a href=\"javascript:tourl('http://";
		echo $s['siteurl'];
		echo "')\">";
		echo $s['siteurl'];
		echo "</a></td>\r\n                        <td><span id=\"s_";
		echo $s['siteid'];
		echo "\">";
		echo $s['alexapr'];
		echo "</span> <img src=\"/templates/";
		echo Z_TPL;
		echo "/images/alexa.jpg\" alt=\"点击更新\" align=\"absmiddle\" style=\"\tcursor:pointer\" onclick=\"doAlexaPr('";
		echo trim( $s['siteurl'] );
		echo "',";
		echo $s['siteid'];
		echo ")\" /> </td>\r\n                        <td>";
		echo $sid['sitename'];
		echo "</td>\r\n                        <td><a href=\"do.php?action=planaudit&actiontype=postchoose&auditid[]=";
		echo $s['auditid'];
		echo "&choosetype=unlock\" onclick=\"return activate()\">激活</a>&nbsp;&nbsp;<a href=\"#TB_inline?&height=200&width=430&inlineId=DenySite\"  title=\"拒绝 “";
		echo $s['sitename'];
		echo "” 投放 “";
		echo $s['planname'];
		echo "”\"   class=\"thickbox\" onclick=\"\$i('auditid').value=";
		echo $s['auditid'];
		echo ";\$i('denyinfo').value='";
		echo $s['denyinfo'];
		echo "'\">拒绝</a></td>\r\n                        <td>";
		echo $s['addtime'];
		echo "</td>\r\n                        <td>";
		echo $s['audittime'];
		echo "</td>\r\n                        <td>";
		echo $s['audituser'];
		echo "</td>\r\n                        <td nowrap=\"nowrap\">";
		if ( $s['status'] == "2" )
		{
				echo "<font color=\"green\">通过</font>";
		}
		if ( $s['status'] == "0" )
		{
				echo "<font color=\"red\">待审</font>";
		}
		if ( $s['status'] == "1" )
		{
				echo "<font color=\"red\">拒绝</font>";
		}
		echo "                      </td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'auditid','chkallde')\" /></td>\r\n                        <td >申请会员</td>\r\n                        <td>申请计划</td>\r\n                        <td>网站名称</td>\r\n                        <td>Alexa/PR</td>\r\n                        <td>网站类型</td>\r\n                        <td>操作</td>\r\n                        <td>申请时间</td>\r\n                        <td>审核时间</td>\r\n                        <td>详情</td>\r\n                        <td nowrap=\"nowrap\">状态</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                          <option>批量操作</option>\r\n                          <option value=\"unlock\">激活</option>\r\n                          <option value=\"deny\">拒绝</option>\r\n                          <option value=\"del\">删除</option>\r\n                        </select>\r\n                        <input type=\"button\" name=\"Submit3\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = '删除';\t\r\n\tif(v == 'unlock')  t= '激活';\t\r\n\tif(v == 'deny') t = '拒绝';\r\n\tif(t=='') {alert('批量选项未选择');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('请选中您要操作的列'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('您确认要'+ t +'这' + numchecked + '个申请？。\\n点“确认”'+ t +'，点“取消”取消操作。')){\r\n\t\t";
if ( in_array( "userplanactivate", explode( ",", $GLOBALS['C_ZYIIS']['tomail'] ) ) )
{
		echo "\t\tif(v == 'unlock') addLoading('正在发送邮件...');\r\n\t\t";
}
echo "\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction activate(){\r\n\tvar psub=confirm(\"确认激活么？\");\r\n\tif(psub){\r\n\t\t";
if ( in_array( "userplanactivate", explode( ",", $GLOBALS['C_ZYIIS']['tomail'] ) ) )
{
		echo "\t\t\taddLoading('正在发送邮件...');\r\n\t\t";
}
echo "\t}else{\r\n\t\treturn false;\r\n\t}\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\nfunction doAlexaPr(url,siteid){\r\n\t\tsid = 's_'+siteid;\r\n\t\t\$('#'+sid).html('<img src=\"/templates/";
echo Z_TPL;
echo "/images/loading.gif\"> '); \r\n\t\t\r\n\t\t\$.ajax({\r\n           url: \"do.php?action=site&actiontype=alexapr&url=\"+url,\r\n\t\t   type: 'GET',\r\n\t\t   dataType: 'html',\r\n           timeout: 5000,\r\n           error: function () {\r\n                  \$('#'+sid).html('<font color=red>超时</font>');\r\n           },\r\n\t\t   success: function(data){\r\n        \t\t\$('#'+sid).html(data);\r\n\t\t\t\tSalexaImg(url);\r\n\t\t\t}\r\n        });\r\n\r\n}\r\nfunction SalexaImg(url){\r\n\t\$('#alexaimg').html('<img src=http://traffic.alexa.com/graph?w=600&h=260&r=1m&y=t&u='+url+'>');\r\n\tsetTimeout(\"tb_show('“\"+url+\"” 一月Alexa排名','#TB_inline?height=300&width=650&inlineId=Salexa')\",1000);\r\n}\r\n</script>\r\n<div id=\"Salexa\" style=\"display:none\">\r\n    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td><div id=\"alexaimg\"><div></td>\r\n      </tr>\r\n    </table>\r\n</div>\r\n<div id=\"DenySite\" style=\"display:none\">\r\n  <form action=\"do.php?action=planaudit&actiontype=updenyinfo\" method=\"post\">\r\n    <input name=\"auditid\" id=\"auditid\" type=\"hidden\" value=\"\" />\r\n    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td>&nbsp;</td>\r\n        <td>&nbsp;</td>\r\n      </tr>\r\n      <tr>\r\n        <td width=\"90\">拒绝原因</td>\r\n        <td><textarea name=\"denyinfo\" id=\"denyinfo\" style=\"width:320px;height:100px\"></textarea></td>\r\n      </tr>\r\n      <tr>\r\n        <td>&nbsp;</td>\r\n        <td height=\"60\"><input type=\"submit\" name=\"Submit2\" value=\" 提交 \"  /></td>\r\n      </tr>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
include( TPL_DIR."/footer.php" );
?>
