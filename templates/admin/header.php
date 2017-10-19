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
echo "/images/style.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<title>联盟管理后台</title>\r\n</head>\r\n<body>\r\n<div id=\"header-div\">\r\n  <div id=\"logo-div\"> <a href=\"do.php\"><img src=\"/templates/";
echo Z_TPL;
echo "/images/admin_logo.jpg\" border=\"0\"></a> </div>\r\n  <div id=\"menu-div\">\r\n    <ul>\r\n      <li  id=\"menu-active\"><a href=\"do.php?action=setting\" ";
if ($action == "setting") {
    echo " class=\"action\"";
}
echo "> <img src=\"/templates/";
echo Z_TPL;
echo "/images/icon-settings.jpg\" border=\"0\"> <span class=\"text\">基本设置</span></a></li>\r\n      <li><a href=\"do.php?action=advertiser\"  ";
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
echo "/images/icon-users.jpg\" border=\"0\"> <span class=\"text\">会员管理</span></a></li>\r\n      <li><a href=\"do.php?action=plan\"  ";
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
echo "/images/icon-plan.jpg\" border=\"0\"> <span class=\"text\">计划管理</span></a></li>\r\n      <li><a href=\"do.php?action=ads\"  ";
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
echo "/images/icon-ads.jpg\" border=\"0\"> <span class=\"text\">广告管理</span></a></li>\r\n      <li><a href=\"do.php?action=stats&timerange=";
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
echo "/images/icon-stats.jpg\" border=\"0\"><span class=\"text\"> 数据报表</span></a></li>\r\n      <li style='display: none;'><a href=\"do.php?action=site\" ";
if (in_array($action, array(
    "site",
    "zone"
))) {
    echo " class=\"action\"";
}
echo "> <img src=\"/templates/";
echo Z_TPL;
echo "/images/icon-index.jpg\" border=\"0\"> <span class=\"text\">网站管理</span></a></li>\r\n      <li><a href=\"do.php?action=pm\" ";
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
echo "/images/icon-others.jpg\" border=\"0\"> <span class=\"text\">其它管理</span></a></li>\r\n    </ul>\r\n  </div>\r\n</div>\r\n<div id=\"menu-end-div\">\r\n  <div id=\"menu-end-info\">Hello <strong>";
echo $_SESSION['adminusername'];
echo "</strong> \r\n    30分钟结算: <span id='horusum'>统计中...</span> 次  上次登录: ";
echo $_SESSION['l_ip'];
echo convertip($_SESSION['l_ip']);
echo " | <a  href=\"do.php?action=index\"><font color=\"#FFFFFF\">后台首页</font></a> | <a href=\"/\" target=\"_blank\"><font color=\"#FFFFFF\">联盟首页</font></a> | <!--a  href=\"index2.php\"><font color=\"#FFFFFF\">统计报表</font></a--><a class=\"s0\" href=\"/index.php?action=logout\"><font color=\"#FFFFFF\">退出</font></a></div>\r\n  <div id=\"fast-tools\" onselectstart =\"return false\" > <span >快速通道</span> </div>\r\n  <div id=\"fast-pay\" style='display: none'> <a href=\"do.php?action=pay\" style=\"color:#FFFFFF\"><span>财务管理</span></a> </div>\r\n  <div id=\"tools-content\">\r\n    <ul>\r\n      <li><a href=\"do.php?action=news&actiontype=add&TB_iframe=true&height=250&width=600\"  title=\"发布公告\" class=\"thickbox\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/news.jpg\" border=\"0\"><span>发布新的公告<span></a></li>\r\n      <li><a href=\"/integral/do.php?action=adsip&timerange=";
echo DAYS;
echo "\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/ip.jpg\" border=\"0\"><span>IP数据报表<span></a></li>\r\n      <li><a href=\"do.php?action=scancheat\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/zb.jpg\" border=\"0\"><span>扫描作弊<span></a></li>\r\n\t  <li><a href=\"do.php?action=makehtml&TB_iframe=true&height=200&width=520\"  title=\"生成Html\" class=\"thickbox\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/html.jpg\" border=\"0\"><span>生成Html<span></a></li>\r\n      <li><a href=\"do.php?action=planaudit\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/plan.jpg\" border=\"0\"><span>申请计划审核<span></a></li>\r\n      <li><a href=\"do.php?action=affiliate\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/users1.jpg\" border=\"0\"><span>网站主管理<span></a></li>\r\n      <li><a href=\"do.php?action=advertiser\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/users.jpg\" border=\"0\"><span>广告商管理<span></a></li>\r\n      <li><a href=\"do.php?action=pm\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/pm.jpg\" border=\"0\"><span>短信息管理<span></a></li>\r\n      <li><a href=\"do.php?action=onlinepay\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/onlpay.jpg\" border=\"0\"><span>在线支付管理<span></a></li>\r\n\t   <li><a href=\"do.php?action=email\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/email.jpg\" border=\"0\"><span>发送邮件<span></a></li>\r\n      <li><a href=\"do.php?action=administrator\"> <img src=\"/templates/";
echo Z_TPL;
echo "/images/admin.jpg\" border=\"0\"><span>管理员管理<span></a></li>\r\n    </ul>\r\n  </div>\r\n</div>\r\n";
if (in_array($_GET['action'], array(
    "setting"
))) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"";
    if ($actiontype == "") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting\"><span>基本设置</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "server") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=server\"><span>服务器设置</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "reg") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=reg\"><span> 注册用户设置</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "clearing") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=clearing\"><span>财务结算设置</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "deduction") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=deduction\"><span>默认扣量设置</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "smtp") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=smtp\"><span>邮件设置</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "onlinepay") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=onlinepay\"><span>在线支付</span></a> </li>\r\n                    <li class=\"";
    if ($actiontype == "other") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=integral\"><span>积分设置</span></a> </li>\r\n\t\t\t\t\t  \r\n\t\t\t\t\t  \r\n                    <li class=\"";
    if ($actiontype == "other") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=setting&actiontype=other\"><span>其它设置</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
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
    echo "\"> <a   href=\"do.php?action=affiliate\"><span>渠道提供商</span></a> </li>\r\n                    <li class=\"";
    if ($action == "advertiser") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=advertiser\"><span>广告商</span></a> </li>\r\n                    <li class=\"";
    if ($action == "service") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=service\"><span>联盟客服</span></a> </li>\r\n\t\t \t\t\t<li class=\"";
    if ($action == "commercial") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=commercial\"><span>联盟商务</span></a> </li>\r\n\t\t\t\t\t<li class=\"";
    if ($action == "createuser") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=createuser&TB_iframe=true&height=300&width=500\" title=\"快速建立会员\" class=\"thickbox\"><span>建立会员</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
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
    echo "\"> <a   href=\"do.php?action=plan\"><span>所有计划</span></a> </li>\r\n                    <li class=\"";
    if ($action == "planaudit") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=planaudit\"><span>申请审核</span></a> </li>\r\n                    ";
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
        echo "计划</span></a> </li>\r\n                    ";
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
    echo "\"> <a   href=\"do.php?action=ads\"><span>所有广告</span></a> </li>\r\n                    ";
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
        echo "广告</span></a> </li>\r\n                    ";
    }
    echo "                    <li class=\"";
    if ($action == "adstype") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=adstype\"><span>广告模板</span></a> </li>\r\n                    <li class=\"";
    if ($action == "upadslog") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=upadslog\"><span>修改日志</span></a> </li>\r\n\t\t\t\t\t<li class=\"link\"> <a   href=\"do.php?action=editalladurl&TB_iframe=true&height=180&width=400\" title=\"批理修改广告网址\" class=\"thickbox\"><span>批理修改广告网址</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
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
    echo "\"><span>计划报表</a> </li>\r\n                    <li class=\"";
    if ($action == "statsuser") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=statsuser&timerange=";
    echo DAYS . "/" . DAYS;
    echo "\"><span>会员报表</span></a> </li>\r\n                    <li class=\"";
    if ($action == "statsads") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=statsads&timerange=";
    echo DAYS . "/" . DAYS;
    echo "\"><span>广告报表</span></a> </li>\r\n                    <li class=\"";
    if ($action == "statszone") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=statszone&timerange=";
    echo DAYS . "/" . DAYS;
    echo "\"><span>广告位报表</span></a> </li>\r\n                    <li class=\"";
    if ($action == "adsip") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"/integral/do.php?action=adsip&timerange=";
    echo DAYS . "&t=2";
    echo "\"><span>IP报表</span></a> </li>\r\n                    <li class=\"";
    if ($action == "scancheat") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=scan\"><span>作弊扫描</span></a> </li>\r\n                    <li class=\"";
    if ($action == "orders") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=orders&timerange=";
    echo DAYS . "/" . DAYS;
    echo "\"><span>订单管理</span></a> </li>\r\n\t\t\t\t\t <li class=\"";
    if ($action == "import") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=import\"><span>导入数据</span></a> </li>\r\n                    <li class=\"";
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
    echo "\"> <a   href=\"do.php?action=site\"><span>网站列表</span></a> </li>\r\n                    <li class=\"";
    if ($action == "zone") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=zone\"><span>广告位列表</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
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
    echo "\"> <a   href=\"do.php?action=pm\"><span>短信管理</span></a> </li>\r\n                    <li class=\"";
    if ($action == "news") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=news\"><span>公告管理</span></a> </li>\r\n                    <li class=\"";
    if ($action == "administrator") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=administrator\"><span>管理员管理</span></a> </li>\r\n                    <li class=\"";
    if ($action == "sitetype") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"/integral/do.php?action=integral\" style='display: none;'><span>积分兑奖</span></a> </li>\r\n                    <li class=\"";
    if ($action == "sitetype") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=sitetype\"><span>网站类型</span></a> </li>\r\n                    <li class=\"";
    if ($action == "help") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=help\"><span>帮助管理</span></a> </li>\r\n                    <li class=\"";
    if ($action == "loginlog") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=loginlog\"><span>登入日志</span></a> \r\n\t\t\t\t\t<li class=\"";
    if ($action == "adminlog") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=adminlog\"><span>操作日志</span></a></li>\r\n\t\t\t\t\t<li class=\"";
    if ($action == "db") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=db\"><span>数据库</span></a></li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
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
    echo "\"> <a   href=\"do.php?action=pay\"><span>结算管理</span></a> </li>\r\n                    <li class=\"";
    if ($action == "onlinepay") {
        echo "active";
    } else {
        echo "link";
    }
    echo "\"> <a   href=\"do.php?action=onlinepay\"><span>充值管理</span></a> </li>\r\n\t\t\t\t\t <li class=\"link\"> <a  href=\"do.php?action=onlinepay&actiontype=compensate&TB_iframe=true&height=320&width=600\" title=\"发布补尝\" class=\"thickbox\"><span>发布补尝</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
if (in_array($_GET['action'], array(
    "email"
))) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"active\"> <a   href=\"do.php?action=email\"><span>发送邮件</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
echo "\r\n";
if (in_array($_GET['action'], array(
    "scan"
))) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"active\"> <a   href=\"integral/do.php?action=scan\"><span>云端扫描作弊</span></a> </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n";
}
?>