<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_DbClass
{

		public $dbo = NULL;

		public function model_dbclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function tablestauts( )
		{
				$sql = "SHOW TABLE STATUS FROM `".$GLOBALS['C_MYSQL']['dbname']."`";
				return $this->dbo->get_all( $sql );
		}

		public function repairtable( )
		{
				$table = $_GET['table'];
				$sql = "REPAIR TABLE zyads".$table."";
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

}

?>
