<table class="table table-bordered table-hover" style="margin-top:1px; background-color:#DEF8F7" id="sample_1">
	<thead>
    <tr><td colspan="10" align="center"><p><div><b><font size="+2">Checkout Report</font></b></div></p></td></tr>
   
       <tr><td colspan="10" align="center"><p><div><b><font size="+1">
       Date From <?php echo $start_date1; ?> To <?php echo $end_date1; ?>
       
       </font></b></div></p></td></tr>

   
        <tr>
    	<th>S.No</th>
        <th>Card No.</th>
        <th>Arr.</th>
        <th>Dep.</th>
        <th>Company</th>
        <th>Name</th>
        <th>Room No.</th>
        <th style="font:Georgia, 'Times New Roman', Times, serif; color:#093">Total Amount</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
        foreach($fetch_room_checkin_checkout as $data)
			{	
				 $i++;
				 $id_room_checkin_checkout=$data['room_checkin_checkout']['id'] ;
				$arrival_data=$data['room_checkin_checkout']['arrival_date'];
				if($arrival_data=='0000-00-00')
				 {	$arrival_data='';}
				 else
				 { $arrival_data=date("d-m-Y", strtotime($arrival_data)); }
				$dap_date= $data['room_checkin_checkout']['checkout_date'];
				  if($dap_date=='0000-00-00')
				 {	$dap_date='';}
				 else
				 { $dap_date=date("d-m-Y", strtotime($dap_date)); }
                 
        $guest_name=$data['room_checkin_checkout']['guest_name'];
        $permanent_address=$data['room_checkin_checkout']['permanent_address'];
        $arriving_from=$data['room_checkin_checkout']['arriving_from'];
		$room_type_id=$data['room_checkin_checkout']['room_type_id'];
        $next_destination=$data['room_checkin_checkout']['next_destination']; 
        $nationality=$data['room_checkin_checkout']['nationality'];
		$master_roomno_id=$data['room_checkin_checkout']['master_roomno_id']; 
         $city=$data['room_checkin_checkout']['city'];
        $duration=$data['room_checkin_checkout']['duration']; 
        $checkout_date=$data['room_checkin_checkout']['checkout_date'];
        $room_discount=$data['room_checkin_checkout']['room_discount'];
        $pax=$data['room_checkin_checkout']['pax'];    
        $room_charge=$data['room_checkin_checkout']['room_charge'];
        $total_room=$data['room_checkin_checkout']['total_room'];
        $taxes=$data['room_checkin_checkout']['taxes'];
        $advance_taken=$data['room_checkin_checkout']['advance_taken'];
        $child=$data['room_checkin_checkout']['child'];
        $id_proof=$data['room_checkin_checkout']['id_proof'];
        $billing_instruction=$data['room_checkin_checkout']['billing_instruction'];
		$card=$data['room_checkin_checkout']['card_no'];
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['checkout_date'])); ?></td>
        <td><?php
        echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$data['room_checkin_checkout']['company_id']), array()); ?></td>
        <td><?php echo $data['room_checkin_checkout']['guest_name']; ?></td>
        
        <td><?php
            echo $data['room_checkin_checkout']['master_roomno_id'];
	?>
    
    <!--</td>
    <?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['room_checkin_checkout']['room_type_id']), array()); ?></td>
                  <td><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['room_checkin_checkout']['plan_id']), array()); ?></td>-->
        
        
        <th><?php echo $data['room_checkin_checkout']['totalnetamount']; ?></th>
       
        </tr><?php }?></tbody></table>
