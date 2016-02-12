<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs"></i>Create Journal Voucher
		</div>
	</div>
	<div class="portlet-body">
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
			<tbody>
			<tr>
				<td>
					 <select class="form-control">
						<option>Select ledger account</option>
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
				<td>
					 <a href="#" class="btn btn-xs red">&nbsp;<i class="fa fa-minus-circle"></i>&nbsp; </a>
				</td>
			</tr>
			<tr>
				<td>
					 <select class="form-control">
						<option>Select ledger account</option>
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
				<td>
					 <a href="#" class="btn btn-xs red">&nbsp;<i class="fa fa-minus-circle"></i>&nbsp; </a>
				</td>
			</tr>
			</tbody>
			</table>
			<a href="#" class="btn btn-sm green"><i class="fa fa-plus"></i> Add row</a>
		</div>
	</div>
</div>