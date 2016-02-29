<style type="text/css">
  table, tr.noBorder td {border:#000}
</style>

<div style="width:80%;margin:auto;" class="bill_on_screen">
<div style="background-color:#FFF; overflow:auto;">

<div>
        <?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>
        <div align="center" style="padding: 0px; font-size: 25px; font-family:Verdana, Geneva, sans-serif">
        <b><?php echo $data['address']['name']; ?></b></div>
        <div align="center" style="padding: 0px;font-size: 12px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
        <?php echo $data['address']['add']; ?></div>
        <div align="center" style="padding: 0px;font-size: 12px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
        Tel:&nbsp;<?php echo $data['address']['contact']; ?></div>
        
        <div align="center" style="padding: 0px;font-size: 12px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
        Email:&nbsp;</label><?php echo $data['address']['email']; ?>,&nbsp;&nbsp;web:&nbsp;<?php echo $data['address']['web']; ?>
        <br />
        <hr width="500px" size="40px" style="border:solid 1px #999" /></div>
        <?php }?>
</div>

<div align="center" style="background-color:#36F; padding: 0px;font-size: 20px;font-weight: bold;color:#FFF; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Invoice</div>
<div style="border:solid 1px; overflow:auto;">
<table border="0" style="width:15%; float:left;">
<tr>
<td>

</td>
</tr>
</table>

</div>
<div style="border:solid 1px; overflow:auto; border-top:none; border-bottom:none;padding:5px;">
<div>
<table border="0" style="width:60%; float:left;">
<?php 
        $i=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
		 $id=$data['room_checkin_checkout'] ['id'];
         $child=$data['room_checkin_checkout']['child'];
		 ?>

<?php 
 $master_roomno_id=$data['room_checkin_checkout']['master_roomno_id'];
 $card_no=$data['room_checkin_checkout']['card_no'];
  $fetch_data_for_receiptt=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_data_for_receiptt',$card_no,$id), array());
  
?>
<?php 
        $i=0;
		 foreach($fetch_data_for_receiptt as $data1){ 
		 $i++;
		 $id=$data1['checkout'] ['id'];
         $check_id=$data1['checkout']['check_id'];
		 ?>
         
<tr>
<td style="text-align:left; width:28%;font-weight: bold;">
Bill No. :
</td>
<td><?php echo $id; ?></td>
</tr>
<?php  } ?>


<tr>
<td style="text-align:left;font-weight;">Guest Name:</td>
<td style="text-align:left;font-weight:bold"><?php echo $data['room_checkin_checkout'] ['guest_name']; ?></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">Address:</td>
<td style="text-align:left;"><?php echo $data['room_checkin_checkout'] ['permanent_address']; ?></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">Nationality:</td>
<td style="text-align:left;"><?php echo $data['room_checkin_checkout'] ['nationality']; ?></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">No. of PAX:</td>
<td style="text-align:left;">

 <?php echo $data['room_checkin_checkout'] ['pax']; ?>
 
 
  <?php 

if($child>0){?>
         <?php echo '+';?>
        <?php echo $child;?>
      <?php } ?>
      
</td></tr>

<tr>
<td style="text-align:left;font-weight;">Arrival Date:</td>
<td style="text-align:left;"><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?>&nbsp;&nbsp;<?php echo $data['room_checkin_checkout'] ['arrival_time'] ?></td>
</tr	>



<?php }?>
</table>


<table border="0" style="width:39%; float:right;">
<?php 
       
        $i=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
		 $id=$data['room_checkin_checkout'] ['id'];
         $dueamt=$data['room_checkin_checkout']['due_amount'];
		 
		  $master_tax_id=$data['room_checkin_checkout']['taxes'];
         $master_tax_idd=explode(' - ', $master_tax_id);
		 
		 ?>

<tr>
<td>
</td>
<td></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">G.R. NO:</td>
<td style="text-align:left;"><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
</tr>

