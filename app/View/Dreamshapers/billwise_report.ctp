<title>Billibg Report</title>
<div class="portlet light">
<div class="portlet-title" align="center">
<tr style="background-color:#FFF"><td colspan="5" align="center"><p><div><b><font size="+2">Bill Wise Report</font></b></div></p></td></tr>
</div>
<div><table width="100%" height="10%" border="1" style="border-collapse:collapse; margin-top:0%" bordercolor="#10A062" cellpadding="5">
<thead>

<tr style="background-color:#DFF0D8;">
<th style="text-align:center"> Bill No.</th>
<?php
foreach($fetch_master_item_category as $data)
{
	$category=$data['master_item_category']['item_category'];
	
	
	?>
    
    <th style="text-align:center"><?php echo $category;?></th>
    
    <?php }?>

<th style="text-align:center"> Gross</th>
        <th style="text-align:center"> Discount</th>
        <th style="text-align:center"> Net Total</th>
        <th style="text-align:center"> Tax</th>
        <th style="text-align:center"> Service Tax</th>
        <th style="text-align:center"> Tips</th>
        <th style="text-align:center"> Bill Amount</th>
        <th style="text-align:center"> Payment Mode</th>
        <th style="text-align:center"> Table No.</th>
        <th style="text-align:center"> Cash Amount</th>
        </tr>
     </thead>

     <tbody>
     
        <?php 
        $maxtotal=0;
        $maxgross=0;
        $maxnet=0;
        $maxtax=0;
        $maxbill=0;
        
        $i=0;
		 foreach($fetch_pos_kot as $data){ 
		 $i++;
		 $id=$data['pos_kot'] ['id'];
		 
		 ?>
       <td align="center"><label><b>Date:</b></label></td><td align="center"><b><?php echo $data['pos_kot'] ['current_date'] ?></b></td>
        
        <?php $fatch_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fatch_pos_kot_item',$data['pos_kot']['id']), array());
        $grandtotal=0;
        $grandtax=0;
        $grandamount=0;
        $grandtax1=0;
		$i=0;
		 foreach($fatch_pos_kot_item as $data1){ 
		 $i++;
		 $id=$data1['pos_kot_item'] ['id'] ;
		 $gross=$data1['pos_kot_item'] ['gross'];
		 $gross=$data1['pos_kot_item'] ['taxes'];
		 ?>
       
        <?php 
        
		$grandtotal=$grandtotal+$data1['pos_kot_item']['gross'];
		$grandtax=$grandtax+$data1['pos_kot_item']['taxes'];
        $grandamount=$grandtotal+$grandtax;
		} ?>
        
       <div><tr > <td align="center"><?php echo $data['pos_kot'] ['id'] ?></td><td align="center"><?php echo $grandtotal; ?></td>
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
        <td align="center"><?php echo $grandtotal; ?></td>
        <td>&nbsp;</td>
        <td align="center"><?php echo $grandtotal; ?></td>
       <td align="center"><?php echo $grandtax; ?></td><td>&nbsp;</td><td>&nbsp;</td>
         <td align="center">
         
         
         <?php echo $grandamount; ?></td>
         <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
              </tr></div>
              
              
              <div><tr><td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><label>Guest Name:</label></td><td align="center"><?php echo $data['pos_kot'] ['guest_name'] ?></td>
         <td><label>Room No:</label></td> <td align="center"><?php echo $data['pos_kot'] ['master_roomnos_id'] ?></td>
          <td>&nbsp;</td><td><label>Covers:</label></td> <td  align="center"><?php echo $data['pos_kot'] ['covers'] ?></td><td>&nbsp;</td>
          
          
          <td><label>Steward:</label></td><td><?php echo $master_steward_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_steward_name_fetch',$data['pos_kot']['master_stewards_id']), array());?></td>
          <td>&nbsp;</td></tr></div>
        
        
        <?php $maxtotal=$maxtotal+$grandtotal;
        $maxgross=$maxgross+$grandtotal;
        $maxnet=$maxnet+$grandtotal;
        $maxtax=$maxtax+$grandtax;
        $maxbill=$maxbill+$grandamount;} 	?> 
        
        <tr><td align="center"><label><b>Total:</label></td><td align="center"><b><?php echo number_format ("$maxtotal",2) ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
        <td align="center"><b><?php echo number_format ("$maxgross",2) ?></td><td>&nbsp;</td>
        <td align="center"><b><?php echo number_format ("$maxnet",2) ?></td>
        <td align="center"><b><?php echo number_format ("$maxtax",2) ?></td><td>&nbsp;</td><td>&nbsp;</td>
        <td align="center"><b><?php echo number_format ("$maxbill",2) ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>	
 </tr>
          </tbody>
          </table></div>
                    
            </div>
            </div>