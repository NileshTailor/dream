<?php
$current_time=date("h:i:s A");
$sunrise = "5:42 am";
$afternoon = "12:00 pm";
$sunset = "5:00 pm";
$off = "11:59 pm";
$on = "12:00 am";
$date1 = DateTime::createFromFormat('H:i a', $current_time);
$date2 = DateTime::createFromFormat('H:i a', $sunrise);
$date3 = DateTime::createFromFormat('H:i a', $afternoon);
$date4 = DateTime::createFromFormat('H:i a', $sunset);
$date5 = DateTime::createFromFormat('H:i a', $off);
if ($date1 > $date2 && $date1 < $date3)
{
   $break= 'Morning';
} 
else if($date1 > $date3 && $date1 < $date4)
{
	$break= 'Afternoon';
}
else if($date1 > $date4 && $date1 < $date5)
{
	$break= 'Evening';
}
else 
{
	$break= 'Night';
}
?> 
<?php
 if(!empty($outlet))
 {
 	$outlet_array=explode(',', $outlet);
 } 
?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title">Gym, Spa & Pool Kot</div><div class="toast-message"> </div></div></div>
</div>
<div class="row">
    <div class="col-md-12">
    <div style="width:85%; margin-left:50px">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab"> <strong>General KOT</strong> </a>
                </li>
                <li class="">
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab"> <strong>View</strong> </a>
                </li>
               
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab_1_1">

  <div class="portlet-title">
                    <span style="margin-left:5%"><div id='success' class='note note-danger alert-notification'><font style="font-family:Georgia, 'Times New Roman', Times, serif">Gym, Pools & SPA</font></div></span>
                    
    <form method="post" enctype="multipart/form-data" id="add_billing_kot" >
                    
                    <table id="myTable" style="margin-top:1%; width:100% !important; height:120px !important" border="0">
                    
                    <tbody>
                      <tr><td><label>Outlet Name</label>
                    </td> 
                    <td>
                     <div class="form-group">
                    <select class="form-control input-inline input-small select2me" name="outlet_name" onchange="outlet_name_cat()"  id="outlet_name" placeholder="Select..">
                            <option value=""></option>
                            <?php
                            foreach($fetch_master_outlet as $data)
                            {	$out=$data['master_outlet']['id'];
                                if(in_array($out, $outlet_array))
                                {
                                    ?>
                                <option value="<?php echo $data['master_outlet']['id'];?>"><?php echo $data['master_outlet']['outlet_name'];?></option>
                                    <?php
                                }
                            }
                            ?>
                            </select></div></td>
                            <td></td><td></td><td></td><td></td>
                            </tr>
                        <tr>
                        <td><label>Room No</label></td>
                        <td class="form-group"><select class=" form-control input-small" name="room_no" id="room_no_idd">
                        <option value="">Select No.</option>
                        <?php
                        foreach($fetch_room_checkin_checkout as $data)
                        {
                        ?>
                        <option value="<?php echo $data['room_checkin_checkout']['master_roomno_id']; ?>" card_no="<?php echo $data['room_checkin_checkout']['card_no'];?>"
                        roomno_id="<?php echo $data['room_checkin_checkout']['master_roomno_id'];?>" company_id="<?php echo $data['room_checkin_checkout']['company_id'];?>" guest_name="<?php echo $data['room_checkin_checkout']['guest_name'];?>">
                        <?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></option>
                        <?php 
                        }
                        ?>
                        </select>
                        </td>
                        
                        <td><label>Company Name</label></td>
                        <td class="form-group"><select class=" form-control input-small" name="user_id" id="company_id">
                        <option value="">--- Select ---</option>
                        <?php
                        foreach($fetch_company_registration as $data)
                        {
                        ?>
                        
                        <option value="<?php echo $data['company_registration']['id']; ?>">
                        <?php echo $data['company_registration']['company_name']; ?></option>
                        <?php 
                        }
                        ?>
                        </select>
                        </td>

                        
                        <input type="hidden" name="roomno_id" id="roomno_id">
                        <td><label>Card No.</label></td>
                        <td>
                        <div class="form-group" >
                        <input name="card_no" id="card_no"  placeholder="Card No"   class="form-control input-inline input-small" type="text">
                        </div>
                        </td><td></td><td></td> 
                     
                     <tr>
                     
                     <td><label>Session</label></td>
                        <!--<td>
                         <select class="form-control input-small"  id="session" name="session" placeholder="Select...">
                                <option value=""></option>
                                <?php
                                foreach($fetch_plan_item_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['plan_item_category']['id'];?>">
                                <?php echo $data['plan_item_category']['item_category'];?></option>
                                <?php
                                }
                                ?>
                     </select></td>-->
             
             <td>
             <input type="text" class="form-control input-inline input-small" name="session" readonly="readonly" value="<?php echo $break; ?>"/>
           </td>  
           <td><label>Guest Name </label></td>
                    <td>
                     <div class="form-group" >
                    <input name="guest_name" id="guest_name"  placeholder="Guest Name" required class="form-control input-inline input-small" type="text">
                    </div>
                    </td>
                     <td><label>Covers</label></td>	
                    <td>
                    <div class="form-group" >
                    <input name="covers" placeholder="Covers" id="cover"  class="form-control input-inline input-small" type="text">
                    </div>
                    </td>
