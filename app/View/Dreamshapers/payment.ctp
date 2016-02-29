<?php
if(empty($active))
{ 
	$active="";
}
?>
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button"class="toast-close-button">×</button><div class="toast-title">Payment</div><div class="toast-message"> </div></div></div>


<div id="message"></div>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add</a>
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
                    <form method="post" name="add">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:100% !important;" border="0">
                        <tr>
                           <td><div class="form-group"><label>Category</label></div></td>
                            <td><div class="form-group">
                                <select class="form-control input-medium" name="ledger_category_id" required>
                                    <option value="">-- Select Category --</option>
                                    <?php
                                    foreach($fetch_ledger_category as $data)
                                    {
                                        ?>
                                        <option value="<?php echo $data['ledger_category']['id'];?>"><?php echo $data['ledger_category']['name'];?></option>
                                        <?php
                                    }
                                    ?>
                            </select></div>
                            </td>
                            <td><div class="form-group"><label>Name</label></div></td>
                            <td><div class="form-group"><select class="form-control input-medium" name="user_id" id="user_id" required>
                                    <option value=""></option>
                                </select>
                                </div>
                            </td>
                           <td>Invoice Reference</td>
                            <td>
                            <div class="form-group"><input type="text" class="form-control input-medium" placeholder="Invoice Reference" name="invoice_id[]" ></div>
                            </td>
                        </tr>
                    	
                          
                        <tr>
                         <td><label>Amount</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Amount" name="amount" required></div></td>
                       
                        <td><label>TDS</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium tds_discount" placeholder="TDS" name="tds"></div></td>
                       <td><label>Gross Amount</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Gross Amount" name="gross_amount" readonly="readonly" required></div></td>
                        
                       
                        </tr>
                        <tr>
                         <td><label>Transaction Date</label></td>
                        <td><div class="form-group"><input type="text" class="form-control  input-medium date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" value="<?php echo date("d-m-Y"); ?>" name="transaction_date"></div></td>
                        <td><label>Receipt Mode</label></td><td><div class="form-group">
										
                                <div class="radio-list">
                                    <label class="radio-inline" style="padding-left:0px !important;"><input name="receipt_mode"  value="Cash" type="radio" checked="checked"> Cash </label>
                                    <label class="radio-inline" style="padding-left:0px !important;"><input name="receipt_mode" class="cheque" value="Cheque" type="radio"> Cheque </label>
                                    <label class="radio-inline" style="padding-left:0px !important;"><input name="receipt_mode" class="credit_card" value="Credit Card" type="radio"> Credit Card </label>
                                    <label class="radio-inline" style="padding-left:0px !important;"><input name="receipt_mode" class="neft" value="NEFT" type="radio"> NEFT </label>
                                </div>
                            </div>
                        	</td>                    
                        <td><label>Narration</label></td>
                        <td colspan="3"><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Narrations" name="narration"></div></td>
                        
                        </tr>
                        <tr id="cheque" class="receipt_mode" style="display:none;">
                        <td><label>Cheque No.</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Cheque No." name="cheque_no"></div></td>
                        <td><label>Bank Name</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Bank Name" name="bank_name"></div></td>
                        <td><label>Cheque Date</label></td>
                        <td><div class="form-group"><input type="text" class="form-control  input-medium date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="cheque_date"></div></td>
                        </tr>
                        <tr id="credit_card" class="receipt_mode" style="display:none;">
                        <td><label>Credit Card Name</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Credit Card Name" name="credit_card_name"></div></td>
                        <td><label>Credit Card No.</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Credit Card No." name="credit_card_no"></div></td>
                        </tr>
                        <tr id="neft" class="receipt_mode" style="display:none;">
                        <td><label>NEFT No.</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="NEFT No." name="neft_no"></div></td>
                        </tr>
                        <tr>
                        <td colspan="6"><center><button name="add_payment"  type="submit" class="btn green"><i class="fa fa-plus"></i> Submit</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                     
			</div> 
    	</div>
    </div>
</div>

<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function()
{
	var myVar=setInterval(function(){myTimerr()},4000);
	function myTimerr() 
	{
		$("#success").hide();
	}
	
	$('select[name=ledger_category_id]').die().live('change',function(){
		var ledger_category_id=$(this).val();
		$.ajax({ 
			url: "ajax_php_file?receipt_payment_mode_fetch=1&q="+ledger_category_id,
			success: function(data)
			{ 
				$("#user_id").html(data);
			}
			});
	});
	$('form[name=add]').submit(function(e){
		var data=$('input[name="invoice_id[]"]').val();
		var count=data.split(',').length;
		if(count==0)
		{
			 e.preventDefault();
		}
	});	
	
	$('input[name=receipt_mode]').live('change',function(){
		
		var cls=$(this).attr('class');
		$(this).closest('form').find('.receipt_mode').css('display','none');
		$(this).closest('form').find('#'+cls).removeAttr('style');
		
	});
	$('input[name=amount]').live('keypress',function(){
		
		var amount=$(this).val();
		var tds=eval($('input[name=tds]').val());
		if(tds==undefined)
		{
			tds=0;
		}
		$('input[name=gross_amount]').val(amount-tds);
		
	});
	
	
	
	$('.tds_discount').live('keyup',function(){
		
		
		var amount=eval($(this).closest('form').find('input[name="amount"]').val());
		var tds=eval($('input[name=tds]').val());
		if(tds==undefined)
		{
			tds=0;
		}
		$('input[name=gross_amount]').val(amount-tds);
		
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