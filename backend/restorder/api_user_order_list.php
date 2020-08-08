<?php include("includes/connection.php");
 
	include('includes/function.php');
  	
  	 $file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';

     function get_restaurant_info($rest_id)
     {
     	global $mysqli;
     	$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';

     	$query1="SELECT * FROM tbl_restaurants WHERE tbl_restaurants.id='".$rest_id."'";

		$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());
		$data1 = mysqli_fetch_assoc($sql1);

		return $data1;
     }

     function get_menu_image($menu_id)
     {
     	global $mysqli;
     	$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';

     	$query1="SELECT * FROM tbl_menu_list WHERE tbl_menu_list.mid='".$menu_id."'";

		$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());
		$data1 = mysqli_fetch_assoc($sql1);

		return $file_path.'images/'.$data1['menu_image'];
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
				$row['order_address'] = $data['order_address'];
				$row['order_date'] = $data['order_date'];
 				$row['order_comment'] = $data['order_comment'];
 				$row['status'] = $data['status'];

 				$query1="SELECT * FROM tbl_order_items WHERE order_id = '".$data['order_unique_id']."'";
				$sql1 = mysqli_query($mysqli,$query1);

				while($data1 = mysqli_fetch_assoc($sql1))
				{
					$row['order_items'][]=array('rest_id'=>$data1['rest_id'],'rest_name'=>get_restaurant_info($data1['rest_id'])['restaurant_name'],'menu_id'=>$data1['menu_id'],'menu_image'=>get_menu_image($data1['menu_id']),'menu_name'=>$data1['menu_name'],'menu_qty'=>$data1['menu_qty'],'menu_price'=>$data1['menu_price'],'menu_total_price'=>$data1['menu_total_price']);
				}

 				  
				array_push($jsonObj,$row);
				
				unset($row['order_items']);
			}

			$set['user_order_list'] = $jsonObj;
		}
		else
		{
			$set['user_order_list'][]=array('msg'=>'No data found!','success'=>'0');
		}
 
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 
?>