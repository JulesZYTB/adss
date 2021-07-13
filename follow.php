<?php
session_start();
ob_start();
include("include/config_header.php");	
ob_start();
if(!isset($_SESSION['id_members'])){header("location:login.php");}
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print = "SELECT * FROM `keyinformation` WHERE id = \"1\" ";
$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
$print_value = mysqli_fetch_array($result_keyinformation_print);
$namewebsite = $print_value[namewebsite];
$namewebsiteen = $print_value[namewebsiteen];
$keywords = $print_value[keywords];
$messagesphone = $print_value[messagesphone];
$description = nl2br($print_value[description]);
$username_mobile = $print_value[username];
$password_mobile = $print_value[password];

?>

<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>قائمة المتابعة - <?php echo $namewebsite; ?></title> 
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<link href="templates/default/css/bootstrap.rtl.min.css" rel="stylesheet" media="screen"> 
<link href="templates/default/css/custom3.css?v=1.4" rel="stylesheet" media="screen">
<link href="templates/default/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="templates/default/css/custom-icon-fonts.css?v=1.1">
<script async src="templates/default/js/analytics.js"></script>
<script src="templates/default/js/respond.min.js"></script>
<script src="templates/default/js/html5shiv.js" type="text/javascript"></script>
<script src="templates/default/js/respond.proxy.js"></script>
<script src="templates/default/js/jquery-1.10.1.min.js"></script>
<script src="templates/default/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="templates/default/js/cars.js"></script>
<script src="templates/default/js/bootstrap.min.js"></script>
<script type="text/javascript" src="templates/default/js/v5.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 
 
 
 
<?php
include("header.php"); // استدعاء ملف الهيدر
?>
      
<div class="row">
		
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


<h2>متابعة السيارات</h2>





سيتم إشعارك عبر الإشعارات وعبر البريد الإلكتروني عند وجود إعلان جديد عن أي سيارة تقوم بمتابعتها.


<br>
<br>
	<?php
	if($_POST['remove']){
	$id_pm_remove = $_POST['id'];
	
	if(empty($id_pm_remove) or $id_pm_remove === 0){
	echo "
	<div class=\"alert alert-danger\">
	للأسف لم تحدد عناصر ليتم حذفها
	</div>
	";
		}else{
			$impid_pm = implode(", ",$id_pm_remove);
			$impid_pm = secure_input($impid_pm,"text_input");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_pm_inbox_delete = "DELETE FROM `menu_follow` WHERE id IN ($impid_pm)";
			$execution_pm_inbox_delete = mysqli_query($mysqli,$query_pm_inbox_delete);
			if($execution_pm_inbox_delete){
				echo "
				<div class=\"alert alert-success\">تم حذف العناصر المختارة بنجاح</div>
				";
				}else{
						echo "
						<div class=\"alert alert-danger\">
						يبدو انه يوجد مشكلة في الحذف من فضلك تواصل مع الأدارة
						</div>
						";
					}
			}
	
		
		}
	?>
    
    
		<?php 
		include("include/functions/ftime.php");
		$time_delet_nows = time()-(60*60*24*30);
		$query_chek = "SELECT * FROM `menu_follow` WHERE id_mem = \"$id_member\" and time_follow > \"$time_delet_nows\"";
		$result_query_chek = mysqli_query($mysqli,$query_chek);
		$result_query_chek_num = mysqli_num_rows($result_query_chek);
		
		if($result_query_chek_num > 0){
		?>
        
        <form action="" style="width:50%;" method="post" name="postform" enctype="multipart/form-data">
		<table class="table table-striped">
 		<tbody><tr>
    	<th width="5%">اختيار</th>
    	<th>نوع السيارة</th>
    	<th>في مدينة</th>
		<th>سيتم الحذف بعد</th>
  	    </tr>
        
        <?php while($fatch_sql_qrray_follow = mysqli_fetch_array($result_query_chek)){ ?>
        
        <?php
		$time_delet_orgin = $fatch_sql_qrray_follow[time_follow]+(60*60*24*30);
		$time_delet = timeago($fatch_sql_qrray_follow[time_follow]-(60*60*24*30));
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_keyinformation_print_F = "SELECT * FROM `section` WHERE id = \"$fatch_sql_qrray_follow[ads_tags_F]\" ";
		$result_keyinformation_print_F = mysqli_query($mysqli,$query_keyinformation_print_F);
		$print_value_F = mysqli_fetch_array($result_keyinformation_print_F);
		$title_tag_F = $print_value_F[name];
		
		
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_keyinformation_print_FF = "SELECT * FROM `years` WHERE id = \"$fatch_sql_qrray_follow[ads_tags_FF]\" ";
		$result_keyinformation_print_FF = mysqli_query($mysqli,$query_keyinformation_print_FF);
		$print_value_FF = mysqli_fetch_array($result_keyinformation_print_FF);
		$title_tag_FF = $print_value_FF[text];	
		
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_keyinformation_print_city = "SELECT * FROM `cities` WHERE id = \"$fatch_sql_qrray_follow[ad_city]\" ";
		$result_keyinformation_print_city = mysqli_query($mysqli,$query_keyinformation_print_city);
		$print_value_city = mysqli_fetch_array($result_keyinformation_print_city);
		$ads_city_name = $print_value_city[text];
		
		?>
        
		<tr>
        <td><input type="checkbox" name="id[]" value="<?php echo $fatch_sql_qrray_follow[id]; ?>"></td><td> <a href="
		<?php echo $url_hraj ?>tags/<?php echo $fatch_sql_qrray_follow[ads_tags_F]; ?>/<?php echo $title_tag_F; ?>/<?php echo $fatch_sql_qrray_follow[ads_tags_FF]; ?>" class="tag"><?php echo $title_tag_F; ?> <?php echo $title_tag_FF; ?></a></td>
 <td><?php if(empty($ads_city_name)){echo "كل المدن";}else{ ?><?php echo $ads_city_name; ?><?php } ?></td><td><?php echo str_replace("منذ","",$time_delet);; ?></td></tr>
        
        
        <?php } ?>
        
        
        
        <tr>
      	<td class="row4" colspan="6" align="center">&nbsp;
        <input class="btn btn-danger" type="submit" name="remove" value="إلغاء متابعة الإعلانات من القائمة المختارة"></td></tr>
		</tbody></table>
		</form>
        <?php	
			
			}else{
				?>
                <div class="alert alert-info">لاتوجد أي  ماركة تقوم بمتابعتها.</div>
                <?php
				}
		?>



