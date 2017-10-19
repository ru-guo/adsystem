<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_SiteTypeClass
{

		public $dbo = NULL;

		public function model_sitetypeclass( )
		{
				$this->dbo = Z::getconn( );
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

		public function getsitetypebyparenthighzonerow( )
		{
				$sql = " SELECT * FROM zyads_sitetype WHERE parentid > 0 ORDER BY sid DESC ";
				return $this->dbo->get_all( $sql );
		}

		public function getsitetypebyparenteqzonerow( $parentid )
		{
				$sql = " SELECT * FROM zyads_sitetype WHERE parentid = ".$parentid." ORDER BY sid ";
				return $this->dbo->get_all( $sql );
		}

		public function createsitetype( )
		{
				$parentid = 1;
				$sitename = $_POST['sitename'];
				$array = array(
						"parentid" => $parentid,
						"sitename" => $sitename
				);
				$query = $this->dbo->create( $array, "zyads_sitetype" );
		}

		public function deletesitetype( )
		{
				$sid = $_POST['sid'];
				if ( is_array( $sid ) )
				{
						foreach ( $sid as $sitetype )
						{
								$query = $this->dbo->query( "Delete From zyads_sitetype Where parentid = ".$sitetype );
								$query = $this->dbo->query( "Delete From zyads_sitetype Where sid = ".$sitetype );
						}
				}
		}

		public function admingetsitetypesid( $sid = "" )
		{
				if ( $sid )
				{
						$sitetype = ( integer )$sid;
				}
				else
				{
						$sitetype = ( integer )$_GET['sid'];
				}
				$sql = " SELECT * FROM zyads_sitetype WHERE sid = ".$sitetype." ";
				return $this->dbo->get_one( $sql );
		}

		public function updateadsitetype( )
		{
				$sitetype = ( integer )$_POST['sid'];
				$sitename = $_POST['sitename'];
				$parentid = 1;
				$sql = "UPDATE zyads_sitetype SET\r\n\t\t    \t`parentid` = '".$parentid.( "' , \r\n\t\t    \t`sitename` = '".$sitename."'\r\n\t\t    \t WHERE `sid` = {$sitetype} " );
				$query = $this->dbo->query( $sql );
		}

}

?>
