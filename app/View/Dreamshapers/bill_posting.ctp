
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button"class="toast-close-button">×</button><div class="toast-title">Payment</div><div class="toast-message"> </div></div></div>


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
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Bill Posting

                    </a>
                </li>
             
            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                
                    
                    <table class="table self-table" style=" width:100% !important;" border="0">
                     <thead>
                     <tr>
                     <th style="text-align:center"><div class="form-group">
										
                                <div class="radio-list">
                                    <label class="radio-inline" style="padding-left:0px !important;"><input name="receipt_type"  value="Room" type="radio"> Room </label>
                                    <label class="radio-inline" style="padding-left:0px !important;"><input name="receipt_type"  value="POS" type="radio"> POS </label>
                                    <label class="radio-inline" style="padding-left:0px !important;"><input name="receipt_type"  value="House Keeping" type="radio"> House Keeping</label>
                                    <label class="radio-inline" style="padding-left:0px !important;"><input name="receipt_type" value="Other Service" type="radio"> Other Service </label>
                                </div>
                            </div>
                            </th>
                     </tr>
                     </thead>
                     </table>
                   	 <div class="table-responsive">
                    
                    	
                     </div>
                    
                </div>
                     
			</div> 
    	</div>
    </div>
</div>

<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function()
{
	$('button[name=submit]').live('click',function(e){
		 e.preventDefault();
		 
		 var ledger_id=$(this).closest('td').find('input[name=ledger_id]').val();
		 var receipt_mode=$(this).closest('td').find('input[name=receipt_mode]:checked').val();
		 var cheque_no=$(this).closest('td').find('input[name=cheque_no]').val();
		 var bank_name=$(this).closest('td').find('input[name=bank_name]').val();
		 var cheque_date=$(this).closest('td').find('input[name=cheque_date]').val();
		 var credit_card_name=$(this).closest('td').find('input[name=credit_card_name]').val();
		 var credit_card_no=$(this).closest('td').find('input[name=credit_card_no]').val();
		 var neft_no=$(this).closest('td').find('input[name=neft_no]').val();
			$.ajax({ 
			url: "ajax_php_file?bill_posting_ac=1&ledger_id="+ledger_id+"&receipt_mode="+receipt_mode+"&cheque_no="+cheque_no+"&bank_name="+bank_name+"&cheque_date="+cheque_date+"&credit_card_name="+credit_card_name+"&credit_card_no="+credit_card_no+"&neft_no="+neft_no,
			success: function(response)
			{ 
			
			}
			});
	});	
	$('input[name=receipt_mode]').live('change',function(){
		var cls=$(this).attr('class');
		$(this).closest('td').find('.receipt_mode').css('display','none');
		$(this).closest('td').find('#'+cls).removeAttr('style');
		
	});
	$('input[name=receipt_type]').live('change',function(){
		var receipt_type=$(this).val();
		//.closest('span').attr('class','checked');
		$.ajax({ 
			url: "ajax_php_file?bill_posting=1&receipt_type="+receipt_type,
			success: function(response)
			{ 
				$('.table-responsive').html(response);
				$('.popovers').popover();
				$('.date-picker').datepicker();
				
			}
			});
	});
	$('button[name=approved]').live('click',function(){
		var ledger_id=$(this).attr('ledger_id');
		$(this).closest('tr').remove();
		var sr=0;
		$('#bill_post').find('tbody tr').each(function(){
			sr++;
			$(this).find("td:first").html(sr);
		})
		
		$.ajax({ 
			url: "ajax_php_file?bill_posting_approved=1&ledger_id="+ledger_id,
			success: function(response)
			{ 
				
			}
			});
	});

});


</script>