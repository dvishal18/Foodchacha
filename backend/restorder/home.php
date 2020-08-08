<!DOCTYPE html>
<html lang="en">
<?php
require("language/language.php");
require("includes/function.php");
include("includes/head.php");

?>

<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
<body class="navbar-bottom">

	<!-- Main navbar -->
<?php 
include("includes/header.php");

$qry_cat="SELECT COUNT(*) as num FROM tbl_category";

$total_category= mysqli_fetch_array(mysqli_query($mysqli,$qry_cat));

$total_category = $total_category['num'];


$qry_menu="SELECT COUNT(*) as num FROM tbl_menu_list";

$total_menu= mysqli_fetch_array(mysqli_query($mysqli,$qry_menu));

$total_menu = $total_menu['num'];

$qry_promo="SELECT COUNT(*) as num FROM tbl_promo";

$total_promo= mysqli_fetch_array(mysqli_query($mysqli,$qry_promo));

$total_promo = $total_promo['num'];


$qry_restaurant="SELECT COUNT(*) as num FROM tbl_restaurants";

$total_restaurant = mysqli_fetch_array(mysqli_query($mysqli,$qry_restaurant));

$total_restaurant = $total_restaurant['num'];


$qry_users="SELECT COUNT(*) as num FROM tbl_users";

$total_users = mysqli_fetch_array(mysqli_query($mysqli,$qry_users));

$total_users = $total_users['num'];


$qry_order="SELECT COUNT(*) as num FROM tbl_order_details";

$total_order = mysqli_fetch_array(mysqli_query($mysqli,$qry_order));

$total_order = $total_order['num'];

?>
	<!-- /main navbar -->


	<!-- Page header -->
<div class="page-header">
	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="home.php"><i class="icon-home2 position-left"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ul>
	</div>

	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Home</span></h4>
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

				<!-- Dashboard content -->
				<div class="row">
					<div class="col-lg-12">

						<!-- Quick stats boxes -->
						<div class="row">
							<div class="col-lg-4">

								<!-- Members online -->
								<div class="panel bg-teal-400">
								<a href="manage_category.php" class="text-muted text-size-small">
									<div class="panel-body">
										<div class="heading-elements">
											<span class="heading-text badge bg-teal-800"><?php echo $total_category;?></span>
										</div>

										<h3 class="no-margin">Category</h3>
										Category List
										<div class="text-muted text-size-small">All Category</div>
									</div>

									<div class="container-fluid">
										<div id="members-online"></div>
									</div>
								</div>
								<!-- /members online -->

							</div>
							
							<div class="col-lg-4">

								<!-- Members online -->
								<div class="panel bg-green-400">
								<a href="manage_submenu_list.php" class="text-muted text-size-small">
									<div class="panel-body">
										<div class="heading-elements">
											<span class="heading-text badge bg-teal-800"><?php echo $total_menu;?></span>
										</div>

										<h3 class="no-margin">Menu List</h3>
										menu List
										<div class="text-muted text-size-small"> All Menu List</div>
										
									</div>

									<div class="container-fluid">
										<div id="members-online"></div>
									</div>
								</a>
								</div>
								<!-- /members online -->

							</div>

							<div class="col-lg-4">

								<!-- Members online -->
								<div class="panel bg-pink-400">
								<a href="manage_order_list.php" class="text-muted text-size-small">
									<div class="panel-body">
										<div class="heading-elements">
											<span class="heading-text badge bg-teal-800"><?php echo $total_order;?></span>
										</div>

										<h3 class="no-margin">Orders</h3>
										Orders List
										<div class="text-muted text-size-small">All Orders List</div>
									</div>

									<div class="container-fluid">
										<div id="members-online"></div>
									</div>
								</div>
								<!-- /members online -->

							</div>

							<div class="col-lg-4">

								<!-- Members online -->
								<div class="panel bg-blue-400">
								<a href="manage_users.php" class="text-muted text-size-small">
									<div class="panel-body">
										<div class="heading-elements">
											<span class="heading-text badge bg-teal-800"><?php echo $total_users;?></span>
										</div>

										<h3 class="no-margin">Users</h3>
										Users List
										<div class="text-muted text-size-small">All Users List</div>
									</div>

									<div class="container-fluid">
										<div id="members-online"></div>
									</div>
								</div>
								<!-- /members online -->

							</div>
							
							<div class="col-lg-4">

								<!-- Current server load -->
								<div class="panel bg-purple-400">
								<a href="manage_promo_code_list.php" class="text-muted text-size-small">
									<div class="panel-body">
										<div class="heading-elements">
											<span class="heading-text badge bg-teal-800"><?php echo $total_promo;?></span>
										</div>
										<h3 class="no-margin">Promo code</h3>
										Promo code List
										<div class="text-muted text-size-small">All Promo code List</div>
									</div>
								</a>

								</div>
								<!-- /current server load -->

							</div>
						</div>
						</div>
						<!-- /quick stats boxes -->
					</div>

				</div>
				<!-- /dashboard content -->

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
