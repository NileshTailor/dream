<div class="portlet light">
<div class="portlet-title" align="center">

    <tr style="background-color:#FFF"><td colspan="5" align="center"><p><div><b><font size="+2">Production Report</font></b></div></p></td></tr>

<table width="70%" border="1" style="border-collapse:collapse; margin-top:1%; text-align:center" bordercolor="#10A062">
<thead>
<tr height="35px" style="background-color:#DFF0D8;">
   		<th style="text-align:center">S.No</th>
        <th style="text-align:center">Item Name</th>
        <th style="text-align:center">Quantity</th>
        <th style="text-align:center">Cost</th>
        </tr>
</thead>
<tbody>
	<?php 
	$i=0;
	$g_tot_qty=0;
	$g_tot_amt=0;
    foreach($fatch_master_items as $item_name)
    { $i++;
	   $item_id=$item_name['master_item']['id'];
       $item_names=$item_name['master_item']['item_name'];
	   ?>
       <tr><td><?php echo $i; ?></td>
       <th><?php echo $item_names; ?></th>
      
       <?php
	    $total_qty=0;
	    $total_amt=0;
		foreach($fatch_pos_kot_data as $kot_pos)
		{
		$kot_id=$kot_pos['pos_kot']['id'];
		
		$master_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action'=>'func_pos_production',$item_name['master_item']['id'],$kot_id), array());
	
			foreach($master_pos_kot_item as $get_qty)
			{
				$quantity=$get_qty['pos_kot_item']['quantity'];
				$total_qty+=$quantity;
				
				$amount=$get_qty['pos_kot_item']['amount'];
				$total_amt+=$amount;
			}
	
		}
		
		?>
       <td><?php echo $total_qty; ?></td> 
       <td><?php echo $total_amt; ?></td> 
       </tr>
        <?php
		$g_tot_qty+=$total_qty;
		$g_tot_amt+=$total_amt;
    
    }
    
    ?>
    <tr><th colspan="2" height="35px" align="right">TOTAL</th><th><?php echo $g_tot_qty; ?></th><th><?php echo $g_tot_amt ;?></th></tr>

</tbody>
</table>
</div>
</div>