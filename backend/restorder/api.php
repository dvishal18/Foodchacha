<?php include("includes/connection.php");
 	  include("includes/function.php"); 	
	
	$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
 	 
if(isset($_GET['cat_list']))
{
 		$jsonObj= array();
		
		$query="SELECT * FROM tbl_category
		LEFT JOIN tbl_rating ON tbl_rating.menu_id= tbl_category.cid
		WHERE tbl_category.status='1' ORDER BY tbl_category.rate_avg DESC, tbl_category.total_rate DESC";
		
		
		$sql = mysqli_query($mysqli,$query);

		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['cid'] = $data['cid'];
			$row['category_name'] = $data['category_name'];
			$row['category_image'] = $file_path.'imagess/'.$data['category_image'];
			$row['total_rate'] = $data['total_rate'];
			$row['rate_avg'] = $data['rate_avg'];
			
			$r = mysqli_query($mysqli,"select count(*) from tbl_menu_list WHERE tbl_menu_list.cid='".$data['cid']."'");
				
			$total_count = mysqli_fetch_assoc($r);
			
			$row['count'] = $total_count['count(*)'];
			
			array_push($jsonObj,$row);
		
		}
		
		
			$set['message'] = 'successful get data';
			$set['code'] = 200;    
			$set['menucategory_list'] = $jsonObj;
		
			
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//slider_list start	
else if(isset($_GET['slider_list']))
{
       
 		$jsonObj= array();
					
		$cat_order=API_CAT_ORDER_BY;
				
		$query="SELECT * FROM tbl_banner_ad LIMIT 5";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
				
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['banner_name'] = $data['banner_name'];
			$row['banner_desc'] = $data['banner_desc'];
			$row['banner_name_imagepath'] = $file_path.'imagess/'.$data['banner_image'];
			
			array_push($jsonObj,$row);
		
		}
		
			
			$reponseobj['response']->message = 'successful get data';
			$reponseobj['response']->code = 200;    
					
			$reponseobj['slider_list'] =$jsonObj;
			
		    header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}	
