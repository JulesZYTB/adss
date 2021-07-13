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
<title>عضوية معارض السيارات و مكاتب العقار</title> 
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


<h3 class="green"><b>عضوية معارض السيارات و مكاتب العقار</b></h3>
<div class="comment">

<h3 class="green">عن العضوية</h3>
هذة العضوية هي عضوية مدفوعة تناسب احتياج كل معلن يقوم بتسويق سلع كثيرة و مرتفعة الثمن مثل السيارات و العقارات.
</div><div class="comment">
<h3 class="green">مزايا العضوية</h3>

- العمولة مجانية على الاعلانات المعلن عنها خلال فترة الإشتراك. الاعلانات التي ليست خلال تلك الفترة توجد عليها عمولة.
<br />- امكانية اضافة   4 اعلانات في اليوم.
<br />- إمكانية منع الردود.
<br />- وجود علامة تسجيل العمولة في رابط العضوية ممايزيد ثقة الزبائن.



</div><div class="comment">
<h3 class="green">أسعار الاشتراكات</h3>





<b>العرض الأول:</b> <a href="#">اشتراك لمدة 6 شهور بسعر 1490 ريال </a>
<br /><br />
<a href="#" class="btn btn-primary btn-lg " role="button">الاشتراك الآن لمدة 6 شهور</a>
<br />
<br />
<b>العرض الثاني:</b> <a href="h#>اشتراك لمدة سنة بسعر 2390 ريال </a> <span class="label label-success">توفير 20%</span>
<br /><br />
<a href="#" class="btn btn-primary btn-lg " role="button">الاشتراك الآن لمدة سنة</a>

<br /><br />
</div><div class="comment">
<h3  class="green">شروط العضوية</h3>


- يجب على المشترك وجود أكثر من 3 اعلانات مصورة كل أسبوع خلال فترة الاشتراك.
<br />- عدم الاعلان للغير.
<br />- عدم تكرار الإعلان عن نفس السلعة أكثر من مره خلال يومين.
<br />- عدم التنازل عن العضوية لعضو آخر او بيع العضوية.



</div>
<div class="comment">
<h3  class="green">هل الاشتراك اجباري؟</h3>

الاشتراك اختياري وليس اجباري. الجهة التي لاترغب في الاشتراك في هذة الخدمة بالامكان ان تستمر باستخدام العضوية العادية (ذات العمولة)
</div>

<div class="comment">
<h3  class="green">هل هذة العضوية تناسبني؟</h3>

اذا كنت تقوم بتسويق سلع كثيرة و مرتفعة الثمن فإن هذة العضوية مناسبة لك.

</div>


<div class="comment">
<h3  class="green">لايوجد لدي معرض أو مكتب فهل يحق لي الاشتراك؟
</h3>

نعم

</div>

<div class="comment">
<h3  class="green">هل سيتم إيقاف العضوية اذا لم يتم الاشتراك؟

</h3>

لا

</div>

<div class="comment">
<h3  class="green">هل سيتم إيقاف العضوية عند انتهاء الاشتراك؟


</h3>

لن يتم إيقاف العضوية لكن العضوية سوف تتحول الى العضوية العادية ذات العمولة.


</div>

<div class="comment">
<h3  class="green">هل يمكن أن يشترك أكثر من شخص في عضوية واحدة؟


</h3>

لا، العضوية خاصة بعضو واحد.



<br /><br /><br />



<a href="#">هل لديك استفسار او ملاحظة؟</a>


</div></div>

</div>
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>





 </body></html>
