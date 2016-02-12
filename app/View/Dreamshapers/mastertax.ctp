<?php

if(empty($active))
{ $active="";
}
?>


<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Master Tax</div><div class="toast-message"> </div></div></div>
</div>




<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Master Tax
                    

                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View
                    

                    </a>
                </li>
            
                
            </ul>
            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                    <form method="post" name="add">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:50% !important;">
                        <tr>
                        <td><label>Tax Name</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" required placeholder="Tax Name" name="name"></td>
                        </tr>
                        <tr>
                        <td><label>Tax Applicable&nbsp;(%)</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" required placeholder="Tax Applicable (%)" name="tax_applicable"></td>
                        </tr>
                        <tr>
                        <td colspan="2"><center><button type="submit" name="add_master_tax_name" class="btn green" value="add_master_tax_name"><i class="fa fa-plus"></i> Add</button><button type="reset" name="" class="btn red " value="add_master_tax_name"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                
                
 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_master_tax))
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
<th>Name</th>
<th>Tax Applicable</th>
<th  width="10%">Edit</th>
<th width="10%">Delete</th>
</tr>
</thead>
      
	 <tbody>
     	<?php
		$i=0;
		 foreach($fetch_master_tax as $data){ 
		 $i++;
		 $id=$data['master_tax']['id'];
         $name=$data['master_tax']['name'];
         $tax_applicable=$data['master_tax']['tax_applicable'];
		 ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['master_tax']['name'];?></td>
            <td><?php echo $data['master_tax']['tax_applicable'];?>&nbsp;%</td>         
            <td><a class="btn blue btn-xs" data-toggle="modal" href="#popuptax<?php echo $id ;?>"><i class="fa fa-edit"></i>  Edit </a>
        <div class="modal fade" id="popuptax<?php echo $id ;?>" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Update Here.!</h4>
        </div>
        <div class="modal-body">
        <div class="tab-pane fade active in" id="tab_1_2">
        <form method="post" name="popuptax<?php echo $id ;?>">
        <div class="table-responsive">
        <table class="table self-table" style=" width:100% !important;" border="0">
        <tr>
        <input type="hidden" name="editoption_tax_name" value="<?php echo $id; ?>" />
                        <td><label>Update Tax Name</label></td>
                        <td><input type="text" class="form-control input-inline input-medium"required placeholder="Tax Name" name="edit_name" id="edit_name" value="<?php echo $name;?>"></td>
                        </tr>
                        <tr>
                        <td><label>Tax Applicable&nbsp;</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" required placeholder="Tax Applicable (%)" name="edit_tax_app" id="edit_tax_app"  value="<?php echo $tax_applicable;?>"></td>
                        </tr>
                        <tr>
                <tr><td colspan="3"><center><div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit_master_tax" value="edit_master_tax" class="btn blue">Update</button>
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
                        <input type="hidden" name="deleteoption_tax_name" value="<?php echo $id; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_tax_name" value="delete_tax_name" class="btn blue">Delete</button>
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
</script>