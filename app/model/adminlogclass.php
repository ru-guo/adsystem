<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_AdminLogClass
{

		public $dbo = NULL;

		public function model_adminlogclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function createadminlog( $model, $type, $content )
		{
				$array = array(
						"username" => $_SESSION['adminusername'],
						"ip" => getip( ),
						"type" => "{$type}",
						"model" => "{$model}",
						"content" => "{$content}",
						"day" => DAYS,
						"addtime" => DATETIMES
				);
				$query = $this->dbo->create( $array, "zyads_adminlog" );
		}

		public function adminlogsqlandnums( )
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
						$where = "";
						if ( $searchtype == "1" )
						{
								$where = " AND username like '%".$searchval."%'";
						}
						else if ( $searchtype == "2" )
						{
								$where = "  AND ip = '".$searchval."'";
						}
				}
				$sql = "SELECT * FROM zyads_adminlog WHERE 1 ".$condition.( " ".$where."  ORDER BY logid DESC" );
				$ssql = "SELECT count(*) AS n FROM zyads_adminlog WHERE 1 ".$condition.( " ".$where." " );
				return $sql."|".$ssql;
		}

}

?>
