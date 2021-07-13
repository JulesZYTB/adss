<?php
///// دالة حماية المتغيرات /// برمجة فكرة انسان
function secure_input($input,$type)  
{  
	if($type === "text_input"){
	$input = trim(htmlspecialchars($input));
	$input = preg_replace('/\\\\/', '', $input);	
	}
	if($type === "text_output"){
	$input = trim(stripslashes(htmlspecialchars($input)));
	}
	if($type === "int"){
	$input = trim(intval($input));
	}
	if($type === "md5_pass"){
	$input = md5($input);
	}
	
return ($input);  
}  
///// دالة حماية المتغيرات /// برمجة فكرة انسان


























?>