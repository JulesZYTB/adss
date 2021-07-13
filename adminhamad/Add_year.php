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
<title>إضافة سنة - لوحة التحكم</title>
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
		    <div class="h_title">إضافة سنة</div>
            <?php
			
			if($_POST['ADD_Account']){
			
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
			
			$text = $_POST['text'];
			$text = secure_input($text,"text_input");
			

			
			if(empty($text)){
				
				echo "
				<div class=\"n_error\"><p>
				من فضلك أكمل الحقول الفارغة .
				</p></div>
				";
				
				}else{
			
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_add_bank = "	INSERT INTO `years`(`id`, `text`) VALUES (NULL, \"$text\");";
			$execution_query_add_bank = mysqli_query($mysqli,$query_add_bank);
			if($execution_query_add_bank){
						echo "
						<div class=\"n_ok\"><p>
						تم إضافة السنة بنجاح
						</p></div>
						";
						
						echo "<meta http-equiv=\"refresh\" content=\"2;URL=View_year.php\">";
				}else{
						echo "
						<div class=\"n_error\"><p>
						للأسف لم تتم إضافة السنة بنجاح 
						</p></div>
						";
					}
					
					}
					
				// اغلاق الأتصال بقاعدةالبيانات
				mysqli_close($mysqli);
					
					}else{
			
			
			
			?>
				<form action="" method="post">

					<div class="element">
						<label for="name">السنة <span class="red">(مطلوب)</span></label>
						<input id="name" name="text" value="" maxlength="150" class="text err" />
					</div>

                    

					<div class="entry">
					 <input type="submit" class="add_Account" name="ADD_Account" value="إضافة السنة" />
					</div>


				</form>
                
                <?php
				}
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
