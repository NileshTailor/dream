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
					 Debit
				</th>
				<th>
					 Credit
				</th>
				<th>
					 Action
				</th>
			</tr>
			</thead>
			<tbody id="journal_rows">
			<tr>
				<td>
					 <select class="form-control">
						<option value="">Select ledger account</option>
						<?php foreach($ledger_accounts as $data){
							$id=$data["ledger_master"]["id"];
							$name=$data["ledger_master"]["name"]; ?>
							<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
						<?php } ?>
					</select>
				</td>
				<td>
					 <input class="form-control" placeholder="Debit" type="text">
				</td>
				<td>
					 <input class="form-control" placeholder="Credit" type="text">
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					 <select class="form-control">
						<option value="">Select ledger account</option>
						<?php foreach($ledger_accounts as $data){
							$id=$data["ledger_master"]["id"];
							$name=$data["ledger_master"]["name"]; ?>
							<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
						<?php } ?>
					</select>
				</td>
				<td>
					 <input class="form-control" placeholder="Debit" type="text">
				</td>
				<td>
					 <input class="form-control" placeholder="Credit" type="text">
				</td>
				<td></td>
			</tr>
			</tbody>
			<tfoot>
			<tr>
				<td align="right"><b>Total</b></td>
				<td>
					 <input class="form-control" placeholder="Debit" type="text">
				</td>
				<td>
					 <input class="form-control" placeholder="Credit" type="text">
				</td>
				<td></td>
			</tr>
			</tfoot>
			</table>
		</div>
		<button type="button" class="btn btn-sm green" id="add_row"><i class="fa fa-plus"></i> Add row</button>
		<button type="submit" class="btn btn-sm blue pull-right"><i class="fa fa-thumbs-up"></i> SUBMIT & CREATE VOUCHER</button>
		</form>
	</div>
	
</div>
<script>
$(document).ready(function () {
	$("#add_row").on("click",function(){
		var sel=$('#journal_rows tr:first td:first').html();
		$('#journal_rows').append('<tr><td>'+sel+'</td><td><input class="form-control" placeholder="Debit" type="text"></td><td> <input class="form-control" placeholder="Credit" type="text"></td><td><a href="#" class="btn btn-xs red">&nbsp;<i class="fa fa-minus-circle"></i>&nbsp; </a></td></tr>');
	})
	
	function check_validation(){
		$('#journal_rows tr').each(function( index ) {
			var ledger_account_id=$(this).find('td:nth-child(1) option:selected').val();
			if(ledger_account_id==""){
				$(this).find('td:nth-child(1) select').css('border','solid 1px red');
			}else{
				$(this).find('td:nth-child(1) select').css('border','');
			}
			
			var debit=parseInt($(this).find('td:nth-child(2) input').val());
			if(isNaN(debit)){debit=0;}
			if(debit==0){
				$(this).find('td:nth-child(2) input').css('border','solid 1px red');
			}else{
				$(this).find('td:nth-child(2) input').css('border','');
			}
			
			var credit=parseInt($(this).find('td:nth-child(3) input').val());
			if(isNaN(credit)){credit=0;}
			if(credit==0){
				$(this).find('td:nth-child(3) input').css('border','solid 1px red');
			}else{
				$(this).find('td:nth-child(3) input').css('border','');
			}
		});
	}
	
	$('form').submit( function(e){
		e.preventDefault();
		check_validation();
	});
	
});
</script>