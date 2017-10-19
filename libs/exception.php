<?php
class ZException extends Exception
{

		public function __construct( $message, $code = 0 )
		{
				#$FN_-2147483645( $message, intval( $code ) );
		}

		public function dump( $class )
		{
				$message = "exception '".get_class( $class )."'";
				if ( $class->getMessage( ) != "" )
				{
						$message .= " with message '".$class->getMessage( )."'";
				}
				$message .= " in ".$class->getfile( ).":".$class->getLine( )."\n\n";
				$message .= $class->getTraceAsString( );
				if ( ini_get( "html_errors" ) )
				{
						echo nl2br( htmlspecialchars( $message ) );
				}
				else
				{
						echo $message;
				}
		}

}

?>
