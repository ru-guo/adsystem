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
include( TPL_DIR."/header.php" );
if ($_REQUEST['statetype']=="success"){
	echo "操作成功";
}
if ($_REQUEST['statetype']=="fail"){
	echo "操作失败";
}
?>
<br>
<form action="?action=channel" method="post">渠道名称:<input type="text" name="keyword"> <input type="submit" value="搜索"></form>
<div style="margin: 10px;">
	<a href="do.php?action=channel&actiontype=addchannel">添加渠道</a>
	<table border="2" bordercolor="black" width="90%" cellspacing="0" cellpadding="5" align="center">

		<tr>
			<td>id</td>
			<td>渠道名称</td>
			<td>渠道链接</td>
			<td>转盘抽奖次数</td>
			<td>转盘图片</td>
			<td>结束图片</td>
			<td>广告集合</td>
			<td>修改时间</td>
			<td>操作员</td>
			<td>操作</td>
		</tr>
		<?php
		foreach ($channel as $value) {
			echo "<tr>";
			echo "<td>".$value['id']."</td>
	 		<td>".$value['name']."</td>
	 		<td>".$value['link']."</td>
	 		<td>".$value['prizenum']."</td>
	 		<td><a href='".$value['prizeimg']." ' target=\'_black\'>查看</a></td>
			<td><a href='".$value['complete_img']." ' target=\'_black\'>查看</a></td>
	 		<td>";
			$adsid = explode(',',$value['adsid']);
            foreach ($adsid as $value){
				foreach ($plan as $val){
				    if($val['planid'] == $value){
				        echo $val['planname']." ";
                    }
                }
            }

            echo "</td>
	 		<td>".$value['uptime']."</td>
	 		<td>".$value['operator']."</td>
	 		<td><a href=\"do.php?action=channel&actiontype=up&id=".$value['id']."  \">编辑</a>|<a href=\"do.php?action=channel&actiontype=del&id=".$value['id']."\">删除</a></td>";
			echo "</tr>";
		}
		?>

	</table>
</div>
<?php
include( TPL_DIR."/footer.php" );
?>