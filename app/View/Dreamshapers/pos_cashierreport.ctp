<table class="table table-striped table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr style="background-color:#FFF"><td colspan="5" align="center"><p><div><b><font size="+3">Cashier Report(POS)</font></b></div></p></td></tr>
   
    <tr>
    	<th>NO.</th>
        <th>Date</th>
        <th>Guest Name / Particulars</th>
        <th>Descriptions</th>
        <th>Amount</th>
     </tr>
     </thead>
     <tbody>
     
     <tr style="background-color:#FFF"><td colspan="5"><p><div><b>Cash or Credit Card Amount</b></div></p></td></tr>
     
     <?php  
     $subtotal=0;
     $total=0;
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
         ?>
     <tr>
    <?php 
    if($recpt_type=='Cash' && $cash != 0)
         {?>
             <td><?php echo $i;; ?></td>
             <td><?php echo $date_to; ?></td>
             <td><?php echo $guest_name; ?></td>
             <td><?php echo $billing_ins; ?></td>
             <td><?php echo $cash; ?></td>		
      <?php
         
         }
         else if($recpt_type=='Credit Card' && $credit_card_amt>0)
         {?>
         <td><?php echo $i;; ?></td>
             <td><?php echo $date_to; ?></td>
             <td><?php echo $guest_name; ?></td>
             <td><?php echo $billing_ins; ?></td>
             <td><?php echo $credit_card_amt; ?></td>		

       <?php     }
    ?>     </tr>


<?php

$subtotal=$subtotal+$cash+$credit_card_amt;
       }?>
     
     
   <tr>
   <td colspan="4" align="right"><b>Sub Total</b></td>
   <td><b><?php echo number_format ("$subtotal", '2')?></b></td></tr>  
     
     
      <tr style="background-color:#FFF"><td colspan="5"><p><div><b>NEFT or Cheque Amount</b></div></p></td></tr>
     
     
     <?php
     
     $subtotal1=0;
     $totla=0;
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
         
         ?>
     <tr>
    <?php 
    if($recpt_type=='NEFT' && $neft_amt != 0)
         {?>
             <td><?php echo $i;; ?></td>
             <td><?php echo $date_to; ?></td>
             <td><?php echo $guest_name; ?></td>
             <td><?php echo $billing_ins; ?></td>
             <td><?php echo $neft_amt; ?></td>		

         
       
      <?php
         
         }
         else if($recpt_type=='Cheque' && $cheque_amt>0)
         {?>
         <td><?php echo $i;; ?></td>
             <td><?php echo $date_to; ?></td>
             <td><?php echo $guest_name; ?></td>
             <td><?php echo $billing_ins; ?></td>
             <td><?php echo $cheque_amt; ?></td>		

       <?php     }
    ?>     </tr>


<?php

$subtotal1=$subtotal1+$neft_amt+$cheque_amt;
$total=$subtotal+$subtotal1;
       }?>
     
     
   <tr>
   <td colspan="4" align="right"><b>Sub Total</b></td>
   <td><b><?php echo number_format ("$subtotal1", '2')?></b></td></tr> 
   <tr>
   <td colspan="4" align="right"><b>Total Amount</b></td>
   <td style="border-top:groove; border-bottom:groove"><b><?php echo number_format ("$total", '2')?></b></td></tr> 
     </tbody></table>	