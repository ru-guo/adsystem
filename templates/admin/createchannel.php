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
	<span style="font-size: 20px;">渠道编辑：</span><br><br><br>
<form action="?action=channel&<?php if ($actiontype =='up'){ echo 'actiontype=updata';}else{ echo "actiontype=add"; } ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data['id'];?>">
	渠道名称：<input type="text" name="name" value="<?php echo $data['name'];?>">
	<br><br>
	渠道链接：<input type="text" name="link" value="<?php echo $data['link'];?>">
	<br><br>
	抽奖次数：<select name="prizenum">
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
	转盘图片：<input type="file" name="prizeimg"><br><br>
	结束图片：<input type="file" name="complete_img"><br><br>
	所属广告：
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
	<input type="submit" value="提交" id="btn">
</form>
</div>
<!--    <script type="text/javascript">-->
<!--        window.onload = function(){-->
<!--            //获取按钮的对象-->
<!--            var btn = document.getElementById("btn");-->
<!--            //为按钮绑定单击响应函数-->
<!--            btn.onclick = function(){-->
<!--                //点击以后使按钮不可用-->
<!--                this.disabled=true;-->
<!--                //当将提交按钮设置为不可用时，会自动取消它的默认行为-->
<!--                //手动提交表单-->
<!--                this.parentNode.submit();-->
<!--            };-->
<!--        };-->
<!--    </script>-->
<?php
include( TPL_DIR."/footer.php" );
?>