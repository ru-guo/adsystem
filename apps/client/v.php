<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function setnocacheheaders( )
{
		_obfuscate_d1x0cApj( "Pragma: no-cache" );
		_obfuscate_d1x0cApj( "Cache-Control: private, max-age=0, no-cache" );
		_obfuscate_d1x0cApj( "Date: "._obfuscate_fDMMI3It( "D, d M Y H:i:s", TIMES )." GMT" );
}

function _obfuscate_NyB_KDtoF3BxDSA�( )
{
		$adstypeid = $GLOBALS['zone']['adstypeid'];
		$cache = getcache( "atp", "v" );
		if ( !$cache )
		{
				require_once( APP_DIR."/client/makecache.php" );
				$dbo = gc( );
				$cache = _obfuscate_PClpMSM2EwcFdgE�( $dbo );
		}
		return $cache[$adstypeid];
}

function _obfuscate_bw87bQMUCXYlISV4( )
{
		$zoneid = ( integer )$_GET['zoneid'];
		$cache = getcache( $zoneid, "z" );
		if ( !$cache )
		{
				require_once( APP_DIR."/client/makecache.php" );
				$dbo = gc( );
				$cache = makezone( $dbo, $zoneid );
		}
		return $cache;
}

function _obfuscate_ZDYdEXBxDQY�( $_obfuscate_gQ��, $m )
{
		$GLOBALS['GLOBALS']['sitetype'] = $_obfuscate_gQ��['sitetype'];
		foreach ( $m as $_obfuscate_0W8� => $_obfuscate_rVsNRA�� )
		{
				$_obfuscate_7Uj5kAeqA04o = TRUE;
				if ( $_obfuscate_7Uj5kAeqA04o && "1" < $_obfuscate_rVsNRA��['restrictions'] )
				{
						if ( $_obfuscate_rVsNRA��['restrictions'] == "2" )
						{
								$_obfuscate_osNjsHmW = dmeqjch( ",", $_obfuscate_rVsNRA��['resuid'] );
								if ( !_obfuscate_MGYpc2l6CjY�( $_obfuscate_gQ��['uid'], $_obfuscate_osNjsHmW ) )
								{
										$_obfuscate_7Uj5kAeqA04o = FALSE;
								}
						}
						if ( $_obfuscate_rVsNRA��['restrictions'] == "3" )
						{
								$_obfuscate_osNjsHmW = dmeqjch( ",", $_obfuscate_rVsNRA��['resuid'] );
								if ( _obfuscate_MGYpc2l6CjY�( $_obfuscate_gQ��['uid'], $_obfuscate_osNjsHmW ) )
								{
										$_obfuscate_7Uj5kAeqA04o = FALSE;
								}
						}
				}
				if ( $_obfuscate_gQ��['framework'] == "iframe" && $_obfuscate_rVsNRA��['adstypeid'] != "13" && ( $_obfuscate_gQ��['width'] != $_obfuscate_rVsNRA��['width'] || $_obfuscate_gQ��['height'] != $_obfuscate_rVsNRA��['height'] ) )
				{
						$_obfuscate_7Uj5kAeqA04o = FALSE;
				}
				if ( $_obfuscate_7Uj5kAeqA04o )
				{
						if ( ex( $_obfuscate_rVsNRA�� ) )
						{
								$_obfuscate_7Uj5kAeqA04o = TRUE;
						}
						if ( $_obfuscate_7Uj5kAeqA04o )
						{
								if ( $_obfuscate_rVsNRA��['checkplan'] != "true" && !ck( $_obfuscate_rVsNRA�� ) )
								{
										$_obfuscate_7Uj5kAeqA04o = FALSE;
								}
								if ( $_obfuscate_7Uj5kAeqA04o )
								{
										if ( $_obfuscate_gQ��['viewtype'] == "1" )
										{
												$_obfuscate_2TwnvnTFI4tc = dmeqjch( ",", $_obfuscate_gQ��['viewadsid'] );
												if ( !_obfuscate_MGYpc2l6CjY�( $_obfuscate_rVsNRA��['adsid'], $_obfuscate_2TwnvnTFI4tc ) )
												{
														$_obfuscate_7Uj5kAeqA04o = FALSE;
												}
										}
										if ( $_obfuscate_7Uj5kAeqA04o && $_obfuscate_rVsNRA��['audit'] == "y" && $_obfuscate_rVsNRA��['adstypeid'] != "13" && !_obfuscate_MGYpc2l6CjY�( $_obfuscate_rVsNRA��['planid'], ( array )$_obfuscate_gQ��['auditplanid'] ) )
										{
												$_obfuscate_7Uj5kAeqA04o = FALSE;
										}
								}
						}
				}
				if ( !$_obfuscate_7Uj5kAeqA04o )
				{
						unset( $m[$_obfuscate_0W8�] );
				}
				else
				{
						$_obfuscate__ac0t8SFjVhc2w� += $_obfuscate_rVsNRA��['priority'];
						$_obfuscate_g_s6kA��[] = $_obfuscate_rVsNRA��['adsid'];
						$_obfuscate_MwXdqoU�[$_obfuscate_rVsNRA��['adsid']] = $_obfuscate_rVsNRA��['priority'];
				}
		}
		return array(
				"ads" => $m,
				"prioritysum" => $_obfuscate__ac0t8SFjVhc2w�,
				"a_id" => $_obfuscate_g_s6kA��,
				"a_pri" => $_obfuscate_MwXdqoU�
		);
}

