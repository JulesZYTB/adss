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
<title>البحث المتقدم - <?php echo $namewebsite; ?></title> 
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

 <div class="row">

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


<div class="comment">

<form action="process-more-models.php" method="post" name="drop_list" class="form-inline">
<fieldset>
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
  xmlhttp.open("GET","section_follow.php?type=<?php echo "السيارات"; ?>&q="+str,true);
  xmlhttp.send();
}
</script>
	<legend>بحث السيارات</legend>



<div class="form-group">
<select name="ads_tags_R"  class="form-control " onchange="showUser(this.value)">
  <option value="marka">أختر ماركة السيارة</option>
  <?php
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
$view_query_city = "SELECT * FROM `section` WHERE Contents = \"السيارات\" and type = \"رئيسي\"";
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
</div>




<div class="form-group">
<div id="txtHint">
	 <select id="model" name="ads_tags_F" class="form-control ">
	 <option value="">أختر نوع السيارة</option>
	 </select>
	  </div>
      </div>
<div class="form-group">
<select name="model"  class="form-control ">
	 <option value="">كل الموديلات</option>

     <option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option>
		</select>
		</div>

<div class="form-group">
<label class="sr-only">كل الموديلات</label>
 <select name="startmodel" class="form-control " id="startmodel">
     <option value="">من موديل</option>
   <option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option></select>
	</div>


<div class="form-group">
<label class="sr-only">كل الموديلات</label>
  <select name="endmodel" class="form-control " id="endmodel">
     <option value="">إلى موديل</option>
   </select>
	</div>


<div class="form-group">
	<select name="cities" class="searchbutton form-control">
    <option selected="selected" value="">كل المدن</option>
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
						<option value="<?php echo $array_city[id]; ?>"><?php echo $array_city[text]; ?></option>
						
						<?php
						
						}
						?>
   	</select> 
    </div>
	
 <button type="submit" class=" btn  btn-success" name="submit"><i class="fa fa-search"></i></button> 

	</fieldset>
	</form>
	
</div>

<hr>
<div class="comment">
	
	<form action="" method="post" name="aqar_form" class="form-inline">
	
	<legend>بحث العقار</legend>
 


 <div class="form-group">
 	 بحث عن:
<label class="sr-only">بحث عن</label>

 <select name="aqar_type" class="form-control">
     
         
<?php
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
$query_aqar = "SELECT * FROM `section` WHERE Contents = \"العقارات\"";
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_aqar_ex = mysqli_query($mysqli,$query_aqar);
while($query_fetch_array_aqar = mysqli_fetch_array($query_aqar_ex)){
?>
<option value="<?php echo $query_fetch_array_aqar[id] ?>"><?php echo $query_fetch_array_aqar[name] ?></option>
<?php 
}
?>        


</select>
</div>
<div class="form-group">
في مدينة:
<label class="sr-only">في مدينة:</label>

<select name="aqar_city" class="form-control">

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
						<option value="<?php echo $array_city[id]; ?>"><?php echo $array_city[text]; ?></option>
						
						<?php
						
						}
						?>

         
        </select> 
    </div>

    <div class="form-group">
 	 
<label class="sr-only">بحث عن</label> <br>

 <button type="submit" class=" btn  btn-success" name="submitaqar"><i class="fa fa-search"></i></button> 
</div>

<br>
	
	</form>
<?php 
if(isset($_POST['submitaqar'])){
	$aqar_type = $_POST['aqar_type'];
	$aqar_type = secure_input($aqar_type,"int");
	
	$aqar_city = $_POST['aqar_city'];
	$aqar_city = secure_input($aqar_city,"int");
	
					/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
	$query_aqar = "SELECT * FROM `section` WHERE Contents = \"العقارات\" and id = \"$aqar_type\"";
	$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
	$query_aqar_ex = mysqli_query($mysqli,$query_aqar);
	$query_fetch_array_aqar2 = mysqli_fetch_array($query_aqar_ex);


	?>
	<meta http-equiv="refresh" content="0;URL=<?php echo $url_hraj; ?>tags/<?php echo $aqar_type; ?>/<?php echo $query_fetch_array_aqar2[name]; ?>//<?php echo $aqar_city; ?>">
    <?PHP
	}
	
?>
</div>
<hr>
<div class="comment">
	
	
	<form class="form-inline " action="search.php" method="get">
			<legend>بحث في الأقسام</legend>

										
										 <div class="form-group">

 <input name="key" type="search" placeholder="هنا اكتب ماتريد البحث عنه..." class="form-control" value="">


				    			</div>
				    			  
				    			   <div class="form-group">
							 	<select name="city" class="form-control">
							           <option selected="selected" value="">كل المدن</option>
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
						<option value="<?php echo $array_city[id]; ?>"><?php echo $array_city[text]; ?></option>
						
						<?php
						
						}
						?>
                        </select> 
							     </div>


									  <div class="form-group">
	 							 	<select name="type_ads_other_final" class="form-control">
										 <option value=""> كل الأقسام</option>
	 							           <option value="السيارات">حراج السيارات</option>
	 							           <option value="العقارات">حراج العقار</option>
	 							           <option value="الأجهزة">حراج الأجهزة</option>
	 							 		  <option value="عام">
										 البحث في القسم العام
									  </option>
							 
	 							         </select> 
	 							     </div>
										 
								  <button type="submit" class=" btn  btn-success"><i class="fa fa-search"></i></button> 
								  
								   </form>
								   
</div>











<hr>






<div class="comment">
	
	
		<form action="finduser.php" method="get" name="user_form" class="form-inline">
	
	<legend>بحث عن عضو</legend>
	
	 <div class="form-group">

	<input type="search" name="user" class="form-control" placeholder="ادخل اسم العضو">
</div>
<button type="submit" name="user_submit" class=" btn  btn-success"><i class="fa fa-search"></i></button> 



	</form>
</div>




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