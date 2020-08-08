<?php include("includes/connection.php");
 
	include('includes/function.php');
		
		$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
 	 
 		$qry = "SELECT * FROM tbl_users WHERE status='1' and email = '".$_POST['email']."' and password = '".$_POST['password']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
    if ($num_rows > 0)
		{ 

				$cart_query="SELECT * FROM tbl_cart WHERE user_id = '".$row['id']."'";
				$cart_sql = mysqli_query($mysqli,$cart_query);
		        $cart_rowcount=mysqli_num_rows($cart_sql);
				
				$query="SELECT * FROM tbl_menu_list
						LEFT JOIN tbl_menu_category ON tbl_menu_category.cid= tbl_menu_list.cid
						WHERE special_price !=''";
				//var_dump($r);die;
				$count = mysqli_query($mysqli,$query);
				$promo_rowcount=mysqli_num_rows($count);
					 
			    
					$set['response']->message = 'Login successfully';
					$set['response']->code = 200;    
					$set['login_detail']=array('user_id' => $row['id'],
												'name'=>$row['name'],'email'=>$row['email'],
												'phone'=>$row['phone'],'address_line_1'=>$row['address_line_1'],
												'address_line_2'=>$row['address_line_2'],'city'=>$row['city'],
												'state'=>$row['state'],'country'=>$row['country'],
												'zipcode'=>$row['zipcode'],
												'user_image'=>$row['user_image'],
												'cart_items'=>$cart_rowcount,
												'promo_rowcount'=>$promo_rowcount,'success'=>'1');
			 
		}		 
		else
		{
				 $set['response']->message = 'Login failed';
				$set['response']->code = 404; 
 				
		}
	 

	header( 'Content-Type: application/json; charset=utf-8' );
	$json = json_encode($set);

	echo $json;
	 exit;
	 
?>