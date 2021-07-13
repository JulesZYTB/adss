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
 $url_tags = $_SERVER['REQUEST_URI'];


?>

<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
	$key = intval($_GET['key']);
	$query_search_num_ads = "SELECT * FROM `ads` WHERE id = \"$key\"";
	$query_search_num_ads_mysql = mysqli_query($mysqli,$query_search_num_ads);
	$query_search_num_ads_mysql_num = mysqli_num_rows($query_search_num_ads_mysql);
	$url_ads_he = $url_hraj."ads/$key";
	if(intval($key) and $query_search_num_ads_mysql_num > 0){header("location:$url_ads_he");}else{
	?>
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

	
	$key = $_GET['key'];
	$key = secure_input($key,"text_input");
	
	$city = $_GET['city'];
	$city = secure_input($city,"int");
	
	$duringdate = $_GET['duringdate'];
	$duringdate = secure_input($duringdate,"text_input");
	
	$type_ads_other_final  = $_GET['type_ads_other_final'];
	$type_ads_other_final = secure_input($type_ads_other_final,"text_input");
	
	$image  = $_GET['image'];
	$image = secure_input($image,"text_input");
	
	$ads_tags_R = $_GET['ads_tags_R'];
	$ads_tags_R = secure_input($ads_tags_R,"int");
	
	$ads_tags_F = $_GET['ads_tags_F'];
	$ads_tags_F = secure_input($ads_tags_F,"int");
	
	$ads_tags_FF = $_GET['ads_tags_FF'];
	$ads_tags_FF = secure_input($ads_tags_FF,"int");
	
	
	
	
?>
 <div class="row" id="wrapper">

   <div class="col-xs-12  col-sm-4 col-md-3 col-lg-3 " id="firstDiv">
		
	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	    <script>
        $(document).ready(function(){
        $("#changesection2").click(function(){
  		$("#tagselect2").hide();
		$("#tagselect3").show();
		});
		});
       </script> 
       

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
  xmlhttp.open("GET","section_s.php?type=<?php echo $type_section; ?>&q="+str,true);
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
  xmlhttp.open("GET","section_2_s.php?type=<?php echo $type_section; ?>&q="+str,true);
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
  
  xmlhttp.open("GET","section_a_s.php?type=<?php echo $type_section; ?>&q="+str,true);
  
  xmlhttp.send();
}
</script>

 
       
        
 <div class="side-col">
 	نتيجة البحث عن:
 	<form class="form-inline bs-example-control-sizing" method="get" action="search.php">
 	<input type="search" name="key" class="form-control " value="<?php echo $_GET['key']; ?>" id="autocomplete">    
	<br>

 في قسم:
 <div id="tagselect2">
 <?php if(empty($ads_tags_R) and empty($ads_tags_F) and empty($ads_tags_FF) and empty($type_ads_other_final)){ ?>
            <button class="btn btn-default btn-sm disabled" type="button">كل الأقسام</button>

 <?php }else{ ?>
 <?php
 if(empty($ads_tags_FF)){
	 	
		if(empty($ads_tags_F)){
			if(empty($ads_tags_R)){	
			?>
            <button class="btn btn-default btn-sm disabled" type="button"><?php echo $type_ads_other_final; ?></button>
            <?php
			}else{
		include("include/config.php");
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_keyinformation_print_R = "SELECT * FROM `section` WHERE id = \"$ads_tags_R\" ";
		$result_keyinformation_print_R = mysqli_query($mysqli,$query_keyinformation_print_R);
		$print_value_R = mysqli_fetch_array($result_keyinformation_print_R);
		$title_name_tag_r = $print_value_R[name];
		?>
       	<button class="btn btn-default btn-sm disabled" type="button"><?php echo $title_name_tag_r; ?></button>
        <?php	
			}


		}else{
		include("include/config.php");
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_keyinformation_print_F = "SELECT * FROM `section` WHERE id = \"$ads_tags_F\" ";
		$result_keyinformation_print_F = mysqli_query($mysqli,$query_keyinformation_print_F);
		$print_value_F = mysqli_fetch_array($result_keyinformation_print_F);
		$title_tag_F = $print_value_F[name];
		?>
       	<button class="btn btn-default btn-sm disabled" type="button"><?php echo $title_tag_F; ?></button>
        <?php	
			}
		
	 }else{
		include("include/config.php");
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_keyinformation_print_FF = "SELECT * FROM `section` WHERE id = \"$ads_tags_FF\" ";
		$result_keyinformation_print_FF = mysqli_query($mysqli,$query_keyinformation_print_FF);
		$print_value_FF = mysqli_fetch_array($result_keyinformation_print_FF);
		$title_tag_FF = $print_value_FF[name];
		?>
       	<button class="btn btn-default btn-sm disabled" type="button"><?php echo $title_tag_FF; ?></button>
        <?php
		 }
 ?>
 
 <?php
 }
 ?>




