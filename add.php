<?php
session_start();
ob_start();
include("include/config_header.php");	
if(!isset($_SESSION['id_members'])){header("location:login.php");}
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print = "SELECT * FROM `keyinformation` WHERE id = \"1\" ";
$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
$print_value = mysqli_fetch_array($result_keyinformation_print);
$namewebsite = $print_value[namewebsite];
$namewebsiteen = $print_value[namewebsiteen];
$keywords = $print_value[keywords];
$messagesphone = $print_value[messagesphone];
$description = nl2br($print_value[description]);
$username_mobile = $print_value[username];
$password_mobile = $print_value[password];

?>

<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>إضافة اعلان جديد في <?php echo $namewebsite; ?></title> 
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<link href="templates/default/css/bootstrap.rtl.min.css" rel="stylesheet" media="screen"> 
<link href="templates/default/css/custom3.css?v=1.4" rel="stylesheet" media="screen">
<link href="templates/default/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="templates/default/css/custom-icon-fonts.css?v=1.1">
<script async src="templates/default/js/analytics.js"></script>
<script src="templates/default/js/respond.min.js"></script>
<script src="templates/default/js/html5shiv.js" type="text/javascript"></script>
<script src="templates/default/js/respond.proxy.js"></script>
<script src="templates/default/js/jquery-1.10.1.min.js"></script>
<script src="templates/default/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="templates/default/js/cars.js"></script>
<script src="templates/default/js/bootstrap.min.js"></script>
<script type="text/javascript" src="templates/default/js/v5.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 
 
 
 
