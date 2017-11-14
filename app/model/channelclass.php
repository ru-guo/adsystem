<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_ChannelClass
{
	public $dbo = NULL;

	public function model_channelclass( )
	{
		$this->dbo = Z::getconn( );
	}

	public function zyadsattch($myfile)
	{
		$host = str_replace( "http://", "", $GLOBALS['C_ZYIIS']['imgurl'] );
		$path = "/a/".date( "Y-m-d" )."/";
		$config['upload_path'] = WWW_DIR.$path;
		$config['allowed_types'] = "gif|jpg|png|swf|bmp";
		$config['max_size'] = "500";
		$config['file_name'] = time( ).random( 8 );
		require_once( LIB_DIR."/upload/upload.php" );

		$uploader =& new upload( $config );
		$uploader->up( $myfile );
		$up = $uploader->data( );
		return $path.$up['file_name'];
	}

	public function add( )
	{
		$array = null;
		$array['name'] = $_REQUEST['name'];
		$array['link'] = $_REQUEST['link'];
		$array['prizenum'] = $_REQUEST['prizenum'];
		$array['adsid'] = $_REQUEST['adsid'];
		$array['adsid'] = implode(",",$array['adsid']);

		$array['prizeimg'] = $this->zyadsattch('prizeimg');

		$array['complete_img'] = $this->zyadsattch('complete_img' );
		$array['addtime'] = date("Y-m-d H:i:s");
		$array['operator'] = $_SESSION['adminusername'];


		$query = $this->dbo->create( $array, "zyads_channel" );
		if (!$query){
			return false;
		}
        return ture;
	}
	public function update( )
	{
		$array = null;
		$id = $_REQUEST['id'];

		$name = $_REQUEST['name'];
		$link = $_REQUEST['link'];
		$prizenum = $_REQUEST['prizenum'];
		$adsid = $_REQUEST['adsid'];
		$adsid = implode(",",$adsid);
		$uptime = date("Y-m-d H:i:s");
		if ($_FILES['prizeimg']['name']){
			$prizeimg = $this->zyadsattch('prizeimg');
			$sql = "update zyads_channel set prizeimg=\"{$prizeimg}\" WHERE id={$id}";
			$this->dbo->query($sql);
		}
		if ($_FILES['complete_img']['name']){
			$complete_img = $this->zyadsattch('complete_img');
			$sql = "update zyads_channel set complete_img=\"{$complete_img}\" WHERE id={$id}";
			$this->dbo->query($sql);
		}
		$sql = "update zyads_channel set name=\"{$name}\",link=\"{$link}\",prizenum={$prizenum},adsid=\"{$adsid}\",uptime=\"{$uptime}\" WHERE id={$id}";

		$query = $this->dbo->query($sql);
		if (!$query){
			return false;
		}
		return ture;
	}
	public function del( )
	{
		$id = ( integer )$_GET['id'];
		$sql = "DELETE FROM zyads_channel WHERE  id=".$id;
		$query = $this->dbo->query( $sql );
	}
	public function show( )
	{
		$keyword = $_REQUEST['keyword'];
		$sql = "select * from zyads_channel WHERE name LIKE '%{$keyword}%'";
		$query = $this->dbo->get_all( $sql );
		return $query;
	}
	public function getplan()
	{
		$sql = "select planid,planname from zyads_plan";
		$query = $this->dbo->get_all( $sql );
		return $query;
	}
	public function getone()
	{
		$id = $_REQUEST['id'];
		$sql = "select * from zyads_channel WHERE id={$id}";
		$query = $this->dbo->get_one( $sql );
		return $query;
	}


}

?>
