<?php 
include("include/functions/Secure_input.php"); /// استدعاء دالة حماية المدخلات
include("include/config.php"); // ملف الأتصال بقاعدة البيانات
mysqli_query($mysqli,"SET NAMES 'utf8'"); // لظبط الأستعلاما لتكون باللغة العربية

$code = $_POST['code']; // الكود الذي يقوم العضو بإدخاله 
$code = secure_input($code,"text_input");

$key = $_POST['key']; // key الخاص بتعريف العضو
$key = secure_input($key,"text_input");


$queryCheckCode = "SELECT * FROM `members` WHERE member_code = \"$key\" and code = \"$code\"";
$ex_queryCheckCode = mysqli_query($mysqli,$queryCheckCode);
$numOfRow = mysqli_num_rows($ex_queryCheckCode); // نتيجة الأستعلام عن العدد 

if($numOfRow > 0){
			echo 
		'<span class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> كود التسجيل صحيح</span>';
	}else{
		echo 
		'<span class="label label-danger"><i class="fa fa-times" aria-hidden="true"></i> كود التسجيل خاطئ</span>';
		}

?>