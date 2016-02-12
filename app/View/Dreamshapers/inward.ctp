<?php
if(empty($active))
{ $active="";
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Inward (Item)</div><div class="toast-message"> </div></div></div>
</div>
<div class="row"> 
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
               <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Inward
                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View                  
                    </a>
                </li>
            </ul>
            <div class="tab-content">
             <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                    <form method="post" name="add" id="add_inward">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:50% !important;">
                        <tr>
                        <td><label>Category <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group">
                         <select class="form-control input-medium" required="required" onchange="item_view();" id="category" name="master_itemcategory_id">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_stock_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['stock_category']['id'];?>">
                                <?php echo $data['stock_category']['item_category'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                        </tr>
                         <tr>
                        <td><label>Item Type <span style="color:#E02222">* </span></label></td>
                        <td><div style="width:70%; float:left" class="form-group"><select class="form-control input-medium" name="master_item_type_id" id="item">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_stock as $data)
                                {
                                ?>
                                <option value="<?php echo $data['stock']['id'];?>"><?php echo $data['stock']['itemtype_name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div><div style="width:29%; float:right"><a class="btn green btn-xs" data-toggle="modal" style="height: 31px; text-align: center; padding-top: 5px;" href="#basic" ><i class="fa fa-plus"></i></a></div></td>
                        </tr>
                        <tr>
                        <td><label>Quantity</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" required="required" placeholder="Quantity" name="quantity"></td>
                        </tr>
                        <tr>
                        <td><label>Date</label></td> 
                            <td>
<input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="date" id="date" data-date="00-00-0000"  value="<?php echo date("d-m-Y"); ?>">                            </td></tr>
                               <tr>
                        <td><label>Remark</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" placeholder="remark" name="remark"></td>
                        </tr>
                        
                        
                        <tr>
                        <td colspan="2"><center><button type="submit" name="add_inward" class="btn green" value="add_inward"><i class="fa fa-plus"></i> Add</button>
                        <button type="reset" name="" class="btn red " value="add_inward"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>



 
 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_in_out_ward))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
               }else
                { ?>
                     	 <div class="table-responsive">

  <div><table class="table table-bordered table-hover" id="sample_1">
	<thead>
    <tr>
        <th>S. No</th>
        <th>Category</th>
        <th>Item Type</th>
        <th>Quantity</th>
        <th>Date</th>
        <th>Remarks</th>
        <th>Edit</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_in_out_ward as $data){ 
		 $i++;
		 $id_in_out_ward=$data['in_out_ward']['id'];
         
         $master_itemcategory_id=$data['in_out_ward']['master_itemcategory_id'];
        $master_item_type_id=$data['in_out_ward']['master_item_type_id'];
        $quantity=$data['in_out_ward']['quantity'];
        $date=$data['in_out_ward']['date'];
		if($date=='0000-00-00')
        {	$arrival_date='';}
        else
        { $date=date("d-m-Y", strtotime($date)); }
        $remark=$data['in_out_ward']['remark'];
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td>
        <?php if(!empty($master_itemcategory_id)){
        echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_inward_category_fatch',$data['in_out_ward']['master_itemcategory_id']), array()); } ?>
        </td>
        <td>
        <?php if(!empty($master_item_type_id)){
        echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_item_inward_fetch',$data['in_out_ward']['master_item_type_id']), array());} ?>
        </td>
        <td><?php echo $data['in_out_ward']['quantity']; ?></td>
        <td><?php echo $data['in_out_ward']['date']; ?></td>
        <td><?php echo $data['in_out_ward']['remark']; ?></td>
        
            <td><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" href="#poppup_<?php echo $id_in_out_ward; ?>"><i class="fa fa-edit"></i> Edit </a>
        <div class="modal fade bs-modal-lg" id="poppup_<?php echo $id_in_out_ward; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Update Here</h4>
                </div>
                <div class="modal-body">
                <form method="post" name="poppup_<?php echo $id_in_out_ward; ?>" id="edit_in_out_ward<?php echo $i;?>">
                <div class="table-responsive">
                
        <table class="table self-table" style=" width:80% !important;" border="0" align="center">
        
        
        <tr>
                        <td><label>Category <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"> <select class="form-control input-medium" required="required" onchange="item_func(<?php echo $i; ?>);"  id="item_id<?php echo $i; ?>" name="edit_master_itemcategory_id">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_stock_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['stock_category']['id'];?>" <?php if($master_itemcategory_id==$data['stock_category']['id']) { echo 'selected'; } ?>>
                                <?php echo $data['stock_category']['item_category'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                        </tr> <tr><input type="hidden" name="in_out_ward_id" value="<?php echo $id_in_out_ward; ?>" />
                        <td><label>Item Type <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"> <select class="form-control input-medium" id="item_edit<?php echo $i; ?>" name="edit_master_item_type_id" ?>">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_stock as $data1)
                                {
                                ?>
                                <option value="<?php echo $data1['stock']['id'];?>" <?php if($master_item_type_id==$data1['stock']['id']) { echo 'selected'; } ?>><?php echo $data1['stock']['itemtype_name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                        </tr>
                         <tr>
                        <td><label>Quantity</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" required="required" value="<?php echo $quantity;?>" placeholder="Quantity" name="edit_quantity"></td>
                        </tr>
                        <tr>
                        <td><label>Date</label></td> 
                            <td>
                           <input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="edit_date" id="date"  value="<?php echo $date; ?>" data-date="00-00-0000" >
                            </td></tr>
                               <tr>
                        <td><label>Remark</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" value="<?php echo $remark;?>" placeholder="remark" name="edit_remark"></td>
                        </tr>
                        
                        <tr>
                         
                         <tr><td colspan="3"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_inward" value="edit_inward" class="btn blue">Update</button>
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
            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id_in_out_ward; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete<?php echo $id_in_out_ward; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                           <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                       </div>
                       <div class="modal-footer">
                        <form method="post" name="delete<?php echo $id_in_out_ward; ?>">
                            <input type="hidden" name="delete_in_out_ward" value="<?php echo $id_in_out_ward; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="delete_inward" value="delete_inward" class="btn blue">Delete</button>
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
        </table></div> 
</div>
</div>
</div>
<?php }?>    
</div>  
</div>
</div>
</div>


<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add Item</h4>
            </div>
                <div class="modal-body">
                   <form method="post">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:50% !important;">
                         <tr>
                        <td><label>Item Category</label></td>
                        <td> <select class="form-control input-medium" required="required" name="master_itemcategory_id">
                                <option value="">--- Select Itam category ---</option>
                                <?php
                                foreach($fetch_stock_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['stock_category']['id'];?>">
                                <?php echo $data['stock_category']['item_category'];?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                        <td><label>Item Type</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" required="required" placeholder="Item Type" name="itemtype_name"></td>
                        </tr>
                        
                       </table>
                    </form>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="Masteritem_category();" data-dismiss="modal" class="btn green" value="add_inward"><i class="fa fa-plus"></i> Add</button>						
                </div>
          </div>
      </div>
  </div>
</div>
                                                                



<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script>
		function item_view()
		{
			
			var category_id=$("select[id=category]").val();
                $.ajax({ 
                url: "ajax_php_file?view_category_item_typee=1&q="+category_id,
                type: "POST", 
				 success: function(data)
                { 
					if(data=='error')
					{ alert("Please Fill any Item"); 
					$("#item").html('<option value="">--- Select ---</option>');
					//$("#popup").html('<a class="btn green btn-xs" data-toggle="modal" style="height: 31px; text-align: center; padding-top: 5px;" href="#basic" ><i class="fa fa-plus"></i> SP </a>');
					 } else { 
					$("#item").html(data); 
					}
                }
                });	
		}
		
		function item_func(id)
		{
				var item_id=$("#item_id"+id).val();
					$.ajax({ 
					url: "ajax_php_file?view_category_item_typee=1&q="+item_id,
					type: "POST", 
					success: function(data)
					{ 
						if(data=='error')
						{ alert("Please Fill any Item"); 
						 } else { 
						$("#item_edit"+id).html(data); 
						}
					}
					});	
			
		}
		
		
		function Masteritem_category()
		{
			//alert();
			var ar = [];
			var master_itemcategory_id=$("select[name=master_itemcategory_id]").val();
			var itemtype_name=$("input[name=itemtype_name]").val();
			ar.push(master_itemcategory_id,itemtype_name);
			var myJsonString = JSON.stringify(ar);
			//alert(myJsonString);
                $.ajax({ 
                url: "ajax_php_file?master_item_categoty_submitt=1&q="+myJsonString,
                type: "POST", 
				 success: function(data)
                { 
					//alert(data);
					$("#item").html(data); 
					
                }
                });	
		
		}
		
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