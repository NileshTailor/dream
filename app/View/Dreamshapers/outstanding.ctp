<style type="text/css">
  table, tr.noBorder td {border:#000}
</style>


<div>
        <?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>
        <div align="center"><img src="<?php echo $this->webroot; ?>expenset/logo.png" width="150px"/></div>
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

<div style="border:solid 0px; overflow:auto; border-top:none; border-bottom:none;padding:5px;">
<div>
<table border="0" style="width:100%; float:left;">


<tr>
<td style="padding-bottom:10px; text-align:left;font-weight;" colspan="2">To,</td>
</tr>
<tr>
<td style="padding-bottom:2px; text-align:left;font-weight;">The Account Manager</td>


<td style="text-align:right;font-weight;"><?php echo date("d/m/Y"); ?>
</td>
</tr>
<tr>

<?php 
       
        $i=0;
		$xyz=0;
		$cool=0;
		$zero=0;
		 foreach($fetch_bill as $data){ 
		 $i++;
		 $id=$data['bill'] ['id'];
         $company_id=$data['bill']['company_id'];
		 $total=$data['bill']['total'];
		
		 $cash=$data['bill']['cash'];
		 $neft_amt=$data['bill']['neft_amt'];
		 $cheque_amt=$data['bill']['cheque_amt'];
		 $credit_card_amt=$data['bill']['credit_card_amt'];

		    $xyz=$cash+$neft_amt+$cheque_amt+$credit_card_amt+$zero;
		    $cool=$total-$xyz;
			
			
			
		 /*if($cool>0 && $company_id==$company_id)
		 {
			 $company_id='';
		 }*/
		 
		 
		 ?>


        
        
        <?php }?>
        <td style="padding-bottom:50px; text-align:left;font-weight;" colspan="2"><?php
        echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch', $company_id), array()); ?>
        </td>
        
</tr>

<tr>
<td style="padding-bottom:10px; text-align:left;font-weight;">Kind Attn:</td>
<td style="text-align:left;"></td>
</tr>
<tr>
<td style="padding-bottom:10px; text-align:left;font-weight;">Ref. No:</td>
<td style="text-align:left;"></td>
</tr>
<tr>
<td style="padding-bottom:10px; text-align:left;font-weight;">Dear Sir / Madam</td>
<td style="text-align:left;"></td>
</tr>
<tr>
<?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>
        
<td style="padding-bottom:10px; text-align:left;font-weight;">
        Greeting from <?php echo $data['address']['name']; ?></td>
<td style="text-align:left;"></td>
<?php }?>
</tr>
<tr>
<td style="text-align:left;font-weight;">On Scrutiny of your account oin our books, we found that payment of the following bills are pending.</td>
<td style="text-align:left;"></td>
</tr>
</table>
</div>
</div>



<div style="overflow:auto;">
<table border="0" style="width:100%; margine-left:2px; border-collapse:collapse;" cellspacing="0" cellpadding="5">
<tr class="noBorder" style="background-color:#00C; border-bottom:solid 1px; border-top:solid 1px">
<th style="width:5%; text-align:left;color: #fff;background-color:#36F; padding-left:5px;">S. No.</th>

<th style="width:10%; text-align:left;color: #fff;background-color:#36F; padding-left:5px;">Bill No.</th>
<th style="width:10%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Date</th>
<th style="width:10%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Amount</th>
<th style="width:10%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Below 30</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">31 to 60 Days</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">61 to 90 Days</th>
<th style="width:15%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Over 90 days</th>
<th style="width:10%; text-align:right;color: #fff;background-color:#36F; padding-right:5px;">Total</th>
</tr>

