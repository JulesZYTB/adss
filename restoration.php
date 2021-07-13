<?php

session_start();
ob_start();
include("include/config_header.php");	
ob_start();
if(isset($_SESSION['id_members'])){header("location:index.php");}
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print = "SELECT * FROM `keyinformation` WHERE id = \"1\" ";
$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
$print_value = mysqli_fetch_array($result_keyinformation_print);
$namewebsite = $print_value[namewebsite];
$namewebsiteen = $print_value[namewebsiteen];
$keywords = $print_value[keywords];
$messagesemail = $print_value[messagesemail];
$description = nl2br($print_value[description]);
$username_mobile = $print_value[username];
$password_mobile = $print_value[password];

// Include SMS Gate settings
//require('ad_wega/mobily.ws/includeSettings.php');
//require('ad_wega/mobily.ws/send.php');

?>

<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
</head>
<body>
 
<?php
include("header.php"); // استدعاء ملف الهيدر
?>     
      
<div class="row" id="wrapper">
<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2" style="width:60%;">

<?php
if($_POST['submit'])
{

$email = $_POST['email'];
//$email = intval($email);

/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
mysqli_query($mysqli,"SET NAMES 'utf8'");			
$query_forget_pass = "SELECT * FROM `members` WHERE email ='$email'";
$result_query_pass = mysqli_query($mysqli,$query_forget_pass);
$num_query_pass = mysqli_num_rows($result_query_pass);

if($num_query_pass > 0)
{
	$fetch_pass = mysqli_fetch_array($result_query_pass);
	$username_pass_member = $fetch_pass[username];
	$password_pass_member = $fetch_pass[password_orignal];
	$email_pass_member = $fetch_pass[email];
	$groupnumber_forget1 = $fetch_pass[groupnumber];
	$Activation_code = $fetch_pass[member_code];
	$email = $fetch_pass['email'];
	$to = $email_pass_member; 
	if($groupnumber_forget1 === "0")
	{		
		$url_website =  $url_hraj;
	//	echo "<div class=\"alert alert-info\">تم إرسال معلومات تسجيل الدخول الى بريدك الالكتروني </div>";
	//}
	//else
	//{
		$message = "ال السري الخاص بك فى {$namewebsite} هو: \r\n {$password_pass_member}";
		//$send = fastSendSMS( $message, $email );
		 $headers = "From: Business Hamad <businesshamad.sa>";
			mail($email,'restoration Password',$message,$headers);
	
		echo "<div class=\"alert alert-info\">تم إرسال معلومات تسجيل الدخول الى بريدك الالكتروني </div>";
	}


}
else
{
	echo "<div class=\"alert alert-danger\"> الجوال خاطئ !</div>";
}
}
else
{
?>

<h3>إستعادة أسم المستخدم وكلمة المرور</h3>
<hr>
<form action="" method="post">
	<div class="form-group ">    
		<input type="email" name="email" placeholder="قم بادخال  بريدك الالكتروني" class="form-control" required="">
	</div>
	<button name="submit" class="form-control btn btn-large btn-success" type="submit" value="الحصول على ال السري">الحصول على ال السري</button>
</form>
            
<br>

<?php
}
?>

</div>
</div>

<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>

</body>
</html>