<?php
 if(!empty($outlet))
 {
 	$outlet_array=explode(',', $outlet);
     
 } 
?>

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



<style>

@media (min-width: 100%)
{
	.form-group{
		width:100% !important;
	}
}
@media (max-width: 900px)
{
	.form-group{
		width:90% !important;
	}
}
@media (max-width: 700px)
{
	.form-group{
		width:60% !important;
	}
}
@media (max-width: 770px)
{
	.form-group{
		width:70% !important;
	}
}
@media (max-width: 808px)
{
	.form-group{
		width:75% !important;
	}
}
@media (max-width: 480px)
{
	.form-group{
		width:10% !important;
	}
}
</style>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title"> Reservation </div><div class="toast-message"> </div></div></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs print-hide">
                <li class="active">
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab"> <strong>Reseveration</strong> </a>
                </li>
                <li class="">
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab"> <strong>View</strong> </a>
                </li>
               
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab_1_1">
                    
                    <div class="portlet-title">
                    <span style="margin-left:5%" class="caption-subject font-green-sharp bold uppercase"> Reseveration</span>
                    
                    <form method="post" enctype="multipart/form-data" id="room_reseveration_add_form">
                    
                    <table style="margin-top:1%; width:100% !important" border="0">
                    <tr><td><label>Reseveration Type</label></td><td colspan="10"><div class="form-group">
                        <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="booking_type"  value="0" id="room_booking" checked >Room Booking   </label>
                            <label class="radio-inline">
                            <input type="radio" name="booking_type" value="1" id="function_booking">Function Booking </label>
                        </div>
                    </div></td></tr>
                    <tr><td><label>Source Of Booking</label></td>
                    <td colspan="10">
                    <div class="form-group">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="source_of_booking" value="Company" id="company" checked> Company</label>
                                        <label class="radio-inline">
                                        <input type="radio" name="source_of_booking"  value="Direct"   id="direct" > Direct </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="source_of_booking"  value="Travel Agent"  id="travel"> Travel Agent</label>
                                        <label class="radio-inline">
                                        <input type="radio" name="source_of_booking"  value="Clubmember"  id="cmid1"> Club Member</label>
                                    </div>
                    </div>
                    </td></tr>
                    <input type="hidden" name="id2" id="id2">
                    <tr><td width="16%" id="labal_replace"><label>Company Name <span style="color:#E02222">* </span></label>
                    </td> <td width="20%" id="company_replace">
                    <div class="form-group" style="width:70%; float:left;">
                    <select class="form-control input-small select2me " onchange="room_rate();" placeholder="Select..."   name="company_name" id="company_name" >
                           <option value=""></option>
                            <?php
                            foreach($fetch_company_registration as $data)
                            {
                                ?>
                         <option value="<?php echo $data['company_registration']['id'];?>"><?php echo $data['company_registration']['company_name'];?></option>
                                <?php
                            }
                            ?>
                            </select>
                            </div>
                         <div style="width:23%; float:right"><a class="btn green btn-sm" style="margin-left:2px; margin-top:2px" data-toggle="modal" href="#basic" title="New Company Registration" ><i class="fa fa-plus"></i></a></div>	
                    </td>
                    
                    
                    
                    <td width="16%"><label>Name <span style="color:#E02222">* </span></label></td>
                    <td >
                    <div class="form-group">
                    <input name="name_person" id="name_person"  placeholder="Name"  class="form-control input-small" type="text">
                    </div>
                    </td>
                    <td><label>Nationality</label></td>
                    <td>
                    <div class="form-group">
                    <select class=" form-control input-small select2me" name="nationality">
                    <option >Select...</option>
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

