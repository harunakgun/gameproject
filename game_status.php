<?php
header('Content-Type: text/html; charset=utf-8');
include_once('inc/db_con.php');
include_once('inc/functions.php');
$results = mysql_db_query($db,'SELECT * FROM system WHERE ended_at=0 LIMIT 1',$cn);
$row = mysql_fetch_array($results);
$serverStarted = $row['started_at'];
$currentTime = time();

$passedSecs = $currentTime - $serverStarted;
$interval = 3;
$minutes = $passedSecs / $interval;

//NOW CONVERT THE MINUTES TO SECONDS
$totalSecs = ($minutes*60);
echo($totalSecs."<br>");

$monthToShow = date("F",$totalSecs);
$dayToShow = date("d",$totalSecs);
$yearToShow = (date("Y",$totalSecs)) - 70;
$hoursToShow = date("H:i",$totalSecs);
$date = $monthToShow." ".$dayToShow.", ".$yearToShow.", ".$hoursToShow;

echo $date;
?>