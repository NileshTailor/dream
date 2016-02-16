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
        Email:&nbsp;</label><?php echo $data['address']['email']; ?>,&nbsp;&nbsp;web:&nbsp;<?php echo $data['address']['web']; ?><br />
        <hr width="500px" size="40px" style="border:solid 1px #999" /></div>
        <?php }?>
</div>

<div align="center" style="border-bottom:groove; 2px solid; background-color:#36F;padding: 0px;font-size: 20px;font-weight: bold;color:#FFF; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; width:90%">House Keeping BIll</div>
<div style="border:solid 1px; width:90%; overflow:auto; border-top:none; border-bottom:none;padding:5px;">
<div>

<table border="0" style="width:45%; float:left;">
<?php 
        $i=0;
		 foreach($fetch_house_keeping as $data){ 
		 $i++;
		 $id=$data['house_keeping']['id'];
         $master_roomno_id=$data['house_keeping']['master_roomno_id'];
         $time=$data['house_keeping'] ['time'];
         $date=$data['house_keeping']['date'];
         $remarks=$data['house_keeping']['remarks'];
         $card_no=$data['house_keeping']['card_no'];
         $serviced_by=$data['house_keeping']['serviced_by'];
         		 ?>
                 
<tr>
<td style="text-align:left; width:30%; font-weight:bold;">
Bill No.:
</td>
<td><?php echo $id; ?>
</td>
</tr>

<tr>
<td style="text-align:left; font-weight;">Accommodation:</td>
<td style="text-align:left;font-weight;">&nbsp;<?php echo $master_roomno_id; ?></td>
</tr>

<tr>
<td style="text-align:left;font-weight;">Date:</td>
<td style="text-align:left;"><?php echo date('d-m-Y', strtotime($date)); ?>&nbsp;&nbsp;<?php echo $time ?></td>
</tr>


<?php }?>
</table>


<table border="0" style="width:45%; float:right;">
<?php 
       
        $i=0;
		$washh=0;
		$ironn=0;
		 foreach($fetch_house_keeping as $data){ 
		 $i++;
		 $id=$data['house_keeping'] ['id'];
		 $wash1=$data['house_keeping']['wash_iron_no'];
         $wash2=$data['house_keeping']['wash_iron_price'];
		 $iron1=$data['house_keeping']['iron_no'];
         $iron2=$data['house_keeping']['iron_price'];
		 ?>

<tr>
<td></td>
<td></td>
</tr>

<tr>
<td style="text-align:right;font-weight; padding-right:32px">G.R. NO:</td>
<td style="text-align:left; padding-left:10px"><?php echo $card_no; ?></td>
</tr>


<tr>
<td style="text-align:right;font-weight; padding-right:27px">Remarks:</td>
<td style="text-align:left; padding-left:10px"><?php echo $remarks; ?></td>
</tr>

<tr>
<td style="text-align:right;font-weight; padding-right:10px">Serviced By:</td>
<td style="text-align:left; padding-left:10px">
       <?php echo @$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'house_keeping_fetch',$serviced_by), array()); ?>

</td>
</tr>



</tr>



<?php 

$washh=$wash1*$wash2;
$ironn=$iron1*$iron2;

} ?>
</table>
</div>
</div>

<div style="overflow:auto;">
<table border="1" style="width:90%; margine-left:2px; border-collapse:collapse;" cellspacing="0" cellpadding="5">
<tr style="background-color:#00C">
<th style="width:5%; text-align:left;color: #fff;background-color:#36F; padding-left:5px;">S.No.</th>
<th style="width:20%; text-align:left;color: #fff;background-color:#36F; padding-left:5px;">Particulars of charges</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">No. of Clothes</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Charge</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Gross Amount(Rs.)</th>
</tr>

