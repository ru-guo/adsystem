<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function getcache( $name, $dirs )
{
		$filename = getfilename( $name, $dirs );
		$cache_complete = FALSE;
		$cache_contents = "";
		$ok = include( $filename );
		if ( $ok && $cache_complete )
		{
				if ( $cache_name != $name )
				{
						return FALSE;
				}
				if ( isset( $cache_time ) && $cache_time + $GLOBALS['C_ZYIIS']['cache_time'] < TIMES )
				{
						setcache( $name, $cache_contents, $dirs );
						return FALSE;
				}
				return $cache_contents;
		}
		return FALSE;
}

function setcache( $name, $array, $dirs )
{
		$filename = getfilename( $name, $dirs );
		if ( !is_writable( dirname( $filename ) ) )
		{
				exit( $dirs." Not write" );
		}
		$content = "<?php\n\n";
		$content .= "\$cache_contents   = ".var_export( $array, TRUE ).";\n\n";
		$content .= "\$cache_name       = '".addcslashes( $name, "\\'" )."';\n";
		$content .= "\$cache_time       = ".TIMES.";\n";
		if ( $expire !== NULL )
		{
				$content .= "\$cache_expire     = ".$expire.";\n";
		}
		$content .= "\$cache_complete   = true;\n\n";
		$tmpname = $filename."tmp";
		if ( $fp = @fopen( $tmpname, "wb" ) )
		{
				@fwrite( $fp, $content, @strlen( $content ) );
				@fclose( $fp );
				if ( !@rename( $tmpname, $filename ) )
				{
						@unlink( $filename );
						if ( !@rename( $tmpname, $filename ) )
						{
								@unlink( $tmpname );
						}
				}
				return FALSE;
		}
		return TRUE;
}

function delcache( $name = "", $dirs )
{
		if ( $name != "" )
		{
				$file = getfilename( $name, $dirs );
				if ( file_exists( $file ) )
				{
						@unlink( $file );
						return TRUE;
				}
		}
		return FALSE;
}

function getfilename( $name, $dirs )
{
		$prefix = "cache_";
		if ( $dirs == "z" )
		{
				$file = "/".floor( $name / 1000 );
				$d = CACHE_DIR."/".$dirs.$file;
				if ( !is_dir( $d ) )
				{
						mkdir( $d, 511 );
				}
		}
		return CACHE_DIR."/".$dirs.$file."/".$prefix.$name.".php";
}

define( "CACHE_DIR", WWW_DIR."/cache" );
?>
