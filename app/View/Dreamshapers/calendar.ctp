<div class="portlet box blue-madison calendar">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i>Reserve Chart
							</div>
						</div>
						<div class="portlet-body light-grey">
                        



<table align="center" width="100%" style="margin-top:20px">


<tr><td>
<div class="scroller" style="height:350px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="white">
 <table class="table table-bordered table-hover"  id="sample_1">
	<thead>
    <p>Room Reservation</p>
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
				 $booking_type1 = $next_data['room_reservation']['booking_type'];
			
		 ?>
         
        <td id="for_delete<?php echo $id; ?>"><b><?php if($booking_type1==0){ echo $arrival_data; } else {echo '0';}?></b> <?php echo $next_data['room_reservation']['reservation_status']; ?>
        
        <a class="btn blue btn-xs" data-toggle="modal" href="#popuptarrif_<?php echo $id ?>"><i class="fa fa-circle"></i></a>   
    <div class="modal fade" id="popuptarrif_<?php echo $id ?>" tabindex="-1" role="delete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Details.!</h4>
                </div>
   
   
           <div class="modal-body">
           <form method="post" name="popuptarrif_<?php echo $id; ?>">      
    <table class="table" style="margin-top:1px" id="sample_1">
    <thead>
     </thead>
<tbody>
<?php
$i=0;
        foreach($fetch_room_reservation as $next_data1)
			{	//pr($next_data);
				 $i++;
				 $id_ftc=$next_data1['room_reservation']['id'] ;
				$booking_type1 = $next_data1['room_reservation']['booking_type'];
				if($booking_type1==0){ $booking_type='Room Reservation';}else{$booking_type='Function Reservation';}
				$arrival_data=$next_data1['room_reservation']['arrival_date'];
				if($arrival_data=='0000-00-00')
				 {	$arrival_data='';}
				 else
				 { $arrival_data=date("d-m-Y", strtotime($arrival_data)); }
				$dap_date= $next_data1['room_reservation']['departure_date'];
				  if($dap_date=='0000-00-00')
				 {	$dap_date='';}
				 else
				 { $dap_date=date("d-m-Y", strtotime($dap_date)); }
				$compny=$next_data1['room_reservation']['company_id']; 
				$plan=$next_data1['room_reservation']['plan_id'];
				$b_date= $next_data1['room_reservation']['b_date'];
				  if($b_date=='0000-00-00')
				 {	$b_date='';}
				 else
				 {  $b_date=date("d-m-Y", strtotime($b_date)); }
				 $booking_type1 = $next_data1['room_reservation']['booking_type'];
				 ?>
 
 <?php
  if($id==$id_ftc){?>
<tr id="for_delete<?php echo $id; ?>">
        <td><?php echo $booking_type; ?></td></tr>
        <tr>
        <td><?php echo $next_data['room_reservation']['name_person']; ?></td></tr>
        <tr><td><?php if(!empty($compny)){ echo $Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$compny), array()); } ?></td></tr>
        <tr><td><?php echo $next_data['room_reservation']['telephone']; ?></td></tr>
        <tr><td><?php if($booking_type1==0){ echo $arrival_data; } else {echo '0';}?> - 
        <?php if($booking_type1==0){ echo $dap_date; } else {echo '0';} ?></td></tr>
        
        <tr><td><?php if(!empty($plan)){ echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_plan_name_fetch',$plan), array()); } ?></td></tr>
        
        <tr><td>
        
        <?php
$i=0;
$troom=0;
        foreach($fetch_room_reservation_no as $next_data1)
			{	//pr($next_data);
				 $i++;
				 $id_no=$next_data1['room_reservation_no']['id'] ;
				$room_reservation_id = $next_data1['room_reservation_no']['room_reservation_id'];
			$total_room = $next_data1['room_reservation_no']['total_room'];
				
				
				?>

<?php
  if($id==$room_reservation_id){
	  $troom+=$total_room;
	  ?>
      
<?php } ?>




<?php }  ?>
<tr id="for_delete<?php echo $id; ?>">
        <td>Total Room Reserve: &nbsp;</td><td><?php echo $troom; ?></td></tr>

        
        </td></tr>
        
        
<?php } ?>
<?php } ?>
</tbody>
</table>
</form></div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
             </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
        
        </td>
        <?php 
			}
			?>
    </tbody></table></div></td></tr>


<tr><td>
<div class="scroller" style="height:350px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="white">
 <table class="table table-bordered table-hover"  id="sample_1">
	<thead>
    <p>Function Reservation</p>
     </thead>
     <tbody>
     	<?php
		$i=0;
        foreach($fetch_room_reservationn as $next_data)
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
				 $booking_type1 = $next_data['room_reservation']['booking_type'];
			
		 ?>
        <td id="for_delete<?php echo $id; ?>"><b><?php if($booking_type1==1){ echo $b_date; } else {echo '0';}?></b> <?php echo $next_data['room_reservation']['reservation_status']; ?>
        
        <a class="btn blue btn-xs" data-toggle="modal" href="#popuptarrif_<?php echo $id ?>"><i class="fa fa-circle"></i></a>   
    <div class="modal fade" id="popuptarrif_<?php echo $id ?>" tabindex="-1" role="delete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Details.!</h4>
                </div>
   
   
           <div class="modal-body">
           <form method="post" name="popuptarrif_<?php echo $id; ?>">      
    <table class="table" style="margin-top:1px" id="sample_1">
    <thead>
     </thead>
<tbody>
<?php
$i=0;
        foreach($fetch_room_reservationn as $next_data1)
			{	//pr($next_data);
				 $i++;
				 $id_ftc=$next_data1['room_reservation']['id'] ;
				$booking_type1 = $next_data1['room_reservation']['booking_type'];
				if($booking_type1==0){ $booking_type='Room Reservation';}else{$booking_type='Function Reservation';}
				$arrival_data=$next_data1['room_reservation']['arrival_date'];
				if($arrival_data=='0000-00-00')
				 {	$arrival_data='';}
				 else
				 { $arrival_data=date("d-m-Y", strtotime($arrival_data)); }
				$dap_date= $next_data1['room_reservation']['departure_date'];
				  if($dap_date=='0000-00-00')
				 {	$dap_date='';}
				 else
				 { $dap_date=date("d-m-Y", strtotime($dap_date)); }
				$compny=$next_data1['room_reservation']['company_id']; 
				$plan=$next_data1['room_reservation']['plan_id'];
				$b_date= $next_data1['room_reservation']['b_date'];
				  if($b_date=='0000-00-00')
				 {	$b_date='';}
				 else
				 {  $b_date=date("d-m-Y", strtotime($b_date)); }
				 $booking_type1 = $next_data1['room_reservation']['booking_type'];
				 ?>
 
 <?php
  if($id==$id_ftc){?>
<tr id="for_delete<?php echo $id; ?>">
        <td><?php echo $booking_type; ?></td></tr>
        <tr>
        <td><?php echo $next_data['room_reservation']['name_person']; ?></td></tr>
        <tr><td><?php echo $next_data['room_reservation']['telephone']; ?></td></tr>
        <?php if($booking_type1==1){ echo $b_date; } else {echo '0';} ?></td></tr>
        
<?php } ?>
<?php } ?>
</tbody>
</table>
</form></div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
             </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
        
        </td>
        <?php 
			}
			?>
    </tbody></table></div></td></tr>


         </table>
         
         




							</div>
						</div>
					</div>