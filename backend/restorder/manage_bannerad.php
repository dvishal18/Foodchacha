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

    
$quotes_qry="SELECT * FROM tbl_banner_ad ORDER BY tbl_banner_ad.id"; 
$result=mysqli_query($mysqli,$quotes_qry);
 
if($_SESSION['id']!=2)
{
	if(isset($_GET['cat_id']))
	{

		$cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_banner_ad WHERE id=\''.$_GET['cat_id'].'\'');
		$cat_res_row=mysqli_fetch_assoc($cat_res);


		if($cat_res_row['banner_image']!="")
		{
			unlink('images/'.$cat_res_row['banner_image']);
		}

		Delete('tbl_banner_ad','id='.$_GET['cat_id'].'');

	  
		$_SESSION['msg']="12";
		header( "Location:manage_bannerad.php");
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
			<h4><span class="text-semibold">Banner List</span></h4>
		</div>
		
		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="add_bannerad.php?add=yes" class="btn btn-link btn-float has-text"><i class=" icon-plus3 text-primary"></i><span>Add Banner</span></a>				
			</div>
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
						<h5 class="panel-title">Banner List</h5>
						
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
								<th>Title</th>
								<th>Image</th> 
								
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							while($row=mysqli_fetch_array($result))
							{         
							?>
							<tr>
								<td><?php echo $row['banner_name'];?></td>
								<td><img src="imagess/<?php echo $row['banner_image'];?>" width="150" height="100" /></td>
								
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="add_bannerad.php?cat_id=<?php echo $row['id'];?>"> <i class="glyphicon glyphicon-edit"></i> EDIT</a></li>

												<li><a href="?cat_id=<?php echo $row['id'];?>" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');"><i class="glyphicon glyphicon-trash"></i> DELETE</a></li>
													
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
