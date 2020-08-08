<?php include("includes/header.php");

require("includes/function.php");
require("language/language.php");
require_once("thumbnail_images.class.php");
  
  $rest_qry="SELECT * FROM tbl_restaurants where id='".$_GET['restaurant_id']."'";
  $rest_result=mysqli_query($mysqli,$rest_qry);
  $rest_row=mysqli_fetch_assoc($rest_result);

  //Get restaurants cat
  $cat_qry="SELECT * FROM tbl_menu_category
      WHERE tbl_menu_category.restaurant_id='".$_GET['restaurant_id']."' 
      ORDER BY tbl_menu_category.cid DESC"; 
  $cat_result=mysqli_query($mysqli,$cat_qry);
   
  if(isset($_POST['submit']) and isset($_GET['add']))
  {
   
        if($_FILES['menu_image']['name']!="")
        {    
 
           $menu_image=rand(0,99999)."_".$_FILES['menu_image']['name'];
       
             //Main Image
           $tpath1='images/'.$menu_image;        
            $pic1=compress_image($_FILES["menu_image"]["tmp_name"], $tpath1, 80);


              $data = array(
                       'rest_id'  =>  $_POST['restaurant_id'],
                       'menu_cat'  =>  $_POST['menu_cat'],
                       'menu_name'  =>  $_POST['menu_name'],
                       'menu_info'  =>  $_POST['menu_info'],
                       'menu_price'  =>  $_POST['menu_price'],
                       'menu_image'  =>  $menu_image
                    );  
          
          }
          else
          {
              $data = array(
                       'rest_id'  =>  $_POST['restaurant_id'],
                       'menu_cat'  =>  $_POST['menu_cat'],
                       'menu_name'  =>  $_POST['menu_name'],
                       'menu_info'  =>  $_POST['menu_info'],
                       'menu_price'  =>  $_POST['menu_price']
                    );  
          }    

    $qry = Insert('tbl_menu_list',$data);  
 

    $_SESSION['msg']="10";
 
    header( "Location:manage_menu_list.php?restaurant_id=".$_POST['restaurant_id']);
    exit; 

     
    
  }
  
  if(isset($_GET['menu_id']))
  {
       
      $qry="SELECT * FROM tbl_menu_list where mid='".$_GET['menu_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

  }
  if(isset($_POST['submit']) and isset($_POST['menu_id']))
  {     
        if($_FILES['menu_image']['name']!="")
        {    


          $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_menu_list WHERE mid='.$_POST['menu_id'].'');
          $img_res_row=mysqli_fetch_assoc($img_res);
      

          if($img_res_row['menu_image']!="")
            {
                unlink('images/'.$img_res_row['menu_image']);
           }

           $menu_image=rand(0,99999)."_".$_FILES['menu_image']['name'];
       
             //Main Image
           $tpath1='images/'.$menu_image;        
            $pic1=compress_image($_FILES["menu_image"]["tmp_name"], $tpath1, 80);


              $data = array(
                       'rest_id'  =>  $_POST['restaurant_id'],
                       'menu_cat'  =>  $_POST['menu_cat'],
                       'menu_name'  =>  $_POST['menu_name'],
                       'menu_info'  =>  $_POST['menu_info'],
                       'menu_price'  =>  $_POST['menu_price'],
                       'menu_image'  =>  $menu_image
                    );  
          
          }
          else
          {
              $data = array(
                       'rest_id'  =>  $_POST['restaurant_id'],
                       'menu_cat'  =>  $_POST['menu_cat'],
                       'menu_name'  =>  $_POST['menu_name'],
                       'menu_info'  =>  $_POST['menu_info'],
                       'menu_price'  =>  $_POST['menu_price']
                    );  
          }
          
       
          $category_edit=Update('tbl_menu_list', $data, "WHERE mid = '".$_POST['menu_id']."'");
 
    $_SESSION['msg']="11"; 
    header( "Location:add_menu.php?menu_id=".$_POST['menu_id']."&restaurant_id=".$_POST['restaurant_id']);
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
                      <?php if(isset($_GET['menu_id'])){?>Edit<?php }else{?>Add<?php }?> Menu
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
              
                 <input  type="hidden" name="menu_id" value="<?php echo $_GET['menu_id'];?>" />
                 <input  type="hidden" name="restaurant_id" value="<?php echo $_GET['restaurant_id'];?>" />
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                      Menu Category
                    </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <select name="menu_cat" id="m_select1" class="form-control m-select1" required>
                        <option value="">--Select Category--</option>
                        <?php
                            while($cat_row=mysqli_fetch_array($cat_result))
                            {
                        ?>                       
                        <option value="<?php echo $cat_row['cid'];?>" <?php if(isset($_GET['menu_id']) && $cat_row['cid']==$row['menu_cat']) {?>selected<?php }?>><?php echo $cat_row['category_name'];?></option>                           
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                  </div> 
                <div class="m-portlet__body">
             
                  <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                      Menu Name
                    </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control m-input" name="menu_name" id="menu_name" value="<?php if(isset($_GET['menu_id'])){echo $row['menu_name'];}?>" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                      Menu Info
                    </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      
                      <textarea name="menu_info" id="menu_info" class="form-control m-input"><?php if(isset($_GET['menu_id'])){echo $row['menu_info'];}?></textarea>
 
                    </div>
                  </div>
                  <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                      Menu Price
                    </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="number" class="form-control m-input" name="menu_price" id="menu_price" value="<?php if(isset($_GET['menu_id'])){echo $row['menu_price'];}?>" placeholder="Enter Name">
                    </div>
                  </div> 
                  <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                      Menu Image
                    </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                                <input type="file" id="menu_image" name="menu_image" class="form-control m-input">
                                  <br/>
                                  <?php if(isset($_GET['menu_id']) and $row['menu_image']!="") {?>
                                    <img type="image" src="images/<?php echo $row['menu_image'];?>" width="150" height="100" alt="image" />                                   
                                  <?php }?>

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
