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
				$group_num_profile = $Data_member[groupnumber];
				$username_member_2 =  $Data_member[username];
        		$email_member =  $Data_member[email];
				$The_pay_commission_new_update =  $Data_member[The_pay_commission];
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
<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $username_member_2; ?> - <?php echo $namewebsite; ?></title>
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

				
				if($number_of_members > 0){
				


?>

   <div class="col-xs-12  col-sm-4 col-md-3 col-lg-3" id="firstDiv">
		
	<div class="side-col">
		<h4>إعلانات العضو </h4>

		<a href="<?php echo $url_hraj; ?>users/<?php echo $username_member_2; ?>" class="username"><?php echo $username_member_2; ?></a> 

                <?php
				if($Lastactivity_member_plus > $time_now){
				?>
                <span class="label label-success">متصل </span>
                <?php
				}else{
				?>
				<span class="label label-default">آخر ظهور <?php echo $Lastactivity_member_pro; ?></span>		  
                <?php       
						}
				?>
                
				

		
	
		<br>

		<br>
		<a href="<?php echo $url_hraj; ?>sendpm.php?username=<?php echo $username_member_2; ?>"><img src="<?php echo $url_hraj; ?>templates/default/images2/email_add.png" class="imagenoborder"> إرسال رسالة </a><br> عضو <?php echo $time_pro; ?>
		<br>

		<?php if($The_pay_commission_new_update === "1"){ ?>
		<span class="badge-info"><i class="blue fa  fa-check-circle"> </i> دفع أكثر من عمولة</span></li><br><?php } ?>

		
		
		

		<a href="<?php echo $url_hraj; ?>users/comments/<?php echo $username_member_2; ?>">آخر الردود</a><br>

		
        
        
     <?php
	 if(isset($_SESSION['id_members']) and $_SESSION['id_members'] === $id_user){
		 ?>

        <a href="<?php echo $url_hraj; ?>unsubscribe.php">إدارة التنبيهات البريدية</a>
        <br>
        
        <a href="<?php echo $url_hraj; ?>chgpwd.php">تغيير الرقم السري</a>
        <br>
        <?php if($Documentingemail == 0){ ?>
        <a href="<?php echo $url_hraj; ?>verify_email.php">توثيق البريد الألكتروني</a>
        <br>
        <?php } ?>
        
        <?php if($documentingmobile == 0){ ?>
        <a href="<?php echo $url_hraj; ?>verify_mobile.php">توثيق الجوال</a>
        <br>
        <?php } ?>
        
               	<?php
		 }
		 ?>
         
              <?php
	 if($id_member !== $id_user and isset($_SESSION['id_members'])){
		 ?>
         
         
       <script>
function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","<?php echo $fixed_htaccess; ?>follow_user.php?id_member=<?php echo $id_member; ?>&id_user=<?php echo $id_user; ?>",true);
xmlhttp.send();
}
</script>


<script type="text/javascript">
	var seller_id ='1';
			
					
	
	
		 $(".button").live('click',function() {
		if(buttonid=="unfollow") {
					$.get('/unfollow_user.php', {  seller_id: seller_id  }); 

					$(this).hide();
					$('#info-follow').hide();
					$('#follow').show();
					}
	 });
	 
	 

		
		$('#unfollow').live("mouseenter", function() {
$('.show-info').hide();		
$('.show-delete').show();		
}).live("mouseleave", function() {
$('.show-info').show();		
$('.show-delete').hide();	
}); 

</script>


  <script>
function loadXMLDoc2()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","<?php echo $fixed_htaccess; ?>un_follow_user.php?id_member=<?php echo $id_member; ?>&id_user=<?php echo $id_user; ?>",true);
xmlhttp.send();
}
</script>

<br>


<hr>


<?php
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_ads_pp = "SELECT * FROM `follow_member` WHERE id_follow = \"$id_user\" and id_member_f = \"$id_member\"";
		$query_ads_ex_pp = mysqli_query($mysqli,$query_ads_pp);
		$fetch_array_ex_qu_pp = mysqli_fetch_array($query_ads_ex_pp);
		
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		$query_ads = "SELECT * FROM `members` WHERE id = \"$id_user\" ";
		$query_ads_ex = mysqli_query($mysqli,$query_ads);
		$fetch_array_ex_qu = mysqli_fetch_array($query_ads_ex);
		
		
		if($fetch_array_ex_qu_pp > 0){
			?>
            <div id="myDiv">
            <div id="myDiv2">
<button type="button" id="unfollow" onclick="loadXMLDoc2()" class="button btn btn-default btn-large" dir="rtl" style=""> 
 <span class="show-info" style="display: inline;">
 <img src="<?php echo $url_hraj; ?>templates/default/images2/accept.png" alt=""> انت تتابع : <?php echo $fetch_array_ex_qu[username]; ?> 

 </span> <span class="show-delete" style="display: none;">

  <img src="<?php echo $url_hraj; ?>templates/default/images2/delete.png" alt="">إلغاء متابعة:  <?php echo $fetch_array_ex_qu[username]; ?>
</span></button>
</div>
</div>

			<?php
            }else{
?>
<div id="myDiv">
<button type="button" id="follow" onclick="loadXMLDoc()" class="button btn btn-default btn-large" onclick="follow_user(this.value)" dir="rtl" style=""> <img src="<?php echo $fixed_htaccess; ?>templates/default/images2/add.png" alt=""> متابعة
</button>
</div>
<?php
}

