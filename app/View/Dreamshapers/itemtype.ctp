<?php
if(empty($active))
{ $active=0;
}
?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title">Master Item Type</div><div class="toast-message"> </div></div></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
               <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Item Type
                    

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
                    <form method="post" name="add" id="add_master_item_type">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:50% !important;">
                         <tr>
                        <td><label>Item Category</label></td>
                        <td> <select class="form-control input-medium" required="required" name="master_itemcategory_id">
                                <option value="">--- Select Item category ---</option>
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
                        <td><input type="text" class="form-control input-inline input-medium" required="required" placeholder="Item Type" name="itemtype_name"></td>
                        </tr>
                        <tr>
                        <td><label>Tax Applicable&nbsp;(%)</label></td>
                        <td> <select class="form-control select2 select2_sample2 input-medium" placeholder="Select Tax..." required="required" name="master_tax_id[]" multiple="multiple">
                               
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
                       <button  type="submit" style="margin-left:20%;"  class="btn green" name="add_itemtype" value="add_itemtype"><i class="fa fa-plus"></i> Add</button>&nbsp;&nbsp;<button type="reset" name="" class="btn red " value="add_itemtype"><i class="fa fa-level-down"></i> Reset</button>
                     </div>
                    </form>
                </div>
                
                
 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_master_item_type))
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
    <th>Item Category</th>
    <th>Item Type</th>
    <th>Tax Applicable</th>
    <th width="10%">Edit</th>
    <th width="10%">Delete</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		 foreach($fetch_master_item_type as $data){ 
		 $i++;
		 $id_master_item_type=$data['master_item_type']['id'];
         $master_itemcategory_id=$data['master_item_type']['master_itemcategory_id'];
         $itemtype_name=$data['master_item_type']['itemtype_name'];
         $master_tax_id=$data['master_item_type']['master_tax_id'];
         $master_tax_id=explode(',', $master_tax_id);
       
         
		 ?>
        <tr>
        
            <td><?php echo $i; ?></td>
            <td><?php   if(!empty($master_itemcategory_id)){ echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_item_category_fatch',$master_itemcategory_id), array()); } else { echo '0'; } ?> </td>
            <td><?php echo $data['master_item_type']['itemtype_name']; ?></td>
            
            <td><?php
            foreach($master_tax_id as $taxes)
            {
            echo @$master_tax_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_tax_fetch',$taxes), array()).' @ ';
            echo @$master_tax_fetch_idd=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_tax_fetch1',$data['master_item_type']['master_tax_id']), array()).' , ';
            }
            ?></td>
            
            
            <td><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" href="#edit<?php echo $id_master_item_type ;?>"><i class="fa fa-edit"></i> Edit </a>
                              <div class="modal fade" id="edit<?php echo $id_master_item_type ;?>" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<button type="submit" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here.!</h4>
										</div>
										<div class="modal-body">
                     <form method="post" name="edit<?php echo $id_master_item_type ;?>" id="edit_master_item_type<?php echo $i;?>">
                   		 <div class="table-responsive">
                     
                    	<table class="table self-table" style=" width:100% !important;" border="0">
                        <tr>
                        <td><label>Item Category</label></td>
                        <td> <select class="form-control input-medium" required="required" name="edit_master_itemcategory_id">
                                <option value="">--- Select Item Category ---</option>
                                <?php
                                foreach($fetch_master_item_category as $data)
                                {$idd=$data['master_item_categorie']['id'];
                                ?>
                                <option <?php if($idd==$master_itemcategory_id){ ?> selected="selected" <?php } ?>  value="<?php echo $data['master_item_categorie']['id'];?>">
                                <?php echo $data['master_item_categorie']['item_category'];?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                         <input type="hidden" name="masteritemtype_id" value="<?php echo $id_master_item_type; ?>" />
                         
                         <tr>
                        <td><label>Item Type</label></td>
                        <td><input type="text" class="form-control input-inline input-medium"  placeholder="Update Item Type" name="edit_itemtype" id="edit_itemtype" value="<?php echo $itemtype_name;?>" required></td>
                        </tr>
                        <tr>     
                    <td><label>Tax Applicable</label></td> 
                    <td><div class="form-group">
                    <select class="form-control select2 select2_sample2 input-medium" placeholder="Select Tax..." required="required" name="edit_item_tex[]" multiple="multiple">
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
                    
                     <tr><td colspan="3"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_master_item_type" value="edit_master_item_type" class="btn blue">Update</button>
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
<a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id_master_item_type; ?>"><i class="fa fa-trash-o"></i> Delete</a>
<div class="modal fade" id="delete<?php echo $id_master_item_type; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
</div>
<div class="modal-footer">
<form method="post" name="delete<?php echo $id_master_item_type; ?>">
<input type="hidden" name="delete_itemtype_id" value="<?php echo $id_master_item_type; ?>" />
<button type="button" class="btn default" data-dismiss="modal">Cancel</button>
<button type="submit" name="delete_master_item_type" value="delete_master_item_type" class="btn blue">Delete</button>
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
    </tbody></table></div>
    
    <?php }?>
    </div></div></div></div>
    
                
                
                
                
                
                
                
                        
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script>
        $(document).ready(function()
        {
			var myVar=setInterval(function(){myTimerr()},4000);
			function myTimerr() 
	   {
	   $("#success").hide();
	    }  
			
			
            //////////////////////////////////////////////////
         
           
           /* $("#editoption_itemtype").on('change',(function(e)
            {
                e.preventDefault();
                var ar = [];
                var editoption_itemtype=$("select[id=editoption_itemtype]").val();
				$("#edit_itemtype").val($('option:selected', this).attr("edit_item"));
                ar.push(editoption_itemtype);
                var myJsonString = JSON.stringify(ar);
                $.ajax({ 
                url: "ajax_php_file?editoption_itemtype_ajax=1&q="+myJsonString,
                type: "POST", 
				          
                success: function(data)
                {
					 $("#edit_item_tex").html(data);  
                }
                });
            }));
			//////////////////// 
			
			$("#add_master_item_type").on('submit',(function(e) 
            {
				e.preventDefault();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				var itam_type=$("input[name=itemtype_name]").val();
				var master_tax_id=$("select[name=master_tax_id]").val();
				ar.push(itam_type,master_tax_id);
				var myJsonString = JSON.stringify(ar);
				$.ajax({
				url: "ajax_php_file?itemtype_addform=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{
					$('#add_master_item_type')[0].reset();
					if(data != 'error')
					{
						$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Submited Successfully...!!</p></div>");
						$("#editoption_itemtype").html(data);
						$("#deleteoption_itemtype").html(data);
						
					}
					else
					{
						$("#message").html("<div id='success' class='note note-danger alert-notification'><p>This data already exist...!!</p></div>");
					}
					
					$(".page-spinner-bar").addClass(" hide"); //hide loading
					$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
					{
						$(this).alert('close'); 
						$(this).remove();
					});
				}
			   
				});
			
			}));
			///////////////////
			$("#edit_item_type").on('submit',(function(e) 
            {
				e.preventDefault();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				var editoption_itemtype=$("select[name=editoption_itemtype]").val();
				var edit_itemtype=$("input[name=edit_itemtype]").val();
				var edit_item_tex=$("select[name=edit_item_tex]").val();
				ar.push(editoption_itemtype,edit_itemtype,edit_item_tex);
				var myJsonString = JSON.stringify(ar);
				$.ajax({
				url: "ajax_php_file?item_type_editform=1&q="+myJsonString,
				type: "POST",            
				success: function(data)
				{
					$('#edit_item_type')[0].reset();
					$("#edit_item_tex option[value='']").prop('selected', true);
					
					
					if(data != 'error')
					{
						$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Updated Successfully...!!</p></div>");
						$("#editoption_itemtype").html(data);
						$("#deleteoption_itemtype").html(data);
					}  
					else
					{
						$("#message").html("<div id='success' class='note note-danger alert-notification'><p>This data already exist...!!</p></div>");
					}
					
					$(".page-spinner-bar").addClass(" hide"); //hide loading
					$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
					{
						$(this).alert('close'); 
						$(this).remove();
					});
				}
				});
			
			}));
			//////////////////
			
			$("#delete_master_item_type_form").on('submit',(function(e) 
            {
				e.preventDefault();
				if (confirm('Do you want to delete data !') == true) 
				{
					$(".page-spinner-bar").removeClass("hide"); //show loading
					var ar = [];
					var deleteoption_itemtype=$("select[name=deleteoption_itemtype]").val();
					ar.push(deleteoption_itemtype);
					var myJsonString = JSON.stringify(ar);
					$.ajax({
						url: "ajax_php_file?delete_master_item_type_form=1&q="+myJsonString,
						type: "POST", 
						success: function(data)   // A function to be called if request succeeds
						{
							$('#delete_master_item_type_form')[0].reset();
							
							$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Deleted Successfully...!!</p></div>");
							$("#editoption_itemtype").html(data);
							$("#deleteoption_itemtype").html(data);
							$(".page-spinner-bar").addClass(" hide"); //hide loading
							$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
							{
								$(this).alert('close'); 
								$(this).remove();
							});
						}
				   
					});
				}
			
			}));*/
		
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
	  var myVar=setInterval(function(){myTimer()},4000);
	   function myTimer() 
	   { $("#toast-container").hide();
	   $("#toast-container").hide();
	   
	   
	    }  
	<?php } ?>
});

        </script>