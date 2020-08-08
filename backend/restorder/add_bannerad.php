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
  
     $banner_image=rand(0,99999)."_".$_FILES['banner_image']['name'];
       
       //Main Image
		$tpath1='imagess/'.$banner_image;        
		$pic1=compress_image($_FILES["banner_image"]["tmp_name"], $tpath1, 80);
    
       $data = array( 
         'banner_name'  =>  $_POST['banner_name'],
		 'banner_desc'  =>  $_POST['banner_desc'],
         'banner_image'  =>  $banner_image
          );    

    $qry = Insert('tbl_banner_ad',$data);  
 

    $_SESSION['msg']="10";
 
    header( "Location:manage_bannerad.php");
    exit; 

  }
  
 /*  if(isset($_GET['cat_id']))
  {
       
      $qry="SELECT * FROM tbl_banner_ad where id='".$_GET['cat_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

  } */
  if(isset($_POST['submit']) and isset($_POST['cat_id']))
  {
     
     if($_FILES['banner_image']['name']!="")
     {    


        $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_banner_ad WHERE id='.$_GET['cat_id'].'');
          $img_res_row=mysqli_fetch_assoc($img_res);
      

          if($img_res_row['banner_image']!="")
            {
                unlink('imagess/'.$img_res_row['banner_image']);
           }

           $banner_image=rand(0,99999)."_".$_FILES['banner_image']['name'];
       
             //Main Image
           $tpath1='imagess/'.$banner_image;        
             $pic1=compress_image($_FILES["banner_image"]["tmp_name"], $tpath1, 80);
         
          
                    $data = array(
                       'banner_name'  =>  $_POST['banner_name'],
					    'banner_desc'  =>  $_POST['banner_desc'],
                      'banner_image'  =>  $banner_image
                    );

          $category_edit=Update('tbl_banner_ad', $data, "WHERE id = '".$_POST['cat_id']."'");

     }
     else
     {

           $data = array(
				 'banner_desc'  =>  $_POST['banner_desc'],
                 'banner_name'  =>  $_POST['banner_name']
				 
            );  
 
               $category_edit=Update('tbl_banner_ad', $data, "WHERE id = '".$_POST['cat_id']."'");

     }

     
    $_SESSION['msg']="11"; 
    header( "Location:add_bannerad.php?cat_id=".$_POST['cat_id']);
    exit;
 
  }
}
 if(isset($_GET['cat_id']))
  {
       
      $qry="SELECT * FROM tbl_banner_ad where id='".$_GET['cat_id']."'";
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
				<h4><span class="text-semibold">Add </span> - Banner</h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="manage_bannerad.php" class="btn btn-link btn-float has-text"><i class="icon-backward text-primary"></i><span>Back</span></a>
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
								<legend class="text-bold">Banner Detail</legend>

								<div class="form-group">
									<label class="control-label col-lg-2">Advertise Name :-</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="banner_name" id="banner_name" value="<?php if(isset($_GET['cat_id'])){echo $row['banner_name'];}?>" placeholder="Enter Category Name">
									</div>
								</div>
		                      
							   <div class="form-group">
									<label class="control-label col-lg-2">
									  Advertise Info
									</label>
									<div class="col-lg-10">
									  
									  <textarea name="banner_desc" id="banner_desc" class="form-control m-input" required><?php if(isset($_GET['cat_id'])){echo $row['banner_desc'];}?></textarea>
				 
									</div>
								  </div>
								<div class="form-group">
									<label class="control-label col-lg-2"> Banner Image :-</label>
									<div class="col-lg-10">							
										<div class="media no-margin-top">
											<div class="media-left">
												<div class="media-body">
													<input type="file" id="banner_image" name="banner_image" class="file-styled-primary">
													</br>
												   <?php if(isset($_GET['cat_id']) and $row['banner_image']!="") {?>
													<img src="imagess/<?php echo $row['banner_image'];?>" style="width: 75px; height: 75px;" class="img-rounded" alt="">
													<?php } else{?>
													<img src="assets/images/placeholder.jpg" style="width: 75px; height: 75px;" class="img-rounded" alt=""/>                                   
													<?php }?>
													<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												</div>
											</div>
										</div>
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
