<?php

if(empty($active))
{ $active="";
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Master Outlet</div><div class="toast-message"> </div></div></div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
               
               <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Master Outlet
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
                    	<table class="table self-table" style=" width:50% !important;">
                        <tr>
                        <td><label>Outlet Name</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" placeholder="Outlet Name" name="outlet_name" required></td>
                        </tr>
                        
                        <tr>
                        <td><label>Outlet Rate</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small" placeholder="Rate" name="rate" id="rate" ></td>
                                </tr>
                        
                        <td><label>Tax Applicable</label></td>
              <td> <select class="form-control select2 select2_sample2 input-medium" placeholder="Select Tax..." name="master_tax_id[]" multiple="multiple" required>                      <?php
                        foreach($fetch_master_tax as $data)
                                {
                                ?>
                                <option value="<?php echo $data['master_tax']['id'];?>">
                                <?php echo $data['master_tax']['name'];?>
                                <?php echo " @ "; ?><?php echo $data['master_tax']['tax_applicable'];?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                        <tr>
                        
             <td colspan="2"><center><button type="submit" name="add_master_outlet" class="btn green" value="add_master_outlet"><i class="fa fa-plus"></i> Add</button>
             <button type="reset" name="" class="btn red " value="add_master_outlet"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                    
                </div>
                
                
                
                
                
                
              <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_master_outlet))
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
        <th>Outlet Name</th>
        <th>Outlet Rate</th>
        <th>Tax Applicable</th>
         <th>Edit</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_master_outlet as $data){ 
		 $i++;
            $id_master_outlet=$data['master_outlet']['id'];
            $outlet_name=$data['master_outlet']['outlet_name'];
            $rate=$data['master_outlet']['rate'];
            $master_tax_id=$data['master_outlet']['master_tax_id'];
            $master_tax_id=explode(',', $master_tax_id);

		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['master_outlet']['outlet_name']; ?></td>
         <td><?php echo $data['master_outlet']['rate']; ?></td>
        
        
        <td><?php
            foreach($master_tax_id as $taxes)
            {
            echo @$master_tax_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_tax_fetch',$taxes), array()).' @ ';
            echo @$master_tax_fetch_idd=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_tax_fetch1',$data['master_outlet']['master_tax_id']), array()).' %, ';
            }
            ?></td>
        
            <td><a class="btn blue btn-xs" data-toggle="modal" href="#poppupout_<?php echo $id_master_outlet; ?>"><i class="fa fa-edit"></i> Edit </a>
        <div class="modal fade bs-modal-medium" id="poppupout_<?php echo $id_master_outlet; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
        <div class="modal-dialog modal-medium">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Update Here</h4>
                </div>
                <div class="modal-body">
                        <form method="post" name="poppupout_<?php echo $id_master_outlet; ?>">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:50% !important;" align="center">
                        <tr>   <input type="hidden" name="masteroutlet_id" value="<?php echo $id_master_outlet; ?>" />

                        <td><label>Outlet Name</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" placeholder="Outlet Name" name="edit_outlet_name" 
                        value="<?php echo $outlet_name; ?>" required></td>
                        </tr>
                        <tr>
                        <td><label>Outlet Rate</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small" placeholder="Rate" name="edit_rate" id="edit_rate"  value="<?php echo $rate; ?>" ></td>
                                </tr>
                        <tr><td><label>Tax Applicable</label></td> 
                    <td><div class="form-group">
                    <select class="form-control select2 select2_sample2 input-medium" placeholder="Select Tax..."  name="edit_item_tex[]" multiple="multiple" required>
                                <?php
                                foreach($fetch_master_tax as $data)
                                { $idd=$data['master_tax']['id'];
                                 ?>
                                    <option  value="<?php echo $data['master_tax']['id'];?>" <?php if(in_array($idd,$master_tax_id)){ ?> selected <?php } ?>>
                                    <?php echo $data['master_tax']['name'].' @ ';?>
                                    <?php echo $data['master_tax']['tax_applicable'];?></option>
                                <?php
                                 
                                }
                                ?>
                            </select> </div></td>
                    </tr>
                        </tr>
                       
                        
                        <tr><td colspan="2"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_master_outlet" value="edit_master_outlet" class="btn blue">Update</button>
										</div></center></td></tr>
                        </table>
                     </div>
                    </form>
                       </div>
							</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
                                </td>
                                
<td>
            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id_master_outlet; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete<?php echo $id_master_outlet; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                        </div>
                       
                        <div class="modal-footer">
                         <form method="post" name="delete<?php echo $id_master_outlet; ?>">
                        <input type="hidden" name="delete_masteroutlet_id" value="<?php echo $id_master_outlet; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_master_outlet" value="delete_master_outlet" class="btn blue">Delete</button>
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
             