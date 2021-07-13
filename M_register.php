<?php

session_start();
ob_start();
//include("include/config_header.php");	
//include("include/config_header.php");	
if(isset($_SESSION['id_members'])){header("location:index.php");}

/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");

// Include SMS Gate settings
require('adminhamad/mobily.ws/includeSettings.php');
require('adminhamad/mobily.ws/send.php');
require('adminhamad/SendYamSMS.php');

mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print = "SELECT * FROM `keyinformation` WHERE id = \"1\" ";
$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
$print_value = mysqli_fetch_array($result_keyinformation_print);
$namewebsite = $print_value[namewebsite];
$keywords = $print_value[keywords];
$namewebsiteen = $print_value[namewebsiteen];
$description = nl2br($print_value[description]);

$mailjetApiKey = '829396f430489effef4adadb99917ee5';
$mailjetApiSecret = '0cb589497fd46af39b035c1ca9f4b576';

?>

<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $namewebsite; ?></title> 
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?=$url_hraj?>templates/default/css/bootstrap.rtl.min.css" rel="stylesheet" media="screen"> 
<link href="<?=$url_hraj?>templates/default/css/custom3.css?v=1.4" rel="stylesheet" media="screen">
<link href="<?=$url_hraj?>templates/default/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?=$url_hraj?>templates/default/css/custom-icon-fonts.css?v=1.1">
<link href="<?=$url_hraj?>templates/default/fonts/font.css" rel="stylesheet">
<link href="<?=$url_hraj?>templates/default/css/style.css" rel="stylesheet">
<script async src="<?=$url_hraj?>templates/default/js/analytics.js"></script>
<script src="<?=$url_hraj?>templates/default/js/respond.min.js"></script>
<script src="<?=$url_hraj?>templates/default/js/html5shiv.js" type="text/javascript"></script>
<script src="<?=$url_hraj?>templates/default/js/respond.proxy.js"></script>
<script src="<?=$url_hraj?>templates/default/js/jquery-1.10.1.min.js"></script>
<script src="<?=$url_hraj?>templates/default/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?=$url_hraj?>templates/default/js/cars.js"></script>
<script src="<?=$url_hraj?>templates/default/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$url_hraj?>templates/default/js/v5.js"></script>
</head>
<body>
 
<?php
include("header.php"); // استدعاء ملف الهيدر
?>     
      
<div class="container" id="wrapper">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h2>التسجيل بالموقع</h2>
<hr>

<?php


if($_POST['submit']){

		$number = $_POST['phone'];
        if(strlen($number) == 10 && substr($number, '05')){
            $phone =  preg_replace('/^0/', '966', $number);
        }elseif (substr($number, '00')){
            $phone =  preg_replace('/^00/', '', $number);           
        }elseif (substr($number, '+')){
            $phone =  preg_replace('/^+/', '', $number);         
        }
			 $username = $_POST['username'];
			 $password  = md5($_POST['password']);
			 $password2  = md5($_POST['password2']);
			 $password_orignal = $_POST['password'];

		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_search_phone = "SELECT * FROM `members` where phone = \"$phone\" ";
		$result_query = mysqli_query($mysqli,$query_search_phone);
		$search_num = mysqli_num_rows($result_query);
		$inf_members = mysqli_fetch_array($result_query);
		$usernamee = $inf_members[username];
		$inf_phone = $inf_members[phone];
		$groupnumber = $inf_members[groupnumber];
		if($search_num > 0){
				echo "<div class=\"alert alert-info\">عفوا هذا الرقم مسجل لدينا من قبل</div>";
        }
        else{ 
            mysqli_query($mysqli,"SET NAMES 'utf8'");
            $time_now = time();
            $query_new_member = "INSERT INTO `members` (`id`, `username`, `password`, `password_orignal`, `groupnumber`, `phone`, `timeregister`, `active`, `documentingmobile`, `Documentingemail`) VALUES (NULL, '$username', '$password', '$password_orignal', '10', '$phone', '$time_now', 1, 1, 1);";
            $result_new_member = mysqli_query($mysqli,$query_new_member);	             	
            $_SESSION['phone'] = $phone;
            $_SESSION['username'] = $username;
            $_SESSION['passwordL'] = $password_orignal;

			header("Location: https://tadawl.com.sa/register.php?register=1"); 
		}
}
?>

<?php
if($_GET['register']) { 
    $user = $_SESSION['username'];
    $pass = $_SESSION['passwordL'];
    $phone = $_SESSION['phone'];
    
    $msg = nl2br("نرحب بك في  ".$namewebsite." .\nاسم المستخدم الخاص بك هو: \n".$user."\nالرمز السري الخاص بك هو: \n".$pass."\n تحياتي.");
			 
	$headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: تداول العقاري <info@tadawl.com.sa>";
			 
	mail($email,'معلومات تسجيل الدخول',$msg,$headers);	
?>
<div class="alert alert-info">لقد أرسلنا رسالة الترحيب إلى البريد الالكتروني الخاص بك متضمنة اسم المستخدم والرمز السري. نرجوا التاكد من البريد الغير هام<br>
<a href="login.php">  اضغط هنا </a> لتسجيل الدخول للموقع </div>


<?php

}else{	
?>
	<hr>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-4">
			<form method="post" action="">
				<div class="form-group">
					<label>البريد الالكتروني </label>
					<input type="text" name="email" maxlength="50" placeholder="من فضلك ادخل البريد الالكتروني الخاص بك" class="form-control" required>
				</div>
				<div class="form-group">
					<label>رقم الجوال </label>
					<input type="text" name="phone" maxlength="50" placeholder="من فضلك ادخل رقم الجوال الخاص بك" class="form-control" required>
				</div>
				<div class="form-group">
					<label>اسم المستخدم</label>
					<input type="text" name="username" class="form-control" required>
				</div>
				<div class="form-group">
					<label>كلمه المرور </label>
					<input type="password" name="password" class="form-control" required>
				</div>	
				<div class="form-group">
					<label>اعادة كلمه المرور </label>
					<input type="password" name="password2" class="form-control" required>
				</div>				
				<button name="submit" class="form-control btn btn-large btn-primary" type="submit" value="تسجيل">تسجيل</button>
				<br>
				<br>
</form>

			  <br>
			 <br>
</div>
</div>



<br>
<br>
<br>



<?php
}
?>

	
</div>
<div style="clear:both;"></div>
</div>

<?php
include("footer.php"); // ادراج الفوتر
?>

</body>
</html>