<?php
require_once("function.php");
require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title> <?php title(); ?></title>
  <?php css(); ?>
  <?php  rightclick_disabled(); ?>
  <link href="assets/css/pages/login.css" rel="stylesheet" type="text/css"/>
  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->
   <style type="text/css">
.title-main {
	font-weight: 400 !important;
	color: #1CAF9A !important;
	font: 33px "PT Sans Narrow",sans-serif;
	text-transform: uppercase !important;
}
</style>  
  </head>
  <body class="login">
<!-- BEGIN LOGO -->
<div class="logo" style="padding-top:5%;">
    <span class="title-main"><span class="fa fa-exchange"></span>ATTENDANCE</span>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form  class="login-form"  id="submit_form"    method="post" >
      <?php
$message=false;
if((!empty($_POST['login_id'])) && (!empty($_POST['password'])))
{

	$result=mysql_query("select * from login where login_id='".$_POST['login_id']."' and password='".md5($_POST['password'])."'");
	if(mysql_num_rows($result)>0)
	{
		session_start();
		$row= mysql_fetch_array($result);
		$_SESSION['id']=$row['id'];
		$_SESSION['login_id']=$row['login_id'];
		$_SESSION['username']=$row['username'];
		echo "<meta http-equiv='refresh' content='0;url=index.php'/>";
	}
	else 
	{
		$message =true;	
	}
}    if($message)
       {
      ?>
    <h5 class="form-title" style="color:#ED4E2A;"><b>Login ID or Password are Incorrect</b></h5>
    <?php 
	} ?>
		<h3 class="form-title">Login to your account</h3>
	<!--	<div class="alert alert-error display-hide">
			<button class="close" data-close="alert"></button>
           
			<span>
				 Enter any username and password.
			</span>
		</div>-->
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Login Id</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text"  autocomplete="off" autofocus="autofocus" placeholder="Login Id" name="login_id"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" id="password_strength" autocomplete="off" placeholder="Password" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" name="bttn_login" style="background-color:#1CAF9A !important; border-color:#1CAF9A !important;"  class="btn btn-success pull-right">Login <i class="fa fa-sign-in"></i></button>
		</div>
		
	</form>
 
    <?php footer(); ?>
	<!-- END LOGIN FORM -->
	</div>

<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->

<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js" type="text/javascript"></script>
<script src="assets/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  App.init();
  Login.init();
});
</script>
</body>
<!-- END BODY -->

<!-- Mirrored from www.keenthemes.com/preview/conquer/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 Jan 2014 12:02:38 GMT -->
</html>