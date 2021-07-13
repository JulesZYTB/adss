<?php
session_start();
ob_start();
include("../../include/config_header.php");	
ob_start();
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("../../include/config.php");
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
$fixed_htaccess = $url_hraj;
				
				include("../../include/functions/Secure_input2.php");
				
				$username = $_GET['username'];
				$username = secure_input2($username,"text_input");


		 		/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../../include/functions/ftime.php");
				include("../../include/config.php");
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_login = "SELECT * FROM `members` where username = \"$username\" ";
				$result_query = mysqli_query($mysqli,$query_login);
				$Data_member = mysqli_fetch_array($result_query);
				$number_of_members = mysqli_num_rows($result_query);
				$group_num = $Data_member[groupnumber];
				$group_num_profile = $Data_member[groupnumber];
				$username_member_2 =  $Data_member[username];
        		$email_member =  $Data_member[email];
				$id_user =  $Data_member[id];

				$Documentingemail =  $Data_member[Documentingemail];
				$documentingmobile =  $Data_member[documentingmobile];
				$time_date = $Data_member[timeregister];
				$Lastactivity_member = $Data_member[Lastactivity];
				$time_pro = timeago($time_date);
				$Lastactivity_member_pro = timeago($Lastactivity_member);
				$Lastactivity_member_plus = $Lastactivity_member + 60*10 ;
				$time_now = time();
				
				
				
				// اغلاق الأتصال بقاعدةالبيانات
				#mysqli_close($mysqli);
				
				
				
				
?>
<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $username_member_2; ?> - <?php echo $namewebsite; ?></title>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<link href="<?php echo $url_hraj; ?>templates/default/css/bootstrap.rtl.min.css" rel="stylesheet" media="screen">
<link href="<?php echo $url_hraj; ?>templates/default/css/custom3.css?v=1.4" rel="stylesheet" media="screen">
<link href="<?php echo $url_hraj; ?>templates/default/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $url_hraj; ?>templates/default/css/custom-icon-fonts.css?v=1.1">
<script async src="<?php echo $url_hraj; ?>templates/default/js/analytics.js"></script>
<script src="<?php echo $url_hraj; ?>templates/default/js/respond.min.js"></script>
<script src="<?php echo $url_hraj; ?>templates/default/js/html5shiv.js" type="text/javascript"></script>
<script src="<?php echo $url_hraj; ?>templates/default/js/respond.proxy.js"></script>
<script src="<?php echo $url_hraj; ?>templates/default/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo $url_hraj; ?>templates/default/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo $url_hraj; ?>templates/default/js/cars.js"></script>
<script src="<?php echo $url_hraj; ?>templates/default/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $url_hraj; ?>templates/default/js/v5.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>




<?php
include("../../header.php"); // استدعاء ملف الهيدر
?>
<div class="row" id="wrapper">


<div class="comment">
<h4>آخر ردود العضو </h4>

<a href="<?php  echo $url_hraj; ?>users/<?php echo $username; ?>" class="username"><?php echo  $username; ?></a>
</div>
	
	
<?php
$query_re_while = "SELECT * FROM comments WHERE id_His_response = \"$id_user\" order by id desc LIMIT 10";
$query_result_ex = mysqli_query($mysqli,$query_re_while);
while($inf_ex = mysqli_fetch_array($query_result_ex)){
// دالة الوقت ///

$timeads = $inf_ex[Time_added_co];
$id_ads = $inf_ex[id_ads];
$timeadsf = timeago($timeads);

mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print = "SELECT * FROM `ads` WHERE id = \"$id_ads\" ";
$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
$print_value = mysqli_fetch_array($result_keyinformation_print);
$ads_title = $print_value[ads_title];
echo "
<div class=\"comment\">

	<div class=\" adsheader\">
		››  على الإعلان
		<a href=\"$url_hraj";?>ads/<?php echo $id_ads; ?>/<?php echo $ads_title; ?><?php echo"\">$ads_title</a>
$timeadsf
	</div>
	<hr>
	$inf_ex[text]

	<hr>
			
</div>
			
			";

}
?>	

	
</div>
<?php
ob_end_flush();
include("../../footer.php"); // ادراج الفوتر
?>





 </body></html>
