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
echo "<script LANGUAGE=\"JavaScript\" src=\"/javascript/jiandate.js\"></script>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td>";
if ( $actiontype != "import" )
{
		echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td  valign=\"top\">";
		if ( $statetype == "success" )
		{
				echo "            <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"97%\" >\r\n              <tr>\r\n                <td height=\"30\"><img  src='/templates/";
				echo Z_TPL;
				echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">操作成功！</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
		}
		echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"   >\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n\t\t\t\t\t  <li style=\"padding-right:10px\"><a href=\"do.php?action=import&actiontype=import\"><img  src='/templates/";
		echo Z_TPL;
		echo "/images/add.gif' align='absmiddle' /> <strong>导入数据</strong></a></li>\r\n                          <li><a href=\"do.php?action=";
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
		echo ">今日导入</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
		echo $action;
		echo "&timerange=t\" ";
		if ( $timerange == "t" )
		{
				echo "class=\"li-active\"";
		}
		echo ">昨日导入</a> </li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
		echo $action;
		echo "&status=0&timerange=a\" ";
		if ( $status == "0" )
		{
				echo "class=\"li-active\"";
		}
		echo ">最近一周</a> </li>\r\n\t\t\t\t\t\t   ";
		if ( $actiontype == "search" && 3 < strlen( $timerange ) )
		{
				echo "\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"javascript:void(0)\" class=\"li-active\">";
				echo $timerange;
				echo "</a> </li>\r\n\t\t\t\t\t\t  ";
		}
		echo "                        </ul></td>\r\n                      <td width=\"500\" align=\"right\"></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"select\"  onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n\t\t\t\t\t <option value=\"revocation\">撤销</option>\r\n                    <option value=\"del\">删除</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
		echo $action;
		echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" id=\"searchval\" value=\"";
		echo $searchval;
		echo "\" size=\"16\"/>\r\n                    &nbsp;\r\n                    <select name=\"searchtype\" class=\"searchtype\" id=\"searchtype\">\r\n                      <option value=\"1\" ";
		if ( $searchtype == 1 )
		{
				echo "selected";
		}
		echo " >会员名称</option>\r\n\t\t\t\t\t  <option value=\"2\" ";
		if ( $searchtype == 2 )
		{
				echo "selected";
		}
		echo " >广告计划ID</option>\r\n                      <option value=\"3\" ";
		if ( $searchtype == 3 )
		{
				echo "selected";
		}
		echo " >订单号</option>\r\n                    </select>\r\n                    <select name=\"timerange\" id=\"timerange\" style=\"width:200px\">\r\n                      <option value=\"";
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
		echo "\">\r\n                      ";
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
		echo "                      </option>\r\n                      <option  value=\"a\" ";
		echo $timerange == "a" ? "selected " : "";
		echo ">所有时间段</option>\r\n                      <option value=\"t\" ";
		echo $timerange == "t" ? " selected" : "";
		echo " >昨天</option>\r\n                      <option value=\"w\" ";
		echo $timerange == "w" ? " selected" : "";
		echo " >过去一周内</option>\r\n                      <option value=\"m\" ";
		echo $timerange == "m" ? " selected" : "";
		echo ">本月内</option>\r\n                      <option value=\"l\" ";
		echo $timerange == "l" ? " selected" : "";
		echo ">上月的</option>\r\n                    </select>\r\n                    <img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','2')\"/>\r\n                    <input name=\"Submit\" type=\"submit\" class=\"submit-x\" id=\"Submit\" value=\"查询\"/>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
		echo $action;
		echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\" ><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'id')\" /></td>\r\n                        <td width=\"140\">时间</td>\r\n                        <td width=\"90\">导入日期</td>\r\n                        <td width=\"90\">导入会员</td>\r\n                        <td width=\"120\">计划名称</td>\r\n                        <td width=\"60\">类型</td>\r\n                        <td width=\"70\">结算数</td>\r\n                        <td width=\"80\">会员结算</td>\r\n                        <td width=\"90\">广告商结算</td>\r\n                        <td width=\"160\">订单号</td>\r\n                        <td>操作</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
		if ( !$import )
		{
				echo "<tr><td height=\"60\"   class=\"td_b_4 \" id=\"b-bottom\" >&nbsp;</td>\r\n\t\t\t\t\t\t\t\t  <td colspan=\"11\" align=\"center\">无报表</td>\r\n\t\t\t\t\t\t\t\t  <td  class=\"td_b_5\">&nbsp;</td>\r\n\t\t\t\t\t\t\t\t</tr>";
		}
		foreach ( ( array )$import as $i )
		{
				echo "                      <tr>\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td height=\"40\"  ><input name=\"importid[]\" type=\"checkbox\" id=\"importid[]\" value=\"";
				echo $i['importid'];
				echo "\" /></td>\r\n                        <td>";
				echo $i['addtime'];
				echo "</td>\r\n                        <td width=\"90\">";
				echo $i['day'];
				echo "</td>\r\n                        <td width=\"90\"><a href=\"do.php?action=affiliate&actiontype=search&searchval=";
				echo $i['uid'];
				echo "&searchtype=2\">";
				echo $i['username'];
				echo "</a></td>\r\n                        <td width=\"120\"><a href=\"do.php?action=plan&&actiontype=search&searchval=";
				echo $i['planid'];
				echo "&searchtype=2\">";
				echo $i['planname'];
				echo "</a><br></td>\r\n                        <td>";
				echo ucfirst( $i['plantype'] );
				echo "</td>\r\n                        <td>";
				echo $i['num'];
				echo "</td>\r\n                        <td>";
				echo $i['sumpay'];
				echo "</td>\r\n                        <td>";
				echo $i['sumadvpay'];
				echo "</td>\r\n                        <td>";
				echo $i['orders'];
				echo "</td>\r\n                        <td> ";
				if ( $i['status'] == "1" )
				{
						echo "<font color='blue'>已撤销</font>";
				}
				else if ( $i['status'] == "0" )
				{
						echo "<a href='do.php?action=import&actiontype=postchoose&choosetype=revocation&importid[]=".$i['importid']."' onclick=\"return confirm('确定撤销\\?\\n撤销后相关数据返回到当条导入之前')\">撤销</a>";
				}
				echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
		}
		echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'id','chkallde')\" /></td>\r\n                        <td>时间</td>\r\n                        <td>导入日期</td>\r\n                        <td>导入会员</td>\r\n                        <td>计划名称</td>\r\n                        <td>类型</td>\r\n                        <td>结算数</td>\r\n                        <td>会员结算</td>\r\n                        <td>广告商结算</td>\r\n                        <td>订单号</td>\r\n                        <td>操作</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select\"  onchange=\"\$i('choosetype').value=this.value\">\r\n                          <option>批量操作</option>\r\n\t\t\t\t\t\t  <option value=\"revocation\">撤销</option>\r\n                          <option value=\"del\">删除</option>\r\n                        </select>\r\n                        <input type=\"button\" name=\"Submit\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
		echo $viewpage;
		echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table>\r\n      ";
}
echo "      ";
if ( $actiontype == "import" )
{
		echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td><form action=\"do.php?action=import&actiontype=postimport\" method=\"post\" enctype=\"multipart/form-data\" name=\"add\" id=\"add\" >\r\n              <table width=\"97%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tr>\r\n                  <td valign=\"top\">";
		if ( $statetype == "success" )
		{
				echo "                    <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"100%\" >\r\n                      <tr>\r\n                        <td height=\"30\"><img  src='/templates/";
				echo Z_TPL;
				echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">操作成功！</span></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\t\tnoneSuccess();\r\n\t\t\t\t</script>\r\n                    ";
		}
		echo "</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><img alt=\"\" src=\"/templates/";
		echo Z_TPL;
		echo "/images/bulb.gif\" width=\"19\" height=\"19\" /> <strong>提示：</strong>导入数据时请注意格式。<a href=\"do.php?action=import\">返回</a></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"20\">&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"cpt\">常规</td>\r\n                </tr>\r\n                <tr>\r\n                  <td><table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td width=\"100\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td width=\"120\" valign=\"top\">导入广告计划</td>\r\n                        <td><select name=\"planid\" id=\"planid\">\r\n                            <option value=\"\">请选择一个计划项目</option>\r\n                            ";
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
		echo "                          </select>\r\n                          &nbsp;<span id=\"umoney\"></span><br />\r\n                          <span class=\"gray\">需要导入数据的广告计划项目。</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">导入方式<font color=\"#FF0000\">&nbsp;</font></td>\r\n                        <td ><input name=\"files\" type=\"radio\" onclick=\"\$('#_up').hide();\$('#_sdata').show();\$('#_texts').show()\" value=\"tx\" checked=\"checked\"/>\r\n                          手动输入                        &nbsp;&nbsp;&nbsp;\r\n                          <input type=\"radio\" name=\"files\" value=\"up\" ";
		if ( $files == "http" )
		{
				echo " checked";
		}
		echo " onclick=\"\$('#_up').show();\$('#_sdata').hide();\$('#_texts').hide()\"/>\r\n                          导入文件 <div id=\"_up\" style=\"display:none\"> <br />\r\n                          <br />\r\n                          <input name=\"importfile\" type=\"file\" id=\"importfile\" size=\"40\"  style=\"width:336px;height:22px\"/>\r\n                          <a href=\"javascript:;\" onclick=\"\$('#_sexce').show()\">文档编辑说明</a> </div> <br />\r\n                          <span class=\"gray\">导入文件的格式只能是Excel Txt二种格式 。</span> </td>\r\n                      </tr>\r\n                      <tr style=\"display:none\" id=\"_sexce\">\r\n                        <td valign=\"top\">&nbsp;</td>\r\n                        <td><table width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tr>\r\n                              <td height=\"30\"><strong>案例一：CPS类日期为空是表示为当天，采用的计划设定的分成比例</strong></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td><img alt=\"\" src=\"/templates/";
		echo Z_TPL;
		echo "/images/excel1.jpg\" /></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\"><strong>案例二：CPS手动分成</strong></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\"><img alt=\"\" src=\"/templates/";
		echo Z_TPL;
		echo "/images/excel3.jpg\" /></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\"><strong>案例三：非CPS样式日期为空是表示为当天</strong></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\"><img alt=\"\" src=\"/templates/";
		echo Z_TPL;
		echo "/images/excel5.jpg\" /></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\"><strong>案例四：Text样式，可以参考手动输入格式</strong></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\"><img alt=\"\" src=\"/templates/";
		echo Z_TPL;
		echo "/images/text1.jpg\" /></td>\r\n                            </tr>\r\n                          </table></td>\r\n                      </tr>\r\n                      <tr id=\"_sdata\">\r\n                        <td valign=\"top\">数据</td>\r\n                        <td><textarea name=\"postdata\" id=\"postdata\" style=\"width:400px; height:150px\"></textarea>\r\n                          <input type=\"button\" name=\"Submit2\" value=\"验证格式是否正确\" onclick=\"ckData()\"/></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">&nbsp;</td>\r\n                        <td id=\"ckhtml\" style=\"padding:5px; color:#FF0000; font-size:14px\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr id=\"_texts\">\r\n                        <td colspan=\"2\" valign=\"top\"><table width=\"99%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tr>\r\n                              <td width=\"120\" valign=\"top\">手动输入格式</td>\r\n                              <td><img alt=\"\" src=\"/templates/admin/images/bulb.gif\" width=\"19\" height=\"19\" />CPS格式：采用“|”为分割符，一行一条</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td><strong>方式一：可以采用广告计划所设定的分成比例，格式如下</strong><br />\r\n                                导入到日期|会员数字ID|订单号|订单价格</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td>&nbsp;&nbsp;&nbsp;&nbsp;2010-07-08|123|20100611211687|123.8</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td><strong>方式二：采用不同的分成比例，格式如下</strong><br />\r\n                                导入到日期|会员数字ID|订单号|订单价格|订单给网站主分成比例|订单广告商给的分成比例</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td>&nbsp;&nbsp;&nbsp;&nbsp;2010-07-08|123|20100611211687|123.8|20|30</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td><img alt=\"\" src=\"/templates/";
		echo Z_TPL;
		echo "/images/bulb.gif\" width=\"19\" height=\"19\" />CPC CPM CPA CPV格式：采用“|”为分割符，一行一条</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td>&nbsp;&nbsp;&nbsp;导入到日期|会员数字ID|结算数</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td>&nbsp;&nbsp;&nbsp;2010-07-08|123|20<br />\r\n                                &nbsp;&nbsp;&nbsp;2010-07-08|223|10</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td><font color=\"#FF0000\">提醒：导入到日期为可选项,不填写的日期格式为 |123|20 请注前面的“|”符号不能省</font></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td>&nbsp;</td>\r\n                              <td>&nbsp;</td>\r\n                            </tr>\r\n                          </table></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" valign=\"top\"><input type=\"button\" name=\"Submit\" class=\"form-submit\" value=\" 提 交 \" onclick=\"PostForm()\" /></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\">&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\">&nbsp;</td>\r\n                </tr>\r\n              </table>\r\n            </form></td>\r\n        </tr>\r\n      </table>\r\n      ";
}
echo "    </td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = '删除';\t\r\n\tif(v =='revocation') t = '撤销';\t\r\n\tif(t=='') {alert('批量选项未选择');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('请选中您要操作的数据'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('您确认要'+ t +'这' + numchecked + '个数据？。\\n点“确认”'+ t +'，点“取消”取消操作。')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\n\r\nfunction ckData(){\r\n\tvar postdata = \$i(\"postdata\").value;\r\n\tvar planid = \$(\"#planid option:selected\").val();\r\n\t \$(\"#ckhtml\").html('正检测...');\r\n\t  \$.post(\"do.php?action=import&actiontype=ckdata\",{ \"postdata\": postdata,\"planid\" : planid}, function(data){\r\n\t\tif(data == 'ok'){\r\n\t\t\t \$(\"#ckhtml\").html('可以导入，格式正确');\r\n\t\t}else {\r\n\t\t\t  \$(\"#ckhtml\").html(data);\r\n\t\t}\r\n\t});\r\n}\r\nfunction PostForm(){\r\n\tvar postdata = \$i(\"postdata\").value;\r\n\tvar planid = \$(\"#planid option:selected\").val();\r\n\tvar files = \$('input[@name=files][@checked]').val();\r\n\tvar importfile = \$i(\"importfile\").value;\r\n\tif(isNULL(planid)){\r\n\t\talert(\"请选择一个计划！\");\t\t\r\n\t\treturn false;\r\n     }  \r\n\tif (isNULL(postdata) && files=='tx'){\r\n\t\talert(\"请填写数据！\");\r\n\t\treturn false;\r\n\t\r\n\t}\r\n\tif (isNULL(importfile) && files=='up'){\r\n\t\talert(\"请选择要导入的文件！\");\r\n\t\treturn false;\r\n\t\r\n\t}\r\n\t var psub=confirm(\"确认提交么？\");\r\n\t if(psub){\r\n    \t document.forms[\"add\"].submit();\r\n\t }\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
