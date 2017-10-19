// JavaScript Document
function ieLoadBugFix(scriptElement, callback){
	if(scriptElement.readyState == 'loaded' || scriptElement.readyState == 'completed'){
		callback();
	}else{
		setTimeout(function(){ieLoadBugFix(scriptElement, callback); }, 100);
	}
}

var index = {
	create : function(){
		this.index_login_form = $('#index_login_form');//登录表单
		
		this.ind_login_title = $('#ind_login_title');//登录框标题
		this.ind_register_a = $('#ind_register_a');//注册链接
		this.ind_had_login = $('#ind_had_login');//已经登录
	},
	indSbm:function(){
		var _this = this;
		$.post($('#base').attr('href') + 'user.php?action=loginSub', _this.index_login_form.serialize(), function(data){
			var _this = this;
			if(data == 'true'){
				window.location = $('#base').attr('href') + 'user/';
			}else{
				var error = decodeURI(data);
				alert(error);
			}
		});
		return false;
	},
	checkLogin:function(){
		var data = checIfkLogin();
		if(data.length == 0){
			this.ind_login_title.html('会员登录');
			this.ind_register_a.css('display', 'block');
			this.index_login_form.css('display', 'block');
			this.ind_had_login.css('display', 'none');
		}else{
			this.ind_login_title.html('会员信息');
			this.ind_register_a.css('display', 'none');
			this.index_login_form.css('display', 'none');
			this.ind_had_login.css('display', 'block');
			
			var dataArr = eval(data);
			$('#ind_username').html(dataArr[0].username);
			$('#ind_allmoney').html(dataArr[0].money_alltx);
			$('#ind_lessmoney').html(dataArr[0].money);
		}
	},
	loginOut:function(){
		var _this = this;
		$.get($('#base').attr('href') + 'user.php?action=jsloginout', '', function(){
			_this.checkLogin();
		});
	},
	resetPasswd : function(){
		window.location = $('#base').attr('href') + 'user/resetpasswd/?username=' + $("input[name='username']").val();
	}
};

/*
 *检查用户是否已经登录，没登录返回false，登录返回json用户数据
 */
function checIfkLogin(){
	var data;
	$.ajax({
		url : $('#base').attr('href') + 'user.php?action=checkLogin',
		data:'',
		cache : false, 
		async : false,
		type : "get",
		dataType : 'json',
		success : function (result){
			data = result;
		}
	});
	return data;
}

/*
 *qq在线状态获取
 */
var qqOnline = {
	init : function(){
		var _this = this;
		var url = 'http://webpresence.qq.com/getonline?Type=1&';
		_this.imgQQ = $("img[qq]");
		
		_this.imgQQ.each(function(){
			url += $(this).attr('qq') + ':';
        });
		online = new Array();
		var headID = document.getElementsByTagName('head')[0];
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = url;
		
		if(window.addEventListener){
			script.onload=function(){
				_this.showOnline();
			}
		}else{
			ieLoadBugFix(script, function(){_this.showOnline()});
		}
		headID.appendChild(script);
	},
	showOnline : function(){
		var _this = this;
		var index = 0;
		_this.imgQQ.each(function() {
			if(online[index] == 1){
				$(this).attr('src', '/templates/index/default/img/online.jpg');
			}else{
				$(this).attr('src', '/templates/index/default/img/offline.jpg');
			}
			index++;
        });
	}
};

