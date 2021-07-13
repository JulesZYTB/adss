<div id="top">

			<div class="right">

				<p>مرحباً, <strong><?php 

				

				/// استعدعاء ملف الأتصال بقاعدة البيانات

				include("../include/config.php");

				

				/// استدعاء دالة حماية المدخلات 

				include("../include/functions/Secure_input.php");

				

				$id = $_SESSION['id_members'];

				$id_member = secure_input($id,"int");

				

				mysqli_query($mysqli,"SET NAMES 'utf8'");

				$user = secure_input($user_or,"text_input");

				$query_login = "SELECT * FROM `members` where id = \"$id\" ";

				$result_query = mysqli_query($mysqli,$query_login);

				$Data_member = mysqli_fetch_array($result_query);

				$group_num = $Data_member[groupnumber];

				echo $Data_member[username];

				

				// اغلاق الأتصال بقاعدةالبيانات

				mysqli_close($mysqli);

				?></strong> [ <a href="logout.php">تسجيل الخروج</a> ]</p>

			</div>

			<div class="left">

				<div class="align-right">

					<p></p>

				</div>

			</div>

		</div>