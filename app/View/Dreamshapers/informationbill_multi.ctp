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

<div align="center" style="background-color:#36F; padding: 0px;font-size: 20px;font-weight: bold;color:#FFF; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Group Invoice</div>
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
		 foreach($fetch_room_checkin_checkoutt as $data){ 
		 $i++;
		 $id=$data['room_checkin_checkout'] ['id'];
         $child=$data['room_checkin_checkout']['child'];
		 ?>
<tr>
<td style="text-align:left; width:28%;font-weight: bold;">
Bill No. :
</td>
<td><?php echo $data['room_checkin_checkout'] ['id']; ?></td>
</tr>
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
</table>

<table border="0" style="width:39%; float:right;">
<?php 
        $i=0;
		 foreach($fetch_room_checkin_checkoutt as $data){ 
		 $i++;
		 $id=$data['room_checkin_checkout'] ['id'];
         $dueamt=$data['room_checkin_checkout']['due_amount'];
		 ?>

<tr>
<td></td>
<td></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">G.R. NO:</td>
<td style="text-align:left;"><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
</tr>

<!--<tr>
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
</tr>-->
<tr>
<td style="text-align:left;font-weight;">No. of PAX:</td>
<td style="text-align:left;">

 <?php echo $data['room_checkin_checkout'] ['pax']; ?>
 
 
  <?php 

if($child>0){?>
         <?php echo '+';?>
        <?php echo $child;?>
      <?php } ?>
</td></tr><tr>
<td style="text-align:left;font-weight;">Arrival Date:</td>
<td style="text-align:left;"><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?>&nbsp;&nbsp;<?php echo $data['room_checkin_checkout'] ['arrival_time'] ?></td>
</tr>
<?php }?>

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
<th style="width:10%; text-align:left;color: #fff;background-color:#36F; padding-left:5px;">Room No.</th>
<th style="width:35%; text-align:left;color: #fff;background-color:#36F; padding-left:5px;">Particulars of charges</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Room</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">POS</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">House</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Other</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Tax</th>
<th style="width:25%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Due</th>
</tr>
<?php 
         $i=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
	     $id=$data['room_checkin_checkout'] ['id'];
		// $multi_flag=$data['room_checkin_checkout']['multi_flag'];
		 $advance_taken=$data['room_checkin_checkout']['advance_taken'];
         $dueamt=$data['room_checkin_checkout']['due_amount'];
         $foo_discount=$data['room_checkin_checkout']['foo_discount'];
         $house_amount=$data['room_checkin_checkout']['house_amount'];
         $posnet_amount=$data['room_checkin_checkout']['posnet_amount'];
         //$extrabed=$data['room_checkin_checkout']['extra_bed_tot'];
         $discount_type=$data['room_checkin_checkout']['discount_type'];
         $other_discount=$data['room_checkin_checkout']['other_discount'];
		 $room_discount=$data['room_checkin_checkout']['room_discount'];
		 $totalnetamount=$data['room_checkin_checkout']['totalnetamount'];
		 $master_roomno_id=$data['room_checkin_checkout']['master_roomno_id'];
		 $extra_bed=$data['room_checkin_checkout']['extra_bed'];
        ?>
        
        
        
        <tr>
<td style="text-align:left; padding-left:5px; width:5%;"><?php echo $i;?></td>
<td style="text-align:left; padding-left:5px; width:10%;"><?php echo $master_roomno_id;?></td>
<td style="text-align:left; padding-left:5px; width:35%;">Bill Description 
<?php 
if($room_discount>0){?>
         <?php echo ',Discount: ';?>
         <?php echo $room_discount; echo ' %'; ?>
      <?php } ?>
      
      <?php 
if($foo_discount>0){?>
         <?php echo ',Food Discount: ';?>
         <?php echo $foo_discount; echo ' %'; ?>
      <?php } ?>
      
       </td>
      <td style="text-align:right;padding-right: 10px; width:15%;"><?php echo $data['room_checkin_checkout']['net_amount'];?></td>
      <td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['room_checkin_checkout']['posnet_amount'];?></td>
      <td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['room_checkin_checkout']['house_amount'];?></td>
      <td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['room_checkin_checkout']['extra_bed'];?></td>
<td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['room_checkin_checkout']['totaltax'];?></td>
<td style="text-align:right;padding-right: 5px; width:25%;"><?php echo $data['room_checkin_checkout']['due_amount'];?></td>
</tr>
<?php  
         }?>






<td colspan="8">
<table border="0" style="width:45%; margin-top:2px;" align="left">
<tr>
<td style="text-align:left; padding-left:2%; width:15%"><b>Advance:</b></td>
<td style="text-align:left; padding-left:2%;"><b><?php echo $advance_taken;?></b></td>
</tr>
<tr>
<td style="text-align:right; padding-right:2%;"><b></b></td><td></td>
</tr>
<tr>
<td style="text-align:right; padding-right:2%;"></td><td></td>
</tr>

