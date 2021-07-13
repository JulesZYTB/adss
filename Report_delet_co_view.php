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
<title>قائمة الردود المحذوفة - الأسباب - <?php echo $namewebsite; ?></title> 
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
if($group_num === "1" || $group_num === "2"){}else{header("location:login.php");}
?>
      
      
<div class="row">

	
	<div class="col-xs-12  col-sm-8 col-md-9 col-lg-9 ">
		
		<h3>قائمة الردود المحذوفة</h3>
		
		
		
	<?php
	if($_POST['remove']){
	$id_pm_remove = $_POST['msg'];
	
	if(empty($id_pm_remove) or $id_pm_remove === 0){
	echo "
	<div class=\"alert alert-danger\">
	للأسف لم تحدد عناصر ليتم حذفها
	</div>
	";
		}else{
			$impid_pm = implode(", ",$id_pm_remove);
			$impid_pm = secure_input($impid_pm,"text_input");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_pm_inbox_delete = "DELETE FROM `blocklistcomments` WHERE id IN ($impid_pm)";
			$execution_pm_inbox_delete = mysqli_query($mysqli,$query_pm_inbox_delete);
			if($execution_pm_inbox_delete){
				echo "
				<div class=\"alert alert-success\">تم إلغاء حظر العناصر المختارة بنجاح</div>
				";
				}else{
						echo "
						<div class=\"alert alert-danger\">
						يبدو انه يوجد مشكلة في الحذف من فضلك تواصل مع الأدارة
						</div>
						";
					}
			}
	
		
		}
	?>
    
    
    <?php
	if($_POST['remove_block']){
	$id_pm_remove = $_POST['msg'];
	
	if(empty($id_pm_remove) or $id_pm_remove === 0){
	echo "
	<div class=\"alert alert-danger\">
	للأسف لم تختار عناصر يتم حذفها
	</div>
	";
		}else{
			$impid_pm = implode(", ",$id_pm_remove);
			$impid_pm = secure_input($impid_pm,"text_input");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_pm_inbox_delete = "UPDATE `blocklistcomments` 
			set `read` = \"1\" where id IN ($impid_pm)";
			$execution_pm_inbox_delete = mysqli_query($mysqli,$query_pm_inbox_delete);
			if($execution_pm_inbox_delete){
				echo "
				<div class=\"alert alert-success\">تم حذف العناصر المختارة بنجاح</div>
				";
				}else{
						echo "
						<div class=\"alert alert-danger\">
						يبدو انه يوجد مشكلة في حذف العناصر المختارة فضلا تواصل مع الأدارة
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
				$query_number_pm_inbox = "SELECT * FROM `blocklistcomments` where `read` = \"0\" order by id DESC";
				$result_query_number_pm_inbox = mysqli_query($mysqli,$query_number_pm_inbox);
				$num_pm_future_inbox = mysqli_num_rows($result_query_number_pm_inbox);
				if($num_pm_future_inbox > 0){
					?>
                 <form action="" method="post" name="postform">
				<div class="table-responsive ">
        	    <table class="table  tableMsg table-borderedAds">
				<tbody><tr>
				<th>اختيار</th>
		    	<th>نص الرد المحذوف و رقم الأعلان</th>
		     	<th>صاحب الرد المحذوف</th>
                <th>السبب</th>
                    <?php
				while($pm_inf = mysqli_fetch_array($result_query_number_pm_inbox)){
				
				
				$reson = $pm_inf[reason];
				$comments = $pm_inf[comments];
				$id_Banning = $pm_inf[id_Banning];
				$id_report = $pm_inf[id];
				$id_ads_del = $pm_inf[id_ads];
			
				include("include/config.php");
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				
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
			$query_login_m_ad02 = "SELECT * FROM `members` where id = \"$id_Banning\" ";
			$result_query_m_ad02 = mysqli_query($mysqli,$query_login_m_ad02);
			$Data_member_m_ad02 = mysqli_fetch_array($result_query_m_ad02);
			$group_num_m_ad02 = $Data_member_m_ad02[groupnumber];
			$username_member_2_m_ad02 =  $Data_member_m_ad02[username];
			$id_user_m_ad02 =  $Data_member_m_ad02[id];	 
			
			

					
				
					?>
                    
		  		 </tr>
				<tr><td><input type="checkbox" name="msg[]" value="<?php echo $id_report; ?>"></td><td>
               نص الرد : <br><?php echo $comments;  ?>
                <br>
                 <a href="ads/<?php echo $id_ads_del; ?>">الأنتقال للأعلان رقم ( <?php echo $id_ads_del; ?> )</a>
                </td><td> 
                <a href="users/<?php echo $username_member_2_m_ad02; ?>" class="username"><?php echo $username_member_2_m_ad02; ?></a></td>
               <td><?php echo $reson; ?></td>
                
					<?php
					}
					?>
                    <tr>
		      		<td colspan="4">&nbsp;
		        	<input class="btn btn-danger" type="submit" name="remove_block" value="حذف العناصر المختارة">
                    - <input class="btn btn-info" type="submit" name="remove" value="إلغاء حظر "></td></tr>
					</tbody></table>
					</div></form>
                    <?php
					}else{
					?>
                    <div class="alert alert-info">لا يتوفر عناصر في قائمة الردود المحذوفة</div>
					<?php
						}
					?>
    
    



				

			

	</div>

</div><?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 




 </body></html>