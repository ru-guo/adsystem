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
		"createplan" => array( "aclcity" => "��������Ī�����У�ֻ��ѡ�еĳ���Ͷ�Ż��ǳ���Ͷ�š�", "aclwebtype" => "ֻ�ں����Լ�����վ������Ͷ�Ż��Ǿܾ�����ͬ���͵���վ��", "acltimetype" => "��ָ����ʱ��Ͷ�ţ�ϵͳ����Ϊ���ڹ涨��ʱ����ʾ��档", "aclweekdaytype" => "��ָ����һ�����ڼ���ʾ��档" )
);
echo $h[$type][$typeval];
?>
