<?php
session_start();
ob_start();
include("../include/config_header.php");	
ob_start();
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("../include/config.php");
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
$commission = $print_value[commission];
$fixed_htaccess = $url_hraj;
				
				include("../include/functions/Secure_input2.php");
				
				$username = $_GET['username'];
				$username = secure_input2($username,"text_input");


		 		/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/functions/ftime.php");
				include("../include/config.php");
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_login = "SELECT * FROM `members` where username = \"$username\" ";
				$result_query = mysqli_query($mysqli,$query_login);
				$Data_member = mysqli_fetch_array($result_query);
				$number_of_members = mysqli_num_rows($result_query);
				$group_num = $Data_member[groupnumber];
				$username_member_2 =  $Data_member[username];
        		$email_member =  $Data_member[email];
				$id_user =  $Data_member[id];

				$Documentingemail =  $Data_member[Documentingemail];
				$documentingmobile =  $Data_member[documentingmobile];
				$time_date = $Data_member[timeregister];
				$Lastactivity_member = $Data_member[Lastactivity];
				$time_pro = timeago($time_date);
				$Lastactivity_member_pro = timeago($Lastactivity_member);
				$Lastactivity_member_plus = $Lastactivity_member + 60*10 ;
				$time_now = time();
				
				
				
				// اغلاق الأتصال بقاعدةالبيانات
				#mysqli_close($mysqli);
				
				
				
				
?>
<?php
$url_tags = $_SERVER['REQUEST_URI'];
$exp_tags = explode("/",$url_tags);
$tag_id = $exp_tags[1+$number_tags_update];
$tag_model = $exp_tags[3+$number_tags_update];
$tag_model_ex = explode(",",$tag_model);
$tag_city = $exp_tags[4+$number_tags_update];
$tag_city_ex = explode(",",$tag_city);


mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print = "SELECT * FROM `section` WHERE id = \"$tag_id\" ";
$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
$print_value = mysqli_fetch_array($result_keyinformation_print);
$title_tag = $print_value[name];
$type_tag = $print_value[type];
$Contents_tag = $print_value[Contents];
$linkmodel_tag = $print_value[linkmodel];
$Documentto_tag = $print_value[Documentto];




?>
<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $title_tag; ?></title>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<link href="<?php echo $url_hraj; ?>templates/default/css/bootstrap.rtl.min.css" rel="stylesheet" media="screen">
<link href="<?php echo $url_hraj; ?>templates/default/css/custom3.css?v=1.4" rel="stylesheet" media="screen">
<link href="<?php echo $url_hraj; ?>templates/default/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $url_hraj; ?>templates/default/css/custom-icon-fonts.css?v=1.1">
<script async src="<?php echo $url_hraj; ?>templates/default/js/analytics.js"></script>
<script src="<?php echo $url_hraj; ?>templates/default/js/respond.min.js"></script>
<script src="<?php echo $url_hraj; ?>templates/default/js/html5shiv.js" type="text/javascript"></script>
<script src="<?php echo $url_hraj; ?>templates/default/js/respond.proxy.js"></script>
<script src="<?php echo $url_hraj; ?>templates/default/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo $url_hraj; ?>templates/default/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo $url_hraj; ?>templates/default/js/cars.js"></script>
<script src="<?php echo $url_hraj; ?>templates/default/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $url_hraj; ?>templates/default/js/v5.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>




<?php
include("../header.php"); // استدعاء ملف الهيدر
?>
<div class="row" id="wrapper">

