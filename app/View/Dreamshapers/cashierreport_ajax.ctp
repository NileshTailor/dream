
<br/>
<!--------------------------->
<table class="table  table-bordered " style="margin-top:1px" id="sample_1">
	<thead>
    <tr style="background-color:#CFC">
        <th><p align="center">Report From <?php echo date('d-m-y', strtotime($from));?> <b>To</b> <?php echo date('d-m-y', strtotime($to));?></p></th>
     </th>
     </tr>
     </thead>
     <tbody>
   
    
    
	 <?php
			    foreach($fetch_ledger_category as $data1){
				// pr($result_ledger);
				$ledger_m_id=$data1['ledger_master']['id'];
				?>
                
            <?php }?>
			<?php
			 $total_cat_cr=0;$total_cat_cr1=0;$total_cat_cr2=0;
			 
				$id125=35;
				$id126=36;
				$id127=37;
				$id128=38;
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
				$result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), 
				array($ledger_category_id));
				 $category_name=$result_ledger_category[0]['ledger_category']['name'];
				  $result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), 
				  array($ledger_category_id));
				 $result_ledger_cr_dr=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_cr_dr_id121'), 
				 array($id125,$id126,$id127,$id128));
							
							foreach($result_ledger_cr_dr as $data){
							$ledger_master_id=$data['ledger_cr_dr']['ledger_master_id'];
							$cr=$data['ledger_cr_dr']['cr'];
							$dr=$data['ledger_cr_dr']['dr'];
							$result_ledger_master_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_master_id'), 
							array($ledger_master_id));
							$ledger_master_name=$result_ledger_master_id[0]['ledger_master']['name'];
							?>
			<tr>
            <td><?php echo $dr; $total_cat_cr1+=$dr; ?></td>
			</tr>
			<?php 
			} ?>
			<?php 
			}?>
       
       
       
         </tbody>
         </table>