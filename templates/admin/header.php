<?php

require '../s.php';
;
echo '';
if (!defined("IN_ZYADS")) {
    exit();
}
if (!$no) {
    $adm = Z::getsingleton("Controller_Admin");
    if (!is_array($adm->abcdef)) {
        exit("<b>Warning</b>:  ;");
    }
}
$action = $_GET['action'];
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\r\n<html>\r\n<head>\r\n<script src=\"/javascript/jquery/jquery.js\" type=\"text/javascript\"></script>\r\n<script src=\"/javascript/function.js\" language='JavaScript'></script>\r\n<script language=\"JavaScript\" type=\"text/javascript\" src=\"/javascript/jquery/thickbox.js\"></script>\r\n<link href=\"/javascript/jquery/css/thickbox.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<link href=\"/templates/";
echo Z_TPL;
echo "/images/style.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<title>���˹����̨</title>\r\n</head>\r\n<body>\r\n<div id=\"header-div\">\r\n  <div id=\"logo-div\"> <a href=\"do.php\"><img src=\"/templates/";
echo Z_TPL;
echo "/images/admin_logo.jpg\" border=\"0\"></a> </div>\r\n  <div id=\"menu-div\">\r\n    <ul>\r\n      <li  id=\"menu-active\"><a href=\"do.php?action=setting\" ";
if ($action == "setting") {
    echo " class=\"action\"";
}
echo "> <img src=\"/templates/";
echo Z_TPL;
echo "/images/icon-settings.jpg\" border=\"0\"> <span class=\"text\">��������</span></a></li>\r\n      <li><a href=\"do.php?action=advertiser\"  ";
if (in_array($action, array(
    "affiliate",
    "advertiser",
    "affiliate",
    "service",
    "commercial"
))) {
    echo " class=\"action\"";
}
echo "> <img src=\"/templates/";
echo Z_TPL;
echo "/images/icon-users.jpg\" border=\"0\"> <span class=\"text\">��Ա����</span></a></li>\r\n      <li><a href=\"do.php?action=plan\"  ";
if (in_array($action, array(
    "plan",
    "createplan",
    "editplan",
    "cpcplan",
    "cpmplan",
    "cpaplan",
    "cpsplan",
    "cpvplan",
    "planaudit"
))) {
    echo " class=\"action\"";
}
echo "> <img src=\"/templates/";
echo Z_TPL;
echo "/images/icon-plan.jpg\" border=\"0\"> <span class=\"text\">�ƻ�����</span></a></li>\r\n      <li><a href=\"do.php?action=ads\"  ";
if (in_array($action, array(
    "ads",
    "createads",
    "editads",
    "adstype",
    "upadslog"
))) {
    echo " class=\"action\"";
}
echo "> <img src=\"/templates/";
echo Z_TPL;
echo "/images/icon-ads.jpg\" border=\"0\"> <span class=\"text\">������</span></a></li>\r\n      <li><a href=\"do.php?action=stats&timerange=";
echo DAYS . "/" . DAYS;
echo "\"  ";
if (in_array($action, array(
    "stats",
    "statsads",
    "statsuser",
    "statszone",
    "adsip",
    "trend",
    "import"
))) {
    echo " class=\"action\"";
}
echo "> <img src=\"/templates/";
echo Z_TPL;
echo "/images/icon-stats.jpg\" border=\"0\"><span class=\"text\"> ���ݱ���</span></a></li>\r\n      <li style='display: none;'><a href=\"do.php?action=site\" ";
if (in_array($action, array(
    "site",
    "zone"
))) {
    echo " class=\"action\"";
}
echo "> <img src=\"/templates/";
echo Z_TPL;
echo "/images/icon-index.jpg\" border=\"0\"> <span class=\"text\">��վ����</span></a></li>\r\n      <li><a href=\"do.php?action=pm\" ";
if (in_array($action, array(
    "pm",
    "news",
    "administrator",
    "sitetype",
    "help",
    "loginlog",
    "adminlog",
    "db"
))) {
    echo " class=\"action\"";
}
echo "> <img src=\"/templates/";
echo Z_TPL;
echo "/images/icon-others.jpg\" border=\"0\"> <span class=\"text\">��������</span></a></li>\r\n    </ul>\r\n  </div>\r\n</div>\r\n<div id=\"menu-end-div\">\r\n  <div id=\"menu-end-info\">Hello <strong>";
echo $_SESSION['adminusername'];
echo "</strong> \r\n    30���ӽ���: <span id='horusum'>ͳ����...</span> ��  �ϴε�¼: ";
echo $_SESSION['l_ip'];
echo convertip($_SESSION['l_ip']);
echo " | <a  href=\"do.php?action=index\"><font color=\"#FFFFFF\">��̨��ҳ</font></a> | <a href=\"/\" target=\"_blank\"><font color=\"#FFFFFF\">������ҳ</font></a> | <!--a  href=\"index2.php\"><font color=\"#FFFFFF\">ͳ�Ʊ���</font></a--><a class=\"s0\" href=\"/index.php?action=logout\"><font color=\"#FFFFFF\">�˳�</font></a></div>\r\n  <div id=\"fast-tools\" onselectstart =\"return false\" > <span >����ͨ��</span> </div>\r\n  <div id=\"fast-pay\" style='display: none'> <a href=\"do.php?action=pay\" style=\"color:#FFFFFF\"><span>�������</span></a> </div>\r\n  <div id=\"tools-content\">\r\n    <ul>\r\n      <li><a href=\"do.php?action=news&actiontype=add&TB_iframe=true&height=250&width=600\"  title=\"��������\" class=\"thickbox\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/news.jpg\" border=\"0\"><span>�����µĹ���<span></a></li>\r\n      <li><a href=\"/integral/do.php?action=adsip&timerange=";
echo DAYS;
echo "\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/ip.jpg\" border=\"0\"><span>IP���ݱ���<span></a></li>\r\n      <li><a href=\"do.php?action=scancheat\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/zb.jpg\" border=\"0\"><span>ɨ������<span></a></li>\r\n\t  <li><a href=\"do.php?action=makehtml&TB_iframe=true&height=200&width=520\"  title=\"����Html\" class=\"thickbox\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/html.jpg\" border=\"0\"><span>����Html<span></a></li>\r\n      <li><a href=\"do.php?action=planaudit\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/plan.jpg\" border=\"0\"><span>����ƻ����<span></a></li>\r\n      <li><a href=\"do.php?action=affiliate\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/users1.jpg\" border=\"0\"><span>��վ������<span></a></li>\r\n      <li><a href=\"do.php?action=advertiser\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/users.jpg\" border=\"0\"><span>����̹���<span></a></li>\r\n      <li><a href=\"do.php?action=pm\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/pm.jpg\" border=\"0\"><span>����Ϣ����<span></a></li>\r\n      <li><a href=\"do.php?action=onlinepay\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/onlpay.jpg\" border=\"0\"><span>����֧������<span></a></li>\r\n\t   <li><a href=\"do.php?action=email\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/email.jpg\" border=\"0\"><span>�����ʼ�<span></a></li>\r\n      <li><a href=\"do.php?action=administrator\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/admin.jpg\" border=\"0\"><span>����Ա����<span></a></li>\r\n    </ul>\r\n  </div>\r\n</div>\r\n";
if (in_array($_GET['action'], array(
    "setting"
))) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"";
    if ($actiontype == "") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting\"><span>��������</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "server") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=server\"><span>����������</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "reg") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=reg\"><span> ע���û�����</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "clearing") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=clearing\"><span>�����������</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "deduction") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=deduction\"><span>Ĭ�Ͽ�������</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "smtp") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=smtp\"><span>�ʼ�����</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "onlinepay") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=onlinepay\"><span>����֧��</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "other") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=integral\"><span>��������</span></a> </li>\r\n\t\t\t\t\t  \r\n\t\t\t\t\t  \r\n                    <li class=\"";
    if ($actiontype == "other") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=other\"><span>��������</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
