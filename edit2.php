<?php
session_start();
ob_start();
include("include/config_header.php");	
ob_start();
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
$emilecommunication = $print_value[emilecommunication];
?>

<?php
include("include/functions/ftime.php");
$url_ads = $_SERVER['REQUEST_URI'];
$exp_ads = explode("/",$url_ads);
include("include/functions/Secure_input2.php");
$ads_id = $_GET['ads_id'];
$ads_id = secure_input2($ads_id,"int");


mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print = "SELECT * FROM `ads` WHERE id = \"$ads_id\" ";
$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
$print_value = mysqli_fetch_array($result_keyinformation_print);
$print_value_num_row = mysqli_num_rows($result_keyinformation_print);
$ads_title = $print_value[ads_title];
$His_announcement_s = $print_value[His_announcement];
$ads_city = $print_value[ads_city];
$Last_updated_Ad_update = $print_value[Last_updated_Ad];
$time_add_ads = $print_value[Time_added];
$Time_added = timeago($print_value[Time_added]);
$Last_updated_Ad_update_arabic = timeago($Last_updated_Ad_update);
$ads_body = $print_value[ads_body];
$image_link = $print_value[image_link];
$close_ads = $print_value[close_ads];
$ads_contact = $print_value[ads_contact];
//////////////////////////////////////
$ads_tags_R = $print_value[ads_tags_R];
$ads_tags_F = $print_value[ads_tags_F];
$ads_tags_FF = $print_value[ads_tags_FF];
$un_model = $print_value[un_model];
$type_ads_other_final = $print_value[type_ads_other_final];
///////////////////////// link next ad ////////////////////
$link_next_ad = $ads_id - 1;
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print_next_ad = "SELECT * FROM `ads` WHERE id = \"$link_next_ad\" ";
$result_keyinformation_print_next_ad = mysqli_query($mysqli,$query_keyinformation_print_next_ad);
$print_value_next_ad = mysqli_fetch_array($result_keyinformation_print_next_ad);
$if_ad_next_found = mysqli_num_rows($result_keyinformation_print_next_ad);
if($if_ad_next_found > 0){
$if_found_ad = 1;
$new_id_link = $print_value_next_ad[id];
$new_title_link = $print_value_next_ad[ads_title];
}else{
	$if_found_ad = 0;
	}
///////////////////////// link next ad ////////////////////




/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_login_m_ad = "SELECT * FROM `members` where id = \"$His_announcement_s\" ";
$result_query_m_ad = mysqli_query($mysqli,$query_login_m_ad);
$Data_member_m_ad = mysqli_fetch_array($result_query_m_ad);
$group_num_m_ad = $Data_member_m_ad[groupnumber];
$username_member_2_m_ad =  $Data_member_m_ad[username];
$id_user_m_ad =  $Data_member_m_ad[id];

include("include/config.php");
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print_city = "SELECT * FROM `cities` WHERE id = \"$ads_city\" ";
$result_keyinformation_print_city = mysqli_query($mysqli,$query_keyinformation_print_city);
$print_value_city = mysqli_fetch_array($result_keyinformation_print_city);
$ads_city_name = $print_value_city[text];



?>
<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $namewebsite; ?></title>
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
include("header.php"); // استدعاء ملف الهيدر
?>
<?php 

?>
<div class="row">