//slider_list end
//payment successfully strat
//payment successfully strat
else if(isset($_REQUEST['payment_detail']))
{
function get_order_unique_id()
{

			$random_id_length = 12; 

			$rnd_id = crypt(uniqid(rand(),1)); 
		
			$rnd_id = strip_tags(stripslashes($rnd_id)); 

			$rnd_id = str_replace(".","",$rnd_id); 

			$rnd_id = strrev(str_replace("/","",$rnd_id)); 

			$rnd_id = substr($rnd_id,0,$random_id_length); 

			 return $rnd_id;
}

		$order_unique_id= get_order_unique_id();


		$data = file_get_contents("php://input");
		$final_data2 = json_decode($data,true);

		 $cart_id = $final_data2['cart_id'];
        $user_id =  $final_data2['user_id'] ;
        $menu_id =  $final_data2['menu_id'] ;
		$total_price = $final_data2['total_price'];
		$payment_id =  $final_data2['payment_id'] ;
		$payment_type =  $final_data2['payment_type'] ;
		$menu_qty =  $final_data2['menu_qty'] ;
		$order_id=$order_unique_id;
		
		$valuesArr = array();
		
  		

		$cart_id=implode(',',array_values($cart_id));
	
		$menu_id=implode(',',array_values($menu_id));

		$menu_qty=implode(',',array_values($menu_qty));

		//print_r($menu_qty);	
		$cart=explode(',',$cart_id);
		$menu=explode(',',$menu_id);
		$menu_quantity=explode(',',$menu_qty);
		unset($data);

		foreach($cart as $id)
		{
			
			unset($data);
			Delete('tbl_cart',"WHERE id = '".$id."'");
		}
		//echo $menu_quantity;die();
		for ($i = 0; $i < sizeof($menu); $i++) {
			unset($data);
			
			$query="SELECT * FROM tbl_menu_list WHERE mid = $menu[$i]";		
			$sql = mysqli_query($mysqli,$query)or die(mysql_error());
			$result1=mysqli_query($mysqli,$qry1);
			$row1=mysqli_fetch_assoc($result1);
			
			while($data = mysqli_fetch_assoc($sql))
			{
				//$order_unique_id= get_order_unique_id();
				$menu_name = $data['menu_name'];				
				$menu_image = $data['menu_image'];
				$menu_price = $data['menu_price'];
			
				$data = array(

				'user_id' => $user_id,			 
				'order_unique_id' => $order_unique_id,
				
				'total_price' => $total_price,
				'menu_id' => $data['mid'],
				'menu_qty' => $menu_quantity[$i],
				'menu_name' => $data['menu_name'],
				'menu_price' => $data['menu_price'],
				'menu_image' => $data['menu_image'],

				);
				$qry = Insert('tbl_order_details',$data);

			}
			
		}
		// die();
		// foreach($menu as $id)
		// {
			
		// 	unset($data);
			
		// 	$query="SELECT * FROM tbl_menu_list WHERE mid = $id";		
		// 	$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		// 	$result1=mysqli_query($mysqli,$qry1);
		// 	$row1=mysqli_fetch_assoc($result1);
			
		// 	while($data = mysqli_fetch_assoc($sql))
		// 	{
		// 		//$order_unique_id= get_order_unique_id();
		// 		$menu_name = $data['menu_name'];				
		// 		$menu_image = $data['menu_image'];
		// 		$menu_price = $data['menu_price'];
			
		// 		$data = array(

		// 		'user_id' => $user_id,			 
		// 		'order_unique_id' => $order_unique_id,
				
		// 		'total_price' => $total_price,
		// 		'menu_id' => $data['mid'],
		// 		'menu_name' => $data['menu_name'],
		// 		'menu_price' => $data['menu_price'],
		// 		'menu_image' => $data['menu_image'],

		// 		);
		// 		$qry = Insert('tbl_order_details',$data);

		// 	}
		// }	
				$sql = "INSERT INTO tbl_payment(order_id,cart_id, user_id, menu_id, total_price, payment_id,payment_type,menu_qty) values 
							('".$order_id."','".$cart_id."', '".$user_id."', '".$menu_id."','".$total_price."','".$payment_id."','".$payment_type."','".$menu_qty."')";
				  mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
				  
				//  var_dump($sql);die();
   				$set['message'] = 'Payment successfully' ;
				$set['code'] = 200;
	
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//payment successfully end
else if(isset($_REQUEST['order_detaillist']))
{
	
   function get_tax_price()
     {
     	global $mysqli;
     	
     	$query1="SELECT * FROM tbl_tex";

		$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());
		$data1 = mysqli_fetch_assoc($sql1);

		return $data1['tex_price'];
     }

		$jsonObj= array();
  
		//$query="SELECT * FROM tbl_payment WHERE order_id = '".$_POST['order_detaillist']."' ORDER BY id DESC";
		$query="SELECT * FROM tbl_payment
				LEFT JOIN tbl_order_details ON tbl_order_details.order_unique_id= tbl_payment.order_id
				WHERE tbl_payment.order_id='".$_POST['order_detaillist']."' 
				ORDER BY tbl_payment.order_id DESC";
		//var_dump($query);
		$sql = mysqli_query($mysqli,$query);
        $rowcount=mysqli_num_rows($sql);
		
		if($rowcount>0)
 		{
			while($data = mysqli_fetch_assoc($sql))
			{
			 
			
				$row['order_unique_id'] = $data['order_unique_id'];
				
				$row['order_date'] = $data['order_date'];			
 				$row['status'] = $data['status'];
				$row['total_price'] = $data['total_price'];
				$row['menu_id'] = $data['menu_id'];
				$row['menu_name'] = $data['menu_name'];
				$row['menu_price'] = $data['menu_price'];
				$row['menu_qty'] = $data['menu_qty'];
				
				$row['menu_image'] = $file_path.'imagess/'.$data['menu_image'];
				$row['tax'] = get_tax_price();
				
				array_push($jsonObj,$row);
			}
			
			$set['message'] = 'successfully get data';
			$set['code'] = 200;
			$set['order_list'] = $jsonObj;
		}
		else
		{
			$set['message'] = 'No data found';
			$set['code'] = 404;
			
		}
 
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//api_cart_add_update Start
else if(isset($_REQUEST['api_cart_add_update']))
{
		$qry = "SELECT * FROM tbl_cart WHERE user_id = '".$_REQUEST['user_id']."' AND menu_id = '".$_REQUEST['menu_id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$rowcount=mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
 	  	
 	 if($rowcount>0)
 	 {		
 	 		$data = array(
  			'menu_qty'  =>  $_REQUEST['menu_qty'] ,
			'menu_price'  =>  $_REQUEST['menu_price'] 
			);
		 
		
		 if($_REQUEST['menu_qty'] == 0)
		 {

			 Delete('tbl_cart',"WHERE user_id = '".$_REQUEST['user_id']."' AND menu_id = '".$_REQUEST['menu_id']."'");
						
			$cart_query="SELECT * FROM tbl_cart WHERE user_id = '".$_REQUEST['user_id']."'";
			$cart_sql = mysqli_query($mysqli,$cart_query);
	        $cart_rowcount=mysqli_num_rows($cart_sql);
			
			 $set['response']->message = 'Item Deleted successfully';
			 $set['response']->code = 200;
			 $set['add_cart']=array('cart_items'=>$cart_rowcount,'success'=>'1');	
			 
		 }
		 else
		 {
		 
			$user_edit=Update('tbl_cart', $data, "WHERE user_id = '".$_REQUEST['user_id']."' AND menu_id = '".$_REQUEST['menu_id']."'");

			$cart_query="SELECT * FROM tbl_cart WHERE user_id = '".$_REQUEST['user_id']."'";
			$cart_sql = mysqli_query($mysqli,$cart_query);
	        $cart_rowcount=mysqli_num_rows($cart_sql);
			
			$set['response']->message = 'Item Updated successfully';
			$set['response']->code = 200;
			$set['add_cart']=array('cart_items'=>$cart_rowcount,'success'=>'1');	 
		 }
 	 }
		
 	 else
 	 {
 	 		$data = array(
			'user_id'  =>  $_REQUEST['user_id'],					 
			'menu_id'  =>  $_REQUEST['menu_id'],
 			'menu_name'  =>  $_REQUEST['menu_name'],
 			'menu_qty'  =>  $_REQUEST['menu_qty'],
 			'menu_price'  =>  $_REQUEST['menu_price']
			);
		 
			$qry = Insert('tbl_cart',$data);

			$cart_query="SELECT * FROM tbl_cart WHERE user_id = '".$_REQUEST['user_id']."'";
			$cart_sql = mysqli_query($mysqli,$cart_query);
	        $cart_rowcount=mysqli_num_rows($cart_sql);
			
			$set['response']->message = 'Item added successfully';
			$set['response']->code = 200;
			$set['add_cart']=array('cart_items'=>$cart_rowcount,'success'=>'1');	
							
 	 } 
	
	header( 'Content-Type: application/json; charset=utf-8' );
	$json = json_encode($set);
	echo $json;
	 exit;
	 
}
//api_cart_add_update end

//menu_list_cat_detail_id start
else if(isset($_GET['menu_list_cat_detail_id']))
{		  
		
		
	    $query="SELECT * FROM tbl_cart WHERE tbl_cart.user_id='".$_GET['menu_list_cat_detail_id']."' AND tbl_cart.menu_id='".$_GET['menu_id']."' AND tbl_cart.menu_id='".$_GET['menu_id']."'				
				ORDER BY tbl_cart.menu_id DESC";
				
		//$query="SELECT * FROM tbl_comment LEFT JOIN tbl_users ON tbl_users.id= tbl_comment.user_id WHERE tbl_comment.menu_id='".$_GET['menu_id']."'";
				
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
		
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['menu_name'] = $data['menu_name'];
			
			$row['menu_price'] = $data['menu_price'];
			$row['menu_qty'] = $data['menu_qty'];
						
			$r = mysqli_query($mysqli,"select count(*) from tbl_cart WHERE tbl_cart.user_id='".$_GET['menu_list_cat_detail_id']."'");
						
			$total_count = mysqli_fetch_assoc($r);
			
			$row['count'] = $total_count['count(*)'];
			
			array_push($row);
		
		}
		
		
		$jsonObj0= array();	
		
		$query1="SELECT * FROM tbl_comment
			LEFT JOIN tbl_users ON tbl_users.id= tbl_comment.user_id
			WHERE tbl_comment.menu_id='".$_GET['menu_id']."'";
				
			$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());
			
			while($data = mysqli_fetch_assoc($sql1))
		{
			$row1['c_id'] = $data['c_id'];
			$row1['comment'] = $data['comment']; 
			$row1['name'] = $data['name']; 
			$row1['user_id'] = $data['user_id']; 			
			 		
			array_push($jsonObj0,$row1);
		
		}
			$set['response']->message = 'successful get data';
			$set['response']->code = 200; 
			
			if(!empty($row))
			{
				$set['menu_list_cat'] =$row;
			}
			else
			{
				
				$set['response']->message = 'No Data Found';
				$set['response']->code = 404;
				$set['menu_comment'] =$jsonObj0;
			}
			//$set['menu_list_cat'] =$row;
			$set['menu_comment'] =$jsonObj0;
			
			
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
 
}
//menu_list_cat_detail_id end

