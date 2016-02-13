<table class="table table-striped table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr>
    	<th>Transaction Date</th>
        <th>ledger category</th>
        <th>Name</th>
        <th>Debit</th>
        <th>Credit</th>
             
     </tr>
     </thead>
     <tbody>
			<?php 
			
			foreach($result_ledger as $data){
				$ledger_id=$data['ledger']['id'];
				$ledger_category_id=$data['ledger']['ledger_category_id'];
				$transaction_date=$data['ledger']['transaction_date'];
				 $result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), array($ledger_category_id));
				
				 $category_name=$result_ledger_category[0]['ledger_category']['name'];
				  $result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), array($ledger_category_id));
				  
				   $result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), array($ledger_id));
				 
			?>
			<tr>
			<td><?php echo $transaction_date; ?></td>
			<td><?php echo $category_name; ?></td>
			<td><?php echo $category_name; ?></td>
			<td><?php echo $category_name; ?></td>
			<td><?php echo $category_name; ?></td>


			</tr>
			<?php } ?>
     </tbody>
         </table>