if (in_array($_GET['action'], array(
    "affiliate",
    "advertiser",
    "service",
    "commercial",
    "createuser"
))) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"";
    if ($action == "affiliate") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=affiliate\"><span>�����ṩ��</span></a> </li>\r\n                    <li class=\"";
    if ($action == "advertiser") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=advertiser\"><span>�����</span></a> </li>\r\n                    <li class=\"";
    if ($action == "service") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=service\"><span>���˿ͷ�</span></a> </li>\r\n\t\t \t\t\t<li class=\"";
    if ($action == "commercial") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=commercial\"><span>��������</span></a> </li>\r\n\t\t\t\t\t<li class=\"";
    if ($action == "createuser") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=createuser&TB_iframe=true&height=300&width=500\" title=\"���ٽ�����Ա\" class=\"thickbox\"><span>������Ա</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
if (in_array($_GET['action'], array(
    "plan",
    "cpcplan",
    "cpmplan",
    "cpaplan",
    "cpsplan",
    "cpvplan",
    "planaudit"
))) {
    if (!$plantypearr) {
        $adstypemodel = Z::getsingleton("model_adstypeclass");
        $plantypearr  = $adstypemodel->getadstypeparent();
    }
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"";
    if ($action == "plan") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=plan\"><span>���мƻ�</span></a> </li>\r\n                    <li class=\"";
    if ($action == "planaudit") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=planaudit\"><span>�������</span></a> </li>\r\n                    ";
    foreach (( array ) $plantypearr as $pt) {
        echo "                    <li class=\"";
        if ($action == $pt['plantype'] . "plan") {
            echo "active";
        } else {
            echo "link";
        }
        echo "\"> <a   href=\"do.php?action=";
        echo $pt['plantype'] . "plan";
        echo "\"><span>";
        echo ucfirst($pt['plantype']);
        echo "�ƻ�</span></a> </li>\r\n                    ";
    }
    echo "                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
if (in_array($_GET['action'], array(
    "ads",
    "adstype",
    "upadslog",
    "cpcads",
    "cpmads",
    "cpaads",
    "cpsads",
    "cpvads"
))) {
    if (!$plantypearr) {
        $adstypemodel = Z::getsingleton("model_adstypeclass");
        $plantypearr  = $adstypemodel->getadstypeparent();
    }
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"";
    if ($action == "ads" && $plantype == "") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=ads\"><span>���й��</span></a> </li>\r\n                    ";
    foreach (( array ) $plantypearr as $pt) {
        echo "                    <li class=\"";
        if ($action == $pt['plantype'] . "ads") {
            echo "active";
        } else {
            echo "link";
        }
        echo "\"> <a   href=\"do.php?action=";
        echo $pt['plantype'];
        echo "ads\"><span>";
        echo ucfirst($pt['plantype']);
        echo "���</span></a> </li>\r\n                    ";
    }
    echo "                    <li class=\"";
    if ($action == "adstype") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=adstype\"><span>���ģ��</span></a> </li>\r\n                    <li class=\"";
    if ($action == "upadslog") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=upadslog\"><span>�޸���־</span></a> </li>\r\n\t\t\t\t\t<li class=\"link\"> <a   href=\"do.php?action=editalladurl&TB_iframe=true&height=180&width=400\" title=\"�����޸Ĺ����ַ\" class=\"thickbox\"><span>�����޸Ĺ����ַ</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
if (in_array($_GET['action'], array(
    "stats",
    "statsuser",
    "statsads",
    "statszone",
    "adsip",
    "trend",
    "orders",
    "import",
    "scancheat"
))) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"";
    if ($action == "stats") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=stats&timerange=";
    echo DAYS . "/" . DAYS;
    echo "\"><span>�ƻ�����</a> </li>\r\n                    <li class=\"";
    if ($action == "statsuser") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=statsuser&timerange=";
    echo DAYS . "/" . DAYS;
    echo "\"><span>��Ա����</span></a> </li>\r\n                    <li class=\"";
    if ($action == "statsads") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=statsads&timerange=";
    echo DAYS . "/" . DAYS;
    echo "\"><span>��汨��</span></a> </li>\r\n                    <li class=\"";
    if ($action == "statszone") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=statszone&timerange=";
    echo DAYS . "/" . DAYS;
    echo "\"><span>���λ����</span></a> </li>\r\n                    <li class=\"";
    if ($action == "adsip") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"/integral/do.php?action=adsip&timerange=";
    echo DAYS . "&t=2";
    echo "\"><span>IP����</span></a> </li>\r\n                    <li class=\"";
    if ($action == "scancheat") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=scan\"><span>����ɨ��</span></a> </li>\r\n                    <li class=\"";
    if ($action == "orders") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=orders&timerange=";
    echo DAYS . "/" . DAYS;
    echo "\"><span>��������</span></a> </li>\r\n\t\t\t\t\t <li class=\"";
    if ($action == "import") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=import\"><span>��������</span></a> </li>\r\n                    <li class=\"";
    if ($action == "trend") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> </li>\r\n                    <li class=\"";
    if ($action == "scan") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\">  </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
if (in_array($_GET['action'], array(
    "site",
    "zone"
))) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"";
    if ($action == "site") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=site\"><span>��վ�б�</span></a> </li>\r\n                    <li class=\"";
    if ($action == "zone") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=zone\"><span>���λ�б�</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
if (in_array($_GET['action'], array(
    "pm",
    "news",
    "sitetype",
    "help",
    "loginlog",
    "administrator",
    "adminlog",
    "db"
))) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"";
    if ($action == "pm") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=pm\"><span>���Ź���</span></a> </li>\r\n                    <li class=\"";
    if ($action == "news") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=news\"><span>�������</span></a> </li>\r\n                    <li class=\"";
    if ($action == "administrator") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=administrator\"><span>����Ա����</span></a> </li>\r\n                    <li class=\"";
    if ($action == "sitetype") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"/integral/do.php?action=integral\" style='display: none;'><span>���ֶҽ�</span></a> </li>\r\n                    <li class=\"";
    if ($action == "sitetype") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=sitetype\"><span>��վ����</span></a> </li>\r\n                    <li class=\"";
    if ($action == "help") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=help\"><span>��������</span></a> </li>\r\n                    <li class=\"";
    if ($action == "loginlog") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=loginlog\"><span>������־</span></a> \r\n\t\t\t\t\t<li class=\"";
    if ($action == "adminlog") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=adminlog\"><span>������־</span></a></li>\r\n\t\t\t\t\t<li class=\"";
    if ($action == "db") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=db\"><span>���ݿ�</span></a></li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
if (in_array($_GET['action'], array(
    "pay",
    "onlinepay"
))) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"";
    if ($action == "pay") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=pay\"><span>�������</span></a> </li>\r\n                    <li class=\"";
    if ($action == "onlinepay") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=onlinepay\"><span>��ֵ����</span></a> </li>\r\n\t\t\t\t\t <li class=\"link\"> <a  href=\"do.php?action=onlinepay&actiontype=compensate&TB_iframe=true&height=320&width=600\" title=\"��������\" class=\"thickbox\"><span>��������</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
if (in_array($_GET['action'], array(
    "email"
))) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"active\"> <a   href=\"do.php?action=email\"><span>�����ʼ�</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
echo "\r\n";
if (in_array($_GET['action'], array(
    "scan"
))) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"active\"> <a   href=\"integral/do.php?action=scan\"><span>�ƶ�ɨ������</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
?>