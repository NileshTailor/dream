<style media="print">
.print-hide
{
	display:none;
}
.print-show
{
	display:block !important;
}

</style>
<style>
.none
{
	display:none;
}
</style>
<?php
if(empty($active))
{ $active='';
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title"> Checkin </div><div class="toast-message"> </div></div></div>
</div>
<div class="row">
    <div class="col-md-12">
    <div style="margin-left:50px">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs print-hide">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Checkin
                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active==1){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                    <form method="post" name="add" id="checkinaddform">
                   
                   	 <div class="table-responsive">
                     <table class="table self-table" style="width:96% !important;" border="0">
                      
                        <tr style="background-color:#E26A6A; color:#FFF" class="well">
                        <!--<td width="100%"><span style="color:#F00 !important;" class="caption-subject font-green-sharp bold uppercase"><h6><strong>Single Booking</strong></h6></span></td>-->   
                        <td><select class=" form-control input-small select2me" name="room_reservation_id" onchange="res_no();" placeholder="Select..">
                        <option value="">Res. No.</option>
                        <?php
                        foreach($fetch_room_reservation as $data)
                        {
                         $fetch=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'check_reserv_chackin',$data['room_reservation']['id']), array());?>
                        <?php if(!empty($fetch)){}else{ ?>
                        
                            <option  value="<?php echo $data['room_reservation']['id'];?>"><?php echo $data['room_reservation']['id'];?>  (<?php echo $data['room_reservation']['name_person'];?>)</option>
                            <?php
                          }
                        }
                        ?>
                        </select></td>
                        <td colspan="2" align="right"><div class="form-group"><label>Source of Booking</label></div></td>
                            <td colspan="3" align="left">
                            <div class="form-group" style="vertical-align:middle">
                            <div class="radio-list" >
                            <label class="radio-inline">
                                <input type="radio" name="source_of_booking" value="Company"  id="company" checked="checked"> Company </label>
                                <label class="radio-inline">							
                                <input type="radio" name="source_of_booking" value="Direct"  id="direct"> Direct </label>
                                
                                <label class="radio-inline">
                                <input type="radio" name="source_of_booking" value="Travel Agent" id="travelagent"> Travel Agent  </label>
                                <label class="radio-inline">
                                <input type="radio" name="source_of_booking" value="Clubmember" id="cmid1"> Club Member  </label>
                            </div>
						</div>
                        </td></tr>
                            
                            <tr> 
                            <?php
                            $i=1;
                            foreach($fetch_gr_no as $data){ 
                            $i++;
                            $id=$data['gr_no']['id'];
                            $card_no=$data['gr_no']['card_no'];
                            ?>
                            <?php $data['gr_no']['card_no']; ?>
                            <?php }?>
                            <td align="left" width="12%"><label>Card No.</label></td> 
                            <td>
                            <div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Card No." name="card_no" value="<?php echo $card_no; ?>" readonly/></div>
                            </td>
                            <td><label>Arrival Date<span style="color:#E02222">* </span></label></td> 
                            <td><div class="form-group"><div class="input-group">
                            <input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="arrival_date" onchange="valid()" id="arr_id"  value="<?php echo date("d-m-Y"); ?>">
                            </div></div></td>
                             <td><label>Departure Date<span style="color:#E02222">* </span></label></td> 
                            <td><input type="text" class="form-control input-inline input-small date-picker" onchange="valid();"  data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="checkout_date" id="dep_id" value="<?php echo date('d-m-Y', strtotime('+1 day'));?>"></td></tr>
                            
                            <tr>
                             <td><label>Guest Name<span style="color:#E02222">* </span></label></td> 
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Guest Name" name="guest_name" id="gname_id"></div>                          </td>
                            
                        <td id="cnameid1"><label>Company Name<span style="color:#E02222">* </span></label></td> 
                        <td id="cnameid2"><div style="float:left; width:60%"><select class=" form-control input-small" name="company_id" onchange="room_rate();" id="cp_id" placeholder="Company">
                        <option value="">-- Select --</option>	
                        <?php
                        foreach($fetch_company_registration as $data)
                        {
                        ?>
                        <option  value="<?php echo $data['company_registration']['id'];?>"><?php echo $data['company_registration']['company_name'];?></option>
                        <?php
                        }
                        ?>
                        </select></div>
                        <div style="width:23%; float:right"><a class="btn green"  data-toggle="modal" href="#basic"><i class="fa fa-plus"></i></a></div>
                        </td>
                        
                        <!--<td><label>Plan<span style="color:#E02222">* </span></label></td> 
                    <td><div class="form-group" style="float:left; width:50%"><select class=" form-control input-small" name="plan_id" onchange="room_rate();" id="plid" placeholder="Plan Name">
                    <option value="">-Select--</option>
                    <?php
                    foreach($fetch_master_room_plan as $data)
                    {
                        ?>
                        <option plancombo="<?php echo $data['master_room_plan']['plan_combo'];?>"  value=
                        "<?php echo $data['master_room_plan']['id'];?>">
                        <?php echo $data['master_room_plan']['plan_name'];?></option>
                        <?php
                    }
                    ?>
                    </select></div>
                    </td>-->
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
                    
                    <td id="travel1" style="display:none"><label>Traveller Name</label></td>
                    <td colspan="2" id="travel2" style="display:none">
                    <div class="form-group">
                    <input class="form-control input-small" id="traveller_name"  name="traveller_name" placeholder="Traveller" type="text">
                    </div>
                    </td>
                        </tr>
                    
                        <tr>
                        <td><label>Arrival Time<span style="color:#E02222">* </span></label></td> 
                            <td><div class="input-group">
                                <input class="form-control  input-inline input-small timepicker timepicker-no-seconds" type="text" placeholder="Arrrival Time" name="arrival_time" >
                                
                              </div><!--<input type="text" class="form-control input-inline input-small" placeholder="Arrrival Time" name="arrival_time" >-->
                            </td>
                       
                        <td><label>Arriving From</label></td> 
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Arriving From" name="arriving_from" ></td>
                        
                        <td><label>Next Destination</label></td> 
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Next Destination" name="next_destination" ></td>
                        </tr>
                        <tr>
                        <td><label>City</label></td> 
                        <td><input type="text" class="form-control input-inline input-small" placeholder="City" name="city" id="city" ></td> 
                        <td><label>Nationality</label></td> 
                       <td>
                    <div class="form-group">
                    <select class=" form-control input-small select2me" name="nationality" id="national_id" placeholder="Select...">
                    <option ></option>
                    <option <?php echo 'Other';?>>Other</option>
                    <option <?php echo 'American';?>>American</option>
                    <option <?php echo 'Australian';?>>Australian</option>
                    <option <?php echo 'Australian';?>>Afghan</option>
                    <option <?php echo 'Bangladeshi';?>>Bangladeshi</option>
                    <option <?php echo 'Chilean';?>>Chilean</option>
                    <option <?php echo 'Chinese';?>>Chinese</option>
                    <option <?php echo 'German';?>>German</option>
                    <option <?php echo 'Greek';?>>Greek</option>
                    <option <?php echo 'Indian';?>>Indian</option>
  <option <?php echo 'Japanese';?>>Japanese</option>
  <option <?php echo 'Pakistani';?>>Pakistani</option>
  <option <?php echo 'Russian';?>>Russian</option>
  <option <?php echo 'Saudi';?>>Saudi</option>
  <option <?php echo 'Singaporean';?>>Singaporean</option>
  <option<?php echo 'South African';?>>South African</option>
  <option <?php echo 'South Korean';?>>South Korean</option>
  <option <?php echo 'Spanish';?>>Spanish</option>
  <option <?php echo 'Sri Lankan';?>>Sri Lankan</option>
  <option <?php echo 'Zimbabwean';?>>Zimbabwean</option>