<div class="col-xs-12  col-sm-3 col-md-3 col-lg-3 " id="firstDiv">
	  


	  
	  	  <p class="moreoptions showhideside" style="display: none;width:30%;margin-right:10px">إظهار الخيارات</p>
      <div class="side-col  ">

				<form action="" method="POST" name="drop_list">

 
	  							  <?php
				if($type_tag === "فرعي الفرعي"){}else{
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
				$view_query_section = "SELECT * FROM `section` WHERE Documentto = \"$tag_id\"";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_section = mysqli_query($mysqli,$view_query_section);
				$view_num_section = mysqli_num_rows($view_execution_section);
				if($view_num_section > 0){
				?>
                
				 <select name="nexttag2" class="form-control" >
                 <option value="">أختر النوع</option>
                 
                
   				 <?php
				while($feth_array_inf = mysqli_fetch_array($view_execution_section)){
				?>
				<option value="<?php echo $feth_array_inf[id];?>"><?php echo $feth_array_inf[name];?></option>
				<?php
				}
				?>
			 			
			   </select>
				 <?php 
				}
				}
				 ?>
	 
	 	 		<?php
				if($linkmodel_tag === "yes"){
				?>   	  
	   
               
                <span class="label label-danger">الموديل</span>
                
 
  <div class="checkbox">
     				 <label>
         <input name="models[]" type="checkbox" <?php if(empty($tag_model) || $tag_model === "allmodels"){ ?> checked="checked" <?php } ?>
          value="allmodels" id="allmodels"> <strong class="red"> جميع الموديلات </strong>
       </label>
   </div>
   
			<?php
if(!empty($tag_model) and $tag_model !== "allmodels"){
$IMAGES_LINK_ARRAY_P_2 = explode(",",$tag_model);
$cars=$IMAGES_LINK_ARRAY_P_2;
$arrlength=count($cars);
for($x=0;$x<$arrlength;$x++)
  {
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("../include/config.php");	
$view_query_city = "SELECT * FROM `years` where id = \"$cars[$x]\" ORDER BY id";
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
$view_execution_city = mysqli_query($mysqli,$view_query_city);
$array_city = mysqli_fetch_array($view_execution_city);
  ?>
  
<div class="checkbox">
<label>
<input name="models[]" type="checkbox" checked="checked" value="<?php echo $cars[$x]; ?>"><?php echo $array_city[text]; ?>
</label>
</div>
 <?php 
}
}
?>	   
	   
	   
  	 	 
	   

		  	   	 	
	 	    	 	      
                          						<?php
						/// استعدعاء ملف الأتصال بقاعدة البيانات
						include("../include/config.php");	

	
						$view_query_city = "SELECT * FROM `years` ORDER BY id limit 5";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
                        <?php if(in_array("$array_city[id]",$tag_model_ex)){}else{ ?>
                                        <div class="checkbox">
     				 <label>
		   	 
		   	           <input name="models[]" type="checkbox" value="<?php echo $array_city[id]; ?>"><?php echo $array_city[text]; ?>
		   	         </label>
		   	          </div>
						<?php
						}
						?>
						<?php
						
						}
						?>
        
					 					

					 					
		  	   	 	
 			<span class="moreModels2 moreoptions">  المزيد من الموديلات ...</span>
 	 		<div class="showModels2" style="display: none;">
            
                                      						<?php
						/// استعدعاء ملف الأتصال بقاعدة البيانات
						include("../include/config.php");	


						$view_query_city = "SELECT * FROM `years` ORDER BY id  limit 5,10000";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
                        <?php if(in_array("$array_city[id]",$tag_model_ex)){}else{ ?>
                                        <div class="checkbox">
     				 <label>
		   	 
		   	           <input name="models[]" type="checkbox" value="<?php echo $array_city[id]; ?>"><?php echo $array_city[text]; ?>
		   	         </label>
		   	          </div>
                      
                      	<?php
						}
						?>
						
						<?php
						
						}
						?>
                        
                       
					 					
					 					  </div>
                                          

		
	   

	   	  	   <br> <br> 
               <?php 
			   }
			   ?>
               

                                          
	   
 <span class="label label-danger">المدينة</span>
 
  <div class="checkbox">
     				 <label>
         <input name="cities[]" type="checkbox" <?php if(empty($tag_model) || $tag_model === "allcities"){ ?> checked="checked" <?php } ?> value="allcities" id="allcities"> <strong class="red"> جميع المدن </strong>
       </label>
   </div>
   
   			<?php
