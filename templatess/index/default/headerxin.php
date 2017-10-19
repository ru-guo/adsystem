<?php if(!defined('IN_ZYADS')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<link href="/templates/index/default/css/xin/style.css"  type="text/css" rel="stylesheet" media="all"/>
	<link href="/templates/index/default/css/xin/loginWrap.css"  type="text/css" rel="stylesheet"  media="all"/>
	<link rel="stylesheet" type="text/css" href="/templates/index/default/css/xin/bjqs.css" media="all" />
	<style type="text/css">
	body,td,th { font-family: "Microsoft YaHei", arial, Verdana, tahoma, sans-serif; }
    </style>
	<script type="text/javascript"  src="/templates/index/default/js/jquery.min.js"></script>
	<script type="text/javascript" src="/templates/index/default/xin/jquery-1.8.3.min.js" ></script>
	<script type="text/javascript" src="/templates/index/default/css/xin/bjqs-1.3.min.js"></script>
		<!--script type="text/javascript" src="templates/index/default/js/jquery-1.7.min.js"></script-->
	<script src="/templates/index/default/css/xin/function.js"  type="text/javascript"></script>
	<script type="text/javascript" src="/templates/index/default/css/xin/scrolltopcontrol.js"></script>
	<script type="text/javascript"> 
	$(document).ready(function () { 
	//登录展开收起效果
	$(".menberinfo").mouseover(
	  function () {
	  $(".login_wrap").slideDown("fast");
	  });
	  $("#close").click(
	  function () {
	  $(".login_wrap").slideUp("1000");
	  });
	}) 
	</script>
	
	<!--[if IE 6]>
	<script src="templates/index/default/js/DD_belatedPNG-min.js"  type="text/javascript"></script>
	<script src="templates/index/default/js/DD_belatedPNG.fix.js"  type="text/javascript"></script>
	<![endif]-->
	</head>
	<body>

<!--Header Begin-->

<div class="header-wrap">
      <div class="layout header-inner">
    <div class="header-inner-left"> <a class="logo" title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>" href="/" > <img src="/images/logo_head1.png"  width='200' height = '60' alt="<?php echo $GLOBALS['C_ZYIIS']['sitename'] ?>"  title="<?php echo $GLOBALS['C_ZYIIS']['sitename']?>"></a>
          <div class="nav">
        <ul>
              <li>
            <h2><a href="/"   class="on" >&nbsp;&nbsp;首页</a></h2>
          </li>
              <li>
            <h2><a href="?action=advertiser"  >广告商</a></h2>
          </li>
              <li>
            <h2><a href="?action=affiliate"  >网站主</a></h2>
          </li>
              <li>
            <h2><a href="?action=help"  >常见问题</a></h2>
          </li>
              <li>
            <h2><a href="?action=contact"  >联系客服</a></h2>
          </li>
    		<!--li >
     		<h2><a href="?action=integral" >积分兑换</a></h2>
      	</li-->
            </ul>
      </div>
        </div>
    <div class="header-inner-right">
          <div class="login">
        <div class="unlogined">   |   <a class="menberinfo" href="?action=login" >会员登录</a><span>  |  </span> <a href="?action=register" >注册加入</a>   |   </div>
        	
	<!----LoginWrap----->
        <div id="login_wrap" class="login_wrap" style="display:none;" >
    		  <form  method="post" action="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/i.php?action=postuserlogin" onSubmit="return doLogin()" style="margin-bottom: 0px;">
            <fieldset id="loginBox" class="loginBox">
                  <legend>登录系统</legend>
                  <div class="item">
                <label for="userName">用户名：</label>
                <input type="text" name="username" class="in_text" />
                <span class="error_icon"></span>
                <div id="usernameTip" class="onShow"></div>
              </div>
                  <div class="item">
                <label for="password">密码：</label>
                <input type="password" name="password" class="in_text" />
                <span class="error_icon"></span>
                <div id="passwordTip" class="onShow"></div>
              </div>
			  <!---验证码--->
    			  <div class="item" style="height:54px;">
                <label for="verifyWrapper" class="verifylab">验证码：</label>
                <div id="verifyWrapper" class="verifyWrapper">
                     <input name="checkcode" type="text" class="in_text verifyField" id="checkcode"  maxlength="4"/>
                     <img src="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/index.php?action=imgcode"  alt= "看不清?请点击刷新验证码" align="absmiddle" id="varImg"  style= "cursor:pointer;"  onclick="refurbish();"/>
    			</div>
    			                <div id="verifyWrapperTip" class="onShow"></div>
              </div>
			  <!---验证码--->
                  <div class="login_ft clearfix">
                <input type="submit" class="loginBtn" value="登陆">
                <a href="?action=register"  class="register">用户注册</a> <a class="find_pwd" href="?action=findpasswd" >忘记密码</a> </div>
                </fieldset>
          </form>
              <span id="close" class="login_up"></span></div>
         </div>
       <!--Login Over--> 
    </div>
  </div>
</div>
<!--Header Over-->