<?php 
if($_POST['submit']){
	
	 $ads_tags_R = $_POST['ads_tags_R'];
	 $ads_tags_R = secure_input($ads_tags_R,"int");
	 
	 $ads_tags_F = $_POST['ads_tags_F'];
	 $ads_tags_F = secure_input($ads_tags_F,"int");
	 
	 $ads_tags_FF = $_POST['ads_tags_FF'];
	 $ads_tags_FF = secure_input($ads_tags_FF,"int");
	 
	 $time_follow = time();
	 
	 $ad_city = $_POST['ad_city'];
	 $ad_city = secure_input($ad_city,"int");
	 
	if($ads_tags_R === "0" || $ads_tags_F === "0" || $ads_tags_FF === "0"){
		?>
		<div class="alert alert-warning">لم تتم المتابعة. نرجو أختيار نوع السيارة والموديل المحدد الذي تبحث عنه.</div>
        <br>
        <?php
		}else{
		$query_chek = "SELECT * FROM `menu_follow` WHERE ads_tags_R = \"$ads_tags_R\"
		and ads_tags_F = \"$ads_tags_F\" and ads_tags_FF = \"$ads_tags_FF\" and id_mem = \"$id_member\" and time_follow > \"$time_delet_nows\"";
		$result_query_chek = mysqli_query($mysqli,$query_chek);
		$result_query_chek_num = mysqli_num_rows($result_query_chek);
		if($result_query_chek_num > 0){
		?>
        <div class="alert alert-info">السيارة مضافة لقائمة المتابعة</div>
        <?php
		}else{
		$query_inset_follow = "INSERT INTO `menu_follow` (`ads_tags_R`,`ads_tags_F`,`ads_tags_FF`,`id_mem`,`time_follow`,`ad_city`) 
		VALUES (\"$ads_tags_R\",\"$ads_tags_F\",\"$ads_tags_FF\",\"$id_member\",\"$time_follow\",\"$ad_city\")";
		$result_inset_follow = mysqli_query($mysqli,$query_inset_follow);
		if($result_inset_follow){
			?>
            <div class="alert alert-success">تمت المتابعة</div>
            <?php
			}else{
			?>
			<div class="alert alert-danger">يوجد مشكلة في قائمة المتابعة يرجى التواصل مع الأدارة</div>	
			<?php
            }
		
		
			}
			}
			}
?>

<br>

<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","section_follow.php?type=<?php echo "السيارات"; ?>&q="+str,true);
  xmlhttp.send();
}
</script>





<h3 class="green">متابعة سيارة جديدة</h3>



لمتابعة سيارة جديدة ، حدد السيارة من القائمة التالية:
<br>

<form action="" method="post" name="postform" class="form-inline">



<div class="form-group">
<select name="ads_tags_R"  class="form-control " onchange="showUser(this.value)">
  <option value="marka">أختر ماركة السيارة</option>
  <?php
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
$view_query_city = "SELECT * FROM `section` WHERE Contents = \"السيارات\" and type = \"رئيسي\"";
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
$view_execution_city = mysqli_query($mysqli,$view_query_city);
while($array_city = mysqli_fetch_array($view_execution_city)){
?>
<option  <?php if($ads_tags_R === $array_city[id]){?> selected="selected" <?php } ?> value="<?php echo $array_city[id]; ?>
"><?php echo $array_city[name]; ?></option>
<?php

}
?>
</select>
</div>





