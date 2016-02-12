<style media="print">
.print-hide
{
	display:none;
}
.print-show
{
	display:block !important;
}
</style>
<style>
.none
{
	display:none;
}
</style>
<?php
if(empty($active))
{ $active="";
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title"> Check Out</div><div class="toast-message"> </div></div></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs print-hide">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab"> 
                    <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong> Checkout</strong></h6></span>
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

                    <form method="post" name="add" id="add_checkout">
                     	<table class="table self-table" style="margin-top:0%; width:100% !important; height:50px !important" border="0">    
                        <tr class="well" style="background-color:#D0CFF8">
                        <td><label>Room No.</label></td>
                    	 <td><select class="form-control input-small select2me" name="master_roomno_id" onchange="pos_entry();" id="master_roomno_id" placeholder="Select..." required>
                                <option value=""></option>
                        
									<?php
                                    foreach($fetch_room_checkin_checkout as $data)
                                    {
                                    ?>
                                    <option value="<?php echo $data['room_checkin_checkout']['id']; ?>">
                                    <?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></option>
                                   <?php
                                }
                                ?>
                                </select></td>
                                <input type="hidden" id="room_no_id"  name="room_no_id"/>
                                <td align="center"><label>G.R. No.</label></td> 
                                            <td>
                                            <input type="text" class="form-control input-inline input-small" placeholder="Card No." name="edit_card_no" id="edit_card_no" readonly="readonly" ></td>
                                            
                                           
                                           <td align="right"><label>Booking</label></td>
                                        <td colspan="3" align="left"><div class="form-group">
										<div class="radio-list">
											<label class="radio-inline">
											<input type="radio" name="edit_source_of_booking" value="Direct" id="direct" readonly="readonly"> Direct </label>
											<label class="radio-inline">
											<input type="radio" name="edit_source_of_booking" value="Company" id="company" readonly="readonly" /> Company </label>
                                           
											<label class="radio-inline">
											<input type="radio" name="edit_source_of_booking" value="Travelagent" id="travelagent" readonly="readonly"/> Travel Agent  </label>
										</div>
						</div>
                         </td></tr>
                                          
                            <input type="hidden" name="edit_company_id" id="company_id" >
                                           <tr>
                                            <td><label>Guest / Group Name</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Guest Name" name="edit_guest_name" id="edit_guest_name" ></td>
                                           <td><label>Checkin Date</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small date-picker" placeholder="DD-MM-YYYY"  data-date-format="dd-mm-yyyy"  name="edit_arrival_date" id="edit_arrival_date" data-date="00-00-0000" value=""  onchange="valid()" readonly="readonly"></td>
                                            
                                            <td align="right"><label>Checkout Date</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small date-picker" placeholder="DD-MM-YYYY"  data-date-format="dd-mm-yyyy"  name="edit_checkout_date" id="edit_checkout_date" data-date="00-00-0000" value="<?php echo date("d-m-Y"); ?>" onchange="valid()"></td>
                                            
                                               <td style="padding-right:2%;" align="right"><label>Plan</label></td>
                                               <td ><select class="form-control input-small" name="edit_plan_id" id="edit_plan_id" >
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_master_room_plan as $data1)
                                            {
                                            	?>
                                                <option  value="<?php echo $data1['master_room_plan']['id'];?>"><?php echo $data1['master_room_plan']['plan_name'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></td>                               
                                           
                                            </tr>
                                     
                                             <tr>
                                            
                                            <td><label>PAX</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Pax" name="edit_pax" id="edit_pax" ></td>
                                            <td align="center"><label>Child</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Child" name="edit_child" id="edit_child" ></td>
                                            <td><label>Billing Inst.</label></td> 
                                            <td colspan="3"><input type="text" class="form-control input-inline" style="width:400px" placeholder="Billing Inst." name="edit_billing_instruction" id="edit_billing_instruction"></td>
                                            </tr>
                                            <tr>
                                            <td><label>Remark</label></td> 
                                            <td colspan="3">
                                            <input type="text" class="form-control input-inline" style="width:400px" placeholder="Text your remarks here..." 
                                            name="edit_remarks" id="edit_remarks"></td>
                                                
                                                <td></td>
                                            <td><div class="checkbox-list">
											<label>
											<input type="checkbox" id="advance" name="advance" value="1" checked="checked"> Include Advance </label></div>
                                            </td> 
                                            <td><label>ExtraBed Amount</label></td>
                                            <td><div>
											<input type="text" id="edit_extra_bed_tot" name="edit_extra_bed_tot" class="form-control input-inline input-small" readonly="readonly"></div>
                                            </td> 
                                            </tr>
 <tr><td colspan="8">
 
 <div ><fieldset>
                <legend>
				<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Room View</strong></h5></span>
				</legend>
 <table width="100%" border="0"><tr>
        <th><label>Duration</label></th> 
        <th><label>Total Amount</label></th> 
        <th><label>Tax</label></th> 
        <th><label>Discount(%)</label></th> 
        <th><label>Gross Ammount</label></th> 
        <th><label>Advance</label></th> 
        <th><label>Room Amount</label></th> 
        </tr>
        <tr>
        
         <td><input type="text" class="form-control input-inline input-xsmall" placeholder="Days" name="edit_duration" id="edit_duration" onkeyup="net_amount()" readonly></td>
        <td><input type="text" class="form-control input-inline input-xsmall" placeholder="Total" name="edit_room_charge" id="edit_gross_amount" readonly="readonly" ></td>  
        <input type="hidden"  name="edit_taxes" id="edit_taxes">
        <input type="hidden"  name="edit_room_type_id" id="edit_room_type_id">
        <input type="hidden"  name="edit_gross_amount" id="edit_gross">
        <td><input type="text" class="form-control input-inline input-xsmall" placeholder="Tax" name="edit_totaltax" id="edit_totaltax" readonly="readonly"></td>
        <td><input type="text" class="form-control input-inline input-xsmall" placeholder="Dis." name="edit_room_discount" id="edit_room_discount" readonly="readonly"></td>
        <td><input type="text" class="form-control input-inline input-xsmall" placeholder="Gross" name="edit_tg" id="edit_tg" readonly="readonly"></td>
         <input type="hidden"name="advance_hid" id="advance_hid">
        <td><input type="text" class="form-control input-inline input-xsmall" placeholder="Advance Taken" name="edit_advance_taken" id="edit_advance_taken" readonly="readonly"></td>
        <td><input type="text" class="form-control input-inline input-small" placeholder="Amount" name="edit_net_amount" id="edit_net_amount" readonly="readonly"></td> 
                                             </tr></table></fieldset></div></td></tr>
                                             <input type="hidden"  name="room_due" id="room_due">
                                             <input type="hidden"  name="due_tot" id="due_tot" value="0">
                                             <input type="hidden" class="form-control input-inline input-small" name="edit_pos" id="edit_pos">
                                            <input type="hidden" class="form-control input-inline input-small" name="edit_other" id="edit_other" readonly="readonly">
                                     
                                                                  <!-- <tr><td colspan="10">
<span id="plan_pos_view" style="font-family:Georgia, 'Times New Roman', Times, serif; size:40px"></span>
</td>
</tr>-->
                                             <tr><td colspan="10">
<span id="pos_view"></span>
</td>
</tr>
<tr><td colspan="10">
<span id="house_keeping_view"></span>
</td>
</tr>
<tr><td colspan="10">
<span id="due_payment_view"></span>
</td>
</tr>

<tr><td colspan="10">
                                             <tr><td></td><td></td><td></td><td></td><td></td>
                                            <td colspan="2" align="right"><label>House Keeping</label></td>
                                            <td><input type="text" class="form-control input-inline input-small" value="0" name="edit_house_amount" id="grandamt1" onkeyup="net_amount()"></td></tr>
                                            
                                             
                                             
                                            <tr><td></td><td></td><td></td><td></td><td></td>
                                            <td colspan="2" align="right"><label>FNB Service</label></td>
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="POS" value="0" name="edit_posnet_amount" id="grandamount1" onkeyup="net_amount()"></td></tr>
                                            
                                            
                       
                       <tr>
                        <td></td><td></td><td></td><td></td><td></td>
                        <td colspan="2" align="right"><label>Food Discount(%)</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Disc." name="edit_foo_discount" id="edit_foo_discount" onkeyup="pos_entry()"></td></tr>
                                            <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td align="right" width="15px"><label>Discount</label></td>
                                            <td colspan="2" align="center">
                                <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="discount_type" checked="checked"  id="rupees" value="1"> <i class="fa fa-rupee"></i></label>
                            <label class="radio-inline">
                            <input type="radio" name="discount_type" id="percent" value="2">&nbsp;<b>%</b></label>
                        </div>
                                </td>
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Disc." name="edit_other_discount" id="edit_other_discount"  onkeyup="pos_entry()"></td>
                                            </tr>
                          
                            
                            <tr>
                                <td></td><td></td><td></td><td></td><td></td>
                                <td colspan="2" align="right"><label>Net Amount</label></td>
                                <td><input type="text" class="form-control input-inline input-small" placeholder="Net" 
                                name="edit_totalnetamount1" id="edit_totalnetamount1" readonly="readonly"></td>
                                </tr>
                                
                                <tr>
                                <td></td><td></td><td></td><td></td><td></td>
                                <td colspan="2" align="right"><label>Due Amount</label></td>
                                <td><input type="text" class="form-control input-inline input-small" placeholder="Net" 
                                name="edit_due_amount" id="due_grandamt1" readonly="readonly"></td>
                                </tr>
                                
                                <tr>
                                <td></td><td></td><td></td><td></td><td></td>
                                <td colspan="2" align="right"><label>Your Total Amount</label></td>
                                <td><input type="text" class="form-control input-inline input-small" placeholder="Net" 
                                name="edit_totalnetamount" id="edit_totalnetamount" readonly="readonly"></td>
                                </tr>
                                
                                
                                
                                
                                 
                                

                            <tr><td colspan="8" ><fieldset>
                <legend>
                <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Paid by Other</strong></h5></span>
                </legend><table width="100%" border="0" align="center">
                <tr><td><label>Room No.</label></td>
                    	 <td><select class="form-control input-small select2me" name="edit_transfer_dueamount_to" onchange="pos_entryy();" id="edit_transfer_dueamount_to" placeholder="Select...">
                                <option value=""></option>
                        
									<?php
                                    foreach($fetch_room_checkin_checkout as $data)
                                    {
                                    ?>
                                    
                                    <option value="<?php echo $data['room_checkin_checkout']['id']; ?>">
                                    <?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></option>
                                   <?php
                                }
                                ?>
                                </select></td>
                <td><label>Amount</label></td><td><input type="text" class="form-control input-inline input-small" 
                                name="transfer_due_amount[]" id="transfer_due_amount" onkeypress="pos_data_view();"></td>
                                <td><input type="hidden" id="g_name" name="g_name" /></td>
                                <td><input type="hidden" id="room_name" name="room_name" /></td>
                                <td><input type="hidden" id="card_name" name="card_name" /></td>
                                <td><input type="hidden" id="room_n_id" name="room_n_id[]" /></td>
                
                </tr></table></fieldset></td></tr>
                             
                             
                             <tr><td colspan="8"><fieldset>
                <legend>
                <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Payment Mode</strong></h5></span>
                </legend><table width="100%" border="0">
                             
                          <tr><td colspan="8" align="center">
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
                        
                                <tr id="cash_idd"><td align="right" style="padding-right:10px"><label>Cash</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small" placeholder="Cash Amount" name="cash" id="cash" onkeypress="pos_data_view();"></td>
                        <td align="center"><label>Narration</label></td> 
                                       <td colspan="5"><input type="text" class="form-control input-inline input-large" placeholder="" name="billing_ins" id="bi_id"></td>
                        </tr>
                        
                        <tr align="center" input style="display:none;" id="cheque_idd">
                        <td align="right"><label>Cheque Amount</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Cheque Amount" name="cheque_amt" onkeypress="pos_data_view();" id="cheque_amt"></td>
                        <td><label>Cheque No.</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Cheque No." name="cheque_no" ></td>
                       <td align="center"><label>Narration</label></td> 
                                       <td colspan="3"><input type="text" class="form-control input-inline input-large" placeholder="" name="billing_ins" id="bi_id"></td>
                        </tr>
                        
                        
                        <tr align="center" input style=" display:none;" id="neft_idd">
                        <td align="right"><label>NEFT Amount</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="NEFT Amount" name="neft_amt" onkeypress="pos_data_view();" id="neft_amt"></td>
                        <td align="center"><label>NEFT No.</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="NEFT No." name="neft_no" ></td>
                        <td align="center"><label>Narration</label></td> 
                                       <td colspan="3"><input type="text" class="form-control input-inline input-large" placeholder="" name="billing_ins" id="bi_id"></td>
                        </tr>
                        
                         <tr align="center" input style="display:none;" id="credit_idd">
                         <td><label>Amount</label></td>
                        <td><input type="text" class="form-control input-inline" style="width:100px" placeholder="Amount" name="credit_card_amt" onkeypress="pos_data_view();" id="credit_card_amt"></td>

                          <td colspan="2"><select class=" form-control input-medium select2me" style="width:80px;" name="credit_card_name">
                                <option value="">--Select Credit Card Name--</option>
											 <option>ICICI</option>
                                             <option>SBI</option>
                                             <option>HDFC</option>
						       </select>
                                    </td>
                        <td colspan="2"><input type="text" class="form-control input-inline input-medium" placeholder="Credit Card No." name="credit_card_no" ></td>
                        <td align="center"><label>Narration</label></td> 
                                       <td><input type="text" class="form-control input-inline input-small" placeholder="" name="billing_ins" id="bi_id"></td>
                        </tr>
                        </table></fieldset></td></tr>
                        
                        <tr><td colspan="8"><fieldset>
                <legend>
                <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Paid Out</strong></h5></span>
                </legend><table width="100%" border="0">
                             <tr>
                             <td width="12%" align="center"><label>Amount</label></td> 
                                            <td colspan="7" align="left">
                                            <input type="text" class="form-control input-inline input-small" placeholder="Amount" name="amount"/>
                                            </td>
                             </tr></table></fieldset></td></tr>
                             
                                            
                       <tr>
                        <td>&nbsp;</td>
                        <td colspan="6"><center>
                        
                        <button type="submit" name="add_room_checkin_checkout" class="btn green" value="add_room_checkin_checkout"><i class="fa fa-plus"></i> Submit</button>
                        </center></td>
                       
                        <td>&nbsp;
                        </td>
                        </tr>
                        </table>
                    
                    </form>
        </div>
   
 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                     	 <div class="table-responsive">
<div class="none print-show">
        <?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>
        <div align="center" style="padding: 0px; font-size: 25px; font-family:Verdana, Geneva, sans-serif">
        <b><?php echo $data['address']['name']; ?></b></div>
        <div align="center" style="padding: 0px; font-size: 15px; font-family:Verdana, Geneva, sans-serif">Checkout Report
        <br />
        <hr width="500px" size="40px" style="border:solid 1px #999" /></div>
        <?php }?>
</div>
                        <div class="portlet box blue" style="border:#FFF !important">
                            <div class="portlet-title box white print-hide">
                                <div class="caption">
                                    <strong>Checkout</strong>
                                </div>
                            </div>
                                <div class="portlet-body" style="min-height:400px;">
                                
                                <table align="center" width="40%" border="0"><tr class="print-hide">
                                
                                <td>
                                <div class="form-group">
                                    <div class="col-md-4">
                                            <div class="input-group input-large date-picker input-daterange" data-date-format="dd-mm-yyyy">
                                                <input type="text"  id="start_date"value="<?php echo date('d-m-Y'); ?>" placeholder="Start Date" class="form-control" name="from">
                                                <span class="input-group-addon">
                                                to </span>
                                                <input type="text" id="end_date" value="<?php echo date('d-m-Y'); ?>" placeholder="End Date" class="form-control" name="to">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td><label style="margin-left:10px;"><button onclick="view_data();" class="btn green btn-sm"><i class="fa fa-search"></i> View</button></label></td>
             <td><label style="margin-left:10px;"><button class="btn red btn-sm" onclick="window.print()"><i class="fa fa-print"></i> Report</button></label></td>
             <td><label style="margin-left:10px;"><a class="btn blue btn-sm"  href="excel_checkoutreport" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a></label></td>
                                </tr>
                                </table>
                              
                                <span style="margin-top:20px" id="view_data"></span>
                               
                                </div>
                            </div>
                        </div>
  	</div>
    </div>
</div>
    <script type="text/javascript">

function pos_entry()
	{
	var id=$("select[name=master_roomno_id]").val();
	
	$.ajax({
		url: "ajax_php_file?check_poscheckout_ftc=1&q="+id,
		type: "POST",         
		success: function(data)
		{
			//alert(data);
			var da=data.split(",");
			//$("#master_roomno_id").val(data);
			
			$("#edit_guest_name").val(da[0]);
			
				var bookingtype = da[1];
		//alert(bookingtype);
		if(bookingtype == 'Company'){
			//alert(bookingtype);
			$("input:radio[id=company]").prop('checked', true);
			$("input:radio[id=company]").parent().addClass("checked");
			//$('#cnameid1').show();
			//$('#cnameid2').show();
			}
		if(bookingtype=='Direct'){
			$("input:radio[id=direct]").prop('checked', true);
			$("input:radio[id=direct]").parent().addClass("checked");
			//$('#cnameid1').hide();
			//$('#cnameid2').hide();
			}
		if(bookingtype=='Travelagent'){
				$("input:radio[id=travelagent]").prop('checked', true);
			    $("input:radio[id=travelagent]").parent().addClass("checked");
			
				}
					$("#edit_arrival_date").val(da[2]);
					$("#edit_arrival_date").attr('value',da[2]);
					$('#edit_plan_id option[value="' + da[3] + '"]').prop('selected', true);
					$("#edit_child").val(da[4]);
					$("#edit_pax").val(da[5])
					$("#edit_billing_instruction").val(da[6]);
					$("#edit_remarks").val(da[7]);
					$("#edit_duration").val(da[8]);
					//alert(da[9]);
					$("#edit_advance_taken").val(da[9]);
					$("#advance_hid").val(da[9]);
					
					$("#edit_gross_amount").val(da[10]);
					$("#edit_card_no").val(da[11]);
					//alert(da[12]);
					$("#edit_room_discount").val(da[12]);
					$("#edit_room_type_id").val(da[13]);
					
					
					
				//$("#edit_checkout_date").val(da[14]);
				//alert(da[14]);
				//exit;
				
					$("#room_no_id").val(da[14]);
					$("#company_id").val(da[15]);
					$("#room_n_id").val(da[16]);
					//$("#edit_extra_bed_tot").val(da[17]);
					$("#edit_taxes").val(da[17]);
					//alert(da[18]);
					
					
					//$("#edit_child").val(da[17]);
	///////////////////////////	
	valid();
	pos_data_view();
	house_data_view();
	kot_due();
	due_payment_view();
	plan_data_view();
	
		
			}
			});
}


function pos_entryy()
	{
	var id=$("select[name=edit_transfer_dueamount_to]").val();
	
	$.ajax({
		url: "ajax_php_file?check_poscheckout_ftccc=1&q="+id,
		type: "POST",         
		success: function(data)
		{
			//alert(data);
			var da=data.split(",");
			//$("#master_roomno_id").val(data);
			
			$("#g_name").val(da[0]);
			$("#room_name").val(da[1]);
			$("#card_name").val(da[2]);
		}

	});
	}

function pos_data_view()
	{
		//alert();
		var ar = [];
		var card_no=$("#edit_card_no").val();
		var room_no_id=$("#room_no_id").val();
		ar.push(card_no,room_no_id);
		var myJsonString = JSON.stringify(ar);
		$.ajax({
			url: "ajax_php_file?pos_data_view_checkout=1&q="+myJsonString,
			type: "POST",         
			success: function(data)
			{
				
						var room_charge=eval($('#edit_room_charge').val());
						var pax=eval($('#edit_pax').val());
						
						var duration=eval($('#edit_duration').val());
						var total_room=eval($('#edit_total_room').val());
						var advance_taken=eval($('#edit_advance_taken').val());
						if($('#edit_advance_taken').val().length ==''){ 
							advance_taken = '0';
						 }
						
						var gross_amount=eval($('#edit_gross_amount').val());
						
						var tg=eval($('#edit_tg').val());
						var net_amount=eval($('#edit_net_amount').val());
						var foo_discount=eval($('#edit_foo_discount').val());
						var room_discount=$('#edit_room_discount').val();
						//alert(room_discount);
						var gross=eval($('#edit_gross').val());
						if($('#edit_room_discount').val().length ==''){ 
							room_discount = '0';
						 }
						
						var tx=$('#edit_taxes').val();
						//alert(tx);
						if($('#edit_taxes').val().length ==''){ 
							tx = '0';
							//alert(tx);
						 }
						 
						 
						 var other_discount=$('#edit_other_discount').val();
						if($('#edit_other_discount').val().length ==''){ 
							other_discount = '0';
						 }
						 var other=$('#edit_other').val();
						if($('#edit_other').val().length ==''){ 
							other = '0';
						 }
						var tg=eval($('#edit_tg').val());
						
						var extra_bed_tot=eval($('#edit_extra_bed_tot').val());
						if($('#edit_extra_bed_tot').val().length ==''){ 
							extra_bed_tot = '0';
						 }
						var posamount=eval($('#grandamount1').val());
						var houseamount=eval($('#grandamt1').val());
						if($('#grandamt1').val().length ==''){ 
							houseamount = '0';
						 }
						var pos=eval($('#edit_pos').val());
						var new_amnt=0;
						var tax_amnt=0;
						var rd=0;
						var fd=0;
						var od=0;
						
						var gross=Math.round(gross_amount*duration);
						$('#edit_gross').val(gross);
						
						fd = Math.round((posamount*foo_discount)/100);
						rd = Math.round((gross*room_discount)/100);
						var taxes=tx.split("-");
						//alert(taxes);
							var total=gross;
							$.each(taxes, function( index, value) {
								value=parseFloat(value);
								if($.isNumeric(value)==false){
								//alert("yes");	
								}else{
									total=parseFloat(total);
									value=value/100;
									total=(value*total)+ total;
									//alert(total);
								}
							});
						tx1 = Math.round(total-gross);
						$('#edit_totaltax').val(tx1);
						//alert(edit_totaltax);
						ttt = Math.round(total-rd);
						$('#edit_tg').val(ttt);
						
						netamt =  Math.round((total-rd)-advance_taken+extra_bed_tot);
						//net = Math.round();
						$('#edit_net_amount').val(netamt);
						//alert(edit_net_amount);
						$('#edit_posnet_amount').val(posamount);
						
						//tot = Math.round((posamount-fd)+(total-rd-advance_taken));
						
						if(fd > 0){
						
						var pos =  parseInt(posamount) -  parseInt(fd) ;
							$('#edit_pos').val(pos);
						}
						else
						{var pos =  parseInt(posamount);
						$('#edit_pos').val(pos);
						}
						var room =  parseInt(total) -  parseInt(rd) - parseInt(advance_taken) + parseInt(extra_bed_tot) ;
						tot = parseInt(room) + parseInt(pos);
						
						
						
						var percent_wise=$("input:radio[name=discount_type]:checked").val();
						if(percent_wise==2)
						{
							od1 = Math.round(((tot + houseamount)*other_discount)/100);
							amt = parseInt(tot) + parseInt(houseamount) - parseInt(od1);
							$('#edit_other').val(amt);
						    $('#edit_totalnetamount1').val(amt);
						}
						else
						{
						od = parseInt(tot) + parseInt(houseamount) - parseInt(other_discount);
						$('#edit_other').val(od);
						$('#edit_totalnetamount1').val(od);
						}
						
						var edit_totalnetamount1=eval($('#edit_totalnetamount1').val());
						if($('#edit_totalnetamount1').val().length ==''){ 
							edit_totalnetamount1 = '0';
						 }
						//alert(edit_totalnetamount1);
						var dueamt=eval($('#due_grandamt1').val());
						if($('#due_grandamt1').val().length ==''){ 
							dueamt = '0';
						 }
						 
						// alert(dueamt);
						var edit_totalnetamount=eval($('#edit_totalnetamount').val());
						var room_due=eval($('#room_due').val());
						if($('#room_due').val().length ==''){ 
							room_due = '0';
						 }
						var due_tot=eval($('#due_tot').val());
						if($('#due_tot').val().length ==''){ 
							due_tot = '0';
						 }
						var cash=eval($('#cash').val());
						if($('#cash').val().length ==''){ 
							cash = '0';
						 }
						var cheque_amt=eval($('#cheque_amt').val());
						if($('#cheque_amt').val().length ==''){ 
							cheque_amt = '0';
						 }
						var credit_card_amt=eval($('#credit_card_amt').val());
						if($('#credit_card_amt').val().length ==''){ 
							credit_card_amt = '0';
						 }
						var neft_amt=eval($('#neft_amt').val());
						if($('#neft_amt').val().length ==''){ 
							neft_amt = '0';
						 }
						
					duegross = parseInt(edit_totalnetamount1) + parseInt(dueamt);
						//alert(duegross);
						//var duegross=Math.round(edit_totalnetamount1+dueamt);
						$('#edit_totalnetamount').val(duegross);
						$('#room_due').val(duegross);
						
						var room_due=eval($('#room_due').val());
						if($('#room_due').val().length ==''){ 
							room_due = '0';
						 }
						//alert(room_due);
						var transfer_due_amount=eval($('#transfer_due_amount').val());
						if($('#transfer_due_amount').val().length ==''){ 
							transfer_due_amount = '0';
						 }
						// alert(transfer_due_amount);
						 due1= parseInt(room_due) - parseInt(transfer_due_amount) - parseInt(cash)- parseInt(cheque_amt)- parseInt(credit_card_amt)- parseInt(neft_amt);
						 $('#room_due').val(due1);
					
						
						
						
						$("#pos_view").html(data);
						//alert(data);
						/*if($("#grandamount").val().length>0)
						{	
							var gross=$("#grandamount").val();
						}
						else
						{
							var gross=0;
						}
						$("#grandamount1").val(gross);*/
						
					
										
			}		
			
		}); 
}
///////////////////////////////

function due_payment_view()
	{
		//alert();
		var ar = [];
		var card_no=$("#edit_card_no").val();
		var room_no_id=$("#room_no_id").val();
		ar.push(card_no,room_no_id);
		var myJsonString = JSON.stringify(ar);
		
		$.ajax({
			url: "ajax_php_file?due_payment_view_checkout=1&q="+myJsonString,
			type: "POST",         
			success: function(data)
			{
				//alert(data);
						$("#due_payment_view").html(data);
						if($("#due_grandamt").val().length>0)
						{	
							var gross=$("#due_grandamt").val();
						}
						else
						{
							var gross=0;
						}
						$("#due_grandamt1").val(gross);

										
			}	
				
		});netdue();
}
///////////////////////////

function house_data_view()
	{
		var ar = [];
		var card_no=$("#edit_card_no").val();
		var room_no_id=$("#room_no_id").val();
		ar.push(card_no,room_no_id);
		var myJsonString = JSON.stringify(ar);
		$.ajax({
			url: "ajax_php_file?house_data_view_checkout=1&q="+myJsonString,
			type: "POST",         
			success: function(data)
			{
						$("#house_keeping_view").html(data);
						if($("#grandamt").val().length>0)
						{	
							var gross=$("#grandamt").val();
						}
						else
						{
							var gross=0;
						}
						$("#grandamt1").val(gross);

										
			}		
		});
}
////////////////////
function kot_due()
	{
		//alert();
		var ar = [];
		var card_no=$("#edit_card_no").val();
		var room_no_id=$("#room_no_id").val();
		ar.push(card_no,room_no_id);
		var myJsonString = JSON.stringify(ar);
		//alert(myJsonString);
		$.ajax({
			url: "ajax_php_file?kot_due_amountt=1&q="+myJsonString,
			type: "POST",         
			success: function(data)
			{			//var da=data.split(",");

				//alert(data);
						$("#grandamount1").val(data);
						//$("#kot_due_amount1").val(da[1]);
			}		
		});
}

/*function plan_data_view()
	{
		var ar = [];
		var card_no=$("#edit_card_no").val();
		var room_no_id=$("#room_no_id").val();
		ar.push(card_no,room_no_id);
		var myJsonString = JSON.stringify(ar);
		$.ajax({
			url: "ajax_php_file?planpos_data_view_checkout=1&q="+myJsonString,
			type: "POST",         
			success: function(data)
			{
						$("#plan_pos_view").html(data);
						

										
			}		
		});
}*/

	
	
	function view_data()
	{
		var ar = [];
		var start_date=$("#start_date").val();
		var end_date=$("#end_date").val();
		if($("#start_date").val()!='' ||$("#end_date").val()!='' ){
			$(".page-spinner-bar").removeClass("hide"); //show loading
			ar.push(start_date,end_date);
			var myJsonString = JSON.stringify(ar);
			//alert(myJsonString);
			$.ajax({
			url: "ajax_php_file?room_checkout_view_dateselect=1&q="+myJsonString,
			type: "POST",         
			success: function(data)
			{	
				$("#view_data").html(data);
				$(".page-spinner-bar").addClass(" hide"); //hide loading
				$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
				{
					$(this).alert('close'); 
					$(this).remove();
				});
			}
			});
		}
		else
		{	alert("Please select date first")
		}
	}
	
	
	


