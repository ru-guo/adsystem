<?php if(!defined('IN_ZYADS')) exit();  
include TPL_DIR . "/headerxin.php";?>
<title><?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<link href="/templates/index/default/css/xin/style.css" type=text/css rel=stylesheet>
<link href="/templates/index/default/css/xin/slider.css"  rel="stylesheet" type="text/css">
<script type="text/javascript" src="/templates/index/default/css/xin/jquery-runbanner.js" ></script> 
<script type="text/javascript">
$(function(){
    $('#obo_slider').runbanner({
		className: 'oneByOne1', 	             
		easeType: 'random',  //动画参数
		/*
		"rollIn", "fadeIn", "fadeInUp", "fadeInDown", "fadeInLeft", "fadeInRight", "fadeInRight", "bounceIn", "bounceInDown", "bounceInUp", "bounceInLeft",        "bounceInRight", "rotateIn", "rotateInDownLeft", "rotateInDownRight", "rotateInUpLeft", "rotateInUpRight" (18种动画类型可调用)
		*/
		slideShow: true  //为false时不会自动播放
	});  
})
</script> 
<!--Slider Begin-->

<div class="oneByOne1" style="overflow: hidden;">
   <div id="obo_slider" class="huaqilm-com" style="left: 0px;">
    			<!-------------------------------------------------------->
    	<div class="oneByOne_item">
			<img src="/templates/index/default/images/home7_slide_61.png" class="wp1_3 slide2_bot" alt="" />
			<!--span class="txt1">Crucio is a responsive, business</span-->
			<span class="txt1">选择<?php echo $GLOBALS['C_ZYIIS']['sitename']?></span>	
			<span class="txt2">让您踏踏实实, 安安稳稳的赚钱</span>												
			<span class="txt3">一律提供官方实时后台,透明公开,您我放心,数万站长的选择!</span>												
			<span class="txt4"><a href="/?action=login" class="btn_l">立即加入!</a></span>
		</div> 
				<!-------------------------------------------------------->
    <div class="oneByOne_item" style="display: block; left: 0px;"> 
    	<!--a href="#" class="animate0 rotateInUpLeft" style="display: inline;"-->
    		<img src="/templates/index/default/images/home7_slide_2.png"  class="wp1_3 wp1_left slide2_bot" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>"  title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>">
    	<!--/a--> 
    	<span class="txt1 blue txt_right2 animate1 rotateInUpLeft" style="width: 380px;display: block;">让网站主的广告收益提高35%以上</span> 
    	<span class="txt2 blue txt_right2 animate2 rotateInUpLeft" style="width: 380px; display: block;">诚信为本，共同发展</span> 
    	<span class="txt2 blue txt_right2 animate3 rotateInUpLeft" style="width: 380px; display: block;">因为专业，所以卓越</span> 
    	<span class="txt4 txt_right2 txt4up animate4 rotateInUpLeft" style="display: block;">
    		<a href="?action=login"  class="btn_l" target="_blank">加入我们</a>
    	</span> 
    </div>
    
  			  <!-------------------------------------------------------->
     
		<div class="oneByOne_item">                                 	
			<img src="/templates/index/default/images/home7_slide_4.png" class="wp1_3 slide3_bot" alt="" />			            
			<span class="txt1 blue">丰富的广告类型</span>			
			<span class="txt2 blue">精准的营销效果</span>												
			<span class="txt3 short">We have abundant type of advertising, will certainly be able to meet any of your needs.</span>												
			<span class="txt4 txt4up"><a href="/?action=login" class="btn_l">立即加入!</a></span>
		</div>
			<!-----------------选择<?php echo $GLOBALS['C_ZYIIS']['sitename']?>，放心财富梦想-  选择<?php echo $GLOBALS['C_ZYIIS']['sitename']?>，放心财富梦想-------------------------------------->
		<div class="oneByOne_item">
			<img src="/templates/index/default/images/home1_slide_1.png" class="wp1_3 slide1_bot" alt="" />		            
			<span class="txt1">选择<?php echo $GLOBALS['C_ZYIIS']['sitename']?>，放心财富梦想</span>			
			<span class="txt2">30元日付，每日结算</span>												
			<span class="txt3 short">提供各类高价聊天室CPA广告、安装包CPA广告、移动APP等网络广告！更低门槛、超高单价、适合更多小伙伴合作。</span>												
			<span class="txt4 txt4up"><a href="/?action=login" class="btn_l">立即加入!</a></span>
		</div>
		
    		<!-------------------------------------------------------->
		<div class="oneByOne_item">                                 	
			<!--img src="/templates/index/default/images/sliders/home_page_7/home7_slide_2.png" class="wp1_3 wp1_left slide2_bot" alt="" /-->
			<img src="/templates/index/default/images/d3.png" class="wp1_3 wp1_left slide2_bot" alt="" />			            
			<span class="txt1 blue txt_right2">提供各类 安卓 / 苹果 App应用软件</span>			
			<span class="txt2 blue txt_right2">超高转化率</span>												
			<span class="txt2 blue txt_right2">更高单价，伴您创收！</span>												
			<span class="txt4 txt_right2 txt4up"><a href="/?action=login" class="btn_l">立即加入!</a></span>												
		</div>
	<!-- !-------------------------------------------------------->
		<div class="oneByOne_item" style="display: none; left: 960px;"> 
    	<!--a href="#" class="animate0" style="display: none;"-->
    		<img src="/templates/index/default/images/home7_slide_3.png"  class="wp1_3 slide1_bot" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>">
    	<!--/a--> 
    	<span class="txt1 animate1" style="display: none;">专业收购网站移动流量</span> 
    	<span class="txt2 animate2" style="display: none;">您每天的网站有30%流量在流失</span> 
    	<span class="txt3 short animate3" style="display: none;"><?php echo $GLOBALS['C_ZYIIS']['sitename']?>提供最佳的手机流量变现方案，让您的网站手机流量变废为宝！</span> 
    	<span class="txt4 txt4up animate4" style="display: none;">
    		<a href="?action=login"  target="_blank"  class="btn_l">立即注册</a>
    	</span> 
    </div>
	<!-- !-------------------------------------------------------->
  </div>
      <div class="buttonArea">
    <div class="buttonCon" style="cursor: pointer; display: none;"> <a class="theButton active" rel="0">1</a> <a class="theButton" rel="1">2</a> </div>
  </div>
    </div>
