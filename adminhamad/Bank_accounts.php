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
<title>عرض الحسابات البنكية - لوحة التحكم</title>
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
				<div class="h_title">عرض الحسابات البنكية  - التحكم بالحسابات البنكية</div>
				<h2>بأمكانك تعديل الحسابات البنكية او حذف الحسابات البنكية</h2>
				<p>
                هنا تعرض كل الحسابات البنكية التي قمت بإضافتها مسبقا
                </p>
				
				<div class="entry">
					<div class="sep"></div>
				</div>
                
                                    <?php
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
				
				$view_query_bank_accounts = "SELECT * FROM `bankaccounts` ORDER BY ID";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_bank_accounts = mysqli_query($mysqli,$view_query_bank_accounts);
				$view_num_bank_accounts = mysqli_num_rows($view_execution_bank_accounts);
				if($view_num_bank_accounts > 0){
				?>
                				<table>
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">اسم صاحب الحساب</th>
							<th scope="col">اسم البنك</th>
							<th scope="col">رقم الحساب</th>
							<th scope="col">رقم الحساب الدولي</th>
							<th scope="col" style="width: 65px;">تحرير</th>
						</tr>
					</thead>
						
					<tbody>
                <?php
					while($bank_acc = mysqli_fetch_array($view_execution_bank_accounts)){
				?>     
                    
						<tr>
							<td class="align-center"><?php echo $bank_acc[id] ?></td>
							<td><?php echo $bank_acc[his_bank_account] ?></td>
							<td><?php echo $bank_acc[Bank_Name] ?></td>
							<td><?php echo $bank_acc[Account_Number] ?></td>
							<td><?php echo $bank_acc[Account_Number_International] ?></td>
							<td>
					<a href="edit_a_bank_account.php?id=<?php echo $bank_acc[id] ?>" class="table-icon edit" title="تحرير"></a>
					<a onClick="return confirm('هل أنت متأكد من رغبتك في حذف البنك ؟')" 
                    href="delet_a_bank_account.php?id=<?php echo $bank_acc[id] ?>" class="table-icon delete" title="حذف"></a>
							</td>
						</tr>
						

                <?php
				}
				echo "
				</tbody>
				</table>
				";
				}else{
				?>
                <div class="n_warning"><p>
                لا يتوفر حسابات بنكية ليتم عرضها
                </p></div>
                <?php
					}
				// اغلاق الأتصال بقاعدةالبيانات
				mysqli_close($mysqli);
				?>
				
					<div class="sep"></div>		
				</div>
			</div>

        
		<div class="clear"></div>
	</div>

        <?php
		include("template/footer.php");
		?>

</body>
</html>
