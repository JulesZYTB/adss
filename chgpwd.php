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
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 
 
 
 
<?php
include("header.php"); // استدعاء ملف الهيدر
?>
      
      
<div class="row" id="wrapper">
<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-4">

<?php
if($_POST['submit']){
	
	$old_pass = $_POST['old_pass'];
	$old_pass_member = secure_input($old_pass,"text_input");
	
	$new_pass = $_POST['new_pass'];
	$new_pass_member = secure_input($new_pass,"text_input");
	
	$conf_pass = $_POST['conf_pass'];
	$conf_pass_member = secure_input($conf_pass,"text_input");
	
	
	
	
	if($password_member === md5($old_pass)){
		$password_match_Re = 0;
		}else{
		$password_match_Re = 1;	
			}
			
	if($new_pass_member === $conf_pass_member){
		$cheak_password_Re = 0;
		}else{
		$cheak_password_Re = 1;
		$cheak_password_Re_text = "كلمة المرور غير متطابقتين .";
		
			}
			
		if(strlen($new_pass_member) > 6){
		$strlen_password_Re = 0;
		}else{
		$strlen_password_Re = 1;
		$strlen_password_Re_text = "كلمة المرور قصيرة جدا";
			}
		
	
	/// استعدعاء ملف الأتصال بقاعدة البيانات
	include("include/config.php");


	$md5_new_pass = md5($new_pass);
	if($strlen_password_Re !== 1 and $cheak_password_Re !== 1 and $password_match_Re !== 1){
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_edit_member_password = "UPDATE `members` set password = \"$md5_new_pass\" 
	, now = \"$new_pass\" where id = \"$id\" ";
	$result_edit_password = mysqli_query($mysqli,$query_edit_member_password);	
	
	if($result_edit_password){
		echo "<div class=\"alert alert-success\">
		تم تغير الرقم السري بنجاح
 		</div>";
		}else{
		echo "<div class=\"alert alert-danger\">
		يبدو انه يوجد مشكلة في تعير كلمة المرور تواصل مع الأدارة عن طريق اتصل بنا 
		</div>";
			}
		
		}
			
			
			
	
	}
?>

<?php
if(!$result_edit_password){
?>

<table class="table  tableMsg table-borderedAds tableextra">
    <tbody><tr>
      <th colspan="2"><b>تغيير الرقم السري</b></th>
    </tr>
<form action="" method="post">
	<tr>
     
      <td class="row1" width="28%"><b class="genmed">الرقم السري القديم:</b></td>
	  <td class="row2" align="right"> 
	  
	 <input class="form-control post" type="password" name="old_pass" size="45" tabindex="2" value="">
	  <?php 
	  if($password_match_Re === 1){
	  echo "<span class=\"label label-danger\">الرقم السري القديم خطأ</span>";
	 }
	  ?>
	 
	 </td>
    </tr>
	<tr>
     
      <td class="row1" width="28%"><b class="genmed">الرقم السري الجديد:</b></td>
	  <td class="row2" align="right"> 
	  
	 <input class="form-control post" type="password" name="new_pass" size="45" tabindex="2" value="">
	  <?php
	  if($cheak_password_Re === 1 || $strlen_password_Re){
	  echo " <span class=\"label label-danger\"> $cheak_password_Re_text  $strlen_password_Re_text</span>";   
		   }
	   
	   ?>
	 
	 </td>
    </tr>
	<tr>
     
      <td class="row1" width="28%"><b class="genmed">الرقم السري الجديد(للتأكيد):</b></td>
	  <td class="row2" align="right"> 
	  
	 <input class="form-control post" type="password" name="conf_pass" size="45" tabindex="2" value="">
	  
	
	  <span class="label label-danger"></span>
	 </td>
    </tr>
    

<tr>
      <td class="row4" colspan="2" align="center">&nbsp;
        <input class="form-control btn  btn-primary" type="submit" name="submit" value="تغـيير  »"></td></tr>

</form>
</tbody></table>
<?php
}
?>
</div>


</div>
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 




 </body></html>