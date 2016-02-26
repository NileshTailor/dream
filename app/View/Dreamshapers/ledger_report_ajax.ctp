
<br/>
<!--------------------------->




<table class="table  table-bordered " style="margin-top:1px" id="sample_1">
	<thead>
    <tr style="background-color:#CFC">
    	<th><p align="center">Ledger Reports</p></th>
        <th colspan="3"><p align="center">Report From <?php echo date('d-m-y', strtotime($from));?> <b>To</b> <?php echo date('d-m-y', strtotime($to));?></p></th>
       <?php
			    foreach($fetch_ledger_category as $data1){
				// pr($result_ledger);
				$ledger_m_id=$data1['ledger_master']['id'];
				$name=$data1['ledger_master']['name'];
				?>
                <th colspan="3"><p align="center">Name:&nbsp;<?php echo $name;?></p></th>
                <?php }?>
     </th>
     </tr>
     </thead>
     <tbody>
   
    
    <tr>
    	<th rowspan="2">Transaction Date</th>
        <th rowspan="2">Invoice ID/Trans. ID</th>
        <th rowspan="2">Name</th>
        <th rowspan="2">Narration</th>
         <th rowspan="2">Paid To</th>
        <th colspan="2"><p align="center"><?php echo $name;?></p></th>
     </tr>
      <tr>
    	<th width="8%">Debit</th>
        <th width="8%">Credit</th>
     </tr>
	 <?php
			    foreach($fetch_ledger_category as $data1){
				// pr($result_ledger);
				$ledger_m_id=$data1['ledger_master']['id'];
				?>
                
                <?php }?>
     
     
     
			<?php
			 $total_cat_cr=0;$total_cat_cr1=0;$total_cat_cr2=0;
			    foreach($result_ledger as $data){
				// pr($result_ledger);
				$ledger_id=$data['ledger']['id'];
				$ledger_category_id=$data['ledger']['ledger_category_id'];
				$transaction_date=$data['ledger']['transaction_date'];
				$transaction_id=$data['ledger']['transaction_id'];
				$transaction_type=$data['ledger']['transaction_type'];
				$invoice_id=$data['ledger']['invoice_id'];
				$receipt_mode=$data['ledger']['receipt_mode'];
				$receipt_type=$data['ledger']['receipt_type'];
				$narration=$data['ledger']['narration'];
				$bank_name=$data['ledger']['bank_name'];
				
				
				
				$transaction_date=date("d-m-Y",strtotime($transaction_date));
				$result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), array($ledger_category_id));
				 $category_name=$result_ledger_category[0]['ledger_category']['name'];
				  
				  $result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), array($ledger_category_id));
				  
				 $result_ledger_cr_dr=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_cr_dr_id'), array($ledger_id, $ledger_m_id));
				 // pr($result_ledger_cr_dr);
                            foreach($result_ledger_cr_dr as $data){
							$ledger_master_id=$data['ledger_cr_dr']['ledger_master_id'];
							$cr=$data['ledger_cr_dr']['cr'];
							$dr=$data['ledger_cr_dr']['dr'];
							$result_ledger_master_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_master_id'), array($ledger_master_id));
							//pr($result_ledger_master_id);
							$ledger_master_name=$result_ledger_master_id[0]['ledger_master']['name'];
							?>
			<tr>
			<td><?php echo $transaction_date; $transaction_date=''; ?></td>
            <td><b><?php echo $invoice_id; $invoice_id=''; ?></b>&nbsp;/&nbsp;<b><?php echo $transaction_id; $transaction_id=''; ?></b>&nbsp;(<?php echo $transaction_type; $transaction_type=''; ?>)</td>
			<td><?php echo $ledger_master_name; $ledger_master_name=''; ?></td>
            <td><?php echo $narration; $narration=''; ?></td>
            <td><?php echo $bank_name; $bank_name=''; ?></td>
            <td><?php echo $dr; $total_cat_cr1+=$dr; ?></td>
			<td><?php echo $cr; $total_cat_cr+=$cr; ?></td>
			</tr>
			<?php 
			} ?>
			<?php 
			}?>
            <tr>
			<td colspan="5" align="right"><span> <b></b></span></td>
            <td colspan=""><b><?php echo  $total_cat_cr1; ?></b> </td>
			<td colspan=""><b><?php echo  $total_cat_cr; ?></b> </td>
			
            </tr>
     </tbody>
         </table>