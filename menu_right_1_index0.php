<div class="col-xs-12  col-sm-3 col-md-3 col-lg-3" id="firstDiv">

    <p class="moreoptions showhideside" style="display: none;width:30%;margin-right:10px">إظهار الخيارات</p>
      <div class="side-col  ">



    <form class="form-horizontal  bs-example-control-sizing" name="drop_list" method="post" action="process-more-models.php">
    
    
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
  xmlhttp.open("GET","section_s.php?type=<?php echo $type_section; ?>&q="+str,true);
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

<hr>

<form action="search.php" method="get" class="visible-xs">

   
<div class="row">
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input type="search" class="form-control " placeholder="ابحث عن سلعه ..." name="key"></div>
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <button type="submit" class="btn btn-success  "><i class="fa fa-search"></i></button></div>
</div>

</form>
<br class="visible-xs">


<form action="search.php" method="get" novalidate>

   
<div class="row">
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input type="text" class="form-control " placeholder="ادخل رقم الاعلان" name="key" pattern="[0-9]*"></div>
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <button type="submit" class="btn btn-primary ">انتقال</button></div>
</div>

</form>


<hr>



<div class="bs-example bs-example-tabs">
      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a data-toggle="tab" href="<?php echo $url_hraj; ?>#home">سيارات</a></li>
        <li class=""><a data-toggle="tab" href="<?php echo $url_hraj; ?>#profile">سيارات بالصور</a></li>
       
      </ul>
      <div class="tab-content" id="myTabContent">
        <div id="home" class="tab-pane fade active in">
    
      
      
        <!-- start img cats-->
      
    
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/1/تويوتا">
        <img class="car_cont sprite-toyota" title="سيارات تويوتا" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات تويوتا">
        </a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/24/نيسان">
        <img class="car_cont sprite-nissan" title="نسيان" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="نسيان"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/79/فورد">
        <img class="car_cont sprite-ford" title="سيارات فورد" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات فورد"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/46/لكزس">
        <img class="car_cont sprite-lexus" title="لكزس" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="لكزس"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/106/شيفروليه">
        <img class="car_cont sprite-chevrolet" title="سيارات شفروليه للبيع" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات شفروليه للبيع"></a> 
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/55/مرسيدس">
        <img class="car_cont sprite-benz" title="سيارات مرسيدس" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات مرسيدس"></a>  
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/137/جي ام سي">
        <img class="car_cont sprite-GMC" title="جي ام سي" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="جي ام سي"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/149/بي ام دبليو">
        <img class="car_cont sprite-bmw" title="بي ام دبليو" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="بي ام دبليو"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/307/دودج">
        <img class="car_cont sprite-dodge" title="سيارات دودج" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات دوج"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/192/همر">
        <img class="car_cont sprite-mini" title="سيارات همر" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات همر"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/272/كاديلاك">
        <img class="car_cont sprite-cadillac" title="سيارات كاديلاك" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات كاديلاك"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/362/اودي">
        <img class="car_cont sprite-audi" title="اودي" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="اودي"></a>  
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/183/هوندا">
        <img class="car_cont sprite-honda" title="هوندا" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="هوندا"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/202/لاند روفر">
        <img class="car_cont sprite-landrover" title="لاندروفر" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="لاندروفر"></a> 
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/202/فولكس واجن">
        <img class="car_cont sprite-volkswagen" title="فولكس واجن" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="فولكس واجن"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/209/مازدا">
        <img class="car_cont sprite-mazda" title="مازدا" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="مازدا"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/230/ميتسوبيشي">
        <img class="car_cont sprite-mitsubishi" title="ميتسوبيشي" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="ميتسوبيشي"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/164/هونداي">
        <img class="car_cont sprite-hyundai" title="هونداي" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="هونداي"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/159/جيب">
        <img class="car_cont sprite-jeep" title="جيب" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="جيب"></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/196/انفنيتي">
        <img class="car_cont sprite-infiniti" title="انفنيتي" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="انفنيتي"></a>
          <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/345/سوزوكي">
        <img class="car_cont sprite-suzuki" title="سوزوكي" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سوزوكي"></a>
              <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/248/كيا">
        <img class="car_cont sprite-kia" title="كيا" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="كيا"></a>
          <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/281/كرايزلر">
        <img class="car_cont sprite-chrysler" title="كرايزلر" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="كرايزلر"></a>
          <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/70/بورش">
        <img class="car_cont sprite-porsche" title="بورش" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="بورش"></a>
          <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/414/قطع غيار وملحقات">
        <img class="car_cont sprite-parts" title="قطع غيار وملحقات" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="قطع غيار وملحقات"></a>
            <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/421/شاحنات ومعدات ثقيلة">
        <img class="car_cont sprite-trucks" title="شاحنات ومعدات ثقيلة" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="شاحنات ومعدات ثقيلة"></a>
    
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/405/دبابات">
        <img class="car_cont sprite-bikes" title="دبابات" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="دبابات"></a>
    
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/511/سيارات تراثية">
        <img class="car_cont sprite-classic" title="سيارات تراثية" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات تراثية"></a>
    
          <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/510/سيارات مصدومه">
        <img class="car_cont sprite-damaged" title="سيارات مصدومه" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات مصدومه"></a>
  
        <a class="gallerypic" href="<?php echo $url_hraj; ?>tags/509/سيارات للتنازل">
        <img class="car_cont sprite-tanazul" title="سيارات للتنازل" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات للتنازل"></a>
    
      <!-- end-->
      
      
        










        </div>
        <div id="profile" class="tab-pane fade ">
          

              <!-- start img cats-->
      
    
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/1/تويوتا">
        <img class="car_cont sprite-toyota" title="سيارات تويوتا" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات تويوتا">
        <span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/24/نيسان">
        <img class="car_cont sprite-nissan" title="نسيان" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="نسيان"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/79/فورد">
        <img class="car_cont sprite-ford" title="سيارات فورد" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات فورد"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/46/لكزس">
        <img class="car_cont sprite-lexus" title="لكزس" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="لكزس"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/106/شيفروليه">
        <img class="car_cont sprite-chevrolet" title="سيارات شفروليه للبيع" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات شفروليه للبيع"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a> 
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/55/مرسيدس">
        <img class="car_cont sprite-benz" title="سيارات مرسيدس" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات مرسيدس"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>  
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/137/جي ام سي">
        <img class="car_cont sprite-GMC" title="جي ام سي" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="جي ام سي"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/149/بي ام دبليو">
        <img class="car_cont sprite-bmw" title="بي ام دبليو" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="بي ام دبليو"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/307/دودج">
        <img class="car_cont sprite-dodge" title="سيارات دودج" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات دوج"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/192/همر">
        <img class="car_cont sprite-mini" title="سيارات همر" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات همر"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/272/كاديلاك">
        <img class="car_cont sprite-cadillac" title="سيارات كاديلاك" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات كاديلاك"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/362/اودي">
        <img class="car_cont sprite-audi" title="اودي" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="اودي"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>  
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/183/هوندا">
        <img class="car_cont sprite-honda" title="هوندا" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="هوندا"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/202/لاند روفر">
        <img class="car_cont sprite-landrover" title="لاندروفر" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="لاندروفر"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a> 
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/202/فولكس واجن">
        <img class="car_cont sprite-volkswagen" title="فولكس واجن" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="فولكس واجن"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/209/مازدا">
        <img class="car_cont sprite-mazda" title="مازدا" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="مازدا"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/230/ميتسوبيشي">
        <img class="car_cont sprite-mitsubishi" title="ميتسوبيشي" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="ميتسوبيشي"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/164/هونداي">
        <img class="car_cont sprite-hyundai" title="هونداي" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="هونداي"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/159/جيب">
        <img class="car_cont sprite-jeep" title="جيب" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="جيب"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/196/انفنيتي">
        <img class="car_cont sprite-infiniti" title="انفنيتي" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="انفنيتي"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
          <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/345/سوزوكي">
        <img class="car_cont sprite-suzuki" title="سوزوكي" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سوزوكي"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
              <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/248/كيا">
        <img class="car_cont sprite-kia" title="كيا" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="كيا"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
          <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/281/كرايزلر">
        <img class="car_cont sprite-chrysler" title="كرايزلر" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="كرايزلر"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
          <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/70/بورش">
        <img class="car_cont sprite-porsche" title="بورش" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="بورش"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
          <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/414/قطع غيار وملحقات">
        <img class="car_cont sprite-parts" title="قطع غيار وملحقات" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="قطع غيار وملحقات"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
            <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/421/شاحنات ومعدات ثقيلة">
        <img class="car_cont sprite-trucks" title="شاحنات ومعدات ثقيلة" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="شاحنات ومعدات ثقيلة"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
    
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/405/دبابات">
        <img class="car_cont sprite-bikes" title="دبابات" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="دبابات"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
    
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/511/سيارات تراثية">
        <img class="car_cont sprite-classic" title="سيارات تراثية" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات تراثية"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
    
          <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/510/سيارات مصدومه">
        <img class="car_cont sprite-damaged" title="سيارات مصدومه" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات مصدومه"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
  
        <a class="gallerypic" href="<?php echo $url_hraj; ?>pic/509/سيارات للتنازل">
        <img class="car_cont sprite-tanazul" title="سيارات للتنازل" src="<?php echo $url_hraj; ?>templates/default/images2/clear.gif" alt="سيارات للتنازل"><span class="pic-icon"><i class="fa fa-camera-retro  "></i></span></a>
    
      <!-- end-->
    
      
      
      
      




        </div>
      
      </div>
    </div>

