<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_HelpClass
{

		public $dbo = NULL;

		public function model_helpclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function getadshelptyperows( $p = "" )
		{
				$where = "";
				if ( $p )
				{
						$where = "Limit 0, ".$p;
				}
				$sql = " SELECT * FROM `zyads_help` \r\n\t\t\t\tWHERE type = 1 ORDER BY `id` desc ".$where." ";
				return $this->dbo->get_all( $sql );
		}

		public function getaffiliatehelp( $p = "" )
		{
				$where = "";
				if ( $p )
				{
						$where = "Limit 0, ".$p;
				}
				$sql = " SELECT * FROM `zyads_help` \r\n\t\t\t\tWHERE type = 0 ORDER BY `id` desc ".$where." ";
				return $this->dbo->get_all( $sql );
		}

		public function getallhelp( $p = "" )
		{
				$where = "";
				if ( $p )
				{
						$where = "Limit 0, ".$p;
				}
				$sql = " SELECT * FROM `zyads_help` ORDER BY `id` desc ".$where." ";
				return $this->dbo->get_all( $sql );
		}

		public function getadshelplowidrow( )
		{
				$helpid = ( integer )$_REQUEST['id'];
				$sql = "SELECT * FROM zyads_help WHERE id<".$helpid." ORDER By id Desc";
				return $this->dbo->get_one( $sql );
		}

		public function getadshelphightidrows( )
		{
				$helpid = ( integer )$_REQUEST['id'];
				$sql = "SELECT * FROM zyads_help WHERE id>".$helpid;
				return $this->dbo->get_one( $sql );
		}

		public function getadshelprow( )
		{
				$helpid = ( integer )$_REQUEST['id'];
				$sql = "SELECT * FROM zyads_help WHERE id=".$helpid;
				return $this->dbo->get_one( $sql );
		}

		public function getadshelpsqlsandnum( )
		{
				$actiontype = $_REQUEST['actiontype'];
				$type = $_GET['type'];
				if ( $type != "" )
				{
						$condition = " AND type='".$type."'";
				}
				if ( $actiontype == "search" )
				{
						$searchtype = h( $_REQUEST['searchtype'] );
						$searchval = h( trim( $_REQUEST['searchval'] ) );
						$where = " AND tit like '%".$searchval."%'";
				}
				$sql = "SELECT * FROM zyads_help WHERE id>0 ".$condition.( " ".$where."  ORDER BY id DESC" );
				$ssql = "SELECT count(*) AS n FROM zyads_help WHERE id>0 ".$condition.( " ".$where."  ORDER BY id DESC" );
				return $sql."|".$ssql;
		}

		public function createadshelp( )
		{
				$title = $_POST['tit'];
				$conn = trans( $_POST['conn'] );
				$type = ( integer )$_POST['type'];
				$color = $_POST['color'];
				if ( empty( $title ) || empty( $conn ) )
				{
						return;
				}
				$array = array(
						"tit" => $title,
						"conn" => $conn,
						"color" => $color,
						"type" => $type,
						"time" => DATETIMES
				);
				$query = $this->dbo->create( $array, "zyads_help" );
		}

		public function updateadshelp( )
		{
				$value = ( integer )$_POST['id'];
				$title = $_POST['tit'];
				$conn = trans( $_POST['conn'] );
				$type = ( integer )$_POST['type'];
				$color = $_POST['color'];
				$sql = "UPDATE zyads_help SET \r\n\t\t    \t`tit` = '".$title.( "' , \r\n\t\t    \t`conn` = '".$conn."',\r\n\t\t    \t`color` = '{$color}',\r\n\t\t    \t`type` = {$type}\r\n\t\t    \t WHERE `id` = {$value} " );
				$query = $this->dbo->query( $sql );
		}

		public function deleteadshelpid( )
		{
				$id = $_POST['id'];
				if ( is_array( $id ) )
				{
						foreach ( $id as $value )
						{
								$query = $this->dbo->query( "Delete From zyads_help Where id = ".$value );
						}
				}
		}

}

?>
