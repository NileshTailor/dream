
<br/>
<!--------------------------->
<table class="table  table-bordered " style="margin-top:1px" id="sample_1">
	<thead>
    <tr style="background-color:#CFC">
        <th colspan="8"><p align="center"><B>Cashier Report</B> From <?php echo date('d-m-y', strtotime($from));?> <b>To</b> <?php echo date('d-m-y', strtotime($to));?></p></th>
     </th>
     </tr>
     
     <tr>
     <th>Date</th>
     <th>Invoice ID</th>
     <th>Name</th>
     <th>Receipt Type</th>
     <th>Receipt Mode</th>
     <th>Bank Name</th>
     <th>Narration</th>
     <th>Amount</th>
     </tr>
     
     </thead>
     <tbody>
   
    
    
	 <?php
			    foreach($fetch_ledger_category as $data1){
				// pr($result_ledger);
				$ledger_m_id=$data1['ledger_master']['id'];
				?>
                
            <?php }?>
            <tr style="background-color:#FFF"><td colspan="8"><p><div><b>Cash or Credit Card Amount</b></div></p></td></tr>
			<?php
			 $total_cat_cr=0;$total_cat_cr1=0;
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
				 array($ledger_id));
							
							foreach($result_ledger_cr_dr as $data){
							$ledger_master_id=$data['ledger_cr_dr']['ledger_master_id'];
							$cr=$data['ledger_cr_dr']['cr'];
							$dr=$data['ledger_cr_dr']['dr'];
							$result_ledger_master_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_master_id'), 
							array($ledger_master_id));
							$ledger_master_name=$result_ledger_master_id[0]['ledger_master']['name'];
							?>
                            
                            
                            
                             <?php 
    if($receipt_mode=='Cash' || $receipt_mode=='Credit Card')
         {?>
                            
                            <?php if($ledger_master_id==35 || $ledger_master_id==36 || $ledger_master_id==37 || $ledger_master_id==38) {?> 
			<tr>
            <td><?php echo $transaction_date; ?></td>
            <td><b><?php echo $invoice_id; ?></td>
			<td><?php echo $ledger_master_name; ?></td>
            <td><?php echo $receipt_type; ?></td>
            <td><?php echo $receipt_mode; ?></td>
            <td><?php echo $bank_name; ?></td>
             <td><?php echo $narration; ?></td>
            <td><?php echo $dr; $total_cat_cr1+=$dr; ?></td>
			</tr>
            <?php }else{ ?>
            
            <?php echo $kk='';?>
            
            <?php }?>
            <?php }?>
			<?php 
			} ?>
			<?php 
			}?>
             <tr><th colspan="7">&nbsp;</th>
            <th><?php echo $total_cat_cr1;?></th>
            </tr>
            
            <tr style="background-color:#FFF"><td colspan="8"><p><div><b>NEFT or Cheque Amount</b></div></p></td></tr>
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
				$result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), 
				array($ledger_category_id));
				 $category_name=$result_ledger_category[0]['ledger_category']['name'];
				  $result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), 
				  array($ledger_category_id));
				 $result_ledger_cr_dr=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_cr_dr_id121'), 
				 array($ledger_id));
							
							foreach($result_ledger_cr_dr as $data){
							$ledger_master_id=$data['ledger_cr_dr']['ledger_master_id'];
							$cr=$data['ledger_cr_dr']['cr'];
							$dr=$data['ledger_cr_dr']['dr'];
							$result_ledger_master_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_master_id'), 
							array($ledger_master_id));
							$ledger_master_name=$result_ledger_master_id[0]['ledger_master']['name'];
							?>
                            
                            
                            
                             <?php 
    if($receipt_mode=='Bank' || $receipt_mode=='NEFT' || $receipt_mode=='Cheque')
         {?>
                            
                            <?php if($ledger_master_id==35 || $ledger_master_id==36 || $ledger_master_id==37 || $ledger_master_id==38) {?> 
			<tr>
            <td><?php echo $transaction_date; ?></td>
            <td><b><?php echo $invoice_id; ?></td>
			<td><?php echo $ledger_master_name; ?></td>
            <td><?php echo $receipt_type; ?></td>
            <td><?php echo $receipt_mode; ?></td>
            <td><?php echo $bank_name; ?></td>
             <td><?php echo $narration; ?></td>
            <td><?php echo $dr; $total_cat_cr+=$dr; ?></td>
			</tr>
            <?php }else{ ?>
            
            <?php echo $kk='';?>
            
            <?php }?>
            <?php }?>
			<?php 
			} ?>
			<?php 
			}?>
             <tr><th colspan="7">&nbsp;</th>
            <th><?php echo $total_cat_cr;?></th>
            </tr>
         
            
            
         </tbody>
         </table>