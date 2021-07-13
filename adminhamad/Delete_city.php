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
<title>حذف المدن - لوحة التحكم</title>
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
		  <div class="full_w">
		    <div class="h_title">حذف المدن</div>
            <?php
				$id_acc = $_GET['id'];
				$id_acc = secure_input($id_acc,"int");
				
				
			
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
			
			
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_add_bank = "SELECT * FROM `cities` WHERE id = \"$id_acc\"";
			$execution_query_add_bank = mysqli_query($mysqli,$query_add_bank);
			$num_row_acc_bank = mysqli_num_rows($execution_query_add_bank);

			if($num_row_acc_bank > 0){
			
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_delet_bank = "DELETE FROM `cities` WHERE `id` = \"$id_acc\" LIMIT 1;";
			$execution_query_delet_bank = mysqli_query($mysqli,$query_delet_bank);
			
			
			if($execution_query_delet_bank){
						echo "
						<div class=\"n_ok\"><p>
						تم حذف المدينة بنجاح
						</p></div>
						";
								
						echo "<meta http-equiv=\"refresh\" content=\"2;URL=View_city.php\">";

						
						}else{
						echo "
						<div class=\"n_error\"><p>
						للأسف لا يمكن حذف هذه المدينة
						</p></div>
						";
					}
					
					}else{
								echo "
						<div class=\"n_error\"><p>
						للأسف لا يمكن حذف المدينة حاول في وقت لاحق
						</p></div>
						";
						
                     echo "<meta http-equiv=\"refresh\" content=\"2;URL=View_city.php\">";
						}
		
				// اغلاق الأتصال بقاعدةالبيانات
				mysqli_close($mysqli);
					
	
	
				

			
			?>

		  </div>
	  </div>
      
		<div class="clear"></div>
  </div>

        <?php

		include("template/footer.php");
		?>

</body>
</html>
