<div class="container-fluid" >
    <div >
        <div class="tabbable tabbable-custom tabbable-noborder">
           
            <div class="tab-content">
          

                     	 <div class="table-responsive">
                         
                         
                         <table border="0" width="100%"><tr><td align="right"><a class="btn default btn-xs blue" style="margin-left:94%; margin-top:4% width:4%; text-align:right;" href="excel_functionreport" target="_blank">Excel</a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<td> <a class="btn default btn-xs blue" style="margin-left:4%; margin-top:4% width:4%; text-align:right" target="_blank" onclick="window.print()">Print</a></td></tr></table>
 
 
 <!--<div>
   <?php
		$i=0;
		 foreach($fetch_invoiceadd as $data){ 
		 $i++;
		 $id_invoiceaddress=$data['invoiceadd']['id'];
         
         ?>
         
         <?php echo $data['invoiceadd']['add']; ?>
         
         <?php }?>-->
                         
                         
                         
 <span style="margin-left:5%; color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h2 align="center">Function Booking Report</h2></span>

<div style="overflow-y:scroll; height:50%;">



<table width="100%" border="1" style="border-collapse:collapse; margin-top:1%" bordercolor="#10A062" >                                               
<thead>
<tr style="background-color:#DFF0D8;">
    
        <th>S. No</th>
        <th>Booking</th>
        <th>Banquet Date</th>
        <th>Banquet Time</th>
        <th>Resv. No</th>
        <th>Name</th>
        <th>Outlet/Venue</th>
        <th>Telephone No.</th>
        <th>Rate</th>     
        <th>No. of Persons</th>
        <th>Shape</th>
        <th>Other Service</th>
        <!--<th>Menu Choices</th>-->
        
     </tr>
     </thead>
     <tbody>
     
     
     
     	<?php
		$i=0;
		 foreach($fetch_function_booking as $data){ 
		 $i++;
		 $id_function_booking=$data['function_booking']['id'];
         
         
         
        $booking=$data['function_booking']['booking'];
        $b_date=$data['function_booking']['b_date'];
        $b_time=$data['function_booking']['b_time'];
        $res_no_id=$data['function_booking']['res_no_id']; 
        $ftp_no=$data['function_booking']['ftp_no']; 
         $name=$data['function_booking']['name'];
        $outlet_venue_id=$data['function_booking']['outlet_venue_id']; 
        $address=$data['function_booking']['address'];
        $t_number=$data['function_booking']['t_number'];    
        $email=$data['function_booking']['email'];
        $rate=$data['function_booking']['rate'];
        $person_tax=$data['function_booking']['person_tax'];
        
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
        
        <td align="center"><?php echo $i; ?></td>
        <td align="center"><?php echo $data['function_booking']['booking']; ?></td>
        <td align="center"><?php echo date('d-m-Y', strtotime($data['function_booking']['b_date'])); ?></td>
        <td align="center"><?php echo $data['function_booking']['b_time']; ?></td>
        <td align="center"><?php
        echo @$reservation_no_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'reservation_no_fetch',$data['function_booking']['res_no_id']), array()); ?></td>
        <td align="center"><?php echo $data['function_booking']['name']; ?></td>
        
        <td align="center"><?php
        echo @$master_outlet_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_outlet_fetch',$data['function_booking']['outlet_venue_id']), array()); ?></td>
        <td align="center"><?php echo $data['function_booking']['t_number']; ?></td>
        <td align="center"><?php echo $data['function_booking']['rate']; ?></td>
        
        <td align="center"><?php echo $data['function_booking']['no_of_person']; ?></td>
        <td align="center"><?php echo $data['function_booking']['shape']; ?></td>
        <td align="center"><?php echo $data['function_booking']['other_service']; ?></td>

       
       <!-- <td>
        
       <?php
        $type_id= $data['function_booking']['itemtype_id'];
        $explode_data=explode(",",$type_id);
        foreach($explode_data as $dataa)
        {
       		echo $master_itemtype_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$dataa), array());
       		echo ",";
       } 
	?>
    </td>-->
        
        </tr>
        
<?php } ?>
        </tbody>
        </table> 
</div></div></div></div></div></div>