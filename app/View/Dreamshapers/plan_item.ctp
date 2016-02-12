<?php

if(empty($active))
{ $active="";
}
?>


<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Master Item</div><div class="toast-message"> </div></div></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
               <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Item
                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View
                    </a>
                </li>
            </ul>
            <div class="tab-content">
             <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                    <form method="post" name="add" id="add_master_item">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:50% !important;">
                        <tr>
                        <td><label>Plan Item Category <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group">
                         <select class="form-control input-small select2me" required="required" id="category" name="master_itemcategory_id">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_plan_item_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['plan_item_category']['id'];?>">
                                <?php echo $data['plan_item_category']['item_category'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                        </tr>
                         <tr>
                 <td><label>Plan Combo Price</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Item Cost" name="item_cost" id="item_cost"></td>
                                                </tr>
                       
                        <tr>
                        <td><label>Choose Plan Items</label></td>
                <td>
                 <select class="form-control select2 select2_sample2 input-medium" name="item_name[]" data-placeholder="Select items..." multiple="multiple">
                        <option value=""></option>
                                         <?php
                        foreach($fetch_master_item as $data)
                        {
                            ?>
                     <option value="<?php echo $data['master_item']['id'];?>"><?php echo $data['master_item']['item_name'];?></option>
                            <?php
                        }
                        ?>
                </select>
                </td></tr>
               
                        
                        <tr>
                        <td colspan="2"><center><button type="submit" name="add_master_item" class="btn green" value="add_master_item">
                        <i class="fa fa-plus"></i> Add</button>
                        &nbsp;&nbsp;<button type="reset" name="" class="btn red " value="add_master_item"><i class="fa fa-level-down"></i> Reset</button>
                        
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>



 
 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_plan_item))
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
        <th>Item Category</th>
        <th>Item Name</th>
        <th>Combo Price</th>
        <th>Edit</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_plan_item as $data){ 
		 $i++;
		 $id_plan_item=$data['plan_item']['id'];
         $master_itemcategory_id=$data['plan_item']['master_itemcategory_id'];
        $item_name=$data['plan_item']['item_name'];
        $item_cost=$data['plan_item']['item_cost']; 
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td>
        <?php if(!empty($master_itemcategory_id)){
        echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'plan_item_category_fatch',$data['plan_item']['master_itemcategory_id']), array()); } ?>
        </td>
 <td><?php
        $att_id= $data['plan_item']['item_name'];
        $explode_data=explode(",",$att_id);
        foreach($explode_data as $dataa)
        {
       		echo @$master_itemtype_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$dataa), array());
       		echo "<br>";
       } 
	?>	
       </td>        <td><?php echo $data['plan_item']['item_cost']; ?></td>
        
            <td><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" href="#poppup_<?php echo $id_plan_item; ?>"><i class="fa fa-edit"></i> Edit </a>
        <div class="modal fade bs-modal-lg" id="poppup_<?php echo $id_plan_item; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Update Here</h4>
                </div>
                <div class="modal-body">
                <form method="post" name="poppup_<?php echo $id_plan_item; ?>" id="edit_master_item<?php echo $i;?>">
                <div class="table-responsive">
                
        <table class="table self-table" style=" width:80% !important;" border="0" align="center">
        <tr>
                        <input type="hidden" name="masteritem_id" value="<?php echo $id_plan_item; ?>" />
                        <td><label>Item Category <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"> <select class="form-control input-small" required="required"  name="edit_master_itemcategory_id">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_plan_item_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['plan_item_category']['id'];?>" <?php if($master_itemcategory_id==$data['plan_item_category']['id']) { echo 'selected'; } ?>>
                                <?php echo $data['plan_item_category']['item_category'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                        </tr> 
                        <tr>
                 <td><label>Plan Combo Price</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Item Cost" name="edit_item_cost" id="dit_item_cost" value="<?php echo $item_cost;?>"></td>
                       </tr>
                       
                        <tr>
                        <td><label>Choose Plan Items</label></td>
                <td>
                 <select class="form-control select2 select2_sample2 input-medium" name="edit_item_name[]" data-placeholder="Select items..." multiple="multiple">
                        <option value=""></option>
                                         <?php
                        foreach($fetch_master_item as $data)
                        {
                        if (in_array($data['master_item']['id'], $explode_data)) 
						{
							$selected='selected';
						}
						else
						{
							$selected='';
						}
                    ?>
                     <option value="<?php echo $data['master_item']['id'];?>" <?php echo $selected; ?>><?php echo $data['master_item']['item_name'];?></option>
                            <?php
                        }
                        ?>
                </select>
                </td></tr>
               
                         
                         <tr><td colspan="2"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_master_item" value="edit_master_item" class="btn blue">Update</button>
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
            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id_plan_item; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete<?php echo $id_plan_item; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                           <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                       </div>
                       <div class="modal-footer">
                        <form method="post" name="delete<?php echo $id_plan_item; ?>">
                            <input type="hidden" name="delete_masteritem_id" value="<?php echo $id_plan_item; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="delete_master_item" value="delete_master_item" class="btn blue">Delete</button>
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

<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script>
		function item_view()
		{
			
			var category_id=$("select[id=category]").val();
                $.ajax({ 
                url: "ajax_php_file?view_category_item_type=1&q="+category_id,
                type: "POST", 
				 success: function(data)
                { 
					if(data=='error')
					{ alert("Please Fill any Item"); 
					$("#item").html('<option value="">--- Select ---</option>');
					$("#popup").html('<a class="btn green btn-xs" data-toggle="modal" style="height: 31px; text-align: center; padding-top: 5px;" href="#basic" ><i class="fa fa-plus"></i> SP </a>');
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
					url: "ajax_php_file?view_category_item_type=1&q="+item_id,
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
			var ar = [];
			var master_itemcategory_id=$("select[name=itemcategory_id]").val();
			var itemtype_name=$("input[name=itemtype]").val();
			var master_tax_id=$("select[name=master_tax_id]").val();
			ar.push(master_itemcategory_id,itemtype_name,master_tax_id);
			var myJsonString = JSON.stringify(ar);
                $.ajax({ 
                url: "ajax_php_file?master_item_categoty_submit=1&q="+myJsonString,
                type: "POST", 
				 success: function(data)
                { 
					//alert(data);
					$("#item").html(data); 
					
                }
                });	
		
		}
		
		function delete_row_data(id)
	{
		var nax =  parseInt(id) -  parseInt(1) ;
		var tot= $("#tg"+id).val();
		var gross_amount= $("#gross_amount").val();
		var total_gross =  parseInt(gross_amount) -  parseInt(tot) ;
		$("#gross_amount").val(total_gross);
			$("#"+id).remove();
			$("#next_id").val(nax);
	}
	function add_data()
	{	
		var next_id=$("#next_id").val();
		$.ajax({
			url: "ajax_php_file?plankot_add_data=1&q="+next_id,
			type: "POST",         
			success: function(data)
			{	
			var da = parseInt(next_id) + parseInt(1);
				$("#add_data tr:last").after(data);
				$("#next_id").val(da);
				$('select').select2();
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