//api_cart_item_delete start
else if(isset($_REQUEST['api_cart_item_delete']))
{
	Delete('tbl_cart','id='.$_REQUEST['cart_id'].'');

	$cart_query="SELECT * FROM tbl_cart WHERE user_id = '".$_REQUEST['user_id']."'";
	$cart_sql = mysqli_query($mysqli,$cart_query);
	$cart_rowcount=mysqli_num_rows($cart_sql);
	
	$set['response']->message = 'Item deleted successfully';
	$set['response']->code = 200;
	$set['response']-> count=$cart_rowcount;
	
	header( 'Content-Type: application/json; charset=utf-8' );
	$json = json_encode($set);
	echo $json;
	 exit;
	 
}	
//api_cart_item_delete end

//api_cart_item_list start
else if(isset($_REQUEST['getCartList']))
{		  
			
	function get_menu_image($menu_id)
     {
     	global $mysqli;
     	
		$file_path = $data1['menu_image'];

     	$query1="SELECT * FROM tbl_menu_list
				WHERE tbl_menu_list.mid='".$menu_id."'";

		$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());
		$data1 = mysqli_fetch_assoc($sql1);

		
		return $file_path.'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/imagess/'.$data1['menu_image'];
     }
	 function get_menu_price($menu_id)
     {
     	global $mysqli;
     	
     	$query1="SELECT * FROM tbl_menu_list
				WHERE tbl_menu_list.mid='".$menu_id."'";

		$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());
		$data1 = mysqli_fetch_assoc($sql1);

		return $data1['menu_price'];
     }
	 function get_tax_price()
     {
     	global $mysqli;
     	
     	$query1="SELECT * FROM tbl_tex";

		$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());
		$data1 = mysqli_fetch_assoc($sql1);

		return $data1['tex_price'];
     }

        $jsonObj= array();
 
		$query="SELECT * FROM tbl_cart WHERE user_id = '".$_REQUEST['user_id']."'";
		$sql = mysqli_query($mysqli,$query);
        $rowcount=mysqli_num_rows($sql);
		
		if($rowcount>0)
 		{
			while($data = mysqli_fetch_assoc($sql))
			{
				 
				$row['cart_id'] = $data['id'];
				$row['user_id'] = $data['user_id'];
				$row['menu_id'] = $data['menu_id'];
				$row['menu_name'] = $data['menu_name'];
				$row['menu_image'] = get_menu_image($data['menu_id']);
				$row['base_price'] = get_menu_price($data['menu_id']);
				
				$row['menu_qty'] = $data['menu_qty'];
				$row['menu_price'] = $data['menu_price'];
				 
	  
				array_push($jsonObj,$row);
			
			}
			$set['message'] = 'Cart item list';
			$set['code'] = 200;
			$set['tax'] = get_tax_price();
			
			$set['cart_list'] = $jsonObj;
		}
		else
		{
			$set['message'] = 'Cart Empty';
			$set['code'] = 404;   
			
		}
 
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//api_cart_item_list end

