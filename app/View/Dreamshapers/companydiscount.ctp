<?php

if(empty($active))
{ $active="";
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Company Discount</div><div class="toast-message"> </div></div></div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">
                    
<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong>Add Company Discount</strong></h6></span>

                     </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab"> 
                    
<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong>View</strong></h6></span>

                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                    <form method="post" name="add" id="add_company_discount">
                    
                    
                         
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:50% !important;">
                        <tr><td colspan="2"><div class="form-group">
										<div class="radio-list" >
											<label class="radio-inline">
											<!--<input type="radio" name="rcc" id="rcc" value="direct"  style="margin-left:4px;">&nbsp;&nbsp;&nbsp;&nbsp;Company Category Wise	</label>-->	
											<label class="radio-inline">
											<input type="radio" name="rcc" id="rcn" value="company" checked="checked"> Company Name Wise</label>
										</div>
						                </div>
                        </td>
                        </tr>
                        
                       <tr id="company_category_idd" style="display:none">
                        <td><label>Company Category</label></td>
                        <td><div class="form-group"><select class="form-control input-medium" name="company_category_id"  >
                                            <option value="">-- Select --</option>
                                            <?php
                                            foreach($fetch_company_category as $data)
                                            {
                                            	?>
                                                <option value="<?php echo $data['company_category']['id'];?>"><?php echo $data['company_category']['category_name'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></div></td>
                                            
                        </tr>
                        
                        
                       
                        <tr id="company_name_idd"><td><label>Company Name</label></td>
                        <td><div class="form-group"> <select class="form-control input-medium" name="company_name_id" id="company_name_idd" >
                                            <option value="">-- Select --</option>
                                            <?php
                                            foreach($fetch_company_registration as $data)
                                            {
                                            	?>
                                                <option value="<?php echo $data['company_registration']['id'];?>"><?php echo $data['company_registration']['company_name'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></div></td>
                                            
                        </tr>
                        
                        
                        <tr>
                                              
                                               <td><label>Room Type</label></td>
                                            <td><div class="form-group"><select class=" form-control input-medium" 
                                            name="room_type_id">
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_master_room_type as $data)
                                            {
                                            	?>
                                                <option value="<?php echo $data['master_room_type']['id'];?>"><?php echo $data['master_room_type']['room_type'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></div></td>
                              </tr>
                        
                        
                        <tr style="display:none"><td><label>Item Category Type</label></td>
                        <td><div class="form-group"><select class="form-control select2 select2_sample2 input-medium" name="item_type_id[]" placeholder="Select Item Type" multiple >
                                            <option value=""></option>
                                            <?php
                                            foreach($fetch_master_item_type as $data)
                                            {
                                            	?>
                                                <option value="<?php echo $data['master_item_categorie']['id'];?>"><?php echo $data['master_item_categorie']['item_category'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></div></td>
                        </tr>
                        <tr>
                        <td><label>Discount (%)</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-medium" placeholder="Enter Discount (%)" name="discount"></div></td>
                        </tr>
                        
                        <tr>
                        <td colspan="2"><center><button type="submit" name="add_company_discount" class="btn green" value="add_company_discount" id="showtoast"><i class="fa fa-plus"></i> Add</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                    
                </div>
                        
                <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_company_discount))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>
				
                     <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="sample_1" width="100%">
                        <thead>
                        <tr>
                            <th>S. No</th>
                            <!--<th>Company Category</th>-->
                            <th>Company Name</th>
                            <!--<th>Room Type</th>-->
                            <th>Item Type</th>
                            <th>Discount (%)</th>
                            <th>Edit</th>
                            <th>Delete</th>
                         </tr>
                         </thead>
                         <tbody>
                         
                         
                            <?php
                            $i=0;
                             foreach($fetch_company_discount as $data)
							 { 
								 $i++;
								 $id_company_discount=$data['company_discount']['id'];
                                 $c_id=$data['company_discount']['company_category_id'];
                                 $room_id_ftc=$data['company_discount']['room_type_id'];
                                 
                          ?>
                            
                            <tr id="<?php echo $id_company_discount; ?>">
                            
                            <td><?php echo $i; ?></td>
                    <!--<td><?php
                            echo @$company_category_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_category_fetch',$data['company_discount']['company_category_id']), array()); ?></td>  -->      
                            
                            <td><?php
        echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$data['company_discount']['company_name_id']), array()); ?></td>
        
        
        <td><?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['company_discount']['room_type_id']), array()); ?></td>
                            
                             <!--<td><?php
                         $item=$data['company_discount']['item_type_id'];
                           $item=explode(',',   $item);
                           foreach( $item as $itemId)
                           {
                            echo @$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_item_category_fatch',$itemId), array()).' , '; 
                            }
                            ?>
                    </td>       -->
                    <td><?php echo $data['company_discount']['discount']; ?></td>
                    <td><a class="btn blue btn-xs" atttter="<?php echo $i;?>" data-toggle="modal" href="#editdis<?php echo $id_company_discount; ?>"><i class="fa fa-edit"></i> Edit</a>
                    <div class="modal fade" id="editdis<?php echo $id_company_discount;?>" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="submit" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here.!</h4>
										</div>
										<div class="modal-body">     
                                        <form method="post" name="editdis_<?php echo $id_company_discount; ?>" id="edit_company_discount<?php echo $i;?>" >

                                             <div class="table-responsive">
                                       <table class="table self-table" style=" width:100% !important;" border="0">
                                        <tr><input type="hidden" name="companydiscount_id" value="<?php echo $id_company_discount; ?>" />
                                        <td>
                                                <?php if(!empty($c_id))
                                                {
                                                 ?>
                                                <label>Company Category</label></td>
                                                <td> <div class="form-group"><select class="form-control input-medium" name="edit_company_category_id">
                                                    <option value="">-- Select --</option>
                                                    <?php
                                                    foreach($fetch_company_category as $data1)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $data1['company_category']['id'];?>" <?php if($data1['company_category']['id']==$data['company_discount']['company_category_id']){ echo 'selected'; } ?>><?php echo $data1['company_category']['category_name'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select></div> <?php } else
                                                    {?>
                                                    
                                                    <label>Company Name</label></td>
                        <td><div class="form-group"> <select class="form-control input-medium" name="edit_company_name_id" >
                                            <option value="">-- Select --</option>
                                            <?php
                                            foreach($fetch_company_registration as $data2)
                                            {
                                            	?>
<option value="<?php echo $data2['company_registration']['id'];?>"<?php if($data2['company_registration']['id']==$data['company_discount']['company_name_id']){ echo 'selected'; } ?>
                                                ><?php echo $data2['company_registration']['company_name'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></div>
                                                    
                                                    <?php
                                                    }
                                                     ?>
                                                    </td>
                                                </tr>
                                                
                                                
                        <tr>
                        
                                         
                                               <td><label>Room Type</label></td>
                                            <td><div class="form-group"><select class=" form-control input-medium" 
                                            name="edit_room_type_id" id="edit_room_type_id">
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_master_room_type as $data3)
                                            {	$room_id=$data3['master_room_type']['id'];
                                            	?>
                                                <option value="<?php echo $data3['master_room_type']['id'];?>" <?php if($room_id==$room_id_ftc){?>selected <?php } ?>><?php echo $data3['master_room_type']['room_type'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></div></td>
                              </tr>
                                                <tr style="display:none;"><td><label>Item Category Type</label></td>
                                                <td><div class="form-group"><select class="form-control select2 select2_sample2 input-medium" name="edit_item_type_id[]" multiple>
                                                    <option value="">-- Select --</option>
                                                    <?php
                                                    $item_id=$data['company_discount']['item_type_id'];
                                                  	 $item_id = explode(',',$item_id);
                                                    
                                                    foreach($fetch_master_item_type as $data1)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $data1['master_item_categorie']['id'];?>" <?php if(in_array($data1['master_item_categorie']['id'],$item_id)){ ?> selected <?php } ?>><?php echo $data1['master_item_categorie']['item_category'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                <td><label>Discount (%)</label></td>
                                                <td><div class="form-group"><input type="text" class="form-control input-inline input-medium" placeholder="Enter Discount (%)" name="edit_discount" id="edit_discount" value="<?php echo $data['company_discount']['discount']; ?>"></div></td>
                                                </tr>
                                                
                                                <tr><td colspan="8"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_company_discount" value="edit_company_discount" class="btn blue" id="showtoastupdate">Update</button>
										</div></center></td></tr>
                                         </table>
                                        </div>
                                        </form></div>                     
                       
                                </div>
                                <!-- /.modal-content -->
                     		</div>
                            <!-- /.modal-dialog -->
            			</div>
                            </td>
                           
                                <td> 
                                
                                
                                 <a class="btn red btn-xs" data-toggle="modal" href="#deletedis<?php echo $id_company_discount; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="deletedis<?php echo $id_company_discount; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px"

>
                <div class="modal-dialog" >
                    <div class="modal-content" >
                        <div class="modal-header" >
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            

      					 <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                           

                        </div>
                       
                        <div class="modal-footer">
                        <form method="post" name="deletedis<?php echo $id_company_discount; ?>" >
                         <input type="hidden" name="delete_c_discount" value="<?php echo $id_company_discount; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_company_discount" value="delete_company_discount" class="btn blue">Delete</button>
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
                <?php } ?>
			</div> 
    	</div>
    </div>
</div>



<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	
	
	
    $("#rcn").click(function(){
		$('#company_name_idd').show();
		$('#company_category_idd').hide();
    });
	$("#rcc").click(function(){
		$('#company_name_idd').hide();
		$('#company_category_idd').show();
    }); 
	
    
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

/*function delete_company_discount(id)
{
	if (confirm('Do you want to delete data !') == true) 
	{
		$(".page-spinner-bar").removeClass("hide"); //show loading
		var ar = [];
		ar.push(id);
		var myJsonString = JSON.stringify(ar);
		$.ajax({
			url: "ajax_php_file?delete_company_discount=1&q="+myJsonString,
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
	

</script>
















