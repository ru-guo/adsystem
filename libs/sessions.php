<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class sessions
{

		public $lifeTime = "";
		public $dbo = NULL;

		public function sessions( )
		{
				$this->dbo = Z::getconn( );
				session_set_save_handler( array(
						$this,
						"open"
				), array(
						$this,
						"close"
				), array(
						$this,
						"read"
				), array(
						$this,
						"write"
				), array(
						$this,
						"destroy"
				), array(
						$this,
						"gc"
				) );
		}

		public function open( $a, $b )
		{
				$this->lifeTime = 1800;
				return TRUE;
		}

		public function close( )
		{
				$this->gc( ini_get( "session.gc_maxlifetime" ) );
				return TRUE;
		}

		public function read( $sessionid )
		{
				$sql = "SELECT session_data AS d FROM zyads_sessions WHERE session_id = '".$sessionid."'   AND session_expires >".TIMES;
				$row = $this->dbo->get_one( $sql );
				if ( $row )
				{
						$session = $row['d'];
						return $session;
				}
				return FALSE;
		}

		public function write( $sessionid, $content )
		{
				if ( !$content )
				{
						return FALSE;
				}
				$lifeTime = TIMES + $this->lifeTime;
				$sql = "SELECT * FROM zyads_sessions WHERE session_id = '".$sessionid."'";
				$num = $this->dbo->get_num( $sql );
				if ( $num )
				{
						$this->dbo->query( "UPDATE zyads_sessions  SET session_expires = '".$lifeTime.( "', session_data = '".$content."' WHERE session_id = '{$sessionid}'" ) );
						if ( $this->dbo->affected_rows( ) )
						{
								return TRUE;
						}
				}
				else
				{
						$this->dbo->query( "INSERT INTO zyads_sessions (  session_id, session_expires, session_data)  VALUES( '".$sessionid.( "', '".$lifeTime."',  '{$content}')" ) );
						if ( $this->dbo->affected_rows( ) )
						{
								return TRUE;
						}
				}
				return FALSE;
		}

		public function destroy( $sessionid )
		{
				$this->dbo->query( "DELETE FROM zyads_sessions WHERE session_id = '".$sessionid."'" );
				if ( $this->dbo->affected_rows( ) )
				{
						return TRUE;
				}
				return FALSE;
		}

		public function gc( )
		{
				$this->dbo->query( "DELETE FROM zyads_sessions WHERE session_expires < ".TIMES );
				return TRUE;
		}

		public function __destruct( )
		{
				session_write_close( );
		}

}

?>