//api promo start
else if(isset($_GET['promo_code']))
{
       
 		$jsonObj= array();
							
		$query="SELECT * FROM tbl_promo";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
				
		while($data = mysqli_fetch_assoc($sql))
		{
	
			$row['promo_value'] = $data['promo_code'];
			$row['promo_percentage'] = $data['promo_percentage'];
			$row['promo_title'] = $data['promo_title'];
			$row['promo_desc'] = $data['promo_desc'];
			$row['promo_policy'] = $data['promo_policy'];
						
			array_push($jsonObj,$row);
					
		}
		
			$reponseobj['message'] = 'successful get data';
			$reponseobj['code'] = 200;    					
			$reponseobj['promo_code'] =$jsonObj;
			
		    header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//api promo end

//api promo_apply start
else if(isset($_GET['promo_code_apply']))
{      

	$total_cart_total = $_GET['total_cart_total'];
 	//$jsonObj= array();
	$today_date = date('Y-m-d');
	
	$query="SELECT * FROM tbl_promo WHERE promo_code = '".$_GET['promo_code_apply']."'";
		
	$sql = mysqli_query($mysqli,$query)or die(mysql_error());
	$num_rows = mysqli_num_rows($sql);
	$data = mysqli_fetch_assoc($sql);
	
	 if ($num_rows > 0)
	{ 
		if($data['status'] == 1)
		{
			if ($data['promo_start_date'] <= $today_date && $data['promo_end_date'] >= $today_date) 
			{
				
				$querydd = mysqli_query($mysqli,"select SUM(menu_total_price)as total from tbl_order_items where order_id = '".$_GET['order_id']."'");
					
					if($r = mysqli_fetch_assoc($querydd))
					{
						$new = ($r['total']*$data['promo_percentage'])/100;
						$ll = $r['total']-$new;
						mysqli_query($mysqli,"update tbl_order_details set total_price = '".$ll."',promo_code_apply='".$data['id']."' where order_unique_id='".$_GET['order_id']."'");
					}
	
					$row['promo_code'] = $data['promo_code'];
					$row['promo_percentage'] = $data['promo_percentage'];
					$row['promo_title'] = $data['promo_title'];
				
					if($total_cart_total >= $data['minimum_value'] )
					{
						$reponseobj['message'] = 'apply coupan';
						$reponseobj['code'] = 200; 
					}
					else
					{
						
						$reponseobj['message'] = 'Not apply coupan';
						$reponseobj['code'] = 404;    	
					}
					
								
					//array_push($jsonObj,$row);
					array_push($row);
					
					$reponseobj['message'] = 'successful apply coupan';
					$reponseobj['code'] = 200;    					
					$reponseobj['promo_code_apply'] =$row;
			}
			else
			{
				$reponseobj['message'] = 'Coupan is out of date ';
				$reponseobj['code'] = 404;    					
			}
			
		}	
		else		
		{
    		$reponseobj['message'] = 'Coupan is not active';
			$reponseobj['code'] = 404;    					
		}
	}
	else
	{
			$reponseobj['message'] = 'Coupan is not available';
			$reponseobj['code'] = 404;
	}
	
		header( 'Content-Type: application/json; charset=utf-8' );	
		echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//api promo_apply end

//api oreder summary start
else if(isset($_GET['order_summary']))
{

		$jsonObj= array();
		  
		$query="SELECT * FROM tbl_payment WHERE user_id = '".$_GET['order_summary']."' ORDER BY id DESC";
		//var_dump($query);
		$sql = mysqli_query($mysqli,$query);
        $rowcount=mysqli_num_rows($sql);
		
		if($rowcount>0)
 		{
			while($data = mysqli_fetch_assoc($sql))
			{
			 
				
			
				$row['order_id'] = $data['order_id'];
				
 				$row['status'] = $data['status'];
				$row['total_price'] = $data['total_price'];
				
				
				array_push($jsonObj,$row);
			}
			
			$set['message'] = 'successfully get data';
			$set['code'] = 200;
			$set['user_order_list'] = $jsonObj;
		}
		else
		{
			$set['message'] = 'No data found';
			$set['code'] = 404;
			
		}
 
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//api order summary end

//api menu multiple image start
else if(isset($_GET['menu_multiple_image']))
{		  
				 
		$jsonObj0= array();	
		
	  
		$query="SELECT * FROM tbl_menu_image
		LEFT JOIN tbl_menu_list ON tbl_menu_list.mid= tbl_menu_image.mid
		WHERE tbl_menu_image.mid='".$_GET['menu_multiple_image']."'";
				
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$row['mid'] = $data['mid'];
			$row['items_images'] = $file_path.'imagess/'.$data['menu_image_cat'];
			
			array_push($jsonObj0,$row);
		
		}
		
		
			$set['message'] = 'successful get data';
			$set['code'] = 200; 
									
			$set['menu_multiple_image'] =$jsonObj0;
			
			
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
 
}
//api menu multiple image end


//menu veg list type start
else if(isset($_GET['menu_veg_list']))
{		  
				 
		$jsonObj0= array();	
		
		$query="SELECT * FROM tbl_menu_list
				LEFT JOIN tbl_menu_category ON tbl_menu_category.cid= tbl_menu_list.cid
				WHERE tbl_menu_list.cid='".$_GET['menu_veg_list']."' AND  menu_type='veg' ORDER BY tbl_menu_list.mid DESC";
				
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$row['mid'] = $data['mid'];
			$row['menu_name'] = $data['menu_name'];
			$row['menu_info'] = $data['menu_info'];
			$row['menu_price'] = $data['menu_price'];
			$row['total_rate'] = $data['total_rate'];
			$row['rate_avg'] = $data['rate_avg'];
			$row['menu_weight'] = $data['menu_weight'];
			$row['menu_type'] = $data['menu_type'];
			$row['menu_image'] = $file_path.'imagess/'.$data['menu_image'];
			
			array_push($jsonObj0,$row);
		
		}
		
			$set['message'] = 'successful get data';
			$set['code'] = 200; 
									
			$set['menu_type_list'] =$jsonObj0;
			
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
 
}

//menu veg list type and

//menu_list_cat_id start
else if(isset($_GET['menu_list_cat_id']))
{		  
				 
		$jsonObj0= array();	
		$jsonObj1= array();	
	
	    $query="SELECT * FROM tbl_menu_list
				LEFT JOIN tbl_menu_category ON tbl_menu_category.cid= tbl_menu_list.cid
				WHERE tbl_menu_list.cid='".$_GET['menu_list_cat_id']."' 
				ORDER BY tbl_menu_list.mid DESC";
				
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$row['mid'] = $data['mid'];
			$row['menu_name'] = $data['menu_name'];
			$row['menu_info'] = $data['menu_info'];
			$row['menu_price'] = $data['menu_price'];
			$row['total_rate'] = $data['total_rate'];
			$row['rate_avg'] = $data['rate_avg'];
			$row['menu_weight'] = $data['menu_weight'];
			$row['menu_type'] = $data['menu_type'];
			$row['menu_image'] = $file_path.'imagess/'.$data['menu_image'];
			
			array_push($jsonObj0,$row);
		
		}
		//$row['menu_list_cat']=$jsonObj0;
		
		
		$query1="SELECT * FROM tbl_cart WHERE user_id='".$_GET['user_id']."'";
				
		$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());
		
		while($data = mysqli_fetch_assoc($sql1))
		{
			
			$row1['menu_id'] = $data['menu_id'];
			
			array_push($jsonObj1,$row1);
		
		}
				
			$set['message'] = 'successful get data';
			$set['code'] = 200; 
									
			$set['menu_list_cat'] =$jsonObj0;
			$set['menu_cart'] =$jsonObj1;
			
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
 
}
//menu_list_cat_id end

 //api like  start