</table>

<table border="0" style="width:45%; margin-top:2px;" align="right">

<tr>
<td style="text-align:right; padding-right:2%;"><b>Total Amount</b></td>
</tr>
<tr>
<td style="text-align:right; padding-right:2%;">Credit Card Amount:</td>
</tr>
<tr>
<th style="text-align:right; padding-right:2%;">Amount Due(Rounded)</th>
</tr>
</table>
</td>


<?php 
       
		 foreach($fetch_room_checkin_checkoutt as $data){ 
		 $i++;
		 $id=$data['room_checkin_checkout'] ['id'];
         $advance_taken=$data['room_checkin_checkout']['advance_taken'];
		 $totalnetamount=$data['room_checkin_checkout']['totalnetamount'];
		 $master_tax_id=$data['room_checkin_checkout']['taxes'];
          $master_tax_idd=explode(' - ', $master_tax_id);
       ?>
<td valign="top"><table border="0" style="width:100%;">
<tr>
<td style="text-align:right; padding-right:8%;"><b><?php echo number_format($totalnetamount,2) ?></b></td>
</tr>

<?php }?>


<?php 
 $master_roomno_id=$data['room_checkin_checkout']['master_roomno_id'];
 $card_no=$data['room_checkin_checkout']['card_no'];
 $fetch_data_for_receippptt=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_data_for_receippptt',$card_no,$id), array());
  
?>
<?php 
         $i=0;
		 $cool=0;
		 $crsubtotal=0;
		 $crtotal=0;
		 foreach($fetch_data_for_receippptt as $data1){ 
		 $i++;
		 $id=$data1['checkout'] ['id'];
         $total_amount=$data1['checkout']['total_amount'];
		 $receive_amount=$data1['checkout']['receive_amount'];
		 $due_amount=$data1['checkout']['due_amount'];
		 $check_id=$data1['checkout']['check_id'];
?> 

<?php 
$crtotal=$receive_amount;
$crsubtotal=$totalnetamount-$receive_amount;  

}?>

<tr>
<td style="text-align:right; padding-right:8%; border-bottom:solid;"><?php echo number_format ($crtotal, 2) ?></td>
</tr>
<tr>
<td style="text-align:right; padding-right:8%; border-bottom:solid;"><?php echo number_format ($crsubtotal, 2) ?></td>
</tr>


</table>
</td>
</tr>


<tr>
<td colspan="9" align="right"><table width="100%"><tr>
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





<!--
<tr>							
<tr>
<td colspan="9" style="padding-top:10px; padding-bottom:10px">
<table border="1" style="width:60%; padding-top:10px;" align="center">
<tr class="noBorder">
<td align="center" colspan="4" style="padding-bottom:5px"><span style="border-bottom: solid 2px #000;  font-family:Georgia, 'Times New Roman', Times, serif" padding-left:5px;"><b>Receipt</b></span></td></tr>
<tr style="background-color:#36F; color: #fff;">
<td style="padding-left:5px; font-family:Georgia, 'Times New Roman', Times, serif"><b>Receipt Type</b></td>
<td style=" background-color:#36F; padding-left:5px; font-family:Georgia, 'Times New Roman', Times, serif"><b>Credit/Cheque/NEFT No.</b></td>
<td style=" background-color:#36F; padding-left:5px; font-family:Georgia, 'Times New Roman', Times, serif"><b>Amount</b></td>
<td style=" background-color:#36F; padding-left:5px; font-family:Georgia, 'Times New Roman', Times, serif"><b>Date</b></td>
</tr>

<?php 
       
        $i=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
		 $id=$data['room_checkin_checkout'] ['id'];
          $master_roomno_id=$data['room_checkin_checkout'] ['master_roomno_id'];
		 ?>
         
         <?php $fetch_data_for_receiptt=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_data_for_receippptt',$data['room_checkin_checkout']['id'],$id), array());
		$total=0;
		 foreach($fetch_data_for_receiptt as $data1){ 
		 $id_receipt=$data1['receipt_checkout'] ['id'];
		 ?>

<tr><td style="padding-left:5px;"><?php echo $data1['receipt_checkout']['recpt_type'];?></td>
<td style="padding-left:5px;">
<?php echo $data1['receipt_checkout']['credit_card_no'];?>
<?php echo $data1['receipt_checkout']['cheque_no'];?>
<?php echo $data1['receipt_checkout']['neft_no'];?>
</td>
<td style="padding-left:5px;"><?php echo $data1['receipt_checkout']['cash'];?>
<?php echo $data1['receipt_checkout']['credit_card_amt'];?>
<?php echo $data1['receipt_checkout']['cheque_amt'];?>
<?php echo $data1['receipt_checkout']['neft_amt'];?>
</td>
<td style="padding-left:5px;">&nbsp;
</td>
</tr>
<?php 
}?>	



<?php }?></table></td></tr>
</tr>
-->
</table>
</td></tr>
</table>
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


