			
<div class="portlet light">
<div class="portlet-title" align="center">
    <tr style="background-color:#FFF"><td colspan="5" align="center"><p><div><b><font size="+2">Item Wise Report</font></b></div></p></td></tr>
<table width="100%" border="0" style="border-top:ridge;" bordercolor="#10A062" cellpadding="5">

     <tbody>
   <?php
   $grandtotal=0;
		$i=0;
		
		 foreach($fatch_billing_kot_data as $data){ 
		 $i++;
		 $id=$data['pos_kot'] ['id'];
		 
		 ?>
       
<tr style="background-color:#DFF0D8;">
        		<td><?php echo $i; ?></td>
        <td style="font-family:Georgia, 'Times New Roman', Times, serif;" align="center" ><b>Bill No:</b></td><td><?php echo $data['pos_kot'] ['id'] ?></td>
        <td style="font-family:Georgia, 'Times New Roman', Times, serif;" align="center"  colspan="2"><b>Guest Name:</b></td><td><?php echo $data['pos_kot'] ['guest_name'] ?></td>
        <td style="font-family:Georgia, 'Times New Roman', Times, serif;" align="center"><b>Date:</b></td><td colspan="3"><?php echo $data['pos_kot'] ['current_date'] ?></td>
        
        
        <td style="font-family:Georgia, 'Times New Roman', Times, serif;" align="center"  colspan="3"><b>Table No:</b></td><td><?php  echo $table_no=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$data['pos_kot']['master_tables_id']), array());?></td>
        
         <td style="font-family:Georgia, 'Times New Roman', Times, serif;" align="center"><b>Covers:</b></td><td><?php echo $data['pos_kot'] ['covers'] ?></td>
        </tr>
        
        
        <?php $fatch_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fatch_pos_kot_item',$data['pos_kot']['id']), array());
       
		
		 foreach($fatch_pos_kot_item as $data1){ 
		 $id=$data1	['pos_kot_item'] ['id'] ;
		 ?>
        
        <tr>
        
<td align="center" colspan="2"><?php  echo $master_itemtype_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$data1['pos_kot_item']['master_items_id']), array());?>
<?php  echo $master_planitemtype_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_planitemtype_fetch',$data1['pos_kot_item']['master_itemss_id']), array());?></td>
	    <td>&nbsp;</td><td>&nbsp;</td>
        <td align="right">Quantity:</th><td align="center"><?php echo $data1['pos_kot_item'] ['quantity'] ?></td>
        <td align="right">Gross:</th><td align="center"><?php echo $data1['pos_kot_item'] ['gross'] ?></td>
        <td align="right">Tax:</th><td align="center"><?php echo $data1['pos_kot_item'] ['taxes'] ?></td><td>&nbsp;</td>
        <td align="right">Net:</th><td align="center"><?php echo $data1['pos_kot_item'] ['amount'] ?></td><td>&nbsp;</td>
        
        <td colspan="3">&nbsp;</td></tr>
        
          <?php 
		  
		  $grandtotal=$grandtotal+$data1['pos_kot_item'] ['amount'];
		  
		  
		  } ?>
          
<tr><td>&nbsp;</td></tr><tr style="border-bottom-style:ridge; border-bottom-color:#999;"></tr>          
        <?php }  ?>   <tr style="border-top-style:ridge; border-top-color:#DFF0D8"><td colspan="12" align="right" style="font-family:Georgia, 'Times New Roman', Times, serif;"><b>Grand Total:</b></td><td align="center"><?php echo number_format ("$grandtotal",2) ?></td><td colspan="3">&nbsp;</td></tr>
          </tbody>
          </table> 
                    
            </div>
            </div>
      

