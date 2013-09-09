<?php
header('Content-Type: text/html; charset=utf-8');
include_once('inc/db_con.php');
include_once('inc/functions.php');
$results = mysql_db_query($db,'SELECT * FROM system WHERE ended_at=0 LIMIT 1',$cn);
$row = mysql_fetch_array($results);
echo($row[0]['started_at']."-".$row['started_at']."#");

?>