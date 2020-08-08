<!DOCTYPE html>
<html lang="en">
<?php
require("language/language.php");
require("includes/function.php");
include("includes/head.php");

?>

<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
<!-- Main content -->
<body class="navbar-bottom">

<?php 

include("includes/header.php");
    

$data_qry = "SELECT * FROM tbl_order_details WHERE tbl_order_details.order_unique_id='".$_GET['order_id']."'ORDER BY tbl_order_details.id DESC";
 // var_dump($data_qry);die; 
$result=mysqli_query($mysqli,$data_qry);

////////////////////////////////////////////////user detail///////////////////////////
$user_data_qry="SELECT * FROM tbl_order_details WHERE tbl_order_details.order_unique_id='".$_GET['order_id']."' GROUP BY(order_unique_id) ORDER BY tbl_order_details.id DESC"; 

$user_result=mysqli_query($mysqli,$user_data_qry);

$user_row=mysqli_fetch_assoc($user_result);


 
function get_order_info($order_id)
{
    global $mysqli;

    $query1="SELECT * FROM tbl_order_details WHERE tbl_order_details.order_unique_id='".$_GET['order_id']."'";
   
    $sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());

    $data1 = mysqli_fetch_assoc($sql1);

    return $data1;
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
    
            $query1="SELECT * FROM tbl_payment WHERE tbl_payment.user_id='".$payment_type."'";
    
            $sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());
    
            $data1 = mysqli_fetch_assoc($sql1);
    
            return $data1;
    
    }
 function get_tax_price()
 {
    global $mysqli;
    
    $query1="SELECT * FROM tbl_tex";

    $sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());
    $data1 = mysqli_fetch_assoc($sql1);

    return $data1['tex_price'];
    //return $data1;
 }

    


?>
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
<div class="page-container">
<div class="page-content">
    <?php include("includes/sidebar.php");?>
    <div class="content-wrapper">
        
        <div class="content">
            <div class="panel panel-flat">
                <div class="panel-heading">
                </div>
                <!-- Horizontal form options -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-9">
                            <h3 class="m-portlet__head-text">
                                Order : <?php echo get_order_info($user_row['order_id'])['order_unique_id'];?>
                            </h3>
                            <form  method="post" action="" class="m-form">
                                <div class="col-md-12">
                                    <div class="m-input-icon m-input-icon--left">
                                        <b>Name</b>: <?php echo get_user_info($user_row['user_id'])['name'];?><br>
                                        <b>Email:</b>: <?php echo get_user_info($user_row['user_id'])['email'];?><br>
                                        <b>Phone:</b>: <?php echo get_user_info($user_row['user_id'])['phone'];?><br>
                                        <b>Address:</b>: <?php echo get_user_info($user_row['user_id'])['address_line_1'];?> &nbsp;&nbsp;&nbsp; <b>Address 2:</b>: <?php echo get_user_info($user_row['user_id'])['address_line_2'];?><br>
                                         
                                         <b>City:</b>: <?php echo get_user_info($user_row['user_id'])['city'];?> &nbsp;&nbsp;&nbsp; <b>State:</b>: <?php echo get_user_info($user_row['user_id'])['state'];?><br>
                                    
                                         <b>Country:</b>: <?php echo get_user_info($user_row['user_id'])['country'];?> &nbsp;&nbsp;&nbsp;<b>Zipcode:</b>: <?php echo get_user_info($user_row['user_id'])['zipcode'];?><br><br>
                                        
                                         
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="colcol-md-3 m--align-right">
                            <a href="manage_order_list.php" class="btn btn-primary">
                            <span>
                            <i class="fa fa-arrow-left"></i>
                            <span>
                            Back
                            </span>
                            </span>
                            </a><br>
                               <div style="margin: 40px;"> <b>Date And Time :</b> <?php echo $user_row['order_date'];?></div>
                             <div style="margin: 40px;"> <b>Payment Type :- </b> <?php echo get_payment_type($user_row['user_id'])['payment_type'];?></div>
                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                        </div>
                        <!--end: Search Form -->
                        <!--begin: Datatable -->
                        <table class="table table-bordered table-hover datatable-highlight">
                            <thead>
                                <tr>
                                    <!--<th>Restaurant Name</th>-->
                                    <th>Menu Name</th> 
                                    <th>Menu quantity</th>                                  
                                    <th>Price</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=0;
                                    
                                    $total_price=0;
                                    
                                    while($row=mysqli_fetch_array($result))

                                    {  
                                    
                                    ?>
                                <tr scope="row">
                                   
                                    <td><?php echo $row['menu_name'];?></td>
                                    <td><?php echo $row['menu_qty'];?></td>
                                   
                                    <td><?php echo $row['menu_price'];?></td>
                                    <!--<td><?php echo $row['menu_price'];?></td>-->
                                </tr>
                                <?php
                                    $total_price=$row['total_price'];
                                    //$total_price=$total_price+$row['total_price'];
                                     $i++;

                                    }
                                                                  
                                    ?>      
                               
                                <tr>
                                    <td><b>Tax</b></td>
                                     <td>&nbsp;</td>
                                    <td>
                                        <?php echo get_tax_price();?>   %
                                    </td>
                                </tr>
                                 <tr>
                                    
                                    
                                    
                                   
                                    <td><b>Total</b></td>
                                     <td>&nbsp;</td>
                                    <td>
                                        <?php echo number_format(round((float)$total_price,2),2);?>   
                                    </td>
                                </tr>
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