if(!empty($tag_city) and $tag_city !== "allcities"){
$IMAGES_LINK_ARRAY_P_2 = explode(",",$tag_city);
$cars=$IMAGES_LINK_ARRAY_P_2;
$arrlength=count($cars);
for($x=0;$x<$arrlength;$x++)
  {
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("../include/config.php");	
$view_query_city = "SELECT * FROM `cities` where id = \"$cars[$x]\" ORDER BY id";
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
$view_execution_city = mysqli_query($mysqli,$view_query_city);
$array_city = mysqli_fetch_array($view_execution_city);
  ?>
  
<div class="checkbox">
<label>
<input name="cities[]" type="checkbox" checked="checked" value="<?php echo $cars[$x]; ?>"><?php echo $array_city[text]; ?>
</label>
</div>
 <?php 
}
}
?>	   
	 
	   
	   
	   
  	 	 
	   

		  	   	 	
	 	    	 	      
                          						<?php
						/// استعدعاء ملف الأتصال بقاعدة البيانات
						include("../include/config.php");	

	
						$view_query_city = "SELECT * FROM `cities` ORDER BY id limit 5";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
                       <?php if(in_array("$array_city[id]",$tag_city_ex)){}else{ ?>
                                        <div class="checkbox">
     				 <label>
		   	 
		   	           <input name="cities[]" type="checkbox" value="<?php echo $array_city[id]; ?>"><?php echo $array_city[text]; ?>
		   	         </label>
		   	          </div>
						<?php
						}
						?>
                        
						<?php
						
						}
						?>
        
					 					

					 					
		  	   	 	
	 	    	 		<span class="moreCities moreoptions"> المزيد من المدن ...</span>
	 		<div class="showCities" style="display: none;">
            
                                      						<?php
						/// استعدعاء ملف الأتصال بقاعدة البيانات
						include("../include/config.php");	


						$view_query_city = "SELECT * FROM `cities` ORDER BY id  limit 5,10000";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
                        <?php if(in_array("$array_city[id]",$tag_city_ex)){}else{ ?>
                                        <div class="checkbox">
     				 <label>
		   	 
		   	           <input name="cities[]" type="checkbox" value="<?php echo $array_city[id]; ?>"><?php echo $array_city[text]; ?>
		   	         </label>
		   	          </div>
                      			<?php
						}
						?>
						<?php
						}
						?>
                        
                       
					 					
					 					  </div>
					 					
		  	 			
  


			<br><br>
			<input type="hidden" name="current_type" value="<?php echo $title_tag; ?>">

		
		<input type="submit" name="login" value="بحث  »" class="btn  btn-success">
		</form>
	
	<!-- end-->
    
    <?php
	if($_POST['login']){
		
	$city_imp = $_POST['cities'];
	$p_exp = implode(",",$city_imp);
	$slash_city = "/";
	
	
	$models_imp = $_POST['models'];
	$p_exp_models = implode(",",$models_imp);
	$slash_models = "/";
	
	if($p_exp === "allcities" and $p_exp_models === "allmodels"){$p_exp = ""; $slash_city = "";}
	if($p_exp_models === "allmodels" and $p_exp === "allcities"){$p_exp_models = ""; $slash_models = "";}
	
	$nexttag = $_POST['nexttag2'];
	
		if(empty($nexttag)){
		$tag_link = $tag_id;
		}else{
		$tag_link = $nexttag;
			}
			
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_keyinformation_print_sa = "SELECT * FROM `section` WHERE id = \"$tag_link\" ";
		$result_keyinformation_print_sa = mysqli_query($mysqli,$query_keyinformation_print_sa);
		$print_value_sa = mysqli_fetch_array($result_keyinformation_print_sa);
		$title_tag_sa = $print_value_sa[name];	
			
			
			
	if(empty($title_tag_sa)){
	$tag_link_title = $title_tag;
	}else{
	$tag_link_title = $title_tag_sa;
	}
	
	
	echo "<meta http-equiv=\"refresh\" 
	content=\"0;URL=$fixed_htaccess"."tags/".$tag_link."/".$tag_link_title.$slash_models.$p_exp_models.$slash_city.$p_exp."\">";
	?>


	<?php
	}
	?>
	
	
			

			<hr>



			بحث في

						<?php echo $title_tag; ?>
					

			<form class="form-inline" method="get" action="<?php echo $url_hraj; ?>search.php&image=yes">
             <div class="input-group  ">
             
 			<input type="search" name="key" class="form-control " placeholder="ابحث عن سلعه في <?php echo $title_tag; ?> ..." id="autocomplete" style="width: 100%;">
