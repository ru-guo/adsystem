<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_UpAdsLogClass
{

		public $dbo = NULL;

		public function model_upadslogclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function getadsupadslogsqlandnum( )
		{
				$actiontype = $_REQUEST['actiontype'];
				$adstype = $_GET['adstype'];
				$where = "";
				if ( $actiontype == "search" )
				{
						$searchtype = h( $_REQUEST['searchtype'] );
						$searchval = h( trim( $_REQUEST['searchval'] ) );
						if ( $searchtype == "1" )
						{
								$where = "  AND adsid = '".$searchval."'";
						}
						else if ( $searchtype == "2" )
						{
								$where = " AND username like '%".$searchval."%'";
						}
				}
				$sql = "SELECT * FROM zyads_upadslog WHERE 1 ".$where."  ORDER BY uplogid  DESC";
				$ssql = "SELECT count(*) AS n FROM zyads_upadslog WHERE 1 ".$where;
				return $sql."|".$ssql;
		}

		public function uploadiff( $A )
		{
				$updata = stripslashes_deep( unserialize( base64_decode( $A['updata'] ) ) );
				$olddata = stripslashes_deep( unserialize( base64_decode( $A['olddata'] ) ) );
				return $dateal = @array_diff( $updata, $olddata );
		}

		public function deleteuploadlog( )
		{
				$uplogid = $_POST['uplogid'];
				if ( is_array( $uplogid ) )
				{
						foreach ( $uplogid as $v )
						{
								$query = $this->dbo->query( "Delete From zyads_upadslog Where uplogid = ".$v );
						}
				}
		}

}

?>
