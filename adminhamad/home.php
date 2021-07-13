<?php

ob_start();

session_start();

if(!isset($_SESSION['id_members'])){header("location:index.php");}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="ar" dir="rtl">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />

<title>الصفحة الرئيسة - لوحة التحكم</title>

<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen" />

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

<script type="text/javascript">

$(function(){

	$(".box .h_title").not(this).next("ul").hide("normal");

	$(".box .h_title").not(this).next("#home").show("normal");

	$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });

});

</script>

</head>

<body>

<div class="wrap">

	<div id="header">

		

        

        <?php

		include("template/header.php");

		?>

        

		<?php

		if($group_num !== "1"){header("location:logout.php");}

		ob_end_flush();

		?>

        

        

        <?php

		include("template/menu.php");

		?>

		





        

	  <div id="main">

	    <div class="clear"></div>

			

		<div class="full_w">

				<div class="h_title">انت الان في لوحة التحكم الرئيسيه</div>

				<h1>أهلآ بك عزيزي المدير</h1>

				<p>من خلال لوحة التحكم بإمكانك التعديل على الآتي </p>

				<h2></h2>

				<p></p>

                

				<h3></h3>

				<p></h3>

				<ul>

					<li>الاقسام</li>

					<li>الاعلانات</li>

					<li>القائمة السوداء</li>

					<li>الرسائل الخاصه</li>

				</ul>

				

               <br />

	  </div>

		<div class="clear"></div>

	</div>



        <?php

		include("template/footer.php");

		?>



</body>

</html>

