<?php
session_start();
ob_start();
if(!isset($_SESSION['id_members'])){header("location:index.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ar" dir="rtl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
<title>الصفحة الرئيسة - لوحة التحكم</title>
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
		include("template/menu.php");
		?>
		
        
        
		<div id="main">
			<div class="half_w half_left">
				<div class="h_title">إحصائيات الزيارات</div>
					<script src="js/highcharts_init.js"></script>
					<div dir="ltr" id="container" style="min-width: 300px; height: 180px; margin: 0 auto"></div>
					<script src="js/highcharts.js"></script>
			</div>
			<div class="half_w half_right">
				<div class="h_title">إحصائيات الموقع</div>
				<div class="stats">
					<div class="today">
						<h3>اليوم</h3>
						<p class="count">2 349</p>
						<p class="type">الزيارات</p>
						<p class="count">96</p>
						<p class="type">التعليقات</p>
						<p class="count">9</p>
						<p class="type">المقالات</p>
					</div>
					<div class="week">
						<h3>الأسبوع الماضي</h3>
						<p class="count">12 931</p>
						<p class="type">الزيارات</p>
						<p class="count">521</p>
						<p class="type">التعليقات</p>
						<p class="count">38</p>
						<p class="type">المقالات</p>
					</div>
				</div>
			</div>
            
			
			<div class="clear"></div>
			
			<div class="full_w">
				<div class="h_title">الفقرات, الرؤوس, القوائم و التنبيهات</div>
				<h1>الرأس1 H1</h1>
				<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق، إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص.</p>
				<h2>الرأس2 H2</h2>
				<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق، إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص</p>
				<h3>الرأس3 H3</h3>
				<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق، إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص</h3>
				<ul>
					<li>العُنصر الأول , هذا النص هو مثال لنص يمكن أن يستبدل</li>
					<li>العنصر الثاني , هذا النص هو مثال لنص يمكن أن يستبدل</li>
					<li>العنصر الثالث في القائمة , هذا النص هو مثال لنص يمكن أن يستبدل</li>
					<li>العنصر الرابع , هذا النص هو مثال لنص يمكن أن يستبدل</li>
				</ul>
				<h3>قائمة منقطة</h3>
				<ol>
					<li>العُنصر الأول , هذا النص هو مثال لنص يمكن أن يستبدل</li>
					<li>العنصر الثاني , هذا النص هو مثال لنص يمكن أن يستبدل</li>
					<li>العنصر الثالث في القائمة , هذا النص هو مثال لنص يمكن أن يستبدل</li>
					<li>العنصر الرابع , هذا النص هو مثال لنص يمكن أن يستبدل</li>
				</ol>
                <div class="n_warning"><p>رسالة تنبيه. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى.</p></div>
				<div class="n_ok"><p>رسالة نجاح! هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى.</p></div>
				<div class="n_error"><p>رسالة خطأ! هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى.</p></div>		
			</div>
			
			<div class="full_w">
				<div class="h_title">إضافة صفحة جديدة - عناصر النموذج (Form)</div>
				<form action="" method="post">
					<div class="element">
						<label for="name">عنوان الصفحة <span class="red">(مطلوب)</span></label>
						<input id="name" name="name" class="text err" />
					</div>
					<div class="element">
						<label for="category">التصنيف <span class="red">(مطلوب)</span></label>
						<select name="category" class="err">
							<option value="0">-- إختر تصنيفاً</option>
							<option value="1">التصنيف 1</option>
							<option value="2">التصنيف 4</option>
							<option value="3">التصنيف 3</option>
						</select>
					</div>
					<div class="element">
						<label for="comments">التعليقات</label>
						<input type="radio" name="comments" value="on" checked="checked" /> إتاحة <input type="radio" name="comments" value="off" /> تعطيل
					</div>
					<div class="element">
						<label for="attach">المُرفقات</label>
						<input type="file" name="attach" />
					</div>
					<div class="element">
						<label for="content">مُحتوى الصفحة <span>(مطلوب)</span></label>
						<textarea name="content" class="textarea" rows="10"></textarea>
					</div>
					<div class="entry">
						<button type="submit">مُعاينة</button> <button type="submit" class="add">حفظ الصفحة</button> <button class="cancel">إلغاء</button>
					</div>
				</form>
			</div>
			
			<div class="full_w">
				<div class="h_title">إدارة الصفحات - الجداول (Table)</div>
				<h2>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى</h2>
				<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق</p>
				
				<div class="entry">
					<div class="sep"></div>
				</div>
				<table>
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">العنوان</th>
							<th scope="col">الكاتب</th>
							<th scope="col">التاريخ</th>
							<th scope="col">التصنيف</th>
							<th scope="col" style="width: 65px;">تحرير</th>
						</tr>
					</thead>
						
					<tbody>
						<tr>
							<td class="align-center">2</td>
							<td>الرئيسية</td>
							<td>Paweł B.</td>
							<td>22-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="تحرير"></a>
								<a href="#" class="table-icon archive" title="أرشّفه"></a>
								<a href="#" class="table-icon delete" title="حذف"></a>
							</td>
						</tr>
						<tr>
							<td class="align-center">3</td>
							<td>عُروضنا</td>
							<td>فهد سالم</td>
							<td>22-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="تحرير"></a>
								<a href="#" class="table-icon archive" title="أرشّفه"></a>
								<a href="#" class="table-icon delete" title="حذف"></a>
							</td>
						</tr>
							
						<tr>
							<td class="align-center">5</td>
							<td>عنّا</td>
							<td>الإدارة</td>
							<td>23-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="تحرير"></a>
								<a href="#" class="table-icon archive" title="أرشّفه"></a>
								<a href="#" class="table-icon delete" title="حذف"></a>
							</td>
						</tr>
							
						<tr>
							<td class="align-center">12</td>
							<td>التواصل</td>
							<td>Admin</td>
							<td>25-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="تحرير"></a>
								<a href="#" class="table-icon archive" title="أرشّفه"></a>
								<a href="#" class="table-icon delete" title="حذف"></a>
							</td>
						</tr>						
						<tr>
							<td class="align-center">114</td>
							<td>Portfolio</td>
							<td>Paweł B.</td>
							<td>22-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="تحرير"></a>
								<a href="#" class="table-icon archive" title="أرشّفه"></a>
								<a href="#" class="table-icon delete" title="حذف"></a>
							</td>
						</tr>
							
						<tr>
							<td class="align-center">116</td>
							<td>Clients</td>
							<td>Admin</td>
							<td>23-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="تحرير"></a>
								<a href="#" class="table-icon archive" title="أرشّفه"></a>
								<a href="#" class="table-icon delete" title="حذف"></a>
							</td>
						</tr>
							
						<tr>
							<td class="align-center">131</td>
							<td>آراء العملاء</td>
							<td>Admin</td>
							<td>25-03-2012</td>
							<td>-</td>
							<td>
								<a href="#" class="table-icon edit" title="تحرير"></a>
								<a href="#" class="table-icon archive" title="أرشّفه"></a>
								<a href="#" class="table-icon delete" title="حذف"></a>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="entry">
					<div class="pagination">
						<span>« الأولى</span>
						<span class="active">1</span>
						<a href="">2</a>
						<a href="">3</a>
						<a href="">4</a>
						<span>...</span>
						<a href="">23</a>
						<a href="">24</a>
						<a href="">الأخيره »</a>
					</div>
					<div class="sep"></div>		
					<a class="button add" href="">إضافة صفحة جديدة</a> <a class="button" href="">التصنيفات</a> 
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

        <?php
		include("template/footer.php");
		?>

</body>
</html>
