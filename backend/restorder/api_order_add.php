<?php include("includes/connection.php");
 
	include('includes/function.php');
  

	function get_order_unique_id()
	{
			//set the random id length 
			$random_id_length = 12; 

			//generate a random id encrypt it and store it in $rnd_id 
			$rnd_id = crypt(uniqid(rand(),1)); 

			//to remove any slashes that might have come 
			$rnd_id = strip_tags(stripslashes($rnd_id)); 

			//Removing any . or / and reversing the string 
			$rnd_id = str_replace(".","",$rnd_id); 
			$rnd_id = strrev(str_replace("/","",$rnd_id)); 

			//finally I take the first 10 characters from the $rnd_id 
			$rnd_id = substr($rnd_id,0,$random_id_length); 

			 return $rnd_id;
	}

	$order_unique_id= get_order_unique_id();

	$data = array(
			'user_id'  =>  $_GET['user_id'],
			'order_unique_id'  =>  $order_unique_id,			 
			'order_address'  =>  addslashes($_GET['order_address']),
 			'order_comment'  =>  $_GET['order_comment'] 
			);
		 
	$qry = Insert('tbl_order_details',$data);
 	
 	$cart_ids=explode(',', $_GET['cat_ids']);

 	foreach ($cart_ids as $cart_id) {
 
 	  $qry1="SELECT * FROM tbl_cart where id='".$cart_id."'";
      $result1=mysqli_query($mysqli,$qry1);
      $row1=mysqli_fetch_assoc($result1);

      $menu_total_price=$row1['menu_qty']*$row1['menu_price'];

      $data = array(
			'order_id'  =>  $order_unique_id,
			'user_id'  =>  $_GET['user_id'],			 
			'rest_id'  =>  $row1['rest_id'],
 			'menu_id'  =>  $row1['menu_id'],
 			'menu_name'  =>  $row1['menu_name'],
 			'menu_qty'  =>  $row1['menu_qty'],
 			'menu_price'  =>  $row1['menu_price'],
 			'menu_total_price'  =>  $menu_total_price
			);
		 
		$qry = Insert('tbl_order_items',$data);

		Delete('tbl_cart','id='.$cart_id.'');

 	}


 	//Email Send

 	$to = APP_ADMIN_EMAIL;			 
	$subject = ''.APP_NAME.' New Order Placed';

	 $message=' 

<!-- BODY -->
<table class="body-wrap">
  <tr>
    <td></td>
    <td class="container" bgcolor="#FFFFFF">

      <div class="content">
      <table>
        <tr>
          <td>
            <br/>
            <h4>Hello Admin</h4>              
              <p>New order confirmed and order info are bellow.</p>

             <h5>Order ID: <small>'.$order_unique_id.'</small></h5>
             
             <h5 class="">Delivery Address</h5>
                          <p class="">
                             '.addslashes($_GET['order_address']).'
                          </p>
            
            <br/>
             
          </td>
        </tr>
      </table>
      </div>
                  
    </td>
    <td></td>
  </tr>
</table>
<!-- /BODY -->';
 
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.APP_NAME.' <'.APP_FROM_EMAIL.'>' . "\r\n";
	// Mail it
	@mail($to, $subject, $message, $headers);

	//Email End
 	 
	$set['FOOD_APP'][]=array('msg'=>'Order has been placed successfully','success'=>'1');	


	header( 'Content-Type: application/json; charset=utf-8' );
	$json = json_encode($set);
	echo $json;
	 exit;		
 
?>