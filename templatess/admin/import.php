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
				echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">�����ɹ���</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
		}
		echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"   >\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n\t\t\t\t\t  <li style=\"padding-right:10px\"><a href=\"do.php?action=import&actiontype=import\"><img  src='/templates/";
		echo Z_TPL;
		echo "/images/add.gif' align='absmiddle' /> <strong>��������</strong></a></li>\r\n                          <li><a href=\"do.php?action=";
		echo $action;
		echo "&timerange=a\" ";
		if ( $timerange == "a" )
		{
				echo "class=\"li-active\"";
		}
		echo ">ȫ��</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
		echo $action;
		echo "&timerange=";
		echo DAYS."/".DAYS;
		echo "\" ";
		if ( $time_end == DAYS || $timerange == "" )
		{
				echo "class=\"li-active\"";
		}
		echo ">���յ���</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
		echo $action;
		echo "&timerange=t\" ";
		if ( $timerange == "t" )
		{
				echo "class=\"li-active\"";
		}
		echo ">���յ���</a> </li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
		echo $action;
		echo "&status=0&timerange=a\" ";
		if ( $status == "0" )
		{
				echo "class=\"li-active\"";
		}
		echo ">���һ��</a> </li>\r\n\t\t\t\t\t\t   ";
		if ( $actiontype == "search" && 3 < strlen( $timerange ) )
		{
				echo "\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"javascript:void(0)\" class=\"li-active\">";
				echo $timerange;
				echo "</a> </li>\r\n\t\t\t\t\t\t  ";
		}
		echo "                        </ul></td>\r\n                      <td width=\"500\" align=\"right\"></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"select\"  onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>��������</option>\r\n\t\t\t\t\t <option value=\"revocation\">����</option>\r\n                    <option value=\"del\">ɾ��</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
		echo $action;
		echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" id=\"searchval\" value=\"";
		echo $searchval;
		echo "\" size=\"16\"/>\r\n                    &nbsp;\r\n                    <select name=\"searchtype\" class=\"searchtype\" id=\"searchtype\">\r\n                      <option value=\"1\" ";
		if ( $searchtype == 1 )
		{
				echo "selected";
		}
		echo " >��Ա����</option>\r\n\t\t\t\t\t  <option value=\"2\" ";
		if ( $searchtype == 2 )
		{
				echo "selected";
		}
		echo " >���ƻ�ID</option>\r\n                      <option value=\"3\" ";
		if ( $searchtype == 3 )
		{
				echo "selected";
		}
		echo " >������</option>\r\n                    </select>\r\n                    <select name=\"timerange\" id=\"timerange\" style=\"width:200px\">\r\n                      <option value=\"";
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
		echo " �� ";
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
		echo ">����ʱ���</option>\r\n                      <option value=\"t\" ";
		echo $timerange == "t" ? " selected" : "";
		echo " >����</option>\r\n                      <option value=\"w\" ";
		echo $timerange == "w" ? " selected" : "";
		echo " >��ȥһ����</option>\r\n                      <option value=\"m\" ";
		echo $timerange == "m" ? " selected" : "";
		echo ">������</option>\r\n                      <option value=\"l\" ";
		echo $timerange == "l" ? " selected" : "";
		echo ">���µ�</option>\r\n                    </select>\r\n                    <img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','2')\"/>\r\n                    <input name=\"Submit\" type=\"submit\" class=\"submit-x\" id=\"Submit\" value=\"��ѯ\"/>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
		echo $action;
		echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\" ><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'id')\" /></td>\r\n                        <td width=\"140\">ʱ��</td>\r\n                        <td width=\"90\">��������</td>\r\n                        <td width=\"90\">�����Ա</td>\r\n                        <td width=\"120\">�ƻ�����</td>\r\n                        <td width=\"60\">����</td>\r\n                        <td width=\"70\">������</td>\r\n                        <td width=\"80\">��Ա����</td>\r\n                        <td width=\"90\">����̽���</td>\r\n                        <td width=\"160\">������</td>\r\n                        <td>����</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
		if ( !$import )
		{
				echo "<tr><td height=\"60\"   class=\"td_b_4 \" id=\"b-bottom\" >&nbsp;</td>\r\n\t\t\t\t\t\t\t\t  <td colspan=\"11\" align=\"center\">�ޱ���</td>\r\n\t\t\t\t\t\t\t\t  <td  class=\"td_b_5\">&nbsp;</td>\r\n\t\t\t\t\t\t\t\t</tr>";
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
						echo "<font color='blue'>�ѳ���</font>";
				}
				else if ( $i['status'] == "0" )
				{
						echo "<a href='do.php?action=import&actiontype=postchoose&choosetype=revocation&importid[]=".$i['importid']."' onclick=\"return confirm('ȷ������\\?\\n������������ݷ��ص���������֮ǰ')\">����</a>";
				}
				echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
		}
		echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'id','chkallde')\" /></td>\r\n                        <td>ʱ��</td>\r\n                        <td>��������</td>\r\n                        <td>�����Ա</td>\r\n                        <td>�ƻ�����</td>\r\n                        <td>����</td>\r\n                        <td>������</td>\r\n                        <td>��Ա����</td>\r\n                        <td>����̽���</td>\r\n                        <td>������</td>\r\n                        <td>����</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select\"  onchange=\"\$i('choosetype').value=this.value\">\r\n                          <option>��������</option>\r\n\t\t\t\t\t\t  <option value=\"revocation\">����</option>\r\n                          <option value=\"del\">ɾ��</option>\r\n                        </select>\r\n                        <input type=\"button\" name=\"Submit\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
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
				echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">�����ɹ���</span></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\t\tnoneSuccess();\r\n\t\t\t\t</script>\r\n                    ";
		}
		echo "</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><img alt=\"\" src=\"/templates/";
		echo Z_TPL;
		echo "/images/bulb.gif\" width=\"19\" height=\"19\" /> <strong>��ʾ��</strong>��������ʱ��ע���ʽ��<a href=\"do.php?action=import\">����</a></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"20\">&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"cpt\">����</td>\r\n                </tr>\r\n                <tr>\r\n                  <td><table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td width=\"100\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td width=\"120\" valign=\"top\">������ƻ�</td>\r\n                        <td><select name=\"planid\" id=\"planid\">\r\n                            <option value=\"\">��ѡ��һ���ƻ���Ŀ</option>\r\n                            ";
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
		echo "                          </select>\r\n                          &nbsp;<span id=\"umoney\"></span><br />\r\n                          <span class=\"gray\">��Ҫ�������ݵĹ��ƻ���Ŀ��</span></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">���뷽ʽ<font color=\"#FF0000\">&nbsp;</font></td>\r\n                        <td ><input name=\"files\" type=\"radio\" onclick=\"\$('#_up').hide();\$('#_sdata').show();\$('#_texts').show()\" value=\"tx\" checked=\"checked\"/>\r\n                          �ֶ�����                        &nbsp;&nbsp;&nbsp;\r\n                          <input type=\"radio\" name=\"files\" value=\"up\" ";
		if ( $files == "http" )
		{
				echo " checked";
		}
		echo " onclick=\"\$('#_up').show();\$('#_sdata').hide();\$('#_texts').hide()\"/>\r\n                          �����ļ� <div id=\"_up\" style=\"display:none\"> <br />\r\n                          <br />\r\n                          <input name=\"importfile\" type=\"file\" id=\"importfile\" size=\"40\"  style=\"width:336px;height:22px\"/>\r\n                          <a href=\"javascript:;\" onclick=\"\$('#_sexce').show()\">�ĵ��༭˵��</a> </div> <br />\r\n                          <span class=\"gray\">�����ļ��ĸ�ʽֻ����Excel Txt���ָ�ʽ ��</span> </td>\r\n                      </tr>\r\n                      <tr style=\"display:none\" id=\"_sexce\">\r\n                        <td valign=\"top\">&nbsp;</td>\r\n                        <td><table width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tr>\r\n                              <td height=\"30\"><strong>����һ��CPS������Ϊ���Ǳ�ʾΪ���죬���õļƻ��趨�ķֳɱ���</strong></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td><img alt=\"\" src=\"/templates/";
		echo Z_TPL;
		echo "/images/excel1.jpg\" /></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\"><strong>��������CPS�ֶ��ֳ�</strong></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\"><img alt=\"\" src=\"/templates/";
		echo Z_TPL;
		echo "/images/excel3.jpg\" /></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\"><strong>����������CPS��ʽ����Ϊ���Ǳ�ʾΪ����</strong></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\"><img alt=\"\" src=\"/templates/";
		echo Z_TPL;
		echo "/images/excel5.jpg\" /></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\"><strong>�����ģ�Text��ʽ�����Բο��ֶ������ʽ</strong></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\"><img alt=\"\" src=\"/templates/";
		echo Z_TPL;
		echo "/images/text1.jpg\" /></td>\r\n                            </tr>\r\n                          </table></td>\r\n                      </tr>\r\n                      <tr id=\"_sdata\">\r\n                        <td valign=\"top\">����</td>\r\n                        <td><textarea name=\"postdata\" id=\"postdata\" style=\"width:400px; height:150px\"></textarea>\r\n                          <input type=\"button\" name=\"Submit2\" value=\"��֤��ʽ�Ƿ���ȷ\" onclick=\"ckData()\"/></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">&nbsp;</td>\r\n                        <td id=\"ckhtml\" style=\"padding:5px; color:#FF0000; font-size:14px\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr id=\"_texts\">\r\n                        <td colspan=\"2\" valign=\"top\"><table width=\"99%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tr>\r\n                              <td width=\"120\" valign=\"top\">�ֶ������ʽ</td>\r\n                              <td><img alt=\"\" src=\"/templates/admin/images/bulb.gif\" width=\"19\" height=\"19\" />CPS��ʽ�����á�|��Ϊ�ָ����һ��һ��</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td><strong>��ʽһ�����Բ��ù��ƻ����趨�ķֳɱ�������ʽ����</strong><br />\r\n                                ���뵽����|��Ա����ID|������|�����۸�</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td>&nbsp;&nbsp;&nbsp;&nbsp;2010-07-08|123|20100611211687|123.8</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td><strong>��ʽ�������ò�ͬ�ķֳɱ�������ʽ����</strong><br />\r\n                                ���뵽����|��Ա����ID|������|�����۸�|��������վ���ֳɱ���|��������̸��ķֳɱ���</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td>&nbsp;&nbsp;&nbsp;&nbsp;2010-07-08|123|20100611211687|123.8|20|30</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td><img alt=\"\" src=\"/templates/";
		echo Z_TPL;
		echo "/images/bulb.gif\" width=\"19\" height=\"19\" />CPC CPM CPA CPV��ʽ�����á�|��Ϊ�ָ����һ��һ��</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td>&nbsp;&nbsp;&nbsp;���뵽����|��Ա����ID|������</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td>&nbsp;&nbsp;&nbsp;2010-07-08|123|20<br />\r\n                                &nbsp;&nbsp;&nbsp;2010-07-08|223|10</td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                              <td><font color=\"#FF0000\">���ѣ����뵽����Ϊ��ѡ��,����д�����ڸ�ʽΪ |123|20 ��עǰ��ġ�|�����Ų���ʡ</font></td>\r\n                            </tr>\r\n                            <tr>\r\n                              <td>&nbsp;</td>\r\n                              <td>&nbsp;</td>\r\n                            </tr>\r\n                          </table></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" valign=\"top\"><input type=\"button\" name=\"Submit\" class=\"form-submit\" value=\" �� �� \" onclick=\"PostForm()\" /></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                    </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\">&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\">&nbsp;</td>\r\n                </tr>\r\n              </table>\r\n            </form></td>\r\n        </tr>\r\n      </table>\r\n      ";
}
echo "    </td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = 'ɾ��';\t\r\n\tif(v =='revocation') t = '����';\t\r\n\tif(t=='') {alert('����ѡ��δѡ��');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('��ѡ����Ҫ����������'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('��ȷ��Ҫ'+ t +'��' + numchecked + '�����ݣ���\\n�㡰ȷ�ϡ�'+ t +'���㡰ȡ����ȡ��������')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\n\r\nfunction ckData(){\r\n\tvar postdata = \$i(\"postdata\").value;\r\n\tvar planid = \$(\"#planid option:selected\").val();\r\n\t \$(\"#ckhtml\").html('�����...');\r\n\t  \$.post(\"do.php?action=import&actiontype=ckdata\",{ \"postdata\": postdata,\"planid\" : planid}, function(data){\r\n\t\tif(data == 'ok'){\r\n\t\t\t \$(\"#ckhtml\").html('���Ե��룬��ʽ��ȷ');\r\n\t\t}else {\r\n\t\t\t  \$(\"#ckhtml\").html(data);\r\n\t\t}\r\n\t});\r\n}\r\nfunction PostForm(){\r\n\tvar postdata = \$i(\"postdata\").value;\r\n\tvar planid = \$(\"#planid option:selected\").val();\r\n\tvar files = \$('input[@name=files][@checked]').val();\r\n\tvar importfile = \$i(\"importfile\").value;\r\n\tif(isNULL(planid)){\r\n\t\talert(\"��ѡ��һ���ƻ���\");\t\t\r\n\t\treturn false;\r\n     }  \r\n\tif (isNULL(postdata) && files=='tx'){\r\n\t\talert(\"����д���ݣ�\");\r\n\t\treturn false;\r\n\t\r\n\t}\r\n\tif (isNULL(importfile) && files=='up'){\r\n\t\talert(\"��ѡ��Ҫ������ļ���\");\r\n\t\treturn false;\r\n\t\r\n\t}\r\n\t var psub=confirm(\"ȷ���ύô��\");\r\n\t if(psub){\r\n    \t document.forms[\"add\"].submit();\r\n\t }\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
