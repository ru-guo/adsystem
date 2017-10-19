<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class do2click
{

		public function run( )
		{
				$type = addslashes( $_GET['type'] );
				if ( $type == "cpv" )
				{
						$do2clickcpv = addslashes( $_COOKIE['do2clickCpv'] );
						if ( !$do2clickcpv )
						{
								setcookie( "do2clickCpv", "1", TIMES + 86400, "/", ".".$GLOBALS['C_ZYIIS']['siteurl'] );
								$dbo = gc( );
								$ip = $_SERVER['REMOTE_ADDR'];
								$adsid = ( integer )$_GET['adsid'];
								$planid = ( integer )$_GET['planid'];
								$zoneid = ( integer )$_GET['zoneid'];
								$restr = $dbo->get_one( "SELECT ip FROM zyads_tempcip WHERE ip='".$ip."' AND day='".DAYS.( "' AND zoneid='".$zoneid."'" ) );
								if ( !$restr )
								{
										$sql = "INSERT INTO zyads_tempcip (ip,planid,adsid,zoneid,day) VALUES ('".$ip.( "','".$planid."','{$adsid}','{$zoneid}','" ).DAYS."')";
										$dbo->query( $sql, TRUE );
										$query = $dbo->query( "UPDATE zyads_planstats  SET clicks=clicks+1  WHERE day = '".DAYS."' AND planid = '".$planid."'  ", TRUE );
										$query = $dbo->query( "UPDATE zyads_stats  SET clicks=clicks+1   WHERE zoneid = '".$zoneid."' AND  adsid  = '".$adsid."' ", TRUE );
								}
						}
				}
				else if ( $type == "effect" )
				{
						$doeffect = addslashes( $_COOKIE['doEffect'] );
						$gplanid = ( integer )$_GET['planid'];
						if ( $doeffect )
						{
								setcookie( "doEffect", "", TIMES + 86400, "/", ".".$GLOBALS['C_ZYIIS']['siteurl'] );
								$dbo = gc( );
								$ip = $_SERVER['REMOTE_ADDR'];
								$value = explode( "|", $doeffect );
								$adsid = ( integer )$value[0];
								$nfuid = ( integer )$value[1];
								$zoneid = ( integer )$value[2];
								$planid = ( integer )$value[3];
								$restr = $dbo->get_one( "SELECT ip FROM zyads_tempcip WHERE ip='".$ip."' AND day='".DAYS.( "' AND zoneid='".$zoneid."'" ) );
								if ( $gplanid == $planid && !$restr )
								{
										$sql = "INSERT INTO zyads_tempcip (ip,planid,adsid,zoneid,day) VALUES ('".$ip.( "','".$planid."','{$adsid}','{$zoneid}','" ).DAYS."')";
										$dbo->query( $sql, TRUE );
										$query = $dbo->query( "UPDATE zyads_stats  SET orders  = orders  + 1 WHERE day = '".DAYS.( "' AND uid = ".$nfuid.( " AND adsid = ".$adsid."  AND zoneid = {$zoneid} " ) ), TRUE );
										$query = $dbo->query( "UPDATE zyads_planstats  SET orders  = orders  + 1 WHERE day = '".DAYS.( "' AND planid = ".$planid." " ), TRUE );
										echo "ok";
								}
						}
				}
				else
				{
						$doeffect = addslashes( $_COOKIE['do2click'] );
						$gplanid = ( integer )$_GET['planid'];
						if ( $doeffect )
						{
								setcookie( "do2click", "", TIMES + 86400, "/", ".".$GLOBALS['C_ZYIIS']['siteurl'] );
								$dbo = gc( );
								$ip = $_SERVER['REMOTE_ADDR'];
								$value = explode( "|", $doeffect );
								$adsid = ( integer )$value[0];
								$nfuid = ( integer )$value[1];
								$zoneid = ( integer )$value[2];
								$planid = ( integer )$value[3];
								$restr = $dbo->get_one( "SELECT ip FROM zyads_tempcip WHERE ip='".$ip."' AND day='".DAYS.( "' AND zoneid='".$zoneid."'" ) );
								if ( $gplanid == $planid && !$restr )
								{
										$sql = "INSERT INTO zyads_tempcip (ip,planid,adsid,zoneid,day) VALUES ('".$ip.( "','".$planid."','{$adsid}','{$zoneid}','" ).DAYS."')";
										$dbo->query( $sql, TRUE );
										$query = $dbo->query( "UPDATE zyads_stats  SET do2click = do2click + 1 WHERE day = '".DAYS.( "' AND uid = ".$nfuid.( " AND adsid = ".$adsid."  AND zoneid = {$zoneid} " ) ), TRUE );
										$query = $dbo->query( "UPDATE zyads_planstats  SET do2click = do2click + 1 WHERE day = '".DAYS.( "' AND planid = ".$planid." " ), TRUE );
										echo "ok";
								}
						}
				}
		}

		public function Dx( )
		{
		}

}

?>
