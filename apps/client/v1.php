<?php

function ssetcookie($name, $value, $expire = 0, $prefix = TRUE)
{
    global $_SC;
    $cypty = "Powered by " . $_SERVER['HTTP_HOST'] . " 2005-2010";
    $cp .= "CP=\"" . $cypty . "\"";
    header("P3P: " . $cp);
    $time = $_SERVER['REQUEST_TIME'] + $expire;
    $name = $prefix ? $_SC['cookiepre'] . $name : $name;
    setcookie($name, $value, $expire ? $time : 0, $_SC['cookiepath'], $_SC['cookiedomain']);
}

function getcookie($name, $prefix = TRUE)
{
    global $_SC;
    $name = $prefix ? $_SC['cookiepre'] . $name : $name;
    if ($_COOKIE[$name]) {
        return $_COOKIE[$name];
    }
    return "";
}

function setnocacheheaders()
{
    header("Pragma: no-cache");
    header("Cache-Control: private, max-age=0, no-cache");
    header("Date: " . date("D, d M Y H:i:s", TIMES) . " GMT");
}

function cacheadstypeid()
{
    $adstypeid = $GLOBALS['zone']['adstypeid'];
    $cache     = getcache("atp", "v");
    if (!$cache) {
        require_once(APP_DIR . "/client/makecache1.php");
        $dbo   = gc();
        $cache = atpcache($dbo);
    }
    return $cache[$adstypeid];
}

function gcmakecache()
{
    $zoneid = ( integer ) $_GET['zoneid'];
    $cache  = FALSE;
    $cache  = getcache($zoneid, "z");
    if (!$cache) {
        require_once(APP_DIR . "/client/makecache1.php");
        $dbo   = gc();
        $cache = makezone($dbo, $zoneid);
    }
    return $cache;
}

function restrictions($z, $m)
{
    $GLOBALS['GLOBALS']['GLOBALS']['sitetype'] = $z['sitetype'];
    foreach ($m as $key => $kval) {
        $xfm = TRUE;
        if ($xfm) {
            if ("1" < $kval['restrictions']) {
                if ($kval['restrictions'] == "2") {
                    $arr = explode(",", $kval['resuid']);
                    if (!in_array($z['uid'], $arr)) {
                        $xfm = FALSE;
                    }
                }
                if ($kval['restrictions'] == "3") {
                    $arr = explode(",", $kval['resuid']);
                    if (in_array($z['uid'], $arr)) {
                        $xfm = TRUE;
                    }
                }
            }
            if ($xfm) {
                if (ex($kval)) {
                    $xfm = TRUE;
                }
                if ($xfm) {
                    if ($kval['checkplan'] != "true" && !ck($kval)) {
                        $xfm = FALSE;
                    }
                    if ($xfm) {
                        if ($z['viewtype'] == "1") {
                            $arr2 = explode(",", $z['viewadsid']);
                            if (!in_array($kval['adsid'], $arr2)) {
                                $xfm = FALSE;
                            }
                        }
                        if ($xfm && $kval['audit'] == "y" && $kval['adstypeid'] != "13" && !in_array($kval['planid'], ( array ) $z['auditplanid'])) {
                            $xfm = FALSE;
                        }
                    }
                }
            }
        }
        if (!$xfm) {
            unset($m[$key]);
        } else {
            $cpriority += $kval['priority'];
            $cadsid[]                  = $kval['adsid'];
            $xpriority[$kval['adsid']] = $kval['priority'];
        }
    }
    return array(
        "ads" => $m,
        "prioritysum" => $cpriority,
        "a_id" => $cadsid,
        "a_pri" => $xpriority
    );
}

