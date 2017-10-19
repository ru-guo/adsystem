<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_NewsClass
{

		public $dbo = NULL;

		public function model_newsclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function tnewsrow( $p = "" )
		{
				$where = "";
				if ( $p )
				{
						$where = "Limit 0, ".$p;
				}
				$sql = "SELECT * FROM zyads_news ORDER By top Desc,id Desc ".$where;
				return $this->dbo->get_all( $sql );
		}

		public function tnewsqlandnums( )
		{
				$searchval = $_REQUEST['searchval'];
				$top = ( integer )$_REQUEST['top'];
				$condition = $where = "";
				if ( $searchval )
				{
						$condition = "WHERE tit like  '%".$searchval."%'";
				}
				if ( $top )
				{
						$where = "WHERE top=1";
				}
				$sql = "SELECT * FROM zyads_news ".$condition.( " ".$where." ORDER By id Desc" );
				$ssql = "SELECT count(*) AS n FROM zyads_news ".$condition.( " ".$where );
				return $sql."|".$ssql;
		}

		public function getallnews( $p = "" )
		{
				if ( $p == "" )
				{
						$p = 7;
				}
				$sql = "SELECT * FROM zyads_news  ORDER By top Desc,id Desc Limit 0,".$p;
				return $this->dbo->get_all( $sql );
		}

		public function adsnewsrow( $adsid )
		{
				$adsid = ( integer )$adsid;
				$sql = "SELECT * FROM zyads_news WHERE id=".$adsid;
				return $this->dbo->get_one( $sql );
		}

		public function adsnewslowone( $adsid )
		{
				$adsid = ( integer )$adsid;
				$sql = "SELECT * FROM zyads_news WHERE id<".$adsid." ORDER By id Desc";
				return $this->dbo->get_one( $sql );
		}

		public function adsnewshightone( $adsid )
		{
				$adsid = ( integer )$adsid;
				$sql = "SELECT * FROM zyads_news WHERE id>".$adsid;
				return $this->dbo->get_one( $sql );
		}

		public function cradsnews( )
		{
				$title = $_POST['tit'];
				$conn = trans( $_POST['conn'] );
				$top = $_POST['top'];
				$color = $_POST['color'];
				if ( empty( $title ) || empty( $conn ) )
				{
						return;
				}
				$array = array(
						"tit" => $title,
						"conn" => $conn,
						"color" => $color,
						"top" => $top,
						"time" => DATETIMES
				);
				$query = $this->dbo->create( $array, "zyads_news" );
		}

		public function deladsnews( )
		{
				$value = $_REQUEST['id'];
				if ( $value )
				{
						$value = implode( ",", $value );
						$sql = "Delete FROM zyads_news  WHERE id in(".$value.")";
						$query = $this->dbo->query( $sql );
				}
		}

		public function tnews_title( )
		{
				$value = ( integer )$_POST['id'];
				$title = $_POST['tit'];
				$conn = trans( $_POST['conn'] );
				$top = $_POST['top'];
				$color = $_POST['color'];
				$sql = "UPDATE zyads_news SET\r\n\t\t    \t`tit` = '".$title.( "' , \r\n\t\t    \t`conn` = '".$conn."',\r\n\t\t    \t`color` = '{$color}',\r\n    \t\t\t`top` ='{$top}'\r\n\t\t    \t WHERE `id` ={$value} " );
				$query = $this->dbo->query( $sql );
		}

		public function tnewssqls( )
		{
				$searchval = $_REQUEST['searchval'];
				$sql = "SELECT * From zyads_news  WHERE tit like  '%".$searchval."%'\r\n\t\t\t\tORDER BY `id` DESC ";
				$ssql = "SELECT count(*) AS n FROM  zyads_news  WHERE tit like  '%".$searchval."%'";
				return $sql."|".$ssql;
		}

}

?>
