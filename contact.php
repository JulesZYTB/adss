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
<title>اتصل بنا- <?php echo $namewebsite; ?></title> 
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



<h2>للاتصال بإدارة موقع إعلانات السعودية</h2>  <img src='templates/default/contact.jpg'>


<div class="comment">


<?php
if($_POST['submit']){}else{
?>

<div class="alert alert-info">*  وسيلة التواصل لدينا هي البريد الإلكتروني  أو من خلال رقم الجوال: 0552525000<br>
* تأكد من صحة بريدك رقم الجوال حتى يتم الرد عليك<br>
<?php
if(!isset($_SESSION['id_members'])){
  ?>
* نرجو تسجيل الدخول  قبل تعبئة هذا النموذج حتى يتم الاتصال بك عن طريق الرسائل الخاصة.<br>
<?php
}
?>





</div>
<?php
}
?>
<?php
if($_POST['submit']){

  $subject = $_POST['subject'];
  $subject = secure_input($subject,"text_input");

  $message = $_POST['message'];
  $message = secure_input($message,"text_input");

  $from = $_POST['from'];
  $from = secure_input($from,"text_input");

  $captcha_box = $_POST['captcha_box'];
  $captcha_box = secure_input($captcha_box,"int");

  $captcha_value = $_SESSION['captcha'];
  $captcha_value = secure_input($captcha_value,"int");

  if(empty($subject)){
  $subject_re = "* "."لقد تركت سبب الأتصال فارغا يجب عليك كتابة سبب الأتصال"."<br />";
  }

  if(empty($message)){
  $message_re  = "* "."لقد تركت الرسالة فارغة قم بكتابة الرسالة الخاصة بك"."<br />";
  }

  if(empty($from)){
  $from_re = "* "."يجب عليك كتابة البريد الألكتروني للتتلفي الرد عليه "."<br />";
  }




  if(!isset($_SESSION['id_members'])){
  if($captcha_box !== $captcha_value){
  $captcha_re = "* "."لقد ادخلت رمز التحقق بشكل خاطئ";
  }
  }

  if(empty($subject_re) and empty($message_re)
  and empty($from_re) and empty($captcha_re)){

  if(!isset($_SESSION['id_members'])){
    $member_or_gust = "المرسل زائر للموقع .";
  }

  if(isset($_SESSION['id_members'])){
    $member_or_gust = "المرسل عضو في الموقع اسم العضوية الخاص به : $username_member";
  }

  // الدالة mail
  $message_final = "
  سبب الأتصال : $subject
  البريد الألكتروني : $from
  الرسالة :
  $message

  ملاحظة : $member_or_gust
  ";

  $send_mail = mail ("$emilecommunication","$subject","$message_final");

    if($send_mail){
    $send_mail_re = 1;
    if(isset($_SESSION['id_members'])){
    echo "
    <div class=\"alert alert-success\">تم إرسال الرسالة. سيتم الرد عليك خلال يومي عمل على الأكثر إن شاء الله وسيتم الرد عبر الرسائل الخاصة. نرجو مراجعة رسائلك الخاصة خلال يومي عمل. نشكر لك تواصلك معنا.</div>
    ";
  }else{
    echo "
    <div class=\"alert alert-success\">تم إرسال الرسالة. سيتم الرد عليك خلال يومي عمل على الأكثر إن شاء الله وسيتم الرد عبر البريد الالكتروني. نرجو مراجعة بريدك الإلكتروني خلال يومي عمل. نشكر لك تواصلك معنا.</div>
    ";
  }

  }else{

  echo "
  <div class=\"alert alert-danger\">
  يبدو انه يوجد مشكلة في الأرسال لهذا البريد
  حاول  في وقت لاحق إذا استمرت المشكلة قم بالتواصل مع الأدارة
  عن طريق الرسائل الخاصة
  </div>
";

  }

  }else{
  echo "
  <div class=\"alert alert-danger\">
  $subject_re
  $message_re
  $from_re
  $captcha_re

  </div>
  ";
  }



}
?>

<?php
if($send_mail_re === 1){}else{
?>

   <form action="" method="post" name="postform">
	   <table class="table  tableMsg table-borderedAds tableextra">
	       <tbody><tr>
	         <th colspan="2"> أرسل طلبك أو استفسارك </th>
	       </tr>
	<tr>

      <td width="15%">الاسم</td><td align="right"> <input type="text"
       value="<?php echo $name; ?>"
       name="subject" size="45" class="form-control"></td>
    </tr>
    	<tr>

      <td width="15%">البلد</td><td align="right"> <input type="text"
       value="<?php echo $country; ?>"
       name="subject" size="45" class="form-control"></td>
    </tr>
	<tr>

      <td width="15%">الموبايل</td><td align="right"> <input type="text"
       value="<?php echo $mobile; ?>"
       name="subject" size="45" class="form-control"></td>
    </tr>
	<tr>

      <td width="15%">
		  البريد الإلكتروني
	  </td><td align="right"> <input type="text" name="from"
      value="<?php
      if(empty($from)){
      echo $email_member;}else{
      echo $from;
      } ?>"
       size="45" maxlength="60" value="" class="form-control"></td>
    </tr>
	<tr>

      <td width="15%">سبب الإتصال</td><td align="right"> <input type="text"
       value="<?php echo $subject; ?>"
       name="subject" size="45" class="form-control"></td>
    </tr>
      	<tr>
<?php
if(!isset($_SESSION['id_members'])){
?>
      <td width="15%" style="height: 29px">رقم التحقق :</td>

		<td>
	  <input type="text" name="captcha_box" size="45" value="" class="form-control">
    (
                <?php

  $first = rand(0,9);
  $second = rand(0,9);
  $total = $first + $second ;
  $_SESSION['captcha'] = $total;
  echo "
  <img src='templates/default/numbers/$first.png'>+<img src='templates/default/numbers/$second.png'>
  ";
  ?>
  )

	  <span class="label label-danger">أكتب مجموع الأرقام .</span></td>
    </tr>
    <?php
  }
    ?>

		<tr>

      <td>نص الرساله<br></td>

		<td>
<textarea name="message" cols="6" rows="5" id="message" class="form-control">
<?php echo $message; ?>
</textarea>
	  </td>
    </tr>

    <tr>
      <td class="row4" colspan="2">
        <input class="btn btn-primary" name="submit" type="submit" value="إرســـال">      </td>
	</tr>

  </tbody></table>





  </form>
  <?php
}
  ?>

  </div></div>

</div>
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>





 </body></html>
