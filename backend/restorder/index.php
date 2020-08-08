<!DOCTYPE html>
<html lang="en">
<?php 
include("includes/connection.php");
include("language/language.php");
include("includes/head.php");

if(isset($_SESSION['admin_name']))
{	
	header("Location:home.php");
	
	exit;
}?>
<!-- Theme JS files -->
<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/login.js"></script>
<!-- /theme JS files -->
<body class="login-container login-cover">

	<!-- Page container -->
	<div class="page-container pb-20">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Advanced login -->
				<form action="login_db.php" method="post">
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object border-warning-400 text-warning-400"><img src="imagess/thumbs/restorder-logo.png" style="height: 65px;"></div>
							<h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
						</div>
						<?php if(isset($_SESSION['msg'])){?>								
                            <div class="m-alert m-alert--outline alert alert-danger alert-dismissible" role="alert">      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>     <span><?php echo $client_lang[$_SESSION['msg']]; ?></span>    </div>
                            <?php unset($_SESSION['msg']);}?>	

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" type="text" placeholder="Username" name="username" autocomplete="off">
							<div class="form-control-feedback">
								<i class="icon-user text-muted"></i>
							</div>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="password" class="form-control" placeholder="Password" name="password">
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted"></i>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn bg-blue btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
						</div>

					</div>
				</form>
				<!-- /advanced login -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
