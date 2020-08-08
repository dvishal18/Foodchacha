<?php 
	include("includes/connection.php");
 
	include('includes/function.php');

	 	  
		//$qry = "SELECT * FROM tbl_users WHERE email = '".$_POST['email']."'"; 
		//$qry = "SELECT * FROM tbl_order_delivery_detail WHERE email = '".$_POST['full_name']."'"; 
		$qry = "SELECT * FROM tbl_order_delivery_detail"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
		//var_dump($qry);die();
		/* if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
		{
				$set['response']->message = 'Invalid email format';
				$set['response']->code = 404;
			
		} */
		/* else if($row['full_name']!="")
		{
				$set['response']->message = 'full_name already exist';
				$set['response']->code = 409;
			
		} */
		//else
		//{ 
 			 			 
              
 				$data = array(
 					
					'user_id'  => $_POST['user_id'],					
				    'title_name'  => $_POST['title_name'],				    
					'full_name'  =>  $_POST['full_name'],
					'mobile_number'  =>  $_POST['mobile_number'],
					'state_id'  =>  $_POST['state_id'],
					'country_id'  =>  $_POST['country_id'],
					'address'  =>  $_POST['address'], 
					
					);		
 			 
			$qry = Insert('tbl_order_delivery_detail',$data);									 
			
			$user_id=mysqli_insert_id($mysqli);									 
			
			$qry1 = "SELECT * FROM tbl_order_delivery_detail WHERE id = '".$user_id."'"; 
		    $result1 = mysqli_query($mysqli,$qry1);
		    $row1 = mysqli_fetch_assoc($result1);
			
			$set['response']->message = 'Order successfully';
			$set['response']->code = 200;
			$set['order_delivery_detail']=array('user_id' => $row1['user_id'],'title_name'=>$row1['title_name'],'full_name'=>$row1['full_name'],'mobile_number'=>$row1['mobile_number'],'address'=>$row1['address'],'state_id'=>$row1['state_id'],'country_id'=>$row1['country_id'],);
			
		//}

	  
 	 header( 'Content-Type: application/json; charset=utf-8');
     $json = json_encode($set);				
	 echo $json;
	 exit;
	 
?>