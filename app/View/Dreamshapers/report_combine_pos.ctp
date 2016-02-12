<div class="portlet light">
<div class="portlet-title" align="center">
    <tr style="background-color:#FFF"><td colspan="5" align="center"><p><div><b><font size="+2">Combine POS Report</font></b></div></p></td></tr>

<table width="100%" border="1" style="border-collapse:collapse; margin-top:1%" bordercolor="#10A062">
<thead>
<tr height="30px" style="background-color:#DFF0D8;" >
    	<th width="20%">Outlet Name</th>
        <th width="13%">Total</th>
        <th width="13%">Food</th>
        <th width="13%">Beverage</th>
        <th width="13%">Taxes</th>
        <th width="13%">Surcharge</th>
        <th width="13%">Discount</th>
        </tr>
        </thead>
        <tbody>
        <?php 
		$grnd_tot_amt='';
		$grnd_tot_tax='';
		foreach($fetch_master_outlet as $data)
		{?>
		<tr>
 		<th><?php echo $outlet_name=$data['master_outlet']['outlet_name'];?> </th>
        
        
        <?php
		$total_amt='';
		$total_tax='';
 			$master_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action'=>'func_cover_statment',$data['master_outlet']['id']), array());
			 foreach($master_pos_kot_item as $count_data)
    		 {
			
    			$master_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action'=>'func_pos_kot_items',$count_data['pos_kot']['id']), array());
                foreach($master_pos_kot_item as $payment)
                {
                	//pr($payment);
					$amount=$payment['pos_kot_item']['amount'];
                    $total_amt+=$amount;
					
					$taxes=$payment['pos_kot_item']['taxes'];
					$total_tax+=$taxes;
					
                }
			 }
				
?>        
            <td align="center"><?php echo $total_amt; ?></d>
            <td align="center"></td>
            <td align="center"></td>
            <td align="center"><?php echo $total_tax; ?></td>
            <td align="center"></td>
            <td align="center"></td>
            </tr>
        
			<?php
            $grnd_tot_amt+=$total_amt;
            $grnd_tot_tax+=$total_tax;
            
            } 
		?>
        <tr>
        
        <th>Total</th>
        <th ><?php echo $grnd_tot_amt;?></th>
        <th >0</th>
        <th >0</th>
        <th ><?php echo $grnd_tot_tax;?></th>
        <th >0</th>
        <th >0</th>
        </tr>
        </tbody>
        </table>
        </div>
        </div>
        