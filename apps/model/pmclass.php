<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_PmClass
{

		public $dbo = NULL;

		public function model_pmclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function messageisviewsenduserrow( )
		{
				$sql = "SELECT count(*) as n FROM zyads_message\r\n    \t\t\tWHERE parentid =0 AND isadmin =0 AND isview = 0  AND senduser = '".$_SESSION['username']."' \r\n    \t\t\tAND isadmin = 0";
				$p = $this->dbo->get_one( $sql );
				return $p;
		}

		public function messageisadmintouserrow( )
		{
				$sql = "SELECT count(*) as n FROM zyads_message\r\n    \t\t\tWHERE parentid =0 AND isadmin =0 AND isview = 0  AND touser = '".$_SESSION['username']."' \r\n    \t\t\tAND isadmin = 0";
				$p = $this->dbo->get_one( $sql );
				return $p;
		}

		public function messageparentrow( )
		{
				$sql = "SELECT count(*) as n FROM zyads_message\r\n    \t\t\tWHERE parentid =0 AND isadmin =0 AND isview = 0  \r\n    \t\t\tAND (touser = '".$_SESSION['username']."' OR senduser = '".$_SESSION['username']."' OR alone=1)";
				$p = $this->dbo->get_one( $sql );
				return $p;
		}

		public function createmessagemsgtype( $senduser = "" )
		{
				$msgtype = $_POST['msgtype'];
				$subject = $_POST['subject'];
				$msgtext = $_POST['msgtext'];
				$array = array(
						"subject" => $subject,
						"msgtext" => $msgtext,
						"msgtype" => $msgtype,
						"senduser" => !$senduser ? $_SESSION['username'] : $senduser,
						"touser" => "System",
						"addtime" => DATETIMES
				);
				$b = $this->dbo->create( $array, "zyads_message" );
		}

		public function tmessageisadmin( $senduser = "", $touser = "" )
		{
				$msgid = ( integer )$_POST['msgid'];
				$msgtext = $_POST['retext'];
				$array = array(
						"msgtext" => $msgtext,
						"senduser" => !$senduser ? $_SESSION['username'] : $senduser,
						"touser" => !$touser ? $_SESSION['username'] : $touser,
						"parentid" => $msgid,
						"addtime" => DATETIMES
				);
				$b = $this->dbo->create( $array, "zyads_message" );
				$sql = "UPDATE  zyads_message set  isadmin = 1\r\n\t\t\t\tWHERE msgid=".$msgid."  ";
				$this->dbo->query( $sql );
		}

		public function tmessagesendusertouserrow( )
		{
				$msgid = ( integer )$_GET['msgid'];
				$sql = "SELECT * FROM zyads_message\r\n    \t\t\tWHERE (senduser='".$_SESSION['username']."' Or touser='".$_SESSION['username'].( "' OR alone=1) \r\n    \t\t\tAND msgid =".$msgid );
				return $this->dbo->get_one( $sql );
		}

		public function tmessageparentrow( $msgid )
		{
				$msgid = ( integer )$msgid;
				$sql = "SELECT * FROM zyads_message\r\n    \t\t\tWHERE parentid  = ".$msgid." ORDER BY msgid ASC ";
				return $this->dbo->get_all( $sql );
		}

		public function messagesentparentsqlandnums( )
		{
				$sql = "SELECT * FROM zyads_message\r\n    \t\t\tWHERE senduser='".$_SESSION['username']."' AND parentid =0 ORDER BY msgid DESC";
				$ssql = "SELECT count(*) AS n FROM zyads_message\r\n    \t\t\tWHERE senduser='".$_SESSION['username']."' AND parentid =0 ";
				return $sql."|".$ssql;
		}

		public function messageparentsqlandnums( )
		{
				$condition = "";
				if ( $_SESSION['type'] == 2 )
				{
						$condition = "touser='".$_SESSION['username']."'";
				}
				else
				{
						$condition = "(touser='".$_SESSION['username']."' OR alone=1)";
				}
				$sql = "SELECT * FROM zyads_message\r\n    \t\t\tWHERE ".$condition."  AND parentid =0 ORDER BY msgid DESC";
				$ssql = "SELECT count(*) AS n FROM zyads_message\r\n    \t\t\tWHERE ".$condition."  AND parentid =0 ";
				return $sql."|".$ssql;
		}

		public function messageservicedrow( )
		{
				$msgid = ( integer )$_GET['msgid'];
				$sql = "SELECT m.* FROM zyads_message AS m,zyads_users AS u\r\n    \t\t\tWHERE u.serviceid='".$_SESSION['serviceid'].( "' AND m.senduser=u.username AND m.msgid =".$msgid );
				return $this->dbo->get_one( $sql );
		}

		public function messageservicesqlandnums( )
		{
				$sql = "SELECT m.* FROM zyads_message AS m,zyads_users AS u\r\n    \t\t\tWHERE u.serviceid='".$_SESSION['serviceid']."' AND u.type=1  AND m.senduser=u.username AND m.parentid =0 ORDER BY m.msgid DESC";
				$ssql = "SELECT count(*) AS n FROM zyads_message AS m,zyads_users AS u\r\n    \t\t\tWHERE u.serviceid='".$_SESSION['serviceid']."' AND u.type=1  AND m.senduser=u.username AND m.parentid =0 ";
				return $sql."|".$ssql;
		}

		public function messagesendsqlandnums( )
		{
				$sql = "SELECT * FROM zyads_message\r\n    \t\t\tWHERE senduser='".$_SESSION['serviceusername']."' AND parentid =0 ORDER BY msgid DESC";
				$ssql = "SELECT count(*) AS n FROM zyads_message\r\n    \t\t\tWHERE senduser='".$_SESSION['serviceusername']."' AND parentid =0 ";
				return $sql."|".$ssql;
		}

		public function doisviews( $msgid )
		{
				$msgid = ( integer )$msgid;
				$sql = "SELECT msgid FROM zyads_message\r\n    \t\t\tWHERE msgid =".$msgid." AND isview = '0' AND isadmin = '0' ORDER BY msgid DESC";
				$b = $this->dbo->get_one( $sql );
				if ( $b )
				{
						return TRUE;
				}
				return FALSE;
		}

		public function messageisviewisadmin( )
		{
				$msgid = ( integer )$_REQUEST['msgid'];
				$sql = "UPDATE  zyads_message set isview=1 and isadmin = '0'\r\n\t\t\t\tWHERE msgid=".$msgid." \r\n\t\t\t\tAND (touser='".$_SESSION['username']."' || senduser='".$_SESSION['username']."'  OR alone=1) ";
				return $this->dbo->query( $sql );
		}

		public function messegesqlandnums( )
		{
				$action = $_REQUEST['isadmin'];
				$alone = ( integer )$_REQUEST['alone'];
				$msgtype = $_REQUEST['msgtype'];
				$actiontype = $_REQUEST['actiontype'];
				$condition = $where = "";
				if ( $action != "" )
				{
						$condition = " AND isview='0' AND isadmin=".( integer )$action;
				}
				if ( $msgtype != "" )
				{
						$condition .= " AND msgtype=".$msgtype;
				}
				if ( $alone )
				{
						$condition .= " AND alone=1";
				}
				if ( $actiontype == "search" )
				{
						$searchtype = h( $_REQUEST['searchtype'] );
						$searchval = h( trim( $_REQUEST['searchval'] ) );
						$where = "";
						if ( $searchtype == "1" )
						{
								$where = " AND senduser ='".$searchval."'";
						}
						else if ( $searchtype == "2" )
						{
								$where = " AND subject like '%".$searchval."%'";
						}
				}
				$sql = "SELECT * FROM zyads_message WHERE  parentid = '0'  ".$condition.( " ".$where." ORDER BY isview ASC,msgid DESC " );
				$ssql = "SELECT count(*) AS n FROM zyads_message WHERE  parentid ='0'  ".$condition.( " ".$where );
				return $sql."|".$ssql;
		}

		public function getparentmessage( $msgid )
		{
				$msgid = ( integer )$msgid;
				$sql = "SELECT * FROM zyads_message WHERE parentid  = ".$msgid;
				return $this->dbo->get_num( $sql );
		}

		public function delparentandmymsg( )
		{
				$msgid = $_POST['msgid'];
				if ( is_array( $msgid ) )
				{
						foreach ( $msgid as $msgid )
						{
								$query = $this->dbo->query( "Delete From zyads_message Where msgid = '".( integer )$msgid."'" );
								$query = $this->dbo->query( "Delete From zyads_message Where parentid = '".( integer )$msgid."'" );
						}
				}
		}

		public function getadsmessage( )
		{
				$msgid = ( integer )$_GET['msgid'];
				$sql = "SELECT * FROM zyads_message WHERE msgid =".$msgid;
				return $this->dbo->get_one( $sql );
		}

		public function getparentmessagerqid( )
		{
				$msgid = ( integer )$_GET['msgid'];
				$sql = "SELECT * FROM zyads_message\r\n    \t\t\tWHERE  parentid  = ".$msgid." ORDER BY msgid ASC ";
				return $this->dbo->get_all( $sql );
		}

		public function createmessageisadmin( )
		{
				$msgid = ( integer )$_POST['msgid'];
				$msgtext = $_POST['retext'];
				$touser = $_POST['touser'];
				$array = array(
						"msgtext" => $msgtext,
						"senduser" => $_SESSION['adminusername'],
						"touser" => "",
						"parentid" => $msgid,
						"addtime" => DATETIMES
				);
				$b = $this->dbo->create( $array, "zyads_message" );
				$sql = "UPDATE  zyads_message set  isadmin = '0'\r\n\t\t\t\tWHERE msgid=".$msgid."  ";
				$this->dbo->query( $sql );
		}

		public function delmessage( )
		{
				$msgid = ( integer )$_GET['msgid'];
				$query = $this->dbo->query( "Delete From zyads_message Where msgid = ".$msgid );
		}

		public function tmessageivewadmin( )
		{
				$msgid = ( integer )$_GET['msgid'];
				$sql = "UPDATE  zyads_message set isview=1 and isadmin = 1\r\n\t\t\t\tWHERE msgid=".$msgid."  ";
				return $this->dbo->query( $sql );
		}

		public function createmessage( )
		{
				$subject = $_POST['subject'];
				$msgtext = $_POST['msgtext'];
				$touser = $_POST['touser'];
				$alone = $_POST['alone'];
				$array = array(
						"subject" => $subject,
						"msgtext" => $msgtext,
						"senduser" => $_SESSION['adminusername'],
						"touser" => $touser,
						"isadmin" => 0,
						"alone" => $alone,
						"addtime" => DATETIMES
				);
				$b = $this->dbo->create( $array, "zyads_message" );
		}

		public function pmmessage( )
		{
				$sql = "SELECT msgid FROM zyads_message\r\n    \t\t\tWHERE parentid =0 AND isadmin =1 AND isview = '0'  ";
				$p = $this->dbo->get_num( $sql );
				return $p;
		}

}

?>
