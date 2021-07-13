<?php
session_start();
ob_start();
include("include/config_header.php");	
ob_start();
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
if(!isset($_SESSION['id_members'])){header("location:login.php");}
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
$emilecommunication = $print_value[emilecommunication];
$commission = $print_value[commission];
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
<?php 

?>
<div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 			<?php
			$ads_id = $_GET['ads_id'];
			$ads_id = secure_input($ads_id,"int");
			/// استعدعاء ملف الأتصال بقاعدة البيانات
			include("include/config.php");
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_keyinformation_print_ads = "SELECT * FROM `ads` WHERE id = \"$ads_id\" ";
			$result_keyinformation_print_ads = mysqli_query($mysqli,$query_keyinformation_print_ads);
			$print_value_ads = mysqli_fetch_array($result_keyinformation_print_ads);
			$print_value_num_ads = mysqli_num_rows($result_keyinformation_print_ads);
			$ads_title = $print_value_ads[ads_title];
			$ads_title_s = $print_value_ads[id];
			$closecomment = $print_value_ads[closecomment];
			$His_announcement_saa = $print_value_ads[His_announcement];
			///////////////////////////////////////////////
			
 			?>
            <h3>منع الأعضاء من الرد على الإعلان</h3>
<?php 
if((($His_announcement_saa === $id_member) || $group_num === "1" || $group_num === "2") and $print_value_num_ads > 0){
	if($The_pay_commission === "1"){
 ?>



<div class="comment">

<?php
if($_POST['submit']){
	
	
	
			$closecomment = $_POST['closecomment'];
			$closecomment = secure_input($closecomment,"int");
						
			
			include("include/config.php");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_close_comments = "UPDATE `ads` set closecomment = \"$closecomment\" where id = \"$ads_id\" ";
			$execution_query_close_comments = mysqli_query($mysqli,$query_close_comments);
			if($execution_query_close_comments){
			echo "
			<div class=\"alert alert-success\">
			تم الإجراء.
			<br>
			"?>
			<a href="<?php echo $fixed_htaccess; ?>ads/<?php echo $ads_id; ?>/<?php echo $ads_title; ?>">العودة للإعلان
			<?php 
			echo "
			</a>
			</div>";
			}else{
				
			echo "
			<div class=\"alert alert-danger\">
			يبدو انه يوجد مشكلة في التحكم بالردود فضلا منك تواصل مع الأدارة
			</div>
			";
			}
					

	
	}else{
?>
<form action="" method="post" name="postform" enctype="multipart/form-data" onsubmit="return validate_form(this);">

<table class="table  tableMsg table-borderedAds tableextra">
    <tbody><tr>
      <th colspan="2"><b>منع الأعضاء من الرد على الإعلان</b></th>
    </tr>

<tr>    
      <td width="18%"><b>رقم الأعلان</b></td><td> 
      <?php 
	  echo $ads_title_s;
	  ?>  
	 
	 </td>
    </tr>

<tr>    
      <td width="18%"><b>عنوان الأعلان</b></td><td> 
	 <?php echo $ads_title; ?>
     
	  <input name="block_username" value="mutleb" type="hidden">
	 </td>
    </tr>
	
<tr>
     
      <td width="18%"><b>منع الأعضاء من الرد على الإعلان</b></td><td align="right"> 
	  
	 
	  <label>
      <input name="closecomment" <?php if($closecomment === "1"){ ?> checked="checked" <?php }?> value="1" type="radio">اريد منع الأعضاء من الرد على الأعلان</label> <br>
<label><input name="closecomment" value="0" type="radio" <?php if($closecomment === "0"){ ?> checked="checked" <?php }?>>
        السماح للأعضاء بالرد على الأعلان</label> 
	 
	 </td>
    </tr>


<tr>
      <td class="row4" colspan="2" align="center">&nbsp;
        <input class="btn  btn-danger" type="submit" name="submit" value="إرسال"></td></tr>


</tbody></table>
</form>
</div>

<?php
}
}else{
	?>
    <div class="alert alert-info">
عفوا هذه الخدمة مقدمة فقط للأعضاء الذين سبق لهم دفع عمولات للموقع.</div>
    <?php
	}
}else{echo "خطأ في رابط الصفحة<br><br>";}

?>
</div>
</div>
<?php

ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>





 </body></html>
