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

function _obfuscate_NyB_KDtoF3BxDSAÿ( )
{
		$adstypeid = $GLOBALS['zone']['adstypeid'];
		$cache = getcache( "atp", "v" );
		if ( !$cache )
		{
				require_once( APP_DIR."/client/makecache.php" );
				$dbo = gc( );
				$cache = _obfuscate_PClpMSM2EwcFdgEÿ( $dbo );
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

function _obfuscate_ZDYdEXBxDQYÿ( $_obfuscate_gQÿÿ, $m )
{
		$GLOBALS['GLOBALS']['sitetype'] = $_obfuscate_gQÿÿ['sitetype'];
		foreach ( $m as $_obfuscate_0W8ÿ => $_obfuscate_rVsNRAÿÿ )
		{
				$_obfuscate_7Uj5kAeqA04o = TRUE;
				if ( $_obfuscate_7Uj5kAeqA04o && "1" < $_obfuscate_rVsNRAÿÿ['restrictions'] )
				{
						if ( $_obfuscate_rVsNRAÿÿ['restrictions'] == "2" )
						{
								$_obfuscate_osNjsHmW = dmeqjch( ",", $_obfuscate_rVsNRAÿÿ['resuid'] );
								if ( !_obfuscate_MGYpc2l6CjYÿ( $_obfuscate_gQÿÿ['uid'], $_obfuscate_osNjsHmW ) )
								{
										$_obfuscate_7Uj5kAeqA04o = FALSE;
								}
						}
						if ( $_obfuscate_rVsNRAÿÿ['restrictions'] == "3" )
						{
								$_obfuscate_osNjsHmW = dmeqjch( ",", $_obfuscate_rVsNRAÿÿ['resuid'] );
								if ( _obfuscate_MGYpc2l6CjYÿ( $_obfuscate_gQÿÿ['uid'], $_obfuscate_osNjsHmW ) )
								{
										$_obfuscate_7Uj5kAeqA04o = FALSE;
								}
						}
				}
				if ( $_obfuscate_gQÿÿ['framework'] == "iframe" && $_obfuscate_rVsNRAÿÿ['adstypeid'] != "13" && ( $_obfuscate_gQÿÿ['width'] != $_obfuscate_rVsNRAÿÿ['width'] || $_obfuscate_gQÿÿ['height'] != $_obfuscate_rVsNRAÿÿ['height'] ) )
				{
						$_obfuscate_7Uj5kAeqA04o = FALSE;
				}
				if ( $_obfuscate_7Uj5kAeqA04o )
				{
						if ( ex( $_obfuscate_rVsNRAÿÿ ) )
						{
								$_obfuscate_7Uj5kAeqA04o = TRUE;
						}
						if ( $_obfuscate_7Uj5kAeqA04o )
						{
								if ( $_obfuscate_rVsNRAÿÿ['checkplan'] != "true" && !ck( $_obfuscate_rVsNRAÿÿ ) )
								{
										$_obfuscate_7Uj5kAeqA04o = FALSE;
								}
								if ( $_obfuscate_7Uj5kAeqA04o )
								{
										if ( $_obfuscate_gQÿÿ['viewtype'] == "1" )
										{
												$_obfuscate_2TwnvnTFI4tc = dmeqjch( ",", $_obfuscate_gQÿÿ['viewadsid'] );
												if ( !_obfuscate_MGYpc2l6CjYÿ( $_obfuscate_rVsNRAÿÿ['adsid'], $_obfuscate_2TwnvnTFI4tc ) )
												{
														$_obfuscate_7Uj5kAeqA04o = FALSE;
												}
										}
										if ( $_obfuscate_7Uj5kAeqA04o && $_obfuscate_rVsNRAÿÿ['audit'] == "y" && $_obfuscate_rVsNRAÿÿ['adstypeid'] != "13" && !_obfuscate_MGYpc2l6CjYÿ( $_obfuscate_rVsNRAÿÿ['planid'], ( array )$_obfuscate_gQÿÿ['auditplanid'] ) )
										{
												$_obfuscate_7Uj5kAeqA04o = FALSE;
										}
								}
						}
				}
				if ( !$_obfuscate_7Uj5kAeqA04o )
				{
						unset( $m[$_obfuscate_0W8ÿ] );
				}
				else
				{
						$_obfuscate__ac0t8SFjVhc2wÿ += $_obfuscate_rVsNRAÿÿ['priority'];
						$_obfuscate_g_s6kAÿÿ[] = $_obfuscate_rVsNRAÿÿ['adsid'];
						$_obfuscate_MwXdqoUÿ[$_obfuscate_rVsNRAÿÿ['adsid']] = $_obfuscate_rVsNRAÿÿ['priority'];
				}
		}
		return array(
				"ads" => $m,
				"prioritysum" => $_obfuscate__ac0t8SFjVhc2wÿ,
				"a_id" => $_obfuscate_g_s6kAÿÿ,
				"a_pri" => $_obfuscate_MwXdqoUÿ
		);
}

function _obfuscate_M3sIaBQicwkKaiMÿ( $z, $adcount = 1 )
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
		$ads = _obfuscate_ZDYdEXBxDQYÿ( $z, $rows );
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
				$ranweight = 1 < $prioritysum ? _obfuscate_dC5qN2R1Mgÿÿ( 0, $prioritysum - 1 ) : 0;
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
								if ( !( _obfuscate_d2VxFnoÿ( $row ) == $adcount ) )
								{
										continue;
								}
								return $row;
						}
						if ( $z['plantype'] == "cpm" )
						{
								if ( _obfuscate_MGYpc2l6CjYÿ( $linkedad['adsid'], ( array )$ncin ) )
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

function _obfuscate_fwFnHEBubW0cHgÿÿ( )
{
		return $_SERVER['REMOTE_ADDR'];
}

function _obfuscate_fHd0Kw8NEAQ8Bmoÿ( $_obfuscate_M14ÿ = "" )
{
		if ( $_obfuscate_M14ÿ['adstypeid'] != 13 )
		{
				static $str = NULL;
				static $hx = NULL;
		}
		if ( $_obfuscate_M14ÿ )
		{
				$m = $_obfuscate_M14ÿ;
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
		if ( _obfuscate_JBF2KjQBCgÿÿ( $str ) )
		{
				$_obfuscate_gQÿÿ = $GLOBALS['zone'];
				$str = _obfuscate_amIjeAÿÿ( 6, 999999 )."|".$_GET['z_c_url']."|".$_GET['z_uref']."|".$_GET['z_sw']."x".$_GET['z_sh']."x".$_GET['z_scd']."|".$_GET['z_utz']."|".$_GET['z_ujava']."|".$_GET['z_ufv']."|".$_GET['z_unplug']."|".$_GET['z_unmime']."|".$_GET['z_uhis']."|".$_GET['z_uc_ks']."|".TIMES."|"._obfuscate_fwFnHEBubW0cHgÿÿ( )."|".$m['planid']."|".$_obfuscate_gQÿÿ['plantype']."|".$_obfuscate_gQÿÿ['adstypeid']."|".$_obfuscate_gQÿÿ['uid']."|".$m['adsid']."|".$_obfuscate_gQÿÿ['zoneid']."|".$_obfuscate_gQÿÿ['siteid'];
				$str = _obfuscate_IGI7aGd_LDRuMD0VZgÿÿ( $str );
				$hx = _obfuscate_K2kO( $str.$GLOBALS['C_ZYIIS']['url_key'] );
		}
		$_obfuscate_6rkÿ = $str.";".$hx.";".$_obfuscate_1GsF5PSA;
		$_obfuscate_6rkÿ = $GLOBALS['C_ZYIIS']['jumpurl']."/iclk/?s=".$_obfuscate_6rkÿ;
		return $_obfuscate_6rkÿ;
}

function _obfuscate_FggZFDs7aCksZgÿÿ( )
{
		if ( !_obfuscate_BB84ZzB6bXMtaQÿÿ( _obfuscate_GBcde1sU( $_SERVER['HTTP_HOST'], $GLOBALS['C_ZYIIS']['siteurl'] ) ) )
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

function at( $_obfuscate_6RYLWQÿÿ, $_obfuscate_VxO7_nbIWKNB7Qÿÿ )
{
		if ( $_obfuscate_6RYLWQÿÿ == "" )
		{
				return TRUE;
		}
		$_obfuscate_ = $GLOBALS['sitetype'];
		$m = dmeqjch( ",", $_obfuscate_ );
		$_obfuscate_8Aÿÿ = dmeqjch( ",", $_obfuscate_6RYLWQÿÿ );
		$_obfuscate_hrtGEQÿÿ = TRUE;
		$_obfuscate_ts4ÿ = @_obfuscate_GGtrJWcGLw5oCmMZbANn( $m, $_obfuscate_8Aÿÿ );
		if ( $_obfuscate_VxO7_nbIWKNB7Qÿÿ == "==" )
		{
				if ( $_obfuscate_ts4ÿ )
				{
						$_obfuscate_hrtGEQÿÿ = FALSE;
				}
		}
		else if ( !$_obfuscate_ts4ÿ )
		{
				$_obfuscate_hrtGEQÿÿ = FALSE;
		}
		return !$_obfuscate_hrtGEQÿÿ;
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
				$ip = _obfuscate_fwFnHEBubW0cHgÿÿ( );
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
				_obfuscate_bQwaDSIxfhs1( "icity", $icity, _obfuscate_FDQcQÿÿ( ) + 864000 );
		}
		if ( $comparison == "==" )
		{
				return _obfuscate_MGYpc2l6CjYÿ( $icity, dmeqjch( ",", $data ) );
		}
		return !_obfuscate_MGYpc2l6CjYÿ( $icity, dmeqjch( ",", $data ) );
}

function ad( $_obfuscate_6RYLWQÿÿ )
{
		if ( $_obfuscate_6RYLWQÿÿ == "" )
		{
				return TRUE;
		}
		$_obfuscate_c6UELgÿÿ = _obfuscate_YwJjMgÿÿ( "G", TIMES );
		return _obfuscate_MGYpc2l6CjYÿ( $_obfuscate_c6UELgÿÿ, dmeqjch( ",", $_obfuscate_6RYLWQÿÿ ) );
}

function aw( $_obfuscate_6RYLWQÿÿ )
{
		if ( $_obfuscate_6RYLWQÿÿ == "" )
		{
				return TRUE;
		}
		$_obfuscate_hgÿÿ = _obfuscate_YwJjMgÿÿ( "w", TIMES );
		return _obfuscate_MGYpc2l6CjYÿ( $_obfuscate_hgÿÿ, dmeqjch( ",", $_obfuscate_6RYLWQÿÿ ) );
}

function ex( $_obfuscate_gkt )
{
		if ( $_obfuscate_gkt == "" )
		{
				return TRUE;
		}
		if ( $_obfuscate_gkt['expire'] != "0000-00-00" )
		{
				$_obfuscate_ = _obfuscate_YwJjMgÿÿ( "Y-m-d", TIMES );
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
		$_obfuscate_8hq6FoERvksÿ = $GLOBALS['ads']['plantype'];
		$_obfuscate_4inZZA97OQÿÿ = $GLOBALS['ads']['uid'];
		$_obfuscate_LjsiKucÿ = $GLOBALS['ads']['adsid'];
		$_obfuscate_7Ri3 = $GLOBALS['zone']['uid'];
		$_obfuscate_DacjAjK = $GLOBALS['zone']['zoneid'];
		$_obfuscate_abiamDuC = $GLOBALS['zone']['siteid'];
		$_obfuscate_WdrjnvPpQXt1 = $GLOBALS['zone']['adstypeid'];
		if ( !$_obfuscate_DacjAjK )
		{
				return FALSE;
		}
		$_obfuscate_5gÿÿ = gc( );
		if ( $_obfuscate_WdrjnvPpQXt1 == "13" )
		{
				$_obfuscate_7wÿÿ = 0;
				for ( ;	do
	{
	$_obfuscate_7wÿÿ < _obfuscate_eyAfXcF( $_obfuscate_LjsiKucÿ );	++$_obfuscate_7wÿÿ,	)
						{
								$_obfuscate_so7 = dmeqjch( ":", $_obfuscate_LjsiKucÿ[$_obfuscate_7wÿÿ] );
								$_obfuscate_MXdaJEdX = $_obfuscate_so7[0];
								$_obfuscate_pfrBWSbvDAÿÿ = $_obfuscate_so7[1];
								$_obfuscate_8hq6FoERvksÿ = $_obfuscate_so7[2];
								$_obfuscate__eqrEQÿÿ = $_obfuscate_so7[3];
								$_obfuscate_xs33Yt_k = $_obfuscate_5gÿÿ->query( "INSERT INTO zyads_planstats (views,day,planid,plantype,uid) VALUES(1,'".DAYS."','".$_obfuscate_pfrBWSbvDAÿÿ."','".$_obfuscate_8hq6FoERvksÿ."','".$_obfuscate__eqrEQÿÿ."') ON DUPLICATE KEY UPDATE  views = views + ".$GLOBALS['C_ZYIIS']['pv_step']."", TRUE );
								$_obfuscate_xs33Yt_k = $_obfuscate_5gÿÿ->query( "INSERT INTO zyads_stats (views,day,planid,adsid,siteid,zoneid,uid,adstypeid,plantype) VALUES(1,'".DAYS."','".$_obfuscate_pfrBWSbvDAÿÿ."','".$_obfuscate_MXdaJEdX."','".$_obfuscate_abiamDuC."','".$_obfuscate_DacjAjK."','".$_obfuscate_7Ri3."','".$_obfuscate_WdrjnvPpQXt1."','".$_obfuscate_8hq6FoERvksÿ."') ON DUPLICATE KEY UPDATE  views = views + ".$GLOBALS['C_ZYIIS']['pv_step']."", TRUE );
								break;
						}
				} while ( 1 );
		}
		else
		{
				$_obfuscate_xs33Yt_k = $_obfuscate_5gÿÿ->query( "INSERT INTO zyads_planstats (views,day,planid,plantype,uid) VALUES(1,'".DAYS."','".$_obfuscate_PZzeOcS."','".$_obfuscate_8hq6FoERvksÿ."','".$_obfuscate_4inZZA97OQÿÿ."') ON DUPLICATE KEY UPDATE  views = views + ".$GLOBALS['C_ZYIIS']['pv_step']."", TRUE );
				$_obfuscate_xs33Yt_k = $_obfuscate_5gÿÿ->query( "INSERT INTO zyads_stats (views,day,planid,adsid,siteid,zoneid,uid,adstypeid,plantype) VALUES(1,'".DAYS."','".$_obfuscate_PZzeOcS."','".$_obfuscate_LjsiKucÿ."','".$_obfuscate_abiamDuC."','".$_obfuscate_DacjAjK."','".$_obfuscate_7Ri3."','".$_obfuscate_WdrjnvPpQXt1."','".$_obfuscate_8hq6FoERvksÿ."') ON DUPLICATE KEY UPDATE  views = views + ".$GLOBALS['C_ZYIIS']['pv_step']."", TRUE );
		}
}

function getdomain( $_obfuscate_Il8i )
{
		$_obfuscate_uffh = array( "ac", "ah", "biz", "bj", "cc", "com", "cq", "edu", "fj", "gd", "gov", "gs", "gx", "gz", "ha", "hb", "he", "hi", "hk", "hl", "hn", "info", "io", "jl", "js", "jx", "ln", "mo", "mobi", "net", "nm", "nx", "org", "qh", "sc", "sd", "sh", "sn", "sx", "tj", "tm", "travel", "tv", "tw", "ws", "xj", "xz", "yn", "zj" );
		$_obfuscate_1dNy = dmeqjch( ".", $_obfuscate_Il8i );
		$_obfuscate_vbQ44Aÿÿ = _obfuscate_d2VxFnoÿ( $_obfuscate_1dNy );
		$_obfuscate_YsvfNwÿÿ = $_obfuscate_1dNy[$_obfuscate_vbQ44Aÿÿ - 2];
		if ( _obfuscate_MGYpc2l6CjYÿ( $_obfuscate_YsvfNwÿÿ, $_obfuscate_uffh ) )
		{
				if ( $_obfuscate_vbQ44Aÿÿ == 2 )
				{
						$_obfuscate_1vAÿ = "www.";
				}
				else
				{
						$_obfuscate_1vAÿ = ".";
				}
				return $_obfuscate_1dNy[$_obfuscate_vbQ44Aÿÿ - 3].$_obfuscate_1vAÿ.$_obfuscate_YsvfNwÿÿ.".".$_obfuscate_1dNy[$_obfuscate_vbQ44Aÿÿ - 1];
		}
		return $_obfuscate_YsvfNwÿÿ.".".$_obfuscate_1dNy[$_obfuscate_vbQ44Aÿÿ - 1];
}

?>
