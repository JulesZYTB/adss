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
<title>تثبيت الأعلان - لوحة التحكم</title>
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
		    <div class="h_title">تثبيت الأعلان</div>
            <?php
			$id_se = $_GET['id'];
			$id_se = secure_input($id_se,"int");
			if($_POST['ADD_Account']){
			
			/// استعدعاء ملف الأتصال بقاعدة البيانات
			include("../include/config.php");
			

			$fixed_home = $_POST['fixed_home'];
			$fixed_home = secure_input($fixed_home,"int");
			
			$fixed_tub = $_POST['fixed_tub'];
			$fixed_tub = secure_input($fixed_tub,"int");
			
			$fixed_sec = $_POST['fixed_sec'];
			$fixed_sec = secure_input($fixed_sec,"int");
			
			
			$fixed_sec2 = $_POST['fixed_sec2'];
			$fixed_sec2 = secure_input($fixed_sec2,"int");
			
			
			$fixed_sec3 = $_POST['fixed_sec3'];
			$fixed_sec3d = secure_input($fixed_sec3,"int");
			

					
					
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_add_section = "UPDATE `ads` set fixed_home = \"$fixed_home\" , fixed_tub = \"$fixed_tub\",
			 fixed_sec = \"$fixed_sec\" , fixed_sec2 = \"$fixed_sec2\" , fixed_sec3 = \"$fixed_sec3\"  where id = \"$id_se\" ";
			$execution_query_add_section = mysqli_query($mysqli,$query_add_section);
			
			if($execution_query_add_section){
						echo "
						<div class=\"n_ok\"><p>
						تم التحديث بنجاح
						</p></div>
						";
						
						echo "<meta http-equiv=\"refresh\" content=\"2;URL=Install_AD.php?id=$id_se\">";
				}else{
						echo "
						<div class=\"n_error\"><p>
						يبدو انه يوجد مشكلة في الوقت الحالي يرجى اعادة المحاولة في وقت لاحق 
						</p></div>
						";
					}
					
					
				// اغلاق الأتصال بقاعدةالبيانات
				mysqli_close($mysqli);
					
					}else{
			
			
			
			?>
            <?php
			/// استعدعاء ملف الأتصال بقاعدة البيانات.
			include("../include/config.php");
			mysqli_query($mysqli,"SET NAMES 'utf8'");

			$query_keyinformation_print = "SELECT * FROM `ads` WHERE id = \"$id_se\" ";
			$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
			$print_value = mysqli_fetch_array($result_keyinformation_print);
			?>
				<form action="" method="post">
                
					<div class="element">
                                        <b>
						<label for="name">تثبيت في الرئيسية </label>
						<input name="fixed_home" type="radio" value="1" <?php if($print_value[fixed_home] === "1"){echo 
						"checked=\"checked\" ";} ?> />
                          نعم
                        <input name="fixed_home" type="radio" value="0" 
                        <?php if($print_value[fixed_home] === "0"){echo 
						"checked=\"checked\" ";} ?>/>
                        لا
            
                             </b>
					</div>
                    
                    
                    					<div class="element">
                                        <b>
						<label for="name">تثبيت في التصنيف  <span> ( مثال : السيارات ، الأجهزة )</span></label>
						<input name="fixed_tub" type="radio" value="1" <?php if($print_value[fixed_tub] === "1"){echo 
						"checked=\"checked\" ";} ?> />
                          نعم
                        <input name="fixed_tub" type="radio" value="0" 
                        <?php if($print_value[fixed_tub] === "0"){echo 
						"checked=\"checked\" ";} ?>/>
                        لا
            
                             </b>
					</div>
                    
                    
                                        					<div class="element">
                                        <b>
						<label for="name">تثبيت في القسم  <span> ( مثال : ابل ، سامسونج ، تويتا ، مواشي و حيوانات و طيور )</span></label>
						<input name="fixed_sec" type="radio" value="1" <?php if($print_value[fixed_sec] === "1"){echo 
						"checked=\"checked\" ";} ?> />
                          نعم
                        <input name="fixed_sec" type="radio" value="0" 
                        <?php if($print_value[fixed_sec] === "0"){echo 
						"checked=\"checked\" ";} ?>/>
                        لا
            
                             </b>
					</div>





                                        					<div class="element">
                                        <b>
						<label for="name">تثبيت في القسم الفرعي  <span> ( مثال : قسم الأيفون ، قسم الغنم  ، الخ )</span></label>
						<input name="fixed_sec2" type="radio" value="1" <?php if($print_value[fixed_sec2] === "1"){echo 
						"checked=\"checked\" ";} ?> />
                          نعم
                        <input name="fixed_sec2" type="radio" value="0" 
                        <?php if($print_value[fixed_sec2] === "0"){echo 
						"checked=\"checked\" ";} ?>/>
                        لا
            
                             </b>
					</div>
                    
                    
                    
                    
                                                            					<div class="element">
                                        <b>
						<label for="name">تثبيت في القسم الفرعي  <span> ( مثال : قسم الغنم النعيمي ، الخ )</span></label>
						<input name="fixed_sec3" type="radio" value="1" <?php if($print_value[fixed_sec3] === "1"){echo 
						"checked=\"checked\" ";} ?> />
                          نعم
                        <input name="fixed_sec3" type="radio" value="0" 
                        <?php if($print_value[fixed_sec3] === "0"){echo 
						"checked=\"checked\" ";} ?>/>
                        لا
            
                             </b>
					</div>




					<div class="entry">
					 <input type="submit" class="add_Account" name="ADD_Account" value=" حفظ بيانات العضو " />
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
