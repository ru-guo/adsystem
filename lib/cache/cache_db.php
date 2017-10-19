<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function setcache( $where, $content, $add = NULL )
{
		$dbo = gc( );
		$where .= $add;
		$content = addslashes( serialize( $content ) );
		$query = $dbo->query( "DELETE FROM  zyads_cache WHERE cacheid = '".$where."'" );
		$query = $dbo->query( "INSERT INTO zyads_cache (cacheid, content) VALUES ('".$where."', '".$content."')" );
}

function getcache( $where, $add = NULL )
{
		$dbo = gc( );
		$where .= $add;
		$row = $dbo->get_one( "SELECT * FROM zyads_cache WHERE cacheid = '".$where."'" );
		if ( $row )
		{
				return unserialize( $row['content'] );
		}
		return FALSE;
}

function delcache( $where = "", $add )
{
		$dbo = gc( );
		$where .= $add;
		if ( $where == "" )
		{
				$query = $dbo->query( "DELETE FROM zyads_cache" );
		}
		else
		{
				$query = $dbo->query( "DELETE FROM  zyads_cache WHERE cacheid = '".$where."'" );
		}
}

function cacheinfo( $where = "", $add )
{
		$dbo = gc( );
		$query = array( );
		$rows = $dbo->get_all( "SELECT cacheid, LENGTH(content) AS len FROM zyads_cache" );
		return $rows;
}

?>
