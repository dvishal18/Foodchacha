<!DOCTYPE html>
<html lang="en">
<?php
require("language/language.php");
require("includes/function.php");
include("includes/head.php");

?>
<!-- Theme JS files -->
<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/form_inputs.js"></script>
<!-- /theme JS files -->
<body class="navbar-bottom">

<!-- Main navbar -->
<?php 
include("includes/header.php");

require_once("thumbnail_images.class.php");

if($_SESSION['id']!=2)
{   
	if(isset($_POST['submit']) and isset($_GET['add']))
	{

	   $data = array( 
		 'tex_price'  =>  $_POST['tex_price']
		 
		  );    

	$qry = Insert('tbl_tex',$data);  

	$_SESSION['msg']="10";

	header( "Location:manage_tax_value.php");
	exit; 

	}

	/* if(isset($_GET['cat_id']))
	{
	   
	  $qry="SELECT * FROM tbl_tex where id='".$_GET['cat_id']."'";
	  $result=mysqli_query($mysqli,$qry);
	  $row=mysqli_fetch_assoc($result);

	} */
	if(isset($_POST['submit']) and isset($_POST['cat_id']))
	{
	 
	 if($_FILES['category_image']['name']!="")
	 {    

					$data = array(
					   'tex_price'  =>  $_POST['tex_price']
					 
					);

		  $category_edit=Update('tbl_tex', $data, "WHERE id = '".$_POST['cat_id']."'");

	 }
	 else
	 {

		   $data = array(
				 'tex_price'  =>  $_POST['tex_price']
			);  

			   $category_edit=Update('tbl_tex', $data, "WHERE id = '".$_POST['cat_id']."'");

	 }

	 
	$_SESSION['msg']="11"; 
	header( "Location:add_tex.php?cat_id=".$_POST['cat_id']);
	exit;

	}
}
if(isset($_GET['cat_id']))
{
   
  $qry="SELECT * FROM tbl_tex where id='".$_GET['cat_id']."'";
  $result=mysqli_query($mysqli,$qry);
  $row=mysqli_fetch_assoc($result);

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
				<h4><span class="text-semibold">Add </span> - Tex</h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="manage_tax_value.php" class="btn btn-link btn-float has-text"><i class="icon-backward text-primary"></i><span>Back</span></a>
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

				<!-- Form horizontal -->
				<div class="panel panel-flat">
					
					<div class="panel-body">
						<?php if(isset($_SESSION['msg'])){?>
						<div class="alert alert-success no-border">
							<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
							<span class="text-semibold"><?php echo $client_lang[$_SESSION['msg']] ; ?></span> 
						</div>
						<?php unset($_SESSION['msg']);}?>
						<form class="form-horizontal" action="" name="addeditcategory" method="post" enctype="multipart/form-data">
							<input  type="hidden" name="cat_id" value="<?php echo $_GET['cat_id'];?>" />
							<fieldset class="content-group">
								<legend class="text-bold">Tex Detail</legend>

								<div class="form-group">
									<label class="control-label col-lg-2">Category Name :-</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="tex_price" id="tex_price" value="<?php if(isset($_GET['cat_id'])){echo $row['tex_price'];}?>" placeholder="Enter Tax Value">
									</div>
								</div>
		                      
							</fieldset>
							<div class="text-right">
								<button type="submit" name="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</form>
					</div>
				</div>
				<!-- /form horizontal -->

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