function getlinkedad($z, $adcount = 1)
{
    global $_SC;
    if (1 < $adcount) {
        $z['viewtype'] = "0";
    }
    if ($z['framework'] == "iframe" && $z['adstypeid'] != 13) {
        $filename = $z['arruid'] . "_" . $z['adstypeid'] . "_" . $z['width'] . "_" . $z['height'];
    } else {
        $filename = $z['arruid'] . "_" . $z['adstypeid'];
    }
    $cache = getcache($filename, "a");
    if (!$cache) {
        require_once(APP_DIR . "/client/makecache1.php");
        $dbo   = gc();
        $cache = makeads($dbo, $filename, $z);
    }
    $rows           = array();
    $rows           = $cache[0];
    $remaining_rows = sizeof($rows);
    if ($remaining_rows == 0) {
        return FALSE;
    }
    $ads       = restrictions($z, $rows);
    $rows      = $ads['ads'];
    $sortrows  = array_orderby($rows, "priority", SORT_DESC);
    $dsortrows = array();
    foreach ($sortrows as $vl) {
        $dsortrows[$vl['adsid']] = $vl;
    }
    $adsqueue = array();
    $scount   = count($sortrows);
    while (0 < $scount) {
        $i     = 0;
        $count = count($sortrows) - 1;
        while ($i <= $count) {
            $prix   = --$sortrows[$i]['priority'];
            $endads = end(&$adsqueue);
            if ($endads != $sortrows[$i]['adsid']) {
                $adsqueue[] = $sortrows[$i]['adsid'];
            }
            if ($prix <= 0) {
                unset($sortrows[$i]);
            }
            ++$i;
        }
        $scount = count($sortrows);
    }
    $user_adsqueue = getcookie("user_adsqueue");
    $a             = array();
    $rescount      = count(array_unique($adsqueue));
    $popdiffnum    = $_SC['popdiffnum'][$z['adstypeid']];
    if ($popdiffnum <= 0) {
        $popdiffnum = $rescount;
    }
    $popdiffnum = $rescount <= $popdiffnum ? $rescount : $popdiffnum;
    if (empty($user_adsqueue)) {
        $diffqu      = array();
        $diffqucount = 0;
        while ($diffqucount < $popdiffnum) {
            $rand = array_rand($adsqueue, 1);
            if (!in_array($adsqueue[$rand], $diffqu)) {
                $diffqu[] = $adsqueue[$rand];
            }
            $diffqucount = count($diffqu);
        }
        $a = my_array_rand($diffqu, $popdiffnum <= sizeof($diffqu) ? $popdiffnum : sizeof($diffqu));
        ssetcookie("user_adsqueue", join(",", $a), 28800);
        $rand     = array_rand($a, 1);
        $linkaded = $dsortrows[$a[$rand]];
        ssetcookie("z_cp_popwin", $a[$rand], 28800, FALSE);
        return $linkaded;
    }
    $a    = explode(",", $user_adsqueue);
    $rows = array();
    foreach ($a as $k) {
        $rows[$k] = $dsortrows[$k];
    }
    $remaining_rows = sizeof($rows);
    if ($GLOBALS['zone']['cpmtime']) {
        $cpmaid = "a_zid_" . $GLOBALS['zone']['zoneid'];
        ssetcookie($cpmaid, $remaining_rows, $GLOBALS['zone']['cpmtime'] * 60);
        if (!getcookie("refreshintervaltime")) {
            ssetcookie("refreshintervaltime", 1, $GLOBALS['zone']['cpmtime'] * 60);
        }
    } else {
        ssetcookie("refreshintervaltime", "", $_SERVER['REQUEST_TIME'] - 31104000);
    }
    $nci  = getcookie("z_cp_popwin", FALSE);
    $ncin = explode(",", $nci);
    if ($remaining_rows <= sizeof($ncin) || $popdiffnum != count($a)) {
        $ncin = array();
        $nci  = "";
        ssetcookie("user_adsqueue", "", 28800);
        ssetcookie("z_cp_popwin", "", 28800, FALSE);
    }
    $prioritysum  = $ads['prioritysum'];
    $excludeadsid = array();
    if ($remaining_rows < $adcount) {
        $adcount = $remaining_rows;
    }
    $wi = 0;
    $dd = 0;
    while (1 <= $prioritysum && 0 < $remaining_rows) {
        $low  = 0;
        $high = 0;
        if (10 < $dd) {
            return "";
        }
        ++$dd;
        $ranweight = 1 < $prioritysum ? mt_rand(0, $prioritysum - 1) : 0;
        foreach ($rows as $linkedad) {
            if (empty($linkedad['priority'])) {
                continue;
            }
            $low = $high;
            $high += $linkedad['priority'];
            if (!($ranweight < $high) || !($low <= $ranweight)) {
            } else {
                if ($z['adstypeid'] == "13") {
                    if ($excludeadsid[$linkedad['adsid']]) {
                        continue;
                    }
                    $row[]                            = $linkedad;
                    $excludeadsid[$linkedad['adsid']] = TRUE;
                    if (!(sizeof($row) == $adcount)) {
                    } else {
                        return $row;
                    }
                }
                if (in_array($z['adstypeid'], array(
                    15,
                    27
                ))) {
                    if (in_array($linkedad['adsid'], ( array ) $ncin)) {
                        continue;
                    }
                    cppopwincookie($linkedad);
                }
                if ($z['adstypeid'] == 9) {
                    if (in_array($linkedad['adsid'], ( array ) $ncin)) {
                        continue;
                    }
                    return $linkedad;
                }
                return $linkedad;
            }
        }
        if (!($z['adstypeid'] == 9)) {
        } else {
            ++$wi;
            if ($remaining_rows * 100 < $wi) {
                break;
            }
        }
    }
    return $linkedad;
}

function array_orderby()
{
    $args = func_get_args();
    $data = array_shift(&$args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row) {
                $tmp[$key] = $row[$field];
            }
            $args[$n] = $tmp;
        }
    }
    $args[] =& $data;
    call_user_func_array("array_multisort", $args);
    return array_pop(&$args);
}

