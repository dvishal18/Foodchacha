<!DOCTYPE html>
<html lang="en">
<?php
require("language/language.php");
require("includes/function.php");
include("includes/head.php");

?>
<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js">
</script><script type="text/javascript" src="assets/js/core/app.js">
</script><script type="text/javascript" src="assets/js/pages/datatables_basic.js">
</script><script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/js/pages/editor_ckeditor.js"></script>

<?php 
include("includes/header.php");


$qry="SELECT * FROM tbl_settings where id='1'";

$result=mysqli_query($mysqli,$qry);

$settings_row=mysqli_fetch_assoc($result);

if($_SESSION['id']!=2)
{ 
if(isset($_POST['submit']))
{
    $img_res=mysqli_query($mysqli,"SELECT * FROM tbl_settings WHERE id='1'");
    $img_row=mysqli_fetch_assoc($img_res);
	
	if($_FILES['app_logo']['name']!="")	
	{        
		unlink('imagess/'.$img_row['app_logo']);
		
		$app_logo=$_FILES['app_logo']['name'];
		
		$pic1=$_FILES['app_logo']['tmp_name'];
		
		$tpath1='imagess/'.$app_logo; 
		
		copy($pic1,$tpath1);
		
		$data = array(      
		'app_name'  =>  $_POST['app_name'],
		'app_logo'  =>  $app_logo,  
		'app_description'  => addslashes($_POST['app_description']),
		'app_version'  =>  $_POST['app_version'],
		'app_author'  =>  $_POST['app_author'],
		'app_contact'  =>  $_POST['app_contact'],
		'app_email'  =>  $_POST['app_email'],   
		'app_website'  =>  $_POST['app_website'],
		'app_developed_by'  =>  $_POST['app_developed_by']);
	}	
	else	
	{		 
		$data = array(		
		'app_name'  =>  $_POST['app_name'],		   		
		'app_description'  => addslashes($_POST['app_description']),
		'app_version'  =>  $_POST['app_version'],
		'app_author'  =>  $_POST['app_author'],
		'app_contact'  =>  $_POST['app_contact'],
		'app_email'  =>  $_POST['app_email'],   
		'app_website'  =>  $_POST['app_website'],
		'app_developed_by'  =>  $_POST['app_developed_by']               
			);
	} 
		$settings_edit=Update('tbl_settings', $data, "WHERE id = '1'"); 
		
		if ($settings_edit > 0)
		{    
				$_SESSION['msg']="11";
				 header( "Location:settings.php");
				 exit;
		}   
}
if(isset($_POST['api_submit']))
{   
	$data = array(
	
	'api_latest_limit'  =>  $_POST['api_latest_limit'],
    'api_cat_order_by'  =>  $_POST['api_cat_order_by'],
    'api_cat_post_order_by'  =>  $_POST['api_cat_post_order_by'] 
     
	 );
      $settings_edit=Update('tbl_settings', $data, "WHERE id = '1'");
	  
	if ($settings_edit > 0)
	{    
		$_SESSION['msg']="11";
		header( "Location:settings.php");
		exit;
	}   
}
if(isset($_POST['app_pri_poly']))
{    
	$data = array(
    'app_privacy_policy'  =>  addslashes($_POST['app_privacy_policy'])
	);
      $settings_edit=Update('tbl_settings', $data, "WHERE id = '1'");
	  
	if ($settings_edit > 0)
	{    
		$_SESSION['msg']="11";
	   header( "Location:settings.php");
	   exit;
	}   
}
if(isset($_POST['app_terms_con']))
{    
	$data = array(
	
    'app_terms_conditions'  =>  addslashes($_POST['app_terms_conditions'])
	
      );
	  
    $settings_edit=Update('tbl_settings', $data, "WHERE id = '1'"); 
	
	$_SESSION['msg']="11";  
	
	header( "Location:settings.php");
	
   exit;
}  
if(isset($_POST['app_email_config'])) 
{    
	$data = array(
	
    'app_from_email'  =>  $_POST['app_from_email'],
	
    'app_admin_email'  =>  $_POST['app_admin_email'] 
	
      );
		$settings_edit=Update('tbl_settings', $data, "WHERE id = '1'");
	  
        $_SESSION['msg']="11";
		
        header( "Location:settings.php");
        exit;
		
}  
 if(isset($_POST['notification_settings']))  
 {        
		$data = array(                
		'onesignal_app_id' => $_POST['onesignal_app_id'],
		
		/* 'onesignal_rest_key' => $_POST['onesignal_rest_key'], */
		
		);          
		$settings_edit=Update('tbl_settings', $data, "WHERE id = '1'"); 
		$_SESSION['msg']="11";       
		header( "Location:settings.php");        
		exit;  
 }
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
				<h4><span class="text-semibold">Manage  </span> - Settings</h4>
			</div>
		</div>
	</div>
	<!-- /page header -->

<div class="page-container">	
	<div class="page-content">		
	<?php include("includes/sidebar.php");?>		
	<div class="content-wrapper">			
		<div class="page-header page-header-default">				
			<div class="page-header-content">					
			<div class="page-title">						
			<h4><span class="text-semibold">Manage</span> Settings</h4>					
			</div>										
						
			</div>				
					
		</div>			
	<div class="content">				
	<div class="panel panel-flat">						
	<div class="panel-heading">																				
	</div>						
	<?php if(isset($_SESSION['msg'])){?>						  
	<div class="alert alert-success no-border">								
	<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>								
	<span class="text-semibold"><?php echo $client_lang[$_SESSION['msg']] ; ?></span> 						
	</div>						<?php unset($_SESSION['msg']);}?>           
	<!-- Horizontal form options -->            
	<div class="row">            
	<div class="col-md-12">
                  <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                      <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                          <a class="nav-link m-tabs__link active" data-toggle="tab" href="#app_settings_tab_1" role="tab">
                            <i class="flaticon-share m--hide"></i>
                            App Settings
                          </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                          <a class="nav-link m-tabs__link" data-toggle="tab" href="#app_email_config" role="tab">
                             Email Settings
                          </a>
                        </li>												 
						<li class="nav-item m-tabs__item">                          
						<a class="nav-link m-tabs__link" data-toggle="tab" href="#notification_settings" role="tab">
							Notification Settings</a>
						</li>
                        <li class="nav-item m-tabs__item">
                          <a class="nav-link m-tabs__link" data-toggle="tab" href="#app_settings_tab_2" role="tab">
                             API Settings
                          </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                          <a class="nav-link m-tabs__link" data-toggle="tab" href="#app_settings_tab_3" role="tab">
                             App Privacy Policy
                          </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                          <a class="nav-link m-tabs__link" data-toggle="tab" href="#app_settings_tab_4" role="tab">
                             App Terms Conditions
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="tab-content">					
				  <div class="tab-pane active" id="app_settings_tab_1">
                      <form class="form-horizontal" action="settings.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                        <div class="form-group">
                           <label class="col-lg-3 control-label">
                              App Name
                            </label>
                          <div class="col-lg-9">
                              <input class="form-control m-input" type="text" name="app_name" value="<?php echo $settings_row['app_name'];?>">
                            </div>
                        </div>
                          <div class="form-group">
                             <label class="col-lg-3 control-label">App Description :-</label>
                              <div class="col-lg-9">
                                <textarea name="app_description" id="app_description" rows="5" cols="5" class="form-control"><?php echo stripslashes($settings_row['app_description']);?></textarea>
								<script>CKEDITOR.replace( 'app_description' );</script>
                              </div>
                          </div>
                          <div class="form-group">                
                               <label class="col-lg-3 control-label">App Version :-</label>
                              <div class="col-lg-9">
                                <input type="text" name="app_version" id="app_version" value="<?php echo $settings_row['app_version'];?>" class="form-control">
                              </div>
                            </div>
                            <div class="form-group"> 
                              <label class="col-lg-3 control-label">Author :-</label>
                             <div class="col-lg-9">
                                <input type="text" name="app_author" id="app_author" value="<?php echo $settings_row['app_author'];?>" class="form-control">
                              </div>
                            </div>
                             <div class="form-group">
                              <label class="col-lg-3 control-label">Contact :-</label>
                              <div class="col-md-9">
                                <input type="text" name="app_contact" id="app_contact" value="<?php echo $settings_row['app_contact'];?>" class="form-control">
                              </div>
                            </div>     
                            <div class="form-group">
                              <label class="col-lg-3 control-label">Email :-</label>
                              <div class="col-md-9">
                                <input type="text" name="app_email" id="app_email" value="<?php echo $settings_row['app_email'];?>" class="form-control">
                              </div>
                            </div>                 
                             <div class="form-group">
                               <label class="col-lg-3 control-label">Website :-</label>
                              <div class="col-md-9">
                                <input type="text" name="app_website" id="app_website" value="<?php echo $settings_row['app_website'];?>" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-3 control-label">Developed By :-</label>
                              <div class="col-md-9">
                                <input type="text" name="app_developed_by" id="app_developed_by" value="<?php echo $settings_row['app_developed_by'];?>" class="form-control">
                              </div>
                            </div> 							 <div class="text-right">								<button type="submit" name="submit" class="btn btn-primary">Save changes <i class="icon-arrow-right14 position-right"></i></button>								 							  </div>
                            
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane" id="app_email_config">
                      <form class="form-horizontal" action="settings.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                         <div class="form-group">
                              <label class="col-lg-3 control-label">Server Email :-<br><small>Domain email E.g.: info@example.com</small></label>
                              <div class="col-md-9">
                                <input type="email" name="app_from_email" id="app_from_email" value="<?php echo $settings_row['app_from_email'];?>" class="form-control" required>
                              </div>
                            </div>
                          <div class="form-group">
                             <label class="col-lg-3 control-label">Order Notification Email :-</label>
                              <div class="col-md-9">
                                <input type="email" name="app_admin_email" id="app_admin_email" value="<?php echo $settings_row['app_admin_email'];?>" class="form-control" required>
                              </div>
                            </div>       														
							<div class="text-right">                                
							<button type="submit" name="app_email_config" class="btn btn-primary"> Save changes<i class="icon-arrow-right14 position-right"></i></button>                              </div>
                           
                        </div>
                      </form>
                    </div>										 
					<div class="tab-pane" id="notification_settings">                      
						<form class="form-horizontal" action="settings.php" method="post" enctype="multipart/form-data">
							<div class="panel-body">                         
								<div class="form-group">                    
									<label class="col-md-3 control-label">OneSignal App ID :-</label>                    
									<div class="col-md-6">                      
									<input type="text" name="onesignal_app_id" id="onesignal_app_id" value="<?php echo $settings_row['onesignal_app_id'];?>" class="form-control">                    
									</div>                  
								</div>                  
								<!--<div class="form-group">                    
									<label class="col-md-3 control-label">OneSignal Rest Key :-</label>                    
									<div class="col-md-6">                      
									<input type="text" name="onesignal_rest_key" id="onesignal_rest_key" value="<?php echo $settings_row['onesignal_rest_key'];?>" class="form-control">                    
									</div>                  
								</div> -->     												
								<div class="text-right">						
									<button type="submit" name="notification_settings" class="btn btn-primary"> Save changes<i class="icon-arrow-right14 position-right"></i></button>					  
								</div>                                                   
								</div>                      
						</form>                   
					</div>
                    <div class="tab-pane" id="app_settings_tab_2">
						<form class="form-horizontal" action="settings.php" method="post" enctype="multipart/form-data">
							<div class="panel-body">
							 <div class="form-group">
							   <label class="col-lg-3 control-label">Latest Limit</label>							   								<div class="col-lg-9">
								  <input class="form-control m-input" type="text" name="api_latest_limit" value="<?php echo $settings_row['api_latest_limit'];?>">
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-lg-3 control-label">Program List Order By</label>
								<div class="col-lg-9">
								  <select class="form-control m-input" name="api_cat_order_by" id="api_cat_order_by">
									<option value="pid" <?php if($settings_row['api_cat_order_by']=='pid'){?>selected<?php }?>>ID</option>
									<option value="program_name" <?php if($settings_row['api_cat_order_by']=='program_name'){?>selected<?php }?>>Name</option>
									</select>
								</div>
							  </div>
							 <div class="form-group">
								 <label class="col-lg-3 control-label">Program Video Order</label>
								<div class="col-lg-9">
								  <select class="form-control m-input" name="api_cat_post_order_by" id="api_cat_post_order_by">
								<option value="ASC" <?php if($settings_row['api_cat_post_order_by']=='ASC'){?>selected<?php }?>>ASC</option>
								<option value="DESC" <?php if($settings_row['api_cat_post_order_by']=='DESC'){?>selected<?php }?>>DESC</option>
								</select>
								</div>
							  </div>							  
							  <div class="text-right">									
							  <button type="submit" name="api_submit" class="btn btn-primary">Save changes<i class="icon-arrow-right14 position-right"></i></button></div>
							</div> 
                        </form>
                    </div>
                    <div class="tab-pane" id="app_settings_tab_3">						
                        <form class="form-horizontal" action="settings.php" method="post" enctype="multipart/form-data">
							<div class="panel-body">															
							<div class="form-group">
								  <label class="col-lg-3 control-label">App Privacy Policy :-</label>
								   <div class="col-lg-9">
									<textarea name="app_privacy_policy" id="app_privacy_policy" rows="5" cols="5" ><?php echo stripslashes($settings_row['app_privacy_policy']);?></textarea>
									<script>CKEDITOR.replace( 'app_privacy_policy' );</script>
								  </div>
							  </div>							  
							  <div class="text-right">									
							  <button type="submit" name="app_pri_poly" class="btn btn-primary">Save changes<i class="icon-arrow-right14 position-right"></i></button></div>
							</div>
                        </form>
                    </div>
                    <div class="tab-pane" id="app_settings_tab_4">
						<form class="form-horizontal" action="settings.php" method="post" enctype="multipart/form-data">
							<div class="panel-body">
							  <div class="form-group">
								  <label class="col-lg-3 control-label">App Terms Conditions :-</label>
								   <div class="col-lg-9">
									<textarea name="app_terms_conditions" id="app_terms_conditions" rows="5" cols="5" class="form-control"><?php echo stripslashes($settings_row['app_terms_conditions']);?></textarea>
									<script>CKEDITOR.replace( 'app_terms_conditions' );</script>
								  </div>
							  </div>							  									
							  <div class="text-right"><button type="submit" name="app_terms_con" class="btn btn-primary">Save changes<i class="icon-arrow-right14 position-right"></i></button></div>
							</div>
						</form>
                    </div>
					</div>           
					</div>			
					<?php include("includes/footer.php");?>			
					</div>		
					</div>	
					</div>
					</div>
					</div>
					</div>

</body>
</html>