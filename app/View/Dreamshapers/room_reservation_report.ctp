<table class="table table-bordered table-hover" style="margin-top:1px; background-color:#DEF8F7" id="sample_1">
	<thead>
    <tr style="background-color:#FFF"><td colspan="9" align="center"><p><div><b><font size="+2">Room Reservation Report</font></b></div></p></td></tr>
   
       <tr style="background-color:#FFF"><td colspan="9" align="center"><p><div><b><font size="+1">
       Date From <?php echo $start_date1; ?> To <?php echo $end_date1; ?>
       
       </font></b></div></p></td></tr>

   
    <tr>
    	<th>S.No</th>
        <th>Booking Type</th>
        <th>Name</th>
        <th>Company</th>
        <th>Contact No.</th>
        <th>Arr. Date</th>
        <th>Dep. Date</th>
        <th>Banquet Date</th>
        <th>Plan</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
        foreach($fetch_room_reservation as $next_data)
			{	//pr($next_data);
				 $i++;
				 $id=$next_data['room_reservation']['id'] ;
				$booking_type1 = $next_data['room_reservation']['booking_type'];
				if($booking_type1==0){ $booking_type='Room Reservation';}else{$booking_type='Function Reservation';}
				$arrival_data=$next_data['room_reservation']['arrival_date'];
				if($arrival_data=='0000-00-00')
				 {	$arrival_data='';}
				 else
				 { $arrival_data=date("d-m-Y", strtotime($arrival_data)); }
				$dap_date= $next_data['room_reservation']['departure_date'];
				  if($dap_date=='0000-00-00')
				 {	$dap_date='';}
				 else
				 { $dap_date=date("d-m-Y", strtotime($dap_date)); }
				$compny=$next_data['room_reservation']['company_id']; 
				$plan=$next_data['room_reservation']['plan_id'];
				$b_date= $next_data['room_reservation']['b_date'];
				  if($b_date=='0000-00-00')
				 {	$b_date='';}
				 else
				 {  $b_date=date("d-m-Y", strtotime($b_date)); }
				 
				 
			
		 ?>
        <tr id="for_delete<?php echo $id; ?>">
        <td><?php echo $i;?></td>
        <td><?php echo $booking_type; ?></td>
        <td><?php echo $next_data['room_reservation']['name_person']; ?></td>
        <td><?php if(!empty($compny)){ echo $Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$compny), array()); } ?></td>
        <td><?php echo $next_data['room_reservation']['telephone']; ?></td>
        <td><?php if($booking_type1==0){ echo $arrival_data; } else {echo '0';}?></td>
        <td><?php if($booking_type1==0){ echo $dap_date; } else {echo '0';} ?></td>
        <td><?php if($booking_type1==1){ echo $b_date; } else {echo '0';} ?></td>
        <td><?php if(!empty($plan)){ echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_plan_name_fetch',$plan), array()); } ?></td>
        </tr>
        <?php 
			}
			?>
            </tbody>
         </table>
		
	