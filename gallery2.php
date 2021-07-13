<nav>
<ul class="nav nav-tabs nav-justified">
      
   <li <?php if(empty($username)){echo "class=\"active\"";} ?>> <a href="<?php echo $url_hraj ?>city/<?php echo $tag_id; ?>/<?php echo $ads_city_name; ?>">كل الإعلانات في <?php echo $ads_city_name; ?></a></li>
   <li <?php if($username === "السيارات"){echo "class=\"active\"";} ?>><a href="<?php echo $url_hraj ?>city/<?php echo $tag_id; ?>/<?php echo $ads_city_name; ?>/السيارات">حراج السيارات في <?php echo $ads_city_name; ?></a></li>
   <li <?php if($username === "الأجهزة"){echo "class=\"active\"";} ?>><a href="<?php echo $url_hraj ?>city/<?php echo $tag_id; ?>/<?php echo $ads_city_name; ?>/الأجهزة">حراج الأجهزة في <?php echo $ads_city_name; ?></a></li>
   <li <?php if($username === "العقارات"){echo "class=\"active\"";} ?>><a href="<?php echo $url_hraj ?>city/<?php echo $tag_id; ?>/<?php echo $ads_city_name; ?>/العقارات">العقار في <?php echo $ads_city_name; ?></a></li>
   <li <?php if($username === "عام"){echo "class=\"active\"";} ?>><a href="<?php echo $url_hraj ?>city/<?php echo $tag_id; ?>/<?php echo $ads_city_name; ?>/عام">أخرى في <?php echo $ads_city_name; ?></a></li>

</ul>

<select class="form-control"><option selected="selected" value="index.php">كل الإعلانات</option>
<option value="<?php echo $url_hraj ?>__/السيارات">حراج السيارات</option>
<option value="<?php echo $url_hraj ?>__/الأجهزة">حراج الأجهزة</option>
<option value="<?php echo $url_hraj ?>__/العقارات">العقار </option>
<option value="<?php echo $url_hraj ?>__/عام">أخرى</option></select></nav>
<div class="main-col">


<div class="row img_carousel">



<?php
	include("include/config.php");			
	mysqli_query($mysqli,"SET NAMES 'utf8'"); 
  	$query_ads = "SELECT * FROM `ads` WHERE close_ads = \"0\" 
	$query_ads_city_search $query_ads_city_search2 and image_link != \"\" 
	ORDER BY Last_updated_Ad DESC LIMIT 8";
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

	?>
      <li><a href="<?php echo $url_hraj; ?>ads/<?php echo $id_ads; ?>/<?php echo $ads_title; ?>">
      <img src="<?php
		 echo $IMAGES_LINK_ARRAY_P_2[0]; ?>" alt="<?php echo $ads_title; ?>" class="img-rounded"></a></li>
         
	<?php
	}
	?>

</ul>
<?php 
}
?>


<br />
</div>
