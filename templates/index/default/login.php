<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/headerxin1.php";?>
<title>会员登录_<?php echo $v["tit"] ?> <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<link rel="stylesheet" href="/templates/index/default/css/xin/css.css" >
<script src="/templates/index/default/css/xin/jquery-1.7.min.js"  type="text/javascript"></script>
<link href="/templates/index/default/css/drag.css" rel="stylesheet" type="text/css">
<script src="/templates/index/default/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/templates/index/default/js/drag.js" type="text/javascript"></script>
<div class="main" style="padding-top:30px">
  <form  method="post" action="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/i.php?action=postuserlogin" onSubmit="return doLogin()" style="margin-bottom: 0px;">
    <div class="left_list">
<div class="intro_box"> 
欢迎光临
</div>
      <div class="title_box">
        <div class="step item3">
          <ul>
            <li class="on" id="verifiy_username"><span>登入</span></li>
          </ul>
        </div>
      </div>
      <ul class="form_list" id="ul_username" style="">
        <li style="position:relative;">
          <label><em class="red">*</em> 用户名：</label>
          <input type="text" class="input_text" name="username" id="username" placeholder="请输入用户名" maxlength="20">
          <div class="tip" id="txt_username_tip"></div>
        </li>
        <li style="position:relative;">
          <label><em class="red">*</em> 密码：</label>
          <input type="password" class="input_text" name="password" id="password" placeholder="请输入密码" maxlength="20">
          <div class="tip" id="txt_password_tip"></div>
        </li>
        <li>   
<center><div id="drag"></div></center>

<script type="text/javascript">
$('#drag').drag();
</script></li>
                <li>
          <label></label>
          <input type="submit" value="登入" class="btn_css" id="btn_username">
        </li>
        <li class="noMar gray9">
          <label></label>
          <a href="?action=register"  class="blue">注册会员</a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <a href="?action=findpasswd"  class="blue">忘记密码？</a></li>
      </ul>
    </div>
    <div class="right_login">
      <ul class="right_list">
        <li>没有帐号？马上注册</li>
        <li class="btn_box">
          <input type="button" value="注 册" class="btn_css" onclick="window.open('?action=register')">
        </li>
        <li>欢迎加入<?php echo $GLOBALS['C_ZYIIS']['sitename']?></li>
        	<!--以下是微信扫一扫嵌入代码-->
          <img src="templates/index/default/images/cpa.gif"  alt="PC电脑端广告CPA"> </div>
			<!--以下是微信扫一扫嵌入代码-->
		               </ul>
    </div> 
  </form>
  <div class="clear"></div>
</div>

<script>
 function doLogin () {
	 var username = $.trim($("#username").val());
     if (username == "") {
        $("#txt_username_tip").html('用户名不能为空').show();	
        return false;
     }
	 $("#txt_username_tip").hide();	
	 var password = $.trim($("#password").val());
     if (password == "") {
        $("#txt_password_tip").html('密码不能为空').show();	
        return false;
     }
	 $("#txt_password_tip").hide();	
	 	var username = $.trim($("#username").val());
     if (username == "") {
        $("#txt_username_tip").html('用户名不能为空').show();  
        return false;
     }
   $(".drag_text").hide();
 	 
} 
</script> 

<?php include TPL_DIR . "/footer.php";?>