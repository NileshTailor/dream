<?php
if(empty($active))
{ $active='';
}
    foreach($fetch_room_checkin_checkout as $data)
    {	
       $id_room_checkin_checkout=$data['room_checkin_checkout']['id'];
        $guest_name=$data['room_checkin_checkout']['guest_name'];
        $room_booking_type=$data['room_checkin_checkout']['room_booking_type'];
        $permanent_address=$data['room_checkin_checkout']['permanent_address'];
         $card_no=$data['room_checkin_checkout']['card_no'];
        $traveller_name=$data['room_checkin_checkout']['traveller_name'];
        $id_proof_no=$data['room_checkin_checkout']['id_proof_no'];
        $source_of_booking=$data['room_checkin_checkout']['source_of_booking'];
        $arriving_from=$data['room_checkin_checkout']['arriving_from'];
        $room_type_id=$data['room_checkin_checkout']['room_type_id'];
        $next_destination=$data['room_checkin_checkout']['next_destination']; 
        $nationality=$data['room_checkin_checkout']['nationality'];
        $cmpny=$data['room_checkin_checkout']['company_id'];
        $city=$data['room_checkin_checkout']['city'];
        $duration=$data['room_checkin_checkout']['duration']; 
        $plan_id=$data['room_checkin_checkout']['plan_id']; 
        $arrival_date=$data['room_checkin_checkout']['arrival_date'];
		 $mobile_no=$data['room_checkin_checkout']['mobile_no'];
		  $email_id=$data['room_checkin_checkout']['email_id'];
        
        if($arrival_date=='0000-00-00')
        {	$arrival_date='';}
        else
        { $arrival_date=date("d-m-Y", strtotime($arrival_date)); }
        $checkout_date=$data['room_checkin_checkout']['checkout_date'];
        if($checkout_date=='0000-00-00')
        {	$checkout_date='';}
        else
        { $checkout_date=date("d-m-Y", strtotime($checkout_date)); }
         $arrival_time=$data['room_checkin_checkout']['arrival_time'];
        $room_discount=$data['room_checkin_checkout']['room_discount'];
        $pax=$data['room_checkin_checkout']['pax'];    
        $room_charge=$data['room_checkin_checkout']['room_charge'];
        $taxes=$data['room_checkin_checkout']['taxes'];
        $advance_taken=$data['room_checkin_checkout']['advance_taken'];
        $child=$data['room_checkin_checkout']['child'];
        $id_proof=$data['room_checkin_checkout']['id_proof'];
        $billing_instruction=$data['room_checkin_checkout']['billing_instruction'];
        $room_reservation_id=$data['room_checkin_checkout']['room_reservation_id'];
        $total_room_expload=$data['room_checkin_checkout']['total_room'];
        
        $total_room=explode(',',$total_room_expload);
        $no_of_row=sizeof($total_room);
        
        $charge_expload=$data['room_checkin_checkout']['room_charge'];
        $charge=explode(',',$charge_expload);
        
        $tg_expload=$data['room_checkin_checkout']['tg'];
        $tg=explode(',',$tg_expload);
        $master_room_type_expload=$data['room_checkin_checkout']['room_type_id'];
        $master_room_type=explode(',',$master_room_type_expload);
		
	/*///////////////////////////////*/
	$room_discount_expload=$data['room_checkin_checkout']['room_discount'];
        $room_discount=explode(',',$room_discount_expload);
		
		$taxes_expload=$data['room_checkin_checkout']['taxes'];
        $taxes=explode(',',$taxes_expload);
		
		$master_room_plan_expload=$data['room_checkin_checkout']['plan_id'];
        $master_room_plan_id=explode(',',$master_room_plan_expload);
	
	/*.................................*/
        
         $master_roomno_id=$data['room_checkin_checkout']['master_roomno_id']; 
         $all_wth = explode("-",$master_roomno_id);
     $master_roomno_id=$data['room_checkin_checkout']['master_roomno_id'];   
     }

 
     
	?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title"> Checkin </div><div class="toast-message"> </div></div></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <div class="tab-content">
                    <form method="post" name="add" id="checkinaddform">
                   
                   	 <div class="table-responsive">
                     <table class="table self-table" style=" width:90% !important;" border="0">
                      <!--<tr>
                        <td colspan="6" align="center"><div class="form-group">
                        <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="room_booking_type" id="s_book_id" value="Single Room Booking"
                            <?php if($room_booking_type=='Single Room Booking'){ ?> checked <?php }?>> Single Room Booking </label>
                            <label class="radio-inline">
                            <input type="radio" name="room_booking_type" id="g_book_id" value="Group Room Booking"
                            <?php if($room_booking_type=='Group Room Booking'){ ?> checked <?php }?>> Group Room Booking	 </label>
                            
                        </div>
						</div>
                        </td></tr>-->
                           
                        <tr style="background-color:#E26A6A; color:#FFF">
                        
                        <input type="hidden" value="<?php echo $id_room_checkin_checkout;?>" name="id" id="id" />
                        <!--<td width="100%"><span style="color:#F00 !important;" class="caption-subject font-green-sharp bold uppercase"><h6><strong>Single Booking</strong></h6></span></td>-->   
                        <td><select class=" form-control input-small select2me" name="room_reservation_id" onchange="res_no();" placeholder="Select..">
                        <option value="">Res. No.</option>
                        <?php
                        foreach($fetch_room_reservation as $data)
                        { ?>
						<option <?php if($data['room_reservation']['id']==$room_reservation_id){ echo 'selected'; } ?>
                              value="<?php echo $data['room_reservation']['id'];?>"><?php echo $data['room_reservation']['id'];?> (<?php echo $data['room_reservation']['name_person'];?>)</option>
                            <?php
                          
                        }
                        ?>
                        </select></td>
                        
                                                   
                         
                        <td colspan="2" align="right"><label>Source of Booking</label></td>
                            <td colspan="3" align="left">
                            <div class="form-group">
                            <div class="radio-list" >
                                <label class="radio-inline">
                                <input type="radio" <?php if($source_of_booking=='Direct'){ ?> checked <?php }?> name="source_of_booking" value="Direct" 
                                 id="direct"> Direct </label>
                                 <label class="radio-inline">
                                <input type="radio"<?php if($source_of_booking=='Company'){ ?> checked <?php }?> name="source_of_booking" value="Company"
                                  id="company"> Company </label>
                                <label class="radio-inline">
                                <input type="radio" <?php if($source_of_booking=='Travel Agent'){ ?> checked <?php }?> name="source_of_booking" value="Travel Agent"
                                 id="travelagent"> Travel Agent  </label>
                            </div>
						</div>
                        </td></tr>
                            
                            <tr> 
                            <td align="left" width="12%"><label>Card No.</label></td> 
                            <td>
                            <div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Card No." id="ccc" name="card_no" value="<?php echo $card_no; ?>" readonly/></div>
                            </td>
                            <td><label>Arrival Date<span style="color:#E02222">* </span></label></td> 
                            <td><div class="form-group"><div class="input-group">
                            <input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="arrival_date" onchange="valid()" id="arr_id"  value="<?php echo $arrival_date; ?>">
                            </div></div></td>
                             <td><label>Departure Date<span style="color:#E02222">* </span></label></td> 
                            <td><input type="text" class="form-control input-inline input-small date-picker" onchange="valid()"  data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="checkout_date" id="dep_id" data-date="00-00-0000" value="<?php echo $checkout_date; ?>"></td></tr>
                            
                            <tr>
                             <td><label>Guest Name<span style="color:#E02222">* </span></label></td> 
                        <td><div class="form-group"><input type="text" value="<?php echo $guest_name; ?>" class="form-control input-inline input-small" placeholder="Guest Name" name="guest_name" id="gname_id"></div>                          </td>
                            
                        <td id="cnameid1"><label>Company Name<span style="color:#E02222">* </span></label></td> 
                        <td id="cnameid2"><div style="float:left; width:60%"><select class=" form-control input-small" name="company_id" onchange="room_rate();" id="cp_id" placeholder="Company">
                        <option value="">-Select--</option>	
                        <?php
                        foreach($fetch_company_registration as $data1)
                        {
                        ?>
                        <option  <?php if($data1['company_registration']['id']==$cmpny){ echo 'selected'; } ?>
                         value="<?php echo $data1['company_registration']['id'];?>"><?php echo $data1['company_registration']['company_name'];?></option>
                        <?php
                        }
                        ?>
                        </select></div>
                        <div style="width:23%; float:right"><a class="btn green"  data-toggle="modal" href="#basic"><i class="fa fa-plus"></i></a></div>
                        </td>
                        
                    
                    <td id="travel1" style="display:none"><label>Traveller Name</label></td>
                    <td colspan="2" id="travel2" style="display:none">
                    <div class="form-group">
                    <input class="form-control input-small" id="traveller_name" value="<?php echo $traveller_name;?>"  name="traveller_name" placeholder="Traveller" type="text">
                    </div>
                    </td>
                        </tr>
                        <tr>
                        <td><label>Arrival Time<span style="color:#E02222">* </span></label></td> 
                            <td><div class="input-group">
                                <input class="form-control  input-inline input-small timepicker timepicker-no-seconds" type="text" placeholder="Arrrival Time"
                                value="<?php echo $arrival_time; ?>" name="arrival_time" >
                                
                              </div><!--<input type="text" class="form-control input-inline input-small" placeholder="Arrrival Time" name="arrival_time" >-->
                            </td>
                       
                        <td><label>Arriving From</label></td> 
                        <td><input type="text"value="<?php echo $arriving_from; ?>" class="form-control input-inline input-small" placeholder="Arriving From" name="arriving_from" ></td>
                        
                        <td><label>Next Destination</label></td> 
                        <td><input type="text" class="form-control input-inline input-small"alue="<?php echo $next_destination; ?>" placeholder="Next Destination" name="next_destination" ></td>
                        </tr>
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
                        <tr>
                        <td><label>Permanent Address</label></td> 
                        <td><input type="text" class="form-control input-small" value="<?php echo $permanent_address; ?>" placeholder="Permanent Address" name="permanent_address" ></td>
                    <td><label>Mobile No.</label></td>
                    <td>
                    <div class="form-group"><input class="form-control input-small"  name="mobile_no" value="<?php echo $mobile_no; ?>"  onkeypress="javascript:return isNumber (event)" maxlength="10" placeholder="Mobile No." type="text"></div>
                    </td>
                    <td><label>Email Id</label></td>
                    <td>
                    <input class="form-control input-small" value="<?php echo $email_id; ?>"  name="email_id" placeholder="Email ID" type="text">
                    </td>
                    </tr>
                        
                        
                      <tr><td colspan="6">
                      <table width="100%" style="margin-top:5px;" id="add_data">
                      
                      <tr style="background-color:#E26A6A; color:#FFF"><th>Room Type</th>
                      <th>Room Plan</th>
                      <th>Room No.</th>
                      <th>Total Room</th>
                      <th>Charge</th>
                      <th></th>
                      <th>Disc.(%)</th>
                      <th>amount</th>
                      <th>New Row</th></tr>
                      <?php
                       $y=0;
                       $row_remove_id=0;
                       $expload=0;
                       $fetch_multipal_room=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_checkin_out_room_for_edit',$card_no), array());?><?php
                       foreach($fetch_multipal_room as $room_edit)
                       { $y++;
                       $row_remove_id++;
                      // pr($room_edit);
                         $room_type_id=$room_edit['room_checkin_checkout']['room_type_id'];
						 $plan_id=$room_edit['room_checkin_checkout']['plan_id'];
						 $room_discount=$room_edit['room_checkin_checkout']['room_discount'];
						 $taxes=$room_edit['room_checkin_checkout']['taxes'];
                        $master_roomno4=$room_edit['room_checkin_checkout']['master_roomno_id'];
                        $total_room =$room_edit['room_checkin_checkout']['total_room'];
                        $room_charge=$room_edit['room_checkin_checkout']['room_charge'];
                        $duration=$room_edit['room_checkin_checkout']['duration'];
                        $amount = $room_charge * $duration;
                         $edit_idd=$room_edit['room_checkin_checkout']['id'];
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
                    
                    
        <td><div class="form-group" style="float:left; width:50%"><select class=" form-control input-small" name="plan_id[]" onchange="room_rate();" id="plid<?php echo $row_remove_id; ?>" placeholder="Plan Name">
                    <option value="">-Select--</option>
                    <?php
                    foreach($fetch_master_room_plan as $data1)
                    {
                        ?>
                        <option  value="<?php echo $data1['master_room_plan']['id'];?>"<?php if($data1['master_room_plan']['id']==$plan_id){ echo 'selected'; } ?> >
                        <?php echo $data1['master_room_plan']['plan_name'];?></option>
                        <?php
                    }
                    ?>
                    </select></div>
                    </td>
                    
                       
                        <td class="form-group"><select class="form-control select2 select2_sample2 input-small"
                         name="master_roomno_id[]" id="m2_id<?php echo $row_remove_id; ?>" multiple placeholder="Select Room No." onchange="count();">
                        <?php
                        foreach($fetch_master_roomno as $data2)
                        {	
                            $room_no=$data2['master_roomno']['room_no'];
                            ?><option value="<?php echo $room_no;?>" <?php if($room_no==$master_roomno4){ echo 'selected'; } ?> >
                                <?php echo $room_no; ?></option>
                            <?php 
                        }
                        ?>
                   </select>
                    </td>
                    
                    <td class="form-group"><label><input type="text" class="form-control input-inline input-xsmall" placeholder="Total" name="total_room[]"
                     id="total_room<?php echo $row_remove_id; ?>" readonly="readonly" value="<?php echo $total_room; ?>"></label></td> 
                    <td class="form-group"><label><input type="text" readonly="readonly" class="form-control input-inline input-xsmall" placeholder="Charge"
                     name="room_charge[]" id="room_charge_id<?php echo $row_remove_id; ?>" value="<?php echo $room_charge; ?>" ></label></td>
                 <td><input type="hidden" readonly="readonly" value="<?php echo $taxes; ?>" class="form-control input-inline input-xsmall" placeholder="Tax" name="taxes[]" id="tax_id<?php echo $row_remove_id; ?>" ></td>
           <td> <input type="text" value="<?php echo $room_discount; ?>" class="form-control input-inline input-xsmall" placeholder="Discount" name="room_discount[]" id="discount_id<?php echo $row_remove_id; ?>" > </td>			
                  
                    <td><input type="text" value="<?php echo $amount; ?>" class="form-control input-inline input-xsmall" placeholder="amount" 
                    readonly="readonly" name="tg[]" id="tg<?php echo $row_remove_id; ?>"></td>
                  
                 <?php if($row_remove_id==1){ ?>
                    <td><label><button type="button" onclick="add_data()" class="btn blue btn-sm" />Add Row </label></td></tr>
                    <?php } 
                    else
                    { $expload++; ?>
                   <td><label><button type="button" onclick="delete_row_data(<?php echo $row_remove_id; ?>)" class="btn red btn-sm">Delete</button></label></td>
<?php } } ?>
                    <input type="hidden" value="<?php echo $row_remove_id; ?>" id="next_id"/> 
            </table></td></tr>
            
            
            <tr style="border-top:groove 5px; border-color:#CCC">
            
                <td align="left"><label>Advance</label></td> 
                    <td><input type="text" class="form-control input-inline input-small" value="<?php echo $advance_taken;?>" placeholder="Advance" name="advance_taken" id="ad_taken"></td>
                   
                    <td><label>PAX</label></td> 
                    <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Pax"  value="<?php echo $pax;?>" name="pax"></div></td>                            
                    <td><label>Child</label></td> 
                    <td><input type="text" class="form-control input-inline input-small" placeholder="Child" name="child" value="<?php echo $child;?>"></td></tr>
                    
                    <tr>
                    <td><label>ID Proof</label></td>
                    <td><select class=" form-control input-small" style="width:200px;" name="id_proof">
                    <option value="">--Select Guest ID--</option>
                    <option <?php if($id_proof=='Adhar Card'){ echo 'selected'; } ?>>Adhar Card</option>
                    <option <?php if($id_proof=='Pan Card'){ echo 'selected'; } ?>>Pan Card</option>
                    <option <?php if($id_proof=='Company ID Card'){ echo 'selected'; } ?>>Company ID Card</option>
                    <option <?php if($id_proof=='Passport'){ echo 'selected'; } ?>>Passport</option>
                    <option <?php if($id_proof=='Voter ID Card'){ echo 'selected'; } ?>>Voter ID Card</option>
                    <option <?php if($id_proof=='Driving Licence'){ echo 'selected'; } ?>>Driving Licence</option>
                    </select>
                    </td>
                    <td><label>ID Proof No.</label></td> 
                  <td><input type="text" class="form-control input-inline" value="<?php echo $id_proof_no;?>" placeholder="ID Proof No." name="id_proof_no" id="id_proof_no"></td>
                   <td><label>Remark</label></td> 
                  <td colspan="3"><input type="text" class="form-control input-inline" style="width:150px"  value="<?php echo $billing_instruction;?>" placeholder="Inst." name="billing_instruction" id="b_ins_id"></td>
                  </tr>
                  
                  <!--<tr>
                    <td align="left" colspan="2"><label>
                    <input name="apply_special_rates" type="checkbox" value="1" id="apply_special_rates" checked/> Apply Special Rates</label></td>
                    <td></td><td></td><td></td><td></td></tr>-->
                    
                    <tr>
                    <td colspan="6"><center>
                    <button type="submit" name="edit_room_checkin" class="btn green" value="edit_room_checkin"><i class="fa fa-check-square"></i> Update</button>
                    <button type="reset" name="" class="btn red " value="add_master_room"><i class="fa fa-level-down"></i> Cancel</button>
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
							</div>      



    <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
	
	function room_rate()
	{ 
		var ar = [];
		var next_id = $("#next_id").val();
		var company_id=$("select[name=company_id]").val();
		var room_type_id=$("#rtid"+ next_id).val();
		var plan_id=$("#plid"+ next_id ).val();
		ar.push(company_id,room_type_id,plan_id);
		var myJsonString = JSON.stringify(ar);
		//alert( myJsonString);
		$.ajax({
		url: "ajax_php_file?fatch_room_vacantcheckin=1&q="+myJsonString,
		type: "POST",
		success: function(data)
		{
		var da=data.split(",");		
		
			$("#room_charge_id"+ next_id).val(da[0]);
			//alert(da[0]);
			
			$("#discount_id"+ next_id).val(da[1]);
			$("#tax_id"+ next_id).val(da[2]);
			$("#amount"+next_id).val('');
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
		url: "ajax_php_file?checkin_data_deleterow=1&delete="+delete_data,
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
			url: "ajax_php_file?checkin_add_data=1&q="+next_id,
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
		$("#id_proof_no").val(da[12]);
		
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

