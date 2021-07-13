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
<title>إضافة بنك - لوحة التحكم</title>
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
		    <div class="h_title">إضافة حساب بنكي</div>
            <?php
			
			if($_POST['ADD_Account']){
			
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
			
			$his_bank_account = $_POST['his_bank_account'];
			$his_bank_account = secure_input($his_bank_account,"text_input");
			
			$Bank_Name = $_POST['Bank_Name'];
			$Bank_Name = secure_input($Bank_Name,"text_input");
			
			$Account_Number = $_POST['Account_Number'];
			$Account_Number = secure_input($Account_Number,"text_input");
			
			$Account_Number_International = $_POST['Account_Number_International'];
			$Account_Number_International = secure_input($Account_Number_International,"text_input");
			

			
			if(empty($Account_Number) or empty($Bank_Name) or empty($his_bank_account)){
				
				echo "
				<div class=\"n_error\"><p>
				من فضلك أكمل الحقول الفارغة .
				</p></div>
				";
				
				}else{
			
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			

			$query_add_bank = "	INSERT INTO `bankaccounts` 
			(`id`, `his_bank_account`, `Bank_Name`, `Account_Number`, `Account_Number_International`) 
			VALUES (NULL, \"$his_bank_account\", \"$Bank_Name\", \"$Account_Number\", \"$Account_Number_International\");";
			$execution_query_add_bank = mysqli_query($mysqli,$query_add_bank);
			
			if($execution_query_add_bank){
						echo "
						<div class=\"n_ok\"><p>
						تم إضافة البنك بنجاح جاري تحويلك لصفحة عرض البنوك . 
						</p></div>
						";
						
						echo "<meta http-equiv=\"refresh\" content=\"2;URL=Bank_accounts.php\">";
				}else{
						echo "
						<div class=\"n_error\"><p>
						للأسف لم تتم إضافة البنك يبدو انه هناك مشكلة حاول في وقت لاحق . 
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
						<label for="name">اسم صاحب الحساب <span class="red">(مطلوب)</span></label>
						<input id="name" name="his_bank_account" value="" maxlength="150" class="text err" />
					</div>
                    
                    					<div class="element">
						<label for="name">اسم البنك <span class="red">(مطلوب)</span></label>
						<input id="name" name="Bank_Name" value="" maxlength="150" class="text err" />
					</div>
                    
	                
                    
                    
                                        						<div class="element">
						<label for="name">رقم الحساب <span class="red">(مطلوب)</span></label>
						<input id="name" name="Account_Number" value="" maxlength="150" class="text" />
					</div>
                    
                    
                    
						<div class="element">
						<label for="name">رقم الحساب الدولي</label>
						<input id="name" name="Account_Number_International" value="" maxlength="150" class="text" />
					</div>
                    

                    

					<div class="entry">
					 <input type="submit" class="add_Account" name="ADD_Account" value="إضافة البنك" />
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