</select></div></td>
                       <td><label>Duration<span style="color:#E02222">* </span></label></td>
                    <td><div class="form-group"><input type="text" class="form-control input-inline input-small" value="1"  placeholder="Duration" name="duration" id="duration" ></div></td>
                       </tr>
                        <tr>
                        <td><label>Address</label></td> 
                        <td><input type="text" class="form-control input-small" placeholder="Permanent Address" name="permanent_address" ></td>
                        <td><label>Mobile No.</label></td>
                    <td>
                    <input class="form-control input-small"  name="mobile_no" id="mobile_no"  onkeypress="javascript:return isNumber (event)" maxlength="10" placeholder="Mobile No." type="text">
                    </td>
                    <td><label>Email Id</label></td>
                    <td>
                    <input class="form-control input-small"  name="email_id" id="email_id" placeholder="Email ID" type="text">
                    </td>
                        </tr>
                        <!--<td><label>ExtraBed</label></td>
                            <td>
                            <div class="form-group">
                            <div class="radio-list">
                            <label class="radio-inline">
                                <input type="radio" id="extrabedyes" name="extrabedd"> Yes </label>
                                <label class="radio-inline">							
                                <input type="radio" id="extrabedno" checked="checked" name="extrabedd"> No </label>
                            </div>
						</div>
                        </td>-->
                       <!-- <td colspan="2" style="display:none" id="bed">
                        <table width="100%" border="1"><tr style="border:solid 1px #333; background-color:#D0CFF8;">
                        <th>Qua.</th><th>Rate</th><th>Tot</th></tr><tr>
                        <td><input type="text" class="form-control input-inline input-xsmall" name="extra_bed" placeholder="Quant." id="extra_bed" onKeyUp="extrabed_count();"></td>
                        <td><input type="text" class="form-control input-inline input-xsmall" name="rate" id="rate" placeholder="rate" onKeyUp="extrabed_count();"></td>
                        <td><input type="text" class="form-control input-inline input-xsmall" name="extra_bed_tot" id="extra_bed_tot" placeholder="Total" readonly="readonly"></td>
                        </tr></table></td>-->
                        
                      <tr><td colspan="9">
                      <table width="100%" style="margin-top:5px;" id="add_data" border="0">
                      <tr class="well tr-head-color" style="background-color:#E26A6A; color:#FFF">
                      <th>Room Type</th>
                      <th>Room Plan</th>
                      <th>Room No.</th>
                      <th>Total Room</th>
                      <th>Charge</th>
                      <th></th>
                      <th>Disc(%).</th>
                      <th>Amount</th>
                      <!--<th>Arr. Date</th>
                      <th>Dep. Date</th>
                      <th>Time</th>-->
                      <th>New Row</th></tr>
                      <tr>
                      <td colspan="9"><div id="v_da" style="width:100%"></div></td>
                      </tr>
                      
                       <tr id="row1">
                      
                    <td class="form-group"><label><div style="float:left; width:60%"><select class=" form-control input-small" 
                    name="room_type_id[]" onchange="room_rate();"  id="rtid1" placeholder="Room Type">
                    <option value="">-- Select --</option>
                    <?php
                    foreach($fetch_master_room_type as $data)
                    {
                    ?>
                    <option value="<?php echo $data['master_room_type']['id'];?>"><?php echo $data['master_room_type']['room_type'];?></option>
                    <?php
                    }
                    ?>
                    </select></div></label>
                    </td>
                    
                    <td><div class="form-group" style="float:left; width:50%"><select class=" form-control input-small" name="plan_id[]" onchange="room_rate();" id="plid1" placeholder="Plan Name">
                    <option value="">-- Select --</option>
                    <?php
                    foreach($fetch_master_room_plan as $data)
                    {
                        ?>
                        <option value=
                        "<?php echo $data['master_room_plan']['id'];?>">
                        <?php echo $data['master_room_plan']['plan_name'];?></option>
                        <?php
                    }
                    ?>
                    </select></div>
                    </td>
                   
                       
                        <td class="form-group"><label><select class="form-control select2 select2_sample2 input-small"
                         name="master_roomno_id[]" id="m2_id1" multiple placeholder="Select Room No." onchange="count();">
                        <?php
                        foreach($fetch_master_roomno as $data)
                        {
                           $room_no=$data['master_roomno']['room_no'];
                            $room_no_explode=explode(',', $room_no);
                             
                           foreach($room_no_explode as $room_nos)
                            {
                              $room_vacant=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_room_report',$room_nos), array());
                                
                                if(!empty($room_vacant))
                                {  $roo_blank_status=$room_vacant[0]['room_checkin_checkout']['status'];
                                    if($roo_blank_status=='1')
                                    {
                                     ?>
                                        <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
                                    <?php
                                    }
                                }
                                else
                                {?>
                                    <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
                                <?php
                                }
                            }
                        }
                                    ?>
                    </select></label>
                    </td>
                   <td class="form-group"><label><input type="text" class="form-control input-inline input-xsmall" placeholder="Total" name="total_room[]" id="total_room1" readonly="readonly"></label></td> 
                    <td class="form-group"><label><input type="text"  class="form-control input-inline input-xsmall" placeholder="Charge" name="room_charge[]" id="room_charge_id1" onkeyup="count();"></label></td>
                    
            <td><input type="hidden" class="form-control input-inline input-xsmall" readonly="readonly" value="0" placeholder="Tax" name="taxes[]" id="tax_id1"></td>
            <td class="form-group"><input type="text" class="form-control input-inline input-xsmall" value="0" placeholder="Discount" name="room_discount[]" id="discount_id1"></td>

                    
                    <td><input type="text" class="form-control input-inline input-xsmall" placeholder="amount" readonly="readonly" name="tg[]" id="tg1"></td>
                    <td><label><button type="button" onclick="add_data()" class="btn blue btn-xsmall" />Add Row </label></td></tr>
                     <input type="hidden" value="1" id="next_id"/>
            </table></td></tr>
            <tr style="border-top:groove 5px; border-color:#CCC">
            <td colspan="5" align="right">
                <table style="height:0" width="40%" border="0"><tr>
                <!--<td><input type="text" class="form-control input-inline input-small" value="0" placeholder="Tax" name="taxes" id="tax_id"></td>
               <td class="form-group"><input type="text" class="form-control input-inline input-small" value="0" placeholder="Discount" name="room_discount" id="discount_id" > </td>-->
                <td class="form-group"><input type="hidden"  name="plan_combo" id="plancombo" > </td>
                <td> <input type="hidden" class="form-control input-inline input-small" placeholder="Total Amount" name="gross_amount" id="gross_amount"></td></tr>
                
                
                
            </table>
            </td>
            </tr>
            <tr> 
                    <td align="left"><label>Advance</label></td> 
                    <td><input type="text" class="form-control input-inline input-small" placeholder="Advance" name="advance_taken" id="ad_taken"></td>
                    <td><label>PAX</label></td> 
                    <td><input type="text" class="form-control input-inline input-small" placeholder="Pax" name="pax" ></td>                            
                    <td><label>Child</label></td> 
                    <td><input type="text" class="form-control input-inline input-small" placeholder="Child" name="child" ></td></tr>
                    
                    
                    <tr>
                    <td><label>ID Proof</label></td>
                    <td><select class=" form-control input-small" style="width:200px;" name="id_proof">
                    <option value="">-- Select Guest ID --</option>
                    <option <?php echo 'Adhar Card';?>>Adhar Card</option>
                    <option>Pan Card</option>
                    <option>Company ID Card</option>
                    <option>Passport</option>
                    <option>Voter ID Card</option>
                    <option>Driving Licence</option>
                    </select>
                    </td>
                    <td><label>ID Proof No.</label></td> 
                    <td><input type="text" class="form-control input-inline" placeholder="ID Proof No." name="id_proof_no" id="id_proof_no"></td>
                    <td><label>Remark</label></td> 
                    <td><input type="text" class="form-control input-inline" style="width:150px" placeholder="Inst." name="billing_instruction" id="b_ins_id"></td>
                    </tr>
                  
                  <!--<tr>
                    <td align="left" colspan="2"><label>
                    <input name="apply_special_rates" type="checkbox" value="1" id="apply_special_rates" checked/> Apply Special Rates</label></td>
                    <td></td><td></td><td></td><td></td></tr>-->
                    
                    <tr>
                    <td colspan="6"><center>
                    <button type="submit" name="add_room_checkin_checkout" class="btn green" value="add_room_checkin_checkout"><i class="fa fa-check-square"></i> Checkin</button>
                    <button type="reset" name="" class="btn red " value="add_master_room"><i class="fa fa-level-down"></i> Cancel</button>
                    </center></td>
                     </tr>
                    </table></div></form></div>
                                        
   <!--------------------------------------------------------------------------------------------------------------->
           
  <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                     	 <div class="table-responsive">
