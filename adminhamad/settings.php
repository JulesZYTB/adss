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
<title>الأعدادات - لوحة التحكم</title>
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
		    <div class="h_title">إعدادت الموقع الرئيسية</div>
            
            <?php
			if($_POST['save'] and $group_num === "1"){
				
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
				
				$name_website = $_POST['name_website'];
				$name_website = secure_input("$name_website","text_input");
				
				$messages_phone = $_POST['messages_phone'];
				$messages_phone = secure_input($messages_phone,"text_input");
				
				$username = $_POST['username'];
				$username = secure_input($username,"text_input");
				
				$password = $_POST['password'];
				$password = secure_input($password,"text_input");
				
				$keywords = $_POST['keywords'];
				$keywords = secure_input($keywords,"text_input");
				
				$description = nl2br($_POST['description']);
				$description = secure_input($description,"text_input");
				
				$emilecommunication = $_POST['emilecommunication'];
				$emilecommunication = secure_input($emilecommunication,"text_input");
				
				$namewebsiteen = $_POST['namewebsiteen'];
				$namewebsiteen = secure_input($namewebsiteen,"text_input");
				
				$Facebook_account  = $_POST['Facebook_account'];
				$Facebook_account = secure_input($Facebook_account,"text_input");
				
				$Twitter_account = $_POST['Twitter_account'];
				$Twitter_account = secure_input($Twitter_account,"text_input");
				
				
				
				$stylefolder = "default";
				$stylefolder = secure_input($stylefolder,"text_input");
				
				$commission = $_POST['commission'];
				$commission = secure_input($commission,"text_input");
				

				
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				
				if($messages_phone === "on" and empty($username) || empty($password)){
					$error_massage = "من فضلك أدخل اسم المستخدم او كلمة المرور الخاصة بنظام الرسائل . <br />";
					$error_massage_re = 1;
					}else{
					$error_massage_re = 0;
					}
					
				if(empty($name_website)){
					$name_website_re = "من فضلك قم بكتابة اسم الموقع .<br />";
					$error_massage_re_2 = 1;
				}else{
					$error_massage_re_2 = 0;
					}
				
				if(empty($emilecommunication)){
					$emilecommunication_re = "من فضلك يجب عليك إدخال البريد الألكتروني الذي ستصل عليه رسائل اتصل بنا .<br />";
					$error_massage_re_3 = 1;
				}else{
					$error_massage_re_3 = 0;
					}
					
					
					if(empty($stylefolder)){
					$stylefolder_re = " من فضلك ضع اسم مجلد الأستايل الخاص بالسكربت
					<br />";
					$error_massage_re_4 = 1;
				}else{
					$error_massage_re_4 = 0;
					}
					
										if(empty($namewebsiteen)){
					$namewebsiteen_re = " من فضلك قم بكتابة اسم موقعك بالأنجليزي
					<br />";
					$error_massage_re_5 = 1;
				}else{
					$error_massage_re_5 = 0;
					}
				
				
				if($error_massage_re === 1 || $error_massage_re_2 === 1 || $error_massage_re_3 === 1 || $error_massage_re_4 === 1|| $error_massage_re_5 === 1){
						echo "
						<div class=\"n_error\"><p>
						$error_massage

						$name_website_re

						$emilecommunication_re
						
						$stylefolder_re
						
						$namewebsiteen_re
						</p></div>
						";
					}else{
				
				
				$query_keyinformation = "UPDATE `keyinformation` set 
				namewebsite = \"$name_website\" , messagesphone = \"$messages_phone\"
				, username = \"$username\" , password = \"$password\"
				, keywords = \"$keywords\" , description = \"$description\" , emilecommunication = \"$emilecommunication\" , 
				stylefolder = \"$stylefolder\"  , namewebsiteen = \"$namewebsiteen\" ,
				commission = \"$commission\" 
				, Facebook_account = \"$Facebook_account\" , Twitter_account = \"$Twitter_account\"
				 where id = \"1\" ";
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
				
				}
			?>
            
				<form action="" method="post">
                <?php
					/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
				
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_keyinformation_print = "SELECT * FROM `keyinformation` WHERE id = \"1\" ";
				$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
				$print_value = mysqli_fetch_array($result_keyinformation_print);
				
				$namewebsite = $print_value[namewebsite];
				$messagesphone = $print_value[messagesphone];
				$username = $print_value[username];
				$password = $print_value[password];
				$keywords = $print_value[keywords];
				$description = nl2br($print_value[description]);
				$emilecommunication = $print_value[emilecommunication];
				$namewebsiteen = $print_value[namewebsiteen];
				$stylefolder = $print_value[stylefolder];
				$commission = $print_value[commission];
				$Twitter_account = $print_value[Twitter_account];
				$Facebook_account  = $print_value[Facebook_account];
				
				
				// اغلاق الأتصال بقاعدةالبيانات
				mysqli_close($mysqli);		
				
				?>
					<div class="element">
						<label for="name">اسم الموقع <span class="red">(مطلوب)</span></label>
						<input id="name" name="name_website" value="<?php echo $namewebsite; ?>" maxlength="100" class="text err" />
					</div>
                    
                    					<div class="element">
						<label for="name">اسم الموقع انجليزي <span class="red">(مطلوب)</span></label>
						<input id="name" name="namewebsiteen" value="<?php echo $namewebsiteen; ?>" maxlength="100" class="text err" />
					</div>
                    
                                                            					<div class="element">
						<label for="name">حساب تويتر</label>
						<input id="name" name="Twitter_account" value="<?php echo $Twitter_account; ?>" maxlength="100" class="text" />
					</div>
                    
                    
                                                            					<div class="element">
						<label for="name">رابط الحساب في الفيس بوك</label>
						<input id="name" name="Facebook_account" value="<?php echo $Facebook_account; ?>" maxlength="100" class="text" />
					</div>
                    
                                        					<div class="element">
						<label for="name">نسبة عمولة الموقع</label>
						<input id="name" name="commission" value="<?php echo $commission; ?>" maxlength="100" class="text" />
					</div>
                    
	
					<div class="element">
	<label for="comments">نظام إرسال الرسائل <span class="red">(إذا إردت السكربت يرسل رسايل للجوال لتوثيق الجوال)</span></label>
                        
						<input type="radio" name="messages_phone" value="on" 
						<?php if($messagesphone === "on"){echo "checked=\"checked\"";} ?>  />
                         إتاحة 
                         <input type="radio" name="messages_phone" value="off"
                         <?php if($messagesphone === "off"){echo "checked=\"checked\"";} ?> /> تعطيل
                    <br />
                    <br />
						<label for="name">رقم جوال المستخدم :  <span class="red">(مطلوب إذا تم تفعيل نظام إرسال الرسائل)</span></label>
						<input id="name" name="username"  maxlength="14" value="<?php echo $username; ?>" class="text" />
                        <br /><br />
						<label for="name">كلمة مرور المستخدم :   <span class="red">(مطلوب إذا تم تفعيل نظام إرسال الرسائل)</span></label>
						<input id="name" name="password" value="<?php echo $password; ?>" maxlength="50" class="text" />
                    
                    					</div>

                    
                    
                    
                                        						<div class="element">
						<label for="name">البريد الألكتروني الخاص بـ اتصل بنا و رسائل دفع العمولة  <span class="red">(مطلوب ستصل عليه رسائل اتصل بنا و رسائل دفع العمولة)</span></label>
						<input id="name" name="emilecommunication" value="<?php echo $emilecommunication; ?>" maxlength="50" class="text" />
					</div>
                    
                    
                    
						<div class="element">
						<label for="name">الكلمات الدلالية <span>(يفضل للأرشفة يفصل بين كل كلمة و كلمة بفاصلة , )</span></label>
						<input id="name" name="keywords" value="<?php echo $keywords; ?>" maxlength="1000" class="text" />
					</div>
                    

                    
					<div class="element">
						<label for="content">الوصف <span>(يفضل للأرشفة)</span></label>
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
