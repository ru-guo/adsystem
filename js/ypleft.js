/*
+---------------------------------------------------------------------------+
| ZYIIS.COM                                                                 |
| ==========                                                                |
|                                                                           |
| Copyright (c) 2005-2008 Zyiis Limited                                     |
| For contact details, see: http://www.zyiis.com/                           |
|                                                                           |
+---------------------------------------------------------------------------+
*/
var $dom={
		ts      : 0,
		adUrl	: yP_statsUrl,
		adw 	: yP_width,
		adh 	: yP_height,
		Ie :(navigator.appName == "Microsoft Internet Explorer"),
		g : function(){
			var d = document.body;e=document.documentElement;
			if(document.compatMode=="BackCompat"){
				this.w=d.clientWidth;
				this.h=d.clientHeight;
				this.l=0;
				this.t=d.scrollTop;		
			}else {
				this.w=e.clientWidth;
				this.h=e.clientHeight;
				this.l=0;
				this.t=e.scrollTop==0?d.scrollTop:e.scrollTop;			
			};
		},
		c : function (){
			var yP_fileext=yP_imgurl.substr(yP_imgurl.lastIndexOf(".")).toLowerCase();
			var doc=document;	
			this.popup = doc.createElement("div");
			s = this.popup.style;
			s.overflow = "hidden";
			s.position = "absolute";
			s.zIndex = 1000000;
			s.width = this.adw+"px";
			s.height = this.adh+"px";
			s.border= 0;
			s.textAlign='left';
			if(yP_fileext!='.swf'){
				if(yP_planType=='cpv') {
					this.stra = "<a  target='_blank' href="+yP_tourl+" onclick='$dom.uc()'><img src='"+yP_imgurl+"' border='0' width='"+(this.adw)+"' height='"+(this.adh)+"'></a>";
				}else{
					this.stra = "<a  target='_blank' href="+this.adUrl+" onclick='_zh_(event)' onmouseover='_zv_();_zn_(event);_zt_(event)' onmousedown='_zc_(event)'  onmouseup='_zc_(event)'><img src='"+yP_imgurl+"' border='0' width='"+(this.adw)+"' height='"+(this.adh)+"'></a>";
				}
				yP_C_zy_str=this.stra;
			}else {
				if(yP_planType=='cpv') {
					this.stra = "<a  target='_blank' href="+yP_tourl+" onclick='$dom.uc()'>";
				}else{
					this.stra = "<a  target='_blank' href="+this.adUrl+" onclick='_zh_(event)' onmouseover='_zv_();_zn_(event);_zt_(event)' onmousedown='_zc_(event)'  onmouseup='_zc_(event)'>";
				}
				dL_flash = this.F("pf_123",yP_imgurl, this.adw, this.adh);
				yP_C_zy_str=this.stra+"<div style='cursor:pointer;z-index:100000;position:absolute;height:"+this.adh+"px;width:"+this.adw+"px;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);'></div></a><div style=' z-index:9999;cursor:pointer;text-align:center' >"+dL_flash+"</div>";
			}
			this.popup.innerHTML='<img src="'+yP_imgServer+'/images/close.gif" style="position:absolute;top:2px;right:2px;cursor:pointer;width;10px;height:10px;z-index:110000" onclick="$dom.hi()">'+yP_C_zy_str+'';
			s.display="none";
			if(this.Ie) {document.body.insertBefore(this.popup) ;} else {document.body.appendChild(this.popup);}
		},
		hi : function(){
			 clearInterval($dom.sI);
			 document.body.removeChild(this.popup);
		},
		s : function (){
			clearInterval($dom.zy);
			setTimeout(function(){$dom.r();},50);
		},
		r: function (){
			$dom.c();
			$dom.sI=setInterval(function(){$dom.m();},10);
		},
		m: function (){
			$dom.g();  
			this.popup.style.left="2px";
			this.popup.style.top=(this.h-this.ts+this.t-3)+"px";    
			this.popup.style.display="";
			if(this.ts<this.adh){
				this.ts+=7;
				if(this.ts>this.adh){
					this.ts=this.adh;
					if(this.ts-10>this.adh) clearInterval($dom.sI);
				};
				
			};
		},
		uc :function(){
			 a=new Image();	 
			 a.src=yp_doclick2url;
		},
		t: function (){
			if(window.attachEvent){
				window.attachEvent("onload",function (){$dom.s();			
			});		
			}else {
				window.addEventListener("load",function (){
				$dom.s();			
				},true);			
			}
			if(yP_planType=='cpv'){
				setTimeout(function(){$dom.Va();},1000);
			}
		},
		Va: function (){
			if(document.body){
				zY_a=new Image();	
				zY_a.src=yP_statsUrl;
			}
		},
		F : function(idad, swfurl, ws, hs)
		{
			 
			var str = '<embed src="'+swfurl+'" type="application/x-shockwave-flash" height="'+hs+'" width="'+ws+'" id="'+idad+'" name="ZyadsFlashAd" quality="high" wmode="transparent"  allowscriptaccess="always" >';
			return str;
		}
};	
$dom.t();
