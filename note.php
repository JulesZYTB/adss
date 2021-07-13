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
<title>الإشعارات - <?php echo $namewebsite; ?></title> 
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
	

<h2>مركز الإشعارات</h2>
<div class="note">





<?php 
	include("include/functions/ftime.php");
	$time_yasterday = time() - 86400;
	$time_yasterday_two = time() - 172800;
?>
	<?php
	$query_select_note = "SELECT * FROM `note_hraj` WHERE id_mem = \"$id_member\" and time_note > \"$time_yasterday\"  order by id DESC";
	$result_query_note = mysqli_query($mysqli,$query_select_note);
	$note_print_num = mysqli_num_rows($result_query_note);
	if($note_print_num > 0){
	$num_rows_note_1 = 1;
	?>
    <!-- today -->
    <h3>إشعارات اليوم</h3>
	<ul>
    <?php
	while($note_print = mysqli_fetch_array($result_query_note)){
	$id_note = $note_print[id_note];
	$type_note = $note_print[type];
	$un_read = $note_print[un_read]; 
	
	
	/// عندما يكون اعلان
	if($type_note === "1"){
	$query_keyinformation_print = "SELECT * FROM `ads` WHERE id = \"$id_note\" ";
	$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
	$print_value = mysqli_fetch_array($result_keyinformation_print);
	$print_value_num_row = mysqli_num_rows($result_keyinformation_print);
	$ads_title = $print_value[ads_title];
	$Time_added = timeago($print_value[Time_added]);
		?>
     <li><?php if($un_read === "1"){echo "<span>";} ?>يوجد إعلان جديد بعنوان:  <a href="<?php echo $url_hraj; ?>ads/<?php echo $id_note; ?>" class="note_follow_tag"><?php echo $ads_title; ?></a>
	 <?php echo $Time_added; ?><br><?php if($un_read === "1"){echo "</span>";} ?></li>
        <?php
		}
	/// عندما يكون اعلان
	
	
	
	/// عندما يكون رد /// 2
	if($type_note === "2"){
	/// استعدعاء ملف الأتصال بقاعدة البيانات
	include("include/config.php");
	$view_query_ads = "SELECT * FROM `comments` WHERE id = \"$id_note\"";
	$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
	$mysqli_query_co = mysqli_query($mysqli,$view_query_ads);
	$fetch_array_view_co = mysqli_fetch_array($mysqli_query_co);
	$id_His_response = $fetch_array_view_co[id_His_response];
	$id_ads = $fetch_array_view_co[id_ads];
	$Time_added = timeago($fetch_array_view_co[Time_added_co]);
	
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_login_m_ad02 = "SELECT * FROM `members` where id = \"$id_His_response\" ";
	$result_query_m_ad02 = mysqli_query($mysqli,$query_login_m_ad02);
	$Data_member_m_ad02 = mysqli_fetch_array($result_query_m_ad02);
	$username_member_2_m_ad02 =  $Data_member_m_ad02[username];
		
	$query_keyinformation_print = "SELECT * FROM `ads` WHERE id = \"$id_ads\" ";
	$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
	$print_value = mysqli_fetch_array($result_keyinformation_print);
	$print_value_num_row = mysqli_num_rows($result_keyinformation_print);
	$ads_title = $print_value[ads_title];
	
		?>
        <li><?php if($un_read === "1"){echo "<span>";} ?>يوجد رد جديد على الإعلان:  <a href="<?php $url_hraj; ?>ads/<?php echo $id_ads; ?>" class="note_replay"><?php echo $ads_title; ?></a>بواسطة <a href="<?php echo $url_hraj; ?>users/<?php echo $username_member_2_m_ad02; ?>" class="username"><?php echo $username_member_2_m_ad02; ?></a> <?php echo $Time_added; ?><?php if($un_read === "1"){echo "</span>";} ?></li>
        <?php
		}
	/// عندما يكون رد /// 2



	}
	?>
    </ul>
	<!-- //today -->
    <?php
	}
