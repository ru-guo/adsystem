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
		easeType: 'random',  //��������
		/*
		"rollIn", "fadeIn", "fadeInUp", "fadeInDown", "fadeInLeft", "fadeInRight", "fadeInRight", "bounceIn", "bounceInDown", "bounceInUp", "bounceInLeft",        "bounceInRight", "rotateIn", "rotateInDownLeft", "rotateInDownRight", "rotateInUpLeft", "rotateInUpRight" (18�ֶ������Ϳɵ���)
		*/
		slideShow: true  //Ϊfalseʱ�����Զ�����
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
			<span class="txt1">ѡ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?></span>	
			<span class="txt2">����̤̤ʵʵ, �������ȵ�׬Ǯ</span>												
			<span class="txt3">һ���ṩ�ٷ�ʵʱ��̨,͸������,���ҷ���,����վ����ѡ��!</span>												
			<span class="txt4"><a href="/?action=login" class="btn_l">��������!</a></span>
		</div> 
				<!-------------------------------------------------------->
    <div class="oneByOne_item" style="display: block; left: 0px;"> 
    	<!--a href="#" class="animate0 rotateInUpLeft" style="display: inline;"-->
    		<img src="/templates/index/default/images/home7_slide_2.png"  class="wp1_3 wp1_left slide2_bot" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>"  title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>">
    	<!--/a--> 
    	<span class="txt1 blue txt_right2 animate1 rotateInUpLeft" style="width: 380px;display: block;">����վ���Ĺ���������35%����</span> 
    	<span class="txt2 blue txt_right2 animate2 rotateInUpLeft" style="width: 380px; display: block;">����Ϊ������ͬ��չ</span> 
    	<span class="txt2 blue txt_right2 animate3 rotateInUpLeft" style="width: 380px; display: block;">��Ϊרҵ������׿Խ</span> 
    	<span class="txt4 txt_right2 txt4up animate4 rotateInUpLeft" style="display: block;">
    		<a href="?action=login"  class="btn_l" target="_blank">��������</a>
    	</span> 
    </div>
    
  			  <!-------------------------------------------------------->
     
		<div class="oneByOne_item">                                 	
