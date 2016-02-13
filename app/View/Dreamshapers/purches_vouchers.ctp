<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs"></i>Purches Vouchers
		</div>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
			<table class="table table-bordered ">
			<thead>
				<tr>
					<th>Tranjection Date</th>
					<th>Particular</th>
					<th>Debit</th>
					<th>Credit</th>
					<th>Narration</th>
				</tr>
				</thead>
			<tbody>
			
			<?php foreach($Suppliers as $data){
				$ledger_id=$data["ledger"]["id"];
				$transaction_date=$data["ledger"]["transaction_date"];
				$narration=$data["ledger"]["narration"];
				$ledger_cr_dr_info=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_journal_info'), array('pass' => array($ledger_id))); 
				?>
				
				
				<?php $i=0;
				foreach($ledger_cr_dr_info as $data2){ $i++;
					$ledger_master_id=$data2["ledger_cr_dr"]["ledger_master_id"];
					$cr=$data2["ledger_cr_dr"]["cr"];
					$dr=$data2["ledger_cr_dr"]["dr"];
					$ledger_master_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_master_name'), array('pass' => array($ledger_master_id))); ?>
					<?php if($i==1) { ?>
					<tr>
						<td rowspan="2" valign="top" width="20%"><?php echo date("d-m-Y",strtotime($transaction_date)); ?></td>
					<?php } ?>
					<?php if($i==2) { ?>
					<tr>
					<?php } ?>
					<td><?php echo $ledger_master_name; ?></td>
					<td><?php echo $dr; ?></td>
					<td><?php echo $cr; ?></td>
					<?php if($i==2) { ?>
					</tr>
					<?php } ?>
					<?php if($i==1) { ?>
					<td rowspan="2" valign="top" width="40%" style="border: 1px solid rgb(221, 221, 221);"><?php echo $narration; ?></td>
					</tr>
					<?php } ?>
					
				<?php } ?> 
				 <?php } ?>
			
			</tbody>
			</table>
		</div>
	</div>
</div>