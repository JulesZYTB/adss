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
<title>المفضلة - <?php echo $namewebsite; ?></title> 
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
<div class="col-xs-12  col-sm-8 col-md-9 col-lg-9 " id="secondDiv">

<div class="main-col">
	<h3>الإعلانات المفضلة </h3>
    
    	<?php
	if($_POST['remove']){
	$id_pm_remove = $_POST['ads'];
	
	if(empty($id_pm_remove) or $id_pm_remove === 0){
	echo "
	<div class=\"alert alert-danger\">
	لم تقم بتحديد اعلانات ليتم حذفها من قائمة المفضلة لديك
	</div>
	";
		}else{
			$impid_pm = implode(", ",$id_pm_remove);
			$impid_pm = secure_input($impid_pm,"text_input");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_pm_inbox_delete = "DELETE FROM `fav` WHERE id IN ($impid_pm)";
			$execution_pm_inbox_delete = mysqli_query($mysqli,$query_pm_inbox_delete);
			if($execution_pm_inbox_delete){

				}else{
						echo "
						<div class=\"alert alert-danger\">
						يوجد مشكلة في حذف الأعلانات من قائمة المفضلة من فضلك تواصل مع الأدارة
						</div>
						";
					}
			}
	
		
		}
	?>
    
	
        <?php
		include("include/functions/ftime.php");
	/// استعدعاء ملف الأتصال بقاعدة البيانات
	include("include/config.php");			
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_ads = "SELECT * FROM `fav` WHERE id_user = \"$id_member\" ";
	$query_ads_ex = mysqli_query($mysqli,$query_ads);
	$query_ads_ex_num_co = mysqli_num_rows($query_ads_ex);
	if($query_ads_ex_num_co > 0){
		 ?>
 
<form action="" method="post" name="postform" enctype="multipart/form-data">
<table class="table tableAds table-borderedAds">
	    <tbody><tr>
		 <th>#</th>
		      <th>العروض</th>
		      <th>المدينة</th>
		 	  <th>المعلن</th>
		      <th>قبل</th>
	    </tr>
        
		<?php
		while($query_fetch_array = mysqli_fetch_array($query_ads_ex)){
		$id_ads = $query_fetch_array[id_ads];
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		
		$query_ads_s = "SELECT * FROM `ads` where id = \"$id_ads\" ";
		$query_ads_ex_s = mysqli_query($mysqli,$query_ads_s);
		$query_fetch_array_s = mysqli_fetch_array($query_ads_ex_s);
		$title_ads = $query_fetch_array_s[ads_title];
		$image_link = $query_fetch_array_s[image_link];
		$His_announcement = $query_fetch_array_s[His_announcement];
		$ads_city = $query_fetch_array_s[ads_city];
		$Time_added = timeago($query_fetch_array_s[Time_added]);
		
		
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_login_m_ad = "SELECT * FROM `members` where id = \"$His_announcement\" ";
$result_query_m_ad = mysqli_query($mysqli,$query_login_m_ad);
$Data_member_m_ad = mysqli_fetch_array($result_query_m_ad);
$group_num_m_ad = $Data_member_m_ad[groupnumber];
$username_member_2_m_ad =  $Data_member_m_ad[username];
$id_user_m_ad =  $Data_member_m_ad[id];


/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print_city = "SELECT * FROM `cities` WHERE id = \"$ads_city\" ";
$result_keyinformation_print_city = mysqli_query($mysqli,$query_keyinformation_print_city);
$print_value_city = mysqli_fetch_array($result_keyinformation_print_city);
$ads_city_name = $print_value_city[text];
$ads_city_id = $print_value_city[id];

				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
				$view_query_ads = "SELECT * FROM `comments` WHERE id_ads = \"$id_ads\"";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_ads = mysqli_query($mysqli,$view_query_ads);
				$num_ex_ads_query = mysqli_num_rows($view_execution_ads);
		
		?>
        
<tr><td><input type="checkbox" name="ads[]" value="<?php echo $query_fetch_array[id]; ?>">
 <?php echo $query_fetch_array[id_ads]; ?></td>
<td><a href="ads/<?php echo $id_ads; ?>/<?php echo $title_ads; ?>/"><?php echo $title_ads; ?>  
<?php if(empty($image_link)){}else{ ?>
&nbsp;&nbsp;&nbsp;
<i class="fa fa-camera-retro"></i>
<?php } ?>

</a> <?php if($num_ex_ads_query > 0){ ?> &nbsp;<?php echo $num_ex_ads_query; ?> ردود <?php } ?></td>

<td><a href="city/<?php echo $ads_city_id; ?>/<?php echo $ads_city_name; ?>" class=""><?php echo $ads_city_name; ?></a></td>

<td> <a href="users/<?php echo $username_member_2_m_ad; ?>" class=""><?php echo $username_member_2_m_ad; ?></a> </td>

<td><?php echo $Time_added; ?></td></tr>

	<?php 
	}
	?>

<td colspan="6" align="center">&nbsp;
<input class="btn  btn-danger" type="submit" name="remove" value="حذف الإعلانات المختارة من القائمة"></td></tr>
</tbody></table>

</form>
<?php 
}else{
?>
<div class="alert alert-info">لا توجد اعلانات في قائمة المفضلة</div>
<?php } ?>
</div>
</div>
</div><?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 




 </body></html>