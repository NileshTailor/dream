		
<title> Bill </title>
<?php
foreach($fetch_data as $key=>$ftc_data)
	{
		$foo_discount=$ftc_data['pos_kot']['foo_discount'];
	}
?>
<div style="width:70mm; border: solid 1px; height:auto !important; font-family:Century Gothic;">
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
     <table border="0"  style="border-bottom:dotted; 1px solid #000;"  width="100%">
     <tr>
      <td width="25%" ><strong>Bill No.</strong></td>
      <td width="20%" align="center" ><strong>Date & Time</strong></td>
       <td width="20%"><strong>Room No.</strong></td>
      </tr>
      <tr style="border-top:1px solid #000;">
      <td width="25%" ><?php echo $ftc_data['pos_kot']['id'];?></td>
      <td  width="20%"><?php echo date("d-m-Y"); ?>&nbsp;<?php echo date("h:i:sa"); ?></td>
      <td width="20%" align="right" style="padding-right:15px" ><?php echo $ftc_data['pos_kot']['master_roomnos_id'];?></td>
     <tr>
     <td colspan="2" width="35%"><strong>Guest Name :</strong> <?php echo ucwords($ftc_data['pos_kot']['guest_name']);?> </td>
     <td width="70%"><strong>PAX:</strong> <?php echo $ftc_data['pos_kot']['covers'];?></td>
     </tr>
    </table>
    <table border="0" width="100%" style="border-bottom:dotted; 1px">
    <tr>
     <td width="35%"><strong>Item</strong></td>
     <td width="10%"><strong>Quantity</strong></td>
     <td  width="15%"><strong>Rate</strong></td>
     <td  width="20%"><strong>Gross</strong></td>
     </tr>
     <?php
     $total_tax='';
	 $total_amt='';
	 $tot='';
     	foreach($fetch_data_item as $ftc_data_item)
					{	
						foreach($ftc_data_item as $display_data)
						{
							?>
        <tr height="">
        <td><?php echo ucwords($item_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_item_fetch',$display_data['master_items_id']), array()));?>
        </td>
        <td align="center"><?php echo $display_data['quantity'];?></td>
        <td align="center"><?php echo $display_data['rate']; ?> </td>
        <td align="center"><?php echo $display_data['gross'];?> </td>
        </tr>
        <?php
			$total_amt+=$display_data['gross'];
            $total_tax+=$display_data['taxes'];
				}
				$tot=number_format(($total_amt+$total_tax)-($foo_discount),2);
			}     
     ?>
     
       </table>
    <table border="0" height="30px"  width="100%">
    <tr>
     <td></td><td  align="left"><strong>Total</strong> </td><td>:</td><td align=""><strong><?php echo $total_amt;?> </strong></td>
     </tr>
<tr>     <td></td><td align="left">Round off </td><td>:</td><td align=""><strong><?php echo round($total_amt);?> </strong></td>
     </tr>
     <tr>
    <td></td> <td  align="left"> Tax  Amount</td><td>:</td><td align=""><strong><?php echo $total_tax;?> </strong></td>
     </tr>
      <tr>
     <td></td><td  align="left">Discount </td><td>:</td><td align=""><?php echo $foo_discount; ?></td>
     </tr>
     <tr>
    <td width="30%"></td> <td  align="left"><strong>Net Amount</strong> </td><td>:</td><td align=""><strong><?php echo round($tot);?> </strong></td>
     </tr>
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
    <td>:</td>
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
    <td width="30%"></td> <td  align="left">Service Tax No</td><td>:</td><td align=""><?php echo $data['address']['service_tax_no']; ?></strong></td>
    <?php }?>
     </tr>
     
     </table>
     
     
</div>

<script>
//window.print(); 
//window.close(); 

</script>

