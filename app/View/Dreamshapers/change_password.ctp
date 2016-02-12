
    <div class="logo">
	<a href="<?php echo $this->webroot; ?>Nonmovinginventory/user_index"><img src="<?php echo $this->webroot; ?>images/project_logo/non-moving-logo.png" width="250" alt="NON MOVING INVENTORY"></a>
</div>
</div>
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form novalidate="novalidate" class="login-form"  method="post">
		<h3 class="form-title">Change Password</h3>
		
         <?php
		if(!empty($wrong))
		{
		?>
        <div class="alert alert-danger">
			<button class="close" data-close="alert"></button>
			<span>
			<?php echo $wrong; ?> </span>
		</div>
        <?php
		}
		?>
     
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">New password</label>
			<input class="form-control form-control-solid placeholder-no-fix" autocomplete="off" placeholder="New password" name="new_password" type="password">
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Re-type password</label>
			<input class="form-control form-control-solid placeholder-no-fix" autocomplete="off" placeholder="Re-type password" name="retype_password" type="password">
		</div>
		<div class="form-actions">
			<button type="submit" name="confirm_submit" class="btn btn-success uppercase">Confirm</button>
		
			
		</div>
		
		
	</form>
	<!-- END LOGIN FORM -->
	
	
</div>
   