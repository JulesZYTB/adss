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
$commission = $print_value[commission];
?>
<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>عمولة الموقع - <?php echo $namewebsite; ?></title>
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


<script type="text/javascript">
<!--

function validate_form(form)
{
    
	if (form.username.value == "") {
   alert('فضلا أذكر أسم المستخدم');
    form.username.focus();
    return false ;
  }
  else if (form.price.value == "") {
   alert('فضلا أذكر مبلغ التحويل');
    form.price.focus();
    return false ;
  }
  else if (form.moneysender.value == "") {
   alert('فضلا أذكر معلومات المرسل');
    form.moneysender.focus();
    return false ;
  }
  else if (form.bank.value == "") {
   alert('أختر اسم البنك');
    form.bank.focus();
    return false ;
  }
  else if (form.from.value == "") {
   alert('فضلا أدخل بريدك ');
    form.from.focus();
    return false ;
  }
  else 
  return true ;

}
	


//-->
</script>

<?php 
if($_POST['submit']){

  $username = $_POST['username'];
  $username = secure_input($username,"text_input");
  if(empty($username)){$username = "غير متوفر";}
  
  $price = $_POST['price'];
  $price = secure_input($price,"text_input");
  if(empty($price)){$price = "غير متوفر";}
  
  $bank = $_POST['bank'];
  $bank = secure_input($bank,"text_input");
  if(empty($bank)){$bank = "غير متوفر";}
  
  $datetransfer = $_POST['datetransfer'];
  $datetransfer = secure_input($datetransfer,"text_input");
  if(empty($datetransfer)){$datetransfer = "غير متوفر";}
  
  $moneysender = $_POST['moneysender'];
  $moneysender = secure_input($moneysender,"text_input");
  if(empty($moneysender)){$moneysender = "غير متوفر";}
  
  $from = $_POST['from'];
  $from = secure_input($from,"text_input");
  if(empty($from)){$from = "غير متوفر";}
  
  $message = $_POST['message'];
  $message = secure_input($message,"text_input");
  if(empty($message)){$message = "غير متوفر";}
  
  $link = $_POST['link'];
  $link = secure_input($link,"text_input");
  if(empty($link)){$link = "غير متوفر";}
  
  
  
  
    // الدالة mail
  $message_final = "
  اسم المستخدم : $username
  مبلغ العمولة : $price
  البنك الذي تم التحويل إليه : $bank
  متى تم التحويل؟ : $datetransfer
  أسم المحول : $moneysender
  رقم الأعلان : $link
  البريد الألكتروني : $from
  الملاحظات  :
  $message
  
  ";

	
  if(!isset($_SESSION['id_members'])){
  if($captcha_box !== $captcha_value){
  $captcha_re = "<div class=\"alert alert-danger\">رقم التحقق غير صحيح</div>";
  }
  }
  
  
	
  $subject = "قام  $moneysender بتحويل مبلغ $price على $bank | عمولة الموقع"; 
  
  if(!empty($captcha_re)){}else{
  $send_mail = mail ("$emilecommunication","$subject","$message_final");
	if($send_mail){
	$send_mail_re = 1;
	echo "
<h2>عمولة $namewebsite</h2>
<div class=\"alert alert-info\">
نشكرك على دفع العمولة. مستقبلاً إذا كانت العمولة أقل من 20 ريال نرجو التصدق بالمبلغ نيابة عنا بدلا من التحويل على حسابنا. العمولات الاقل من 20 ريال لن يتم تسجيلها في نظام العمولة لذلك لن يكون هناك إشعار بالاستلام.
</div>";
}else{
	echo "<div class=\"alert alert-danger\">يوجد مشلكة في الأرسال تواصل مع الأدارة عبر الرسائل الخاصة</div>";
	}


  }
  
  
	

}
?>