$(document).ready(function(){
	$("select[name=master_roomno_id]").live('change', function()
	{
		var master_roomno_id=$(this).val();
		$("select[name=edit_transfer_dueamount_to] option").each(function()
		{
			if($(this).val()!='')
			{
				if($(this).val()==master_roomno_id)
				{
					$(this).attr('class','hide');
				}
				else
				{
					$(this).attr('class','');
				}
			}
		});
	});
	$('#advance').click(function(){
		if($(this).is(':checked')){
			var adv= $("#edit_advance_taken").val();
			if(adv==0){
				var adv= $("#advance_hid").val();
			}
			var edit_tg= $("#edit_tg").val();
			var tot = parseInt(edit_tg) - parseInt(adv) ;
			$("#edit_net_amount").val(tot);
			var edit_pos= $("#edit_pos").val();
			var  totx = parseInt(tot) + parseInt(edit_pos);
			$("#edit_advance_taken").val(adv)
			$("#edit_totalnetamount1").val(totx);
		}
		else {
			var adv= $("#edit_advance_taken").val();
			var edit_tg= $("#edit_tg").val();
			var edit_pos= $("#edit_pos").val();
			$("#edit_net_amount").val(edit_tg);
			$("#edit_advance_taken").val(0);
			var  tot = parseInt(edit_pos) + parseInt(edit_tg);
			$("#edit_totalnetamount1").val(tot);
		}
		}) ;
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
function valid()
	{	
	var a_date=$("#edit_arrival_date").val();
	var d_date=$("#edit_checkout_date").val();
	a_date=new Date(a_date.split("-").reverse().join("-"));
	d_date=new Date(d_date.split("-").reverse().join("-"));
	//var a_date=$("#edit_arrival_date").datepicker('getDate');
	//var d_date=$("#edit_checkout_date").datepicker('getDate');
	var diffDays=(d_date - a_date)/1000/60/60/24;
	if(diffDays==0)
	{
		//$("#edit_duration").val(diffDays);
		diffDays+=1;
	}
		
	  if (diffDays <= 0){
			
			alert("Arrival Date should not be greater. Please Check.");
			$("#edit_checkout_date ").val('');
			
		}
		else
		{
			$("#edit_duration").val(diffDays);
			//alert(diffDays);
		}
		
				
		////////////////////// count Days
		  /*  var parts = a_date.split('-');
    		var arrival = new Date(parts[2] + ',' + parts[1] + ',' + parts[0]);
			var parts1 = d_date.split('-');
    		var depture = new Date(parts1[2] + ',' + parts1[1] + ',' + parts1[0]);
			var oneDay = 24*60*60*1000;
			var diffDays = Math.round(Math.abs((arrival.getTime() - depture.getTime())/(oneDay)));
		
		var dateParts = a_date.split("-");
		var date = new Date(dateParts[2], (dateParts[1] - 1), dateParts[0]);
		var d=new Date(dateParts);
		var arival_date=d.getTime();
		
		var dateParts1 = d_date.split("-");
		var date1 = new Date(dateParts1[2], (dateParts1[1] - 1), dateParts1[0]);
		var d1=new Date(dateParts1);
		var dep_date=d1.getTime();
		if(diffDays == 0){
				$("#edit_duration").val('1');
		}
		else
		{
			$("#edit_duration").val(diffDays);
		}
		//alert(arival_date);
		//alert(dep_date);
		if(arival_date>dep_date)
		{
			//alert("Arrival Date should not be greater. Please Check.");
			$("#edit_checkout_date ").val('');
		}*/
		
	}


<?php
            if($active==2 || $active==1)
            { 
                if($active==2)
                {
                    if(@$active_delete==1)
                    {
                        $contain="Check Out successfully...!";
                        $cls='toast-error';
                    }
                }
                else
                {
                    $contain="Data Submit successfully...!";
                    $cls='toast-success';
                }
       		  ?>
					$(".toast").addClass("<?php echo $cls; ?>");
					$(".toast-message").html("<?php echo $contain; ?>");
					$("#toast-container").show();
					var myVar=setInterval(function(){myTimer()},5000);
					function myTimer() 
					{ $("#toast-container").hide();
					 }  
			
			<?php } ?>
      
</script>