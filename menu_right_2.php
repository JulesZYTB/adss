<div class="col-xs-12  col-sm-3 col-md-3 col-lg-3 " id="firstDiv">
   	    <p class="moreoptions showhideside" style="display: none;width:30%;margin-right:10px">إظهار الخيارات</p>

      <div class="side-col ">



    <form class="form-horizontal  bs-example-control-sizing" name="drop_list" method="post" action="<?php echo $url_hraj; ?>process-more-models.php">
    
    
  <select name="ads_tags_R" class="form-control " onchange="showUser(this.value)">
    <option value="marka">أختر ماركة السيارة</option>
					<?php

				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");

						$view_query_city = "SELECT * FROM `section` WHERE Contents = \"السيارات\" and type = \"رئيسي\"";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
						<option value="<?php echo $array_city[id]; ?>
						"><?php echo $array_city[name]; ?></option>
						
						<?php
						
						}
					?></select>
     
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
  xmlhttp.open("GET","<?php echo $url_hraj; ?>section_s.php?type=<?php echo $type_section; ?>&q="+str,true);
  xmlhttp.send();
}
</script>
               
                    
  	<div id="txtHint">
     <select name="subcity" id="model" class="form-control ">
     <option value="">أختر نوع السيارة</option>
     </select>
     </div>
     
  <select name="model" id="year" class="form-control ">
     <option value="">كل الموديلات</option>
     </select>

      <select name="startmodel" class="form-control moreelementsinmain" id="startmodel" style="display: none;">
     <option value="">من موديل</option>
     </select>
  


  <select name="endmodel" class="form-control moreelementsinmain" id="endmodel" style="display: none;">
     <option value="">إلى موديل</option>
   </select>

   <select name="cities" class="form-control moreelementsinmain" id="cities" style="display: none;">
     <option value="">كل المدن</option>
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
						<option <?php if($city === $array_city[id]){ ?> selected="selected" <?php } ?>
                         value="<?php echo $array_city[id]; ?>"><?php echo $array_city[text]; ?></option>
						
						<?php
						
						}
						?>

		</select>
 
     <button type="submit" class="btn  btn-success form-control  "><i class="fa fa-search"></i> </button>

   
    <div class="pull-left"> <p class="showmoreoptions moreoptions">خيارات أكثر</p> </div>


    </form>

    <br>

    <br>

<hr>




      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a data-toggle="tab" href="#home">سيارات</a></li>
        
       
      </ul>
     <br>



				  <div class="clear"></div>
                  				<?php 
						$view_query_city = "SELECT * FROM `section` WHERE Contents = \"السيارات\" and type = \"رئيسي\"";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
<a class="tag" href="<?php echo $url_hraj; ?>tags/<?php echo $array_city[id]; ?>/<?php echo $array_city[name]; ?>/allmodels/<?php echo $tag_id; ?>" 
title="<?php echo $array_city[name]; ?>"><?php echo $array_city[name]; ?>  في <?php echo $ads_city_name; ?> </a><br>
        
						<?php } ?>
			<hr>
 
    <ul class="nav nav-tabs">
  <li class="active"><a href="#">أجهزة</a></li>
 
</ul>
<br>



<div class="clear"></div>
                  				<?php 
						$view_query_city = "SELECT * FROM `section` WHERE Contents = \"الأجهزة\" and type = \"رئيسي\"";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
<a class="tag" href="<?php echo $url_hraj; ?>tags/<?php echo $array_city[id]; ?>/<?php echo $array_city[name]; ?>/allmodels/<?php echo $tag_id; ?>" 
title="<?php echo $array_city[name]; ?>"><?php echo $array_city[name]; ?>  في <?php echo $ads_city_name; ?> </a><br>
        
						<?php } ?>
	  	  

<hr>
 

 <ul class="nav nav-tabs">
  <li class="active"><a href="#">أقسام أخرى</a></li>
 
</ul>
<br>



<div class="clear"></div>
                  				<?php 
						$view_query_city = "SELECT * FROM `section` WHERE Contents = \"عام\" and type = \"رئيسي\"";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
<a class="tag" href="<?php echo $url_hraj; ?>tags/<?php echo $array_city[id]; ?>/<?php echo $array_city[name]; ?>/allmodels/<?php echo $tag_id; ?>" 
title="<?php echo $array_city[name]; ?>"><?php echo $array_city[name]; ?>  في <?php echo $ads_city_name; ?> </a><br>
        
						<?php } ?>
	  	  

<hr>
 
 <ul class="nav nav-tabs">
  <li class="active"><a href="#">عقارات</a></li>
 
</ul>
<br>



<div class="clear"></div>
                  				<?php 
						$view_query_city = "SELECT * FROM `section` WHERE Contents = \"العقارات\" and type = \"رئيسي\"";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
<a class="tag" href="<?php echo $url_hraj; ?>tags/<?php echo $array_city[id]; ?>/<?php echo $array_city[name]; ?>/allmodels/<?php echo $tag_id; ?>" 
title="<?php echo $array_city[name]; ?>"><?php echo $array_city[name]; ?>  في <?php echo $ads_city_name; ?> </a><br>
        
						<?php } ?>
        

<hr>
 

    <?php if(!empty($ads_city_name)){ ?>


			بحث في

				<?php if(!empty($username)){echo $username." في ";} ?>
                
                
						<?php echo $ads_city_name; ?>
					

			<form class="form-inline" method="get" action="<?php echo $url_hraj; ?>search.php">
             <div class="input-group  ">
             
 			<input type="search" name="key" class="form-control " placeholder="ابحث عن سلعه في <?php echo $ads_city_name; ?> ..." id="autocomplete" style="width: 100%;">
<input type="hidden" name="city" value="<?php echo $tag_id; ?>">

<input type="hidden" name="<?php if(!empty($username)){echo "type_ads_other_final";}  ?>" value="<?php echo $username; ?>">
					
            
        
        

      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
      </span>

        </div>
        </form>
        
        <?php 
		}
		?>
        <hr>
  
</div>
  </div>