
 
<div class="container-fluid" >
    <div >
        <div class="tabbable tabbable-custom tabbable-noborder">
           
            <div class="tab-content">
          

                     	 <div class="table-responsive">
                         
                  
                                          <table border="0" width="100%"><tr><td align="right"><a class="btn default btn-xs blue" style="margin-left:94%; margin-top:4% width:4%; text-align:right;" href="excel_checkoutreport" target="_blank">Excel</a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                  
                  
                         
<span style="margin-left:5%; color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h2 align="center">Checkout Report</h2></span>
</div>
<table width="100%" border="1" style="border-collapse:collapse; margin-top:1%" bordercolor="#10A062">
 
<thead>
<tr style="background-color:#DFF0D8;">

     <th>S. No</th>
        <th>Room No.</th>
        <th>Guest/Group Name</th>
        <th>Room Type</th>
        <th>Checkin Date</th>
        <th>Plan</th>
        <th>Source of Booking</th>
        
        <th>Pax</th>
        <th>Room Charg</th>
        <th>Advance Taken</th>
        <th>Total Charge</th>
        <th>Taxes</th>
        <th>Gross Ammount</th>
        <th>Room Discount</th>
        <th>Net Amount</th>
        
     </tr>
     </thead>
     <tbody>
     
     
     
     	<?php
		$i=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
		 $id_room_checkin_checkout=$data['room_checkin_checkout'] ['id'];
         
      ?>
        
        <tr>
        
        <td align="center"><?php echo $i; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout'] ['master_roomno_id']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout'] ['guest_name']; ?></td>
<td align="center"><?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['room_checkin_checkout']['room_type_id']), array()); ?></td>        
        
        <td align="center"><?php echo $data['room_checkin_checkout'] ['arrival_date']; ?></td>
        
<td align="center"><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['room_checkin_checkout']['plan_id']), array()); ?></td>        
        <td align="center"><?php echo $data['room_checkin_checkout'] ['source_of_booking']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout'] ['pax']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout'] ['room_charge']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout'] ['advance_taken']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout'] ['total_charge']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout'] ['taxes']; ?></td>
                  
                  
                  
        
        <td align="center"><?php echo $data['room_checkin_checkout'] ['gross_amount']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout'] ['room_discount']; ?></td>
        <td align="center"><?php echo $data['room_checkin_checkout'] ['net_amount']; ?></td>
       
        </tr>
        
<?php } ?>
        </tbody>
        </table> 
</div>
  
      </div>
            </div></div></div>
        