<div class="none print-show">
        <?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>
        <div align="center" style="padding: 0px; font-size: 25px; font-family:Verdana, Geneva, sans-serif">
        <b><?php echo $data['address']['name']; ?></b></div>
        <div align="center" style="padding: 0px; font-size: 15px; font-family:Verdana, Geneva, sans-serif">Checkin Report
        <br />
        <hr width="500px" size="40px" style="border:solid 1px #999" /></div>
        <?php }?>
</div>
                        <div class="portlet box" style="border:#FFF !important; background-color:#E26A6A;">
                            <div class="portlet-title box white print-hide">
                                <div class="caption">
                                    <i class="fa fa-book" style="color:#FFF"></i><strong>Checkin</strong>
                                </div>
                            </div>
                                <div class="portlet-body" style="min-height:400px;">
                                
                                <table align="center" width="40%" border="0" style="float:right; padding-right:100px"><tr class="print-hide">
                                <td>
                                <div class="form-group">
                                    <div class="col-md-4">
                                            <div class="input-group input-large date-picker input-daterange" data-date-format="dd-mm-yyyy">
                                                <input type="text"  id="start_date"value="<?php echo date('d-m-Y'); ?>" placeholder="Start Date" class="form-control" name="from">
                                                <span class="input-group-addon">
                                                to </span>
                                                <input type="text" id="end_date" value="<?php echo date('d-m-Y'); ?>" placeholder="End Date" class="form-control" name="to">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><label style="margin-left:10px;"><button onclick="view_data();" class="btn green btn-sm"><i class="fa fa-search"></i> View</button></label></td>
             <td><label style="margin-left:10px;"><button class="btn red btn-sm" onclick="view_report()"><i class="fa fa-print"></i> Report</button></label></td>
             <!--<td><label style="margin-left:10px;"><a class="btn blue btn-sm"  href="excel_checkinreport" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a></label></td>-->
                                </tr>
                                </table>
                                
                                <table width="40%" style="float:left"><tr>
                                <td>
                                <div class="input-group">
					<input class="form-control" placeholder="Search..." name="s_query" id="s_query" type="text" onkeyup="view_data1();">
                    <span class="help-block">
											Search Guest Name Here..!!! </span>
					
				</div></td></tr></table>
                                <span style="margin-top:20px" id="view_data"></span>
                                </div>
                            </div>
                        </div>
                    </div>
 			</div>
    	  </div>
        </div>  
    </div>