<tr>
<td style="text-align:left;font-weight;">Plan:</td>
<td style="text-align:left;"><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['room_checkin_checkout']['plan_id']), array()); ?></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">RoomType</td>
<td style="text-align:left;"><?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['room_checkin_checkout']['room_type_id']), array()); ?></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">Accomodation:</td>
<td style="text-align:left;"><?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">Total Room</td>
<td style="text-align:left;"><?php echo $data['room_checkin_checkout']['total_room']; ?></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">Departure Date:</td>
<td style="text-align:left;"><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['checkout_date'])); ?>&nbsp;&nbsp;</td>
</tr>

<?php } ?>
</table>
</div>
</div>
<div style="overflow:auto;">
<table border="1" style="width:100%; margine-left:2px; border-collapse:collapse;" cellspacing="0" cellpadding="5">

<tr style="background-color:#00C">
<th style="width:5%; text-align:left;color: #fff;background-color:#36F; padding-left:5px;">S.No.</th>
<th style="width:50%; text-align:left;color: #fff;background-color:#36F; padding-left:5px;">Particulars of charges</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Gross</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Tax</th>
<th style="width:20%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Amount(Rs.)</th>
</tr>

<?php 
        $a=0;
        $b=0;
        $c=0;
        $d=0;
		$grandsubb=0;
        $grandamt=0;
        $grandamount=0;
        $grandtotal=0;
        $grandsub=0;
        $houseamount=0;
		$extrabed=0;
        $disc=0;
        $i=0;
        $h=0;
        $bed=0;
         $pos=0;
         $p=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
	     $id=$data['room_checkin_checkout'] ['id'];
		 $advance_taken=$data['room_checkin_checkout']['advance_taken'];
         $dueamt=$data['room_checkin_checkout']['due_amount'];
         $foo_discount=$data['room_checkin_checkout']['foo_discount'];
         $house_amount=$data['room_checkin_checkout']['house_amount'];
         $posnet_amount=$data['room_checkin_checkout']['posnet_amount'];
         //$extrabed=$data['room_checkin_checkout']['extra_bed_tot'];
         $discount_type=$data['room_checkin_checkout']['discount_type'];
         $other_discount=$data['room_checkin_checkout']['other_discount'];
		 $room_discount=$data['room_checkin_checkout']['room_discount'];
		 $tg=$data['room_checkin_checkout']['tg'];
		 $totaltax=$data['room_checkin_checkout']['totaltax'];
		 $extra_bed=$data['room_checkin_checkout']['extra_bed'];
		 
		 $afterdis=$tg-$totaltax;
         if($room_discount>0)
		 {
			$rdisc=($afterdis * $room_discount)/ 100; 
		 }else
		 {
			$rdisc=0; 
		 }
		 
		 $netdisc=$tg-$rdisc;
		 
		 
		 
		 if($foo_discount==$p)
         {
         $pos=$posnet_amount;
         }
         else{
         $disc=($posnet_amount * $foo_discount)/ 100;
         $pos=$posnet_amount-$disc;
         }
         if($discount_type==1)
         {
        $o_dis=$other_discount;
         }
         else{
         $o_dis=($grandtotal * $other_discount)/ 100;
         }
        ?>
        
        <tr>
<td style="text-align:left; padding-left:5px; width:5%;"><?php echo $i;?></td>
<td style="text-align:left; padding-left:5px; width:50%;">Room/s&nbsp;@&nbsp;<?php echo $data['room_checkin_checkout']['room_charge'];?>
&nbsp;(<?php echo $data['room_checkin_checkout']['pax'];?>&nbsp;X&nbsp;<?php echo $data['room_checkin_checkout']['duration'];?> night/s) 
<?php 
if($room_discount>0){?>
         <?php echo ',Discount: ';?>
         <?php echo $room_discount; echo ' %'; ?>
      <?php } ?>
         </td>
<td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['room_checkin_checkout']['room_charge'];?></td>
<td style="text-align:right;padding-right: 5px; width:15%;"><?php echo @$data['room_checkin_checkout']['totaltax'];?></td>
<td style="text-align:right;padding-right: 10px; width:15%;"><?php echo $netdisc;?></td>
</tr>


 <?php