function _obfuscate_M3sIaBQicwkKaiM�( $z, $adcount = 1 )
{
		if ( 1 < $adcount )
		{
				$z['viewtype'] = "0";
		}
		if ( $z['framework'] == "iframe" && $z['adstypeid'] != 13 )
		{
				$filename = $z['plantype']."_".$z['adstypeid']."_".$z['width']."_".$z['height'];
		}
		else
		{
				$filename = $z['plantype']."_".$z['adstypeid'];
		}
		$cache = getcache( $filename, "a" );
		if ( !$cache )
		{
				require_once( APP_DIR."/client/makecache.php" );
				$dbo = gc( );
				$cache = makeads( $dbo, $filename, $z );
		}
		$rows = $cache[0];
		$remaining_rows = _obfuscate_eyAfXcF( $rows );
		if ( $remaining_rows == 0 )
		{
				return FALSE;
		}
		$ads = _obfuscate_ZDYdEXBxDQY�( $z, $rows );
		$rows = $ads['ads'];
		$remaining_rows = _obfuscate_eyAfXcF( $rows );
		if ( $z['plantype'] == "cpm" )
		{
				if ( $GLOBALS['zone']['cpmtime'] )
				{
						$cpmaid = "a_zid_".$GLOBALS['zone']['zoneid'];
						_obfuscate_bQwaDSIxfhs1( $cpmaid, $remaining_rows, TIMES + $GLOBALS['zone']['cpmtime'] * 60 );
				}
				$nci = $_COOKIE['z_cp'];
				$ncin = dmeqjch( ",", $nci );
				if ( $remaining_rows <= _obfuscate_eyAfXcF( $ncin ) )
				{
						$ncin = array( );
						$nci = "";
				}
		}
		$prioritysum = $ads['prioritysum'];
		$excludeadsid = array( );
		if ( $remaining_rows < $adcount )
		{
				$adcount = $remaining_rows;
		}
		$wi = 0;
		while ( 1 <= $prioritysum && 0 < $remaining_rows )
		{
				$low = 0;
				$high = 0;
				$ranweight = 1 < $prioritysum ? _obfuscate_dC5qN2R1Mg��( 0, $prioritysum - 1 ) : 0;
				foreach ( $rows as $linkedad )
				{
						if ( empty( $linkedad['priority'] ) )
						{
								continue;
						}
						$low = $high;
						$high += $linkedad['priority'];
						if ( !( $ranweight < $high ) && !( $low <= $ranweight ) )
						{
								continue;
						}
						if ( $z['adstypeid'] == "13" )
						{
								if ( $excludeadsid[$linkedad['adsid']] )
								{
										continue;
								}
								$row[] = $linkedad;
								$excludeadsid[$linkedad['adsid']] = TRUE;
								if ( !( _obfuscate_d2VxFno�( $row ) == $adcount ) )
								{
										continue;
								}
								return $row;
						}
						if ( $z['plantype'] == "cpm" )
						{
								if ( _obfuscate_MGYpc2l6CjY�( $linkedad['adsid'], ( array )$ncin ) )
								{
										continue;
								}
								if ( $nci )
								{
										$ncin = $nci.",".$linkedad['adsid'];
								}
								else
								{
										$ncin = $linkedad['adsid'];
								}
								_obfuscate_bQwaDSIxfhs1( "z_cp", $ncin, TIMES + 28800 );
								return $linkedad;
						}
						return $linkedad;
				}
				if ( !( $z['plantype'] == "cpm" ) )
				{
						continue;
				}
				++$wi;
				if ( !( $remaining_rows * 10 < $wi ) )
				{
						continue;
				}
				return $linkedad;
		}
}

