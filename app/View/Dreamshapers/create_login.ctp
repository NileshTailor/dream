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
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Create Account

                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">Edit Account

                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                       <?php
                if(!empty($error))
				{
					echo "<div id='success' class='note note-danger alert-notification'><p>This User ID Already Exist. Please Use Another User ID.!</p></div>";
				}
				?>			<form  class="form-horizontal"  id="form_sample_2"  role="form" method="post">    
                                <div class="form-body">
                                		  <div class="form-group">
													<label class="control-label col-md-3">Login ID</label>
													<div class="col-md-4">
                                                     <div class="input-icon right">
														<i class="fa"></i>
														<input class="form-control " name="login_id" type="text">
                                                        </div>
														<span class="help-block">
														Provide login id </span>
													</div>
												</div>
                                                
                                				
                                		  <div class="form-group">
													<label class="control-label col-md-3">Password</label>
													<div class="col-md-4">
                                                     <div class="input-icon right">
														<i class="fa"></i>
														<input class="form-control " name="password" type="password">
                                                        </div>
														<span class="help-block">
														Provide password</span>
													</div>
												</div>
                                
                                
                                            <div class="form-group">
													<label class="control-label col-md-3"> Username</label>
													<div class="col-md-4">
                                                     <div class="input-icon right">
														<i class="fa"></i>
														<input class="form-control "  name="username" type="text">
                                                        </div>
														<span class="help-block">
														Provide username</span>
													</div>
												</div>
                                                
                                              <div class="form-group">
													<label class="control-label col-md-3">Email ID</label>
													<div class="col-md-4">
														<input class="form-control"  name="email_id" type="text">
														<span class="help-block">
														Provide email ID </span>
													</div>
												</div>
                                                
                                                
                    
                    <div class="form-group" style="width:100%">
                    <label class="control-label col-md-3">Outlet ID</label>
                    <div class="col-md-4">                       
                    <?php  $j=0; $x=0;
                        foreach($fetch_master_outlet as $item_name)
                        { $j++; $x++;
                        $servise=$item_name['master_outlet']['outlet_name'];
                                                $outlet=$item_name['master_outlet']['id'];

                        if($j==7){ $j=1;?><?php } 
                       	?>
                         <td id="data_view<?php echo $x; ?>" >
                         <label><input name="outlet_id[]" type="checkbox" value="<?php echo $outlet; ?>" /> <?php echo $servise; ?></label>
                          </td>
                        <?php
                        }
                        ?>
                        </div>
                        </div>
            		             <div class="form-actions" style="padding-top:25px; padding-left:35px">
                                 <div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="login_reg" class="btn green "><i class="fa fa-check"></i> Submit</button>
														<button type="reset" name="" class="btn red " value="login_reg"><i class="fa fa-level-down"></i> Reset</button>
													</div>
												</div>
								 </div>		
                                 </div>				
                                </form>
                             </div>
                             
    				    	   <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                     	 <div class="table-responsive">
                                <table align="center" width="100%" border="0"><tr class="print-hide">
                                
                                 <div class="">
                          <td align="center"><select class="form-control input-small select2me"  placeholder="Select User" onchange="view_data();" name="username" id="username">
                           <option value=""></option>
                            <?php
                            foreach($fetch_login as $data)
                            {
                                ?>
                         <option value="<?php echo $data['login']['id'];?>"><?php echo $data['login']['username'];?></option>
                                <?php
                            }
                            ?>
                            </select> 
                            <span class="help-block">
														Select User Name </span></div></td>
                             
                       <!--<td><label style="margin-left:10px;"><button onclick="view_data();" class="btn green btn-sm"><i class="fa fa-search"></i> View</button></label></td>--></tr>                                </table>
                                <span style="margin-top:20px" id="view_data"></span>
                              </div>
                            </div></div></div></div></div>
                        
   
   
   <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
   $(document).ready(function()
        {
			var myVar=setInterval(function(){myTimerr()},4000);
			function myTimerr() 
	   {
	   $("#success").hide();
	    } 
		
	});
	/////////////////////////   
   function view_data()
		{var ar = [];
			
			var username=$("#username").val();
			
				$(".page-spinner-bar").removeClass("hide");
				$.ajax({
				url: "ajax_php_file?user_account_fetch=1&q="+username,
				type: "POST",         
				success: function(data)
                 {	$("#view_data").html(data);
					$(".page-spinner-bar").addClass(" hide"); //hide loading
				}
				});
			
		}
        
        </script>