<div class="form-group">
<div id="txtHint">
	 <select id="model" name="ads_tags_F" class="form-control ">
	 <option value="">أختر نوع السيارة</option>
	 </select>
	  </div>
      </div>
<div class="form-group">
<select name="ads_tags_FF"  class="form-control ">
	 <option value="">كل الموديلات</option>
     <?php
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
						$view_query_city = "SELECT * FROM `years` ORDER BY text";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
						<option value="<?php echo $array_city[id]; ?>
						"><?php echo $array_city[text]; ?></option>
						
						<?php
						
						}
					?>
		</select>
		</div>
<div class="form-group">
	<select name="ad_city" class="searchbutton form-control">
    <option selected="selected" value="">كل المدن</option>
    				<?php
						/// استعدعاء ملف الأتصال بقاعدة البيانات
						include("include/config.php");	

						$id = $_SESSION['id_members'];
						$id_member = secure_input($id,"int");
						$view_query_city = "SELECT * FROM `cities` ORDER BY id";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
						<option value="<?php echo $array_city[id]; ?>"><?php echo $array_city[text]; ?></option>
						
						<?php
						
						}
						?>
   	</select> 
    </div>
<div class="form-group">
<input type="submit" name="submit" value="متابعة  »" style="width: 132px;" class="btn btn-primary"><br>
</div>
</form>




<hr>

<h2>متابعة الاعضاء</h2>
سيتم إشعارك عبر الإشعارات عند وجود إعلان جديد لعضو تقوم بمتابعته.

	<?php
	if($_POST['remove_user']){
	$id_pm_remove = $_POST['id'];
	
	if(empty($id_pm_remove) or $id_pm_remove === 0){
	echo "
	<div class=\"alert alert-danger\">
	للأسف لم تحدد عناصر ليتم حذفها
	</div>
	";
		}else{
			$impid_pm = implode(", ",$id_pm_remove);
			$impid_pm = secure_input($impid_pm,"text_input");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_pm_inbox_delete = "DELETE FROM `follow_member` WHERE id IN ($impid_pm)";
			$execution_pm_inbox_delete = mysqli_query($mysqli,$query_pm_inbox_delete);
			if($execution_pm_inbox_delete){
				echo "
				<div class=\"alert alert-success\">تم حذف العناصر المختارة بنجاح</div>
				";
				}else{
						echo "
						<div class=\"alert alert-danger\">
						يبدو انه يوجد مشكلة في الحذف من فضلك تواصل مع الأدارة
						</div>
						";
					}
			}
	
		
		}
	?>



<?php
$query_mem_s = "SELECT * FROM `follow_member` WHERE id_member_f = \"$id_member\"";
$query_mem_s_re = mysqli_query($mysqli,$query_mem_s);
$query_mem_s_re_num = mysqli_num_rows($query_mem_s_re);



?>
<?php if($query_mem_s_re_num > 0){ ?>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">



	<form action="" method="post" name="postform" enctype="multipart/form-data">
<table class="table  table-striped">
 <tbody><tr>
      <th width="5%">اختيار</th>
      <th>المعلن</th>

   </tr>
   
   <?php 
while($query_mem_s_re_ex = mysqli_fetch_array($query_mem_s_re)){
	
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_login_m_ad = "SELECT * FROM `members` where id = \"$query_mem_s_re_ex[id_follow]\" ";
$result_query_m_ad = mysqli_query($mysqli,$query_login_m_ad);
$Data_member_m_ad = mysqli_fetch_array($result_query_m_ad);
$group_num_m_ad = $Data_member_m_ad[groupnumber];
$username_member_2_m_ad =  $Data_member_m_ad[username];
$email_member_2_m_ad =  $Data_member_m_ad[email];
$subscribe_1_member_2_m_ad =  $Data_member_m_ad[subscribe_1];
$id_user_m_ad =  $Data_member_m_ad[id];
   ?>
<tr><td><input type="checkbox" name="id[]" value="<?php echo $query_mem_s_re_ex[id]; ?>"></td><td> <a href="users/<?php echo $username_member_2_m_ad; ?>" class="username"><?php echo $username_member_2_m_ad; ?></a></td></tr>

<?php } ?>

<tr>
      <td colspan="2" align="center">&nbsp;
        <input class="btn btn-danger" type="submit" name="remove_user" value="إلغاء متابعة الاعضاء من القائمة المختارة"></td></tr>
</tbody></table>
</form>
</div>
</div>
<?php }else{ ?>
<br><br>
<div class="alert alert-info"> لايوجد أي عضو تقوم بمتابعته.</div>
<?php } ?>
    



</div>


</div>
 
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 




 </body></html>