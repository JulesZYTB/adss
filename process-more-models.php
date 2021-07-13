<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
/// استدعاء دالة حماية المدخلات
include("include/functions/Secure_input.php");

		$ads_tags_R_TAG = $_POST['ads_tags_R'];
		$ads_tags_R_TAG = secure_input($ads_tags_R_TAG,"int");
		
		$ads_tags_F_TAG = $_POST['ads_tags_F'];
		$ads_tags_F_TAG = secure_input($ads_tags_F_TAG,"int");
		
		$startmodel = $_POST['startmodel'];
$startmodel = secure_input($startmodel,"int");

$endmodel = $_POST['endmodel'];
$endmodel = secure_input($endmodel,"int");

$cities = $_POST['cities'];
$cities = secure_input($cities,"int");

$model = $_POST['model'];
$model = secure_input($model,"int");

		include("include/config.php");
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_keyinformation_print_R = "SELECT * FROM `section` WHERE id = \"$ads_tags_R_TAG\" ";
		$result_keyinformation_print_R = mysqli_query($mysqli,$query_keyinformation_print_R);
		$print_value_R = mysqli_fetch_array($result_keyinformation_print_R);
		$title_name_tag_r = $print_value_R[name];



		include("include/config.php");
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_keyinformation_print_F = "SELECT * FROM `section` WHERE id = \"$ads_tags_F_TAG\" ";
		$result_keyinformation_print_F = mysqli_query($mysqli,$query_keyinformation_print_F);
		$print_value_F = mysqli_fetch_array($result_keyinformation_print_F);
		$title_tag_F = $print_value_F[name];
		
		
			
		include("include/config.php");	
		$view_query_city = "SELECT * FROM `years` where text = \"$model\"  ORDER BY id";
		$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
		$view_execution_city = mysqli_query($mysqli,$view_query_city);
		$array_city = mysqli_fetch_array($view_execution_city);
		$mode_l_s =  $array_city[id];
		
		
		/// استعدعاء ملف الأتصال بقاعدة البيانات
		include("include/config.php");
		$view_query_city_update_but_new = 
		"SELECT * FROM `years` where text >= \"$startmodel\" and text <= \"$endmodel\" ORDER BY id";
		$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
		$view_execution_city_update_but_new = mysqli_query($mysqli,$view_query_city_update_but_new);
		$array_city_update_but_new = mysqli_fetch_array($view_execution_city_update_but_new);
		while($array_city_update_but_new = mysqli_fetch_array($view_execution_city_update_but_new)){
		$model_butween_new .=  $array_city_update_but_new[id].",";
		}






?>
<meta http-equiv="refresh" content="0;URL=
<?php echo $url_hraj; ?>
<?php echo "tags/"; ?>
<?php if(empty($ads_tags_F_TAG)){echo "$ads_tags_R_TAG/";}else{echo "$ads_tags_F_TAG/";} ?>
<?php if(empty($ads_tags_F_TAG)){echo "$title_name_tag_r/";}else{echo "$title_tag_F/";} ?>

<?php
if(empty($model)){
echo substr_replace($model_butween_new, "", -1);
}else{
echo $mode_l_s;
	}
?>
<?php if(empty($cities)){}else{echo "/$cities";} ?>
">