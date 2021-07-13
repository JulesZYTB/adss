<?php
header("Content-Type: application/rss+xml; charset=utf-8");

ob_start();
include("../include/config.php");

mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print = "SELECT * FROM `keyinformation` WHERE id = \"1\" ";
$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
$print_value = mysqli_fetch_array($result_keyinformation_print);
$namewebsite = $print_value[namewebsite];
$keywords = $print_value[keywords];
$messagesphone = $print_value[messagesphone];
$description = nl2br($print_value[description]);

$rssfeed = '<?xml version="1.0" encoding="utf-8"?>';
$rssfeed .= '<rss version="2.0">';
$rssfeed .= '<channel>';
$rssfeed .= "<title>$namewebsite</title>";
$rssfeed .= "<link>$url_hraj</link>";
$rssfeed .= "<description>$description</description>";
$rssfeed .= '<language>ar</language>';
$rssfeed .= "<copyright>Copyright (C) 2014 $url_hraj</copyright>";

//Finish Connect
$query = "SELECT * FROM ads ORDER BY id DESC";
mysqli_query($mysqli,"SET NAMES 'utf8'");
$result = mysqli_query($mysqli,$query) or die ("Could not execute query");
	while($row = mysqli_fetch_array($result)) { 

        $rssfeed .= '<item>';
        $rssfeed .= '<title>' . $row['ads_title'] . '</title>';
        $rssfeed .= '<description>' . $row['ads_body'] . '</description>';
    $rssfeed .= '<link>' . $url_hraj."ads/".$row['id'] . '</link>';
        $rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", $row['Time_added']) . '</pubDate>';
        $rssfeed .= '</item>';
    }

$rssfeed .= '</channel>';
$rssfeed .= '</rss>';


$rssfeed=preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $rssfeed);



$fp = fopen("rss.xml","wb");
fwrite($fp,$rssfeed);
fclose($fp);
?>



