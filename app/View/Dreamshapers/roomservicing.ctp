<?php

if(empty($active))
{ $active="";
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Room Servicing</div><div class="toast-message"> </div></div></div>
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
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Room Servicing
                    

                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View
                    

                    </a>
                </li>
            </ul>

            <div class="tab-content">
               <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                    <form method="post" name="add"  id="roomtype_addform">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:70% !important;" border="0" align="center">
                        <tr style="background-color:#E26A6A; color:#FFF">
                        
                       <td align="right" width="25%"><label style="margin-right:14px;">Room No.</label></td>
                                            <td class="form-group" ><select class=" form-control input-small"name="master_roomno_id" id="master_roomno_idd">
                                <option value="">Select No.</option>
									<?php
                                    foreach($fetch_master_roomno as $data)
                                    {
                                    	$room_no=$data['master_roomno']['room_no'];
										$room_no_explode=explode(',', $room_no);
                                      foreach($room_no_explode as $room_nos)
                            {
                              $room_vacant=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_room_report',$room_nos), array());
                                
                                if(!empty($room_vacant))
                                {  $roo_blank_status=$room_vacant[0]['room_checkin_checkout']['status'];
                                    if($roo_blank_status=='1')
                                    {
                                     ?>
                                             <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
                                        <?php
                                    }
                                }
                                else
                                {?>
                                    <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
                                <?php
                                }
                            }
                        }
                                    ?>
                                </select>
                                
                                    </td>
                        <?php 
                        
                                    ?>
                        <td align="left"><input type="text" class="form-control input-medium" placeholder="Guest Name" name="guest_name" id="guest_name" ></td>
                        
                        </tr>
                        
                        
                        <tr>
                        <td align="right"><label>Room Status</label></td>
                        <td colspan="2" align="left">
										
                                        <div class="radio-list">
                                        
											<label class="radio-inline">
											<input type="radio" name="room_status" value="Clean"> Clean</label>
											<label class="radio-inline">
											<input type="radio" name="room_status" value="Outoforder"> Out of Order</label>
                                            <label class="radio-inline">
											<input type="radio" name="room_status" value="Dirty" checked="checked"> Dirty</label>
										
										</div>
						
                        </td>
                        </tr>
                        <tr>
                        <td align="right" width="10%"><label style="margin-right:8px;">Serviced By</label></td>
                        
                        <td class="form-group"><label><select class=" form-control" style="width:250px" name="serviced_by" id="serviced_by">
                                <option value="">--- Select Caretaker Name ---</option>
									<?php
                                    foreach($fetch_master_caretaker as $data)
                                    {
                                    	
                                        	?>
                                            <option  value="<?php echo $data['master_caretaker']['id'];?>"><?php echo $data['master_caretaker']['caretaker_name'];?></option>
                                        <?php
                                        }
                                    
                                    ?>
                                </select></label>
                                
                                    </td>
                            <td class="form-group"><div class="input-group"><label><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="service_date" data-date="12-08-2015" value="<?php echo  date("d-m-Y"); ?>"></label></div></td>
                                    
                       
                        </tr>
                        
                        <tr>
                       <td align="right"><label style="margin-right:14px;">Remark</label></td>
                        <td colspan="2">
                        <textarea class="form-control input-large" name="remarks" rows="1"></textarea>
                         
                        </tr>
                        
                        
                        <tr>
                        <td colspan="3"><center><button name="add_room_servicing" value="add_room_servicing"  class="btn green"><i class="fa fa-plus"></i> Add</button>
                        <button type="reset" name="" class="btn red " value="add_room_servicing"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                        
                     </div>
                    </form>
                </div>
                
                
                
                
                
               <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_room_serviceing))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>
                     	 <div class="table-responsive">

  <table class="table table-bordered table-hover" id="sample_1">
	<thead>
    <tr>
        <th>S. No</th>
        <th>Room No.</th>
        <th>Guest Name</th>
        <th>Room Status</th>
        <th>Serviced By</th>
        <th>Date</th>
        <th>Remark</th>
        <th>Edit</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_room_serviceing as $data){ 
		 $i++;
		 $id_room_serviceing=$data['room_serviceing'] ['id'];

        $master_roomno_id=$data['room_serviceing'] ['master_roomno_id'];
        $guest_name=$data['room_serviceing'] ['guest_name'];
        $service_date=$data['room_serviceing'] ['service_date'];
        $room_status=$data['room_serviceing'] ['room_status'];
        $serviced_by=$data['room_serviceing'] ['serviced_by'];
        
        $remarks=$data['room_serviceing'] ['remarks'];
        ?>
        
        
        <tr>
        <td><?php echo $i;?></td>
                <td><?php echo $data['room_serviceing'] ['master_roomno_id']; ?></td>
        <td><?php echo $data['room_serviceing'] ['guest_name']; ?></td>
        <td><?php echo $data['room_serviceing'] ['room_status']; ?></td>
        <td><?php echo $data['room_serviceing'] ['serviced_by']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_serviceing']['service_date'])); ?></td>
        <td><?php echo $data['room_serviceing'] ['remarks']; ?></td>
        
									<td><a class="btn default btn-xs blue" data-toggle="modal" atttter="<?php echo $i;?>" href="#poppupser_<?php echo $id_room_serviceing; ?>">
								<i class="fa fa-edit"></i> Edit </a>
								<div class="modal fade bs-modal-lg" id="poppupser_<?php echo $id_room_serviceing; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
										<div class="modal-body">
                                        <form method="post" name="edit_<?php echo $id_room_serviceing; ?>" id="edit_room_servicing<?php echo $i;?>">
                                        <div class="table-responsive">
										
<table class="table self-table" style=" width:70% !important;" border="0" align="center">
                        <tr style="background-color:#E26A6A">   
                        <input type="hidden" name="serviceing_id" value="<?php echo $id_room_serviceing; ?>" />

                             <td align="right" width="25%"><label style="margin-right:14px;">Room No.</label></td>
                                            <td class="form-group"><label><select class=" form-control input-small" name="edit_master_roomno_id" 
                                            value="<?php echo $data['room_checkin_checkout']['master_roomno_id']; ?>" id="edit_master_roomno_id">
                                <option value="">--- Select ---</option>
									<?php
									foreach($fetch_master_roomno as $data1)
                                    {
										$room_no=$data1['master_roomno']['room_no'];
										$room_no_explode=explode(',', $room_no);
                                        
                                        
                                        foreach($room_no_explode as $room_nos)
                            {
                              $room_vacant=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_room_report',$room_nos), array());
                                
                                if(!empty($room_vacant))
                                {  $roo_blank_status=$room_vacant[0]['room_checkin_checkout']['status'];
                                    if($roo_blank_status=='1')
                                    {
                                     ?>
                                             <option value="<?php echo $room_nos;?>" <?php if($room_nos==$data['room_serviceing']['master_roomno_id']){ echo 'selected'; } ?>><?php echo $room_nos;?></option>
                                        <?php
                                    }
                                }
                                else
                                {?>
                                    <option value="<?php echo $room_nos;?>" <?php if($room_nos==$data['room_serviceing']['master_roomno_id']){ echo 'selected'; } ?>><?php echo $room_nos;?></option>
                                <?php
                                }
                            }
                        }
                                    ?>
                                      
                                </select></label>
                                    </td>
                        <?php 
                        
                                    ?>
                        <td align="left"><input type="text" class="form-control input-medium" placeholder="Guest Name" name="edit_guest_name" id="edit_guest_name"  value="<?php echo $guest_name; ?>"></td>
                       
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>
                        
                        
                        <tr>
                        
                        <td align="right"><label>Room Status</label></td>
                        <td colspan="2" align="left"><div class="form-group">
										<div class="radio-list">
											<label class="radio-inline">
											<input type="radio" name="edit_room_status" id="edit_room_status" value="clean"
                                            <?php if($data['room_serviceing']['room_status']=='clean'){ echo 'checked'; } ?>> Clean</label>
											<label class="radio-inline">
											<input type="radio" name="edit_room_status" id="edit_room_status" value="outoforder" 
                                            <?php if($data['room_serviceing']['room_status']=='outoforder'){ echo 'checked'; } ?>> Out of Order</label>
                                            <input type="radio" name="edit_room_status" id="edit_room_status" value="dirty" 
                                            <?php if($data['room_serviceing']['room_status']=='dirty'){ echo 'checked'; } ?>> Dirty</label>
										</div>
						</div>
                        </td></tr>
                        
                        <tr><td align="right" width="10%"><label style="margin-right:8px;">Serviced By</label></td>
                        <td class="form-group">
                        
                        
                        <label><select class=" form-control" style="width:250px" name="edit_serviced_by" id="edit_serviced_by" value="<?php echo $serviced_by; ?>" >
                                <option value="">--- Select Caretaker Name ---</option>
									<?php
                                    foreach($fetch_master_caretaker as $data)
                                    {
                                    	
                                        	?>
                                            <option <?php if($serviced_by==$data['master_caretaker']['id']){?> selected="selected" <?php } ?> value="<?php echo $data['master_caretaker']['id'];?>"><?php echo $data['master_caretaker']['caretaker_name'];?></option>
                                        <?php
                                        }
                                    
                                    ?>
                                </select></label></td>
                                
                                 <td class="form-group"><div class="input-group"><label><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="edit_service_date" data-date="12-08-2015"
                                 
                                 value="<?php echo date('d-m-Y', strtotime($service_date)); ?>"></label></div></td>
                        
                      </tr>
                        	
                       <tr>
                          <td align="right"><label style="margin-right:14px;">Remark</label></td>
                        <td colspan="2">
                        
                        <textarea class="form-control input-large" name="edit_remarks" id="edit_remarks" rows="1"><?php echo $remarks; ?></textarea></td></tr>
                         
                         <tr><td colspan="3"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_room_servicing" value="edit_room_servicing" class="btn blue"><i class="fa fa-plus"></i> Update</button>
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
            <a class="btn default btn-xs red" data-toggle="modal" href="#delete<?php echo $id_room_serviceing; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete<?php echo $id_room_serviceing; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            

                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                            

                        </div>
                       
                        <div class="modal-footer">
                        <form method="post" name="delete<?php echo $id_room_serviceing; ?>">
                        <input type="hidden" name="delete_servicing_id" value="<?php echo $id_room_serviceing; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_room_servicing" value="delete_room_servicing" class="btn red">Delete</button>
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
             
                     </div> <?php }?>   
			</div>  
    	</div>
    </div>
</div>

<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script>
		
$(document).ready(function()
        {
			$("#dlt").click(function(){
			 //setInterval(function(){
				 $('#delete').hide();
			 //},5000);
			 
    });
			
			
			
			$("#master_roomno_idd").on('change',(function(e)
            {
                e.preventDefault();
                var ar = [];
                var room_no=$("select[id=master_roomno_idd]").val();
                ar.push(room_no);
                var myJsonString = JSON.stringify(ar);
				
                $.ajax({ 
                url: "ajax_php_file?outlet_guest_fetch=1&q="+myJsonString,
                type: "POST", 
				          
                success: function(data)
                { 
				
					$("#guest_name").val(data);  
                }
                });
            }));	
            
            
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
		