<hr>







    <ul class="nav nav-tabs">
  <li class="active"><a href="<?php echo $url_hraj; ?>tags/">أجهزة</a></li>
 
</ul>
<br>
 <div>
        



<div class="glyph">

<a href="<?php echo $url_hraj; ?>tags/451/ابل Apple">   <i class="fa fa-apple fa-3x"></i> </a>


</div>

<div class="glyph">

<a href="<?php echo $url_hraj; ?>tags/457/سامسونج Samsung" class="tag-cat"><i class="icon-Samsung fa-3x"></i></a>
</div>

 <div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/479/بلاك بيري BlackBerry" class="tag-cat"><i class="icon-BlackBerry fa-3x"></i></a>
</div>

<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/472/مايكروسوفت Microsoft" class="tag-cat"><i class="icon-Microsoft fa-3x"></i></a>
</div>

<div class="glyph">

<a href="<?php echo $url_hraj; ?>tags/465/اوليمبوس Olympus" class="tag-cat"><i class="icon-Olympus fa-3x"></i></a>
</div>
<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/471/فوجي فيلم fujifilm" class="tag-cat"><i class="icon-Fujifilm fa-3x"></i></a>
</div>
<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/470/باناسونيك Panasonic" class="tag-cat"><i class="icon-Panasonic fa-3x"></i></a>
</div>
<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/468/توشيبا Toshiba" class="tag-cat"><i class="icon-Toshiba fa-3x"></i></a>
</div>
<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/473/اسوس Asus" class="tag-cat"><i class="icon-Asus fa-3x"></i></a>
</div>
<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/456/نوكيا Nokia" class="tag-cat"><i class="icon-Nokia fa-3x"></i></a>
</div>

