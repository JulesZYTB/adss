<?php
ob_start();
session_start();
if(!isset($_SESSION['id_members'])){header("location:index.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ar" dir="rtl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
<title>إحصائيات الموقع - لوحة التحكم</title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$(".box .h_title").not(this).next("ul").hide("normal");
	$(".box .h_title").not(this).next("#home").show("normal");
	$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
});
</script>
</head>
<body>
<div class="wrap">
	<div id="header">
		
        
        <?php
		include("template/header.php");
		?>
        
		<?php
		if($group_num !== "1"){header("location:logout.php");}
		ob_end_flush();
		?>
        
        
        <?php
		include("template/menu.php");
		?>
		


        
	  <div id="main">
	    <div class="clear"></div>
			
		<div class="full_w">
				<div class="h_title">إحصائيات الموقع</div>

                <?php
				
							
			/// استعدعاء ملف الأتصال بقاعدة البيانات
			include("../include/config.php");
			
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_num_rows_a = "SELECT * FROM `ads` ORDER BY ID";
			$result_query_num_rows_a = mysqli_query($mysqli,$query_num_rows_a);
			$num_query_num_rows_a_s  = mysqli_num_rows($result_query_num_rows_a);
			
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_num_rows_m = "SELECT * FROM `members` ORDER BY ID";
			$result_query_num_rows_m = mysqli_query($mysqli,$query_num_rows_m);
			$num_query_num_rows_m_s  = mysqli_num_rows($result_query_num_rows_m);
			
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_num_rows_c = "SELECT * FROM `comments` ORDER BY ID";
			$result_query_num_rows_c = mysqli_query($mysqli,$query_num_rows_c);
			$num_query_num_rows_c_s  = mysqli_num_rows($result_query_num_rows_c);
			
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_num_rows_c = "SELECT * FROM `comments` ORDER BY ID";
			$result_query_num_rows_c = mysqli_query($mysqli,$query_num_rows_c);
			$num_query_num_rows_c_s  = mysqli_num_rows($result_query_num_rows_c);
			
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_num_rows_p = "SELECT * FROM `privatemessage` ORDER BY ID";
			$result_query_num_rows_p = mysqli_query($mysqli,$query_num_rows_p);
			$num_query_num_rows_p_s  = mysqli_num_rows($result_query_num_rows_p);
			
			
				?>
				<h3>الأحصائيات</h3>
				<p></h3>
				<ul style="font-weight:bold; color:#000; font-size:15px;">
					<li>عدد الأعلانات : <?php echo $num_query_num_rows_a_s; ?></li>
					<li>عدد الردود : <?php echo $num_query_num_rows_c_s; ?></li>
					<li>عدد الأعصاء : <?php echo $num_query_num_rows_m_s; ?></li>
					<li>عدد الرسائل الخاصة : <?php echo $num_query_num_rows_p_s; ?></li>
				</ul>
				
               <br />
	  </div>
		<div class="clear"></div>
	</div>

        <?php
		include("template/footer.php");
		?>
 
</body>
</html>
