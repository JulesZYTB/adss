<div class="headmenu hidden-xs">
<a href="<?php echo $fixed_htaccess; ?>index.php"> الرئيسية</a>
<a href="<?php echo $fixed_htaccess; ?>__/السيارات"> السيارات</a>
<a href="<?php echo $fixed_htaccess; ?>__/الأجهزة"> الأجهزة</a>
<a href="<?php echo $fixed_htaccess; ?>__/العقارات"> العقارات</a>
<a href="<?php echo $fixed_htaccess; ?>tags/484/مواشي_وحيوانات_وطيور"> مواشي و  طيور</a>
<a href="<?php echo $fixed_htaccess; ?>tags/493/خدمات"> خدمات</a>
<a href="<?php echo $fixed_htaccess; ?>sitemap.php"> خارطة الموقع</a>
<a href="<?php echo $fixed_htaccess; ?>advsearch.php"> البحث</a>
<a href="<?php echo $fixed_htaccess; ?>contact.php">  للاتصال بنا</a>

</div>



  <header class="navbar  navbar" role="navigation">
   <div class="container">
   <div class="navbar-header ">
   <a href="<?php echo $fixed_htaccess; ?>index.php" class="logo "> <img  src="<?php echo $fixed_htaccess; ?>templates/default/images2/saudi_ads.png" alt="<?php echo $namewebsite; ?>"></a>
         </div>


     <?php
	 if(!isset($_SESSION['id_members'])){
				/// استدعاء دالة حماية المدخلات
				include("include/functions/Secure_input.php");
	 }
				?>

     <?php
	 if(isset($_SESSION['id_members'])){

		 				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");

				/// استدعاء دالة حماية المدخلات
				include("include/functions/Secure_input.php");

				$id = $_SESSION['id_members'];
				$id_member = secure_input($id,"int");
				$id = secure_input($id,"int");

				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$user = secure_input($user_or,"text_input");
				$query_login = "SELECT * FROM `members` where id = \"$id\" ";
				$result_query = mysqli_query($mysqli,$query_login);
				$Data_member = mysqli_fetch_array($result_query);
				$group_num = $Data_member[groupnumber];
                $Documentingemail = $Data_member[Documentingemail]; /// حالة توثيق البريد الألكتروني
                $documentingmobile = $Data_member[documentingmobile]; /// حالة توثيق البريد الألكتروني
                $member_code = $Data_member[member_code]; /// Code Active
				$username_member =  $Data_member[username];
        		$email_member =  $Data_member[email];
				$password_member =  $Data_member[password];
				$Documentingemail =  $Data_member[Documentingemail];
				$documentingmobile =  $Data_member[documentingmobile];
				$The_pay_commission =  $Data_member[The_pay_commission];
				if($group_num === "5"){
				if($_SERVER['REQUEST_URI'] === "$folder_hraj_script"."/block_member.php"){}else{
				header("location:$url_hraj"."block_member.php");
				}
				ob_end_flush();
				}

				
				$Lastactivity = time();
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_Lastactivity = "UPDATE `members` set Lastactivity = \"$Lastactivity\" where id = \"$id\"";
				$result_query_Lastactivity = mysqli_query($mysqli,$query_Lastactivity);
				
		

				// اغلاق الأتصال بقاعدةالبيانات
				mysqli_close($mysqli);

		 ?>
         
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>




<p class="navbar-text navbar-right"><a href="<?php echo $fixed_htaccess; ?>note.php" class="pull-left visible-xs "><i class="fa fa-asterisk"></i></a><a href="<?php echo $fixed_htaccess; ?>inbox.php" class="pull-left visible-xs "><i class="fa fa-envelope"></i></a><a href="<?php echo $fixed_htaccess; ?>advsearch.php" class="pull-left visible-xs "><i class="fa fa-search"></i></a></p>

		 <div class="collapse navbar-collapse navbar-ex1-collapse">






            <ul class="nav navbar-nav navbar-right menu">



                 <li><a href="<?php echo $fixed_htaccess; ?>users/<?php echo $username_member; ?>"><i class="fa fa-user"></i> <?php echo $username_member; ?> </a></li>
    <?php
	
			 				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
				
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_number_pm = "SELECT * FROM `privatemessage` where future = \"$id\" and status = \"unread\" 
				and futurest = \"\" ";
				$result_query_number_pm = mysqli_query($mysqli,$query_number_pm);
				$num_pm_future = mysqli_num_rows($result_query_number_pm);
				if($num_pm_future > 0){
					$number_pm_print = "<span class=\"badge badge-danger\">$num_pm_future</span>";
					$if_big_zero_pm = "class=\"active\"";
					}
	?>
   <li <?php echo $if_big_zero_pm; ?> >
   <a href="<?php echo $fixed_htaccess; ?>inbox.php"><?php echo $number_pm_print; ?><i class="fa fa-envelope"></i>  الرسائل</a>
   </li>


	<?php
$query_select_note = "SELECT * FROM `note_hraj` WHERE id_mem = \"$id_member\" and un_read = \"0\" order by id";
	$result_query_note = mysqli_query($mysqli,$query_select_note);
	$note_print_num = mysqli_num_rows($result_query_note);
	if($note_print_num > 0){
	$number_pm_print2 = "<span class=\"badge badge-danger\">$note_print_num</span>";
	$if_big_zero_pm2 = "class=\"active\"";
	}
	?>

 <li <?php echo $if_big_zero_pm2; ?>><a href="<?php echo $fixed_htaccess; ?>note.php"><?php echo $number_pm_print2; ?><i class="fa fa-asterisk"></i> الإشعارات</a></li>

                                 <li><a href="<?php echo $fixed_htaccess; ?>fav.php"> <i class="fa fa-star"></i> المفضلة</a></li>



                 <li class="visible-md visible-lg"><a href="<?php echo $fixed_htaccess; ?>follow.php">قائمة المتابعة</a></li>
                      <li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>follow.php"> قائمة المتابعة</a></li>
                  <li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>commission.php">حساب عمولة الموقع</a></li>



 <li class="divider visible-xs"></li>
 <li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>__/السيارات"> إعلانات السيارات</a></li>
 <li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>__/الأجهزة"> إعلانات أجهزة</a></li>
<li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>__/العقارات"> إعلانات عقارات</a></li>
<li class="visible-xs"> <a href="<?php echo $fixed_htaccess; ?>tags/484/مواشي_وحيوانات_وطيور"> المواشي و الطيور</a></li>
<li class="visible-xs"> <a href="<?php echo $fixed_htaccess; ?>tags/خدمات"> إعلانات خدمات</a></li>
<li class="visible-xs"> <a href="<?php echo $fixed_htaccess; ?>sitemap.php"> المزيد</a></li>
<li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>advsearch.php"> البحث</a></li>








                  <li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>contact.php">اتصل بنا</a></li>

                  <li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>logout.php">تسجيل الخروج</a></li>

              <li class="dropdown hidden-xs">
                <a data-toggle="dropdown" class="dropdown" href="#"> <i class="fa fa-bars"></i></a>
                <ul class="dropdown-menu pull-right">



                     <li><a href="<?php echo $fixed_htaccess; ?>advsearch.php"> البحث المتقدم</a></li>
                      <li><a href="<?php echo $fixed_htaccess; ?>follow.php">قائمة المتابعة</a></li>
                      <li><a href="<?php echo $fixed_htaccess; ?>fav.php"> <i class="fa fa-star"></i> الإعلانات المفضلة</a></li>
                  <li><a href="<?php echo $fixed_htaccess; ?>commission.php">حساب عمولة الموقع</a></li>


                  <li><a href="<?php echo $fixed_htaccess; ?>contact.php">اتصل بنا</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo $fixed_htaccess; ?>logout.php">تسجيل الخروج</a></li>
                </ul>
              </li>
            </ul>
          </div>

		 <?php
		 }else{

	 ?>

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>



<p class="navbar-text navbar-right visible-xs ">
    <a href="login.php">تسجيل الدخول  </a>
  </p>
<div class="collapse navbar-collapse navbar-ex1-collapse">

            <ul class="nav navbar-nav navbar-right menu">

                 <li><a href="<?php echo $fixed_htaccess; ?>login.php">تسجيل الدخول  </a></li>

                 <li><a href="<?php echo $fixed_htaccess; ?>register.php"> التسجيل بالموقع</a></li>

                  <li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>commission.php">حساب عمولة الموقع</a></li>

 <li class="divider visible-xs"></li>
 <li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>__/السيارات">  السيارات</a></li>
 <li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>__/الأجهزة"> أجهزة</a></li>
<li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>__/العقارات"> عقارات</a></li>
<li class="visible-xs"> <a href="<?php echo $fixed_htaccess; ?>tags/484/مواشي_وحيوانات_وطيور"> المواشي و الطيور</a></li>
<li class="visible-xs"> <a href="<?php echo $fixed_htaccess; ?>tags/خدمات"> خدمات</a></li>
<li class="visible-xs"> <a href="<?php echo $fixed_htaccess; ?>sitemap.php"> المزيد</a></li>
<li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>advsearch.php"> البحث</a></li>
<li class="visible-xs"><a href="<?php echo $fixed_htaccess; ?>contact.php">اتصل بنا</a></li>


              <li class="dropdown hidden-xs">
                <a data-toggle="dropdown" class="dropdown" href="#"> <i class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-menu pull-right">



                  <li><a href="<?php echo $fixed_htaccess; ?>advsearch.php"> البحث المتقدم</a></li>
                  <li><a href="<?php echo $fixed_htaccess; ?>commission.php">حساب عمولة الموقع</a></li>
                  <li><a href="<?php echo $fixed_htaccess; ?>contact.php">اتصل بنا</a></li>
                  <li class="divider"></li>
                </ul>
              </li>
            </ul>
          </div>



    <?php
	}
	?>

        </div>
      </header>
           <?php
	 if(isset($_SESSION['id_members'])){
	 	echo "<div class='visible-xs' style='margin:5px;'>";
	 	?>
	 	<a style="padding: 5px;" href="<?php echo $fixed_htaccess; ?>users/<?php echo $username_member; ?>"><i class="fa fa-user"></i> مرحباً, <?php echo $username_member; ?> </a>
	 	
	 	<a style="padding: 5px;" href="<?php echo $fixed_htaccess; ?>users/<?php echo $username_member; ?>"><i class="fa fa-bookmark"></i> إعلاناتي </a>
	 	
	 <a  style="padding: 5px;" href="<?php echo $fixed_htaccess; ?>inbox.php" ><i class="fa fa-envelope"></i>   الرسائل</a>
	 	<a  style="padding: 5px;" href="<?php echo $fixed_htaccess; ?>logout.php"><i class="fa fa-sign-out"></i> خروج</a>
	 	<?php 
	 		echo "</div>";
	 }
				?>
