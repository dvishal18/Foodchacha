<?php include("includes/connection.php");
 
	include('includes/function.php');

	   $file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
	 	  
		$qry = "SELECT * FROM tbl_users WHERE email = '".$_POST['email']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
		//var_dump($qry);die();
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
		{
				$set['response']->message = 'Invalid email format';
				$set['response']->code = 404;
			
		}
		else if($row['email']!="")
		{
			$set['response']->message = 'Email address already exist';
				$set['response']->code = 409;
			
		}
		else
		{ 
 			 			 
               $file_name= str_replace(" ","-",$_FILES['user_image']['name']);             
               $user_image=$file_name;
         
               //Main Image
               $tpath1='imagess/'.$user_image;       
               $pic1=compress_image($_FILES["user_image"]["tmp_name"], $tpath1, 80);           
               
               $user_image_url=$file_path.'imagess/'.$user_image;

 				$data = array(
 					'user_type'=>'Normal',
					'id'  => $_POST['id'],					
				    'name'  => $_POST['name'],				    
					'email'  =>  $_POST['email'],
					'password'  =>  $_POST['password'],
					'phone'  =>  $_POST['phone'], 
					'address_line_1'  =>  $_POST['address_line_1'], 
					'address_line_2'  =>  $_POST['address_line_2'],
					'city'  =>  $_POST['city'],
					'state'  =>  $_POST['state'],
					'country'  =>  $_POST['country'],
					'zipcode'  =>  $_POST['zipcode'],
					'user_image'  =>  $user_image_url,					
					'status'  =>  '1'
					);		
 			 
			$qry = Insert('tbl_users',$data);									 
			
			$user_id=mysqli_insert_id($mysqli);									 
			
			$qry1 = "SELECT * FROM tbl_users WHERE id = '".$user_id."'"; 
		    $result1 = mysqli_query($mysqli,$qry1);
		    $row1 = mysqli_fetch_assoc($result1);
			
			$set['response']->message = 'Register successfully';
			$set['response']->code = 200;
			$set['register_detail']=array('user_id' => $row1['id'],
			'name'=>$row1['name'],
			'email'=>$row1['email'],
			'phone'=>$row1['phone'],
			'address_line_1'=>$row1['address_line_1'],
			'address_line_2'=>$row1['address_line_2'],
			'city'=>$row1['city'],
			'state'=>$row1['state'],
			'country'=>$row1['country'],
			'zipcode'=>$row1['zipcode'],
			'user_image'=>$row1['user_image'],
			'success'=>'1');
			
		}

	  
 	 header( 'Content-Type: application/json; charset=utf-8');
     $json = json_encode($set);				
	 echo $json;
	 exit;
	 
?>