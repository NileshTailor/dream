<?php

if(empty($active))
{ $active="";
}
?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Master Steward</div><div class="toast-message"> </div></div></div>
</div>

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
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Steward
                    

                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View
                    

                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                    <form method="post" name="add"  id="roomtype_addform">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:40% !important;" border="0">
                        
                        <tr>
                        <td><label>Steward Name:</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Steward Name" name="steward_name" id="steward_name" required></div></td>
                        </tr>
                        
                        <tr>
                        <td><label>Contact No.:</label></td>
                         <td>
                         <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-mobile-phone"></i>
											</span>
                         <input type="text" class="form-control" style="width:82%" placeholder="Contact No." name="steward_mobile_no" id="steward_mobile_no" maxlength="10"></div></td>
                        </tr>
                        <tr>
                        <td colspan="6"><center><button name="add_master_steward" value="add_master_steward"  class="btn green"><i class="fa fa-plus"></i> Add</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_master_steward))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>
                     	 <div class="table-responsive">

  <table class="table table-bordered table-hover" id="sample_1">
	<thead>
    <tr>
        <th>S. No</th>
        <th>Steward Name</th>
        <th>Contact Number</th>
        <th>Edit</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_master_steward as $data){ 
		 $i++;
		 $id_master_steward=$data['master_steward'] ['id'];

        $steward_name=$data['master_steward'] ['steward_name'];
        $steward_mobile_no=$data['master_steward'] ['steward_mobile_no'];
        
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['master_steward'] ['steward_name']; ?></td>
        <td><?php echo $data['master_steward'] ['steward_mobile_no']; ?></td>
        
        
            <td><a class="btn blue btn-xs" data-toggle="modal" href="#poppupser_<?php echo $id_master_steward; ?>"><i class="fa fa-edit"></i> Edit </a>
        <div class="modal fade bs-modal-md" id="poppupser_<?php echo $id_master_steward; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
										<div class="modal-body">
                                        <form method="post" name="edit_<?php echo $id_master_steward; ?>">
                                        <div class="table-responsive">
										
                        <table class="table self-table" style=" width:50% !important;" border="0" align="center">
                        <tr>   
                        <input type="hidden" name="msteward_id" value="<?php echo $id_master_steward; ?>" />
                        <td><label>Steward Name:</label></td>
                        <td align="left"><input type="text" class="form-control input-medium" placeholder="Steward Name" value="<?php echo $steward_name; ?>" name="edit_steward_name" id="edit_steward_name" align="left" required></td>
                        </tr>
                        <tr>
                        <td><label>Contact No.:</label></td>
                        <td>
                        <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-mobile-phone"></i>
											</span>
                        <input type="text" class="form-control" style="width:97%" placeholder="Contact No." name="edit_steward_mobile_no" id="edit_steward_mobile_no"                        value="<?php echo $steward_mobile_no; ?>" maxlength="10"></div></td>
                        </tr>
                        
                        
                        <tr><td colspan="3"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_master_steward" value="edit_master_steward" class="btn blue">Update</button>
										</div></center></td></tr>
                       
                        </table>

										</div></form></div>
										
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
                                </td>
                                
<td>
            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id_master_steward; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            <div class="modal fade" id="delete<?php echo $id_master_steward; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                        </div>
                       
                        <div class="modal-footer">
                             <form method="post" name="delete<?php echo $id_master_steward; ?>">
                             <input type="hidden" name="delete_msteward_id" value="<?php echo $id_master_steward; ?>" />

                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_master_steward" value="delete_master_steward" class="btn blue">Delete</button>
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
             
                     </div> <?php }?>   
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

</script>