////注册
var register = {
	resName:false,resPasswd:false,resRepasswd:false,resContact_name:false,resEmail:false,resMobile:false,resQq:false,
	init : function(){
		var _this = this;
		_this.inpGid = $("input[name='gid']");//gid隐藏域
		
		//会员组
		_this.gidas = $('#gidas a');
		_this.gidas.click(function(){_this.gidaClick(this)});
		
		//用户名
		_this.inpName = $("input[name='name']");
		_this.inpName.blur(function(){_this.nameBlur()});
		
		//密码
		_this.inpPasswd = $("input[name='passwd']");
		_this.inpPasswd.blur(function(){_this.passwdBlur()});
		
		//确认密码
		_this.inpuRepasswd = $("input[name='repasswd']");
		_this.inpuRepasswd.blur(function(){_this.repasswdBlur()});
		
		//联系人
		_this.inpContact_name = $("input[name='contact_name']");
		_this.inpContact_name.blur(function(){_this.contact_nameBlur()});
		
		//邮箱
		_this.inpEmail = $("input[name='email']");
		_this.inpEmail.blur(function(){_this.emailBlur()});
		
		//联系手机 
		_this.inpMobile = $("input[name='mobile']");
		_this.inpMobile.blur(function(){_this.mobileBlur()});
		
		//QQ
		_this.inpQq = $("input[name='qq']");
		_this.inpQq.blur(function(){_this.qqBlur()});
		
		//验证码
		_this.inpCode = $("input[name='code']");
		_this.inpCode.blur(function(){_this.codeBlur()});
		
		//协议
		_this.inpagree = $('#agree');
		_this.inpagree.change(function(){_this.agreeChange()});
		_this.inpsubmit = $("input[type='submit']");
	},
	codeBlur : function(){
		var _this = this;
		var value = _this.inpCode.val();
		var length = value.length;
		var i = document.getElementById('code_i');
		if(value == null || length == 0){
			i.className = 'no';
			i.innerHTML = '验证码不能为空';
			return false;
		}
		if(length != 4){
			i.className = 'no';
			i.innerHTML = '请输入4位数验证码';
			return false;
		}
		i.className = 'ok';
		i.innerHTML = '';
		return true;
	},
	gidaClick : function(obj){
		var _this = this;
		var clickaThis = $(obj).attr('gid');
		_this.gidas.each(function() {
			$(this).removeClass('curr');
			var curGid = $(this).attr('gid');
			if(clickaThis == curGid){
				$(this).addClass('curr');
				_this.inpGid.val($(this).attr('gid'));
				if(curGid == 2)
					document.getElementById('gid_i').innerHTML = '已选择广告主';
				else
					document.getElementById('gid_i').innerHTML = '已选择网站主';
			}
		});
	},
	nameBlur : function(){
		var _this = this;
		var i = document.getElementById('name_i');
		$.post('user.php?action=ajax', {name:_this.inpName.val(), gid:_this.inpGid.val()}, function(d){
			if(d == 'true'){
				i.className = 'ok';
				i.innerHTML = '此用户名可以注册';
				_this.resName = true;
				return true;
			}else if(d == 'duplicate'){
				i.className = 'no';
				i.innerHTML = '此用户名已经被注册';
				_this.resName = false;
				return false;
			}else{
				i.className = 'no';
				var error = decodeURI(d);
				i.innerHTML = error;
				_this.resName = false;
				return false;
			}
		});
	},
	passwdBlur : function(){
		var _this = this;
		var value = _this.inpPasswd.val();
		var length = value.length;
		var i = document.getElementById('passwd_i');
		if(value == null || length == 0){
			i.innerHTML = '密码不能为空';
			i.className = 'no';
			_this.resPasswd = false;
		}else if(length < 6 || length > 20){
			i.innerHTML = '请使用4-12个英文字母、符号或数字。';
			i.className = 'no';
			_this.resPasswd = false;
		}else{
			i.innerHTML = '正确';
			i.className = 'ok';
			_this.resPasswd = true;
		}
	},
	repasswdBlur : function(){
		var _this = this;
		var value = _this.inpuRepasswd.val();
		var i = document.getElementById('repasswd_i');
		if(value == null || value.length == 0){
			_this.resRepasswd = false;
			i.className = 'no';
			i.innerHTML = '确认密码不能为空';
		}else if(value != _this.inpPasswd.val()){
			_this.resRepasswd = false;
			i.className = 'no';
			i.innerHTML = '确认密码和密码不一致';
		}else{
			_this.resRepasswd = true;
			i.className = 'ok';
			i.innerHTML = '正确';
		}
	},
	contact_nameBlur : function(){
		var _this = this;
		var value = _this.inpContact_name.val();
		var length = value.length;
		var i = document.getElementById('contact_name_i');
		if(value == null || length == 0){
			_this.resContact_name = false;
			i.className = 'no';
			i.innerHTML = '联系人不能为空';
		}else if(length < 2){
			_this.resContact_name = false;
			i.className = 'no';
			i.innerHTML = '联系人不能少于2个字';
		}else if(length > 30){
			_this.resContact_name = false;
			i.className = 'no';
			i.innerHTML = '联系人不能多于30个字';
		}else{
			_this.resContact_name = true;
			i.className = 'ok';
			i.innerHTML = '正确';
		}
	},
	emailBlur : function(){
		var _this = this;
		var value = _this.inpEmail.val();
		var length = value.length;
		var i = document.getElementById('email_i');
		var emvailReg = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+.[a-z]{2,4}$/;
		if(value == null || length == 0){
			_this.resEmail = false;
			i.className = 'no';
			i.innerHTML = '邮箱不能为空';
		}else if(!emvailReg.test(value)){
			_this.resEmail = false;
			i.className = 'no';
			i.innerHTML = '邮箱格式不正确';
		}else if(length > 50){
			_this.resEmail = false;
			i.className = 'no';
			i.innerHTML = '邮箱不能多余50个字';
		}else{
			_this.resEmail = true;
			i.className = 'ok';
			i.innerHTML = '正确';
		}	
	},
	mobileBlur : function(){
		var _this = this;
		var value = _this.inpMobile.val();
		var length = value.length;
		var i = document.getElementById('mobile_i');
		if(length > 0){
			var reg = /^[0-9]+$/;
			if(!reg.test(value)){
				_this.resMobile = false;
				i.className = 'no';
				i.innerHTML = '联系手机只能是数字';
				return;
			}else if(length < 11 || length > 15){
				_this.resMobile = false;
				i.className = 'no';
				i.innerHTML = '联系手机长度不正确';
				return;
			}
		}
		_this.resMobile = true;
		i.className = 'ok';
		i.innerHTML = '正确';
	},
	qqBlur : function(){
		var _this = this;
		var value = _this.inpQq.val();
		var length = value.length;
		var i = document.getElementById('qq_i');
		if(length > 0){
			var reg = /^[0-9]+$/;
			if(!reg.test(value)){
				_this.resQq = false;
				i.className = 'no';
				i.innerHTML = 'QQ只能是数字';
				return;
			}else if(length > 20){
				_this.resQq = false;
				i.className = 'no';
				i.innerHTML = 'QQ长度不能多于20';
				return;
			}
		}
		_this.resQq = true;
		i.className = 'ok';
		i.innerHTML = '正确';
	},
	agreeChange : function(){
		var _this = this;
		if(_this.inpagree.attr('checked') == 'checked'){
			_this.inpsubmit.addClass('reg_color');
			_this.inpsubmit.removeAttr('disabled');
		}else{
			_this.inpsubmit.removeClass('reg_color');
			_this.inpsubmit.attr('disabled', 'disabled');
		}
	},
	subForm : function(){
		var _this = this;
		
		//检查协议
		if(!document.getElementById('agree').checked){
			alert('必须阅读并同意协议才可以注册');
			return false;
		}
		_this.nameBlur();
		_this.passwdBlur();
		_this.repasswdBlur();
		_this.contact_nameBlur();
		_this.emailBlur();
		_this.mobileBlur();
		_this.qqBlur();
		
		if(_this.codeBlur() && _this.resName && _this.resPasswd && _this.resRepasswd && _this.resContact_name && _this.resEmail && _this.resMobile && _this.resQq){
			$.post('user.php?action=subRegister', $('#reg_form').serialize(), function(d){
				if(d == 'true'){
					window.location.href = $('#base').attr('href') + 'user/login/?gid=3';
				}else{
					var error = decodeURI(d);
					alert(error);
				}
			});
		}else{
			alert('您的注册信息有误！');
		}
		return false;
	}
};

