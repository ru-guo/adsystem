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
?>
<div style="margin: 10px;">
	<span style="font-size: 20px;">�����༭��</span><br><br><br>
<form action="?action=channel&<?php if ($actiontype =='up'){ echo 'actiontype=updata';}else{ echo "actiontype=add"; } ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data['id'];?>">
	�������ƣ�<input type="text" name="name" value="<?php echo $data['name'];?>">
	<br><br>
	�������ӣ�<input type="text" name="link" value="<?php echo $data['link'];?>">
	<br><br>
	�齱������<select name="prizenum">
		<?php
		for ($i=1; $i <9 ; $i++) {
			echo "<option value=\"".$i."\" ";
			if ($data['prizenum']==$i){
			    echo "selected";
            }
			echo ">".$i."</option>";
		}
		?>

	</select><br><br>
	ת��ͼƬ��<input type="file" name="prizeimg"><br><br>
	����ͼƬ��<input type="file" name="complete_img"><br><br>
	������棺
	<?php
	foreach ($plandata as $value){
		echo "<input name=\"adsid[]\" type=\"checkbox\" value=\"".$value['planid']."\" ";
		if (in_array($value['planid'],$adsid)){
		    echo "checked";
        }
		echo "/>".$value['planname']."&nbsp&nbsp&nbsp&nbsp";
	}
	?>
	<br><br>
	<input type="submit" value="�ύ" id="btn">
</form>
</div>
<!--    <script type="text/javascript">-->
<!--        window.onload = function(){-->
<!--            //��ȡ��ť�Ķ���-->
<!--            var btn = document.getElementById("btn");-->
<!--            //Ϊ��ť�󶨵�����Ӧ����-->
<!--            btn.onclick = function(){-->
<!--                //����Ժ�ʹ��ť������-->
<!--                this.disabled=true;-->
<!--                //�����ύ��ť����Ϊ������ʱ�����Զ�ȡ������Ĭ����Ϊ-->
<!--                //�ֶ��ύ��-->
<!--                this.parentNode.submit();-->
<!--            };-->
<!--        };-->
<!--    </script>-->
<?php
include( TPL_DIR."/footer.php" );
?>