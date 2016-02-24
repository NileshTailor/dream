<div>
	<center>
		<h5><b>Ledger Report</b></h5>
	</center>
</div>
<table class="table  table-bordered " style="margin-top:1px" id="sample_1">
	<thead>
    <tr>
    	<th>Transaction Date</th>
        <th>category</th>
        <th>Name</th>
        <th>Credit</th>
		<th>Debit</th>
     </tr>
     </thead>
     <tbody>
			<?php
			
			    foreach($result_ledger as $data){
				// pr($result_ledger);
				$ledger_id=$data['ledger']['id'];
				$ledger_category_id=$data['ledger']['ledger_category_id'];
				$transaction_date=$data['ledger']['transaction_date'];
				$transaction_date=date("d-m-Y",strtotime($transaction_date));
				$result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), array($ledger_category_id));
				
				 $category_name=$result_ledger_category[0]['ledger_category']['name'];
				  $result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), array($ledger_category_id));
				 $result_ledger_cr_dr=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_cr_dr_id'), array($ledger_id));
				 $total_cat_cr=0;  $total_cat_dr=0;
				   //pr($result_ledger_cr_dr);
				   //exit;
						    foreach($result_ledger_cr_dr as $data){
							$ledger_master_id=$data['ledger_cr_dr']['ledger_master_id'];
							$cr=$data['ledger_cr_dr']['cr'];
							$dr=$data['ledger_cr_dr']['dr'];
							if(!empty($cr)){
							$result_ledger_master_id=$this->
							requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_master_id'), array($ledger_master_id));
							$ledger_master_name=$result_ledger_master_id[0]['ledger_master']['name'];
							}
			?>
			<tr>
			<td><?php echo $transaction_date; $transaction_date=''; ?></td>
			<td><?php echo $category_name; $category_name=''; ?></td>
			<td><?php echo $ledger_master_name; $ledger_master_name=''; ?></td>
			<td><?php echo $cr; $total_cat_cr+=$cr; ?></td>
			<td><?php echo $dr; $total_cat_dr+=$dr; ?></td>
			</tr>
			<?php } ?>
			<tr>
			<td colspan="3" align="right"><span> <b></b></span></td>
			<td colspan=""><b><?php echo $total_cat_cr; ?></b> </td>
			<td colspan=""><b><?php echo $total_cat_dr; ?></b></td>
			</tr>

			<?php }?>
     </tbody>
         </table>