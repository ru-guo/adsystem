<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/headerxin.php";?>
<title>常见问题_<?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<title><?php echo $v["tit"] ?><?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<div class="layout">
  <h1 class="tit_h1"></h1>
  <div class="slides">
    <div class="bjqs-wrapper">
      <ul class="bjqs">
        <li class="bjqs-slide"><img src="templates/index/default/images/help1.jpg"  style="height: 280px; width: 1200px;"></li>
        <li class="bjqs-slide"><img src="templates/index/default/images/help2.jpg"  style="height: 280px; width: 1200px;"></li>
        <li class="bjqs-slide"><img src="templates/index/default/images/help3.jpg"  style="height: 280px; width: 1200px;"></li>
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
      <h3 class="tit-left"><img src="templates/index/default/images/help.jpg" ></h3>
      <ul>
        <li ><a href="?action=contact" >联系我们  ></a></li>
        <li  class="infoLiCurrent"><a href="?action=help" >常见问题  ></a></li>
        <li ><a href="?action=newslist" >公告/新闻 ></a></li>
      </ul>
    </div>
  </div>
  <div class="infoRight">
    <h1 class="tit_info_h2">帮助中心</h1>
    
    <!--News1-->
    
    <div class="newsList block">
      <h3 class="tit_info_h3">站长问题</h3>
      <ul >
            <?php foreach((array)$aff as $a){?>
            <li><a   href="<?php echo url("?action=help&id=".$a['id'])?>"> <?php echo $a['tit'];?></a> </li>
          <?php } ?>
        </ul></td>
        <td valign="top"><ul >
            <?php foreach((array)$adv as $a){?>
            <li><a   href="<?php echo url("?action=help&id=".$a['id'])?>"> <?php echo $a['tit'];?></a> </li>
          <?php } ?>
        </ul>
    </div>
    
    <!--News2-->
    
    <div class="newsList block" style="padding-top:12px;">
      <h3 class="tit_info_h3">商家帮助</h3>
     <ul >
            <?php foreach((array)$adv as $a){?>
            <li><a   href="<?php echo url("?action=help&id=".$a['id'])?>"> <?php echo $a['tit'];?></a> </li>
          <?php } ?>
        </ul>
    </div>
  </div>
</div>

<!--Content Over-->

<?php include TPL_DIR . "/footer.php";?>