<tr>
                     <td><label>Item Category <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group">
                         <select class="form-control input-small select2me" required="required" placeholder="Select..." id="category" onchange="item_view();" name="master_itemcategory_id">
                         <option value="">--- Select ---</option>
                            </select></div></td>
                  <!--<td><label>Room Type</label></td>
                    <td>
                    
                    <select class="form-control input-inline input-small" name="room_type_id" id="room_type_id"  >
                            <option value="">--- Select ---</option>
                            <?php
                            foreach($fatch_master_room_type as $data)
                            {
                                ?>
                                <option value="<?php echo $data['master_room_type']['id'];?>"><?php echo $data['master_room_type']['room_type'];?></option>
                                <?php
                            }
                            ?>
                            </select>
                    </div>
                    </td>-->
                    <td><label>Remarks</label></td>
                     <td>
                        <input type="text" name="remarks" id="remark" class="form-control input-small" />
                     </td>
                    <td colspan="2">
                    <div class="radio-list">
                            <label class="radio-inline">
                            Club Member
                                <input type="radio" name="club_member_id" value="1"  id="club_member_id">Yes</label>
                                <label class="radio-inline">							
                                <input type="radio" name="club_member_id" value="0"  id="club_member_id1" checked="checked">No</label>
                                </div>
                    </td>
                     <td colspan="2" align="center"><div id="cmid" style="display:none">
                   <label> <select class="form-control input-small select2me" name="club_member_id" id="id_club_member" placeholder="Select...">
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
                    </select></label></div> 
                    </td>
                    
                   <!-- <td ><label>Room No </label></td>
                    <td width="30%"> <div class="form-group" >
                     <select class="form-control input-inline input-small"  name="room_no" id="room_no_idd">
                            <option value="">--- Select ---</option>
                            <?php
                            foreach($fatch_master_roomno as $rooms)
                            {
                            	$total_room=$rooms['master_roomno']['room_no'];
                                $romm_no=explode("," ,$total_room);
                                    foreach($romm_no as $romm_view)
                                    {
                                    ?>
                             			<option value="<?php echo $romm_view;?>"><?php echo $romm_view;?></option>
                                    <?php
                                    }
                            }
                            ?>
                            </select></div>
                    </td>--->
                    
                     </tr>
                   
                    
                    
                    

                    <!--<td><label>Steward</label></td>
                    <td>
                     <div class="form-group" >
                    <select class="form-control input-inline input-small" name="steward" id="steward">
                            <option value="">--Select--</option>
                            <?php
                            foreach($fatch_master_steward as $data)
                            {
                                ?>
                                <option value="<?php echo $data['master_steward']['id'];?>"><?php echo $data['master_steward']['steward_name'];?></option>
                                <?php
                            }
                            ?>
                            </select>
                   </div>
                    </td>-->
                    
                     <!-- <td colspan="2">
                 <div class="radio-list">
                            <label class="radio-inline">
                            Room Service
                            <input type="radio" name="room_service" value="0"  id="room_service2" checked="checked">No</label>
                                <label class="radio-inline">		
                               <input type="radio" name="room_service" value="1"  id="room_service1">Yes</label>
                                </div>
                    </td>-->
                    </tr>
                    </tbody>
                    </table>
                    <table width="100%" style="margin-top:5px;">
                    <tbody>
                    <tr id="1">
                    
                    <input type="hidden" name="m_cat_i" id="m_cat_i" />
                    <td><label>Item </label> </td>
                    <td><select class="form-control input-small select2me"  name="item" id="id_attr_ftc" onchange="check_tax();" data-placeholder="Select..." placeholder="Select..">
							<option value=""></option>
							
						</select>
                    </td>
                     <td><label>Quantity</label></td>
                    <td>  
                        <input name="quantity" class="form-control input-inline input-xsmall"  onkeyup="add_qty();" onkeypress="javascript:return isNumber (event)"  placeholder="Quantity" type="text" id="quantity">
                    </td>
                     <td><label>Rate</label></td>
                     <td>
                        <input name="rate" class="form-control input-inline input-xsmall" readonly="readonly"   placeholder="Rate" type="text" id="rate">
                    </td>
                    <td><label>Gross</label></td>
                    <td>
                        <input name="gross"  class="form-control input-inline input-xsmall" readonly="readonly" id="gross" placeholder="Gross" type="text">
                        </td>
                    <td><label>Taxes</label></td>
                    <td>
                        <input name="taxes" class="form-control input-inline input-xsmall" readonly="readonly" placeholder="Taxes" id="taxx"   type="text">
                        </td>
                        <td ><label>Amount</label></td>
                    <td>
                        <input name="amount" class="form-control input-inline input-xsmall" readonly="readonly"  placeholder="Amount" type="text" id="amount">
                        </td>
                        <td><button type="button" class="btn btn-xs btn-primary" onclick="billing_kot_add_form()">Add </button></td>
                    </tr>
                            </tbody>
                            </table>
                            <div style="overflow-y:scroll;   max-height:150px"><!--// height:150px !important"-->
                            <table width="100%" class="table table-bordered table-hover" style="margin-top:5px" id="View_table">
                            <thead>
                            <tr>
                           		<th width="18%">Item</th>
                         
                                <th width="10%">Quantity </th>
                                <th width="10%"> Rate  </th>
                                <th width="10%">Gross  </th>
                                <th width="10%">Taxes</th>
                                <th width="15%">Amount </th>
                                <th width="10%">Delete</th>
                            </tr>
                            </thead>
                            <tr></tr>
                           	</tbody>
                    </table>
                    </div>
                    <div style="padding-top:50px"><table border="0" width="100%">
                    <tr>
                                <td></td><td></td><td></td><td></td><td></td>
                                <td align="right" style="padding-right:5px; font-family:Georgia, 'Times New Roman', Times, serif"><label><b>Total</b></label></td>
                                <td width="10%"><input type="text" class="form-control input-inline input-small" placeholder="Net" 
                                name="tot_amount" id="tot_amount" readonly="readonly"></td>
                                </tr>
                                <tr>
                                <td></td><td></td><td></td><td></td><td></td>
                                <td align="right"  style="padding-right:5px; padding-top:10px"><label><b>Discount</b></label></td>
                                <td width="10%" style="padding-top:10px"><input type="text" value="0" class="form-control input-inline input-small" placeholder="Discount" 
                                name="discount" id="discount" onKeyUp="gym_discount()"></td>
                                </tr>
                                 <tr>
                                <td></td><td></td><td></td><td></td><td></td>
                                <td align="right" style="padding-right:5px; padding-top:10px"><label><b>Net Amount</b></label></td>
                                <td width="10%" style="padding-top:10px"><input type="text" class="form-control input-inline input-small" placeholder="Net" 
                                name="net_amount" id="net_amount" readonly="readonly"></td>
                                </tr>
                                <input type="hidden" name="due" id="due" />
                    </table></div>
                    
                    
                     <!--<table width="100%">
                <tr>
                <td style="width:100%;" align="center">
                                     <div class="form-group" >
                        <div class="radio-list">
                           <label class="radio-inline">
                            <input type="radio" name="payment_type"  value="1" id="fp"> Full Payment </label>
                            <label class="radio-inline">
                            <input type="radio" name="payment_type" value="2" id="brm"> By Room </label>
                        </div>
                    </div>
                     </td>
                </tr>
                </table>-->
                    
                    <tr>
                    <td colspan="6">
                      <fieldset>
                <legend>Payment Mode</legend>
                <table class="table" style=" width:100% !important;">
             <thead>
                <tr>
                <td style="width:50%;" align="center">
                             <div class="form-group" >
                        <div class="radio-list">
                        <div id="brm_id">
                           <label class="radio-inline">
                            <input type="radio" name="payment_mode"  value="Cash" id="cre"> Cash </label>
                            <label class="radio-inline">
                            <input type="radio" name="payment_mode" value="Credit Card" id="cre1"> Credit Card </label>
                            <label class="radio-inline">
                                        <input type="radio" name="payment_mode" value="NEFT" id="cre2">NEFT</label>
                                        <label class="radio-inline">
                                        <input type="radio" name="payment_mode" value="Cheque" id="cre3">Cheque</label></div>
                                        
                                       <!-- <div style="display:none" id="include_advance"><label class="radio-inline">
                                        <input type="radio" name="payment_mode" value="Advance">Include in Advance</label></div>-->
                                        
                        </div>
                    </div>
                     </td>
                     <td align="right">Amount</td>
                     <td><input type="text" class="form-control input-inline input-small" name="rec_amount" id="rec_amount" onkeyup="fun_tot_amount();" /></td>
                     <td><input type="text" class="form-control input-inline input-small" placeholder="Narration" name="narration"/></td>
                     </tr>
                    
                     <tr id="cheque"  style="display:none">
                     <td colspan="6">
               <table class="table" style=" width:100% !important;">
             <thead>
                <tr>
                <td>
                Cheque No.
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" name="cheque_no" />
                </td>
                <td>
                Cheque Date
                </td>
                <td class="form-group"><div class="input-group"><label><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="cheque_date" data-date="12-08-2015" value="<?php echo  date("d-m-Y"); ?>"></label></div></td>
                 <td>
                Bank Name
                </td>
                <td>
                 <input type="text" class="form-control input-inline input-medium" name="bank_name" />
                </td>
                </tr>
                </thead>
                </table></td></tr>
                <!----------------------------------------------------->
                <tr id="neft"  style="display:none">
                     <td colspan="6">
               <table class="table" style=" width:100% !important;">
             <thead>
                <tr>
                <td>
                NEFT No.
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" name="neft_no" />
                </td>
                </tr>
                </thead>
                </table></td></tr>
                
                <!--------------------------------------------------------------------->
                <tr id="credit"  style="display:none">
                     <td colspan="6">
               <table class="table" style=" width:100% !important;">
             <thead>
                <tr>
                <td>
                Credit Card Name
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" name="credit_card_name" />
                </td>
                
                <td>
                Credit Card No.
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" name="credit_card_no" />
                </td>
                
                </tr>
                </thead>
                </table></td></tr>
                <!------------------------------------------------------------------------>
                
                
                </thead></table></fieldset>
                    
                    
   <div class="form-group">
             <button type="submit" style=" margin-left:35%; margin-top:1%" class="btn blue" name="form_submit"><i class="fa fa-plus"></i> Submit </button>
             &nbsp;<button type="reset" name="" class="btn red" style=" margin-top:1%" value="form_submit"><i class="fa fa-level-down"></i> Reset</button>
                  </div>  </form>
                          <div id="show_data">
    </div>   
                    </div>
                </div>
                
                        
