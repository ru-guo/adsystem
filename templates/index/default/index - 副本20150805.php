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
  	<h3>���˹���:</h3>
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

				   <a href="<?php echo url("?action=news&id=".$n['id']."")?>" title="<?php echo $n['tit']?>" class="adot"><font color="<?php echo $n['color']?>" >
                  <?php if($n['top'])echo "[�ö�]";echo str(h($n['tit']),70);?>
                  </font></a>
                          <?php if(!$n['top']){?>
						          	<span><font color="<?php if($emtime<$mtime) echo 'red'?>"><?php echo date("m-d",strtotime($n['time']));?></font></span>
                  <?php } ?>
              <?php } ?>
        </li>
          
                 
              
              </ul>
  </div>
  <!--/news-->

  <div class="user" style="height:350px;">
	<div class="title">
    	<h3 id="ind_login_title">��Ա��¼</h3>
        <span id="ind_register_a"><a href="?action=register">ע�����û�</a></span>
    </div>
	    <form  method="post" action="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/i.php?action=postuserlogin" onSubmit="return doLogin()" style="margin-bottom: 0px;">
        <ul>
            <li>�û���<input type="text" name="username" class="ipt" /></li>
            <li>���룺<input type="password" name="password" class="ipt" /></li>
            <li style="padding-bottom:5px; height:25px; line-height:25px;display:none;">
            	<font style="color:#ffffff">��Ա��</font>
            	<label>
                	<input name="gid" type="radio" value="3" checked="checked" />��վ��
                </label>
                <label>
                	<input name="gid" type="radio" value="2" />�����
                </label>
            </li>
            <li class="btn">
            	<input type="submit" value="��  ¼" name="submit" />
                <span><a href="?action=findpasswd">��������?</a></span>
            </li>
        </ul>
    </form>
     	<img src="/templates/index/default/img/Qaaaa.jpg" style="margin-top:-10px;">
  </div>
  <div class="cr"></div>
  <div class="product">
  	<ul>
    <li><a href="javascript:;"><img src="/images/m1.png" /><b>PC���Զ˹��CPA</b>
      <span>�������Чע�����Ʒ�<br />�ܸ��õ�ʵ�ֹ��Ķ��򴫲���<br />�����߲�Ʒ����Чע���� <br />Ϊ����̴�ȥ�����ʵĻر���</span></a>
    </li>
    <li><a href="javascript:;"><img src="/images/m2.png" /><b>��׿�ֻ����APP</b>
      <span>��APP�����Ч��װ�Ʒ�<br />�ֻ�Ӧ�ò�Ʒ�ḻ�����۸ߣ�<br />�ṩURLֱ���ƹ��ǿ���ͳ�ƹ���<br />�������Ƽ�Ͷ�ţ�</span></a>
    </li>
    <li><a href="javascript:;"><img src="/images/m3.png" /><b>��׿��ת�����CPM</b>
      <span>�������Ч��ת�����Ʒ�<br />������棬��ʽ���ۣ���ת�ʸߣ�<br />�ṩ������ʽ��ǿ����û�����<br />�ڲ�Ӱ��ԭվ��ͬʱ�������룡</span></a>
    </li>
    <li class="fast"><a href="javascript:;"><img src="/images/m4.png" /><b>IOS��ת���CPM</b>
      <span>�������Ч��ת�����Ʒ�<br />������棬��ʽ���ۣ���ת�ʸߣ�<br />�ṩ������ʽ��ǿ���ͳ�ƹ���<br />����ϸߣ��Ƽ�Ͷ�ţ�</span></a>
    </li>
    
    </ul>
  </div>

  <div class="adv">
    <h3>����ý��</h3>
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
	<span>�������ӣ�</span>
  <a target="_blank"href="/">������� </a>
  <a target="_blank"href="/">A5վ���� </a>
  <a target="_blank"href="/">CPA������� </a>
  <a target="_blank"href="/">�ո�������� </a>
  <a herf="/">��վ��</a>
  <a herf="/">վ��֮��</a>
  <a herf="/">��������̳</a>
  <a herf="/">������</a>
  <a herf="/">��������</a>
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