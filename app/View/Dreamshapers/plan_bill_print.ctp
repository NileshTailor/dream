<title> Bill </title>
<?php
foreach($fetch_data as $key=>$ftc_data)
	{
		
		
		$plan_itm=$ftc_data['pos_kot']['plan_item'];
		
		$p_itm=explode(',', $plan_itm);
									
		
	}
?>
<div style="width:70mm; border: solid 1px; height:auto !important; font-family:Century Gothic;">
	<table border="0"  style="border-bottom:2px solid #000;"  width="100%">
     <tr>
     <td align="center" colspan="4"><strong>For Kitchen</strong></td>
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
      <td align="center" width="30%"><strong>Bill No.</strong></td>
      <td colspan="2" align="center"> <strong>Room No.</strong></td>
      <td align="center"> <strong>Table No.</strong></td>
      </tr>
      <tr>
        <td style="border-bottom:1px solid #000;" align="center"> <?php echo $ftc_data['pos_kot']['id'];?></td>
        <td colspan="2"  style="border-bottom:1px solid #000;" align="center"><?php echo $ftc_data['pos_kot']['master_roomnos_id'];?> </td>
         <td style="border-bottom:1px solid #000;" align="center">
           <?php echo $master_table_no_fetch=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$ftc_data['pos_kot']['master_tables_id']), array()); ?>

          </td>
      
      
    
     
      <tr >
      <td  width="15%"><strong>PAX </strong></td>
      <td> <?php echo $ftc_data['pos_kot']['covers'];?> </td>
      <td><strong>Date</strong></td>
      <td width="25%"><?php echo date("d-m-Y"); ?>
      <?php echo date("h:i:s"); ?> </td>
     </tr>
     <tr>
     <td colspan="4" style="border-top:1px solid #000;"><strong>Guest Name : <?php echo ucwords($ftc_data['pos_kot']['guest_name']);?></strong> </td>
     </tr>
     <tr>
     <td colspan="4" style="border-top:1px solid #000;"><strong>Session : 
	 <?php echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'plan_item_category_fatch',$ftc_data['pos_kot']['session']), array());;?></strong> </td>
     </tr>
    </table>
    <table border="0" width="100%">
    <tr>
     <td width="35%"><strong>Item</strong></td>
     </tr>
     
        
        <?php
		//$plan_itm=$ftc_data['pos_kot']['plan_item'];
		$p_itm=explode(',', $plan_itm);
foreach($p_itm as $ftcc)
	{
		?>
		<tr height="">
        <td><?php
       echo $master_itemtype_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$ftcc), array());?>
        </td></tr>		
	<?php }
?>
        
        
        
        
        
        </tr>
       </table>
    <!--<table border="0" style="border-top:2px solid #000;" height="30px"  width="100%">
    <tr>
     <td></td><td  align="left"><strong>Total</strong> </td><td>:</td><td align=""><strong><?php echo $total_amt;?> </strong></td>
     </tr>
     <tr>
     <td></td><td  align="left">Discount </td><td>:</td><td align="">0</td>
     </tr>
     <tr>
     <td></td><td  align="left">VAT</td><td>:</td><td align=""></td>
     </tr><tr>
     <td></td><td align="left">Round off </td><td>:</td><td align=""><strong><?php echo round($total_amt);?> </strong></td>
     </tr>
     <tr>
    <td></td> <td  align="left"> Tax  Amount</td><td>:</td><td align=""><strong><?php echo $total_tax;?> </strong></td>
     </tr>
     <tr>
    <td width="30%"></td> <td  align="left"><strong>Net Amount</strong> </td><td>:</td><td align=""><strong><?php echo round($total_amt+$total_tax);?> </strong></td>
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
     
     </table>-->
     
     
</div>

<script>
//window.print(); 
//window.close(); 

</script>

