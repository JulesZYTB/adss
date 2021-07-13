<?php
    require('../admin/SendYamSMS.php');
?>
<html>
<head lang="ar-sa" dir="rtl">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>Fully featured textual message</title>
</head>
<body>
<div class="container">
 
    <div class="page-header">
        <h1>Sending Messages</h1>
    </div>
    <p class="lead">Send SMS.</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="send_form"
          class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Authentication</h4></div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="in_username" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="in_username" placeholder="Username" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="in_password" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="in_password" placeholder="Password"
                               name="password">
                    </div>
                </div>
            </div>
        </div>
        </form>
            <?php
    if(isset($_POST['submit'])){
        $number = $_POST['toInput'];
        $message = $_POST['textInput'];
        if(strlen($number) == 10 && substr($number, '05')){
            $phone =  preg_replace('/^0/', '966', $number);
        }elseif (substr($number, '00')){
            $phone =  preg_replace('/^00/', '', $number);           
        }elseif (substr($number, '+')){
            $phone =  preg_replace('/^+/', '', $number);         
        }
        SendYamSMS($number, $message);
    ?>
    	<div class="alert alert-success"> SMS sent <br /></div>
    <?php
    }
    ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Send message</h4></div>
            <div class="panel-body">
                <!--<div class="form-group">-->
                <!--    <label for="in_from" class="col-sm-2 control-label">Sender</label>-->

                <!--    <div class="col-sm-10">-->
                <!--        <input type="text" class="form-control" id="in_from" placeholder="Sender (Can be alphanumeric)"-->
                <!--               name="fromInput">-->
                <!--    </div>-->
                <!--</div>-->
                <div class="form-group">
                    <label for="in_to" class="col-sm-2 control-label">Phone number</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="in_to"
                               placeholder="Phone number in international format (example: 41793026727)" name="toInput">
                    </div>
                </div>
                <!--<div class="form-group">-->
                <!--    <label for="in_messageId" class="col-sm-2 control-label">Message ID</label>-->

                <!--    <div class="col-sm-10">-->
                <!--        <input type="text" class="form-control" id="in_messageId" placeholder="Message ID"-->
                <!--               name="messageIdInput">-->
                <!--    </div>-->
                <!--</div>-->
                <div class="form-group">
                    <label for="in_text" class="col-sm-2 control-label">Message text</label>

                    <div class="col-sm-10">
                <textarea type="text" class="form-control" id="in_text" required placeholder="Message text" name="textInput"
                          rows="4"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <input type="submit" value="Send SMS" name="submit" />
    </form>
    <hr>
</div>
</body>
</html>