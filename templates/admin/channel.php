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
	echo "�����ɹ�";
}
if ($_REQUEST['statetype']=="fail"){
	echo "����ʧ��";
}
?>
<br>
<form action="?action=channel" method="post">��������:<input type="text" name="keyword"> <input type="submit" value="����"></form>
<div style="margin: 10px;">
	<a href="do.php?action=channel&actiontype=addchannel">�������</a>
	<table border="2" bordercolor="black" width="90%" cellspacing="0" cellpadding="5" align="center">

		<tr>
			<td>id</td>
			<td>��������</td>
			<td>��������</td>
			<td>ת�̳齱����</td>
			<td>ת��ͼƬ</td>
			<td>����ͼƬ</td>
			<td>��漯��</td>
			<td>�޸�ʱ��</td>
			<td>����Ա</td>
			<td>����</td>
		</tr>
		<?php
		foreach ($channel as $value) {
			echo "<tr>";
			echo "<td>".$value['id']."</td>
	 		<td>".$value['name']."</td>
	 		<td>".$value['link']."</td>
	 		<td>".$value['prizenum']."</td>
	 		<td><a href='".$value['prizeimg']." ' target=\'_black\'>�鿴</a></td>
			<td><a href='".$value['complete_img']." ' target=\'_black\'>�鿴</a></td>
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
	 		<td><a href=\"do.php?action=channel&actiontype=up&id=".$value['id']."  \">�༭</a>|<a href=\"do.php?action=channel&actiontype=del&id=".$value['id']."\">ɾ��</a></td>";
			echo "</tr>";
		}
		?>

	</table>
</div>
<?php
include( TPL_DIR."/footer.php" );
?>