if($posnet_amount>0){ $i++; ?>

<tr>
<td style="text-align:left; padding-left:5px; width:5%;"><?php echo $i;?></td>
<td style="text-align:left; padding-left:5px; width:50%;"> POS Discription: &nbsp;Food Discount(&nbsp;<?php echo $data['room_checkin_checkout']['foo_discount'];?>&nbsp;%)</td>
<td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['room_checkin_checkout']['posnet_amount'];?></td>
<td style="text-align:right;padding-right: 5px; width:15%;">&nbsp;</td>
<td style="text-align:right;padding-right: 10px; width:15%;"><?php echo $pos;?></td>
</tr>
<?php }?>

<?php
if($house_amount>0){ $i++; ?>

<tr>
<td style="text-align:left; padding-left:5px; width:5%;"><?php echo $i;?></td>
<td style="text-align:left; padding-left:5px; width:50%;">House Keeping &nbsp;</td>
<td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['room_checkin_checkout']['house_amount'];?></td>
<td style="text-align:right;padding-right: 5px; width:15%;">&nbsp;</td>
<td style="text-align:right;padding-right: 10px; width:15%;"><?php echo $data['room_checkin_checkout']['house_amount'];?></td>
</tr>
<?php }?>


<?php
if($extra_bed>0){ $i++; ?>

<tr>
<td style="text-align:left; padding-left:5px; width:5%;"><?php echo $i;?></td>
<td style="text-align:left; padding-left:5px; width:50%;">Other Services &nbsp;</td>
<td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['room_checkin_checkout']['extra_bed'];?></td>
<td style="text-align:right;padding-right: 5px; width:15%;">&nbsp;</td>
<td style="text-align:right;padding-right: 10px; width:15%;"><?php echo $data['room_checkin_checkout']['extra_bed'];?></td>
</tr>
<?php }?>

<?php  
$grandamt=$grandamt+$pos;
$grandamount=$grandamount+$netdisc;
$houseamount=$houseamount+$data['room_checkin_checkout']['house_amount'];
$extrabed=$extrabed+$data['room_checkin_checkout']['extra_bed'];
 $grandtotal=$grandamount+$grandamt+$houseamount+$extrabed;
  $a=$a+$data['room_checkin_checkout']['advance_taken'];
 $b=$b+$a;
 $c=$c+$data['room_checkin_checkout']['due_amount'];
 $d=$d+$c;
 
 $grandsubb=($grandtotal+$d+$bed)-$b; 
 
 $o_dis=0;
         if($discount_type==1)
         {
         $o_dis=$other_discount;
         }
         else{
         $o_dis=($grandsubb * $other_discount)/ 100;
         }
         

// $h=$h+$data['room_checkin_checkout']['extra_bed_tot'];
 //$bed=$bed+$h;
 $grandsub=($grandtotal+$d+$bed)-$b-$o_dis;
 
         }?>



<td colspan="4">
<table border="0" style="width:45%; margin-top:2px;" align="right">
	
<tr>
<td style="text-align:right; padding-right:2%;">Sub Total:</td>
</tr>

<!--<?php 
$o_dis=0;
if($extrabed>0){?>
<tr>
<td style="text-align:right; padding-right:2%;">Extra Bed:</td>
</tr>
<?php }?>-->

<?php 

if($dueamt>0){?>
<tr>
<td style="text-align:right; padding-right:2%;">Due Amount:</td>
</tr>
<?php }?>

<?php
if($advance_taken>0){?>
<tr>
<td style="text-align:right; padding-right:2%;">Advance:</td>
</tr>
<?php }?>

<?php
if($other_discount>0){?>
<tr>
<td style="text-align:right; padding-right:2%;">Discount</td>
</tr>
<?php }?>


<tr>
<td style="text-align:right; padding-right:2%;"><b>Sub Total:</b></td>
</tr>

<tr>
<td style="text-align:right; padding-right:2%;">Credit Card Amount:</td>
</tr><tr>
<td style="text-align:right; padding-right:2%;"><b>Sub Total:</b></td>
</tr><tr>
<td style="text-align:right; padding-right:2%;">Rounding Off:</td>
</tr><tr >
<th style="text-align:right; padding-right:2%;">Amount Due(Rounded)</th>
</tr>
</table>
</td>


