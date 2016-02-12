<?php

if(empty($active))
{ $active="";
}
?>


<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button"class="toast-close-button">×</button><div class="toast-title">ledger Category</div><div class="toast-message"> </div></div></div>


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
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Ledger Category

                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View

                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                 <?php
                if(!empty($error))
				{
					echo "<div id='success' class='note note-danger alert-notification'><p>Data Already Exist</p></div>";
				}
				?>
                    <form method="post" name="add">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:40% !important;" border="0">
                        
						<tr>
                        <td><label>Group Master:</label></td>
                        <td>
						<div class="form-group">
						
						<select class="form-control input-medium" name="group_master_id" id="" required>
						<option value="">-- Select Group Master --</option>
						<?php foreach($fetch_group_master as $data){
									$group_master_id=$data['group_master'] ['id'];
									$group_master_name=$data['group_master'] ['name'];
									?>
								<option value="<?php echo $group_master_id; ?>"><?php echo $group_master_name; ?></option>
								<?php } ?>
						
						</select>						
						</div>
						</td>
                        </tr>
						
                        <tr>
                        <td><label>Name:</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Name" name="name" required></div></td>
                        </tr>
                        
                        <tr>
                        <td colspan="6"><center><button name="add_ledger_category" value="add_ledger_category"  class="btn green"><i class="fa fa-plus"></i> Add</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                
                
                
                
                
                <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_ledger_category))
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
		<th>Group Master</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_ledger_category as $data){ 
		 $i++;
		 $id=$data['ledger_category'] ['id'];
		 $group_master_id=@$data['ledger_category'] ['group_master_id'];
		  $result_group_master=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_group_master_name_by_id'), array($group_master_id));
		
		 $group_master_name=@$result_group_master[0]['group_master']['name'];
         $name=$data['ledger_category'] ['name'];
		 ?>
        <tr>
        <td><?php echo $i;?></td>
		<td><?php echo $group_master_name;?></td>
        <td><?php echo $data['ledger_category'] ['name']; ?></td>
        
        
									<td><a class="btn blue btn-xs blue" data-toggle="modal" href="#poppupser_<?php echo $id; ?>"><i class="fa fa-edit"> </i>
								Edit </a>
								<div class="modal fade bs-modal-md" id="poppupser_<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
										<div class="modal-body">
                                        <form method="post" name="edit_<?php echo $id; ?>">
                                        <div class="table-responsive">
										
                        <table class="table self-table" style=" width:50% !important;" border="0" align="center">
                        <tr>   
                        <input type="hidden" name="ledger_cat_id" value="<?php echo $id; ?>" />
                        <td><label>Name:</label></td>
                        <td align="left">
          <input type="text" class="form-control" placeholder="Caretaker Name" value="<?php echo $name; ?>" name="edit_name" id="edit_name" align="left" required></td>
                        </tr>
                        
                        <tr><td colspan="3"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_ledger_category" value="edit_ledger_category" class="btn blue">Update</button>
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
            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                            
                        </div>
                       
                        <div class="modal-footer">
                             <form method="post" name="delete<?php echo $id; ?>">
                             <input type="hidden" name="delete_ledger_cat_id" value="<?php echo $id; ?>" />

                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_ledger_category" value="delete_ledger_category" class="btn blue">Delete</button>
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
                     </div>  
                     <?php }?>  
			</div>  
    	</div>
    </div>
</div>

<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function()
        {
			var myVar=setInterval(function(){myTimerr()},4000);
			function myTimerr() 
	   {
	   $("#success").hide();
	    } 
		
	});

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