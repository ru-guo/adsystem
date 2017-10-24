<?php if(!defined('IN_ZYADS')) exit();
include TPL_DIR . "/header.php";?>
<script language="JavaScript" type="text/javascript" src="/javascript/temp.js"></script>
<script language="JavaScript" type="text/javascript" src="/javascript/jquery/jquery.js"></script>
<script src="/javascript/jquery/jtip.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/question.css" rel="stylesheet" type="text/css" />
<div id="pro_menu" class="pro_menu" stylea="height: 11px; display: block;background-color:#FFFFFF;background-position:0 -107px;">
  <div class="shell">
    <ul class="pro">
      <li><a href="?action=planlist">计划列表</a></li>
      <li  class="default"><a href="?action=createplan">建新计划</a></li>
    </ul>
  </div>
</div>
<div class="pages">

  <div id="wrapper">
    <div id="content">
      <h3 class="tab " title="first">
        <div class="tabtxt"><a href="?action=createplan">新建计划</a></div>
      </h3>
      <div class="tab tab1" >
        <h3 class="tabtxt" title="second"><a href="?action=createads">新建广告</a></h3>
      </div>
      <div class="boxholder">
        <div class="box">
          <p><img alt="" src="/templates/<?php echo Z_TPL?>/images/bulb.gif" width="19" height="19" /> <strong>提示：</strong> 广告项目用于组织要宣传的产品广告。同一广告项目中的所有广告均使用相同的单价、每日预算、地域定位、时间定位、结束日期 。</p>

		  <form id="create" name="create" method="post" action="?action=<?php  if($action == 'createplan') echo "postcreateplan"; if($action == 'editplan') echo "editplan&actiontype=postupplan";?>"onsubmit="return post_submit()">
		  	 <input name="planid" type="hidden" value="<?php echo $plan['planid']?>" />
              <input name="minprice" id="minprice" type="hidden" value="<?php  if($action == 'createplan') echo $GLOBALS['C_ZYIIS']['cpcmin_price']; if($action == 'editplan') { $min_price = $plan['plantype'] ;echo $GLOBALS['C_ZYIIS'][$min_price];}?>" />
		    <table width="93%"  border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td valign="top">

				<?php if($statetype== 'success') {?>
				  <div class="tipinfo" id="success">
					<div class="r1"></div>
					<div class="r2"></div>
					<div class="text">计划已更新。</div>
					<div class="l1"></div>
					<div class="l2"></div>
				  </div>
				  <?php }  ?>

					</td>
              </tr>
              <tr></tr>
              <tr>
                <td height="20">&nbsp;</td>
              </tr>
              <tr>
                <td class="cpt">常规</td>
              </tr>
              <tr>
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100" valign="top">计划项目名称 </td>
                      <td><input name="planname" type="text" id="planname" value="<?php echo $plan['planname']?>" />
                          <br />
                          <span class="gray">请填写广告项目名称。</span></td>
                    </tr>
                    <tr>
                      <td>计费形式</td>
                      <td><select name="plantype" id="plantype"  <?php if($action=='editplan') echo "disabled='disabled'"?>  onchange="Dodata()">
                          <?php foreach((array)$plantype as $pt) {?>
                          <option value="<?php echo $pt['plantype']?>" <?php if($plan['plantype']==$pt['plantype']) echo "selected"?>><?php echo strtoupper ($pt['plantype'])?> &nbsp;&nbsp;<?php echo $pt['name']?></option>
                          <?php } ?>
                        </select>
                          <br />
                          <span class="gray">计划应用于哪一种计费形式。</span></td>
                    </tr>

                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td class="cpt">出价与预算</td>
              </tr>
              <tr>
                <td height="50"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100" height="40" valign="top">单价</td>
                      <td>￥
                        <input name="priceadv" type="text" id="priceadv" size="8"  value="<?php echo $plan['priceadv']? abs($plan['priceadv']) :''?>"/>
                          <span id='plan_p'>元</span>
						  <?php if($action != 'editplan'){?>
						  <font color="#FF0000">注意：单次价格必须大于等于<span id='minprices'><?php echo $GLOBALS['C_ZYIIS']['cpcmin_price']?>元</span> </font>
						  <?php }?>
						  <br />
                          <span class="gray">项目支付的单次价格。</span></td>
                    </tr>
                    <tr>
                      <td height="60" valign="top"><span class="t14b">每日限额</span></td>
                      <td>￥<input name="budget" type="text" id="budget"  size="8" value="<?php echo $plan['budget']?>"/>元 <font color="#FF0000">每日最低限额不能低于<?php echo $GLOBALS['C_ZYIIS']['min_budeget']?>元</font><br />
                      <span class="gray">每日预算控制您的费用。总体而言，在达到每日预算限额时，您的广告就会在当天停止展示</span></td>
                    </tr>
                    <tr>
                      <td height="30" valign="top">价格说明</td>
                      <td><input name="priceinfo" type="text" id="priceinfo"  value="<?php echo $plan['priceinfo']?>" size="40" maxlength="16"/>
                          <br />
                          <span class="gray">广告计费简要说明。</span></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td  >&nbsp;</td>
              </tr>
              <tr>
                <td class="cpt">结束日期与限制</td>
              </tr>
              <tr>
                <td height="50"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100" height="30">结束日期</td>
                      <td><input type="radio" name="expire_date" checked="checked" value="0000-00-00" onclick="expire(&quot;expire&quot;, true)" <?php if ($plan['expire']=='0000-00-00' || !$plan) echo "checked";?>/>
                        没有结束日期</td>
                    </tr>
                    <tr>
                      <td height="30" align="center"></td>
                      <td><input name="expire_date" type="radio"  onclick="expire(&quot;expire&quot;, false)" value="no" <?php if ($plan['expire']!='0000-00-00' && $plan) echo "checked";?>/>
                          <select name="expire_year" id="expire_year" <?php if ($plan['expire']=='0000-00-00' || !$plan) echo "disabled='disabled'";?>>
                            <?php
										$expire = @explode("-",$plan['expire']);
										for ($i = date('Y') ;$i<date('Y')+21;$i++) {?>
                            <option value="<?php echo $i?>" <?php if (($i == date('Y')+1&& !$plan) || $expire[0]==$i) echo 'selected'?>><?php echo $i?>年</option>
                            <?php }?>
                          </select>
                          <select name="expire_month" id="expire_month" <?php if ($plan['expire']=='0000-00-00' || !$plan) echo "disabled='disabled'";?>>
                            <?php for ($i = 1 ;$i<13;$i++) {?>
                            <option value="<?php echo $i?>" <?php if (($i == date('n')&& !$plan)  || $expire[1]==$i) echo 'selected'?>><?php echo $i?>月</option>
                            <?php }?>
                          </select>
                          <select name="expire_day" id="expire_day" <?php if ($plan['expire']=='0000-00-00' || !$plan) echo "disabled='disabled'";?>>
                            <?php for ($i = 1 ;$i<32;$i++) {?>
                            <option value="<?php echo $i?>" <?php if ( ($i == date('j',TIMES)&& !$plan)  || $expire[2]==$i) echo 'selected'?>><?php echo $i?>日</option>
                            <?php }?>
                          </select>
                          <br />
                          <div class="tips" id="tip1" style="display:none">您的广告会在这一日期停止展示，直到您以后更改这一设置。</div>
                        <br /></td>
                    </tr>

                </table></td>
              </tr>
              <tr>
                <td class="cpt">项目介绍</td>
              </tr>
              <tr>
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100" height="30">项目介绍</td>
                      <td><textarea name="planinfo" id="planinfo" style="width:320px;height:100px"><?php echo $plan['planinfo']?></textarea></td>
                    </tr>
                    <tr>
                      <td align="center"></td>
                      <td>&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="cpt">地理位置与网站类型、时间、星期定向</td>
              </tr>
              <tr>
                <td height="50"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>


                    <tr>
                      <td width="100" height="30" align="center">位置 <a href="?action=help&amp;width=250&amp;type=createplan&amp;typeval=aclcity" class="jTip" id="aclcityhelp"  name="地理位置定位"><img src="/javascript/jquery/images/question.gif" border="0" align="absmiddle" /></a></td>
                      <td>您希望广告在哪些地理位置展示？</td>
                    </tr>
                    <tr>
                      <td height="30" align="center"></td>
                      <td><input id="acl[1][isacl]" class='aclcity' onclick="showtype('2','n');$i('aclcity_c').style.display = 'none'" type="radio"   value="all" name="acl[1][isacl]" <?php if(!$aclcity) echo " checked"?>/>
                        在所有地方显示<br />
                        <input id="acl[1][isacl]" onclick="showtype('2','y');$i('aclcity_c').style.display = ''" type="radio" value="acls" name="acl[1][isacl]"  <?php if($aclcity) echo " checked"?>/>
                        指定区域
                        <div id="aclcity_c" <?php if(!$aclcity) echo 'style="display:none;margin-top:3px"'?>>您的要求？<br />
                <input id="radio"  type="radio"  value="==" name="acl[1][comparison]" <?php if($citycom == '==' || $citycom=='' || !$plan) echo " checked"?>/>
                          允许
                          <input id="radio"  type="radio" value="!=" name="acl[1][comparison]" <?php if($citycom == '!=') echo " checked"?>/>
                          拒绝
                          <div class="tips">您的网站是地区性的，选择指定区域显示，将有利于广告效果。</div>
                        </div></td>
                    </tr>
                    <tr>
                      <td align="center"></td>
                      <td><table width="550" height="200" id="s2"   <?php if(!$aclcity) echo 'style="display:none"'?>>
                          <tr>
                            <td width="200" height="100"><table width="580" align="center">
                                <tr>
                                  <td width="220"><span class="create-city_s1"> <span class="create-city_s2" >
                                    <script language="JavaScript" type="text/javascript">
