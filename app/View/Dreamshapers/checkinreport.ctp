<div class="container-fluid" >
    <div >
        <div class="tabbable tabbable-custom tabbable-noborder">
           
            <div class="tab-content">
          

                     	 <div class="table-responsive">
                         
                         
                         
                         <table border="0" width="100%"><tr><td align="right"><a class="btn default btn-xs blue" style="margin-left:94%; margin-top:4% width:4%; text-align:right;" href="excel_checkinreport" target="_blank">Excel</a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<td> <a class="btn default btn-xs blue" style="margin-left:4%; margin-top:4% width:4%; text-align:right" target="_blank" onclick="window.print()">Print</a></td></tr></table>
 
 
<!-- <div>
   <?php
		$i=0;
		 foreach($fetch_invoiceadd as $data){ 
		 $i++;
		 $id_invoiceaddress=$data['invoiceadd']['id'];
         
         ?>
         
         <?php echo $data['invoiceadd']['add']; ?>
         
         <?php }?>-->
                         
                         
<span style="margin-left:5%; color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h2 align="center">Checkin Report</h2></span>
                         


<table width="100%" border="1" style="border-collapse:collapse; margin-top:1%" bordercolor="#10A062">
<thead>
<tr style="background-color:#DFF0D8;">
    <th>S. No</th>
        <th>Reg. Card no</th>
        <th> Resv. No.</th>
        <th> Arrival Date</th>
        <th> Arrival Time</th>
        <th>Company Name</th>
        <th>Guest Name</th>
        <th>Arriving From</th>
        <th>Nationality</th>
        <th>Checkout Date</th>
        <th>Room No.</th>
        <th>Room Type</th>
        <th>Plan Name</th>
        <th>Pax</th>
        <th>Source of Booking</th>
        <th>Room Charge</th>
        <th>Advance</th>
        
     </tr>
     </thead>
     <tbody>
     
     
     
     	<?php
		$i=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
		 $id_room_checkin_checkout=$data['room_checkin_checkout']['id'];
       
       $guest_name=$data['room_checkin_checkout']['guest_name'];
        $permanent_address=$data['room_checkin_checkout']['permanent_address'];
        $arriving_from=$data['room_checkin_checkout']['arriving_from'];
        $next_destination=$data['room_checkin_checkout']['next_destination']; 
        $nationality=$data['room_checkin_checkout']['nationality']; 
         $city=$data['room_checkin_checkout']['city'];
        $duration=$data['room_checkin_checkout']['duration']; 
        $checkout_date=$data['room_checkin_checkout']['checkout_date'];
        $pax=$data['room_checkin_checkout']['pax'];    
        $room_charge=$data['room_checkin_checkout']['room_charge'];
        $advance_taken=$data['room_checkin_checkout']['advance_taken'];
        $child=$data['room_checkin_checkout']['child'];
        $billing_instruction=$data['room_checkin_checkout']['billing_instruction'];
		 ?>
        <tr>
        
        <td align="center"><?php echo $i; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout']['room_reservation_id']; ?></td>
        <td align="center"><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout']['arrival_time']; ?></td>
        <td align="center"><?php
        echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$data['room_checkin_checkout']['company_id']), array()); ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout']['guest_name']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout']['arriving_from']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout']['nationality']; ?></td>
        <td align="center"><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['checkout_date'])); ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></td>
                  <td><?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['room_checkin_checkout']['room_type_id']), array()); ?></td>
                  
                  <td align="center"><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['room_checkin_checkout']['plan_id']), array()); ?></td>

        <td align="center"><?php echo $data['room_checkin_checkout']['pax']; ?>
        
        <td align="center"><?php echo $data['room_checkin_checkout']['source_of_booking']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout']['room_charge']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout']['advance_taken']; ?></td>
       
        </tr>
        
<?php } ?>
        </tbody>
        </table> 
</div>
  
      </div>
            </div></div></div>
        