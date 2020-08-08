<?php 
	include("includes/connection.php");
 
	include('includes/function.php');

		$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';

		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone  =  $_POST['phone'];
		$address_line_1  =  $_POST['address_line_1'];
		$address_line_2  =  $_POST['address_line_2'];
		$city  =  $_POST['city'];
		$state  =  $_POST['state'];
		$country  =  $_POST['country'];
		$zipcode  =  $_POST['zipcode'];
		$user_image = $_POST['user_image'];		
		$id = $_POST['user_id'];
		
		if($_FILES['user_image']['name']!='')
        {

        	   $file_name= str_replace(" ","-",$_FILES['user_image']['name']);             
               $user_image=$file_name;
         
               //Main Image
               $tpath1='imagess/'.$user_image;       
               $pic1=compress_image($_FILES["user_image"]["tmp_name"], $tpath1, 80);           
               
               $user_image=$file_path.'imagess/'.$user_image;
        }
        else
        {
        	$user_image_url=$row['user_image'];
        }


		if($name!="")
		{
			mysqli_query($mysqli,"UPDATE tbl_users SET name ='$name' WHERE id = $id");
			 
		}

		if($_POST['email']!="")
		{
			mysqli_query($mysqli,"UPDATE tbl_users SET email ='$email' WHERE id = $id");
			 
		}

 	 	if($_POST['password']!="")
		{
			mysqli_query($mysqli,"UPDATE tbl_users SET password ='$password' WHERE id = $id");
		}

		if($_POST['address_line_1']!="")
		{
			mysqli_query($mysqli,"UPDATE tbl_users SET address_line_1 ='$address_line_1' WHERE id = $id");
		}

		if($_POST['address_line_2']!="")
		{
			mysqli_query($mysqli,"UPDATE tbl_users SET address_line_2 ='$address_line_2' WHERE id = $id");
		}

		if($_POST['city']!="")
		{
			mysqli_query($mysqli,"UPDATE tbl_users SET city ='$city' WHERE id = $id");
		}
		if($_POST['state']!="")
		{
			mysqli_query($mysqli,"UPDATE tbl_users SET state ='$state' WHERE id = $id");
		}
		if($_POST['country']!="")
		{
			mysqli_query($mysqli,"UPDATE tbl_users SET country ='$country' WHERE id = $id");
		}
		if($_POST['zipcode']!="")
		{
			mysqli_query($mysqli,"UPDATE tbl_users SET zipcode ='$zipcode' WHERE id = $id");
		}
		if($_FILES['user_image']['name']!='')
		{
			mysqli_query($mysqli,"UPDATE tbl_users SET user_image ='$user_image' WHERE id = $id");
		}

		
			
			$user_res = mysqli_query($mysqli,$user_edit);
			
			$qry1 = "SELECT * FROM tbl_users WHERE id = $id"; 
 	
			//$qry1 = "SELECT * FROM tbl_users WHERE id = '".$_POST['user_id']."'"; 
		    $result1 = mysqli_query($mysqli,$qry1);
		    $row1 = mysqli_fetch_assoc($result1);
 
			
			$set['response']->message = 'Updated successfully';
			$set['response']->code = 200;			 
			$set['update_user_profile']=array('user_id' => $row1['id'],'name'=>$row1['name'],
											'email'=>$row1['email'],'phone'=>$row1['phone'],
											'address_line_1'=>$row1['address_line_1'],
											'address_line_2'=>$row1['address_line_2'],						
											'city'=>$row1['city'],
											'state'=>$row1['state'],
											'country'=>$row1['country'],
											'zipcode'=>$row1['zipcode'],
											'user_image'=>$row1['user_image'],'msg'=>'Updated','success'=>'1');		 
	  				 
  

	header( 'Content-Type: application/json; charset=utf-8' );
	$json = json_encode($set);
	echo $json;
	exit;
	 
?>