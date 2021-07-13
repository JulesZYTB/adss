
<?php
include("include/config.php");
$q = intval($_GET['q']);
$r = intval($_GET['r']);
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_add_Report = "	INSERT INTO `report` (`reson`, `id_comment`) 
VALUES (\"$r\", \"$q\")";
$execution_query_add_Report = mysqli_query($mysqli,$query_add_Report);
if($execution_query_add_Report){
	?>
    <span class="label label-success">تم الإبلاغ. شكرا لك</span>
    <?php
	}else{
		echo "يوجد مشكلة في الأبلاغات يرجى التواصل مع الأدارة و شكرا";
		}
?>