<?php 
echo $His_announcement_saa;
if((($His_announcement_s === $id_member) || $group_num === "1" || $group_num === "2") 
and $print_value_num_row > 0){
 ?>


<div class="comment">

    



<?php
if($_POST['submit']){

						

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
			if(!empty($image_link)){
			$image_link = implode(",",$image_link);
			}
			$image_link = secure_input($image_link,"text_input");
			
			/// جلب الرابط الخاص بالصورة الأولى
			$thumbnail_link_ex = explode(",",$image_link);
			$thumbnail_link = $thumbnail_link_ex[1];
			if(empty($thumbnail_link)){$thumbnail_link = $thumbnail_link_ex[0];}
			// جلب الرابط الخاص بالصورة الأولى

			
			// جلب اسم الملف الخاص بالصورة الأولى 
			$file_info = pathinfo($thumbnail_link);
			$type_img_f = $file_info['extension'];
			$filename_f = $file_info['filename'];
			$thumbnail_name = md5($file_info['basename']).".".$type_img_f;
			// جلب اسم الملف الخاص بالصورة الأولى 

			/// دالة انشاء الصورة المصغرة
			function compress($source, $destination, $quality) {

			$info = getimagesize($source);

			if ($info['mime'] == 'image/jpeg') 
			$image = imagecreatefromjpeg($source);

			elseif ($info['mime'] == 'image/gif') 
			$image = imagecreatefromgif($source);

			elseif ($info['mime'] == 'image/png') 
			$image = imagecreatefrompng($source);

			imagejpeg($image, $destination, $quality);

			return $destination;
			}
			/// دالة انشاء الصورة المصغرة
			

			if(!empty($image_link)){
			@compress("server/php/files/".$filename_f.".".$type_img_f, "thumbnail/".$filename_f.".".$type_img_f,$thumbnail_Quality);
			$image_link = $url_hraj."server/php/files/".$filename_f.".".$type_img_f.",".$image_link;
			}


			
			
			

			
			
			if(empty($ads_title) and empty($ads_city) and empty($ads_tags_R) and empty($type_ads_other)){
			}else{
			
			/// استعدعاء ملف الأتصال بقاعدة البيانات
			include("include/config.php");
			$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
			$query_add_section = "UPDATE `ads` set 
				ads_title = \"$ads_title\" , ads_city = \"$ads_city\"
				, ads_tags_R = \"$ads_tags_R\" , ads_tags_F = \"$ads_tags_F\"  , ads_tags_FF = \"$ads_tags_FF\"
				, ads_contact = \"$ads_contact\", ads_body = \"$ads_body\" , ads_body = \"$ads_body\" ,
				image_link = \"$image_link\" where id = \"$ads_id\" 
				";
			$execution_query_add_section = mysqli_query($mysqli,$query_add_section);
			if($execution_query_add_section){	
			//echo "<meta http-equiv=\"refresh\" content=\"0;URL=ads/$ads_id/$ads_title/\">";
			echo '<div class="alert alert-success">
		تم تعديل البيانات بنجاح
	</div>';
			}else{
			echo "يوجد خطأ في تعديل الموضوع من فضلك تواصل مع الأدارة";
			}
			}
			
					

	
	}
?>


	<div class="col-xs-12  col-sm-8 col-md-9 col-lg-9 ">
	
<!--Body content-->

	<div class="content content-head  before-post">	
		
		
		<h3> »    التعديل على الإعلان</h3>
	
			<form id="fileupload" method="post">
		 
		 
		<br>
		
  	  
	   <div class="form-group">
	  
    <label>نوع الاعلان</label>
    
    <br>
    	  
   	  </div>
   <hr>


			  <div class="form-group">
		    <label>عنوان الإعلان</label>
		   
		      <input type="text" name="ads_title" class="form-control  " value="<?php echo $ads_title; ?>">
	    
	  </div>
			  <hr>
			    <div class="form-group">
		    <label>المدينة</label>
		   
		           <select name="ads_city" class="form-control  custom-input-control">
                       
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
						<option <?php if($ads_city === $array_city[id]){?> selected="selected" <?php } ?> value="<?php echo $array_city[id]; ?>"><?php echo $array_city[text]; ?></option>
						
						<?php
						
						}
						?>
					


         
		           </select>   
  	    
  	  </div>
	  <hr>
	    <div class="form-group">
    <label>القسم</label>
    
		     <input name="ads_sec" value="حراج الأجهزة" type="hidden">
		   <div id="tagselect">
             
             
<select name="ads_tags_R" id="1" class="ads_tags form-control custom-input-control" onchange="showUser(this.value)">
<option value=""><?php if($type_ads_other_final === "السيارات"){echo "أختر ماركة السيارة";}else{echo "أختر القسم المناسب";}?>
</option>
<?php
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
$view_query_city = "SELECT * FROM `section` WHERE Contents = \"$type_ads_other_final\" and type = \"رئيسي\"";
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
$view_execution_city = mysqli_query($mysqli,$view_query_city);
while($array_city = mysqli_fetch_array($view_execution_city)){
?>
<option  <?php if($ads_tags_R === $array_city[id]){?> selected="selected" <?php } ?> value="<?php echo $array_city[id]; ?>
"><?php echo $array_city[name]; ?></option>
<?php

}
?>
</select>


<div id="txtHint_ab"></div>
	 <div id="txtHint">							
       <?php
	   
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
				$view_query_section = "SELECT * FROM `section` WHERE Documentto = \"$ads_tags_R\" and type = \"فرعي\" ";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_section = mysqli_query($mysqli,$view_query_section);
				$view_num_section = mysqli_num_rows($view_execution_section);
				if($view_num_section > 0){
				?>
			
				<select name="ads_tags_F" id="1" class="ads_tags form-control custom-input-control" onchange="showUser_section(this.value)">
			   	<option  value="">أختر القسم الفرعي</option>
				<?php
				while($feth_array_inf = mysqli_fetch_array($view_execution_section)){
				?>
				<option <?php if($ads_tags_F === $feth_array_inf[id]){?> selected="selected" <?php } ?> 
                value="<?php echo $feth_array_inf[id];?>"><?php echo $feth_array_inf[name];?></option>
				<?php
				}
				echo "</select>";
				?>
				
				<?php
				}else{
				}
			
			?></div>
	  <div id="txtHint_2">
      