<div class="tab-pane fade" id="tab_1_2">
 
    <div class="portlet-title">
    <span style="margin-left:5%" class="caption-subject font-green-sharp bold uppercase">View Billing kot</span>
     <form method="post" id="">
                      <!--<a class="btn default btn-xs blue" style="margin-left:94%; margin-top:4% width:4%" href="room_reservation_excel" target="_blank">Excel</a>-->
<div style="overflow-y:scroll;  max-height:380px">
  <table class="table table-striped table-bordered table-hover" style="margin-top:1px" id="sample_1">
    <thead>
    <tr>
        <th>S.No</th>
        
        <th>Outlets Name</th>
        <th>Session</th>
        <th>Current Date</th>
        <th>Table No.</th>
        <th>Guest Name</th>
        <th>Covers</th>
        <th>Steward</th>
        <th>Delete</th>
     </tr>
     </thead>
<tbody>
<?php
$i=0;
 foreach($fatch_billing_kot_data as $data){ 
 $i++;
 $id=$data['pos_kot'] ['id'];
 $master_outlets_id=$data['pos_kot'] ['master_outlets_id'];
 $session=$data['pos_kot'] ['session'];
 $master_stewards_id=$data['pos_kot'] ['master_stewards_id'];
  $master_tables_id=$data['pos_kot'] ['master_tables_id'];
 ?>
<tr id="for_delete<?php echo $id; ?>">

<td><?php echo $i; ?></td>
<td><?php  echo $Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$data['pos_kot']['master_outlets_id']), array());?></td>
<td><?php echo $data['pos_kot'] ['session'] ?></td>
<td><?php echo date("d-m-Y",strtotime($data['pos_kot']['current_date'])); ?></td>
<td><?php  echo $table_no=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$data['pos_kot']['master_tables_id']), array());?></td>
<!-- <td><?php  echo $room_type=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['pos_kot']['master_room_types_id']), array());?></td>-->


