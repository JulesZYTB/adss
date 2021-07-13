<?php
session_start();
ob_start();
include("include/config_header.php");	
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
if(isset($_SESSION['id_members'])){header("location:index.php");}
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print = "SELECT * FROM `keyinformation` WHERE id = \"1\" ";
$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
$print_value = mysqli_fetch_array($result_keyinformation_print);
$namewebsite = $print_value[namewebsite];
$keywords = $print_value[keywords];
$namewebsiteen = $print_value[namewebsiteen];
$description = nl2br($print_value[description]);

include_once("twitter/config.php");
include_once("twitter/inc/twitteroauth.php");
if(isset($_SESSION['status']) && $_SESSION['status'] == 'verified') 
	{
		//Retrive variables
		$screen_name 		= $_SESSION['request_vars']['screen_name'];
		$twitter_id			= $_SESSION['request_vars']['user_id'];
				mysqli_query($mysqli,"SET NAMES 'utf8'");
		 $query_keyinformation_print = "SELECT * FROM `members` WHERE username = '$screen_name' and oauth_uid ='$twitter_id'";
		$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
		$print_value = mysqli_fetch_array($result_keyinformation_print);
		$id = $print_value[id];

		$_SESSION['id_members']=$id;
		
		
		echo "<META http-equiv=\"refresh\" content=\"0;URL=index.php\">";
		
	}
?>

<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>تسجيل الدخول</title> 
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
    
<div class="container">

<?php

$user_or = $_POST['user'];
$user = secure_input($user_or,"text_input");

$pass_or = $_POST['pass'];
$pass = secure_input("$pass_or","md5_pass");

if($_POST['login'])
{
	if(empty($user) || empty($pass_or))
	{
		echo "
		<div class=\"alert alert-danger\" style=\"width:80%; margin: 0 auto;\">
		من فضلك ادخل اسم المستخدم و كلمة المرور .
		</div>
		";
	}
	else
	{
		/// استعدعاء ملف الأتصال بقاعدة البيانات
		include("include/config.php");

		// Phone loggin
		$number = $_POST['user'];
        if(strlen($number) == 10 && substr($number, '05')){
             $phone =  preg_replace('/^0/', '966', $number);
        }elseif (substr($number, '00')){
             $phone =  preg_replace('/^00/', '', $number);           
        }elseif (substr($number, '+')){
             $phone =  preg_replace('/^+/', '', $number);         
        }		

		$sql = "SELECT * FROM members WHERE phone LIKE '%$phone' AND password = '{$pass}' AND groupnumber != 0";
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$result_query = mysqli_query($mysqli,$sql);
		$num_result = mysqli_num_rows($result_query);
		

		if( $num_result > 0 )
		{
			$Data_member = mysqli_fetch_array($result_query);
		}
		else
		{
			$query_login = "SELECT * FROM `members` where ( `username` = \"$phone\"  OR `phone` = \"$phone\" ) and `password` = \"$pass\"  ";
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$result_query = mysqli_query($mysqli,$query_login);
			$num_result = mysqli_num_rows($result_query);
			$Data_member = mysqli_fetch_array($result_query);
		}

		if($num_result > 0)
		{
			$cookie_value_username = $Data_member[username];
			$cookie_value_password = $Data_member[password];
			$cookie_value_active = $Data_member[active];
			if($cookie_value_active==1){
			setcookie($cookie_name_username, $cookie_value_username, time() + (86400 * 30 * 12 * 10), "/"); // 86400 = 1 day	
			setcookie($cookie_name_password, $cookie_value_password, time() + (86400 * 30 * 12 * 10), "/"); // 86400 = 1 day	
			$_SESSION['id_members']=$Data_member[id];

			echo "<META http-equiv=\"refresh\" content=\"0;URL=index.php\">";
		
			}else{
				echo "
			<div class=\"alert alert-danger\" style=\"width:80%; margin: 0 auto;\"> لم يتم تفعيل الحساب .
			</div>
			";
			}
				}
		else
		{
			echo "
			<div class=\"alert alert-danger\" style=\"width:80%; margin: 0 auto;\"> المعلومات المدخلة غير صحيحة. نرجو التأكد من صحة إسم المستخدم والرقم السري.
			<br><a href=\"restoration.php\">بإمكانك إستعادة رقمك السري عن طريق الضغط هنا .</a>
			</div>
			";
		}
	}

}
// اغلاق الأتصال بقاعدةالبيانات
mysqli_close($mysqli);
?>
              
<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-4">
	<form action="login.php" method="post" >
		<h2>تسجيل الدخول</h2>
		<hr>
		<div class="form-group ">
			<label>أسم المستخدم او رقم الجوال </label>
			<input type="text" name="user" placeholder="أدخل اسم المستخدم أو رقم الجوال" class="form-control  ">
		</div>
		<div class="form-group  ">
			<label>الرقم السري</label>
			<input type="password" name="pass" placeholder="الرقم السري" class="form-control  ">
		</div>
		<button name="login" class="form-control btn btn-large btn-success" type="submit" value="دخــــول »">دخــــول »</button>
		<br><br>
		<a href="restoration.php">  هل نسيت الرقم السري؟</a>
	</form>
	<div class="text-center social-btn">
            <a href="facebook/fbconfig.php" class="btn btn-primary" style="background-color: #3b5998 "><i class="fa fa-facebook"></i>&nbsp; باستخدام فيس بوك</a>
            <a href="twitter/process.php" class="btn btn-info"><i class="fa fa-twitter"></i>&nbsp; باستخدام تويتر</a>
	     </div>
	<br><br><br>
	<a href="register.php" class="form-control btn btn-large btn-primary">التسجيل بالموقع »</a>
</div>

</div>
<br>
<br>
<br>
<br>

<?php
include("footer.php"); // ادراج الفوتر
?>

</body>
</html>