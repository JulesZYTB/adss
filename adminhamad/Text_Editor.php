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
<title>تعديل نص - لوحة التحكم</title>
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

<script type="text/javascript" src="../include/small_software/Editor/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
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
		    <div class="h_title">تعديل النص</div>
            
            <?php
			$id_text_editor = $_GET['id_text'];
			$id_text_editor = secure_input($id_text_editor,"int");
			
			if($_POST['save'] and $group_num === "1"){
				
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
				
				
				$description = $_POST['description'];
				
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_keyinformation = "UPDATE `text` set description = '$description'   where id = \"$id_text_editor\" ";
				$result_keyinformation = mysqli_query($mysqli,$query_keyinformation);
				
				if($result_keyinformation){
						echo "
						<div class=\"n_ok\"><p>
						لقد تم تحديث البيانات بنجاح
						</p></div>
						";
					}else{
												echo "
						<div class=\"n_error\"><p>
						للأسف لم يتم تحديث البيانات حاول في وقت لاحق
						</p></div>
						";
						}
				
				
				// اغلاق الأتصال بقاعدةالبيانات
				mysqli_close($mysqli);
				}
				?>
            
				<form action="" method="post">
                <?php
					/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
				
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_keyinformation_print = "SELECT * FROM `text` WHERE id = \"$id_text_editor\" ";
				$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
				$print_value = mysqli_fetch_array($result_keyinformation_print);
				$description = $print_value[description];
				
				
				// اغلاق الأتصال بقاعدةالبيانات
				mysqli_close($mysqli);		
				
				?>

                    

                    
					<div class="element">
						<label for="content">النص : <span></span></label>
						<textarea name="description" class="textarea" rows="10"><?php echo $description; ?></textarea>
					</div>
					<div class="entry">
					 <input type="submit" class="add" name="save" value=" حفظ البيانات " />
					</div>


				</form>
		  </div>
	  </div>
      
		<div class="clear"></div>
  </div>

        <?php

		include("template/footer.php");
		?>
 
</body>
</html>
