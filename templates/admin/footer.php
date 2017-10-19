<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

echo " <table width=\"100%\" border=\"00\" cellspacing=\"0\" cellpadding=\"0\" id=\"footer\">\r\n  <tr>\r\n    <td height=\"80\"><table width=\"95%\" border=\"00\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td><font color=\"#666666\">Powered by heiniubao";

echo " &copy;2016-2017 <a href=\"http://www.heiniubao.com\" target=\"_blank\">heiniubao.com</a> Inc.\r\n</font>  </td>\r\n      </tr>\r\n    </table></td>\r\n  </tr>\r\n</table>\r\n\r\n\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\n\$(document).ready(function() {\r\n\ttry{\r\n\t\tif(typeof(eval(doRemoveWin))==\"function\"){}\r\n\t}catch(e){\r\n\t\tdoRemoveWin  = function (){tb_remove();};\r\n\t} \r\n\t\$(\"#fast-tools\").click(function(){ \r\n\t\t\tif(\$(\"#tools-content\").css(\"display\")==\"none\"){\r\n\t\t\t\t\$(\"#fast-tools\").addClass('fast-tools-show');\r\n\t\t\t\t \$(\"#tools-content\").show(\"\");\r\n\t\t\t}\r\n\t\t\telse {\r\n\t\t\t\t\$(\"#fast-tools\").removeClass('fast-tools-show');\r\n\t\t\t\t \$(\"#tools-content\").hide(\"\");\r\n\t\t\t}\r\n\t});\r\n\t\$(\":submit,#menu-div a,.tabs a\").click(function(){ \r\n\t\taddLoading() ;\r\n\t});       \r\n\t\r\n});\r\nfunction horus(){ \r\n\t\t\t\$.get(\"do.php?action=index&horusum=y\",null,function callback(data){\$(\"#horusum\").html(data);});\r\n\t\t\tt=setTimeout(\"horus()\",8000)\r\n}\r\nhorus();\r\n</script>\r\n";
?>