<?php
define( "ZYIIS_VERSION", "7.0.1" );
define( "ZYIIS_VERSIONTIME", "42" );
class Zyiis extends Dispatcher
{

		public static function start( )
		{
				static $app = NULL;
				if ( is_null( $app ) )
				{
						$app = new Zyiis( );
				}
				return $app;
		}

		public function dump( $o )
		{
		}

}

?>