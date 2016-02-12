<?php

if(empty($active))
{ $active="";
}
?>


<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Outlet-Category Mapping</div><div class="toast-message"> </div></div></div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Category Mapping
                    
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
                    <form method="post" name="add" id="add_master_table">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:50% !important;">
                      
                        <tr><td><label>Outlet Name</label></td>
                        <td><div class="form-group"><select class="form-control input-medium" name="master_outlet_id" required>
                                            <option value="">--Select--</option>
                                            <?php
                                            foreach($fetch_master_outlet as $data)
                                            {
                                            	?>
                                                <option value="<?php echo $data['master_outlet']['id'];?>"><?php echo $data['master_outlet']['outlet_name'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></div></td>
                        </tr> 
                        <tr>
                        <td><label>Category</label></td>
                        <td> <select class="form-control select2 select2_sample2 input-medium" placeholder="Select..." required="required" name="master_itemcategory_id[]" multiple="multiple">
                                <option value=""></option>
                                <?php
                                foreach($fetch_master_item_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['master_item_category']['id'];?>">
                                <?php echo $data['master_item_category']['item_category'];?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                        <td colspan="2"><center><button type="submit" name="add_mapping" class="btn green" value="add_mapping"><i class="fa fa-plus"></i> Add</button>&nbsp;&nbsp;<button type="reset" name="" class="btn red " value="add_mapping"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                    
                </div>
                        
               

 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_category_outlet_mapping))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>
				
                     <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="sample_1" width="100%">
                        <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Outlet Name</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                         </tr>
                         </thead>
                         <tbody>
                            <?php
                            $i=0;
                             foreach($fetch_category_outlet_mapping as $data)
							 { 
								 $i++;
								 $id=$data['category_outlet_mapping']['id'];
								 $master_itemcategory_id=$data['category_outlet_mapping']['master_itemcategory_id'];
                              ?>
                            
                            <tr>
                            <td><?php echo $i; ?></td>
                    <td><?php
                            echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$data['category_outlet_mapping']['master_outlet_id']), array()); ?></td> 
            <td><?php
			$mapss=$data['category_outlet_mapping']['master_itemcategory_id'];
            $mappp=explode(',', $mapss);
        //$att_id= $data['master_room']['attribute_id'];
        //$explode_data=explode(",",$att_id);
        foreach($mappp as $dataa)
        {
       		echo @$master_item_category_fatch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_item_category_fatch',$dataa), array()).',&nbsp;';
       		
       } 
	?>	
       </td>
                            
                   			<td><a class="btn blue btn-xs" data-toggle="modal" href="#edit<?php echo $id; ?>"><i class="fa fa-edit"></i> Edit</a>
                            
                              <div class="modal fade" id="edit<?php echo $id;?>" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="submit" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here.!</h4>
										</div>
										<div class="modal-body">
                      <form method="post" name="edit<?php echo $id ;?>">
                                             <div class="table-responsive">
                                         
                                                <table class="table self-table" style=" width:100% !important;" border="0">
                                                 <tr>
                                                  <input type="hidden" name="editoption_mapping" id="editoption_mapping" value="<?php echo $id; ?>" />
                                                 <td><label>Outlet Name</label></td>
                                                <td><select class="form-control input-medium" id="edit_master_outlet_id" name="edit_master_outlet_id" required>
                                                    <option value="">--Select--</option>
                                                    <?php
                                                    foreach($fetch_master_outlet as $data1)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $data1['master_outlet']['id'];?>" <?php if($data1['master_outlet']['id']==$data['category_outlet_mapping']['master_outlet_id']){ echo 'selected'; } ?>><?php echo $data1['master_outlet']['outlet_name'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select></td>
                                                </tr>
                        
                        <tr>
                        <td><label>Item Category</label></td>
                        <td> <select class="form-control select2 select2_sample2 input-medium" placeholder="Select..." required="required" name="edit_master_itemcategory_id[]" multiple="multiple" value="<?php echo $attribute_id; ?>">
                                <option value=""></option>
                                <?php
                                foreach($fetch_master_item_category as $data)
                                {
									if (in_array($data['master_item_category']['id'], $mappp)) 
						{
							$selected='selected';
						}
						else
						{
							$selected='';
						}
                    ?>
                                <option value="<?php echo $data['master_item_category']['id'];?>" <?php echo $selected; ?>>
                                    <?php echo $data['master_item_category']['item_category'];?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                        </tr>
                                                
                                           <tr><td colspan="2">
                                         <div class="modal-footer">
                                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                            <button type="submit" name="edit_mapping" value="edit_mapping" class="btn blue">Update</button>
                                        </div></td></tr></table></div></form></div></div></div></div>
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
                         <input type="hidden" name="delete_mapping_id" value="<?php echo $id; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_mapping" value="delete_mapping" class="btn blue">Delete</button>
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
<script>

function edit_table(id,sr_no)
{
	$(".page-spinner-bar").removeClass("hide"); //show loading
	var ar = [];
	var edit_outlet_id=$("#edit_outlet_id"+ id).val();
	if($("#edit_outlet_id"+ id).val()!=''){	
	var edit_table_capacity=$("#edit_table_capacity"+ id).val();
	var edit_table_no=$("#edit_table_no"+ id).val();
	ar.push(edit_outlet_id,edit_table_capacity,edit_table_no,id,sr_no);
	var myJsonString = JSON.stringify(ar);
	$.ajax({
		url: "ajax_php_file?edit_master_table=1&q="+myJsonString,
		type: "POST", 
		success: function(data)   // A function to be called if request succeeds
		{
			
			$("#"+ id).html(data);
			$(".page-spinner-bar").addClass(" hide"); //hide loading
			$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
			{
				$(this).alert('close'); 
				$(this).remove();
			});
		}
   
	});
	}
	else
	{	alert("Please Select Outlet");
		$(".page-spinner-bar").addClass(" hide"); //hide loading
	}
	
}
$(document).ready(function()
        {
			var myVar=setInterval(function(){myTimerr()},4000);
			function myTimerr() 
	   {
	   $("#success").hide();
	    } 
		
	});
/*function delete_edit_table(id)
{
	if (confirm('Do you want to delete data !') == true) 
	{
		$(".page-spinner-bar").removeClass("hide"); //show loading
		var ar = [];
		ar.push(id);
		var myJsonString = JSON.stringify(ar);
		$.ajax({
			url: "ajax_php_file?delete_edit_table=1&q="+myJsonString,
			type: "POST", 
			success: function(data)   // A function to be called if request succeeds
			{
				
				$("#"+ id).remove();
				var sr_no=0;
				$("#sample_1 >tbody >tr").each(function()
				{
					sr_no++;
					$(this).find('td:eq(0)').text(sr_no);
				});
				$(".page-spinner-bar").addClass(" hide"); //hide loading
				$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
				{
					$(this).alert('close'); 
					$(this).remove();
				});
			}
	   
		});
	}
}*/

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