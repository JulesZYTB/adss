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
			$view_query_ads = "SELECT * FROM `ads` WHERE id = \"$ads_id\"";
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$mysqli_query_co = mysqli_query($mysqli,$view_query_ads);
			$fetch_array_view_co = mysqli_fetch_array($mysqli_query_co);
			$num_ads_search_table = mysqli_num_rows($mysqli_query_co);
			$His_announcement = $fetch_array_view_co[His_announcement];
			$ads_title = $fetch_array_view_co[ads_title];
			$close_ads = $fetch_array_view_co[close_ads];
			
			
			
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_login_m_ad02 = "SELECT * FROM `members` where id = \"$id_His_response\" ";
			$result_query_m_ad02 = mysqli_query($mysqli,$query_login_m_ad02);
			$Data_member_m_ad02 = mysqli_fetch_array($result_query_m_ad02);
			$group_num_m_ad02 = $Data_member_m_ad02[groupnumber];
			$username_member_2_m_ad02 =  $Data_member_m_ad02[username];
			$id_user_m_ad02 =  $Data_member_m_ad02[id];	 
			
			
			
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_keyinformation_print = "SELECT * FROM `ads` WHERE id = \"$id_ads\" ";
			$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
			$print_value = mysqli_fetch_array($result_keyinformation_print);
			$His_announcement_saa = $print_value[His_announcement];
			
			
			
			///////////////////////////////////////////////
			
			
			
			
 ?>
<?php 
if(
(($His_announcement === $id_member and ($close_ads === "6" || $close_ads === "0")) || $group_num === "1" || $group_num === "2") and $num_ads_search_table > 0){
 ?>

<?php
if($_POST['submit']){
	
	
	
			$ads_status = $_POST['ads_status'];
			$ads_status = secure_input($ads_status,"int");
			
			$reason = $_POST['reason'];
			$reason = secure_input($reason,"text_input");
			
			$Prevent = $_POST['Prevent'];
			$Prevent = secure_input($Prevent,"int");
			
			
			if($ads_status === "0"){$ads_status_new = 0;}
			if($ads_status === "1"){if($group_num === "6"){$ads_status_new = 6;} 
			if($group_num === "1" || $group_num === "2" and $Prevent === "0"){$ads_status_new = 1;}else{$ads_status_new = 6;}}
						
			
			include("include/config.php");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			if($close_ads === "0"){
				
			$query_add_blocklistcomments = "INSERT INTO `reasons_delete_ads` 
			(`id_ads`, `Reasons`) VALUES (\"$ads_id\", \"$reason\")";
			$execution_query_add_blocklistcomments = mysqli_query($mysqli,$query_add_blocklistcomments);
			
			$query_eidt_close = "UPDATE `ads` set close_ads = \"$ads_status_new\"  where id = \"$ads_id\"";
			$execution_query_eidt_close = mysqli_query($mysqli,$query_eidt_close);
			
			}else{
				
			$query_eidt_close = "UPDATE `ads` set close_ads = \"$ads_status_new\"  where id = \"$ads_id\"";
			$execution_query_eidt_close = mysqli_query($mysqli,$query_eidt_close);
				
				}
			
			
			if(($execution_query_add_blocklistcomments and $execution_query_eidt_close) 
			|| $execution_query_eidt_close){
			

			?>
<div class="alert alert-success">
شكرا لك،لقد تم تنفيذ طلبك<br>
<a href="index.php">الذهاب إلى الرئيسية
</a>
</div>			<?php 
			}else{
			echo "
			<div class=\"alert alert-danger\">
			يوجد مشكلة حذف الأعلان من فضلك تواصل مع الأدارة 
			</div>
			";
			}
					

	
	}else{
?>





<script type="text/javascript">
<!--

function validate_form(form)
{
    
	if (form.reason.value == "") {
   alert('نرجو ذكر سبب الحذف وذلك لاجل تطوير الموقع');
    form.reason.focus();
    return false ;
  }
  else
  return true ;

}
	


//-->
</script>

<script type="text/javascript">
$(document).ready(function(){
  $(".more").hide();
  $("select").change(function(){
  
  if(this.value =="more"){
  
  $("input").show();
  } else {
    $(".more").hide();
	  $(".more").val('');
  }
  });
});
</script>

<table class="table  tableMsg table-borderedAds tableextra">
    <tbody><tr>
      <th>إغلاق الإعلان</th>
    </tr>
<form action="" method="post" name="postform" enctype="multipart/form-data" onsubmit="return validate_form(this);">



	<tr>
     
      <td>رقم الإعلان :
	  
	 <?php echo $ads_id; ?>
	  
	 
	 </td>
    </tr>
    <tr>
     
      <td>عنوان الاعلان:
	 <h4> <?php echo $ads_title; ?></h4> </td>
    </tr>
	
	
	<tr>
     
      <td>حالة الإعلان
	  <span class="label label-primary"> أختر الحالة التي تريد تغيير الإعلان إاليها</span>
      
	  	  <label class="radio inline"><input name="ads_status" value="0" type="radio"
          <?php if($close_ads !== "0"){ ?> checked="checked" <?php }?>>فتح</label> 
<label class="radio inline"><input name="ads_status" value="1" type="radio" <?php if($close_ads === "0"){ ?> checked="checked" <?php }?>>حذف</label> 
	  
	 
	 </td>
    </tr>
    
    <?php
	if($group_num === "1" || $group_num === "2"){ ?>
    	<tr>
     
      <td>منع العضو من فتح الأعلان
	  <span class="label label-primary">إذا كان الجواب نعم لن يتمكن العضو من فتح اعلانه</span>
      
	  	  <label class="radio inline"><input name="Prevent" value="0" type="radio">نعم</label> 
          
<label class="radio inline"><input name="Prevent" value="1" type="radio"checked="checked">لا</label> 
	  
	 
	 </td>
    </tr>
	<?php
	}
	?>
    
    
         <?php if($close_ads === "0"){ ?>
		<tr>
      <td>سبب حذف الإعلان
	  
	  
	  	  <input class="post form-control" style="width:50%" type="text" name="reason" size="45" maxlength="60" tabindex="2" value="">
	     <span class="red">نرجو ذكر سبب الحذف </span> 
	  	  
		 
		
	  
	  
	  
	  
	  </td>
    </tr>
    <?php } ?>
  


<tr>
      <td>&nbsp;
        <input class="btn  btn-danger" type="submit" name="submit" value="إرسال">

		
		
		</td></tr>


</tbody></table>


</form>

<?php
}
}else{echo "<div class=\"alert alert-info\">ليس لديك صلاحيات بالدخول إلي هذه الصفحة او انك اتبعت رابط خاطئ</div><br><br>";}

?>
</div>
</div>
<?php

ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>





 </body></html>