function _obfuscate_fwFnHEBubW0cHg��( )
{
		return $_SERVER['REMOTE_ADDR'];
}

function _obfuscate_fHd0Kw8NEAQ8Bmo�( $_obfuscate_M14� = "" )
{
		if ( $_obfuscate_M14�['adstypeid'] != 13 )
		{
				static $str = NULL;
				static $hx = NULL;
		}
		if ( $_obfuscate_M14� )
		{
				$m = $_obfuscate_M14�;
		}
		else
		{
				$m = $GLOBALS['ads'];
		}
		if ( $m['htmlcode'] != "" )
		{
				$_obfuscate_1GsF5PSA = "";
		}
		else
		{
				$_obfuscate_1GsF5PSA = _obfuscate_e34nCjE1bXlr( $m['url'] );
		}
		if ( _obfuscate_JBF2KjQBCg��( $str ) )
		{
				$_obfuscate_gQ�� = $GLOBALS['zone'];
				$str = _obfuscate_amIjeA��( 6, 999999 )."|".$_GET['z_c_url']."|".$_GET['z_uref']."|".$_GET['z_sw']."x".$_GET['z_sh']."x".$_GET['z_scd']."|".$_GET['z_utz']."|".$_GET['z_ujava']."|".$_GET['z_ufv']."|".$_GET['z_unplug']."|".$_GET['z_unmime']."|".$_GET['z_uhis']."|".$_GET['z_uc_ks']."|".TIMES."|"._obfuscate_fwFnHEBubW0cHg��( )."|".$m['planid']."|".$_obfuscate_gQ��['plantype']."|".$_obfuscate_gQ��['adstypeid']."|".$_obfuscate_gQ��['uid']."|".$m['adsid']."|".$_obfuscate_gQ��['zoneid']."|".$_obfuscate_gQ��['siteid'];
				$str = _obfuscate_IGI7aGd_LDRuMD0VZg��( $str );
				$hx = _obfuscate_K2kO( $str.$GLOBALS['C_ZYIIS']['url_key'] );
		}
		$_obfuscate_6rk� = $str.";".$hx.";".$_obfuscate_1GsF5PSA;
		$_obfuscate_6rk� = $GLOBALS['C_ZYIIS']['jumpurl']."/iclk/?s=".$_obfuscate_6rk�;
		return $_obfuscate_6rk�;
}

function _obfuscate_FggZFDs7aCksZg��( )
{
		if ( !_obfuscate_BB84ZzB6bXMtaQ��( _obfuscate_GBcde1sU( $_SERVER['HTTP_HOST'], $GLOBALS['C_ZYIIS']['siteurl'] ) ) )
		{
				exit( "<h1>ERROR[0]</h1>" );
		}
}

function ck( $row )
{
		if ( isset( $row['checkplan'] ) && $row['checkplan'] != "" )
		{
				$result = TRUE;
				@eval( "\$result = (".$row['checkplan'].");" );
				return $result;
		}
		return TRUE;
}

function at( $_obfuscate_6RYLWQ��, $_obfuscate_VxO7_nbIWKNB7Q�� )
{
		if ( $_obfuscate_6RYLWQ�� == "" )
		{
				return TRUE;
		}
		$_obfuscate_ = $GLOBALS['sitetype'];
		$m = dmeqjch( ",", $_obfuscate_ );
		$_obfuscate_8A�� = dmeqjch( ",", $_obfuscate_6RYLWQ�� );
		$_obfuscate_hrtGEQ�� = TRUE;
		$_obfuscate_ts4� = @_obfuscate_GGtrJWcGLw5oCmMZbANn( $m, $_obfuscate_8A�� );
		if ( $_obfuscate_VxO7_nbIWKNB7Q�� == "==" )
		{
				if ( $_obfuscate_ts4� )
				{
						$_obfuscate_hrtGEQ�� = FALSE;
				}
		}
		else if ( !$_obfuscate_ts4� )
		{
				$_obfuscate_hrtGEQ�� = FALSE;
		}
		return !$_obfuscate_hrtGEQ��;
}