<?php 
       $xyz=0;
        $i=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
		 $id=$data['room_checkin_checkout'] ['id'];
         $dueamt=$data['room_checkin_checkout']['due_amount'];
        // $extrabed=$data['room_checkin_checkout']['extra_bed_tot'];
         $discount_type=$data['room_checkin_checkout']['discount_type'];
          $other_discount=$data['room_checkin_checkout']['other_discount'];
          $paid_room=$data['room_checkin_checkout']['paid_room'];
         $paid_amt=$data['room_checkin_checkout']['paid_amt'];
          $o_dis=0;
         if($discount_type==1)
         {
         $o_dis=$other_discount;
         }
         else{
         $o_dis=($grandtotal * $other_discount)/ 100;
         }
?>
<td valign="top"><table border="0" style="width:100%;">
<tr>
<td style="text-align:right; padding-right:8%;;border-bottom:ridge 1px"><?php echo number_format ("$grandtotal",2)?></td>
</tr>

<!--<?php
if($extrabed>0){?>
<tr>
<td style="text-align:right; padding-right:8%;border-bottom:ridge 1px"><?php echo $bed;?></td>
</tr>
<?php }?>-->
<?php
if($dueamt>0){?>
<tr>
<td style="text-align:right; padding-right:8%;border-bottom:ridge 1px"><?php echo $d;?></td>
</tr>
<?php }?>

<?php
if($advance_taken>0){?>
<tr>
<td style="text-align:right; padding-right:8%;border-bottom:solid;"><?php echo $b;?></td>
</tr>
<?php }?>


<?php
if($other_discount>0){?>
<tr>
<td style="text-align:right; padding-right:8%;border-bottom:ridge 1px"><?php echo $o_dis;?></td>
</tr>
<?php }?>


<tr>
<td style="text-align:right; padding-right:8%;"><?php echo number_format ("$grandsub",2)?></td>
</tr>



<?php 
 $master_roomno_id=$data['room_checkin_checkout']['master_roomno_id'];
 $card_no=$data['room_checkin_checkout']['card_no'];
  $fetch_data_for_receiptt=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_data_for_receiptt',$card_no,$id), array());
  
?>
<?php
$recamount=0;
$dueamount=0;
$due2=0;
       $crsubtotal=0;
       $crtotal=0;
       $xyz=0;
       
		 foreach($fetch_data_for_receiptt as $data1){ 
		 $id_receipt=$data1['checkout'] ['id'];
         $card_no=$data1['checkout']['card_no'];
          $total_amount=$data1['checkout']['total_amount'];
          $receive_amount=$data1['checkout']['receive_amount'];
         $due_amount=$data1['checkout']['due_amount'];
          $check_id=$data1['checkout']['check_id'];
?>

         <?php 
$crtotal=$receive_amount;
$crsubtotal=$grandsub-$receive_amount;
}?>


<tr>
<td style="text-align:right; padding-right:8%; border-bottom:solid;"><?php echo number_format ("$crtotal",2) ?></td>
</tr>
<tr>
<td style="text-align:right; padding-right:8%;"><?php echo number_format ("$crsubtotal",2)?></td>
</tr>
<tr>
<td style="text-align:right; padding-right:8%;border-bottom:solid;"><?php echo round("$crsubtotal");?></td>
</tr>

 
<tr>
<td style="text-align:right; padding-right:8%;"><?php echo round("$crsubtotal");?></td>
</tr>
</table>
</td>
<?php } ?>
</tr>
<tr>
<td colspan="5" align="right"><table width="100%"><tr>
<td>
<div align="right" style="border-bottom: medium 2px; color:#333; font-size: 9px; padding-right:5px;"><span>
<?php
            foreach($master_tax_idd as $taxes)
            {
				
           @$master_tax_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_tax_fetch_bill',$taxes), array());
		   
		   foreach($master_tax_fetch_id as $billtax)
		   {
			   
			   echo $bill_name=$billtax['master_tax']['name'].', ';
			  echo $bill_tax=$billtax['master_tax']['tax_applicable'].', ';
		   }
		   
            }
            ?></span></div></td>
