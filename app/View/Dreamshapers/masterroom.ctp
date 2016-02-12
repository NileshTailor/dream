<?php

if(empty($active))
{ $active=0;
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Master Room</div><div class="toast-message"> </div></div></div>
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
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Master Room
                    

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
                    <form method="post" name="add" id="add_master_room">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:100% !important;" border="0">
                        <tr>
                                            <td><label>Room Type</label></td> 
                                            <td><div class="form-group"><select class="form-control input-small" name="master_room_type_id" id="master_room_type_id">
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_master_room_type as $data)
                                            {
                                            	?>
                                                <option  value=
                                                "<?php echo $data['master_room_type']['id'];?>">
                                               
                                                <?php echo $data['master_room_type']['room_type'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></div></td>
                                            <td><label>Room Plan</label></td>
                                <td><div class="form-group"><select class="form-control input-small" name="master_room_plan_id" id="master_room_plan_id" placeholder="Select...">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_master_room_plan as $data)
                                {
                                ?>
                                <option value="<?php echo $data['master_room_plan']['id'];?>"><?php echo $data['master_room_plan']['plan_name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                            <td><label>Tariff Rate</label></td>
                                            <td><div class="form-group">
                                            <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-rupee"></i>
											</span>
                            <input type="text" class="form-control input-small"  placeholder="Tariff Rate" name="tarrif_rate" id="tarrif_rate"></div></div></td>
                                            </tr>
                                            <tr>
                                     		
                         
                           <!-- <td><input name="include_tax" type="checkbox" value="Including Tax" id="include_tax" checked/> Rate Including Tax</label></td>-->
                                           
                                             <!--<td><label>Luxury Tax</label></td>
                                            <td>
                                            <label>
                    						<input name="luxury_tax" type="checkbox" value="1"/> Applicable</label>
                                            </td>-->
                                            <td><label>Discount&nbsp;(%)</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" required="required" placeholder="Enter Discount (%)" name="discount"></div></td>
                        <td><label>Tax Applicable</label></td>
                        <td> <select class="form-control select2 select2_sample2 input-small" placeholder="Select Tax..."  name="master_tax_id[]" multiple="multiple">
                                
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
                                              <td><label>Attributes</label></td>
                                            <td>
                                           <select class="form-control select2 select2_sample2" style="width:60%;" name="attribute_id[]" placeholder="Select Attributes..." multiple >
                                            <?php
                                            foreach($fetch_master_room_attribute as $data)
                                            {
                                            	?>
												<option value="<?php echo $data['master_room_attribute']['id'];?>">
                                                <?php echo $data['master_room_attribute']['name'];?>
                                                </option>
												<?php
                                            }
                                            ?>
											</select>
										</td>
                                            </tr>
                                                          
                        <tr>
                        <td colspan="8"><center><button type="submit" name="add_master_room" class="btn green" value="add_master_room"><i class="fa fa-plus"></i> Add</button>
                        <button type="reset" name="" class="btn red " value="add_master_room"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                    
                </div>

   <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_master_room))
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
    <th>Room Type</th>
    <th>Plan</th>
    <th>Tariff Rate</th>
    <th>Tax Applicable</th>
    <th>Discount</th>
    <th>Attributes</th>
    <th>Edit</th>
    <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		 foreach($fetch_master_room as $data){ 
		 $i++;
		 $id_master_room=$data['master_room']['id'];
         $master_tax_id=$data['master_room']['master_tax_id'];
         $master_tax_id=explode(',', $master_tax_id);
         $discount=$data['master_room']['discount'];
         $attribute_id=$data['master_room']['attribute_id'];
         $tarrif_rate=$data['master_room']['tarrif_rate'];
		 $master_room_plan_id=$data['master_room']['master_room_plan_id'];
		 //$include_tax=$data['master_room']['include_tax'];
		 ?>
        <tr>
                <td><?php echo $i; ?></td>
        <td><?php
        echo $master_room_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_fetch',$data['master_room']['master_room_type_id']), array()); ?>
        </td>
       <td><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['master_room']['master_room_plan_id']), array()); ?>
        </td>
        <td><?php echo $data['master_room']['tarrif_rate']; ?></td>

       <td><?php
            foreach($master_tax_id as $taxes)
            {
            echo @$master_tax_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_tax_fetch',$taxes), array()).' @ ';
            echo @$master_tax_fetch_idd=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_tax_fetch1',$data['master_room']['master_tax_id']), array()).' , ';
            }
            ?></td>
            
            <td><?php echo $data['master_room']['discount']; ?></td>
      <!-- <td><?php  if($data['master_room']['luxury_tax']==1){ echo 'Applicable'; } else { echo 'Not Applicable'; } ?></td>-->
       
         <td><?php
        $att_id= $data['master_room']['attribute_id'];
        $explode_data=explode(",",$att_id);
        foreach($explode_data as $dataa)
        {
       		echo @$master_attribute_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_attribute_fetch',$dataa), array());
       		echo "<br>";
       } 
	?>	
       </td>
        
        
         
        <td><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" href="#edit<?php echo $id_master_room ;?>"><i class="fa fa-edit"></i> Edit </a>
                              <div class="modal fade" id="edit<?php echo $id_master_room ;?>" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-full">
									<div class="modal-content">
										<div class="modal-header">
											<button type="submit" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here.!</h4>
										</div>
										<div class="modal-body">
                     <form method="post" name="edit<?php echo $id_master_room ;?>" id="edit_master_room<?php echo $i;?>">
                   		 <div class="table-responsive">
                     
                    	<table class="table self-table" style=" width:100% !important;" border="0">
                        
                        <tr>
                         <input type="hidden" name="masterroom_id" value="<?php echo $id_master_room; ?>" />

                             <td><label>Room Type</label></td> 
                    <td><div class="form-group"><select class="form-control input-small" name="master_room_type_id_edit" value="<?php echo $data['master_room']['master_room_type_id']; ?>">
                    <option value="">--Select --</option>
                    <?php
                    foreach($fetch_master_room_type as $data1)
                    {
                        ?>
                        <option  value="<?php echo $data1['master_room_type']['id'];?>" <?php if($data['master_room']['master_room_type_id']==$data1['master_room_type']['id']) { echo 'selected'; } ?>><?php echo $data1['master_room_type']['room_type'];?></option>
                        <?php
                    }	
                    ?>
                    </select></div></td> <td><label>Room Plan</label></td>
                                <td><div class="form-group"><select class="form-control input-small" name="master_room_plan_id_edit" id="master_room_plan_id_edit" placeholder="Select...">
                                <option value=""></option>
                                <?php
                                foreach($fetch_master_room_plan as $data2)
                                {
                                ?>
                                <option value="<?php echo $data2['master_room_plan']['id'];?>" <?php if($data['master_room']['master_room_plan_id']==$data2['master_room_plan']['id']) { echo 'selected'; } ?>><?php echo $data2['master_room_plan']['plan_name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>              
                                            
                        <td><label>Tariff Rate</label></td>
         <td><div class="form-group">
         <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-rupee"></i>
											</span>
         <input type="text" class="form-control input-inline input-small" 
         placeholder="Tariff Rate" name="tarrif_rate_edit" value="<?php echo $tarrif_rate;?>"></div></div></td>
         
                    </tr> <tr> 
                           <!-- <td><input name="edit_include_tax" type="checkbox" value="Including Tax" id="edit_include_tax" checked "<?php if($data['master_room']['include_tax']=="Including Tax"){ echo 'checked'; } ?>"/> Rate Including Tax</label></td>-->
                    <!--<td><label>Luxury Tax</label></td>
                    <td>
                    <label> <input name="luxury_tax_edit" type="checkbox" value="1"> Applicable</label> </td>-->
                   <td><label>Discount&nbsp;(%)</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" required="required" placeholder="Enter Discount (%)" name="edit_discount" value="<?php echo $discount;?>"></div></td> 
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
                   <td><label>Attributes</label></td>
                    <td> <select class="form-control select2 select2_sample2" style="width:70%;" placeholder="Select Attributes..." name="attribute_id_edit[]" multiple value="<?php echo $attribute_id; ?>">
                    <?php
                    foreach($fetch_master_room_attribute as $data)
                    {
						if (in_array($data['master_room_attribute']['id'], $explode_data)) 
						{
							$selected='selected';
						}
						else
						{
							$selected='';
						}
                    ?>
                    <option value="<?php echo $data['master_room_attribute']['id'];?>" <?php echo $selected; ?>><?php echo $data['master_room_attribute']['name'];?></option>
                    <?php
                    }
                    ?>
                    </select>
                    </td>
                    </tr>
                     <tr><td colspan="3"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_master_room" value="edit_master_room" class="btn blue">Update</button>
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
<a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id_master_room; ?>"><i class="fa fa-trash-o"></i> Delete</a>
<div class="modal fade" id="delete<?php echo $id_master_room; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>



<h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>

</div>
<div class="modal-footer">
<form method="post" name="delete<?php echo $id_master_room; ?>">
<input type="hidden" name="delete_masterroom_id" value="<?php echo $id_master_room; ?>" />
<button type="button" class="btn default" data-dismiss="modal">Cancel</button>
<button type="submit" name="delete_master_room" value="delete_master_room" class="btn blue">Delete</button>
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