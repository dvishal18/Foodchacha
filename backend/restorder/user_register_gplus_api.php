<?php 
		include("includes/connection.php");
 
		include('includes/function.php');
	 	 
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address_line_1 = $_POST['address_line_1'];
			$address_line_2 = $_POST['address_line_2'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$country = $_POST['country'];
			$zipcode = $_POST['zipcode'];
			$gplus_id = $_POST['gplus_id'];
			$user_image = $_POST['user_image'];
			
		$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
		  
		$qry = "SELECT * FROM tbl_users WHERE email = '".$_POST['email']."' or gplus_id = '".$_POST['gplus_id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
	   $count=mysqli_num_rows($result);
		
		
		 if($count == 1)
		{
			
			mysqli_query($mysqli,"UPDATE tbl_users SET name = '$name' ,
								email = '$email',phone = '$phone',
									address_line_1 = '$address_line_1',
									address_line_2 = '$address_line_2',
									city = '$city',
									state = '$state',
									country = '$country',
									zipcode = '$zipcode',
									gplus_id = '$gplus_id',
									user_image = '$user_image' WHERE gplus_id = '$gplus_id' ");

			
				$set['response']->message = 'successful update data';
				$set['response']->code = 200; 
				$set['gplus_register']=array('user_id' => $row['id'],
											'name'=>$row['name'],
											 'email'=>$row['email'],
											 'address_line_1'=>$row['address_line_1'],
											 'address_line_2'=>$row['address_line_2'],
											 'city'=>$row['city'],
											 'state'=>$row['state'],
											 'country'=>$row['country'],
											 'zipcode'=>$row['zipcode'],
											 'user_image'=>$row['user_image'],
											 'phone'=>$row['phone']);
		}
		 else  
		{
			
			 if($row['gplus_id']!='')
			{
				
				$set['response']=array('message'=>'Email address already exist');
			}
			else
			{ 
 			   $user_image_url=$_POST['user_image'];

 			   if($_POST['email']!='')
 				{
 					$email=$_POST['email'];
 					 
 				}
 				else
 				{
 					$email='';
 					 
 				}
 			   
 			   if($_POST['phone']!='')
 				{
  					$phone=$_POST['phone'];
 				}
 				else
 				{
 					$phone='';
 					
 				}
 			 
 				$data = array(
 					'user_type'=>'GPlus',											 
				   'name'  => $_POST['name'],				    
					'email'  =>   $_POST['email'],
					'address_line_1'  =>   $_POST['address_line_1'],
					'address_line_2'  =>   $_POST['address_line_2'],
					'city'  =>   $_POST['city'],
					'state'  =>   $_POST['state'],
					'country'  =>   $_POST['country'],
					'zipcode'  =>   $_POST['zipcode'],
					'phone'  =>   $_POST['phone'],
					'user_image'  =>   $_POST['user_image'],
					'gplus_id'  =>  $_POST['gplus_id'],					
 					'status'  =>  '1'
					);		
 			 
			$qry = Insert('tbl_users',$data);									 
						
			}
			
			$user_id=mysqli_insert_id($mysqli);									 
						
			$qry1 = "SELECT * FROM tbl_users WHERE id = '".$user_id."'"; 
		    $result1 = mysqli_query($mysqli,$qry1);
		    $row1 = mysqli_fetch_assoc($result1);
			
			$set['response']->message = 'Gplus Register successfully';
			$set['response']->code = 200;
			$set['gplus_register']=array('user_id' => $row1['id'],
										'name'=>$row1['name'],'email'=>$row1['email'],
										  'address_line_1'=>$row1['address_line_1'],'address_line_2'=>$row1['address_line_2'],
										  'city'=>$row1['city'],'state'=>$row1['state'],
										  'country'=>$row1['country'],'zipcode'=>$row1['zipcode'],
										  'user_image'=>$row1['user_image'],
										 'phone'=>$row1['phone']);
					
		}
	  
 	 header( 'Content-Type: application/json; charset=utf-8');
     $json = json_encode($set);				
	 echo $json;
	 exit;
	 
?>