<table class="table table-striped table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr style="background-color:#FFF"><td colspan="8" align="center"><p><div><b><font size="+3">Ledger Account</font></b></div></p></td></tr>
   
    <tr>
    	<th>S.NO.</th>
        <th>Bill No.</th>
        <th>Company</th>
        <th>Guest Name</th>
        <th>Type</th>
        <th>Paid</th>
        <th>Due</th>
        <th>Balance</th>
     </tr>
     </thead>
     <tbody>
     <?php  
     $amt_tot=0;
     $due_tot=0;
	 $tot=0;
	 $amt=0;
	 $x=0;
     $i=0;
		 foreach($fetch_receipt_checkout as $data){ 
		 $i++;
		 $id_fetch_receipt_checkout=$data['receipt_checkout']['id'];
         $recpt_type=$data['receipt_checkout']['recpt_type'];
         $date_to=$data['receipt_checkout']['date_to'];
         $guest_name=$data['receipt_checkout']['guest_name'];
         $billing_ins=$data['receipt_checkout']['billing_ins'];
         $cash=$data['receipt_checkout']['cash'];
         $cheque_amt=$data['receipt_checkout']['cheque_amt'];
         $cheque_no=$data['receipt_checkout']['cheque_no'];
         $neft_amt=$data['receipt_checkout']['neft_amt'];
         $neft_no=$data['receipt_checkout']['neft_no'];
         $credit_card_amt=$data['receipt_checkout']['credit_card_amt'];
         $credit_card_no=$data['receipt_checkout']['credit_card_no'];
         $credit_card_name=$data['receipt_checkout']['credit_card_name'];
		 $bill_no_id=$data['receipt_checkout']['bill_no_id'];
		  $due_amount=$data['receipt_checkout']['due_amount'];
		  $company_id=$data['receipt_checkout']['company_id']; 

		 if($cash>0 || $credit_card_amt>0 || $neft_amt>0 || $cheque_amt>0)
		 {
			 $amt=$cash + $credit_card_amt + $neft_amt + $cheque_amt + $x;
		 }
         
         ?>
     <tr>
    
             <td><?php echo $i; ?></td>
             <td><?php echo $bill_no_id; ?></td>
           <td><?php echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch', $company_id), array()); ?></td>

             <td><?php echo $guest_name; ?></td>
             <td><?php echo $recpt_type; ?></td>
             <td><?php echo $amt; ?></td>
             <td><?php echo $due_amount; ?></td>
             <td></td>		
      </tr>


<?php
$amt_tot=$amt_tot+$amt;
$due_tot=$due_tot+$due_amount;
$tot=$amt_tot - $due_tot;

       }?>
     
     
   <tr>
   <td colspan="5" align="right"><b>Total</b></td>
   <td><b><?php echo number_format ("$amt_tot", '2')?></b></td>
   <td><b><?php echo number_format ("$due_tot", '2')?></b></td>
   <td><b><?php echo number_format ("$tot", '2')?></b></td></tr>  
     </tbody></table>	