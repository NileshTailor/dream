<?php

if(empty($active))
{ $active="";
}
?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Paid Receipt</div><div class="toast-message"> </div></div></div>
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
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">
<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong>Add Paid Receipt</strong></h6></span>

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
                    <form method="post" name="add" id="add_paid_receipt">
                   
                   	 <div class="table-responsive">
                     
                    	<table class="table self-table" style=" width:50% !important;" align="center" border="0">
                        
                        
                        
                        
                        <tr ><td><label>Card No.</label></td> 
                                            <td>
                                            <input type="text" class="form-control input-inline input-small" placeholder="Card No." name="card_no"/>
                                            </td>
                                            <td><label>Date</label></td> 
                     <td><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="date_to" ></td>
                     </tr>
                     
                     <tr >
                     <td><label>Description</label></td> 
                                            <td colspan="3">
                                            <input type="text" class="form-control input-inline input-large" placeholder="Description" name="description"/>
                                            </td></tr>
                                             <tr ><td colspan="2" align="center" style="background-color:rgba(124, 125, 126, 0.36)"><div class="form-group">
										<div class="radio-list" >
											<label class="radio-inline">
											<input type="radio" name="r_type" id="rcc" checked="checked" value="Cash" style="margin-left:4px">Cash</label>
											<label class="radio-inline">
											<input type="radio" name="r_type" id="rcq" value="Room">Room</label>
                                            
										</div>
						                </div>
                        </td>
                        <td><label>Amount</label></td> 
                                            <td>
                                            <input type="text" class="form-control input-inline input-small" placeholder="Amount" name="amount"/>
                                            </td>
                        
                        </tr>               
                                            
                        <tr >
                       <td><label>Room No.</label></td>
                                            <td><select class=" form-control" style="width:80px;" name="master_roomno_id">
                                             
                                <option value="">Select</option>
									<?php
									foreach($fetch_master_roomno as $data)
                                    {
										$room_no=$data['master_roomno']['room_no'];
										$room_no_explode=explode(',', $room_no);
									   foreach($room_no_explode as $room_nos)
										{
											?>
											 <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
										<?php
										}
									}
                                   
                                    ?>
                                    </optgroup>
                                </select>
                                    </td>
                        <?php 
                        
                                    ?>
                                     <td><label>Room Type</label></td>
                                            <td><select class=" form-control input-small" 
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
											</select></td>
                                    
                        </tr>
                         <tr >
                                            <td><label>Remark</label></td> 
                                            <td colspan="3"><textarea rows="3" class="form-control input-inline input-large" name="remark" ></textarea></td></tr>
		 <!------------------------------------------------------------------------------------------------------------------->                
                                     
                                       
                                        <tr>
                                        <td colspan="4"><center>
                                        <button type="submit" name="add_paid_receipt" class="btn green" value="add_paid_receipt"><i class="fa fa-plus"></i> Add</button>
                                        <button type="reset" name="" class="btn red " value="add_paid_receipt"> Cancel</button>
                                        
                                        </center></td>
                                        </tr>
                                        </table>
                                 </div>
                           </form>
                    
                </div>
                
                
                
                
                
                
           
  
 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_paid_receipt))
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
        <th>No.</th>
        <th>Date</th>
        <th>Paid at</th>
        <th>Room No.</th>
        <th>Room Type</th>
        <th>Amount</th>
        <th>Description</th>
        <th>Remarks</th>
        <!--<th>Receipt Print</th>-->
        <th>Edit</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     
     
     
     	<?php
		$i=0;
		 foreach($fetch_paid_receipt as $data){ 
		 $i++;
		 $id_fetch_paid_receipt=$data['paid_receipt']['id'];
       $card_no=$data['paid_receipt']['card_no'];
        $date_to=$data['paid_receipt']['date_to'];
		$description=$data['paid_receipt']['description'];
        $r_type=$data['paid_receipt']['r_type'];
		$amount=$data['paid_receipt']['amount'];
        $room_no=$data['paid_receipt']['room_no'];
		$room_type_id=$data['paid_receipt']['room_type_id'];
		$remark=$data['paid_receipt']['remark']; 
        ?>
        <tr>
        
        <td><?php echo $data['paid_receipt']['card_no']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['paid_receipt']['date_to'])); ?></td>
        <td><?php echo $data['paid_receipt']['r_type']; ?></td>
       <td> <?php echo @$data['paid_receipt']['room_no']; ?></td>
<td><?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['paid_receipt']['room_type_id']), array()); ?></td>
                  
                  <td>       <td><?php echo $data['paid_receipt']['amount']; ?></td>
       <td><?php echo $data['paid_receipt']['description']; ?></td>
        <td><?php echo $data['paid_receipt']['remark']; ?></td>
       
        <!--<td>
        <a href="receipt_print?id=<?php echo $id_fetch_paid_receipt; ?>" target="_blank" class="btn default btn-xs blue-stripe">Print</a>
