<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Db_MysqlClass
{

		public $masterconf = array( );
		public $slaveconf = array( );
		public $wdbconn = NULL;
		public $rdbconn = NULL;
		public $dbcharset = "gbk";
		public $isinitconn = FALSE;
		public $isLog = TRUE;
		public $masterslave = 0;
		public $sql_mode = 0;

		public function db_mysqlclass( $conf, $slaveconf = array( ) )
		{
				if ( is_array( $conf ) && !empty( $conf ) )
				{
						$this->masterconf = $conf;
						$this->dbcharset = $this->masterconf['charset'];
						$this->sql_mode = $this->masterconf['sqlmode'];
				}
				if ( !is_array( $slaveconf ) || empty( $slaveconf ) )
				{
						$this->slaveconf = $conf;
				}
				else
				{
						$this->slaveconf = $slaveconf;
				}
		}

		public function getdbwriteconn( )
		{
				if ( $this->wdbconn && is_resource( $this->wdbconn ) )
				{
						return $this->wdbconn;
				}
				$linkid = $this->connect( $this->masterconf['dbhost'], $this->masterconf['dbport'], $this->masterconf['dbuser'], $this->masterconf['dbpsw'], $this->masterconf['dbname'] );
				if ( !$linkid || !is_resource( $linkid ) )
				{
						return FALSE;
				}
				$this->wdbconn = $linkid;
				return $this->wdbconn;
		}

		public function getdbreadconn( )
		{
				if ( $this->masterslave )
				{
						if ( $this->rdbconn && is_resource( $this->rdbconn ) )
						{
								return $this->rdbconn;
						}
						$dbhost = explode( "|", $this->slaveconf['dbhost'] );
						if ( !is_array( $dbhost ) || empty( $dbhost ) )
						{
								return $this->getdbwriteconn( );
						}
						$randhost = array_rand( $dbhost );
						$linkid = $this->connect( trim( $dbhost[$randhost] ), $this->slaveconf['dbport'], $this->slaveconf['dbuser'], $this->slaveconf['dbpsw'], $this->slaveconf['dbname'] );
						if ( $linkid && is_resource( $linkid ) )
						{
								return $this->rdbconn = $linkid;
						}
						$this->errorlog( "Not Slave connection, Call Master connection" );
				}
				return $this->getdbwriteconn( );
		}

		public function connect( $host, $port, $username, $pwd, $database )
		{
				$linkid = @mysql_connect( $host.":".$port, $username, $pwd );
				if ( !$linkid )
				{
						$this->errorlog( "Mysql connect ".$host." Failed" );
						return FALSE;
				}
				if ( !mysql_select_db( $database, $linkid ) )
				{
						exit( "Can't use database: ".$database."." );
				}
				if ( mysql_query( "SET NAMES '".$this->dbcharset."'", $linkid ) === FALSE )
				{
						$this->errorlog( "Set db_host '".$host."' charset=".$this->dbcharset." failed." );
						exit( "Set charset = ''".$this->dbcharset." failed." );
				}
				if ( $this->sql_mode )
				{
						mysql_query( "SET sql_mode=''", $linkid );
				}
				return $linkid;
		}

		public function query( $sql, $force = FALSE )
		{
				if ( trim( $sql ) == "" )
				{
						$this->errorlog( "Sql query is empty." );
						return FALSE;
				}
				if ( $this->masterslave )
				{
						if ( !$force )
						{
								$prestr = trim( strtolower( array_shift( explode( " ", ltrim( $sql ) ) ) ) );
						}
						if ( $force || $prestr != "select" )
						{
								$dbconn = $this->getdbwriteconn( );
						}
						else
						{
								$dbconn = $this->getdbreadconn( );
						}
				}
				else
				{
						$dbconn = $this->getdbwriteconn( );
				}
				if ( !$dbconn || !is_resource( $dbconn ) )
				{
						$this->errorlog( "Not Availability Db Connection. Query SQL:".$sql );
						exit( "Can not connect to MySQL server " );
				}
				if ( !( $query = mysql_query( $sql, $dbconn ) ) )
				{
					echo $sql;
						$this->errorlog( "MySQL Query Sql Error", $dbconn, $sql );
						exit( "MySQL Query Sql Error  " );
				}
				return $query;
		}

		public function get_one( $sql )
		{
				$sql .= " limit 0,1";
				$query = $this->query( $sql );
				if ( $bool = $this->fetch_array( $query ) )
				{
						return $bool;
				}
				return FALSE;
		}

		public function get_all( $sql )
		{
				$query = $this->query( $sql );
				while ( $row = $this->fetch_array( $query ) )
				{
						$rows[] = $row;
				}
				return $rows;
		}

		public function get_num( $sql )
		{
				$query = $this->query( $sql );
				$url_num = $this->num_rows( $query );
				return $url_num;
		}

		public function fetch_array( $query, $type = MYSQL_ASSOC )
		{
				return mysql_fetch_array( $query, $type );
		}

		public function num_rows( $query )
		{
				$query = mysql_num_rows( $query );
				return $query;
		}

		public function insert_id( )
		{
				$cn = $this->getdbwriteconn( );
				if ( 0 < ( $insert_id = mysql_insert_id( $cn ) ) )
				{
						return $insert_id;
				}
				return $this->query( "SELECT LAST_INSERT_ID()", "", TRUE );
		}

		public function affected_rows( )
		{
				return mysql_affected_rows( );
		}

		public function result( $query, $array )
		{
				$query = @mysql_result( $query, $array );
				return $query;
		}

		public function num_fields( $query )
		{
				return mysql_num_fields( $query );
		}

		public function free_result( $query )
		{
				return mysql_free_result( $query );
		}

		public function fetch_fields( $query )
		{
				return mysql_fetch_field( $query );
		}

		public function escape_string( $string )
		{
				return mysql_escape_string( $string );
		}

		public function locktable( $table )
		{
				return $this->query( "LOCK TABLES ".$table, TRUE );
		}

		public function unlocktable( $table )
		{
				return $this->query( "UNLOCK TABLES ".$table, TRUE );
		}

		public function create( &$array, $table )
		{
				if ( $table == "" || !is_array( $array ) || empty( $array ) )
				{
						exit( "MySQL Create Error Is_array" );
				}
				$str = implode( ",", array_keys( $array ) );
				$value = array_values( $array );
				array_walk( $value, array(
						$this,
						"fieldFormat"
				) );
				$dstr = implode( ",", $value );
				$sql = "INSERT INTO ".$table.( " (".$str.") VALUES ({$dstr})" );
				return $this->query( $sql, TRUE );
		}

		public function fieldformat( &$value )
		{
				$value = "'".$value."'";
				return $value;
		}

		public function errorlog( $day = "", $conn = NULL, $sql = "" )
		{
				$time = time( );
				$content = "";
				$date = date( "Ymd" );
				$dberrfile = WWW_DIR."/log/dberrortime.".$date.".log";
				$filename = WWW_DIR."/log/dberrorlog.".$date.".php";
				$mysqlerror = !$conn ? mysql_error( ) : mysql_error( $conn );
				$mysqlerrno = !$conn ? mysql_errno( ) : mysql_errno( $conn );
				$content .= "ZYADS: ".$day."\n";
				$content .= "Time: ".gmdate( "Y-n-j g:ia", time( ) )."\n";
				$content .= "Error:  ".$mysqlerror."\n";
				$content .= "Errno:  ".$mysqlerrno."\n";
				$content .= "Script: ".$_SERVER['PHP_SELF']."\n";
				if ( $sql )
				{
						$content .= "SQL: ".$sql."\n";
				}
				$ll = array( );
				if ( $stream = @fopen( $dberrfile, "r" ) )
				{
						while ( !feof( $stream ) && count( $ll ) < 20 )
						{
								$text = explode( "\t", fgets( $stream, 50 ) );
								if ( $time - $text[0] < 86400 )
								{
										$ll[$text[0]] = $text[1];
								}
						}
						@fclose( $stream );
				}
				if ( !in_array( $mysqlerrno, $ll ) )
				{
						$ll[$time] = $mysqlerrno;
						@$stream = @fopen( $dberrfile, "w" );
						@flock( $stream, 2 );
						foreach ( array_unique( $ll ) as $xx => $errno )
						{
								@fwrite( $stream, "{$xx}\t{$errno}" );
						}
						@fclose( $stream );
						@$stream = @fopen( $filename, "a" );
						@fwrite( $stream, "\n<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>\n".@trim( $content )."\n" );
						@fclose( $stream );
				}
		}

		public function close( )
		{
				return mysql_close( );
		}

}

?>
