<?php

if(empty($active))
{ $active="";
}
?>


<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Master Room Plan</div><div class="toast-message"> </div></div></div>
</div>

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
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Room Plan
                    

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
                    <form method="post" name="add"  id="roomplan_addform">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:80% !important;" border="0">
                        <tr>
                        <td><label>Room Plan</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-medium" placeholder="Room Plan" name="plan_name" required></div></td>
                        <td>Plan Combo</td>
                        <td align="left">
                           <?php  $j=0; $x=0;
                        foreach($fetch_plan_item_category as $item_name)
                        { $j++; $x++;
                        $servise=$item_name['plan_item_category']['item_category'];
                                                $outlett=$item_name['plan_item_category']['id'];

                        if($j==7){ $j=1;?><?php } 
                       	 ?>
                         <td id="data_view<?php echo $x; ?>" >
                         <label><input name="plan_combo[]" type="checkbox" value="<?php echo $outlett; ?>" /> <?php echo $servise; ?></label>
                          </td>
                        <?php
                        }
                        ?></td>
                        </tr>
                        <tr>
                        <td><label>Room Description</label></td>
               			<td colspan="3"><textarea cols="1000" rows="1" name="description_plan" class="form-control input-inline input-large" style="resize:none;"></textarea></td>
                        </tr>
                        <tr>
                        <td colspan="4"><center><button name="add_room_plan"  class="btn green" value="add_room_plan"><i class="fa fa-plus"></i> Add</button>
                        <button type="reset" name="" class="btn red " value="add_room_plan"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>      
                </div>
               
 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_master_room_plan))
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
<th>S. No</th>
<th>Room Plan</th>
<th>Plan Combo</th>
<th>Room Description</th>
<th  width="10%">Edit</th>
<th width="10%">Delete</th>
</tr>
</thead>
      
	 <tbody>
     	<?php
		$i=0;
		 foreach($fetch_master_room_plan as $data){ 
		 $i++;
		 $id=$data['master_room_plan']['id'];
         $plan_name=$data['master_room_plan']['plan_name'];
         $plan_combo=$data['master_room_plan']['plan_combo'];
         $plan_combo=explode(",",$plan_combo);
         $description_plan=$data['master_room_plan']['description_plan'];
		 ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['master_room_plan']['plan_name'];?></td>
           <!-- <td>
        <?php if(!empty($master_itemcategory_id)){
        echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'plan_item_category_fatch',$data['plan_item']['master_itemcategory_id']), array()); } ?>
        </td>-->
 
 <td>
 <?php
        $att_id= $data['master_room_plan']['plan_combo'];
        $explode_data=explode(",",$att_id);
        foreach($explode_data as $dataa)
        {
       		echo @$master_itemtype_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'plan_item_category_fatch',$dataa), array()).',';
       } 
	?>	
       </td>
            
            
            
            
            
            <td><?php echo $data['master_room_plan']['description_plan'];?></td>         
            <td><a class="btn blue btn-xs" data-toggle="modal" href="#popupplan<?php echo $id ;?>"><i class="fa fa-edit"></i> Edit </a>
               
                    <div class="modal fade" id="popupplan<?php echo $id ;?>" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Update Here.!</h4>
                    </div>
                    
                    <div class="modal-body">
                    <div class="tab-pane fade active in" id="tab_1_2">
                    <form method="post" name="popuprtype<?php echo $id ;?>">
                    <div class="table-responsive">
                    <table class="table self-table" style=" width:100% !important;" border="0">
                    <tr>
                    <input type="hidden" name="roomplan_id" value="<?php echo $id; ?>" />
                    
                    <td><label>Room plan</label></td> 
                    <td>
                    <input type="text" class="form-control input-inline input-medium" placeholder="Room Plan" name="edit_plan_name" id="edit_plan_name"
                    value="<?php echo $plan_name;?>" required></td>
                        <td>Plan Combo</td>
                           <?php  $j=0; $x=0;
											foreach($fetch_plan_item_category as $item_name)
                                            { $j++; $x++;
                                            $servise=$item_name['plan_item_category']['item_category'];
											 $outlett=$item_name['plan_item_category']['id'];
                                            if($j==7){ $j=1;?><?php } 
                                            ?>
                                            <td id="data_view<?php echo $x; ?>" >
                                            <label><input name="edit_plan_combo[]"  type="checkbox"
                                             <?php if(in_array($outlett,$plan_combo)){ echo 'checked'; } ?> value="<?php echo $outlett; ?>" /> <?php echo $servise; ?></label>
                                            </td>
                                            <?php
                                            }
                                            ?>
                                            
                           <!--<td><input name="edit_plan_combo" type="checkbox" value="Breakfast" id="edit_plan_combo"
                           <?php if($data['master_room_plan']['plan_combo']=='Breakfast'){ echo 'checked'; } ?>/>Breakfast</label>
                           <input name="edit_plan_combo" type="checkbox" value="Lunch" id="edit_plan_combo" />Lunch</label>
                           <input name="edit_plan_combo" type="checkbox" value="Dinner" id="edit_plan_combo"/>Dinner</label>
                           <input name="edit_plan_combo" type="checkbox" value="F&B Special rates" id="edit_plan_combo"/>F&B Special Rates</label></td>-->
                        </tr>
                    <tr>
                    <td><label>Plan Description</label></td> 
                    <td colspan="3">
                    <textarea cols="1000" rows="1" name="edit_description_plan" id="edit_description_plan" class="form-control input-inline input-large" placeholder="Update Plan Description" style="resize:none"><?php echo $description_plan;?> </textarea></td>
                    </tr>
                    
                    <tr><td colspan="3"><center><div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit_master_room_plan" value="edit_master_room_plan" class="btn blue">Update</button>
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
                        <input type="hidden" name="delete_roomplan_id" value="<?php echo $id; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_master_room_plan" value="delete_master_room_plan" class="btn blue">Delete</button>
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

	{
			var myVar=setInterval(function(){myTimerr()},4000);
			function myTimerr() 
	   {
	   $("#success").hide();
	    } 
		
	});	
		/*$(document).ready(function()
		{
			//////////////////////////////////////////////////
			$('#master_room_plan_edit').bind('change',function(){
				
				$("#edit_plan").val($('option:selected', this).attr("edit_room_plan"));
				$("#editdescription").val($('option:selected', this).attr("edit_des"));

			});
			//////////////////////////////////////////////////
			$("#save_delete").click(function(){
			 //setInterval(function(){
				 $('#delete').hide();
			 //},5000);
			 
    });*/
			/////////////////////////////
			
			
		/*	$(document).ready(function()
		{
			$("#roomplan_addform").on('submit',(function(e) 
            {
				e.preventDefault();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				var plan_name=$("input[name=plan_name]").val();
				var description_plan=$("textarea[name=description_plan]").val();
				ar.push(plan_name,description_plan);
				var myJsonString = JSON.stringify(ar);
				$.ajax({
				url: "ajax_php_file?roomplan_addform=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{
					$('#roomplan_addform')[0].reset();
					$('#roomplan_editform')[0].reset();
					if(data != 'error')
					{
						$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Submited Successfully...!!</p></div>");
						$("#master_room_plan_edit").html(data);
						$("#deleteoption").html(data);
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
		});
			/*$("#roomplan_editform").on('submit',(function(e) 
            {
				e.preventDefault();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				var edit_plan=$("input[name=edit_plan]").val();
				var editdescription=$("textarea[name=editdescription]").val();
				var master_room_plan_edit=$("select[name=master_room_plan_edit]").val();
				ar.push(edit_plan,editdescription,master_room_plan_edit);
				var myJsonString = JSON.stringify(ar);
				$.ajax({
				url: "ajax_php_file?roomplan_editform=1&q="+myJsonString,
				type: "POST",            
				success: function(data)
				{
					
					$('#roomplan_editform')[0].reset();
					if(data != 'error')
					{
						$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Updated Successfully...!!</p></div>");
						$("#master_room_plan_edit").html(data);
						$("#deleteoption").html(data);
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
			
			$("#roomplan_deleteform").on('submit',(function(e) 
            {
				e.preventDefault();
				
					$(".page-spinner-bar").removeClass("hide"); //show loading
					var ar = [];
					var deleteoption=$("select[name=deleteoption]").val();
					ar.push(deleteoption);
					var myJsonString = JSON.stringify(ar);
					$.ajax({
						url: "ajax_php_file?roomplan_deleteform=1&q="+myJsonString,
						type: "POST", 
						success: function(data)   // A function to be called if request succeeds
						{
							$('#roomplan_editform')[0].reset();
							
							$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Deleted Successfully...!!</p></div>");
							$("#master_room_plan_edit").html(data);
							$("#deleteoption").html(data);
							$(".page-spinner-bar").addClass(" hide"); //hide loading
							$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
							{
								$(this).alert('close'); 
								$(this).remove();
							});
						}
				   
					});
				
			
			}));
			
		});*/
		</script>
		