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


<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>القائمة السوداء</h2>
		
<h3 class="green">البحث في القائمة السوداء</h3>

القائمة السوداء هي قائمة بإرقام حسابات وأرقام جوالات من يقومون بإساءة إستخدام الموقع لأغراض ممنوعه مثل الغش أو الأحتيال أو   مخالفة قوانين الموقع
<br>

<?php
	$acc_num = $_POST['acc_num'];
	$acc_num = secure_input($acc_num,"text_input");
	
if($_POST['submit'] and !empty($acc_num)){
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
				
				$view_query_bank_accounts = "SELECT * FROM `black_menu` WHERE text = \"$acc_num\" ORDER BY text";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_bank_accounts = mysqli_query($mysqli,$view_query_bank_accounts);
				$view_num_bank_accounts = mysqli_num_rows($view_execution_bank_accounts);
				if($view_num_bank_accounts > 0){
					?>
                    
                    <div style="color:#F00; font-size:20px;">رقم الحساب او الجوال موجود في القائمة السوداء</div>
                    نرجو منك الأنتباه و الحظر عند التعامل مع هذا العضو
                    
                    <?php
					}else{
						?>
                        <h4>رقم الحساب او الجوال غير موجود في القائمة السوداء</h4>
                        <?php
						}		
				
	
	}
?>

<br>
<form action="" method="post" name="form2"> 
	
<input name="acc_num" size="60" 
placeholder="أدخل رقم الحساب أو رقم الجوال هنا" type="text" class="form-control" style="width:50%">

 <span class="red">* أرقام فقط بدون حروف</span><br><input name="submit" class="btn btn-primary" value="      فحص »    " type="submit">

</form>

<br>


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