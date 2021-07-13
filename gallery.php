<nav>
<ul class="nav nav-tabs nav-justified">
      
   <li <?php if(empty($username)){echo "class=\"active\"";} ?>> <a href="<?php echo $url_hraj ?>index.php">كل الإعلانات</a></li>
   <li <?php if($username === "السيارات"){echo "class=\"active\"";} ?>><a href="<?php echo $url_hraj ?>__/السيارات">إعلانات السيارات</a></li>
   <li <?php if($username === "الأجهزة"){echo "class=\"active\"";} ?>><a href="<?php echo $url_hraj ?>__/الأجهزة">إعلانات الأجهزة</a></li>
   <li <?php if($username === "العقارات"){echo "class=\"active\"";} ?>><a href="<?php echo $url_hraj ?>__/العقارات">إعلانات العقارات </a></li>
   <li <?php if($username === "عام"){echo "class=\"active\"";} ?>><a href="<?php echo $url_hraj ?>__/عام">متعدد</a></li>

</ul>

<select class="form-control"><option selected="selected" value="index.php">كل الإعلانات</option>
<option value="<?php echo $url_hraj ?>__/السيارات">إعلانات السيارات</option>
<option value="<?php echo $url_hraj ?>__/الأجهزة">إعلانات الأجهزة</option>
<option value="<?php echo $url_hraj ?>__/العقارات">إعلانات العقارات </option>
<option value="<?php echo $url_hraj ?>__/عام">متعدد</option></select></nav>
<div class="main-col">


<div class="row img_carousel">



<?php
	include("include/config.php");			
	mysqli_query($mysqli,"SET NAMES 'utf8'"); 
	if(empty($username)){}else{$query_select_sec = "and type_ads_other_final = \"$username\"";}
  	$query_ads = "SELECT * FROM `ads` WHERE close_ads = \"0\" and type_ads_or = \"1\" and image_link != \"\" $query_select_sec 
	ORDER BY Last_updated_Ad  DESC LIMIT 6";
	$query_ads_ex = mysqli_query($mysqli,$query_ads);
	$query_ads_ex_num = mysqli_num_rows($query_ads_ex);
	if($query_ads_ex_num > 0){
	echo "<ul>";
 	while($row = mysqli_fetch_array($query_ads_ex))
  	{
		
	$id_ads = $row[id];
	$ads_title = $row[ads_title];
	$image_link = $row[image_link];
	$IMAGES_LINK_ARRAY_P_2 = explode(",",$image_link);
   $rr =  str_replace("files","files/thumbnail",$IMAGES_LINK_ARRAY_P_2[0]);
   
	//if (file_exists($rr)) {
	?>
      <li><a href="<?php echo $url_hraj; ?>ads/<?php echo $id_ads; ?>/<?php echo $ads_title; ?>">
      <img src="<?php
		 echo $rr; ?>" alt="<?php echo $ads_title; ?>" class="img-rounded" onerror="this.style.display='none'"></a></li>
         
	<?php
	//}
	}
	?>

</ul>
<?php 
}
?>

<p class="text-left"><b><a class="red" href="<?php echo $url_hraj; ?>____/السيارات">صور   </a></b></p>

</div>
