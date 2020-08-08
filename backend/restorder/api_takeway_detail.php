<?php 
	include("includes/connection.php");
 
	include('includes/function.php');

	 	
		$qry = "SELECT * FROM tbl_takeaway_detail"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		 
 				$data = array(
 					
					'user_id'  => $_POST['user_id'],					
				    'title_name'  => $_POST['title_name'],				    
					'full_name'  =>  $_POST['full_name'],
					'mobile_number'  =>  $_POST['mobile_number'],
					'take_away_time'  =>  $_POST['take_away_time'],
					
					
					);		
 			 
			$qry = Insert('tbl_takeaway_detail',$data);									 
			
			$user_id=mysqli_insert_id($mysqli);									 
			
			$qry1 = "SELECT * FROM tbl_takeaway_detail WHERE id = '".$user_id."'"; 
		    $result1 = mysqli_query($mysqli,$qry1);
		    $row1 = mysqli_fetch_assoc($result1);
			
			$set['response']->message = 'Order successfully';
			$set['response']->code = 200;
			$set['order_delivery_detail']=array('user_id' => $row1['user_id'],'title_name'=>$row1['title_name'],'full_name'=>$row1['full_name'],'mobile_number'=>$row1['mobile_number'],'take_away_time'=>$row1['take_away_time']);
			
		//}

	  
 	 header( 'Content-Type: application/json; charset=utf-8');
     $json = json_encode($set);				
	 echo $json;
	 exit;
	 
?>