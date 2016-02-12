<table class="table table-bordered table-hover" style="margin-top:1px; background-color:#DEF8F7" id="sample_1">
	<thead>
    <tr><td colspan="7" align="center"><p><div><b><font size="+2">Function Booking Report</font></b></div></p></td></tr>
   
       <tr><td colspan="7" align="center"><p><div><b><font size="+1">
       Date From <?php echo $start_date1; ?> To <?php echo $end_date1; ?>
       
       </font></b></div></p></td></tr>

   
   <tr>
        <th>S. No</th>
        <th> Name</th>
        <th> Date</th>
        <th>Phone No.</th>
        <th> Outlet</th>
        <th>No. of Persons</th>
        <th>Amount</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		 foreach($fetch_function_booking as $data){ 
		 $i++;
		 $id_function_booking=$data['function_booking']['id'];
        
        $b_date=$data['function_booking']['b_date'];
		if($b_date=='0000-00-00'){ $b_date='';}
		else {$b_date= date("d-m-Y", strtotime($b_date)); }
        $b_time=$data['function_booking']['b_time'];
        $res_no_id=$data['function_booking']['res_no_id']; 
        $ftp_no=$data['function_booking']['ftp_no']; 
         $name=$data['function_booking']['name'];
        $outlet_venue_id=$data['function_booking']['outlet_venue_id']; 
        $address=$data['function_booking']['address'];
        $t_number=$data['function_booking']['t_number'];    
        $email=$data['function_booking']['email'];
        $rate=$data['function_booking']['rate'];
        $tax_id=$data['function_booking']['tax_id'];
        $per_expected=$data['function_booking']['per_expected']; 
        $pax=$data['function_booking']['pax'];
        $no_of_person=$data['function_booking']['no_of_person'];    
        $shape=$data['function_booking']['shape'];
        $other_service=$data['function_booking']['other_service'];
        $instruction=$data['function_booking']['instruction'];
        $itemtype_id=$data['function_booking']['itemtype_id'];
		 ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data['function_booking']['name']; ?></td>
        <td><?php echo $b_date; ?></td> 
        <td><?php echo $data['function_booking']['t_number']; ?></td>
        <td><?php
        echo @$master_outlet_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_outlet_fetch',$data['function_booking']['outlet_venue_id']), array()); ?></td>
        <td><?php echo $data['function_booking']['no_of_person']; ?></td>
       <!--<td>
       <?php
       $type_id= $data['function_booking']['itemtype_id'];
        $explode_data=explode(",",$type_id);	
       
        foreach($explode_data as $dataa)
        {
        
       		echo @$master_itemtype_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$dataa), array());
       		
            echo ",";
       } 
	?></td>-->
 <td><?php echo $data['function_booking']['tot_amt']; ?></td>   
    
        </tr>
        <?php } ?>
       </tbody>
        </table>
	