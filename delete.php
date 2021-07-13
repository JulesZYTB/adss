<?php 
include("include/config.php");

	$name = $_POST['name'];
	$id = $_POST['id'];
	
mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_login = "SELECT * FROM `ads` where id = \"$id\" ";
				$result_query = mysqli_query($mysqli,$query_login);
				$Data_member = mysqli_fetch_array($result_query);
				$image_link  = $Data_member[image_link];
 $new_image =  str_replace($name.",","",$image_link);                 	
$new_image =  str_replace($name,"",$new_image);    
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_add_section = "UPDATE `ads` set image_link = \"$new_image\" where id = \"$id\" ";
			$execution_query_add_section = mysqli_query($mysqli,$query_add_section);
			             	
?>