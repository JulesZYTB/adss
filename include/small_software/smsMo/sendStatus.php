<?php
include("includeSettings.php");			//يحتوي هذه الملف على جميع الإعدادات الخاصه ببوابات الإرسال
$resultType = 0;						//دالة تحديد نوع النتيجه الراجعه من البوابة
										//0: إرجاع نتيجة البوابة بشكل عددي
										//1: إرجاع نتيجة البوابة بشكل نصي	
										
// دالة التحقق من حالة الإرسال
echo sendStatus($resultType);
?>