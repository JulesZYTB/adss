<?php 
		include("include/config.php");
		$id_member = intval($_GET['id_member']);
		$id_user = intval($_GET['id_user']);
		
		
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_ads_pp = "SELECT * FROM `follow_member` WHERE id_follow = \"$id_user\" and id_member_f = \"$id_member\"";
		$query_ads_ex_pp = mysqli_query($mysqli,$query_ads_pp);
		$fetch_array_ex_qu_pp = mysqli_num_rows($query_ads_ex_pp);
		if($fetch_array_ex_qu_pp > 0){}else{

		
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_ads = "SELECT * FROM `members` WHERE id = \"$id_user\" ";
		$query_ads_ex = mysqli_query($mysqli,$query_ads);
		$fetch_array_ex_qu = mysqli_fetch_array($query_ads_ex);

			
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_inset_follow = "INSERT INTO `follow_member` (`id_member_f`,`id_follow`) VALUES (\"$id_member\",\"$id_user\")";
		$result_inset_follow = mysqli_query($mysqli,$query_inset_follow);
		if($result_inset_follow){
			?>
            <div id="myDiv2">
<button type="button" id="unfollow" onclick="loadXMLDoc2()" class="button btn btn-default btn-large" dir="rtl" style=""> 
 <span class="show-info" style="display: inline;">
 <img src="<?php echo $url_hraj; ?>templates/default/images2/accept.png" alt=""> انت تتابع : <?php echo $fetch_array_ex_qu[username]; ?> 

 </span> <span class="show-delete" style="display: none;">

  <img src="<?php echo $url_hraj; ?>templates/default/images2/delete.png" alt="">إلغاء متابعة:  <?php echo $fetch_array_ex_qu[username]; ?>
</span></button>
</div>

            <?php
			}else{
			?>
			<div class="alert alert-danger">يوجد مشكلة في قائمة المتابعة يرجى التواصل مع الأدارة</div>	
			<?php
            }
			}
			?>