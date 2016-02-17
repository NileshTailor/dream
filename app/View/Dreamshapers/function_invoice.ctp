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
        Email:&nbsp;</label><?php echo $data['address']['email']; ?>,&nbsp;&nbsp;web:&nbsp;<?php echo $data['address']['web']; ?><br />
        <hr width="500px" size="40px" style="border:solid 1px #999" /></div>
        <?php }?>
</div>

<div align="center" style="background-color:#36F;padding: 0px;font-size: 25px;font-weight: 
bold;color:#FFF; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Function Booking Invoice</div>
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
		 foreach($fetch_function_booking as $data){ 
		 $i++;
		 $id=$data['function_booking'] ['id'];
		 ?>
<tr>
<td style="text-align:left; width:28%;font-weight: bold;">
Bill No.:
</td>
<td><?php echo $data['function_booking'] ['id']; ?></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">Guest Name:</td>
<td style="text-align:left;font-weight:bold"><?php echo $data['function_booking'] ['name']; ?></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">Address:</td>
<td style="text-align:left;"><?php echo $data['function_booking'] ['address']; ?></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">Contact No.:</td>
<td style="text-align:left;"><?php echo $data['function_booking'] ['t_number']; ?></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">No. of PAX:</td>
<td style="text-align:left;"><?php echo $data['function_booking'] ['pax']; ?></td>
</tr>
<?php }?>
</table>
<table border="0" style="width:39%; float:right;">
<?php 
        $i=0;
		 foreach($fetch_function_booking as $data){ 
		 $i++;
		 $id=$data['function_booking'] ['id'];
		 ?>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">Res. NO:</td>
<td style="text-align:left;"><?php echo $data['function_booking']['res_no_id']; ?></td>
</tr>
<tr>
<td style="text-align:left;font-weight;">Banquet Date:</td>
<td style="text-align:left;"><?php echo date('d-m-Y', strtotime($data['function_booking']['b_date'])); ?>&nbsp;&nbsp;<?php echo $data['function_booking'] ['b_time'] ?></td>
</tr>

<tr>
<td style="text-align:left;font-weight;">Outlet:</td>
<td style="text-align:left;"><?php
        echo @$master_outlet_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_outlet_fetch',$data['function_booking']['outlet_venue_id']), array()); ?></td>
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
        
		$sub1=0;
		$adv=0;
		$sub2=0;
        $i=0;
		 foreach($fetch_function_booking as $data){ 
		 $i++;
	     $id=$data['function_booking'] ['id'];
		 $tot_amt=$data['function_booking']['tot_amt'];
		 $advance=$data['function_booking']['advance'];
		 ?>
<tr>
<td style="text-align:left; padding-left:5px; width:5%;"><?php echo $i;?></td>
<td style="text-align:left; padding-left:5px; width:50%;">Outlet:&nbsp;<?php
echo @$master_outlet_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_outlet_fetch',$data['function_booking']['outlet_venue_id']), array()); ?>&nbsp;Rate&nbsp;:&nbsp;<B><?php echo $data['function_booking']['rate'];?></B></td>
<td style="text-align:right;padding-right: 5px; width:15%;"><?php echo $data['function_booking']['gross'];?></td>
<td style="text-align:right;padding-right: 5px; width:15%;"><?php echo @$data['function_booking']['totaltax'];?></td>
<td style="text-align:right;padding-right: 10px; width:15%;"><?php echo $data['function_booking']['tot_amt'];?></td>
</tr>
<?php 
$sub1=$sub1+$data['function_booking']['tot_amt'];
$adv=$adv+$data['function_booking']['advance'];
$adv=$adv+$data['function_booking']['due_amount'];
$adv=$adv+$data['function_booking']['advance'];
$sub2=$sub1-$adv;
 }?>
<td colspan="4">
<table border="0" style="width:45%; margin-top:2px;" align="right">
<tr>
<td style="text-align:right; padding-right:2%;">Sub Total:</td>
</tr>
<tr>
<td style="text-align:right; padding-right:2%;">Advance:</td>
</tr>
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
</tr></table>
</td>

<?php 
       $xyz=0;
        $i=0;
		 foreach($fetch_function_booking as $data){ 
		 $i++;
		 $id=$data['function_booking'] ['id'];
		 $res_no_idd=$data['function_booking'] ['res_no_id'];
		 $tot_amt=$data['function_booking'] ['tot_amt'];
         
?>

<td valign="top"><table border="0" style="width:100%;">
<tr>
<td style="text-align:right; padding-right:8%;"><?php echo number_format("$sub1", 2) ?></td>
</tr>
<tr>
<td style="text-align:right; padding-right:8%;border-bottom:solid;"><?php echo number_format("$adv", 2) ?></td>
</tr>
<tr>
<td style="text-align:right; padding-right:8%;"><?php echo number_format("$sub2", 2) ?></td>
</tr>

<tr>
<td style="text-align:right; padding-right:8%;"><?php echo number_format("$sub2", 2) ?></td>
</tr>

<tr>
<td style="text-align:right; padding-right:8%;"><?php echo number_format("$sub2", 2) ?></td>
</tr>
<?php
$f_no=$data['function_booking']['function_no'];
$fetch_fun_data_for_receipt=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_fun_data_for_receipt', $data['function_booking']['id'], $data['function_booking']['function_no']), array());




?>
<?php 
       $xyz=0;
	   $sub3=0;
        $i=0;
		$j=0;
		 foreach($fetch_fun_data_for_receipt as $data1){ 
		 $i++;
		 $id_receipt=$data1['receipt_checkout'] ['id'];
         
         $res_no_id=$data1['receipt_checkout'] ['res_no_id'];
         $cash= $data1['receipt_checkout']['cash'];
         $credit_card_amt=$data1['receipt_checkout']['credit_card_amt'];
         $cheque_amt=$data1['receipt_checkout']['cheque_amt'];
         $neft_amt=$data1['receipt_checkout']['neft_amt'];
		 $fun_bill_no_id=$data1['receipt_checkout']['fun_bill_no_id'];
		 if($id==$fun_bill_no_id)
{
$xyz+=$cash+$cheque_amt+$neft_amt+$credit_card_amt+$j;
}
		 
?>



<?php 
$sub3=$sub2-$xyz;
}?>

<tr>
<td style="text-align:right; padding-right:8%;border-bottom:solid;"><?php echo number_format ("$xyz", 2) ?></td>
</tr>

<tr>
<td style="text-align:right; padding-right:8%;"><?php echo number_format ("$sub3", 2) ?></td>
</tr>
<tr>
<td style="text-align:right; padding-right:8%;"><?php echo round("$sub3"); ?></td>
<tr>
<td style="text-align:right; padding-right:8%;"><?php echo number_format ("$sub3", 2) ?></td>
</tr>
</tr>
</table>
</td>
<?php }?>
</tr>
</table>
</td></tr>
</table>
<div align="center" style="background-color:#06F; color:#FFF;border: solid 1px black;">"Thanks for giving us this opportunity for making your life happy".</div>

<!---------------------------------------------------->
</div><div style="overflow:auto;border:solid 1px;padding:5px;border-top: none;">
<div style="width:70%;float:left;font-size: 11px;line-height: 15px;">
<span>Remarks:</span><br/><span>1.  Thank You</span><br/><br/>I Agree that 
I am liable for the above payment and if the</br> person,
company or association indicate by me as being</br> responsible for 
the same, he does not so, liabillty for such</br> payment shall be
joint and several with such person company</br> or association. </br>
</br></br><span><center>Guest Signature</center></span></br></div>
<div style="width:30%;float:right;" align="center">  <b>Dreamshapers
</b> <br/><br/><br/><br/><br/><br/><br/><br/><div align="center">
<span style="border-top: solid 1px #424141;">Receptionist</span></div></div></div>
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
</div>
</div>
</div>