<!--			<img src="/templates/index/default/images/home7_slide_4.png" class="wp1_3 slide3_bot" alt="" />			            -->
			<span class="txt1 blue">�ḻ�Ĺ������</span>			
			<span class="txt2 blue">��׼��Ӫ��Ч��</span>												
			<span class="txt3 short">We have abundant type of advertising, will certainly be able to meet any of your needs.</span>												
			<span class="txt4 txt4up"><a href="/?action=login" class="btn_l">��������!</a></span>
		</div>
			<!-----------------ѡ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�����ĲƸ�����-  ѡ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�����ĲƸ�����-------------------------------------->
		<div class="oneByOne_item">
			<img src="/templates/index/default/images/home1_slide_1.png" class="wp1_3 slide1_bot" alt="" />		            
			<span class="txt1">ѡ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�����ĲƸ�����</span>			
			<span class="txt2">30Ԫ�ո���ÿ�ս���</span>												
			<span class="txt3 short">�ṩ����߼�������CPA��桢��װ��CPA��桢�ƶ�APP�������棡�����ż������ߵ��ۡ��ʺϸ���С��������</span>												
			<span class="txt4 txt4up"><a href="/?action=login" class="btn_l">��������!</a></span>
		</div>
		
    		<!-------------------------------------------------------->
		<div class="oneByOne_item">                                 	
			<!--img src="/templates/index/default/images/sliders/home_page_7/home7_slide_2.png" class="wp1_3 wp1_left slide2_bot" alt="" /-->
			<img src="/templates/index/default/images/d3.png" class="wp1_3 wp1_left slide2_bot" alt="" />			            
			<span class="txt1 blue txt_right2">�ṩ���� ��׿ / ƻ�� AppӦ�����</span>			
			<span class="txt2 blue txt_right2">����ת����</span>												
			<span class="txt2 blue txt_right2">���ߵ��ۣ��������գ�</span>												
			<span class="txt4 txt_right2 txt4up"><a href="/?action=login" class="btn_l">��������!</a></span>												
		</div>
	<!-- !-------------------------------------------------------->
		<div class="oneByOne_item" style="display: none; left: 960px;"> 
    	<!--a href="#" class="animate0" style="display: none;"-->
    		<img src="/templates/index/default/images/home7_slide_3.png"  class="wp1_3 slide1_bot" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>">
    	<!--/a--> 
    	<span class="txt1 animate1" style="display: none;">רҵ�չ���վ�ƶ�����</span> 
    	<span class="txt2 animate2" style="display: none;">��ÿ�����վ��30%��������ʧ</span> 
    	<span class="txt3 short animate3" style="display: none;"><?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ṩ��ѵ��ֻ��������ַ�������������վ�ֻ��������Ϊ����</span> 
    	<span class="txt4 txt4up animate4" style="display: none;">
    		<a href="?action=login"  target="_blank"  class="btn_l">����ע��</a>
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
      <h1 class="tit_h1" style="width: 19%;">�������</h1>
      
      <!--CPC-->
      
      <div class="cpc" style="width: 36.5%;_width:35%">
    <div class="box">
          <div class="box-title">
        <h2 class="y-h2">PC���Զ˹��CPA<a class="more" href="#" style="display: none;"><!--�˽����&gt;&gt;--></a></h2>
        <p class="smart">�������Чע�����Ʒ�</p>
      </div>
          <div class="adstyleinfo" style="display: block;">�ܸ��õ�ʵ�ֹ��Ķ��򴫲��������߲�Ʒ����Чע������Ϊ����̴�ȥ�����ʵĻر���</div>
          <img src="templates/index/default/images/cpa.gif"  alt="PC���Զ˹��CPA"> </div>
  </div>
      
      <!--CPM-->
      
      <div class="cpc" style="width: 19%; overflow: hidden;">
    <div class="box">
          <div class="box-title">
        <h2 class="y-h2">��׿�ֻ����APP <a class="more" href="#" style="display: none;"><!--�˽����&gt;&gt;--></a></h2>
        <p class="smart">��APP�����Ч����Ʒ�</p>
      </div>
          <div class="adstyleinfo" style="display: none;">�ֻ�Ӧ�ò�Ʒ�ḻ�����۸ߣ��ṩURLֱ���ƹ��ǿ���ͳ�ƹ����������Ƽ�Ͷ�ţ�</div>
          <img src="templates/index/default/images/cpc.gif"  alt="��׿�ֻ����APP"> </div>
  </div>
      
      <!--CPV-->
      
      <div class="cpc" style="width: 19%; overflow: hidden;">
    <div class="box">
          <div class="box-title">
        <h2 class="y-h2">��׿��ת���CPM <a class="more" href="#" style="display: inline;"><!--�˽����&gt;&gt;--></a></h2>
        <p class="smart">�������Ч���������Ʒ�</p>
      </div>
          <div class="adstyleinfo" style="display: hidden;">������棬��ʽ���ۣ������ʸߣ��ṩ������ʽ��ǿ����û����飬�ڲ�Ӱ��ԭվ��ͬʱ�������룡</div>
          <img src="templates/index/default/images/cpv.gif"  alt="CPVչʾ���"> </div>
  </div>
      
      <!--CPA-->
      
      <div class="cpc cpclast" style="width: 19%; overflow: hidden;">
    <div class="box">
          <div class="box-title">
        <h2 class="y-h2">IOS��ת���CPM <a class="more" href="#" style="display: none;"><!--�˽����&gt;&gt;--></a></h2>
        <p class="smart">�������Ч��ת�����Ʒ�</p>
      </div>
          <div class="adstyleinfo" style="display: none;">������棬��ʽ���ۣ���ת�ʸߣ��ṩ������ʽ��ǿ���ͳ�ƹ��ܣ�����ϸߣ��Ƽ�Ͷ�����ͣ�</div>
          <img src="templates/index/default/images/cpm.gif"  alt="CPA�������"> </div>
  </div>
    </div>
<script type="text/javascript"> 

