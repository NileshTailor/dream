                                
                                <div class="portlet box green-meadow">
                                <div class="portlet-title">
                                <div class="caption">
                                <i class="fa fa-check"></i> User Rights
                                </div>
                                </div>
                                <div class="portlet-body form">
                            
                                <form  class="form-horizontal" role="form" method="post">    
								<?php
                                @$fetch_user_right=$this->requestAction(array('controller' => 'Handler', 'action' => 'user_rights'), array());
                                foreach($fetch_user_right as $data)
                                {
                                	$user_right[]=$data['user_right']['module_id'];
                                }
                                ?>
                                <div class="form-body">
                                
                                
                                      <div class="form-group">
                                                <label class="control-label col-md-3">Login ID</label>
                                                <div class="col-md-4">
                                                    <select class="form-control  user_id"  name="user_id" >
                                                    <option value="">---Select login ID---</option>
                                                    <?php
                                                    foreach($fetch_login as $data)
                                                    {
														?>
														<option value="<?php echo $data['login']['id']; ?>"><?php echo $data['login']['login_id']; ?> </option>
														<?php
                                                    }
                                                    ?>
                                                    </select>
                                                    <span class="help-block">
                                                    Provide your login id to assign rights</span>
                                                </div>
                                            </div>
                                        
                                    <div class="form-group" >
                                        <div class="" id="user_data">
                                        
                                        </div>
                                    </div>
                                    
                                            
                                </div>
                                </form>
                               
                                </div>
                                </div>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function()
{
	$('.user_id').live('change',function(){
		$(".page-spinner-bar").removeClass("hide");
		var id=$(this).val();
		$.ajax({
		url: "my_ajax?user_rights=1&user_id="+id,
		type: "POST",         
		success: function(data)
		{
			$("#user_data").html(data);
			$(".page-spinner-bar").addClass(" hide"); 
		}
		})
		
	});
	$('#check_all').live('click',function(){
		if($('#check_all').is(":checked"))
		{
			$(".check").prop('checked', true);
		}
		else
		{
			$(".check").removeAttr('checked');
		}
		
	});
		
		
});
</script>