function ac( $data, $comparison )
{
		if ( $data == "" )
		{
				return TRUE;
		}
		$icity = $_COOKIE['icity'];
		if ( !$icity )
		{
				require_once( APP_DIR."/client/adscity.php" );
				$i = new Client_AdsCity( );
				$ip = _obfuscate_fwFnHEBubW0cHg��( );
				$q = $i->query( $ip );
				$i->close( );
				$s = dmeqjch( "/", $q[0] );
				if ( $s[1] )
				{
						$icity = $s[1];
				}
				else
				{
						$icity = $s[0];
				}
				_obfuscate_bQwaDSIxfhs1( "icity", $icity, _obfuscate_FDQcQ��( ) + 864000 );
		}
		if ( $comparison == "==" )
		{
				return _obfuscate_MGYpc2l6CjY�( $icity, dmeqjch( ",", $data ) );
		}
		return !_obfuscate_MGYpc2l6CjY�( $icity, dmeqjch( ",", $data ) );
}

function ad( $_obfuscate_6RYLWQ�� )
{
		if ( $_obfuscate_6RYLWQ�� == "" )
		{
				return TRUE;
		}
		$_obfuscate_c6UELg�� = _obfuscate_YwJjMg��( "G", TIMES );
		return _obfuscate_MGYpc2l6CjY�( $_obfuscate_c6UELg��, dmeqjch( ",", $_obfuscate_6RYLWQ�� ) );
}

function aw( $_obfuscate_6RYLWQ�� )
{
		if ( $_obfuscate_6RYLWQ�� == "" )
		{
				return TRUE;
		}
		$_obfuscate_hg�� = _obfuscate_YwJjMg��( "w", TIMES );
		return _obfuscate_MGYpc2l6CjY�( $_obfuscate_hg��, dmeqjch( ",", $_obfuscate_6RYLWQ�� ) );
}

function ex( $_obfuscate_gkt )
{
		if ( $_obfuscate_gkt == "" )
		{
				return TRUE;
		}
		if ( $_obfuscate_gkt['expire'] != "0000-00-00" )
		{
				$_obfuscate_ = _obfuscate_YwJjMg��( "Y-m-d", TIMES );
				$_obfuscate_qOmXDu8y = $_obfuscate_gkt['expire'];
				if ( $_obfuscate_qOmXDu8y < $_obfuscate_ )
				{
						return TRUE;
				}
		}
		return FALSE;
}

