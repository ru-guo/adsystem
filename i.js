d_Urll = "http://127.0.0.1";
if(window.u_a_type=="1"){
	var a_Url = d_Urll+"/page/?s="+window.u_a_zones;
}else{
	var a_Url = d_Urll+ "/page/s.php?s="+window.u_a_zones+"&w="+window.u_a_width+"&h="+window.u_a_height;
}
document.write('<script language="JavaScript1.1" src='+a_Url+" charset=gbk><\/script>");