<button class="btn btn-default btn-sm" type="button" id="changesection2">تغيير القسم؟</button><br>
</div>

 <div id="tagselect3" style="display:none;">
		  <select name="type_ads_other_final" id="1" class="form-control  ads_tags modonly"  onchange="sshowUser_ab(this.value)">
			   
			   			    <option value="">أختر القسم المناسب</option>
		    			 <option value="السيارات">سوق السيارات</option>
						 <option value="العقارات">سوق العقار</option>
						 <option value="الأجهزة">سوق الأجهزة</option>
						 <option value="عام">كل السوق</option>
						</select>
	  	
 </div>

       	<div id="txtHint_ab"></div>
	 	<div id="txtHint"></div>
	  	<div id="txtHint_2"></div>


<br>


في :

  <select name="city" class="form-control">
  	
     <option value="">كل المدن</option>
     
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
						<option <?php if($city === $array_city[id]){ ?> selected="selected" <?php } ?>
                         value="<?php echo $array_city[id]; ?>"><?php echo $array_city[text]; ?></option>
						
						<?php
						
						}
						?>
   </select>


   خلال:
     <select name="duringdate" class="form-control ">

        <option  value="">جميع الأوقات</option>
          <option <?php if($duringdate === "2months"){ ?> selected="selected" <?php } ?> value="2months">آخر شهرين</option>
            <option <?php if($duringdate === "1months"){ ?> selected="selected" <?php } ?> value="1months">آخر شهر</option>
              <option <?php if($duringdate === "1week"){ ?> selected="selected" <?php } ?> value="1week">آخر أسبوع</option>
                <option <?php if($duringdate === "3days"){ ?> selected="selected" <?php } ?> value="3days">آخر 3 أيام</option>
   </select>

<button class=" form-control btn btn-success " type="submit"><i class="fa fa-search"></i></button>
</form>
</div>				


<br>

	
</div>
	<div class="col-xs-12  col-sm-8 col-md-9 col-lg-9 " id="secondDiv">



<div style="clear:both;"></div>