<?php

				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
				$view_query_section = "SELECT * FROM `section` WHERE id = \"$ads_tags_F\"";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_section = mysqli_query($mysqli,$view_query_section);
				$feth_array_inf = mysqli_fetch_array($view_execution_section);
				$linkmodel = $feth_array_inf[linkmodel];				
				
				
				if($linkmodel === "no"){
				$type_se = $_GET['type'];
				$view_query_section = "SELECT * FROM `section` WHERE Documentto = \"$ads_tags_F\" and type = \"فرعي الفرعي\" ";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_section = mysqli_query($mysqli,$view_query_section);
				$view_num_section = mysqli_num_rows($view_execution_section);
				if($view_num_section > 0){
				?>
				<select name="ads_tags_FF" id="1" class="ads_tags form-control custom-input-control">
			   	<option value="">أختر القسم الفرعي</option>
				<?php
				while($feth_array_inf = mysqli_fetch_array($view_execution_section)){
				?>
				<option <?php if($ads_tags_FF === $feth_array_inf[id]){?> selected="selected" <?php } ?>  value="<?php echo $feth_array_inf[id];?>"><?php echo $feth_array_inf[name];?></option>
				<?php
				}
				echo "</select>";
				?>
				
				<?php
				}
				
				}
				
				if($linkmodel === "yes"){
				?>
				<input type="hidden" value="model" name="un_model" />
				<select name="ads_tags_FF" id="1" class="ads_tags form-control custom-input-control">
				<option value="">أختر الموديل</option>
					<?php
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
						$view_query_city = "SELECT * FROM `years` ORDER BY text";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
						<option <?php if($ads_tags_FF === $array_city[id]){?> selected="selected" <?php } ?> 
                        value="<?php echo $array_city[id]; ?>
						"><?php echo $array_city[text]; ?></option>
						
						<?php
						
						}
					?>
				</select>
				
				<?php
				}
			?>
 
 
      </div>
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
    
      <input type="text" name="ads_contact" placeholder="أكتب رقم جوالك هنا" class="form-control  custom-input-control" value="<?php echo $ads_contact; ?>">    
  
</div>
	  <hr>
	   
	   
	   
		<div class="form-group">
		<label>نص الإعلان</label>
		<br><br>
		<p>
		<span class="label label-warning">ملاحظة!</span>
		نرجو كتابة جميع التفاصيل ، الإعلان غير مكتمل التفاصيل سيتم حذفه.
		</p>
		<br>
		<textarea rows="9" placeholder="اكتب تفاصيل الإعلان هنا" name="ads_body" class="form-control"><?php echo $new_string = str_replace("<br />","",$ads_body);; ?></textarea>
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
		
	<?php
if(!empty($image_link)){
$IMAGES_LINK_ARRAY_P_2 = explode(",",$image_link);
$thumbnail_link_ch = $IMAGES_LINK_ARRAY_P_2[1];
if(empty($thumbnail_link_ch)){$num_start_img = "0";}else{$num_start_img = "1";}



$cars=$IMAGES_LINK_ARRAY_P_2;
$arrlength=count($cars);

for($x=$num_start_img;$x<$arrlength;$x++)
  {
  ?>
  <div>
<div class="ads_im">
<p>
<input type="hidden" name="image_link[]" value="<?php echo $cars[$x]; ?>">
<img src="<?php echo $cars[$x]; ?>" style="max-width: 100%">
<div class="delet_image btn btn-primary" key="<?=$cars[$x]?>">حذف</div>
<br>
</p>
</div>
</div>
  <?php 
  }

}
?>
	
 
	<div style="clear:both;"></div>
	
	
		
		
		
		



	


		
		 
		  <input type="submit" name="submit" value="إرسال" class="btn btn-lg btn-primary">
				</form>
		
		<br>
		<br>
		<span class="label label-success">ملاحظة</span>
		إذا كنت تواجه مشكلة في رفع الصور لإعلانك، نرجو التواصل مع الأدارة
		<br>
<br>
		</div>
</div>

<?php
}else{echo "خطأ في رابط الصفحة<br><br>";}

?>
</div>
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
        uploadButton = $('<div/>')
            .addClass('btn btn-primary')
            .prop('abled', true)
            .text('حذف')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                    $(this).parents('p').hide(500);
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
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
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


<script>
$(document).ready(function(){
  $(".delet_image").click(function(){
	$(this).parents('.ads_im').remove();
	var imgname =   $(this).attr("key");
	  $.post("delete.php",
  {
    id: "<?=$ads_id?>",
    name: imgname
  },
  function(data, status){
     });
  });
  $("#show").click(function(){
    $("p").show();
  });
});
</script>



 </body></html>
