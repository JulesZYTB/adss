        <form class="form-inline hidden-xs" role="form" method="get" action="search.php">
  <div class="form-group">
    <label class="sr-only" for="search">البحث</label>
    <input type="search" name="key" class="typeahead form-control " dir="rtl" placeholder="ابحث عن سلعه ..." style="width:250px">
  </div>
  <div class="form-group">
    <label class="sr-only">اختر المدينة</label>
  	<select class="form-control" name="city"><option value="">كل المدن</option>
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

  </div>
  

  <button type="submit" class="btn btn-success "><i class="fa fa-search"></i></button>   

  <a href="advsearch.php">البحث المتقدم</a>
</form>



<br>