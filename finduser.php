<?php
session_start();
ob_start();
include("include/config_header.php");	
ob_start();
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
 $url_tags = $_SERVER['REQUEST_URI'];


?>

<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
	$key = intval($_GET['key']);
	$query_search_num_ads = "SELECT * FROM `ads` WHERE id = \"$key\"";
	$query_search_num_ads_mysql = mysqli_query($mysqli,$query_search_num_ads);
	$query_search_num_ads_mysql_num = mysqli_num_rows($query_search_num_ads_mysql);
	$url_ads_he = $url_hraj."ads/$key";
	if(intval($key) and $query_search_num_ads_mysql_num > 0){header("location:$url_ads_he");}else{
	?>
<title><?php echo $namewebsite; ?></title> 
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

<?php

	
	$city = $_GET['city'];
	$city = secure_input($city,"int");
	
	$duringdate = $_GET['duringdate'];
	$duringdate = secure_input($duringdate,"text_input");
	
	$type_ads_other_final  = $_GET['type_ads_other_final'];
	$type_ads_other_final = secure_input($type_ads_other_final,"text_input");
	
	$image  = $_GET['image'];
	$image = secure_input($image,"text_input");
	
	$ads_tags_R = $_GET['ads_tags_R'];
	$ads_tags_R = secure_input($ads_tags_R,"int");
	
	$ads_tags_F = $_GET['ads_tags_F'];
	$ads_tags_F = secure_input($ads_tags_F,"int");
	
	$ads_tags_FF = $_GET['ads_tags_FF'];
	$ads_tags_FF = secure_input($ads_tags_FF,"int");
	
	
	
	
?>

 <div class="row">

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


<div class="comment">

<div class="comment">
	
	
		<form action="finduser.php" method="get" name="user_form" class="form-inline">
	
	<legend>بحث عن عضو</legend>
	
	 <div class="form-group">

	<input type="search" name="user" class="form-control" placeholder="ادخل اسم العضو">
</div>
<button type="submit" name="user_submit" class=" btn  btn-success"><i class="fa fa-search"></i></button> 



	</form>
    
    <br>
    <?php 
$username = $_GET['user'];
$username = secure_input($username,"text_input");
if(empty($username)){}else{
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_login = "SELECT * FROM `members` where username LIKE \"%$username%\" ";
$result_query = mysqli_query($mysqli,$query_login);
$number_of_members = mysqli_num_rows($result_query);
if($number_of_members > 0 and strlen($username) >= 6){
	?>
    
    <table class="table  tableMsg table-borderedAds " style="width:200px;">

   <tbody>
   <?php while($Data_member = mysqli_fetch_array($result_query)){ 
   $username_member_2 =  $Data_member[username];
   ?>
   
<tr class="row1"><td align="center"><a href="<?php echo $url_hraj; ?>users/<?PHP echo $username_member_2; ?>" class="username"><?PHP echo $username_member_2; ?></a>  </td></tr>
	<?php 
    }
	}else{
		echo "لاتوجد عضويه بهذا الإسم، يرجى التأكد من مسمى العضوية";
		}
		}
    ?>

</tbody></table>
</div>




</div>
</div>

   
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 

<?php
}
?>


 </body></html>