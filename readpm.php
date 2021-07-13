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
      
 <div class="row">
	<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12 ">
		
			    <?php
				include("include/functions/ftime.php");
				$id_pm_show = $_GET['id'];
				$id_pm_show = secure_input($id_pm_show,"int");
				
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$query_edit_pm_st = "UPDATE `privatemessage` set status = \"read\" 
						where id = \"$id_pm_show\" and future = \"$id_member\"";
						$execution_query_edit_pm_st = mysqli_query($mysqli,$query_edit_pm_st);
			
			
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$query_edit_pm_st = "UPDATE `privatemessage` set status = \"read\" 
						where Bonds = \"$id_pm_show\" and future = \"$id_member\"";
						$execution_query_edit_pm_st = mysqli_query($mysqli,$query_edit_pm_st);
				
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_show_pm = "SELECT * FROM `privatemessage` WHERE id = \"$id_pm_show\" LIMIT 1";
				$result_query_pm = mysqli_query($mysqli,$query_show_pm);
				$fecth_array_pm = mysqli_fetch_array($result_query_pm);
				$num_rows_pm = mysqli_num_rows($result_query_pm);
				$posttime = $fecth_array_pm[posttime];
				$posttime_2 = timeago($posttime);
				$sender = $fecth_array_pm[sender];
				$future = $fecth_array_pm[future];
				$status_pm = $fecth_array_pm[status];
				$tile_message = $fecth_array_pm[title];
				$sender_pm_reader = $fecth_array_pm[sender];
				
				include("include/config.php");
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_login_sendpm = "SELECT * FROM `members` where id = \"$sender_pm_reader\" ";
				$result_query_sendpm = mysqli_query($mysqli,$query_login_sendpm);
				$Data_member_sendpm = mysqli_fetch_array($result_query_sendpm);
				$number_of_members_sendpm = mysqli_num_rows($result_query_sendpm);
				$username_send_pm = $Data_member_sendpm[username];
				$group_num_m_ad02 = $Data_member_sendpm[groupnumber];
				
					if($future === $id || $sender === $id){

								
?>


<script type="text/javascript">
<!--

function validate_form(form)
{
    
if (form.message.value == "") {
   alert('فضلا قم بكتابة نص');
    form.message.focus();
    return false ;
  }
  else
  return true ;

}
	$(document).ready(function() {
	 	 $('.old_pm').hide();
   $('#view_link').click(function(){
     $('.old_pm').toggle();
	 	 $('#view_link').hide();

   });
 });



//-->
</script>


<h4>رسالة خاصة</h4>

<?php
$id_pm_show = $_GET['id'];
$id_pm_show = secure_input($id_pm_show,"int");
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_show_post_fix = "SELECT * FROM `privatemessage` WHERE Bonds = \"$id_pm_show\" ";
$result_show_post_fix = mysqli_query($mysqli,$query_show_post_fix);
$num_show_post = mysqli_num_rows($result_show_post_fix);
if($num_show_post > 0){
?>

<div class="comment msg_div" id="view_link">
	<a name="1" href="#1">إظهار كل الرسائل</a> 
</div>


<div class="comment  old_pm  msg_div" style="display: none;">
	
<div class="comment_header msg_high">


				 
 <?php
 }else{
 ?>
<div class="comment  msg_div">
<div class="comment_header msg_high">
<?php
}
?>
	<h4><?php echo $fecth_array_pm[title]; ?></h4>
	
	
			المرسل:	  
				
			  <a href="users/<?php echo $username_send_pm; ?>" class="username"><?php echo $username_send_pm; ?></a>
              
              <?php if($group_num_m_ad02 === "1"){ ?><span style="background:#<?php echo $color1_group; ?>;" class="label label-success">مدير الموقع</span><?php } ?>

<?php if($group_num_m_ad02 === "6"){ ?><span style="
background:#<?php echo $color3_group; ?>;" class="label label-success">عضو</span><?php } ?>


<?php if($group_num_m_ad02 === "2"){ ?><span class="label label-success">مشرف الموقع</span><?php } ?>

<?php if($group_num_m_ad02 === "5"){ ?><span style="background:#<?php echo $color2_group; ?>;" class="label label-success">عضو محظور</span><?php } ?>
			  
			  				  <br>
				<?php echo $posttime_2; ?>
			
</div>
<div class="msg_low">

<div style="clear:both;"></div>
<?php echo $fecth_array_pm[message]; ?>
	<span style="float: left;"> 	
				  
 <?php if($sender_pm_reader === $id_member){ ?>
<span class="label label-default">
<?php if($status_pm === "unread"){ ?>
 لم تتم قراءة الرسالة حتى الان 
<?php }?>

<?php if($status_pm === "read"){ ?>
تمت قراءة الرسالة
<?php }?>


</span>
<?php
}else{
?>
<a href="blockcontact.php?user=<?php echo $username_send_pm; ?>"> حظر المرسل؟</a>
<?php
}
?>

				
				</span>
<div style="clear:both;"></div>
</div>
</div>


	
    
    
    
    
    
    
    
    
    
    
    
    
<?php 
include("include/config.php");

mysqli_query($mysqli,"SET NAMES 'utf8'");
$new_num_show_post_query = $num_show_post - 1;
if($new_num_show_post_query > 0){
$query_show_post = "SELECT * FROM `privatemessage` WHERE Bonds = \"$id_pm_show\" ORDER BY id ASC LIMIT $new_num_show_post_query ";
$result_show_post = mysqli_query($mysqli,$query_show_post);
?>

                    <?php
				while($pm_post_show = mysqli_fetch_array($result_show_post)){
				$sender_post_pm = $pm_post_show[sender];
				$status_post = $pm_post_show[status];
				$query_login_sendpm = "SELECT * FROM `members` where id = \"$sender_post_pm\" ";
				$result_query_sendpm = mysqli_query($mysqli,$query_login_sendpm);
				$Data_member_sendpm = mysqli_fetch_array($result_query_sendpm);
				$number_of_members_sendpm = mysqli_num_rows($result_query_sendpm);
				$username_send_pm_post = $Data_member_sendpm[username];
				$groupnumber_send_pm_post = $Data_member_sendpm[groupnumber];
				$time_post = $pm_post_show[posttime];
				$time_post_2 = timeago($time_post);
				$message_post = $pm_post_show[message];
				$group_num_m_ad02 = $Data_member_sendpm[groupnumber];
					
					?>

<div class="comment  old_pm  msg_div" style="display: none;">
<div class="comment_header msg_high">
	<h4><?php echo $pm_post_show[title]; ?></h4>
			المرسل:	  
<a href="users/<?php echo $username_send_pm_post; ?>" class="username"><?php echo $username_send_pm_post; ?></a>
              <?php if($group_num_m_ad02 === "1"){ ?><span style="background:#<?php echo $color1_group; ?>;" class="label label-success">مدير الموقع</span><?php } ?>

<?php if($group_num_m_ad02 === "6"){ ?><span style="
background:#<?php echo $color3_group; ?>;" class="label label-success">عضو</span><?php } ?>


<?php if($group_num_m_ad02 === "2"){ ?><span class="label label-success">مشرف الموقع</span><?php } ?>

<?php if($group_num_m_ad02 === "5"){ ?><span style="background:#<?php echo $color2_group; ?>;" class="label label-success">عضو محظور</span><?php } ?>
			  
<br><?php echo $time_post_2; ?>
			 
			
			
			
</div>



<div class="msg_low">
<?php echo $message_post; ?>
<div style="clear:both;"></div>
<span style="float: left;"> 
	
<?php if($sender_post_pm === $id_member){ ?>
<span class="label label-default">
<?php if($status_post === "unread"){ ?>
 لم تتم قراءة الرسالة حتى الان 
<?php }?>

<?php if($status_post === "read"){ ?>
تمت قراءة الرسالة
<?php }?>


</span>
<?php
}else{
?>
<a href="blockcontact.php?user=<?php echo $username_send_pm_post; ?>"> حظر المرسل؟</a>
<?php
}
?>

</span>
<div style="clear:both;"></div>
</div>
</div>

<?php
}
}
?>


  
<?php 
include("include/config.php");
$id_pm_show = $_GET['id'];
$id_pm_show = secure_input($id_pm_show,"int");
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_show_post = "SELECT * FROM `privatemessage` WHERE Bonds = \"$id_pm_show\" ORDER BY id DESC LIMIT 1";
$result_show_post = mysqli_query($mysqli,$query_show_post);
?>

                    <?php
				while($pm_post_show = mysqli_fetch_array($result_show_post)){
				$sender_post_pm = $pm_post_show[sender];
				$status_post = $pm_post_show[status];
				$query_login_sendpm = "SELECT * FROM `members` where id = \"$sender_post_pm\" ";
				$result_query_sendpm = mysqli_query($mysqli,$query_login_sendpm);
				$Data_member_sendpm = mysqli_fetch_array($result_query_sendpm);
				$number_of_members_sendpm = mysqli_num_rows($result_query_sendpm);
				$username_send_pm_post = $Data_member_sendpm[username];
				
				$time_post = $pm_post_show[posttime];
				$time_post_2 = timeago($time_post);
				$message_post = $pm_post_show[message];
				$group_num_m_ad02 = $Data_member_sendpm[groupnumber];
					
					?>


<div class="comment  msg_div">
<div class="comment_header msg_high">
<h4><?php echo $pm_post_show[title]; ?></h4>
			المرسل:	  
<a href="users/<?php echo $username_send_pm_post; ?>" class="username"><?php echo $username_send_pm_post; ?></a>
              <?php if($group_num_m_ad02 === "1"){ ?><span style="background:#<?php echo $color1_group; ?>;" class="label label-success">مدير الموقع</span><?php } ?>

<?php if($group_num_m_ad02 === "6"){ ?><span style="
background:#<?php echo $color3_group; ?>;" class="label label-success">عضو</span><?php } ?>


<?php if($group_num_m_ad02 === "2"){ ?><span class="label label-success">مشرف الموقع</span><?php } ?>

<?php if($group_num_m_ad02 === "5"){ ?><span style="background:#<?php echo $color2_group; ?>;" class="label label-success">عضو محظور</span><?php } ?>
			  
<br><?php echo $time_post_2; ?>
			 
			
			
			
</div>



<div class="msg_low">
<?php echo $message_post; ?>
<div style="clear:both;"></div>
<span style="float: left;"> 
	
<?php if($sender_post_pm === $id_member){ ?>
<span class="label label-default">
<?php if($status_post === "unread"){ ?>
 لم تتم قراءة الرسالة حتى الان 
<?php }?>

<?php if($status_post === "read"){ ?>
تمت قراءة الرسالة
<?php }?>


</span>
<?php
}else{
?>
<a href="blockcontact.php?user=<?php echo $username_send_pm_post; ?>"> حظر المرسل؟</a>
<?php
}
?>

</span>
<div style="clear:both;"></div>
</div>
</div>

<?php
}
?>
    
    



	



<div class="comment">

											
		<?php 
		if($_POST['submit']){
		$title_num = $num_show_post + 1;
		$tile_post = "رد $title_num:$tile_message";
		
		$message = $_POST['message'];
		$message = nl2br(secure_input($message,"text_input"));
		$time_now_send_pm = time();
		
		if($id_member === $sender){
			$future_new = $future;
			}
			
		if($id_member === $future){
			$future_new = $sender;
			}
			
	include("include/config.php");
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_login_sendpm = "SELECT * FROM `members` where id = \"$future_new\" ";
	$result_query_sendpm = mysqli_query($mysqli,$query_login_sendpm);
	$Data_member_sendpm = mysqli_fetch_array($result_query_sendpm);
	$number_of_members_sendpm = mysqli_num_rows($result_query_sendpm);
	$username_send_pm = $Data_member_sendpm[username];
	$id_send_pm = $Data_member_sendpm[id];
	$email_fu = $Data_member_sendpm[email];
	$subscribe_2_fu = $Data_member_sendpm[subscribe_2];
		
		
		
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_add_send_pm = "	INSERT INTO `privatemessage` 
		(`id`, `title`, `message`, `sender`, `future` , `status` , `type` , `posttime`,Bonds) 
		VALUES (NULL, \"$tile_post\", \"$message\", \"$id_member\", \"$future_new\",\"unread\",\"post\",\"$time_now_send_pm\",\"$id_pm_show\");";
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
				تم الرد على الرسالة.
				<br>
				<a href=\"inbox.php\">
				العودة الى الرسائل الواردة.
				</a>
				</div>
						";
						}else{
						echo "
						<div class=\"alert alert-danger\">
						يوجد مشكلة في الرد على الرسائل الخاصة من فضلك تواصل مع الأدارة عن طريق اتصل بنا
						</div>
						";
					}
					
			
			}else{
		?>			
			
            
            
            								
					
																<div class="alert alert-warning">

    <li>أحذر من أي معلن يطلب منك الإتصال به :مثلا يطلب رقم جوالك أو يطلب بريدك.  
</li>
    <li>لاتنسى البحث في  <a href="checkacc.php">القائمة السوداء</a> برقم جوال المعلن أو رقم حسابه اذا قررت التعامل غير المباشر معه.
</li>

											</div>
											
											<a href="javascript: history.go(-1)">رجوع</a>
<br>
<span class=" hidden-sm">
	
	الرد على الرسالة:
</span>
	
<div class="well">
	
	
	<form action="" method="post" id="postform" name="postform" onsubmit="return validate_form(this);">
						<textarea name="message" placeholder="أكتب ردك هنا" class="form-control" rows="7"></textarea>
						
					
					<input class="btn btn-primary" name="submit" value="إرســـال" type="submit">
					</form>
				</div>
</div>
						
			
							
			






<?php
}

}	else{
					echo "
					<br>
					الرساله غير موجوده
					<br><br><br>";
					}
?>


	

</div>
</div>
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 




 </body></html>