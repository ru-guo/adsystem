<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class app
{

		public $dbo = NULL;
		public $planinfo = NULL;

		public function vaip( $ip = "" )
		{
				if ( $ip )
				{
						$tetruwS = $_SERVER['REMOTE_ADDR'];
						in_array( $tetruwS, explode( ",", $ip ) );
				}
				else
				{
						$this->dbo = gc( );
				}
		}

		public function getuserinfo( $nfuid )
		{
				$sql = "Select * From zyads_users WHERE uid=".( integer )$nfuid;
				$array = $this->dbo->get_one( $sql );
				return $array;
		}

		public function clusersinfo( $nfuid, $planid )
		{
				if ( $this->planinfo )
				{
						$admingetplanone = $this->planinfo;
				}
				else
				{
						$admingetplanone = $this->getplaninfo( ( integer )$planid );
				}
				if ( $admingetplanone['clearing'] == "" )
				{
						$admingetplanone['clearing'] = "day";
				}
				$clearing = $admingetplanone['clearing']."money";
				$query = $this->dbo->query( "UPDATE zyads_users  SET ".$clearing.( " = ".$clearing." + " ).$admingetplanone['price']." WHERE uid = ".( integer )$nfuid." ", TRUE );
		}

		public function planadsusermoney( $planid )
		{
				if ( $this->planinfo )
				{
						$admingetplanone = $this->planinfo;
				}
				else
				{
						$admingetplanone = $this->getplaninfo( ( integer )$planid );
				}
				$query = $this->dbo->query( "UPDATE zyads_users  SET money = money - ".$admingetplanone['priceadv']." WHERE uid = ".$admingetplanone['uid']." ", TRUE );
		}

		public function deleteordersbyorders( $da2 )
		{
				$da2 = h( $da2 );
				if ( !$da2 )
				{
						exit( "NOT ORDERS" );
				}
				$query = $this->dbo->query( "Delete From zyads_orders Where orders = '".$da2."' ", TRUE );
				return $query;
		}

		public function updateorderbystatus( $da2, $url_num )
		{
				$da2 = h( $da2 );
				$url_num = ( integer )$url_num;
				if ( !$da2 )
				{
						exit( "NOT ORDERS" );
				}
				if ( !vrntfh( $url_num ) )
				{
						exit( "NOT Status Num" );
				}
				$query = $this->dbo->query( "UPDATE zyads_orders Set status='".$url_num.( "' Where orders = '".$da2."' " ), TRUE );
				return $query;
		}

		public function updateorderstauts( $da2 )
		{
				$da2 = h( $da2 );
				if ( !$da2 )
				{
						exit( "NOT ORDERS" );
				}
				$query = $this->dbo->query( "UPDATE zyads_orders Set status='1' Where orders = '".$da2."' AND status=0", TRUE );
				$this->zzd( $da2 );
		}

		public function zzd( $da2 )
		{
		}

		public function getoneadsbyorders( $da2 )
		{
				$sql = "SELECT *  FROM zyads_orders WHERE orders = '".$da2."'";
				$array = $this->dbo->get_one( $sql );
				return $array;
		}

		public function getordersbydayplan( $da2, $planid, $nfuid )
		{
				$sql = "SELECT orders  FROM zyads_orders WHERE day='".DAYS."' AND orders = '".$da2."' AND planid = '".$planid."' AND uid = '".$nfuid."'";
				$array = $this->dbo->get_one( $sql );
				if ( $array )
				{
						return TRUE;
				}
				return FALSE;
		}

		public function getzonebyid( $zoneid )
		{
				$sql = "Select * From zyads_zone WHERE zoneid=".( integer )$zoneid;
				$array = $this->dbo->get_one( $sql );
				return $array;
		}

		public function getadsrowbyid( $adsid )
		{
				$sql = "Select * From zyads_ads WHERE adsid=".( integer )$adsid;
				$array = $this->dbo->get_one( $sql );
				return $array;
		}

		public function getplaninfo( $planid )
		{
				$sql = "Select * From zyads_plan WHERE planid=".( integer )$planid;
				$array = $this->dbo->get_one( $sql );
				$this->planinfo = $array;
				return $array;
		}

		public function getplantypelog( $planid, $uid, $orders = "", $ordersprices = "", $like = "", $num = "" )
		{
				$plan = $this->getplaninfo( ( integer )$planid );
				if ( $plan['plantype'] == "cps" && !$orders || !$ordersprices )
				{
						exit( "订单号和订单价格为空" );
				}
				require( LIB_DIR."/z.php" );
				Z::import( APP_DIR );
				$num = $num ? $num : 1;
				$importmodel = Z::getsingleton( "model_importClass" );
				$importmodel->createimportlog( $planid, $uid, $num, $date, $orders, $ordersprices, $userproportion, $advproportion, $like );
				return TRUE;
		}

		public function getfuidplanzone( $nfuid, $planid, $url_num, $adsid = 0, $zoneid = 0 )
		{
				return TRUE;
		}

		public function getdeduction( $i, $restr )
		{
				$resstr = $restr['plantype']."deduction";
				if ( 0 < $restr['deduction'] )
				{
						$deduction = $restr['deduction'];
				}
				else if ( 0 < $i[$resstr] )
				{
						$deduction = $i[$resstr];
				}
				else
				{
						$resstr = $restr['plantype']."_deduction";
						$deduction = $GLOBALS['C_ZYIIS'][$resstr];
				}
				$rand = rand( 1, 100 );
				if ( $rand < $deduction )
				{
						$deduction = 1;
						return $deduction;
				}
				$deduction = 0;
				return $deduction;
		}

}

define( "IN_API", TRUE );
?>
