<?php

$db="eco_mass";
$cn = mysql_connect("localhost", "root", "ha4518");
mysql_select_db($db, $cn);
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION = 'utf8-general-ci'");

?>