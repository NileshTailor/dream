<?php
 if(!empty($outlet))
 {
 	$outlet_array=explode(',', $outlet);
     
 } 
?>


<?php
if(empty($active))
{ $active='';
}

foreach($fte_room_reservation as $view_data)
{ 
	$id=$view_data['room_reservation']['id'];
	$company_id=$view_data['room_reservation']['company_id'];
	$name_person=$view_data['room_reservation']['name_person'];
	$nationality=$view_data['room_reservation']['nationality'];
	$telephone=$view_data['room_reservation']['telephone']; 
	$email_id=$view_data['room_reservation']['email_id'];
	$fax=$view_data['room_reservation']['fax'];
	$reservation_gr_no=$view_data['room_reservation']['reservation_gr_no'];
    $traveller_name=$view_data['room_reservation']['traveller_name'];
	$time=$view_data['room_reservation']['time'];
    $id_proof_no=$view_data['room_reservation']['id_proof_no'];
	$plan_id=$view_data['room_reservation']['plan_id']; 
	$city=$view_data['room_reservation']['city'];
	$source_of_booking=$view_data['room_reservation']['source_of_booking'];
	
	
	$booking_type=$view_data['room_reservation']['booking_type'];
	//$safari_required=$view_data['room_reservation']['safari_required'];
	//$booking_thru_sales=$view_data['room_reservation']['booking_thru_sales'];
	$reservation_status=$view_data['room_reservation']['reservation_status'];
	$duration=$view_data['room_reservation']['duration']; 
	//$room_type_id=$view_data['room_reservation']['room_type_id'];
	//$total_room=$view_data['room_reservation']['total_room'];
	$requested=$view_data['room_reservation']['requested'];
	$granted=$view_data['room_reservation']['granted'];
	$rate_per_night=$view_data['room_reservation']['rate_per_night'];
	$remarks=$view_data['room_reservation']['remarks'];
    $advance=$view_data['room_reservation']['advance'];
    $arrival_date=$view_data['room_reservation']['arrival_date'];
     if($arrival_date=='0000-00-00')
         {	$arrival_date='';}
         else
         { $arrival_date=date("d-m-Y", strtotime($arrival_date)); }
       		$departure_date=$view_data['room_reservation']['departure_date'];
          if($departure_date=='0000-00-00')
         {	$departure_date='';}
         else
         { $departure_date=date("d-m-Y", strtotime($departure_date)); }
         
          $master_outlet_id=$view_data['room_reservation']['master_outlet_id'];
         $b_date=$view_data['room_reservation']['b_date'];
          if($b_date=='0000-00-00')
         {	$b_date='';}
         else
         { $b_date=date("d-m-Y", strtotime($b_date)); }
       // $room_reservation_id=$view_data['room_reservation']['room_reservation_id'];
        $total_room_expload=$view_data['room_reservation']['total_room'];
        $total_room=explode(',',$total_room_expload);
        $no_of_row=sizeof($total_room);
        
        $charge_expload=$view_data['room_reservation']['room_charge'];
        $charge=explode(',',$charge_expload);
        
        $tg_expload=$view_data['room_reservation']['tg'];
        $tg=explode(',',$tg_expload);
        $master_room_type_expload=$view_data['room_reservation']['room_type_id'];
        $master_room_type=explode(',',$master_room_type_expload);
		
	/*///////////////////////////////*/
	$room_discount_expload=$view_data['room_reservation']['room_discount'];
        $room_discount=explode(',',$room_discount_expload);
		
		$taxes_expload=$view_data['room_reservation']['taxes'];
        $taxes=explode(',',$taxes_expload);
		
		$master_room_plan_expload=$view_data['room_reservation']['plan_id'];
        $master_room_plan_id=explode(',',$master_room_plan_expload);
	
	/*.................................*/
        
         $master_roomno_id=$view_data['room_reservation']['master_roomno_id']; 
         $all_wth = explode("-",$master_roomno_id);
     $master_roomno_id=$view_data['room_reservation']['master_roomno_id']; 
	 
}
 
     
	?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title"> Reservation </div><div class="toast-message"> </div></div></div>