<?php	
echo $key;
if(empty($key)){
	?>
    		<div class="alert alert-info">
لا توجد نتائج مطابقة لبحثك
</div>
    <?php
	}else{
	$key_search_query = "and ads_title LIKE \"%$key%\""; // البحث عن طريق العنوان
	
	if(empty($city)){}else{$city_search_query = "and ads_city = \"$city\"";} // البحث عن طريق المدينة
	
	/// البحث عن طريق الوقت
	$time_now_clock = time();
	if($duringdate === "2months"){$duringdate_time = 5184000;}else{
			if($duringdate === "1months"){$duringdate_time = 2592000;}else{
				if($duringdate === "1week"){$duringdate_time = 604800;}else{
					if($duringdate === "3days"){$duringdate_time = 259200;}else{
						$duringdate_time = 0;
		
		}
		}
		}
		}
	$time_now_clock_be = $time_now_clock - $duringdate_time;
		
	if(empty($duringdate)){}else{$duringdate_search_query = "and Time_added > \"$time_now_clock_be\"";}
	
	/// البحث عن طريق الأقسام 
	if(empty($type_ads_other_final)){}else{$type_ads_other_final_search_query = "and type_ads_other_final = \"$type_ads_other_final\"";}
	if(empty($ads_tags_R)){}else{$ads_tags_R_search_query = "and ads_tags_R = \"$ads_tags_R\"";}
	if(empty($ads_tags_F)){}else{$ads_tags_F_search_query = "and ads_tags_F = \"$ads_tags_F\"";}
	if(empty($ads_tags_FF)){}else{$ads_tags_FF_search_query = "and ads_tags_FF = \"$ads_tags_FF\"";}
	if($image === "yes"){$image_search_query = "and image_link != \"\"";}else{}
	
		
?>
		
		<div class="btn-group btn-group pull-left" data-toggle="buttons">
		  <button class="btn btn-primary <?php if($image === "no" || empty($image)){echo "active";} ?>" onclick="location.href='<?php echo $url_tags; ?>&image=no'"><i class="fa fa-globe"></i></button>
		  <button class="btn btn-primary <?php if($image === "yes"){echo "active";} ?>" onclick="location.href='<?php echo $url_tags; ?>&image=yes'"> <i class="fa fa-camera-retro  "></i> </button>
		</div>
		<br><br>

<div style="clear:both;"></div>
	
	
        <?php

	
	
	
	include("include/functions/ftime.php");
	/// استعدعاء ملف الأتصال بقاعدة البيانات
	include("include/config.php");			
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_ads = "SELECT * FROM `ads` WHERE close_ads = \"0\" $key_search_query $city_search_query $duringdate_search_query $type_ads_other_final_search_query 
	$ads_tags_R_search_query $ads_tags_FF_search_query $ads_tags_F_search_query $image_search_query ORDER BY Last_updated_Ad DESC";
	$query_ads_ex = mysqli_query($mysqli,$query_ads);
	$query_ads_ex_num_co = mysqli_num_rows($query_ads_ex);
	if($query_ads_ex_num_co > 0){
	 ?>
     
      <?php 
 if($image === "yes"){}else{
 ?>    
     
     <table class="table tableAds table-borderedAds ">
      
      <tbody><tr>
         
       <th> </th>
          <th>العروض</th>
             <th>المدينة</th>
      <th>المعلن</th>
   
          <th>قبل</th>
      </tr>
      
      <?php } ?>
      

     <?php
 /*
  Place code to connect to your DB here.
 */
 $fixed_query_php = "$key_search_query $city_search_query $duringdate_search_query $type_ads_other_final_search_query $ads_tags_R_search_query $ads_tags_FF_search_query $ads_tags_F_search_query $image_search_query";
 mysqli_query($mysqli,"SET NAMES 'utf8'");
 include("include/config.php"); // include your code to connect to DB.
 $tbl_name="ads";  //your table name
 // How many adjacent pages should be shown on each side?
 $adjacents = 1;
 /* 
    First get total number of rows in data table. 
    If you have a WHERE clause in your query, make sure you mirror it here.
 */
 
 $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE close_ads = \"0\" $fixed_query_php  ORDER BY Last_updated_Ad DESC";
 mysqli_query($mysqli,"SET NAMES 'utf8'");
 $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
 $total_pages = $total_pages[num];
 
 /* Setup vars for query. */
 $targetpage = "$url_tags";  //your file name  (the name of this file)
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
     $pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";     
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
      $pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";     
    }
    $pagination.= "...";
    $pagination.= "<li><a href=\"$targetpage&page=$lpm1\">$lpm1</a></li>";
    $pagination.= "<li><a href=\"$targetpage&page=$lastpage\">$lastpage</a></li>";  
   }
   //in middle; hide some front and some back
   elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
   {
    $pagination.= "<li><a href=\"$targetpage&page=1\">1</a></li>";
    $pagination.= "<li><a href=\"$targetpage&page=2\">2</a></li>";
    $pagination.= "...";
    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    {
     if ($counter == $page)
      $pagination.= "<li class=\"active\"><a href=\"\">$counter</a></li>"; //a not link
     else
      $pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";     
    }
    $pagination.= "...";
    $pagination.= "<li><a href=\"$targetpage&page=$lpm1\">$lpm1</a></li>";
    $pagination.= "<li><a href=\"$targetpage&page=$lastpage\">$lastpage</a></li>";  
   }
   //close to end; only hide early pages
   else
   {
    $pagination.= "<li><a href=\"$targetpage&page=1\">1</a></li>";
    $pagination.= "<li><a href=\"$targetpage&page=2\">2</a></li>";
    $pagination.= "...";
    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    {
     if ($counter == $page)
	      
      $pagination.= "<li class=\"active\"><a href=\"$counter\">$counter</a></li>"; // a
     else
      $pagination.= "<li><a href=\"$targetpage&page=$counter\">$counter</a></li>";     
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

	
 <?php 
 if($image === "yes"){
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
	 }else{
 ?>    
   
</tr><tr><td><?php echo $row[id]; ?></td><td>
<a href="<?php echo $url_hraj; ?>ads/<?php echo $row[id]; ?>/<?php echo $row[ads_title]; ?>"><?php echo $row[ads_title]; ?></a>

<a href="<?php echo $url_hraj; ?>ads/<?php echo $row[id]; ?>/<?php echo $row[ads_title]; ?>">

<?php if(empty($image_link)){}else{ ?>&nbsp;<i class="fa fa-camera-retro black"></i>  <?php } ?>

</a><?php if($num_ex_ads_query === 0){}else{ ?>&nbsp; <?php echo $num_ex_ads_query ?> ردود <?php } ?></td>

<td><a href="<?php echo $url_hraj; ?>city/<?php echo $row[ads_city]; ?>/<?php echo $ads_city_name; ?>" class="smallsize">
<?php echo $ads_city_name; ?></a></td>

<td> <a href="<?php echo $url_hraj; ?>users/<?php echo $username_member_2_m_ad; ?>" class="smallsize"><?php echo $username_member_2_m_ad; ?></a> </td>

<td><?php echo $Time_added; ?></td></tr>  
 <?php
  }
  }
 ?>




      <?php 
 if($image === "yes"){}else{
 ?>   
    
     </tbody></table>

<?php 
 }
?>
 <div style="clear:both;"></div>
    <?=$pagination; ?>
    
    
    <?php
	}else{
		?>
		<div class="alert alert-info">
لا توجد نتائج مطابقة لبحثك
</div>
		<?php
		}
		}
	
	?>      

 	</div>


  <div style="clear:both;"></div>

  
  
</div>
</div>    
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 

<?php
}
?>


 </body></html>