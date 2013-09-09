<?php
header('Content-Type: text/html; charset=utf-8');
include_once('inc/db_con.php');
include_once('inc/functions.php');
$success = mysql_db_query($db,"INSERT INTO system VALUES('','".time()."','0')",$cn);
echo;()
	
?>