</div>
   
   <div class="modal fade bs-modal-lg" id="basic" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><strong>Add Company</strong></h4>
                </div>
                <form method="post" name="add" id="add_company_registration">
                <div class="modal-body">
                
                 <div class="table-responsive">
                    <table class="table self-table" border="0" style=" width:90% !important;">
                    <tr>
                    <td width="15%"><label>Company Name <span style="color:#E02222">* </span></label></td>
                    <td><div class="form-group">
                          <input type="text" class="form-control input-inline input-small" placeholder="Company Name" name="company_name"  ></div></td>
                    <td width="15%"><label>Company Category <span style="color:#E02222">* </span></label></td>
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
                     <td ><label>Service Tax No.</label></td>
                    <td ><input type="text" class="form-control input-inline input-small" placeholder="Service Tax No." name="service_tax_no"  ></td>
                    <td><label> Person Name</label></td>
                    <td><input type="text" class="form-control input-inline input-small" placeholder=" Person Name" name="authorized_person_name"  ></td>
                    <td><label> Contact No.</label></td>
                    <td><input type="text" class="form-control input-inline input-small" placeholder=" Contact No." name="authorized_contact_no" maxlength="10"  ></td></tr>
                    <tr>
                    <td><label>Mobile No.</label></td>
                    <td><input type="text" class="form-control input-inline input-small" placeholder="Mobile No." name="mobile_no"  maxlength="10"/></td>
                    <td><label> Email id</label></td>
                    <td ><input type="text" class="form-control input-inline input-small" placeholder=" Email id" name="authorized_email_id" ></td>
                    <td><label>Master Plan <span style="color:#E02222">* </span></label></td>
                    <td>
                    <div class="form-group">
                <select class="form-control select2me input-small" name="master_plan_id" id="plan_id" placeholder="Select..">
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
		<!---------------------------------roomno Function end------------------>
	function room_rate()
	{ 
		var ar = [];
		var next_id = $("#next_id").val();
		var company_id=$("select[name=company_id]").val();
		var room_type_id=$("#rtid"+next_id).val();
		var plan_id=$("#plid"+next_id).val();
		ar.push(company_id,room_type_id,plan_id);
		var myJsonString = JSON.stringify(ar);
		$.ajax({
		url: "ajax_php_file?fatch_room_vacantcheckin=1&q="+myJsonString,
		type: "POST",
		success: function(data)
		{
		var da=data.split(",");
			$("#room_charge_id"+ next_id).val(da[0]);
			$("#discount_id"+ next_id).val(da[1]);
			$("#tax_id"+ next_id).val(da[2]);
			$("#amount"+next_id).val('');
		}
		});
	}
