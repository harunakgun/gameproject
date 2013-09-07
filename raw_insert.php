<?php
header('Content-Type: text/html; charset=utf-8');
$dc_root = $_SERVER['DOCUMENT_ROOT'];

include_once('inc/db_con.php');
if($_POST['material_name'] && $_POST['material_name'] != "" && isset($_FILES["file"]["name"])){
	$success = mysql_db_query($db,"INSERT INTO raw_materials VALUES('','".$_POST['material_name']."','0','0','0')",$cn);
	if($success){
		$last_insert = mysql_insert_id();
		$filename = $_FILES["file"]["name"];
		$file_ext = explode('.',$_FILES["file"]["name"]);
		$file_ext = $file_ext[1];
		move_uploaded_file($_FILES["file"]["tmp_name"],$dc_root."media/raw_materials/" . $last_insert.'.'.$file_ext);
		echo($_POST['material_name'].'('.$last_insert.') succesfully inserted.<br>');
	}
}
?>
<form action="raw_insert.php" enctype="multipart/form-data" method="post">
	<input type="text" value="" name="material_name">
	<input type="file" name="file" id="file">
	<input type="submit" value="submit">
</form>
<?
$results = mysql_db_query($db,'SELECT * FROM raw_materials',$cn);
while($row = mysql_fetch_assoc($results)){
	$imgPath = "";
	if(file_exists($dc_root.'media/raw_materials/'.$row['id'].'.png')) {
		$imgPath = '/media/raw_materials/'.$row['id'].'.png';
	} elseif(file_exists($dc_root.'media/raw_materials/'.$row['id'].'.jpg')) {
		$imgPath = '/media/raw_materials/'.$row['id'].'.jpg';
	}
	echo("<div style='width:200px;height:64px;float:left;border:1px solid #ccc;'><div style='height:64px;width:64px;float:left;'><img src='".$imgPath."' /></div><div style='float:left;'>".$row['name']."</div></div>");
}
?>