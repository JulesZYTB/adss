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
<title>عرض الرسائل الخاصة - لوحة التحكم</title>
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
        <?php
				include("../include/functions/ftime.php");
				include("../include/config.php");
				$id_pm_show = $_GET['id'];
				$id_pm_show = secure_input($id_pm_show,"int");
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_show_pm = "SELECT * FROM `privatemessage` WHERE id = \"$id_pm_show\" LIMIT 1";
				$result_query_pm = mysqli_query($mysqli,$query_show_pm);
				$fecth_array_pm = mysqli_fetch_array($result_query_pm);
				$num_rows_pm = mysqli_num_rows($result_query_pm);
					if($num_rows_pm > 0){
				
				$posttime = $fecth_array_pm[posttime];
				$posttime_2 = timeago($posttime);
				$sender = $fecth_array_pm[sender];
				$future = $fecth_array_pm[future];
				$status_pm = $fecth_array_pm[status];
				$tile_message = $fecth_array_pm[title];
				$sender_pm_reader = $fecth_array_pm[sender];
				$message_pm_reader = $fecth_array_pm[message];
				
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_login_sendpm = "SELECT * FROM `members` where id = \"$sender_pm_reader\" ";
				$result_query_sendpm = mysqli_query($mysqli,$query_login_sendpm);
				$Data_member_sendpm = mysqli_fetch_array($result_query_sendpm);
				$number_of_members_sendpm = mysqli_num_rows($result_query_sendpm);
				$username_send_pm = $Data_member_sendpm[username];
				
				
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_login_sendpm = "SELECT * FROM `members` where id = \"$future\" ";
				$result_query_sendpm = mysqli_query($mysqli,$query_login_sendpm);
				$Data_member_sendpm = mysqli_fetch_array($result_query_sendpm);
				$number_of_members_sendpm = mysqli_num_rows($result_query_sendpm);
				$username_send_pm_2 = $Data_member_sendpm[username];
		?>
        
				<div class="h_title">عرض الرسالة الخاصة</div>
				<h1><?php echo $tile_message; ?></h1>
				
               
				<p><?php echo $message_pm_reader; ?>
                <br />
                <span style="color:#000;">
                 المرسل : <?php echo $username_send_pm; ?> ، الوقت : <?php echo $posttime_2; ?> 
                 ، المستقبل : <?php echo $username_send_pm_2; ?>
                                </span>

            <br />
             <a style="color:#F00;" onclick="return confirm('هل انت متأكد من رغبتك في حذف الرسالة ؟')" href="Delete_Private_Messages.php?id=<?php echo $id_pm_show; ?>" title="حذف">| حذف الرسالة |</a>                 
                </p>
                <br />
                <br />
                <br />




 <?php
				include("../include/config.php");
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_show_pm = "SELECT * FROM `privatemessage` WHERE Bonds = \"$id_pm_show\"";
				$result_query_pm = mysqli_query($mysqli,$query_show_pm);

				
				
		?>
        
                        <?php
					while($fecth_array_pm = mysqli_fetch_array($result_query_pm)){
										$num_rows_pm = mysqli_num_rows($result_query_pm);
				$posttime = $fecth_array_pm[posttime];
				$posttime_2 = timeago($posttime);
				$sender = $fecth_array_pm[sender];
				$future = $fecth_array_pm[future];
				$status_pm = $fecth_array_pm[status];
				$tile_message = $fecth_array_pm[title];
				$sender_pm_reader = $fecth_array_pm[sender];
				$message_pm_reader = $fecth_array_pm[message];
				$id_delete_message = $fecth_array_pm[id];
				
				mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_login_sendpm = "SELECT * FROM `members` where id = \"$sender_pm_reader\" ";
				$result_query_sendpm = mysqli_query($mysqli,$query_login_sendpm);
				$Data_member_sendpm = mysqli_fetch_array($result_query_sendpm);
				$number_of_members_sendpm = mysqli_num_rows($result_query_sendpm);
				$username_send_pm = $Data_member_sendpm[username];
				?>  
                
				<h2><?php echo $tile_message; ?></h2>
		  <p><?php echo $message_pm_reader; ?>
          <br />
                          <span style="color:#000;">
                 المرسل : <?php echo $username_send_pm; ?> ، الوقت : <?php echo $posttime_2; ?> 
                 ، المستقبل : <?php echo $username_send_pm_2; ?>
                                </span>
                                
                                <br />
             <a style="color:#F00;" onclick="return confirm('هل انت متأكد من رغبتك في حذف هذا الرد ؟')" href="Delete_Private_Messages.php?id=<?php echo $id_delete_message; ?>" title="حذف">| حذف الرد |</a>       
          </p>

          
          <br />
          ----------------------------------
           <br />
          

<?php
}
					}else{
								echo "
						<div class=\"n_error\"><p>
						للأسف الرسالة التي تريد عرضها غير موجودة فضلا تأكد من الرابط او اتصل بالدعم الفني
						";
						
                     echo "<meta http-equiv=\"refresh\" content=\"2;URL=View_Private_Messages.php\">";
						}
?>

          
          
          
			<h3>&nbsp;</h3>
            </div>

				
					<div class="sep"></div>		
				</div>

        
		<div class="clear"></div>
	</div>

        <?php
		include("template/footer.php");
		?>

</body>
</html>

