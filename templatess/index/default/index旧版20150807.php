<?php if(!defined('IN_ZYADS')) exit();  
include TPL_DIR . "/header.php";?>
<title><?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<div class="slider">
  <div class="bd">
    <ul>
      <li style="background:url(/templates/index/default/img/banner1.jpg) #72a0db center 0 no-repeat;">
      	<a href="/?action=register"></a>
      </li>
      <li style="background:url(/templates/index/default/img/banner2.jpg) #72a0db center 0 no-repeat;">
      	<a href="/?action=register"></a>
       </li>
      <li style="background:url(/templates/index/default/img/banner3.jpg) #72a0db center 0 no-repeat;">
      	<a href="/?action=register"></a>
      </li>
    </ul>
  </div>
  <ul class="smallpic">
  </ul>
</div>
<script type="text/javascript">
jQuery(".ulogin").slide({ titCell:".hd li", mainCell:".bds",delayTime:0});
jQuery(".slider").slide({ titCell:".smallpic", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true,delayTime:300,interTime:6000});
jQuery(".news").slide({ titCell:".hd li", mainCell:".newcon",delayTime:0});
jQuery(".adv").slide({titCell:".advhd",mainCell:".advbd ul",autoPage:true,effect:"leftLoop",autoPlay:true,autoPage:true,scroll:4,vis:4});
jQuery(".game").slide({mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,scroll:2,vis:4,pnLoop:false});
</script>

<div id="main">

  <div class="news">
  	<h3>联盟公告:</h3>
	      <ul>
      	  <li>
		  				   <?php 
				    $news=$this->newsmodel->getAllnews(9);
				    foreach((array)$news as $n){
						$mtime=strtotime($n["time"]);
						$emtime = TIMES-86400*5;
				   ?>

        </li> 
      	  <li>
                 <span><font color="<?php if($emtime<$mtime) echo 'red'?>"></font>20<?php echo date("y-m-d",strtotime($n['time']));?></span>
				   <a href="<?php echo url("?action=news&id=".$n['id']."")?>" title="<?php echo $n['tit']?>" class="adot"  target="_blank"><font color="<?php echo $n['color']?>" >
                  <?php if($n['top'])echo "[置顶]";echo str(h($n['tit']),70);?>
                  </font></a>
                          <?php if(!$n['top']){?>
						          	
                  <?php } ?>
              <?php } ?>
        </li>  
              </ul>
  </div>
  <!--/news-->

  <div class="user" style="height:350px;">
	<div class="title">
    	<h3 id="ind_login_title">会员登录</h3>
        <span id="ind_register_a"><a href="?action=register">注册新用户</a></span>
    </div>
	    <form  method="post" action="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/i.php?action=postuserlogin" onSubmit="return doLogin()" style="margin-bottom: 0px;">
        <ul>
            <li>用户：<input type="text" name="username" class="ipt" /></li>
            <li>密码：<input type="password" name="password" class="ipt" /></li>
            <li style="padding-bottom:5px; height:25px; line-height:25px;display:none;">
            	<font style="color:#ffffff">会员：</font>
            	<label>
                	<input name="gid" type="radio" value="3" checked="checked" />网站主
                </label>
                <label>
                	<input name="gid" type="radio" value="2" />广告主
                </label>
            </li>
            <li class="btn">
            	<input type="submit" value="登  录" name="submit" />
                <span><a href="?action=findpasswd">忘记密码?</a></span>
            </li>
        </ul>
    </form>
     	<img src="/templates/index/default/img/Qaaaa.jpg" style="margin-top:-10px;">
  </div>
  <div class="cr"></div>
  <div class="product">
  	<ul>
    <li><a href="javascript:;"><img src="/images/m1.png" /><b>PC电脑端广告CPA</b>
      <span>按广告有效注册来计费<br />能更好的实现广告的定向传播；<br />大大提高产品的有效注册量 <br />为广告商带去量和质的回报！</span></a>
    </li>
    <li><a href="javascript:;"><img src="/images/m2.png" /><b>安卓手机广告APP</b>
      <span>按APP软件有效安装计费<br />手机应用产品丰富，单价高；<br />提供URL直链推广和强大的统计功能<br />收益丰厚，推荐投放！</span></a>
    </li>
    <li><a href="javascript:;"><img src="/images/m3.png" /><b>安卓跳转广告广告CPM</b>
      <span>按广告有效跳转次数计费<br />广告正规，样式美观，跳转率高；<br />提供多轮样式和强大的用户体验<br />在不影响原站的同时增加收入！</span></a>
    </li>
    <li class="fast"><a href="javascript:;"><img src="/images/m4.png" /><b>IOS跳转广告CPM</b>
      <span>按广告有效跳转次数计费<br />广告正规，样式美观，跳转率高；<br />提供精致样式和强大的统计功能<br />收入较高，推荐投放！</span></a>
    </li>
    
    </ul>
  </div>

  <div class="adv">
    <h3>合作媒体</h3>
      <ul>
	    <li><a href="/?action=register"><img src="/templates/index/default/img/zhifubao_logo.jpg" /></a></li>
        <li><a href="/?action=register"><img src="/templates/index/default/img/admin5_logo.jpg" /></a></li>
	    <li><a href="/?action=register"><img src="/templates/index/default/img/pptv.jpg" /></a></li>
        <li><a href="/?action=register"><img src="/templates/index/default/img/guagua.jpg" /></a></li>
        <li><a href="/?action=register"><img src="/templates/index/default/img/kwyy.png" /></a></li>
        <li><a href="/?action=register"><img src="/templates/index/default/img/9158.jpg" /></a></li>
      </ul>
  </div>
  <!--/adv-->
</div>

<div class="link">
	<span>友情链接：</span>
  <a target="_blank"href="/">广告联盟 </a>
  <a target="_blank"href="/">A5站长网 </a>
  <a target="_blank"href="/">CPA广告联盟 </a>
  <a target="_blank"href="/">日付广告联盟 </a>
  <a herf="/">爱站网</a>
  <a herf="/">站长之家</a>
  <a herf="/">落伍者论坛</a>
  <a herf="/">我拉网</a>
  <a herf="/">友链申请</a>
</div>
</div>
<style>
dt a:hover{color:#fff;text-decoration:none;}
.help dl dd{text-align:center;}
.help dl dd p{padding-left:0px;margin-left:-15px;}
.kfq{margin-left:7px;}
</style>
<title><?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>

<script src="/javascript/imgnum.js" type="text/javascript"></script>
 
<?php include TPL_DIR . "/footer.php";?>