function _obfuscate_YmcdFzxbYl8ubCpdHC4S( )
{
		$_obfuscate_PZzeOcS = $GLOBALS['ads']['planid'];
		$_obfuscate_8hq6FoERvks� = $GLOBALS['ads']['plantype'];
		$_obfuscate_4inZZA97OQ�� = $GLOBALS['ads']['uid'];
		$_obfuscate_LjsiKuc� = $GLOBALS['ads']['adsid'];
		$_obfuscate_7Ri3 = $GLOBALS['zone']['uid'];
		$_obfuscate_DacjAjK = $GLOBALS['zone']['zoneid'];
		$_obfuscate_abiamDuC = $GLOBALS['zone']['siteid'];
		$_obfuscate_WdrjnvPpQXt1 = $GLOBALS['zone']['adstypeid'];
		if ( !$_obfuscate_DacjAjK )
		{
				return FALSE;
		}
		$_obfuscate_5g�� = gc( );
		if ( $_obfuscate_WdrjnvPpQXt1 == "13" )
		{
				$_obfuscate_7w�� = 0;
				for ( ;	do
	{
	$_obfuscate_7w�� < _obfuscate_eyAfXcF( $_obfuscate_LjsiKuc� );	++$_obfuscate_7w��,	)
						{
								$_obfuscate_so7 = dmeqjch( ":", $_obfuscate_LjsiKuc�[$_obfuscate_7w��] );
								$_obfuscate_MXdaJEdX = $_obfuscate_so7[0];
								$_obfuscate_pfrBWSbvDA�� = $_obfuscate_so7[1];
								$_obfuscate_8hq6FoERvks� = $_obfuscate_so7[2];
								$_obfuscate__eqrEQ�� = $_obfuscate_so7[3];
								$_obfuscate_xs33Yt_k = $_obfuscate_5g��->query( "INSERT INTO zyads_planstats (views,day,planid,plantype,uid) VALUES(1,'".DAYS."','".$_obfuscate_pfrBWSbvDA��."','".$_obfuscate_8hq6FoERvks�."','".$_obfuscate__eqrEQ��."') ON DUPLICATE KEY UPDATE  views = views + ".$GLOBALS['C_ZYIIS']['pv_step']."", TRUE );
								$_obfuscate_xs33Yt_k = $_obfuscate_5g��->query( "INSERT INTO zyads_stats (views,day,planid,adsid,siteid,zoneid,uid,adstypeid,plantype) VALUES(1,'".DAYS."','".$_obfuscate_pfrBWSbvDA��."','".$_obfuscate_MXdaJEdX."','".$_obfuscate_abiamDuC."','".$_obfuscate_DacjAjK."','".$_obfuscate_7Ri3."','".$_obfuscate_WdrjnvPpQXt1."','".$_obfuscate_8hq6FoERvks�."') ON DUPLICATE KEY UPDATE  views = views + ".$GLOBALS['C_ZYIIS']['pv_step']."", TRUE );
								break;
						}
				} while ( 1 );
		}
		else
		{
				$_obfuscate_xs33Yt_k = $_obfuscate_5g��->query( "INSERT INTO zyads_planstats (views,day,planid,plantype,uid) VALUES(1,'".DAYS."','".$_obfuscate_PZzeOcS."','".$_obfuscate_8hq6FoERvks�."','".$_obfuscate_4inZZA97OQ��."') ON DUPLICATE KEY UPDATE  views = views + ".$GLOBALS['C_ZYIIS']['pv_step']."", TRUE );
				$_obfuscate_xs33Yt_k = $_obfuscate_5g��->query( "INSERT INTO zyads_stats (views,day,planid,adsid,siteid,zoneid,uid,adstypeid,plantype) VALUES(1,'".DAYS."','".$_obfuscate_PZzeOcS."','".$_obfuscate_LjsiKuc�."','".$_obfuscate_abiamDuC."','".$_obfuscate_DacjAjK."','".$_obfuscate_7Ri3."','".$_obfuscate_WdrjnvPpQXt1."','".$_obfuscate_8hq6FoERvks�."') ON DUPLICATE KEY UPDATE  views = views + ".$GLOBALS['C_ZYIIS']['pv_step']."", TRUE );
		}
}

function getdomain( $_obfuscate_Il8i )
{
		$_obfuscate_uffh = array( "ac", "ah", "biz", "bj", "cc", "com", "cq", "edu", "fj", "gd", "gov", "gs", "gx", "gz", "ha", "hb", "he", "hi", "hk", "hl", "hn", "info", "io", "jl", "js", "jx", "ln", "mo", "mobi", "net", "nm", "nx", "org", "qh", "sc", "sd", "sh", "sn", "sx", "tj", "tm", "travel", "tv", "tw", "ws", "xj", "xz", "yn", "zj" );
		$_obfuscate_1dNy = dmeqjch( ".", $_obfuscate_Il8i );
		$_obfuscate_vbQ44A�� = _obfuscate_d2VxFno�( $_obfuscate_1dNy );
		$_obfuscate_YsvfNw�� = $_obfuscate_1dNy[$_obfuscate_vbQ44A�� - 2];
		if ( _obfuscate_MGYpc2l6CjY�( $_obfuscate_YsvfNw��, $_obfuscate_uffh ) )
		{
				if ( $_obfuscate_vbQ44A�� == 2 )
				{
						$_obfuscate_1vA� = "www.";
				}
				else
				{
						$_obfuscate_1vA� = ".";
				}
				return $_obfuscate_1dNy[$_obfuscate_vbQ44A�� - 3].$_obfuscate_1vA�.$_obfuscate_YsvfNw��.".".$_obfuscate_1dNy[$_obfuscate_vbQ44A�� - 1];
		}
		return $_obfuscate_YsvfNw��.".".$_obfuscate_1dNy[$_obfuscate_vbQ44A�� - 1];
}

?>
