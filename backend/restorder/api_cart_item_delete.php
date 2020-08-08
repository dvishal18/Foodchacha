<?php include("includes/connection.php");
 
	include('includes/function.php');
 
 	 
 	Delete('tbl_cart','id='.$_GET['cart_id'].'');

	$set['response']->message = 'Item deleted successfully';
	$set['response']->code = 200;
	//$set['delete_cart_item']=array('success'=>'1');	 
	//$set['FOOD_APP'][]=array('msg'=>'Item Delete','success'=>'1');	 
 	  
	header( 'Content-Type: application/json; charset=utf-8' );
	$json = json_encode($set);
	echo $json;
	 exit;
	 
?>