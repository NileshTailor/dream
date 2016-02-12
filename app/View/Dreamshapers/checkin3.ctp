<div id="message"></div>
  <div ng-spinner-bar="" class="page-spinner-bar hide">
		<div class="bounce1"></div>
		<div class="bounce2"></div>
		<div class="bounce3"></div>
	</div>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-noborder">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab"> Add </a>
                </li>
                
                <li class="">
                    <a  aria-expanded="false"href="#tab_1_4" data-toggle="tab"> View </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab_1_1">
                    <form method="post" name="add">
                   
                   	 <div class="table-responsive">
                     
                    	<table class="table self-table" style=" width:100% !important;" border="0">
                        
                        <tr>
                                            <td><label>Reg. Card No.</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Card No." name="card_no" ></td>
                                            
                                            <td><label>Res. Sno.</label></td>
                                            <td><select class=" form-control input-small" name="room_reservation_id" onchange="res_no()">
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_room_reservation as $data)
                                            {
                                            	?>
                                                <option  value="<?php echo $data['room_reservation']['id'];?>"><?php echo $data['room_reservation']['id'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></td>
                                            
                                            
                                            <td><label>Arrival Date</label></td> 
                                            <td><div class="input-group"><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="arrival_date" ></div></td>
                                            
                                            <td><label>Arrival Time</label></td> 
                                            <td><div class="input-group">
												<input class="form-control  input-inline input-small timepicker timepicker-no-seconds" type="text" placeholder="Arrrival Time" name="arrival_time" >
												
                                              </div><!--<input type="text" class="form-control input-inline input-small" placeholder="Arrrival Time" name="arrival_time" >--></td></tr>
                                     
                                            
                        <tr>
                                            
                                             
                                            <td><label>Company Name</label></td> 
                                           <td><select class=" form-control input-small" name="company_id" onchange="room_rate()" id="c_id">
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_company_registration as $data)
                                            {
                                            	?>
                                              <option  value="<?php echo $data['company_registration']['id'];?>"><?php echo $data['company_registration']['company_name'];?><option>
                                                <?php
                                            }
                                            ?>
											</select></td>
                                            
                                            <td><label>Guest Name</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Guest Name" name="guest_name" id="gname_id"></td>
                                            <td><label>Arriving From</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Arriving From" name="arriving_from" ></td>
                                            <td><label>Next Destination</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Next Destination" name="next_destination" ></td>
                                            
                                            
                                             </tr>
                                             
                                             
                                             
                                              <tr>
                                              
                                            <td rowspan="2"><label>Permanent Address</label></td> 
                                            <td colspan="3" rowspan="2"><textarea rows="3" name="permanent_address" class="form-control input-inline input-large" ></textarea></td>
                                          <td><label>City</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="City" name="city" ></td> 
                                           <td><label>Nationality</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Nationality" name="nationality" id="national_id" ></td>
                                             
                                           </tr>
                                           
                                           <tr>
                                           
                                           <td><label>Duration</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" placeholder="Duration" name="duration" ></td>
                                            
                                            <td><label>Check Out Date</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small date-picker" placeholder="DD-MM-YYYY" name="checkout_date" ></td>
                                           
                                             </tr>
                                             
                                              <tr>
                                            
                                              <tr>
                                              
                                               <td><label>Room Type</label></td>
                                            <td><select class=" form-control input-small" 
                                            name="room_type_id" onchange="room_no()">
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_master_room_type as $data)
                                            {
                                            	?>
                                                <option value="<?php echo $data['master_room_type']['id'];?>"><?php echo $data['master_room_type']['room_type'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></td>
                              
                                            
                                              <td><label>Room No.</label></td>
                                            <td><select class=" form-control input-small" name="master_roomno_id" 
                                             id="m_id">
                                <option value="">--- Select ---</option>
									<?php
									foreach($fetch_master_roomno as $data)
                                    {
										$room_no=$data['master_roomno']['room_no'];
										$room_no_explode=explode(',', $room_no);
									   foreach($room_no_explode as $room_nos)
										{
											?>
											 <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
										<?php
										}
									}
                                   
                                    ?>
                                </select>
                                    </td>
                        <?php 
                        
                                    ?>
                                   
                                            <td><label>Plan</label></td> 
                                            <td><select class=" form-control input-small" name="plan_id" onchange="room_rate()">
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_master_room_plan as $data)
                                            {
                                            	?>
                                                <option  value=
                                                "<?php echo $data['master_room_plan']['id'];?>">
                                                <?php echo $data['master_room_plan']['plan_name'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></td>   
                                            <td><label>Pax</label></td> 
                         					<td><input type="text" class="form-control input-inline input-small" placeholder="Pax" name="pax" ></td>                            
                                            </tr>
                                     
                                             
                                             
                                             <tr> <td><label>Source of Booking</label></td>
                                        <td colspan="5"><div class="form-group">
										<div class="radio-list" >
											<label class="radio-inline">
											<input type="radio" name="source_of_booking" value="direct" checked="checked"> Direct </label>
											<label class="radio-inline">
											<input type="radio" name="source_of_booking" value="company"> Company </label>
                                            <label class="radio-inline">
											<input type="radio" name="source_of_booking" value="walkin"> Walk-In </label>
											<label class="radio-inline">
											<input type="radio" name="source_of_booking" value="travelagent"> Travel Agent  </label>
										</div>
						</div>
                        </td>
                                        <td><label>Room Charge</label></td> 
                                        <td><input type="text" class="form-control input-inline input-small" placeholder="Room Charge" name="room_charge" id="room_charge_id" ></td> 
                                        </tr>
                                       
                                        <tr>
                                         <td align="left"><label>Advance</label></td> 
                                        <td><input type="text" class="form-control input-inline input-small" placeholder="Advance" name="advance_taken" ></td>
                                         
                                        <td><label>Child</label></td> 
                                        <td><input type="text" class="form-control input-inline input-small" placeholder="Child" name="child" ></td>
                                        <td><label>Billing Inst.</label></td> 
                                        <td colspan="2"><input type="text" class="form-control input-inline input-large" placeholder="Billing Inst." name="billing_instruction" ></td>
                                        
                                        <td><lable>
                                        <input name="apply_special_rates" type="checkbox" value="1" id="apply_special_rates" checked/> Apply Special Rates</label></td></tr>
                                                             
                                        <tr>
                                        <td>&nbsp;</td>
                                        <td colspan="6"><center>
                                        <button type="submit" name="add_room_checkin_checkout" class="btn green" value="add_room_checkin_checkout"><i class="fa fa-plus"></i> Add</button>
                                        <button type="reset" name="" class="btn red " value="add_master_room"> Cancel</button>
                                        
                                        </center></td>
                                        <td>&nbsp;</td>
                                        </tr>
                                        </table>
                                 </div>
                           </form>
                    
                </div>
                
                
                
                
                
                
           
  <div class="tab-pane fade" id="tab_1_4">
                     	 <div class="table-responsive">

  <table class="table table-striped table-bordered table-hover" id="sample_1" width="100%">
	<thead>
    <tr>
        <th>S. No</th>
        <th>Reg. Card no</th>
        <th> Resv. No.</th>
        <th> Arrival Date</th>
        <th> Arrival Time</th>
        <th>Company Name</th>
        <th>Guest Name</th>
        <!--<th>Address</th>
        <th>Arriving From</th>
        <th>Next Destination</th>
        <th>Nationality</th>
        <th>City</th>
        <th>Duration</th>-->
        <th>Checkout Date</th>
        <th>Room No.</th>
        <th>Room Type</th>
        <th>Plan Name</th>
       <!-- <th>Pax</th>
        <th>Source of Booking</th>-->
        <th>Room Charge</th>
        <th>Advance</th>
        <!--<th>Child</th>
        <th>Billing Inst.</th>
       <th>Apply Special Rates</th>-->
        <th>InfoBill</th>
        <th>Edit</th>
        <th>Delete</th>
        
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
        
        <td><?php echo $i; ?></td>
        <td><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['room_reservation_id']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
        <td><?php echo $data['room_checkin_checkout']['arrival_time']; ?></td>
        <td><?php
        echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$data['room_checkin_checkout']['company_id']), array()); ?></td>
        <td><?php echo $data['room_checkin_checkout']['guest_name']; ?></td>
        <!--<td><?php echo $data['room_checkin_checkout']['permanent_address']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['arriving_from']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['next_destination']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['nationality']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['city']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['duration']; ?></td>-->
        <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['checkout_date'])); ?></td>
        <td><?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></td>
                  <td><?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['room_checkin_checkout']['room_type_id']), array()); ?></td>
                  
                  <td><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['room_checkin_checkout']['plan_id']), array()); ?></td>

        <!--<td><?php echo $data['room_checkin_checkout']['pax']; ?>
        
        <td><?php echo $data['room_checkin_checkout']['source_of_booking']; ?></td>-->
        <td><?php echo $data['room_checkin_checkout']['room_charge']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['advance_taken']; ?></td>
        <!--<td><?php echo $data['room_checkin_checkout']['child']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['billing_instruction']; ?></td>
        <td><?php  if($data['room_checkin_checkout']['apply_special_rates']==1){ echo 'Apply'; } else { echo 'Not Apply'; } ?></td>-->
        <td>
        <a href="infobill?id=<?php echo $id_room_checkin_checkout; ?>" target="_blank" class="btn default btn-xs blue-stripe">Print</a>
