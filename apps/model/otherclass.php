<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_OtherClass
{

		public $dbo = NULL;

		public function model_otherclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function createsetting( )
		{
				$actiontype = $_REQUEST['actiontype'];
				if ( empty( $_POST['setting_post'][tomail] ) && !$actiontype || $actiontype == "smtp" )
				{
						$GLOBALS['GLOBALS']['_POST']['setting_post']['tomail'] = "";
				}
				if ( empty( $_POST['setting_post'][zlink_on] ) && !$actiontype )
				{
						$GLOBALS['GLOBALS']['_POST']['setting_post']['zlink_on'] = "";
				}
				foreach ( $GLOBALS['GLOBALS']['_POST']['setting_post'] as $key => $value )
				{
						if ( $key == "tomail" || $key == "clearing_cycle" || $key == "zlink_on" )
						{
								$value = @implode( ",", $value );
						}
						$sql = "REPLACE INTO zyads_settings VALUES ('".$key."', '".h( $value )."')";
						$this->dbo->query( $sql );
				}
				$p = $this->dbo->get_one( "SELECT value FROM zyads_settings WHERE title='sync_setting'" );
				$value = $p['value'];
				if ( $value )
				{
						$value = @explode( ",", $value );
						$value = str_replace( "http://", "", $value );
						foreach ( ( array )$value as $v )
						{
								$this->getfilesetting( "http://".$v );
						}
				}
				return $this->writtensetting( );
		}

		public function getfilesetting( $v )
		{
				$v = parse_url( $v );
				$v = $v['host'];
				@file_get_contents( "http://".$v."/api/newsetting.php" );
		}

		public function writtensetting( )
		{
				$filename = WWW_DIR."/settings.php";
				$rows = $this->dbo->query( "SELECT title, value FROM zyads_settings" );
				$content = "\$GLOBALS['C_ZYIIS'] = array(\r\n";
				while ( $arr = $this->dbo->fetch_array( $rows ) )
				{
						$content .= "\t'".$arr['title']."' => '".$arr['value']."',\r\n";
				}
				$content .= ");";
				if ( $stream = @fopen( $filename, "wb" ) )
				{
						@fwrite( $stream, "<?php\r\n\r\n".$content."\r\n\r\n?>" );
						@fclose( $stream );
						return TRUE;
				}
				return FALSE;
		}

		public function loginlogandnumsql( )
		{
				$actiontype = $_REQUEST['actiontype'];
				$logininfo = $_GET['logininfo'];
				if ( $logininfo != "" )
				{
						$condition = " AND logininfo='".$logininfo."'";
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
								$where = "  AND loginip = '".$searchval."'";
						}
				}
				$sql = "SELECT * FROM zyads_loginlog WHERE 1 ".$condition.( " ".$where."  ORDER BY id DESC" );
				$ssql = "SELECT count(*) AS n FROM zyads_loginlog WHERE 1 ".$condition.( " ".$where." " );
				return $sql."|".$ssql;
		}

		public function deloginlog( )
		{
				$id = $_POST['id'];
				if ( is_array( $id ) )
				{
						foreach ( $id as $value )
						{
								$query = $this->dbo->query( "Delete From zyads_loginlog Where id =".( integer )$value );
						}
				}
		}

		public function truncatable( )
		{
				$query = $this->dbo->query( "TRUNCATE TABLE `zyads_loginlog` " );
		}

		public function setttingvalue( )
		{
				$query = $this->dbo->query( "UPDATE zyads_settings  SET  value = value +1 WHERE title='union_ck' ", TRUE );
				if ( !$this->dbo->affected_rows( ) )
				{
						$query = $this->dbo->query( "INSERT zyads_settings SET value = 1, title = 'union_ck' ", TRUE );
				}
		}

		public function unioncksetting( )
		{
				$b = $this->dbo->get_one( "SELECT * FROM `zyads_settings` WHERE title='union_ck' " );
				return $b['value'];
		}

}

?>
