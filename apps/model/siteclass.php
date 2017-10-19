<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_SiteClass
{

		public $dbo = NULL;

		public function model_siteclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function getsitenametype( )
		{
				$sql = "SELECT sitename,sitetype from zyads_site  Order By siteid Desc Limit 0,8 ";
				return $this->dbo->get_all( $sql );
		}

		public function getuidsitedetail( )
		{
				$sql = "SELECT * FROM zyads_site\r\n    \t\t\tWHERE  uid=".( integer )$_SESSION['uid']." \r\n    \t\t\tOrder By siteid desc";
				return $this->dbo->get_all( $sql );
		}

		public function getuidsitestatus3detail( )
		{
				$siteid = ( integer )$_REQUEST['siteid'];
				$xwhere = "";
				if ( $siteid )
				{
						$xwhere = " AND siteid=".$siteid;
				}
				$sql = "SELECT * FROM zyads_site\r\n    \t\t\tWHERE  uid=".( integer )$_SESSION['uid'].( " AND status = 3 ".$xwhere." " );
				return $this->dbo->get_all( $sql );
		}

		public function getuidsitestatus3orderdetail( )
		{
				$sql = "SELECT * FROM zyads_site\r\n    \t\t\tWHERE  uid=".( integer )$_SESSION['uid']." AND status = 3\r\n    \t\t\tOrder By siteid desc";
				return $this->dbo->get_all( $sql );
		}

		public function auditstauts( $planid, $siteid )
		{
				$sql = "SELECT audit.status FROM zyads_site As site , zyads_audit As audit\r\n    \t\t\tWHERE  site.uid=".( integer )$_SESSION['uid'].( " AND audit.siteid = '".$siteid.( "'  AND site.status = 3  \r\n    \t\t\tAND audit.siteid = site.siteid AND audit.planid = ".$planid ) );
				return $this->dbo->get_one( $sql );
		}

		public function zyads_siteuidone( $siteid = "" )
		{
				if ( !$siteid )
				{
						$siteid = $_REQUEST['siteid'];
				}
				$sql = "SELECT * FROM zyads_site\r\n    \t\t\tWHERE  uid=".$_SESSION['uid']." \r\n    \t\t\tAND siteid=".( integer )$siteid;
				return $this->dbo->get_one( $sql );
		}

		public function getsiteidstourl( $v )
		{
				$sql = "SELECT siteid FROM zyads_site\r\n    \t\t\tWHERE  siteurl='".$v."' or FIND_IN_SET('".$v."',pertainurl )>0 ";
				$b = $this->dbo->get_one( $sql );
				if ( $b )
				{
						return "re";
				}
		}

		public function zoneandsitedetail( )
		{
				$zoneid = ( integer )$_REQUEST['zoneid'];
				$sql = "SELECT z.*,s.sitetype,s.sitename,s.siteurl FROM zyads_zone AS z ,zyads_site AS s\r\n    \t\t\tWHERE  z.zoneid=".$zoneid." AND z.uid=".( integer )$_SESSION['uid']."  AND z.siteid=s.siteid";
				$b = $this->dbo->get_one( $sql );
				if ( !$b )
				{
						exit( "No Zoneid" );
				}
				return $b;
		}

		public function getzonenamebyzonename( $zonename )
		{
				$sql = "SELECT zonename FROM zyads_zone\r\n    \t\t\tWHERE  uid=".( integer )$_SESSION['uid'].( " \r\n    \t\t\tAND zonename='".$zonename."'" );
				return $this->dbo->get_num( $sql );
		}

		public function getzonesiteurldetail( )
		{
				$sql = "SELECT z.*,s.siteurl FROM zyads_zone as z,zyads_site as s\r\n    \t\t\tWHERE  z.uid=".$_SESSION['uid']."  AND z.siteid=s.siteid  ORDER By z.zoneid DESC";
				return $this->dbo->get_all( $sql );
		}

		public function getzonesitebysqlsandnums( )
		{
				$siteid = ( integer )$_GET['siteid'];
				$width = $_GET['width'];
				$height = $_GET['height'];
				$adstypeid = ( integer )$_GET['adstypeid'];
				$zonetype = $_GET['zonetype'];
				$plantype = $_GET['plantype'];
				$zonename = $_GET['zonename'];
				if ( 10 < strlen( $zonename ) )
				{
						exit( "Not zone" );
				}
				$whadstypeid = $whsiteid = $whzonetype = $whzonename = "";
				if ( $adstypeid )
				{
						$whadstypeid = " AND z.adstypeid=".$adstypeid;
				}
				if ( $siteid )
				{
						$whsiteid = " AND z.siteid=".$siteid;
				}
				if ( $width != "" && $height != "" )
				{
						$whwidheight = " AND z.width=".( integer )$width." AND z.height=".( integer )$height." ";
				}
				if ( $zonetype != "" )
				{
						$whzonetype = " AND z.zonetype='".$zonetype."'";
				}
				if ( $plantype != "" )
				{
						$shadstypeid = " AND z.plantype='".$plantype."'";
				}
				if ( $zonename != "" )
				{
						$whzonename = " AND z.zonename like '%".$zonename."%'";
				}
				$sql = "SELECT z.*,s.siteurl,s.sitetype,s.siteid,s.status,s.denyinfo  FROM zyads_zone as z,zyads_site as s\r\n    \t\t\tWHERE  z.uid=".$_SESSION['uid'].( " ".$whsiteid.( " ".$whwidheight." {$whzonetype} {$shadstypeid}  {$whzonename} {$whadstypeid} AND z.siteid=s.siteid  ORDER By z.zoneid DESC" ) );
				$ssql = "SELECT count(*) n FROM zyads_zone as z,zyads_site as s\r\n    \t\t\tWHERE  z.uid=".$_SESSION['uid'].( " ".$whsiteid.( " ".$whwidheight." {$whzonetype} {$shadstypeid}  {$whzonename}  {$whadstypeid} AND z.siteid=s.siteid" ) );
				return $sql."|".$ssql;
		}

		public function getadsplantype( $plantype, $adstype, $width, $height )
		{
				if ( $adstype == "imgtw" )
				{
						$whadstype = " AND (a.adstype = 'img' || a.adstype = 'tw') ";
				}
				else
				{
						$whadstype = " AND a.adstype='".$adstype."' ";
				}
				if ( 1 < $width && 1 < $height && !in_array( $adstype, array( "wz", "cpm", "vp" ) ) )
				{
						$condition = " AND a.width = '".$width.( "' AND a.height='".$height."'" );
				}
				$sql = "SELECT a.adsid FROM zyads_ads AS a ,zyads_plan AS p WHERE a.planid=p.planid\r\n    \t\t\tAND p.plantype='".$plantype.( "' ".$whadstype." {$condition}\r\n    \t\t\tAND a.status=3 AND p.status=1 \r\n    \t\t\t" );
				return $this->dbo->get_num( $sql );
		}

		public function getsiteuiddetail( )
		{
				$sql = "SELECT * FROM zyads_site\r\n    \t\t\tWHERE  uid=".( integer )$_SESSION['uid'];
				return $this->dbo->get_num( $sql );
		}

		public function getzoneuiddetail( )
		{
				$sql = "SELECT * FROM zyads_zone\r\n    \t\t\tWHERE  uid=".( integer )$_SESSION['uid'];
				return $this->dbo->get_num( $sql );
		}

		public function getzonenamebyzoneid( $zoneid )
		{
				$sql = "SELECT z.*,s.sitename,s.siteurl FROM zyads_zone AS z,zyads_site AS s\r\n    \t\t\tWHERE  z.uid=".( integer )$_SESSION['uid'].( " AND z.zoneid=".$zoneid." AND z.siteid=s.siteid " );
				return $this->dbo->get_one( $sql );
		}

		public function getnumzoneid( $siteid )
		{
				$siteid = ( integer )$siteid;
				$sql = "SELECT * FROM zyads_zone\r\n    \t\t\tWHERE  uid=".( integer )$_SESSION['uid'].( " AND siteid=".$siteid." " );
				return $this->dbo->get_num( $sql );
		}

		public function getactivenumzoneid( $siteid )
		{
				$siteid = ( integer )$siteid;
				$sql = "SELECT count(s.zoneid) as n FROM zyads_stats AS s ,zyads_zone AS z\r\n    \t\t\tWHERE  s.uid=".$_SESSION['uid'].( " AND s.zoneid=z.zoneid AND z.siteid=".$siteid."  AND s.day='" ).DAYS."' ";
				$b = $this->dbo->get_one( $sql );
				return $b['n'];
		}

		public function getzonesiteidzone( $siteid )
		{
				$sql = "SELECT * FROM zyads_zone  WHERE  siteid=".( integer )$siteid;
				return $this->dbo->get_all( $sql );
		}

		public function getuidservicestatustype( )
		{
				$sql = "SELECT s.siteid From zyads_site AS s,zyads_users AS u WHERE s.uid=u.uid AND u.serviceid='".$_SESSION['serviceid']."' AND s.status=0";
				$array = $this->dbo->get_num( $sql );
				return $array;
		}

		public function getsiteuserservicedetail( )
		{
				$sql = "SELECT s.*,u.username From zyads_site AS s,zyads_users AS u WHERE s.uid=u.uid AND u.serviceid='".$_SESSION['serviceid']."' AND s.status=0 AND date_format(addtime,'%Y-%m-%d') = '".DAYS."'";
				$array = $this->dbo->get_all( $sql );
				return $array;
		}

		public function getsiteusersiteiddetail( $siteid = "" )
		{
				$siteid = !$siteid ? ( integer )$_REQUEST['siteid'] : $siteid;
				$sql = "SELECT s.*,u.username From zyads_site AS s,zyads_users AS u WHERE s.uid=u.uid AND u.serviceid='".$_SESSION['serviceid'].( "' AND  s.siteid=".$siteid );
				$array = $this->dbo->get_one( $sql );
				return $array;
		}

		public function updateadsitename( )
		{
				$siteid = ( integer )$_POST['siteid'];
				$sitename = $_POST['sitename'];
				$siteurl = $_POST['siteurl'];
				$siteinfo = $_POST['siteinfo'];
				$sitetype = $_POST['sitetype'];
				$pertainurl = $_POST['pertainurl'];
				$beian = $_POST['beian'];
				$eusersiteiddetail = $this->getsiteusersiteiddetail( );
				if ( !$eusersiteiddetail )
				{
						exit( "Not Site" );
				}
				$sql = "UPDATE  zyads_site Set\r\n\t\t\tsitename = '".$sitename.( "',\r\n\t\t\tsiteurl = '".$siteurl."',\r\n\t\t\tsiteinfo = '{$siteinfo}',\r\n\t\t\tsitetype = '{$sitetype}',\r\n\t\t\tpertainurl = '{$pertainurl}',\r\n\t\t\tbeian = '{$beian}'\r\n\t\t\tWHERE siteid={$siteid}" );
				$this->dbo->query( $sql );
				$getzoneidsitedidvalue = $this->getzoneidsitedid( $siteid );
				foreach ( ( array )$getzoneidsitedidvalue as $value )
				{
						$this->delzoneidcache( $value['zoneid'] );
				}
		}

		public function getsitedetailsqlandnum( )
		{
				$actiontype = $_REQUEST['actiontype'];
				$metadata = $_GET['status'];
				$condition = "";
				if ( $actiontype == "search" )
				{
						$searchtype = h( $_REQUEST['searchtype'] );
						$searchval = h( trim( $_REQUEST['searchval'] ) );
						if ( $searchtype == "1" )
						{
								$condition = " AND  u.username like '%".$searchval."%'";
						}
						else if ( $searchtype == "2" )
						{
								$condition = "  AND  s.siteurl ='".$searchval."'";
						}
						else if ( $searchtype == "3" )
						{
								$condition = "  AND  s.sitename ='".$searchval."'";
						}
				}
				if ( $metadata != "" )
				{
						$condition .= "  AND  s.status =".( integer )$metadata;
				}
				$sql = "SELECT s.*,u.username From zyads_site AS s,zyads_users AS u WHERE s.uid=u.uid AND u.serviceid='".$_SESSION['serviceid'].( "' ".$condition." Order By  siteid DESC" );
				$ssql = "SELECT count(*) AS n From zyads_site AS s,zyads_users AS u WHERE s.uid=u.uid AND u.serviceid='".$_SESSION['serviceid'].( "' ".$condition." " );
				return $sql."|".$ssql;
		}

		public function create_zyads_site( $type = "" )
		{
				$sitename = $_POST['sitename'];
				$siteurl = $_POST['siteurl'];
				$pertainurl = $_POST['pertainurl'];
				$pertainurl = str_replace( "\r\n", ",", $pertainurl );
				$siteinfo = $_POST['siteinfo'];
				$sitetype = $_POST['sitetype'];
				$beian = $_POST['beian'];
				if ( empty( $sitename ) || empty( $siteurl ) )
				{
						redirect( "?action=sitelist" );
				}
				if ( $type == "admin" )
				{
						$usercla = Z::getsingleton( "model_userclass" );
						$username = $_POST['username'];
						$grade = ( integer )$_POST['grade'];
						$i = $usercla->gettusernamerow( $username );
						$nfuid = $i['uid'];
				}
				else
				{
						$nfuid = $_SESSION['uid'];
						$grade = 0;
						if ( $GLOBALS['C_ZYIIS']['reg_type'] == 2 )
						{
								$xx = $_SESSION[$siteurl];
								if ( $xx != "ok" )
								{
										message( "no_siteck" );
								}
						}
				}
				$sql = "SELECT siteurl FROM zyads_site  WHERE  siteurl='".$siteurl."'";
				$url_num = $this->dbo->get_num( $sql );
				if ( $url_num )
				{
						message( "siteurl_num", "?action=createsite" );
				}
				$url = explode( ".", $siteurl );
				$domain = getdomain( $siteurl );
				if ( $url[0] == "www" )
				{
						$pertainurl .= ",".$domain;
				}
				else
				{
						$pertainurl .= ",www.".$domain;
				}
				$array = array(
						"sitename" => $sitename,
						"siteurl" => $siteurl,
						"pertainurl" => trim( $pertainurl, "," ),
						"siteinfo" => $siteinfo,
						"sitetype" => $sitetype,
						"beian" => $beian,
						"grade" => $grade,
						"addtime" => DATETIMES,
						"status" => $GLOBALS['C_ZYIIS']['site_status'],
						"uid" => $nfuid
				);
				$query = $this->dbo->create( $array, "zyads_site" );
				return $this->dbo->insert_id( );
		}

		public function updatezyadsitename( )
		{
				$siteid = ( integer )$_POST['siteid'];
				$sitename = $_POST['sitename'];
				$siteinfo = $_POST['siteinfo'];
				$sitetype = $_POST['sitetype'];
				$beian = $_POST['beian'];
				if ( empty( $sitename ) || empty( $siteinfo ) )
				{
						redirect( "?action=sitelist" );
				}
				$sql = "UPDATE  zyads_site Set\r\n\t\t\tsitename = '".$sitename.( "',\r\n\t\t\tsiteinfo = '".$siteinfo."',\r\n\t\t\tsitetype = '{$sitetype}',\r\n\t\t\tbeian = '{$beian}'\r\n\t\t\tWHERE siteid={$siteid} AND uid =" ).$_SESSION['uid'];
				return $this->dbo->query( $sql );
		}

		public function delzyadsite( )
		{
				$siteid = ( integer )$_GET['siteid'];
				$sql = "DELETE FROM zyads_site WHERE uid=".$_SESSION['uid'].( " AND siteid=".$siteid );
				$query = $this->dbo->query( $sql );
		}

		public function ckzonedata( $plantype, $adstypeid, $siteid, $width, $height )
		{
				$sql = "SELECT * FROM zyads_zone  WHERE  siteid=".( integer )$siteid." AND plantype='".$plantype."' AND adstypeid=".$adstypeid." AND width=".$width."  AND height=".$height."";
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function updatezonetypes( )
		{
				$zoneid = h( $_GET['zoneid'] );
				$zonetype = h( $_GET['zonetype'] );
				if ( $zonetype == "img" )
				{
						$zonetype = "txt";
				}
				if ( $zonetype == "txt" )
				{
						$zonetype = "img";
				}
				$sql = "UPDATE  zyads_zone Set zonetype = '".$zonetype.( "'\r\n\t\t\tWHERE zoneid=".$zoneid." AND uid =" ).$_SESSION['uid'];
				$this->dbo->query( $sql );
				$this->makezone( $zoneid );
				return TRUE;
		}

		public function create_zone_info( )
		{
				$query = $this->zyads_siteuidone( );
				if ( !$query )
				{
						message( "siteid_null" );
				}
				$width = ( integer )$_POST['width'];
				$height = ( integer )$_POST['height'];
				$zonename = $_POST['zonename'];
				$zoneinfo = $_POST['zoneinfo'];
				$plantype = $_POST['plantype'];
				$siteid = $_POST['siteid'];
				$zonetype = $_POST['adstype'];
				$adstypeid = ( integer )$_POST['adstypeid'];
				$viewtype = ( integer )$_POST['viewtype'];
				$adsid = @implode( ",", $_POST['adsid'] );
				$alternatetype = $_POST['alternatetype'];
				$alternateurl = $_POST['alternateurl'];
				$color_headline = $_POST['color_headline'];
				$color_description = $_POST['color_description'];
				$color_dispurl = $_POST['color_dispurl'];
				$color_border = $_POST['color_border'];
				$color_background = $_POST['color_background'];
				$zonejys = $_POST['zonejys'];
				if ( $plantype == "cpm" )
				{
						( integer )$_POST['cpmtimetype'] == 0 ? ( $cpmtime = 0 ) : ( $cpmtime = ( integer )$_POST['cpmtime'] );
				}
				if ( $adstypeid == 13 )
				{
						$codestyle = array(
								"color_headline" => $color_headline,
								"color_description" => $color_description,
								"color_dispurl" => $color_dispurl,
								"color_border" => $color_border,
								"color_background" => $color_background,
								"zonejys" => $zonejys,
								"copyimages" => $this->sstream( $color_border )
						);
						$specses = explode( "x", $_POST['specs'] );
						$width = ( integer )$specses[0];
						$height = ( integer )$specses[1];
				}
				$array = array(
						"zonename" => $zonename,
						"width" => empty( $width ) ? 0 : $width,
						"height" => empty( $height ) ? 0 : $height,
						"zoneinfo" => $zoneinfo,
						"zonetype" => $zonetype,
						"plantype" => $plantype,
						"viewtype" => $viewtype,
						"adstypeid" => $adstypeid,
						"viewadsid" => $viewtype == 1 ? $adsid : "",
						"alternatetype" => $alternatetype == 1 ? $alternatetype : 0,
						"alternateurl" => $alternateurl,
						"siteid" => $siteid,
						"codestyle" => $codestyle ? serialize( $codestyle ) : "",
						"uid" => $_SESSION['uid'],
						"addtime" => DATETIMES,
						"cpmtime" => $cpmtime
				);
				$this->dbo->create( $array, "zyads_zone" );
				$zoneid = $this->dbo->insert_id( );
				return $zoneid;
		}

		public function tcpmtcodestyle( )
		{
				$zoneid = ( integer )$_POST['zoneid'];
				$adstypeid = ( integer )$_POST['adstypeid'];
				( integer )$_POST['cpmtimetype'] == 0 ? ( $cpmtime = 0 ) : ( $cpmtime = ( integer )$_POST['cpmtime'] );
				$zonename = h( $_POST['zonename'] );
				$zoneinfo = h( $_POST['zoneinfo'] );
				$zonetype = h( $_POST['zonetype'] );
				$viewtype = isset( $_POST['viewtype'] ) ? h( $_POST['viewtype'] ) : 0;
				$adsid = isset( $_POST['adsid'] ) ? implode( ",", @h( $_POST['adsid'] ) ) : "";
				$alternatetype = isset( $_POST['alternatetype'] ) ? h( $_POST['alternatetype'] ) : 0;
				$alternateurl = isset( $_POST['alternateurl'] ) ? h( $_POST['alternateurl'] ) : "";
				if ( $adstypeid == 13 )
				{
						$color_headline = h( $_POST['color_headline'] );
						$color_description = h( $_POST['color_description'] );
						$color_dispurl = h( $_POST['color_dispurl'] );
						$color_border = h( $_POST['color_border'] );
						$color_background = h( $_POST['color_background'] );
						$zonejys = h( $_POST['zonejys'] );
						$codestyle = array(
								"color_headline" => $color_headline,
								"color_description" => $color_description,
								"color_dispurl" => $color_dispurl,
								"color_border" => $color_border,
								"color_background" => $color_background,
								"zonejys" => $zonejys,
								"copyimages" => $this->sstream( $color_border )
						);
						$updateaddtion = " ,codestyle='".serialize( $codestyle )."'";
				}
				if ( isset( $viewtype ) )
				{
						$condition = "viewtype = ".$viewtype.",";
				}
				$sql = "UPDATE  zyads_zone Set\r\n\t\t\tcpmtime = '".$cpmtime.( "',\r\n\t\t\tzonename = '".$zonename."',\r\n\t\t\tzoneinfo = '{$zoneinfo}',\r\n\t\t\tviewtype = {$viewtype},\r\n\t\t\tviewadsid = '{$adsid}' ,\r\n\t\t\talternatetype = {$alternatetype} ,\r\n\t\t\talternateurl = '{$alternateurl}' {$updateaddtion}\r\n\t\t\tWHERE zoneid={$zoneid} AND uid =" ).$_SESSION['uid'];
				$this->dbo->query( $sql );
				$this->makezone( $zoneid );
				return TRUE;
		}

		public function deletezoneuid( )
		{
				$zoneid = ( integer )$_GET['zoneid'];
				$sql = "DELETE FROM zyads_zone WHERE uid=".$_SESSION['uid'].( " AND zoneid=".$zoneid );
				$query = $this->dbo->query( $sql );
		}

		public function tsitetypeparents( )
		{
				$sql = "SELECT * FROM `zyads_sitetype`\r\n\t\t\t\tWHERE parentid>0";
				return $this->dbo->get_all( $sql );
		}

		public function makezone( $zoneid )
		{
				require_once( LIB_DIR."/cache/cache_".$GLOBALS['C_ZYIIS']['cache_type'].".php" );
				require_once( APP_DIR."/client/makecache1.php" );
				$cache = makezone( $this->dbo, $zoneid );
		}

		public function sstream( $arg )
		{
				$j = 0;
				for ( ;	$j < 6;	$j += 2	)
				{
						$stream[] = $arg[$j].$arg[$j + 1];
				}
				$stream = hexdec( $stream[0] ).",".hexdec( $stream[1] ).",".hexdec( $stream[2] );
				$stream = explode( ",", $stream );
				0.3 * $stream[0] + 0.59 * $stream[1] + 0.11 * $stream[2] <= 128 ? ( $stream = "w" ) : ( $stream = "b" );
				return $stream;
		}

		public function getzoneandsite( $zoneid )
		{
				$sql = "SELECT * FROM zyads_zone AS z,zyads_site AS s\r\n    \t\t\tWHERE  z.zoneid=".( integer )$zoneid." AND z.siteid=s.siteid";
				return $this->dbo->get_one( $sql );
		}

		public function adszonecount( $plantype )
		{
				$sql = "SELECT count(*) AS num FROM zyads_zone\r\n    \t\t\tWHERE  plantype='".$plantype."'";
				return $this->dbo->get_one( $sql );
		}

		public function tzyads_zone_num( $adstypeid )
		{
				$sql = "SELECT count(*) AS num FROM zyads_zone\r\n    \t\t\tWHERE  adstypeid=".( integer )$adstypeid;
				return $this->dbo->get_one( $sql );
		}

		public function gzyadsusersqlsandnums( )
		{
				$metadata = $_REQUEST['status'];
				$searchtype = $_REQUEST['searchtype'];
				$searchval = trim( $_REQUEST['searchval'] );
				$actiontype = $_REQUEST['actiontype'];
				$sitetype = $_REQUEST['sitetype'];
				$grade = $_REQUEST['grade'];
				$alexapr = $_REQUEST['alexapr'];
				$alexaprval = ( integer )$_REQUEST['alexaprval'];
				$condition = "";
				if ( $metadata != "" )
				{
						$whstatus = "\ts.status = ".( integer )$metadata." AND";
				}
				if ( $actiontype == "search" && $searchval )
				{
						if ( $searchtype == "1" )
						{
								$condition = " AND  u.username like '%".$searchval."%'";
						}
						else if ( $searchtype == "2" )
						{
								$condition = " AND  u.uid='".$searchval."'";
						}
						else if ( $searchtype == "3" )
						{
								$condition = " AND s.siteurl like '%".$searchval."%'";
						}
						else if ( $searchtype == "4" )
						{
								$condition = " AND  s.siteid='".$searchval."'";
						}
						else if ( $searchtype == "5" )
						{
								$condition = " AND  s.sitename like '%".$searchval."%'";
						}
				}
				if ( $alexaprval )
				{
						if ( $alexapr == "alexa" )
						{
								$condition .= " AND alexa>='".$alexaprval."'";
						}
						if ( $alexapr == "pr" )
						{
								$condition .= " AND pr>='".$alexaprval."'";
						}
				}
				if ( $sitetype != "" )
				{
						$condition .= " AND sitetype=".( integer )$sitetype;
				}
				if ( $grade != "" )
				{
						$condition .= " AND grade=".( integer )$grade;
				}
				$sql = "SELECT s.*,u.username,u.uid FROM zyads_site As s,zyads_users As u\r\n    \t\t\tWhere ".$whstatus.( " s.uid=u.uid ".$condition." ORDER By s.siteid DESC " );
				$ssql = "SELECT count(*) AS n FROM zyads_site As s,zyads_users As u\r\n    \t\t\tWhere ".$whstatus.( " s.uid=u.uid ".$condition." " );
				return $sql."|".$ssql;
		}

		public function admingetsiteone( $siteid = "" )
		{
				if ( !$siteid )
				{
						$siteid = $_GET['siteid'];
				}
				$sql = "SELECT * FROM zyads_site\r\n    \t\t\tWHERE   siteid=".( integer )$siteid;
				return $this->dbo->get_one( $sql );
		}

		public function getsiteidzonenum( $siteid )
		{
				$sql = "SELECT siteid FROM zyads_zone\r\n    \t\t\tWHERE   siteid=".$siteid;
				return $this->dbo->get_num( $sql );
		}

		public function updatesitedenyinfo( $type = "" )
		{
				$siteid = ( integer )$_POST['siteid'];
				$denyinfo = $_POST['denyinfo'];
				if ( $type == "service" )
				{
						$usersiteiddetail = $this->getsiteusersiteiddetail( $siteid );
						if ( !$usersiteiddetail )
						{
								exit( "Not Siteid ".$siteid );
						}
				}
				$sql = "UPDATE  zyads_site Set\r\n\t\t    denyinfo = '".$denyinfo.( "',\r\n\t\t    status = 1\r\n\t\t\tWHERE siteid=".$siteid );
				$this->dbo->query( $sql );
				$getzoneidsitedidvalue = $this->getzoneidsitedid( $siteid );
				foreach ( ( array )$getzoneidsitedidvalue as $value )
				{
						$this->delzoneidcache( $value['zoneid'] );
				}
		}

		public function updatesitename( )
		{
				$siteid = ( integer )$_POST['siteid'];
				$sitename = $_POST['sitename'];
				$siteinfo = $_POST['siteinfo'];
				$siteurl = $_POST['siteurl'];
				$sitetype = ( integer )$_POST['sitetype'];
				$grade = ( integer )$_POST['grade'];
				$beian = $_POST['beian'];
				$pertainurl = $_POST['pertainurl'];
				$pertainurl = str_replace( "\r\n", ",", $pertainurl );
				$sql = "UPDATE  zyads_site Set\r\n\t\t\tsitename = '".$sitename.( "',\r\n\t\t\tsiteinfo = '".$siteinfo."',\r\n\t\t\tsiteurl = '{$siteurl}',\r\n\t\t\tbeian = '{$beian}',\r\n\t\t\tgrade = '{$grade}',\r\n\t\t    pertainurl = '{$pertainurl}',\r\n\t\t    sitetype = '{$sitetype}'\r\n\t\t\tWHERE siteid={$siteid}" );
				$this->dbo->query( $sql );
				$getzoneidsitedidvalue = $this->getzoneidsitedid( $siteid );
				foreach ( ( array )$getzoneidsitedidvalue as $value )
				{
						$this->delzoneidcache( $value['zoneid'] );
				}
		}

		public function adssitestatustype( )
		{
				$siteid = ( integer )$_POST['siteid'];
				$statustype = ( integer )$_POST['statustype'];
				$sql = "Update zyads_site SET status='".$statustype.( "'\r\n    \t\t\tWhere siteid='".$siteid."'" );
				$query = $this->dbo->query( $sql );
		}

		public function sitelockstatus( $type = "" )
		{
				$siteidarr = $_REQUEST['siteid'];
				$choosetype = $_REQUEST['choosetype'];
				if ( $type == "service" )
				{
						foreach ( ( array )$siteidarr as $siteid )
						{
								$siteo = $this->getsiteusersiteiddetail( $siteid );
								if ( $siteo )
								{
										continue;
								}
								exit( "Not Siteid ".$siteid );
						}
				}
				if ( is_array( $siteidarr ) )
				{
						if ( $choosetype == "del" )
						{
								foreach ( $siteidarr as $siteid )
								{
										$query = $this->dbo->query( "Delete From zyads_site Where siteid = ".( integer )$siteid );
										$query = $this->dbo->query( "Delete From zyads_zone Where siteid = ".( integer )$siteid );
										$zarr = $this->getzoneidsitedid( $siteid );
										foreach ( ( array )$zarr as $z )
										{
												$this->delzoneidcache( $z['zoneid'] );
										}
								}
						}
						if ( $choosetype == "unlock" )
						{
								foreach ( $siteidarr as $siteid )
								{
										if ( in_array( "siteactivate", explode( ",", $GLOBALS['C_ZYIIS']['tomail'] ) ) )
										{
												$usermodel = Z::getsingleton( "model_userclass" );
												$site = $this->admingetsiteone( ( integer )$siteid );
												if ( $site['status'] == 0 )
												{
														$user = $usermodel->getusersuidrow( $site['uid'] );
														include( P_TPL."/emailtpl/subject.php" );
														$emailtpl = P_TPL."/emailtpl/siteactivate.html";
														$body = @file_get_contents( $emailtpl );
														$r = array(
																$user['username'],
																$GLOBALS['C_ZYIIS']['sitename'],
																$GLOBALS['C_ZYIIS']['authorized_url'],
																$site['siteurl'],
																$site['sitename']
														);
														$s = array( "{username}", "{sitename}", "{siteurl}", "{url}", "{sitename}" );
														$body = str_replace( $s, $r, $body );
														sendmail( $user['email'], $subject['siteactivate'], $body );
												}
										}
										$sql = "Update zyads_site SET status=3 Where siteid=".( integer )$siteid;
										$query = $this->dbo->query( $sql );
										$zarr = $this->getzoneidsitedid( $siteid );
										foreach ( ( array )$zarr as $z )
										{
												$this->delzoneidcache( $z['zoneid'] );
										}
								}
						}
						if ( $choosetype == "lock" )
						{
								foreach ( $siteidarr as $siteid )
								{
										$sql = "Update zyads_site SET status=2 Where siteid=".( integer )$siteid;
										$query = $this->dbo->query( $sql );
										$zarr = $this->getzoneidsitedid( $siteid );
										foreach ( ( array )$zarr as $z )
										{
												$this->delzoneidcache( $z['zoneid'] );
										}
								}
						}
						if ( $choosetype == "deny" )
						{
								foreach ( $siteidarr as $siteid )
								{
										$sql = "Update zyads_site SET status=1 Where siteid=".( integer )$siteid;
										$query = $this->dbo->query( $sql );
										$zarr = $this->getzoneidsitedid( $siteid );
										foreach ( ( array )$zarr as $z )
										{
												$this->delzoneidcache( $z['zoneid'] );
										}
								}
						}
				}
				else
				{
						return FALSE;
				}
		}

		public function getzoneidsitedid( $siteid )
		{
				$sql = "SELECT zoneid FROM zyads_zone Where siteid=".$siteid;
				return $this->dbo->get_all( $sql );
		}

		public function tzoneuidrow( $nfuid )
		{
				$sql = "SELECT zoneid FROM zyads_zone Where uid=".$nfuid;
				return $this->dbo->get_all( $sql );
		}

		public function sitealexa( $type = "" )
		{
				$url = $_REQUEST['url'];
				$snoopy = Z::getsingleton( "snoopy" );
				$snoopy->fetch( "http://data.alexa.com/data/+wQ411en8000lA?cli=10&dat=snba&ver=7.0&cdt=alx_vw%3D20%26wid%3D12206%26act%3D00000000000%26ss%3D1680x16t%3D0%26ttl%3D35371%26vis%3D1%26rq%3D4&url=".urlencode( $url ) );
				$html = $snoopy->results;
				if ( preg_match( "/TEXT=\\\"(\\d+)\\\"\\/>/", $html, $match ) )
				{
						$alexa = ( integer )$match[1];
				}
				else
				{
						$alexa = 0;
				}
				if ( $type == "alexa" )
				{
						return $alexa;
				}
				require( LIB_DIR."/googlepr.php" );
				$pr = ( integer )getpr( $url );
				$pr = 0 < $pr ? $pr : 0;
				$alexapr = $alexa."/".$pr;
				$sql = "Update zyads_site SET alexa='".$alexa.( "',pr='".$pr."' Where siteurl='{$url}'" );
				$query = $this->dbo->query( $sql );
				return $alexapr;
		}

		public function gzyads_zonesqlsandnum( )
		{
				$searchtype = $_REQUEST['searchtype'];
				$searchval = ( integer )$_REQUEST['searchval'];
				$actiontype = $_REQUEST['actiontype'];
				$plantype = $_REQUEST['plantype'];
				$adstypeid = ( integer )$_REQUEST['adstypeid'];
				$condition = "";
				if ( $adstypeid )
				{
						$whadstypeid = " And adstypeid='".$adstypeid."'";
				}
				if ( $plantype != "" )
				{
						$shadstypeid = " And plantype='".$plantype."'";
				}
				if ( $searchval )
				{
						if ( $searchtype == "1" )
						{
								$condition = " AND  zoneid = ".( integer )$searchval;
						}
						else if ( $searchtype == "2" )
						{
								$condition = " AND  uid  = ".( integer )$searchval;
						}
						else if ( $searchtype == "3" )
						{
								$condition = " AND  siteid = ".( integer )$searchval;
						}
				}
				$sql = "SELECT * FROM zyads_zone WHERE 1 ".$shadstypeid.( " ".$whadstypeid." {$condition} ORDER BY zoneid DESC" );
				$ssql = "SELECT count(*) AS n FROM zyads_zone WHERE 1 ".$shadstypeid.( " ".$whadstypeid." {$condition}" );
				return $sql."|".$ssql;
		}

		public function deletezoneid( )
		{
				$zoneids = $_POST['zoneid'];
				if ( is_array( $zoneids ) )
				{
						foreach ( $zoneids as $zoneid )
						{
								$query = $this->dbo->query( "Delete From zyads_zone Where zoneid = ".$zoneid );
						}
				}
		}

		public function getsiteid( )
		{
				$tidate = date( "Y-m-d", time( ) );
				$sql = "Select siteid From zyads_site  where date_format(addtime,'%Y-%m-%d') = '".$tidate."' ";
				return $this->dbo->get_num( $sql );
		}

		public function delzoneidcache( $zoneid )
		{
				require_once( APP_DIR."/client/makecache1.php" );
				delzoneidcache( $zoneid );
		}

}

?>
