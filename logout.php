<?php
session_start();
ob_start();
session_destroy();
include("include/config.php");
setcookie ($cookie_name_username, "", time() - 3600,"/");
setcookie ($cookie_name_password, "", time() - 3600,"/");
header('location:index.php')

?>