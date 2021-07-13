<?php
session_start();
ob_start();
if(isset($_SESSION['id_members'])){header("location:home.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="rtl" xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl" dir="rtl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
<title>- لوحة التحكم -  تسجيل دخول</title>
<link rel="stylesheet" type="text/css" href="css/login.css" media="screen" />
</head>
<body>
<div class="wrap">
	<div id="content">
		<div id="main">

			<div class="full_w">
            <br />
            <div align="center">
                    <img src="img/logopanel.png" height="77" width="188"  />
                    </div>
				<form action="" method="post">
					<label for="login">اسم المُستخدم:</label>
					<input id="login" name="user" class="text" />
					<label for="pass">كلمة المرور:</label>
					<input id="pass" name="pass" type="password" class="text" />
					<div class="sep"></div>
					<input type="submit" name="login" class="ok" value="دخول" />
				</form>
                
                <?php
				
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
				
				
				/// استدعاء دالة حماية المدخلات 
				include("../include/functions/Secure_input.php");
				$user_or = $_POST['user'];
				$user = secure_input($user_or,"text_input");
				
				$pass_or = $_POST['pass'];
				$pass = md5($pass_or);
				
				
				if($_POST['login']){
					// 1
					
					if(empty($user) || empty($pass_or)){
						// 2
						echo "
						<div class=\"n_error\"><p>
						من فضلك ادخل اسم المستخدم و كلمة المرور .
						</p></div>
						";
						} // 2
						else{
						$query_login = "SELECT * FROM `members` where 
						`username` = \"$user\" and `password` = \"$pass\" and `groupnumber` = \"1\" ";
						mysqli_query($mysqli,"SET NAMES 'utf8'");
						$result_query = mysqli_query($mysqli,$query_login);
						$num_result = mysqli_num_rows($result_query);
						$Data_member = mysqli_fetch_array($result_query);

						if($num_result > 0){
									echo "
						<div class=\"n_ok\"><p>
						لقد تم تسجيل الدخول بنجاح جاري تحويلك للوحة التحكم
						</p></div>
						";
						$_SESSION['id_members']=$Data_member[id];
						echo "<META http-equiv=\"refresh\" content=\"2;URL=home.php\">";

							}else{
						echo "
						<div class=\"n_error\"><p>
						اسم المستخدم أو كلمة المرور خطأ !
						</p></div>
						";
								}
							
						
							}
						
						// 1
					}
				
				
				// اغلاق الأتصال بقاعدةالبيانات
				mysqli_close($mysqli);
				?>
                
			</div>
			<div class="footer">&raquo; <a href="">إعلانات السعودية </a> | Panel</div>
		</div>
	</div>
</div>

</body>
</html>