<?php
$id_reg = $_GET[id_reg];
include("header.php"); // استدعاء ملف الهيدر
?>
      
      
<div class="row" id="wrapper">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

    
<?php 

    
// UpDate9M12D2016Y
// جلب عدد إعلانات العضو 
$FindMember = "SELECT * FROM `members` WHERE id = '$IdMemUpdate9M12D' ";
$Ex_FindMember = mysqli_query($mysqli,$FindMember);
$PrintInfMem_UpdateNumOfAds = mysqli_fetch_array($Ex_FindMember);
$NumOfAds = $PrintInfMem_UpdateNumOfAds['NumOfAds'];
$StateCommission = $PrintInfMem_UpdateNumOfAds['The_pay_commission']; 
if( ($StateCommission == 1 and $NumOfAds >= 6) || ($StateCommission == 0 and $NumOfAds >= 3)  ){
echo "<div class=\"alert alert-info\"> لقد تجاوزت عدد الأعلانات المسموحة لك خلال هذا اليوم ، لقد قمت بنشر $NumOfAds اعلانات </div>";
}else{    
?>

<?php
if($documentingmobile != "1" and $messagesphone === "on"){header("location:verify_mobile.php");}else{
?>

	

    
    
	<!--Body content-->

	<br>
		<div class="comment">
        			
        	
		<?php
		$_sec_id = $_GET['sec'];
		$_sec_id = secure_input($_sec_id,"int");
		
		if(empty($_sec_id)){
		?>
			<h3> »  إضافة إعلان جديد</h3>
			هل ترغب في الإعلان عن:
			<form action="" method="get" class="form-inline ">
			
            <?php
			$query_view_sectionoadvertise = "SELECT * FROM `sectionoadvertise` ORDER BY ID";
			$result_view_sectionoadvertise = mysqli_query($mysqli,$query_view_sectionoadvertise);
			$num_rows_view_sectionoadvertise = mysqli_num_rows($result_view_sectionoadvertise);
			if($num_rows_view_sectionoadvertise  > 0){
			while($fetch_array_inf_section = mysqli_fetch_array($result_view_sectionoadvertise)){
			?>
            	
				<label class="radio">
				  <input type="radio" name="sec" value="<?php echo $fetch_array_inf_section[id]; ?>">
				  <a href="add.php?sec=<?php echo $fetch_array_inf_section[id]; ?>">
				  	<?php echo $fetch_array_inf_section[title]; ?>
				  </a>
				</label>
                <br><br>
                <?php
				}
				}else{
					echo "<br><div class=\"alert alert-info\">نأسف و لكن لا توجد اقسام</div>";
					}
				?>

			<input type="submit" value="إستمرار  »" class="btn btn-primary btn-lg">
			
			</form>
            
            <?php
			}else{
			?>
                           <?php
					$query_view_sectionoadvertise = "SELECT * FROM `sectionoadvertise` where id = \"$_sec_id\"";
					$result_view_sectionoadvertise = mysqli_query($mysqli,$query_view_sectionoadvertise);
					$num_rows_view_sectionoadvertise = mysqli_num_rows($result_view_sectionoadvertise);
					$fetch_array_inf_section = mysqli_fetch_array($result_view_sectionoadvertise);
					if($num_rows_view_sectionoadvertise > 0){
					?>

     				                <?php
				if($_POST['add-final'] || $_POST['add-final-2']){
				?>
                <div class="col-xs-12  col-sm-8 col-md-9 col-lg-9 " style="float:right;">
	
				<?php 
				$type_section = $fetch_array_inf_section[section];
				$type_section_type = $fetch_array_inf_section[type];
				?>
		
			<?php
				////
		if($_POST['add-final-2']){
		
			$ads_title = $_POST['ads_title'];
			$ads_title = secure_input($ads_title,"text_input");
			$ads_title = str_replace("%","",$ads_title);
			
			$ads_city = $_POST['ads_city'];
			$ads_city = secure_input($ads_city,"text_input");
			
			$ads_tags_R = $_POST['ads_tags_R'];
			$ads_tags_R = secure_input($ads_tags_R,"text_input");
			
			$ads_tags_F = $_POST['ads_tags_F'];
			$ads_tags_F = secure_input($ads_tags_F,"text_input");
			
			$ads_tags_FF = $_POST['ads_tags_FF'];
			$ads_tags_FF = secure_input($ads_tags_FF,"text_input");
			
			$ads_contact = $_POST['ads_contact'];
			$ads_contact = secure_input($ads_contact,"text_input");
			
			$ads_body =  $_POST['ads_body'];
			$ads_body = secure_input($ads_body,"text_input");
			$ads_body =  nl2br($ads_body);

			$image_link =  $_POST['image_link'];
			if(empty($image_link)){}else{
			$image_link = implode(",",$image_link);
			}
			$image_link = secure_input($image_link,"text_input");
			
			$type_ads_other = secure_input($type_ads_other,"text_input");
			
			$Time_added = time();
			$His_announcement = $id_member;
			
			$type_ads_other_final =  $_POST['type_ads_other_final'];
			$type_ads_other_final = secure_input($type_ads_other_final,"text_input");
			$type_ads_or = $type_section_type;
			
			
			$un_model = $_POST['un_model'];
			$un_model = secure_input($un_model,"text_input");
			
			
			if(empty($type_ads_other_final)){
			$type_ads_other_final = $type_section;
			}else{
			$type_ads_other_final =  $_POST['type_ads_other_final'];
			$type_ads_other_final = secure_input($type_ads_other_final,"text_input");
			} 
			
			
			
			if(empty($ads_title) and empty($ads_city) and empty($ads_tags_R) and empty($type_ads_other) and empty($His_announcement)){
			}else{
			
			/// استعدعاء ملف الأتصال بقاعدة البيانات
			include("include/config.php");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");

			
			$query_add_section = "INSERT INTO `ads` 
			(`ads_title`,`ads_city`,`ads_tags_R`,`ads_tags_F`,
			`ads_tags_FF`,`ads_contact`,`ads_body`,`image_link`,`type_ads_other_final`
			,`un_model`,`status`,`fixing`,`Time_added`,`His_announcement`,`type_ads_or`,`Last_updated_Ad`) 
			VALUES (\"$ads_title\",\"$ads_city\",\"$ads_tags_R\",\"$ads_tags_F\",
			\"$ads_tags_FF\",\"$ads_contact\",\"$ads_body\",\"$image_link\",\"$type_ads_other_final\"
			,\"$un_model\",\"1\",\"0\",\"$Time_added\",\"$His_announcement\",\"$type_ads_or\",\"$Time_added\")";
			$execution_query_add_section = mysqli_query($mysqli,$query_add_section);
			

			
			
			
			if($execution_query_add_section){	
			mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_keyinformation_print_m = "SELECT * FROM `ads` WHERE ads_title = \"$ads_title\" and Time_added = \"$Time_added\"
			and His_announcement = \"$His_announcement\" ";
			$result_keyinformation_print_m = mysqli_query($mysqli,$query_keyinformation_print_m);
			$print_value_m = mysqli_fetch_array($result_keyinformation_print_m);
			$id_ads_mem_mtb = $print_value_m[id];
			
			////////////////////////////////
			$time_delet_nows = time()-(60*60*24*30);
			$query_chek = "SELECT * FROM `menu_follow` WHERE ads_tags_R = \"$ads_tags_R\" and
			ads_tags_F = \"$ads_tags_F\" and ads_tags_FF = \"$ads_tags_FF\" and time_follow > \"$time_delet_nows\" 
			and ad_city = \"$ads_city\"";
			$result_query_chek = mysqli_query($mysqli,$query_chek);
			$result_query_chek_num = mysqli_num_rows($result_query_chek);
			if($result_query_chek_num > 0){
			while($result_query_chek_numf = mysqli_fetch_array($result_query_chek)){
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");

						$query_login_m_ad = "SELECT * FROM `members` where id = \"$result_query_chek_numf[id_mem]\" ";
			$result_query_m_ad = mysqli_query($mysqli,$query_login_m_ad);
			$Data_member_m_ad = mysqli_fetch_array($result_query_m_ad);
			$email_member_2_m_ad =  $Data_member_m_ad[email];
			$username_member_2_m_ad =  $Data_member_m_ad[username];
			$subscribe_3_member_2_m_ad =  $Data_member_m_ad[subscribe_3];
			if($subscribe_3_member_2_m_ad === "1"){
			$subject = "تم إضافة اعلان لسلعة تتابعها"; 
			$message = "
					أخي $username_member_2_m_ad,

يوجد لديك اعلان جديد في قائمة الأشعارات لأنك كنت تتابع سلعه
$fixed_htaccess/note.php
					"  ;
						// الدالة mail 
					mail ( "$email_member_2_m_ad" , "$subject" , "$message");
					}
			$time_now_note = time();
			$query_add_bank = "	INSERT INTO `note_hraj` 
			(`id`, `id_note`, `id_mem`, `type`, `un_read`,`time_note`) 
			VALUES (NULL, \"$id_ads_mem_mtb\", \"$result_query_chek_numf[id_mem]\", \"1\", \"0\",\"$time_now_note\");";
			$execution_query_add_bank = mysqli_query($mysqli,$query_add_bank);
			
			}
			}
			
			$time_delet_nows = time()-(60*60*24*30);
			$query_chek = "SELECT * FROM `menu_follow` WHERE ads_tags_R = \"$ads_tags_R\" and
			ads_tags_F = \"$ads_tags_F\" and ads_tags_FF = \"$ads_tags_FF\" and time_follow > \"$time_delet_nows\" and ad_city = \"0\" ";
			$result_query_chek = mysqli_query($mysqli,$query_chek);
			$result_query_chek_num = mysqli_num_rows($result_query_chek);
			if($result_query_chek_num > 0){
			

			
			
			while($result_query_chek_numf = mysqli_fetch_array($result_query_chek)){
			
			$query_login_m_ad = "SELECT * FROM `members` where id = \"$result_query_chek_numf[id_mem]\" ";
			$result_query_m_ad = mysqli_query($mysqli,$query_login_m_ad);
			$Data_member_m_ad = mysqli_fetch_array($result_query_m_ad);
			$email_member_2_m_ad =  $Data_member_m_ad[email];
			$username_member_2_m_ad =  $Data_member_m_ad[username];
			$subscribe_3_member_2_m_ad =  $Data_member_m_ad[subscribe_3];
			if($subscribe_3_member_2_m_ad === "1"){
			$subject = "تم إضافة اعلان لسلعة تتابعها"; 
			$message = "
					أخي $username_member_2_m_ad,

يوجد لديك اعلان جديد في قائمة الأشعارات لأنك كنت تتابع سلعه
$fixed_htaccess/note.php
					"  ;
						// الدالة mail 
					mail ( "$email_member_2_m_ad" , "$subject" , "$message");
					}
			
			$time_now_note = time();
			$query_add_bank = "	INSERT INTO `note_hraj` 
			(`id`, `id_note`, `id_mem`, `type`, `un_read`,`time_note`) 
			VALUES (NULL, \"$id_ads_mem_mtb\", \"$result_query_chek_numf[id_mem]\", \"1\", \"0\",\"$time_now_note\");";
			$execution_query_add_bank = mysqli_query($mysqli,$query_add_bank);
			
			}
			}
			
			$query_mem_s = "SELECT * FROM `follow_member` WHERE id_follow = \"$id_member\"";
			$query_mem_s_re = mysqli_query($mysqli,$query_mem_s);
			$query_mem_s_re_num = mysqli_num_rows($query_mem_s_re);
			if($query_mem_s_re_num > 0){
			while($result_query_chek_numf = mysqli_fetch_array($query_mem_s_re)){
			$time_now_note = time();
			$query_add_bank = "	INSERT INTO `note_hraj` 
			(`id`, `id_note`, `id_mem`, `type`, `un_read`,`time_note`) 
			VALUES (NULL, \"$id_ads_mem_mtb\", \"$result_query_chek_numf[id_member_f]\", \"1\", \"0\",\"$time_now_note\");";
			$execution_query_add_bank = mysqli_query($mysqli,$query_add_bank);
			
			}
			}
			/////////////////////////////////////////
			echo $type_ads_other;
            
            /// Update12D9M2016Y
            $NumOfAds++; // +1
            $EditNumOfAds = "UPDATE `members` SET  NumOfAds = '$NumOfAds' WHERE id = '$IdMemUpdate9M12D' ";
            $Ex_EditNumOfAds = mysqli_query($mysqli,$EditNumOfAds);
                  
			header("location:ads/$print_value_m[id]/$print_value_m[ads_title]/");
			}else{
			}
					

			}
			}
		?>
		
		
		<h3> »  إضافة إعلان جديد</h3>
	
		
		
		<form method="post" id="fileupload">
		 
		 
		<br>
			  <div class="form-group">
		    <label>عنوان الإعلان</label>
		    
		      <input type="text" name="ads_title" maxlength="36" placeholder="مثلا: هوندا اكورد 2007 فل كامل للبيع" class="form-control  ">
	 
	  			</div>
			  <hr>
			    <div class="form-group">
		    <label>المدينة</label>
		   
		       
		           <select  name="ads_city" class="form-control  custom-input-control">
		             <option value="">أختر المدينة</option>
						<?php
						/// استعدعاء ملف الأتصال بقاعدة البيانات
						include("include/config.php");	

						$id = $_SESSION['id_members'];
						$id_member = secure_input($id,"int");
						$view_query_city = "SELECT * FROM `cities` ORDER BY id";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
						<option value="<?php echo $array_city[id]; ?>"><?php echo $array_city[text]; ?></option>
						
						<?php
						
						}
						?>
					
                    
                    
               


         
		           </select>   
  	    </div>
  
	  <hr>
	    <div class="form-group ">
    <label>القسم</label>



		   
       <div id="tagselect">
	   


			
			<?php 
			
			if($type_section_type  === "1"){
			$type_ads_other = $type_section;
			?>

		     
		   <select name="ads_tags_R" id="1" class="ads_tags form-control custom-input-control" onchange="showUser(this.value)">
			<option value=""><?php if($type_section === "السيارات"){echo "أختر ماركة السيارة";}else{echo "أختر القسم المناسب";}
			?></option>
					<?php
						/// استعدعاء ملف الأتصال بقاعدة البيانات
						include("include/config.php");
						$view_query_city = "SELECT * FROM `section` WHERE Contents = \"$type_section\" and type = \"رئيسي\"";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
						<option value="<?php echo $array_city[id]; ?>
						"><?php echo $array_city[name]; ?></option>
						
						<?php
						
						}
					?>
			</select>
	<?php
	  }else{
	  $type_ads_other = "";
	  ?>
	  <select name="type_ads_other_final" id="1" class="ads_tags form-control custom-input-control"  onchange="sshowUser_ab(this.value)">
			   
			   			    <option value="">أختر القسم المناسب</option>
						 <?php

$res_hb = mysqli_query($mysqli,"SELECT * FROM cat");

while($rs = mysqli_fetch_array($res_hb)) {

?>
<option value="<?php echo $rs['title']; ?>"><?php echo $rs['title']; ?></option>

<?php
}
?>
						 
						</select>
	  
	  
	  <?php
	  }
	  ?>
	  <div id="txtHint_ab"></div>
	 <div id="txtHint"></div>
	  <div id="txtHint_2"></div>
	  		   <script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","section.php?type=<?php echo $type_section; ?>&q="+str,true);
  xmlhttp.send();
}
</script>

	   <script>
function showUser_section(str) {
  if (str=="") {
    document.getElementById("txtHint_2").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint_2").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","section_2.php?type=<?php echo $type_section; ?>&q="+str,true);
  xmlhttp.send();
}
</script>

	   <script>
function sshowUser_ab(str) {
  if (str=="") {
    document.getElementById("txtHint_ab").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint_ab").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("GET","section_a.php?type=<?php echo $type_section; ?>&q="+str,true);
  
  xmlhttp.send();
}
</script>











	  
	   		 </div>

	  

		</div>
		
	  

	  
	  
	   <hr>
	   
	  <div class="form-group">
    <label>وسيلة الإتصال</label>
   
      <input id="ads_contact" type="text" name="ads_contact" placeholder="أكتب رقم جوالك هنا" class="form-control  custom-input-control">    

		</div>
	  <hr>
	   
	   <div class="form-group">
		
		<label>نص الإعلان</label>
		
		<p>
		<span class="label label-warning">
		الإعلان غير مكتمل التفاصيل سيتم حذفه.
		</span>
		</p>
		<br>
		<textarea rows="9" placeholder="اكتب تفاصيل الإعلان هنا" name="ads_body" class="form-control"></textarea>
		
		</div>
		
		<div style="clear:both;"></div>
 <br>

		
 <!-- The fileinput-button span is used to style the file input field as button -->
 <span class="btn btn-success fileinput-button">
                    <i class="fa fa-plus"></i>
                    <span>..تحميل الصور</span>
        <input id="fileupload" type="file" name="files[]" multiple>
                </span>
				

    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>
   
</div>

		
		<div style="clear:both;"></div>


                	   	   	 <script>
							 $('input[name="ads_title"]').keyup(function() {
		if (this.value.match(/[^a-zA-Z\(\).0-9ضصثقفغعهخحجدذشسيبلاتنمكطئءؤرلاىةوزظَآإأـى٠١٢٣٤٥٦٧٨٩_ -]/g)) {
          this.value = this.value.replace(/[^a-zA-Z\(\).0-9ضصثقفغعهخحجدذشسيبلاتنمكطئءؤرلاىةوزظَآإأـى۰۱۲۳٤٥٦٧۸۹_ -]/g, '');
      }
  });
  
  
	   	   	 $('form').submit(function(){
	   	   	     var returnValue = false;
					
				if($('input[name="ads_title"]').val() == "") {
	   	   		alert('العنوان قصير جدا');
				returnValue = false;
	   	   		 } else {
				if($('select[name="ads_city"]').val() == "") {
	   	   		alert('نرجو اختيار المدينة');
				returnValue = false;
	   	   		 } else {
	   	   	     if($('input[name="ads_contact"]').val() == "") {
	   	   		 alert('من فضلك اكتب وسيلة الإتصال');
				returnValue = false;
	   	   		 } else {
				 if($('select[name="ads_tags[]"]').val() == "") {
	   	   		alert('نرجو التأكد من اختيارك  القسم المناسب');
				returnValue = false;
	   	   		 } else {
				 if($('select[name="ads_tags_F"]').val() == "") {
	   	   		alert('نرجو التأكد من اختيارك  القسم المناسب');
				returnValue = false;
	   	   		 } else {
				 if($('select[name="ads_tags_FF"]').val() == "") {
	   	   		alert('نرجو التأكد من اختيارك  القسم المناسب');
				returnValue = false;
	   	   		 } else {
				 returnValue = true;
				 }
				  }
				 }
	   			 }
	   			 }
	   			 }
				 
				 




	   	   	     return returnValue;
	   	   	 });
	 
	   	   	  </script>



		
		
		
	
			
		</div>
		
		
		  <input name="sec" value="1" type="hidden">
		  <input type="submit" name="add-final-2" value="إضافة الإعلان للموقع" class="btn btn-lg btn-primary">
		</form>
		
		
        

        
        
		
		<br>
		<br>
		
		
		
		
		<div>
			
			<span class="label label-success">ملاحظة</span>
			 إذا كنت تواجه مشكلة في رفع الصور لإعلانك، نرجو التواصل مع الأدارة
		
		</div>
		<br>
		
		</div>
                <?php
					}
					else{
				?>
                
                
            	<h3> »   إتفاقية العمولة في موقع إعلانات السعودية</h3>

				<hr>
				بسم الله الرحمن الرحيم
				
				<br>
				قال الله تعالى  <b>" وَأَوْفُواْ بِعَهْدِ اللهِ إِذَا عَاهَدتُّمْ وَلاَ تَنقُضُواْ الأَيْمَانَ بَعْدَ تَوْكِيدِهَا وَقَدْ جَعَلْتُمُ اللهَ عَلَيْكُمْ كَفِيلاً "</b>
				صدق الله العظيم
				<hr>
				
				<form method="post" name="no"checked="">
			
			  	   <div class="checkbox">
			  	   	 <label>
			  	           <input type="checkbox" name="chk[]"="question" value="no"checked="">>
				   
						   أتعهد   <b> وأقسم بالله </b>  أنا المعلن أن أدفع عمولة الموقع وهي  1%   من قيمة الصفقة في حالة بيعها عن طريق الموقع أو بسبب الموقع وأن هذه العموله هي أمانه في ذمتي.  <span class="red">ملاحظة:عمولة الموقع هي على المعلن ولاتبرأ ذمة المعلن من العمولة إلا في حال دفعها،ذمة المعلن لاتبرأ من العمولة بمجرد ذكر أن العمولة على المشتري في الإعلان
					</span>		   
			  	         </label>
						 </div>
<br>
            
            				 <?php
							 if(!empty($fetch_array_inf_section[Condition1])){
							 ?>
            		 	     <div class="checkbox">
		 	  	          	 <input type="checkbox" name="chk[]">
					 	 	 <?php echo $fetch_array_inf_section[Condition1]; $c_total_1 = 1; ?>
							 </div>
                             <br>
                      	 	 <?php
							 }
							 ?>
                         
                                  
            				 <?php
							 if(!empty($fetch_array_inf_section[Condition2])){
							 ?>
            		 	     <div class="checkbox">
		 	  	          	 <input type="checkbox" name="chk[]">
					 	 	 <?php echo $fetch_array_inf_section[Condition2]; $c_total_2 = 1; ?>
							 </div>
                             <br>
                      	 	 <?php
							 }
							 ?>
                         
                         
                                  
            				 <?php
							 if(!empty($fetch_array_inf_section[Condition3])){
							 ?>
            		 	     <div class="checkbox">
		 	  	          	 <input type="checkbox" name="chk[]">
					 	 	 <?php echo $fetch_array_inf_section[Condition3]; $c_total_3 = 1; ?>
							 </div>
                             <br>
                      	 	 <?php
							 }
							 ?>
                         
                         
					



		  			<hr>
					<span class="label label-success">سؤال للتأكد من قراءة الشروط السابقة:</span>
					<br>
						هل تبرأ ذمة المعلن من العمولة بذكر أن عمولة الموقع على المشتري في الإعلان؟   
						
				<br> 
<div class="radio">
 <label>
				
					</label>
				</div>

<div class="radio "> <label>
					  <input type="radio" name="question" value="no"checked="">
					 لا
					</label>

				</div>
				

				<br>	  						<br>
			<input type="submit" name="add-final" value="إستمرار  »" class="btn btn-primary btn-lg">
			
		
				</form>
                
                	   	   	 <script>
	   	   	 $('form').submit(function(){
	   	   	     var returnValue = false;
				
				<?php
				$c_total = $c_total_1 + $c_total_2 + $c_total_3;
				?>
	   		
	   	   	     if($('input[name="chk[]"]:checked').length > <?php echo $c_total; ?>) {
	   	   		 returnValue = true;
	   	   		 } else {
	   				 alert('وافق على المعاهدة أولاً');
					 returnValue = false;
	   			 }
				 if(returnValue){
					 if($('input:radio[name=question]:checked').val()=="no"){
						  returnValue = true;
					 }else {
		   				 alert('الجواب خطأ');
						 returnValue = false;
					 }
				 }

	   	   	     return returnValue;
	   	   	 });
	 
	   	   	  </script>
                
                <?php
				}
				?>

		
	              <?php
				   }else{
					  header("location:add.php");
					   }                        
                   ?>
                   
	   	   	 

	   	   	  
		
            <?php
				}
			?>
			

			</div>
	</div>
    
<?php  } 
      } // الشرط الخاص بعدد الأعلانات     ?>
</div>
<?php


ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="js/jquery.fileupload-validate.js"></script>
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('abled', true)
            .text('حذف')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                    $(this).parents('p').remove();
                $this
                    .off('click')
                    .on('click', function () {
                        $(this).parents('p').remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpeg|png)$/i,
        maxFileSize: 5000000, // 5 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
            .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }

    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {

            if (file.url) {
      var link = $('')

                $(data.context.children()[index])
                    .wrap(link)
.append($('<input>').prop('type', 'hidden').prop('name', 'image_link[]').prop('value',(file.url)));

            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            } 
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
        $('#fileupload').fileupload('option', { autoUpload:true	});

});
</script>

 </body></html>