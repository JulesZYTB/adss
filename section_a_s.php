		  

		  <select name="ads_tags_R" id="1" class="form-control  ads_tags modonly" onchange="showUser(this.value)">
			<option value=""><?php if($type_section === "السيارات"){echo "أختر ماركة السيارة";}else{echo "أختر القسم المناسب";}
			?></option>
					<?php
					
			/// استدعاء دالة حماية المدخلات
				include("include/functions/Secure_input.php");
					$q = $_GET['q'];
					$q = secure_input($q,"text_input");
					
				/// استعدعاء ملف الأتصال بقاعدة البيانات
				include("include/config.php");

						$view_query_city = "SELECT * FROM `section` WHERE Contents = \"$q\" and type = \"رئيسي\"";
						$unicode_arabic = mysqli_query($mysqli,"SET NAMES 'utf8'");
						$view_execution_city = mysqli_query($mysqli,$view_query_city);
						
						while($array_city = mysqli_fetch_array($view_execution_city)){
						?>
						<option value="<?php echo $array_city[id]; ?>
						"><?php echo $array_city[name]; ?></option>
						
						<?php
						
						}
					?>
			</select>