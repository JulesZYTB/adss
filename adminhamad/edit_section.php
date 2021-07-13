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
<title>تعديل قسم - لوحة التحكم</title>
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
		    <div class="h_title">تعديل القسم</div>
            <?php
			$id_se = $_GET['id'];
			$id_se = secure_input($id_se,"int");
			if($_POST['ADD_Account']){
			
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
			
			$name = $_POST['name'];
			$name = secure_input($name,"text_input");
			
			$section = $_POST['section'];
			$section = secure_input($section,"text_input");
			
			$section_type = $_POST['section_type'];
			$section_type = secure_input($section_type,"text_input");
			
			$section_more = $_POST['section_more'];
			$section_more = secure_input($section_more,"text_input");
			
			$model_link = $_POST['model_link'];
			$model_link = secure_input($model_link,"text_input");
			
			
			

			
			if(empty($name)){
				
				echo "
				<div class=\"n_error\"><p>
				من فضلك أكمل الحقول الفارغة .
				</p></div>
				";
				
				}else{
			
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			

			$query_add_section = "UPDATE `section` set 
				name = \"$name\" , type = \"$section\"
				, Documentto = \"$section_more\" , Contents = \"$section_type\"  , linkmodel = \"$model_link\"  where id = \"$id_se\" ";
			$execution_query_add_section = mysqli_query($mysqli,$query_add_section);
			
			if($execution_query_add_section){
						echo "
						<div class=\"n_ok\"><p>
						تم تعديل القسم بنجاح جاري تحديث البيانات 
						</p></div>
						";
						
						echo "<meta http-equiv=\"refresh\" content=\"2;URL=edit_section.php?id=$id_se\">";
				}else{
						echo "
						<div class=\"n_error\"><p>
						يبدو انه هناك مشكلة في تعديل القسم حاول في وقت لاحق 
						</p></div>
						";
					}
					
					}
					
				// اغلاق الأتصال بقاعدةالبيانات
				mysqli_close($mysqli);
					
					}else{
			
			
			
			?>
            <?php
							/// استعدعاء ملف الأتصال بقاعدة البيانات.
							
				include("../include/config.php");
								mysqli_query($mysqli,"SET NAMES 'utf8'");

			$query_keyinformation_print = "SELECT * FROM `section` WHERE id = \"$id_se\" ";
			$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
			$print_value = mysqli_fetch_array($result_keyinformation_print);
			?>
				<form action="" method="post">

					<div class="element">
						<label for="name">اسم القسم <span class="red">(مطلوب)</span></label>
						<input id="name" name="name" value="<?php echo $print_value[name]; ?>" maxlength="100" class="text err" />
					</div>
                    
                    					<div class="element">
                                        <b>
						<label for="name">نوع القسم </label>
						<input name="section" type="radio" value="رئيسي" <?php if($print_value[type] === "رئيسي"){echo 
						"checked=\"checked\" ";} ?> />
                          رئيسي
                        <input name="section" type="radio" value="فرعي" 
                        <?php if($print_value[type] === "فرعي"){echo 
						"checked=\"checked\" ";} ?>/>
                        فرعي
                       <input name="section" type="radio" value="فرعي الفرعي"
                       <?php if($print_value[type] === "فرعي الفرعي"){echo 
						"checked=\"checked\" ";} ?> />                    
                       فرعي الفرعي 
                             
                             </b>
					</div>
					
					
					                    					<div class="element">
                                        <b>
						<label for="name">مربوط بالموديل </label>
						<input name="model_link" type="radio" value="yes" <?php if($print_value[linkmodel] === "yes"){echo 
						"checked=\"checked\" ";} ?> />
                          نعم
                        <input name="model_link" type="radio" value="no" 
                        <?php if($print_value[linkmodel] === "no"){echo 
						"checked=\"checked\" ";} ?>/>
                        لا
            
                             </b>
					</div>
					
					
					
                    
	                
                    
                    
                        <div class="element">
						<label for="name">القسم المسند إليه</label>
						<select name="section_more">
                        <option value="غير مسند">غير مسند لأي قسم</option>
                                                <?php
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_keyinformation_print2 = "SELECT * FROM `section` WHERE type = \"رئيسي\" or
				type = \"فرعي\"  ";
				$result_keyinformation_print2 = mysqli_query($mysqli,$query_keyinformation_print2);
				while($print_value2 = mysqli_fetch_array($result_keyinformation_print2)){
					if($print_value[Documentto] === $print_value2[id]){$select_tags = "selected=\"selected\"";}else{
						$select_tags = "";}
					echo "
					<option value=\"$print_value2[id]\" $select_tags>$print_value2[name] ($print_value2[id])</option>
					";
					}
						?>
                        </select>
						</div>
                        
                        
                        <div class="element">
						<label for="name">القسم لـ</label>
						<select name="section_type">
                        						 <?php

$res_hb = mysqli_query($mysqli,"SELECT * FROM cat");

while($rs = mysqli_fetch_array($res_hb)) {

?>
<option value="<?php echo $rs['title']; ?>"><?php echo $rs['title']; ?></option>

<?php
}
?>
                        </select>
						</div>
                    
                    
                    

                    

                    

					<div class="entry">
					 <input type="submit" class="add_Account" name="ADD_Account" value="تعديل القسم" />
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
