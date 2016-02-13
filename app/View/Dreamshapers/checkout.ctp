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
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab"> Checkout
                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View

                    </a>
                </li>

            </ul>
            <div class="tab-content">               
<div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                
             <form method="post" name="add" id="add_checkout">
                <table class="table self-table" style="margin-top:0%; width:100% !important; height:50px !important" border="0">    
               
               
               <tr> 
                            <?php
                            $i=1;
                            foreach($fetch_gr_no as $data){ 
                            $i++;
                            $id=$data['gr_no']['id'];
                            $checkout_no=$data['gr_no']['checkout_no'];
                            ?>
                            <?php $data['gr_no']['checkout_no']; ?>
                            <?php }?>
                            <td>
                            <div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Checkout No." name="checkout_no" value="<?php echo $checkout_no; ?>" readonly/></div>
                            </td></tr>
               
                <div><tr class="tr-head-color">
                <td><label>Room No.</label></td>
                <td><select class="form-control select2 select2_sample2 input-small" first_time="yes" name="master_roomno_id[]" onchange="pos_entry();" id="master_roomno_id" placeholder="Select..." required multiple>
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
                <td colspan="3" align="left"><div class="form-group" style="display:hidden">
                <div class="radio-list">
                <label class="radio-inline">
                <input type="radio" name="edit_source_of_booking" value="Direct" id="direct" readonly="readonly"> Direct </label>
                <label class="radio-inline">
                <input type="radio" name="edit_source_of_booking" value="Company" id="company" readonly="readonly" /> Company </label>
                <label class="radio-inline">
                <input type="radio" name="edit_source_of_booking" value="Travelagent" id="travelagent" readonly="readonly"/> Travel Agent  </label>
                </div>
                </div>
                </td></tr></div>
                
                <input type="hidden" name="edit_company_id" id="company_id" >
                <tr>
                <td><label>Guest / Group Name</label></td> 
                <td><input type="text" class="form-control input-inline input-small" placeholder="Guest Name" name="edit_guest_name" id="edit_guest_name" ></td>
                <td><label>Checkin Date</label></td> 
                <td><input type="text" class="form-control input-inline input-small date-picker" placeholder="DD-MM-YYYY"  data-date-format="dd-mm-yyyy"  name="edit_arrival_date" 
                	id="edit_arrival_date" data-date="00-00-0000" value=""  onchange="valid()" readonly="readonly"></td>
                
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
                name="edit_remarks" id="edit_remarks"></td></tr>
                
                
                <!--<td colspan="2" align="center"><label>Extra Bed Amount</label></td>
                <td colspan="2"><div>
                <input type="hidden" id="edit_extra_bed_tot" name="edit_extra_bed_tot" class="form-control input-inline input-small" readonly="readonly"></div>
                </td> 
                </tr>
                </table>-->
                
     			<tr><td colspan="8"> <div id="room_details"></div></td></tr>
                  <!--   ///////////////////// -->
                     <table width="100%" border="0">
                    
                        
                         <tr>
                         <td></td>
                        <td align="right"  height="42px" ><div class="checkbox-list">
                <label> <input type="checkbox" id="advance" name="advance" value="1">Include Advance</label></div></td>
                        
                        <td align="center"><input type="text" class="form-control input-inline input-small" placeholder="Advance" name="edit_advance_taken" id="edit_advance_taken" ></td>
                        </tr>
                        <tr>
                        <td  height="42px"></td>
                        <td align="right"><label>Net Amount &nbsp;</label></td>
                        <td  align="center"><input type="text" class="form-control input-inline input-small" placeholder="Net" 
                        name="edit_totalnetamount1" id="edit_totalnetamount1" readonly="readonly"></td>
                        </tr>
                        <tr>
                        <td align="right" width="60%" height="42px" ><label>Discount</label></td>
                        <td width="20%"  align="center">
                        <div class="radio-list">
                        <label class="radio-inline">
                        <input type="radio" name="discount_type" checked="checked"  id="rupees" value="1"> <i class="fa fa-rupee"></i></label>
                        <label class="radio-inline">
                        <input type="radio" name="discount_type" id="percent" value="2">&nbsp;<b>%</b></label>
                        </div>
                        </td>
                        <td align="center"><input type="text" class="form-control input-inline input-small" placeholder="Disc." name="edit_other_discount" id="edit_other_discount"  onkeyup="discount()"></td>
                        </tr>
                        <tr>
                        <td height="42px"><input type="hidden" id="net_amount"/></td>
                        <td align="right"><label>Total Amount &nbsp;</label></td>
                        <td  align="center"><input type="text" class="form-control input-inline input-small" placeholder="Net" 
                        name="edit_totalnetamount" id="edit_totalnetamount" readonly="readonly"></td>
                        </tr>
                        
                        
                        <tr><td><input name="transfer_check" type="checkbox" value="1" id="paid_check" /></td></tr>
                        
                        
                      <tr id="hide_check" display><td colspan="8">
                    <fieldset>
                        <legend>
                        <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Paid by Other</strong></h5></span>
                        </legend>
                    
                    <table width="100%" border="0" align="center">
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
                    name="transfer_due_amount[]" id="transfer_due_amount"></td>
                    <td><input type="hidden" id="g_name" name="g_name" /></td>
                    <td><input type="hidden" id="room_name" name="room_name" /></td>
                    <td><input type="hidden" id="card_name" name="card_name" /></td>
                    <td><input type="hidden" id="room_n_id" name="room_n_id[]" /></td>
                </tr></table></fieldset></td></tr>
                
                    <tr>
                    <td colspan="6">
                      <fieldset>
                <legend>Payment Mode</legend>
                <table class="table" style=" width:100% !important;">
             <thead>
                <tr>
                <td style="width:50%;" align="center">
                             <div class="form-group" >
                        <div class="radio-list">
                        <div id="brm_id">
                           <label class="radio-inline">
                            <input type="radio" name="payment_mode"  value="Cash" id="cre"> Cash </label>
                            <label class="radio-inline">
                            <input type="radio" name="payment_mode" value="Credit Card" id="cre1"> Credit Card </label>
                            <label class="radio-inline">
                                        <input type="radio" name="payment_mode" value="NEFT" id="cre2">NEFT</label>
                                        <label class="radio-inline">
                                        <input type="radio" name="payment_mode" value="Cheque" id="cre3">Cheque</label></div>
                                        
                                       <!-- <div style="display:none" id="include_advance"><label class="radio-inline">
                                        <input type="radio" name="payment_mode" value="Advance">Include in Advance</label></div>-->
                                        
                        </div>
                    </div>
                     </td>
                     <td align="right">Amount</td>
                     <td><input type="text" class="form-control input-inline input-small" name="rec_amount" id="rec_amount" onkeyup="fun_tot_amount();" /></td>
                     <td><input type="text" class="form-control input-inline input-small" placeholder="Narration" name="narration"/></td>
                     </tr>
                    
                     <tr id="cheque"  style="display:none">
                     <td colspan="6">
               <table class="table" style=" width:100% !important;">
             <thead>
                <tr>
                <td>
                Cheque No.
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" name="cheque_no" />
                </td>
                <td>
                Cheque Date
                </td>
                <td class="form-group"><div class="input-group"><label><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="cheque_date" data-date="12-08-2015" value="<?php echo  date("d-m-Y"); ?>"></label></div></td>
                 <td>
                Bank Name
                </td>
                <td>
                 <input type="text" class="form-control input-inline input-medium" name="bank_name" />
                </td>
                </tr>
                </thead>
                </table></td></tr>
                <!----------------------------------------------------->
                <tr id="neft"  style="display:none">
                     <td colspan="6">
               <table class="table" style=" width:100% !important;">
             <thead>
                <tr>
                <td>
                NEFT No.
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" name="neft_no" />
                </td>
                </tr>
                </thead>
                </table></td></tr>
                
                <!--------------------------------------------------------------------->
                <tr id="credit"  style="display:none">
                     <td colspan="6">
               <table class="table" style=" width:100% !important;">
             <thead>
                <tr>
                <td>
                Credit Card Name
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" name="credit_card_name" />
                </td>
                
                <td>
                Credit Card No.
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" name="credit_card_no" />
                </td>
                
                </tr>
                </thead>
                </table></td></tr>
                <!------------------------------------------------------------------------>
                
                
                </thead></table></fieldset>
                        
                        
                        
                <tr><td colspan="8">
                
                <fieldset>
                        <legend>
                        <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Paid Out</strong></h5></span>
                        </legend>
                
       <table width="100%" border="0">
                        <tr>
                        <td width="12%" align="center"><label>Amount</label></td> 
                        <td colspan="7" align="left">
                        <input type="text" class="form-control input-inline input-small" placeholder="Amount" name="amount"/>
                        </td>
                        </tr></table></fieldset></td></tr>
                        
                        
                        
                        <tr>
                        <td>&nbsp;</td>
                        <td colspan="6" align="center"><center>
                        
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
                        <div class="portlet box" style="border:#FFF !important; background-color:#E26A6A">
                            <div class="portlet-title box white print-hide">
                                <div class="caption">
                                    <i class="fa fa-book" style="color:#FFF"></i><strong>Checkout</strong>
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
             <td><label style="margin-left:10px;"><button class="btn red btn-sm" onclick="view_report()"><i class="fa fa-print"></i> Report</button></label></td>
            <!-- <td><label style="margin-left:10px;"><a class="btn blue btn-sm"  href="excel_checkoutreport" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a></label></td>-->
                                </tr>
                                </table>
                              
                                <span style="margin-top:20px" id="view_data"></span>
                               
                                </div>
                            </div>
                        </div>
  	</div>
    </div>