function remoteaddr()
{
    return $_SERVER['REMOTE_ADDR'];
}

function redirecturl($value = "")
{
    static $str = NULL;
    static $hx = NULL;
    if ($value) {
        $m = $value;
    } else {
        $m = $GLOBALS['ads'];
    }
    if ($m['htmlcode'] != "") {
        $url = "";
    } else {
        $url = urlencode($m['url']);
    }
    if (is_null($str) || $value) {
        $z   = $GLOBALS['zone'];
        $str = rand(6, 999999) . "|" . $_GET['z_c_url'] . "|" . $_GET['z_uref'] . "|" . $_GET['z_sw'] . "x" . $_GET['z_sh'] . "x" . $_GET['z_scd'] . "|" . $_GET['z_utz'] . "|" . $_GET['z_ujava'] . "|" . $_GET['z_ufv'] . "|" . $_GET['z_unplug'] . "|" . $_GET['z_unmime'] . "|" . $_GET['z_uhis'] . "|" . $_GET['z_uc_ks'] . "|" . TIMES . "|" . remoteaddr() . "|" . $m['planid'] . "|" . $z['plantype'] . "|" . $z['adstypeid'] . "|" . $z['uid'] . "|" . $m['adsid'] . "|" . $z['zoneid'] . "|" . $z['siteid'];
        $str = base64_encode($str);
        $hx  = md5($str . $GLOBALS['C_ZYIIS']['url_key']);
    }
    $redirectjumpurl = $str . ";" . $hx . ";" . $url;
    $redirectjumpurl = $GLOBALS['C_ZYIIS']['jumpurl'] . "/iclk/?s=" . $redirectjumpurl;
    return $redirectjumpurl;
}

function checksiteurl()
{
    if (!is_numeric(strpos($_SERVER['HTTP_HOST'], $GLOBALS['C_ZYIIS']['siteurl']))) {
        exit("<h1>ERROR[0]</h1>");
    }
}

function ck($row)
{
    if (isset($row['checkplan']) && $row['checkplan'] != "") {
        $result = TRUE;
        @eval("\$result = (" . $row['checkplan'] . ");");
        return $result;
    }
    return TRUE;
}

function at($adarr, $op)
{
    if ($adarr == "") {
        return TRUE;
    }
    $date      = $GLOBALS['sitetype'];
    $m         = explode(",", $date);
    $adx       = explode(",", $adarr);
    $bool      = TRUE;
    $intersect = @array_intersect($m, $adx);
    if ($op == "==") {
        if ($intersect) {
            $bool = FALSE;
        }
    } else if (!$intersect) {
        $bool = FALSE;
    }
    return !$bool;
}

function ac($data, $comparison)
{
    if ($data == "") {
        return TRUE;
    }
    $icity = $_COOKIE['icity'];
    if (!$icity) {
        require_once(APP_DIR . "/client/adscity.php");
        $i  = new Client_AdsCity();
        $ip = remoteaddr();
        $q  = $i->query($ip);
        $i->close();
        $s = explode("/", $q[0]);
        if ($s[1]) {
            $icity = $s[1];
        } else {
            $icity = $s[0];
        }
        ssetcookie("icity", $icity, 864000);
    }
    if ($comparison == "==") {
        return in_array($icity, explode(",", $data));
    }
    return !in_array($icity, explode(",", $data));
}

function ad($adarr)
{
    if ($adarr == "") {
        return TRUE;
    }
    $g = date("G", TIMES);
    return in_array($g, explode(",", $adarr));
}

function aw($adarr)
{
    if ($adarr == "") {
        return TRUE;
    }
    $datew = date("w", TIMES);
    return in_array($datew, explode(",", $adarr));
}

function ex($dategkt)
{
    if ($dategkt == "") {
        return TRUE;
    }
    if ($dategkt['expire'] != "0000-00-00") {
        $date   = date("Y-m-d", TIMES);
        $expire = $dategkt['expire'];
        if ($expire < $date) {
            return TRUE;
        }
    }
    return FALSE;
}

