<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/headerxin.php";?>
<title>网站公告中心_<?php echo $v["tit"] ?> <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<!--Slider Begin-->

<div class="layout">
      <h1 class="tit_h1"></h1>
      <div class="slides">
    <div class="bjqs-wrapper">
          <ul class="bjqs">
        <li class="bjqs-slide"><img src="templates/index/default/images/contact1.jpg"  style="height: 280px; width: 1200px;"></li>
        <li class="bjqs-slide"><img src="templates/index/default/images/contact2.jpg"  style="height: 280px; width: 1200px;"></li>
        <li class="bjqs-slide"><img src="templates/index/default/images/contact3.jpg"  style="height: 280px; width: 1200px;"></li>
      </ul>
        </div>
  </div>
    </div>
<script class="secret-source">

      jQuery(document).ready(function($) {

       $('.slides').bjqs({

            animtype      : 'slide',

            height        : 280,

            width         : 1200,

            responsive    : true,

            randomstart   : true,

		    //falseshowcontrols : false,

            showcontrols : false

          });

        });

</script> 

<!--Slider Over--> 

<!--Content Begin-->

<div class="blank50"></div>
<div class="layout block">
      <div class="infoLeft">
    <div class="infoBorder">
          <h3 class="tit-left"><img src="templates/index/default/images/news.jpg" ></h3>
          <ul>
       <li ><a href="?action=contact" >联系我们  ></a></li>
        <li ><a href="?action=help" >常见问题  ></a></li>
        <li  class="infoLiCurrent"><a href="?action=newslist" >公告/新闻 ></a></li>
      </ul>
        </div>
  </div>
      <div class="infoRight">
    <h1 class="tit_info_h2">公告/新闻</h1>
    
    <!--News1-->
    
    <div class="newsLista block">
          <h3 class="tit_info_h3"><?php echo $GLOBALS['C_ZYIIS']['sitename']?>公告</h3>
          <ul>
              <?php 
				    $news=$this->newsmodel->getAllnews(20);
				    foreach((array)$news as $n){
						$mtime=strtotime($n["time"]);
						$emtime = TIMES-86400*5;
				   ?>			
       <li>
                 <span><font color="<?php if($emtime<$mtime) echo 'red'?>"></font></span>
				   <a href="<?php echo url("?action=news&id=".$n['id']."")?>" title="<?php echo $n['tit']?>" class="adot"  target="_blank"><font color="<?php echo $n['color']?>" >
                  <?php if($n['top'])echo "[置顶]";echo str(h($n['tit']),80);?>
                  </font></a><span class="data"><font color="">20<?php echo date("y-m-d",strtotime($n['time']));?></font></span>
                          <?php if(!$n['top']){?>
						          	
                  <?php } ?>
              <?php } ?>
        </li> 
			      </ul>
      <div class="row"><div class="p_z_bar"><span class="p_z_total"><?php echo $viewpage?></div>
        </div>
  </div>
    </div>

<!--Content Over-->


 <?php include TPL_DIR . "/footer.php";?>