<?php
if($send_mail_re === 1){}else{
?>
<?php
				echo "<h2>عمولة $namewebsite</h2>";
				echo $captcha_re;

				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_keyinformation_print = "SELECT * FROM `text` WHERE id = \"2\" ";
				$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
				$print_value = mysqli_fetch_array($result_keyinformation_print);
				$description = $print_value[description];
				echo $description;
				mysqli_close($mysqli);

?>



<h3 class="green">حساب العمولة</h3>

<form name="frmCalCommission" class="form-inline" role="form">

	<script type="text/javascript">


String.prototype.replaceArray = function(find, replace) {
  var replaceString = this;
  var regex; 
  for (var i = 0; i < find.length; i++) {
    regex = new RegExp(find[i], "g");
    replaceString = replaceString.replace(regex, replace[i]);
  }
  return replaceString;
};

function toArabicNumber (number){

				var find = ["۰", "۱", "۲", "۳", "٤", "٥", "٦", "٧", "۸", "9"];
				var replace = ["0","1", "2", "3", "4", "5", "6", "7", "8", "9"];
					number = number.replaceArray(find, replace);
					return number;


}

				



				function funCalCommission(){ 
				
				total = document.frmCalCommission.total.value;
				total = toArabicNumber(total);
				var factor =<?php echo $commission; ?>;
				var factorDiscount =factor;
				
				
									

				$("#commissionvalue").text(Math.floor(total * factor));
				
				
				$("#commissionvaluediscount").text(Math.floor(total * factorDiscount));
				}

	</script>



	<p><b>حساب قيمة العمولة:</b> إذا تم بيع السلعة بسعر
	<input type="text" pattern="\d*" class="form-control formcommission" name="total" size="8" maxlength="10" value="0" style="text-align: center; direction: ltr; " onkeyup="funCalCommission();">
ريال فأن العمولة هي: 

<span class="label label-primary" id="commissionvalue"> 0</span> ريال
	
	</p>
	
		</form>
	<?php 
	if(!isset($_SESSION['id_members'])){
	?>
    	<p>
		<span class="label label-primary">
	ملاحظة 
	</span>نرجو تسجيل الدخول اذا كانت لديك عضوية في الموقع حتى إذا كان لك خصم يتم حسابه لك
	
	</p>
	<?php
	}
	?>
    
	<br>
<br>
<h3 class="green">دفع العموله</h3>
	
		يمكنك استخدام التحويل البنكي لدفع العموله وللحصول على رقم الحساب راسلنا على الرقم التالي:
	

	<script type="text/javascript">
function showhide(id){
if (document.getElementById){
obj = document.getElementById(id);
if (obj.style.display == "none"){
obj.style.display = "";
document.getElementById("hideme").style.display="none";

} else {
obj.style.display = "none";
}
}
}
</script> 


<div class="table-responsive">

                  
                  
                    <?php
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
				
				$view_query_bank_accounts = "SELECT * FROM `bankaccounts` ORDER BY ID";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_bank_accounts = mysqli_query($mysqli,$view_query_bank_accounts);
				$view_num_bank_accounts = mysqli_num_rows($view_execution_bank_accounts);
				if($view_num_bank_accounts > 0){
				?>

  <table class="table  tableMsg table-borderedAds tableextra">

		
	<thead>
	                <tr>
	                  <th> رقم الجوال (المراسلة واتساب فقط) </th>
	                  <th></th>
	                  <th></th>
	                  <th></th>
	                </tr>
	              </thead>
				  
				  
				  
				  <tbody>
                  
                  
                <?php
					while($bank_acc = mysqli_fetch_array($view_execution_bank_accounts)){
				?>     
                
                <tr>
				<td><?php echo $bank_acc[his_bank_account] ?></td>
				<td><?php echo $bank_acc[Bank_Name] ?></td>
				<td><?php echo $bank_acc[Account_Number] ?></td>
				<td><?php echo $bank_acc[Account_Number_International] ?></td>
				</tr>
                                  
                    
						

                <?php
				}
				echo "
				</tbody></table>
				";
				}else{
				?>
                <div class="n_warning"><p>
                لا يتوفر حسابات بنكية ليتم عرضها
                </p></div>
                <?php
					}
				// اغلاق الأتصال بقاعدةالبيانات
				mysqli_close($mysqli);
				?>
                
                  
                  

				                  
                                  


</div>



<br>
<br>
	
	






بعد إرسال المبلغ،يجب الدخول بعضويتك ومراسلتنا عبر النموذج التالي لأجل تسجيل العمولة بأسم عضويتك ثم الحصول على مميزات الموقع الخاصة بالعملاء:

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
 
   <form action="" method="post" name="postform" enctype="multipart/form-data" onsubmit="return validate_form(this);">
   <table class="table  tableMsg table-borderedAds tableextra">

		<tbody><tr>
			<th colspan="4">
				
					نموذج تحويل العمولة
				
				</th>
		</tr>
  
	
	
		<tr>
     
      <td>أسم المستخدم <input class="form-control" type="text" name="username" size="45" maxlength="60" tabindex="2" 
      value="<?php
      if(empty($username_member)){
		  echo "Guest";
		  }else{
			  echo $username_member;
			  }
	  ?>"></td>
    </tr>	
	
	<tr>
     
      <td>مبلغ العمولة <input class="form-control" type="text" name="price" size="45" maxlength="60" tabindex="2" value=""></td>
    </tr>	
<tr>
     
      <td>البنك الذي تم التحويل إليه 

		   <select name="bank" class="form-control" style="width:50%">
   <option value="">أختر أسم البنك</option>
      <option value="مصرف الراجحي">مصرف الراجحي</option>
      <option value="البنك الأهلي التجاري">البنك الأهلي التجاري</option>
      <option value="سامبا">سامبا</option>
      <option value="ساب">ساب</option>
      <option value="بنك الرياض">بنك الرياض</option>
      <option value="بنك البلاد">بنك البلاد</option>
      <option value="بنك الانماء">بنك الانماء</option>
      <option value="لبنك العربي الوطني">البنك العربي الوطني</option>
      <option value="البنك السعودي الفرنسي">البنك السعودي الفرنسي</option>
      <option value="تم التصدق بالعمولة">تم التصدق بالعمولة</option>
      <option value="لم يتم التحويل">لم يتم التحويل</option>

   </select>

	  </td>
    </tr>

    <tr>
     
      <td>متى تم التحويل؟


		   <select name="datetransfer" class="form-control" style="width:50%">
      <option value="تم التحويل اليوم">تم التحويل اليوم</option>
      <option value="تم التحويل يوم أمس">تم التحويل يوم أمس</option>
      <option value="تم التحويل قبل أمس">تم التحويل قبل أمس</option>
      <option value="تم التحويل قبل 3 أيام">تم التحويل قبل 3 أيام</option>
      <option value="تم التحويل قبل أسبوع">تم التحويل قبل أسبوع</option>
      <option value="تم التحويل قبل شهر">تم التحويل قبل شهر</option>
      <option value="لم يتم التحويل">لم يتم التحويل</option>

   </select>

	  </td>
    </tr>
<tr>
     
      <td>أسم المحول <input class="form-control" type="text" name="moneysender" size="45" maxlength="60" tabindex="2" value=""></td>
    </tr>
		<tr>
     
      <td>البريد الإلكتروني <input class="form-control" type="text" name="from" size="45" maxlength="60" tabindex="2" value="<?php
      if(empty($from)){
      echo $email_member;}else{
      echo $from;
      } ?>"></td>
    </tr>
	<tr>
     
      <td>رقم الإعلان <input class="form-control" type="text" name="link" size="45" maxlength="60" tabindex="2" value="">
      
<span class="label label-primary">نرجو حذف الإعلان بعد الإنتهاء منه.</span>
      </td>
    </tr>
	
    
    
    <?php
if(!isset($_SESSION['id_members'])){
?>
 <tr>
     
      <td>رقم التحقق :

		
	  <input class="form-control " type="text" name="captcha_box" size="45" tabindex="2" value="">
      
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
    
    
          
      <td>ملاحظات<br>

	
	  <textarea name="message" cols="6" rows="5" id="message" class="form-control"></textarea>
	  </td>
    </tr>
    
    <tr>
		
      <td>&nbsp;
      	نرجو الحرص على أن تكون معلومات التحويل صحيحة ودقيقه <br><br>
        <input class="btn btn-primary" name="submit" type="submit" value="إرســـال" style="width:50%">      </td></tr>
  </tbody></table>
  </form>
</div>
</div>

<?php
}
?>


</div>

</div>
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>





 </body></html>