<!-- /one bt one slider -->


<!--Category Begin-->
<div class="layout adstyle">
      <h1 class="tit_h1" style="width: 19%;">广告类型</h1>
      
      <!--CPC-->
      
      <div class="cpc" style="width: 36.5%;_width:35%">
    <div class="box">
          <div class="box-title">
        <h2 class="y-h2">PC电脑端广告CPA<a class="more" href="#" style="display: none;"><!--了解更多&gt;&gt;--></a></h2>
        <p class="smart">按广告有效注册来计费</p>
      </div>
          <div class="adstyleinfo" style="display: block;">能更好的实现广告的定向传播，大大提高产品的有效注册量，为广告商带去量和质的回报！</div>
          <img src="templates/index/default/images/cpa.gif"  alt="PC电脑端广告CPA"> </div>
  </div>
      
      <!--CPM-->
      
      <div class="cpc" style="width: 19%; overflow: hidden;">
    <div class="box">
          <div class="box-title">
        <h2 class="y-h2">安卓手机广告APP <a class="more" href="#" style="display: none;"><!--了解更多&gt;&gt;--></a></h2>
        <p class="smart">按APP软件有效激活计费</p>
      </div>
          <div class="adstyleinfo" style="display: none;">手机应用产品丰富，单价高；提供URL直链推广和强大的统计功能收益丰厚，推荐投放！</div>
          <img src="templates/index/default/images/cpc.gif"  alt="安卓手机广告APP"> </div>
  </div>
      
      <!--CPV-->
      
      <div class="cpc" style="width: 19%; overflow: hidden;">
    <div class="box">
          <div class="box-title">
        <h2 class="y-h2">安卓跳转广告CPM <a class="more" href="#" style="display: inline;"><!--了解更多&gt;&gt;--></a></h2>
        <p class="smart">按广告有效弹窗次数计费</p>
      </div>
          <div class="adstyleinfo" style="display: hidden;">广告正规，样式美观，弹窗率高；提供多轮样式和强大的用户体验，在不影响原站的同时增加收入！</div>
          <img src="templates/index/default/images/cpv.gif"  alt="CPV展示广告"> </div>
  </div>
      
      <!--CPA-->
      
      <div class="cpc cpclast" style="width: 19%; overflow: hidden;">
    <div class="box">
          <div class="box-title">
        <h2 class="y-h2">IOS跳转广告CPM <a class="more" href="#" style="display: none;"><!--了解更多&gt;&gt;--></a></h2>
        <p class="smart">按广告有效跳转次数计费</p>
      </div>
          <div class="adstyleinfo" style="display: none;">广告正规，样式美观，跳转率高；提供精致样式和强大的统计功能，收入较高，推荐投放类型！</div>
          <img src="templates/index/default/images/cpm.gif"  alt="CPA广告联盟"> </div>
  </div>
    </div>
