<?php
header('Content-Type: text/html; charset=utf-8');
include_once('inc/db_con.php');
include_once('inc/functions.php');
$results = mysql_db_query($db,'SELECT * FROM system WHERE ended_at=0 LIMIT 1',$cn);
$row = mysql_fetch_array($results);
$serverStarted = $row['started_at'];
$currentTime = time();

$passedSecs = $currentTime - $serverStarted;
$interval = 5;
$minutes = $passedSecs / $interval;

$d = floor ($minutes / 1440);
$h = floor (($minutes - $d * 1440) / 60);
$m = $minutes - ($d * 1440) - ($h * 60);

echo "{$minutes}min converts to {$d}d {$h}h {$m}m";
?>