</tr></table></td></tr>



         
<tr>
<?php 
        $i=0;
		 foreach($fetch_data_for_receiptt as $data1){ 
		 $i++;
		 $id=$data1['checkout'] ['id'];
         $check_id=$data1['checkout']['check_id'];
		 ?>
<td colspan="5" style="padding-top:10px; padding-bottom:10px">
<table border="1" style="width:60%; padding-top:10px;" align="center">
<tr class="noBorder">
<td align="center" colspan="4" style="padding-bottom:5px"><span style="border-bottom: solid 2px #000;  font-family:Georgia, 'Times New Roman', Times, serif" padding-left:5px;"><b>Receipt</b></span></td></tr>
<tr style="background-color:#36F; color: #fff;"><td style="padding-left:5px; font-family:Georgia, 'Times New Roman', Times, serif"><b>Receipt Type</b></td>
<td style=" background-color:#36F; padding-left:5px; font-family:Georgia, 'Times New Roman', Times, serif"><b>Credit/Cheque/NEFT No.</b></td>
<td style=" background-color:#36F; padding-left:5px; font-family:Georgia, 'Times New Roman', Times, serif"><b>Amount</b></td>
<td style=" background-color:#36F; padding-left:5px; font-family:Georgia, 'Times New Roman', Times, serif"><b>Date</b></td>
</tr>

<?php $fetch_data_for_receipt_checkouttt=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_data_for_receipt_checkouttt',$id), array());
	   
		 $total=0;
		 foreach($fetch_data_for_receipt_checkouttt as $data1){ 
		 $id_receipt=$data1['ledger'] ['id'];
		 $receipt_mode=$data1['ledger'] ['receipt_mode'];
		 $bank_name=$data1['ledger'] ['bank_name'];
		 $credit_card_name=$data1['ledger'] ['credit_card_name'];
		 $credit_card_no=$data1['ledger'] ['credit_card_no'];
		 $credit_card_no=$data1['ledger'] ['transaction_date'];
		 ?>
<tr><td style="padding-left:5px;"><?php echo $data1['ledger']['receipt_mode'];?></td>

<td style="padding-left:5px;">
<?php echo $data1['ledger']['bank_name'];?> - <?php echo $data1['ledger']['credit_card_name'];?> - <?php echo $data1['ledger']['credit_card_no'];?></td>

<?php $fetch_data_for_receipt_checkout=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_data_for_receipt_checkout',$id), array());
	   
		 $total=0;
		 foreach($fetch_data_for_receipt_checkout as $data1){ 
		 $id_receipt=$data1['ledger_cr_dr'] ['id'];
		 ?>

<td style="padding-left:5px;"><?php echo $data1['ledger_cr_dr']['dr'];?>
</td>
<?php 
}?>	
<td style="padding-left:5px;">&nbsp;
</td>
</tr>
<?php 
}?>	

</table></td><?php }?></tr>


</table>
</td></tr>
</table>

<!---------------------------------------------------->

<!----------------------------------------------------->



</div><div style="overflow:auto;border:solid 1px;padding:5px;border-top: none;">
<div style="width:70%;float:left;font-size: 11px;line-height: 15px;">
<span>Remarks:</span><br/><span>1.  Thank You</span><br/><br/>I Agree that I am liable for the above payment and if the</br> person,
company or association indicate by me as being</br> responsible for 
the same, he does not so, liabillty for such</br> payment shall be
joint and several with such person company</br> or association. </br></br></br><span><center>Guest Signature</center></span></br></div>
<div style="width:30%;float:right;" align="center">  <b>Dreamshapers</b> <br/><br/><br/><br/><br/><br/><br/><br/><div align="center"><span style="border-top: solid 1px #424141;">Receptionist</span></div></div>
</div>
<div style="overflow:auto;border:solid 1px;">

<?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>
<div align="left" style="border-bottom: medium 2px; color: #6F6D6D; font-size: 9px; padding-left:5px;"><span>TIN No.: <?php echo $data['address']['tin_no']; ?>&nbsp;|&nbsp;Service Tax No.: <?php echo $data['address']['service_tax_no']; ?></div>
<?php }?>
</div>


</div>
</div>

</div></div></div>


