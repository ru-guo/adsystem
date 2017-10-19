<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_PayClass
{

		public $dbo = NULL;

		public function model_payclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function createonlinepay( $username, $imoney, $paytype, $value )
		{
				$array = array(
						"username" => $username,
						"imoney" => $imoney,
						"paytype" => $paytype,
						"orderid" => $value,
						"adminuser" => $username,
						"status" => 0,
						"addtime" => DATETIMES
				);
				$query = $this->dbo->create( $array, "zyads_onlinepay" );
		}

		public function getonlinepaybyorderyid( $value, $imoney )
		{
				$value = zaddslashes( $value );
				$imoney = zaddslashes( $imoney );
				$sql = "SELECT * FROM zyads_onlinepay WHERE orderid = '".$value."' AND status=0";
				$b = $this->dbo->get_one( $sql );
				if ( $b )
				{
						$sql = "UPDATE zyads_onlinepay SET status=2 WHERE orderid = '".$value."'";
						$query = $this->dbo->query( $sql );
						$sql = "UPDATE zyads_users SET money=money+".$imoney." WHERE username='".$b['username']."'";
						$query = $this->dbo->query( $sql );
						return TRUE;
				}
				return FALSE;
		}

		public function getonlinepaybyorderyidstatuszone( $value )
		{
				$sql = "SELECT * FROM zyads_onlinepay WHERE orderid = '".$value."' AND status=0";
				$b = $this->dbo->get_one( $sql );
				return $b;
		}

		public function getonlinepaysqlandnum( )
		{
				$sql = "SELECT * From zyads_onlinepay WHERE username='".$_SESSION['username']."'   ORDER BY onlineid  DESC";
				$ssql = "SELECT count(*) AS n FROM zyads_onlinepay WHERE username='".$_SESSION['username']."' ";
				return $sql."|".$ssql;
		}

		public function getusernameonlinepaylistton( $p )
		{
				if ( !$p )
				{
						$p = 3;
				}
				$sql = "SELECT * From zyads_onlinepay WHERE username ='".$_SESSION['username'].( "' ORDER BY onlineid  DESC Limit 0, ".$p );
				$array = $this->dbo->get_all( $sql );
				return $array;
		}

		public function queryonlinepaysqlsandnum( )
		{
				$paytype = $_GET['paytype'];
				$actiontype = $_GET['actiontype'];
				$metadata = $_GET['status'];
				$searchval = trim( $_REQUEST['searchval'] );
				$condition = "";
				if ( $paytype == "0" )
				{
						$condition = " WHERE paytype='' ";
				}
				if ( $paytype == "1" )
				{
						$condition = " WHERE paytype!='' ";
				}
				if ( $metadata != "" )
				{
						$condition = " WHERE  status=".( integer )$metadata;
				}
				if ( $searchval )
				{
						$condition = " WHERE username like '%".$searchval."%'";
				}
				$sql = "SELECT * From zyads_onlinepay ".$condition." ORDER BY onlineid  DESC";
				$ssql = "SELECT count(*) AS n FROM zyads_onlinepay ".$condition;
				return $sql."|".$ssql;
		}

		public function adsetmoneybyusername( )
		{
				$statscla = Z::getsingleton( "model_statsclass" );
				$usercla = Z::getsingleton( "model_userclass" );
				$sumpay = $statscla->sumpay( );
				$row = $this->dbo->get_all( $sumpay );
				$ratio = ( integer )$_REQUEST['ratio'];
				$clearing = $_REQUEST['clearing'];
				$cmoney = $clearing."money";
				$timerange = $_REQUEST['timerange'];
				$payinfo = $_REQUEST['payinfo'];
				foreach ( ( array )$row as $i )
				{
						$username = $usercla->getusersuidrow( $i['uid'] );
						$imoney = $i['sumpay'] * ( $ratio / 100 );
						$array = array(
								"username" => $username['username'],
								"status" => 3,
								"imoney" => $imoney,
								"payinfo" => $payinfo,
								"paytype" => "bc",
								"orderid" => $timerange,
								"adminuser" => $_SESSION['adminusername'],
								"addtime" => DATETIMES
						);
						$b = $this->dbo->create( $array, "zyads_onlinepay" );
						$sql = "UPDATE  zyads_users set ".$cmoney.( "=".$cmoney."+{$imoney} WHERE username='" ).$username['username']."'";
						$this->dbo->query( $sql );
				}
		}

		public function createonlinepaytopost( )
		{
				$username = h( $_POST['touser'] );
				$metadata = h( $_POST['status'] );
				$imoney = h( $_POST['imoney'] );
				$payinfo = h( $_POST['payinfo'] );
				$clearing = h( $_POST['clearing'] );
				$usercla = Z::getsingleton( "model_userclass" );
				$gettusernamerow = $usercla->gettusernamerow( $username );
				if ( !$gettusernamerow )
				{
						exit( "Username empty" );
				}
				if ( $gettusernamerow['type'] == "1" )
				{
						$cmoney = $clearing."money";
				}
				else
				{
						$cmoney = "money";
				}
				$array = array(
						"username" => $username,
						"status" => $metadata,
						"imoney" => $imoney,
						"payinfo" => $payinfo,
						"adminuser" => $_SESSION['adminusername'],
						"addtime" => DATETIMES
				);
				$b = $this->dbo->create( $array, "zyads_onlinepay" );
				if ( $metadata == "3" )
				{
						$sql = "UPDATE  zyads_users set ".$cmoney.( "=".$cmoney."+{$imoney} WHERE username='{$username}'" );
						$this->dbo->query( $sql );
				}
				if ( $metadata == "4" )
				{
						$sql = "UPDATE  zyads_users set ".$cmoney.( "=".$cmoney."-{$imoney} WHERE username='{$username}'" );
						$this->dbo->query( $sql );
				}
		}

		public function deleteonlinepay( )
		{
				$onlineid = $_POST['onlineid'];
				if ( is_array( $onlineid ) )
				{
						foreach ( $onlineid as $id )
						{
								$query = $this->dbo->query( "Delete From zyads_onlinepay Where onlineid = ".$id );
						}
				}
		}

		public function adsonlinepaysqlsandnum( )
		{
				$sql = "SELECT * From zyads_onlinepay  WHERE username='".$_SESSION['username']."' ORDER BY addtime DESC";
				$ssql = "SELECT count(*) AS n From zyads_onlinepay WHERE username='".$_SESSION['username']."' ";
				return $sql."|".$ssql;
		}

		public function paylogsqlsandnum( )
		{
				$actiontype = $_GET['actiontype'];
				$metadata = $_REQUEST['status'];
				$addtime = $_REQUEST['addtime'];
				$searchval = trim( $_REQUEST['searchval'] );
				$searchtype = $_REQUEST['searchtype'];
				if ( $searchval )
				{
						if ( $searchtype == "1" )
						{
								$where = "AND u.username  = '".$searchval."'";
						}
						if ( $searchtype == "2" )
						{
								$where = "AND u.uid  = '".$searchval."'";
						}
						if ( $searchtype == "3" )
						{
								$where = "AND u.accountname  = '".$searchval."'";
						}
						if ( $searchtype == "4" )
						{
								$where = "AND u.bankacc  = '".$searchval."'";
						}
				}
				if ( $metadata != "" )
				{
						$condition = " AND p.status=".( integer )$metadata;
				}
				if ( $addtime )
				{
						$where .= " AND p.addtime= '".$addtime."'";
				}
				if ( $metadata == 1 )
				{
						$paytimew = "p.paytime DESC";
				}
				else
				{
						$paytimew = "p.status,u.bank,p.id DESC";
				}
				$sql = "SELECT p.*,u.username,u.uid,u.bank,u.bankname,u.accountname,u.bankacc From zyads_paylog AS p ,zyads_users AS u\r\n    \tWHERE p.uid=u.uid\r\n    \t".$condition.( " ".$where." ORDER BY  {$paytimew}" );
				$ssql = "SELECT count(*) AS n From zyads_paylog AS p ,zyads_users AS u\r\n    \tWHERE p.uid=u.uid\r\n    \t".$condition.( " ".$where );
				return $sql."|".$ssql;
		}

		public function getsumpaylogbyuid( )
		{
				$sql = "SELECT SUM(pay) as pay From zyads_paylog WHERE uid=".$_SESSION['uid']." AND status = 0";
				$b = $this->dbo->get_one( $sql );
				return $b['pay'];
		}

		public function getsumpayandtimebyuid( )
		{
				$sql = "SELECT pay,paytime From zyads_paylog WHERE uid=".$_SESSION['uid']." AND status = 1 ORDER BY paytime DESC";
				$b = $this->dbo->get_one( $sql );
				return $b;
		}

		public function getusernamepaylistton( $p )
		{
				if ( !$p )
				{
						$p = 3;
				}
				$sql = "SELECT * From zyads_paylog WHERE uid=".$_SESSION['uid']." ORDER BY addtime DESC Limit 0, ".$p;
				$array = $this->dbo->get_all( $sql );
				return $array;
		}

		public function getpaylogsqlandnum( )
		{
				$sql = "SELECT * From zyads_paylog WHERE uid=".$_SESSION['uid']." ORDER BY addtime DESC";
				$ssql = "SELECT count(*) AS n FROM  zyads_paylog WHERE uid=".$_SESSION['uid']."";
				return $sql."|".$ssql;
		}

		public function getsumpaylogstatuszone( )
		{
				$sql = "SELECT SUM(pay) as pay From zyads_paylog WHERE status = 0";
				$b = $this->dbo->get_one( $sql );
				return $b['pay'];
		}

		public function payemail( )
		{
				$idarr = $_POST['id'];
				$choosetype = $_REQUEST['choosetype'];
				$type = $_REQUEST['type'];
				if ( is_array( $idarr ) )
				{
						if ( $choosetype == "del" )
						{
								foreach ( $idarr as $id )
								{
										$sql = "Delete From zyads_paylog Where id =".( integer )$id;
										$this->dbo->query( $sql );
								}
						}
						if ( $choosetype == "clearing" )
						{
								foreach ( $idarr as $id )
								{
										$id = ( integer )$id;
										if ( $type == "clearing" )
										{
												require( LIB_DIR."/chinese.php" );
												$scale = $_POST['scale'];
												$realmoney = $_POST['realmoney'];
												$payinfo = $_POST['payinfo'];
												$payinfo = iconv( "gbk", "gbk", $_POST['payinfo'] );
										}
										else
										{
												$scaleid = "scale_".$id;
												$payinfoid = "payinfo_".$id;
												$realmoneyid = "realmoney_".$id;
												$scale = $_POST[$scaleid];
												$payinfo = $_POST[$payinfoid];
												$realmoney = $_POST[$realmoneyid];
										}
										$sql = "SELECT *  From zyads_paylog WHERE id='".$id."' AND status = 0";
										$q = $this->dbo->get_one( $sql );
										if ( $q )
										{
												$sql = "Update zyads_paylog SET scale='".$scale.( "' ,\r\n\t\t\t\t\t\t\t\t  realmoney = '".$realmoney."',\r\n\t\t\t\t\t\t\t\t  payinfo = '{$payinfo} ',\r\n\t\t\t\t\t\t\t\t  paytime = '" ).DATETIMES."',\r\n\t\t\t\t\t\t\t\t  status = 1,\r\n\t\t\t\t\t\t\t\t  clearingadmin = '".$_SESSION['adminusername'].( "'\r\n\t\t\t\t\t\t\t\t  Where id='".$id."'" );
												$this->dbo->query( $sql, TRUE );
												$recommendTc = $GLOBALS['C_ZYIIS']['recommend_tc'] / 100;
												$recommendTc = ovhsc( $realmoney * $recommendTc, 3 );
												$sql = "Select recommend from zyads_users Where uid=".$q['uid']."";
												$row = $this->dbo->get_one( $sql );
												$recommendid = $row['recommend'];
												if ( !empty( $recommendid ) )
												{
														$sql = "UPDATE zyads_users set xmoney=xmoney+".$recommendTc."\r\n\t\t\t\t\t        \t\tWHERE uid = ".$recommendid."";
														$this->dbo->query( $sql, TRUE );
												}
												if ( in_array( "pay", explode( ",", $GLOBALS['C_ZYIIS']['tomail'] ) ) )
												{
														$usermodel = Z::getsingleton( "model_userclass" );
														$user = $usermodel->getusersuidrow( $q['uid'] );
														include( P_TPL."/emailtpl/subject.php" );
														$emailtpl = P_TPL."/emailtpl/pay.html";
														$body = @file_get_contents( $emailtpl );
														$r = array(
																$user['username'],
																$GLOBALS['C_ZYIIS']['sitename'],
																$GLOBALS['C_ZYIIS']['authorized_url'],
																$realmoney
														);
														$s = array( "{username}", "{sitename}", "{siteurl}", "{pay}" );
														$body = str_replace( $s, $r, $body );
														sendmail( $user['email'], $subject['pay'], $body );
												}
										}
								}
						}
				}
				return TRUE;
		}

		public function gettimetypepaylog( )
		{
				$sql = "Select addtime,clearingtype,sum(pay) AS pay  From zyads_paylog  Group By addtime order by addtime";
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function admindelpay( )
		{
				$value = ( integer )$_GET['id'];
				$sql = "Delete From zyads_paylog Where id = ".$value;
				$this->dbo->query( $sql );
		}

		public function getsumpaybank( )
		{
				$sql = "Select sum(p.pay) AS pay ,u.bank as bank  From zyads_users AS u,zyads_paylog AS p\r\n\t\tWHERE u.uid=p.uid AND p.status=0 group by u.bank ";
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function getaddtimebygroup( )
		{
				$sql = "Select addtime From zyads_paylog  group by addtime order by addtime DESC";
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function getsumpaylogbyaddtime( $tidate )
		{
				$sql = "Select sum(pay) AS pay From zyads_paylog WHERE addtime='".$tidate."'";
				$b = $this->dbo->get_one( $sql );
				return $b['pay'];
		}

		public function getallsumpayuserpaylog( $tidate = "" )
		{
				$condition = "";
				$metadata = $_GET['status'];
				if ( !$tidate )
				{
						$tidate = $_GET['day'];
				}
				if ( $tidate )
				{
						$condition = " AND p.addtime='".$tidate."'";
				}
				if ( $metadata != "" )
				{
						$condition .= " AND p.status=".( integer )$metadata;
				}
				$sql = "Select sum(p.pay) AS pay ,u.bank as bank  From zyads_users AS u,zyads_paylog AS p\r\n\t\tWHERE u.uid=p.uid ".$condition." group by u.bank ";
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function getuserpaylogrows( $tidate, $bank )
		{
				$condition = "";
				$tidate = $_GET['day'];
				$metadata = $_GET['status'];
				if ( $tidate )
				{
						$condition = " AND p.addtime='".$tidate."'";
				}
				if ( $metadata != "" )
				{
						$condition .= " AND p.status=".( integer )$metadata;
				}
				$sql = "select u.username,u.bankacc,u.accountname,p.pay,p.addtime,p.status from zyads_users AS u,zyads_paylog AS p\r\n\t\tWHERE u.uid=p.uid ".$condition." AND u.bank='".$bank."'";
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function payrective( )
		{
				$datetype = "week";
				echo "<BR>model payclass.php";
				$this->paylogstatus( );
				echo "<BR>";
		}

		public function paylogstatus( )
		{
				$sql = "select uid,addtime from zyads_paylog where 1 and addtime>='2011-09-26' and addtime<='2011-10-17' group by uid order by addtime desc";
				$row = $this->dbo->get_all( $sql );
				foreach ( ( array )$row as $userinfo )
				{
						$sql = "update zyads_stats set status='1' where uid=".$userinfo['uid']." and day<'".$userinfo['addtime']."' and status='0';";
						echo "<BR>".$sql;
				}
		}

		public function high100paylog( )
		{
				$sql = "select sum(sumpay) as pay,uid from zyads_stats where 1 and day>='2011-10-10' and day<'2011-10-17' group by uid having sum(sumpay)>=100";
				$row = $this->dbo->get_all( $sql );
				foreach ( ( array )$row as $userinfo )
				{
						$arr = $userinfo['pay'];
						$clearing_tax = $GLOBALS['C_ZYIIS']['clearing_tax'] / 100;
						$clearing_tax = round( $arr * $clearing_tax, 3 );
						$charges = $GLOBALS['C_ZYIIS']['clearing_charges'] / 100;
						$charges = round( $arr * $charges, 3 );
						$dabs = round( abs( $arr ) - $clearing_tax - $charges + abs( $userinfo['xmoney'] ), 2 );
						$sql = "SELECT uid from zyads_paylog Where addtime='".DAYS."' AND uid=".$userinfo['uid']." AND clearingtype='".$datetype."'";
						$irow = $this->dbo->get_one( $sql );
						if ( !$irow['uid'] )
						{
								$sql = "Insert INTO `zyads_paylog` (`uid`, `xmoney`, `money`, `tax`, `charges`, `pay`, `addtime`,clearingtype) VALUES ('".$userinfo['uid']."', '".$userinfo['xmoney']."', '".$arr."', '".$clearing_tax.( "', '".$charges."', '{$dabs}', '" ).DAYS."','".$datetype."')";
								$row = $this->dbo->query( $sql, TRUE );
								$sql = "UPDATE zyads_stats set status='1' where uid=".$userinfo['uid']." and status='0' and day<'".DAYS."'";
								$row = $this->dbo->query( $sql, TRUE );
						}
				}
		}

}

?>