</td>-->
        <td>									<a class="btn default btn-xs blue-stripe" data-toggle="modal" atttter="<?php echo $i;?>" href="#popup_<?php echo $id_fetch_paid_receipt; ?>"> Edit </a>
        
        
                                       <div class="modal fade bs-modal-md" id="popup_<?php echo $id_fetch_paid_receipt; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
                                        
										<div class="modal-body">
											                     <form method="post" name="edit_<?php echo $id_fetch_paid_receipt; ?>" id="edit_paid_receipt<?php echo $i;?>">
                                                               	 <div class="table-responsive">

                                            
                    	<table class="table self-table" style=" width:50% !important;" align="center" border="0">
                        
                        <tr >
                        <input type="hidden" name="paid_receipt_id" value="<?php echo $id_fetch_paid_receipt; ?>" id="edit_paid_receipt_id" />
                        
                        
                        <td><label>card_No.</label></td> 
                                            <td>
                                            <input type="text" class="form-control input-inline input-small" placeholder="No." name="edit_card_no" value="<?php echo $card_no;?>"/>
                                            </td>
                                            <td><label>Date</label></td> 
                     <td><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="edit_date_to" value="<?php echo date('d-m-Y', strtotime($data['paid_receipt']['date_to'])); ?>"></td>
                     </tr>
                     
                     <tr >
                     <td><label>Description</label></td> 
                                            <td colspan="3">
                                            <input type="text" class="form-control input-inline input-large" placeholder="Description" name="edit_description"  value="<?php echo $description;?>"/>
                                            </td></tr>
                                            
                                            
                                             <tr><td colspan="2" align="center" style="background-color:rgba(124, 125, 126, 0.36)"><div class="form-group">
										<div class="radio-list" >
											<label class="radio-inline">
											<input type="radio" name="edit_r_type" checked="checked" value="Cash" style="margin-left:4px"
                                            <?php if($data['paid_receipt']['r_type']=='Cash'){ echo 'checked'; } ?>>Cash</label>
											<label class="radio-inline">
											<input type="radio" name="edit_r_type" value="Room"
                                            <?php if($data['paid_receipt']['r_type']=='Room'){ echo 'checked'; } ?>>Room</label>
                                            
										</div>
						                </div>
                        </td>
                        <td><label>Amount</label></td> 
                                            <td>
                                            <input type="text" class="form-control input-inline input-small" placeholder="Amount" name="edit_amount" value="<?php echo $amount;?>"/>
                                            </td>
                        
                        </tr>               
                                            
                        <tr >
                       <td><label>Room No.</label></td>
                                            <td><select class=" form-control" style="width:80px;" name="edit_room_no">
                                             
                                <option value="">Select</option>
									<?php
									foreach($fetch_master_roomno as $data1)
                                    {
										$room_no=$data1['master_roomno']['room_no'];
										$room_no_explode=explode(',', $room_no);
									   foreach($room_no_explode as $room_nos)
										{
											?>
											 <option value="<?php echo $room_nos;?>" <?php if($room_nos==$data['paid_receipt']['room_no']){ echo 'selected'; } ?>><?php echo $room_nos;?></option>
										<?php
										}
									}
                                   
                                    ?>
                                    </optgroup>
                                </select>
                                    </td>
                        <?php 
                        
                                    ?>
                                     <td><label>Room Type</label></td>
                                            <td><select class=" form-control input-small" 
                                            name="edit_room_type_id">
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_master_room_type as $data1)
                                            {
                                            	?>
                                                <option value="<?php echo $data1['master_room_type']['id'];?>"
                                                <?php if($data1['master_room_type']['id']==$data['paid_receipt']['room_type_id']){ echo 'selected'; } ?>><?php echo $data1['master_room_type']['room_type'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></td>
                                    
                        </tr>
                         <tr >
                                            <td><label>Remark</label></td> 
                                            <td colspan="3"><textarea rows="3" class="form-control input-inline input-large" name="edit_remark"><?php echo $remark;?></textarea></td></tr>
		 <!------------------------------------------------------------------------------------------------------------------->                
                                     
                                       
                                        
                                        
		 <!------------------------------------------------------------------------------------------------------------------->                
                                                                                        
                        
                        <tr><td colspan="4"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_paid_receipt" value="edit_paid_receipt" class="btn blue">Update</button>
										</div></center></td></tr>
                                             
                       
                        </table>
                     </div>
                       </form></div>                     
                                   
										
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
							
            </td>
            
        <td>
            <a class="btn default btn-xs black" data-toggle="modal" href="#delete_<?php echo $id_fetch_paid_receipt; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete_<?php echo $id_fetch_paid_receipt; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <form method="post" name="delete_<?php echo $id_fetch_paid_receipt; ?>">

                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                            <input type="hidden" name="delete_paid_receipt_id" value="<?php echo $id_fetch_paid_receipt; ?>" />

                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_paid_receipt" value="delete_paid_receipt" class="btn blue">Delete</button>

                        </div>
                        </form>
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
</div><?php }?>
 
      </div>

			</div>  
    	</div>
    </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>

function roomfunction()
	{
		var id=$("select[name=room_no]").val();
			
			alert(id);
			$.ajax({
				url: "ajax_php_file?check_id_roomfunction_ftc=1&q="+id,
				type: "POST",         
				success: function(data)
				{
					
					var da=data.split(",");
					//$("#master_roomno_id").val(data);
					$("#rt_id").val(da[0]);
					$("#rg_id").val(da[1]);
					$("#p_id").val(da[2]);
					$("#g_id").val(da[3]);
					$("#bi_id").val(da[4]);
				}
			})
			
			
	}


$(document).ready(function(){
	
    $("#rcc").click(function(){
		$('#cash_idd').show();
		$('#cheque_idd').hide();
		$('#neft_idd').hide();
		$('#credit_idd').hide();
    });
	$("#rcq").click(function(){
		$('#cash_idd').hide();
		$('#cheque_idd').show();
		$('#neft_idd').hide();
		$('#credit_idd').hide();
    });
	$("#rcn").click(function(){
		$('#cash_idd').hide();
		$('#cheque_idd').hide();
		$('#neft_idd').show();
		$('#credit_idd').hide();
    });
	$("#rcr").click(function(){
		$('#cash_idd').hide();
		$('#cheque_idd').hide();
		$('#neft_idd').hide();
		$('#credit_idd').show();
    });
	
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