document.write('<select id="city_more" class="create-city_select" name="city_more" size="12">');
	for(k=1;k<where.length;k++) {
		 document.write('<optgroup label="'+where[k].loca+'" >');
		loca3 = (where[k].locacity).split("|");
		for(l=1;l<loca3.length;l++) {
		document.write('<option value="'+loca3[l]+'">'+loca3[l]+'</option>');
	}
}
document.write('</select>');
                    </script>
                                  </span> </span></td>
                                  <td width="100" align="center"><img alt="" src="/templates/<?php echo Z_TPL?>/images/addcity.gif" onclick="add()" style="cursor: pointer;" />
                                      <div style="height:80px"></div>
                                    <img alt="" src="/templates/<?php echo Z_TPL?>/images/removecity.gif" onclick="remove()" style="cursor: pointer;" /></td>
                                  <td><span class="create-city_s1"> <span class="create-city_s2">
                                    <input type='hidden' name='acl[1][type]' value='city' />
                                    <input value="<?php echo $citydata;?>" name="acl[1][data][]" id="adcitystr" type="hidden" />
                                    <select id="city_choose" name="city_choose" size="12" class="create-city_select">
                                      <?php foreach ((array)$cityarr as $cityarr) {?>
                                      <option value="<?php echo $cityarr;?>"><?php echo $cityarr;?></option>
                                      <?php 	 }?>
                                    </select>
                                  </span> </span></td>
                                </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="20" align="center"></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30" align="center">类型 <a href="?action=help&amp;width=250&amp;type=createplan&amp;typeval=aclwebtype" class="jTip" id="aclwebtypehelp"  name="网站类型定位"><img src="/javascript/jquery/images/question.gif" border="0" align="absmiddle" /></a></td>
                      <td>您的广告属于那种类型？</td>
                    </tr>
                    <tr>
                      <td height="30" align="center"></td>
                      <td><input id="acl[0][isacl]" onclick="showtype('1','n');$i('webtype_c').style.display = 'none'" type="radio"   value="all" name="acl[0][isacl]" class='aclwebtype' <?php if(!$webtype) echo " checked"?>/>
                        不区分类型<br />
                        <input id="acl[0][isacl]" onclick="showtype('1','y');$i('webtype_c').style.display = ''" type="radio" value="acls" name="acl[0][isacl]" class='aclwebtype' <?php if($webtype) echo " checked"?>/>
                        类型限制
                        <div id="webtype_c" <?php if(!$webtype) echo 'style="display:none;margin-top:3px"'?>>您的要求？<br />
                <input id="radio"  type="radio"   value="==" name="acl[0][comparison]" <?php if($webtypecom == '==' || $webtypecom=='' || !$plan) echo " checked"?>/>
                          属于
                          <input id="radio"  type="radio" value="!=" name="acl[0][comparison]" <?php if($webtypecom == '!=') echo " checked"?>/>
                          不属于
                          <div class="tips">选择不同的广告类型，展示不同页面。</div>
                        </div></td>
                    </tr>
                    <tr>
                      <td   align="center"></td>
                      <td><div style="position:relative;z-index:100; width:100%;" onmouseover="os(event)" onmouseout="oe(event)">
                          <input type='hidden' name='acl[0][type]' value='webtype' />
                          <table width="100%"  id="s1"   class="tp" <?php if(!$webtype) echo 'style="display:none"'?>>
                            <tr>
                              <?php
								$i=1;
								foreach ($sitetype as $s)
								{
									echo '<td><input type="checkbox" name="acl[0][data][]" id="aclsitetype" value="'.$s['sid'].'"'?>
                              <?php
									if(is_array($webtype)){
										if (in_array ($s['sid'], $webtype))
											echo " checked";
									} echo ' class="aclwebtypeval"/>'.$s['sitename'].'</td>';
									if ($i % 6 == 0){
										echo '</tr>';
									}
									$i++;
								}
								?>
                            </tr>
                          </table>
                      </div></td>
                    </tr>


