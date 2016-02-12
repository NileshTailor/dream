<?php
require_once("function.php");
require_once("config.php");
require_once("auth.php");
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title><?php title();?></title>
<?php
logo();
css();
?>
</head>

<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
<?php
nevibar_menu();
?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
        <?php
		if($db=="db")
		{
		?>
		<div class="note note-success">
            <h4> Database Export Successfully.</h4>
            <p>
                
            </p>
		</div>
		 <?php
		}
		?>					
							
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
footer();
js();?>

</body>
<!-- END BODY -->

<!-- Mirrored from www.keenthemes.com/preview/conquer/layout_sidebar_fixed.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 Jan 2014 12:02:43 GMT -->
</html>