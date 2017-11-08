<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_Mysetclass
{
	public $dbo = NULL;

	public function model_mysetclass( )
	{
		$this->dbo = Z::getconn( );
	}

	public function show( )
	{
		$sql = "select * from zyads_myset";
		$query = $this->dbo->get_all( $sql );
		return $query;
	}
	public function del( )
	{
		$id = $_REQUEST['id'];
		$sql = "delete from zyads_myset where id=".$id;
		$query = $this->dbo->query( $sql );
	}



}

?>
