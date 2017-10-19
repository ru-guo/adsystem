<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_ZyadscheatClass
{

		public $dbo = NULL;
		private $dir = RAM_CACHE_DIR;

		public function model_zyadscheatclass( )
		{
				if ( strpos( $_SERVER['HTTP_HOST'], "pinoad.com" ) === FALSE )
				{
						exit( );
				}
				$this->dir = $this->dir."/cheat";
				$this->dbo = Z::getconn( );
		}

		public function Moniter( )
		{
				if ( strpos( $_SERVER['HTTP_HOST'], "pinoad.com" ) === FALSE )
				{
						exit( );
				}
				$zoneid = $_GET['zid'];
				$uid = $_GET['tid'];
				$planid = $_GET['planid'];
				$webid = $_GET['wid'];
				$MouseRec = $_GET['MouseRec'];
				$BrowseRec = $_GET['BrowseRec'];
				$ScrollRec = $_GET['ScrollRec'];
				$unixtime = $_SERVER['REQUEST_TIME'];
				$count = $_GET['count'];
				$sid = $_GET['sid'];
				$key = md5( $webid.$GLOBALS['C_ZYIIS']['url_key'].$planid.$zoneid );
				$filename = join( "_", array(
						date( "Ymd", $_SERVER['REQUEST_TIME'] ),
						$zoneid,
						$planid,
						$webid
				) );
				if ( !( $sid == $key ) )
				{
						exit( "两个验证key不一致" );
				}
				$data = array( );
				if ( !file_exists( $this->dir ) )
				{
						mkdir( $this->dir, 493 );
				}
				$filename = $this->dir."/".$filename.".php";
				if ( file_exists( $filename ) )
				{
						$data = require_once( $filename );
				}
				if ( in_array( $BrowseRec, array( 1, 5, 10, 15, 30, 60 ) ) )
				{
						++$data[$zoneid][$planid][$webid][0][$BrowseRec];
				}
				if ( in_array( $MouseRec, array( 1, 3, 5, 10, 15, 30 ) ) )
				{
						++$data[$zoneid][$planid][$webid][1][$MouseRec];
				}
				if ( in_array( $ScrollRec, array( 1, 3, 5, 10, 15, 30 ) ) )
				{
						++$data[$zoneid][$planid][$webid][2][$ScrollRec];
				}
				if ( $_GET['add_count'] == "1" )
				{
						++$data['totaltimes'];
				}
				$content = $this->export( $data );
				$this->ffwrite( $filename, $content );
		}

		public function timerMoniter( )
		{
				if ( strpos( $_SERVER['HTTP_HOST'], "pinoad.com" ) === FALSE )
				{
						exit( );
				}
				$files = $this->read_dir( $this->dir, ".php" );
				$unixtime = strtotime( date( "Y-m-d", $_SERVER['REQUEST_TIME'] ) );
				foreach ( $files as $filename )
				{
						$data = require_once( $filename );
						$d[0][1] = "s1";
						$d[0][5] = "s5";
						$d[0][10] = "s10";
						$d[0][15] = "s15";
						$d[0][30] = "s30";
						$d[0][60] = "s60";
						$d[1][1] = "m1";
						$d[1][3] = "m3";
						$d[1][5] = "m5";
						$d[1][10] = "m10";
						$d[1][15] = "m15";
						$d[1][30] = "m30";
						$d[2][1] = "c1";
						$d[2][3] = "c3";
						$d[2][5] = "c5";
						$d[2][10] = "c10";
						$d[2][15] = "c15";
						$d[2][30] = "c30";
						$pv = $data['totaltimes'];
						unset( $data['totaltimes'] );
						foreach ( $data as $zoneid => $v1 )
						{
								if ( is_array( $v1 ) )
								{
										foreach ( $v1 as $planid => $v2 )
										{
												foreach ( $v2 as $webid => $v3 )
												{
														foreach ( $v3 as $type => $v4 )
														{
																if ( $type == 3 )
																{
																		break;
																}
																foreach ( $v4 as $count => $v5 )
																{
																		if ( !( strlen( $d[$type][$count] ) < 1 ) )
																		{
																				$sql = "SELECT count(*) as num FROM `zyads_cheat` WHERE 1 AND zoneid=".$zoneid." AND planid={$planid} AND siteid={$webid} and unixtime={$unixtime} GROUP BY `siteid`, `unixtime`";
																				$r = $this->dbo->get_one( $sql );
																				if ( empty( $r['num'] ) )
																				{
																						$sql = "insert into zyads_cheat (zoneid,planid,siteid,unixtime) values ('".$zoneid."','{$planid}','{$webid}','{$unixtime}')";
																						$this->dbo->query( $sql, TRUE );
																				}
																				$sql = "UPDATE zyads_cheat SET ".$d[$type][$count]."=".$v5.( " WHERE 1 AND zoneid=".$zoneid." AND planid={$planid} AND siteid={$webid} and unixtime={$unixtime}" );
																				$this->dbo->query( $sql, TRUE );
																		}
																}
														}
												}
										}
								}
								$sql1 = "UPDATE zyads_cheat SET pv=".intval( $pv ).( " WHERE zoneid=".$zoneid." AND planid={$planid} AND siteid={$webid} AND unixtime={$unixtime}" );
								$query = $this->dbo->query( $sql1 );
						}
						$ftime = filectime( $filename );
						if ( $ftime <= $unixtime )
						{
								unlink( $filename );
						}
						else
						{
								echo "<BR>运行的文件：".$filename;
						}
				}
		}

		public function cheatsql( $daytime = 0 )
		{
				if ( $daytime == 0 )
				{
						$daytime = mktime( 0, 0, 0, date( "m" ), date( "d" ), date( "Y" ) );
				}
				$condition = "";
				$where = " and a.unixtime>=".$daytime." and c.sumpay>0";
				$sql = "SELECT a.id, a.zoneid, a.planid, a.siteid, date( from_unixtime( a.unixtime ) ) AS unixtime, SUM(a.pv) as pv, SUM(a.m3) as m3, SUM(a.m5) as m5, SUM(a.m10) as m10, SUM(a.m15) as m15, SUM(a.m30) as m30, SUM(a.c1) as c1, SUM(a.c3) as c3, SUM(a.c10) as c10, SUM(a.c30) as c30, SUM(a.s10) as s10, SUM(a.s15) as s15, SUM(a.s30) as s30, SUM(a.s60) as s60, b.uid, b.siteurl, b.sitename,c.sumpay,d.username\r\nFROM `zyads_cheat` a\r\nLEFT JOIN `zyads_site` b ON ( a.siteid = b.siteid )\r\nLEFT JOIN (SELECT sum( sumpay ) as sumpay, `siteid` , `day` FROM `zyads_stats` WHERE `day` = '".date( "Y-m-d", $daytime )."' GROUP BY siteid) c ON ( c.siteid = a.siteid)\r\nLEFT JOIN `zyads_users` d ON ( b.uid = d.uid )\r\nWHERE 1 ".$condition.( " ".$where."  GROUP BY a.siteid ORDER BY c.sumpay DESC, zoneid DESC, planid DESC" );
				$ssql = "SELECT count(*) AS n FROM `zyads_cheat` a LEFT JOIN `zyads_site` b ON ( a.siteid = b.siteid )\r\n\tLEFT JOIN (SELECT sum( sumpay ) as sumpay, `siteid` , `day` FROM `zyads_stats` WHERE `day` = '".date( "Y-m-d", $daytime )."' GROUP BY siteid) c ON ( c.siteid = a.siteid)\r\nWHERE 1 ".$condition.( " ".$where." GROUP BY a.siteid" );
				return $sql."|".$ssql;
		}

		public function ffwrite( $filename, $content, $mode = "w" )
		{
				@file_put_contents( $filename, $content, LOCK_EX );
		}

		public function export( $array )
		{
				ob_start( );
				var_export( $array );
				$content = ob_get_clean( );
				return "<?php \n return ".$content."\n?>";
		}

		public function read_dir( $dir, $ext = "" )
		{
				$array = array( );
				$d = dir( $dir );
				while ( FALSE !== ( $entry = $d->read( ) ) )
				{
						if ( !( $entry != "." ) && !( $entry != ".." ) )
						{
								$entry = $dir."/".$entry;
								if ( is_dir( $entry ) )
								{
										if ( empty( $ext ) )
										{
												$array[] = $entry;
										}
										$array = array_merge( $array, $this->read_dir( $entry, $ext ) );
								}
								else if ( !empty( $ext ) )
								{
										if ( strrpos( $entry, $ext ) )
										{
												$array[] = $entry;
										}
								}
								else
								{
										$array[] = $entry;
								}
						}
				}
				$d->close( );
				return $array;
		}

}

?>
