<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_AdsIpClass
{

		public $dbo = NULL;

		public function model_adsipclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function getsadsipsqlandnum( )
		{
				$adstypeid = ( integer )$_REQUEST['adstypeid'];
				$plantype = $_REQUEST['plantype'];
				$actiontype = $_REQUEST['actiontype'];
				$timerange = $_REQUEST['timerange'];
				if ( !$timerange )
				{
						$timerange = DAYS;
				}
				$arr = explode( "-", $timerange );
				$arr = ( integer )$arr[2];
				$searchtype = $_REQUEST['searchtype'];
				$searchval = trim( $_REQUEST['searchval'] );
				$planid = ( integer )$_REQUEST['planid'];
				$zoneid = ( integer )$_REQUEST['zoneid'];
				$condition = $planidwhere = $where = "";
				if ( $adstypeid )
				{
						$condition = " AND adstypeid='".$adstypeid."'";
				}
				if ( $planid )
				{
						$planidwhere = " AND planid='".$planid."'";
				}
				if ( $zoneid )
				{
						$zoneidwhere = " AND zoneid='".$zoneid."'";
				}
				if ( $searchval )
				{
						if ( $searchtype == "1" )
						{
								$where = " AND uid = '".$searchval."'";
						}
						else if ( $searchtype == "2" )
						{
								$where = "  AND planid = '".$searchval."'";
						}
						else if ( $searchtype == "3" )
						{
								$where = "  AND adsid = '".$searchval."'";
						}
						else if ( $searchtype == "4" )
						{
								$where = "  AND ip = '".$searchval."'";
						}
						else if ( $searchtype == "5" )
						{
								$where = "  AND zoneid = '".$searchval."'";
						}
				}
				$sql = "SELECT * FROM zyads_adsip".$arr.( "  WHERE day='".$timerange."' {$condition}  {$where} {$planidwhere} {$zoneidwhere} ORDER BY id DESC" );
				$ssql = "SELECT count(*) AS n FROM zyads_adsip".$arr.( "   WHERE day='".$timerange."' {$condition} {$filesize} {$where} {$planidwhere} {$zoneidwhere}" );
				return $sql."|".$ssql;
		}

		public function ipvaliad( $ip )
		{
				if ( $ip['timezone'] == "0" )
				{
						return FALSE;
				}
				$screenwh = explode( "x", $ip['screenwh'] );
				$x = $screenwh[0];
				$y = $screenwh[1];
				if ( $ip['m'] )
				{
						return TRUE;
				}
				if ( 10 < $ip['clicks'] )
				{
						return TRUE;
				}
				if ( $ip['x'] || $x < $ip['x'] || $ip['y'] && $y < $ip['y'] )
				{
						return TRUE;
				}
				if ( substr( $ip['ip'], 1 ) == 0 )
				{
						return TRUE;
				}
				if ( $ip['scrollh'] < 1 )
				{
						return TRUE;
				}
				return FALSE;
		}

		public function deleteadsip( )
		{
				$id = $_POST['id'];
				if ( is_array( $id ) )
				{
						foreach ( $id as $j )
						{
								$ddx = explode( "/", $j );
								$tidate = $ddx[0];
								$tidate = explode( "-", $tidate );
								$tidate = ( integer )$tidate[2];
								$value = $ddx[1];
								$this->dbo->query( "Delete From zyads_adsip".$tidate.( " WHERE id = ".$value ) );
						}
				}
		}

		public function getcountadsip( )
		{
				$timebegin = $_POST['timebegin'];
				$timerange = $_REQUEST['timerange'];
				$arr = explode( "-", $timerange );
				$arr = ( integer )$arr[2];
				if ( $timebegin )
				{
						$tidate = $timebegin;
				}
				else
				{
						$tidate = DAYS;
				}
				$sql = "SELECT uid,count(*) AS n FROM `zyads_adsip".$arr.( "` WHERE  day='".$tidate."'   AND m!='' GROUP BY  uid HAVING n >10" );
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

}

?>
