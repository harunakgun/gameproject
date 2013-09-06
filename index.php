<?php
include_once('inc/db_con.php');
$results = mysql_db_query($db,'SELECT * FROM raw_materials',$cn);
while($row = mysql_fetch_assoc($results)){
	var_dump($row);
}
?>