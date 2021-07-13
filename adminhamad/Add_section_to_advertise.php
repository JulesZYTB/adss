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
<title>إضافة  قسم عن - لوحة التحكم</title>
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
		include("../include/config.php");
		
		$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
		
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
		    <div class="h_title">إضافة قسم عن </div>
            <?php
			
			if($_POST['ADD_Account']){
			
			$title = $_POST['title'];
			$title = secure_input($title,"text_input");
			
			
			$Condition1 = $_POST['Condition1'];
			$Condition1 = secure_input($Condition1,"text_input");
			
			$Condition2 = $_POST['Condition2'];
			$Condition2 = secure_input($Condition2,"text_input");
			
			$Condition3 = $_POST['Condition3'];
			$Condition3 = secure_input($Condition3,"text_input");
			
			$section_type = $_POST['section_type'];
			$section_type = secure_input($section_type,"text_input");
			
			
			
			$type = $_POST['type'];
			$type = secure_input($type,"int");
			

			
			if(empty($title) or empty($type)){
				
				echo "
				<div class=\"n_error\"><p>
				من فضلك أكمل الحقول الفارغة .
				</p></div>
				";
				
				}else{
			
						
			

			$query_add_bank = "	INSERT INTO `sectionoadvertise` 
			(`id`, `title`, `Condition1`, `Condition2`, `Condition3`, `type`,`section`) 
			VALUES (NULL, \"$title\", \"$Condition1\", \"$Condition2\", \"$Condition3\", \"$type\",\"$section_type\");";
			$execution_query_add_bank = mysqli_query($mysqli,$query_add_bank);
			if($execution_query_add_bank){
						echo "
						<div class=\"n_ok\"><p>
						تم إضافة القسم للأعلان عن بنجاح جاري تحويلك إلي صفحة عرض الأقسام الأعلان عن . 
						</p></div>
						";
						
						echo "<meta http-equiv=\"refresh\" content=\"2;URL=View_section_to_advertise.php\">";
				}else{
						echo "
						<div class=\"n_error\"><p>
						للأسف يبدو انه هناك نشكلة في الوقت الحالي حاول في وقت لاحق . 
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
						<label for="name">عنوان القسم <span class="red">(مطلوب)</span></label>
						<input id="name" name="title" value="" maxlength="150" class="text err" />
					</div>
                    
                    					<div class="element">
						<label for="name">الشرط الأول <span class="red">(اختياري)</span></label>
						<input id="name" name="Condition1" value="" maxlength="500" class="text" />
					</div>
                    
	                
                    
                    
                                        						<div class="element">
						<label for="name">الشرط الثاني <span class="red">(اختياري)</span></label>
						<input id="name" name="Condition2" value="" maxlength="500" class="text" />
					</div>
                    
                    
                    
						<div class="element">
						<label for="name">الشرط الثالث <span class="red">(اختياري)</span></label>
						<input id="name" name="Condition3" value="" maxlength="500" class="text" />
					</div>

                        <div class="element">
						<label for="name">نوع القسم لـ <span class="red">(ضروري)</span></label>
						<select name="type">
                        <option value="1">العروض</option>
                        <option value="2">الطلبات</option>
                   		</select>
						</div>
                    
					<div class="element"> <label for="name">القسم لـ</label> <select name="section_type"> 
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
					 <input type="submit" class="add_Account" name="ADD_Account" value="إضافة القسم" />
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