$(document).ready(function () { 

//�������չ������Ч��

$(".cpc").mouseover(

  function () {

  $(this).siblings().stop().animate({ width:'19%' },1);

  $(this).siblings().children().children(".adstyleinfo").hide();

 $(this).siblings().children().children(".box-title").children(".y-h2").children(".more").hide();

 $(this).stop().animate({ width:'36.5%'},200);

 $(this).children().children(".adstyleinfo").slideDown('800');

 $(this).children().children(".box-title").children(".y-h2").children(".more").show();

  });

    //���Ź�����»���Ч����

  

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
        <h2> <a href="?action=newslist"  target="_blank">����</a>������Ϣ</h2>
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
                  <?php if($n['top'])echo "[�ö�]";echo str($n['tit'],35);?>
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
        <h2> <a href="?action=help"  target="_blank">����</a>������Ѷ</h2>
      </div>
          <div class="news-content news-height" id="tipnews">
        <ul>
                  
                    <li> 
          <span>05-23</span><a href="/?action=help&id=10" target="_blank">
          <font color="" >��վ����Ա��ʲô����»ᱻ�ܸ�����</font></a>
          		</li>
          			<li>
          <span>05-23</span><a href="/?action=help&id=6" target="_blank">
          <font color="" >�ҵ���վ��׬Ǯ��</font></a>
          		</li>
          			<li>
          <span>03-28</span><a href="/?action=help&id=39" target="_blank">
          <font color="" >ʲô���ߣ�������ô��� </font></a>
          		</li>
          			<li>
          <span>03-28</span><a href="/?action=help&id=33" target="_blank">
          <font color="" >ʲô�ǹ�����ˣ� </font></a>
          		</li>
          			<li>
          <span>03-28</span><a href="/?action=help&id=19" target="_blank">
          <font color="" >�����˵��������Ʒ���˽⣬��ô�죿</font></a>
          		</li>
          			<li>
          <span>03-28</span><a href="/?action=help&id=37" target="_blank" >
          <font color="" >��������� ������� ��վ������֮���ì�� </font></a>
          		</li>

        </ul>
      </div>
     </div>
  </div>
      
      <!--<script type="text/javascript">

$(document).ready(function (){

var $tip1 = $("#tipnews>ul>li:eq(0)>a:eq(1)");

$tip1.css("color","red");

$tip1.prepend("[�ö�]");

})

</script>--> 
      
      <!--Right-->
      
      <div class="boxRight">
    <div class="boxBorder fl">
          <div class="boxtitle_right">
        <h2>�ͷ���ϵ��</h2>
      </div>
          
          <!--��վ��-->
          
          <div class="boxRightWeb">
        <h2 class="tit_h2">�����̿ͷ�</h2>
        <ul>
              <li><span class="nickName">�ͷ�:</span><a target="_blank" href="#"><img border="0" src="http://wpa.qq.com/pa?p=2:1395550247:51" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ͷ�" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ͷ�"/></a></li>
              <li><span class="nickName">�ͷ�:</span><a target="_blank" href="#"><img border="0" src="http://wpa.qq.com/pa?p=2:1395550247:51" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ͷ�" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ͷ�"/></a></li>
              <li><span class="nickName">�ͷ�:</span><a target="_blank" href="#"><img border="0" src="http://wpa.qq.com/pa?p=2:1395550247:51" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ͷ�" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ͷ�"/></a></li>
              <li><span class="nickName">�ͷ�:</span><a target="_blank" href="#"><img border="0" src="http://wpa.qq.com/pa?p=2:1395550247:51" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ͷ�" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ͷ�"/></a></li>
            </ul>
        <h2 class="tit_h2">������ͷ�</h2>
        <ul>
              <li><span class="nickName">�ͷ�:</span><a target="_blank" href="#"><img border="0" src="http://wpa.qq.com/pa?p=2:1395550247:51" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ͷ�" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ͷ�"/></a></li>
              <li><span class="nickName">�ͷ�:</span><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1395550247&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1395550247:51" alt="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ͷ�" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ͷ�"/></a></li>
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
          <h3>����ý��</h3>
          <ul style="display: none">
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
        <div class="link"><span>�������ӣ�</span>
            <a target="_blank" href="http://www.heiniubao.com/">��ţ����</a>
            <a target="_blank" href="http://www.heiniubao.com/activity/dd_redirect1">��ţ������</a>
            <a target="_blank" href="#">�������</a>
            <a target="_blank" href="#">�ֻ��������</a>
        </div>
      </div>
</div>

<!--Flowchart Over-->

<script src="js/imgnum.js"  type="text/javascript"></script>

<?php include TPL_DIR . "/footer.php";?>