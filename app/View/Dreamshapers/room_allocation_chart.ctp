
<div >

<link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/global/css/demo-styles.css" />
 
<style>
.Occupied{
background-color:#5365CC;
}
.Expected{
background-color:#85C030;
}
.Billing{
background-color:#1B4C95;
}
.Complimentary{
background-color:#9C58DB;
}
.Management_block{
background-color:#150402;
}
.Vacant{
background-color:#4AAD6E;
}
.Vacant_darty{
background-color:#C6BB3D;
}
.Out{
background-color:rgba(191, 54, 37, 0.98);
}
.blue{
background-color:#82A0D1;
}

</style>




<div style="text-align:center"">
<table align="center" width="100%" style="margin-top:20px;" >
<tr><td align="center"><h1 style="font-family:Georgia, 'Times New Roman', Times, serif; color:#096">Room Allocation Chart</h1></td></tr></table>
</div>
<div style="float:right;">
    <table width="450px"><tbody>


<tr><td class="legendColorBox">
<div style="width:4px;height:0;border:5px solid #5365CC;overflow:hidden"></div></td>
<td class="legendLabel">&nbsp; Occupied Today's Arrival</td>

<td class="legendColorBox">
<div style="width:4px;height:0;border:5px solid #85C030;overflow:hidden"></div></td>
<td class="legendLabel">&nbsp; Occupied Expected Departure</td></tr>

<tr><td class="legendColorBox">
<div style="width:4px;height:0;border:5px solid #1B4C95;overflow:hidden"></div></td>
<td class="legendLabel">&nbsp; Occupied Billing</td>

<td class="legendColorBox">
<div style="width:4px;height:0;border:5px solid  #9C58DB;overflow:hidden"></div></td>
<td class="legendLabel">&nbsp; Occupied Complimentary</td></tr>

<tr><td class="legendColorBox">
<div style="width:4px;height:0;border:5px solid #150402;overflow:hidden"></div></td>
<td class="legendLabel">&nbsp; Occupied Management Block</td>

<td class="legendColorBox">
<div style="width:4px;height:0;border:5px solid #4AAD6E;overflow:hidden"></div></td>
<td class="legendLabel">&nbsp; Vacant Ready/Clean</td></tr>

<tr><td class="legendColorBox">
<div style="width:4px;height:0;border:5px solid #C6BB3D;overflow:hidden"></div></td>
<td class="legendLabel">&nbsp; Vacant Dirty</td>

<td class="legendColorBox">
<div style="width:4px;height:0;border:5px solid rgba(191, 54, 37, 0.98);overflow:hidden"></div></td>
<td class="legendLabel">&nbsp; Out Of Order</td></tr>

</tbody></table>
    </div>
<table width="100%" class="responcive" style="margin-top:7%;" >
<tbody>


