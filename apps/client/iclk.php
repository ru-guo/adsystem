<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class _obfuscate_N2I4cWN1X2l4
{

		public $dbo = NULL;
		public $zlink = FALSE;
		public $status = "y";

		public function _obfuscate_GA1qZmh4A3px( )
		{
				$p = _obfuscate_GTZ8ZiorMwsNDA��( $_GET['s'] );
				if ( $p )
				{
						$_obfuscate_R07Ah0Seufzf = dmeqjch( ";", $p );
						$_obfuscate_C6kKrmu0Qb7DhLuWrw�� = _obfuscate_KTkfXSxjHBsOcGtoaw��( $_obfuscate_R07Ah0Seufzf[0] );
						$_obfuscate_IXyTvuoNfKb = $_obfuscate_R07Ah0Seufzf[1];
						$this->hashValue = $_obfuscate_IXyTvuoNfKb;
						$_obfuscate_XeL0PLp2EyZWw1e = _obfuscate_K2kO( $_obfuscate_R07Ah0Seufzf[0].$GLOBALS['C_ZYIIS']['url_key'] );
						if ( $_obfuscate_XeL0PLp2EyZWw1e != $_obfuscate_IXyTvuoNfKb )
						{
								exit( "Illicit Referer hx" );
						}
						$this->targeturl = $_obfuscate_R07Ah0Seufzf[2];
						$this->n = ( integer )$_obfuscate_R07Ah0Seufzf[4];
						$this->g = ( integer )$_obfuscate_R07Ah0Seufzf[5];
						$this->x = ( integer )$_obfuscate_R07Ah0Seufzf[6];
						$this->y = ( integer )$_obfuscate_R07Ah0Seufzf[7];
						$this->xx = zaddslashes( $_obfuscate_R07Ah0Seufzf[8] );
						$this->yy = zaddslashes( $_obfuscate_R07Ah0Seufzf[9] );
						$this->t = ( integer )$_obfuscate_R07Ah0Seufzf[10];
						$_obfuscate_C6kKrmu0Qb7DhLuWrw�� = zaddslashes( $_obfuscate_C6kKrmu0Qb7DhLuWrw�� );
						$_obfuscate_XvO4rYV9uZfI = dmeqjch( "|", $_obfuscate_C6kKrmu0Qb7DhLuWrw�� );
						$this->siteurl = $_obfuscate_XvO4rYV9uZfI[1];
						$this->referer = $_obfuscate_XvO4rYV9uZfI[2];
						$this->screen = $_obfuscate_XvO4rYV9uZfI[3];
						$this->timezone = ( integer )$_obfuscate_XvO4rYV9uZfI[4];
						$this->java = ( integer )$_obfuscate_XvO4rYV9uZfI[5];
						$this->flash = $_obfuscate_XvO4rYV9uZfI[6];
						$this->plugins = $_obfuscate_XvO4rYV9uZfI[7];
						$this->mimetypes = $_obfuscate_XvO4rYV9uZfI[8];
						$this->history = ( integer )$_obfuscate_XvO4rYV9uZfI[9];
						$this->scrollheight = $_obfuscate_XvO4rYV9uZfI[10];
						$this->viewtime = $_obfuscate_XvO4rYV9uZfI[11];
						$this->ip = $_obfuscate_XvO4rYV9uZfI[12];
						$this->planid = ( integer )$_obfuscate_XvO4rYV9uZfI[13];
						$this->plantype = $_obfuscate_XvO4rYV9uZfI[14];
						$this->adstypeid = ( integer )$_obfuscate_XvO4rYV9uZfI[15];
						$this->uid = ( integer )$_obfuscate_XvO4rYV9uZfI[16];
						$this->adsid = ( integer )$_obfuscate_XvO4rYV9uZfI[17];
						$this->zoneid = ( integer )$_obfuscate_XvO4rYV9uZfI[18];
						$this->siteid = ( integer )$_obfuscate_XvO4rYV9uZfI[19];
						$this->ua = zaddslashes( $_SERVER['HTTP_USER_AGENT'] );
				}
				else
				{
						$this->zlink = TRUE;
						$this->uid = ( integer )$_GET['uid'];
						$this->zoneid = ( integer )$_GET['zoneid'];
						$this->linkuid = ( integer )$_GET['linkuid'];
						if ( $this->uid && $this->zoneid )
						{
								$this->dbo = gc( );
								$_obfuscate_Dg�� = $this->u = $this->getuserinfo( );
								$m = $this->a = $this->_obfuscate_GnJ4eXxjXxdbcw��( );
								$_obfuscate_KrvAJwM516i = $m['plantype']."zlink";
								if ( $_obfuscate_Dg��[$_obfuscate_KrvAJwM516i] == "2" || $_obfuscate_Dg��[$_obfuscate_KrvAJwM516i] == "1" && _obfuscate_BB84ZzB6bXMtaQ��( _obfuscate_GBcde1sU( $GLOBALS['C_ZYIIS']['zlink_on'], $m['plantype'] ) ) && $m['plantype'] != "cpv" )
								{
										$this->siteurl = zaddslashes( $_SERVER['HTTP_REFERER'] );
										$this->ip = $this->_obfuscate_Kj5hXWY�( );
										$this->planid = $m['planid'];
										$this->adsid = $m['adsid'];
										$this->adstypeid = $m['adstypeid'];
										$this->plantype = $m['plantype'];
										$this->targeturl = $m['url'];
										$this->ua = zaddslashes( $_SERVER['HTTP_USER_AGENT'] );
								}
								else
								{
										exit( "Nzl" );
								}
						}
				}
		}

		public function run( )
		{
				if ( $_COOKIE[$this->uid."_".$this->planid] && ( $this->plantype == "cpc" || $this->plantype == "cpm" || $this->plantype == "cpv" ) )
				{
						$this->_obfuscate_Ynd1bQZwXmRv( );
				}
				if ( !$this->zlink )
				{
						$this->dbo = gc( );
						$this->u = $this->getuserinfo( );
						$this->a = $this->_obfuscate_GnJ4eXxjXxdbcw��( );
				}
				if ( $this->plantype )
				{
						$_obfuscate_8w�� = $this->plantype;
						$_obfuscate_KyA� = $this->$_obfuscate_8w��( $this->a, $this->u );
				}
				else
				{
						exit( "No PlanType" );
				}
				$this->_obfuscate_Ynd1bQZwXmRv( _obfuscate_MC8xOzMOcHk1( $this->a['url'] ) );
		}

		public function _obfuscate_Ynd1bQZwXmRv( $_obfuscate_Il8i = "" )
		{
				if ( $this->plantype == "cpv" )
				{
						exit( "Not Cpv" );
				}
				if ( $_obfuscate_Il8i && $_obfuscate_Il8i != "http://" )
				{
						$this->targeturl = $_obfuscate_Il8i;
				}
				if ( !$this->targeturl )
				{
						exit( "NO URL" );
				}
				if ( !_obfuscate_GBcde1sU( $this->targeturl, "ttp" ) )
				{
						$this->targeturl = _obfuscate_KTkfXSxjHBsOcGtoaw��( $this->targeturl );
				}
				$_obfuscate_Il8i = _obfuscate_aAFqNWoGfQ87Pjg�( array(
						"{uid}",
						"{adsid}",
						"{siteid}"
				), array(
						$this->uid,
						$this->adsid,
						$this->siteid
				), $this->targeturl );
				if ( $this->zlink )
				{
						echo "<noscript><meta http-equiv='refresh' content='0;url=".$_obfuscate_Il8i."'></noscript><a href='".$_obfuscate_Il8i."' id='gourl'></a><script>try{document.getElementById('gourl').click();}catch(ex){window.location.href ='".$_obfuscate_Il8i."';} </script>";
						exit( );
				}
				_obfuscate_d1x0cApj( "Location: ".$_obfuscate_Il8i );
				exit( );
		}

		public function cpc( $m, $_obfuscate_Dg�� )
		{
				if ( $this->flash < 1 && !$this->zlink )
				{
						$this->m = "f";
				}
				if ( $this->status == "y" && $this->_obfuscate_LHUdQ��( ) )
				{
						$this->deduction = $this->getdeduction( $m, $_obfuscate_Dg�� );
						$this->_obfuscate_egQ4HTZ3Cgc�( $m );
						$this->k9ovx1( $m, $_obfuscate_Dg�� );
						$this->_obfuscate_MRV1OX8QC3M5Kmw�( $m );
						$this->_obfuscate_Ayx5AlxdO14VOXRjZ3gWaBcicDFpYX1kGWlfc0Bh( $m );
						$this->_obfuscate_dBxkJhk1LxRxBw��( );
						$this->_obfuscate_bQwaDSIxfhs1( $this->uid."_".$m['planid'], "zy", TIMES + 86400 );
						$_obfuscate_qoWJn0fd = $_COOKIE['clicks'] + 1;
						$this->_obfuscate_bQwaDSIxfhs1( "clicks", $_obfuscate_qoWJn0fd, TIMES + 604800 );
						$_obfuscate_NdA� = $this->adsid."|".$this->uid."|".$this->zoneid."|".$this->planid;
						$this->_obfuscate_bQwaDSIxfhs1( "do2click", $_obfuscate_NdA�, TIMES + 10800, "/" );
						$this->_obfuscate_bQwaDSIxfhs1( "doEffect", $_obfuscate_NdA�, TIMES + 604800, "/" );
				}
		}

		public function cpm( $m, $_obfuscate_Dg�� )
		{
				if ( $this->flash < 1 && !$this->zlink )
				{
						$this->m = "f";
				}
				if ( $this->status == "y" && $this->_obfuscate_LHUdQ��( ) )
				{
						$this->deduction = $this->getdeduction( $m, $_obfuscate_Dg�� );
						$this->_obfuscate_egQ4HTZ3Cgc�( $m );
						$this->k9ovx1( $m, $_obfuscate_Dg�� );
						$this->_obfuscate_MRV1OX8QC3M5Kmw�( $m );
						$this->_obfuscate_Ayx5AlxdO14VOXRjZ3gWaBcicDFpYX1kGWlfc0Bh( $m );
						$this->_obfuscate_dBxkJhk1LxRxBw��( );
						$this->_obfuscate_bQwaDSIxfhs1( $this->uid."_".$m['planid'], "zy", TIMES + 86400 );
						$_obfuscate_qoWJn0fd = $_COOKIE['clicks'] + 1;
						$this->_obfuscate_bQwaDSIxfhs1( "clicks", $_obfuscate_qoWJn0fd, TIMES + 604800 );
						$_obfuscate_NdA� = $this->adsid."|".$this->uid."|".$this->zoneid."|".$this->planid;
						$this->_obfuscate_bQwaDSIxfhs1( "do2click", $_obfuscate_NdA�, TIMES + 10800, "/" );
						$this->_obfuscate_bQwaDSIxfhs1( "doEffect", $_obfuscate_NdA�, TIMES + 604800, "/" );
				}
		}

		public function cpa( $m, $_obfuscate_Dg�� )
		{
				$_obfuscate_Vwty = _obfuscate_IGI7aGd_LDRuMD0VZg��( $this->ip."|".$this->uid."|".$this->adsid."|".$this->siteid."|".$this->zoneid."|".$this->adstypeid."|".$this->siteurl."|".( integer )$_GET['linkuid'] );
				$_obfuscate_BLGxCbw� = _obfuscate_K2kO( $_obfuscate_Vwty.$GLOBALS['C_ZYIIS']['url_key'] );
				$_obfuscate_Vwty = $_obfuscate_Vwty.";".$_obfuscate_BLGxCbw�;
				$this->_obfuscate_bQwaDSIxfhs1( "cpa_key", $_obfuscate_Vwty, TIMES + 2592000, "/" );
				if ( !$_COOKIE[$this->uid."_".$this->planid] )
				{
						$this->_obfuscate_bQwaDSIxfhs1( $this->uid."_".$this->planid, "www.zyiis.com", TIMES + 86400 );
						$_obfuscate_8w�� = $this->dbo->get_one( "SELECT ip FROM zyads_tempcip WHERE day='".DAYS."' AND ip='".$this->ip.( "'  AND zoneid='".$this->zoneid."'" ) );
						if ( !$_obfuscate_8w�� )
						{
								$this->_obfuscate_YTJlZTwfaCkVdg��( $m );
								$this->_obfuscate_MRV1OX8QC3M5Kmw�( $m );
								$this->_obfuscate_Ayx5AlxdO14VOXRjZ3gWaBcicDFpYX1kGWlfc0Bh( $m );
								$_obfuscate_sLLfyVq6Yoc� = "INSERT INTO zyads_tempcip (ip,planid,adsid,zoneid,day) VALUES ('".$this->ip."','{$this->planid}','{$this->adsid}','{$this->zoneid}','".DAYS."')";
								$this->dbo->query( $_obfuscate_sLLfyVq6Yoc�, TRUE );
						}
				}
		}

		public function cps( $m, $_obfuscate_Dg�� )
		{
				$this->cpa( $m, $_obfuscate_Dg�� );
		}

		public function cpv( $m, $_obfuscate_Dg�� )
		{
				$this->cpc( $m, $_obfuscate_Dg�� );
		}

		public function _obfuscate_LHUdQ��( )
		{
				$_obfuscate_3y0Y = "SELECT ip FROM zyads_tempip WHERE ip='".$this->ip."' AND planid=".( integer )$this->planid." ";
				$_obfuscate_gkt = $this->dbo->get_one( $_obfuscate_3y0Y );
				if ( !$_obfuscate_gkt )
				{
						return TRUE;
				}
				return FALSE;
		}

		public function _obfuscate_dBxkJhk1LxRxBw��( )
		{
				$icity = $_COOKIE['icity'];
				if ( !$icity )
				{
						require( APP_DIR."/client/adscity.php" );
						$i = new Client_AdsCity( );
						$q = $i->query( $_SERVER['REMOTE_ADDR'] );
						$i->close( );
						$icity = $q[0];
						$this->_obfuscate_bQwaDSIxfhs1( "icity", $icity, TIMES + 15552000 );
				}
				$e = dmeqjch( "/", $icity );
				list( $province, $city ) = $e;
				$result = $this->dbo->query( "UPDATE zyads_area  SET num = num + 1 WHERE day = '".DAYS."' AND\r\n\t\tuid = '".$this->uid."' AND \r\n\t\tplanid = '".$this->planid.( "' AND city='".$city."' AND province='{$province}'" ), TRUE );
				if ( !$this->dbo->affected_rows( ) )
				{
						$result = $this->dbo->query( "INSERT zyads_area SET num = 1, day = '".DAYS."',planid = '".$this->planid."',uid='".$this->uid."',\r\n\t\t\tcity='".$city."',province='".$province."'", TRUE );
				}
		}

		public function _obfuscate_Ayx5AlxdO14VOXRjZ3gWaBcicDFpYX1kGWlfc0Bh( $m )
		{
				$_obfuscate_3y0Y = "SELECT day FROM `zyads_day`";
				$_obfuscate_Bw�� = $this->dbo->get_one( $_obfuscate_3y0Y );
				$_obfuscate_ymBA0z8nOaJeiw�� = $_obfuscate_Bw��['day'];
				$_obfuscate_YExF32s� = _obfuscate_YwJjMg��( "G", TIMES );
				$_obfuscate_CWa_uXufcA�� = ( integer )_obfuscate_YwJjMg��( "i", TIMES );
				if ( $_obfuscate_YExF32s� == 1 && 1 < $_obfuscate_CWa_uXufcA�� && $_obfuscate_CWa_uXufcA�� < 30 )
				{
						$this->_obfuscate_fQNcdDRrFmMgeg��( );
				}
				if ( $_obfuscate_ymBA0z8nOaJeiw�� < DAYS && 0 <= $_obfuscate_YExF32s� && 1 < $_obfuscate_CWa_uXufcA�� )
				{
						$this->_obfuscate_fQNcdDRrFmMgeg��( );
						$this->_obfuscate_Pit1XCM7MWllNw��( $m );
						if ( $_obfuscate_ymBA0z8nOaJeiw�� )
						{
								$this->dbo->query( "UPDATE `zyads_day` SET `day` = '".DAYS."'" );
						}
						else
						{
								$this->dbo->query( "INSERT INTO `zyads_day` ( `day` ) VALUES ('".DAYS."')" );
						}
						if ( $GLOBALS['C_ZYIIS']['clearing_atuo'] != "1" )
						{
								$this->unionpay( );
						}
				}
		}

		public function _obfuscate_egQ4HTZ3Cgc�( $m )
		{
				$_obfuscate_E7Dl4K8OEg�� = $this->flash;
				$_obfuscate_G6KopQ�� = _obfuscate_YwJjMg��( H, TIMES );
				$_obfuscate_AV_u30S = _obfuscate_YwJjMg��( j, TIMES );
				$this->_obfuscate_YgNwKy4cdnZ4Z30w( $m );
				$_obfuscate_3y0Y = "INSERT INTO zyads_adsip".$_obfuscate_AV_u30S." (uid,advuid ,adsid,adstypeid ,plantype,ip ,siteurl ,referer ,keyword ,screenwh ,timezone ,history ,scrollh,plugins ,useragent ,viewtime ,clicktime ,day ,deduction,planid,info,clicks,linkuid,zoneid,status,n,g,x,y,xx,yy,t,m,price,priceadv,siteid,hour)\r\n\t\t\t\t  VALUES ('{$this->uid}','".$m['advuid'].( "','".$this->adsid."','" ).$m['adstypeid']."', '".$m['plantype'].( "','".$this->ip."','" ).$this->siteurl."', '".$this->referer."', '".$this->keyword."', '".$this->screen."', '".$this->timezone."','".$this->history."','".$this->scrollheight.( "', '".$_obfuscate_E7Dl4K8OEg��."', '" ).$this->ua."', '".$this->viewtime."', '".DATETIMES."', '"._obfuscate_YwJjMg��( "Y-m-d", TIMES )."', '".( integer )$this->deduction."','".$m['planid'].( "','".$_obfuscate_o5fQ1g��."','" ).( integer )$_COOKIE['clicks'].( "','".$this->linkuid."','{$this->zoneid}','{$this->status}','{$this->n}','{$this->g}','{$this->x}','{$this->y}','{$this->xx}','{$this->yy}','{$this->t}','{$this->m}', '" ).$m['price']."', '".$m['priceadv'].( "','".$this->siteid."','{$_obfuscate_G6KopQ��}')" );
				$this->dbo->query( $_obfuscate_3y0Y, TRUE );
		}

		public function _obfuscate_YgNwKy4cdnZ4Z30w( $m )
		{
				$_obfuscate_wS8j5aF6bQ�� = "INSERT INTO zyads_tempip (ip,planid,uid,adsid,zoneid,day,hour,minute)\r\n\t\t\t\t  VALUES ('".$this->ip."','".$m['planid'].( "','".$this->uid."','{$this->adsid}','{$this->zoneid}','" ).DAYS."','"._obfuscate_YwJjMg��( H, TIMES )."','".TIMES."')";
				$this->dbo->query( $_obfuscate_wS8j5aF6bQ��, TRUE );
		}

		public function _obfuscate_Pit1XCM7MWllNw��( $m )
		{
				$this->dbo->query( "TRUNCATE TABLE `zyads_tempip`", TRUE );
				$this->dbo->query( "TRUNCATE TABLE `zyads_tempcip`", TRUE );
				$this->dbo->query( "REPAIR TABLE `zyads_tempip` ", TRUE );
				$this->_obfuscate_YgNwKy4cdnZ4Z30w( $m );
		}

		public function _obfuscate_GnJ4eXxjXxdbcw��( )
		{
				if ( $this->zlink )
				{
						$_obfuscate_YpUjbIYWZA�� = "SELECT viewtype,viewadsid,plantype,siteid,adstypeid  FROM zyads_zone WHERE zoneid=".$this->zoneid;
						$_obfuscate_gQ�� = $this->dbo->get_one( $_obfuscate_YpUjbIYWZA�� );
						if ( !$_obfuscate_gQ�� )
						{
								exit( "z Null Zlink" );
						}
						if ( $_obfuscate_gQ��['viewtype'] == 1 )
						{
								$_obfuscate_LjsiKuc� = dmeqjch( ",", $_obfuscate_gQ��['viewadsid'] );
								$_obfuscate_2TwnvnTFI4tc = ( integer )$_obfuscate_LjsiKuc�[_obfuscate_XHJdJwsLYGUROw��( $_obfuscate_LjsiKuc�, 1 )];
								$_obfuscate_3y0Y = "SELECT a.adsid,a.url,a.status,a.adstypeid,p.planid,p.deduction,p.plantype,p.price,p.priceadv,p.uid,p.expire,p.clearing,p.budget,p.gradeprice,p.s0price,p.s1price,p.s2price,p.s3price,u.money As advmoney,u.uid AS advuid FROM zyads_ads AS a ,zyads_plan As p ,zyads_users As u\r\n\t\t\t\t\tWHERE a.adsid=".$_obfuscate_2TwnvnTFI4tc."  AND a.zlink =1 AND a.planid=p.planid AND p.uid=u.uid AND  p.status = 1 AND  a.status = 3 AND u.status=2";
								$m = $this->dbo->get_one( $_obfuscate_3y0Y );
								if ( !$m )
								{
										$_obfuscate_gQ��['viewtype'] = 0;
								}
						}
						if ( $_obfuscate_gQ��['viewtype'] == 0 )
						{
								$_obfuscate_3y0Y = "SELECT a.adsid,a.url,a.status,adstypeid,p.planid,p.deduction,p.plantype,p.price,p.priceadv,p.uid,p.expire,p.clearing,p.budget,p.gradeprice,p.s0price,p.s1price,p.s2price,p.s3price,u.money As advmoney,u.uid AS advuid FROM zyads_ads AS a ,zyads_plan As p ,zyads_users As u\r\n\t\t\t\t\t\tWHERE p.plantype='".$_obfuscate_gQ��['plantype']."' AND checkplan='true' AND a.zlink =1 AND a.planid=p.planid AND p.uid=u.uid AND  p.status = 1 AND  a.status = 3 AND u.status=2\r\n\t\t\t\t\t\t AND  ((p.restrictions=3 && FIND_IN_SET(".$this->uid.",p.resuid)=0)  OR (p.restrictions=2 && \r\n\t\t\t\t\t\t FIND_IN_SET(".$this->uid.",p.resuid)>0) OR p.restrictions=1)\r\n\t\t\t\t\t\t AND  ((p.sitelimit=3 && FIND_IN_SET(".$_obfuscate_gQ��['siteid'].",p.limitsiteid)=0)  OR (p.sitelimit=2 && \r\n\t\t\t\t\t\t FIND_IN_SET(".$_obfuscate_gQ��['siteid'].",p.limitsiteid)>0) OR p.sitelimit=1)  AND a.headline='' AND a.htmlcode=''";
								$m = $this->dbo->get_all( $_obfuscate_3y0Y );
								if ( $m )
								{
										$m = $m[_obfuscate_XHJdJwsLYGUROw��( $m, 1 )];
								}
								else
								{
										exit( "Not Zlink A" );
								}
						}
						$_obfuscate_abiamDuC = $_obfuscate_gQ��['siteid'];
						$this->siteid = $_obfuscate_abiamDuC;
				}
				else
				{
						$_obfuscate_abiamDuC = $this->siteid;
						$_obfuscate_3y0Y = "SELECT a.adsid,a.url,a.status,a.adstypeid,p.planid,p.deduction,p.plantype,p.price,p.priceadv,p.uid,p.expire,p.clearing,p.budget,p.gradeprice,p.s0price,p.s1price,p.s2price,p.s3price,u.money As advmoney,u.uid AS advuid FROM zyads_ads AS a ,zyads_plan As p ,zyads_users As u\r\n\t\t\t\t\tWHERE a.adsid=".$this->adsid." AND a.planid=p.planid AND p.uid=u.uid AND  p.status = 1 AND  a.status = 3 AND u.status=2";
						$m = $this->dbo->get_one( $_obfuscate_3y0Y );
						if ( !$m )
						{
								$this->_obfuscate_Ynd1bQZwXmRv( );
								exit( "N[a]" );
						}
				}
				if ( $m['gradeprice'] == 1 )
				{
						$_obfuscate_3y0Y = "SELECT grade FROM zyads_site WHERE siteid=".$_obfuscate_abiamDuC." ";
						$_obfuscate_67eJCw�� = $this->dbo->get_one( $_obfuscate_3y0Y );
						$_obfuscate_uRhBzho� = $_obfuscate_67eJCw��['grade'];
						$_obfuscate_hIlG = "s".$_obfuscate_uRhBzho�."price";
						$m['price'] = $m[$_obfuscate_hIlG];
				}
				return $m;
		}

		public function getuserinfo( )
		{
				$_obfuscate_3y0Y = "SELECT cpmdeduction,cpcdeduction,cpadeduction,cpsdeduction,cpvdeduction,cpczlink,cpazlink,cpszlink,cpmzlink FROM zyads_users\r\n\t\t\t\t\t\tWHERE uid=".$this->uid." AND status=2";
				$_obfuscate_Dg�� = $this->dbo->get_one( $_obfuscate_3y0Y );
				if ( !$_obfuscate_Dg�� )
				{
						exit( "N[u]" );
				}
				return $_obfuscate_Dg��;
		}

		public function getdeduction( $m, $_obfuscate_Dg�� )
		{
				$_obfuscate_zAA4KqU1O7pQ�� = $m['plantype']."deduction";
				if ( 0 < $_obfuscate_Dg��[$_obfuscate_zAA4KqU1O7pQ��] )
				{
						$_obfuscate_EI2Aws51QKHQ = $_obfuscate_Dg��[$_obfuscate_zAA4KqU1O7pQ��];
				}
				else if ( 0 < $m['deduction'] )
				{
						$_obfuscate_EI2Aws51QKHQ = $m['deduction'];
				}
				else
				{
						$_obfuscate_h1iWyf7Buk7hYQ�� = $m['plantype']."_deduction";
						$_obfuscate_EI2Aws51QKHQ = $GLOBALS['C_ZYIIS'][$_obfuscate_h1iWyf7Buk7hYQ��];
				}
				$_obfuscate_KhDN1VjP = _obfuscate_amIjeA��( 1, 100 );
				if ( $_obfuscate_KhDN1VjP <= $_obfuscate_EI2Aws51QKHQ )
				{
						$_obfuscate_EI2Aws51QKHQ = 1;
						return $_obfuscate_EI2Aws51QKHQ;
				}
				$_obfuscate_EI2Aws51QKHQ = 0;
				return $_obfuscate_EI2Aws51QKHQ;
		}

		public function k9ovx1( $a, $u )
		{
				$deduction = $this->deduction;
				if ( $a['status'] == "4" )
				{
						require_once( APP_DIR."/client/makecache.php" );
						$this->_obfuscate_JCNoZTdoYgohOBZ0( $a );
				}
				else
				{
						if ( $deduction == 0 )
						{
								$deduction = 0;
								$day_num = 1;
								$sumpay = $a['price'];
								if ( $a['clearing'] == "" )
								{
										$a['clearing'] = "day";
								}
								$moneyType = $a['clearing']."money";
								$result = $this->dbo->query( "UPDATE zyads_users  SET ".$moneyType." = {$moneyType} + ".$a['price'].( " ,nums=nums+1 WHERE uid = '".$this->uid."' " ), TRUE );
						}
						else
						{
								$deduction = 1;
								$day_num = 0;
								$sumpay = 0;
						}
						$result = $this->dbo->query( "UPDATE zyads_users  SET money = money - ".$a['priceadv']." WHERE uid = ".$a['advuid']." ", TRUE );
						$sumadvpay = $a['priceadv'];
						$sumprofit = $a['priceadv'] - $sumpay;
						$this->dbo->query( "INSERT INTO zyads_planstats (plantype,num,deduction,day,sumpay,sumprofit,sumadvpay,planid,uid) VALUES('".$a['plantype']."','".$day_num."','".$deduction."','".DAYS."','".$sumpay."','".$sumprofit."','".$sumadvpay."','".$a['planid']."','".$a['uid'].( "') ON DUPLICATE KEY UPDATE  num = num + ".$day_num.",deduction=deduction+{$deduction},sumpay= sumpay+{$sumpay},sumprofit= sumprofit+{$sumprofit},sumadvpay=sumadvpay+{$sumadvpay}" ), TRUE );
						$this->dbo->query( "INSERT INTO zyads_stats (num,deduction,day,planid,adsid,zoneid,plantype,siteid,uid,adstypeid,linkuid,sumpay,sumprofit,sumadvpay) VALUES('".$day_num."','".$deduction."','".DAYS."','".$a['planid']."','".$this->adsid."','".$this->zoneid."','".$this->plantype."','".$this->siteid."','".$this->uid."','".$this->adstypeid."','".$this->linkuid."','".$sumpay."','".$sumprofit."','".$sumadvpay.( "') ON DUPLICATE KEY UPDATE  num = num + ".$day_num.",deduction=deduction+{$deduction},sumpay= sumpay+{$sumpay},sumprofit= sumprofit+{$sumprofit},sumadvpay=sumadvpay+{$sumadvpay}" ), TRUE );
				}
		}

		public function _obfuscate_YTJlZTwfaCkVdg��( $m )
		{
				$this->dbo->query( "INSERT INTO zyads_planstats (clicks,day,planid,plantype,uid) VALUES(1,'".DAYS."','".$m['planid']."','".$m['plantype']."','".$m['advuid']."') ON DUPLICATE KEY UPDATE  clicks = clicks + 1", TRUE );
				$this->dbo->query( "INSERT INTO zyads_stats (clicks,day,planid,adsid,siteid,zoneid,uid,adstypeid,linkuid) VALUES(1,'".DAYS."','".$m['planid']."','".$this->adsid."','".$this->siteid."','".$this->zoneid."','".$this->uid."','".$_obfuscate_WdrjnvPpQXt1."','".$this->linkuid."') ON DUPLICATE KEY UPDATE  clicks=clicks+1", TRUE );
		}

		public function _obfuscate_MRV1OX8QC3M5Kmw�( $a )
		{
				$randh0 = _obfuscate_amIjeA��( 1, 5 );
				if ( 1 == $randh0 )
				{
						$sql = "Select sumadvpay From zyads_planstats WHERE day= '".DAYS."' AND  planid=".$a['planid']."";
						$q = $this->dbo->get_one( $sql );
						$daySumPrice = $q['sumadvpay'];
						$delCache = "n";
						if ( $a['budget'] <= $daySumPrice )
						{
								$q = $this->dbo->query( "UPDATE zyads_plan SET status=3 WHERE planid=".$a['planid'] );
								$delCache = "y";
						}
						if ( !( $a['expire'] != "0000-00-00" ) && $a['expire'] <= DAYS || $a['advmoney'] < 1 )
						{
								$re = $this->dbo->query( "UPDATE zyads_plan SET status=4 WHERE planid=".$a['planid'] );
								$delCache = "y";
						}
						if ( $delCache == "y" )
						{
								require_once( APP_DIR."/client/makecache.php" );
								$this->_obfuscate_JCNoZTdoYgohOBZ0( $a );
						}
				}
		}

		public function _obfuscate_fQNcdDRrFmMgeg��( )
		{
				$_obfuscate_Bw�� = $this->dbo->query( "UPDATE zyads_plan SET status=1 WHERE status=3", TRUE );
		}

		public function unionpay( )
		{
				$_obfuscate_crAB0vjhtcWJh9E� = _obfuscate_YwJjMg��( "w", TIMES );
				$_obfuscate_8M1JmHVUgGnGSgJ = _obfuscate_YwJjMg��( "j", TIMES );
				$_obfuscate__TVkLEk� = dmeqjch( ",", $GLOBALS['C_ZYIIS']['clearing_cycle'] );
				$_obfuscate_ymBA0z8nOaJeiw�� = $this->daydate;
				if ( _obfuscate_MGYpc2l6CjY�( "day", $_obfuscate__TVkLEk� ) )
				{
						$this->_obfuscate_bTJoIhx1JWBt( "day" );
				}
				if ( $_obfuscate_crAB0vjhtcWJh9E� == $GLOBALS['C_ZYIIS']['clearing_weekdata'] && _obfuscate_MGYpc2l6CjY�( "week", $_obfuscate__TVkLEk� ) )
				{
						$this->_obfuscate_bTJoIhx1JWBt( "week" );
				}
				if ( $_obfuscate_8M1JmHVUgGnGSgJ == $GLOBALS['C_ZYIIS']['clearing_monthdata'] && _obfuscate_MGYpc2l6CjY�( "month", $_obfuscate__TVkLEk� ) )
				{
						$this->_obfuscate_bTJoIhx1JWBt( "month" );
				}
		}

		public function _obfuscate_bTJoIhx1JWBt( $_obfuscate_oXQIdyfy1gfs8Jc )
		{
				$_obfuscate_62UDVDZv827 = $_obfuscate_oXQIdyfy1gfs8Jc."money";
				$_obfuscate_3y0Y = "SELECT uid,".$_obfuscate_62UDVDZv827.",xmoney FROM zyads_users\r\n\t\t\t\t\tWHERE ({$_obfuscate_62UDVDZv827}+xmoney)>=".$GLOBALS['C_ZYIIS']['min_clearing']." AND status = 2 AND type=1 ";
				$_obfuscate_fkg� = $this->dbo->get_all( $_obfuscate_3y0Y );
				foreach ( ( array )$_obfuscate_fkg� as $_obfuscate_Dg�� )
				{
						$_obfuscate__klLO5U� = $_obfuscate_Dg��[$_obfuscate_62UDVDZv827];
						$_obfuscate_cjcm = $GLOBALS['C_ZYIIS']['clearing_tax'] / 100;
						$_obfuscate_cjcm = ovhsc( $_obfuscate__klLO5U� * $_obfuscate_cjcm, 3 );
						$_obfuscate_y47Gyj9bRw�� = $GLOBALS['C_ZYIIS']['clearing_charges'] / 100;
						$_obfuscate_y47Gyj9bRw�� = ovhsc( $_obfuscate__klLO5U� * $_obfuscate_y47Gyj9bRw��, 3 );
						$_obfuscate_wEs8 = ovhsc( _obfuscate_G3Uo( $_obfuscate__klLO5U� ) - $_obfuscate_cjcm - $_obfuscate_y47Gyj9bRw�� + _obfuscate_G3Uo( $_obfuscate_Dg��['xmoney'] ), 2 );
						$_obfuscate_gStjI54� = $this->dbo->get_one( "SELECT uid from zyads_paylog Where addtime='".DAYS."' AND uid=".$_obfuscate_Dg��['uid'].( " AND clearingtype='".$_obfuscate_oXQIdyfy1gfs8Jc."'" ) );
						if ( !$_obfuscate_gStjI54�['uid'] )
						{
								$_obfuscate_3y0Y = "Insert INTO `zyads_paylog` (`uid`, `xmoney`, `money`, `tax`, `charges`, `pay`, `addtime`,clearingtype)\r\n\t          \t\t\tVALUES ('".$_obfuscate_Dg��['uid']."', '".$_obfuscate_Dg��['xmoney']."', '".$_obfuscate__klLO5U�.( "', '".$_obfuscate_cjcm."', '{$_obfuscate_y47Gyj9bRw��}', '{$_obfuscate_wEs8}', '" ).DAYS.( "','".$_obfuscate_oXQIdyfy1gfs8Jc."')" );
								$_obfuscate_Bw�� = $this->dbo->query( $_obfuscate_3y0Y, TRUE );
								$_obfuscate_3y0Y = "UPDATE zyads_users SET ".$_obfuscate_62UDVDZv827."=0,xmoney=0 WHERE uid=".$_obfuscate_Dg��['uid']."";
								$_obfuscate_Bw�� = $this->dbo->query( $_obfuscate_3y0Y, TRUE );
						}
				}
		}

		public function _obfuscate_Z3MVMgIBYChyD3puEA��( $_obfuscate_62UDVDZv827 )
		{
				$_obfuscate_3y0Y = "SELECT uid,".$_obfuscate_62UDVDZv827.",xmoney FROM zyads_users\r\n\t\t\t\t\tWHERE status = 2 AND type=1 AND {$_obfuscate_62UDVDZv827}>=".$GLOBALS['C_ZYIIS']['min_clearing']."";
				$_obfuscate_Bw�� = $this->dbo->get_all( $_obfuscate_3y0Y );
				return $_obfuscate_Bw��;
		}

		public function _obfuscate_JCNoZTdoYgohOBZ0( $_obfuscate_8w�� )
		{
				$_obfuscate_3y0Y = "SELECT a.adstypeid,p.plantype,a.width,a.height,at.framework FROM zyads_plan AS p,zyads_ads AS a,zyads_adstype AS at\r\n\t\t\t\t\tWhere p.planid=".$_obfuscate_8w��['planid']." AND a.planid=p.planid AND a.adstypeid=at.adstypeid";
				$_obfuscate_TI9z = $this->dbo->get_all( $_obfuscate_3y0Y );
				foreach ( ( array )$_obfuscate_TI9z as $m )
				{
						if ( $m['framework'] == "iframe" )
						{
								$_obfuscate_JTe7jJ4eGW8� = $m['plantype']."_".$m['adstypeid']."_".$m['width']."_".$m['height'];
						}
						else
						{
								$_obfuscate_JTe7jJ4eGW8� = $m['plantype']."_".$m['adstypeid'];
						}
						deladscache( $_obfuscate_JTe7jJ4eGW8� );
				}
		}

		public function _obfuscate_Kj5hXWY�( )
		{
				return $_SERVER['REMOTE_ADDR'];
		}

		public function _obfuscate_bQwaDSIxfhs1( $_obfuscate_3gn_eQ��, $_obfuscate_VgKtFeg�, $_obfuscate_qOmXDu8y = 0 )
		{
				$_obfuscate_1nzIGhAQcdRSghGz6f34sg�� = "Powered by Www.Zyiis.Com 2005-2010";
				$_obfuscate_3fES1zrS9Q9N .= "CP=\"".$_obfuscate_1nzIGhAQcdRSghGz6f34sg��."\"";
				_obfuscate_d1x0cApj( "P3P: ".$_obfuscate_3fES1zrS9Q9N );
				_obfuscate_bQwaDSIxfhs1( $_obfuscate_3gn_eQ��, $_obfuscate_VgKtFeg�, $_obfuscate_qOmXDu8y, "/" );
		}

		public function dexit( )
		{
				$_obfuscate_lEGQqw�� = "<!DOCTYPE HTML PUBLIC '-//IETF//DTD HTML 2.0//EN'>\r\n\t\t\t\t<html><head>\r\n\t\t\t\t<title>404 Not Found</title>\r\n\t\t\t\t</head><body>\r\n\t\t\t\t<h1>Not Found</h1>\r\n\t\t\t\t<p>The requested URL  was not found on this server.</p>\r\n\t\t\t\t</body></html>";
				exit( $_obfuscate_lEGQqw�� );
		}

		public function _obfuscate_ARsFHCw9L3M�( $_obfuscate_JTe7jJ4eGW8�, $_obfuscate_hoeokj1 = "rb+" )
		{
				$_obfuscate_6hS1Rw�� = @_obfuscate_cRUcEgs�( $_obfuscate_JTe7jJ4eGW8�, $_obfuscate_hoeokj1 );
				@_obfuscate_EnE7KQ4�( $_obfuscate_6hS1Rw��, LOCK_EX );
				$_obfuscate_iy7MIWeVxVc� = @_obfuscate_XGMubSc�( $_obfuscate_6hS1Rw��, @_obfuscate_cm5gGykQeng�( $_obfuscate_JTe7jJ4eGW8� ) );
				@rewind( $_obfuscate_6hS1Rw�� );
				return array(
						$_obfuscate_6hS1Rw��,
						$_obfuscate_iy7MIWeVxVc�
				);
		}

		public function _obfuscate_a10PFjV0b2t0( $_obfuscate_JTe7jJ4eGW8�, $_obfuscate_6RYLWQ��, $_obfuscate_iUdm8Jn7 )
		{
				if ( !_obfuscate_B2chbS9wCA��( $_obfuscate_JTe7jJ4eGW8� ) )
				{
						@_obfuscate_KGoqYxl3a2YhAig5DnlwJj0�( $_obfuscate_JTe7jJ4eGW8�, $_obfuscate_6RYLWQ�� );
						@_obfuscate_d2YILG4C( $_obfuscate_iUdm8Jn7 );
				}
				else
				{
						@_obfuscate_ICIBfDI�( $_obfuscate_iUdm8Jn7, $_obfuscate_6RYLWQ�� );
						@_obfuscate_ZmEBMx9wLW47( $_obfuscate_iUdm8Jn7, @_obfuscate_IHNwNyJo( $_obfuscate_6RYLWQ�� ) );
						@_obfuscate_d2YILG4C( $_obfuscate_iUdm8Jn7 );
				}
		}

}

?>
