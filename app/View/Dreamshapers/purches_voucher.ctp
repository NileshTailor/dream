<div class="portlet box purple">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-shopping-cart"></i> Create Purches Voucher
		</div>
	</div>
	<div class="portlet-body">
	<form  method="post" role="form">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">Party</label>
					<select class="form-control" name="amount_type[]">
						<option value="">Select</option>
						<?php foreach($Suppliers as $data){
							$ledger_master_id=$data["ledger_master"]["id"];
							$name=$data["ledger_master"]["name"]; ?>
						<option value="<?php echo $ledger_master_id; ?>"><?php echo $name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">Amount</label>
					<input class="form-control" placeholder="Amount" type="text">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">Bill No.</label>
					<input  class="form-control" placeholder="Party" type="text">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Narration</label>
					<input id="firstName" class="form-control" placeholder="Narration" type="text">
				</div>
			</div>
		</div>
		
		<div class="form-actions">
									<button type="submit" class="btn blue">Submit</button>
									<button type="button" class="btn default">Cancel</button>
								</div>
		</form>
		
	</div>
</div>