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
<title>التعديل على الأعضاء - لوحة التحكم</title>
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
		    <div class="h_title">تعديل العضو</div>
            <?php
			$id_se = $_GET['id'];
			$id_se = secure_input($id_se,"int");
			if($_POST['ADD_Account']){
			
			/// استعدعاء ملف الأتصال بقاعدة البيانات
			include("../include/config.php");
			
			$username = $_POST['username'];
			$username = secure_input($username,"text_input");
			
			$now = $_POST['now'];
			$now = secure_input($now,"text_input");
			$password = md5($_POST['now']);
			
			$email = $_POST['email'];
			$email = secure_input($email,"text_input");
			
			$phone = $_POST['phone'];
			$phone = secure_input($phone,"text_input");
			
			$documentingmobile = $_POST['documentingmobile'];
			$documentingmobile = secure_input($documentingmobile,"int");
			
			$Documentingemail = $_POST['Documentingemail'];
			$Documentingemail = secure_input($Documentingemail,"int");
			
			$groupnumber = $_POST['groupnumber'];
			$groupnumber = secure_input($groupnumber,"int");
			
			$The_pay_commission = $_POST['The_pay_commission'];
			$The_pay_commission = secure_input($The_pay_commission,"int");


			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_chek_found_username = "SELECT * FROM `members` WHERE username = \"$username\" and id != \"$id_se\"";
			$result_chek_found_username = mysqli_query($mysqli,$query_chek_found_username);
			$num_chek_found_username  = mysqli_num_rows($result_chek_found_username);
			if($num_chek_found_username > 0){
				$found_username = "<br /> اسم المستخدم مستخدم من قبل عضو اخر .";
				}else{
					$found_username = "";
				}
				
				
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_chek_found_email = "SELECT * FROM `members` WHERE email = \"$email\" and id != \"$id_se\"";
			$result_chek_found_email = mysqli_query($mysqli,$query_chek_found_email);
			$num_chek_found_email  = mysqli_num_rows($result_chek_found_email);
			if($num_chek_found_email > 0){
				$found_email = "<br /> البريد الألكتروني مستخدم من قبل عضو اخر .";
				}else{
					$found_email = "";
				}



			
			
			if(empty($username) || empty($now) || empty($email) || 
			empty($groupnumber) || !empty($found_email) || !empty($found_username)){
				echo "
				<div class=\"n_error\"><p>
				من فضلك أكمل الحقول الفارغة .
				$found_username
				$found_email
				</p></div>
				";
				}else{
					
					

					
					
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_add_section = "UPDATE `members` set username = \"$username\" , email = \"$email\",
			 now = \"$now\" , phone = \"$phone\"  , documentingmobile = \"$documentingmobile\"
			 , Documentingemail = \"$Documentingemail\", groupnumber = \"$groupnumber\"
			 , The_pay_commission = \"$The_pay_commission\" , password = \"$password\"
			  where id = \"$id_se\" ";
			$execution_query_add_section = mysqli_query($mysqli,$query_add_section);
			
			if($execution_query_add_section){
						echo "
						<div class=\"n_ok\"><p>
						تم تحديث بيانات العضو '$username' بنجاح
						</p></div>
						";
						
						echo "<meta http-equiv=\"refresh\" content=\"2;URL=Amendment_Members.php?id=$id_se\">";
				}else{
						echo "
						<div class=\"n_error\"><p>
						يبدو انه يوجد مشكلة في التحكم ببيانات العضو في الوقت الحالي  حاول في وقت لاحق 
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

			$query_keyinformation_print = "SELECT * FROM `members` WHERE id = \"$id_se\" ";
			$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
			$print_value = mysqli_fetch_array($result_keyinformation_print);
			?>
				<form action="" method="post">

					<div class="element">
						<label for="name">اسم المستخدم <span class="red">(مطلوب)</span></label>
						<input id="name" name="username" value="<?php echo $print_value[username]; ?>" maxlength="100" class="text err" />
					</div>
                    
                    
                    					<div class="element">
						<label for="name">كلمة المرور <span class="red">(مطلوب)</span></label>
						<input id="name" name="now" value="<?php echo $print_value[now]; ?>" maxlength="100" class="text err" />
					</div>
                    
                                        
                    					<div class="element">
						<label for="name">البريد الألكتروني <span class="red">(مطلوب)</span></label>
						<input id="name" name="email" value="<?php echo $print_value[email]; ?>" maxlength="100" class="text err" />
					</div>
                    
                                        					<div class="element">
						<label for="name">رقم الجوال </label>
						<input id="name" name="phone" value="<?php echo $print_value[phone]; ?>" maxlength="100" class="text" />
					</div>
                    
                    
                                            <div class="element">
						<label for="name">حالة تفعيل الجوال</label>
						<select name="documentingmobile">
                        <option value="1" 
						<?php if($print_value[documentingmobile] === "1"){echo "selected=\"selected\"";} ?>>مفعل</option>
                        <option value="0" 
                        <?php if($print_value[documentingmobile] === "0"){echo "selected=\"selected\"";} ?>>غير مفعل</option>
                        </select>
						</div>
                        
                        
                                                                    <div class="element">
						<label for="name">حالة تفعيل الأيميل</label>
						<select name="Documentingemail">
                        <option value="1" 
						<?php if($print_value[Documentingemail] === "1"){echo "selected=\"selected\"";} ?>>مفعل</option>
                        <option value="0" 
                        <?php if($print_value[Documentingemail] === "0"){echo "selected=\"selected\"";} ?>>غير مفعل</option>
                        </select>
						</div>
                        
                        
                        <div class="element">
						<label for="name">المجموعة</label>
						<select name="groupnumber">
                        <option value="1" 
						<?php if($print_value[groupnumber] === "1"){echo "selected=\"selected\"";} ?>>إدارة الموقع</option>
                       	<option value="2" 
                        <?php if($print_value[groupnumber] === "2"){echo "selected=\"selected\"";} ?>>المشرفين</option>
                        <option value="6" 
                        <?php if($print_value[groupnumber] === "6"){echo "selected=\"selected\"";} ?>>الأعضاء</option>
                       	<option value="5" 
                        <?php if($print_value[groupnumber] === "5"){echo "selected=\"selected\"";} ?>>المحظورين</option>
                        </select>
						</div>
                    
                    

					
					
					                    					<div class="element">
                                        <b>
						<label for="name">قام بدفع عمولة </label>
						<input name="The_pay_commission" type="radio" value="1" <?php if($print_value[The_pay_commission] === "1"){echo 
						"checked=\"checked\" ";} ?> />
                          نعم
                        <input name="The_pay_commission" type="radio" value="0" 
                        <?php if($print_value[The_pay_commission] === "0"){echo 
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
