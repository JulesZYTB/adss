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
$emilecommunication = $print_value[emilecommunication];
?>
<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>الإعلانات المميزة</title> 
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
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">



<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>الإعلانات المميزة</h2>

	

<div class="comment">
<h2 class="green"><i class="star fa fa-star "> </i> الإعلانات المميزة "المثبتة"</h2>


هي خدمة تتيح للتاجر تثبيت إعلانه في القسم ليظهر بشكل مميز ممايؤدي الى زيادة المبيعات.

<br />
<br />
<h3 class="green">ماهي تكلفة التثبيت؟ ماهي شروط تثبيت الإعلان؟</h3>

تثبيت الإعلانات خدمة مجانية. شروط تثبيت الإعلان هي:
<ul  >
<li>يجب أن تحصل على 20 تقييم إيجابي خلال آخر سنه.</li>
<li>يجب أن تكون السلعة تحتوي على صور و في القسم الصحيح.</li>
<li>يجب أن تكون السلعة لنفس التاجر وليست لشخص آخر.</li>

</ul>
<br />
<br />


 
للمزيد من المعلومات، يجب تسجيل الدخول بعضويتك.




<hr />
 <h2 class="green"> ميزة الرتبة</h2>
<span class="badge-info"><i class="star fa  fa-star"> </i> رتبة</span> <br /> <br />
الرتبة هي علامة تشجيعية و تقديرية مقدمة من الموقع للتاجر. <br />
<br />يمنح الموقع رتبة تاجر <span class="badge-info"><i class="star fa  fa-star"> </i> تاجر</span> خلال كل سنة. الحصول على رتبة تاجر يتطلب الحصول على:
<ul  >
<li>الحصول على أكثر من 30 تقييم إيجابي خلال السنة.</li>
<li>دفع العمولة المستحقة.</li>
</ul>
<br />
<br />
<br />
<br />


</div></div>

</div>
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>





 </body></html>
