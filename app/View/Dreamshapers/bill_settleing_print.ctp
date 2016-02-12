
<title> Bill </title>
<?php
foreach($fetch_data as $key=>$ftc_data)
	{
		
		$pos_discount=$ftc_data['pos_kot']['pos_discount'];
		$tips=$ftc_data['pos_kot']['tips'];
		$service_charge=$ftc_data['pos_kot']['service_charge'];
		$room_service=$ftc_data['pos_kot']['room_service'];
		
	}
?>
<div style="width:70mm; border: solid 1px; height:auto !important; font-family:Century Gothic;">
  <?php 
if($room_service==1){?>
         
        <?php echo "<b>Room Service</b>" ?>
      <?php } ?>
	    <table border="0"  style="border-bottom:2px solid #000;"  width="100%">
     <tr>
     <td align="center" colspan="4"><strong>Retail Invoice</strong></td>
     </tr>
     <tr>
        <?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>
     
     <td align="center" colspan="4"><strong><span style="padding: 0px; font-size: 20px; font-family:Verdana, Geneva, sans-serif">
     <?php echo $data['address']['name']; ?></span></strong></td>
     <?php }?>
     </tr>
     <tr>
     <td align="center"  colspan="4"><strong><span style="padding: 0px; font-size: 11px; font-family:Verdana, Geneva, sans-serif">
      <?php echo $data['address']['add']; ?></span></strong></td>
     </tr>
     </table>
    
     <table border="0"  style="border-bottom:2px solid #000;"  width="100%">
     <tr>
      <td colspan="2" align="center" width="50%"><strong>Bill No.</strong></td>
      <td colspan="1" style="padding-right:25px"> <strong>Room</strong></td>
      <td align="center"> <strong>Table No.</strong></td>
      </tr>
      <tr >
        <td colspan="2" style="border-bottom:1px solid #000;" align="center"> <?php echo $ftc_data['pos_kot']['id'];?></td>
        <td colspan="1" style="border-bottom:1px solid #000; padding-right:25px" align="center"> <?php echo $ftc_data['pos_kot']['master_roomnos_id'];?> </td>
        <td style="border-bottom:1px solid #000;" align="center">
           <?php echo $master_table_no_fetch=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$ftc_data['pos_kot']['master_tables_id']), array()); ?>
          </td>
      </tr>
      <tr >
      <td  width="15%"><strong>PAX: </strong></td>
      <td> <?php echo $ftc_data['pos_kot']['covers'];?> </td>
      <td><strong>Date</strong></td>
      <td width="25%"><?php echo date("d-m-Y"); ?>&nbsp; <?php echo date("h:i:sa"); ?> </td>
     </tr>
     <tr>
     <td colspan="4" style="border-top:1px solid #000;"><strong>Guest Name : <?php echo ucwords($ftc_data['pos_kot']['guest_name']);?></strong> </td>
     </tr>
    </table>
    <table border="0" width="100%">
    <tr>
     <td width="35%"><strong>Item</strong></td>
     <td width="10%"><strong>Qty</strong></td>
     <td  width="15%"><strong>Rate</strong></td>
     <td  width="20%"><strong>Gross</strong></td>
     </tr>
     <?php
     $total_amt='';
				$total_tax='';
				$total_gross='';
				$amm='';
				$thali=array();
				foreach($fetch_item_all as $item_one)
				{
					$m_i_id=$item_one['pos_kot_item']['master_items_id'];
					foreach($fetch_item_all as $item_one_rpt)
					{
						$m_i_id1=$item_one_rpt['pos_kot_item']['master_items_id'];
						$item_category_id=$item_one_rpt['pos_kot_item']['item_category_id'];
					}
					foreach($item_one as $item_two)
					{
						if(array_key_exists($item_two['master_items_id'],$thali))
						{
							$thali[$item_two['master_items_id']]=array('quantity'=>$item_two['quantity']+$thali[$item_two['master_items_id']]['quantity'],'rate'=>$item_two['rate'],'gross'=>$item_two['gross']+$thali[$item_two['master_items_id']]['gross'],'taxes'=>$item_two['taxes']+$thali[$item_two['master_items_id']]['taxes'],'amount'=>$item_two['amount']+$thali[$item_two['master_items_id']]['amount']);
						}
						else
						{
							$thali[$item_two['master_items_id']]=array('quantity'=>$item_two['quantity'],'rate'=>$item_two['rate'],'gross'=>$item_two['gross'],'taxes'=>$item_two['taxes'],'amount'=>$item_two['amount']);
						}
						
					}
				}
						
					foreach($thali as $key=>$data_act_data)
					{
							?>
                    <tr>
                    <td><?php  echo $table_no=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$key), array());?></td>
                    <td><?php echo $data_act_data['quantity'];?></td>
                    <td><?php echo $data_act_data['rate'];?></td>
                    <td><?php echo $data_act_data['gross'];?></td>	
                    </tr><?php
					$total_amt+=$data_act_data['amount'];
					$total_gross+=$data_act_data['gross'];
					$total_tax+=$data_act_data['taxes'];
					
					$amm=$total_gross+$total_tax+$service_charge+$tips-$pos_discount;
					}
				?>
     
       </table>
    <table border="0" style="border-top:2px solid #000;" height="30px"  width="100%">
    <tr>
     <td></td><td  align="left"><strong>Gross</strong> </td><td>:</td><td></td><td align=""><strong><?php echo number_format($total_gross,2);?> </strong></td>
     </tr>
     <tr>
    <td></td> <td  align="left"> Tax Amount</td><td>:</td><td></td><td align=""><?php echo number_format($total_tax,2);?></td>
     </tr>
     <tr>
     <td></td><td  align="left">Service Charge</td><td>:</td><td></td><td align=""><?php echo number_format($service_charge,2);?></td>
     </tr>
     <tr>
     <td></td><td  align="left">Tips</td><td>:</td><td></td><td align=""><?php echo number_format($tips,2);?></td>
     </tr>
     <tr>
     <td></td><td  align="left">Discount </td><td >:</td><td></td><td align="" style="border-bottom:solid 1px"><?php echo number_format($pos_discount,2);?></td>
     </tr>
      <tr>
     <td></td><td  align="left">Total Amount</td><td>:</td><td></td><td align=""><strong><?php echo number_format($amm,2);?> </strong></td>
     </tr>
     
     <tr>
     <td></td><td align="left">Round off </td><td>:</td><td></td><td align=""><strong><?php echo round($amm);?> </strong></td>
     </tr>
     
     <tr>
    <td width="30%"></td> <td  align="left"><strong>Grand Total</strong> </td><td>:</td><td></td><td align=""><strong><?php echo round($amm);?> </strong></td>
     </tr>
     
     <!--<tr>
     <td></td><td  align="left">VAT</td><td>:</td><td></td><td align=""></td>
     </tr>-->
     <tr>
      <tr>
        <?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>
    <td width="30%"></td> 
    <td  align="left">TIN NO</td>
    <td>:</td><td></td>
    <td align=""><?php echo $data['address']['tin_no']; ?></strong></td>
    <?php }?>
     </tr>
      <tr>
       <?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>
    <td width="30%"></td> <td  align="left">Service Tax No</td><td>:</td><td></td><td align=""><?php echo $data['address']['service_tax_no']; ?></strong></td>
    <?php }?>
     </tr>
     
     </table>
     
     
</div>

<script>
//window.print(); 
//window.close(); 

</script>