<!--开始-->
                        <tr>
                            <td height="20" align="center"></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="30" align="center">平台<a href="?action=help&amp;width=250&amp;type=createplan&amp;typeval=aclpttype" class="jTip" id="aclpttypehelp"  name="平台定位"><img src="/javascript/jquery/images/question.gif" border="0" align="absmiddle" /></a></td>
                            <td>您希望那个平台展示广告？</td>
                        </tr>
                        <tr>
                            <td height="30" align="center"></td>
                            <td><input id="acl[4][isacl]" onclick="showtype('5','n');$i('pt_c').style.display = 'none'" type="radio"   value="all" name="acl[4][isacl]"  class="aclpt" <?php if(!$aclpt) echo " checked"?>/>
                                全平台投放<br />
                                <input id="acl[4][isacl]" onclick="showtype('5','y');$i('pt_c').style.display = ''" type="radio" value="acls" name="acl[4][isacl]" class="aclpt" <?php if($aclpt) echo " checked"?>/>
                                在指定的平台投放
                                <div class="tips" id="pt_c"  <?php if(!$aclpt) echo 'style="display:none;margin-top:3px"'?>>在指定的平台显示广告。</div></td>
                        </tr>
                        <tr>
                            <td height="30" align="center"></td>
                            <td><input type='hidden' name='acl[4][type]' value='pt' />
                                <table width='100%' cellpadding='0' cellspacing='0' border='0'  id='s5' class="tp" <?php if(!$aclpt) echo 'style="display:none  ;margin-top:3px"'?>>
                                    <td><input type='radio'  name='acl[4][data][]' value='苹果' class='aclptval' checked
                                      <?php if($ptdata[0]=='苹果'){echo 'checked';} ?> >苹果</td>
                                    <td><input type='radio'  name='acl[4][data][]' value='安卓' class='aclptval'
                                       <?php if($ptdata[0]=='安卓'){echo 'checked';} ?> >安卓</td>
                                </table></td>
                        </tr>
