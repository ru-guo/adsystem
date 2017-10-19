<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function connected( )
{
		static $mem = NULL;
		if ( is_null( $mem ) )
		{
				if ( !extension_loaded( "memcache" ) )
				{
						exit( "Not Memcache" );
				}
				$mem =& new memcache( );
				$mem->connect( $GLOBALS['C_ZYIIS']['memcached_host'], $GLOBALS['C_ZYIIS']['memcached_port'] );
		}
		return $mem;
}

function setcache( $key, $value, $stuffix = NULL, $time = NULL )
{
		$mc = connected( );
		$key .= $stuffix;
		if ( isset( $time, $time ) )
		{
				$expire = $time;
		}
		else
		{
				$expire = $GLOBALS['C_ZYIIS']['cache_time'];
		}
		return $mc->set( $key, $value, 0, $expire );
}

function getcache( $key, $stuffix = NULL )
{
		$mc = connected( );
		$key .= $stuffix;
		return $mc->get( $key );
}

function delcache( $key, $stuffix )
{
		$mc = connected( );
		$key .= $stuffix;
		$mc->delete( $key );
}

function flush( )
{
		$mc = connected( );
		$mc->flush( );
}

?>
