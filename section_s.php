                              

							  <?php
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");
				$q = intval($_GET['q']);
				$view_query_section = "SELECT * FROM `section` WHERE Documentto = \"$q\" and type = \"فرعي\" ";
				$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
				$view_execution_section = mysqli_query($mysqli,$view_query_section);
				$view_num_section = mysqli_num_rows($view_execution_section);
				if($view_num_section > 0){
				?>
			
				<select name="ads_tags_F" id="1" class="form-control  ads_tags modonly" onchange="showUser_section(this.value)">
			   	<option value="">أختر القسم الفرعي</option>
				<?php
				while($feth_array_inf = mysqli_fetch_array($view_execution_section)){
				?>
				<option value="<?php echo $feth_array_inf[id];?>"><?php echo $feth_array_inf[name];?></option>
				<?php
				}
				echo "</select>";
				?>
				
				<?php
				}else{
				}
			
			?>
			
			
 
 