<script type="text/javascript"> 

$(document).ready(function () { 

//广告类型展开收起效果

$(".cpc").mouseover(

  function () {

  $(this).siblings().stop().animate({ width:'19%' },1);

  $(this).siblings().children().children(".adstyleinfo").hide();

 $(this).siblings().children().children(".box-title").children(".y-h2").children(".more").hide();

 $(this).stop().animate({ width:'36.5%'},200);

 $(this).children().children(".adstyleinfo").slideDown('800');

 $(this).children().children(".box-title").children(".y-h2").children(".more").show();

  });

    //热门广告上下滑到效果。

  

  	 $('.tab-nav li').mouseover(function(){ $(this).addClass("selected").siblings().removeClass(); 

$(".tab-pannel").stop().slideUp().eq($('.tab-nav li').index(this)).stop().slideDown()

});

}) 

</script> 

<!--Category Over--> 

<!--News Begin-->

<div class="layout block">
      <h1 class="tit_h1"></h1>
      
      <!--Left-->
      
      <div class="boxLeft">
    <div class="boxBorder">
          <div class="boxtitle">
        <h2> <a href="?action=newslist"  target="_blank">更多</a>公告信息</h2>
      </div>
          <div class="news-content news-height">
        <ul>
		  				   <?php 
				    $news=$this->newsmodel->getAllnews(6);
				    foreach((array)$news as $n){
						$mtime=strtotime($n["time"]);
						$emtime = TIMES-86400*5;
				   ?>

 
      	  <li>
                 <span><font color="<?php if($emtime<$mtime) echo 'red'?>"></font>20<?php echo date("y-m-d",strtotime($n['time']));?></span>
				   <a href="<?php echo url("?action=news&id=".$n['id']."")?>" title="<?php echo $n['tit']?>" class="adot"  target="_blank"><font color="<?php echo $n['color']?>" >
                  <?php if($n['top'])echo "[置顶]";echo str($n['tit'],35);?>
                  </font></a>
                          <?php if(!$n['top']){?>
						          	
                  <?php } ?>
              <?php } ?>
        </li>  
                    	  
            </ul>
      </div>
        </div>
  </div>
      
      <!--Center-->
      
      <div class="boxCenter">
    <div class="boxBorder">
          <div class="boxtitle">
        <h2> <a href="?action=help"  target="_blank">更多</a>问题资讯</h2>
      </div>
          <div class="news-content news-height" id="tipnews">
        <ul>
                  
                    <li> 
          <span>05-23</span><a href="/?action=help&id=10" target="_blank">
          <font color="" >网站主会员在什么情况下会被拒付广告费</font></a>
          		</li>
          			<li>
          <span>05-23</span><a href="/?action=help&id=6" target="_blank">
          <font color="" >我的网站何赚钱？</font></a>
          		</li>
          			<li>
          <span>03-28</span><a href="/?action=help&id=39" target="_blank">
          <font color="" >什么下线，下线怎么提成 </font></a>
          		</li>
          			<li>
          <span>03-28</span><a href="/?action=help&id=33" target="_blank">
          <font color="" >什么是广告联盟？ </font></a>
          		</li>
          			<li>
          <span>03-28</span><a href="/?action=help&id=19" target="_blank">
          <font color="" >对联盟的网络广告产品不了解，怎么办？</font></a>
          		</li>
          			<li>
          <span>03-28</span><a href="/?action=help&id=37" target="_blank" >
          <font color="" >剖析广告主 广告联盟 网站主三者之间的矛盾 </font></a>
          		</li>

        </ul>
      </div>
     </div>
  </div>
      
      <!--<script type="text/javascript">

