<?php
header('Content-Type: text/html; charset=utf-8');

$success = mysql_db_query($db,"INSERT INTO system VALUES('','".time()."','0')",$cn);
	
?>