<?php
//Get file name
      $currentFile = $_SERVER["SCRIPT_NAME"];
      $parts = Explode('/', $currentFile);
      $currentFile = $parts[count($parts) - 1];   
?>

<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-title h6">
							<span>Main navigation</span>
							
						</div>

						<div class="category-content sidebar-user">
							<div class="media">
								<a href="#" class="media-left"><img src="imagess/thumbs/restorder-logo.png" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo PROFILE_NAME;?></span>									
								</div>
							</div>
						</div>

						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								
								<li class="<?php if($currentFile=="home.php" or $currentFile=="home.php"){echo 'active';}?>"><a href="home.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li class="<?php if($currentFile=="manage_category.php" or $currentFile=="add_category.php"){echo 'active';}?>"><a href="manage_category.php"><i class="glyphicon glyphicon-cutlery"></i> <span>Menu Category</span></a></li>
								<li class="<?php if($currentFile=="manage_submenu_list.php" or $currentFile=="add_submenu.php"){echo 'active';}?>"><a href="manage_submenu_list.php"><i class="glyphicon glyphicon-cutlery"></i> <span>Menu List</span></a></li>
								
								<li class="<?php if($currentFile=="manage_bannerad.php" or $currentFile=="add_bannerad.php"){echo 'active';}?>"><a href="manage_bannerad.php"><i class="icon-images2"></i> <span>Intro Banners</span></a></li>
								<li class="<?php if($currentFile=="manage_users.php" or $currentFile=="add_user.php"){echo 'active';}?>"><a href="manage_users.php"><i class="icon-users"></i> <span>Users</span></a></li>
								<li class="<?php if($currentFile=="manage_order_list.php" or $currentFile=="manage_order_list_view.php"){echo 'active';}?>"><a href="manage_order_list.php"><i class="icon-cart-add2"></i> <span>Order List</span></a></li>
								
								<li class="<?php if($currentFile=="manage_promo_code_list.php" or $currentFile=="add_promo_code.php"){echo 'active';}?>"><a href="manage_promo_code_list.php"><i class="icon-cash2"></i> <span>Promo Code List</span></a></li>
								<li class="<?php if($currentFile=="manage_tax_value.php" or $currentFile=="add_tex.php"){echo 'active';}?>"><a href="manage_tax_value.php"><i class="icon-percent"></i> <span>Tax List</span></a></li>
								<li class="<?php if($currentFile=="manage_aboutus.php" or $currentFile=="add_aboutus.php"){echo 'active';}?>"><a href="manage_aboutus.php"><i class="icon-pencil7"></i> <span>About US</span></a></li>
								<li class="<?php if($currentFile=="send_notification.php"){echo 'active';}?>"><a href="send_notification.php"><i class="glyphicon glyphicon-bell"></i> <span>Notification</span></a></li>
								<li class="<?php if($currentFile=="settings.php"){echo 'active';}?>"><a href="settings.php"><i class="icon-cog4"></i> <span>Settings</span></a></li>
								
								
								<!-- /main -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>