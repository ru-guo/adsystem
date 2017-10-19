<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_OrdersClass
{

		public $dbo = NULL;

		public function model_ordersclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function getcountordersday( $planid, $tidate )
		{
				$sql = "SELECT count(*) As num FROM zyads_orders WHERE day='".$tidate."' AND planid='".$planid."'\r\n\t\tAND uid=".$_SESSION['uid']." AND deduction=0";
				return $this->dbo->get_one( $sql );
		}

		public function getordersqlandnum( $type )
		{
				$metadata = $_REQUEST['status'];
				$planid = $_REQUEST['planid'];
				$condition = "";
				$filesize = $this->daycondtion( "day" );
				if ( $type == "aff" )
				{
						if ( $metadata != "" )
						{
								$condition = " AND status=".( integer )$metadata;
						}
						if ( $planid )
						{
								$condition .= " AND planid=".( integer )$planid;
						}
						$sql = "SELECT * FROM zyads_orders WHERE 1 ".$filesize." AND uid=".$_SESSION['uid'].( " AND deduction=0 ".$condition." ORDER BY orderid DESC" );
						$ssql = "SELECT count(*) AS n FROM zyads_orders WHERE 1 ".$filesize." AND uid=".$_SESSION['uid'].( " AND deduction=0 ".$condition );
				}
				if ( $type == "adv" )
				{
						if ( $metadata != "" )
						{
								$condition = " AND o.status=".( integer )$metadata;
						}
						if ( $planid )
						{
								$condition .= " AND o.planid=".( integer )$planid;
						}
						$sql = "SELECT o.* FROM zyads_orders AS o,zyads_plan AS p WHERE o.planid=p.planid  ".$filesize." AND p.uid=".$_SESSION['uid'].( " AND o.deduction=0 ".$condition." ORDER BY o.orderid DESC" );
						$ssql = "SELECT count(*) AS n FROM zyads_orders AS o,zyads_plan AS p WHERE o.planid=p.planid  ".$filesize." AND p.uid=".$_SESSION['uid'].( " AND o.deduction=0 ".$condition );
				}
				return $sql."|".$ssql;
		}

		public function getplanordersqlandnum( )
		{
				$actiontype = $_REQUEST['actiontype'];
				$timetype = isset( $_REQUEST['timetype'] ) ? $_REQUEST['timetype'] : "";
				$searchtype = $_REQUEST['searchtype'];
				$searchval = trim( $_REQUEST['searchval'] );
				$metadata = $_REQUEST['status'];
				$plantype = $_REQUEST['plantype'];
				$planid = ( integer )$_REQUEST['planid'];
				$filesize = $this->daycondtion( "day" );
				$condition = "";
				if ( $planid )
				{
						$condition .= " AND o.planid='".$planid."'";
				}
				if ( $plantype != "" )
				{
						$condition .= " AND p.plantype='".$plantype."'";
				}
				if ( $metadata != "" )
				{
						$condition .= "AND o.status=".( integer )$metadata;
				}
				if ( $usertype == "aff" )
				{
						$condition .= "o.uid=".$_SESSION['uid']." AND ";
				}
				if ( $usertype == "adv" )
				{
						$condition .= "p.uid=".$_SESSION['uid']." AND ";
				}
				if ( $searchval != "" )
				{
						if ( $searchtype == "1" )
						{
								$condition .= " AND u.username ='".$searchval."'";
						}
						else if ( $searchtype == "2" )
						{
								$condition .= "  AND o.orders = '".$searchval."'";
						}
				}
				$sql = "SELECT o.*,p.plantype,p.planname,p.datatime,u.username\r\n    \tFROM zyads_orders AS o ,zyads_plan AS p, zyads_users AS u \r\n\t\tWHERE  o.planid=p.planid \r\n\t\tAND ".$prexuid.( " o.uid=u.uid  ".$condition." {$shadstypeid} {$filesize}  ORDER BY orderid  desc" );
				$ssql = "SELECT count(*) AS n\r\n\t\tFROM zyads_orders AS o ,zyads_plan AS p, zyads_users AS u \r\n\t\tWHERE  o.planid=p.planid \r\n\t\tAND ".$prexuid.( " o.uid=u.uid  ".$condition." {$shadstypeid} {$filesize} " );
				return $sql."|".$ssql;
		}

		public function sumpaystatsplans( $day, $usertype )
		{
				if ( $usertype == "aff" )
				{
						$prexuid = " AND o.uid=".$_SESSION['uid']."  ";
						$sumsumpay = " sum(p.price) AS m";
				}
				if ( $usertype == "adv" )
				{
						$prexuid = " AND p.uid=".$_SESSION['uid']."  ";
						$sumsumpay = " sum(p.priceadv) AS m";
				}
				$sql = "SELECT ".$sumsumpay."\r\n    \tFROM zyads_orders AS o ,zyads_plan AS p\r\n\t\tWHERE o.confirmtime='".$day.( "' AND o.planid=p.planid AND p.plantype='cps' AND o.status=1 ".$prexuid." GROUP BY p.price" );
				return $b = $this->dbo->get_all( $sql );
		}

		public function orderinfo( )
		{
				$mode = $_REQUEST['choosetype'];
				$orderid = $_REQUEST['orderid'];
				if ( $mode == "y" && is_array( $orderid ) )
				{
						foreach ( $orderid as $value )
						{
								$getrowplanorders = $this->getrowplanorders( $value );
								if ( !( $getrowplanorders['status'] != "0" ) )
								{
										$sql = "UPDATE zyads_orders SET status=1,confirmtime='".DAYS.( "' WHERE orderid=".$value );
										$b = $this->dbo->query( $sql, TRUE );
										if ( $this->dbo->affected_rows( ) )
										{
												$admingetusernamesumpay = $getrowplanorders['price'];
												$priceadv = $getrowplanorders['priceadv'];
												$deduction = $getrowplanorders['deduction'];
												$priceadvsv = $getrowplanorders['priceadv'] - $getrowplanorders['price'];
												$clearing = $getrowplanorders['clearing']."money";
												if ( $deduction == 0 )
												{
														$deduction = 0;
														$num = 1;
														$query = $this->dbo->query( "UPDATE zyads_users  SET ".$clearing.( " =".$clearing." + " ).$getrowplanorders['price'].",nums=nums+1 WHERE uid = '".$getrowplanorders['uid']."' ", TRUE );
												}
												else
												{
														$deduction = 1;
														$num = 0;
														$admingetusernamesumpay = 0;
												}
												$query = $this->dbo->query( "UPDATE zyads_users  SET money = money - ".$getrowplanorders['priceadv']." WHERE uid = '".$getrowplanorders['advuid']."' ", TRUE );
												$sql = "SELECT planid  FROM zyads_planstats WHERE  planid = '".$getrowplanorders['planid']."' AND day = '".DAYS."' ";
												$p = $this->dbo->get_one( $sql );
												if ( !$p )
												{
														$query = $this->dbo->query( "INSERT zyads_planstats SET plantype='".$getrowplanorders['plantype'].( "',num = ".$num.( ",deduction=".$deduction.", day = '" ) ).DAYS.( "',sumpay= ".$admingetusernamesumpay.( ",sumprofit= ".$priceadvsv.",sumadvpay={$priceadv},planid='" ) ).$getrowplanorders['planid']."',uid='".$getrowplanorders['advuid']."'", TRUE );
												}
												else
												{
														$query = $this->dbo->query( "UPDATE zyads_planstats  SET num=num+".$num.( ",deduction=deduction+".$deduction.",sumpay= sumpay+{$admingetusernamesumpay},sumprofit= sumprofit+{$priceadvsv},sumadvpay=sumadvpay+{$priceadv} WHERE day = '" ).DAYS."' AND planid = '".$p['planid']."'  ", TRUE );
												}
												$query = $this->dbo->query( "UPDATE zyads_stats  SET num = num + ".$num.( ",deduction=deduction+".$deduction.",sumpay= sumpay+{$admingetusernamesumpay},sumprofit= sumprofit+{$priceadvsv},sumadvpay=sumadvpay+{$priceadv} WHERE day = '" ).DAYS."' AND adsid = '".$getrowplanorders['adsid']."' AND zoneid = '".$getrowplanorders['zoneid']."' AND linkuid = '".$getrowplanorders['linkuid']."'\r\n\t\t\t\t\t\tAND uid = '".$getrowplanorders['uid']."' ", TRUE );
												if ( $this->dbo->affected_rows( ) == 0 )
												{
														$query = $this->dbo->query( "INSERT zyads_stats SET plantype='".$getrowplanorders['plantype'].( "',num = ".$num.( ",deduction=".$deduction.", day = '" ) ).DAYS."',adsid = '".$getrowplanorders['adsid']."',siteid = '".$getrowplanorders['siteid']."' , zoneid = '".$getrowplanorders['zoneid']."',planid='".$getrowplanorders['planid']."',linkuid='".$getrowplanorders['linkuid']."'\r\n\t\t\t\t\t\t\t, uid = '".$getrowplanorders['uid'].( "' ,sumpay= ".$admingetusernamesumpay.( ",sumprofit= ".$priceadvsv.",sumadvpay={$priceadv}" ) ), TRUE );
												}
										}
								}
						}
				}
				if ( $mode == "n" && is_array( $orderid ) )
				{
						foreach ( $orderid as $value )
						{
								$sql = "UPDATE zyads_orders SET status=2,confirmtime='".DAYS.( "'  WHERE orderid=".$value );
								$b = $this->dbo->query( $sql, TRUE );
						}
				}
				if ( $mode == "del" && is_array( $orderid ) )
				{
						foreach ( $orderid as $value )
						{
								$query = $this->dbo->query( "Delete From  zyads_orders Where orderid=".$value );
						}
				}
		}

		public function getrowplanorders( $value )
		{
				$sql = "SELECT o.*,p.uid AS advuid,p.clearing,p.plantype  FROM zyads_orders AS o,zyads_plan AS p WHERE  o.orderid=".$value." AND p.planid=o.planid";
				return $b = $this->dbo->get_one( $sql );
		}

		public function daycondtion( $t )
		{
				if ( $t != "day" )
				{
						$day = "confirmtime";
				}
				else
				{
						$day = "day";
				}
				$timerange = $_REQUEST['timerange'];
				if ( $timerange )
				{
						switch ( $timerange )
						{
						case "t" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ) - 1, date( "Y", TIMES ) );
								$time2 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ), date( "Y", TIMES ) );
								$filesize = " AND ".$day." >= ".date( "YmdHis", $time1 ).( " AND ".$day." < " ).date( "YmdHis", $time2 );
								return $filesize;
						case "w" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ) - 6, date( "Y", TIMES ) );
								$filesize = " AND ".$day." >= ".date( "YmdHis", $time1 );
								return $filesize;
						case "m" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ), 1, date( "Y", TIMES ) );
								$filesize = " AND ".$day." >= ".date( "YmdHis", $time1 );
								return $filesize;
						case "l" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ) - 1, 1, date( "Y", TIMES ) );
								$time2 = mktime( 0, 0, 0, date( "m", TIMES ), 1, date( "Y", TIMES ) );
								$filesize = " AND ".$day." >= ".date( "YmdHis", $time1 ).( " AND ".$day." < " ).date( "YmdHis", $time2 );
								return $filesize;
						case "a" :
								$filesize = "";
								return $filesize;
						}
						$value = @explode( "/", $timerange );
						$time1 = strtotime( $value[0] );
						$time2 = strtotime( $value[1] );
						$filesize = " AND ".$day." >= ".date( "YmdHis", $time1 ).( " AND ".$day." <= " ).date( "YmdHis", $time2 );
						return $filesize;
				}
				$filesize = " AND ".$day." = '".DAYS."'";
				return $filesize;
		}

}

?>
