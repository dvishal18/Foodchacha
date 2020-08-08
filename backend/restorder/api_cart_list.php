<?php 
	include("includes/connection.php");
 
	include('includes/function.php');
  	
  	// $file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';

     function get_menu_image($menu_id)
     {
     	global $mysqli;
     	
		$file_path = $data1['menu_image'];

     	$query1="SELECT * FROM tbl_menu_list
				WHERE tbl_menu_list.mid='".$menu_id."'";

		$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());
		$data1 = mysqli_fetch_assoc($sql1);

		//return $file_path.$data1['menu_image'];
		return $file_path.'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/imagess/'.$data1['menu_image'];
     }


        $jsonObj= array();
		 
 
		$query="SELECT * FROM tbl_cart WHERE user_id = '".$_GET['user_id']."'";
		$sql = mysqli_query($mysqli,$query);
        $rowcount=mysqli_num_rows($sql);
		
		if($rowcount>0)
 		{
			while($data = mysqli_fetch_assoc($sql))
			{
				 
				$row['cart_id'] = $data['id'];
				$row['user_id'] = $data['user_id'];
				$row['rest_id'] = $data['rest_id'];
				$row['menu_id'] = $data['menu_id'];
				$row['menu_name'] = $data['menu_name'];
				$row['menu_image'] = get_menu_image($data['menu_id']);
				$row['menu_qty'] = $data['menu_qty'];
				$row['menu_price'] = $data['menu_price'];
				 
	  
				array_push($jsonObj,$row);
			
			}
			$set['response']->message = 'Cart item list';
			$set['response']->code = 200;
			//$set['response']->urlpath = $file_path.'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/imagess/';
			$set['cart_list'] = $jsonObj;
		}
		else
		{
			$set['response']->message = 'Cart Empty';
			$set['response']->code = 404;   
			
		}
 
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 
?>