$query_follow_num_user = "SELECT * FROM `follow_member` WHERE id_follow = \"$id_user\"";			
$query_result_num_rows = mysqli_query($mysqli,$query_follow_num_user);
$query_num_rows = mysqli_num_rows($query_result_num_rows);
if($query_num_rows > 0){
	?>
    عدد المتابعين : <b><?php echo $query_num_rows; ?></b>
    <?php
	
	}else{}
	}
?>







         
         
                  		<?php 
if((($group_num === "1" || $group_num === "2") and ($group_num_profile  === "1" || $group_num_profile  === "2")) and isset($_SESSION['id_members'])){
						?>
         <hr>
         <span style=" font-size:15px; color:#C60;">(لوحة تحكم الأشراف)</span>
         <br>

       <a href="<?php echo $url_hraj; ?>Report_delet_co_view.php">قائمة الردود المحذوفة - الأسباب</a>
        <br>
        
               <a href="<?php echo $url_hraj; ?>Report_block_pm_view.php">قائمة حظر الرسائل الخاصة - الأسباب</a>
        <br>
        
                      
        <a href="<?php echo $url_hraj; ?>Report_delet_ads_view.php">قائمة الأعلانات المحذوفة - الأسباب</a>
           <br>
        
        <a href="<?php echo $url_hraj; ?>Report_view.php">قائمة الإبلاغات عن الردود</a>
         <br>
        <a href="<?php echo $url_hraj; ?>Report_view_ads.php">قائمة الإبلاغات ( الأعلانات )</a>


         
<?php  } ?>


					</div>
	
	
		
	
		
	
</div>
  <div class="col-xs-12  col-sm-8 col-md-9 col-lg-9 " id="secondDiv">
	<div class="main-col">
	
    



        <?php
	/// استعدعاء ملف الأتصال بقاعدة البيانات
	include("../include/config.php");			
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_ads = "SELECT * FROM `ads` WHERE close_ads = \"0\" and His_announcement = \"$id_user\" ORDER BY Last_updated_Ad DESC";
	$query_ads_ex = mysqli_query($mysqli,$query_ads);
	$query_ads_ex_num_co = mysqli_num_rows($query_ads_ex);
	if($query_ads_ex_num_co > 0){
	 ?>
     
   
      
      
      
      
      


      
      
      
     
     <?php
 /*
  Place code to connect to your DB here.
 */
 $fixed_query_php = "and His_announcement = \"$id_user\"";
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
	
	
	if($image_link){
	 $imgl = explode(',', $image_link);
  $rr = $imgl[0];
   $rr =  str_replace("files","files/thumbnail",$rr);
    	
}
	
	?>


<div class="adx <?php if($i % 2 == 0 )echo "even"; else echo "odd"; ?>">
           
           <!-- المعلومات ---->
            <div class="adxInfo">
               <div class="adxTitle"><a href="<?php echo $url_hraj; ?>ads/<?php echo $row['id']; ?>/<?php echo $row['ads_title']; ?>" style="font-size: 18px;"> <?php echo mb_substr($row['ads_title'],0,30, "utf-8"); ?></a>
               </div>
               <div class="adxExtraInfo" style="font-size: 15px;">
                  <div class="adxExtraInfoPart"><span class="ads_id" data-id="13616559" id="13616559"></span>
                <i class="fa fa-comment"></i>      <?php echo $num_ex_ads_query ?>  
                  </div><i class="fa fa-clock-o "></i>   <div style="padding-right:5px" class="adxExtraInfoPart"> <?php echo $Time_added; ?></div>
               </div>
               <div class="adxExtraInfo" style="font-size: 15px;">
                  <div class="adxExtraInfoPart">
                      <a href="<?php echo $url_hraj; ?>city/<?php echo $row['ads_city']; ?>/<?php echo $ads_city_name; ?>"> <i class="fa fa-map-marker"></i> <?php echo $ads_city_name; ?></a>
                  </div>
                  <div class="adxExtraInfoPart">
                      <a href="<?php echo $url_hraj; ?>users/<?php echo $username_member_2_m_ad; ?>"><i class="fa fa-user"></i> <?php echo $username_member_2_m_ad; ?> </a>
                    </div>
               </div>
            </div>
            
            <!-- الصورة ---->
            <?php 
            if($image_link){
            ?>
            <div class="adxImg">
               <a href="<?php echo $url_hraj; ?>ads/<?php echo $row['id']; ?>/<?php echo $row['ads_title']; ?>">
               <img  alt="" src="<?php echo $rr; ?>" title="" >
               </a>
            </div>
            <?php 
            }
            ?>
         </div>
      <?php
  }
 ?>





    <?=$pagination; ?>
    
    
    <?php
	}else{
		?>
<div class="alert alert-info">لايوجد أي إعلانات لهذا العضو</div>	
		<?php
		}
	
	?>      




	</div>
</div>
<?php
}else{echo "
<div align=\"center\">
<div class=\"alert alert-info\" style=\"width:80%;\">لاتوجد عضوية بهذا الإسم</div>
</div>
";}
?>

</div>
<?php
ob_end_flush();


include("../footer.php"); // ادراج الفوتر
?>





 </body></html>
