<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "IN_ZYADS" ) )
{
		exit( );
}
header( "Content-Type:text/html;charset=GB2312" );
$type = h( $_GET['type'] );
$typeval = h( $_GET['typeval'] );
$h = array(
		"createplan" => array( "aclcity" => "定向具体的莫个城市，只在选中的城市投放或是除外投放。", "aclwebtype" => "只在合适自己的网站类型中投放或是拒绝非相同类型的网站。", "acltimetype" => "在指定的时间投放，系统将会为您在规定的时间显示广告。", "aclweekdaytype" => "在指定的一周星期几显示广告。" )
);
echo $h[$type][$typeval];
?>
