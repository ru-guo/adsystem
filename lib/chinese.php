<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function big52gb( $instr )
{
		$stream = fopen( LIB_DIR."/tables/big5-gb.tab", "r" );
		$len = strlen( $instr );
		$i = 0;
		for ( ;	$i < $len;	++$i	)
		{
				$h = ord( $instr[$i] );
				if ( 160 <= $h )
				{
						$l = ord( $instr[$i + 1] );
						if ( $h == 161 && $l == 64 )
						{
								$gb = "  ";
						}
						else
						{
								fseek( $fp, ( ( $h - 160 ) * 255 + $l - 1 ) * 3 );
								$gb = fread( $fp, 2 );
						}
						$instr[$i] = $gb[0];
						$instr[$i + 1] = $gb[1];
						++$i;
				}
		}
		fclose( $fp );
		return $instr;
}

function gb2big5( $instr )
{
		$stream = fopen( LIB_DIR."/tables/gb-big5.tab", "r" );
		$fp = fopen( "language/gb-big5.tab", "r" );
		$len = strlen( $instr );
		$i = 0;
		for ( ;	$i < $len;	++$i	)
		{
				$h = ord( $instr[$i] );
				if ( !( 160 < $h ) && !( $h < 248 ) )
				{
						$l = ord( $instr[$i + 1] );
						if ( 160 < $l && $l < 255 )
						{
								fseek( $fp, ( ( $h - 161 ) * 94 + $l - 161 ) * 3 );
								$bg = fread( $fp, 2 );
						}
						else
						{
								$bg = "  ";
						}
						$instr[$i] = $bg[0];
						$instr[$i + 1] = $bg[1];
						++$i;
				}
		}
		fclose( $fp );
		return $instr;
}

function big52unicode( $instr )
{
		$stream = fopen( LIB_DIR."/tables/big5-unicode.tab", "r" );
		$len = strlen( $instr );
		$outstr = "";
		$i = $x = 0;
		for ( ;	$i < $len;	++$i	)
		{
				$h = ord( $instr[$i] );
				if ( 160 <= $h )
				{
						$l = ord( $instr[$i + 1] );
						if ( $h == 161 && $l == 64 )
						{
								$uni = "  ";
						}
						else
						{
								fseek( $fp, ( $h - 160 ) * 510 + ( $l - 1 ) * 2 );
								$uni = fread( $fp, 2 );
						}
						$codenum = ord( $uni[0] ) * 256 + ord( $uni[1] );
						if ( $codenum < 2048 )
						{
								$outstr[$x++] = chr( 192 + $codenum / 64 );
								$outstr[$x++] = chr( 128 + $codenum % 64 );
						}
						else
						{
								$outstr[$x++] = chr( 224 + $codenum / 4096 );
								$codenum %= 4096;
								$outstr[$x++] = chr( 128 + $codenum / 64 );
								$outstr[$x++] = chr( 128 + $codenum % 64 );
						}
						++$i;
				}
				else
				{
						$outstr[$x++] = $instr[$i];
				}
		}
		fclose( $fp );
		if ( $instr != "" )
		{
				return join( "", $outstr );
		}
}

function unicode2big5( $instr )
{
		$stream = fopen( LIB_DIR."/tables/unicode-big5.tab", "r" );
		$len = strlen( $instr );
		$outstr = "";
		$i = $x = 0;
		for ( ;	$i < $len;	++$i	)
		{
				$b1 = ord( $instr[$i] );
				if ( $b1 < 128 )
				{
						$outstr[$x++] = chr( $b1 );
				}
				else if ( 224 <= $b1 )
				{
						$b1 -= 224;
						$b2 = ord( $instr[$i + 1] ) - 128;
						$b3 = ord( $instr[$i + 2] ) - 128;
						$i += 2;
						$uc = $b1 * 4096 + $b2 * 64 + $b3;
						fseek( $fp, $uc * 2 );
						$bg = fread( $fp, 2 );
						$outstr[$x++] = $bg[0];
						$outstr[$x++] = $bg[1];
				}
				else if ( 192 <= $b1 )
				{
						printf( "[%02X%02X]", $b1, ord( $instr[$i + 1] ) );
						$b1 -= 192;
						$b2 = ord( $instr[$i] ) - 128;
						++$i;
						$uc = $b1 * 64 + $b2;
						fseek( $fp, $uc * 2 );
						$bg = fread( $fp, 2 );
						$outstr[$x++] = $bg[0];
						$outstr[$x++] = $bg[1];
				}
		}
		fclose( $fp );
		if ( $instr != "" )
		{
				return join( "", $outstr );
		}
}

function gb2unicode( $instr )
{
		$stream = fopen( LIB_DIR."/tables/gb-unicode.tab", "r" );
		$len = strlen( $instr );
		$outstr = "";
		$i = $x = 0;
		for ( ;	$i < $len;	++$i	)
		{
				$h = ord( $instr[$i] );
				if ( 160 < $h )
				{
						$l = ord( $instr[$i + 1] );
						fseek( $fp, ( $h - 161 ) * 188 + ( $l - 161 ) * 2 );
						$uni = fread( $fp, 2 );
						$codenum = ord( $uni[0] ) * 256 + ord( $uni[1] );
						if ( $codenum < 2048 )
						{
								$outstr[$x++] = chr( 192 + $codenum / 64 );
								$outstr[$x++] = chr( 128 + $codenum % 64 );
						}
						else
						{
								$outstr[$x++] = chr( 224 + $codenum / 4096 );
								$codenum %= 4096;
								$outstr[$x++] = chr( 128 + $codenum / 64 );
								$outstr[$x++] = chr( 128 + $codenum % 64 );
						}
						++$i;
				}
				else
				{
						$outstr[$x++] = $instr[$i];
				}
		}
		fclose( $fp );
		if ( $instr != "" )
		{
				return join( "", $outstr );
		}
}

function unicode2gb( $instr )
{
		$stream = fopen( LIB_DIR."/tables/unicode-gb.tab", "r" );
		$len = strlen( $instr );
		$outstr = "";
		$i = $x = 0;
		for ( ;	$i < $len;	++$i	)
		{
				$b1 = ord( $instr[$i] );
				if ( $b1 < 128 )
				{
						$outstr[$x++] = chr( $b1 );
				}
				else if ( 224 <= $b1 )
				{
						$b1 -= 224;
						$b2 = ord( $instr[$i + 1] ) - 128;
						$b3 = ord( $instr[$i + 2] ) - 128;
						$i += 2;
						$uc = $b1 * 4096 + $b2 * 64 + $b3;
						fseek( $fp, $uc * 2 );
						$gb = fread( $fp, 2 );
						$outstr[$x++] = $gb[0];
						$outstr[$x++] = $gb[1];
				}
				else if ( 192 <= $b1 )
				{
						printf( "[%02X%02X]", $b1, ord( $instr[$i + 1] ) );
						$b1 -= 192;
						$b2 = ord( $instr[$i] ) - 128;
						++$i;
						$uc = $b1 * 64 + $b2;
						fseek( $fp, $uc * 2 );
						$gb = fread( $fp, 2 );
						$outstr[$x++] = $gb[0];
						$outstr[$x++] = $gb[1];
				}
		}
		fclose( $fp );
		if ( $instr != "" )
		{
				return join( "", $outstr );
		}
}

?>
