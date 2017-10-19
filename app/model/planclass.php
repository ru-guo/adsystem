<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_PlanClass
{

		public $dbo = NULL;
		public $plantype = NULL;
		public $planid = 0;

		public function model_planclass( )
		{
				if ( !empty( $_REQUEST['plantype'] ) )
				{
						$this->plantype = h( $_REQUEST['plantype'] );
				}
				$this->planid = ( integer )$_REQUEST['planid'];
				$this->dbo = Z::getconn( );
		}

		public function zyadsplanc( $d = "" )
		{
				$plantype = $_REQUEST['plantype'];
				$planid = ( integer )$_REQUEST['planid'];
				if ( $planid )
				{
						$planidwhere = " AND p.planid=".$planid;
				}
				if ( $plantype )
				{
						$plantypewhere = " AND p.plantype='".$plantype."'";
				}
				$sql = "SELECT  p.*,count(a.adsid) as numads FROM zyads_plan as p ,zyads_ads as a\r\n    \t\t\tWHERE p.status = 1 and a.status = 3 AND p.planid = a.planid ".$planidwhere.( " ".$plantypewhere." AND adstype!='txt' GROUP BY a.planid HAVING numads>0 Order By p.planid Desc" );
				if ( !$d )
				{
						return $sql;
				}
				return $this->dbo->get_all( $sql );
		}

		public function getsxplanuser( $pla = "", $rows = "", $siteid = 0 )
		{
				if ( !$siteid )
				{
						$siteid = ( integer )$siteid;
				}
				$actiontype = $_REQUEST['actiontype'];
				$metadata = ( integer )$_REQUEST['status'];
				$audit = $_REQUEST['audit'];
				$plantype = $_REQUEST['plantype'];
				if ( !is_array( $plantype ) || !empty( $plantype ) )
				{
						$plantype = explode( ",", $plantype );
				}
				if ( is_array( $plantype ) && !empty( $plantype ) )
				{
						@array_walk( $plantype, "ArrayKeyFormat" );
				}
				$plantype = @implode( ",", ( array )$plantype );
				$planid = ( integer )$_REQUEST['planid'];
				$plantypewhere = $planidwhere = $auditwhere = "";
				if ( $audit == "y" )
				{
						$auditwhere = " AND p.audit = 'y'";
				}
				if ( $audit == "n" )
				{
						$auditwhere = " AND p.audit = 'n'";
				}
				if ( !empty( $plantype ) )
				{
						$plantypewhere = " AND p.plantype in (".$plantype.")";
				}
				if ( $planid )
				{
						$planidwhere = " AND p.planid=".$planid;
				}
				if ( $actiontype == "audit" )
				{
						$jaudit = ",zyads_audit AS au";
						$jcondition = " AND p.planid=au.planid AND au.siteid=".$siteid.( " AND au.status=".$metadata );
				}
				$sql = "SELECT  p.*  FROM zyads_plan AS p,zyads_users as u,zyads_ads as a,zyads_adstype as at ".$jaudit."\r\n\t\t\t\tWHERE u.status=2 and u.uid=p.uid AND p.status=1 and a.planid=p.planid \r\n\t\t\t\t AND  ((p.restrictions=3 && FIND_IN_SET(".$_SESSION['uid'].",p.resuid)=0)  OR (p.restrictions=2 && \r\n\t\t\t\t FIND_IN_SET(".$_SESSION['uid'].",p.resuid)>0) OR p.restrictions=1)\r\n\t\t\t\t AND  ((p.sitelimit=3 && FIND_IN_SET(".$siteid.",p.limitsiteid)=0)  OR (p.sitelimit=2 && \r\n\t\t\t\t FIND_IN_SET(".$siteid.( ",p.limitsiteid)>0) OR p.sitelimit=1)\r\n\t\t\t\t AND (a.status=3 or a.status=2) \r\n\t\t\t\t AND LENGTH(a.dispurl)=0 AND a.adstypeid=at.adstypeid AND at.status=1  \r\n\t\t\t\t ".$plantypewhere.( " ".$planidwhere." {$auditwhere} {$jcondition} GROUP BY p.planid Order By p.top Desc,p.planid Desc" ) );
				if ( $pla )
				{
						$ssql = "SELECT count(DISTINCT p.planid ) AS n FROM zyads_plan AS p,\r\n\t\t\tzyads_users AS u,zyads_ads AS a,zyads_adstype AS at ".$jaudit."\r\n\t\t\tWHERE u.status=2 and u.uid=p.uid AND p.status=1 and a.planid=p.planid  \r\n\t\t\tAND  ((p.restrictions=3 && FIND_IN_SET(".$_SESSION['uid'].",p.resuid)=0)  OR (p.restrictions=2 && \r\n\t\t\tFIND_IN_SET(".$_SESSION['uid'].",p.resuid)>0) OR p.restrictions=1) \r\n\t\t\tAND  ((p.sitelimit=3 && FIND_IN_SET(".$siteid.",p.limitsiteid)=0)  OR (p.sitelimit=2 && \r\n\t\t\tFIND_IN_SET(".$siteid.( ",p.limitsiteid)>0) OR p.sitelimit=1)\r\n\t\t\tAND (a.status=3 or a.status=2) \r\n\t\t\tAND LENGTH(a.dispurl)=0 AND a.adstypeid=at.adstypeid AND at.status=1  ".$plantypewhere.( "  ".$auditwhere." {$jcondition} " ) );
						return $sql."|".$ssql;
				}
				if ( $rows )
				{
						return $this->dbo->get_all( $sql );
				}
				return $this->dbo->get_one( $sql );
		}

		public function getprigraderows( $siteid = 0 )
		{
				$sql = "SELECT  p.priceinfo,p.gradeprice,p.s0price,p.s1price,p.s2price,p.s3price,p.audit,p.planname,p.price,p.plantype,a.*  FROM zyads_plan AS p,zyads_users as u,\r\n\t\tzyads_ads as a,zyads_adstype as at\r\n\t\tWHERE u.status=2 and u.uid=p.uid AND p.status=1 and a.planid=p.planid  AND  ((p.restrictions=3 && \r\n\t\tFIND_IN_SET(".$_SESSION['uid'].",p.resuid)=0)  OR (p.restrictions=2 && \r\n\t\tFIND_IN_SET(".$_SESSION['uid'].",p.resuid)>0) OR p.restrictions=1)\r\n\t\tAND  ((p.sitelimit=3 && FIND_IN_SET(".$siteid.",p.limitsiteid)=0)  OR (p.sitelimit=2 && \r\n\t\tFIND_IN_SET(".$siteid.",p.limitsiteid)>0) OR p.sitelimit=1)\r\n\t\tAND (a.status=3 or a.status=2) \r\n\t\tAND LENGTH(a.dispurl)=0 AND a.adstypeid=at.adstypeid AND at.status=1";
				$array = $this->dbo->get_all( $sql );
				return $array;
		}

		public function getdistplannamerows( )
		{
				$specses = explode( "x", $_POST['specs'] );
				$width = ( integer )$specses[0];
				$height = ( integer )$specses[1];
				$plantype = h( $_POST['plantype'] );
				$zonetype = h( $_POST['adstype'] );
				if ( $zonetype == "imgtw" )
				{
						$whadstype = " AND (a.adstype = 'img' || a.adstype = 'tw') ";
				}
				else
				{
						$whadstype = " AND a.adstype='".$zonetype."' ";
				}
				if ( in_array( $zonetype, array( "img", "tw", "imgtw" ) ) )
				{
						$widthwhere .= "AND a.width = ".$width." AND a.height = ".$height." ";
				}
				$sql = "SELECT  DISTINCT p.planname,p.audit,p.plantype,p.price,a.planid,p.resuid,p.restrictions\r\n\t\t\t\t FROM zyads_plan as p ,zyads_ads as a\r\n\t\t\t\tWHERE 1 ".$whadstype.( " ".$widthwhere."\r\n\t\t\t\tAND a.status=3 AND p.status=1 AND a.planid=p.planid AND p.plantype='{$plantype}'\r\n\t\t" );
				return $this->dbo->get_all( $sql );
		}

		public function getwhimgadsrows( $planid = NULL )
		{
				$specses = explode( "x", $_POST['specs'] );
				$width = ( integer )$specses[0];
				$height = ( integer )$specses[1];
				$plantype = h( $_POST['plantype'] );
				$adstype = h( $_POST['adstype'] );
				$zonetype = h( $_POST['adstype'] );
				if ( !is_null( $planid ) )
				{
						$planid = " AND a.planid=".$planid;
				}
				if ( 1 < $width && 1 < $height && in_array( $adstype, array( "img", "tw", "imgtw" ) ) )
				{
						$condition = " AND a.width = '".$width.( "' AND a.height='".$height."'" );
				}
				if ( $zonetype == "imgtw" )
				{
						$whadstype = " AND (a.adstype = 'img' || a.adstype = 'tw') ";
				}
				else
				{
						$whadstype = " AND a.adstype='".$zonetype."' ";
				}
				$sql = "SELECT a.width,a.height,a.imageurl,a.adsid,a.adstype,a.htmlcode,a.url,p.planname\r\n\t\t\t\tFROM zyads_plan as p ,zyads_ads as a\r\n\t\t\t\tWHERE 1 ".$whadstype.( " ".$condition." AND a.status=3 AND a.planid=p.planid {$planid}" );
				return $this->dbo->get_all( $sql );
		}

		public function getwhimxadst( $restr, $value )
		{
				if ( $value['zonetype'] == "imgtw" )
				{
						$whadstype = " AND (a.adstype = 'img' || a.adstype = 'tw') ";
				}
				else
				{
						$whadstype = " AND a.adstype='".$value['zonetype']."' ";
				}
				if ( 1 < $value['width'] && 1 < $value['height'] && in_array( $value['zonetype'], array( "img", "tw", "imgtw" ) ) )
				{
						$condition = " AND a.width = ".$value['width']."  AND a.height=".$value['height']."";
				}
				$sql = "SELECT a.width,a.height,a.imageurl,a.adsid,a.adstype,a.htmlcode,a.url,p.planname\r\n\t\t\t\tFROM zyads_plan as p ,zyads_ads as a\r\n\t\t\t\tWHERE 1 ".$whadstype.( " ".$condition."\r\n\t\t\t\tAND a.status=3 AND a.planid=p.planid AND a.planid=" ).$restr['planid']." \r\n\t\t";
				return $this->dbo->get_all( $sql );
		}

		public function getaclsbyplanid( $planid )
		{
				$planid = ( integer )$planid;
				if ( !$planid )
				{
						exit( "No Planid" );
				}
				$sql = "SELECT * FROM zyads_acls WHERE  planid=".$planid." ";
				return $this->dbo->get_all( $sql );
		}

		public function getdistplanameauditrows( $value )
		{
				if ( $value['zonetype'] == "imgtw" )
				{
						$whadstype = " AND (a.adstype = 'img' || a.adstype = 'tw') ";
				}
				else
				{
						$whadstype = " AND a.adstype='".$value['zonetype']."' ";
				}
				if ( 1 < $value['width'] && 1 < $value['height'] && in_array( $value['zonetype'], array( "img", "tw", "imgtw" ) ) )
				{
						$condition = " AND a.width = ".$value['width']."  AND a.height=".$value['height']."";
				}
				$sql = "SELECT  DISTINCT p.planname,p.audit,p.plantype,p.price,a.planid,p.resuid,p.restrictions\r\n\t\t\t\t FROM zyads_plan as p ,zyads_ads as a\r\n\t\t\t\tWHERE 1 ".$whadstype.( " ".$condition."\r\n\t\t\t\tAND a.status=3 AND p.status=1 AND a.planid=p.planid AND p.plantype='" ).$value['plantype']."' \r\n\t\t";
				return $this->dbo->get_all( $sql );
		}

		public function upzyadsplan( )
		{
				$planid = ( integer )$_POST['planid'];
				$price = floatval( $_POST['price'] );
				$gradeprice = ( integer )$_POST['gradeprice'];
				if ( $gradeprice == 1 )
				{
						$s0price = floatval( $_POST['s0price'] );
						$s1price = floatval( $_POST['s1price'] );
						$s2price = floatval( $_POST['s2price'] );
						$s3price = floatval( $_POST['s3price'] );
						$swhere = "s0price=".$s0price.( ",s1price=".$s1price.",s2price={$s2price},s3price={$s3price}" );
				}
				else
				{
						$price = floatval( $_POST['price'] );
						$swhere = "price=".$price;
				}
				$query = $this->dbo->query( "\r\n\t\t\t\tUPDATE\r\n\t\t\t\t\t zyads_plan\r\n\t\t\t\tSET\r\n\t\t\t\t\t".$swhere.( ",status=1\r\n\t\t\t\tWHERE \r\n\t\t\t\t\tplanid = ".$planid."\r\n\t\t" ) );
		}

		public function setplancheckplan( )
		{
				$action = $_REQUEST['action'];
				$nfuid = ( integer )$_POST['uid'];
				$planid = ( integer )$_POST['planid'];
				$metadata = ( integer )$_POST['status'];
				$planname = $_POST['planname'];
				$gradeprice = ( integer )$_POST['gradeprice'];
				$priceadv = floatval( $_POST['priceadv'] );
				$price = floatval( $_POST['price'] );
				if ( $gradeprice == 1 )
				{
						$s0price = floatval( $_POST['s0price'] );
						$s1price = floatval( $_POST['s1price'] );
						$s2price = floatval( $_POST['s2price'] );
						$s3price = floatval( $_POST['s3price'] );
				}
				$budget = $_POST['budget'];
				$expire_date = $_POST['expire_date'];
				$acl = $_POST['acl'];
				$clearing = $_POST['clearing'];
				$datatime = $_POST['datatime'];
				$serverip = $_POST['serverip'];
				$plantype = $_POST['plantype'];
				$planinfo = $_POST['planinfo'];
				$audit = $_POST['audit'];
				$restrictions = ( integer )$_POST['restrictions'];
				$resuid = preg_replace( "/\\s+/", "", $_POST['resuid'] );
				$sitelimit = ( integer )$_POST['sitelimit'];
				$limitsiteid = preg_replace( "/\\s+/", "", $_POST['limitsiteid'] );
				$deduction = ( integer )$_POST['deduction'];
				$top = ( integer )$_POST['top'];
				$in_site = ( integer )$_POST['in_site'];
				$priceinfo = $_POST['priceinfo'];
				if ( $datatime == "1" )
				{
						$datatime = ( integer )$_POST['datadate'];
				}
				else
				{
						$datatime = 0;
				}
				if ( empty( $planname ) || empty( $budget ) || empty( $clearing ) || empty( $priceadv ) || empty( $plantype ) )
				{
						message( "not_value" );
				}
				if ( $expire_date != "0000-00-00" )
				{
						$expire_date = $_POST['expire_year']."-".$_POST['expire_month']."-".$_POST['expire_day'];
				}
				$j = 0;
				for ( ;	$j < count( $acl );	++$j	)
				{
						if ( !( $acl[$j]['isacl'] != "all" ) && !empty( $acl[$j]['data'] ) )
						{
								echo "<BR>\$acl [".$j."] ['isacl'] =".$acl[$j]['isacl'];
								echo "<BR>isset ( \\isset ( \$acl [";
								echo $j;
								echo "] ['data'] ) ) =";
								var_dump( isset( $acl[$j]['data'] ) );
								echo "<BR>not_web_".$acl[$j]['type'];
						}
				}
				$array = array(
						"uid" => $nfuid == 0 ? $_SESSION['uid'] : $nfuid,
						"username" => $_SESSION['username'],
						"planname" => $planname,
						"priceadv" => $priceadv,
						"price" => 0 < $price ? $price : 0,
						"gradeprice" => $gradeprice,
						"s0price" => 0 < $s0price ? $s0price : 0,
						"s1price" => 0 < $s1price ? $s1price : 0,
						"s2price" => 0 < $s2price ? $s2price : 0,
						"s3price" => 0 < $s3price ? $s3price : 0,
						"budget" => $budget,
						"expire" => $expire_date,
						"checkplan" => "true",
						"plantype" => $plantype,
						"datatime" => $datatime,
						"serverip" => $serverip,
						"clearing" => $clearing,
						"planinfo" => $planinfo,
						"audit" => $audit,
						"restrictions" => $restrictions ? $restrictions : 1,
						"resuid" => $resuid,
						"sitelimit" => $sitelimit ? $sitelimit : 1,
						"limitsiteid" => $limitsiteid,
						"deduction" => 0 < $deduction ? $deduction : 0,
						"resuid" => $resuid,
						"top" => 0 < $top ? $top : 0,
						"in_site" => $in_site,
						"priceinfo" => $priceinfo,
						"status" => 0 < $metadata ? $metadata : 0,
						"addtime" => DATETIMES
				);
				$query = $this->dbo->create( $array, "zyads_plan" );
				$planid = $this->dbo->insert_id( );
				$j = 0;
				while ( list( $key ) = each( $acl ) )
				{
						if ( $acl[$key]['isacl'] != "all" )
						{
								if ( isset( $acl[$key]['data'] ) )
								{
										$acl[$key]['data'] = implode( ",", $acl[$key]['data'] );
								}
								else
								{
										$acl[$key]['data'] = "";
								}
								if ( 0 < $j )
								{
										$xws .= " AND ";
								}
								switch ( $acl[$key]['type'] )
								{
								case "webtype" :
										$xws .= "aT(\\'".$acl[$key]['data']."\\',\\'".$acl[$key]['comparison']."\\')";
										break;
								case "city" :
										$xws .= "aC(\\'".$acl[$key]['data']."\\',\\'".$acl[$key]['comparison']."\\')";
										break;
								case "time" :
										$xws .= "aD(\\'".$acl[$key]['data']."\\')";
										break;
								case "weekday" :
										$xws .= "aW(\\'".$acl[$key]['data']."\\')";
								}
								$array = array(
										"planid" => $planid,
										"type" => $acl[$key]['type'],
										"data" => $acl[$key]['data'],
										"comparison" => $acl[$key]['comparison']
								);
								$query = $this->dbo->create( $array, "zyads_acls" );
								++$j;
						}
				}
				if ( empty( $xws ) )
				{
						$xws = "true";
				}
				$query = $this->dbo->query( "\r\n\t\t\t\tUPDATE\r\n\t\t\t\t\t zyads_plan\r\n\t\t\t\tSET\r\n\t\t\t\t\tcheckplan = '".$xws.( "'\r\n\t\t\t\tWHERE \r\n\t\t\t\t\tplanid = ".$planid."\r\n\t\t" ) );
		}

		public function aclsplan( $type = "" )
		{
				$planid = ( integer )$_POST['planid'];
				$metadata = ( integer )$_POST['status'];
				$planname = $_POST['planname'];
				$gradeprice = ( integer )$_POST['gradeprice'];
				$priceadv = floatval( $_POST['priceadv'] );
				$budget = $_POST['budget'];
				$expire_date = $_POST['expire_date'];
				if ( $expire_date != "0000-00-00" )
				{
						$expire_date = $_POST['expire_year']."-".$_POST['expire_month']."-".$_POST['expire_day'];
				}
				$acl = $_POST['acl'];
				$clearing = $_POST['clearing'];
				$datatime = $_POST['datatime'];
				$serverip = $_POST['serverip'];
				$plantype = $_POST['plantype'];
				$planinfo = $_POST['planinfo'];
				$audit = $_POST['audit'];
				$restrictions = ( integer )$_POST['restrictions'] ? ( integer )$_POST['restrictions'] : 1;
				$resuid = preg_replace( "/\\s+/", "", $_POST['resuid'] );
				$sitelimit = ( integer )$_POST['sitelimit'] ? ( integer )$_POST['sitelimit'] : 1;
				$limitsiteid = preg_replace( "/\\s+/", "", $_POST['limitsiteid'] );
				$deduction = ( integer )$_POST['deduction'];
				$dosage = $_POST['dosage'];
				$top = ( integer )$_POST['top'];
				$in_site = ( integer )$_POST['in_site'];
				$priceinfo = $_POST['priceinfo'];
				$logo = $_POST['logo'];
				if ( $datatime == "1" )
				{
						$datatime = ( integer )$_POST['datadate'];
				}
				else
				{
						$datatime = 0;
				}
				if ( $restr['status'] == "0" && 0 < $price )
				{
						$condition = ",status=1";
				}
				if ( $type != "admin" )
				{
						$restr = $this->getplanrowbyiduid( );
						if ( !$restr )
						{
								exit( "Not Plan" );
						}
						$gradeprice = $restr['gradeprice'];
						$deduction = $restr['deduction'];
						$restrictions = $restr['restrictions'];
						$resuid = $restr['resuid'];
						$sitelimit = $restr['sitelimit'];
						$limitsiteid = $restr['limitsiteid'];
						$top = $restr['top'];
						$logo = $restr['logo'];
						if ( $priceadv < $restr['priceadv'] )
						{
								message( "min_oblprice" );
						}
				}
				else
				{
						$restr = $this->admingetplanone( $planid );
						if ( $gradeprice == 1 )
						{
								$s0price = floatval( $_POST['s0price'] );
								$s1price = floatval( $_POST['s1price'] );
								$s2price = floatval( $_POST['s2price'] );
								$s3price = floatval( $_POST['s3price'] );
								$swhere = ",s0price=".$s0price.( ",s1price=".$s1price.",s2price={$s2price},s3price={$s3price}" );
						}
						else
						{
								$price = floatval( $_POST['price'] );
								$swhere = ",price=".$price;
						}
				}
				$sql = "Update zyads_plan SET planname='".$planname.( "',priceadv=".$priceadv." {$swhere} ,gradeprice={$gradeprice},budget={$budget} ,clearing='{$clearing}'\r\n    \t\t\t,logo='{$logo}',audit='{$audit}',expire='{$expire_date}',planinfo='{$planinfo}',\r\n\t\t\t\trestrictions='{$restrictions}',resuid='{$resuid}',sitelimit='{$sitelimit}',limitsiteid='{$limitsiteid}',deduction = '{$deduction}',top = '{$top}',in_site = '{$in_site}',priceinfo = '{$priceinfo}',datatime={$datatime},serverip='{$serverip}' {$condition}\r\n    \t\t\tWhere planid={$planid}" );
				$query = $this->dbo->query( $sql );
				$acl = h( $_POST['acl'] );
				$j = 0;

//				for ( ;	$j < count( $acl );	++$j	)
//				{
//						if ( !( $acl[$j]['isacl'] != "all" ) && !empty( $acl[$j]['data'] ) )
//						{
//								message( "not_web_".$acl[$j]['type'], TRUE );
//						}
//				}
				$query = $this->dbo->query( "delete FROM `zyads_acls` WHERE planid=".$planid );
				$j = 0;
				while ( list( $key ) = each( $acl ) )
				{
						if ( $acl[$key]['isacl'] != "all" )
						{
								if ( isset( $acl[$key]['data'] ) )
								{
										$acl[$key]['data'] = implode( ",", $acl[$key]['data'] );
								}
								else
								{
										$acl[$key]['data'] = "";
								}
								if ( 0 < $j )
								{
										$xws .= " AND ";
								}
								switch ( $acl[$key]['type'] )
								{
								case "webtype" :
										$xws .= "aT(\\'".$acl[$key]['data']."\\',\\'".$acl[$key]['comparison']."\\')";
										break;
								case "city" :
										$xws .= "aC(\\'".$acl[$key]['data']."\\',\\'".$acl[$key]['comparison']."\\')";
										break;
								case "time" :
										$xws .= "aD(\\'".$acl[$key]['data']."\\')";
										break;
								case "weekday" :
										$xws .= "aW(\\'".$acl[$key]['data']."\\')";
                                        break;
                                case "pt" :
                                        $xws .= "aP(\\'".$acl[$key]['data']."\\')";
								}
								$array = array(
										"planid" => $planid,
										"type" => $acl[$key]['type'],
										"data" => $acl[$key]['data'],
										"comparison" => $acl[$key]['comparison']
								);
								$query = $this->dbo->create( $array, "zyads_acls" );
								++$j;
						}
				}
				if ( empty( $xws ) )
				{
						$xws = "true";
				}
				$query = $this->dbo->query( "\r\n\t\t\t\tUPDATE\r\n\t\t\t\t\t zyads_plan\r\n\t\t\t\tset\r\n\t\t\t\t\tcheckplan = '".$xws.( "'\r\n\t\t\t\tWHERE \r\n\t\t\t\t\tplanid = ".$planid."\r\n\t\t" ) );
				$adscla = Z::getsingleton( "model_adsclass" );
				$zyadsrow = $adscla->getzyadsrowtoplanid( $planid );
				foreach ( ( array )$zyadsrow as $m )
				{
						$adscla->adscachetype( $m['adsid'], "del" );
				}
		}

		public function getplanidbytypeuid( $plantype )
		{
				$sql = "SELECT planid FROM zyads_plan\r\n\t\t\t\tWHERE plantype='".$plantype."' AND uid=".$_SESSION['uid']." AND status=1";
				return $this->dbo->get_num( $sql );
		}

		public function getplanrowbyiduid( )
		{
				$sql = "SELECT * FROM zyads_plan\r\n\t\t\t\t WHERE planid=".$this->planid." AND uid=".$_SESSION['uid'];
				return $this->dbo->get_one( $sql );
		}

		public function getzyadsplanbyplanid( $planid = "" )
		{
				if ( $planid )
				{
						$this->planid = $planid;
				}
				$sql = "SELECT * FROM zyads_plan\r\n\t\t\t\t WHERE planid=".( integer )$this->planid;
				return $this->dbo->get_one( $sql );
		}

		public function getplanrowsbyuid( )
		{
				$sql = "SELECT * FROM zyads_plan\r\n\t\t\t\t WHERE  uid=".$_SESSION['uid'];
				return $this->dbo->get_all( $sql );
		}

		public function getbyplanidsqlandnum( )
		{
				$planid = ( integer )$_GET['planid'];
				if ( $planid )
				{
						$condition = " AND planid='".$planid."'";
				}
				$sql = "SELECT * FROM zyads_plan\r\n\t\t\t\t WHERE uid=".$_SESSION['uid'].( "  ".$condition." Order By planid desc" );
				$ssql = "SELECT count(*) AS n FROM zyads_plan\r\n\t\t\t\t WHERE uid=".$_SESSION['uid'].( "  ".$condition );
				return $sql."|".$ssql;
		}

		public function gettadsplanbyuid( )
		{
				$sql = "SELECT * FROM zyads_plan\r\n\t\t\t\t WHERE  uid=".$_SESSION['uid'];
				return $this->dbo->get_num( $sql );
		}

		public function getsumdesqlandnum( )
		{
				$plantype = $_GET['plantype'];
				$planid = ( integer )$_GET['planid'];
				if ( $this->plantype )
				{
						$condition .= " AND p.plantype='".$plantype."'";
				}
				if ( $planid != "" )
				{
						$condition .= " AND p.planid='".$planid."'";
				}
				$sql = "SELECT p.*,sum(s.num+s.deduction) as n ,sum(s.views) as v  FROM zyads_plan as p\r\n\t\t\t\tLEFT JOIN (zyads_stats as s) On (s.planid=p.planid) \r\n\t\t\t\t WHERE  p.uid=".$_SESSION['uid'].( " \t\t\t\t \r\n\t\t\t\t ".$condition.( " ".$filesize." GROUP BY p.planid Order By p.planid desc" ) );
				$ssql = "SELECT count(distinct p.planid) AS n FROM zyads_plan as p\r\n\t\t\t\tLEFT JOIN (zyads_stats as s) On (s.planid=p.planid) \r\n\t\t\t\t WHERE  p.uid=".$_SESSION['uid'].( " \t\t\t\t \r\n\t\t\t\t ".$condition.( " ".$filesize ) );
				return $sql."|".$ssql;
		}

		public function gtplanonebytypeuid( )
		{
				$sql = "SELECT * FROM zyads_plan\r\n\t\t \t\t WHERE plantype='".$this->plantype."' \r\n\t\t \t\t AND uid=".$_SESSION['uid']." Order By planid desc";
				return $this->dbo->get_one( $sql );
		}

		public function getaclsbyplanaid( $bls = "" )
		{
				if ( !$bls )
				{
						$admingetplanone = $this->getplanrowbyiduid( );
						if ( !$admingetplanone )
						{
								exit( "Not Plna" );
						}
				}
				$planid = ( integer )$_REQUEST['planid'];
				return $this->dbo->get_all( "SELECT * FROM zyads_acls WHERE planid=".$planid );
		}

		public function getplanwebtypeaclcomparison( $planid )
		{
				$sql = "SELECT * FROM zyads_acls\r\n\t\t\t\t WHERE planid=".$planid." AND type = 'webtype'";
				return $this->dbo->get_one( $sql );
		}

		public function setplannamebyuid( )
		{
				$planname = h( $_POST['planname'] );
				$planid = ( integer )$_POST['planid'];
				$sql = "UPDATE  zyads_plan set planname='".$planname.( "'\r\n\t\t\t\tWHERE planid=".$planid." AND uid=" ).$_SESSION['uid'];
				return $this->dbo->query( $sql );
		}

		public function setaudit( )
		{
				$audit = h( $_POST['audit'] );
				$planid = ( integer )$_POST['planid'];
				$sql = "UPDATE  zyads_plan set audit='".$audit.( "'\r\n\t\t\t\tWHERE planid=".$planid." AND uid=" ).$_SESSION['uid'];
				$this->dbo->query( $sql );
				$adscla = Z::getsingleton( "model_adsclass" );
				$zyadsrow = $adscla->getzyadsrowtoplanid( $planid );
				foreach ( ( array )$zyadsrow as $m )
				{
						$adscla->adscachetype( $m['adsid'], "del" );
				}
		}

		public function setplaninfo( )
		{
				$planinfo = h( $_POST['planinfo'] );
				$planid = ( integer )$_POST['planid'];
				$sql = "UPDATE  zyads_plan set planinfo='".$planinfo.( "'\r\n\t\t\t\tWHERE planid=".$planid." AND uid=" ).$_SESSION['uid'];
				return $this->dbo->query( $sql );
		}

		public function setpriceadv( )
		{
				$priceadv = $_POST['price'];
				$oblprice = $_POST['oblprice'];
				$budget = $_POST['budget'];
				$expire_date = $_POST['expire'];
				$planid = ( integer )$_POST['planid'];
				$clearing = $_POST['clearing'];
				$datatime = $_POST['datatime'];
				$serverip = $_POST['serverip'];
				$plantype = $_POST['plantype'];
				$restrictions = ( integer )$_POST['restrictions'];
				$resuid = h( $_POST['resuid'] );
				if ( $priceadv < $oblprice )
				{
						message( "min_oblprice" );
				}
				if ( $datatime == "1" )
				{
						$datatime = ( integer )$_POST['datadate'];
				}
				else
				{
						$datatime = 0;
				}
				if ( $expire_date == "" )
				{
						$expire_date = "0000-00-00";
				}
				$sql = "UPDATE  zyads_plan Set priceadv='".$priceadv.( "',budget='".$budget."',expire='{$expire_date}',\r\n\t\t\t\tclearing='{$clearing}',datatime='{$datatime}',serverip='{$serverip}',\r\n\t\t\t\trestrictions='{$restrictions}',resuid='{$resuid}'\r\n\t\t\t\tWHERE planid={$planid} AND uid=" ).$_SESSION['uid'];
				$b = $this->dbo->query( $sql );
				$adscla = Z::getsingleton( "model_adsclass" );
				$zyadsrow = $adscla->getzyadsrowtoplanid( $planid );
				foreach ( ( array )$zyadsrow as $m )
				{
						$adscla->adscachetype( $m['adsid'], "del" );
				}
				return $b;
		}

		public function setplanstatus( $bls = FALSE )
		{
				if ( $bls )
				{
						$where = "";
				}
				else
				{
						$where = " AND uid=".$_SESSION['uid'];
				}
				$planid = ( integer )$_GET['planid'];
				$metadata = ( integer )$_GET['getstatus'];
				$sql = "UPDATE  zyads_plan set status='".$metadata.( "'\r\n\t\t\t\tWHERE planid=".$planid." {$where}" );
				$this->dbo->query( $sql );
				$adscla = Z::getsingleton( "model_adsclass" );
				$zyadsrow = $adscla->getzyadsrowtoplanid( $planid );
				foreach ( ( array )$zyadsrow as $m )
				{
						$adscla->adscachetype( $m['adsid'], "del" );
				}
				return $metadata;
		}

		public function delacls( )
		{
				$admingetplanone = $this->getplanrowbyiduid( );
				$planid = ( integer )$admingetplanone['planid'];
				$acl = h( $_POST['acl'] );
				$j = 0;
				for ( ;	$j < count( $acl );	++$j	)
				{
						if ( !( $acl[$j]['isacl'] != "all" ) )
						{
								if ( empty( $acl[$j]['data'] ) )
								{
										message( "not_web_".$acl[$j]['type'], TRUE );
								}
						}
				}
				$query = $this->dbo->query( "delete FROM `zyads_acls` WHERE planid=".$planid );
				$j = 0;
				while ( list( $key ) = each( $acl ) )
				{
						if ( $acl[$key]['isacl'] != "all" )
						{
								if ( isset( $acl[$key]['data'] ) )
								{
										$acl[$key]['data'] = implode( ",", $acl[$key]['data'] );
								}
								else
								{
										$acl[$key]['data'] = "";
								}
								if ( 0 < $j )
								{
										$xws .= " AND ";
								}
								switch ( $acl[$key]['type'] )
								{
								case "webtype" :
										$xws .= "aT(\\'".$acl[$key]['data']."\\',\\'".$acl[$key]['comparison']."\\')";
										break;
								case "city" :
										$xws .= "aC(\\'".$acl[$key]['data']."\\',\\'".$acl[$key]['comparison']."\\')";
										break;
								case "time" :
										$xws .= "aD(\\'".$acl[$key]['data']."\\')";
										break;
								case "weekday" :
										$xws .= "aW(\\'".$acl[$key]['data']."\\')";
								}
								$array = array(
										"planid" => $planid,
										"type" => $acl[$key]['type'],
										"data" => $acl[$key]['data'],
										"comparison" => $acl[$key]['comparison']
								);
								$query = $this->dbo->create( $array, "zyads_acls" );
								++$j;
						}
				}
				if ( empty( $xws ) )
				{
						$xws = "true";
				}
				$query = $this->dbo->query( "\r\n\t\t\t\tUPDATE\r\n\t\t\t\t\t zyads_plan\r\n\t\t\t\tset\r\n\t\t\t\t\tcheckplan = '".$xws.( "'\r\n\t\t\t\tWHERE \r\n\t\t\t\t\tplanid = ".$planid."\r\n\t\t" ) );
				$adscla = Z::getsingleton( "model_adsclass" );
				$zyadsrow = $adscla->getzyadsrowtoplanid( $planid );
				foreach ( ( array )$zyadsrow as $m )
				{
						$adscla->adscachetype( $m['adsid'], "del" );
				}
		}

		public function skjscript( )
		{
				$sql = "SELECT * FROM `zyads_sitetype` WHERE parentid = 0 ";
				$row = $this->dbo->get_all( $sql );
				$script = "<script langguage='javascript'>\r\n\t\t\tvar sk=[];\r\n    \t\tvar st={\r\n\t\t";
				$i = count( $row );
				foreach ( ( array )$row as $value )
				{
						$sql = "SELECT * FROM `zyads_sitetype` WHERE parentid =".$value['sid'];
						$sitename = $this->dbo->get_all( $sql );
						$j = count( $sitename );
						$script .= $value['sid'].":{name:\"".$value['sitename']."\",sub:{";
						foreach ( ( array )$sitename as $sitename )
						{
								$script .= $sitename['sid'].":\"".$sitename['sitename']."\"";
								if ( $j - 1 )
								{
										$script .= ",";
								}
								--$j;
						}
						$script .= "}}";
						if ( $i - 1 )
						{
								$script .= ",\r\n\t\t\t";
						}
						--$i;
				}
				$script .= "     }\r\n\t</script>";
				return $script;
		}

		public function tsitetypeparents( )
		{
				$sql = "SELECT * FROM `zyads_sitetype`\r\n\t\t\t\tWHERE parentid>0";
				return $this->dbo->get_all( $sql );
		}

		public function getsitetypeparentzone( )
		{
				$sql = "SELECT * FROM `zyads_sitetype`\r\n\t\t\t\tWHERE parentid=0";
				return $this->dbo->get_all( $sql );
		}

		public function gxgetplanviews( $planid )
		{
				$sql = "SELECT sum(s.num+s.deduction) as n ,sum(s.views) as v\r\n\t\tFROM zyads_planstats as s \r\n\t\tWHERE  s.planid=".$planid."  ";
				$b = $this->dbo->get_one( $sql );
				return $b;
		}

		public function gxgetplanadsnum( $planid )
		{
				$sql = "SELECT count(*) as n FROM zyads_ads\r\n    \t\t\tWHERE planid=".$planid;
				$query = $this->dbo->query( $sql );
				$array = $this->dbo->fetch_array( $query );
				return $array['n'];
		}

		public function getplanidone( )
		{
				$sql = "SELECT * FROM zyads_plan\r\n\t\t\t\t WHERE planid=".$this->planid." AND status=1";
				return $this->dbo->get_one( $sql );
		}

		public function updatezyadsmark( )
		{
				$planid = ( integer )$_GET['planid'];
				$mark = ( integer )$_GET['mark'];
				$query = $this->dbo->query( "\r\n\t\t\t\tUPDATE\r\n\t\t\t\t\t zyads_plan\r\n\t\t\t\tset\r\n\t\t\t\t\tmark = '".$mark.( "'\r\n\t\t\t\tWHERE \r\n\t\t\t\t\tplanid = ".$planid."\r\n\t\t" ) );
		}

		public function admingetplanone( $planid = "" )
		{
				if ( $planid == "" )
				{
						$planid = $this->planid;
				}
				$sql = "SELECT * FROM zyads_plan\r\n\t\t\t\t WHERE planid='".$planid."'";
				return $this->dbo->get_one( $sql );
		}

		public function getplanstatus1( )
		{
				$sql = "SELECT planname,planid,plantype FROM zyads_plan\r\n\t\t\t\t WHERE status=1";
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function getplanrowstatus1( )
		{
				$sql = "SELECT * FROM zyads_plan WHERE  status=1";
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function getplanrows( )
		{
				$sql = "SELECT * FROM zyads_plan";
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function planquerysqlandnum( $plantype = "" )
		{
				$metadata = $_REQUEST['status'];
				$searchtype = h( $_REQUEST['searchtype'] );
				$searchval = h( trim( $_REQUEST['searchval'] ) );
				$actiontype = h( $_REQUEST['actiontype'] );
				$clearing = $_REQUEST['clearing'];
				$checkplan = $_REQUEST['checkplan'];
				$restrictions = $_REQUEST['restrictions'];
				$audit = $_REQUEST['audit'];
				$sortingtype = $_REQUEST['sortingtype'];
				$sortingm = $_REQUEST['sortingm'];
				$whstatus = $shadstypeid = $clearingwhere = $restrictionswhere = $checkplanwhere = $auditwhere = $condition = "";
				if ( $metadata != "" )
				{
						$whstatus = "\t AND p.status = ".( integer )$metadata."";
				}
				if ( $searchval )
				{
						if ( $searchtype == "1" )
						{
								$condition = " AND  p.planname like '%".$searchval."%'";
						}
						else if ( $searchtype == "2" )
						{
								$condition = " AND  p.planid  =".( integer )$searchval;
						}
						else if ( $searchtype == "3" )
						{
								$condition = " AND  p.uid =".( integer )$searchval;
						}
				}
				if ( !empty( $plantype ) )
				{
						$shadstypeid = " AND p.plantype='".$plantype."'";
				}
				if ( $clearing )
				{
						$clearingwhere = " AND clearing='".$clearing."'";
				}
				if ( $checkplan )
				{
						$checkplanwhere = " AND checkplan!='true'";
				}
				if ( $restrictions )
				{
						$restrictionswhere = " AND restrictions!=1";
				}
				if ( $audit )
				{
						$auditwhere = " AND audit='y'";
				}
				if ( !$sortingtype )
				{
						$sortingtype = "p.planid";
				}
				if ( !$sortingm )
				{
						$sortingm = "DESC";
				}
				$sql = "SELECT * FROM zyads_plan as p Where  1 ".$whstatus.( " ".$shadstypeid." {$clearingwhere} {$restrictionswhere} {$checkplanwhere} {$auditwhere}  {$condition} Order By {$sortingtype} {$sortingm}" );
				$ssql = "SELECT count(*) AS n FROM zyads_plan as p Where  1 ".$whstatus.( " ".$shadstypeid." {$clearingwhere} {$restrictionswhere} {$checkplanwhere} {$auditwhere} {$condition} " );
				return $sql."|".$ssql;
		}

		public function clearuserdata( )
		{
				$planid = $_REQUEST['planid'];
				$mode = $_REQUEST['choosetype'];
				if ( is_array( $planid ) )
				{
						if ( $mode == "del" )
						{
								foreach ( $planid as $planid )
								{
										$query = $this->dbo->query( "Delete From zyads_plan Where planid = ".$planid );
										$query = $this->dbo->query( "Delete From zyads_acls Where planid = ".$planid );
										$query = $this->dbo->query( "Delete From zyads_ads Where planid = ".$planid );
										$adscla = Z::getsingleton( "model_adsclass" );
										$zyadsrow = $adscla->getzyadsrowtoplanid( $planid );
										foreach ( ( array )$zyadsrow as $m )
										{
												$adscla->adscachetype( $m['adsid'], "del" );
										}
								}
						}
						if ( $mode == "unlock" )
						{
								foreach ( $planid as $planid )
								{
										$query = $this->dbo->query( "Update zyads_plan SET status=1 Where planid = ".$planid );
										$adscla = Z::getsingleton( "model_adsclass" );
										$zyadsrow = $adscla->getzyadsrowtoplanid( $planid );
										foreach ( ( array )$zyadsrow as $m )
										{
												$adscla->adscachetype( $m['adsid'], "del" );
										}
								}
						}
						if ( $mode == "lock" )
						{
								foreach ( $planid as $planid )
								{
										$query = $this->dbo->query( "Update zyads_plan SET status=2 Where planid= ".$planid );
										$adscla = Z::getsingleton( "model_adsclass" );
										$zyadsrow = $adscla->getzyadsrowtoplanid( $planid );
										foreach ( ( array )$zyadsrow as $m )
										{
												$adscla->adscachetype( $m['adsid'], "del" );
										}
								}
						}
				}
				else
				{
						return FALSE;
				}
		}

		public function setplanamepriceadv( )
		{
				$planname = h( $_POST['planname'] );
				$logo = h( $_POST['logo'] );
				$planid = ( integer )$_POST['planid'];
				$priceadv = h( $_POST['priceadv'] );
				$price = h( $_POST['price'] );
				$deduction = h( $_POST['deduction'] );
				$budget = ( integer )$_POST['budget'];
				$clearing = $_POST['clearing'];
				$audit = h( $_POST['audit'] );
				$expire_date = h( $_POST['expire'] );
				$restrictions = ( integer )$_POST['restrictions'];
				$resuid = h( $_POST['resuid'] );
				if ( $expire_date == "" )
				{
						$expire_date = "0000-00-00";
				}
				$restr = $this->admingetplanone( $planid );
				if ( $restr['status'] == "0" && 0 < $price )
				{
						$condition = ",status=1";
				}
				$sql = "Update zyads_plan SET planname='".$planname.( "',priceadv=".$priceadv.",\r\n    \t\t\tprice={$price},budget={$budget} ,deduction = {$deduction},clearing='{$clearing}'\r\n    \t\t\t,logo='{$logo}',audit='{$audit}',expire='{$expire_date}',\r\n\t\t\t\trestrictions='{$restrictions}',resuid='{$resuid}' {$condition}\r\n    \t\t\tWhere planid={$planid}" );
				$query = $this->dbo->query( $sql );
		}

}

?>
