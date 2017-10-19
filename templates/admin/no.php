<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

echo " ";
if ( !defined( "IN_ZYADS" ) )
{
		exit( );
}
include( TPL_DIR."/header.php" );
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n      <tr>\r\n        <td height=\"460\" valign=\"top\"  ><table width=\"80%\" height=\"120\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color:#F0F3F5;border:1px solid #9DB0BC; padding:20px; margin-top:120px\">\r\n            <tr>\r\n              <td align=\"center\" style=\"font-size:14px;font-weight:bold;\"><img  src='/templates/";
echo Z_TPL;
echo "/images/error.gif' align='absmiddle' /><span style=\"padding-left:30px\">没有此操作权限！</span></td>\r\n              </tr>\r\n          </table></td>\r\n      </tr>\r\n    </table></td>\r\n  </tr>\r\n</table>\r\n <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"footer\">\r\n  <tr>\r\n    <td height=\"80\"><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td><font color=\"#666666\"> Powered by Zyiis v";
echo ZYIIS_VERSION;
echo " &copy;2005-2010 <a href=\"http://www.zyiis.com\" target=\"_blank\">Zyiis.com</a> Inc.\r\n</font>  </td>\r\n      </tr>\r\n    </table></td>\r\n  </tr>\r\n</table>\r\n\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\n\$(document).ready(function() {\r\n\ttry{\r\n\t\tif(typeof(eval(doRemoveWin))==\"function\"){}\r\n\t}catch(e){\r\n\t\tdoRemoveWin  = function (){tb_remove();};\r\n\t} \r\n\t\$(\"#fast-tools\").click(function(){ \r\n\t\t\tif(\$(\"#tools-content\").css(\"display\")==\"none\"){\r\n\t\t\t\t\$(\"#fast-tools\").addClass('fast-tools-show');\r\n\t\t\t\t \$(\"#tools-content\").show(\"\");\r\n\t\t\t}\r\n\t\t\telse {\r\n\t\t\t\t\$(\"#fast-tools\").removeClass('fast-tools-show');\r\n\t\t\t\t \$(\"#tools-content\").hide(\"\");\r\n\t\t\t}\r\n\t});\r\n\t\$(\":submit,#menu-div a,.tabs a\").click(function(){ \r\n\t\taddLoading() ;\r\n\t});       \r\n\t\r\n});\r\nfunction horus(){ \r\n\t\t\t\$.get(\"do.php?action=index&horusum=y\",null,function callback(data){\$(\"#horusum\").html(data);});\r\n\t\t\tt=setTimeout(\"horus()\",8000)\r\n}\r\nhorus();\r\n</script>\r\n";
?>