<!--结束-->
                </table></td>
              </tr>
              <tr>
                <td height="50"><input type="submit" name="Submit" class="form-submit" value=" 提 交 " /></td>
              </tr>
              <tr>
                <td height="20">&nbsp;</td>
              </tr>
            </table>
                    </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script language="JavaScript" type="text/javascript" src="/javascript/plan.js"></script>
<script  type="text/javascript">
var cpc_minprice=<?php echo $GLOBALS['C_ZYIIS']['cpcmin_price']?>;
var cpm_minprice=<?php echo $GLOBALS['C_ZYIIS']['cpmmin_price']?>;
var cpv_minprice=<?php echo $GLOBALS['C_ZYIIS']['cpvmin_price']?>;
var cpa_minprice=<?php echo $GLOBALS['C_ZYIIS']['cpamin_price']?>;
var cps_minprice=<?php echo $GLOBALS['C_ZYIIS']['cpsmin_price']?>;
function post_submit(){
	var create = $i('create');

	var datatime = get_radio_value($n("datatime"));
	var serverip  = $i('serverip').value;
	var plantype = $("#plantype").val();

	if(create.planname.value=="" ){
		alert("请填写广告项目！");
		create.planname.focus();
		return false;
	}
	if(datatime==0 && serverip=='' && (plantype=='cpa' || plantype=='cps' )){
		alert("时实数据返回接口认证IP不能为空！ ");
		create.serverip.focus();
		return false;
	}
	if(create.priceadv.value<=0){
		alert("单价不能小于0！ ");
		create.priceadv.focus();
		return false;
	}

	if(!checkPrice(create.priceadv.value)){
		create.priceadv.focus();
		return false;
	}

	if(!checkBudget(create.budget.value)){
		create.budget.focus();
		return false;
	}

	if($('.aclwebtypeval[@checked]').val() === null && $('.aclwebtype[@checked]').val() != 'all'){
		alert("最少需要选择一个网站类型！");
		return false;
	}
	if($i('adcitystr').value == '' && $('.aclcity[@checked]').val() != 'all'){
		alert("最少需要选择一个地域！");
		return false;
	}
	if($('.acltimeval[@checked]').val() === null && $('.acltime[@checked]').val() != 'all'){
		alert("最少需要选择一个时间！");
		return false;
	}
	if($('.aclweekdayval[@checked]').val() === null && $('.aclweekday[@checked]').val() != 'all'){
		alert("最少需要选择一个时间！");
		return false;
	}
    if($('.aclptval[@checked]').val() === null && $('.aclpt[@checked]').val() != 'all'){
        alert("最少需要选择一个平台！");
        return false;
    }
	//return false
}

