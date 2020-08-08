<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 

 	require_once("thumbnail_images.class.php");
	 
	 
	if(isset($_POST['submit']) and isset($_GET['add']))
	{		
			

    $qry = "SELECT * FROM tbl_users WHERE email = '".$_POST['email']."'"; 
    $result = mysqli_query($mysqli,$qry);
    $row = mysqli_fetch_assoc($result);

      if($row['email']!="")
      {
         $_SESSION['msg']="16";
         header("location:add_user.php?add=yes");   
         exit;
  			
  		}
      else
      {
          $data = array(
          'user_type'=>'Normal',  
          'name'  =>  $_POST['name'],
          'email'  =>  $_POST['email'],
          'password'  =>  $_POST['password'],
          'phone'  =>  $_POST['phone'],
          'address'  =>  addslashes($_POST['address'])
          );

          $user_qry = Insert('tbl_users',$data);

        
          $_SESSION['msg']="10";
          header("location:manage_users.php");   
          exit;
      }
	}
	
	if(isset($_GET['user_id']))
	{
			 
			$user_qry="SELECT * FROM tbl_users where id='".$_GET['user_id']."'";
			$user_result=mysqli_query($mysqli,$user_qry);
			$user_row=mysqli_fetch_assoc($user_result);
		
	}
	
	if(isset($_POST['submit']) and isset($_POST['user_id']))
	{
		  
		if($_POST['password']!="")
		{
			$data = array(
			'name'  =>  $_POST['name'],
			'email'  =>  $_POST['email'],
			'password'  =>  $_POST['password'],
			'phone'  =>  $_POST['phone'],
			'address'  =>  addslashes($_POST['address'])
			);
		}
		else
		{
			$data = array(
			'name'  =>  $_POST['name'],
			'email'  =>  $_POST['email'],			 
			'phone'  =>  $_POST['phone'],
			'address'  =>  addslashes($_POST['address'])
			);
		}
 
		
		   $user_edit=Update('tbl_users', $data, "WHERE id = '".$_POST['user_id']."'");
		 
			if ($user_edit > 0){
				
				$_SESSION['msg']="11";
				header("Location:add_user.php?user_id=".$_POST['user_id']);
				exit;
			} 	
		
	 
	}
	
	
?>
 	

 <!-- END: Left Aside -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
           
          <div class="m-content">
            <!--begin::Portlet-->
            <div class="m-portlet">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                      <?php if(isset($_GET['user_id'])){?>Edit<?php }else{?>Add<?php }?> User
                    </h3>
                  </div>
                </div>
              </div>
              <?php if(isset($_SESSION['msg'])){?> 
              <div class="m-portlet__body form-group m-form__group m--margin-top-10" style="padding-bottom: 5px; padding-top: 5px;">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                          <?php echo $client_lang[$_SESSION['msg']] ; ?>
                </div>
              </div>
              <?php unset($_SESSION['msg']);}?> 
              <!--begin::Form-->
              <form action="" name="addeditcategory" method="post" class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data">
              
                 <input  type="hidden" name="user_id" value="<?php echo $_GET['user_id'];?>" />

                <div class="m-portlet__body">
                  <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                      Name
                    </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control m-input" name="name" id="name" value="<?php if(isset($_GET['user_id'])){echo $user_row['name'];}?>" placeholder="Full Name">
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                      Email
                    </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control m-input" name="email" id="email" value="<?php if(isset($_GET['user_id'])){echo $user_row['email'];}?>" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                      Password
                    </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="password" class="form-control m-input" name="password" id="password" value="<?php if(isset($_GET['user_id'])){echo $user_row['password'];}?>" placeholder="" <?php if(!isset($_GET['user_id'])){?>required<?php }?>>
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                      Phone
                    </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control m-input" name="phone" id="phone" value="<?php if(isset($_GET['user_id'])){echo $user_row['phone'];}?>" placeholder="Phone" >
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                      Address
                    </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control m-input" name="address" id="address" value="<?php if(isset($_GET['user_id'])){echo $user_row['address'];}?>" placeholder="Address">
                    </div>
                  </div>

                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions">
                    <div class="row">
                      <div class="col-lg-9 ml-lg-auto">
                        <button type="submit" name="submit" class="btn btn-brand">
                          Save
                        </button>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <!--end::Form-->
            </div>
            <!--end::Portlet-->
          </div>
        </div>
      </div>
      <!-- end:: Body -->

        
<?php include("includes/footer.php");?>