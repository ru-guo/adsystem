<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_AdminClass
{

		public $unionurl = "www.a.com";
		public $dbo = NULL;
		public $adminaction = NULL;
		public $usertype = NULL;

		public function model_adminclass( )
		{
				$this->dbo = Z::getconn( );
				$this->abe = explode( "d", "admin" );
		}

		public function checklogin( )
		{
				$username = h( trim( $_POST['username'] ) );
				$password = $_POST['password'];
				$aukey = md5( md5( $password.$username ) );
				$checkcode = h( $_POST['checkcode'] );
				//$imgcode = Z::getsingleton( "ImgCode" );
				if ( $password == "" || $username == "" )
				{
						exit( "login_err" );
				}
//				if ( !$imgcode->check( $checkcode ) )
//				{
//						exit( "checkcode" );
//				}
				$sql = "SELECT username,password,loginip,logintime,status,usertype FROM zyads_admin\r\n\t\t\t\tWHERE username='".$username."'";
				$onerow = $this->dbo->get_one( $sql );
				$loginip = getip( );
				$datetime = DATETIMES;
				if ( $onerow['password'] == $aukey )
				{
						if ( $onerow['status'] == 0 )
						{
								exit( "login_lock" );
						}
						$_SESSION['adminusername'] = $onerow['username'];
						$_SESSION['adminpassword'] = $onerow['password'];
						$_SESSION['adminuid'] = $onerow['id'];
						$_SESSION['adminusertype'] = $onerow['usertype'];
						$_SESSION['l_ip'] = $onerow['loginip'];
						$_SESSION['l_time'] = $onerow['logintime'];
						$_SESSION['adminhash'] = substr( md5( substr( time, 0, -7 ).$_SESSION['adminusername'].$_SESSION['adminpassword'] ), 8, 8 );
						$sql = "UPDATE zyads_admin SET loginnum=loginnum+1,loginip='".$loginip.( "',logintime='".$datetime."' WHERE username='{$username}'" );
						$this->dbo->query( $sql );
						$this->loginlog( $username, "Succe", $loginip, $datetime );
						exit( "ok" );
				}
				$this->loginlog( $username, "Faile", $loginip, $datetime );
				exit( "login_err" );
		}

		public function loginlog( $username, $logininfo, $loginip, $datetime )
		{
				$onerow = array(
						"username" => $username,
						"logintype" => "admin",
						"logininfo" => $logininfo,
						"loginip" => $loginip,
						"logintime" => $datetime
				);
				$query = $this->dbo->create( $onerow, "zyads_loginlog" );
		}

		public function passtpost( )
		{
				$action = $_GET['action'];
				if ( !in_array( $action, array( "login", "postlogin" ) ) )
				{
						$authkey = substr( md5( substr( time, 0, -7 ).$_SESSION['adminusername'].$_SESSION['adminpassword'] ), 8, 8 );
						if ( empty( $_SESSION['adminusername'] ) || empty( $_SESSION['adminpassword'] ) || $_SESSION['adminhash'] != $authkey )
						{
								redirect( "do.php?action=login" );
						}
						else
						{
								$sql = "SELECT username,password,adminaction,usertype FROM zyads_admin\r\n\t\t\t    \t\tWHERE username='".$_SESSION['adminusername']."' AND status=1";
								$onerow = $this->dbo->get_one( $sql );
								if ( $onerow['password'] != $_SESSION['adminpassword'] )
								{
										exit( "<script>top.location=\"do.php?action=login\";</script>" );
								}
								$this->adminaction = $onerow['adminaction'];
								$this->usertype = $onerow['usertype'];
						}
				}
		}

		public function adminsqls( )
		{
				$ssql = "SELECT * FROM zyads_admin ORDER BY id DESC ";
				$tsql = "SELECT count(*) AS n FROM zyads_admin";
				return $ssql."|".$tsql;
		}

		public function admininfo( )
		{
				$id = ( integer )$_GET['id'];
				$sql = "SELECT * FROM zyads_admin WHERE id = ".$id." ";
				return $this->dbo->get_one( $sql );
		}

		public function adminstauts( )
		{
				$this->adminnum( );
				$actiontype = $_GET['actiontype'];
				$id = ( integer )$_GET['id'];
				if ( $actiontype == "lock" )
				{
						$status = 0;
				}
				else
				{
						$status = 1;
				}
				$sql = "UPDATE zyads_admin SET status='".$status.( "' WHERE id='".$id."'" );
				$this->dbo->query( $sql );
		}

		public function admincreate( )
		{
				$username = trim( $_POST['username'] );
				$aukey = md5( md5( $_POST['password'].$username ) );
				$userinfo = $_POST['userinfo'];
				$usertype = $_POST['usertype'];
				$acl = $_POST['acl'];
				$acl = serialize( $acl );
				$onerow = array(
						"username" => $username,
						"password" => $aukey,
						"usertype" => $usertype,
						"userinfo" => $userinfo,
						"adminaction" => $acl,
						"addtime" => DATETIMES
				);
				$b = $this->dbo->create( $onerow, "zyads_admin" );
		}

		public function relocatepwd( )
		{
				$id = ( integer )$_POST['id'];
				$username = h( trim( $_POST['upusername'] ) );
				$aukey = $_POST['password'];
				if ( $aukey != "" )
				{
						$password = md5( md5( $aukey.$username ) );
						$password = " password='".$password."',";
				}
				$userinfo = h( $_POST['userinfo'] );
				$usertype = h( $_POST['usertype'] );
				$acl = $_POST['acl'];
				$acl = serialize( $acl );
				if ( !unserialize( $acl ) && $usertype == 0 )
				{
						message( "noacl" );
				}
				$sql = "UPDATE zyads_admin SET\r\n\t\t\t\t".$password.( "\r\n    \t\t\tuserinfo = '".$userinfo."',\r\n\t\t\t\tusertype  = '{$usertype}',\r\n\t\t\t\tadminaction  = '{$acl}'\r\n\t\t\t\tWHERE id = {$id}\r\n    \t" );
				$_SESSION['adminusertype'] = $usertype;
				return $this->dbo->query( $sql );
		}

		public function deleteadmin( )
		{
				if ( $this->adminnum( ) )
				{
						return FALSE;
				}
				$id = $_POST['id'];
				if ( is_array( $id ) )
				{
						foreach ( $id as $value )
						{
								if ( $value == $_SESSION['adminuid'] )
								{
										return FALSE;
								}
								$query = $this->dbo->query( "Delete From zyads_admin Where id = ".( integer )$value );
						}
				}
		}

		public function adminnum( )
		{
				$sql = "SELECT * FROM zyads_admin";
				$num = $this->dbo->get_num( $sql );
				if ( 1 == $num )
				{
						return TRUE;
				}
				return FALSE;
		}

		public function checkcopyright( )
		{
				Z::zrequire( WWW_DIR."/settings.php" );
				$siteurl = "http://".$GLOBALS['C_ZYIIS']['siteurl'];
				$parseurl = parse_url( $siteurl );
				$host = $parseurl['host'];
		}

}

?>
