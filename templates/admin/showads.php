<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "IN_ZYADS" ) )
{
		exit( );
}
echo "<title>Ԥ��</title>\r\n<h4>Ԥ��</h4>\r\n<div>ע����ҳ���е����չʾ��������¼�ڱ�����</div>\r\n";
if ( 10 < strlen( $a['url'] ) )
{
		echo "<div style=\"margin-top:10px\">�����ַ��<a href=\"javascript:;\" onclick=\"window.open('";
		echo $a['url'];
		echo "');\">";
		echo $a['url'];
		echo "</a></div>\r\n";
}
echo "<div style=\"margin-top:10px; border-top:#CCCCCC  solid 1px; padding:10px\">\r\n";
if ( 1 < $a['width'] )
{
		echo "<iframe  width=\"";
		echo $a['width'] + 30;
		echo "\" height=\"";
		echo $a['height'] + 30;
		echo "\" frameborder=\"0\" src=\"do.php?action=showads&adsid=";
		echo $a['adsid'];
		echo "&actiontype=view\" marginwidth=\"0\" marginheight=\"0\" vspace=\"0\" hspace=\"0\"   scrolling=\"0\"></iframe>\r\n";
}
echo "</div>\r\n ";
?>