<div class="glyph">

<a href="<?php echo $url_hraj; ?>tags/464/كانون Canon" class="tag-cat"><i class="icon-Canon fa-3x"></i></a>
</div>
<div class="glyph">

<a href="<?php echo $url_hraj; ?>tags/466/سوني Sony" class="tag-cat"><i class="icon-Sony fa-3x"></i></a>
</div>
<div class="glyph">

<a href="<?php echo $url_hraj; ?>tags/469/ال جي LG" class="tag-cat"><i class="icon-LG fa-3x"></i></a>
</div>
<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/478/هيتاشي Hitachi" class="tag-cat"><i class="icon-Hitachi fa-3x"></i></a>
</div>
<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/481/اتش تي سي htc" class="tag-cat"><i class="icon-HTC fa-3x"></i></a>
</div>
<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/474/أرقام مميزة"  class="tag-cat">أرقام مميزة</a>
</div>


 <br> <br> <br>
        </div>

<div class="clear"></div>
<hr>



 <ul class="nav nav-tabs">
  <li class="active"><a href="<?php echo $url_hraj; ?>#">أقسام أخرى</a></li>
 
</ul>
<br>
 <div>
  <div class="glyph">

        <a href="<?php echo $url_hraj; ?>tags/486/أبل"><i class="icon-camel fa-3x"></i> </a>
        </div>

<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/485/غنم"><i class="icon-sheep2 fa-3x"></i> </a>
</div>

<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/487/ماعز"><i class="icon-goat fa-3x"></i> </a>
</div>

<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/489/دجاج"><i class="icon-chicken fa-3x"></i> </a>
</div>

<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/491/قطط"><i class="icon-cat fa-3x"></i> </a>
</div>

<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/492/ببغاء"><i class="icon-parrot fa-3x"></i> </a>
</div>

<div class="glyph">
<a href="<?php echo $url_hraj; ?>tags/501/اثاث"><i class="icon-athath fa-3x"></i> </a>
</div>

   <div style="clear:both;"></div>

         </div>



<div class="clear"></div>
 <hr>
 
 
 <ul class="nav nav-tabs">
  <li class="active"><a href="<?php echo $url_hraj; ?>#">عقارات</a></li>
 
</ul>
<br>
 <div>
        

    
<?php
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
$query_aqar = "SELECT * FROM `section` WHERE Contents = \"العقارات\"";
$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_aqar_ex = mysqli_query($mysqli,$query_aqar);
while($query_fetch_array_aqar = mysqli_fetch_array($query_aqar_ex)){
?>
<a title="<?php echo $query_fetch_array_aqar[name] ?>" href="<?php echo $url_hraj; ?>tags/<?php echo $query_fetch_array_aqar[id] ?>/<?php echo $query_fetch_array_aqar[name] ?>" class="tag"><?php echo $query_fetch_array_aqar[name] ?></a><br>


<?php
}
?>

        </div>
        <div class="clear"></div>


<hr>

 
<!--<h3><a href="<?php echo $url_hraj; ?>">منتدى السيارات </a></h3>-->



  
</div>
  </div>