function checkPrice(str){
    minprice = $i('minprice').value;
	var i;
	for(i=0;i<str.length;i++)  {
	   if ((str.charAt(i)<"0" || str.charAt(i)>"9")&& str.charAt(i) != '.'){
			alert("单次价格:只能输入0--9之间的数字,不能有空格！");
			return false;
	   }
	}
	if(str>parseFloat(100) ){
	   alert("单次价格:不能大于100元！");
	   return false;
	}
	if(str<0){
		alert("单次价格:不能小于0！\n");
		return false;
	}
	<?php if (!$_SESSION["adminusername"]) {?>
	if(str<parseFloat(minprice) ){
		alert("单次点击价格:不能小于"+minprice+"！\n");
		return false;
	}
	<?php }?>
	var re = /([0-9]+\.[0-9]{4})[0-9]*/;
    aNew = str.replace(re,"$1");
    if(str.length>aNew.length){
	   str=aNew;
	   alert("单次价格:小数点后位数不能超过4位,请检查！");
	   return false;
	}
	return true;
}

function checkBudget(str){

	var i;
	if(str=="" ){
		alert("请填写每日预算！\n");
		return false;
	}
	for(i=0;i<str.length;i++)  {
	   if ((str.charAt(i)<"0" || str.charAt(i)>"9")&& str.charAt(i) != '.'){
			alert("每日预算:只能输入0--9之间的数字,不能有空格！");
			return false;
	   }
	}
	if(str<parseFloat(<?php echo $GLOBALS['C_ZYIIS']['min_budeget']?>)){
		alert("每日限额:不能小于<?php echo $GLOBALS['C_ZYIIS']['min_budeget']?>！\n");
		return false;
	}

	return true;
}

function Dodata(){
    var _p = '元';
	var plantype = $("#plantype").val();
	$("#datadatev").hide();

	if(plantype=='cpa' || plantype=='cps'  ){
		$("#datadatev").show();
	}else {
		$("#serveripids").hide();
	}
	if(plantype=='cps') _p='%';
	$i('minprices').innerHTML = eval(plantype+"_minprice")+_p;
	$i('minprice').value = eval(plantype+"_minprice");
	$i('plan_p').innerHTML = _p;
}
function SetUmoney(v){
	if(v){
		v = v.split('￥');
		if(v[1]<100){
			if(!confirm('当前广告商的余额低于100元\n确认么？\n点击“取消”进入充值?')){
				top.location="do.php";
			}
		}
	}
}

</script>
<?php include TPL_DIR . "/footer.php"?>