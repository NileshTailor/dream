
<?php 
 $login_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'index_layout_session'), array());

?>
<?php 
 $pass=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'index_layout_session2'), array());

?>
<?php 
 $id_login=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'index_layout_session3'), array());

?>


<?php

if(empty($active))
{ $active="";
}
?>


<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button"class="toast-close-button"></button><div class="toast-title">Create Account</div><div class="toast-message"> </div></div></div>


 <div id="message"></div>
  <div ng-spinner-bar="" class="page-spinner-bar hide">
		<div class="bounce1"></div>
		<div class="bounce2"></div>
		<div class="bounce3"></div>
	</div>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">
                    <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong>Profile</strong></h6></span>

                    </a>
                </li>
               
            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                       
      							<form  class="form-horizontal"  id="form_sample_2"  role="form" method="post">    
                                
                                <div class="form-body">
                                <div class="form-group" style="padding-left:350px">
                                <span class="help-block">
														<b>Hey!</b> Change your password here..! </span></div></div>
                                
                                <div class="form-body">
                                		  <div class="form-group">
													<label class="control-label col-md-3">Current Password</label>
													<div class="col-md-4">
                                                     <div class="input-icon right">
														<i class="fa"></i>
														<input class="form-control " name="edit_current_password" type="text">
                                                        </div>
														<span class="help-block">
														Enter your current password </span>
													</div>
                                                    
                                                    
												</div>
                                                <input type="hidden" value="<?php echo $login_name;?>">
                                                <input type="hidden" value="<?php echo $pass;?>" name="pass">
                                                <input type="hidden" value="<?php echo $id_login;?>" name="id_login" id="id_login">
                                				
                                		  <div class="form-group">
													<label class="control-label col-md-3">New Password</label>
													<div class="col-md-4">
                                                     <div class="input-icon right">
														<i class="fa"></i>
														<input class="form-control " name="edit_new_password" type="password">
                                                        </div>
														<span class="help-block">
														Provide your password</span>
													</div>
												</div>
                                 <div class="form-group">
													<label class="control-label col-md-3">Confirm Password</label>
													<div class="col-md-4">
                                                     <div class="input-icon right">
														<i class="fa"></i>
														<input class="form-control " name="edit_password" type="password">
                                                        </div>
														<span class="help-block">
														Confirm your password</span>
													</div>
												</div>
                                
                                           
            		             <div class="form-actions" style="padding-top:25px; padding-left:35px">
                                 <div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="login_reg" class="btn green"><i class="fa fa-check"></i> Submit</button>
														<button type="button" class="btn default ">Cancel</button>
													</div>
												</div>
								 </div>		
                                 </div>				
                                </form>
                             </div></div></div></div></div>