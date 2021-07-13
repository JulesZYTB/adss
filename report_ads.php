<?php
session_start();
ob_start();
include("include/config_header.php");	
ob_start();
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
      
      
<div class="row">
	
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">




<h3>إبلاغ عن إعلان مخالف </h3>



<?php
if($_POST['submit']){
	
	
	
			$comment_body = $_POST['comment_body'];
			$comment_body = secure_input($comment_body,"text_input");
			
			
			$ads_nooa = $_POST['ads_nooa'];
			$ads_nooa = secure_input($ads_nooa,"text_input");
			
			$id_ads = $_GET['link'];
			$id_ads = secure_input($id_ads,"text_input");
				
			
			if($ads_nooa === "no"){
				?>
                <div class="alert alert-info">
عفواً، ليس هناك داعي للإبلاغ اذا كان الاعلان غير مخالف! ، اذا كنت تريد التواصل مع صاحب الاعلان فيجب عليك الحصول على معلومات الاتصال من خلال الإعلان نفسه
</div>
                <?php
				}else{
	
			include("include/config.php");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_add_blocklistcomments = "INSERT INTO `report_ads` 
			(`id_ads`, `Reasons`, `Contrary_to`) 
			VALUES (\"$id_ads\", \"$comment_body\", \"$ads_nooa\")";
			$execution_query_add_blocklistcomments = mysqli_query($mysqli,$query_add_blocklistcomments);
			
			
			if($execution_query_add_blocklistcomments){?>
            
<div class="alert alert-info">
تم ابلاغ المشرف، جزاك الله خير
</div>
            
			<?php 
			}else{
				
			echo "
			<div class=\"alert alert-danger\">
			يوجد مشكلة في الأبلاغ من فضلك تواصل مع الأدارة
			</div>
			";
			}
					
				}
	
	
	}else{
?>
<script type="text/javascript">
<!--

function validate_form(form)
{
    
	if (form.comment_body.value == "") {
   alert('فضلا قم بكتابة سبب الابلاغ عن الاعلان');
    form.comment_body.focus();
    return false ;
  }
  else if(!(document.getElementById('ads_nooa_no').checked || document.getElementById('ads_nooa_order').checked)){
alert('يجب الإجابة على السؤال');
return false ;
}
  return true ;

}
	


//-->
</script>



<form action="" method="post" id="postform" name="postform" onsubmit="return validate_form(this);">
	<table class="table  tableMsg table-borderedAds tableextra">

		<tbody><tr><th>إبلاغ عن إعلان مخالف</th>
				</tr>
				<tr>
			<td>
				
						<div class="alert alert-warning">
تحذير:هذا النموذج مخصص فقط للإبلاغ عن الاعلانات المخالفه وليس للتواصل مع صاحب الاعلان
</div>
<div class="alert alert-info">
الرسائل المرسلة عبر هذا النموذج لن تصل إلى صاحب الإعلان!</div>
هل هذا الإعلان مخالف؟   
 <br>
	  <input name="ads_nooa" type="radio" value="yes" id="ads_nooa_no"> 
	 نعم
	<br>  <input name="ads_nooa" type="radio" value="no" id="ads_nooa_order"> 
	  لا
	  <br>
	  <br>
<textarea name="comment_body" id="message" class="form-control"></textarea>

<br>
<input class="btn  btn-primary" name="submit" value="إرســـال" type="submit">
					</td>
		</tr>
		
	</tbody></table>
	</form>
	
<?php
	}
?>

</div>
</div><?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 




 </body></html>