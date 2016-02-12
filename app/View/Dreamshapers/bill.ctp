<?php
if(empty($active))
{ $active="";
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast" id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Bill</div><div class="toast-message"> </div></div></div>
</div>


<div id="message"></div>
  <div ng-spinner-bar="" class="page-spinner-bar hide">
		<div class="bounce1"></div>
		<div class="bounce2"></div>
		<div class="bounce3"></div>Bill
	</div>
<div class="row">
    <div class="col-md-12">
    <div style="width:90%; margin:50px"
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Bill
</a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">Print Bill

</a>
                </li>
                <li <?php if($active=='3'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_3" data-toggle="tab">View

</a>
                </li>


            </ul>

            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                    <?php
                if(!empty($error))
				{
					echo "<div id='success' class='note note-danger alert-notification'><p><strong>Sorry,</strong>  You Entered Wrong Payment.. </p></div>";
				}
				?>
                    
                    <form method="post" name="add" id="receiptadd_id">
                   
                   	 <div class="table-responsive">
                     
                    	<table class="table self-table" style=" width:85% !important;" align="center" border="0">
                        <tr>
                        <td colspan="8">
                           <fieldset>
                                        <legend>
                                        <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Room Wise Receipt</strong></h5></span>
                                        </legend>
                           <table width="100%">
                        <tr>
                                         
                                         <td width="12%"><label>Select Bill No.</label></td>
                        <td width="15%" align="left"><select class="form-control input-small select2me" style="width:90px;" name="bill_no_id" id="bill_no_id" placeholder="select..." onChange="payble();">
                        
                        <option value=""></option>
                        <?php
                                foreach($fetch_bill as $data)
                                {
                                ?>
                        <option value="<?php echo $data['bill']['bill_no_id'];?>" mmidee="<?php echo $data['bill']['master_roomno_id'];?>"><?php echo $data['bill']['bill_no_id'];?> (<?php echo $data['bill']['guest_name'];?>) 
                                </option>
                                <?php
                                }
                                ?>
                                </optgroup>
                                </select>
                                </td>
                                <?php 
                           ?>   
                             <td style="padding-left:10px"><label>Reg. No.</label></td> 
                            <td>
                            <input type="text" class="form-control input-inline input-small" placeholder="Card No." name="card_no" id="rg_id" />
                            </td>                                              
                            
                            <td><label>Guest Name</label></td> 
                            <td><input type="text" class="form-control input-inline input-small" placeholder="Guest/Group Name" name="guest_name" id="g_id"></td>
                            </tr>
                            
                            <tr>
                                       <td style="padding-top:20px; vertical-align:middle"><label>Date</label></td>
                                       <td><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="date" id="arr_id"  value="<?php echo date("d-m-Y"); ?>"></td>
                                       <td style="padding-left:10px"><label>Total</label></td> 
                            <td><input type="text" class="form-control input-inline input-small" placeholder="Total" name="total" id="t_id"></td>
                            
                            <td><label>Paid</label></td> 
                            <td><input type="text" class="form-control input-inline input-small" placeholder="Paid" name="paid" id="paid_id"></td>
                            </tr>
                        
                         <td ><label>Room No.</label></td> 
                            <td><input type="text" class="form-control input-inline input-small" readonly placeholder="Rooms" name="master_roomno_id" id="mmmide"></td>
                            
              <td style="padding-left:10px"><label>Due Amount</label></td> <td align="left"><input type="text" class="form-control input-inline input-small" readonly="readonly" id="dueamount" name="bill_duee" ></td>
                           <td></td><td></td>
                            
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
                                        <button type="reset" name="" class="btn red " value="add_receipt_checkout"> Reset</button>
                                        
                                        </center></td>
                                        </tr>
                                        </table>
                                 </div>
                           </form>
                    
                </div>
                
                
                
                
                
                
           

 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                                     	 <div class="table-responsive">
         <form method="post" enctype="multipart/form-data">
<table width="50%" border="0" align="">
    <tr> <td width="12%"><label>Select Bill No.</label></td>
                        <td width="15%" align="left"><select class="form-control input-small select2me" style="width:90px;" name="blid" id="blid" placeholder="select...">
                        
                        <option value=""></option>
                        <?php
                                foreach($fetch_bill as $data)
                                {
                                ?>
                        <option value="<?php echo $data['bill']['bill_no_id'];?>"><?php echo $data['bill']['bill_no_id'];?> (<?php echo $data['bill']['guest_name'];?>) 
                                </option>
                                <?php
                                }
                                ?>
                                </optgroup>
                                </select>
                                </td>
                                <?php 
                           ?>   
    </td></tr>
    <tr><td colspan="2" align="center" style="padding-top:10px"><button  type="submit" name="submit" class="btn green"><i class="fa fa-print"></i> Bill</button></td></tr>  
    </table>
</form>
</div>
      </div>
      <div <?php if($active=='3'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_3">
                <?php if(empty($ftchh_receipt_checkout))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>                     	 <div class="table-responsive">
  <table class="table table-bordered table-hover" id="sample_1" width="100%">
	<thead>
    <tr>
    <th>S. No.</th>
        <th>Receipt No.</th>
        <th>Card No.</th>
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
		 foreach($ftchh_receipt_checkout as $data){ 
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
         <td><?php echo $data['receipt_checkout']['function_no']; ?></td>
        <td><?php echo $data['receipt_checkout']['guest_name']; ?></td>
        <td><?php echo $data['receipt_checkout']['master_roomno_id']; ?></td>
        <td><?php echo $data['receipt_checkout']['recpt_type']; ?></td>
         <td><?php echo @$data['receipt_checkout']['cash']; ?></td>
        <td><?php echo @$data['receipt_checkout']['cheque_amt']; ?>
        <td><?php echo @$data['receipt_checkout']['neft_amt']; ?>
       <td><?php echo @$data['receipt_checkout']['credit_card_amt']; ?></td>
        <td><?php echo $data['receipt_checkout']['billing_ins']; ?></td>
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

$(document).ready(function()
        {
			var myVar=setInterval(function(){myTimerr()},4000);
			function myTimerr() 
	   {
	   $("#success").hide();
	    } 
		
	});

function payble()
	{
		var id=$("select[name=bill_no_id]").val();
			//alert(id);
			$.ajax({
				url: "ajax_php_file?checkout_bill_set=1&q="+id,
				type: "POST",         
				success: function(data)
				{
					
					var da=data.split(",");
					//$("#master_roomno_id").val(data);
					$("#rg_id").val(da[0]);
					$("#g_id").val(da[1]);
					$("#t_id").val(da[2]);
					$("#paid_id").val(da[3]);
					$("#dueamount").val(da[4]);
					$("#master_roomno_id").val(da[5]);
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
	
	$(document).ready(function()
			{
				$('#bill_no_id').live('change',function(e)
				{
				$("#mmmide").val($('option:selected', this).attr("mmidee"));
				});
	});
</script>