//重置密码
var resetPasswd = {
	init : function(){
		var _this = this;
		
		_this.inpusername = $("input[name='username']");
		_this.inpusername.blur(function(){_this.usernameBlur()});
		
		_this.inpemail_code = $("input[name='email_code']");
		_this.inpemail_code.blur(function(){_this.emailBlur()});
		
		$('#email_button').click(function(){_this.sendEmail()});
	},
	usernameBlur : function(){
		var _this = this;
		var i = document.getElementById('username_i');
		if(_this.inpusername.val().length == 0){
			i.className = 'no';
			i.innerHTML = '请输入用户名';
			return false;
		}
		i.className = 'ok';
		i.innerHTML = '正确';
		return true;
	},
	emailBlur : function(){
		var _this = this;
		var i = document.getElementById('email_code_i');
		if(_this.inpemail_code.val().length != 15){
			i.className = 'no';
			i.innerHTML = '邮箱验证码为15位大小写字母数字组合';
			return false;
		}
		i.className = 'ok';
		i.innerHTML = '正确';
		return true;
	},
	sendEmail : function(){
		var _this = this;
		$.get($('#base').attr('href') + 'user.php?action=resetpasswd_email', {'username':_this.inpusername.val()}, function(data){
			if(data == 'true'){
				alert('邮箱验证码发送成功，请在30分钟内完成验证！');
			}else{
				var error = decodeURI(data);
				alert(error);
			}
		});
	},
	onsubmit : function(){
		var _this = this;
		if(_this.usernameBlur() && _this.emailBlur()){
			$.post($('#base').attr('href') + 'user.php?action=resetpasswd&sub=true', {'username':_this.inpusername.val(), 'email_code':_this.inpemail_code.val()}, function(data){
				if(data.indexOf('true') == 0){
					var dataArr = data.split('-');
					window.location = $('#base').attr('href') + 'user.php?action=reset_success&passwd=' + dataArr[1];
				}else{
					var error = decodeURI(data);
					alert(error);
				}
			});
		}
		return false;
	}
};