else if(isset($_GET['like']))
{
	mysqli_query($mysqli,"insert into tbl_like(menu_id,user_id) values('".mysqli_real_escape_string($mysqli,$_POST['menu_id'])."','".mysqli_real_escape_string($mysqli,$_POST['user_id'])."')");
	
	$qry = "SELECT * FROM tbl_like WHERE menu_id = '".$_REQUEST['menu_id']."'";
	
	$result = mysqli_query($mysqli,$qry);
	$rowcount=mysqli_num_rows($result);
	
	$set['response']->message = 'successful get data';
	$set['response']->code = 200; 
	
	$set['count'] = $rowcount;
		
	header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
	die();

}
//api like  end

//api get like start
else if(isset($_REQUEST['get_like']))
{
	
	$qry = "SELECT * FROM tbl_like WHERE menu_id = '".$_REQUEST['menu_id']."'";
	$qry1 = "SELECT * FROM tbl_like WHERE menu_id = '".$_REQUEST['menu_id']."' AND user_id = '".$_REQUEST['user_id']."'";
  
	$result = mysqli_query($mysqli,$qry);	
	$result1 = mysqli_query($mysqli,$qry1);
	$rowcount=mysqli_num_rows($result);
	
	$isLiked = false;
	while($data = mysqli_fetch_assoc($result1))
	{
		
		if($_REQUEST['user_id'] == $data['user_id'])
		{
			$isLiked = true;
		}
		
	}
	
	$set['message'] = 'successful get data';
	$set['code'] = 200; 
	$set['isLiked'] = $isLiked; 
	$set['getlike_list_count'] = $rowcount;
		
	header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
	die();

}
//api get like end