</div>
<div class="row">
    <div class="col-md-12">
    <div style="width:88%; margin-left:50px">
        <div class="tabbable tabbable-custom tabbable-border">
            <div class="tab-content">
                    <form method="post" name="add" id="roomreservation">
                   
                   	 <div class="table-responsive">
                     <table class="table self-table" style=" width:100% !important;" border="0">
                      <tr><td><label>Reseveration Type</label></td><td colspan="3"><div class="form-group">
                        <div class="radio-list">
                        
                        <?php if($booking_type==0){?>
                            <label class="radio-inline">
                            <input type="radio" name="booking_type"  value="0" <?php if($booking_type==0){ ?> checked <?php }?>  id="room_booking" >Room Booking   </label><?php }?>
               <?php if($booking_type==1){?><label class="radio-inline">
                            <input type="radio" name="booking_type" <?php if($booking_type==1){ ?> checked <?php }?> value="1" id="function_booking">Function Booking </label><?php }?>
                        </div>
                    </div></td>
                    
                        <td align="left" width="12%"><label>Reservation No.</label></td> 
                            <td>
                            <div class="form-group"><input type="text" class="form-control input-inline input-xsmall" placeholder="Card No." id="ccc" name="reservation_gr_no" value="<?php echo $reservation_gr_no; ?>" readonly/></div>
                            </td>
                         
                    </tr>
                    <tr><td><label>Source Of Booking</label></td>
                    <td colspan="3">
                    <div class="form-group">
                        <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="source_of_booking"<?php if($source_of_booking=='Company'){ ?> checked <?php } ?> value="Company" id="company" > Company</label>
                            <label class="radio-inline">
                            <input type="radio" name="source_of_booking" <?php if($source_of_booking=='Direct'){ ?> checked <?php } ?> value="Direct"   id="direct" > Direct </label>
                            <label class="radio-inline">
                            <input type="radio" name="source_of_booking" <?php if($source_of_booking=='Travel Agent'){ ?> checked <?php } ?> value="Travel Agent"  id="travel"> Travel Ajent</label>
                        </div>
                    </div>
                    </td>   <td id="travel1"><label>Traveller Name</label></td>
                    <td colspan="2" >
                    <div class="form-group">
                    <input class="form-control input-small" id="traveller_name" value="<?php echo $traveller_name;?>"  name="traveller_name" placeholder="Traveller" type="text">
                    </div>
                    </td>
                        
                    </tr>
                         
                        <input type="hidden" value="<?php echo $id;?>" name="id" id="id" />
                      
                            <tr> 
                            <?php if($booking_type==0){?>
                            <td><label>Arrival Date<span style="color:#E02222">* </span></label></td> 
                            <td><div class="form-group"><div class="input-group">
                            <input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="arrival_date" onchange="valid()" id="arr_id"  value="<?php echo $arrival_date; ?>">
                            </div></div></td><?php }?>
                             
                             <?php if($booking_type==0){?><td><label>Departure Date<span style="color:#E02222">* </span></label></td> 
                            <td><input type="text" class="form-control input-inline input-small date-picker" onchange="valid()"  data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="departure_date" id="dep_id" data-date="00-00-0000" value="<?php echo $departure_date; ?>"></td>
                            <?php }?>
                            <td><label>Arrival Time<span style="color:#E02222">* </span></label></td> 
                            <td><div class="input-group">
                                <input class="form-control  input-inline input-small timepicker timepicker-no-seconds" type="text" placeholder="Arrrival Time"
                                value="<?php echo $time; ?>" name="time" >
                              </div></td>
                            </tr>
                            
                            <tr>
                             <td><label>Guest Name<span style="color:#E02222">* </span></label></td> 
                        <td><div class="form-group"><input type="text" value="<?php echo $name_person; ?>" class="form-control input-inline input-small" placeholder="Guest Name" name="name_person" id="gname_id"></div>                          
                        </td>
                            
                        <td width="16%" id="labal_replace"><label>Company Name <span style="color:#E02222">* </span></label>
                    </td> <td width="20%" id="company_replace">
                    <div class="form-group" style="width:70%; float:left;">
                    <select class="form-control input-small select2me " onchange="room_rate();" placeholder="Select..."   name="company_id" id="company_name" >
                           <option value=""></option>
                            <?php
                            foreach($fetch_company_registration as $data)
                            {
                                ?>
                         <option  <?php if($company_id==$data['company_registration']['id']){?> selected <?php } ?> value="<?php echo $data['company_registration']['id'];?>">
                         <?php echo $data['company_registration']['company_name'];?></option>
                            <?php
                            }
                            ?>
                            </select>
                            </div>
                         <div style="width:23%; float:right"><a class="btn green btn-sm" style="margin-left:2px; margin-top:2px" data-toggle="modal" href="#basic" ><i class="fa fa-plus"></i></a></div>	
                    </td>
                    <td><label>Plan <span style="color:#E02222">* </span></label></td>
                    <td>
                    <div class="form-group" style="float:left; width:70%">
                    <select class="form-control input-small select2me" onchange="room_rate();" placeholder="Select..."  name="plan_id" id="plan_id"  >
                            <option value=""></option>
                            <?php
                            foreach($fetch_master_room_plan as $data1)
                            {
                                ?>
                                <option  value="<?php echo $data1['master_room_plan']['id'];?>"<?php if($data1['master_room_plan']['id']==$plan_id){ echo 'selected'; } ?> >
                        <?php echo $data1['master_room_plan']['plan_name'];?></option>
                                <?php
                            }
                            ?>
                            </select>
                    </div>
                    </td>
                        
                        <td id="cmid" style="display:none"><label>Club Member</label>
                        <td id="cmidd" style="display:none">
                   <select class="form-control input-small select2me" name="club_member_id" id="id_club_member" placeholder="Select...">
                    <option value=""></option>
                     <?php
                    foreach($fetch_registration as $data)
                    {
                        ?>
                        <option guest_name="<?php echo $data['registration']['name'];?>"  value=
                        "<?php echo $data['registration']['id'];?>">
                        <?php echo $data['registration']['id'];?> (<?php echo $data['registration']['name'];?>)</option>
                        <?php
                    }
                    ?>
                    </select>
                    </td>
                        </tr>
                        
                        
                        <?php if($booking_type==1){?>
                        <tr>
                        <td id="b_date"><label>Banquet Date</label></td>
                    <td id="b_date1">
                    <div class="form-group">
                    <input class="form-control input-small date-picker" id="b_date" value="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy" name="b_date" placeholder="Banquet Date" type="text">
                    </div>
                    </td>
                     
                               <td id="outlet"><label>Outlet/Venue </label></td>
                        <td id="outlet1"><div class="form-group"><select class="form-control input-small select2me" name="outlet_venue_id" >
                                            <option value=""></option>
                                            <?php
                            foreach($fetch_master_outlet as $data)
                            {	$out=$data['master_outlet']['id'];
                                if(in_array($out, $outlet_array))
                                {
                                    ?>
                                                <option value="<?php echo $data['master_outlet']['id'];?>"
                                                 <?php if($master_outlet_id==$data['master_outlet']['id']){ echo 'selected'; }?>>
                                                <?php echo $data['master_outlet']['outlet_name'];?>
                                                </option>
                                                <?php
                                            }}
                                            ?>
											</select></div></td>
                                        <td id="rate"><label>Rate Per Night</label></td>
                                        <td id="rate1"><div class="form-group">
                                        <input name="rate_per_night" class="form-control input-small" 
                                        value="<?php echo $rate_per_night;?>" id="rate_per_night" placeholder="Rate Per Night" type="text">
                                        </div></td></tr><?php }?>
                        
                       
                        
                        <tr>
                        <td><label>City</label></td> 
                        <td><div class="form-group"><input type="text" value="<?php echo $city; ?>" class="form-control input-inline input-small" placeholder="City" name="city"></div></td> 
                        <td><label>Nationality</label></td> 
                        
                        <td>
                    <div class="form-group">
                    <select class="form-control input-small select2me" name="nationality" id="national_id">
                    <option >Select...</option>
                    <option <?php if($nationality=='Other'){ echo 'selected'; } ?>>Other</option>
                    <option <?php if($nationality=='American'){ echo 'selected'; } ?>>American</option>
                    <option <?php if($nationality=='Australian'){ echo 'selected'; } ?>>Australian</option>
                    <option <?php if($nationality=='Afghan'){ echo 'selected'; } ?>>Afghan</option>
                    <option <?php if($nationality=='Bangladeshi'){ echo 'selected'; } ?>>Bangladeshi</option>
                    <option <?php if($nationality=='Chilean'){ echo 'selected'; } ?>>Chilean</option>
                    <option <?php if($nationality=='Chinese'){ echo 'selected'; } ?>>Chinese</option>
                    <option <?php if($nationality=='German'){ echo 'selected'; } ?>>German</option>
                    <option <?php if($nationality=='Greek'){ echo 'selected'; } ?>>Greek</option>
                    <option <?php if($nationality=='Indian'){ echo 'selected'; } ?>>Indian</option>
                    <option <?php if($nationality=='Japanese'){ echo 'selected'; } ?>>Japanese</option>
                    <option <?php if($nationality=='Pakistani'){ echo 'selected'; } ?>>Pakistani</option>
                    <option <?php if($nationality=='Russian'){ echo 'selected'; } ?>>Russian</option>
                    <option <?php if($nationality=='Saudi'){ echo 'selected'; } ?>>Saudi</option>
                    <option <?php if($nationality=='Singaporean'){ echo 'selected'; } ?>>Singaporean</option>
                    <option <?php if($nationality=='South African'){ echo 'selected'; } ?>>South African</option>
                    <option <?php if($nationality=='South Korean'){ echo 'selected'; } ?>>South Korean</option>
                    <option <?php if($nationality=='Spanish'){ echo 'selected'; } ?>>Spanish</option>
                    <option <?php if($nationality=='Sri Lankan'){ echo 'selected'; } ?>>Sri Lankan</option>
                    <option <?php if($nationality=='Zimbabwean'){ echo 'selected'; } ?>>Zimbabwean</option>
                    </select></div></td>
                        
                       <td><label>Duration<span style="color:#E02222">* </span></label></td>
                    <td><div class="form-group"><input type="text" class="form-control input-inline input-small" value="<?php echo $duration; ?>" placeholder="Duration" name="duration" id="duration" ></div></td>
                       </tr>
                       
                       
                       <tr><td><label>Telephone</label></td>
                    <td colspan="0">
                    <div class="form-group">
                    <input class="form-control input-small" value="<?php echo $telephone;?>"  name="telephone"  onkeypress="javascript:return isNumber (event)" maxlength="10" placeholder="Telephone" type="text">
                    </div>
                    </td>
                    
                    <td><label>Fax </label></td>
                    <td width="15%">
                    <div class="form-group">
                    <input name="fax" class="form-control input-small"  placeholder="fax" type="text" value="<?php echo $fax;?>">
                    </div>
                    </td>
                    <td ><label>Email </label></td>
                    <td width="18%">
                    <div class="form-group">
                    <input name="email_id" id="email_id"  placeholder="Email"  class="form-control input-small" type="text" value="<?php echo $email_id;?>">
                    </div>
                    </td></tr>
                       
                       
                        
                      <tr><td colspan="6">
                      <table width="100%" style="margin-top:5px;" id="add_data">
                      
                      <tr style="background-color:#E26A6A; color:#FFF; width:100%"><th>Room Type</th>
                      <th>Total Room</th>
                      <th>Charge</th>
                      <th>&nbsp;</th>
                      <th>Discount</th>
                      <th>New Row</th></tr>
                      <?php
                       $y=0;
                       $row_remove_id=0;
                       $expload=0;
                       $fetch_multipal_room=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_checkin_out_room_for_editt',$id), array());?><?php
                       foreach($fetch_multipal_room as $room_edit)
                       { $y++;
                       $row_remove_id++;
                      // pr($room_edit);
                         $room_type_id=$room_edit['room_reservation_no']['room_type_id'];
                        $total_room =$room_edit['room_reservation_no']['total_room'];
                        $room_charge=$room_edit['room_reservation_no']['room_charge'];
						$taxes=$room_edit['room_reservation_no']['taxes'];
						$room_discount=$room_edit['room_reservation_no']['room_discount'];
                         $edit_idd=$room_edit['room_reservation_no']['id'];
                      	?>
                        <input type="hidden" name="hidd_edit_id[]" id="delete<?php echo $row_remove_id; ?>" value="<?php echo $edit_idd; ?>" />
                                            <tr id="<?php echo $row_remove_id; ?>">
                    <td class="form-group"><label><div style="float:left; width:60%"><select class=" form-control input-small" 
                    name="room_type_id[]" onchange="room_rate();"  id="rtid<?php echo $row_remove_id; ?>" placeholder="Room Type">
                    <option value="">--Select--</option>
                    <?php
                    foreach($fetch_master_room_type as $data1)
                    {?>
                    <option value="<?php echo $data1['master_room_type']['id'];?>"
                    <?php if($data1['master_room_type']['id']==$room_type_id){ echo 'selected'; } ?>><?php echo $data1['master_room_type']['room_type'];?></option>
                    <?php
                    }
                    ?>
                    </select></div></label>
                    </td>
                    
                    
                    
                    <td class="form-group"><label><input type="text" class="form-control input-inline input-xsmall" placeholder="Total" name="total_room[]"
                     id="total_room<?php echo $row_remove_id; ?>" readonly="readonly" value="<?php echo $total_room; ?>"></label></td> 
                    <td class="form-group"><label><input type="text" class="form-control input-inline input-xsmall" placeholder="Charge"
                     name="room_charge[]" id="room_charge_id<?php echo $row_remove_id; ?>" value="<?php echo $room_charge; ?>" ></label></td>
                     
                     <td><input type="hidden" class="form-control input-inline input-xsmall" readonly="readonly" value="<?php echo $taxes; ?>" placeholder="Tax" name="taxes[]" id="tax_id<?php echo $row_remove_id; ?>"></td>
            <td class="form-group"><input type="text" class="form-control input-inline input-xsmall" value="<?php echo $room_discount; ?>" placeholder="Discount" name="room_discount[]" id="discount_id<?php echo $row_remove_id; ?>"></td>
            
                     
                    <?php if($row_remove_id==1){ ?>
                    <td><label><button type="button" onclick="add_data()" class="btn blue btn-sm" />Add Row </label></td></tr>
                    <?php } 
                    else
                    { $expload++; ?>
                   <td><label><button type="button" onclick="delete_row_data(<?php echo $row_remove_id; ?>)" class="btn red btn-sm">Delete</button></label></td>
<?php } } ?>
                    <input type="hidden" value="<?php echo $row_remove_id; ?>" id="next_id"/> 
            </table></td></tr>
            
            
             <tr> 
                    <td align="left"><label>Advance</label></td> 
                    <td><input type="text" class="form-control input-inline input-small" placeholder="Advance" name="advance" id="ad_taken" value="<?php echo $advance;?>"></td>
                    <td><label>Granted</label></td> 
                    <td><input type="text" class="form-control input-inline input-small" placeholder="Granted" name="granted" value="<?php echo $granted;?>"></td>                            
                    <td><label>Requested by</label></td>
                    <td><div class="form-group">
                        <input name="requested" class="form-control input-small" placeholder="Requested" type="text" value="<?php echo $requested;?>">
                        </div>
                    </td></tr>
                    
                    <tr>
                     <td><label>Reservation Status</label></td>
                    <td colspan="3"> <div class="form-group">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="reservation_status" value="Wait listed" <?php if($reservation_status=='Wait listed'){ ?> checked <?php }?>> Wait listed </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="reservation_status" value="Confirm" <?php if($reservation_status=='Confirm'){ ?> checked <?php }?>> Confirm</label>
                                        <label class="radio-inline">
                                        <input type="radio" name="reservation_status" value="Cancelled" <?php if($reservation_status=='Cancelled'){ ?> checked <?php }?>> Cancelled</label>
                                    </div>
                    </div>
                    </td>
                    <td><label>Remark</label></td> 
                 <td><input type="text" class="form-control input-inline" style="width:150px" placeholder="Inst." name="remarks" id="b_ins_id" value="<?php echo $remarks;?>"></td>
                    </tr>      
                    
                    <tr>
                    <td colspan="6"><center>
                    <button type="submit" name="edit_room_reservation" class="btn green" value="edit_room_reservation"><i class="fa fa-check-square"></i> Update</button>
                    <button type="reset" name="" class="btn red " value="edit_room_reservation"><i class="fa fa-level-down"></i> Cancel</button>
                    </center></td>
                     </tr>
                    </table></div></form>
                   
   			</div>
  		 </div>  
    </div>
