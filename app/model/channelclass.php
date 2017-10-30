<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class model_Channelclass
{
	public $dbo = NULL;

	public function model_channelclass( )
	{
		$this->dbo = Z::getconn( );
	}
	public function add( )
	{
		$array = null;
		$array['channame'] = $_REQUEST['name'];
		$array['zyzpid'] = $_REQUEST['text1'];
		$array['tgzpid'] = $_REQUEST['text2'];
		$array['zxhbid'] = $_REQUEST['text3'];
		$array['ljhbid'] = $_REQUEST['text4'];

		$query = $this->dbo->create( $array, "zyads_channel" );
		if (!$query){
			return false;
		}
        return ture;
	}
	public function updata( )
	{
		$array = null;
		$array['channame'] = $_REQUEST['name'];
		$array['zyzpid'] = $_REQUEST['text1'];
		$array['tgzpid'] = $_REQUEST['text2'];
		$array['zxhbid'] = $_REQUEST['text3'];
		$array['ljhbid'] = $_REQUEST['text4'];

		$query = $this->dbo->create( $array, "zyads_channel" );
		if (!$query){
			return false;
		}
		return ture;
	}
	public function del( )
	{
		$channelid = ( integer )$_GET['channelid'];
		$sql = "DELETE FROM zyads_channel WHERE  id=".$channelid );
		$query = $this->dbo->query( $sql );
	}
	public function show( )
	{
		$sql = "select * from zyads_channel "
		$query = $this->dbo->query( $sql );
		return $query;
	}



}

?>
