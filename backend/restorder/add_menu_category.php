<?php include("includes/header.php");

require("includes/function.php");
require("language/language.php");
require_once("thumbnail_images.class.php");
  
  $rest_qry="SELECT * FROM tbl_restaurants where id='".$_GET['restaurant_id']."'";
  $rest_result=mysqli_query($mysqli,$rest_qry);
  $rest_row=mysqli_fetch_assoc($rest_result);
   
  if(isset($_POST['submit']) and isset($_GET['add']))
  {
   
       $data = array( 
         'restaurant_id'  =>  $_POST['restaurant_id'],
         'category_name'  =>  $_POST['category_name']
           );    

    $qry = Insert('tbl_menu_category',$data);  
 

    $_SESSION['msg']="10";
 
    header( "Location:manage_menu_category.php?restaurant_id=".$_POST['restaurant_id']);
    exit; 

     
    
  }
  
  if(isset($_GET['cat_id']))
  {
       
      $qry="SELECT * FROM tbl_menu_category where cid='".$_GET['cat_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

  }
  if(isset($_POST['submit']) and isset($_POST['cat_id']))
  {
      
        $data = array(
                 'restaurant_id'  =>  $_POST['restaurant_id'],
                 'category_name'  =>  $_POST['category_name']
              );  
 
    $category_edit=Update('tbl_menu_category', $data, "WHERE cid = '".$_POST['cat_id']."'");
 
    $_SESSION['msg']="11"; 
    header( "Location:add_menu_category.php?cat_id=".$_POST['cat_id']."&restaurant_id=".$_POST['restaurant_id']);
    exit;
 
  }
 

?>       


        <div class="m-grid__item m-grid__item--fluid m-wrapper">
          <!-- BEGIN: Subheader -->
          <div class="m-subheader ">
            <div class="d-flex align-items-center">
              <div class="mr-auto">
                <h3 class="m-subheader__title ">
                  Restaurant : <?php echo $rest_row['restaurant_name'];?>
                </h3>
              </div>
              <div>
                 
              </div>
            </div>
          </div>
          <!-- END: Subheader -->
          <div class="m-content">
            <div class="row">
              <div class="col-lg-3">
                <div class="m-portlet m-portlet--full-height ">
                  <div class="m-portlet__body">
                    <div class="m-card-profile">
                      <div class="m-card-profile__title m--hide">
                        Your Dashboard
                      </div>
                      <div class="m-card-profile__pic">
                        <div class="m-card-profile__pic-wrapper">
                          <img src="images/<?php echo $rest_row['restaurant_image'];?>" alt=""/>
                        </div>
                      </div>
                      <div class="m-card-profile__details">
                        <span class="m-card-profile__name">
                          <?php echo $rest_row['restaurant_name'];?>
                        </span>
                         
                          <?php echo $rest_row['restaurant_address'];?>
                         
                      </div>
                    </div>
                    <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                      <li class="m-nav__separator m-nav__separator--fit"></li>
                      <li class="m-nav__section m--hide">
                        <span class="m-nav__section-text">
                          Section
                        </span>
                      </li>
                       <li class="m-nav__item">
                        <a href="restaurant_view.php?restaurant_id=<?php echo $rest_row['id'];?>" class="m-nav__link">
                          <i class="m-nav__link-icon fa fa-dashboard "></i>
                          <span class="m-nav__link-text">
                            Dashboard
                          </span>
                        </a>
                      </li>                       
                      <li class="m-nav__item">
                        <a href="manage_menu_category.php?restaurant_id=<?php echo $rest_row['id'];?>" class="m-nav__link">
                          <i class="m-nav__link-icon flaticon-share"></i>
                          <span class="m-nav__link-text">
                            Menu Category
                          </span>
                        </a>
                      </li>
                      <li class="m-nav__item">
                        <a href="manage_menu_list.php?restaurant_id=<?php echo $rest_row['id'];?>" class="m-nav__link">
                          <i class="m-nav__link-icon flaticon-chat-1"></i>
                          <span class="m-nav__link-text">
                            Menu List
                          </span>
                        </a>
                      </li>
                      <li class="m-nav__item">
                        <a href="manage_rest_order_list.php?restaurant_id=<?php echo $rest_row['id'];?>" class="m-nav__link">
                          <i class="m-nav__link-icon fa fa-cart-arrow-down"></i>
                          <span class="m-nav__link-text">
                            Order List
                          </span>
                        </a>
                      </li>
                       
                    </ul>
                    <div class="m-portlet__body-separator"></div>
                    
                  </div>
                </div>
              </div>
              <div class="col-lg-9">
                 <div class="m-content">
            <!--begin::Portlet-->
            <div class="m-portlet">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                      <?php if(isset($_GET['cat_id'])){?>Edit<?php }else{?>Add<?php }?> Menu Category
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
              
                 <input  type="hidden" name="cat_id" value="<?php echo $_GET['cat_id'];?>" />
                 <input  type="hidden" name="restaurant_id" value="<?php echo $_GET['restaurant_id'];?>" />

                <div class="m-portlet__body">
             
                  <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                      Category Name
                    </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control m-input" name="category_name" id="category_name" value="<?php if(isset($_GET['cat_id'])){echo $row['category_name'];}?>" placeholder="Enter Category Name">
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
          </div>
        </div>
      </div>
      <!-- end:: Body -->

        
<?php include("includes/footer.php");?>       
