<?php
session_start();
ob_start();
include("include/config_header.php");	
ob_start();
if(!isset($_SESSION['id_members'])){header("location:login.php");}
/// استعدعاء ملف الأتصال بقاعدة البيانات
include("include/config.php");
mysqli_query($mysqli,"SET NAMES 'utf8'");
$query_keyinformation_print = "SELECT * FROM `keyinformation` WHERE id = \"1\" ";
$result_keyinformation_print = mysqli_query($mysqli,$query_keyinformation_print);
$print_value = mysqli_fetch_array($result_keyinformation_print);
$namewebsite = $print_value[namewebsite];
$namewebsiteen = $print_value[namewebsiteen];
$keywords = $print_value[keywords];
$messagesphone = $print_value[messagesphone];
$description = nl2br($print_value[description]);
$username_mobile = $print_value[username];
$password_mobile = $print_value[password];

?>

<!DOCTYPE html>
<html lang="ar-sa" dir="rtl"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $namewebsite; ?></title> 
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<link href="templates/default/css/bootstrap.rtl.min.css" rel="stylesheet" media="screen"> 
<link href="templates/default/css/custom3.css?v=1.4" rel="stylesheet" media="screen">
<link href="templates/default/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="templates/default/css/custom-icon-fonts.css?v=1.1">
<script async src="templates/default/js/analytics.js"></script>
<script src="templates/default/js/respond.min.js"></script>
<script src="templates/default/js/html5shiv.js" type="text/javascript"></script>
<script src="templates/default/js/respond.proxy.js"></script>
<script src="templates/default/js/jquery-1.10.1.min.js"></script>
<script src="templates/default/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="templates/default/js/cars.js"></script>
<script src="templates/default/js/bootstrap.min.js"></script>
<script type="text/javascript" src="templates/default/js/v5.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 
 
 
 
<?php
include("header.php"); // استدعاء ملف الهيدر
?>
      
      
<div class="row" id="wrapper">
<div class="col-xs-12  col-sm-9 col-md-6 col-lg-6 " id="secondDiv">
    <h2>توثيق البريد الألكتروني</h2>

    <?php
        if($Documentingemail == 1){header("location:index.php");}
    $Key = $_GET['key'];
    $Key = secure_input($Key,"text_input");
    
    if(!empty($Key)){
        // استعلام البحث عن توفر الأيميل في قاعدة البيانات 
        $QueryEmailFind = "SELECT * FROM `members` WHERE `member_code` = \"$Key\" ";
        $Ex_QueryEmailFind = mysqli_query($mysqli,$QueryEmailFind);
        $NumOFResult = mysqli_num_rows($Ex_QueryEmailFind);
        $FetchEmailFind = mysqli_fetch_array($Ex_QueryEmailFind);
        $emailCheckAgain = $FetchEmailFind['email'];
        
        // استعلام البحث عن توفر الأيميل في قاعدة البيانات 
        $QueryCheckEmaiA = "SELECT * FROM `members` WHERE `email` = \"$emailCheckAgain\" and `Documentingemail` = \"1\" ";
        $Ex_QueryCheckEmaiA = mysqli_query($mysqli,$QueryCheckEmaiA);
        $NumOFResult = mysqli_num_rows($Ex_QueryCheckEmaiA);
        if($NumOFResult > 0){
        echo "<div class='alert alert-danger'><p>لقد انتهت صلاحية رابط التفعيل .</p></div>";   
        }else{
            $QueryUpdateMem = "UPDATE `members` SET `Documentingemail` = \"1\" WHERE `member_code` = \"$Key\" ";
            $Ex_QueryUpdateMem = mysqli_query($mysqli,$QueryUpdateMem);
                if($Ex_QueryUpdateMem){
                echo "<br><div class='alert alert-success'><p>لقد تم توثيق البريد الألكتروني الخاص بك بنجاح .</p></div>";  
                }    
            }
        

    
    }
    
    
    if($_POST['send'] and empty($Key)){
       $email = $_POST['email'];
       $email = secure_input($email,"text_input");
       $filtered = filter_var($email, FILTER_VALIDATE_EMAIL); // تصفية الأيميل
        
       if($filtered == true){// التأكد من ان البريد  الألكتروني  صحيح
            // استعلام البحث عن توفر الأيميل في قاعدة البيانات 
            $QueryEmailFind = "SELECT * FROM `members` WHERE email = \"$email\" ";
            $Ex_QueryEmailFind = mysqli_query($mysqli,$QueryEmailFind);
            $NumOFResult = mysqli_num_rows($Ex_QueryEmailFind);
            $FetchEmailFind = mysqli_fetch_array($Ex_QueryEmailFind);
            $CheckDocumentingemail = $FetchEmailFind['Documentingemail']; // حالة تفعيل الأيميل

            if($NumOFResult > 0 and $CheckDocumentingemail == 1){
            echo "<div class='alert alert-danger'><p>البريد الألكتروني مستعمل مسبقا .</p></div>"; 
            }
           
            if($NumOFResult == 0 || ($NumOFResult > 0 and $CheckDocumentingemail == 0)){
            
            $QueryUpdateMem = "UPDATE `members` SET `email` = \"$email\" WHERE `member_code` = \"$member_code\" ";
            $Ex_QueryUpdateMem = mysqli_query($mysqli,$QueryUpdateMem);
                
                if($Ex_QueryUpdateMem){
                  echo "<div class='alert alert-success'><p>تم ارسال رسالة التفعيل الى البريد الألكتروني .</p></div>";  
            /// ارسال الرسالة الى البريد الألكتروني 
            $url_website =  "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
            // متغيرات الدالة  
            $subject = "رابط التفعيل في موقع $namewebsite $namewebsiteen activiation URL"; 
            $message = "
            لإكمال التفعيل في موقع $namewebsite،يجب الضغط على الرابط التالي:
            $url_website?key=$member_code

            $namewebsiteen activation URL
            $url_website?key=$member_code
            "  ;
		    // الدالة mail 
            mail ("$email", "$subject" , "$message");
            /// End /// ارسال الرسالة الى البريد الألكتروني 
                }
                
            }
           
       }else{
       echo "<div class='alert alert-danger'><p>البريد الألكتروني الذي ادخلته خاطئ .</p></div>";
       }
        
    }
    ?>
    
    <?php if(empty($Key)){ ?>
    <form action="verify_email.php" method="post">
        <div class="form-group">
            <input class="form-control" value="" type="email" name="email" placeholder="من فضلك ادخل البريد الألكتروني لتصلك اشعارات الردود ..." />
        </div>
        <input class="btn btn-success" name="send" type="submit" value="ارسال رابط توثيق البريد الألكتروني" />
    </form>
      <?php } ?>
    
</div>
</div>

    
    
<?php
ob_end_flush();
include("footer.php"); // ادراج الفوتر
?>
 
 

 </body></html>