<input type="hidden" name="<?php if($type_tag === "رئيسي"){echo "ads_tags_R";}else{
						  if($type_tag === "فرعي"){echo "ads_tags_F";}else{
						  if($type_tag === "فرعي الفرعي"){echo "ads_tags_FF";}
						  }
						  }	?>" value="<?php echo $tag_id; ?>">
					

      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
      </span>

        </div>
        </form>
		</div>
  </div>

<div class="col-xs-12  col-sm-9 col-md-9 col-lg-9 " id="secondDiv">

<div class="main-col2">

				<h3><?php echo $title_tag; ?> 
                
                <?php
if(!empty($tag_model) and $tag_model !== "allmodels"){
$IMAGES_LINK_ARRAY_P_2 = explode(",",$tag_model);
$cars=$IMAGES_LINK_ARRAY_P_2;
$arrlength=count($cars);
for($x=0;$x<$arrlength;$x++)
  {
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("../include/config.php");	
$view_query_city = "SELECT * FROM `years` where id = \"$cars[$x]\" ORDER BY id";
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
$view_execution_city = mysqli_query($mysqli,$view_query_city);
$array_city = mysqli_fetch_array($view_execution_city);
  ?>
  
<?php if($cars[$x] === $cars[0]){}else{echo "أو";} ?> <?php echo $array_city[text]; ?>
 <?php 
}
?>	   
     
        
    <?php
	}
	?>
                
                 <?php
if(!empty($tag_city) and $tag_city !== "allcities"){
$IMAGES_LINK_ARRAY_P_2 = explode(",",$tag_city);
$cars=$IMAGES_LINK_ARRAY_P_2;
$arrlength=count($cars);
for($x=0;$x<$arrlength;$x++)
  {
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("../include/config.php");	
$view_query_city = "SELECT * FROM `cities` where id = \"$cars[$x]\" ORDER BY id";
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
$view_execution_city = mysqli_query($mysqli,$view_query_city);
$array_city = mysqli_fetch_array($view_execution_city);
  ?>
  
<?php if($cars[$x] === $cars[0]){echo "في";}else{echo "أو";} ?> <?php echo $array_city[text]; ?>
 <?php 
}
}
?>	</h3>
		
        
	  							  <?php
				if($type_tag === "فرعي الفرعي"){
					
				$view_query_section_b = "SELECT * FROM `section` WHERE id = \"$Documentto_tag\"";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_section_b = mysqli_query($mysqli,$view_query_section_b);
				$feth_array_inf_b = mysqli_fetch_array($view_execution_section_b);
				$Documentto_tag_ff = $feth_array_inf_b[Documentto];
				
				
				$view_query_section_b_s = "SELECT * FROM `section` WHERE id = \"$Documentto_tag_ff\"";
				$view_execution_section_b_s = mysqli_query($mysqli,$view_query_section_b_s);
				$feth_array_inf_b_s = mysqli_fetch_array($view_execution_section_b_s);
				?>
                
                
                 <a class="tag" href="<?php echo $fixed_htaccess; ?>tags/<?php echo $Documentto_tag_ff;?>/<?php echo $feth_array_inf_b_s[name];?>" 
                title="<?php echo $feth_array_inf_b_s[name];?>"> <?php echo $feth_array_inf_b_s[name];?></a>
                » 
                
                
                
                <a class="tag" href="<?php echo $fixed_htaccess; ?>tags/<?php echo $Documentto_tag;?>/<?php echo $feth_array_inf_b[name];?>" 
                title="<?php echo $feth_array_inf_b[name];?>"> <?php echo $feth_array_inf_b[name];?></a>
                » 
                
                <a class="tag" href="<?php echo $fixed_htaccess; ?>tags/<?php echo $tag_id;?>/<?php echo $title_tag;?>" 
                title="<?php echo $title_tag;?>"><?php echo $title_tag;?></a>
                » 
  
                    
				<?php
					}else{
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
				$view_query_section = "SELECT * FROM `section` WHERE Documentto = \"$tag_id\"";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_section = mysqli_query($mysqli,$view_query_section);
				$view_num_section = mysqli_num_rows($view_execution_section);
				if($view_num_section > 0){
				?>
                

   				 <?php
				while($feth_array_inf = mysqli_fetch_array($view_execution_section)){
				?>
                <a class="tag" href="<?php echo $fixed_htaccess; ?>tags/<?php echo $feth_array_inf[id];?>/<?php echo $feth_array_inf[name];?>" 
                title="<?php echo $feth_array_inf[name];?>"><?php echo $feth_array_inf[name];?></a>
				
				<?php
				}
				?>
			 			
			   </select>
               <br>
<br>
				 <?php 
				}else{
					if($type_tag === "فرعي"){
				$view_query_section_b = "SELECT * FROM `section` WHERE id = \"$Documentto_tag\"";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_section_b = mysqli_query($mysqli,$view_query_section_b);
				$feth_array_inf_b = mysqli_fetch_array($view_execution_section_b);
				?>
                
                
                
                
                
                <a class="tag" href="<?php echo $fixed_htaccess; ?>tags/<?php echo $Documentto_tag;?>/<?php echo $feth_array_inf_b[name];?>" 
                title="<?php echo $feth_array_inf_b[name];?>"> <?php echo $feth_array_inf_b[name];?></a>
                » 
                
                <a class="tag" href="<?php echo $fixed_htaccess; ?>tags/<?php echo $tag_id;?>/<?php echo $title_tag;?>" 
                title="<?php echo $title_tag;?>"><?php echo $title_tag;?></a>
                » 
                <br><br>
  
    
                
                 
                <?php	
						}
					}
				}
				 ?>

		
		
	 
	 	
	 	 






   <div style="clear:both;"></div>
