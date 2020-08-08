<!DOCTYPE html>
<html lang="en">
<?php
require("language/language.php");
require("includes/function.php");
include("includes/head.php");

?>
<!-- Theme JS files -->
<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/js/pages/editor_ckeditor.js"></script>
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

		'about_desc'  =>  $_POST['about_desc'],			
		
		  );    

	$qry = Insert('tbl_aboutus',$data);  

	$_SESSION['msg']="10";
	

	header( "Location:manage_aboutus.php");

	exit; 
	}
      
	/* if(isset($_GET['cat_id']))
	{

	  $qry="SELECT * FROM tbl_aboutus where id='".$_GET['cat_id']."'";

	  $result=mysqli_query($mysqli,$qry);

	  $row=mysqli_fetch_assoc($result);

	} */
    
	if(isset($_POST['submit']) and isset($_POST['cat_id']))
	{

			   $data = array(

					 'about_desc'  =>  $_POST['about_desc']

				);  

				   $category_edit=Update('tbl_aboutus', $data, "WHERE id = '".$_POST['cat_id']."'");
		
	   $_SESSION['msg']="11"; 

		header( "Location:add_aboutus.php?cat_id=".$_POST['cat_id']);

		exit;
	}
}
if(isset($_GET['cat_id']))
	{

	  $qry="SELECT * FROM tbl_aboutus where id='".$_GET['cat_id']."'";

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
				<h4><span class="text-semibold">Add </span> - About us Detail</h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="manage_aboutus.php" class="btn btn-link btn-float has-text"><i class="icon-backward text-primary"></i><span>Back</span></a>
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
								<legend class="text-bold">About us Detail</legend>

								<div class="form-group">
									<label class="control-label col-lg-2">About US Description :-</label>
									<div class="col-lg-10">
										<textarea name="about_desc" rows="4" cols="50" id="about_desc" class="form-control" required><?php if(isset($_GET['cat_id'])){echo $row['about_desc'];}?></textarea>
										<script>CKEDITOR.replace( 'about_desc' );</script>
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