</td>
       
        <td>									<a class="btn default btn-xs blue-stripe" data-toggle="modal" href="#popup_<?php echo $id_room_checkin_checkout; ?>"> Edit </a>
        
        
                                       <div class="modal fade bs-modal-lg" id="popup_<?php echo $id_room_checkin_checkout; ?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-full">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
                                        
										<div class="modal-body">
											                     <form method="post" name="edit_<?php echo $id_room_checkin_checkout; ?>">
                                                               	 <div class="table-responsive">

                                            
                                            <table class="table self-table" style=" width:100% !important;" border="0">
                        
                        <tr>
                        <input type="hidden" name="checkin_id" value="<?php echo $id_room_checkin_checkout; ?>" id="edit_checkin_id" />
                                            <td><label>Reg. Card No.</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" 
                                            placeholder="Card No." name="edit_card_no" value="<?php echo $data['room_checkin_checkout']['card_no']; ?>" id="edit_card_no" ></td>
                                            
                                            
                                            <td><label>Res. no.</label></td> 
                                            <td><select class=" form-control input-small" name="edit_room_reservation_id" onchange="res_nos();">
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_room_reservation as $data4)
                                            {
                                            	?>
                                                <option  value="<?php echo $data4['room_reservation']['id'];?>" 
                                                <?php if($data4['room_reservation']['id']==$data['room_checkin_checkout']['room_reservation_id']){ echo 'selected'; } ?>><?php echo $data4['room_reservation']['id'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></td>
                                            
                                            <td><label>Arrrival Date</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="Arrival Date" name="edit_arrival_date" value="<?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?>" id="edit_arrival_date" ></td>
                                            
                                            <td><label>Arrival Time</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" 
                                            placeholder="Arrrival Time" name="edit_arrival_time" value="<?php echo $data['room_checkin_checkout']['arrival_time']; ?>" id="edit_arrival_time" ></td></tr>
                                     
                                            
                        <tr>
                                            
                                             
                                            <td><label>Company Name</label></td> 
                                           <td><select class=" form-control input-medium" 
                                           name="edit_company_id" onchange="room_rates()">
                                            <option value="">---Select---</option>
                                            <?php
                                            foreach($fetch_company_registration as $data1)
                                            {
                                            	?>
                                                <option  value="<?php echo $data1['company_registration']['id'];?>" <?php if($data1['company_registration']['id']==$data['room_checkin_checkout']['company_id']){ echo 'selected'; } ?>><?php echo $data1['company_registration']['company_name'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></td>
                                            
                                            <td><label>Guest Name</label></td> 
                                            <td><input type="text" class="form-control input-inline input-medium" 
                                            placeholder="Guest Name" name="edit_guest_name" value="<?php echo $guest_name; ?>" id="edit_guest_name"></td>
                                            <td><label>Arriving From</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" 
                                            placeholder="Arriving From" name="edit_arriving_from" value="<?php echo $arriving_from; ?>" id="edit_arriving_from" ></td>
                                            <td><label>Next Destination</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" 
                                            placeholder=" Next Destination" name="edit_next_destination" value="<?php echo $next_destination; ?>" id="edit_next_destination" ></td>
                                            
                                             </tr>
                                             
                                             
                                              <tr>
                                            <td rowspan="2"><label>Permanent Address</label></td> 
                                            <td  colspan="3" rowspan="2"><textarea rows="3" name="edit_permanent_address" 
                                            class="form-control input-inline input-large" value="<?php echo $permanent_address; ?>" 
                                            id="edit_permanent_address" ><?php echo $data['room_checkin_checkout']['permanent_address']; ?></textarea></td>
                                            <td><label>City</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" 
                                            placeholder="City" name="edit_city" value="<?php echo $city; ?>" id="edit_city" ></td> 
                                           <td><label>Nationality</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" 
                                            placeholder="Nationality" name="edit_nationality" value="<?php echo $nationality; ?>" id="edit_nationality" ></td>
                                           </tr>
                                           <tr>
                                           <td><label>Duration</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" 
                                            placeholder="Duration" name="edit_duration" value="<?php echo $duration; ?>" id="edit_duration" ></td>
                                            
                                            <td><label>Check Out Date</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" 
                                            placeholder="Checkout" name="edit_checkout_date" value="<?php echo date('d-m-Y', strtotime($checkout_date)); ?>" id="edit_checkout_date" ></td>
                                           
                                             </tr>
                                             
                                              <tr>
                                               <td><label>Room Type</label></td>
                                            <td><select class=" form-control input-small" 
                                            name="edit_room_type_id" id="edit_room_type_id" onchange="room_nos()">
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_master_room_type as $data1)
                                            {
                                            	?>
                                                <option  value="<?php echo $data1['master_room_type']['id'];?>" <?php if($data1['master_room_type']['id']==$data['room_checkin_checkout']['room_type_id']){ echo 'selected'; } ?>><?php echo $data1['master_room_type']['room_type'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></td>
                                            
                                              <td><label>Room No.</label></td>
                                            <td><select class=" form-control input-small" name="edit_master_roomno_id" id="edit_m_id">
                                <option value="">--- Select ---</option>
									<?php
									foreach($fetch_master_roomno as $data1)
                                    {
										$room_no=$data1['master_roomno']['room_no'];
										$room_no_explode=explode(',', $room_no);
									   foreach($room_no_explode as $room_nos)
										{
											?>
											 <option value="<?php echo $room_nos;?>" <?php if($room_nos==$data['room_checkin_checkout']['master_roomno_id']){ echo 'selected'; } ?>><?php echo $room_nos;?></option>
										<?php
										}
									}
                                   
                                    ?>
                                </select>
                                    </td>
                        <?php 
                        
                                    ?>
                                            
                                            
                                            <td><label>Plan</label></td> 
                                            <td><select class=" form-control input-small" onchange="room_rates()" name="edit_plan_id">
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_master_room_plan as $data1)
                                            {
                                            	?>
                                                <option  value="<?php echo $data1['master_room_plan']['id'];?>" <?php if($data1['master_room_plan']['id']==$data['room_checkin_checkout']['plan_id']){ echo 'selected'; } ?>><?php echo $data1['master_room_plan']['plan_name'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></td>                               
                                                         
                                            <td><label>Pax</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" 
                                            placeholder="Pax" name="edit_pax" value="<?php echo $pax; ?>" id="edit_pax" ></td></tr>
                                     
                                             
                                             <tr> <td><label>Source of Booking</label></td>
                                        <td colspan="5"><div class="form-group">
										<div class="radio-list" >
											<label class="radio-inline">
											<input type="radio" name="edit_source_of_booking" value="direct"
                                            <?php if($data['room_checkin_checkout']['source_of_booking']=='direct'){ echo 'checked'; } ?>> Direct </label>
											<label class="radio-inline">
											<input type="radio" name="edit_source_of_booking" value="company"
                                            <?php if($data['room_checkin_checkout']['source_of_booking']=='company'){ echo 'checked'; } ?>> Company </label>                                          <label class="radio-inline">
											<input type="radio" name="edit_source_of_booking" value="walkin"
                                            <?php if($data['room_checkin_checkout']['source_of_booking']=='walkin'){ echo 'checked'; } ?>> Walk-In </label>
											<label class="radio-inline">
											<input type="radio" name="edit_source_of_booking" value="travelagent"
                                            <?php if($data['room_checkin_checkout']['source_of_booking']=='travelagent'){ echo 'checked'; } ?>> Travel Agent  </label>
										</div>
						</div>
                        </td>
                        <td><label>Room Charge</label></td> 
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Room Charge" name="edit_room_charge"  value="<?php echo $room_charge; ?>" id="edit_room_charge_id" ></td>
                                         
                        </tr>
                                            <tr>
                                            <td><label>Advance</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" 
                                            placeholder="Advance" name="edit_advance" value="<?php echo $advance_taken; ?>" id="edit_advance" ></td>
                            
                                            <td><label>Child</label></td> 
                                            <td><input type="text" class="form-control input-inline input-small" 
                                            placeholder="Child" name="edit_child" value="<?php echo $child; ?>" id="edit_child" ></td>
                                            <td><label>Billing Inst.</label></td> 
                                            <td colspan="2"><input type="text" class="form-control input-inline input-large" 
                                            placeholder="Billing Inst." name="edit_billing_instruction" value="<?php echo $billing_instruction; ?>" id="edit_billing_instruction" ></td>
                                            <td><lable>
                    	<input name="edit_apply_special_rates" type="checkbox" value="1" id="edit_apply_special_rates"
                        <?php if($data['room_checkin_checkout']['apply_special_rates']==1){ echo 'checked'; } ?>/> Apply Special Rates</label></td></tr>
                       
                        
                        </tr>
                        <tr><td colspan="8"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_room_checkin" value="edit_room_checkin" class="btn blue">Update</button>
										</div></center></td></tr>
                                             
                       
                        </table>
                     </div>
                       </form></div>                     
                                   
										
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
							
            </td>
            
        <td>
            <a class="btn default btn-xs black" data-toggle="modal" href="#delete_<?php echo $id_room_checkin_checkout; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete_<?php echo $id_room_checkin_checkout; ?>" tabindex="-1" role="delete" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <form method="post" name="delete_<?php echo $id_room_checkin_checkout; ?>">

                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                            <input type="hidden" name="delete_checkin_id" value="<?php echo $id_room_checkin_checkout; ?>" />
                            

                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_room_checkin_id" value="delete_room_checkin_id" class="btn blue">Delete</button>

                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
       </td>
         
        </tr>
        <?php } ?>
      
       </tbody>
        </table>
</div>
 
      </div>

			</div>  
    	</div>
    </div>
   
   
   
    <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
	function room_no()
	{
		var id=$("select[name=room_type_id]").val();
			
			
			$.ajax({
				url: "ajax_php_file?check_id_room_no_ftc=1&q="+id,
				type: "POST",         
				success: function(data)
				{
					//$("#master_roomno_id").val(data);
					$("#m_id").html(data);
				}
			})
			room_rate();
			
	}
	
			
	
	
	function room_nos()
	{
		var id=$("select[name=edit_room_type_id]").val();
			
			
			$.ajax({
				url: "ajax_php_file?check_id_room_no_ftc=1&q="+id,
				type: "POST",         
				success: function(data)
				{
					//$("#master_roomno_id").val(data);
					$("#edit_m_id").html(data);
				}
			})
			room_rates();
			
	}
	
	
	
	            function room_rate()
            {   
         
                 var ar = [];
                var room_type_id=$("select[name=room_type_id]").val();
                var company_id=$("select[name=company_id]").val();
                var plan_id=$("select[name=plan_id]").val();
                ar.push(room_type_id,company_id,plan_id);
                var myJsonString = JSON.stringify(ar);
                //alert(myJsonString);
				
				 
                $.ajax({
                url: "ajax_php_file?fatch_room_vacant=1&q="+myJsonString,
                type: "POST",
                         
                success: function(data)
                {
                
                    $("#room_charge_id").val(data); 
                }
                });
               
               
                   
            }
			
			
			function room_rates()
            {   
          
                 var ar = [];
                var room_type_id=$("select[name=edit_room_type_id]").val();
                var company_id=$("select[name=edit_company_id]").val();
                var plan_id=$("select[name=edit_plan_id]").val();
                ar.push(room_type_id,company_id,plan_id);
                var myJsonString = JSON.stringify(ar);
                //alert(myJsonString);
				
				 
                $.ajax({
                url: "ajax_php_file?fatch_room_vacant=1&q="+myJsonString,
                type: "POST",
                         
                success: function(data)
                {
                
			
                    $("#edit_room_charge_id").val(data); 
                }
                });
               
            }
			
			
				function res_no()
	{
		var id=$("select[name=room_reservation_id]").val();
			
			$.ajax({
				url: "ajax_php_file?check_id_res_no_ftc=1&q="+id,
				type: "POST",         
				success: function(data)
				{
					//$("#master_roomno_id").val(data);
					$("#gname_id").val(data);
					$("#national_id").val(data);
				}
		
			})
			
	}
	/*function res_nos()
	{
		var id=$("select[name=edit_room_reservation_id]").val();
			
			$.ajax({
				url: "ajax_php_file?check_id_res_no_ftc=1&q="+id,
				type: "POST",         
				success: function(data)
				{
					//$("#master_roomno_id").val(data);
					$("#edit_guest_name").val(data);
					
				}
			})
			$.ajax({
				url: "ajax_php_file?check_id_res_no_ftc=1&q="+id,
				type: "POST",         
				success: function(data)
				{
					//$("#master_roomno_id").val(data);
					$("#edit_nationality").val(data);
					
				}
			})
			
			
	}*/
			
				
</script>