<a href="<?php echo $fixed_htaccess; ?>add.php" class="btn btn-success btn-lg "> <i class="fa fa-plus "></i> أضف إعلانك معنا</a>
				<div class="btn-group btn-group pull-left" data-toggle="buttons">
		  <button class="btn btn-primary" onclick="location.href='<?php echo $url_hraj; ?>tags/<?php echo $tag_id; ?>/<?php echo $title_tag; ?><?php if(!empty($tag_model) and $tag_model !== "allmodels"){echo "/$tag_model";} ?><?php if(!empty($tag_city) and $tag_city !== "allcities"){echo "/$tag_city";} ?>'"><i class="fa fa-globe"></i></button>
		  <button class="btn btn-primary active" onclick="location.href='<?php echo $url_hraj; ?>pic/<?php echo $tag_id; ?>/<?php echo $title_tag; ?><?php if(!empty($tag_model) and $tag_model !== "allmodels"){echo "/$tag_model";} ?><?php if(!empty($tag_city) and $tag_city !== "allcities"){echo "/$tag_city";} ?>'"> <i class="fa fa-camera-retro  "></i> </button>
		</div>
		
<div style="clear:both;"></div>

<br>




        <?php
		
	if($type_tag === "رئيسي"){$val_type_tags_search = "ads_tags_R";}else{
		if($type_tag === "فرعي"){$val_type_tags_search = "ads_tags_F";}else{
			if($type_tag === "فرعي الفرعي"){$val_type_tags_search = "ads_tags_FF";}
			else{$val_type_tags_search = "ads_tags_R";}
			}
		}
		
		
			if($type_tag === "رئيسي"){$val_type_tags_fixed = "fixed_sec";}else{
		if($type_tag === "فرعي"){$val_type_tags_fixed = "fixed_sec2";}else{
			if($type_tag === "فرعي الفرعي"){$val_type_tags_fixed = "fixed_sec3";}
			else{$val_type_tags_fixed = "fixed_sec";}
			}
		}
		
		if(empty($tag_model) || $tag_model === "allmodels"){}else{
			$tag_model_query = "and ads_tags_FF IN ($tag_model)";
			}
			
		if(empty($tag_city) || $tag_city === "allcities"){}else{
			$tag_city_query = "and ads_city IN ($tag_city)";
			}
		
	/// استعدعاء ملف الأتصال بقاعدة البيانات
	include("../include/config.php");			
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_ads = "SELECT * FROM `ads` WHERE close_ads = \"0\" and $val_type_tags_search = \"$tag_id\" and image_link != \"\" $tag_model_query 
	$tag_city_query ORDER BY Last_updated_Ad DESC";
	$query_ads_ex = mysqli_query($mysqli,$query_ads);
	$query_ads_ex_num_co = mysqli_num_rows($query_ads_ex);
	if($query_ads_ex_num_co > 0){
	 ?>
     

      
      
      
      
     



      
      
      
     
     <?php
 /*
  Place code to connect to your DB here.
 */
 $fixed_query_php = "and $val_type_tags_search = \"$tag_id\" and $val_type_tags_fixed = \"0\" $tag_model_query $tag_city_query and image_link != \"\"";
 mysqli_query($mysqli,"SET NAMES 'utf8'");
 include("../include/config.php"); // include your code to connect to DB.
 $tbl_name="ads";  //your table name
 // How many adjacent pages should be shown on each side?
 $adjacents = 1;
 /* 
    First get total number of rows in data table. 
    If you have a WHERE clause in your query, make sure you mirror it here.
 */
 
 $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE close_ads = \"0\" $fixed_query_php ORDER BY Last_updated_Ad DESC";
 mysqli_query($mysqli,"SET NAMES 'utf8'");
 $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
 $total_pages = $total_pages[num];
 
 /* Setup vars for query. */
 $targetpage = "";  //your file name  (the name of this file)
 $limit = 40;         //how many items to show per page
 $page = $_GET['page'];
 if($page) 
  $start = ($page - 1) * $limit;    //first item to display on this page
 else
  $start = 0;        //if no page var is given, set start to 0
 
 /* Get data. */
 $sql = "SELECT * FROM `$tbl_name` WHERE close_ads = \"0\" $fixed_query_php ORDER BY Last_updated_Ad DESC LIMIT $start, $limit";
 mysqli_query($mysqli,"SET NAMES 'utf8'");
 $result = mysqli_query($mysqli,$sql);
 
 /* Setup page vars for display. */
 if ($page == 0) $page = 1;     //if no page var is given, default to 1.
 $prev = $page - 1;       //previous page is page - 1
 $next = $page + 1;       //next page is page + 1
 $lastpage = ceil($total_pages/$limit);  //lastpage is = total pages / items per page, rounded up.
 $lpm1 = $lastpage - 1;      //last page minus 1
 
 /* 
  Now we apply our rules and draw the pagination object. 
  We're actually saving the code to a variable in case we want to draw it more than once.
 */
 $pagination = "";
 if($lastpage > 1)
 { 
  $pagination .= "<ul class=\"pagination pagination-lg\">
";
  //previous button
  if ($page > 1) 
   $pagination.= "";
  else
   $pagination.= ""; 
  
  //pages 
  if ($lastpage < 7 + ($adjacents * 2)) //not enough pages to bother breaking it up
  { 
   for ($counter = 1; $counter <= $lastpage; $counter++)
   {
    if ($counter == $page) 
     $pagination.= "<li class=\"active\"><a href=\"\">$counter</a></li>"; // a not link
    else
     $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";     
   }
  }
  elseif($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
  {
   //close to beginning; only hide later pages
   if($page < 1 + ($adjacents * 2))  
   {
    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    {
     if ($counter == $page)
      $pagination.= "<li class=\"active\"><a href=\"\">$counter</a></li>"; // a not link
     else
      $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";     
    }
    $pagination.= "...";
    $pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
    $pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";  
   }
   //in middle; hide some front and some back
   elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
   {
    $pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
    $pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
    $pagination.= "...";
    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    {
     if ($counter == $page)
      $pagination.= "<li class=\"active\"><a href=\"\">$counter</a></li>"; //a not link
     else
      $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";     
    }
    $pagination.= "...";
    $pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
    $pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";  
   }
   //close to end; only hide early pages
   else
   {
    $pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
    $pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
    $pagination.= "...";
    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    {
     if ($counter == $page)
	      
      $pagination.= "<li class=\"active\"><a href=\"$counter\">$counter</a></li>"; // a
     else
      $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";     
    }
   }
  }
  
  //next button
  if ($page < $counter - 1) 
   $pagination.= "";
  else
   $pagination.= "";
  $pagination.= "</ul>\n";  
 }
?>
 <?php
  while($row = mysqli_fetch_array($result))
  {
   	$ads_city = $row[ads_city];
	$id_ads = $row[id];
	$His_announcement = $row[His_announcement];
	$image_link = $row[image_link];
	$Time_added = timeago($row[Time_added]);
	

	$view_query_ads = "SELECT * FROM `comments` WHERE id_ads = \"$id_ads\"";
	$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
	$view_execution_ads = mysqli_query($mysqli,$view_query_ads);
	$num_ex_ads_query = mysqli_num_rows($view_execution_ads);
	
	
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_login_m_ad = "SELECT * FROM `members` where id = \"$His_announcement\" ";
	$result_query_m_ad = mysqli_query($mysqli,$query_login_m_ad);
	$Data_member_m_ad = mysqli_fetch_array($result_query_m_ad);
	$group_num_m_ad = $Data_member_m_ad[groupnumber];
	$username_member_2_m_ad =  $Data_member_m_ad[username];
	$id_user_m_ad =  $Data_member_m_ad[id];
	
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_keyinformation_print_city = "SELECT * FROM `cities` WHERE id = \"$ads_city\" ";
	$result_keyinformation_print_city = mysqli_query($mysqli,$query_keyinformation_print_city);
	$print_value_city = mysqli_fetch_array($result_keyinformation_print_city);
	$ads_city_name = $print_value_city[text];
	$ads_city_id = $print_value_city[id];
	
		$id_ads = $row[id];
	$ads_title = $row[ads_title];
	$image_link = $row[image_link];
	$IMAGES_LINK_ARRAY_P_2 = explode(",",$image_link);
	
	?>





<div class="adspic  evendiv">
			  <span class="adstitlepic">
               <a href="<?php echo $url_hraj; ?>ads/<?php echo $row[id]; ?>/<?php echo $row[ads_title]; ?>" class="titlepic">
<?php echo $row[ads_title]; ?>
               </a>
		  </span>
			   <br>
             <a href="<?php echo $url_hraj; ?>ads/<?php echo $row[id]; ?>/<?php echo $row[ads_title]; ?>" class="adsimg">
               <img alt="<?php echo $row[ads_title]; ?>" src="<?php echo $IMAGES_LINK_ARRAY_P_2[0]; ?>" title="<?php echo $row[ads_title]; ?>" class="img-polaroid">
		     </a>

<div style="clear:both;"></div><br>
<span class="usernamespa"><a href="<?php echo $url_hraj; ?>users/<?php echo $username_member_2_m_ad; ?>" class="username"><?php echo $username_member_2_m_ad; ?></a></span> 
				 
<span class="city-headspa"> <a href="<?php echo $url_hraj; ?>city/<?php echo $row[ads_city]; ?>/<?php echo $ads_city_name; ?>" class="city-head"><?php echo $ads_city_name; ?></a></span> 
			  
			  <div style="clear:both;"></div>
              <br>
			  <span class="date"><?php echo $Time_added; ?></span>
			  <div style="clear:both;"></div>
			   
      </div>
      


 <?php
  }
 ?>





    

      
<div style="clear:both;"></div>

    <?=$pagination; ?>
    

 <div style="clear:both;"></div>
    <br>
    <br>
<a href="<?php echo $url_hraj; ?>tags/<?php echo $tag_id; ?>/<?php echo $title_tag; ?><?php if(!empty($tag_model) and $tag_model !== "allmodels"){echo "/$tag_model";} ?><?php if(!empty($tag_city) and $tag_city !== "allcities"){echo "/$tag_city";} ?>"><i class="fa fa-tag"></i></i> عرض جميع الأعلانات عن  : 
<?php if(empty($tag_model) || $tag_model === "allmodels"){  ?>
<?php echo $title_tag; ?>
<?php 
}else{
?>       
<?php
if(!empty($tag_model) and $tag_model !== "allmodels"){
$IMAGES_LINK_ARRAY_P_2 = explode(",",$tag_model);
$cars=$IMAGES_LINK_ARRAY_P_2;
$arrlength=count($cars);
for($x=0;$x<$arrlength;$x++)
  {
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("../include/config.php");	
$view_query_city = "SELECT * FROM `years` where id = \"$cars[$x]\" ORDER BY id";
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
$view_execution_city = mysqli_query($mysqli,$view_query_city);
$array_city = mysqli_fetch_array($view_execution_city);
  ?>
  
<?php if($cars[$x] === $cars[0]){}else{echo "أو";} ?> <?php echo $title_tag; ?> <?php echo $array_city[text]; ?>
 <?php 
}
}
?>	   
     
        
    <?php
	}
	?>
    
    <?php
if(!empty($tag_city) and $tag_city !== "allcities"){
$IMAGES_LINK_ARRAY_P_2 = explode(",",$tag_city);
$cars=$IMAGES_LINK_ARRAY_P_2;
$arrlength=count($cars);
for($x=0;$x<$arrlength;$x++)
  {
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("../include/config.php");	
$view_query_city = "SELECT * FROM `cities` where id = \"$cars[$x]\" ORDER BY id";
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
$view_execution_city = mysqli_query($mysqli,$view_query_city);
$array_city = mysqli_fetch_array($view_execution_city);
  ?>
  
<?php if($cars[$x] === $cars[0]){echo "في";}else{echo "أو";} ?> <?php echo $array_city[text]; ?>
 <?php 
}
}
?>	
 </a>  
    
    
    
    
    
    <?php
	}else{
		?>
		<div class="alert alert-info">
لا يتوفر اعلانات في الوقت الحالي ليتم عرضها
</div>
		<?php
		}
	
	?>    
    



<?php
if(empty($tag_model) || $tag_model === "allmodels" || $arrlength === 1){
$IMAGES_LINK_ARRAY_P_2 = explode(",",$tag_model);
$cars=$IMAGES_LINK_ARRAY_P_2;
$arrlength=count($cars);
if($arrlength === 1){
	?>
    

                        
    <div class="tag_cities">
        <br>
<br>
	تصنيف حسب المدينة:
	<ul>
    
    
                                          						<?php
						/// استعدعاء ملف الأتصال بقاعدة البيانات
						include("../include/config.php");	


						$view_query_city = "SELECT * FROM `cities` ORDER BY id ";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
                        <?php if(in_array("$array_city[id]",$tag_city_ex)){}else{ ?>
                        <?php
	include("../include/config.php");			
	mysqli_query($mysqli,"SET NAMES 'utf8'");
  	$query_ads = "SELECT * FROM `ads` WHERE close_ads = \"0\" and $val_type_tags_search = \"$tag_id\"
	$tag_model_query $tag_city_query and ads_city = \"$array_city[id]\" ORDER BY Last_updated_Ad DESC";
	$query_ads_ex = mysqli_query($mysqli,$query_ads);
	$query_ads_ex_num = mysqli_num_rows($query_ads_ex);
	if($query_ads_ex_num > 0){
						?>
                        
                        
                            <li><a href="<?php echo $url_hraj; ?>tags/<?php echo $tag_id; ?>/<?php echo $title_tag; ?><?php if(!empty($tag_model) and $tag_model !== "allmodels"){echo "/$tag_model";}else{echo "/allmodels";} ?>/<?php echo $array_city[id]; ?>">  <?php echo $title_tag; ?> في  <?php echo $array_city[text]; ?> 
                            (<?php echo $query_ads_ex_num; ?>)</a></li>

                      			<?php
						}
						}
						?>
						<?php
						}
						?>
                        
                        
    
    
    

    
    

    </ul>
    
	</div> 
    
    
	<?php
	}
}
?>	

		



<br>
<br>
<br>

	</div>
		</div>
</div>
<?php
ob_end_flush();
include("../footer.php"); // ادراج الفوتر
?>





 </body></html>
 
