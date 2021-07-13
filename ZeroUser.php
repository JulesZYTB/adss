<?php

include("include/config.php");
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
                
$query_update_ads = "UPDATE `members` set NumUpdate = \"0\" and NumOfAds = '0' ";
$execution_query_update_ads = mysqli_query($mysqli,$query_update_ads);   

?>