<td id="cmid" style="display:none"><label>Club Member</label></td>
<td colspan="2" id="cmidd" style="display:none">
                    <select class="form-control input-small select2me" name="club_member_id" id="id_club_member" placeholder="Select...">
                    <option value=""></option>
                    
                    <?php
                    foreach($fetch_registration as $data)
                    {
                        ?>
                        <option name_person="<?php echo $data['registration']['name'];?>"  value=
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
                                            <td>ID Proof No.</td><td><input name="id_proof_no" class="form-control input-small" placeholder="ID Proof No." type="text"></td>

                    <td><label>Telephone</label></td>
                    <td colspan="0">
                    <div class="form-group">
                    <input class="form-control input-small"  name="telephone" placeholder="Telephone" type="text">
                    </div>
                    </td>
                    
                    
                    <td ><label>Email </label></td>
                    <td width="18%">
                    <div class="form-group">
                    <input name="email_id" id="email_id"  placeholder="Email"  class="form-control input-small" type="text">
                    </div>
                    </td>
                    
                    </tr>
                    <tr>
                    <td id="a_date"><label>Arrival Date</label></td>
                    <td id="a_date1">
                    
                    <div class="form-group">
                    <input name="arrival_date" value="<?php echo date('d-m-Y'); ?>" placeholder="Arrival Date" id="a_date" onchange="valid();" data-date-format="dd-mm-yyyy" class="form-control input-small date-picker" type="text">
                    </div>
                    </td>
                    
                    
                    <td id="d_date"><label>Departure Date</label></td>
                    <td id="d_date1">
                    <div class="form-group">
                    <input class="form-control input-small date-picker" id="d_date" value="<?php echo date('d-m-Y', strtotime('+1 day'));?>" onchange="valid();"  data-date-format="dd-mm-yyyy" name="departure_date" placeholder="Departure Date" type="text">
                    </div>
                    </td>
                     <td id="b_date"><label>Banquet Date</label></td>
                    <td id="b_date1">
                    <div class="form-group">
                    <input class="form-control input-small date-picker" id="b_date" value="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy" name="b_date" placeholder="Banquet Date" type="text">
                    </div>
                    </td>
                    
                    <td><label>Plan <span style="color:#E02222">* </span></label></td>
                    <td>
                    <div class="form-group" style="float:left; width:70%">
                    <select class="form-control input-small select2me" onchange="room_rate();" placeholder="Select..."  name="plan_id" id="plan_id"  >
                            <option value=""></option>
                            <?php
                            foreach($fetch_room_plan as $data)
                            {
                                ?>
                                <option value="<?php echo $data['master_room_plan']['id'];?>"><?php echo $data['master_room_plan']['plan_name'];?></option>
                                <?php
                            }
                            ?>
                            </select>
                    </div>
                   <!-- <div style="width:23%; float:right"><a class="btn green btn-sm" style="margin-left:2px; margin-top:2px" data-toggle="modal" href="#plan" ><i class="fa fa-plus"></i></a></div>	-->
                    </td>
                    </tr>
                    <tr>
                    <td><label>Remark</label> </td>
                    <td>
                    <div class="form-group">
                    <input name="billing_instruction" class="form-control input-small" placeholder="Billing Instruction" type="text">
                    </div>
                    </td>
                    <td><label>Taxi Required</label></td>
                    <td><div class="form-group">
                    <input type="checkbox" name="safari_required" id="inlineCheckbox1" value="yes">
                    </div>
                    </td>
                    <td><label>Booking Thru Sales office</label></td>
                    <td> <div class="form-group"><input type="checkbox" id="inlineCheckbox1" name="booking_thru_sales" value="yes"></div>
                    </td>
                    </tr>
                    <tr>
                    <td id="room"><label>Room Type <span style="color:#E02222">* </span></label></td>
                    <td id="room1"><div class="form-group" style="float:left; width:70%">
                    <select class="form-control input-small select2me" placeholder="Select..." onchange="room_rate();"  name="room_type"  id="room_type" >
                            <option value=""></option>
                                <?php
                                foreach($fetch_room_type as $data)
                                {
                                    ?>
                                    <option value="<?php echo $data['master_room_type']['id'];?>"><?php echo $data['master_room_type']['room_type'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            </div>
                           <!--  <div style="width:23%; float:right"><a class="btn green btn-sm" style="margin-left:2px; margin-top:2px" data-toggle="modal" href="#add_new_room_type" ><i class="fa fa-plus"></i></a></div>	-->
                            </td>
                    
                     <td id="outlet"><label>Outlet/Venue </label></td>
                        <td id="outlet1"><div class="form-group"><select class="form-control input-small select2me" id="outlet_venue_id" name="outlet_venue_id" onchange="outlet_rate(this.value);">
                                            <option value=""></option>
                                            <?php
                            foreach($fetch_master_outlet as $data)
                            {	$out=$data['master_outlet']['id'];
                                if(in_array($out, $outlet_array))
                                {
                                    ?>
                                                <option value="<?php echo $data['master_outlet']['id'];?>">
                                                <?php echo $data['master_outlet']['outlet_name'];?>
                                                </option>
                                                <?php
                                            }}
                                            ?>
											</select></div></td>
                            
                    <td><label>Requested by</label></td>
                    <td><div class="form-group">
                        <input name="requested" class="form-control input-small" placeholder="Requested" type="text">
                        </div>
                    </td>
                    <td><label>Rate Per Night</label></td>
                            <td><div class="form-group">
                                <input name="rate_per_night" class="form-control input-small" id="rate_per_night" placeholder="Rate Per Night" type="text">
                                </div></td>
                    </tr>
                    <tr>
                    <td><label>Reservation Status</label></td>
                    
                    <td colspan="3"> <div class="form-group">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="reservation_status" value="Wait listed " checked> Wait listed </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="reservation_status"  value="Confirm"> Confirm</label>
                                        <label class="radio-inline">
                                        <input type="radio" name="reservation_status"  value="Cancelled"> Cancelled</label>
                                    </div>
                    </div>
                    </td>
                    
               
                        <td><label>Granted</label></td>
                         <td>
                            <div class="form-group">
                            <input name="granted" class="form-control input-small" placeholder="Granted" type="text">
                            </div>
                        </td>
                      </tr>
                      <tr>
                        
                        <td>Advance</td><td><input name="advance" class="form-control input-small" placeholder="Advance" type="text"></td>
                        
                         <td><label>Remarks</label></td><!-- Mr./Mrs./Ms. :-->
                         <td>
                            <div class="form-group">
                             <textarea class="form-control" name="remarks" rows="2" style="width:150px;"></textarea>
                            </div>
                         </td>
                       </tr>
                    </table>
                    <button style=" margin-left:45%; margin-top:1%" class="btn blue">Submit</button>   
                    </form>
                    </div>
                   
                </div>
                        
                <div class="tab-pane fade" id="tab_1_2">
                <div class="none print-show">
        <?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>
        <div align="center" style="padding: 0px; font-size: 25px; font-family:Verdana, Geneva, sans-serif">
        <b><?php echo $data['address']['name']; ?></b></div>
        <div align="center" style="padding: 0px; font-size: 15px; font-family:Verdana, Geneva, sans-serif">Reservation Report
        <br />
        <hr width="500px" size="40px" style="border:solid 1px #999" /></div>
        <?php }?>
</div>
                        <div class="portlet box blue" style="border:#FFF !important">
                            <div class="portlet-title box white">
                                <div class=" print-hide caption">
                                    </i><strong class="print-hide">Reseveration</strong>
                                </div>
                            </div>
                                <div class="portlet-body" style="min-height:400px;">
                                <table align="center" width="100%" border="0">
                                <tr class="print-hide">
                                
                                <td>
                                <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="booking_type" onclick="view_data();" value="0" id="booking_type">Room</label>
                            <label class="radio-inline">
                            <input type="radio" name="booking_type" value="1" onclick="view_data();" id="fun">Function</label>
                        </div>
                                </td>
                                <td><select class="form-control input-small select2me"  placeholder="Select Company" onchange="view_data();" id="company_id" >
                           <option value=""></option>
                            <?php
                            foreach($fetch_company_registration as $data)
                            {
                                ?>
                         <option value="<?php echo $data['company_registration']['id'];?>"><?php echo $data['company_registration']['company_name'];?></option>
                                <?php
                            }
                            ?>
                            </select> </td>
                                <td>
                                <div class="form-group">
                                    <div class="col-md-4">
                                            <div class="input-group input-large date-picker input-daterange" data-date-format="dd-mm-yyyy">
                                                <input type="text"  id="start_date" value="<?php echo date('d-m-Y'); ?>" placeholder="Start Date" class="form-control" name="from">
                                                <span class="input-group-addon">
                                                to </span>
                                                <input type="text" id="end_date" value="<?php echo date('d-m-Y'); ?>" placeholder="End Date" class="form-control" name="to">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><label style="margin-left:10px;"><button onclick="view_data();" class="btn green btn-sm"><i class="fa fa-search"></i> View</button></label></td>
             <td><label style="margin-left:10px;"><button class="btn red btn-sm" onclick="window.print()"><i class="fa fa-print"></i> Report</button></label></td>
             <td><label style="margin-left:10px;"><a class="btn blue btn-sm"  href="room_reservation_excel" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a></label></td>
                                <td width="5%">&nbsp;</td>
                                </tr>
                                </table>
                              
                                <span style="margin-top:20px" id="view_data"></span>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                 
			</div>  
    	</div>
    </div>
</div>

<div class="modal fade bs-modal-lg" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <td width="16%"><label>Company Name <span style="color:#E02222">* </span></label></td>
                    <td><div class="form-group">
                          <input type="text" class="form-control input-inline input-small" placeholder="Company Name" name="company_name"  ></div></td>
                    <td width="15%"><label>Company Category <span style="color:#E02222">* </span></label></td>
                    <td><div class="form-group"><select class="form-control input-small select2me" placeholder="Select..." name="company_category_id">
                                        <option value=""></option>
                                        <?php
                                        foreach($fetch_company_category as $data)
                                        {
                                            ?>
                                            <option value="<?php echo $data['company_category']['id'];?>"><?php echo $data['company_category']['category_name'];?></option>
                                            <?php
                                        }
                                        ?>
                                </select></div></td>
                    <td width="10%"><label>PAN No.</label></td>
                    <td><input type="text" class="form-control input-inline input-small" width="80px" placeholder="PAN No." name="pan_no"  ></td>
                    </tr>
                    <tr>
                    <td ><label>Service Tax No.</label></td>
                    <td ><input type="text" class="form-control input-inline input-small" placeholder="Service Tax No." name="service_tax_no"  ></td>
                    
                    <td><label> Person Name</label></td>
                    <td><input type="text" class="form-control input-inline input-small" placeholder="Person Name" name="authorized_person_name"  ></td>
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
               		 <select class="form-control input-small select2me" placeholder="Select..." name="master_plan_id" id="plan_id"  >
                        <option value=""></option>
                        <?php
                        foreach($fetch_room_plan as $data)
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
 <div class="modal fade" id="plan" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title"><strong>Add Room Plan</strong></h4>
            </div>
            <div class="modal-body">
               <table class="table self-table" style=" width:100% !important;">
                        <tr>
                        <td><label>Room Plan</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-medium" placeholder="Room Plan" id="plan_name" required></div></td>
                        </tr>
                        <tr>
                        <td><label>Room Description</label></td>
               			<td><textarea  rows="3" id="description_plan" class="form-control input-inline input-large"></textarea></td>
                        </tr>
                        </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                <button type="button" onclick="add_plan_in_roomresveration()" class="btn blue">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>  
 <div class="modal fade" id="add_new_room_type" tabindex="-1" role="add_room_type" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Add Room Type</strong></h4>
            </div>
            <div class="modal-body">
               <table class="table self-table" style=" width:100% !important;">
                        <tr>
                        <td><label>Room Type</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-medium" placeholder="Room Type" id="room_type_t" ></div></td>
                        </tr>
                        <tr>
                        </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                <button type="button" onclick="add_roomtype_in_roomresveration()" class="btn blue">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>    
                            
                                

<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script>
		 function room_rate()
            {   
                var ar = [];
                var company_id=$("select[name=company_name]").val();
				var room_type_id=$("select[name=room_type]").val();
                var plan_id=$("select[name=plan_id]").val();
				 var arival=$("input[id=a_date]").val();
				 
                ar.push(room_type_id,plan_id,company_id,arival);
                var myJsonString = JSON.stringify(ar);
              $.ajax({
                url: "ajax_php_file?fatch_room_rate_roomreservation=1&q="+myJsonString,
                type: "POST",
                success: function(data)
                {
								
                    $("#rate_per_night").val(data);
					   
                }
                });
               
            }
			
			function outlet_rate(id)
            {   
              $.ajax({
                url: "ajax_php_file?fatch_outlet_rate_roomreservation=1&q="+id,
                type: "POST",
                success: function(data)
                {
                    $("#rate_per_night").val(data);
					   
                }
                });
               
            }
			
			
	function add_plan_in_roomresveration()
	{
			var m_data = new FormData();
			var plan_name=$("#plan_name").val();
			m_data.append('plan_name',plan_name);
			var description_plan=$("#description_plan").val();
			m_data.append('description_plan',description_plan);
			if( $('#plan_name').val().length === 0 )
			{
				$('#plan_name').parents('.form-group').removeClass('has-error');
				$('#plan_name-error').remove();
				  $('#plan_name').parents('.form-group').addClass('has-error');
				  $('#plan_name').parents('.form-group').append('<span id="plan_name-error" class="help-block help-block-error">This field is required.</span>');
			}
			else
			{
				$('#plan_name').parents('.form-group').removeClass('has-error');
				$('#plan_name-error').remove();
			}
			if($('#plan_name').val().length > 0)
			{
				m_data.append('add_plan_in_roomresveration',1);
				$(".page-spinner-bar").removeClass("hide"); //show loading
				$.ajax({
					url: "ajax_php_file",
					data: m_data,
					processData: false,
					contentType: false,
					type: 'POST',
					//dataType:'json',
					success: function(data)   // A function to be called if request succeeds
					{
						$(".page-spinner-bar").addClass(" hide"); //hide loading
						$('#plan').hide();
						$("#plan_id").append(data);
						$('#plan_name input').val('');
						$('#description_plan textarea').val('');
					}
				});
			}
	}
			
	function add_roomtype_in_roomresveration()
	{	
			var m_data = new FormData();
			var room_type=$("#room_type_t").val();
			m_data.append('room_type',room_type);
			if( $('#room_type_t').val().length === 0 )
			{
				$('#room_type_t').parents('.form-group').removeClass('has-error');
				$('#room_type_t-error').remove();
				  $('#room_type_t').parents('.form-group').addClass('has-error');
				  $('#room_type_t').parents('.form-group').append('<span id="room_type_t-error" class="help-block help-block-error">This field is required.</span>');
			}
			else
			{
				$('#room_type_t').parents('.form-group').removeClass('has-error');
				$('#room_type_t-error').remove();
			}
			if($('#room_type_t').val().length > 0)
			{
				m_data.append('add_roomtype_in_roomresveration',1);
				$(".page-spinner-bar").removeClass("hide"); //show loading
				$.ajax({
					url: "ajax_php_file",
					data: m_data,
					processData: false,
					contentType: false,
					type: 'POST',
					//dataType:'json',
					success: function(data)   // A function to be called if request succeeds
					{
						$(".page-spinner-bar").addClass(" hide"); //hide loading
						$('#add_new_room_type').hide();
						$("#room_type").append(data);
						$('#room_type_t input').val('');
					}
				});
			}
	}
		
		function view_data()
		{var ar = [];
			var start_date=$("#start_date").val();
			var end_date=$("#end_date").val();
			var company_id=$("#company_id").val();
			var booking_type=$("#booking_type").val();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				ar.push(start_date,end_date,company_id, booking_type);
				var myJsonString = JSON.stringify(ar);
				//alert(myJsonString);
				$.ajax({
				url: "ajax_php_file?room_reservation_view_dateselect=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{	//alert(data);
					$("#view_data").html(data);
					$(".page-spinner-bar").addClass(" hide"); //hide loading
				}
				});
			
		}
		function valid()
		{	var a_date=$("#a_date").val();
			var d_date=$("#d_date").val();
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
				$("#d_date").val('');
			}
		}
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
		function delete_tr_id(id)
            { 
				$(".page-spinner-bar").removeClass("hide"); //show loading
					$.ajax({
						url: "ajax_php_file?delete_room_reseveration_data=1&q="+id,
						type: "POST", 
						success: function(data)   // A function to be called if request succeeds
						{
							$("#for_delete" + id).remove();
							
							$(".toast").addClass("toast-error");
							$(".toast-message").html("Delete successful...");
							 $("#toast-container").show();
							  var myVar=setInterval(function(){myTimer()},5000);
							   function myTimer() 
							   { $("#toast-container").hide(); } 
							
							$(".page-spinner-bar").addClass(" hide"); //hide loading
							
						}
					});
			}
			</script>
            <script>
			
		$(document).ready(function()
        {
		$("#company").click(function(){
			$('#company_replace').show();
			$('#labal_replace').show();
			$('#cmid').hide();
			$('#cmidd').hide();
			$('#travel1').hide();
			$('#travel2').hide();

		});
		$("#direct").click(function(){
			$('#company_replace').hide();
			$('#labal_replace').hide();
			$('#cmid').hide();
			$('#cmidd').hide();
			$('#travel1').hide();
			$('#travel2').hide();
		});
		$("#travel").click(function(){
			$('#travel1').show();
			$('#travel2').show();
			$('#company_replace').hide();
			$('#labal_replace').hide();
			$('#cmid').hide();
			$('#cmidd').hide();
			
			
		});
		$("#cmid1").click(function(){
			$('#company_replace').hide();
			$('#labal_replace').hide();
			$('#cmid').show();
			$('#cmidd').show();
			$('#travel1').hide();
			$('#travel2').hide();
			
		});
			$('#b_date').hide();
			$('#b_date1').hide();
			$('#outlet').hide();
			$('#outlet1').hide();
		$("#room_booking").click(function(){
			$('#b_date').hide();
			$('#b_date1').hide();
			$('#a_date').show();
			$('#a_date1').show();
			$('#d_date').show();
			$('#d_date1').show();
			$('#room').show();
			$('#room1').show();
			$('#outlet').hide();
			$('#outlet1').hide();
			
		});
		$("#function_booking").click(function(){
			$('#b_date').show();
			$('#b_date1').show();
			$('#a_date').hide();
			$('#a_date1').hide();
			$('#d_date').hide();
			$('#d_date1').hide();
			$('#room').hide();
			$('#room1').hide();
			$('#outlet').show();
			$('#outlet1').show();
			
			
		});
		
		

			
		$("#room_reseveration_add_form").on('submit',(function(e) 
            {
				e.preventDefault();
				
				var ar = [];
               
				var booking_type=$("input[name=booking_type]:checked").val();
				var company_name=$("select[name=company_name]").val();
				var name_person=$("input[name=name_person]").val();
				var nationality=$("select[name=nationality]").val();
				var telephone=$("input[name=telephone]").val();
				var fax=$("input[name=fax]").val();
				var email_id=$("input[name=email_id]").val();
				var arrival_date=$("input[name=arrival_date]").val();
				var b_date=$("input[name=b_date]").val();
				var id2=$("input[name=id2]").val();
				var traveller_name=$("input[name=traveller_name]").val();
				var id_proof_no=$("input[name=id_proof_no]").val();
				var departure_date=$("input[name=departure_date]").val();
				var plan_id=$("select[name=plan_id]").val();
				var billing_instruction=$("input[name=billing_instruction]").val();
				var source_of_booking=$("input:radio[name=source_of_booking]:checked").val();
				var booking_thru_sales=$("input[name=booking_thru_sales]:checked").val();
				var reservation_status=$("input:radio[name=reservation_status]:checked").val();
				var room_type=$("select[name=room_type]").val();
				var requested=$("input[name=requested]").val();
				var granted=$("input[name=granted]").val();
				var rate_per_night=$("input[name=rate_per_night]").val();
				var advance=$("input[name=advance]").val();
				var remarks=$("textarea[name=remarks]").val();
				var outlet_venue_id=$("select[name=outlet_venue_id]").val();
				
				if(booking_thru_sales=='yes')
				{				}
				else
				{var booking_thru_sales='no';
				}
				var safari_required=$("input[name=safari_required]:checked").val();
				if(safari_required=='yes')
				{		}
				else
				{ var safari_required='no';
				}
				
				// Validation 
					if( $('#name_person').val().length === 0 )
					{
						$('#name_person').parents('.form-group').removeClass('has-error');
						$('#name_person-error').remove();
						$('#name_person').parents('.form-group').addClass('has-error');
						$('#name_person').parents('.form-group').append('<span id="name_person-error" class="help-block help-block-error">This field is required.</span>');
					}
					else
					{
						$('#name_person').parents('.form-group').removeClass('has-error');
						$('#name_person-error').remove();
					}
					////
					if( $('#plan_id').val().length === 0 )
					{
						$('#plan_id').parents('.form-group').removeClass('has-error');
						$('#plan_id-error').remove();
						$('#plan_id').parents('.form-group').addClass('has-error');
						$('#plan_id').parents('.form-group').append('<span id="plan_id-error" class="help-block help-block-error">This field is required.</span>');
					}
					else
					{
						$('#name_person').parents('.form-group').removeClass('has-error');
						$('#company_name-error').remove();
					}
					////
					if( $('#room_type').val().length === 0 )
					{
						$('#room_type').parents('.form-group').removeClass('has-error');
						$('#room_type-error').remove();
						$('#room_type').parents('.form-group').addClass('has-error');
						$('#room_type').parents('.form-group').append('<span id="room_type-error" class="help-block help-block-error">This field is required.</span>');
					}
					else
					{
					$('#room_type').parents('.form-group').removeClass('has-error');
					$('#room_type-error').remove();
					}
				
					if( $("input:radio[id=company]:checked").val())
					{ 
						if( $('#company_name').val().length === 0 )
						{
						$('#company_name').parents('.form-group').removeClass('has-error');
						$('#company_name-error').remove();
						$('#company_name').parents('.form-group').addClass('has-error');
						$('#company_name').parents('.form-group').append('<span id="company_name-error" class="help-block help-block-error">This field is required.</span>');
						}
						else
						{
						
						$('#company_name').parents('.form-group').removeClass('has-error');
						$('#company_name-error').remove();
						}
					}
					if($("#email_id").val().length > 0)
					{ 
						var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
						if (filter.test(email_id)) {
							$('#email_id').parents('.form-group').removeClass('has-error');
							$('#email_id-error').remove();
						}
						else {
							$('#email_id').parents('.form-group').removeClass('has-error');
							$('#email_id-error').remove();
							$('#email_id').parents('.form-group').addClass('has-error');
							$('#email_id').parents('.form-group').append('<span id="email_id-error" class="help-block help-block-error">Please input valid email</span>');
						}  
					}
					else
					{
						$('#email_id').parents('.form-group').removeClass('has-error');
						$('#email_id-error').remove();
					}
					
		 if($('#name_person').val().length > 0 && $('#plan_id').val().length > 0  )
		 {
			 $(".page-spinner-bar").removeClass("hide"); //show loading
				ar.push(company_name,nationality,telephone,fax,email_id,arrival_date,departure_date,plan_id,billing_instruction,source_of_booking,safari_required,booking_thru_sales,reservation_status,room_type,requested,granted,rate_per_night,remarks,name_person,advance,booking_type,outlet_venue_id,b_date,id2,traveller_name,id_proof_no);
				var myJsonString = JSON.stringify(ar);
				$.ajax({
				url: "ajax_php_file?room_reseveration_add_form=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{
					
					alert(data);
					
					$('#room_reseveration_add_form')[0].reset();
					
							$(".toast").addClass("toast-success");
							$(".toast-message").html("Add successful...");
							 $("#toast-container").show();
							  var myVar=setInterval(function(){myTimer()},5000);
							   function myTimer() 
							   { $("#toast-container").hide(); }  
							   
						$(".page-spinner-bar").addClass(" hide"); //hide loading
					
				/*	$("#sample_1 >tbody").append(data);
					var len=$("#sample_1 >tbody >tr").length;
				
					$("#sample_1 >tbody >tr:last >td:first").text(len); */
				}
				});
		 }
			}));
		});
		$(document).ready(function()
        {
		$('#id_club_member').live('change',function(e)
			{
			$("#name_person").val($('option:selected', this).attr("name_person"));
			});
	});
		</script>
        
        