////////////////////////////////////////////////////////////
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

	
	/*var total_room=eval($("#total_room"+next_id).val());
	var total_room=eval($('#edit_total_room').val());
	tx1 = Math.round(total-gross_amount);
	$('#edit_totaltax').val(tx1);
	//alert(edit_totaltax);
	$('#edit_tg').val(total-rd);
	
	net = Math.round((total-rd)-advance_taken);
	$('#edit_net_amount').val(net);
	//pr(edit_net_amount);
	$('#edit_posnet_amount').val(posamount);
	$('#edit_pos').val(posamount-fd);
	tot = Math.round((posamount-fd)+(total-rd-advance_taken));
	$('#edit_totalnetamount').val(tot);
	*/
	}
		<!---------------------------------Add Row Function------------------>		
	function delete_row_data(id)
	{
		var nax =  parseInt(id) -  parseInt(1) ;
		var tot= $("#tg"+id).val();
		var gross_amount= $("#gross_amount").val();
		var total_gross =  parseInt(gross_amount) -  parseInt(tot) ;
		$("#gross_amount").val(total_gross);
			$("#row"+id).remove();
			$("#next_id").val(nax);
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
				$("#next_id").val(da);
				$('select').select2();
			}
			});
		
	}
	function room_no_select(value)
	{
		$.ajax({
				url: "ajax_php_file?checkin_typeofbooking_checked=1&q="+ value,
				type: "POST",         
				success: function(data)
				{
					
					$("#room_no_replace").html(data);
				}
			})
			
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
	////////////////////
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
		//var n_id=da[5];
		var bookingtype = da[0];
		//alert(bookingtype);
		if(bookingtype == 'Company'){
			//alert(bookingtype);
			$("input:radio[id=company]").prop('checked', true);
			$("input:radio[id=company]").parent().addClass("checked");
			$('#cnameid1').show();
			$('#cnameid2').show();
			$('#cm1').hide();
			$('#cm').hide();
			}
		if(bookingtype=='Direct'){
			$("input:radio[id=direct]").prop('checked', true);
			$("input:radio[id=direct]").parent().addClass("checked");
			$('#cnameid1').hide();
			$('#cnameid2').hide();
			$('#cm1').hide();
			$('#cm').hide();
			}
		if(bookingtype=='Travel Agent'){
				$("input:radio[id=travelagent]").prop('checked', true);
			$("input:radio[id=travelagent]").parent().addClass("checked");
			$('#cnameid1').hide();
			$('#cnameid2').hide();
			$('#cm1').hide();
			$('#cm').hide();
			$('#travel1').show();
			$('#travel2').show();
			
				}
		if(bookingtype=='Clubmember'){
				$("input:radio[id=cmid1]").prop('checked', true);
			$("input:radio[id=cmid1]").parent().addClass("checked");
			$('#cmid').show();
			$('#cmidd').show();
			$('#cnameid1').hide();
			$('#cnameid2').hide();				
				}
		$("#city").val(da[1]);
		$("#dep_id").val(da[2]);
		$('#cp_id option[value="' + da[3] + '"]').prop('selected', true);
		$("#gname_id").val(da[4]);
		$("#national_id").val(da[5]);
		$('#rtid1 option[value="' + da[6] + '"]').prop('selected', true);
		$('#plid option[value="' + da[7] + '"]').prop('selected', true);
		$("#ad_taken").val(da[8]);
		$("#b_ins_id").val(da[9]);
		$("#room_charge_id1").val(da[10]);
		$("#traveller_name").val(da[11]);
		$("#id_proof_no").val(da[12]);
		$("#mobile_no").val(da[13]);
		$("#email_id").val(da[14]);
		
	
//$("#room_charge_id").val(da[10]);
		valid();
		room_rate();
		res_v_no();
	}		
	})
	}
	/////////////////////////////
	function res_v_no()
	{
	var id=$("select[name=room_reservation_id]").val();
	$.ajax({
	url: "ajax_php_file?other_services_entry=1&q="+id,
	type: "POST",         
	success: function(data)
	{
		//alert(data);
              $("#v_da").html(data);
			  $('select').select2();
	}		
	})
	}
	
	
	
		
	
	$(document).ready(function(){
		$("#company").click(function(){
		$('#cnameid1').show();
		$('#cnameid2').show();
		$('#cmid').hide();
		$('#cmidd').hide();
		$('#travel1').hide();
		$('#travel2').hide();
		});
		$("#direct").click(function(){
		$('#cnameid1').hide();
		$('#cnameid2').hide();
		$('#cmid').hide();
		$('#cmidd').hide();
		$('#travel1').hide();
		$('#travel2').hide();
		});
		$("#travelagent").click(function(){
		$('#cnameid1').hide();
		$('#cnameid2').hide();
		$('#cmid').hide();
		$('#cmidd').hide();
		$('#travel1').show();
		$('#travel2').show();
		});
		$("#cmid1").click(function(){
		$('#cmid').show();
		$('#cmidd').show();
		$('#cnameid1').hide();
		$('#cnameid2').hide();
		$('#travel1').hide();
		$('#travel2').hide();
		
		});
	});
		
	$(document).ready(function(){
		$("#extrabedyes").click(function(){
		$('#bed').show();
		
		});
		$("#extrabedno").click(function(){
		$('#bed').hide();
		$('#extra_bed').val('');
			$('#rate').val('');
			$('#extra_bed_tot').val('');
		});
	});
	function extrabed_count()
	{
	                    var extra_bed=eval($('#extra_bed').val());
						if($('#extra_bed').val().length ==''){ 
							extra_bed = '0';
						 }
						var bedrate=eval($('#rate').val());
						if($('#rate').val().length ==''){ 
							bedrate = '0';
						 }
						var extra_bed_tot=eval($('#extra_bed_tot').val());
						if($('#extra_bed_tot').val().length ==''){ 
							extra_bed_tot = '0';
						 }
						
					bedtot = parseInt(extra_bed) * parseInt(bedrate);
						//alert(duegross);
						//var duegross=Math.round(edit_totalnetamount1+dueamt);
						$('#extra_bed_tot').val(bedtot);
	}
	
	function view_data()
	{
		var ar = [];
		var start_date=$("#start_date").val();
		var end_date=$("#end_date").val();
		if($("#start_date").val()!='' ||$("#end_date").val()!='' ){
			$(".page-spinner-bar").removeClass("hide"); //show loading
			ar.push(start_date,end_date);
			var myJsonString = JSON.stringify(ar);
			//alert(myJsonString);
			$.ajax({
			url: "ajax_php_file?room_checkin_checkout_view_dateselect=1&q="+myJsonString,
			type: "POST",         
			success: function(data)
			{	
				$("#view_data").html(data);
				$(".page-spinner-bar").addClass(" hide"); //hide loading
				$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
				{
					$(this).alert('close'); 
					$(this).remove();
				});
			}
			});
		}
		else		
		{	alert("Please select date first")
		}
	}
	/////////////////////
	function view_report()
		{var ar = [];
			var start_date=$("#start_date").val();
			var end_date=$("#end_date").val();
			//var company_id=$("#company_id").val();
			//var booking_type=$("#booking_type").val();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				//ar.push(start_date,end_date);
				//var myJsonString = JSON.stringify(ar);
				//alert(myJsonString);
				
			window.open('checkin_room_report?start_date='+start_date+'&end_date='+end_date,'_newtab');
		
		}
	/////////////////
	function view_data1()
	{
		//alert();
		//var ar = [];
		var s_query=$("#s_query").val();
		
			
			$.ajax({
			url: "ajax_php_file?room_checkin_checkout_view_search=1&q="+s_query,
			type: "POST",         
			success: function(data)
			{	
				$("#view_data").html(data);
			}
			});
		
		
	}
	function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
		
	///////////////////////////////////	
	function checkin_data_deleterow(id)
	{ 
	$(".page-spinner-bar").removeClass("hide"); //show loading
		var ar = [];
		$.ajax({
		url: "ajax_php_file?checkin_data_deleterow=1&q="+id,
		type: "POST",         
		success: function(data)
		{
			$("#"+id).remove();
			$(".page-spinner-bar").addClass(" hide");
		}
		})
	}
		
	function valid()
	{	var a_date=$("#arr_id").val();
		var d_date=$("#dep_id").val();
		////////////////////// count Days
		    var parts = a_date.split('-');
    		var arrival = new Date(parts[2] + ',' + parts[1] + ',' + parts[0]);
			var parts1 = d_date.split('-');
    		var depture = new Date(parts1[2] + ',' + parts1[1] + ',' + parts1[0]);
			var oneDay = 24*60*60*1000;
			var diffDays = Math.round(Math.abs((arrival.getTime() - depture.getTime())/(oneDay)));
		
		var dateParts = a_date.split("-");
		var date = new Date(dateParts[2], (dateParts[1] - 1), dateParts[0]);
		var d=new Date(dateParts);
		var arival_date=d.getTime();
		
		var dateParts1 = d_date.split("-");
		var date1 = new Date(dateParts1[2], (dateParts1[1] - 1), dateParts1[0]);
		var d1=new Date(dateParts1);
		var dep_date=d1.getTime();
		if(diffDays == 0){
				$("#duration").val('1');
		}
		else
		{
			$("#duration").val(diffDays);
		}
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
			
	$(document).ready(function()
           {
		$('.c_change,.c_change1').live('keyup', function(e)
			{
				var i=$(this).attr("tr_id");
				var tot_room=$('#'+i+' >td:eq(3) input').val();
				var amount=$('#'+i+' >td:eq(4) input').val();
				var bedtot = parseInt(tot_room) * parseInt(amount);	
				var tot=$('#'+i+' >td:eq(7) input').val(bedtot);
			});
		});
		</script> 
		<script type="text/javascript">
		function dlt_row_change(i)
		{
			$('#'+i).remove();
		}
		
		
		
		
</script> 

