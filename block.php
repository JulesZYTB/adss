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
 			$comment_id = $_GET['comment_id'];
			$comment_id = secure_input($comment_id,"int");
			
			$ads_id = $_GET['ads_id'];
			$ads_id = secure_input($ads_id,"int");
			
			$block_username = $_GET['block_username'];
			$block_username = secure_input($block_username,"text_input");	
			
			
			/// استعدعاء ملف الأتصال بقاعدة البيانات
			include("include/config.php");
			$view_query_ads = "SELECT * FROM `comments` WHERE id = \"$comment_id\"";
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$mysqli_query_co = mysqli_query($mysqli,$view_query_ads);
			$fetch_array_view_co = mysqli_fetch_array($mysqli_query_co);
			$id_His_response = $fetch_array_view_co[id_His_response];
			$id_ads = $fetch_array_view_co[id_ads];
			$comments_text = $fetch_array_view_co[text];
			
			
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
if(($His_announcement_saa === $id_member and $id_His_response !== $id_member) || $group_num === "1" || $group_num === "2"){
 ?>
<h3>إدارة الرد</h3>


<div class="comment">


<script type="text/javascript">
<!--

function validate_form(form)
{
    
	if (form.reason.value == "") {
   alert('يجب ذكر سبب الحظر');
    form.reason.focus();
    return false ;
  }
  else
  return true ;

}
	


//-->
</script>

<?php
if($_POST['submit']){
	
	
	
			$reason = $_POST['reason'];
			$reason = secure_input($reason,"text_input");
			
			
			$bloack_range = $_POST['bloack_range'];
			$bloack_range = secure_input($bloack_range,"text_input");
						
			
			include("include/config.php");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_delet_comments = "DELETE FROM `comments` WHERE `id` = \"$comment_id\" LIMIT 1;";
			$execution_query_delet_comments = mysqli_query($mysqli,$query_delet_comments);
			
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_add_blocklistcomments = "INSERT INTO `blocklistcomments` 
			(`id_Banning`, `id_Taboo`, `id_ads`, `reason`, `Never`, `comments`) 
			VALUES (\"$id_user_m_ad02\", \"$id_member\", \"$id_ads\", \"$reason\"
			, \"$bloack_range\", \"$comments_text\")";
			$execution_query_add_blocklistcomments = mysqli_query($mysqli,$query_add_blocklistcomments);
			
			
			if($execution_query_add_blocklistcomments){
			

			echo "
			<div class=\"alert alert-success\">
			تم الإجراء.
			<br>
			"?>
			<a href="<?php echo $fixed_htaccess; ?>ads/<?php echo $id_ads; ?>">العودة للإعلان
			<?php 
			echo "
			</a>
			</div>";
			}else{
				
			echo "
			<div class=\"alert alert-danger\">
			يبدو انه يوجد مشاكل في حذف الردود تواصل مع الأدارة 
			</div>
			";
			}
					

	
	}else{
?>
<form action="" method="post" name="postform" enctype="multipart/form-data" onsubmit="return validate_form(this);">

<table class="table  tableMsg table-borderedAds tableextra">
    <tbody><tr>
      <th colspan="2"><b>حذف الرد + منع العضو من الرد على إعلاناتك</b></th>
    </tr>

<tr>    
      <td width="18%"><b>نص الرد</b></td><td> 
      <?php 
	  echo $fetch_array_view_co[text];
	  ?>  
	 
	 </td>
    </tr>

<tr>    
      <td width="18%"><b>أسم العضو</b></td><td> 
        
	 <?php echo $username_member_2_m_ad02; ?>
     
	  <input name="block_username" value="mutleb" type="hidden">
	 </td>
    </tr>
	<tr>    
      <td width="18%"><b>سبب الحذف</b></td><td align="right">   
      	 <span class="label label-primary"> يجب ذكر سبب حذف الرد بشكل واضح. سبب الحذف سوف يشاهده المشرفين فقط. </span>
      	 <br>
      	 
<br>
      	 
	 <input class="post form-control" style="width:50%" type="text" name="reason" size="45" maxlength="60" tabindex="2" value="">
<span class="label label-danger">عدم كتابة سبب واضح سوف يؤدي الى المنع من أستخدام هذه الخاصية من دون تنبيه.</span>

	    
<br><br>



	 </td>
    </tr>
<tr>
     
      <td width="18%"><b>منع العضو</b></td><td align="right"> 
	  
	 
	  <label>
      <input name="bloack_range" value="all" type="radio"> أريد منع العضو  <?php echo $username_member_2_m_ad02; ?> من الرد على جميع إعلاناتي</label> <br>
<label><input name="bloack_range" value="<?php echo $id_ads; ?>" type="radio" checked="checked"> أريد السماح للعضو بالرد على إعلاناتي</label> 
	 
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
}else{echo "خطأ في رابط الصفحة<br><br>";}

?>
</div>
</div>
<?php

ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>





 </body></html>
