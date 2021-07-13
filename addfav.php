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
<title><?php echo $namewebsite; ?></title> 
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="templates/default/css/bootstrap.rtl.min.css" rel="stylesheet" media="screen"> 
<link href="templates/default/css/custom3.css?v=1.4" rel="stylesheet" media="screen">
<link href="templates/default/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="templates/default/css/custom-icon-fonts.css?v=1.1">
<link href="templates/default/fonts/font.css" rel="stylesheet">
<link href="templates/default/css/style.css" rel="stylesheet">
<script async src="templates/default/js/analytics.js"></script>
<script src="templates/default/js/respond.min.js"></script>
<script src="templates/default/js/html5shiv.js" type="text/javascript"></script>
<script src="templates/default/js/respond.proxy.js"></script>
<script src="templates/default/js/jquery-1.10.1.min.js"></script>
<script src="templates/default/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="templates/default/js/cars.js"></script>
<script src="templates/default/js/bootstrap.min.js"></script>
<script type="text/javascript" src="templates/default/js/v5.js"></script>
</head>
<body>
 
 
 
 
<?php
include("header.php"); // استدعاء ملف الهيدر
?>
      
      
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
	
    
    <?php 
	$ads_id = intval($_GET['ads_id']);
	if($_POST['submit']){
	/// استعدعاء ملف الأتصال بقاعدة البيانات
	include("include/config.php");			
	$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_add_bank = "	INSERT INTO `fav` (`id_user`, `id_ads`) VALUES (\"$id_member\", \"$ads_id\")";
	$execution_query_add_bank = mysqli_query($mysqli,$query_add_bank);
			
	if($execution_query_add_bank){
				echo "
				<div class=\"alert alert-success\">
				لقد تم إضافة إلآعلان إلى قائمة الإعلانات المفضلة في صفحتك<br>
				<a href=\"fav.php\">الذهاب إلى قائمة الإعلانات المفضلة</a>
				</div>";
						
	}else{
				echo "<div class=\"alert alert-danger\">يبدو انه يوجد مشكلة في المفضلة تواصل مع الأدارة</div>";
	}	
		
	?>
    
    
    
    <?php 
	}else{
	?>
    
    
    <?php
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_ads = "SELECT * FROM `ads` where id = \"$ads_id\" ";
	$query_ads_ex = mysqli_query($mysqli,$query_ads);
	$query_fetch_array = mysqli_fetch_array($query_ads_ex);
	$query_ads_ex_num_co = mysqli_num_rows($query_ads_ex);
	if($query_ads_ex_num_co > 0){
	

	
	?>
    <table class="table  tableMsg table-borderedAds tableextra">
    <tbody><tr>
      <th colspan="2"><b>مراقبة الإعلان</b></th>
    </tr>
<form action="" method="post" name="postform" enctype="multipart/form-data">



	<tr>
     
      <td class="row1" width="18%"><b class="genmed">رقم الإعلان :</b></td><td class="row2" align="right"> 
	  
	 <?php echo $ads_id; ?>
	  
	 
	 </td>
    </tr>
    <tr>
     
      <td class="row1" width="18%"><b class="genmed">عنوان الاعلان:</b></td><td class="row2" align="right"
      <input name="ads_id" value="<?php echo $ads_id; ?>" type="hidden"><?php echo $query_fetch_array[ads_title]; ?></td>
    </tr>


<tr>
      <td class="row4" colspan="2" align="center">&nbsp;
        <input class="btn btn-success" type="submit" name="submit" value="إضافة إلى قائمة الإعلانات للمفضلة"></td></tr>


</tbody></table>

</form>
<?php 
}else{
?>
<div class="alert alert-info">لقد اتبعت رابط خاطئ</div>
<?php } ?>

<?php  } ?>


</div>
</div><?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 




 </body></html>