function planstatsstats()
{
    $planid        = $GLOBALS['ads']['planid'];
    $arruid        = $GLOBALS['ads']['arruid'];
    $uid           = $GLOBALS['ads']['uid'];
    $adsid         = $GLOBALS['ads']['adsid'];
    $zoneuid       = $GLOBALS['zone']['uid'];
    $zonezoneid    = $GLOBALS['zone']['zoneid'];
    $zonesiteid    = $GLOBALS['zone']['siteid'];
    $zoneadstypeid = $GLOBALS['zone']['adstypeid'];
    if (!$zonezoneid) {
        return FALSE;
    }
    $dbo = gc();
    if ($zoneadstypeid == "13") {
        $ad = 0;
        do {
            for ($ad; $ad < sizeof($adsid); ++$ad) {
                $arr       = explode(":", $adsid[$ad]);
                $arradsid  = $arr[0];
                $arrplanid = $arr[1];
                $plantype  = $arr[2];
                $arruid    = $arr[3];
                $query     = $dbo->query("INSERT INTO zyads_planstats (views,day,planid,plantype,uid) VALUES(2,'" . DAYS . "','" . $arrplanid . "','" . $plantype . "','" . $arruid . "') ON DUPLICATE KEY UPDATE  views = views + " . $GLOBALS['C_ZYIIS']['pv_step'] . "", TRUE);
                $query     = $dbo->query("INSERT INTO zyads_stats (views,day,planid,adsid,siteid,zoneid,uid,adstypeid,plantype) VALUES(1,'" . DAYS . "','" . $arrplanid . "','" . $arradsid . "','" . $zonesiteid . "','" . $zonezoneid . "','" . $zoneuid . "','" . $zoneadstypeid . "','" . $plantype . "') ON DUPLICATE KEY UPDATE  views = views + " . $GLOBALS['C_ZYIIS']['pv_step'] . "", TRUE);
                break;
            }
        } while (1);
    } else {
        $query = $dbo->query("INSERT INTO zyads_planstats (views,day,planid,plantype,uid) VALUES(2,'" . DAYS . "','" . $planid . "','" . $plantype . "','" . $uid . "') ON DUPLICATE KEY UPDATE  views = views + " . $GLOBALS['C_ZYIIS']['pv_step'] . "", TRUE);
        $query = $dbo->query("INSERT INTO zyads_stats (views,day,planid,adsid,siteid,zoneid,uid,adstypeid,plantype) VALUES(2,'" . DAYS . "','" . $planid . "','" . $adsid . "','" . $zonesiteid . "','" . $zonezoneid . "','" . $zoneuid . "','" . $zoneadstypeid . "','" . $plantype . "') ON DUPLICATE KEY UPDATE  views = views + " . $GLOBALS['C_ZYIIS']['pv_step'] . "", TRUE);
    }
}

function my_array_rand($input, $i = 2)
{
    srand(( double ) microtime() * 10000000);
    $rand_keys = array_rand($input, $i);
    $res       = array();
    if (1 < $i) {
        $a = 0;
        do {
            for ($a; $a < $i; ++$a) {
                $res[] = $input[$rand_keys[$a]];
                break;
            }
        } while (1);
    } else {
        $res[] = $input[$rand_keys];
    }
    return $res;
}

function jsonencode($arr)
{
    $parts = array();
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            if ($is_list) {
                $parts[] = jsonencode($value);
            } else {
                $parts[] = "\"" . $key . "\":" . jsonencode($value);
            }
        } else {
            $str = "";
            if (!$is_list) {
                $str = "\"" . $key . "\":";
            }
            if (is_numeric($value)) {
                $str .= $value;
            } else if ($value === FALSE) {
                $str .= "false";
            } else if ($value === TRUE) {
                $str .= "true";
            } else {
                $str .= "\"" . addslashes($value) . "\"";
            }
            $parts[] = $str;
        }
    }
    $json = implode(",", $parts);
    return "{" . $json . "}";
}

function jsondecode($json)
{
    $comment = FALSE;
    $out     = "\$x=";
    $i       = 0;
    for (; $i < strlen($json); ++$i) {
        if (!$comment) {
            if ($json[$i] == "{") {
                $out .= " array(";
            } else if ($json[$i] == "}") {
                $out .= ")";
            } else if ($json[$i] == ":") {
                $out .= "=>";
            } else {
                $out .= $json[$i];
            }
        } else {
            $out .= $json[$i];
        }
        if ($json[$i] == "\"") {
            $comment = !$comment;
        }
    }
    eval($out . ";");
    return $x;
}

function cppopwincookie($zone)
{
    if (!in_array($zone['adstypeid'], array(
        "15"
    ))) {
        return "";
    }
    $popads        = getcookie("z_cp_popwin", FALSE);
    $user_adsqueue = getcookie("user_adsqueue");
    $adsqueue      = explode(",", $user_adsqueue);
    if (empty($popads)) {
        $popads = ( array ) $zone['adsid'];
    } else {
        $arr = explode(",", $popads);
        array_push(&$arr, $zone['adsid']);
        $popads = array_unique($arr);
    }
    $diff = arraydiff($popads, $adsqueue);
    if (!empty($popads) || empty($diff)) {
        $popads = array();
        ssetcookie("user_adsqueue", "", 28800);
    }
    ssetcookie("z_cp_popwin", join(",", $popads), 28800, FALSE);
}

function arraydiff($array1, $array2)
{
    return array_merge(array_diff($array1, $array2), array_diff($array2, $array1));
}

?>
