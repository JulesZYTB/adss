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
<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">

 <?php
			$ads_id = $_GET['ads_id'];
			$ads_id = secure_input($ads_id,"int");
			
			/// استعدعاء ملف الأتصال بقاعدة البيانات
			include("include/config.php");
			include("include/functions/ftime.php");
			mysqli_query($mysqli,"SET NAMES 'utf8'");
    
			$query_keyinformation_print = "SELECT * FROM `ads` WHERE id = \"$ads_id\" ";
			$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
			$print_value = mysqli_fetch_array($result_keyinformation_print);
			$His_announcement_saa = $print_value[His_announcement];
			$ads_title = $print_value[ads_title];
			$ads_id = $print_value[id];
			$Last_updated_Ad = $print_value[Last_updated_Ad];
			$Last_updated_Ad_arabic = timeago($Last_updated_Ad);
    
    
			$queryGiveNumUpdate = "SELECT * FROM `members` WHERE id = \"$His_announcement_saa\" ";
			$Ex_queryGiveNumUpdate= mysqli_query($mysqli,$queryGiveNumUpdate);
			$print_value = mysqli_fetch_array($Ex_queryGiveNumUpdate);
			$NumUpdate = $print_value['NumUpdate'];
			
    
			///////////////////////////////////////////////
			
			
			
			
 ?>
<?php 
if(($His_announcement_saa === $id_member and $id_His_response !== $id_member) || $group_num === "1" || $group_num === "2"){
 ?>


<div class="comment">

	<?php 
	$time_now = time();
	
	//if(($Last_updated_Ad+388800 >= $time_now || $NumUpdate >= 1 ) and ($group_num !== "1" || $group_num !== "2")){
	if(FALSE){
	?>

		  <table class="table  tableMsg table-borderedAds tableextra">
  	 	  <tbody><tr>
    	  <th><b>تحديث الإعلان</b></th>
    	  </tr>
	
	<tr>
      <td class="cat" align="center">&nbsp;

          <?php
          if($NumUpdate >= 1){
          ?>
          
          		  	    <div class="alert  alert-warning">
			عزيزي المعلن،
لايمكن تحديث الإعلان لأنك استهلكت التحديث المسموح لك خلال هذا الشهر	
                            <br>

 		 </div>
          
          <?php }else{ ?>
          
		  	    <div class="alert  alert-warning">
			عزيزي المعلن،
			 لايمكن تحديث الإعلان اليوم بسبب وجود تحديث سابق خلال أقل من 3  أيام.نرجو التحديث بعد مرور 3 أيام على آخر تحديث للإعلان وشكرا
			 <br>
			 آخر تحديث للإعلان كان قبل 
			<?php echo $Last_updated_Ad_arabic; ?>
 		 </div>
          
          <?php } ?>
          
		</td></tr></tbody></table>


<?php
}else{
?>
        



<?php
if($_POST['submit']){

						
			
			include("include/config.php");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$time_now_update = time();
			$query_update_ads = "UPDATE `ads` set Last_updated_Ad = \"$time_now_update\"  where id = \"$ads_id\"";
			$execution_query_update_ads = mysqli_query($mysqli,$query_update_ads);
    
    
			if($execution_query_update_ads){
            $NumUpdate++;    
                
            $query_update_ads = "UPDATE `members` set NumUpdate = \"$NumUpdate\"  where id = \"$His_announcement_saa\"";
			$execution_query_update_ads = mysqli_query($mysqli,$query_update_ads);   
                
                
			?>
	<div class="alert alert-success">تم تحديث الإعلان بنجاح</div>
	<a href="ads/<?php echo $ads_id; ?>/<?php echo $ads_title; ?>">العودة إلى الإعلان
	</a>
	<?php 
			}else{
			echo "
			<div class=\"alert alert-danger\">
			يبدو انه يوجد مشكلة في تحديث الأعلان من فضلك تواصل مع الأدارة
			</div>
			";
			}
					

	
	}else{
?>


	<table class="table  tableMsg table-borderedAds tableextra">
    <tbody><tr>
      <th><b>تحديث الإعلان</b></th>
    </tr>
	
<form action="" method="post" name="postform" enctype="multipart/form-data">


	<tr>
     
      <td>رقم الإعلان :
	  
	 <?php echo $ads_id; ?>
	  
	 
	 </td>
    </tr>
    <tr>
     
      <td>عنوان الاعلان: <?php echo $ads_title; ?>  <input name="ads_id" value="5477521" type="hidden"></td>
    </tr>
<tr>
      <td>
        <input type="submit" name="submit" value="تحديث" class="btn btn-primary"></td></tr>




</tbody></table>
</form>
<?php
}
}
}else{echo "خطأ في رابط الصفحة<br><br>";}

?>
</div>
</div>

</div>
<?php

ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>

 

 </body></html>
