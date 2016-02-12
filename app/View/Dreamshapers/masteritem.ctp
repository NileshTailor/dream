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
              <?php
                if(!empty($error))
				{
					echo "<div id='success' class='note note-danger alert-notification'><p>Data Already Exist</p></div>";
					
				}
				?>
             
                    <form method="post" name="add" id="add_master_item">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:100% !important;">
                        <tr>
                        <td><label>Item Category <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group">
                         <select class="form-control input-small" required="required" onchange="item_view();" id="category" name="master_itemcategory_id">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_master_item_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['master_item_categorie']['id'];?>">
                                <?php echo $data['master_item_categorie']['item_category'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                        <td><label>Item Type <span style="color:#E02222">* </span></label></td>
                        <td><div style="width:70%; float:left" class="form-group"><select class="form-control input-small" name="master_item_type_id" id="item">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_master_item_type as $data)
                                {
                                ?>
                                <option value="<?php echo $data['master_item_type']['id'];?>"><?php echo $data['master_item_type']['itemtype_name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div><div style="width:29%; float:right"><a class="btn green btn-xs" data-toggle="modal" style="height: 31px; text-align: center; padding-top: 5px;" href="#basic" ><i class="fa fa-plus"></i></a></div></td>
                            
                            <td><label>Select Also Category Here <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><select class="form-control input-small" name="ledger_category">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_ledger_master as $data)
                                {
                                ?>
                                <option value="<?php echo $data['ledger_master']['id'];?>"><?php echo $data['ledger_master']['name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                        </tr>
                        
                        <tr>
                        <td><label>Item Name <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Item Name" name="item_name"></div>
                        </td>
                         
						 <?php
                            $i=1;
                            foreach($fetch_gr_no as $data){ 
                            $i++;
                            $id=$data['gr_no']['id'];
                            $item_code=$data['gr_no']['item_code'];
                            ?>
                            <?php $data['gr_no']['item_code']; ?>
                            <?php }?>
                            <td align="left" width="12%"><label>Item Code <span style="color:#E02222">* </span></label></td> 
                            <td>
                            <div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Item Code" name="item_code" value="<?php echo $item_code; ?>" readonly/></div>
                            </td>
                            <td><label>Billing Rate <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Billing Rate" name="billing_rate"></div></td></tr>
                        
                        <tr>
                        <td><label>Billing Room Rate</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Billing Room Rate" name="billing_room_rate"></td>
                        <td><label>Urgent Rate</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Urgent Rate" name="item_cost"></td>
                        <td><label>Status</label></td>
                        <td>
                        <textarea class="form-control input-inline-small" rows="1" placeholder="Status" name="status"></textarea>
                        </td>
                        </tr>
                        
                        
                        <tr>
                        <td colspan="6"><center><button type="submit" name="add_master_item" class="btn green" value="add_master_item"><i class="fa fa-plus"></i> Add</button>&nbsp;&nbsp;<button type="reset" name="" class="btn red " value="add_master_item"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>



 
 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_master_item))
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
        <th>Item Type</th>
        <th>Item Name</th>
        <th>Item Code</th>
        <th>Billing Rate</th>
        <th>Billing Room Rate</th>
        <th>Item Cost</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_master_item as $data){ 
		 $i++;
		 $id_master_item=$data['master_item']['id'];
         
         $master_itemcategory_id=$data['master_item']['master_itemcategory_id'];
        $master_item_type_id=$data['master_item']['master_item_type_id'];
        $item_name=$data['master_item']['item_name'];
        $billing_rate=$data['master_item']['billing_rate'];
        $billing_room_rate=$data['master_item']['billing_room_rate'];
        $item_cost=$data['master_item']['item_cost']; 
        $status=$data['master_item']['status']; 
		$item_code=$data['master_item']['item_code'];
		$ledger_category=$data['master_item']['ledger_category'];        
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td>
        <?php if(!empty($master_itemcategory_id)){
        echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_item_category_fatch',$data['master_item']['master_itemcategory_id']), array()); } ?>
        </td>
        <td>
        <?php if(!empty($master_item_type_id)){	
        echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_item_fetch',$data['master_item']['master_item_type_id']), array());} ?>
        </td>
        <td><?php echo $data['master_item']['item_name']; ?></td>
        <td><b><?php echo $data['master_item']['item_code'];?></b></td>
        <td><?php echo $data['master_item']['billing_rate']; ?></td>
        <td><?php echo $data['master_item']['billing_room_rate']; ?></td>
        <td><?php echo $data['master_item']['item_cost']; ?></td>
        <td><?php echo $data['master_item']['status']; ?></td>
        
            <td><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" href="#poppup_<?php echo $id_master_item; ?>"><i class="fa fa-edit"></i> Edit </a>
        <div class="modal fade bs-modal-lg" id="poppup_<?php echo $id_master_item; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Update Here</h4>
                </div>
                <div class="modal-body">
                <form method="post" name="poppup_<?php echo $id_master_item; ?>" id="edit_master_item<?php echo $i;?>">
                <div class="table-responsive">
                
        <table class="table self-table" style=" width:80% !important;" border="0" align="center">
        
        
        <tr>
                        <td><label>Item Category <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"> <select class="form-control input-small" required="required" onchange="item_func(<?php echo $i; ?>);"  id="item_id<?php echo $i; ?>" name="edit_master_itemcategory_id">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_master_item_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['master_item_categorie']['id'];?>" <?php if($master_itemcategory_id==$data['master_item_categorie']['id']) { echo 'selected'; } ?>>
                                <?php echo $data['master_item_categorie']['item_category'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
             
               <input type="hidden" name="masteritem_id" value="<?php echo $id_master_item; ?>" />
                        <td><label>Item Type <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"> <select class="form-control input-small" id="item_edit<?php echo $i; ?>" name="edit_master_item_type_id" ?>">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_master_item_type as $data1)
                                {
                                ?>
                                <option value="<?php echo $data1['master_item_type']['id'];?>" <?php if($master_item_type_id==$data1['master_item_type']['id']) { echo 'selected'; } ?>><?php echo $data1['master_item_type']['itemtype_name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                            <td><label>Select Also Category Here <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><select class="form-control input-small" name="edit_ledger_category">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_ledger_master as $data)
                                {
                                ?>
                                <option value="<?php echo $data['ledger_master']['id'];?>" <?php if($ledger_category==$data['ledger_master']['id']) { echo 'selected'; } ?>><?php echo $data['ledger_master']['name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                        </tr>
                  
                        <tr>
                        <td><label>Item Name <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Item Name" name="edit_item_name" value="<?php echo $item_name; ?>"></div></td>
                  
                        <td><label>Item Code <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Item Code" name="edit_item_code" value="<?php echo $item_code;?>"></div>
                        </td>
                        <td><label>Billing Rate <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Billing Rate" name="edit_billing_rate" value="<?php echo $billing_rate; ?>"></div></td></tr>
                        
                        <tr><td><label>Billing Room Rate</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Billing Room Rate" name="edit_billing_room_rate" value="<?php echo $billing_room_rate; ?>"></td>
                        <td><label>Item Cost</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Item Cost" name="edit_item_cost" value="<?php echo $item_cost; ?>"></td>
                        <td><label>Status</label></td>
                        <td>
                        <textarea class="form-control input-inline input-small" rows="1" placeholder="Status" name="edit_status"><?php echo $status; ?></textarea>
                        </tr>
                         
                         <tr><td colspan="4"><center><div class="modal-footer">
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
            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id_master_item; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete<?php echo $id_master_item; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                           <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                       </div>
                       <div class="modal-footer">
                        <form method="post" name="delete<?php echo $id_master_item; ?>">
                            <input type="hidden" name="delete_masteritem_id" value="<?php echo $id_master_item; ?>" />
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
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add Item</h4>
                
               
            </div>
                <div class="modal-body">
                   <form method="post" >
                    <table class="table self-table" style=" width:100% !important;">
                    <tr>
                    <td><label>Item Category</label></td>
                    <td> <select class="form-control input-medium" required="required" name="itemcategory_id">
                    <option value="">--- Select ---</option>
                    <?php
                    foreach($fetch_master_item_category as $data)
                    {
                    ?>
                    <option value="<?php echo $data['master_item_categorie']['id'];?>">
                    <?php echo $data['master_item_categorie']['item_category'];?></option>
                    <?php
                    }
                    ?>
                    </select></td>
                    </tr>
                    <tr>
                    <td><label>Item Type</label></td>
                    <td><input type="text" class="form-control input-inline input-medium" required="required" placeholder="Item Type" name="itemtype"></td>
                    </tr>
                    <tr>
                    <td><label>Tax Applicable</label></td>
                    <td> <select class="form-control select2 select2_sample2 input-medium" placeholder="Select" required="required" name="master_tax_id" multiple="multiple">
                    <option value="">--- Select ---</option>
                    <?php
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
                    </tr>
                    </table>
                            
                    </form>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="Masteritem_category();" data-dismiss="modal" class="btn green" value="add_master_item"><i class="fa fa-plus"></i> Add</button>						
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
                url: "ajax_php_file?view_category_item_type=1&q="+category_id,
                type: "POST", 
				 success: function(data)
                { 
					if(data=='error')
					{ alert("Please Fill any Item"); 
					$("#item").html('<option value="">--- Select ---</option>');
					
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
			//alert();
			var ar = [];
			var master_itemcategory_id=$("select[name=itemcategory_id]").val();
			var itemtype_name=$("input[name=itemtype]").val();
			var master_tax_id=$("select[name=master_tax_id]").val();
			ar.push(master_itemcategory_id,itemtype_name,master_tax_id);
			var myJsonString = JSON.stringify(ar);
			//alert(myJsonString);
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
		
$(document).ready(function(){
	
	var myVar=setInterval(function(){myTimerr()},4000);
			function myTimerr() 
	   {
	   $("#success").hide();
	    }  
		
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