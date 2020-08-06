<?php
$dbhost = "localhost:81";
$dbuser = "root";
$dbpass = "";
$dbname = "Classified_Db";
mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');
?>
