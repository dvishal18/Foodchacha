<?php include("includes/header.php");

$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
          <!-- BEGIN: Subheader -->
          <div class="m-subheader ">
            <div class="d-flex align-items-center">
              <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                  Example API urls
                </h3>
                
              </div>
              <div>
                
              </div>
            </div>
          </div>
          <!-- END: Subheader -->
          <div class="m-content">
            
            <div class="m-portlet m-portlet--mobile">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                      Example API urls
                    </h3>
                  </div>
                </div>
                <div class="m-portlet__head-tools">
                   
                </div>
              </div>
              <div class="m-portlet__body">
                 
                <!--begin: Datatable -->
                <div class="m_datatable" id="local_data">
                      <pre><code class="html"><b>App Details</b><br><?php echo $file_path."api.php"?>                      
                      <br><br><b>Home</b><br><?php echo $file_path."api.php?home"?>
					  <br><br><b>User Login</b><br><?php echo $file_path."user_login_api.php?email=john@gmail.com&password=123456"?>
					  <br><br><b>User Register</b>(Post Method Tags:name,email,password,phone,user_image)<br><?php echo $file_path."user_register_api.php"?>
					  <br><br><b>Forgot Password</b><br><?php echo $file_path."user_forgot_pass_api.php?email=john@gmail.com"?>
                      <br><br><b>Cat List</b><br><?php echo $file_path."api.php?cat_list"?>
					  <br><br><b>Menu Category List</b><br><?php echo $file_path."api.php?menucat_list"?>
					  <br><br><b>Slider Banner List</b><br><?php echo $file_path."api.php?slider_list"?>
					  <br><br><b>User Profile</b><br><?php echo $file_path."user_profile_api.php?id=2"?>
					  <br><br><b>User Profile Update</b>(Post Method Tags:user_id,name,email,password,phone,address,user_image)<br><?php echo $file_path."user_profile_update_api.php"?>
					  <br><br><b>Menu List by Cat ID</b><br><?php echo $file_path."api.php?menu_list_cat_id=5"?>
                      <br><br><b>Restaurants List By Cat ID</b><br><?php echo $file_path."api.php?cat_id=1"?>
                      <br><br><b>Restaurants List By Top Rated</b><br><?php echo $file_path."api.php?top_rated"?>
                      <br><br><b>Restaurants Details</b><br><?php echo $file_path."api.php?restaurant_id=2"?>
                      <br><br><b>All Restaurants List </b><br><?php echo $file_path."api.php?all_restaurants"?>
                      <br><br><b>Restaurants Menu Cat List</b><br><?php echo $file_path."api.php?menu_cat=2"?>
                      <br><br><b>Cart List</b><br><?php echo $file_path."api_cart_list.php?user_id=2"?>
					  <br><br><b>Add Cart</b><br><?php echo $file_path."api_cart_add.php?user_id=49&rest_id=4&menu_id=1&menu_name=Aloo Paratha&menu_qty=3&menu_price=20"?>
                      <br><br><b>Cart Add/Update</b><br><?php echo $file_path."api_cart_add_update.php?user_id=2&rest_id=2&menu_id=1&menu_name=menu1&menu_qty=1&menu_price=1"?>
                      <br><br><b>Cart Item Delete</b><br><?php echo $file_path."api_cart_item_delete.php?cart_id=2"?>
                      <br><br><b>Order Placed</b><br><?php echo $file_path."api_order_add.php?user_id=4&order_address=rajkot&order_comment=test&cat_ids=3,6"?>
                      <br><br><b>Order List</b><br><?php echo $file_path."api_user_order_list.php?user_id=4"?>
					  <br><br><b>User FB Register</b><br><?php echo $file_path."user_register_fb_api.php?name=kuldip&email=kuldip@viaviweb.com&phone=1234567891&fb_id=12345678&user_image=URL"?> 
					  <br><br><b>User Gplus Register</b><br><?php echo $file_path."user_register_gplus_api.php?name=kuldip123&email=kuldip123@viaviweb.com&phone=1234567891&gplus_id=1234567"?> 					  
					  <br><br><b>User Twitter Register</b><br><?php echo $file_path."user_register_twiter_api.php?name=kuldippatel&email=kuldip235@viaviweb.com&phone=1234567891&twiter_id=12345"?> 
                      <br><br><b>Rating</b><br><?php echo $file_path."api_rating.php?user_id=1&rate=4&msg=test&restaurant_id=1"?>

                     </code></pre>
          

                </div>
          

                <!--end: Datatable -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end:: Body -->
        
<?php include("includes/footer.php");?>       
