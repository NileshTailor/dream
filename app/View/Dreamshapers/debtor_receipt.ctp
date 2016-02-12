<?php
if(empty($active))
{ $active="";
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Debtor Receipt</div><div class="toast-message"> </div></div></div>
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
<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong>Add Debtor Receipt</strong></h6></span>

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
                    <form method="post" name="add">
                   
                   	 <div class="table-responsive">
                     
                    	<table class="table self-table" style=" width:100% !important;" align="center" border="0">
                        
                        <tr class="well" style="background-color:#D0CFF8">
                                    <td align="right"><label>Guest/Group Name</label></td>
                                            <td>
                                            <input type="text" class="form-control input-inline input-small" placeholder="Name" name="guest_name" required/>
                                            </td>
                                            
                         <td align="right"><label>Date</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small date-picker" 
                        data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="date_to" ></td>
                                            
                                            
                                            <td colspan="3" align="right"><div class="form-group">
										<div class="radio-list" >
											<label class="radio-inline">
											<input type="radio" name="wherepaid" checked="checked" value="On Account" style="margin-left:4px">On Account</label>
											<label class="radio-inline">
											<input type="radio" name="wherepaid" value="Advance Against Booking">Advance Against Booking</label>
										</div>
						                </div>
                        </td>
                        <td align="left"><select class=" form-control input-small" name="advancebooking" disabled="disabled">
                                             
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
                                        </select>
                                        </td>
                                        <?php 
                                        ?>
                                        </tr>
                                        
                                        <tr><td colspan="8">
                                        <fieldset>
                                        <legend>
                                        <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Payment Mode</strong></h5></span>
                                        </legend>
                                        <table width="100%" border="0">
                                        <div class="form-group">
										<div class="radio-list" ><tr><td colspan="6" align="center" style="padding-bottom:20px">
                                        
											<label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcc" checked="checked" value="Cash" style="margin-left:4px">Cash</label>
											<label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcq" value="Cheque">Cheque</label>
                                            <label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcn" value="Neft">NEFT</label>
                                            <label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcr" value="Credit Card">Credit Card</label>
										
                        </td>
                        <td align="right"><label>Amount</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small" placeholder="Amount" name="amount" ></td>
                        </tr></div>
						                </div>
                        <!------------------------------------------------------------------------------------------------------------->
                        
                        <tr align="center"  id="cash_idd">
                        
                        <td align="right" colspan="2"><label>Receipt No.</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small" placeholder="Receipt No." name="recpt_no" ></td>
                        <td width="20%"></td><td></td>
                        <td width="20%"></td><td></td><td></td>
                        </tr>
                        <tr align="center" id="cheque_idd" input style="display:none;">
                        
                        <td align="right"><label>Bank Name</label></td>
                        <td align="left" colspan="2"><input type="text" class="form-control input-inline input-medium" placeholder="Bank Name" name="b_name" ></td>
                        <td width="20%"></td><td></td><td></td><td></td>
                        
                        <td width="20%"></td>
                        </tr>
                        
                        <tr align="center" id="neft_idd" input style="display:none;">
                        
                        <td align="right"><label>NEFT No.</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small" placeholder="NEFT No." name="neft_no" ></td>
                        <td></td><td></td>
                       <td width="20%"></td><td></td><td width="20%"></td><td></td>
                        </tr>
                        
                        <tr id="credit_idd" input style="display:none;">
                        
                        <td align="right"><label>Card name</label></td>
                        <td colspan="2" align="left"><select class=" form-control input-medium" style="width:100px;" name="card_name">
                                <option value="">---Select Card Name--</option>
											 <option>ICICI</option>
                                             <option>SBI</option>
                                             <option>HDFC</option>
                                             <option>IDBI</option>
						        </select>
                                    </td>
                                    <td width="20%"></td><td></td><td width="20%"></td><td></td>
                                    
                        </tr>                        
                        </table></fieldset></td></tr>
                        <tr>
                         <td><label>Narration</label></td>
                        <td colspan="7">
                        <input type="text" class="form-control input-inline"style="width:900px" placeholder="Text your Narration here..." name="narration" />
                        </td></tr>
                        

		 <!------------------------------------------------------------------------------------------------------------------->                
                                        
                                        <tr>
                       	                 <td colspan="8"><center>
                                        <button type="submit" name="add_debtor_receipt" class="btn green" value="add_debtor_receipt"><i class="fa fa-plus"></i> Add</button>
                                        <button type="reset" name="" class="btn red " value="add_debtor_receipt"> Cancel</button>
                                        
                                        </center></td>
                                        </tr>
                                        </table>
                                 </div>
                           </form>
                    
                </div>
                
                
                
                
                
                
           
<div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_debtor_receipt))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>                     	 <div class="table-responsive">

  <table class="table table-striped table-bordered table-hover" id="sample_1" width="100%">
	<thead>
    <tr>
    <th>S. No.</th>
    <th>Guest/Group Name</th>
            <th>Paid Type</th>
         <th>Receipt Type</th>
        <th>Date</th>
        <th>Amount</th>
                <th>Narration</th>
        <th>Edit</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     
     
     
     	<?php
		$i=0;
		 foreach($fetch_debtor_receipt as $data){ 
		 $i++;
		 $id_fetch_debtor_receipt=$data['debtor_receipt']['id'];
       $guest_name=$data['debtor_receipt']['guest_name'];
        $wherepaid=$data['debtor_receipt']['wherepaid'];
         $recpt_type=$data['debtor_receipt']['recpt_type'];
         $recpt_no=$data['debtor_receipt']['recpt_no'];
		$date_to=$data['debtor_receipt']['date_to'];
        $amount=$data['debtor_receipt']['amount'];
        $b_name=$data['debtor_receipt']['b_name'];
         $neft_no=$data['debtor_receipt']['neft_no'];
		$card_name=$data['debtor_receipt']['card_name'];
        $narration=$data['debtor_receipt']['narration'];

		 ?>
        <tr>

        <td><?php echo $i; ?></td>
        <td><?php echo $data['debtor_receipt']['guest_name']; ?></td>
        <td><?php echo $data['debtor_receipt']['wherepaid']; ?></td>
         <td><?php echo $data['debtor_receipt']['recpt_type']; ?></td>
         <td><?php echo $data['debtor_receipt']['date_to']; ?></td>
        <td>
        <?php echo $data['debtor_receipt']['amount']; ?>
        </td>
        <td><?php echo $data['debtor_receipt']['narration']; ?></td>
       
        <!--<td>
        <a href="receipt_print?id=<?php echo $id_fetch_debtor_receipt; ?>" target="_blank" class="btn default btn-xs blue-stripe">Print</a>
</td>-->
        <td>									<a class="btn default btn-xs blue-stripe" data-toggle="modal" href="#popup_<?php echo $id_fetch_debtor_receipt; ?>"> Edit </a>
        
        
                                       <div class="modal fade bs-modal-lg" id="popup_<?php echo $id_fetch_debtor_receipt; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
                                        
										<div class="modal-body">
											                     <form method="post" name="edit_<?php echo $id_fetch_debtor_receipt; ?>">
                                                               	 <div class="table-responsive">

                                            
                    	<table class="table self-table" style=" width:100% !important;" align="center" border="0">
                        
                        <tr class="well" style="background-color:#D0CFF8">
                        <input type="hidden" name="debtor_receipt_id" value="<?php echo $id_fetch_debtor_receipt; ?>" id="edit_dabtor_receipt_id" />
                        
                                    <td align="right"><label>Name</label></td>
                                            <td align="left">
                                            <input type="text" class="form-control input-inline input-small" placeholder="Name" name="edit_guest_name" value="<?php echo $guest_name;?>" required/>
                                            </td>
                                            <td align="right"><label>Date</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="edit_date_to" value="<?php echo date('d-m-Y', strtotime($date_to)); ?>"></td>
                        
                                            <td colspan="3" align="right">
                                            <div class="form-group">
										    <div class="radio-list">
											<label class="radio-inline">
											<input type="radio" name="edit_wherepaid" checked="checked" value="On Ammount" style="margin-left:4px" <?php if($data['debtor_receipt']['wherepaid']=='On Amount'){ echo 'checked'; } ?>>On Account</label>
											<label class="radio-inline">
											<input type="radio" name="edit_wherepaid" value="Advance Against Booking" <?php if($data['debtor_receipt']['wherepaid']=='Advance Against Booking'){ echo 'checked'; } ?>>Advance Against Booking</label>
										</div>
						                </div>
                        </td>
                        <td align="left"><select class=" form-control input-small" name="edit_advancebooking" disabled="disabled">
                                             
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
                                </select>
                                    </td>
                        <?php 
                                    ?>
                        </tr>
                        <tr><td align="right"><label>Amount</label></td>
                        <td align="left" colspan="7"><input type="text" class="form-control input-inline input-small" placeholder="Amount" name="edit_amount"  value="<?php echo $amount; ?>"></td>
                        </tr>
                        
                        
                                      
                        <!------------------------------------------------------------------------------------------------------------->
                        <?php if(!empty($card_name))
                                                {
                                                 ?>
                        <tr  id=""><td align="right" colspan="3"><label>Card name</label></td>
                         <td colspan="3" align="left"><select class=" form-control input-large" style="width:100px;" name="edit_card_name">
                                             
                                <option value="">Select</option>
									
											 <option <?php if($credit_card_name==$data['debtor_receipt']['card_name']){ echo 'selected'; } ?>>ICICI</option>
                                             <option <?php if($credit_card_name==$data['debtor_receipt']['card_name']){ echo 'selected'; } ?>>SBI</option>
                                             <option <?php if($credit_card_name==$data['debtor_receipt']['card_name']){ echo 'selected'; } ?>>HDFC</option>
                                             <option <?php if($credit_card_name==$data['debtor_receipt']['card_name']){ echo 'selected'; } ?>>IDBI</option>
										
                                </select>
                                    </td>
                        </tr>                        
                       
                        
                        <?php } else if(!empty($recpt_no))
                                                    {?>
                        <tr align="center" >
                        <td align="right"><label>Receipt No.</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small" placeholder="Receipt No." name="edit_recpt_no"  value="<?php echo $recpt_no; ?>"></td>
                        
                        
                        
                        <?php } else if(!empty($neft_no))
                                                    {?>
                                                    
                        <tr align="center" >
                        <td align="center"><label>NEFT No.</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="NEFT No." name="edit_neft_no"  value="<?php echo $neft_no; ?>"></td>
                                                </tr>
                        <?php } else if(!empty($b_name)) {?>
                        
                        <tr align="center" >
                        <td align="right"><label>Bank Name</label></td>
                        <td colspan="2" align="left"><input type="text" class="form-control input-inline input-large" placeholder="Bank Name" name="edit_b_name"  value="<?php echo $b_name; ?>"></td> </tr>
                        
                        <?php }?>
                        
                        <tr >
                         <td><label>Narration</label></td>
                        <td colspan="7">
                        <input type="text" class="form-control input-inline input-large" placeholder="Text your Narration here..." name="edit_narration" value="<?php echo $narration;?>"/>
                        </td></tr>
                        
 

		 <!------------------------------------------------------------------------------------------------------------------->                
                                        
                                                                                          
                        
                        <tr><td colspan="6"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_debtor_receipt" value="edit_debtor_receipt" class="btn blue">Update</button>
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
            <a class="btn default btn-xs black" data-toggle="modal" href="#delete_<?php echo $id_fetch_debtor_receipt; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete_<?php echo $id_fetch_debtor_receipt; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <form method="post" name="delete_<?php echo $id_fetch_debtor_receipt; ?>">

                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                            <input type="hidden" name="delete_debtor_receipt_id" value="<?php echo $id_fetch_debtor_receipt; ?>" />

                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_debtor_receipt" value="delete_debtor_receipt" class="btn blue">Delete</button>

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
</div>
 <?php }?>
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