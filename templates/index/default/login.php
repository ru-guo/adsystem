<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/headerxin.php";?>
<title>��Ա��¼_<?php echo $v["tit"] ?> <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<link rel="stylesheet" href="/templates/index/default/css/xin/css.css" >
<script src="/templates/index/default/css/xin/jquery-1.7.min.js"  type="text/javascript"></script>
<link href="/templates/index/default/css/drag.css" rel="stylesheet" type="text/css">
<script src="/templates/index/default/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/templates/index/default/js/drag.js" type="text/javascript"></script>
<div class="main" style="padding-top:30px">
  <form  method="post" action="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/i.php?action=postuserlogin" onSubmit="return doLogin()" style="margin-bottom: 0px;">
    <div class="left_list">
<div class="intro_box"> 
��ӭ����
</div>
      <div class="title_box">
        <div class="step item3">
          <ul>
            <li class="on" id="verifiy_username"><span>����</span></li>
          </ul>
        </div>
      </div>
      <ul class="form_list" id="ul_username" style="">
        <li style="position:relative;">
          <label><em class="red">*</em> �û�����</label>
          <input type="text" class="input_text" name="username" id="username" placeholder="�������û���" maxlength="20">
          <div class="tip" id="txt_username_tip"></div>
        </li>
        <li style="position:relative;">
          <label><em class="red">*</em> ���룺</label>
          <input type="password" class="input_text" name="password" id="password" placeholder="����������" maxlength="20">
          <div class="tip" id="txt_password_tip"></div>
        </li>
        <li>   
<center><div id="drag"></div></center>

<script type="text/javascript">
$('#drag').drag();
</script></li>
                <li>
          <label></label>
          <input type="submit" value="����" class="btn_css" id="btn_username">
        </li>
        <li class="noMar gray9">
          <label></label>
          <a href="?action=register"  class="blue">ע���Ա</a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <a href="?action=findpasswd"  class="blue">�������룿</a></li>
      </ul>
    </div>
    <div class="right_login">
      <ul class="right_list">
        <li>û���ʺţ�����ע��</li>
        <li class="btn_box">
          <input type="button" value="ע ��" class="btn_css" onclick="window.open('?action=register')">
        </li>
        <li>��ӭ����<?php echo $GLOBALS['C_ZYIIS']['sitename']?></li>
        	<!--������΢��ɨһɨǶ�����-->
          <img src="templates/index/default/images/cpa.gif"  alt="PC���Զ˹��CPA"> </div>
			<!--������΢��ɨһɨǶ�����-->
		               </ul>
    </div> 
  </form>
  <div class="clear"></div>
</div>

<script>
 function doLogin () {
	 var username = $.trim($("#username").val());
     if (username == "") {
        $("#txt_username_tip").html('�û�������Ϊ��').show();	
        return false;
     }
	 $("#txt_username_tip").hide();	
	 var password = $.trim($("#password").val());
     if (password == "") {
        $("#txt_password_tip").html('���벻��Ϊ��').show();	
        return false;
     }
	 $("#txt_password_tip").hide();	
	 	var username = $.trim($("#username").val());
     if (username == "") {
        $("#txt_username_tip").html('�û�������Ϊ��').show();  
        return false;
     }
   $(".drag_text").hide();
 	 
} 
</script> 

<?php include TPL_DIR . "/footer.php";?>