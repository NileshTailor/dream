<style type="text/css">
  table, tr.noBorder td {border:#000}
</style>
<div style="width:90%;margin:auto;" class="bill_on_screen" align="center">
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

<div align="center" style="padding: 0px;font-size: 20px;font-weight: bold;color:#000; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Information Bill</div>
<div style="border:solid 0px; overflow:auto;">
<table border="0" style="width:15%; float:left;">
<tr>
<td>

</td>
</tr>
</table>

</div>
<div style="border:solid 0px; overflow:auto; border-top:none; border-bottom:none;padding:5px;">
<div>
<table border="0" style="width:60%; float:left;">

<?php 
       
        $i=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
		 $id=$data['room_checkin_checkout'] ['id'];
         
		 
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
<tr>
<td style="text-align:left;font-weight;">No. of PAX:</td>
<td style="text-align:left;"><?php echo $data['room_checkin_checkout'] ['pax']; ?>&nbsp;+&nbsp;<?php echo $data['room_checkin_checkout'] ['child']; ?></td>
</tr>

<tr>
<td style="text-align:left;font-weight;">Arrival Date:</td>
<td style="text-align:left;"><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?>&nbsp;&nbsp;<?php echo $data['room_checkin_checkout'] ['arrival_time'] ?></td>
</tr>



<?php }?>
</table>


<table border="0" style="width:39%; float:right;">
<?php 
       
        $i=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
		 $id=$data['room_checkin_checkout'] ['id'];
		 ?>

<tr>
<td></td>
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

<?php 
} ?>
</table>
</div>
</div>
<div style="overflow:auto;">
<table border="1" style="width:100%; margine-left:2px; border-collapse:collapse;" cellspacing="0" cellpadding="5">

<tr style="background-color:#00C; border-top: solid 1px #000; border-bottom: solid 1px #000">
<th style="width:5%; text-align:left;color: #fff;background-color:#36F; padding-left:5px;">S.No.</th>
<th style="width:15%; text-align:left;color: #fff;background-color:#36F; padding-left:5px;">Bill date</th>
<th style="width:15%; text-align:left;color: #fff;background-color:#36F; padding-left:5px;">Bill No.</th>
<th style="width:15%; text-align:left;color: #fff;background-color:#36F; padding-left:5px;">Room Charges</th>
<th style="width:15%; text-align:left;color: #fff;background-color:#36F; padding-right:5px;">FNB Amount</th>
<th style="width:15%; text-align:left;color: #fff;background-color:#36F; padding-right:5px;">House Keeping Amount</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;"> Total Amount(Rs.)</th>
</tr>

<?php 
        
        $grandamt=0;
        $i=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
	     $id=$data['room_checkin_checkout'] ['id'];
		 $advance_taken=$data['room_checkin_checkout']['advance_taken']
		 ?>
<tr>
<td style="text-align:left; padding-left:5px; width:5%;"><?php echo $i;?></td>
<td style="text-align:left; padding-left:5px; width:15%;"><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
<td style="text-align:left;padding-left: 5px; width:15%;"><?php echo $data['room_checkin_checkout']['id'];?></td>
<td style="text-align:left;padding-left: 5px; width:15%;"><?php echo @$data['room_checkin_checkout']['room_charge'];?></td>
<td style="text-align:left;padding-left: 5px; width:15%;">
<?php
$de=0;
							$dee=0;
							$dk=0;
							$dkk=0;
							foreach($fetch_pos_nooo as $ftc){
				$bill_settle_due=$ftc['pos_kot']['due_amount'];
							@$dee=$dee+$bill_settle_due;
							}
							echo $dee;
?>

</td>
<td style="text-align:left;padding-left: 5px; width:15%;">
<?php
$de=0;
							$deee=0;
							$dk=0;
							$dkk=0;
							foreach($fetch_pos_noooo as $ftcc){
				$hkhk=$ftcc['house_keeping']['due_amount'];
							@$deee=$deee+$hkhk;
							}
							echo $deee;
?>

</td>
<td style="text-align:right;padding-right: 10px; width:15%;"><?php echo $data['room_checkin_checkout']['tg']+$dee+$deee;?></td>
</tr>

<?php 
$grandamt=$grandamt+$data['room_checkin_checkout']['tg']+$dee+$deee;
 }?>

<tr style=" border-top: solid 2px #000; border-bottom: solid 2px #000">
<td colspan="8">
<table border="0" style="width:45%; margin-top:2px;" align="right">
	
<tr>
<td style="text-align:right; padding-right:2%;">Grand Total</td>
<td style="text-align:right; padding-right:2%;"><?php echo number_format ("$grandamt", 2)?></td>
</tr>
</table>


</td></table></div></div></div>