$(document).ready(function (){

var $tip1 = $("#tipnews>ul>li:eq(0)>a:eq(1)");

$tip1.css("color","red");

$tip1.prepend("[置顶]");

})

</script>--> 
      
      <!--Right-->
      
      <div class="boxRight">
    <div class="boxBorder fl">
          <div class="boxtitle_right">
        <h2>客服联系区</h2>
      </div>
          
          <!--网站主-->
          
          <div class="boxRightWeb">
        <h2 class="tit_h2">渠道商客服</h2>
        <ul>
              <li><span class="nickName">客服:</span><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1395550247&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1395550247:51" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>客服" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>客服"/></a></li>
              <li><span class="nickName">客服:</span><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1395550247&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1395550247:51" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>客服" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>客服"/></a></li>
              <li><span class="nickName">客服:</span><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1395550247&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1395550247:51" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>客服" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>客服"/></a></li>
              <li><span class="nickName">客服:</span><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1395550247&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1395550247:51" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>客服" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>客服"/></a></li>
            </ul>
        <h2 class="tit_h2">广告主客服</h2>
        <ul>
              <li><span class="nickName">客服:</span><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1395550247&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1395550247:51" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>客服" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>客服"/></a></li>
              <li><span class="nickName">客服:</span><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1395550247&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1395550247:51" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>客服" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>客服"/></a></li>
            </ul>
      </div>
        </div>
  </div>
    </div>

<!--News Over--> 

<!--Flowchart Begin-->

<div class="layout block">
      <h1 class="tit_h1"></h1>
      <div class="borderbox flow fl" id="line">
    <div class="adv">
          <h3>合作媒体</h3>
          <ul>
        <li><img src="templates/index/default/images/1-1.png" ></li>
        <li><img src="templates/index/default/images/1-1.png" ></li>
        <li><img src="templates/index/default/images/1-1.png" ></li>
        <li><img src="templates/index/default/images/1-1.png" ></li>
        <li><img src="templates/index/default/images/1-1.png" /></li>
        <li><img src="templates/index/default/images/1-1.png" ></li>
          </ul>
        </div>
      </div>
    </div>
<div class="layout block">
      <h1 class="tit_h1"></h1>
      <div class="borderbox flow fl">
    <div class="link"><span>友情链接：</span>
<a target="_blank" href="http://www.heiniubao.com/">黑牛保险</a>
<a target="_blank" href="http://www.heiniubao.com/activity/dd_redirect1">黑牛福利社</a>
<a target="_blank" href="#">广告联盟</a> 
<a target="_blank" href="#">手机广告联盟</a>
    </div>
  </div>
 </div>

<!--Flowchart Over-->

<script src="js/imgnum.js"  type="text/javascript"></script>

<?php include TPL_DIR . "/footer.php";?>