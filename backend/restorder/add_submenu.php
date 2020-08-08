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

<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>
<!-- /theme JS files -->
<body class="navbar-bottom">

<!-- Main navbar -->
<?php 
include("includes/header.php");

require_once("thumbnail_images.class.php");

     
$cat_qry="SELECT * FROM tbl_category ORDER BY category_name";
$cat_result=mysqli_query($mysqli,$cat_qry); 
    	
    	//$cat_result=mysqli_query($mysqli,$cat_qry);
 if($_SESSION['id']!=2)
{      
    if(isset($_POST['submit']) and isset($_GET['add']))
    {
    
    
    	   $menu_image=rand(0,99999)."_".$_FILES['menu_image']['name'];                
    		$tpath1='imagess/'.$menu_image;        
    		$pic1=compress_image($_FILES["menu_image"]["tmp_name"], $tpath1, 80);
    
    		
    		$menu_image_cat=rand(0,99999)."_".$_FILES['menu_image_cat']['name'];
    		$tpath1='imagess/'.$menu_image_cat;        
    		$pic1=compress_image($_FILES["menu_image_cat"]["tmp_name"], $tpath1, 80);
    
    		  $data = array(
    				   
    				   'cid'  =>  $_POST['cid'],
    				   'menu_name'  =>  $_POST['menu_name'],
    				   'menu_info'  =>  $_POST['menu_info'],
    				   'menu_price'  =>  $_POST['menu_price'],
    				   'menu_weight'  =>  $_POST['menu_weight'],
    				   'menu_type'  =>  $_POST['menu_type'],
    				   'menu_image'  =>  $menu_image
    				);  
    	  
      
    $qry = Insert('tbl_menu_list',$data); 
    
    	$targetDir = "imagess/";
    	$allowTypes = array('jpg','png','jpeg','gif');
    	$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    	if(!empty(array_filter($_FILES['menu_image_cat']['name'])))
    	{
    		foreach($_FILES['menu_image_cat']['name'] as $key=>$val)
    		{
    			$fileName = basename($_FILES['menu_image_cat']['name'][$key]);
    			$targetFilePath = $targetDir . $fileName;
    			$last_id = $mysqli->insert_id;
    			
    			$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    			if(in_array($fileType, $allowTypes))
    			{
    				if(move_uploaded_file($_FILES["menu_image_cat"]["tmp_name"][$key], $targetFilePath))
    				{
    					$insertValuesSQL .= "('".$last_id."','".$fileName."'),";
    				}else{
    					$errorUpload .= $_FILES['menu_image_cat']['name'][$key].', ';
    				}
    			}else{
    				$errorUploadType .= $_FILES['menu_image_cat']['name'][$key].', ';
    			}
    		}
    		if(!empty($insertValuesSQL))
    		{
    			$insertValuesSQL = trim($insertValuesSQL,',');
    			$insert = mysqli_query($mysqli,"INSERT INTO tbl_menu_image (mid,menu_image_cat) VALUES $insertValuesSQL");
    			if($insert)
    			{
    				$errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
    				$errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
    				$errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
    				$statusMsg = "Files are uploaded successfully.".$errorMsg;
    			}
    			else
    			{
    				$statusMsg = "Sorry, there was an error uploading your file.";
    			}
    		}
    	}
    
    
    $_SESSION['msg']="10";
    
    header( "Location:manage_submenu_list.php");
    exit; 
  
    
    }
    if(isset($_GET['prod_image']))
    {
		$id = $_GET['prod_image'];
		$cat_res=mysqli_query($mysqli,"SELECT * FROM tbl_menu_image WHERE id=$id'");
		$cat_res_row=mysqli_fetch_assoc($cat_res);

		if($cat_res_row['menu_image_cat']!="")
		{
			unlink('images/'.$cat_res_row['menu_image_cat']);
		}
 
		Delete('tbl_menu_image','id='.$id.'');

		$_SESSION['msg']="12";
		header("Location: {$_SERVER['HTTP_REFERER']}");
		exit;
		
	}
   /*  if(isset($_GET['menu_id']))
    {
       
      $qry="SELECT * FROM tbl_menu_list where mid='".$_GET['menu_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);
    
    } */
    
    if(isset($_POST['submit']) and isset($_POST['menu_id']))
    {     
    	if($_FILES['menu_image']['name']!="")
    	{    
    
    	  $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_menu_list WHERE mid='.$_POST['menu_id'].'');
    	  $img_res_row=mysqli_fetch_assoc($img_res);
      
    
    	  if($img_res_row['menu_image']!="")
    		{
    			unlink('imagess/'.$img_res_row['menu_image']);
    		}
    
    		$menu_image=rand(0,99999)."_".$_FILES['menu_image']['name'];
    		$tpath1='imagess/'.$menu_image;        
    		$pic1=compress_image($_FILES["menu_image"]["tmp_name"], $tpath1, 80);
    		
    		//update
    		$menu_image_cat=rand(0,99999)."_".$_FILES['menu_image_cat']['name'];
    		$tpath1='imagess/'.$menu_image_cat;        
    		$pic1=compress_image($_FILES["menu_image_cat"]["tmp_name"], $tpath1, 80);
    
    		  $data = array(
    				   
    				   'cid'  =>  $_POST['cid'],
    				   'menu_name'  =>  $_POST['menu_name'],
    				   'menu_info'  =>  $_POST['menu_info'],
    				   'menu_price'  =>  $_POST['menu_price'],
    				   'menu_weight'  =>  $_POST['menu_weight'],
    				   'menu_type'  =>  $_POST['menu_type'],
    				   'menu_image'  =>  $menu_image
    				);  
    	  
    	  }
    	  else
    	  {
    		  $data = array(
    				   
    				   'cid'  =>  $_POST['cid'],
    				   'menu_name'  =>  $_POST['menu_name'],
    				   'menu_info'  =>  $_POST['menu_info'],
    				   'menu_weight'  =>  $_POST['menu_weight'],
    				   'menu_type'  =>  $_POST['menu_type'],
    				   'menu_price'  =>  $_POST['menu_price']
    				);  
    	  }
    	
    	
    	 $category_edit=Update('tbl_menu_list', $data, "WHERE mid = '".$_POST['menu_id']."'");
    	 
    	$targetDir = "imagess/";
    	$allowTypes = array('jpg','png','jpeg','gif');
    	$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    	if(!empty(array_filter($_FILES['menu_image_cat']['name'])))
    	{
    		foreach($_FILES['menu_image_cat']['name'] as $key=>$val)
    		{
    			$fileName = basename($_FILES['menu_image_cat']['name'][$key]);
    			$targetFilePath = $targetDir . $fileName;
    			$last_id = $_GET['menu_id'];
    			
    			$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    			if(in_array($fileType, $allowTypes))
    			{
    				if(move_uploaded_file($_FILES["menu_image_cat"]["tmp_name"][$key], $targetFilePath))
    				{
    					$insertValuesSQL .= "('".$last_id."','".$fileName."'),";
    				}else{
    					$errorUpload .= $_FILES['menu_image_cat']['name'][$key].', ';
    				}
    			}else{
    				$errorUploadType .= $_FILES['menu_image_cat']['name'][$key].', ';
    			}
    		}
    		if(!empty($insertValuesSQL))
    		{
    			$insertValuesSQL = trim($insertValuesSQL,',');
    			$insert = mysqli_query($mysqli,"INSERT INTO tbl_menu_image (mid,menu_image_cat) VALUES $insertValuesSQL");
    			if($insert)
    			{
    				$errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
    				$errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
    				$errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
    				$statusMsg = "Files are uploaded successfully.".$errorMsg;
    			}
    			else
    			{
    				$statusMsg = "Sorry, there was an error uploading your file.";
    			}
    		}
    	}
    
    
    $_SESSION['msg']="11"; 
    header( "Location:add_submenu.php?menu_id=".$_POST['menu_id']);
    exit;
    
    }
}    
  if(isset($_GET['menu_id']))
    {
       
      $qry="SELECT * FROM tbl_menu_list where mid='".$_GET['menu_id']."'";
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
				<h4><span class="text-semibold">Add </span> - Menu Detail</h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="manage_submenu_list.php" class="btn btn-link btn-float has-text"><i class="icon-backward text-primary"></i><span>Back</span></a>
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
							<input  type="hidden" name="menu_id" value="<?php echo $_GET['menu_id'];?>" />
							<fieldset class="content-group">
								<legend class="text-bold">Menu Detail</legend>
								
								<div class="form-group">
									<label class="control-label col-lg-2"> Menu Category:</label>
									<div class="col-lg-10">
									    <select name="cid" id="m_select1" class="select-results-color" required>
										<option value="">--Select Category--</option>
										<?php
											while($cat_row=mysqli_fetch_array($cat_result))
											{
										?>                       
										<option value="<?php echo $cat_row['cid'];?>" <?php if(isset($_GET['menu_id']) && $cat_row['cid']==$row['cid']) {?>selected<?php }?>><?php echo $cat_row['category_name'];?></option>                           
										<?php
										  }
										?>
									    </select>
									</div>
							    </div>
								
								<div class="form-group">
									<label class="control-label col-lg-2">Menu Type :-</label>
									<div class="col-lg-10">
										<input type="text" class="form-control m-input" name="menu_type" id="menu_type" value="<?php if(isset($_GET['menu_id'])){echo $row['menu_type'];}?>" placeholder="Enter Menu Type" required>
									</div>
								</div>
								
								<div class="form-group">
                                <label class="control-label col-lg-2">Menu Name :-</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control m-input" name="menu_name" id="menu_name" value="<?php if(isset($_GET['menu_id'])){echo $row['menu_name'];}?>" placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Menu Information</label>
                                <div class="col-lg-10">
                                    <textarea name="menu_info" id="menu_info" class="form-control m-input" required><?php if(isset($_GET['menu_id'])){echo $row['menu_info'];}?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                Menu Price
                                </label>
                                <div class="col-lg-10">
                                    <input type="number" class="form-control m-input" name="menu_price" id="menu_price" value="<?php if(isset($_GET['menu_id'])){echo $row['menu_price'];}?>" placeholder="Enter Price" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                Menu Weight
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control m-input" name="menu_weight" id="menu_weight" value="<?php if(isset($_GET['menu_id'])){echo $row['menu_weight'];}?>" placeholder="Enter Weight" required>
                                </div>
                            </div>
		                      
								<div class="form-group">
									<label class="control-label col-lg-2">Category Image :-</label>
									<div class="col-lg-10">							
										<div class="media no-margin-top">
											<div class="media-left">
												<div class="media-body">
													<input type="file" id="menu_image" name="menu_image" class="file-styled-primary">
													</br>
												   <?php if(isset($_GET['menu_id']) and $row['menu_image']!="") {?>
													<img src="imagess/<?php echo $row['menu_image'];?>" style="width: 75px; height: 75px;" class="img-rounded" alt="">
													<?php } else{?>
													<img src="assets/images/placeholder.jpg" style="width: 75px; height: 75px;" class="img-rounded" alt=""/>                                   
													<?php }?>
													<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-group">
                                <label class="control-label col-lg-2">Menu Multiple Image:</label>
                                <div class="col-lg-10">
                                    <div class="media no-margin-top">
                                        <div class="media-left">
                                            <div class="media-body">
                                                <input type="file" id="menu_image_cat" name="menu_image_cat[]" class="file-styled-primary" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="media no-margin-top">
                                        <div class="media-left">
                                            <div class="media-body">
                                                <?php
													$id=$_GET['menu_id'];
                                                    $stmt = mysqli_query($mysqli,"SELECT * FROM tbl_menu_image WHERE mid='$id'");
													
                                                    while($row=mysqli_fetch_array($stmt))
                                                    { ?>
                                                <img src="imagess/<?php echo $row['menu_image_cat']; ?>" style="width: 75px; height: 75px;" class="myimg">
                                                <a href="?prod_image=<?php echo $row['id'];?>" onclick="return confirm('Are You Sure This record Product?')">
                                                <i class="glyphicon glyphicon-trash" style="font-size:20px;"></i></a>
                                                <?php } ?>
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
