<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_TrendClass
{

		public $dbo = NULL;

		public function model_trendclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function getsumviewsde( $plantype = "" )
		{
				$condition = "";
				$searchval = ( integer )$_REQUEST['searchval'];
				$searchtype = $_REQUEST['searchtype'];
				$filesize = $this->daycondtion( );
				$planstatsa = "zyads_planstats";
				if ( $searchval )
				{
						if ( $searchtype == 1 )
						{
								$condition = " AND planid=".$searchval;
						}
						if ( $searchtype == 2 )
						{
								$condition = " AND uid=".$searchval;
								$planstatsa = "zyads_stats";
						}
						if ( $searchtype == 3 )
						{
								$condition = " AND adsid=".$searchval;
								$planstatsa = "zyads_stats";
						}
						if ( $searchtype == 4 )
						{
								$condition = " AND siteid=".$searchval;
								$planstatsa = "zyads_stats";
						}
						if ( $searchtype == 5 )
						{
								$condition = " AND zoneid=".$searchval;
								$planstatsa = "zyads_stats";
						}
				}
				if ( $plantype )
				{
						$sql = "SELECT  sum(num+deduction) As num,day,plantype FROM ".$planstatsa.( " WHERE 1 ".$filesize." AND plantype='{$plantype}' {$condition} group by day ORDER BY day ASC" );
						$b = $this->dbo->get_all( $sql );
				}
				else
				{
						$sql = "SELECT  sum(num) As num,sum(views) As views ,sum(deduction) As deduction ,sum(do2click) As do2click, sum(clicks) As clicks,sum(sumprofit) AS sumprofit ,sum(sumpay) as sumpay,sum(orders) AS orders ,day FROM ".$planstatsa.( " WHERE 1 ".$filesize." {$condition} group by day ORDER BY day DESC" );
				}
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function getallnumadsip( $plantype, $tidate )
		{
				$tidate = $tidate ? $tidate : DAYS;
				$arr = explode( "-", $tidate );
				$arr = ( integer )$arr[2];
				$searchval = ( integer )$_REQUEST['searchval'];
				$searchtype = $_REQUEST['searchtype'];
				$condition = $alias = "";
				if ( $searchval )
				{
						if ( $plantype == "cpa" || $plantype == "cps" )
						{
								$alias = "o.";
						}
						if ( $searchtype == 1 )
						{
								$condition = " AND ".$alias."planid=".$searchval;
						}
						if ( $searchtype == 2 )
						{
								$condition = " AND ".$alias."uid=".$searchval;
						}
						if ( $searchtype == 3 )
						{
								$condition = " AND ".$alias."adsid=".$searchval;
						}
						if ( $searchtype == 4 )
						{
								$condition = " AND ".$alias."siteid=".$searchval;
						}
						if ( $searchtype == 5 )
						{
								$condition = " AND ".$alias."zoneid=".$searchval;
						}
				}
				if ( $plantype == "cpa" || $plantype == "cps" )
				{
						$sql = "SELECT count(*) AS num,hour(o.addtime) AS hour FROM zyads_orders AS o ,zyads_plan AS p \n\t\t\tWHERE o.day='".$tidate.( "' AND o.planid=p.planid  AND p.plantype='".$plantype.( "'  ".$condition." group by hour" ) );
				}
				else
				{
						$sql = "SELECT  count(*) AS  num ,hour FROM zyads_adsip".$arr."\n    \tWHERE day='".$tidate.( "' AND plantype='".$plantype.( "' ".$condition." group by hour" ) );
				}
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function getnumstatsded( $p = 7 )
		{
				$searchval = ( integer )$_REQUEST['searchval'];
				$searchtype = $_REQUEST['searchtype'];
				$condition = "";
				if ( $searchval )
				{
						if ( $searchtype == 1 )
						{
								$condition = " AND planid=".$searchval;
						}
						if ( $searchtype == 2 )
						{
								$condition = " AND uid=".$searchval;
						}
						if ( $searchtype == 3 )
						{
								$condition = " AND adsid=".$searchval;
						}
						if ( $searchtype == 4 )
						{
								$condition = " AND siteid=".$searchval;
						}
						if ( $searchtype == 5 )
						{
								$condition = " AND zoneid=".$searchval;
								$planstatsa = "zyads_stats";
						}
				}
				$filesize = $this->daycondtion( );
				$sql = "SELECT  sum(num+deduction) As num ,planid FROM zyads_stats WHERE 1 ".$filesize.( " ".$condition." group by planid ORDER BY num DESC limit 0,{$p}" );
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function getnumandedustats( $p = 7 )
		{
				$searchval = ( integer )$_REQUEST['searchval'];
				$searchtype = $_REQUEST['searchtype'];
				$condition = "";
				if ( $searchval )
				{
						if ( $searchtype == 1 )
						{
								$condition = " AND planid=".$searchval;
						}
						if ( $searchtype == 2 )
						{
								$condition = " AND uid=".$searchval;
						}
						if ( $searchtype == 3 )
						{
								$condition = " AND adsid=".$searchval;
						}
						if ( $searchtype == 4 )
						{
								$condition = " AND siteid=".$searchval;
						}
						if ( $searchtype == 5 )
						{
								$condition = " AND zoneid=".$searchval;
								$planstatsa = "zyads_stats";
						}
				}
				$filesize = $this->daycondtion( );
				$sql = "SELECT  sum(num+deduction) As num ,uid FROM zyads_stats WHERE 1 ".$filesize.( " ".$condition." group by uid ORDER BY num DESC limit 0,{$p}" );
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function getsumnumdestats( $p = 30 )
		{
				$searchval = ( integer )$_REQUEST['searchval'];
				$searchtype = $_REQUEST['searchtype'];
				$condition = "";
				if ( $searchval )
				{
						if ( $searchtype == 1 )
						{
								$condition = " AND planid=".$searchval;
						}
						if ( $searchtype == 2 )
						{
								$condition = " AND uid=".$searchval;
						}
						if ( $searchtype == 3 )
						{
								$condition = " AND adsid=".$searchval;
						}
						if ( $searchtype == 4 )
						{
								$condition = " AND siteid=".$searchval;
						}
						if ( $searchtype == 5 )
						{
								$condition = " AND zoneid=".$searchval;
						}
				}
				$filesize = $this->daycondtion( );
				$sql = "SELECT  sum(num+deduction) As num ,siteid FROM zyads_stats WHERE 1 ".$filesize.( " ".$condition." group by siteid ORDER BY num DESC limit 0,{$p}" );
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function getsumprovincearea( )
		{
				$searchval = ( integer )$_REQUEST['searchval'];
				$searchtype = $_REQUEST['searchtype'];
				$condition = "";
				if ( $searchval )
				{
						if ( $searchtype == 1 )
						{
								$condition = " AND planid=".$searchval;
						}
						if ( $searchtype == 2 )
						{
								$condition = " AND uid=".$searchval;
						}
						if ( $searchtype == 3 )
						{
								$condition = " AND adsid=".$searchval;
						}
						if ( $searchtype == 4 )
						{
								$condition = " AND siteid=".$searchval;
						}
						return $b;
				}
				$filesize = $this->daycondtion( );
				$sql = "SELECT  sum(num) As num ,province FROM zyads_area WHERE 1 ".$filesize.( " ".$condition."  group by province ORDER BY num DESC" );
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function ctr( $v, $url_num )
		{
				if ( 0 < $v )
				{
						$rate = number_format( $url_num * 100 / $v, 1 );
						return $rate;
				}
				$rate = 0;
				return $rate;
		}

		public function getdaybystat( )
		{
				$searchval = ( integer )$_REQUEST['searchval'];
				$searchtype = $_REQUEST['searchtype'];
				$planstatsa = "zyads_planstats";
				$condition = "";
				if ( $searchval )
				{
						if ( $searchtype == 1 )
						{
								$condition = " AND planid=".$searchval;
						}
						if ( $searchtype == 2 )
						{
								$condition = " AND uid=".$searchval;
								$planstatsa = "zyads_stats";
						}
						if ( $searchtype == 3 )
						{
								$condition = " AND adsid=".$searchval;
								$planstatsa = "zyads_stats";
						}
						if ( $searchtype == 4 )
						{
								$condition = " AND siteid=".$searchval;
								$planstatsa = "zyads_stats";
						}
						if ( $searchtype == 5 )
						{
								$condition = " AND zoneid=".$searchval;
								$planstatsa = "zyads_stats";
						}
				}
				$filesize = $this->daycondtion( );
				$sql = "SELECT  day FROM ".$planstatsa.( " WHERE 1 ".$filesize." {$condition} group by day ORDER BY day DESC" );
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function search( $value, $array, $type )
		{
				if ( !is_array( $array ) )
				{
						return FALSE;
				}
				foreach ( $array as $key => $value )
				{
						if ( !( $value == $value[$type] ) )
						{
						}
						else
						{
								return $key;
						}
				}
				return FALSE;
		}

		public function daycondtion( )
		{
				$timerange = $_REQUEST['timerange'];
				if ( $timerange )
				{
						switch ( $timerange )
						{
						case "t" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ) - 1, date( "Y", TIMES ) );
								$time2 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ), date( "Y", TIMES ) );
								$filesize = " AND day >= ".date( "YmdHis", $time1 )." AND day < ".date( "YmdHis", $time2 );
								return $filesize;
						case "w" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ) - 6, date( "Y", TIMES ) );
								$filesize = " AND day >= ".date( "YmdHis", $time1 );
								return $filesize;
						case "m" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ), 1, date( "Y", TIMES ) );
								$filesize = " AND day >= ".date( "YmdHis", $time1 );
								return $filesize;
						case "l" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ) - 1, 1, date( "Y", TIMES ) );
								$time2 = mktime( 0, 0, 0, date( "m", TIMES ), 1, date( "Y", TIMES ) );
								$filesize = " AND day >= ".date( "YmdHis", $time1 )." AND day < ".date( "YmdHis", $time2 );
								return $filesize;
						case "a" :
								$filesize = "";
								return $filesize;
						}
						$value = @explode( "/", $timerange );
						$time1 = strtotime( $value[0] );
						$time2 = strtotime( $value[1] );
						$filesize = " AND day >= ".date( "YmdHis", $time1 )." AND day <= ".date( "YmdHis", $time2 );
						return $filesize;
				}
				$time1 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ) - 6, date( "Y", TIMES ) );
				$filesize = " AND day >= ".date( "YmdHis", $time1 );
				return $filesize;
		}

}

?>