//api unlike  start
else if(isset($_GET['unlike']))
{
	mysqli_query($mysqli,"delete from tbl_like where menu_id='".mysqli_real_escape_string($mysqli,$_POST['menu_id'])."' and user_id='".mysqli_real_escape_string($mysqli,$_POST['user_id'])."'");
	$qry = "SELECT * FROM tbl_like WHERE menu_id = '".$_REQUEST['menu_id']."'";
	
	$result = mysqli_query($mysqli,$qry);
	$rowcount=mysqli_num_rows($result);
	$set['response']->message = 'successful get data';
	$set['response']->code = 200; 
	$set['count'] = $rowcount;
		
	header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
	die();

}
//api unlike  end

//api comment start
else if(isset($_GET['comment']))
{
	mysqli_query($mysqli,"insert into tbl_comment(comment,user_id,menu_id,mid,crt_date) values('".mysqli_real_escape_string($mysqli,$_POST['comment'])."','".mysqli_real_escape_string($mysqli,$_POST['user_id'])."','".mysqli_real_escape_string($mysqli,$_POST['menu_id'])."','".mysqli_real_escape_string($mysqli,$_POST['mid'])."','".time()."')");
		
	$r = mysqli_query($mysqli,"select count(*)as count from tbl_comment where menu_id='".mysqli_real_escape_string($mysqli,$_POST['menu_id'])."'");
	
	$count = mysqli_fetch_assoc($r);
	
	$set['response']->message = 'comment added successfully ';
	$set['response']->code = 200; 
	$set['comment_list'] = $count;
		
	header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
	die();
}
//api comment end


