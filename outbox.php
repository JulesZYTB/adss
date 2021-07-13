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
<title>الرسائل المرسلة - <?php echo $namewebsite; ?></title> 
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

	
	<div class="col-xs-12  col-sm-8 col-md-9 col-lg-9 ">
		
		<h3>الرسائل المرسلة</h3>
		
		
		
	<?php
	if($_POST['remove']){
	$id_pm_remove = $_POST['msg'];
	
	if(empty($id_pm_remove) or $id_pm_remove === 0){
	echo "
	<div class=\"alert alert-danger\">
	للأسف لم تختار الرسائل التي تريد حذفها
	</div>
	";
		}else{
			$impid_pm = implode(", ",$id_pm_remove);
			$impid_pm = secure_input($impid_pm,"text_input");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_pm_inbox_delete = "UPDATE `privatemessage` 
			set senderst = \"delete\" where id IN ($impid_pm) and sender = \"$id\" ";
			$execution_pm_inbox_delete = mysqli_query($mysqli,$query_pm_inbox_delete);
			if($execution_pm_inbox_delete){
				echo "
				<div class=\"alert alert-success\">تم حذف الرسائل المختارة</div>
				";
				}else{
						echo "
						<div class=\"alert alert-danger\">
						يبدو انه يوجد مشكلة في حذف الرسائل تواصل مع الأدارة
						</div>
						";
					}
			}
	
		
		}
	?>
		

    <?php
	
			 				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
				include("include/functions/ftime.php");
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_number_pm_inbox = "SELECT * FROM `privatemessage` 
				where sender = \"$id\" and senderst = \"\" order by id DESC";
				$result_query_number_pm_inbox = mysqli_query($mysqli,$query_number_pm_inbox);
				$num_pm_future_inbox = mysqli_num_rows($result_query_number_pm_inbox);
				if($num_pm_future_inbox > 0){
					?>
                 <form action="" method="post" name="postform">
				<div class="table-responsive ">
        	    <table class="table  tableMsg table-borderedAds">
				<tbody><tr>
				<th>اختيار</th>
		    	<th></th>
		     	<th>المرسل</th>
				<th>قبل</th>
                    <?php
					while($pm_inf = mysqli_fetch_array($result_query_number_pm_inbox)){
				
				$sender = $pm_inf[sender];
				$id = $pm_inf[id];
				$status = $pm_inf[status];
				$posttime = $pm_inf[posttime];
				$posttime_2 = timeago($posttime);
				
				include("include/config.php");
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_login_sendpm = "SELECT * FROM `members` where id = \"$sender\" ";
				$result_query_sendpm = mysqli_query($mysqli,$query_login_sendpm);
				$Data_member_sendpm = mysqli_fetch_array($result_query_sendpm);
				$number_of_members_sendpm = mysqli_num_rows($result_query_sendpm);
				$username_send_pm = $Data_member_sendpm[username];
				
				$type = $pm_inf[type];
				$Bonds = $pm_inf[Bonds];
				
				
				if($type === "message"){
					$href_pm = "readpm.php?id=$id";
					}
					
				if($type === "post"){
					$href_pm = "readpm.php?id=$Bonds";
					}
					
					
				
					?>
                    
		  		 </tr>
				<tr><td><input type="checkbox" name="msg[]" value="<?php echo $id; ?>"></td><td>
                <a href="<?php echo $href_pm; ?>"><img src="templates/default/images2/read.png" alt="">
                <?php echo $pm_inf[title]; ?></a> </td><td> 
                <a href="users/<?php echo $username_send_pm; ?>" class="username"><?php echo $username_send_pm; ?></a></td>
                <td><?php echo $posttime_2; ?></td></tr>
                
					<?php
					}
					?>
                    <tr>
		      		<td colspan="4">&nbsp;
		        	<input class="btn btn-danger" type="submit" name="remove" value="حذف الرسائل المختارة"></td></tr>
					</tbody></table>
					</div></form>
                    <?php
					}else{
					?>
                    <div class="alert alert-info">لاتوجد رسائل</div>
					<?php
						}
					?>
    
    



				

			

	</div>
	
	<div class="col-xs-12  col-sm-4 col-md-3 col-lg-3">	
		<div class="side-col">
		<ul>
		
		  <li><a href="inbox.php">الانتقال للرسائل الواردة</a></li>
		</ul>
		
		</div>
	</div>
</div><?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 




 </body></html>