<?php
session_start(); 
include("../include/config.php");
if ($_SESSION['FBID']){
	$fbid = $_SESSION['FBID'];
	
mysqli_query($mysqli,"SET NAMES 'utf8'");
 $query_keyinformation_print = "SELECT * FROM `members` WHERE fbid = '$fbid'";
$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
$print_value = mysqli_fetch_array($result_keyinformation_print);
$id = $print_value[id];
$cookie_value_active = $print_value[active];
	if($id>0){
			 $_SESSION['id_members']=$id;

			echo "<META http-equiv=\"refresh\" content=\"0;URL=https://businesshamad.sa/index.php\">";
		
			
	}else{
		
		$time_now = time();
		$email = $_SESSION['EMAIL'];
		$username =  $_SESSION['FULLNAME'];
		$Activation_code = mt_rand(100000, 999999);
		$query_new_member = "INSERT INTO `members` (groupnumber,email,timeregister,member_code,username,active,fbid) VALUES (\"0\",\"$email\",\"$time_now\",\"$Activation_code\",\"$username\",\"1\",\"$fbid\")";	
			$result_new_member = mysqli_query($mysqli,$query_new_member);

			$query_keyinformation_print_2 = "SELECT * FROM `members` WHERE fbid = '$fbid'";
			$result_keyinformation_print_2 = mysqli_query($mysqli,$query_keyinformation_print_2);
			$print_value_2 = mysqli_fetch_array($result_keyinformation_print_2);
			$id3 = $print_value_2[id];

		 	$_SESSION['id_members']=$id3;
		echo "<META http-equiv=\"refresh\" content=\"0;URL=https://businesshamad.sa/index.php\">";
		
	}
	}else{
			echo "<META http-equiv=\"refresh\" content=\"0;URL=https://businesshamad.sa/login.php\">";
	
	}

?>
 