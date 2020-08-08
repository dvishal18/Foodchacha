<?php
include_once('includes/connection.php');
global $mysqli;
if($_POST['type']=="price"){
	
	$data = mysqli_query($mysqli,"select * from tbl_menu_list where mid='".mysqli_real_escape_string($mysqli,$_POST['mid'])."'");
	
	$r=mysqli_fetch_assoc($data);
	
	echo json_encode($r);
}else if($_POST['type']=="updateprice"){
	if(!empty($_POST['spep'])){
	mysqli_query($mysqli,"update tbl_menu_list set special_price='".mysqli_real_escape_string($mysqli,(float)$_POST['menu_price']-(float)$_POST['spep'])."' where mid='".mysqli_real_escape_string($mysqli,$_POST['mid'])."'");
	}else{
		mysqli_query($mysqli,"update tbl_menu_list set special_price='".mysqli_real_escape_string($mysqli,$_POST['spep'])."' where mid='".mysqli_real_escape_string($mysqli,$_POST['mid'])."'");
	}
}

?>