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

$users_qry="SELECT * FROM tbl_users ORDER BY tbl_users.id";  
$users_result=mysqli_query($mysqli,$users_qry);

if($_SESSION['id']!=2)
{
if(isset($_GET['user_id']))
{
	Delete('tbl_users','id='.$_GET['user_id'].'');
	$_SESSION['msg']="12";
	header( "Location:manage_users.php");
	exit;
}
	//Active and Deactive status
if(isset($_GET['status_deactive_id']))
{
	$data = array('status'  =>  '0');
	$edit_status=Update('tbl_users', $data, "WHERE id = '".$_GET['status_deactive_id']."'");
	$_SESSION['msg']="14";
	header( "Location:manage_users.php");
	exit;
}
if(isset($_GET['status_active_id']))
{
	$data = array('status'  =>  '1');
	$edit_status=Update('tbl_users', $data, "WHERE id = '".$_GET['status_active_id']."'");
	$_SESSION['msg']="13";
	header( "Location:manage_users.php");
	exit;
}
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
			<h4><span class="text-semibold">User List</span></h4>
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
						<h5 class="panel-title">User List</h5>
						
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
								<th>Name</th>						 								
								<th>Email</th>								
								<th>Phone</th>								
								<th>Status</th>
								
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							while($users_row=mysqli_fetch_array($users_result))
							{         
							?>
							<tr>
								<td><?php echo $users_row['name'];?></td>
							   <td><?php echo $users_row['email'];?></td>   
							   <td><?php echo $users_row['phone'];?></td>
								<td>
								<?php if($users_row['status']!="0"){?>
								 <a href="manage_users.php?status_deactive_id=<?php echo $users_row['id'];?>" title="Change Status"><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span style="font-size: 12px;
									font-weight: 500;line-height: 16px;display: inline-block;margin-left: 3px;">Enable</span></span></a>
								  <?php }else{?>
								  <a href="manage_users.php?status_active_id=<?php echo $users_row['id'];?>" title="Change Status"><span class="badge badge-danger badge-icon"><i class="fa fa-close" aria-hidden="true"></i><span style="font-size: 12px;
									font-weight: 500;line-height: 16px;display: inline-block;margin-left: 3px;">Disable </span></span></a>
								  <?php }?>
								</td>
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="?user_id=<?php echo $users_row['id'];?>" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');"><i class="glyphicon glyphicon-trash"></i> DELETE</a></li>
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
