<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs"></i>Journal Vouchers
		</div>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
			<table class="table table-hover">
			<tbody>
			<?php foreach($Journals as $data){
				$ledger_id=$data["ledger"]["id"];
				$transaction_date=$data["ledger"]["transaction_date"]; ?>
				<tr>
					<td><?php echo $transaction_date; ?></td>
				</tr>
			<?php } ?>
			</tbody>
			</table>
		</div>
	</div>
</div>