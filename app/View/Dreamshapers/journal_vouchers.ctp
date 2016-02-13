<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs"></i>Journal Vouchers
		</div>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
			<table class="table">
			<tbody>
			<?php foreach($Journals as $data){
				$ledger_id=$data["ledger"]["id"];
				$transaction_date=$data["ledger"]["transaction_date"];
				$ledger_cr_dr_info=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_journal_info'), array('pass' => array($ledger_id))); ?>
				<tr>
					<td style="border-bottom:solid 2px #CCC;">
					<div>
					 <b>Transaction date:</b> <?php echo date("d-m-Y",strtotime($transaction_date)); ?>
					</div>
						<table class="table table-bordered table-hover table-condensed">
							<tr>
								<th width="50%">Particulars</th>
								<th>Debit</th>
								<th>Credit</th>
							</tr>
							<?php foreach($ledger_cr_dr_info as $data2){
								$ledger_master_id=$data2["ledger_cr_dr"]["ledger_master_id"];
								$cr=$data2["ledger_cr_dr"]["cr"];
								$dr=$data2["ledger_cr_dr"]["dr"];
								$ledger_master_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_master_name'), array('pass' => array($ledger_master_id)));
								?>
								<tr>
									<td><?php echo $ledger_master_name; ?></td>
									<td><?php echo $cr; ?></td>
									<td><?php echo $dr; ?></td>
								</tr>
							<?php } ?>
						</table>
					</td>
				</tr>
			<?php } ?>
			</tbody>
			</table>
		</div>
	</div>
</div>