<?php include("includes/connection.php");
 
	include('includes/function.php');

 	 
 		$qry = "SELECT * FROM tbl_users WHERE status='1' and email = '".$_GET['email']."' and password = '".$_GET['password']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
    if ($num_rows > 0)
		{ 

				$cart_query="SELECT * FROM tbl_cart WHERE user_id = '".$row['id']."'";
				$cart_sql = mysqli_query($mysqli,$cart_query);
		        $cart_rowcount=mysqli_num_rows($cart_sql);
					 
			     //$set['login_detail'][]=array('user_id' => $row['id'],'name'=>$row['name'],'email'=>$row['email'],'phone'=>$row['phone'],'address'=>$row['address'],'user_image'=>$row['user_image'],'cart_items'=>$cart_rowcount,'success'=>'1');
					$set['response']->message = 'Login successfully';
					$set['response']->code = 200;    
					$set['login_detail']=array('user_id' => $row['id'],'name'=>$row['name'],'email'=>$row['email'],'phone'=>$row['phone'],'address'=>$row['address'],'user_image'=>$row['user_image'],'cart_items'=>$cart_rowcount,'success'=>'1');
			 
		}		 
		else
		{
				 
 				$set['login_detail']=array('msg' =>'Login failed','success'=>'0');
				//$set['login_detail'][]=array('msg' =>'Login failed','success'=>'0');
		}
	 

	header( 'Content-Type: application/json; charset=utf-8' );
	$json = json_encode($set);

	echo $json;
	 exit;
	 
?>