?>


	<?php
	$query_select_note = "SELECT * FROM `note_hraj` WHERE id_mem = \"$id_member\" and time_note < \"$time_yasterday\" and time_note > \"$time_yasterday_two\"   	order by id DESC";
	$result_query_note = mysqli_query($mysqli,$query_select_note);
	$note_print_num = mysqli_num_rows($result_query_note);
	if($note_print_num > 0){
	$num_rows_note_2 = 1;
	?>
    <!-- yestrday -->
    <h3>إشعارات الأمس</h3>
	<ul>
    <?php
	while($note_print = mysqli_fetch_array($result_query_note)){
	$id_note = $note_print[id_note];
	$type_note = $note_print[type];
	$un_read = $note_print[un_read]; 
	
	
	/// عندما يكون اعلان
	if($type_note === "1"){
	$query_keyinformation_print = "SELECT * FROM `ads` WHERE id = \"$id_note\" ";
	$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
	$print_value = mysqli_fetch_array($result_keyinformation_print);
	$print_value_num_row = mysqli_num_rows($result_keyinformation_print);
	$ads_title = $print_value[ads_title];
	$Time_added = timeago($print_value[Time_added]);
		?>
     <li><?php if($un_read === "1"){echo "<span>";} ?>يوجد إعلان جديد بعنوان:  <a href="<?php echo $url_hraj; ?>ads/<?php echo $id_note; ?>" class="note_follow_tag"><?php echo $ads_title; ?></a>
	 <?php echo $Time_added; ?><br><?php if($un_read === "1"){echo "</span>";} ?></li>
        <?php
		}
	/// عندما يكون اعلان
	
	
	
	/// عندما يكون رد /// 2
	if($type_note === "2"){
	/// استعدعاء ملف الأتصال بقاعدة البيانات
	include("include/config.php");
	$view_query_ads = "SELECT * FROM `comments` WHERE id = \"$id_note\"";
	$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
	$mysqli_query_co = mysqli_query($mysqli,$view_query_ads);
	$fetch_array_view_co = mysqli_fetch_array($mysqli_query_co);
	$id_His_response = $fetch_array_view_co[id_His_response];
	$id_ads = $fetch_array_view_co[id_ads];
	$Time_added = timeago($fetch_array_view_co[Time_added_co]);
	
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_login_m_ad02 = "SELECT * FROM `members` where id = \"$id_His_response\" ";
	$result_query_m_ad02 = mysqli_query($mysqli,$query_login_m_ad02);
	$Data_member_m_ad02 = mysqli_fetch_array($result_query_m_ad02);
	$username_member_2_m_ad02 =  $Data_member_m_ad02[username];
		
	$query_keyinformation_print = "SELECT * FROM `ads` WHERE id = \"$id_ads\" ";
	$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
	$print_value = mysqli_fetch_array($result_keyinformation_print);
	$print_value_num_row = mysqli_num_rows($result_keyinformation_print);
	$ads_title = $print_value[ads_title];
		?>
        <li><?php if($un_read === "1"){echo "<span>";} ?>يوجد رد جديد على الإعلان:  <a href="<?php $url_hraj; ?>ads/<?php echo $id_ads; ?>" class="note_replay"><?php echo $ads_title; ?></a>بواسطة <a href="<?php echo $url_hraj; ?>users/<?php echo $username_member_2_m_ad02; ?>" class="username"><?php echo $username_member_2_m_ad02; ?></a> <?php echo $Time_added; ?><?php if($un_read === "1"){echo "</span>";} ?></li>
        <?php
		}
	/// عندما يكون رد /// 2



	}
	?>
    </ul>
	<!-- //yestrday -->
    <?php
	}