//start search
 else if(isset($_GET['get_search_menu']))
  {	
  		$jsonObj= array();	

		$query="SELECT * FROM tbl_menu_list WHERE menu_name like '%".$_GET['get_search_menu']."%' ";
		$sql = mysqli_query($mysqli,$query);
		
		if(mysqli_num_rows($sql)>0)
		{

				while($data = mysqli_fetch_assoc($sql))
				{
					$row['mid'] = $data['mid'];
					$row['menu_name'] = $data['menu_name'];
					$row['menu_info'] = $data['menu_info'];
					$row['menu_type'] = $data['menu_type'];
					$row['menu_image'] = $file_path.'imagess/'.$data['menu_image'];
					$row['menu_price'] = $data['menu_price'];
					$row['total_rate'] = $data['total_rate'];
					$row['rate_avg'] = $data['rate_avg'];

					$row['menu_weight'] = $data['menu_weight'];

					array_push($jsonObj,$row);
					
				
				}
				$set['message'] = 'successful get data';
				$set['code'] = 200;
				$set['menu_search'] = $jsonObj;
				 
		}
		else
		{
				$set['message'] = 'No item Found! Try Different Keyword';
				$set['code'] = 404;
			    
		}

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
  }
//end serch

//user profile api start
 else if(isset($_GET['get_user_profile']))
  {
  		$qry = "SELECT * FROM tbl_users WHERE id = '".$_GET['get_user_profile']."'"; 
		$result = mysqli_query($mysqli,$qry);
		 
		$row = mysqli_fetch_assoc($result);
	  	
		$set['message'] = 'successful get data';
		$set['code'] = 200;   
	   $set['get_user_profile']=array('user_id' => $row['id'],
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


	    header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
  }

//user profile api end
else if(isset($_GET['about_us_detail']))
{
       
 		$jsonObj= array();
					
		
		$query="SELECT * FROM tbl_aboutus";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
				
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['about_desc'] = $data['about_desc'];
						
			array_push($row);
			//array_push($jsonObj,$row);
		
		}
		
			$reponseobj['message'] = 'successful get data';
			$reponseobj['code'] = 200;    				
			$reponseobj['about_us_detail'] =$row;
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}


