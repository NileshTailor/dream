<style media="print">
.print-hide
{
	display:none;
}
</style>
		
<!-------------------------------Start Ledger Form ------------------------------------------------->
<?php  
$default_date_from = date('1-m-Y'); 
$default_date_to = date('d-m-Y')
?> 
<center>
<form method="post" onSubmit="return valid()">
<div class="print-hide">
        <table style="width:60%;">
        
        <tr><td colspan="4"><p align="center" style="background-color:#C33; color:#FFF"><strong>POS Ledger</strong></p></td></tr>
				<tr><td>
						<select class="form-control input-medium" name="ledger_category_id" required id="ledger_account">
                                    <option value="">-- Select Category --</option>
                                    <?php
                                    foreach($fetch_ledger_category as $data)
                                    {
                                        ?>
                                        <option value="<?php echo $data['ledger_category']['id'];?>"><?php echo $data['ledger_category']['name'];?></option>
                                        <?php
                                    }
                                    ?>
                            </select>
				</td>
				<td>
					
					<input type="text" class="form-control  input-medium date-picker" data-date-format="dd-mm-yyyy" placeholder="From" value="" name="from" id="date1">
										
				</td>

				<td>
							
				<input type="text" class="form-control  input-medium date-picker" data-date-format="dd-mm-yyyy" placeholder="To" value="" name="to" id="date2">
				
				</td>
		
				<td valign="top">
				<button type="button" id="go" name="sub" class="btn blue" style="">Go</button>
				</td>
		</tr>
</table>
</div>
</form>
</center>
		123
<div id="ledger_view" style="width:100%;">
</div>
<!-----------------------------------End Ledger Form ------------------------------------------>
 		
<!------------------------------------ Start Java Script --------------------------------->
<script>
$(document).ready(function(){
	
	   $('select[name=ledger_category_id]').live('change',function(){
		var ledger_category_id=$(this).val();
		$('select[name="invoice_id[]"]').empty();
		$.ajax({ 
			url: "ajax_php_file?receipt_payment_mode_fetch=1&q="+ledger_category_id,
			success: function(data)
			{ 
				$("#user_id").html(data);
			}
			});
	});
	
});
</script>			
		
<script>
$(document).ready(function() {
	
	    $("#go").live('click',function(){
				var ledger_account_id = $('#ledger_account').val();
				var from=$('#date1').val();
				var to=$('#date2').val();
				$("#ledger_view").html('loading.....').load("pos_report_ajax?ledger_master_id="+ledger_account_id+"&from="+from+"&to="+to);

	});
});
</script>			

<!------------------------------------End Java Script Code------------------------------------->