</div>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$(".discount").live("keyup", function(){
     var i= $(this).attr('atttter');
		var total_netamount=$("#edit_totalnetamount1").val();
		var food_discount=$("#edit_foo_discount"+i).val();
		var kot_net_amount=$("#kot_net_amount"+i).val();
		
		if($('#kot_net_amount'+i).val() > 0)
		{	
			var fd = Math.round((kot_net_amount*food_discount)/100);
			var after_food_dis=Math.round(total_netamount-fd);
			$('#edit_totalnetamount').val(after_food_dis)
			$('#net_amount').val(after_food_dis)	
			
		}
	});
	
	$('#advance').click(function(){
		if($(this).is(':checked'))
		{ 
			var adv= $("#edit_advance_taken").val();
			var total_netamount=$("#edit_totalnetamount").val();
			var total_amount_after_advance=Math.round(total_netamount-adv);
			$('#edit_totalnetamount').val(total_amount_after_advance);
			$('#net_amount').val(total_amount_after_advance);
			
				
		}
		else
		{
			var adv= $("#edit_advance_taken").val();
			
			var total_netamount=$("#edit_totalnetamount").val();
			var total_amount_advance=Math.round(parseInt(total_netamount)+parseInt(adv));
			$('#edit_totalnetamount').val(total_amount_advance);
			$('#net_amount').val(total_amount_advance);
			
		}
			
	});
});
////////////////////////////
function pos_entry()
	{
		
	var id=$("#master_roomno_id").val();
	$.ajax({
		url: "ajax_php_file?check_poscheckout_ftc=1&q="+id,
		type: "POST",         
		success: function(data)
		{ 
			var da=data.split(",");
			$("#edit_guest_name").val(da[0]);
			var bookingtype = da[1];
			if(bookingtype == 'Company'){
				$("input:radio[id=company]").prop('checked', true);
				$("input:radio[id=company]").parent().addClass("checked");
			}
			if(bookingtype=='Direct'){
				$("input:radio[id=direct]").prop('checked', true);
				$("input:radio[id=direct]").parent().addClass("checked");
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
				$("#edit_advance_taken").val(da[9]);
				$("#edit_card_no").val(da[11]);
				$("#company_id").val(da[15]);
				$("#room_n_id").val(da[16]);
				$("#edit_extra_bed_tot").val(da[17]);
				room_view_data(id);
				check_card_no(id);
			}
	});
}

/////////////////
function check_card_no(id)
		{
			var id=$("select[id=master_roomno_id]").val();
			//alert(id);
              $.ajax({ 
                url: "ajax_php_file?view_category_check_cardno=1&q="+id,
                type: "POST", 
				 success: function(data)
					{ 
						//alert(data); 
						$("#master_roomno_id").html(data); 
					}
                });	
					}
		//////////////////



function room_view_data(id)
	{
		
		$.ajax({
			url: "ajax_php_file?check_out_all_room_details_out_time=1&q="+id,
			type: "POST",         
			success: function(data)
			{ 
			//alert(data);
				var diff_data=data.split(",");
				$('#edit_totalnetamount1').val(diff_data[0]);
				$('#edit_totalnetamount').val(diff_data[0]);
				$('#net_amount').val(diff_data[0]);
				
				$('#room_details').html(diff_data[1]);
			}
		});
	
	}
	
function discount()
	{
		var percent_wise=$("input:radio[name=discount_type]:checked").val();
		if(percent_wise==2)
		{
			var total_netamount=$("#net_amount").val(); //Your Total Amount   	
			var discount=$("#edit_other_discount").val();// Discount PERCENTAGE
			var dis_amount_per = Math.round((total_netamount*discount)/100);  //// CALCUATION
			var net_amount_after_discount=total_netamount-dis_amount_per  // DISCOunt AMOUNT
			$('#edit_totalnetamount').val(net_amount_after_discount);// REPLACE DATA
		}
		else
		{
			var total_netamount=$("#net_amount").val(); //Your Total Amount   	
			var discount=$("#edit_other_discount").val();// Discount PERCENTAGE
			if($.isNumeric(discount)==false){ discount=0; }
			var net_amount_after_discount = parseInt(total_netamount) - parseInt(discount); //// CALCUATION
			$('#edit_totalnetamount').val(net_amount_after_discount);// REPLACE DATA

		}
						
	}
	
	///////////////////////
	
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
	///////////////////////
	/////////////////////
	function view_report()
		{var ar = [];
			var start_date=$("#start_date").val();
			var end_date=$("#end_date").val();
			//var company_id=$("#company_id").val();
			//var booking_type=$("#booking_type").val();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				//ar.push(start_date,end_date);
				//var myJsonString = JSON.stringify(ar);
				//alert(myJsonString);
				
			window.open('checkout_room_report?start_date='+start_date+'&end_date='+end_date,'_newtab');
		
		}
	/////////////////
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
			
			
			$(document).ready(function(){
		$('input[name=transfer_check]').click(function(){
			
			if($('input[name=transfer_check]').is(':checked'))
		{
			var transfer_check=1;
		}
		else
		{
			var transfer_check=0;
		}
		
		});
			});	
			
			
			
			$(document).ready(function(){
	$("#cre").click(function(){
		$('#credit').hide();
		$('#cheque').hide();
		$('#neft').hide();
		
    });
	$("#cre1").click(function(){
		$('#credit').show();
		$('#cheque').hide();
		$('#neft').hide();
    });
	$("#cre2").click(function(){
		$('#credit').hide();
		$('#cheque').hide();
		$('#neft').show();
    });
	$("#cre3").click(function(){
		$('#credit').hide();
		$('#cheque').show();
		$('#neft').hide();
    });
	});		
      
</script>