<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'business_2018use');    // DB username
define('DB_PASSWORD', 'AmP4Z1KQjA7v');    // DB password
define('DB_DATABASE', 'business_2018');      // DB name
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
?>