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
$sec = $exp_tags[3+$number_tags_update];
$username = "";
if($sec === "%D8%A7%D9%84%D8%B3%D9%8A%D8%A7%D8%B1%D8%A7%D8%AA"){$username = "السيارات";}
if($sec === "%D8%A7%D9%84%D8%A3%D8%AC%D9%87%D8%B2%D8%A9"){$username = "الأجهزة";}
if($sec === "%D8%A7%D9%84%D8%B9%D9%82%D8%A7%D8%B1%D8%A7%D8%AA"){$username = "العقارات";}
if($sec === "%D8%B9%D8%A7%D9%85"){$username = "عام";}

$tag_model = $exp_tags[3+$number_tags_update];
$tag_model = str_replace(",0","",$tag_model);
$tag_model_ex = explode(",",$tag_model);
$tag_city = $exp_tags[4+$number_tags_update];
$tag_city_ex = explode(",",$tag_city);


include("../include/config.php");
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print_city = "SELECT * FROM `cities` WHERE id = \"$tag_id\" ";
$result_keyinformation_print_city = mysqli_query($mysqli,$query_keyinformation_print_city);
$print_value_city = mysqli_fetch_array($result_keyinformation_print_city);
$ads_city_name = $print_value_city[text];


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
<title><?php echo $namewebsite; ?></title>
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

			   <?php
   include("../menu_right_2.php"); //  استدعاء ملف القائمة الجانبية
   ?>
   
   


<div class="col-xs-12  col-sm-9 col-md-9 col-lg-9" id="secondDiv">

<div class="main-col2">
<a class="city-head" href="<?php echo $url_hraj; ?>city/<?php echo $tag_id; ?>/<?php echo $ads_city_name; ?>"> حراج <?php echo $ads_city_name; ?> </a>
<br><br>
    	<?php
	if(!empty($username)){$query_ads_city_search = "and type_ads_other_final = \"$username\"";}
	if(!empty($tag_id)){$query_ads_city_search2 = "and ads_city = \"$tag_id\"";}
	?>

				

		
		
	 
	 	
	 	 






   <div style="clear:both;"></div>
<a href="<?php echo $fixed_htaccess; ?>add.php" class="btn btn-success btn-lg "> <i class="fa fa-plus "></i> أضف إعلانك معنا</a>
				<div class="btn-group btn-group pull-left" data-toggle="buttons">
<button class="btn btn-primary" onclick="location.href='<?php echo $url_hraj ?>city/<?php echo $tag_id; ?>/<?php echo $ads_city_name; ?>
<?php if(empty($username)){}else{echo "/$username";} ?>'"><i class="fa fa-globe"></i></button>
		  <button class="btn btn-primary active" onclick="location.href='<?php echo $url_hraj ?>citys/<?php echo $tag_id; ?>/<?php echo $ads_city_name; ?>
<?php if(empty($username)){}else{echo "/$username";} ?>'"> <i class="fa fa-camera-retro  "></i> </button>
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
	$query_ads = "SELECT * FROM `ads` WHERE close_ads = \"0\" $query_ads_city_search $query_ads_city_search2 and image_link != \"\" ORDER BY Last_updated_Ad DESC";
	$query_ads_ex = mysqli_query($mysqli,$query_ads);
	$query_ads_ex_num_co = mysqli_num_rows($query_ads_ex);
	if($query_ads_ex_num_co > 0){
	 ?>
     
      
      
      



      
      
      
     
     <?php
 /*
  Place code to connect to your DB here.
 */
 $fixed_query_php = "$query_ads_city_search $query_ads_city_search2 and image_link != \"\"";
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
    
    <br>
 
    
    		  <div style="clear:both;"></div>
    
    
    
    <?php
	}else{
		?>
		<div class="alert alert-info">
لا يتوفر اعلانات في الوقت الحالي ليتم عرضها
</div>
		<?php
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
 
