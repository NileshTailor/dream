<?php

if(empty($active))
{ $active="";
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Master Currency</div><div class="toast-message"> </div></div></div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
           <ul class="nav nav-tabs">
                 <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Currency
                    

                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View
                    

                    </a>
                </li>
                
            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                    <form method="post" name="add">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:50% !important;">
                        <tr>
                        <td><label>Currency Name</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" placeholder="Currency Name" name="currency_name" required></td>
                        </tr>
                         <tr>
                        <td><label>Exchange Rate</label></td>
                        <td>
                        
                        <input type="text" class="form-control input-inline input-medium" placeholder="Exchange Rate" name="exchange_rate" required></td>
                        </tr>
                        <tr>
                        <td colspan="2"><center><button type="submit" name="add_master_currency" class="btn green" value="add_master_currency"><i class="fa fa-plus"></i> Add</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                
                
                
<div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_master_currency))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>
<table class="table table-bordered table-hover" id="sample_1">
<thead>
<tr>
<th width="10%">S. No</th>
<th>Currency Name</th>
<th>Exchange rate</th>
<th  width="10%">Edit</th>
<th width="10%">Delete</th>
</tr>
</thead>
      
	 <tbody>
     	<?php
		$i=0;
		 foreach($fetch_master_currency as $data){ 
		 $i++;
		 $id=$data['master_currency']['id'];
         $currency_name=$data['master_currency']['currency_name'];
         $exchange_rate=$data['master_currency']['exchange_rate'];
		 ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['master_currency']['currency_name'];?></td>
            <td><?php echo $data['master_currency']['exchange_rate'];?></td>         
            <td><a class="btn blue btn-xs" data-toggle="modal" href="#popupcur<?php echo $id ;?>"><i class="fa fa-edit"></i> Edit </a>
                                      
        <div class="modal fade" id="popupcur<?php echo $id ;?>" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Update Here.!</h4>
        </div>
        
        <div class="modal-body">
        <div class="tab-pane fade active in" id="tab_1_2">
        <form method="post" name="popupcur<?php echo $id ;?>">
        <div class="table-responsive">
        <table class="table self-table" style=" width:100% !important;" border="0">
        <tr>
        
        <input type="hidden" name="mastercur_id" value="<?php echo $id; ?>" />
        
                        <td><label>Currency Name</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" placeholder="Currency Name" name="edit_currency" id="edit_currency" value="<?php echo $currency_name; ?>" required></td>
                        </tr>
                        <tr>
                        <td><label>Exchange Rate</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" placeholder="Exchange Rate" name="edit_rate" id="edit_rate" value="<?php echo $exchange_rate; ?>" required></td>
                        </tr>
        
         <tr><td colspan="3"><center><div class="modal-footer">
                                                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="edit_master_currency" value="edit_master_currency" class="btn blue">Update</button>
                                                </div></center></td></tr>      
                        </table>
                </div>
                </form>
                </div></div>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div></td>
                            
        <td>
            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete<?php echo $id ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                        </div>
                        <div class="modal-footer">
                        <form method="post" name="delete<?php echo $id ;?>">
                        <input type="hidden" name="delete_mastercur_id" value="<?php echo $id; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_master_currency" value="delete_master_currency" class="btn blue">Delete</button>
</form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
       </td>
        </tr>
        
        <?php } ?>
     </tbody>
</table> 
                  </div>

                </div>
                <?php }?>
			</div>  
    	</div>
    </div>
</div>
                        
                



<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script>
		$(document).ready(function(){
	<?php
	if($active==2 || $active==1)
	{ 
		if($active==2)
		{
			if(@$active_delete==1)
			{
				$contain="Delete successfully...!";
				$cls='toast-error';
			}
			else
			{
				$contain="Update successfully...!";
				$cls='toast-info';
			}
		}
		else
		{
			$contain="Add successfully...!";
			$cls='toast-success';
		}
	?>
	$(".toast").addClass("<?php echo $cls; ?>");
	$(".toast-message").html("<?php echo $contain; ?>");
	 $("#toast-container").show();
	  var myVar=setInterval(function(){myTimer()},5000);
	   function myTimer() 
	   { $("#toast-container").hide(); }  
	<?php } ?>
});

/*		$(document).ready(function()
		{
			////////////////////////
			$("#save_delete").click(function(){
			 //setInterval(function(){
				 $('#delete').hide();
			 //},5000);
			 
    });
			///////////////////////////
			
			
$("#delete_mcc").on('submit',(function(e) 
            {
				e.preventDefault();
					$(".page-spinner-bar").removeClass("hide"); //show loading
					
					var deleteoption_currency=$("select[name=deleteoption_currency]").val();
					$.ajax({
						url: "ajax_php_file?delete_mcc=1&q="+deleteoption_currency,
						type: "POST", 
						success: function(data)   // A function to be called if request succeeds
						{
							
													$(".page-spinner-bar").addClass(" hide"); //hide loading
	
							
							$('#edit_m_c')[0].reset();
							$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Deleted Successfully...!!</p></div>");
							$("#editoption_currency").html(data);
							$("#deleteoption_currency").html(data);
							$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
							{
								$(this).alert('close'); 
								$(this).remove();
							});
							
						}
				   
					});
			
			
			}));
		});*/
		</script>