//order delvery status start
else if(isset($_GET['orderdelivery_detail']))
{
    
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
		  
		$query="SELECT * FROM tbl_order_details WHERE user_id = '".$_GET['orderdelivery_detail']."' ORDER BY id DESC";
		$sql = mysqli_query($mysqli,$query);
        $rowcount=mysqli_num_rows($sql);
		
		if($rowcount>0)
 		{
			while($data = mysqli_fetch_assoc($sql))
			{
			 
				$row['order_id'] = $data['id'];
				$row['user_id'] = $data['user_id'];
				$row['order_unique_id'] = $data['order_unique_id'];
				
				$row['order_date'] = $data['order_date'];
 			
 				$row['status'] = $data['status'];

 				$query1="SELECT * FROM tbl_order_items WHERE order_id = '".$data['order_unique_id']."'";
				$sql1 = mysqli_query($mysqli,$query1);

				while($data1 = mysqli_fetch_assoc($sql1))
				{
					$row['order_items']=array
					(					
					'menu_id'=>$data1['menu_id'],
					'menu_image'=>get_menu_image($data1['menu_id']),
					'menu_name'=>$data1['menu_name'],
					'menu_qty'=>$data1['menu_qty'],
					'menu_price'=>$data1['menu_price'],
					'menu_total_price'=>$data1['menu_total_price']);

				}
				  
				array_push($jsonObj,$row);
				
				unset($row['order_items']);
			}
			$set['message'] = 'successfully get data';
			$set['code'] = 200;
			$set['user_order_list'] = $jsonObj;
		}
		else
		{
			$set['message'] = 'No data found';
			$set['code'] = 404;
			//$set['user_order_list']=array('msg'=>'No data found!','success'=>'0');
		}
 
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//order delvery status end

//menu_cat_list start
else if(isset($_GET['menucat_list']))
{
  
		$jsonObj= array();	
	
	    $query="SELECT * FROM tbl_restaurants
		LEFT JOIN tbl_category ON tbl_category.cid= tbl_restaurants.cat_id
		WHERE tbl_restaurants.status='1' ORDER BY tbl_restaurants.rate_avg DESC, tbl_restaurants.total_rate DESC";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			

			$row['cid'] = $data['cid'];
			$row['category_name'] = $data['category_name'];
			$row['category_image'] = $data['category_image'];
			$row['total_rate'] = $data['total_rate'];
			$row['rate_avg'] = $data['rate_avg'];

			array_push($jsonObj,$row);
		
		}
			$set['response']->message = 'successful get data';
			$set['response']->code = 200;    
			$set['response']->urlpath = $file_path.'imagess/'.$data['category_image'];
			$set['menu_category'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

		
}
//menu_cat_list end	




else 
{
		$jsonObj= array();	

		$query="SELECT * FROM tbl_settings WHERE id='1'";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['app_name'] = $data['app_name'];
			$row['app_logo'] = $data['app_logo'];
			$row['app_version'] = $data['app_version'];
			$row['app_author'] = $data['app_author'];
			$row['app_contact'] = $data['app_contact'];
			$row['app_email'] = $data['app_email'];
			$row['app_website'] = $data['app_website'];
			$row['app_description'] = stripslashes($data['app_description']);
 			$row['app_developed_by'] = $data['app_developed_by'];

			$row['app_privacy_policy'] = stripslashes($data['app_privacy_policy']); 	

			array_push($jsonObj,$row);		
		}

		$set['FOOD_APP'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
}		

?>