<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function adscheckplan( $row )
{
		if ( isset( $row['checkplan'] ) && $row['checkplan'] != "" )
		{
				$result = TRUE;
				@eval( "\$result = (".$row['checkplan'].");" );
				return $result;
		}
		return TRUE;
}

function tetYXQ( $dd, $quote )
{
		if ( $dd == "" )
		{
				return TRUE;
		}
		$tet = $sitetype;
		$m = explode( ",", $tet );
		$earr = explode( ",", $dd );
		$bool = TRUE;
		$tetts4 = @tetggtrjwcglw5ocmmzbann( $m, $earr );
		if ( $quote == "==" )
		{
				if ( $tetts4 )
				{
						$bool = FALSE;
				}
		}
		else if ( !$tetts4 )
		{
				$bool = FALSE;
		}
		return !$bool;
}

function tetYWM( $data, $comparison )
{
		if ( $data == "" )
		{
				return TRUE;
		}
		$icity = $_COOKIE['icity'];
		if ( !$icity )
		{
				require_once( APP_DIR."/client/adscity.php" );
				$i = new tetQ2xpZW50X0Fkc0NpdHk( );
				$q = $i->tetcXVlcnk( $_SERVER['REMOTE_ADDR'] );
				$i->tetY2xvc2U( );
				$s = explode( "/", $q[0] );
				if ( $s[1] )
				{
						$icity = $s[1];
				}
				else
				{
						$icity = $s[0];
				}
				tetc2v0y29va2ll( "icity", $icity, time( ) + 864000 );
		}
		if ( $comparison == "==" )
		{
				return tetmgypc2l6cjy( $icity, explode( ",", $data ) );
		}
		return !tetmgypc2l6cjy( $icity, explode( ",", $data ) );
}

function tetYWQ( $dd )
{
		if ( $dd == "" )
		{
				return TRUE;
		}
		$g = date( "G", TIMES );
		return tetmgypc2l6cjy( $g, explode( ",", $dd ) );
}

function k1( $dd )
{
		if ( $dd == "" )
		{
				return TRUE;
		}
		$tethg = date( "w", TIMES );
		return tetmgypc2l6cjy( $tethg, explode( ",", $dd ) );
}

function checkexpire( $tetgkt )
{
		if ( $tetgkt == "" )
		{
				return TRUE;
		}
		if ( $tetgkt['expire'] != "0000-00-00" )
		{
				$tet = date( "Y-m-d", TIMES );
				$expire = $tetgkt['expire'];
				if ( $expire < $tet )
				{
						return TRUE;
				}
		}
		return FALSE;
}

?>
