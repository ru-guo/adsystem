<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/headerxin.php";?>
<title><?php echo $v["tit"] ?><?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
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
    <h1 class="tit_info_h2"><strong><?php echo $v["tit"] ?></h1>
    
    <!--show-->
    
    <div class="textShow">
	<p><font size="1px">发布时间：<?php echo $v["time"] ?></font></p><br />

          <?php echo nl2br($v["conn"]);?>    </div>
    
    <!--show--> 
    <span style="float:left;">
   上一篇：<a href="<?php echo url("?action=".$_GET['action']."&id=".$up['id'])?>"><?php echo $up['tit']?></a>
    </span>
    <span style="float:right;">
    下一篇：<a href="<?php echo  url("?action=".$_GET['action']."&id=".$np['id'])?>"><?php echo $np['tit']?></a>
    </span>
  </div>
    </div>

<!--Content Over-->

<?php include TPL_DIR . "/footer.php";?>