<!DOCTYPE html>

<html lang="en">

<?php

require("language/language.php");

require("includes/function.php");

include("includes/head.php");



?>

<!-- Theme JS files -->

<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>

<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>



<script type="text/javascript" src="assets/js/core/app.js"></script>

<script type="text/javascript" src="assets/js/pages/datatables_advanced.js"></script>

<!-- /theme JS files -->

<body class="navbar-bottom">



<!-- Main navbar -->

<?php 

include("includes/header.php");





$data_qry="SELECT * FROM tbl_payment ORDER BY `id` DESC";

//$data_qry="SELECT id,order_id,user_id,menu_id,total_price FROM tbl_payment ORDER BY order_date, id DESC";
//var_dump($data_qry);die();


$result=mysqli_query($mysqli,$data_qry);



 if($_SESSION['id']!=2)

{   

    if(isset($_GET['order_id']))

    {

    

    		Delete('tbl_order_details','order_unique_id="'.$_GET['order_id'].'"');

    

    		Delete('tbl_payment','order_id="'.$_GET['order_id'].'"');

    

    		$_SESSION['msg']="12";

    

    		//header( "Location:manage_order_list.php");

			echo '<script type="text/javascript">

           window.location = "manage_order_list.php"

      </script>';

    		exit;

    

    }	

    

       //order status

    

    if(isset($_GET['status_pending_id']))

    {

    

       $data = array('status'  =>  $_GET['status_value']);

    

       $edit_status=Update('tbl_payment', $data, "WHERE order_id = '".$_GET['status_pending_id']."'");

    

       $_SESSION['msg']="14";

    

      // header( "Location:manage_order_list.php");

	  echo '<script type="text/javascript">

           window.location = "manage_order_list.php"

      </script>';

    

       exit;

    

     }

 }   

    function get_user_info($user_id)

    {

        global $mysqli;

    

        $query1="SELECT * FROM tbl_users WHERE tbl_users.id='".$user_id."'";

    

    	$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());

    

    	$data1 = mysqli_fetch_assoc($sql1);

    

    	return $data1;

    

    }

	  function get_payment_type($payment_type)

    {

          global $mysqli;

    

    		$query1="SELECT * FROM tbl_payment WHERE tbl_payment.user_id='".$payment_type."' ORDER BY id DESC";

    

    		$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());

    

    		$data1 = mysqli_fetch_assoc($sql1);

    

    		return $data1;

    

    }

	 function get_order_price($total_price)

    {

          global $mysqli;

    

    		$query1="SELECT * FROM tbl_order_details WHERE tbl_order_details.total_price='".$total_price."'";

    

    		$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());

    

    		$data1 = mysqli_fetch_assoc($sql1);

    

    		return $data1;

    

    }

    function get_order_status($order_id)

    {

          global $mysqli;

    

    		$query1="SELECT * FROM tbl_payment WHERE tbl_payment.order_id='".$order_id."' ORDER BY id DESC";

    

    		$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());

    

    		$data1 = mysqli_fetch_assoc($sql1);

    

    		return $data1['status'];

    

       }

    

	

	

?>

<!-- /main navbar -->



<!-- Page header -->

<div class="page-header">

	<div class="breadcrumb-line">

		<ul class="breadcrumb">

			<li><a href="home.php"><i class="icon-home2 position-left"></i> Home</a></li>

		</ul>

	</div>

	<div class="page-header-content">

		<div class="page-title">

			<h4><span class="text-semibold">Order List</span></h4>

		</div>

	

	</div>

</div>

<!-- /page header -->

	<!-- Page container -->

	<div class="page-container">

		<!-- Page content -->

		<div class="page-content">

			<!-- Main sidebar -->

			<?php include("includes/sidebar.php");?>


			<!-- /main sidebar -->

			<!-- Main content -->

			<div class="content-wrapper">


				<!-- Highlighting rows and columns -->

				<div class="panel panel-flat">

					<div class="panel-heading">

						<h5 class="panel-title">Order List</h5>

					</div>

					<?php if(isset($_SESSION['msg'])){?>

						  <div class="alert alert-success no-border">

								<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>

								<span class="text-semibold"><?php echo $client_lang[$_SESSION['msg']] ; ?></span> 

						</div>

					<?php unset($_SESSION['msg']);}?>



					<table class="table table-bordered table-hover datatable-highlight">

						<thead>

							<tr>

								<th>Order ID</th>

                                <th>User Name</th>

                                <th>User Phone</th>

                                <th>Total Price</th>

								<th>Payment Type</th>

                                <th>Status</th>


								<th class="text-center">Actions</th>

							</tr>

						</thead>

						<tbody>

						<?php 

							while($row=mysqli_fetch_array($result))

							{         

							?>

							<tr>

								<td><a href="manage_order_list_view.php?order_id=<?php echo $row['order_id'];?>" title="View Order"><?php echo $row['order_id'];?></a></td>

                                <td><?php echo get_user_info($row['user_id'])['name'];?></td>

                                <td><?php echo get_user_info($row['user_id'])['phone'];?></td>

                                <td><?php echo get_order_price($row['total_price'])['total_price'];?></td>

								 <td><?php echo get_payment_type($row['user_id'])['payment_type'];?></td>

                                <td>

                                    <div class="btn-group">

                                        <button type="button" class="btn <?php if(get_order_status($row['order_id'])=="Out for delivery"){?>btn bg-teal  <?php }else if(get_order_status($row['order_id'])=="Packed"){?> btn-primary  <?php }else if(get_order_status($row['order_id'])=="Delivered"){?> btn-success   <?php }else{?>btn-danger<?php }?> dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo get_order_status($row['order_id']);?></button>

                                        <div class="dropdown-menu" x-placement="top-start">

                                            <li><a class="dropdown" href="manage_order_list.php?status_pending_id=<?php echo $row['order_id'];?>&status_value=Pending">Pending</a></li>

                                            <li><a class="dropdown" href="manage_order_list.php?status_pending_id=<?php echo $row['order_id'];?>&status_value=Packed">Packed</a></li>

                                            <li><a class="dropdown" href="manage_order_list.php?status_pending_id=<?php echo $row['order_id'];?>&status_value=Out for delivery">Out for delivery</a> </li>

                                            <li><a class="dropdown" href="manage_order_list.php?status_pending_id=<?php echo $row['order_id'];?>&status_value=Delivered">Delivered</a> </li>

                                        </div>

                                    </div>

                                </td>

								<td class="text-center">

									<ul class="icons-list">

										<li class="dropdown">

											<a href="#" class="dropdown-toggle" data-toggle="dropdown">

												<i class="icon-menu9"></i>

											</a>

											<ul class="dropdown-menu dropdown-menu-right">

                                                <li><a href="manage_order_list_view.php?order_id=<?php echo $row['order_id'];?>"> <i class="icon-eye2"></i> View Order</a></li>

                                                <li><a href="?order_id=<?php echo $row['order_id'];?>" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');"><i class="glyphicon glyphicon-trash"></i> DELETE</a></li>

                                            </ul>

										</li>

									</ul>

								</td>

							</tr>

							<?php

								}



								?> 

						</tbody>

					</table>

				</div>

				<!-- /highlighting rows and columns -->

			</div>

			<!-- /main content -->

		</div>

		<!-- /page content -->

	</div>

	<!-- /page container -->



	<!-- Footer -->

	<?php include("includes/footer.php");?>

	<!-- /footer -->



</body>

</html>

