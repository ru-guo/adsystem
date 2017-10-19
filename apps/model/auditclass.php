<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_AuditClass
{

		public $dbo = NULL;

		public function model_auditclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function getauditbyplanid( $planid )
		{
				$siteid = ( integer )$_REQUEST['siteid'];
				if ( $siteid )
				{
						$siteidwhere = " AND siteid=".$siteid;
				}
				$sql = "SELECT * FROM zyads_audit\r\n\t\t\t\t WHERE planid=".$planid."  AND  uid =".$_SESSION['uid'].( " ".$siteidwhere );
				return $this->dbo->get_all( $sql );
		}

		public function getplanidaudit( $auditid = "" )
		{
				if ( !$auditid )
				{
						$auditid = $_GET['auditid'];
						$auditid = $auditid[0];
				}
				$sql = "SELECT a.planid FROM zyads_audit As a ,zyads_plan AS p , zyads_users AS u\r\n\t\t\t\t WHERE a.auditid=".$auditid." AND a.planid=p.planid AND p.uid=u.uid AND u.uid =".$_SESSION['uid'];
				return $this->dbo->get_one( $sql );
		}

		public function ckplanidaudit( $pid = "", $sitetype = "" )
		{
				$planid = 0 < $pid ? $pid : ( integer )$_REQUEST['planid'];
				$siteid = 0 < $sitetype ? $sitetype : ( integer )$_REQUEST['siteid'];
				$sql = "SELECT * FROM zyads_audit\r\n\t\t\t\t WHERE planid=".$planid.( " AND siteid=".$siteid." AND uid =" ).$_SESSION['uid'];
				$b = $this->dbo->get_one( $sql );
				if ( $b['status'] == "1" )
				{
						return "deny";
				}
				if ( $b['status'] == "0" )
				{
						return "re";
				}
				if ( $b['status'] == "2" )
				{
						return "ok";
				}
		}

		public function createadsaudit( )
		{
				$planid = ( integer )$_REQUEST['planid'];
				$siteid = ( integer )$_REQUEST['siteid'];
				if ( !$planid || !$siteid )
				{
						return FALSE;
				}
				$b = $this->ckplanidaudit( $planid, $siteid );
				if ( $b )
				{
						return FALSE;
				}
				$array = array(
						"planid" => $planid,
						"siteid" => $siteid,
						"uid" => $_SESSION['uid'],
						"addtime" => DATETIMES
				);
				$this->dbo->create( $array, "zyads_audit" );
				$auditid = $this->dbo->insert_id( );
				return $auditid;
		}

		public function getauditsiteuserbysqlandnum( $usertype = "" )
		{
				$metadata = $_REQUEST['status'];
				$planid = $_REQUEST['planid'];
				$searchtype = $_REQUEST['searchtype'];
				$searchval = trim( $_REQUEST['searchval'] );
				$actiontype = $_REQUEST['actiontype'];
				$timetype = isset( $_REQUEST['timetype'] ) ? $_REQUEST['timetype'] : "";
				$addtion = $condition = $whstatus = "";
				if ( $usertype == "adv" )
				{
						$addtion = " AND p.uid=".$_SESSION['uid']."";
				}
				if ( $metadata != "" )
				{
						$whstatus = "\ta.status = ".( integer )$metadata." AND";
				}
				if ( $planid != "" )
				{
						$planidads = "   p.planid ='".( integer )$planid."' AND";
				}
				if ( $searchval != "" )
				{
						if ( $searchtype == "1" )
						{
								$condition = " AND  s.sitename like '%".$searchval."%'";
						}
						else if ( $searchtype == "2" )
						{
								$condition = " AND s.siteurl like '%".$searchval."%'";
						}
						else if ( $searchtype == "3" )
						{
								$condition = " AND  u.username like '%".$searchval."%'";
						}
				}
				$sql = "SELECT s.sitetype,s.siteurl,s.sitename,s.alexapr,u.username,p.planname,a.*\r\n\t\t   \t\tFROM  zyads_site As s,zyads_users As u,zyads_audit As a ,zyads_plan As p \r\n\t\t   \t\tWHERE ".$whstatus.( " ".$planidads." a.siteid=s.siteid AND s.uid=u.uid AND a.planid=p.planid {$addtion} {$condition}  ORDER By a.auditid DESC" );
				$ssql = "SELECT count(*) AS n\r\n\t\t\t\tFROM  zyads_site As s,zyads_users As u,zyads_audit As a ,zyads_plan As p \r\n\t\t   \t\tWHERE ".$whstatus.( "  ".$planidads." a.siteid=s.siteid AND s.uid=u.uid AND a.planid=p.planid {$addtion} {$condition} " );
				return $sql."|".$ssql;
		}

		public function updatesitedenyinfo( )
		{
				$auditid = ( integer )$_POST['auditid'];
				$denyinfo = $_POST['denyinfo'];
				$sql = "UPDATE  zyads_audit Set\r\n\t\t    denyinfo = '".$denyinfo.( "',\r\n\t\t    status = 1\r\n\t\t\tWHERE auditid=".$auditid );
				return $this->dbo->query( $sql );
		}

		public function getsiteidauditbyid( $auditid )
		{
				$sql = "SELECT siteid FROM zyads_audit Where auditid=".$auditid;
				return $this->dbo->get_one( $sql );
		}

		public function auditpermission( $usertype = "" )
		{
				require_once( APP_DIR."/client/makecache1.php" );
				$auditidarr = $_REQUEST['auditid'];
				$choosetype = $_REQUEST['choosetype'];
				$sitemodel = Z::getsingleton( "model_siteclass" );
				$audituser = $_SESSION['adminusername'];
				if ( $usertype == "aff" )
				{
						$audituser = $_SESSION['username'];
						foreach ( $auditidarr as $auditid )
						{
								$a = $this->getplanidaudit( $auditid );
								if ( $a )
								{
										continue;
								}
								exit( "Does not have permission" );
						}
				}
				if ( is_array( $auditidarr ) )
				{
						if ( $choosetype == "del" )
						{
								foreach ( $auditidarr as $auditid )
								{
										$query = $this->dbo->query( "Delete From zyads_audit Where auditid=".$auditid );
										$sites = $this->getsiteidauditbyid( $auditid );
										foreach ( ( array )$sites as $s )
										{
												$z = $sitemodel->getzoneidsitedid( $s['siteid'] );
												foreach ( ( array )$z as $z )
												{
														delzoneidcache( $z['zoneid'] );
												}
										}
								}
						}
						if ( $choosetype == "unlock" )
						{
								foreach ( $auditidarr as $auditid )
								{
										if ( in_array( "userplanactivate", explode( ",", $GLOBALS['C_ZYIIS']['tomail'] ) ) )
										{
												$usermodel = Z::getsingleton( "model_userclass" );
												$planmodel = Z::getsingleton( "model_planclass" );
												$sql = "SELECT * FROM zyads_audit WHERE auditid=".( integer )$auditid;
												$au = $this->dbo->get_one( $sql );
												$plan = $planmodel->getzyadsplanbyplanid( $au['planid'] );
												if ( $au['status'] == 0 )
												{
														$user = $usermodel->getusersuidrow( $au['uid'] );
														include( P_TPL."/emailtpl/subject.php" );
														$emailtpl = P_TPL."/emailtpl/userplanactivate.html";
														$body = @file_get_contents( $emailtpl );
														$r = array(
																$user['username'],
																$GLOBALS['C_ZYIIS']['sitename'],
																$GLOBALS['C_ZYIIS']['authorized_url'],
																$plan['planname']
														);
														$s = array( "{username}", "{sitename}", "{siteurl}", "{planname}" );
														$body = str_replace( $s, $r, $body );
														sendmail( $user['email'], $subject['userplanactivate'], $body );
												}
										}
										$sql = "Update zyads_audit SET audittime='".DATETIMES."', status=2, audituser='".$audituser.( "' Where auditid=".$auditid );
										$query = $this->dbo->query( $sql );
										$sites = $this->getsiteidauditbyid( $auditid );
										foreach ( ( array )$sites as $s )
										{
												$z = $sitemodel->getzoneidsitedid( $s['siteid'] );
												foreach ( ( array )$z as $z )
												{
														delzoneidcache( $z['zoneid'] );
												}
										}
								}
						}
						if ( $choosetype == "deny" )
						{
								foreach ( $auditidarr as $auditid )
								{
										$sql = "Update zyads_audit SET  audittime='".DATETIMES."',status=1 , audituser='".$audituser.( "' Where auditid=".$auditid );
										$query = $this->dbo->query( $sql );
										$sites = $this->getsiteidauditbyid( $auditid );
										foreach ( ( array )$sites as $s )
										{
												$z = $sitemodel->getzoneidsitedid( $s['siteid'] );
												foreach ( ( array )$z as $z )
												{
														delzoneidcache( $z['zoneid'] );
												}
										}
								}
						}
				}
				else
				{
						return FALSE;
				}
		}

}

?>
