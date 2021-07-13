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

<?php
if($documentingmobile !== "1" and $messagesphone === "on"){header("location:verify_mobile.php");}else{
?>

<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">


<?php 



	$username_sendpm = $_GET['username'];
	$username_sendpm = secure_input($username_sendpm,"text_input");
	$title_sendpm = $_GET['title'];
	$title_sendpm = secure_input($title_sendpm,"text_input");
	
	include("include/config.php");
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_login_sendpm = "SELECT * FROM `members` where username = \"$username_sendpm\" ";
	$result_query_sendpm = mysqli_query($mysqli,$query_login_sendpm);
	$Data_member_sendpm = mysqli_fetch_array($result_query_sendpm);
	$number_of_members_sendpm = mysqli_num_rows($result_query_sendpm);
	$username_send_pm = $Data_member_sendpm[username];
	$id_send_pm = $Data_member_sendpm[id];
	$email_fu = $Data_member_sendpm[email];
	$subscribe_2_fu = $Data_member_sendpm[subscribe_2];
	if($number_of_members_sendpm > 0){}else{header("location:users/$username_sendpm");}
	
	
			include("include/config.php");
		  	mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_number_pm_inbox = "SELECT * FROM `blocklistpm` where id_Banning = \"$id_member\" 
			and id_Taboo = \"$id_send_pm\" and Never = \"all\" order by id DESC";
			$result_query_number_pm_inbox = mysqli_query($mysqli,$query_number_pm_inbox);
			$num_pm_future_inbox = mysqli_num_rows($result_query_number_pm_inbox);
			if($num_pm_future_inbox > 0){
			?>
            <br>
            <div class="alert alert-info">
	لقد قام العضو <?php echo $username_send_pm; ?> بحظرك من مراسلته
	</div>	
            <?php
			}else{	
		  /// حظر العضو من الرد .
		  
		  
		  
	
	$title = $_POST['title'];
	$title = secure_input($title,"text_input");
	
	$message = $_POST['message'];
	$message = nl2br(secure_input($message,"text_input"));
	
	$time_now_send_pm = time();
	
	
	include("include/config.php");
	
	if($_POST['submit']){
	?>		

<div class="alert alert-info">
نرجو ملاحظة ان لإدارة الموقع الحق في قراءة الرسائل وذلك لأسباب رقابية.
</div>


	<?php
	
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_add_send_pm = "	INSERT INTO `privatemessage` 
		(`id`, `title`, `message`, `sender`, `future` , `status` , `type` , `posttime`) 
		VALUES (NULL, \"$title\", \"$message\", \"$id_member\", \"$id_send_pm\",\"unread\",\"message\",\"$time_now_send_pm\");";
			$execution_query_add_send_pm = mysqli_query($mysqli,$query_add_send_pm);
			
			if($execution_query_add_send_pm){
				
						if($subscribe_2_fu === "1"){
							
					$subject = "رسالة جديدة لك في $namewebsite"; 
					$message = "
					أخي $username_send_pm,

توجد رسالة جديدة لك في $namewebsite‎، فضلا أضغط على الرابط التالي لمشاهدة الرسالة:
$url_hraj"."inbox.php





لإلغاء الاشتراك في خدمة التبليغ نرجو الضغط على الرابط التالي

$url_hraj"."unsubscribe.php
					"  ;
						// الدالة mail 
					mail ( "$email_fu" , "$subject" , "$message");
							}
				
						echo "
						<div class=\"alert alert-success\">
						تم إرسال الرسالة
						</div>
						";
						
						
						}else{
						echo "
						<div class=\"alert alert-danger\">
						يبدو انه يوجد مشكلة في الرسائل الخاصة قم بالتواصل مع الأدارة عن طريق اتصل بنا .
						</div>
						";
					}
					
					
	}else{
	?>

<script type="text/javascript">
<!--

function validate_form(form)
{
    
	if (form.title.value == "") {
   alert('فضلا قم باضافة عنوان للرساله');
    form.title.focus();
    return false ;
  }
  else if (form.message.value == "") {
   alert('فضلا قم بكتابة نص');
    form.message.focus();
    return false ;
  }
  return true ;

}
	


//-->
</script>



<form action="" method="post" onsubmit="return validate_form(this);" class="form-inline">
  <table class="table  tableMsg table-borderedAds tableextra">

		<tbody><tr>
			<th>
				
					إرسال رسالة خاصة
				
				</th>
		</tr>
				<tr>
				<td>
						<div class="form-group">
					مستلم الرسالة:<input class="post form-control" type="text" name="to" size="45" maxlength="60" tabindex="2" value="<?php echo $username_send_pm; ?>" readonly>


						</div>
				</td>
				</tr>
				<tr>
				<td>
					<div class="form-group">
					عنوان الرسالة:<input class="post form-control" type="text" name="title" size="45" value="<?php echo $title_sendpm; ?>" maxlength="60" tabindex="2" value="">
					</div>

				</td>
				</tr>
				<tr>
			<td>
				
							نص الرسالة:
							<br><textarea name="message" rows="12" cols="76" class="form-control"></textarea>
			</td>
		</tr>
		<tr>
		  <td>
			<input class="btn btn-primary" name="submit" value="إرســـال" type="submit"></td>			
		</tr>
	</tbody></table>
	</form>
	<?php
	}
	}
	?>
		
	</div>
    

</div>
<?php
}

ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 




 </body></html>