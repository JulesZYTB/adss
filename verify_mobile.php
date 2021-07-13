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
<div class="col-xs-12  col-sm-9 col-md-9 col-lg-9 " id="secondDiv">

<?php
if($documentingmobile === "1"){header("location:index.php");}
if($messagesphone === "on"){
?>

<h2>توثيق العضوية</h2>
    




 
<?php
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
$id = $_SESSION['id_members'];
$id_member = secure_input($id,"int");
mysqli_query($mysqli,"SET NAMES 'utf8'");
$user = secure_input($user_or,"text_input");
$query_login = "SELECT * FROM `members` where id = \"$id\" ";
$result_query = mysqli_query($mysqli,$query_login);
$Data_member = mysqli_fetch_array($result_query);
$active = $Data_member[active];
$sendtime = $Data_member[sendtime];
$sendtime_2 = $sendtime-1; 
$username = $Data_member[username]; 

				
				
if($_POST['submit2']){
	$menu_1 = 1;
	$menu_3 = 1;
	

	$code = $_POST['code'];
	$code = secure_input($code,"int");
	$mobile_edit = $_SESSION['number_mobile_final'];
	$mobile_alert = $_SESSION['mobile'];

	if($code === $active){
							$query_phone_member_active2 = "UPDATE `members` set phone = \"$mobile_edit\" 
						, documentingmobile = \"1\" where id = \"$id\" ";
						$result_phone_member_active_2 = mysqli_query($mysqli,$query_phone_member_active2);
		
		if($result_phone_member_active_2){
		echo "
		<div class=\"alert alert-success\">
		تم توثيق العضوية بنحاج 
 		</div>
		";
		
		echo "
		<div class=\"alert alert-info\">
		عضويتك $username تم ربطها بالجوال رقم $mobile_alert
		</div>
		";
		}else{
		echo "<div class=\"alert alert-danger\">
		يبدو انه يوجد مشكلة في التفعيل اتصل بالأدارة
		</div>";
			}
		
		
		}else{
			echo "<div class=\"alert alert-danger\">
			رمز التفعيل الذي ادخلته خطأ
			</div>";
			}
	
	}
?>  


<?php
				
				if($_POST['submit']){
				
				$country_code = intval($_POST['countrycode']);
					
				if($country_code === 966){
					$country = "سعودي";
					}
				
				if($country_code === 965){
					$country = "كويتي";
					}
			
				if($country_code === 973){
					$country = "بحريني";
					}
					
				if($country_code === 974){
					$country = "قطري";
					}
				
				if($country_code === 971){
					$country = "إماراتي";
					}
					
				if($country_code === 968){
					$country = "عماني";
					}
									
				
				$mobile = $_POST['mobile'];
				if(preg_match('/^[0-9]+$/',$mobile) && strlen($mobile) === 10 )
				{
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$number_mobile_first = 	substr($mobile,1);
				$number_mobile_final = 	$country_code.$number_mobile_first;
				$query_check_mobile = "SELECT * FROM `members` WHERE phone = \"$number_mobile_final\"";
				$result_check_mobile = mysqli_query($mysqli,$query_check_mobile);
				$num_check_mobile = mysqli_num_rows($result_check_mobile);
				$menu_1 = 1;
				$_SESSION['number_mobile_final']=$number_mobile_final;
				$_SESSION['mobile']=$mobile;
				if($num_check_mobile > 0){
					echo "<div class=\"alert alert-danger\">
					رقم الجوال المدخل تم ربطه بعضوية أخرى. لايمكن ربط رقم جوال واحد بأكثر من عضوية
					</div>";
					}else{
						$menu_1 = 1;
						if($sendtime <= 0 ){echo "<div class=\"alert alert-danger\">
					لقد نفذت كافة محاولاتك في إرسالة الرسائل إذا إردت المزيد من المحاولات راسل الأدارة - اتصل بنا
					</div>";}else{
						/// استعدعاء ملف الأتصال بقاعدة البيانات
						include("include/config.php");
						$code_active_new = rand(10000,99999);
						mysqli_query($mysqli,"SET NAMES 'utf8'");
						$query_phone_member_active = "UPDATE `members` set active = \"$code_active_new\" 
						, sendtime = \"$sendtime_2\" where id = \"$id\" ";
						$result_phone_member_active = mysqli_query($mysqli,$query_phone_member_active);

						include("include/small_software/SMS/send.php");
						?>
                        
                        

                        
                        <span class="green">* تم إرسال رمز التأكيد على جوالك رقم <?php echo $_SESSION['mobile']; ?></span><br>

أدخل الرمز المرسل لجوالك: <br><br>
<form method="post" action="">

   

<div class="row">
  <div class="col-xs-8 col-sm-8 col-md-2 col-lg-2"><input type="text" pattern="\d*" name="code" placeholder="ادخل الرمز هنا" class="form-control "></div>
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
 <input value=" إرسال » " class="btn btn-primary submitnumber" type="submit" name="submit2" />
 
 
 </div>
</div>

<br><br>


</form>
<a href="verify_mobile.php">»  لم يصلك الرمز؟ </a> <br>
<a href="verify_mobile.php"> » هل رقم الجوال المدخل <?php echo $_SESSION['mobile']; ?> خطأ؟</a>

<br>




                        <?php
						}

						}
				
				
				}
				else
				{
				echo "لأجل الإستفادة من جميع خدمات الموقع، يلزم توثيق عضويتك من خلال ربطها برقم جوالك عبر النموذج التالي: 
				<br><br>";
				echo "<span class=\"red\">* رقم الجوال غير صحيح. رقم الجوال يجب ان يكون $country ، مثال 0512345678</span>";
				}
				}else{
				if($menu_3 === 1){}else{
				echo "لأجل الإستفادة من جميع خدمات الموقع، يلزم توثيق عضويتك من خلال ربطها برقم جوالك عبر النموذج التالي: 
				<br><br>";
				echo "<span class=\"green\">* نرجو ادخال رقم جوالك مره أخرى ، مثال 0512345678</span>";
				}
				$menu_2 = 0;
				}

				
				
	
	
?>





                      




<?php
if($menu_1 === 1){}else{
?>

<form method="post" action="" class="bs-example-control-sizing">

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"><input type="text"  name="mobile" placeholder="أدخل رقم جوالك مثلا 0512345678" class="form-control ">
<select class="form-control " name="countrycode" selected="">
  <option value="966">السعودية</option>
  <option value="965">الكويت</option>
  <option value="973">البحرين</option>
  <option value="974">قطر</option>
  <option value="971">الإمارات</option>
  <option value="968">عمان</option>
</select> <input value=" توثيق » " class="btn btn-primary submitnumber" type="submit" name="submit" />
     </div>
</div>
 <span class="green">* حاليا  يمكن التوثيق فقط في الجوالات الخليجية</span>

</form>

<?php
}
?>

<br>


    
    
<?php
}else{header("location:index.php");}
?>
</div>
</div>
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 
 


 </body></html>