?>





	<?php
	$query_select_note = "SELECT * FROM `note_hraj` WHERE id_mem = \"$id_member\" and time_note < \"$time_yasterday\" and time_note < \"$time_yasterday_two\"   	order by id DESC LIMIT 60";
	$result_query_note = mysqli_query($mysqli,$query_select_note);
	$note_print_num = mysqli_num_rows($result_query_note);
	if($note_print_num > 0){
	$num_rows_note_3 = 1;
	?>
	<!-- older -->
	<h3>إشعارات أقدم</h3>
	<ul>
    <?php
	while($note_print = mysqli_fetch_array($result_query_note)){
	$id_note = $note_print[id_note];
	$type_note = $note_print[type];
	$un_read = $note_print[un_read]; 
	
	
	/// عندما يكون اعلان
	if($type_note === "1"){
	$query_keyinformation_print = "SELECT * FROM `ads` WHERE id = \"$id_note\" ";
	$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
	$print_value = mysqli_fetch_array($result_keyinformation_print);
	$print_value_num_row = mysqli_num_rows($result_keyinformation_print);
	$ads_title = $print_value[ads_title];
	$Time_added = timeago($print_value[Time_added]);
		?>
     <li><?php if($un_read === "1"){echo "<span>";} ?>يوجد إعلان جديد بعنوان:  <a href="<?php echo $url_hraj; ?>ads/<?php echo $id_note; ?>" class="note_follow_tag"><?php echo $ads_title; ?></a>
	 <?php echo $Time_added; ?><br><?php if($un_read === "1"){echo "</span>";} ?></li>
        <?php
		}
	/// عندما يكون اعلان
	
	
	
	/// عندما يكون رد /// 2
	if($type_note === "2"){
	/// استعدعاء ملف الأتصال بقاعدة البيانات
	include("include/config.php");
	$view_query_ads = "SELECT * FROM `comments` WHERE id = \"$id_note\"";
	$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
	$mysqli_query_co = mysqli_query($mysqli,$view_query_ads);
	$fetch_array_view_co = mysqli_fetch_array($mysqli_query_co);
	$id_His_response = $fetch_array_view_co[id_His_response];
	$id_ads = $fetch_array_view_co[id_ads];
	$Time_added = timeago($fetch_array_view_co[Time_added_co]);
	
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_login_m_ad02 = "SELECT * FROM `members` where id = \"$id_His_response\" ";
	$result_query_m_ad02 = mysqli_query($mysqli,$query_login_m_ad02);
	$Data_member_m_ad02 = mysqli_fetch_array($result_query_m_ad02);
	$username_member_2_m_ad02 =  $Data_member_m_ad02[username];
		
	$query_keyinformation_print = "SELECT * FROM `ads` WHERE id = \"$id_ads\" ";
	$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
	$print_value = mysqli_fetch_array($result_keyinformation_print);
	$print_value_num_row = mysqli_num_rows($result_keyinformation_print);
	$ads_title = $print_value[ads_title];
		?>
        <li><?php if($un_read === "1"){echo "<span>";} ?>يوجد رد جديد على الإعلان:  <a href="<?php $url_hraj; ?>ads/<?php echo $id_ads; ?>" class="note_replay"><?php echo $ads_title; ?></a>بواسطة <a href="<?php echo $url_hraj; ?>users/<?php echo $username_member_2_m_ad02; ?>" class="username"><?php echo $username_member_2_m_ad02; ?></a> <?php echo $Time_added; ?><?php if($un_read === "1"){echo "</span>";} ?></li>
        <?php
		}
	/// عندما يكون رد /// 2



	}
	?>
    </ul>
	<!-- //older -->
    <?php
	}
?>



<?php
			/// استعدعاء ملف الأتصال بقاعدة البيانات
			include("include/config.php");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_add_bank = "	UPDATE `note_hraj` set un_read = \"1\"  where id_mem = \"$id_member\" ";
			$execution_query_add_bank = mysqli_query($mysqli,$query_add_bank);
?>


<?php
$num_rows_note = $num_rows_note_1 + $num_rows_note_2 + $num_rows_note_3;
if($num_rows_note > 0){
?>

<form action="" method="post" name="form2">
<input name="login" value="حذف جميع الإشعارات  »" type="submit" class="btn btn-primary">
</form>

<?php 
if($_POST['login']){
	$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_delet_bank = "DELETE FROM `note_hraj` WHERE id_mem = \"$id_member\"";
	$execution_query_delet_bank = mysqli_query($mysqli,$query_delet_bank);
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">";
	}
?>

<?php 
}else{
?>
<div class="alert alert-info">لاتوجد إشعارات</div>
<?php } ?>
</div>

</div>
</div>

<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 




 </body></html>