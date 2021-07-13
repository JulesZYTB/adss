<?php
session_start();
ob_start();
include("include/config_header.php");	
include("include/config_header.php");	
if(isset($_SESSION['id_members'])){header("location:index.php");}
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
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
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 
 
 
 
<?php
include("header.php"); // استدعاء ملف الهيدر
?>
      
      
<div class="row" id="wrapper">

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h2>التسجيل بالموقع</h2>
<hr>

<?php

$key_act = $_GET['key'];
$key_act = secure_input($key_act,"text_input");

if(!empty($key_act) and isset($key_act)){
$query_active = "SELECT * FROM `members` WHERE member_code = \"$key_act\"";
$result_query_active = mysqli_query($mysqli,$query_active);
$num_rows_active = mysqli_num_rows($result_query_active);
$fetch_array_active = mysqli_fetch_array($result_query_active);
$email = $fetch_array_active[email];
$username = $fetch_array_active[username];
$groupnumber = $fetch_array_active[groupnumber];
if($num_rows_active > 0){
	if($groupnumber === "0"){
		if($_POST['submit']){
			
			
			$username_new = $_POST['username_new'];
			$username_new = secure_input($username_new,"text_input");
			
			$password_new = $_POST['password_new'];
			$password_new_md5 = md5($_POST['password_new']);
			
			
			
			
			if(!empty($password_new)){$password_empty = "";}else{
					$password_empty = "يجب عليك إدخال كلمة المرور . ";
					}
			
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			if(!empty($username_new)){$username_empty = "";
			$query_chek_found_username = "SELECT * FROM `members` WHERE username = \"$username_new\" ";
			$result_chek_found_username = mysqli_query($mysqli,$query_chek_found_username);
			$num_chek_found_username  = mysqli_num_rows($result_chek_found_username);
			if($num_chek_found_username > 0){
				$found_username = "اسم المستخدم مستخدم من قبل عضو اخر .";
				}else{
					$found_username = "";
					}
					}else{
					$username_empty = "يجب عليك كتابة اسم المستخدم .";
					}
					
					
			
			
				if(empty($password_empty) and empty($username_empty) and empty($found_username)){
					$time_now_re = time(); 
					mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_insert_member_active = "UPDATE `members` set username = \"$username_new\" 
				, password = \"$password_new_md5\" , groupnumber = \"6\" , timeregister = \"$time_now_re\" ,
				Documentingemail = \"1\" , sendtime = \"3\" , now = \"$password_new\" ,
				subscribe_1 = \"1\" , subscribe_2 = \"1\" , subscribe_3 = \"1\"
				 where member_code = \"$key_act\" and groupnumber = \"0\" ";
				$result_insert_member_active = mysqli_query($mysqli,$query_insert_member_active);
				if($result_insert_member_active){
				$ok_register = "1";
				echo "<div class=\"alert alert-success\">تم تسجيلك بنجاح،يجب عليك تسجيل الدخول حتى تتمكن من استخدام خدمات الموقع.</div>";
					}else{
												echo "
		<div class=\"alert alert-danger\">يبدو انه هناك مشكلة في التسجيل راسل الأدارة . </div>
		";
					}
				}else{

					}
			
			
			
			}
			if($ok_register === "1"){}else{
		?>
		
        



 <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-4">
<form method="post" action="">
	<legend>التسجيل بالموقع</legend>
	<div class="alert alert-info">يجب التسجيل بأسم لائق .</div>

	
	<br>
	
	
    <div class="form-group  ">
   <label>أسم المستخدم:</label>
  
		         
			<input name="username_new" type="text" value="" maxlength="25" placeholder="أسم المستخدم" class="form-control  ">
			<span class="label label-danger"><?php echo $username_empty.$found_username; ?></span>
   	 </div>
  
	 
	 
     <div class="form-group  ">
    <label>الرقم السري:</label>
		         
 			<input name="password_new" type="password" value="" placeholder="الرقم السري " class="form-control  ">
 			<span class="label label-danger"><?php echo $password_empty; ?></span>
    	 </div>
		 
	     <div class="form-group">
	    <label>البريد الإلكتروني:</label>
		         
	 			<input name="email" type="text" value="<?php echo $email; ?>" readonly class="form-control  ">
	 		
	    	 </div>
	 
	<div class="form-group">
	<input name="submit" type="submit" value="التسجيل في الموقع" class="form-control btn  btn-primary ">
	</div>
</form>
</div></div>



		<?php
		}
		}else{
			echo "
<div class=\"alert alert-info\">لقد سبق لك التسجيل عبر كود التفعيل هذا:
<br><b>اسم المستخدم:</b> $username
<br><b>البريد الإلكتروني:</b> $email
<br><a href=\"restoration.php\">اذا كنت نسيت الرقم السري،فضلاً اضغط هنا</a>
</div>
			";
			}

	}else{
		echo "
		<div class=\"alert alert-danger\">كود التفعيل غير صحيح</div>
		";
		}

}else{
if($_POST['submit']){
	


$email_register_or = $_POST['email'];
$email_register = secure_input($email_register_or,"text_input");
$email_chek = filter_var($email_register, FILTER_VALIDATE_EMAIL);
if(!$email_chek){echo "
		<div class=\"alert alert-danger\"> البريد خاطئ ! </div>";}else{
mysqli_query($mysqli,"SET NAMES 'utf8'");

$query_search_email = "SELECT * FROM `members` where email = \"$email_register\" ";
$result_query = mysqli_query($mysqli,$query_search_email);
$search_num = mysqli_num_rows($result_query);
$inf_members = mysqli_fetch_array($result_query);
$username = $inf_members[username];
$email = $inf_members[email];
$groupnumber = $inf_members[groupnumber];
if($search_num > 0){
if($groupnumber === "0"){
		echo "
<div class=\"alert alert-info\">لقد أرسلنا كود التفعيل إلى بريدك.<br>
إذا كنت لم تستلم الرساله إلى الآن، فضلا <a href=\"restoration.php\">أضغط هنا</a> لإرسال كود التفعيل مره أخرى.
<br><b>البريد المسجل لدينا هو:</b> $email
<br>
</div>
	";
	}else{
	echo "
	<div class=\"alert alert-info\">لقد سبق لك التسجيل عبر كود التفعيل هذا:
<br><b>اسم المستخدم:</b> $username
<br><b>البريد الإلكتروني:</b> $email
<br><a href=\"restoration.php\">اذا كنت نسيت الرقم السري،فضلاً اضغط هنا</a>
</div>
	";
	}
	
	
	

	
	}else{
		
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$time_now = time();
	$Activation_code = md5($time_now.$email_register);
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_new_member = "INSERT INTO `members` (groupnumber,email,timeregister,member_code) VALUES 
	(\"0\",\"$email_register\",\"$time_now\",\"$Activation_code\")";	
	$result_new_member = mysqli_query($mysqli,$query_new_member);
	if($result_new_member){
		
		$url_website =  "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

		// متغيرات الدالة  
		$subject = "رابط التسجيل في موقع $namewebsite $namewebsiteen activiation URL"; 
		$message = "
		لإكمال التسجيل في موقع $namewebsite،يجب الضغط على الرابط التالي:
		$url_website?key=$Activation_code

		$namewebsiteen registration activation URL
		$url_website?key=$Activation_code
		"  ;
		// الدالة mail 
		mail ("$email_register", "$subject" , "$message");
		
	echo "
<div class=\"alert alert-success\">تم إرسال كود التفعيل ورابط التسجيل إلى بريدك الإلكتروني،يجب الدخول على بريدك الإلكتروني والضغط على الرابط الذي تم إرساله 
	لإتمام عملية التسجيل.<br> في حالة لم يصل لك كود التفعيل في أقل من ساعه، يرجى مراسلتنا عبر نموذج المراسله.
</div>
<br>
<div class=\"alert alert-info\"> نرجو من مستخدمي بريد الهوتميل مراجعة صندوق الرسائل الغير هامة (Junk mail) في حال عدم إستلام الرساله في البريد الوارد</div>

</div>
	";
	}else{
		echo "
		<div class=\"alert alert-danger\">يبدو انه هناك مشكلة في التسجيل يرجي التواصل مع الأدارة
<br><a href=\"contact.php\">إضغط هنا للأتصال بنا</a>
 </div>
 ";
		}
	}
	}
	
	}else{
?>

<?php
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_keyinformation_print = "SELECT * FROM `text` WHERE id = \"1\" ";
				$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
				$print_value = mysqli_fetch_array($result_keyinformation_print);
				$description = $print_value[description];
				mysqli_close($mysqli);

?>

<?php
echo $description;

?>

	
	
	<hr>
	<div class="alert alert-info">يجب ادخال بريد إلكتروني صحيح حتى يتم إرسال رابط التسجيل إليك</div>

	 <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-4">
	<form method="post" action="">

				<div class="form-group  ">
		   	  <label>البريد الإلكتروني</label>
		    
		      <input type="email" name="email" maxlength="50" placeholder="ادخل بريدك الالكتروني هنا" class="form-control" value="">

	  			</div>

		   	 <button name="submit" class="form-control btn btn-large btn-primary" type="submit" value="تسجيل">تسجيل</button>

			 <br>
			 <br>
		
</form>

<?php
}
		}
?>

</div></div>




</div>




<div style="clear:both;"></div>


 
 
    </div>
    </div>
    </div>
   


<?php
include("footer.php"); // ادراج الفوتر
?>
 




 </body></html>