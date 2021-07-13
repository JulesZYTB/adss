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
<title>عرض الأقسام - لوحة التحكم</title>
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
				<div class="h_title">عرض الأقسام - التعديل - الحذف </div>
				<h2>عرض الأقسام</h2>
				<p>
                يتم هنا تعديل الأقسام و حذفها
                </p>
				
				<div class="entry">
					<div class="sep"></div>
				</div>
                
                                    <?php
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
				include("../include/functions/ftime.php");
				
				$view_query_bank_accounts = "SELECT * FROM `section` ORDER BY ID";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_bank_accounts = mysqli_query($mysqli,$view_query_bank_accounts);
				$view_num_bank_accounts = mysqli_num_rows($view_execution_bank_accounts);
				if($view_num_bank_accounts > 0){
			
 
 
				?>
                				<table class="table" id="table_id">
          	
					<thead>
							<tr style="background: url(bg_box_head.jpg) repeat-x;">
						<th scope="col">ID</th>
							<th scope="col">العنوان | تعديل</th>
							<th scope="col">مسند إلي</th>
							<th scope="col" style="width: 65px;">حذف</th>
						</tr>
					</thead>
						
					<tbody>
              
              <?php
    $tbl_name="section";        //my  table name
    // How many adjacent pages should be shown on each side?
    $adjacents = 6;
	
    
    /* 
       First get total number of rows in data table. 
       If you have a WHERE clause in your query, make sure you mirror it here.
    */
    $query = "SELECT COUNT(*) as num FROM $tbl_name $search_message_query ";
    $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
    $total_pages = $total_pages[num];
    
    /* Setup vars for query. */
    $targetpage = "View_section.php";     //your file name  (the name of this file)
    $limit = 20;                                 //how many items to show per page
    $page = $_GET['page'];
    if($page) 
        $start = ($page - 1) * $limit;             //first item to display on this page
    else
        $start = 0;                                //if no page var is given, set start to 0
    
    /* Get data. */
    //$sql = "SELECT * FROM section $search_message_query LIMIT $start, $limit";
    $sql = "SELECT * FROM section $search_message_query";
    $result = mysqli_query($mysqli,$sql);
    
    /* Setup page vars for display. */
    if ($page == 0) $page = 1;                    //if no page var is given, default to 1.

    $prev = $page - 1;                            //previous page is page - 1
    $next = $page + 1;                            //next page is page + 1
    $lastpage = ceil($total_pages/$limit);        //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                        //last page minus 1
    
    /* 
        Now we apply our rules and draw the pagination object. 
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
	
	?>
        <?php
        while($row = mysqli_fetch_array($result))
        {
    					/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("../include/config.php");
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$query_keyinformation_print2 = "SELECT * FROM `section` WHERE id = \"$row[Documentto]\" ";
				$result_keyinformation_print2 = mysqli_query($mysqli,$query_keyinformation_print2);
				$print_value2 = mysqli_fetch_array($result_keyinformation_print2);
        ?>
        
        						<tr>
							<td class="align-center"><?php echo $row[id] ?></td>
							<td><a href="edit_section.php?id=<?php echo $row[id] ?>">
							<?php echo $row[name] ?></a></td>
							<td><?php if(empty($print_value2[name])){echo "غير مسند";}else{echo $print_value2[name];}  ?></td>

							<td>
					<a onClick="return confirm('هل انت متأكد من رغبتك في حذف القسم ؟')" 
                    href="Delete_section.php?id=<?php echo $row[id] ?>" class="table-icon delete" title="حذف"></a>
							</td>
						</tr>
        
        <?php 
    
        }
    ?>
    
    <?php
	
    $pagination = "";
    if($lastpage > 1)
    {    
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1) 
            $pagination.= "<a href=\"$targetpage?page=$prev\">السابق</a>";
        else
            $pagination.= "<span class=\"disabled\">السابق</span>";    
        
        //pages    
        if ($lastpage < 7 + ($adjacents * 2))    //not enough pages to bother breaking it up
        {    
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                    
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))        
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                    
                }
                $pagination.= "...";
                $pagination.= "<a dir=\"rtl\" href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";        
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                    
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";        
            }
            //close to end; only hide early pages
            else
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                    
                }
            }
        }
        
        //next button
        if ($page < $counter - 1) 
            $pagination.= "<a href=\"$targetpage?page=$next\">التالي</a>";
        else
            $pagination.= "<span class=\"disabled\">التالي</span>";
        $pagination.= "</div>\n";        
    }
?>



<!--<?=$pagination?>-->
              
                              
				<?php
				echo "
				</tbody>
				</table>
				";
				}else{
				?>
                <div class="n_warning"><p>
                لا يتوفر أقسام ليتم عرضها
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

