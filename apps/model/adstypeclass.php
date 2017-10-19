<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_AdsTypeClass
{

		public $dbo = NULL;

		public function model_adstypeclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function getadstypeparent( )
		{
				$sql = "SELECT * FROM  zyads_adstype\r\n\t\t\t\tWHERE parentid=0";
				return $this->dbo->get_all( $sql );
		}

		public function getadstypetypename( )
		{
				$sql = "SELECT plantype,name FROM  zyads_adstype\r\n\t\t\t\tWHERE parentid=0 AND status=1 Order By adstypeid asc";
				return $this->dbo->get_all( $sql );
		}

		public function getplantypename( $plantype )
		{
				if ( !$plantype )
				{
						return;
				}
				$sql = "SELECT name FROM  zyads_adstype\r\n\t\t\t\tWHERE plantype='".$plantype."' AND parentid=0";
				return $this->dbo->get_one( $sql );
		}

		public function getadstypestatus1( )
		{
				$sql = "SELECT * FROM  zyads_adstype\r\n\t\t\t\tWHERE parentid>0 AND status=1";
				return $this->dbo->get_all( $sql );
		}

		public function getadstypeid( $adstypeid )
		{
				$sql = "SELECT * FROM  zyads_adstype\r\n\t\t\t\tWHERE adstypeid=".( integer )$adstypeid;
				return $this->dbo->get_one( $sql );
		}

		public function getadstypeplanstatus1( $plantype )
		{
				if ( !$plantype )
				{
						return;
				}
				$sql = "SELECT * FROM  zyads_adstype\r\n\t\t\t\tWHERE plantype='".$plantype."' AND parentid>0 AND status=1  ";
				return $this->dbo->get_all( $sql );
		}

		public function actiongetadstypejshtml( )
		{
				$plantype = $this->getadstypeparent( );
				$script = " var at=[];\r\n\t\t";
				foreach ( ( array )$plantype as $restr )
				{
						$script .= "at['".$restr['plantype']."']=[";
						$adstype = $this->getadstypeplanstatus1( $restr['plantype'] );
						$ts = count( $adstype );
						foreach ( ( array )$adstype as $m )
						{
								$script .= "{txt:\"".$m['name']."\",val:\"".$m['adstypeid']."\"}";
								if ( $ts - 1 )
								{
										$script .= ",";
								}
								--$ts;
						}
						$script .= "];\r\n\t\t\t";
				}
				return $script;
		}

		public function adstypesqlandnum( )
		{
				$sql = "SELECT * FROM zyads_adstype WHERE status<>2 ORDER BY adstypeid DESC";
				$ssql = "SELECT count(*) AS n FROM zyads_adstype WHERE status<>2 ";
				return $sql."|".$ssql;
		}

		public function createadstype( )
		{
				$name = $_POST['name'];
				$plantype = explode( "_", $_POST['plantype'] );
				$parentid = ( integer )$plantype[0];
				$plantype = $plantype[1];
				$framework = $_POST['framework'];
				$info = $_POST['info'];
				$htmltemplate = $_POST['htmltemplate'];
				$htmlcontrol = serialize( $_POST['htmlcontrol'] );
				$array = array(
						"name" => $name,
						"parentid" => $parentid,
						"plantype" => $plantype,
						"framework" => $framework,
						"info" => $info,
						"htmlcontrol" => $htmlcontrol,
						"htmltemplate" => trans( $htmltemplate ),
						"addtime" => DATETIMES
				);
				$query = $this->dbo->create( $array, "zyads_adstype" );
		}

		public function adminupadstype( )
		{
				$adstypeid = ( integer )$_POST['adstypeid'];
				$name = $_POST['name'];
				$plantype = explode( "_", $_POST['plantype'] );
				$parentid = ( integer )$plantype[0];
				$plantype = $plantype[1];
				$framework = $_POST['framework'];
				$info = $_POST['info'];
				$htmltemplate = trans( $_POST['htmltemplate'] );
				$htmltemplate = str_replace( "'", "\"", $htmltemplate );
				$htmlcontrol = serialize( $_POST['htmlcontrol'] );
				$sql = "SELECT count(1) as num FROM zyads_adstype WHERE `adstypeid` = ".$adstypeid." ";
				$row = $this->dbo->get_one( $sql );
				if ( empty( $row['num'] ) )
				{
						$sql = "insert into zyads_adstype(parentid,plantype,adstype,name,framework,htmlcontrol,htmltemplate,status,addtime) values ('".$parentid.( "' ,'".$plantype."' ,'{$adstype}' ,'{$name}','{$framework}','{$htmlcontrol}','{$htmltemplate}','1','" ).DATETIMES."')";
				}
				else
				{
						$sql = "UPDATE zyads_adstype SET\r\n\t\t    \t`parentid` = '".$parentid.( "' , \r\n\t\t    \t`plantype` = '".$plantype."' , \r\n\t\t    \t`name` = '{$name}',\r\n\t\t    \t`framework` = '{$framework}',\r\n\t\t    \t`htmlcontrol` = '{$htmlcontrol}',\r\n\t\t    \t`htmltemplate` = '{$htmltemplate}',\r\n\t\t    \t`info` = '{$info}'\r\n\t\t    \t WHERE `adstypeid` = {$adstypeid} " );
				}
				$query = $this->dbo->query( $sql );
				$this->makecache( );
		}

		public function getadstypeidrow( $adstypeid = "" )
		{
				if ( $adstypeid )
				{
						$adstypeid = ( integer )$adstypeid;
				}
				else
				{
						$adstypeid = ( integer )$_GET['adstypeid'];
				}
				$sql = " SELECT * FROM zyads_adstype WHERE adstypeid = ".$adstypeid." ";
				return $this->dbo->get_one( $sql );
		}

		public function admingetplanttypeadstype( $plantype )
		{
				$sql = "SELECT * FROM zyads_adstype WHERE plantype = '".$plantype."' AND parentid>0  AND status<>2 ";
				$query = $this->dbo->get_all( $sql );
				return $query;
		}

		public function resadstypestauts( )
		{
				$adstypeid = ( integer )$_GET['adstypeid'];
				$metadata = ( integer )$_GET['status'];
				$b = $this->getadstypeid( $adstypeid );
				if ( $b['parentid'] == 0 && $metadata == 0 )
				{
						$sql = "UPDATE  zyads_adstype set status='".$metadata.( "'\r\n\t\t\t\tWHERE parentid=".$adstypeid );
						$this->dbo->query( $sql );
				}
				if ( $metadata == 1 )
				{
						$sql = "UPDATE  zyads_adstype set status=1\r\n\t\t\t\tWHERE adstypeid=".$b['parentid'];
						$this->dbo->query( $sql );
				}
				$sql = "UPDATE  zyads_adstype set status='".$metadata.( "'\r\n\t\t\t\tWHERE adstypeid=".$adstypeid." " );
				$this->dbo->query( $sql );
				$this->makecache( );
		}

		public function resadstypebytypdid( )
		{
				$adstypeid = ( integer )$_GET['adstypeid'];
				$sql = "UPDATE  zyads_adstype set status=2\r\n\t\t\t\tWHERE adstypeid=".$adstypeid." AND adstypeid>24";
				$this->dbo->query( $sql );
		}

		public function getadstypebytype( )
		{
				$adstype = $_REQUEST['adstype'];
				$sql = "SELECT adstype FROM zyads_adstype WHERE adstype = '".$adstype."'";
				$query = $this->dbo->get_one( $sql );
				return $query;
		}

		public function makecache( $sync = TRUE )
		{
				require_once( APP_DIR."/client/makecache1.php" );
				atpcache( $this->dbo );
				if ( $sync && $GLOBALS['C_ZYIIS']['sync_setting'] )
				{
						$server = explode( ",", $GLOBALS['C_ZYIIS']['sync_setting'] );
						foreach ( $server as $key => $val )
						{
								file_get_contents( "http://".$val."/api/synccache.php?type=atp" );
						}
				}
		}

}

?>
