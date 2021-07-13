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
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2> رسوم الإعلان عن الخدمات المكررة</h2>

	

<p>الإعلان عن الخدمات المكررة يتطلب دفع رسوم  بمبلغ  300 ريال سنويا.</p><h3 class="green">ماهي الخدمات المكررة؟</h3><p>هي الخدمات التي يتم الإعلان عنها بشكل مكرر مثل:</p><ul>  <li>خدمات نقل العفش.</li>  <li>خدمات المقاولات العامة.</li>  <li>خدمات النظافة.</li>  <li>المظلات و السواتر</li></ul><h3 class="green">ماهي فائدتي كمعلن من دفع الرسوم؟</h3><ul>  <li>إمكانية الإعلان بالموقع. لن يتم السماح لأي معلن لم يدفع الرسوم بالإعلان عن الخدمات المكررة.</li>  <li>منافسين أقل.</li></ul><h3 class="green">كم مبلغ الرسوم؟</h3><p>رسوم الإعلان هي 300 ريال بالسنة.</p><h3 class="green">كيف يتم دفع الرسوم؟</h3><p>عن طريق التحويل البنكي ثم إبلاغنا عبر صفحة <a href="http://haraj2.hostwega.com/commission.php">حساب عمولة الموقع</a>.</p><h3 class="green">هل يمكن التجربة قبل دفع الرسوم؟</h3><p>لايمكن التجربة.</p><h3 class="green">هل يمكن استرداد مبلغ الرسوم؟</h3><p>لايمكن ذلك.</p><h3 class="green">هل الرسوم ثابتة؟</h3><p>الرسوم ليست ثابتة. الرسوم من الممكن أن ترتفع في أي وقت.</p><h3 class="green">هل يمكنني الإعلان عن الخدمات المكررة؟</h3><p>يجب تسجيل الدخول حتى يتم التأكد من عضويتك. </p><h3 class="green">هل توجد شروط على العضوية؟</h3><p>حاليا لاتوجد شروط أخرى سوى شروط الخدمة و معاهدة إستخدام الموقع. مستقبلا سوف نقوم بمنع الاعضاء الذين ليس لديهم تقييمات من الإعلان عن الخدمة لذلك أحرص على الحصول على تقييم من عملائك.</p>








</div></div>

</div>
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>





 </body></html>
