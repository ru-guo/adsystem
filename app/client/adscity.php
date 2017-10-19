<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Client_AdsCity
{

		public $fd = FALSE;
		public $inum = NULL;
		public $off1 = 0;
		public $off2 = 0;
		public $flag = NULL;
		public $chrono = NULL;

		public function &open( )
		{
				$filename = dirname( __FILE__ )."/data.dat";
				if ( !( $fp = fopen( $filename, "rb" ) ) )
				{
						return FALSE;
				}
				fseek( $fp, 0, SEEK_SET );
				$pack = unpack( "a4flag/Vinum", fread( $fp, 8 ) );
				fseek( $fp, $pack['inum'] * 12 + 8, SEEK_SET );
				$content = fread( $fp, 12 );
				if ( $pack['flag'] != "ZYAD" || strlen( $content ) != 12 )
				{
						fclose( $fp );
						return FALSE;
				}
				$this->close( );
				$this->fd = $fp;
				$this->flag = $pack['flag'];
				$this->inum = $pack['inum'];
				$this->off1 = $pack['inum'] * 12 + 20;
				$pack = unpack( "V3", $content );
				$this->off2 = $this->off1 + $pack[2];
				$this->chrono = $pack[3];
				return TRUE;
		}

		public function close( )
		{
				if ( $this->fd )
				{
						fclose( $this->fd );
				}
				$this->fd = FALSE;
		}

		public function query( $ip )
		{
				return false;
				$this->open( );
				$ip2long = ip2long( $ip );
				if ( $ip2long === FALSE || $ip2long === -1 )
				{
						$ip2long = gethostbyname( $ip2long );
						if ( !$ip2long || !( $ip2long = ip2long( $ip2long ) ) || $ip2long == -1 )
						{
								return FALSE;
						}
				}
				if ( !$this->fd && !$this->open( ) )
				{
						return FALSE;
				}
				$ip2long = ( double )sprintf( "%u", $ip2long );
				$wf = 0;
				$inum = $this->inum - 1;
				$bool = FALSE;
				while ( $wf <= $inum )
				{
						$rnum = $wf + $inum >> 1;
						$xn = $rnum * 12 + 8;
						fseek( $this->fd, $xn, SEEK_SET );
						$content = fread( $this->fd, 16 );
						if ( strlen( $content ) != 16 )
						{
								break;
						}
						$pack = unpack( "V4", $content );
						if ( $pack[1] < 0 )
						{
								$pack[1] = ( double )sprintf( "%u", $pack[1] );
						}
						if ( $pack[4] < 0 )
						{
								$pack[4] = ( double )sprintf( "%u", $pack[4] );
						}
						if ( $ip2long < $pack[1] )
						{
								$inum = $rnum - 1;
						}
						else if ( !( $pack[4] <= $ip2long ) )
						{
						}
						else
						{
								$wf = $rnum + 1;
						}
				}
				$bool = array( NULL, NULL );
				if ( 0 <= $pack[2] )
				{
						fseek( $this->fd, $this->off1 + $pack[2], SEEK_SET );
						$text = ord( fread( $this->fd, 1 ) );
						if ( 0 < $text )
						{
								$bool[0] = fread( $this->fd, $text );
						}
				}
				if ( !( 0 <= $pack[3] ) )
				{
						return $bool;
				}
				fseek( $this->fd, $this->off2 + $pack[3], SEEK_SET );
				$text = ord( fread( $this->fd, 1 ) );
				if ( !( 0 < $text ) )
				{
						return $bool;
				}
				$bool[1] = fread( $this->fd, $text );
				return $bool;
		}

}

?>
