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
$commission = $print_value[commission];
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

	<div class="row">
		
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">



<h3>خارطة الموقع</h3>
<div class="comment">



						<ul><li><a style="color:#f10606" href="__/السيارات">إعلانات السيارات</a>
						<?php 
						$view_query_city = "SELECT * FROM `section` WHERE Contents = \"السيارات\" and type = \"رئيسي\"";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
                        <ul><li><a href="<?php echo $url_hraj; ?>tags/<?php echo $array_city[id]; ?>/<?php echo $array_city[name]; ?>">
						<?php echo $array_city[name]; ?></a>
						<ul>
                        <?php 
						$view_query_section = "SELECT * FROM `section` WHERE Documentto = \"$array_city[id]\" and type = \"فرعي\" ";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_section = mysqli_query($mysqli,$view_query_section);
						$view_num_section = mysqli_num_rows($view_execution_section);
						?>
                        <?php
						while($feth_array_inf = mysqli_fetch_array($view_execution_section)){
						?>
                        <li><a href="<?php echo $url_hraj; ?>tags/<?php echo $feth_array_inf[id]; ?>/<?php echo $feth_array_inf[name]; ?>">
						<?php echo $feth_array_inf[name]; ?></a>
						<ul>
                                                <?php
						$view_query_section2 = "SELECT * FROM `section` WHERE Documentto = \"$feth_array_inf[id]\" and type = \"فرعي الفرعي\" ";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_section2 = mysqli_query($mysqli,$view_query_section2);
						$view_num_section2 = mysqli_num_rows($view_execution_section2);
						 ?>
                        <?php
						while($feth_array_inf2 = mysqli_fetch_array($view_execution_section2)){
						?>
                       <li><a href="<?php echo $url_hraj; ?>/tags/<?php echo $feth_array_inf2[id]; ?>/<?php echo $feth_array_inf2[name]; ?>"><?php echo $feth_array_inf2[name]; ?></a></li>
                       <?php
						}
						?>                        
                        </ul>
                        </li>
                        <?php
						}
						?>
                        </ul>
                        </ul>
						<?php
						}
						?>
                        
                        
                        
                        
                        
						<li><a style="color:#f10606" href="__/العقارات">إعلانات  العقارات</a></li>
						<?php 
						$view_query_city = "SELECT * FROM `section` WHERE Contents = \"العقارات\" and type = \"رئيسي\"";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
                        <ul><li><a href="<?php echo $url_hraj; ?>tags/<?php echo $array_city[id]; ?>/<?php echo $array_city[name]; ?>">
						<?php echo $array_city[name]; ?></a>
						<ul>
                        <?php 
						$view_query_section = "SELECT * FROM `section` WHERE Documentto = \"$array_city[id]\" and type = \"فرعي\" ";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_section = mysqli_query($mysqli,$view_query_section);
						$view_num_section = mysqli_num_rows($view_execution_section);
						?>
                        <?php
						while($feth_array_inf = mysqli_fetch_array($view_execution_section)){
						?>
                        <li><a href="<?php echo $url_hraj; ?>tags/<?php echo $feth_array_inf[id]; ?>/<?php echo $feth_array_inf[name]; ?>">
						<?php echo $feth_array_inf[name]; ?></a>
						<ul>
                                                <?php
						$view_query_section2 = "SELECT * FROM `section` WHERE Documentto = \"$feth_array_inf[id]\" and type = \"فرعي الفرعي\" ";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_section2 = mysqli_query($mysqli,$view_query_section2);
						$view_num_section2 = mysqli_num_rows($view_execution_section2);
						 ?>
                        <?php
						while($feth_array_inf2 = mysqli_fetch_array($view_execution_section2)){
						?>
                       <li><a href="<?php echo $url_hraj; ?>/tags/<?php echo $feth_array_inf2[id]; ?>/<?php echo $feth_array_inf2[name]; ?>"><?php echo $feth_array_inf2[name]; ?></a></li>
                       <?php
						}
						?>                        
                        </ul>
                        </li>
                        <?php
						}
						?>
                        </ul>
                        </ul>
						<?php
						}
						?>


					
                    <li><a style="color:#f10606" href="__/الأجهزة">إعلانات الأجهزة</a></li>
						<?php 
						$view_query_city = "SELECT * FROM `section` WHERE Contents = \"الأجهزة\" and type = \"رئيسي\"";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
                        <ul><li><a href="<?php echo $url_hraj; ?>tags/<?php echo $array_city[id]; ?>/<?php echo $array_city[name]; ?>">
						<?php echo $array_city[name]; ?></a>
						<ul>
                        <?php 
						$view_query_section = "SELECT * FROM `section` WHERE Documentto = \"$array_city[id]\" and type = \"فرعي\" ";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_section = mysqli_query($mysqli,$view_query_section);
						$view_num_section = mysqli_num_rows($view_execution_section);
						?>
                        <?php
						while($feth_array_inf = mysqli_fetch_array($view_execution_section)){
						?>
                        <li><a href="<?php echo $url_hraj; ?>tags/<?php echo $feth_array_inf[id]; ?>/<?php echo $feth_array_inf[name]; ?>">
						<?php echo $feth_array_inf[name]; ?></a>
						<ul>
                                                <?php
						$view_query_section2 = "SELECT * FROM `section` WHERE Documentto = \"$feth_array_inf[id]\" and type = \"فرعي الفرعي\" ";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_section2 = mysqli_query($mysqli,$view_query_section2);
						$view_num_section2 = mysqli_num_rows($view_execution_section2);
						 ?>
                        <?php
						while($feth_array_inf2 = mysqli_fetch_array($view_execution_section2)){
						?>
                       <li><a href="<?php echo $url_hraj; ?>/tags/<?php echo $feth_array_inf2[id]; ?>/<?php echo $feth_array_inf2[name]; ?>"><?php echo $feth_array_inf2[name]; ?></a></li>
                       <?php
						}
						?>                        
                        </ul>
                        </li>
                        <?php
						}
						?>
                        </ul>
                        </ul>
						<?php
						}
						?>




						<li><a style="color:#f10606" href="__/عام">إعلانات مختلفة</a></li>
						<?php 
						$view_query_city = "SELECT * FROM `section` WHERE Contents = \"عام\" and type = \"رئيسي\"";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
                        <ul><li><a href="<?php echo $url_hraj; ?>tags/<?php echo $array_city[id]; ?>/<?php echo $array_city[name]; ?>">
						<?php echo $array_city[name]; ?></a>
						<ul>
                        <?php 
						$view_query_section = "SELECT * FROM `section` WHERE Documentto = \"$array_city[id]\" and type = \"فرعي\" ";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_section = mysqli_query($mysqli,$view_query_section);
						$view_num_section = mysqli_num_rows($view_execution_section);
						?>
                        <?php
						while($feth_array_inf = mysqli_fetch_array($view_execution_section)){
						?>
                        <li><a href="<?php echo $url_hraj; ?>tags/<?php echo $feth_array_inf[id]; ?>/<?php echo $feth_array_inf[name]; ?>">
						<?php echo $feth_array_inf[name]; ?></a>
						<ul>
                                                <?php
						$view_query_section2 = "SELECT * FROM `section` WHERE Documentto = \"$feth_array_inf[id]\" and type = \"فرعي الفرعي\" ";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_section2 = mysqli_query($mysqli,$view_query_section2);
						$view_num_section2 = mysqli_num_rows($view_execution_section2);
						 ?>
                        <?php
						while($feth_array_inf2 = mysqli_fetch_array($view_execution_section2)){
						?>
                       <li><a href="<?php echo $url_hraj; ?>/tags/<?php echo $feth_array_inf2[id]; ?>/<?php echo $feth_array_inf2[name]; ?>"><?php echo $feth_array_inf2[name]; ?></a></li>
                       <?php
						}
						?>                        
                        </ul>
                        </li>
                        <?php
						}
						?>
                        </ul>
                        </ul>
						<?php
						}
						?>



</div>
</div>
</div>
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 </body></html>