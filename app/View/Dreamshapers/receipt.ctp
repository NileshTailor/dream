<?php
if(empty($active))
{ $active="";
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast" id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Receipt</div><div class="toast-message"> </div></div></div>
</div>


<div id="message"></div>
  <div ng-spinner-bar="" class="page-spinner-bar hide">
		<div class="bounce1"></div>
		<div class="bounce2"></div>
		<div class="bounce3"></div>
        <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong>Add Receipt</strong></h6></span>
	</div>
<div class="row">
    <div class="col-md-12">
    <div style="width:90%; margin:50px"
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Receipt
</a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View

</a>
                </li>


            </ul>

            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                    <form method="post" name="add" id="receiptadd_id">
                   
                   	 <div class="table-responsive">
                     
                    	<table class="table self-table" style=" width:85% !important;" align="center" border="0">
                        
                        <tr>
                        <td colspan="8">
                           <fieldset>
                                        <legend>
                                        <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong></strong></h5></span>
                                        </legend>
                           <table width="100%">
                        <tr >
                       
                                    
                                    
                                    
                                    <td align="right"><label>Room Type</label></td>
                                            <td>
                                            <input type="text" readonly="readonly" class="form-control input-inline input-small" placeholder="Room Type" name="room_type_id" id="rt_id" />
                                            </td>
                                            
                                           <td align="right"><label>Plan</label></td> 
                                            <td>
                                            <input type="text" readonly="readonly" class="form-control input-inline input-small" placeholder="Plan" name="plan_id" id="p_id" />
                                            </td>   
                                            
                                             <td><label>Reg. No.</label></td> 
                                            <td>
                                            <input type="text" readonly="readonly" class="form-control input-inline input-small" placeholder="Card No." name="card_no" id="rg_id" />
                                            </td>                                              
                                             </tr>
                                            
                                            <tr>
                                            
                                            <td style="padding-top:20px;"><label>Guest Name</label></td> 
                                            <td><input type="text" readonly="readonly" class="form-control input-inline input-small" placeholder="Guest Name" name="guest_name" id="g_id"></td>
                                         <td><label>Date</label></td>
                                       <td><input type="text" readonly="readonly" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="date_to" >
                                        </tr></table></fieldset></td></tr>
                         
                         <tr>
                        <td colspan="8">
                        <fieldset>
                        <legend>
                        <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>POS Receipt</strong></h5></span>
                        </legend>
                        <table width="100%">
                        <tr>
                        <td width="12%"><label>Select Bill No.</label></td>
                        <td width="15%" align="left"><select class="form-control input-small select2me" style="width:90px;" name="bill_no_id" id="bill_no_id" placeholder="select...">
                        
                        <option value=""></option>
                        <?php
                                foreach($fetch_pos_kot as $data)
                                {
                                ?>
                        <option dueamount="<?php echo $data['pos_kot']['bill_settle_due'];?>" 
                        rno="<?php echo $data['pos_kot']['master_roomnos_id'];?>"
                        cno="<?php echo $data['pos_kot']['card_no'];?>"
                         names="<?php echo $data['pos_kot']['guest_name'];?>" value="<?php echo $data['pos_kot']['id'];?>"><?php echo $data['pos_kot']['id'];?> (<?php echo $data['pos_kot']['guest_name'];?>) 
                                </option>
                                <?php
                                }
                                ?>
                                </optgroup>
                                </select>
                                </td>
                                <?php 
                           ?>
              <td align="right" style="padding-right:15px"><label>Your Due Bill Amount</label></td> <td align="left"><input type="text" class="form-control input-inline input-small" readonly="readonly" id="dueamount" ></td>
                           <td></td><td></td><td></td><td></td>
                             </tr></table></fieldset></td></tr>
                             
                            
                                        
                                        <tr><td colspan="8" align="center">
                                        <fieldset>
                                        <legend>
                                        <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Payment Mode</strong></h5></span>
                                        </legend>
                                        <table width="100%" border="0">
                                        <tr><td colspan="8" align="center" style="padding-bottom:20px">
                                        <div class="form-group">
										<div class="radio-list" >
											<label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcc" checked="checked" value="Cash" style="margin-left:4px">Cash</label>
											<label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcq" value="Cheque">Cheque</label>
                                            <label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcn" value="NEFT">NEFT</label>
                                            <label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcr" value="Credit Card">Credit Card</label>
										</div>
						                </div>
                        </td>
                        </tr>
                        <!------------------------------------------------------------------------------------------------------------->                        
                        <tr id="cash_idd" style="padding-top:30px">
                         <td width="20%"></td><td></td>
                        <td align="right"><label>Cash</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small" placeholder="Cash Amount" name="cash" ></td>
                         <td width="20%"></td><td></td><td></td><td></td>
                        
                        </tr>
                        
                        <tr align="center" input style="display:none;" id="cheque_idd">
                         <td width="20%"></td><td></td>
                        <td align="right"><label>Cheque Amount</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Cheque Amount" name="cheque_amt" ></td>
                        <td><label>Cheque No.</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Cheque No." name="cheque_no" ></td>
                         <td width="20%"></td><td></td>
                        </tr>
                        
                        
                        <tr align="center" input style=" display:none;" id="neft_idd">
                         <td width="20%"></td><td></td>
                        <td align="right"><label>NEFT Amount</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="NEFT Amount" name="neft_amt" ></td>
                        <td align="center"><label>NEFT No.</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="NEFT No." name="neft_no" ></td>
                         <td width="20%"></td><td></td>
                        </tr>
                        
                         <tr align="center" input style="display:none;" id="credit_idd">
                          <td width="20%"></td>
                         <td colspan="2"><label>Credit Card Amount</label></td>
                        <td><input type="text" class="form-control input-inline" style="width:100px" placeholder="Amount" name="credit_card_amt" ></td>

<td colspan="2"><select class=" form-control input-medium" style="width:80px;" name="credit_card_name">
                                <option value="">--Select Credit Card Name--</option>
											 <option>ICICI</option>
                                             <option>SBI</option>
                                             <option>HDFC</option>
						       </select>
                                    </td>
                        <td colspan="2"><input type="text" class="form-control input-inline input-medium" placeholder="Credit Card No." name="credit_card_no" ></td>
                        </tr></table></fieldset></td></tr>
                        
                        <tr ><td colspan="8" align="center"><div class="form-group"><div class="radio-list" >
											<label class="radio-inline">
											<input type="radio" name="bill" value="Main Bill" checked="checked">To Main Bill</label>
											<label class="radio-inline">
											<input type="radio" name="bill" value="Extra">To Extra</label>
                                            
										</div></div>
                                        </td>
                                        </tr>
		 <!------------------------------------------------------------------------------------------------------------------->                
                                        
                                        <tr>
                                        <td colspan="8"><center>
                                        <button type="submit" name="add_receipt_checkout" class="btn green" value="add_receipt_checkout"><i class="fa fa-plus"></i> Add</button>
                                        <button type="reset" name="" class="btn red " value="add_receipt_checkout"> Cancel</button>
                                        
                                        </center></td>
                                        </tr>
                                        </table>
                                 </div>
                           </form>
                    
                </div>
                
                
                
                
                
                
           

 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_receipt_checkout))
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
        <th>Receipt No.</th>
       
        <th>Guest/Group Name</th>
        <th>Room No.</th>
         <th>Receipt Type</th>
        <th>Cash</th>
        <th>Cheque</th>
        <th>NEFT</th>
        <th>Credit</th>
        <th>Remarks</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		 foreach($fetch_receipt_checkout as $data){ 
		 $i++;
		 $id_fetch_receipt_checkout=$data['receipt_checkout']['id'];
        $date_to=$data['receipt_checkout']['date_to'];
		$guest_name=$data['receipt_checkout']['guest_name'];
        $master_roomno_id=$data['receipt_checkout']['master_roomno_id'];
        $room_type_id=$data['receipt_checkout']['room_type_id'];
        $plan_id=$data['receipt_checkout']['plan_id'];
		$card_no=$data['receipt_checkout']['card_no'];
        $billing_ins=$data['receipt_checkout']['billing_ins']; 
         $cash=$data['receipt_checkout']['cash'];
		$cheque_amt=$data['receipt_checkout']['cheque_amt'];
        $cheque_no=$data['receipt_checkout']['cheque_no'];
		$neft_amt=$data['receipt_checkout']['neft_amt'];
        $neft_no=$data['receipt_checkout']['neft_no'];
         $credit_card_amt=$data['receipt_checkout']['credit_card_amt'];
         $res_no_id=$data['receipt_checkout']['res_no_id'];
		$credit_card_name=$data['receipt_checkout']['credit_card_name'];
        $credit_card_no=$data['receipt_checkout']['credit_card_no'];
        $bill=$data['receipt_checkout']['bill'];

		 ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data['receipt_checkout']['id']; ?></td>
        <td><?php echo $data['receipt_checkout']['guest_name']; ?></td>
        <td><?php echo $data['receipt_checkout']['master_roomno_id']; ?></td>
        <td><?php echo $data['receipt_checkout']['recpt_type']; ?></td>
         <td><?php echo @$data['receipt_checkout']['cash']; ?></td>
        <td><?php echo @$data['receipt_checkout']['cheque_amt']; ?>
        <td><?php echo @$data['receipt_checkout']['neft_amt']; ?>
       <td><?php echo @$data['receipt_checkout']['credit_card_amt']; ?></td>
        <td><?php echo $data['receipt_checkout']['billing_ins']; ?></td>
       
        
       <!-- <td>									<a class="btn default btn-xs blue-stripe" data-toggle="modal" atttter="<?php echo $i;?>" href="#popup_<?php echo $id_fetch_receipt_checkout; ?>"> Edit </a>
        
        
                                       <div class="modal fade bs-modal-lg" id="popup_<?php echo $id_fetch_receipt_checkout; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
                                        
										<div class="modal-body">
											                     <form method="post" name="edit_<?php echo $id_fetch_receipt_checkout; ?>" id="edit_receipt_checkout<?php echo $i;?>">
                                                               	 <div class="table-responsive">

                                            
                                            <table class="table self-table" style=" width:100% !important;" border="0" align="center">
                        
                        <tr class="well" style="background-color:#D0CFF8">
                        <input type="hidden" name="receipt_id" value="<?php echo $id_fetch_receipt_checkout; ?>" id="edit_receipt_id" />
                        <td><label>Room No.</label></td>
                                            <td><select class=" form-control" style="width:80px;" name="edit_master_roomno_id">
                                             
                                <option value="">Select</option>
									<?php
									foreach($fetch_master_roomno as $data1)
                                    {
										$room_no=$data1['master_roomno']['room_no'];
										$room_no_explode=explode(',', $room_no);
									   foreach($room_no_explode as $room_nos)
										{
											?>
											 <option value="<?php echo $room_nos;?>" 
                                             <?php if($room_nos==$data['receipt_checkout']['master_roomno_id']){ echo 'selected'; } ?>><?php echo $room_nos;?></option>
										<?php
										}
									}
                                   
                                    ?>
                                    </optgroup>
                                </select>
                                    </td>
                        <?php 
                                    ?>
                                    
                                    
                                    
                                    <td align="right"><label>Room Type</label></td>
                                            <td>
                               <input type="text" class="form-control input-inline input-small" placeholder="Room Type" name="edit_room_type_id" value="<?php echo $room_type_id;?>"/>
                                            </td>
                                            
                                           <td align="right"><label>Plan</label></td> 
                                            <td>
                                            <input type="text" class="form-control input-inline input-small" placeholder="Plan" name="edit_plan_id" value="<?php echo $plan_id;?>"/>
                                            </td>  
                                            <td><label>Reg. No.</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" 
                                            placeholder="Card No." name="edit_card_no" value="<?php echo $card_no;?>"/>
                                            </td>  
                                             </tr>
                                            
                                            
                                            
                                            <tr>
                                            <td><label>Guest Name</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Guest/Group Name" name="edit_guest_name" value="<?php echo $guest_name;?>"></td>
                                        <td><label>Billing Inst.</label></td> 
                                       <td colspan="3"><input type="text" class="form-control input-inline input-large" placeholder="Billing Inst." name="edit_billing_ins" value="<?php echo $billing_ins;?>"></td>
                                       <td align="right"><label>Date</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="edit_date_to" value="<?php echo date('d-m-Y', strtotime($date_to)); ?>"></td></tr>
                        
                        <tr>
                        <td width="15%"><label>Resv S. No</label></td> 
                            <td colspan="7" align="left"><select class="form-control input-small select2me" name="edit_res_no_id" id="edit_res_no_id">
                            <option value=""></option>
                            <?php
                            foreach($fetch_room_reservation as $data)
                            {	 $room_id=$data['room_reservation']['id'];
                             if(!empty($fetch_receipt_checkout))
                             {  $resv_id=$fetch_receipt_checkout[0]['receipt_checkout']['res_no_id'];}
                                if($room_id != $resv_id){
                                        $a_date=$data['room_reservation']['b_date'];
                                        if($a_date=='0000-00-00'){$a_date=date("d-m-Y");}else{ $a_date=date("d-m-Y",strtotime($a_date)); }
                                        ?>
                                        <option <?php if($room_id==$res_no_id){ ?> selected <?php } ?> value="<?php echo $data['room_reservation']['id'];?>" b_date="<?php echo $a_date ?>" 
                                        Name="<?php echo $data['room_reservation']['name_person'];?>" telephone="<?php echo $data['room_reservation']['telephone'];?>"
                                         email="<?php echo $data['room_reservation']['email_id'];?>" outlet_id="<?php echo $data['room_reservation']['master_outlet_id'];?>"
                                          rate="<?php echo $data['room_reservation']['rate_per_night'];?>" advance="<?php echo $data['room_reservation']['advance'];?>"
                                         >
                                        <?php echo $data['room_reservation']['id'];?>  (<?php echo $data['room_reservation']['name_person'];?>)
                                        </option>
                                        <?php
                                	}
                                 }
                            ?>      
                            </select>
                            </td></tr>
                                        
                                        <!--<tr style="background-color:#CCC"><td colspan="8" align="center"><div class="form-group">
										<div class="radio-list" >
											<label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcc" checked="checked" value="cash" style="margin-left:4px">Cash</label>
											<label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcq" value="cheque">Cheque</label>
                                            <label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcn" value="neft">NEFT</label>
                                            <label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcr" value="credit card">Credit Card</label>
										</div>
						                </div>
                        </td>
                        </tr>---->
                        <!------------------------------------------------------------------------------------------------------------->
                        <!-- <?php if(!empty($cash))
                                                {
                                                 ?>
                                                 
                                                 
                         <tr>
                         <td></td><td></td><td align="right" ><label>Cash</label></td>
                        <td align="left" colspan="2"><input type="text" class="form-control input-inline input-small" placeholder="Cash Amount" name="edit_cash" value="<?php echo $cash;?>"></td>
                        <td></td><td></td><td></td></tr>
                        
                        <?php } else if(!empty($cheque_amt))
                                                    {?>
                        
                        <tr align="center">
                        <td></td>
                        <td align="right" colspan="2"><label>Cheque Amount</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Cheque Amount" name="edit_cheque_amt" value="<?php echo $cheque_amt;?>"></td>
                        <td align="center"><label>Cheque No.</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Cheque No." name="edit_cheque_no" value="<?php echo $cheque_no;?>"></td>
                        <td></td><td></td>
                        </tr>
                        <?php } else if(!empty($neft_amt)) {?>
                        
                        <tr align="center">
                        <td></td><td></td>
                        <td align="right"><label>NEFT Amount</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="NEFT Amount" name="edit_neft_amt" value="<?php echo $neft_amt;?>"></td>
                        <td align="center"><label>NEFT No.</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="NEFT No." name="edit_neft_no" value="<?php echo $neft_no;?>"></td>
                        <td></td><td></td>
                        </tr>
                        <?php } else if(!empty($credit_card_no)) {?>
                         <tr align="center" >
                         <td></td>
                         <td><label>Credit Card Amount</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Amount" name="edit_credit_card_amt" value="<?php echo $credit_card_amt;?>"></td>

<td colspan="2"><select class=" form-control input-small" name="edit_credit_card_name">
                                <option value="">--Select Credit Card Name--</option>
											 <option <?php if($credit_card_name==$data['receipt_checkout']['credit_card_name']){ echo 'selected'; } ?>>ICICI</option>
                                             <option <?php if($credit_card_name==$data['receipt_checkout']['credit_card_name']){ echo 'selected'; } ?>>SBI</option>
                                             <option <?php if($credit_card_name==$data['receipt_checkout']['credit_card_name']){ echo 'selected'; } ?>>HDFC</option>
						       </select>
                                    </td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Credit Card No." name="edit_credit_card_no" value="<?php echo $credit_card_no;?>"></td><td></td><td></td>
                        </tr>
                        <?php }?>
                        <tr ><td colspan="8" align="center"><div class="form-group"><div class="radio-list" >
											<label class="radio-inline">
											<input type="radio" name="edit_bill" value="To Main Bill"  
                                            <?php if($data['receipt_checkout']['bill']=='To Main Bill'){ echo 'checked'; } ?>>To Main Bill</label>
											<label class="radio-inline">
											<input type="radio" name="edit_bill" value="To Extra"
                                             <?php if($data['receipt_checkout']['bill']=='To Extra'){ echo 'checked'; } ?>>To Extra</label>
                                            
										</div></div>
                                        </td>
                                        </tr>                                                                 
                        
                        <tr><td colspan="8"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_receipt_checkout" value="edit_receipt_checkout" class="btn blue">Update</button>
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
							
           <!-- </td>
            
        <td>
            <a class="btn default btn-xs black" data-toggle="modal" href="#delete_<?php echo $id_fetch_receipt_checkout; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete_<?php echo $id_fetch_receipt_checkout; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <form method="post" name="delete_<?php echo $id_fetch_receipt_checkout; ?>">

                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                            <input type="hidden" name="delete_receipt_id" value="<?php echo $id_fetch_receipt_checkout; ?>" />

                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_receipt_checkout" value="delete_receipt_checkout" class="btn blue">Delete</button>

                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            <!--</div>
       </td>-->
         
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
		var id=$("select[name=master_roomno_id]").val();
			
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



$(document).ready(function()
			{
				$('#res_no_id').live('change',function(e)
				{
					
				var outlet = $('option:selected', this).attr("outlet_id");
				$("#name").val($('option:selected', this).attr("Name"));
			 	$("#telephone").val($('option:selected', this).attr("telephone"));
			 	$("#email_id").val($('option:selected', this).attr("email"));
				$("#b_date").val($('option:selected', this).attr("b_date"));
				$("#rate").val($('option:selected', this).attr("rate"));
				$("#advance").val($('option:selected', this).attr("advance"));
				$('#outlet_venue_id option[value="' + outlet + '"]').prop('selected', true);
				outlet_rate(outlet);
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

$(document).ready(function()
			{
				$('#bill_no_id').live('change',function(e)
				{
				$("#dueamount").val($('option:selected', this).attr("dueamount"));
				$("#g_id").val($('option:selected', this).attr("names"));
				$("#mridd").val($('option:selected', this).attr("rno"));
				$("#rg_id").val($('option:selected', this).attr("cno"));
				});
	});
	
	$(document).ready(function()
			{
				$('#function_no').live('change',function(e)
				{
				$("#cf").val($('option:selected', this).attr("fc"));
				$("#g_id").val($('option:selected', this).attr("npo"));
				});
	});
</script>