</div>
   
   <div class="modal fade bs-modal-lg" id="basic" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add Company</h4>
										</div>
                                       
                                        <form method="post" name="add" id="add_company_registration">
										<div class="modal-body">
                                        
                                         <div class="table-responsive">
                                            <table class="table self-table" border="0" style=" width:90% !important;">
                                            <tr>
                                            <td width="15%"><label>Company Name</label></td>
                                            <td><div class="form-group">
                                                  <input type="text" class="form-control input-inline input-small" placeholder="Company Name" name="company_name"  ></div></td>
                                            <td width="15%"><label>Company Category</label></td>
                                            <td><div class="form-group"><select class="form-control select2me input-small" placeholder="Select..." name="company_category_id">
                                                                <option value="">--Select --</option>
                                                                <?php
                                                                foreach($fetch_company_category as $data)
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo $data['company_category']['id'];?>"><?php echo $data['company_category']['category_name'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                        </select></div></td>
                                            <td width="8%"><label>PAN No.</label></td>
                                            <td><input type="text" class="form-control input-inline input-small" width="80px" placeholder="PAN No." name="pan_no"  ></td>
                                            </tr>
                                          
                                            
                                            <tr>
                                            <td><label>Company Address</label></td>
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Complete Address" name="complete_address"  ></td>
                                            <td ><label>Service Tax No.</label></td>
                                            <td ><input type="text" class="form-control input-inline input-small" placeholder="Service Tax No." name="service_tax_no"  ></td>
                                            
                                            <td><label>Authorized Person Name</label></td>
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Authorized Person Name" name="authorized_person_name"  ></td></tr>
                                            <tr>
                                            <td><label>Authorized Contact No.</label></td>
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Authorized Contact No." name="authorized_contact_no" maxlength="10"  ></td>
                                            <td><label>Mobile No.</label></td>
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Mobile No." name="mobile_no"  maxlength="10"/></td>
                                           
                                            <td><label>Authorized Email id</label></td>
                                            <td colspan="2"><input type="text" class="form-control input-inline input-small" placeholder="Authorized Email id" name="authorized_email_id" ></td>
                                             </tr>
                                            <tr>
                                            
                                            <td><label>Master Plan</label></td>
                                            <td colspan="2">
                                            <div class="form-group">
                                        <select class="form-control select2me input-medium" name="master_plan_idd" id="plan_id" placeholder="Select..">
                                                <option value=""></option>
                                                <?php
                                                foreach($fetch_master_room_plan as $data)
                                                {
                                                    ?>
                                                    <option value="<?php echo $data['master_room_plan']['id'];?>"><?php echo $data['master_room_plan']['plan_name'];?></option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                             </div>
                                            </td>
                                            </tr>
                                            <tr>
                                            <td colspan="6">
                                            <div style="width:52%; float:left; ">
                                                 <div style="width:70%; float:left ">
                                                <label>Correspondence Address</label>
                                              
                                                <textarea class="form-control" rows="2" cols="3" id="c_address" name="c_address"></textarea>
                                                </div>
                                                <div style="width:20%; float:right ">
                                                <br />
                    
                                                <label class="checkbox-inline" >
                                                
                                                <input type="checkbox" name="same" onclick="same_as()" id="same"/>Same as
                                                Correspondence
                                                </label>
                                                </div>
                                            </div>
                                           
                                            <div style="width:35%; float:right">
                                            <label>Permanent Address</label>
                                            
                                            <textarea class="form-control" cols="3" rows="2" id="p_address"  name="p_address"></textarea>
                                            </div></td>
                                            </tr>
                                        
                                            </table>
                                         </div>
                                        
                                        </div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
			<button type="submit" name="add_company_registration" class="btn green" value="add_company_registration"><i class="fa fa-plus"></i> Add</button>										</div></form>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>      </div>



    <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
	
	function room_rate()
	{ 
		var ar = [];
		var next_id = $("#next_id").val();
		var company_id=$("select[name=company_id]").val();
		var room_type_id=$("#rtid"+ next_id).val();
		var plan_id=$("select[name=plan_id]").val();
		ar.push(company_id,room_type_id,plan_id);
		var myJsonString = JSON.stringify(ar);
		//alert( myJsonString);
		$.ajax({
		url: "ajax_php_file?fatch_room_vacantreservation=1&q="+myJsonString,
		type: "POST",
		success: function(data)
		{
		var da=data.split(",");		
		
			$("#room_charge_id"+ next_id).val(da[0]);
			$("#tax_id"+ next_id).val(da[1]);
			$("#discount_id"+ next_id).val(da[2]);
		}
		});
	}
////////////////////
	function count()
	{
	var next_id = $("#next_id").val();
	var options = document.getElementById('m2_id'+next_id).options, count = 0;
	for (var i=0; i < options.length; i++) {
	if (options[i].selected) 
	count++;
	$('#total_room'+next_id).val(count);
	}
	var dis=0;
	var duration=eval($("#duration").val());
		var total_room=eval($("#total_room"+next_id).val());
		var room_charge=eval($("#room_charge_id"+next_id).val());
		var tot_amt= eval(duration * total_room * room_charge);
		tot_amt = Math.round(tot_amt);
		$("#tg"+next_id).val(tot_amt);
		
		var total_room1=eval($("#total_room1").val());
		
		if(total_room1>1){
			var tot= $("#tg"+next_id).val();
			$("#gross_amount").val(tot);
		}
		else if(next_id>1)
		{
			var row=0;
			for(var j=1; j<=next_id; j++)
			{	
				row+= parseFloat($("#tg"+j).val());
				$("#gross_amount").val(row);
			}
		}
		else
		{ var tot= $("#tg"+next_id).val();
			$("#gross_amount").val(tot);
		}
	}
		<!---------------------------------Add Row Function------------------>		
	/*function delete_row_data(id)
	{
		var nax =  parseInt(id) -  parseInt(1) ;
		var tot= $("#tg"+id).val();
		var gross_amount= $("#gross_amount").val();
		var total_gross =  parseInt(gross_amount) -  parseInt(tot) ;
		$("#gross_amount").val(total_gross);
			$("#"+id).remove();
			$("#next_id").val(nax);
	}*/
	
	function delete_row_data(id)
	{ 
	var ar = [];
		var next_id = $("#next_id").val();
		var delete_data = $("#delete"+id).val();
		
		$.ajax({

		url: "ajax_php_file?checkin_data_deleteroww=1&delete="+delete_data,
		type: "POST",
		success: function(data)
		{ //alert(data);
			$("#"+id).remove();
			//$(".page-spinner-bar").addClass(" hide");
		}
		});
	}
	
	function add_data()
	{	
		var next_id=$("#next_id").val();
		$.ajax({
			url: "ajax_php_file?checkin_add_dt=1&q="+next_id,
			type: "POST",         
			success: function(data)
			{	
			var da = parseInt(next_id) + parseInt(1);
				$("#add_data tr:last").after(data);
				$("#next_id").val(da)
				$('select').select2();
			}
			});
		
	}
		<!---------------------------------address Function------------------>
	function same_as()
	{
		if($("#same").is(":checked"))
		{
			var c_address=$("#c_address").val();
			$("#p_address").val(c_address);
		}
		else
		{
			$("#p_address").val('');
		}
	}
	function res_no()
	{
	var id=$("select[name=room_reservation_id]").val();
	$.ajax({
	url: "ajax_php_file?check_id_res_no_ftc=1&q="+id,
	type: "POST",         
	success: function(data)
	{
		var da=data.split(",");
		var c_id=da[3];
		var r_id=da[6];
		var p_id=da[7];
		var bookingtype = da[0];
		//alert(bookingtype);
		if(bookingtype == 'Company'){
			//alert(bookingtype);
			$("input:radio[id=company]").prop('checked', true);
			$("input:radio[id=company]").parent().addClass("checked");
			$('#cnameid1').show();
			$('#cnameid2').show();
			}
		if(bookingtype=='Direct'){
			$("input:radio[id=direct]").prop('checked', true);
			$("input:radio[id=direct]").parent().addClass("checked");
			$('#cnameid1').hide();
			$('#cnameid2').hide();
			}
		if(bookingtype=='Travel Agent'){
				$("input:radio[id=travelagent]").prop('checked', true);
			$("input:radio[id=travelagent]").parent().addClass("checked");
			$('#cnameid1').hide();
			$('#cnameid2').hide();
			$('#travel1').show();
			$('#travel2').show();
				}
		$("#arr_id").val(da[1]);
		$("#dep_id").val(da[2]);
		$('#cp_id option[value="' + da[3] + '"]').prop('selected', true);
		$("#gname_id").val(da[4]);
		$("#national_id").val(da[5])
		$('#rtid option[value="' + da[6] + '"]').prop('selected', true);
		$('#plid option[value="' + da[7] + '"]').prop('selected', true);
		$("#ad_taken").val(da[8]);
		$("#b_ins_id").val(da[9]);
		$("#rate").val(da[10]);
		$("#traveller_name").val(da[11]);
		$("#id_proof_no").val(da[12])
		//$("#room_charge_id").val(da[10]);
		room_rate();
	}		
	})
	}
	
	$(document).ready(function(){
		$("#company").click(function(){
		$('#cnameid1').show();
		$('#cnameid2').show();
		});
		$("#direct").click(function(){
		$('#cnameid1').hide();
		$('#cnameid2').hide();
		});
		$("#travelagent").click(function(){
		$('#cnameid1').hide();
		$('#cnameid2').hide();
		$('#travel1').show();
		$('#travel2').show();
		});
	});
	function valid()
	{	var a_date=$("#arr_id").val();
		var d_date=$("#dep_id").val();
		
		var dateParts = a_date.split("-");
		var date = new Date(dateParts[2], (dateParts[1] - 1), dateParts[0]);
		var d=new Date(dateParts);
		var arival_date=d.getTime();
		
		var dateParts1 = d_date.split("-");
		var date1 = new Date(dateParts1[2], (dateParts1[1] - 1), dateParts1[0]);
		var d1=new Date(dateParts1);
		var dep_date=d1.getTime();
		
		if(arival_date>dep_date)
		{
			alert("Arrival Date should not be greater. Please Check.");
			$("#dep_id ").val('');
		}
	}
	
	
</script>
 <script> 
$(document).ready(function()
			{
  <?php
            if($active==2 || $active==1)
            { 
                if($active==2)
                {
                    if(@$active_delete==1)
                    {
                        $contain="Delete successfully...!";
                        $cls='toast-error';
                    }
                    else
                    {
                        $contain="Update successfully...!";
                        $cls='toast-info';
                    }
                }
                else
                {
                    $contain="Checkin successfully...!";
                    $cls='toast-success';
                }
         ?>
					$(".toast").addClass("<?php echo $cls; ?>");
					$(".toast-message").html("<?php echo $contain; ?>");
					$("#toast-container").show();
					var myVar=setInterval(function(){myTimer()},5000);
					function myTimer() 
					{ $("#toast-container").hide();
					 }  
			<?php } ?>
			});


</script> 