<td><?php echo $data['pos_kot'] ['guest_name'] ?></td>
<td><?php echo $data['pos_kot'] ['covers'] ?></td>
<td><?php  echo $steward_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_steward_name_fetch',$data['pos_kot']['master_stewards_id']), array());?></td>
<!--<td class="print-hide"><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" target="_blank" href="edit_billing_kot?id=<?php echo $id; ?>"><i class="fa fa-edit"></i> Edit </a>-->


<td><a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id ?>"><i class="fa fa-trash-o"></i> Delete</a>
    
    <div class="modal fade" id="delete<?php echo $id ?>" tabindex="-1" role="delete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" onClick="delete_tr_id(<?php echo $id;?>);" class="btn default btn-xl red"><i class="fa fa-trash-o"></i> Delete</button>
                </div>
             </div>
            <!-- /.modal-content -->
        </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    
</td>

</tr>
<?php } ?>
</tbody>
</table>
</div>
         </form> 
                    </div>
                    </div>
               </div>

              </div>    
			</div>  
    	</div>
    </div>
</div>
    
    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add Item</h4>
            </div>
            <div class="modal-body">
            <form method="post" name="add" >
                    <table class="table self-table"  style=" width:100% !important;">
                    <tr>
                    <td><label>Item Category</label></td>
                    <td> <select class="form-control input-medium" required="required" onchange="item_view();" id="category" name="master_itemcategory_id">
                    <option value="">--- Select ---</option>
                    <?php
                    foreach($fetch_master_item_category as $data)
                    {
                    ?>
                    <option value="<?php echo $data['master_item_categorie']['id'];?>">
                    <?php echo $data['master_item_categorie']['item_category'];?></option>
                    <?php
                    }
                    ?>
                    </select></td>
                    </tr>
                     <tr>
                    <td><label>Item Type</label></td>
                    <td> <select class="form-control input-medium" id="item" name="master_item_type_id">
                            <option value="">--- Select ---</option>
                            <?php
                            foreach($fetch_master_item_type as $data)
                            {
                            ?>
                            <option value="<?php echo $data['master_item_type']['id'];?>"><?php echo $data['master_item_type']['itemtype_name'];?></option>
                            <?php
                            }
                            ?>
                        </select></td>
                    </tr>
                    <tr>
                    <td><label>Item Name</label></td>
                    <td><input type="text" class="form-control input-inline input-medium" placeholder="Item Name" name="item_name"></td>
                    </tr>
                    <tr>
                    <td><label>Billing Rate</label></td>
                    <td><input type="text" class="form-control input-inline input-medium" placeholder="Billing Rate" name="billing_rate"></td>
                    </tr>
                    <tr>
                    <td><label>Billing Room Rate</label></td>
                    <td><input type="text" class="form-control input-inline input-medium" placeholder="Billing Room Rate" name="billing_room_rate"></td>
                    </tr>
                    <tr>
                    <td><label>Item Cost</label></td>
                    <td><input type="text" class="form-control input-inline input-medium" placeholder="Item Cost" name="item_cost"></td>
                    </tr>
                    
                    <tr>
                    <td><label>Status</label></td>
                    <td><input type="text" class="form-control input-inline input-medium" placeholder="Status" name="status"></td>
                    </tr>
                    </table>
              </form>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                <button type="button" onclick="kot_item_type();" data-dismiss="modal" class="btn green" value="add_master_item"><i class="fa fa-plus"></i> Add</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>      
	<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script>
	
	function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
       }
	//////////////////////////////
	function check_tax()
		{	var ar = [];
			var item_id=$("select[id=id_attr_ftc]").val();
			//alert(item_id);
			ar.push(item_id);
			var myJsonString = JSON.stringify(ar);
                $.ajax({ 
                url: "ajax_php_file?view_tax_item_type_kot=1&q="+myJsonString,
                type: "POST", 
				 success: function(data)
                {
					$("#taxx").val(data); 
					add_tax();
                }
                });	
				
		}
		
		function check_tax1()
		{	
		//alert();
		var ar = [];
			var item_id=$("select[id=id_attr_ftcc]").val();
			ar.push(item_id);
			var myJsonString = JSON.stringify(ar);
                $.ajax({ 
                url: "ajax_php_file?view_tax_item_type_kott=1&q="+myJsonString,
                type: "POST", 
				 success: function(data)
                {
					$("#taxx1").val(data); 
					add_tax();
                }
                });	
				
		}
		
		/*$(document).ready(function(){
$(".rej").live("click",function(){
//var dc_id =$(this).attr("ap_id");

$('#show_data').html('<div style="display: block; padding-right: 17px; padding-top: 17px;" class="modal fade bs-modal-sm in" id="small" tabindex="-1" role="dialog" aria-hidden="false"><div style="" class="modal-backdrop fade in"></div><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button><h4 class="modal-title">Modal Title</h4></div><div class="modal-body"> Modal body goes here</div><div class="modal-footer"><a href="billing_kot?con=1" class="btn blue">Save & Print</a><a href="billing_kot?con=2" class="btn blue">Bill Settle & Print</a></div></div></div></div>');
//$("#can").live("click",function(){
//$('#pp').hide();
//});
});
});*/





		
		
	function add_qty()
	{
	var quantity=eval($("input[name=quantity]").val());
	var rate=eval($("input[name=rate]").val());
	var after_qty=quantity * rate;
	$("#gross").val(after_qty);
	
		var ar = [];
		var item_id=$("select[id=id_attr_ftc]").val();
		ar.push(item_id,after_qty);
		var myJsonString = JSON.stringify(ar);
				$.ajax({ 
				url: "ajax_php_file?view_tax_item_type_kot=1&q="+myJsonString,
				type: "POST", 
				 success: function(data)
				{ 
					$("#taxx").val(data); 
					add_tax();
				}
				});
	}
	$(document).ready(function(){
	$("#cre").click(function(){
		$('#credit').hide();
		$('#cheque').hide();
		$('#neft').hide();
		
    });
	$("#cre1").click(function(){
		$('#credit').show();
		$('#cheque').hide();
		$('#neft').hide();
    });
	$("#cre2").click(function(){
		$('#credit').hide();
		$('#cheque').hide();
		$('#neft').show();
    });
	$("#cre3").click(function(){
		$('#credit').hide();
		$('#cheque').show();
		$('#neft').hide();
    });
	});
	
	
	$(document).ready(function(){
	$("#brm").click(function(){
		$('#include_advance').show();
		$('#brm_id').hide();
		$('#credit').hide();
		$('#cheque').hide();
		$('#neft').hide();
		
    });
	$("#fp").click(function(){
		$('#include_advance').hide();
		$('#brm_id').show();
		$('#credit').hide();
		$('#cheque').hide();
		$('#neft').hide();
		
    });
	});
	
	
	
		function add_tax()
		{
		var gross=eval($("input[name=gross]").val());
		//alert(gross);
		var taxes=eval($("input[name=taxes]").val());
		//alert(taxes);
		var tot_amt= eval(gross + taxes);
		tot_amt = Math.round(tot_amt);
		$("#amount").val(tot_amt);
		}
	
	function item_view()
		{
			//alert();
			var category_id=$("select[id=category]").val();
                $.ajax({ 
                url: "ajax_php_file?vieww_categoryy_itemm_typee=1&q="+category_id,
                type: "POST", 
				 success: function(data)
                { 
					$("#id_attr_ftc").html(data); 
                }
                });	
		}
	
	
	function kot_item_type()
		{
			$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				var master_itemcategory_id=$("select[name=master_itemcategory_id]").val();
				var master_item_type_id=$("select[name=master_item_type_id]").val();
				var item_name=$("input[name=item_name]").val();
				var billing_rate=$("input[name=billing_rate]").val();
				var billing_room_rate=$("input[name=billing_room_rate]").val();
				var item_cost=$("input[name=item_cost]").val();
				var status=$("input[name=status]").val();
				ar.push(master_item_type_id,item_name,billing_rate,billing_room_rate,item_cost,status,master_itemcategory_id);
				
				var myJsonString = JSON.stringify(ar);
				$.ajax({
				url: "ajax_php_file?billing_kot_item_add=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{
					if(data=='error')
					{
						$(".page-spinner-bar").addClass(" hide");
					}else
					{
					$("#id_attr_ftc").html(data);  
					$(".page-spinner-bar").addClass(" hide");
					}
					
				}
				});
		}
		function delete_tr_id(id)
            { 
				$(".page-spinner-bar").removeClass("hide"); //show loading
					$.ajax({
						url: "ajax_php_file?delete_billingKOT_data=1&q="+id,
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
		function kot_billing_deleterow(id,amt)
		{
			//alert(amt);
			            var tot_amount=eval($('#tot_amount').val());
						if($('#tot_amount').val().length ==''){ 
							tot_amount = '0';
						}
						//alert(tot_amount);
						if(amt>0)
						{
							tot_amount= parseInt(tot_amount) - parseInt(amt);
						}
						$('#tot_amount').val(tot_amount);
						$('#net_amount').val(tot_amount);
			
			$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				$.ajax({
				url: "ajax_php_file?kot_billing_delete_row=1&q="+id,
				type: "POST",         
				success: function(data)
				{
					
					$("#"+id).remove();
					$(".page-spinner-bar").addClass(" hide");
				}
				})
		}
		
		function billing_kot_add_form()
			{
				var item_name=$("select[name=item]").val();
				//alert(item_name);
				if(item_name!='')
				{
					$(".page-spinner-bar").removeClass("hide"); //show loading
					var ar = [];
					
					//var item_name=$("select[name=item]").val();
					//alert(item_name);
					var quantity=$("input[name=quantity]").val();
					var rate=$("input[name=rate]").val();
					var gross=$("input[name=gross]").val();
					var taxes=$("input[name=taxes]").val();
					var amount=$("input[name=amount]").val();
					var m_cat_i=$("input[name=m_cat_i]").val();
					ar.push(item_name,quantity,rate,gross,taxes,amount,m_cat_i);
					
					var myJsonString = JSON.stringify(ar);
					
					$.ajax({
					url: "ajax_php_file?billing_kot_2_add_form=1&q="+myJsonString,
					type: "POST",         
					success: function(data)
					{
						
						//$('#billing_kot_add_form')[0].reset();
						$("#View_table > tbody > tr:last").after(data);
						$(".page-spinner-bar").addClass(" hide");
						
						$("select[name=item]").val('');
						$("input[name=quantity]").val('');
						$("input[name=rate]").val('');
						$("input[name=gross]").val('');
						$("input[name=taxes]").val('');
						$("input[name=amount]").val('');
					}
				   
					});gym(amount);
				}
				else
				{
					alert("Please select any Item");
				}
			}
		
        function gym(r)
		{
			//alert(r);
					   var tot_amount=eval($('#tot_amount').val());
						if($('#tot_amount').val().length ==''){ 
							tot_amount = '0';
						}
						var due=eval($('#due').val());
						if($('#due').val().length ==''){ 
							due = '0';
						}
						if(r>0)
						{
							tot_amount= parseInt(tot_amount) + parseInt(r);
						}
						$('#tot_amount').val(tot_amount);
						$('#net_amount').val(tot_amount);
						$('#due').val(tot_amount);
		}
		
		function gym_discount()
		{
					   var net_amount=eval($('#net_amount').val());
						if($('#net_amount').val().length ==''){ 
							net_amount = '0';
						}
						var tot_amount=eval($('#tot_amount').val());
						if($('#tot_amount').val().length ==''){ 
							tot_amount = '0';
						}
						var discount=eval($('#discount').val());
						if($('#discount').val().length ==''){ 
							discount = '0';
						}
						var due=eval($('#due').val());
						if($('#due').val().length ==''){ 
							due = '0';
						}
							tot= parseInt(tot_amount) - parseInt(discount);
						$('#net_amount').val(tot);
						$('#due').val(tot);
						
		}
		function fun_tot_amount()
		{
			//alert();
			            var rec_amount=eval($('#rec_amount').val());
						if($('#rec_amount').val().length ==''){ 
							rec_amount = '0';
						}
						//alert(amount);
						var due=eval($('#due').val());
						if($('#due').val().length ==''){ 
							due = '0';
						}
					   var net_amount=eval($('#net_amount').val());
						if($('#net_amount').val().length ==''){ 
							net_amount = '0';
						}
						cash= parseInt(net_amount) - parseInt(rec_amount);
						$('#due').val(cash);
		}
		
		function outlet_name_cat()
		{
			//alert();
			var outlet_id=$("select[id=outlet_name]").val();
			$.ajax({ 
			url: "ajax_php_file?outlet_cat_fetch=1&q="+outlet_id,
			type: "POST", 
			success: function(data)
			{ 
			//alert(data);
				$("#category").html(data);
			}
			});
		}
		///////////////////
		function outlet_item_c()
		{
			//alert();
			var table_no=$("select[id=table_no]").val();
			$.ajax({ 
			url: "ajax_php_file?outlet_item_c_fetch=1&q="+table_no,
			type: "POST", 
			success: function(data)
			{ 
			//alert(data)
			
				var da=data.split(",");
			//$("#master_roomno_id").val(data);
			$("#cover").val(da[0]);
			$("#card_no").val(da[1]);
			$("#room_no_idd").val(da[2]);
			$("#session").val(da[3]);
			$("#guest_name").val(da[4]);
			$("#remark").val(da[5]);
			$("#steward").val(da[6]);
			//$('#steward option[value="' + da[6] + '"]').prop('selected', true);
			
			//var t=$('#steward option[selected="selected"]').text();
			//alert(t);
			
				
			}
			});
		}
		//////////////////////
	
		
    /////////////////////////////////////////////////////////////////////////////////////// 
	        
		//$(document).ready(function()
       // {
	////
			/*$("#room_no_idd").on('change',(function(e)
            {
                e.preventDefault();
                var ar = [];
                var room_no=$("select[id=room_no_idd]").val();
                ar.push(room_no);
                var myJsonString = JSON.stringify(ar);
				//alert(myJsonString);
                $.ajax({ 
                url: "ajax_php_file?outlet_guest_fetch=1&q="+myJsonString,
                type: "POST", 
				          
                success: function(data)
                { 
				
					$("#guest_name").val(data);  
                }
                }); 
            }));	*/
			///
	     $(document).ready(function()
		 {
      		$('#room_no_idd').live('change',function(e){
			 			 $("#card_no").val($('option:selected', this).attr("card_no"));
						 $("#roomno_id").val($('option:selected', this).attr("roomno_id"));
						 $("#company_id").val($('option:selected', this).attr("company_id"));
						 $("#guest_name").val($('option:selected', this).attr("guest_name"));
			});
			
			$('#id_attr_ftc').live('change',function(e)
			{
			$("#m_cat_i").val($('option:selected', this).attr("m_cat_i"));
			$("#quantity").val($('option:selected', this).attr("quantity"));
            $("#rate").val($('option:selected', this).attr("rate"));
			$("#gross").val($('option:selected', this).attr("rate"));
			});
			
			
	shortcut.add("enter",function()
    {    
	billing_kot_add_form();
       // document.getElementById("frm1").submit();
       
    },{
        'type':'keydown',
        'propagate':true,
        'target':document
    });
	
		});
		
			
			

		//});
		$(document).ready(function()
        {
		$('#id_club_member').live('change',function(e)
			{
			$("#guest_name").val($('option:selected', this).attr("guest_name"));
			});
	});
	
	$(document).ready(function(){
		$("#club_member_id").click(function(){
		$('#cmid').show();
		});
		$("#club_member_id1").click(function(){
		$('#cmid').hide();
		});
	});
	
	$(document).ready(function()
        {
		$('#category').live('change',function(e)
			{
			$("#m_cat_i").val($('option:selected', this).attr("m_cat_i"));
			});
	});
		</script>       