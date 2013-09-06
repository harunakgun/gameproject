<?php
include_once('inc/db_con.php');
if($_GET['material_name'] && $_GET['material_name'] != ""){
	$last_insert = mysql_db_query($db,"INSERT INTO raw_materials VALUES('','".$_GET['material_name']."','0','0','0')",$cn);
	if($last_insert){
		echo($_GET['material_name'].'('.$last_insert.') succesfully inserted.<br>');
	}
}
?>
<form action="index.php">
	<input type="text" value="" name="material_name">
	<input type="submit" value="submit">
</form>
<?
$results = mysql_db_query($db,'SELECT * FROM raw_materials',$cn);
while($row = mysql_fetch_assoc($results)){
	echo($row['name']."<br>");
}
?>