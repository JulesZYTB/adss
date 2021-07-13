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
<title>الأشتراك البريدي - <?php echo $namewebsite; ?></title> 
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




<h3>الإشتراك البريدي</h3>
<div class="comment">


<br>


<?php

	
				
				if($_POST['submit']){
				
				$subscribe_1 = $_POST['subscribe_1'];
				$subscribe_1 = secure_input($subscribe_1,"int");
				
				$subscribe_2 = $_POST['subscribe_2'];
				$subscribe_2 = secure_input($subscribe_2,"int");
				
				$subscribe_3 = $_POST['subscribe_3'];
				$subscribe_3 = secure_input($subscribe_3,"int");
				
				
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_subscribe = "UPDATE `members` set subscribe_1 = \"$subscribe_1\" 
				, subscribe_2 = \"$subscribe_2\" , subscribe_3 = \"$subscribe_3\" where id = \"$id\"";
				$result_query_subscribe = mysqli_query($mysqli,$query_subscribe);
				if($result_query_subscribe){
					echo "<div class=\"alert alert-success\">تم تعديل البيانات</div>";
					}else{
						echo "
						<div class=\"alert alert-danger\">
						يبدو انه يوجد مشكلة في الإشتراك البريدي تواصل مع الأدارة من فضلك
						</div>
						";
						
						}
				}
				
				
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$user = secure_input($user_or,"text_input");
				$query_login = "SELECT * FROM `members` where id = \"$id\" ";
				$result_query = mysqli_query($mysqli,$query_login);
				$Data_member = mysqli_fetch_array($result_query);
				$subscribe_1_f =  $Data_member[subscribe_1];
				$subscribe_2_f =  $Data_member[subscribe_2];
				$subscribe_3_f =  $Data_member[subscribe_3];		
?>

	



<form action="" method="post" name="postform" enctype="multipart/form-data">
	<table class="table  tableMsg table-borderedAds tableextra">
<tbody><tr> <th width="5%"><b>أختيار</b></th>
      <th><b>خدمة الإشعار البريدي</b></th>

    </tr>


 <tr>
	<td>
			<input type="checkbox" name="subscribe_1" value="1" <?php if($subscribe_1_f === "1"){echo "checked=\"yes\"";} ?>>
		</td>
    
      <td>الإشعار عن الردود عن الإعلانات</td>
    
   </tr>
   
    <tr>
 <td>
			<input type="checkbox" name="subscribe_2" value="1" <?php if($subscribe_2_f === "1"){echo "checked=\"yes\"";} ?>>
		</td>
    
      <td>الإشعار عن الرسائل الخاصة الجديدة</td>
    
   </tr>
   
    <tr class="row2">
 <td>
			<input type="checkbox" name="subscribe_3" value="1" <?php if($subscribe_3_f === "1"){echo "checked=\"yes\"";} ?>>
		</td>
    
      <td>الإشعار بوجود سلعه جديدة تقوم بمتابتعها</td>
    
   </tr>
   
 

<tr>
      <td colspan="2" align="center">&nbsp;
        <input class="btn  btn-primary" type="submit" name="submit" value="تعديل"></td></tr>
</tbody></table>
</form>


</div></div></div>

<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 




 </body></html>