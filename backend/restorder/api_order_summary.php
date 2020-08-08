<?php include("includes/connection.php");
 
	include('includes/function.php');
  	
  	 $file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';

     function get_menu_total_price($id)
     {
     	global $mysqli;
			
			
			$query1="SELECT * FROM tbl_order_items WHERE tbl_order_items.menu_total_price = '".$id."'";
			//var_dump($query1);die;
			$sql1 = mysqli_query($mysqli,$query1) or die(mysqli_error());
     	
		
		$data = mysqli_fetch_assoc($sql1);

		return $data;
     }

    
        $jsonObj= array();
		  
		$query="SELECT * FROM tbl_order_details WHERE user_id = '".$_GET['user_id']."' ORDER BY id DESC";
		$sql = mysqli_query($mysqli,$query);
        $rowcount=mysqli_num_rows($sql);
		
		if($rowcount>0)
 		{
			while($data = mysqli_fetch_assoc($sql))
			{
				 
				$row['order_id'] = $data['id'];
				$row['user_id'] = $data['user_id'];
				$row['order_unique_id'] = $data['order_unique_id'];
				$row['menu_total_price'] = get_menu_total_price($data['id']); 				
				$row['status'] = $data['status'];				
				
				array_push($jsonObj,$row);
				
			}

			$set['user_order_list'] = $jsonObj;
		}
		else
		{
			$set['user_order_list']=array('msg'=>'No data found!','success'=>'0');
			//$set['user_order_list'][]=array('msg'=>'No data found!','success'=>'0');
		}
 
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 
?>