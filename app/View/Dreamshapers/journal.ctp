<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs"></i>Create Journal Voucher
		</div>
	</div>
	
	<div class="portlet-body">
	<form method="post">
		<div class="table-scrollable">
			<table class="table table-hover">
			<thead>
			<tr>
				<th width="40%">
					 Legder Account
				</th>
				<th>
					 Amount
				</th>
				<th>
					 Debit/Credit
				</th>
				<th>
					 Action
				</th>
			</tr>
			</thead>
			<tbody id="journal_rows">
			<tr>
				<td>
					 <select class="form-control" name="ledger_account[]">
						<option value="">Select ledger account</option>
						<?php foreach($ledger_accounts as $data){
							$id=$data["ledger_master"]["id"];
							$name=$data["ledger_master"]["name"]; ?>
							<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
						<?php } ?>
					</select>
				</td>
				<td>
					 <input class="form-control" placeholder="Amount" type="text" name="amount[]">
				</td>
				<td>
					 <select class="form-control" name="amount_type[]">
						<option value="">Select</option>
						<option value="debit">Debit</option>
						<option value="credit">Credit</option>
					</select>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					 <select class="form-control" name="ledger_account[]">
						<option value="">Select ledger account</option>
						<?php foreach($ledger_accounts as $data){
							$id=$data["ledger_master"]["id"];
							$name=$data["ledger_master"]["name"]; ?>
							<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
						<?php } ?>
					</select>
				</td>
				<td>
					 <input class="form-control" placeholder="Amount" type="text" name="amount[]">
				</td>
				<td>
					 <select class="form-control" name="amount_type[]">
						<option value="">Select</option>
						<option value="debit">Debit</option>
						<option value="credit">Credit</option>
					</select>
				</td>
				<td></td>
			</tr>
			</tbody>
			<tfoot style="border-top: 2px solid #CCC;">
			<tr>
				<td align="right"><span id="error_net_bal" class="pull-right" style="color:red;"></span></td>
				<td>
					 <b>Total Dr :</b><input class="form-control" placeholder="Debit" type="text" id="total_debit" />
				</td>
				<td>
					 <b>Total Cr :</b><input class="form-control" placeholder="Credit" type="text" id="total_credit" />
				</td>
				<td></td>
			</tr>
			</tfoot>
			</table>
		</div>
		<button type="button" class="btn btn-sm green" id="add_row"><i class="fa fa-plus"></i> Add row</button>
		<button type="submit" name="submit" class="btn btn-sm blue pull-right"><i class="fa fa-thumbs-up"></i> SUBMIT & CREATE VOUCHER</button>
		
		</form>
	</div>
	
</div>
<script>
$(document).ready(function () {
	$("#add_row").on("click",function(){
		var sel=$('#journal_rows tr:first td:first').html();
		$('#journal_rows').append('<tr><td>'+sel+'</td><td><input class="form-control" placeholder="Amount" type="text" name="amount[]" /></td><td><select class="form-control" name="amount_type[]"><option value="">Select</option><option value="debit">Debit</option><option value="credit">Credit</option></select></td><td><a href="#" class="btn btn-xs red">&nbsp;<i class="fa fa-minus-circle"></i>&nbsp; </a></td></tr>');
	})
	
	function check_validation(){
		var returnValue=true;
		$('#journal_rows tr').each(function( index ) {
			var ledger_account_id=$(this).find('td:nth-child(1) option:selected').val();
			if(ledger_account_id==""){
				$(this).find('td:nth-child(1) select').css('border','solid 1px red');
				returnValue=false;
			}else{
				$(this).find('td:nth-child(1) select').css('border','');
			}
			
			var amount=parseInt($(this).find('td:nth-child(2) input').val());
			if(isNaN(amount)){amount=0;}
			if(amount==0){
				$(this).find('td:nth-child(2) input').css('border','solid 1px red');
				returnValue=false;
			}else{
				$(this).find('td:nth-child(2) input').css('border','');
			}
			
			var amount_type=$(this).find('td:nth-child(3) option:selected').val();
			if(amount_type==""){
				$(this).find('td:nth-child(3) select').css('border','solid 1px red');
				returnValue=false;
			}else{
				$(this).find('td:nth-child(3) select').css('border','');
			}
			
		});
		return returnValue;
	}
	
	function check_debit_credit(){
		var toatl_dr=0; var toatl_cr=0; var returnSubmit=true;
		$('#journal_rows tr').each(function( index ) {
			var amount=parseInt($(this).find('td:nth-child(2) input').val());
			var amount_type=$(this).find('td:nth-child(3) select').val();
			if(amount_type=="debit"){toatl_dr=toatl_dr+amount;}
			if(amount_type=="credit"){toatl_cr=toatl_cr+amount;}
		});
		$("#total_debit").val(toatl_dr);
		$("#total_credit").val(toatl_cr);
		var net_bal=toatl_dr-toatl_cr;
		if(net_bal!=0){ returnSubmit=false; $("#error_net_bal").html("Total Debit is not equal to Credit.");}
		else{$("#error_net_bal").html("");}
		return returnSubmit;
	}
	
	$('form').submit( function(e){
		
		$("button[name=submit]").addClass("disabled");
		var returnValue=check_validation();
		if(returnValue===true){
			var checkNetBal=check_debit_credit();
			if(checkNetBal===true){
				$("form").submit();
			}else{
				e.preventDefault();
			}
		}
		else{
			e.preventDefault();
		}
	});
	
});
</script>