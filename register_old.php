<?php

session_start();
ob_start();
include("include/config_header.php");	
include("include/config_header.php");	
if(isset($_SESSION['id_members'])){header("location:index.php");}

/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");

// Include SMS Gate settings
require('admin/mobily.ws/includeSettings.php');
require('admin/mobily.ws/send.php');

mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print = "SELECT * FROM `keyinformation` WHERE id = \"1\" ";
$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
$print_value = mysqli_fetch_array($result_keyinformation_print);
$namewebsite = $print_value[namewebsite];
$keywords = $print_value[keywords];
$namewebsiteen = $print_value[namewebsiteen];
$description = nl2br($print_value[description]);

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
		}else{

			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$time_now = time();
			$Activation_code = mt_rand(100000, 999999);
			$query_new_member = "INSERT INTO `members` (groupnumber,phone,timeregister,member_code,username,password,password_orignal) VALUES (\"0\",\"$phone\",\"$time_now\",\"$Activation_code\",\"$username\",\"$password\",\"$password_orignal\")";	
			$result_new_member = mysqli_query($mysqli,$query_new_member);	
			$_SESSION['phone'] = $phone;
			$_SESSION['username'] = $username;
			$_SESSION['Activation_code'] = $Activation_code;
			$msg = 'كود التفعيل هو' .$Activation_code;
			$fastSendSMS = fastSendSMS( $msg  , $phone);
			
				header("Location: https://businesshamad.sa/register.php?register=1"); 	
	
		 }
}
?>	

<?php
if($_POST['submit2']){

	 $phone  = intval( $_POST['phone'] );
	 $Activation_code  = intval( $_POST['Activation_code'] );
	 $active_code  = intval( $_POST['active_code'] );
	if($Activation_code == $active_code){
			if ($_POST['password']!= $_POST['password2']){
				echo "<div class=\"alert alert-danger\">كلمه المرورو غير متاطبقين</div>";
			}else{
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_new_member = "UPDATE `members` SET groupnumber = '0', active = '1' WHERE phone = $phone";
				$result_new_member = mysqli_query($mysqli,$query_new_member);
				if($result_new_member){	
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;				
					echo "<div class=\"alert alert-info\">تم تسجيلك بنجاح >br /> يمكنك الان استخدام الموقع</div>";
					header("Location: https://businesshamad.sa/register.php?done=1"); 
				}else{
					echo "<div class=\"alert alert-danger\">هنا خطا من فضلك راسل الاداره</div>";
				}	
			}	
	}else{
		echo "<div class=\"alert alert-danger\">كود التفعيل غير صحيح</div>";
	}				
}
if($_GET['sendageain']) {
	  $phone = $_SESSION['phone'];
	  $Activation_code = $_SESSION['Activation_code'];
	  $msg = 'كود التفعيل هو' .$Activation_code;
	  $fastSendSMS = fastSendSMS( $msg  , $phone);	
}

if($_GET['done']) {
	$user = $_SESSION['username'];
	$pass = $_SESSION['password'];
	$query_login = "SELECT * FROM `members` where 
	`username` = \"$user\" and `password` = \"$pass\"  ";
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$result_query = mysqli_query($mysqli,$query_login);
	$num_result = mysqli_num_rows($result_query);
	$Data_member = mysqli_fetch_array($result_query);
	$cookie_value_username = $Data_member[username];
	$cookie_value_password = $Data_member[password];
	$cookie_value_active = $Data_member[active];
	setcookie($cookie_name_username, $cookie_value_username, time() + (86400 * 30 * 12 * 10), "/"); // 86400 = 1 day	
	setcookie($cookie_name_password, $cookie_value_password, time() + (86400 * 30 * 12 * 10), "/"); // 86400 = 1 day	
	$_SESSION['id_members']=$Data_member[id];		
	echo "<META http-equiv=\"refresh\" content=\"2;URL=index.php\">";	
?>
	<div class="alert alert-success">
		تم اتكمال التسجيل بنجاح <br /> 
		يمكنك استخدام الموقع <br /> 
		وجارى تحويلك الان 
	</div>
<?php
}elseif($_GET['register']) {
?>
<?php
	$Activation_code = $_SESSION['Activation_code'];
	$phone = $_SESSION['phone'];
	$msg = 'كود التفعيل هو' .$Activation_code;
	$fastSendSMS = fastSendSMS( $msg  , $phone);
?>
	<div class="alert alert-info">لقد أرسلنا كود التفعيل إلى جوالك.<br>
	اضغط <a href="register.php?register=1&sendageain=1"> هنا </a> لارسال كود التفعيل مره اخرى</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-4">
			<form method="post" action="">
				<div class="form-group">
				<input type="hidden" name="phone" value="<?=$_SESSION['phone']?>">
				<input type="hidden" name="Activation_code" value="<?=$_SESSION['Activation_code']?>">
					<label>كود التفعيل</label>
					<input type="text" name="active_code" class="form-control" required>
				</div>
							
				<button name="submit2" class="form-control btn btn-large btn-primary" type="submit" value="تسجيل">تسجيل</button>
				<br>
				<br>
			</form>
		</div>
	</div>
<?php
}else{	
?>
	<hr>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-4">
			<form method="post" action="">
				<div class="form-group">
					<label>رقم الجوال</label>
					<input type="text" name="phone" maxlength="50" placeholder="من فضلك ادخل رقم جوال صحيح مثال: 966000000000" class="form-control" required>
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

<a href="registerbyemail.php">التسجيل عبر البريد الالكتروني</a>
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