<?php 
		include("include/config.php");
		$id_member = intval($_GET['id_member']);
		$id_user = intval($_GET['id_user']);
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_inset_follow = "DELETE FROM `follow_member` where id_member_f = \"$id_member\" and id_follow = \"$id_user\" ";
		$result_inset_follow = mysqli_query($mysqli,$query_inset_follow);
		if($result_inset_follow){
			?>
            
<button type="button" id="follow" onclick="loadXMLDoc()" class="button btn btn-default btn-large" onclick="follow_user(this.value)" dir="rtl" style=""> <img src="<?php echo $url_hraj; ?>templates/default/images2/add.png" alt=""> متابعة
</button>

            <?php
			}else{
			?>
			<div class="alert alert-danger">يوجد مشكلة في إلغاء المتابعة يرجى الوتواصل مع الأدارة</div>	
			<?php
            }