<?php  $i=0; 
 foreach($fetch_master_roomno as $master_roomno)
 {
	foreach($master_roomno as $room_no)
	{	
		$room_no_ftc=$room_no['room_no'];
		$expload_data=explode(",", $room_no_ftc);
			foreach($expload_data as $all_room)
			{
				
			
			$i++;
			if($i==1)
			{echo "<tr>";}
			$room_vacant=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_room_report',$all_room), array());
             $room_status=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_clean_room_report',$all_room), array());
			
			
			if(!empty($room_vacant) && $room_vacant[0]['room_checkin_checkout']['arrival_date']==date('Y-m-d'))
			{
			 ?>
             
             <td>
            <li style="height:120px; margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page">
            <div style="height:120px;" class="Occupied"><p style="font-size:20px;">Room.No. <strong><?php echo $all_room; ?></strong></p></div>
            <?php }
            else if(!empty($room_vacant))
			{
			 ?><td>
            <li style="height:120px ; margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page" >
            <div style="height:120px;" class="Expected"><p style="font-size:20px;">Room.No. <strong><?php echo $all_room; ?></strong></p></div>
            <?php }
             else if($room_status=='outoforder')
             { ?>
             <td>
            <li style="height:120px;  margin-left:5%; margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page" >
            <div style="height:120px;" class="Out" ><p style="font-size:20px;">Room.No. <strong><?php echo $all_room; ?></strong></p></div>
           <?php }
           
           else if($room_status=='dirty')
             { ?>
             <td>
            <li style="height:120px;  margin-left:5%; margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page" >
            <div style="height:120px;" class="Vacant_darty" ><p style="font-size:20px;">Room.No. <strong><?php echo $all_room; ?></strong></p></div>
            <?php
             }
              else if($room_status=='clean')
             {?>
             <td>
            <li style="height:120px;  margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page" >
            <div style="height:120px;" class="Vacant" ><p style="font-size:20px;">Room.No. <strong><?php echo $all_room; ?></strong></p></div>
           <?php 
             }
             else
             { ?>
            <td>
            <li style="height:120px;  margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page" >
            <div style="height:120px;" class="Vacant" ><p style="font-size:20px;">Room.No. <strong><?php echo $all_room; ?></strong></p></div>
            
            <?php
			}
			if(!empty($room_vacant))
			{
			$guest_name=$room_vacant[0]['room_checkin_checkout']['guest_name'];
			$in_date=$room_vacant[0]['room_checkin_checkout']['arrival_date'];
			echo'<div style="height:120px; width:100%" class="blue"><p style="font-size:20px;">'.$guest_name.'</p></div>';
			}
			else if($room_status=='outoforder')
             {
			?>
            <div style="height:120px; width:100%" class="blue"><p style="font-size:20px;"> Out Of Order</p></div>
            <?php }
            else if($room_status=='dirty')
             {
			?>
            <div style="height:120px; width:100%" class="blue"><p style="font-size:20px;">Dirty</p></div>
            <?php }
            
            else if($room_status=='clean')
             {
			?>
            <div style="height:120px; width:100%" class="blue"><p style="font-size:20px;">Clean</p></div>
            <?php }
             else
             {
			?>
            <div style="height:120px; width:100%" class="blue"><p style="font-size:20px;">Vacant</p></div>
            <?php }?>
        </li>
       </td>
             <?php 
			 	if($i==10)
				{ $i=0; echo "</tr><tr>";}
				}
	}
	
 }
	
?>
  </tbody></table>
</div>



<!--<div style="border-bottom:double 1px solid">
    <strong><span style="margin-right:35px">Card No.</span></strong>
    <strong><span style="margin-right:35px">Room No.</span></strong>
    <strong><span>Name</span></strong>    
    </div>
<div>
<table width="50%" border="1">

<?php 
$RR='';
foreach($fetch_master_roomno as $master_roomno)
 {
	foreach($master_roomno as $room_no)
	{	
		$room_no_ftc=$room_no['room_no'];
		$expload_data=explode(",", $room_no_ftc);
		
			foreach($expload_data as $all_room)
			{
			$i++;
			
			$room_vacant=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_room_report',$all_room), array());
             $room_status=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_clean_room_report',$all_room), array()); 
			@ $guest_name=$room_vacant[0]['room_checkin_checkout']['guest_name'];
			@$in_date=$room_vacant[0]['room_checkin_checkout']['arrival_date'];
			@$room_no=$room_vacant[0]['room_checkin_checkout']['master_roomno_id'];
			@$card_no=$room_vacant[0]['room_checkin_checkout']['card_no'];
			
			if(empty($room_vacant))
			{
				$RR= '';
			}
	?>
    
    
<div>
		 <?php echo $card_no;?>
		 <?php echo $room_no;?>         
          <?php  echo $guest_name;?>
		 ;<?php echo $RR; ?>    
		   
    </div>
    	
<?php }?>
<?php }?>
<?php }?>
</table>
</div>-->













<div style="width:50%; margin-left:4px; margin-top:25px">

<table align="center" width="100%">
<tr><td> 

 <table border="0" width="80%">
	<thead>
    <tr style="background-color:#FFE1E1">
    <th>Checkin Date</th>
        <th>Card no</th>
        <th>Room No.</th>
        <th>Guest Name</th>
     </tr>
     </thead>
     <tbody>
       
     	<?php
		$i=0;
		$cn=0;
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
         <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
        <td><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
        <td><?php
            echo $data['room_checkin_checkout']['master_roomno_id'];
	?></td>
        <td><?php echo $data['room_checkin_checkout']['guest_name']; ?></td>
       
        
        
        
        </tr>
        <?php 
			}
			?>
            </tbody>
         </table>
        </td></tr>

</table></div>