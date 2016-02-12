<style type="text/css">
  table, tr.noBorder td {border:#10A062}
</style>

<title>Billibg Report</title>
<div class="portlet light">
<div class="portlet-title" align="center">
<tr style="background-color:#FFF"><td colspan="5" align="center"><p><div><b><font size="+2" style="font-family:Georgia, 'Times New Roman', Times, serif">Combine POS Kot Summary </font></b></div></p></td></tr>
</div>

<tr style="background-color:#FFF" class="noBorder"><td colspan="5"><p><div><b><font style="font-family:Georgia, 'Times New Roman', Times, serif">Billing Kot</font></b></div></p></td></tr>
<div><table width="100%" height="10%" border="1" style="border-collapse:collapse; margin-top:0%" bordercolor="#10A062" cellpadding="5">

<thead>
<tr style="background-color:#DFF0D8;">
        <th style="text-align:center">S.No.</th>
        <th style="text-align:center"> Bill No.</th>
        <th style="text-align:center"> Name</th>
        <th style="text-align:center"> Room/Card No.</th>
        <th style="text-align:center"> Gross</th>
        <th style="text-align:center"> Tax</th>
        <th style="text-align:center"> Amount</th>
        <th style="text-align:center"> Tips</th>
        <th style="text-align:center"> S/Charge</th>
        <th style="text-align:center"> Discount</th>
        <th style="text-align:center"> Total</th>
        <th style="text-align:center"> Paid</th>
        <th style="text-align:center"> Due</th>
        </tr>
     </thead>
     <tbody>
     
        <?php 
        $maxtotal=0;
        $maxgross=0;
        $maxnet=0;
        $maxtax=0;
        $maxbill=0;
		
		$maxtips=0;
		$max_service_charge=0;
		$max_discount=0;
		$maxtot=0;
		$maxset=0;
		$maxdue=0;
		
		$settle_amount=0;
		$settle_due=0;
        
        $i=0;
		 foreach($fetch_pos_kot as $data){ 
		 $i++;
		 $id=$data['pos_kot'] ['id'];
		 $discount=$data['pos_kot'] ['settle_discount'];
		 $tips=$data['pos_kot'] ['tips'];
		 $service_charge=$data['pos_kot'] ['service_charge'];
		 $bill_settle_amount=$data['pos_kot'] ['bill_settle_amount'];
		 $bill_settle_due=$data['pos_kot'] ['bill_settle_due'];
		 //$settle_amount=$settle_amount+$bill_settle_amount;
		 //$settle_due=$settle_due+$bill_settle_due;
		 ?>
        <?php $fatch_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fatch_pos_kot_item',$data['pos_kot']['id']), array());
        $grandtotal=0;
        $grandtax=0;
        $grandamount=0;
		$grandamount1=0;
        $grandtax1=0;
		$discountt=0;
		$service_chargee=0;
		$tipss=0;
		
		//$i=0;
		$j=0;
		 foreach($fatch_pos_kot_item as $data1){ 
		 //$i++;
		 $id=$data1['pos_kot_item'] ['id'] ;
		 $gross=$data1['pos_kot_item'] ['gross'];
		 $gross=$data1['pos_kot_item'] ['taxes'];
		 ?>
       
        <?php 
		
        $tipss=$tipss+$tips;
		$discountt=$discountt+$discount;
		$service_chargee=$service_chargee+$service_charge;
		$grandtotal=$grandtotal+$data1['pos_kot_item']['gross'];
		$grandtax=$grandtax+$data1['pos_kot_item']['taxes'];
        $grandamount=$grandtotal+$grandtax+$tipss+$service_chargee-$discountt;
		$grandamount1=$grandtotal+$grandtax;
		} ?>
        
       <div><tr>
       <td align="center"><?php echo $i; ?></td>
       <td align="center"><?php echo $data['pos_kot'] ['bill_settle_no'] ?></td>
       <td align="center"><?php echo $data['pos_kot'] ['guest_name'] ?></td>
       <td align="center"><?php echo $data['pos_kot'] ['master_roomnos_id'] ?></td>
       <td align="center"><?php echo $grandtotal; ?></td>
       <td align="center"><?php echo $grandtax; ?></td>
        <td align="center"><?php echo $grandamount1;?></td>
       <td align="center"><?php echo $tipss?></td>
       <td align="center"><?php echo $service_chargee; ?></td>
       <td align="center"><?php echo $discountt?></td>
       <td align="center"><?php echo $grandamount;?></td>
       <td align="center"><?php echo $data['pos_kot'] ['bill_settle_amount'] ?></td>
       <td align="center"><?php echo $data['pos_kot'] ['bill_settle_due'] ?></td>
       
       
         
         
        <?php $maxtotal=$maxtotal+$grandtotal;
        $maxgross=$maxgross+$grandtotal;
        $maxnet=$maxnet+$grandtotal;
        $maxtax=$maxtax+$grandtax;
        $maxbill=$maxbill+$grandamount1;
		$maxtips=$maxtips+$tipss;
		$max_service_charge=$max_service_charge+$service_chargee;
		$max_discount=$max_discount+$discountt;
		$maxtot=$maxtot+$grandamount;
		$maxset=$maxset+$bill_settle_amount;
		$maxdue=$maxdue+$bill_settle_due;} 	?> 
        
        <tr><td align="center"><label><b>Total:</label></td><td></td><td></td><td></td>
        <td align="center"><b><?php echo number_format ("$maxtotal",2) ?></b></td>
        <td align="center"><b><?php echo number_format ("$maxtax",2) ?></b></td>
        <td align="center"><b><?php echo number_format ("$maxbill",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxtips",2) ?></td>
        <td align="center"><b><?php echo number_format ("$max_service_charge",2) ?></td>
        <td align="center"><b><?php echo number_format ("$max_discount",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxtot",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxset",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxdue",2) ?></td>
 </tr>
  <tr style="background-color:#FFF" class="noBorder"><td colspan="5"><p><div><b><font style="font-family:Georgia, 'Times New Roman', Times, serif">NC KOT</font></b></div></p></td></tr>

<thead>
<tr style="background-color:#DFF0D8;">
        <th style="text-align:center">S.No.</th>
        <th style="text-align:center"> Bill No.</th>
        <th style="text-align:center"> Name</th>
        <th style="text-align:center"> Room/Card No.</th>
        <th style="text-align:center"> Gross</th>
        <th style="text-align:center"> Tax</th>
        <th style="text-align:center"> Amount</th>
        <th style="text-align:center"> Tips</th>
        <th style="text-align:center"> S/Charge</th>
        <th style="text-align:center"> Discount</th>
        <th style="text-align:center"> Total</th>
        <th style="text-align:center"> Paid</th>
        <th style="text-align:center"> Due</th>
        </tr>
     </thead>
 
<?php 
        $maxtotal=0;
        $maxgross=0;
        $maxnet=0;
        $maxtax=0;
        $maxbill=0;
		
		$maxtips=0;
		$max_service_charge=0;
		$max_discount=0;
		$maxtot=0;
		$maxset1=0;
		$maxdue1=0;
		
		$settle_amount=0;
		$settle_due=0;
        
        $i=0;
		 foreach($fetch_pos_kot1 as $data){ 
		 $i++;
		 $id=$data['pos_kot'] ['id'];
		 $discount=$data['pos_kot'] ['settle_discount'];
		 $tips=$data['pos_kot'] ['tips'];
		 $service_charge=$data['pos_kot'] ['service_charge'];
		 $bill_settle_amount=$data['pos_kot'] ['bill_settle_amount'];
		 $bill_settle_due=$data['pos_kot'] ['bill_settle_due'];
		 //$settle_amount=$settle_amount+$bill_settle_amount;
		 //$settle_due=$settle_due+$bill_settle_due;
		 ?>
        <?php $fatch_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fatch_pos_kot_item',$data['pos_kot']['id']), array());
        $grandtotal=0;
        $grandtax=0;
        $grandamount=0;
		$grandamount1=0;
        $grandtax1=0;
		$discountt=0;
		$service_chargee=0;
		$tipss=0;
		
		//$i=0;
		 foreach($fatch_pos_kot_item as $data1){ 
		 //$i++;
		 $id=$data1['pos_kot_item'] ['id'] ;
		 $gross=$data1['pos_kot_item'] ['gross'];
		 $gross=$data1['pos_kot_item'] ['taxes'];
		 ?>
       
        <?php 
        $tipss=$tipss+$tips;
		$discountt=$discountt+$discount;
		$service_chargee=$service_chargee+$service_charge;
		$grandtotal=$grandtotal+$data1['pos_kot_item']['gross'];
		$grandtax=$grandtax+$data1['pos_kot_item']['taxes'];
        $grandamount=$grandtotal+$grandtax+$tipss+$service_chargee-$discountt;
		$grandamount1=$grandtotal+$grandtax;
		} ?>
        
       <div><tr>
       <td align="center"><?php echo $i;?></td>
       <td align="center"><?php echo $data['pos_kot'] ['bill_settle_no'] ?></td>
       <td align="center"><?php echo $data['pos_kot'] ['guest_name'] ?></td>
       <td align="center"><?php echo $data['pos_kot'] ['master_roomnos_id'] ?></td>
       <td align="center"><?php echo $grandtotal; ?></td>
       <td align="center"><?php echo $grandtax; ?></td>
        <td align="center"><?php echo $grandamount1;?></td>
       <td align="center"><?php echo $tipss?></td>
       <td align="center"><?php echo $service_chargee; ?></td>
       <td align="center"><?php echo $discountt?></td>
       <td align="center"><?php echo $grandamount;?></td>
       <td align="center"><?php echo $data['pos_kot'] ['bill_settle_amount'] ?></td>
       <td align="center"><?php echo $data['pos_kot'] ['bill_settle_due'] ?></td>
       
       
         
         
        <?php $maxtotal=$maxtotal+$grandtotal;
        $maxgross=$maxgross+$grandtotal;
        $maxnet=$maxnet+$grandtotal;
        $maxtax=$maxtax+$grandtax;
        $maxbill=$maxbill+$grandamount1;
		$maxtips=$maxtips+$tipss;
		$max_service_charge=$max_service_charge+$service_chargee;
		$max_discount=$max_discount+$discountt;
		$maxtot=$maxtot+$grandamount;
		$maxset1=$maxset1+$bill_settle_amount;
		$maxdue1=$maxdue1+$bill_settle_due;} 	?> 
        
        <tr><td align="center"><label><b>Total:</label></td><td></td><td></td><td></td>
        <td align="center"><b><?php echo number_format ("$maxtotal",2) ?></b></td>
        <td align="center"><b><?php echo number_format ("$maxtax",2) ?></b></td>
        <td align="center"><b><?php echo number_format ("$maxbill",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxtips",2) ?></td>
        <td align="center"><b><?php echo number_format ("$max_service_charge",2) ?></td>
        <td align="center"><b><?php echo number_format ("$max_discount",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxtot",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxset1",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxdue1",2) ?></td>
 </tr>
  <tr style="background-color:#FFF" class="noBorder"><td colspan="5"><p><div><b><font style="font-family:Georgia, 'Times New Roman', Times, serif">GYM, POOL & SPA</font></b></div></p></td></tr>

<thead>
<tr style="background-color:#DFF0D8;">
        <th style="text-align:center">S.No.</th>
        <th style="text-align:center"> Bill No.</th>
        <th style="text-align:center"> Name</th>
        <th style="text-align:center"> Room/Card No.</th>
        <th style="text-align:center"> Gross</th>
        <th style="text-align:center"> Tax</th>
        <th style="text-align:center"> Amount</th>
        <th style="text-align:center"> Tips</th>
        <th style="text-align:center"> S/Charge</th>
        <th style="text-align:center"> Discount</th>
        <th style="text-align:center"> Total</th>
        <th style="text-align:center"> Paid</th>
        <th style="text-align:center"> Due</th>
        </tr>
     </thead>

  <?php 
        $maxtotal=0;
        $maxgross=0;
        $maxnet=0;
        $maxtax=0;
        $maxbill=0;
		
		$maxtips=0;
		$max_service_charge=0;
		$max_discount=0;
		$maxtot=0;
		$maxset2=0;
		$maxdue2=0;
		
		$settle_amount=0;
		$settle_due=0;
        
        $i=0;
		 foreach($fetch_pos_kot2 as $data){ 
		 $i++;
		 $id=$data['pos_kot'] ['id'];
		 $discount=$data['pos_kot'] ['foo_discount'];
		 $tips=$data['pos_kot'] ['tips'];
		 $service_charge=$data['pos_kot'] ['service_charge'];
		 $bill_settle_amount=$data['pos_kot'] ['bill_settle_amount'];
		 $bill_settle_due=$data['pos_kot'] ['bill_settle_due'];
		 ?>
        <?php $fatch_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fatch_pos_kot_item',$data['pos_kot']['id']), array());
        $grandtotal=0;
        $grandtax=0;
        $grandamount=0;
		$grandamount1=0;
        $grandtax1=0;
		$discountt=0;
		$service_chargee=0;
		$tipss=0;
		
		//$i=0;
		 foreach($fatch_pos_kot_item as $data1){ 
		 //$i++;
		 $id=$data1['pos_kot_item'] ['id'] ;
		 $gross=$data1['pos_kot_item'] ['gross'];
		 $gross=$data1['pos_kot_item'] ['taxes'];
		 ?>
       
        <?php 
        $tipss=$tipss+$tips;
		$discountt=$discountt+$discount;
		$service_chargee=$service_chargee+$service_charge;
		$grandtotal=$grandtotal+$data1['pos_kot_item']['gross'];
		$grandtax=$grandtax+$data1['pos_kot_item']['taxes'];
        $grandamount=$grandtotal+$grandtax+$tipss+$service_chargee-$discountt;
		$grandamount1=$grandtotal+$grandtax;
		} ?>
        
       <div><tr>
       <td align="center"><?php echo $i;?></td>
       <td align="center"><?php echo $data['pos_kot'] ['id'] ?></td>
       <td align="center"><?php echo $data['pos_kot'] ['guest_name'] ?></td>
       <td align="center"><?php echo $data['pos_kot'] ['master_roomnos_id'] ?></td>
       <td align="center"><?php echo $grandtotal; ?></td>
       <td align="center"><?php echo $grandtax; ?></td>
        <td align="center"><?php echo $grandamount1;?></td>
       <td align="center"><?php echo $tipss?></td>
       <td align="center"><?php echo $service_chargee; ?></td>
       <td align="center"><?php echo $discountt?></td>
       <td align="center"><?php echo $grandamount;?></td>
       <td align="center"><?php echo $data['pos_kot'] ['bill_settle_amount'] ?></td>
       <td align="center"><?php echo $data['pos_kot'] ['bill_settle_due'] ?></td>
       
       
         
         
        <?php $maxtotal=$maxtotal+$grandtotal;
        $maxgross=$maxgross+$grandtotal;
        $maxnet=$maxnet+$grandtotal;
        $maxtax=$maxtax+$grandtax;
        $maxbill=$maxbill+$grandamount1;
		$maxtips=$maxtips+$tipss;
		$max_service_charge=$max_service_charge+$service_chargee;
		$max_discount=$max_discount+$discountt;
		$maxtot=$maxtot+$grandamount;
		$maxset2=$maxset2+$bill_settle_amount;
		$maxdue2=$maxdue2+$bill_settle_due;} 	?> 
        
        <tr><td align="center"><label><b>Total:</label></td><td></td><td></td><td></td>
        <td align="center"><b><?php echo number_format ("$maxtotal",2) ?></b></td>
        <td align="center"><b><?php echo number_format ("$maxtax",2) ?></b></td>
        <td align="center"><b><?php echo number_format ("$maxbill",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxtips",2) ?></td>
        <td align="center"><b><?php echo number_format ("$max_service_charge",2) ?></td>
        <td align="center"><b><?php echo number_format ("$max_discount",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxtot",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxset2",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxdue2",2) ?></td>
 </tr>
          </tbody>
          </table>
           <table width="100%" border="1" style="padding-top:25px">
                     <tr>
          <td align="right" style="padding-right:5px" colspan="10" width="89%"><label><b>Net:</label></td>
        
        <td align="center"><b><?php echo $tot1=$maxset+$maxset1+$maxset2;?></b></td>
        <td align="center"><b><?php echo $tot2=$maxdue+$maxdue1+$maxdue2;?></b></td>
 </tr></table></div>
            </div>
            
         </div>