<?php 

        $i=0;
		 foreach($fetch_house_keeping as $data){ 
		 $i++;
			 $id=$data['house_keeping'] ['id'];
		 ?>
<tr>
<td style="text-align:left; padding-left:5px; width:5%;"><?php echo $i;?></td>
<td style="text-align:left; padding-left:5px; width:20%;">Wash&Iron </td>
<td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['house_keeping']['wash_iron_no'];?></td>
<td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['house_keeping']['wash_iron_price'];?></td>
<td style="text-align:right;padding-right: 10px; width:15%;"><?php echo $washh;?></td>
</tr>


<tr>
<td style="text-align:left; padding-left:5px; width:5%;"><?php echo $i+$i;?></td>
<td style="text-align:left; padding-left:5px; width:20%;">Iron</td>
<td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['house_keeping']['iron_no'];?></td>
<td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['house_keeping']['iron_price'];?></td>
<td style="text-align:right;padding-right: 10px; width:15%;"><?php echo $ironn;?></td>
</tr>

<?php 
 
 }?>
<tr>

<td colspan="2" width="30%">
<table border="0" style="width:100%; float:left;">
<tr>
<td style="text-align:left; width:30%; font-weight:bold;">&nbsp;
</td>
</tr>
<tr>
<td style="text-align:left; font-weight;">&nbsp;</td>
</tr>
<tr>
<td style="text-align:left;font-weight;">&nbsp;</td>
</tr>
<tr>
<td style="text-align:left;font-weight;">&nbsp;</td>
</tr>
</table>
</td>
<td colspan="2" width="30%">
<table border="0" style="width:100%; float:right;">
<tr>
<td style="width:35%; text-align:right;font-weight; padding-right: 10px;">Total Amount</td>
</tr>
<tr>
<td style="text-align:right;font-weight; padding-right: 10px;">Credit Card Amount</td>
</tr>
<tr>
<td style="text-align:right;font-weight; padding-right: 10px;">Sub Total</td>
</tr>
<tr>
<td style="text-align:right;font-weight; padding-right: 10px;">Amount Due</td>
</tr>
</table>
</td>


<td width="10%">
<table border="0" style="width:100%; float:right;">

<?php 
       $subtotal=0;
		$dd=0;
		$due=0;
        $null=0;
        $i=0;
		 foreach($fetch_house_keeping as $data){ 
		 $i++;
		 $id=$data['house_keeping'] ['id'];
         $total_amount=$data['house_keeping']['total_amount'];
		  $given_amount=$data['house_keeping']['given_amount'];
         $subtotal=$data['house_keeping']['total_amount']-$data['house_keeping']['given_amount']-$dd;
         ?>
         
<tr>
<td style="text-align:right; padding-right: 10px;"><?php echo number_format ("$total_amount", 2)?></td>
</tr>
<tr style="border-bottom:solid 1px;">
<td style="text-align:right; padding-right: 10px;"><?php echo number_format ("$given_amount", 2)?></td>
</tr>
<tr>
<td style="text-align:right;padding-right: 10px;"><?php echo number_format ("$subtotal", 2) ?></td></tr>
<tr>
<td style="text-align:right; padding-right: 10px;"0><b><?php echo number_format ("$subtotal", 2) ?></b></td></tr>

<?php

 }?>


</table>
</td>

</tr>

</table></div>


<div style="overflow:auto;border:solid 1px;padding:5px;border-top: none; width:90%">
<div style="width:45%;float:left;font-size: 11px;line-height:15px;" align="left">
<span style="text-align:left">Remarks:</span><br/><span>1.Thank You</span>
 </br></br><br></br></br><br><div align="center"><span style="border-top: solid 1px #424141;">Guest Signature</span></div></br></div>
<div style="width:45%;float:right;" align="center">  <b>Dreamshapers</b><br/><br/><br/><br/><br/><div align="center"><span style="border-top: solid 1px #424141;">Receptionist</span></div></div>
</div>
<div style="overflow:auto;border:solid 1px; width:90%">
<?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>
<div align="left" style="border-bottom: medium 2px; color: #6F6D6D; font-size: 9px; padding-left:5px;"><span>TIN No.: <?php echo $data['address']['tin_no']; ?>&nbsp;|&nbsp;Service Tax No.: <?php echo $data['address']['service_tax_no']; ?></div>
<?php }?>
</div>



</div></div>