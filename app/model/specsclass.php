<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_SpecsClass
{

		public $dbo = NULL;

		public function model_specsclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function getadspecswh( )
		{
				$sql = " SELECT width,height,type FROM `zyads_specs` \r\n\t\t\t\t ORDER BY `sort` ASC  ";
				return $this->dbo->get_all( $sql );
		}

		public function getadspecsrow( )
		{
				$sql = "SELECT * FROM zyads_specs ORDER BY id DESC";
				return $this->dbo->get_one( $sql );
		}

		public function getspecsqlandnum( )
		{
				$type = $_GET['type'];
				if ( $type != "" )
				{
						$condition = " WHERE type='".$type."'";
				}
				$sql = "SELECT * FROM zyads_specs ".$condition." ORDER BY id DESC";
				$ssql = "SELECT count(*) AS n FROM zyads_specs ".$condition." ";
				return $sql."|".$ssql;
		}

		public function createspecs( )
		{
				$type = h( $_POST['type'] );
				$width = h( $_POST['width'] );
				$height = h( $_POST['height'] );
				$sort = h( $_POST['sort'] );
				$array = array(
						"type" => $type,
						"width" => $width,
						"height" => $height,
						"sort" => $sort
				);
				$query = $this->dbo->create( $array, "zyads_specs" );
		}

		public function deletespecsbyid( )
		{
				$id = $_POST['id'];
				if ( is_array( $id ) )
				{
						foreach ( $id as $value )
						{
								$query = $this->dbo->query( "Delete From zyads_specs Where id = ".$value );
						}
				}
		}

		public function getspecsrowbyid( )
		{
				$id = ( integer )$_REQUEST['id'];
				$sql = "SELECT * FROM zyads_specs WHERE id=".$id;
				return $this->dbo->get_one( $sql );
		}

		public function updateadsspecs( )
		{
				$value = ( integer )$_POST['id'];
				$type = h( $_POST['type'] );
				$width = h( $_POST['width'] );
				$height = h( $_POST['height'] );
				$sort = h( $_POST['sort'] );
				$sql = "UPDATE zyads_specs SET \r\n\t\t    \t`type` = '".$type.( "' , \r\n\t\t    \t`width` = '".$width."',\r\n\t\t    \t`height` = {$height},\r\n\t\t    \t`sort` = {$sort}\r\n\t\t    \t WHERE `id` = {$value} " );
				$query = $this->dbo->query( $sql );
		}

}

?>
