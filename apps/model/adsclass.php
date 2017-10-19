<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_AdsClass
{

		public $dbo = NULL;

		public function model_adsclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function getzoneadsok( $arries, $sitetype, $siteid )
		{
				if ( !$arries )
				{
						return;
				}
				if ( $arries['adstypeid'] == 24 )
				{
						$plantype = $arries['plantype'];
						$sql = "SELECT  a.*,p.planname,p.plantype,p.restrictions,p.resuid,p.sitelimit,p.limitsiteid,p.planid,p.audit FROM zyads_ads AS a,zyads_plan as p,zyads_users as u\r\n\t\t\t\t\tWHERE a.zlink = 1 AND (a.status=3 or a.status=2) AND a.headline='' AND a.htmlcode=''  AND a.planid=p.planid  AND p.status=1 AND p.plantype='".$plantype."' AND p.uid=u.uid AND u.status=2";
				}
				else
				{
						$adstypecla = Z::getsingleton( "model_adstypeclass" );
						$getadstypeid = $adstypecla->getadstypeid( $arries['adstypeid'] );
						$width = $arries['width'];
						$height = $arries['height'];
						$adstypeid = $arries['adstypeid'];
						$plantype = $arries['plantype'];
						$condition = "";
						if ( $getadstypeid['framework'] == "iframe" )
						{
								$condition = " AND a.width=".$width." AND a.height=".$height." ";
						}
						$sql = "SELECT  a.*,p.planname,p.plantype,p.restrictions,p.resuid,p.planid,p.sitelimit,p.limitsiteid,p.audit FROM zyads_ads AS a,zyads_plan as p,zyads_users as u,zyads_adstype as at\r\n\t\t\t\t\tWHERE a.adstypeid= ".$adstypeid.( " ".$condition." AND (a.status=3 or a.status=2)  AND a.planid=p.planid   AND p.status=1 AND p.plantype='" ).$plantype."' AND p.uid=u.uid AND u.status=2 AND at.adstypeid=".$adstypeid." AND at.status=1";
				}
				$adrows = $this->dbo->get_all( $sql );
				$sitecla = Z::getsingleton( "model_siteclass" );
				$plancla = Z::getsingleton( "model_planclass" );
				foreach ( ( array )$adrows as $key => $adsvalue )
				{
						$planwebtype = $plancla->getplanwebtypeaclcomparison( $adsvalue['planid'] );
						$adsdata = explode( ",", $planwebtype['data'] );
						if ( $planwebtype['comparison'] == "==" )
						{
								if ( in_array( $sitetype, $adsdata ) )
								{
										$xfg = TRUE;
								}
						}
						else if ( !in_array( $sitetype, $adsdata ) )
						{
								$xfg = TRUE;
						}
						if ( "1" < $adsvalue['restrictions'] )
						{
								if ( $adsvalue['restrictions'] == "2" )
								{
										$resuid = explode( ",", $adsvalue['resuid'] );
										if ( !in_array( $_SESSION['uid'], $resuid ) )
										{
												unset( $adrows[$key] );
										}
								}
								if ( $adsvalue['restrictions'] == "3" )
								{
										$resuid = explode( ",", $adsvalue['resuid'] );
										if ( in_array( $_SESSION['uid'], $resuid ) )
										{
												unset( $adrows[$key] );
										}
								}
						}
						if ( "1" < $adsvalue['sitelimit'] )
						{
								if ( $adsvalue['sitelimit'] == "2" )
								{
										$limitsiteid = explode( ",", $adsvalue['limitsiteid'] );
										if ( !in_array( $siteid, $limitsiteid ) )
										{
												unset( $adrows[$key] );
										}
								}
								if ( $adsvalue['sitelimit'] == "3" )
								{
										$limitsiteid = explode( ",", $adsvalue['limitsiteid'] );
										if ( in_array( $siteid, $limitsiteid ) )
										{
												unset( $adrows[$key] );
										}
								}
						}
						if ( !$xfg )
						{
								unset( $adrows[$key] );
						}
						if ( $adsvalue['audit'] == "y" )
						{
								$auditstauts = $sitecla->auditstauts( $adsvalue['planid'], $siteid );
								if ( $auditstauts['status'] != "2" )
								{
										unset( $adrows[$key] );
								}
						}
				}
				return $adrows;
		}

		public function qplanadsrows( $adstype = "" )
		{
				$plantype = $_REQUEST['plantype'];
				if ( $adstype == "" )
				{
						$adstype = $_REQUEST['adstype'];
				}
				$planid = ( integer )$_REQUEST['planid'];
				if ( $planid )
				{
						$planidwhere = " AND p.planid = '".$planid."'";
				}
				if ( $plantype != "" )
				{
						$plantypewhere = " AND p.plantype = '".$plantype."'";
				}
				if ( $adstype != "" )
				{
						$adstypewhere = " AND a.adstype = '".$adstype."'";
				}
				if ( $adstype == "imgtw" )
				{
						$adstypewhere = " AND (a.adstype = 'img' || a.adstype = 'tw') ";
				}
				$sql = "SELECT   a.width,a.height,count(a.adsid) as adsnum FROM zyads_plan AS p\r\n\t\t\tLEFT JOIN (zyads_ads As a) On (a.planid=p.planid)\r\n\t\t\tWhere (p.status=1 OR p.status=3) AND  ((p.restrictions=3 && FIND_IN_SET(".$_SESSION['uid'].",p.resuid)=0)  OR (p.restrictions=2 && FIND_IN_SET(".$_SESSION['uid'].( ",p.resuid)>0) OR p.restrictions=1) AND a.status=3  ".$planidwhere.( " ".$plantypewhere."  {$adstypewhere} AND a.width>0 AND a.height>0 {$condition} GROUP BY a.width,a.height  Order By a.width Desc" ) );
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function getxtplanrows( )
		{
				$planid = ( integer )$_REQUEST['planid'];
				$sql = " SELECT  a.* FROM zyads_ads as a,zyads_plan as p\r\n\t\t\t\tWHERE p.status=1 AND a.planid=p.planid  AND a.status=3 AND a.planid=".$planid;
				return $this->dbo->get_all( $sql );
		}

		public function zyadsplanjoinadsrows( )
		{
				$plantype = $_REQUEST['plantype'];
				$planid = ( integer )$_REQUEST['planid'];
				if ( $planid )
				{
						$condition .= " AND p.planid = '".$planid."'";
				}
				if ( $plantype != "" )
				{
						$condition = " AND p.plantype='".$plantype."'";
				}
				$sql = "SELECT  a.*,p.* from zyads_plan AS p\r\n\t\t\tLEFT JOIN (zyads_ads As a) On (a.planid=p.planid AND a.adstype!='txt')\r\n\t\t\tWhere (p.status=1 OR p.status=3) AND  ((p.restrictions=3 && FIND_IN_SET(".$_SESSION['uid'].",p.resuid)=0)  OR (p.restrictions=2 && FIND_IN_SET(".$_SESSION['uid'].( ",p.resuid)>0) OR p.restrictions=1) AND a.status=3 ".$condition."  " );
				return $this->dbo->get_all( $sql );
		}

		public function zyadsplantrows( )
		{
				$planid = ( integer )$_REQUEST['planid'];
				$adstypeid = ( integer )$_REQUEST['adstypeid'];
				if ( $adstypeid )
				{
						$condition = " AND a.adstypeid = '".$adstypeid."'";
				}
				$sql = " SELECT a.width,a.height,count(a.adsid) as adsnum FROM `zyads_ads` as a,zyads_plan as p\r\n\t\t\t\tWHERE p.status=1 AND a.planid=p.planid AND a.status=3 AND a.planid=".$planid.( " AND a.width>0 AND a.height>0 ".$condition." GROUP BY a.width,a.height  Order By adsnum Desc" );
				return $this->dbo->get_all( $sql );
		}

		public function zyadsplansqlsandadsnum( )
		{
				$planid = ( integer )$_REQUEST['planid'];
				$adstypeid = ( integer )$_REQUEST['adstypeid'];
				$width = ( integer )$_REQUEST['width'];
				$height = ( integer )$_REQUEST['height'];
				if ( $adstypeid )
				{
						$condition = " AND a.adstypeid = '".$adstypeid."'";
				}
				if ( 1 < $width && 1 < $height )
				{
						$condition .= " AND a.width = ".$width.( " AND a.height = ".$height );
				}
				$sql = " SELECT * FROM `zyads_ads` as a,zyads_plan as p\r\n\t\t\t\tWHERE p.status=1 AND a.planid=p.planid  AND a.status=3 AND a.planid=".$planid.( " AND a.headline='' ".$condition );
				$ssql = "SELECT count(*) AS n FROM `zyads_ads` as a,zyads_plan as p WHERE p.status=1 AND a.planid=p.planid  AND a.status=3 AND a.planid=".$planid.( " AND a.headline='' ".$condition );
				return $sql."|".$ssql;
		}

		public function zyplanadssqlsadnum( )
		{
				$width = $_REQUEST['width'];
				$height = $_REQUEST['height'];
				$planid = ( integer )$_REQUEST['planid'];
				$plantype = $_REQUEST['plantype'];
				$adstype = $_REQUEST['adstype'];
				if ( 1 < $width && 1 < $height )
				{
						$condition = " AND a.width = ".$width.( " AND a.height = ".$height );
				}
				if ( $planid != "" )
				{
						$condition .= " AND p.planid=".$planid;
				}
				if ( $plantype != "" )
				{
						$condition .= " AND p.plantype='".$plantype."'";
				}
				if ( $adstype != "" )
				{
						$condition .= " AND a.adstype='".$adstype."'";
				}
				$sql = "SELECT  a.*,p.* from zyads_plan AS p\r\n\t\t\tLEFT JOIN (zyads_ads As a) On (a.planid=p.planid AND a.adstype!='txt')\r\n\t\t\tWhere (p.status=1 OR p.status=3) AND  ((p.restrictions=3 && FIND_IN_SET(".$_SESSION['uid'].",p.resuid)=0)  OR (p.restrictions=2 && FIND_IN_SET(".$_SESSION['uid'].( ",p.resuid)>0) OR p.restrictions=1) AND a.status=3 ".$condition." Order By a.adsid desc" );
				$ssql = "SELECT count(*) AS n from zyads_plan AS p\r\n\t\t\tLEFT JOIN (zyads_ads As a) On (a.planid=p.planid )\r\n\t\t\tWhere (p.status=1 OR p.status=3) AND  ((p.restrictions=3 && FIND_IN_SET(".$_SESSION['uid'].",p.resuid)=0)  OR (p.restrictions=2 && FIND_IN_SET(".$_SESSION['uid'].( ",p.resuid)>0) OR p.restrictions=1) AND a.status=3 ".$condition." " );
				return $sql."|".$ssql;
		}

		public function disadsplanrows( )
		{
				$plantype = $_REQUEST['plantype'];
				$adstype = $_REQUEST['adstype'];
				if ( $adstype == "" )
				{
						$adstype = "img";
				}
				$sql = " SELECT  DISTINCT a.width,a.height FROM `zyads_ads` as a ,zyads_plan as p\r\n\t\t\t\tWHERE adstype = '".$adstype.( "' AND p.status=1 AND a.status=3 AND a.planid=p.planid AND p.plantype='".$plantype."'" );
				return $this->dbo->get_all( $sql );
		}

		public function zadsplanrow( $adsid = "" )
		{
				if ( $adsid == "" )
				{
						$adsid = ( integer )$_REQUEST['adsid'];
				}
				$sql = "SELECT a.*,p.plantype FROM zyads_ads AS a, zyads_plan AS p\r\n\t\t\t\t WHERE a.adsid=".$adsid." AND a.uid=".( integer )$_SESSION['uid']." AND a.planid=p.planid";
				$b = $this->dbo->get_one( $sql );
				return $b;
		}

		public function zadsandplanrow( )
		{
				$adsid = ( integer )$_REQUEST['adsid'];
				$sql = "SELECT * FROM zyads_ads AS a,zyads_plan AS p\r\n\t\t\t\t WHERE a.adsid=".$adsid." AND a.planid=p.planid";
				return $this->dbo->get_one( $sql );
		}

		public function getadsidtouid( )
		{
				$sql = "SELECT adsid FROM zyads_ads\r\n\t\t\t\t WHERE  uid=".$_SESSION['uid'];
				return $this->dbo->get_num( $sql );
		}

		public function getadsidtoadstypestat( $adstype )
		{
				$sql = "SELECT adsid FROM zyads_ads\r\n\t\t\t\t WHERE  adstype='".$adstype."' AND status = 3 ";
				return $this->dbo->get_num( $sql );
		}

		public function getnumadstatpurl( )
		{
				$sql = "SELECT adsid FROM zyads_ads\r\n    \t\t\tWHERE  status = 3 AND LENGTH(dispurl)>0";
				return $this->dbo->get_num( $sql );
		}

		public function getnumzyadstypeid( $adstypeid )
		{
				$sql = "SELECT count(*) AS num FROM zyads_ads\r\n    \t\t\tWHERE  adstypeid=".( integer )$adstypeid;
				return $this->dbo->get_one( $sql );
		}

		public function adsandplanbysqlandnums( )
		{
				$adsid = ( integer )$_REQUEST['adsid'];
				$planid = ( integer )$_REQUEST['planid'];
				$adstype = h( $_REQUEST['adstype'] );
				$metadata = h( $_REQUEST['status'] );
				if ( $adsid )
				{
						$condition = " AND a.adsid='".$adsid."'";
				}
				if ( $planid )
				{
						$dwhere = " AND a.planid='".$planid."'";
				}
				if ( $adstype )
				{
						$adstypewhere = " AND a.adstype='".$adstype."'";
				}
				if ( $metadata == "d" )
				{
						$statuswhere = " AND (a.status='0' OR a.status='2')";
				}
				$sql = "SELECT a.*,p.planname,p.plantype,p.status AS planstatus FROM zyads_ads AS a , zyads_plan AS p\r\n    \t\t\tWHERE a.uid=".$_SESSION['uid'].( " ".$condition.( "  ".$dwhere." {$adstypewhere} {$statuswhere} AND a.planid=p.planid  Order By a.adsid Desc" ) );
				$ssql = "SELECT count(*) AS n FROM zyads_ads AS a , zyads_plan AS p\r\n    \t\t\tWHERE a.uid=".$_SESSION['uid'].( " ".$condition.( "  ".$dwhere." {$adstypewhere}  {$statuswhere} AND a.planid=p.planid " ) );
				return $sql."|".$ssql;
		}

		public function getplantypeads( $plantype, $siteid )
		{
				$siteid = ( integer )$siteid;
				$sql = "SELECT  a.*,p.*  FROM zyads_plan AS p,zyads_users as u,zyads_ads as a,zyads_adstype as at \r\n\t\t\t\tWHERE u.status=2 and u.uid=p.uid AND p.status=1 and a.planid=p.planid \r\n\t\t\t\t AND  ((p.restrictions=3 && FIND_IN_SET(".$_SESSION['uid'].",p.resuid)=0)  OR (p.restrictions=2 && \r\n\t\t\t\t FIND_IN_SET(".$_SESSION['uid'].",p.resuid)>0) OR p.restrictions=1)\r\n\t\t\t\t AND  ((p.sitelimit=3 && FIND_IN_SET(".$siteid.",p.limitsiteid)=0)  OR (p.sitelimit=2 && \r\n\t\t\t\t FIND_IN_SET(".$siteid.( ",p.limitsiteid)>0) OR p.sitelimit=1)\r\n\t\t\t\t AND (a.status=3 or a.status=2) \r\n\t\t\t\t AND LENGTH(a.dispurl)=0 AND a.adstypeid=at.adstypeid AND at.status=1  \r\n\t\t\t\t AND p.plantype='".$plantype."'  GROUP BY p.planid" );
				$b = $this->dbo->get_one( $sql );
				return $b;
		}

		public function zyadsattch( )
		{
				$host = str_replace( "http://", "", $GLOBALS['C_ZYIIS']['imgurl'] );
				$path = "/a/".date( "Y-m-d" )."/";
				$config['upload_path'] = WWW_DIR.$path;
				$config['allowed_types'] = "gif|jpg|png|swf|bmp";
				$config['max_size'] = "500";
				$config['file_name'] = time( ).random( 8 );
				require( LIB_DIR."/upload/upload.php" );
				$uploader =& new upload( $config );
				$uploader->up( "imageurl" );
				$up = $uploader->data( );
				return $path.$up['file_name'];
		}

		public function getuploadadsid( $type = "" )
		{
				$plancla = Z::getsingleton( "model_planclass" );
				$admingetplanone = $plancla->admingetplanone( );
				$metadata = 0;
				$zlink = 0;
				if ( $type != "admin" )
				{
						if ( $admingetplanone['uid'] != $_SESSION['uid'] )
						{
								exit( "Error" );
						}
				}
				else
				{
						$metadata = $_REQUEST['status'];
						$zlink = $_REQUEST['zlink'];
				}
				$files = $_POST['files'];
				$adstypeid = ( integer )$_POST['adstypeid'];
				$planid = ( integer )$_POST['planid'];
				$adinfo = $_POST['adinfo'];
				$htmlcontrol = $_POST['htmlcontrol'];
				$htmlcode = $_POST['htmlcode'];
				$alt = $_POST['alt'];
				$dispurl = $_POST['dispurl'];
				$v = strip_tags( $_POST['url'] );
				$description = $_POST['description'];
				$headline = $_POST['headline'];
				$width = ( integer )$_POST['width'];
				$height = ( integer )$_POST['height'];
				$disscreen = $_POST['disscreen'];
				if ( $htmlcode )
				{
						$htmlcode = str_replace( "&nbsp;", " ", $htmlcode );
						$htmlcode = trans( $htmlcode );
						$htmlcode = str_replace( "'", "\"", $htmlcode );
						$htmlcode = preg_replace( "# target=\\s*(\\\\?['\"]).*?\\1#i", " ", $htmlcode );
						$htmlcode = preg_replace( "/<a(.*?)href\\s*=\\s*(\\\\?['\"])\\s*http(.*?)\\2(.*?) *>/e", "'<a\$1href=\$2{clickurl}'.urlencode('http\$3').'\$2\$4 target=\"_blank\">'", $htmlcode );
						$htmlcode = stripslashes( $htmlcode );
				}
				if ( $files == "up" && $_FILES['imageurl']['error'] != 4 )
				{
						$zyadsattch = $this->zyadsattch( );
						$urlfile = $zyadsattch;
				}
				if ( $files == "url" )
				{
						$urlfile = $_POST['urlfile'];
				}
				$array = array(
						"width" => $width,
						"height" => $height,
						"imageurl" => $urlfile,
						"adstype" => $adstype,
						"alt" => $alt,
						"url" => $v,
						"adinfo" => isset( $adinfo ) ? $adinfo :"" ,
						"status" => 0 < $metadata ? 3 : 0,
						"zlink" => $zlink ? 1 : 0,
						"planid" => $planid,
						"uid" => $admingetplanone['uid'],
						"adstypeid" => $adstypeid,
						"headline" => $headline,
						"description" => $description,
						"dispurl" => $dispurl,
						"htmlcode" => $htmlcode,
						"addtime" => DATETIMES
				);
				$query = $this->dbo->create( $array, "zyads_ads" );
				$adsid = $this->dbo->insert_id( );
				if ( $metadata )
				{
						$this->adscachetype( $adsid );
				}
				return $adsid;
		}

		public function delzyadsbyuid( )
		{
				$adsid = ( integer )$_GET['adsid'];
				$sql = "DELETE FROM zyads_ads WHERE uid=".$_SESSION['uid'].( " AND adsid=".$adsid );
				$query = $this->dbo->query( $sql );
		}

		public function zyadsbyupadslog( $type = "" )
		{
				$status = FALSE;
				if ( $type == "admin" )
				{
						$oldrow = $this->zadsandplanrow( );
						$status = $_REQUEST['status'];
						$username = $_SESSION['adminusername'];
				}
				else
				{
						$oldrow = $this->zadsplanrow( );
						$GLOBALS['GLOBALS']['_POST']['zlink'] = $oldrow['zlink'];
						$username = $_SESSION['username'];
				}
				if ( !$oldrow )
				{
						exit( "Not ADS" );
				}
				$adsid = ( integer )$_POST['adsid'];
				$files = $_POST['files'];
				$adstypeid = ( integer )$_POST['adstypeid'];
				$planid = ( integer )$_POST['planid'];
				$adinfo = $_POST['adinfo'];
				$htmlcontrol = $_POST['htmlcontrol'];
				$htmlcontrol = explode( ",", $_POST['htmlcontrol'] );
				$htmlcontrol[] = "adinfo";
				$htmlcode = $_POST['htmlcode'];
				$htmlcode = str_replace( "&nbsp;", " ", $htmlcode );
				$htmlcode = trans( $htmlcode );
				$htmlcode = str_replace( "'", "\"", $htmlcode );
				$htmlcode = preg_replace( "# target=\\s*(\\\\?['\"]).*?\\1#i", " ", $htmlcode );
				$htmlcode = preg_replace( "/<a(.*?)href\\s*=\\s*(\\\\?['\"])\\s*http(.*?)\\2(.*?) *>/e", "'<a\$1href=\$2{clickurl}'.urlencode('http\$3').'\$2\$4 target=\"_blank\">'", $htmlcode );
				$htmlcode = stripslashes( $htmlcode );
				$alt = $_POST['alt'];
				$dispurl = $_POST['dispurl'];
				$url = strip_tags( $_POST['url'] );
				$description = $_POST['description'];
				$headline = $_POST['headline'];
				$width = ( integer )$_POST['width'];
				$height = ( integer )$_POST['height'];
				$disscreen = $_POST['disscreen'];
				if ( $files == "up" && $_FILES['imageurl']['error'] != 4 )
				{
						$file_name = $this->zyadsattch( );
						$imageurl = $file_name;
				}
				if ( $files == "url" )
				{
						$imageurl = $_POST['urlfile'];
				}
				foreach ( ( array )$htmlcontrol as $h )
				{
						if ( $type != "admin" && $h == "width" && $h == "height" && !( $olddata['imageurl'] != "" ) || $imageurl && !( $h == "imageurl" ) || $oldrow[$h] != $$h )
						{
								$olddata[$h] = $oldrow[$h];
								$updata[$h] = $$h;
						}
				}
				if ( $oldrow['zlink'] != $_POST['zlink'] )
				{
						$olddata['zlink'] = $oldrow['zlink'];
						$updata['zlink'] = $_POST['zlink'];
				}
				if ( $olddata && $updata )
				{
						$sql = "UPDATE zyads_ads SET status = 2,url='".$url."' WHERE adsid=".$adsid." AND uid=".$oldrow['uid'];
						$query = $this->dbo->query( $sql );
						$logrow = array(
								"adsid" => $adsid,
								"username" => $username,
								"adstypeid" => $oldrow['adstypeid'],
								"olddata" => base64_encode( serialize( $olddata ) ),
								"updata" => base64_encode( serialize( $updata ) ),
								"addtime" => DATETIMES
						);
						$query = $this->dbo->create( $logrow, "zyads_upadslog" );
				}
				if ( $status )
				{
						$c = $this->op( array(
								"adsid" => $adsid
						), "unlock" );
				}
		}

		public function getupadslog( $adsid )
		{
				$sql = "SELECT * FROM zyads_upadslog\r\n\t\t\t\tWhere adsid=".$adsid." ORDER BY uplogid  DESC";
				return $this->dbo->get_one( $sql );
		}

		public function adscachetype( $adsid = "", $type = "", $sync = TRUE )
		{
				$adstypemodel = Z::getsingleton( "model_adstypeclass" );
				require_once( APP_DIR."/client/makecache1.php" );
				$a = $this->getadrow( $adsid );
				$at = $adstypemodel->getadstypeid( $a['adstypeid'] );
				if ( $at['framework'] == "iframe" )
				{
						$filename = $a['plantype']."_".$a['adstypeid']."_".$a['width']."_".$a['height'];
				}
				else
				{
						$filename = $a['plantype']."_".$a['adstypeid'];
				}
				if ( $type == "del" )
				{
						deladscache( $filename );
				}
				else
				{
						makeads( $this->dbo, $filename, $a );
				}
				if ( $sync && $GLOBALS['C_ZYIIS']['sync_setting'] )
				{
						$server = explode( ",", $GLOBALS['C_ZYIIS']['sync_setting'] );
						foreach ( $server as $key => $val )
						{
								file_get_contents( "http://".$val.( "/api/synccache.php?type=ads&rt=".$type.( "&id=".$adsid ) ) );
						}
				}
		}

		public function countadstypenum( $id, $m )
		{
				if ( !is_array( $m ) )
				{
						return FALSE;
				}
				$j = 0;
				foreach ( $m as $key => $value )
				{
						if ( !( $id == $value['adstypeid'] ) )
						{
								if ( $this->restrictions( $value ) )
								{
										++$j;
								}
						}
				}
				return $j;
		}

		public function restrictions( $restr )
		{
				if ( "1" < $restr['restrictions'] )
				{
						if ( $restr['restrictions'] == "2" )
						{
								$resuid = explode( ",", $restr['resuid'] );
								if ( !in_array( $_SESSION['uid'], $resuid ) )
								{
										return TRUE;
								}
						}
						if ( $restr['restrictions'] == "3" )
						{
								$resuid = explode( ",", $restr['resuid'] );
								if ( in_array( $_SESSION['uid'], $resuid ) )
								{
										return TRUE;
								}
						}
				}
				return FALSE;
		}

		public function updatezyadsmark( )
		{
				$adsid = ( integer )$_GET['adsid'];
				$mark = ( integer )$_GET['mark'];
				$query = $this->dbo->query( "\r\n\t\t\t\tUPDATE\r\n\t\t\t\t\t zyads_ads\r\n\t\t\t\tset\r\n\t\t\t\t\tmark = '".$mark.( "'\r\n\t\t\t\tWHERE \r\n\t\t\t\t\tadsid = ".$adsid."\r\n\t\t" ) );
		}

		public function planbyadsqlandnum( $plantype = "" )
		{
				$metadata = $_REQUEST['status'];
				$zlink = $_REQUEST['zlink'];
				$adstype = $_REQUEST['adstype'];
				$adstypeid = ( integer )$_REQUEST['adstypeid'];
				$searchtype = $_REQUEST['searchtype'];
				$searchval = trim( $_REQUEST['searchval'] );
				$actiontype = $_REQUEST['actiontype'];
				$sortingtype = $_REQUEST['sortingtype'];
				$sortingm = $_REQUEST['sortingm'];
				$whstatus = $whadstypeid = $condition = $shadstypeid = $zlinkwhere = "";
				if ( $metadata != "" )
				{
						$whstatus = "\ta.status = ".( integer )$metadata." AND";
				}
				if ( $zlink == 1 )
				{
						$zlinkwhere = " AND a.zlink = 1 ";
				}
				if ( !empty( $plantype ) )
				{
						$shadstypeid = " AND p.plantype = '".$plantype."'";
				}
				if ( $adstypeid )
				{
						$whadstypeid = " AND a.adstypeid='".$adstypeid."'";
				}
				if ( !empty( $adstype ) )
				{
						$adstypewhere = " AND a.adstype = '".$adstype."'";
				}
				if ( $searchval )
				{
						if ( $searchtype == "1" )
						{
								$condition = " AND  a.adsid = ".( integer )$searchval;
						}
						else if ( $searchtype == "2" )
						{
								$condition = " AND  a.planid =".( integer )$searchval;
						}
						else if ( $searchtype == "3" )
						{
								$condition = " AND  a.uid =".( integer )$searchval;
						}
				}
				if ( !$sortingtype )
				{
						$sortingtype = "a.adsid";
				}
				if ( !$sortingm )
				{
						$sortingm = "DESC";
				}
				$sql = "SELECT a.*,p.status AS planstatus,p.planname,p.plantype,p.planid,sum(s.num+s.deduction) as n ,sum(views) as v FROM zyads_ads as a\r\n\t\t\t\tLEFT JOIN (zyads_stats as s ) on (s.day='".DAYS.( "' AND s.adsid=a.adsid  ) ,zyads_plan as p\r\n\t\t\t\tWHERE  ".$whstatus.( " p.planid=a.planid ".$zlinkwhere." {$adstypewhere} {$condition} {$shadstypeid} {$whadstypeid}\r\n\t\t\t\tgroup by a.adsid ORDER BY {$sortingtype} {$sortingm}" ) );
				$ssql = "SELECT count(*) as n FROM zyads_ads as a,zyads_plan as p\r\n\t\tWHERE  ".$whstatus.( " p.planid=a.planid ".$zlinkwhere." {$adstypewhere} {$condition} {$shadstypeid} {$whadstypeid}" );
				return $sql."|".$ssql;
		}

		public function getadrow( $adsid = "" )
		{
				if ( $adsid == "" )
				{
						$adsid = ( integer )$_REQUEST['adsid'];
				}
				$sql = "SELECT a.*,p.planname,p.plantype,u.email,u.username FROM zyads_plan as p,zyads_ads as a ,zyads_users as u\r\n\t\t\t\tWhere a.adsid=".$adsid." AND a.planid=p.planid And u.uid=p.uid";
				return $this->dbo->get_one( $sql );
		}

		public function getadsrowid( $adsid = "" )
		{
				if ( $adsid == "" )
				{
						$adsid = ( integer )$_REQUEST['adsid'];
				}
				$sql = "SELECT * FROM  zyads_ads\r\n\t\t\t\tWhere adsid= ".( integer )$adsid;
				return $this->dbo->get_one( $sql );
		}

		public function updateadspriority( )
		{
				$adsid = ( integer )$_POST['adsid'];
				$priority = h( $_POST['priority'] );
				$urlfile = $_POST['imageurl'];
				if ( $urlfile != "" )
				{
						$condition = ", imageurl='".$urlfile."'";
				}
				$sql = "Update zyads_ads SET priority='".$priority.( "' ".$condition."\r\n    \t\t\tWhere adsid='{$adsid}'" );
				$query = $this->dbo->query( $sql );
				$this->adscachetype( );
		}

		public function updateadsurl( )
		{
				$planid = ( integer )$_POST['planid'];
				$v = strip_tags( $_POST['editurl'] );
				$zyadsrow = $this->getzyadsrowtoplanid( $planid );
				$sql = "Update zyads_ads SET url='".$v.( "' Where planid='".$planid."' AND htmlcode=''" );
				$query = $this->dbo->query( $sql );
				foreach ( ( array )$zyadsrow as $m )
				{
						$this->adscachetype( $m['adsid'], "del" );
				}
		}

		public function op( $adsid = array( ), $mode = "" )
		{
				if ( $adsid && $mode )
				{
						$arradsid = $adsid;
				}
				else
				{
						$arradsid = $_REQUEST['adsid'];
						$mode = $_REQUEST['choosetype'];
				}
				if ( is_array( $arradsid ) )
				{
						if ( $mode == "del" )
						{
								foreach ( $arradsid as $adsid )
								{
										$adsid = ( integer )$adsid;
										$query = $this->dbo->query( "Delete From zyads_ads Where adsid=".( integer )$adsid );
										$this->adscachetype( $adsid, "del" );
								}
						}
						if ( $mode == "unlock" )
						{
								foreach ( $arradsid as $adsid )
								{
										$arries = $this->getadrow( ( integer )$adsid );
										if ( $arries['status'] == 2 )
										{
												$ddx = $this->getupadslog( ( integer )$adsid );
												if ( !$ddx['uplogid'] )
												{
														$ddx['uplogid'] = 0;
												}
												$updata = unserialize( base64_decode( $ddx['updata'] ) );
												$olddata = unserialize( base64_decode( $ddx['olddata'] ) );
												$dateal = @array_diff( $updata, $olddata );
												foreach ( ( array )$dateal as $key => $value )
												{
														$condition .= "{$key} = '".$value."',";
												}
												$sql = "UPDATE zyads_ads SET ".$condition." status = 3  WHERE adsid=".( integer )$adsid;
												$query = $this->dbo->query( $sql );
												$sql = "UPDATE zyads_upadslog  SET  status = 1  WHERE uplogid =".$ddx['uplogid'];
												$query = $this->dbo->query( $sql );
										}
										else
										{
												$sql = "Update zyads_ads SET status=3 Where adsid=".( integer )$adsid;
												$query = $this->dbo->query( $sql );
										}
										$this->adscachetype( $adsid, "del" );
								}
						}
						if ( $mode == "lock" )
						{
								foreach ( $arradsid as $adsid )
								{
										$sql = "Update zyads_ads SET status=4 Where adsid=".( integer )$adsid;
										$query = $this->dbo->query( $sql );
										$this->adscachetype( $adsid, "del" );
								}
						}
				}
				else
				{
						return FALSE;
				}
		}

		public function getadsid( )
		{
				$tidate = date( "Y-m-d", time( ) );
				$sql = "Select adsid From zyads_ads  WHERE date_format(addtime,'%Y-%m-%d') = '".$tidate."' ";
				return $this->dbo->get_num( $sql );
		}

		public function adsdeny( )
		{
				$denyinfo = @implode( "£¬", $_POST['denyinfo'] );
				$toemail = $_POST['toemail'];
				$adsid = $_POST['adsid'];
				$sql = "Update zyads_ads SET status=1 ,denyinfo='".$denyinfo."' Where adsid=".( integer )$adsid;
				$query = $this->dbo->query( $sql );
				if ( $toemail == "y" )
				{
						$email = $_POST['email'];
						$u = $this->getadrow( );
						$GLOBALS['GLOBALS']['GLOBALS']['arrreplactadsdenyinfo'] = $denyinfo;
						include( P_TPL."/emailtpl/subject.php" );
						$emailtpl = P_TPL."/emailtpl/adsdeny.html";
						$body = @file_get_contents( $emailtpl );
						$r = array(
								$u['username'],
								$GLOBALS['C_ZYIIS']['sitename'],
								$GLOBALS['C_ZYIIS']['authorized_url'],
								$denyinfo
						);
						$s = array( "{username}", "{sitename}", "{siteurl}", "{adsdenyinfo}" );
						$body = str_replace( $s, $r, $body );
						sendmail( $email, $subject['adsdeny'], $body );
				}
		}

		public function zyadszonesite( )
		{
				$adstypecla = Z::getsingleton( "model_adstypeclass" );
				$type = ( integer )$_REQUEST['type'];
				$sitetype = ( integer )$_REQUEST['sitetype'];
				$m = $this->getadrow( $adsid );
				if ( $m )
				{
						return FALSE;
				}
				$getadstypeid = $adstypecla->getadstypeid( $m['adstypeid'] );
				if ( $getadstypeid['framework'] == "iframe" )
				{
						$s = " AND width = ".$m['width']." AND height = ".$m['height']." ";
				}
				if ( $type == 0 )
				{
						$sql = "UPDATE zyads_zone SET viewadsid = concat(`viewadsid`,',".$m['adsid']."')\r\n\t\t\t\tWHERE  adstypeid='".$m['adstypeid']."'  AND plantype='".$m['plantype']."' AND FIND_IN_SET('".$m['adsid'].( "',viewadsid)=0  ".$s );
				}
				else
				{
						$sql = "UPDATE zyads_zone,zyads_site SET viewadsid = concat(viewadsid,',".$m['adsid']."')\r\n\t\t\t\t\tWHERE  sitetype ='".$sitetype."' AND zyads_zone.siteid=zyads_site.siteid AND adstypeid='".$m['adstypeid']."'  AND plantype='".$m['plantype']."' AND FIND_IN_SET('".$m['adsid'].( "',viewadsid)=0  ".$s );
				}
				$query = $this->dbo->query( $sql );
		}

		public function GetImageSize( )
		{
				$xstring = $_GET['filename'];
				$value = @getimagesize( $xstring );
				$d = $value['0'];
				$M = $value['1'];
				$qt = array( "image/gif", "image/jpeg", "image/png", "application/x-shockwave-flash", "image/bmp" );
				$rs = in_array( $value['mime'], $qt );
				if ( !$rs )
				{
						return "unknown";
				}
				return $d."x".$M;
		}

		public function getzyadsrowtoplanid( $planid )
		{
				$sql = "SELECT * FROM zyads_ads Where planid=".$planid;
				return $this->dbo->get_all( $sql );
		}

}

?>
