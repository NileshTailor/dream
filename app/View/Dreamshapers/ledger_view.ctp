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
			?>
			<tr>
			<td>1</td>
			<td>754</td>
			<td>01-02-2016</td>
			<td>PHP Poets</td>
			<td>Nilesh Tailor</td>


			</tr>
			<?php } ?>
     </tbody>
         </table>