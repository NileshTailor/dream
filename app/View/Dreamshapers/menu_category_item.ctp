<?php
if(empty($active))
{ $active=0;
}
?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title">Menu Item</div><div class="toast-message"> </div></div></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
               <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Menu
                    

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
                        <td><label>Menu <span style="color:#E02222">* </span></label></td>
                        <td> <select class="form-control input-medium" required="required" name="menu_category_idd">
                                <option value="">--- Select Package ---</option>
                                <?php
                                foreach($fetch_menu_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['menu_category']['id'];?>">
                                <?php echo $data['menu_category']['menu_category_id'];?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                        <td><label>Category <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group">
                         <select class="form-control input-medium" required="required" onchange="item_view();" id="category" name="master_itemcategory_id">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_master_item_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['master_item_category']['id'];?>">
                                <?php echo $data['master_item_category']['item_category'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                        </tr>
                         <tr>
                        <td><label>Type <span style="color:#E02222">* </span></label></td>
                        <td><div style="width:70%; float:left" class="form-group"><select class="form-control input-medium" required="required" onchange="item_view_type();" name="master_item_type_id" id="item">
                                <option value="">--- Select ---</option>
                            </select></div></td>
                        </tr>
                        <tr>
                        <td><label>Menu Item Name <span style="color:#E02222">* </span></label></td>
                                            <td colspan="2">
                                           <select class="form-control select2 select2_sample2" style="width:60%;" required="required" name="item_name_id[]" placeholder="Select Item..." multiple id="mitem">
                                            
											</select>
										</td>
                                            </tr>
  
                        </table>
                       <button  type="submit" style="margin-left:20%;"  class="btn green" name="add_menu_item" value="add_menu_item"><i class="fa fa-plus"></i> Add</button>
                       <button type="reset" name="" class="btn red " value="add_menu_item"><i class="fa fa-level-down"></i> Reset</button>
                     </div>
                    </form>
                </div>
                
                
 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_menu_category_item))
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
    <th>Menu</th>
    <th>Category</th>
    <th>Type</th>
    <th>Item Name</th>
    <th width="10%">Edit</th>
    <th width="10%">Delete</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		 foreach($fetch_menu_category_item as $data){ 
		 $i++;
		 $id=$data['menu_category_item']['id'];
         $menu_category_idd=$data['menu_category_item']['menu_category_idd'];
		 $master_itemcategory_id=$data['menu_category_item']['master_itemcategory_id'];
		 $master_item_type_id=$data['menu_category_item']['master_item_type_id'];
         $item_name_id=$data['menu_category_item']['item_name_id'];
         $explode_data=explode(',', $item_name_id);
		 ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php
             echo @$menu_cat_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'menu_cat_fetch',$data['menu_category_item']['menu_category_idd']), array());
             ?>
            </td>
            <td>
        <?php if(!empty($master_itemcategory_id)){
        echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_item_category_fatch',$data['menu_category_item']['master_itemcategory_id']), array()); } ?>
        </td>
        <td>
        <?php if(!empty($master_item_type_id)){	
        echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_item_fetch',$data['menu_category_item']['master_item_type_id']), array());} ?>
        </td>
            <td><?php
            foreach($explode_data as $menuitem)
            {
            echo @$menu_item_cat_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'menu_item_cat_fetch',$menuitem), array()).', ';
            }
            ?></td>
            <td><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" href="#edit<?php echo $id ;?>"><i class="fa fa-edit"></i> Edit </a>
                              <div class="modal fade" id="edit<?php echo $id ;?>" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-md">
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
                        <input type="hidden" name="menu_cat_id" value="<?php echo $id; ?>" />
                        <td><label>Menu Category</label></td>
                        <td> <select class="form-control input-medium" required="required" name="edit_menu_category_idd">
                                <option value="">--- Select Item Category ---</option>
                                <?php
                                foreach($fetch_menu_category as $data)
                                {$idd=$data['menu_category']['id'];
                                ?>
                                <option <?php if($idd==$menu_category_idd){ ?> selected="selected" <?php } ?>  value="<?php echo $data['menu_category']['id'];?>">
                                <?php echo $data['menu_category']['menu_category_id'];?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                        </tr>
                        
        <tr>
                        <td><label>Category <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"> <select class="form-control input-medium" required="required" onchange="item_func(<?php echo $i; ?>);"  id="item_id<?php echo $i; ?>" name="edit_master_itemcategory_id">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_master_item_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['master_item_category']['id'];?>" <?php if($master_itemcategory_id==$data['master_item_category']['id']) { echo 'selected'; } ?>>
                                <?php echo $data['master_item_category']['item_category'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                        </tr> <tr>    
                        <td><label>Type <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"> <select class="form-control input-medium" required="required" onchange="item_funcs(<?php echo $i; ?>);" id="item_edit<?php echo $i; ?>" name="edit_master_item_type_id" ?>">
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
                        </tr>
                        <tr>
                         <input type="hidden" name="menu_cat_id" value="<?php echo $id; ?>" />
                         <tr>
                        <td><label>Menu Item Name <span style="color:#E02222">* </span></label></td>
                                            <td colspan="2">
                                           <select class="form-control select2 select2_sample2" required="required" style="width:60%;" name="edit_item_name_id[]" placeholder="Select Item..." multiple id="edit_item_type<?php echo $i;?>" >
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
											</td>
											</tr>
											
                     <tr><td colspan="3"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_menu_item" value="edit_menu_item" class="btn blue">Update</button>
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
<input type="hidden" name="menu_cat_idd" value="<?php echo $id; ?>" />
<button type="button" class="btn default" data-dismiss="modal">Cancel</button>
<button type="submit" name="delete_menu_item" value="delete_menu_item" class="btn blue">Delete</button>
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
		
		function item_view()
		{
			
			var category_id=$("select[id=category]").val();
                $.ajax({ 
                url: "ajax_php_file?view_category_item_type=1&q="+category_id,
                type: "POST", 
				 success: function(data)
                { 
					if(data=='error')
					{ alert("No Item Type"); 
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
		////////////////
		function item_view_type()
		{
			var item=$("select[id=item]").val();
			$(".select2-search-choice").remove();
                $.ajax({ 
                url: "ajax_php_file?view_category_item_type_name=1&q="+item,
                type: "POST", 
				 success: function(data)
                { 
					if(data=='error')
					{ alert("No Item"); 
					$("#mitem").html('<option value="">--- Select ---</option>');
					 } else {
						  
					$("#mitem").html(data);
					 
					}
                }
                });	
		}
		function item_funcs(id)
		{
				var item_edit=$("#item_edit"+id).val();
					$.ajax({ 
					url: "ajax_php_file?view_category_item_type_2=1&q="+item_edit,
					type: "POST", 
					success: function(data)
					{ 
						if(data=='error')
						{ alert("Please Fill any Item"); 
						 } else { 
						$("#edit_item_type"+id).html(data); 
						}
					}
					});	
			
		}
		
		///////////////////////
		
		
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
	  var myVar=setInterval(function(){myTimer()},4000);
	   function myTimer() 
	   { $("#toast-container").hide();
	   $("#toast-container").hide();
	   
	   
	    }  
	<?php } ?>
});

        </script>