<?php
if (stristr(htmlentities($_SERVER['PHP_SELF']), "inc_config.php")) {
	die("<table style='padding: 2px; border: 1px solid #999; background-color: #EEE; font-family: Verdana; font-size: 10px;' align='center'><tr><td><b>Error:</b> This file cannot be opened directly!</td></tr></table>");
}

//===================================
//CONFIGURATION
//===================================

$db_type = "mysql"; //Type DB
$db_host = "localhost"; //MySQL Host
$db_user = ""; //MySQL Username
$db_pass = ""; //MySQL Password
$db_name = ""; //MySQL Database Name
?>