<?php 
        $totalll=0;
        $i=0;
		$xyz=0;
		$zero=0;
		$cool=0;
		 foreach($fetch_bill as $data){ 
		 
	     $id=$data['bill'] ['id'];
		 $company_id=$data['bill']['company_id'];
		 $date=$data['bill']['date'];
		 $guest_name=$data['bill']['guest_name'];
		 $bill_no_id=$data['bill']['bill_no_id'];
		 $card_no=$data['bill']['card_no'];
		  $total=$data['bill']['total'];
		 $cash=$data['bill']['cash'];
		 $neft_amt=$data['bill']['neft_amt'];
		 $cheque_amt=$data['bill']['cheque_amt'];
		 $credit_card_amt=$data['bill']['credit_card_amt'];

		    $xyz=$cash+$neft_amt+$cheque_amt+$credit_card_amt+$zero;
		    $cool=$total-$xyz;
		 
		 if($cool>0)
		 {
			 $i++;
			 $cool;
		 $company_id=$data['bill']['company_id'];
		 $date=$data['bill']['date'];
		 $guest_name=$data['bill']['guest_name'];
		 $bill_no_id=$data['bill']['bill_no_id'];
		 $card_no=$data['bill']['card_no'];

		 }
		 else
		 {
			
		 $cool=''; 
		 $company_id='';
		 $date='';
		 $guest_name='';
		 $bill_no_id='';
		 $card_no='';
		 }
		if($cool>0){ ?>
<tr>
<td style="text-align:left; padding-left:10px; width:5%;"><?php echo $i;?>
<td style="text-align:left; padding-left:10px; width:10%;"><?php echo $bill_no_id;?>
<td style="text-align:right;padding-right: 10px; width:10%;"><?php echo $date;?></td>
<td style="text-align:right;padding-right: 10px; width:10%;"><?php echo @$cool;?></td>
<td style="text-align:right;padding-right: 10px; width:10%;"><?php echo $cool;?></td>
<td style="text-align:right;padding-right: 15px; width:10%;"></td>
<td style="text-align:right;padding-right: 15px; width:10%;"></td>
<td style="text-align:right;padding-right: 15px; width:10%;"></td>
<td style="text-align:right;padding-right: 10px; width:10%;"><?php echo $cool;?></td>
</tr>

<tr>
<td style="text-align:left; padding-left:10px; width:80%;" colspan="9">
<div align="center" style="padding: 0px;font-size: 12px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">"Bill No.:<?php echo $bill_no_id;?>,
Reg. Card No:<?php echo $data['bill']['card_no'];?>,
Guest Name:<?php echo $data['bill']['guest_name'];?>&nbsp;/&nbsp;<?php
echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch', $company_id), array()); ?>&nbsp;
Checkout:<?php echo $date;?>,
</div></td></tr>

<?php 
$totalll=$totalll+$cool; 
		}
 }?>



<td colspan="9">
<table border="0" style="border-bottom:solid 2px; border-top:solid 2px; width:100%; margin-top:2px;" align="right">
	
<tr>
<td style="text-align:left; padding-right:2%;" width="5px">&nbsp;</td>
<td style="text-align:left; padding-right:2%;" width="10px">&nbsp;</td>
<td style="text-align:left; padding-right:2%;" width="10px">&nbsp;</td>
<td style="text-align:left; padding-right:2%;" width="10px"><b>Total:</b></td>
<td width="10px" style="padding-left:40px"><?php echo number_format ("$totalll",2)?></td>
<td style="text-align:left; padding-right:2%;" width="15px">&nbsp;</td>
<td style="text-align:left; padding-right:2%;" width="15px">&nbsp;</td>
<td style="text-align:left; padding-right:2%;" width="15px">&nbsp;</td>
<td style="padding-right:0px" width="10px" align="right"><?php echo number_format ("$totalll",2)?></td>
</table>
</td>
</tr>
<tr><td colspan="9"><table width="100%">
<tr>
<td style="padding-bottom:25px; text-align:left;font-weight;">We have already forwarded the above bill/s. If you require any further clearification please feel free to contact us. We would appreciate if you could clear it at the earliest.</td>
<td style="text-align:left;"></td>
</tr>
<tr>
<td style="padding-bottom:10px; text-align:left;font-weight;">Thanking You</td>
<td style="text-align:left;"></td>
</tr>
<tr>
<td style="padding-bottom:10px; text-align:left;font-weight;">Yours Sincerely</td>
<td style="text-align:left;"></td>
</tr>
<tr>
<?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>

<td style="padding-bottom:20px; text-align:left;font-weight;">For <?php echo $data['address']['name']; ?></td>

<td style="text-align:left;"></td>
<?php }?>
</tr>

<tr>
<td style="padding-bottom:50px; text-align:left;font-weight;"><span style="border-top:solid 2px;">Authorized Signature</span></td>
<td style="text-align:left;"></td>
</tr>

</table></td></tr>


</table>
</td></tr>
</table>

<!---------------------------------------------------->
</div></div></div>