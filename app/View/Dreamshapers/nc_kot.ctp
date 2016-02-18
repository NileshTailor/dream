<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title"> NC KOT </div><div class="toast-message"> </div></div></div>
</div>

<div class="row">
<div class="col-md-12">
<div style="float:right;">
        <li><a data-toggle="modal" class="tooltips" data-placement="bottom" data-original-title="POS Info" href="#deletedis1"><i class="fa fa-joomla" style="color:#F00"></i></a> </li>
 <div class="modal fade" id="deletedis1" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px;">
                            <div class="modal-dialog modal-md" >
                                <div class="modal-content" >
                                    <div class="modal-header" >
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <div>
                                    <table>
                                    	<tbody>
                                        <div style="float:center; width:15%; background-color:#CFF"> <table style="margin-top:1px" id="sample_1">
<tr><td>
<thead><tr>
        <th style="border-bottom:groove 5px #009; font-family:Georgia, 'Times New Roman', Times, serif; color:#0C9">Running Table No.</th>
     </tr>
     </thead>
<tbody>
<?php
$i=0;
 foreach($faatch_NC_kot_data as $data){ 
 $i++;
 $id=$data['pos_kot'] ['id'];
 $master_outlets_id=$data['pos_kot'] ['master_outlets_id'];
 $session=$data['pos_kot'] ['session'];
 $master_stewards_id=$data['pos_kot'] ['master_stewards_id'];
  $master_tables_id=$data['pos_kot'] ['master_tables_id'];
 ?>
<tr id="for_delete<?php echo $id; ?>">
<td><?php  echo $table_no=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$data['pos_kot']['master_tables_id']), array());?></td>
</tr>
<?php }?>
</tbody>
</td></tr>

<tr>
<td>
<br /><br /><br /><br />
<thead>
    <tr>
        <th style="border-bottom:groove 5px #009; font-family:Georgia, 'Times New Roman', Times, serif; color:#00C">Pending Settlement</th>
     </tr>
     </thead>
<tbody>
<?php
$i=0;
 foreach($faaatch_NC_kot_data as $data){ 
 $i++;
 $id=$data['pos_kot'] ['id'];
 $master_outlets_id=$data['pos_kot'] ['master_outlets_id'];
 $session=$data['pos_kot'] ['session'];
 $master_stewards_id=$data['pos_kot'] ['master_stewards_id'];
  $master_tables_id=$data['pos_kot'] ['master_tables_id'];
  $pos_net_amount=$data['pos_kot'] ['pos_net_amount'];
 ?>
<tr id="for_delete<?php echo $id; ?>">

<td>
 <?php 
if(!empty($pos_net_amount)){
	 echo $table_no=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$data['pos_kot']['master_tables_id']), array()); echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';  echo $pos_net_amount; 
}?>
</td></tr>
<?php }?>
</tbody></td></tr>
</table></div>
                                 </tbody>
                                            </table>
                                      </div>  
                                     </div>
                           	 	</div>
                            <!-- /.modal-content -->
                           	 </div>
                            <!-- /.modal-dialog --></div>

            <?php
$current_time=date("h:i:s A");
$sunrise = "5:42 am";
$afternoon = "12:00 pm";
$sunset = "5:00 pm";
$date1 = DateTime::createFromFormat('H:i a', $current_time);
$date2 = DateTime::createFromFormat('H:i a', $sunrise);
$date3 = DateTime::createFromFormat('H:i a', $afternoon);
$date4 = DateTime::createFromFormat('H:i a', $sunset);
if ($date1 > $date2 && $date1 < $date3)
{
   $break= 'Breakfast';
} 
else if($date1 > $date3 && $date1 < $date4)
{
	$break= 'Lunch';
}
else if($date1 > $date4)
{
	$break= 'Dinner';
}
?>
<?php
 if(!empty($outlet))
 {
 	$outlet_array=explode(',', $outlet);   
 } 
?>
<div style="float:left; width:100%">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">NC KOT</a>
                </li>
                <li class="">
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab_1_1">
  				<div class="portlet-title">
                    <span style="margin-left:5%" class="caption-subject font-green-sharp bold uppercase">NC KOT</span>
                    
    			<form method="post" enctype="multipart/form-data" id="add_nc_kot">
                    <table id="myTable" style="margin-top:1%; width:100% !important;" border="0">
                    <tbody>
                    <tr>
                    <td colspan="2">
                    <div class="radio-list">
                            <label class="radio-inline">
                            Club Member
                                <input type="radio" name="club_member" value="1"  id="club_member_id" checked="checked">Yes</label>
                                <label class="radio-inline">							
                                <input type="radio" name="club_member" value="0"  id="club_member_id1">No</label>
                                </div>
                    </td></tr>
                            <tr>
                            <td><label>Outlet Name</label></td>
                            <td>
                     <div class="form-group" >
                    <select class="form-control input-inline input-small select2me" name="outlet_name" onchange="outlet_name_Tname()"  id="outlet_name" placeholder="Select..">
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
                         
                            <td><label>Table No</label></td>
                    <td><div class="form-group" >
                     <select class="form-control input-inline input-small select2me" required name="table_no" id="table_no" onchange="outlet_item_c();" placeholder="Select..">
                           <option value=""></option>
                            </select>
                            </div>
                    </td>

                        <td id="lb_rn" style="display:none"><label>Room No</label></td>
                        <td id="lb_rn1" style="display:none" class="form-group"><select class=" form-control input-small" name="room_no" id="room_no_idd">
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
                        <td id="lb_rn2" style="display:none"><label>Company Name</label></td>
                        <td id="lb_rn3" style="display:none" class="form-group"><select class=" form-control input-small" name="user_id" id="company_id">
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
                        
                        <td id="lb_cn"><label>Member Card No.</label></td>
                         <td colspan="2"><div id="lb_cn1">
                   <label><select class="form-control input-small select2me" name="club_member_id" id="id_club_member" placeholder="Select...">
                    <option value=""></option>
                    <?php
                    foreach($fetch_registration as $data)
                    {
                        ?>
                        <option guest_name="<?php echo $data['registration']['name'];?>" club_card="<?php echo $data['registration']['card_id_no'];?>"   value=
                        "<?php echo $data['registration']['id'];?>">
                        <?php echo $data['registration']['id'];?> (<?php echo $data['registration']['name'];?>)</option>
                        <?php
                    }
                    ?>
                    </select></label></div>
                    </td> <td></td>
                    
                        
                        </tr>
                     <tr>
                     <td><label>Session</label></td>
                     <td>
                     <input type="text" class="form-control input-inline input-small" name="session" readonly="readonly" value="<?php echo $break; ?>"/>
                    </td>
                    <td><label>Card No.</label></td>
                        <td>
                        <div class="form-group" >
                        <input name="card_no" id="card_no"  placeholder="Card No"   class="form-control input-inline input-small" type="text">
                        </div>
                        </td>
                        <td ><label>Guest Name </label></td>
                    <td>
                     <div class="form-group" >
                    <input name="guest_name" id="guest_name"  placeholder="Guest Name"   class="form-control input-inline input-small" type="text">
                    </div>
                    </td>
                     <td><label>Covers</label></td>
                    <td>
                    <div class="form-group" >
                    <input name="covers" placeholder="Covers" id="cover"  class="form-control input-inline input-small" type="text">
                    </div>
                    </td>
                     </tr>
                  <tr>
                  <td><label>Item Category <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group">
                         <select class="form-control input-small select2me" required="required" placeholder="Select..." 
                         id="category" onchange="item_view();" name="master_itemcategory_id">
                         <option value="">--- Select ---</option>
                            </select></div></td>
                    <td ><label>Steward</label></td>
                    <td>
                     <div class="form-group" >
                    <select class="form-control input-inline input-small" name="steward" id="steward" placeholder="Select..">
                            <option value="">--Steward--</option>
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
                    </td>
                    <td><label>Remarks</label></td>
                     <td>
                        <input type="text" name="remarks" id="remark" class="form-control input-small" />
                     </td>
                    
                     <td colspan="2">
                 <div class="radio-list">
                 
                            <label class="radio-inline">
                            Room Service
                            <input type="radio" name="room_service" value="0"  id="room_service2" checked="checked">No</label>
                                <label class="radio-inline">		
                               <input type="radio" name="room_service" value="1"  id="room_service1">Yes</label>
                                </div>
                    </td>
                    </tr>
                    
                    </tbody>
                    </table>
                    <table width="100%" style="margin-top:0px; padding-top:5px">
                    <tbody>
                    <tr id="1">
                    <input type="hidden" name="m_cat_i" id="m_cat_i" />
                    <td><label>Item </label> </td>
                    <td><select class="form-control input-small select2me"  name="item" id="id_attr_ftc" onchange="check_tax();" data-placeholder="Select...">
					<option value=""></option>
											<!-- <?php
                            foreach($fatch_master_items as $data)
                            {
                                ?>
                         <option quantity="1" rate="<?php echo $data['master_item']['billing_rate'];?>" amount="<?php echo $data['master_item']['billing_room_rate'];?>"  value="<?php echo $data['master_item']['id'];?>"><?php echo $data['master_item']['item_name'];?></option>
                                <?php
                            }
                            ?>-->
					</select>
                    
                    </td>
                    <td><a class="btn green btn-xs btn-primary" data-toggle="modal" href="#basic" ><i class="fa fa-plus"></i> SP</a>
                    </td>
                    <td><label>Quantity</label></td>
                            
                            <td>
                            <input name="quantity" class="form-control input-inline input-xsmall" onkeyup="add_qty();" 
                             onkeypress="javascript:return isNumber (event)"placeholder="Quantity" type="text" id="quantity">
                            </td>
                             <td><label>Rate</label></td>
                             <td>
                                <input name="rate" class="form-control input-inline input-xsmall"  placeholder="Rate" type="text" id="rate">
                            </td>
                            <td><label>Gross</label></td>
                            <td>
                                <input name="gross"  class="form-control input-inline input-xsmall" id="gross" placeholder="Gross" type="text">
                                </td>
                            <td><label>Taxes</label></td>
                            <td>
                                <input name="taxes" class="form-control input-inline input-xsmall" placeholder="Taxes" id="taxx" type="text">
                                </td>
                                <td ><label>Amount</label></td>
                            <td>
                                <input name="amount" class="form-control input-inline input-xsmall"  placeholder="Amount" type="text" id="amount">
                                </td>
                                <td><button type="button" class="btn btn-xs btn-primary" onclick="NC_kot_add_form()">Add </button></td>
                            </tr>
                         
                            </tbody>
                            </table>
                         <div style="overflow-y:scroll;  max-height:150px" >
                         <table width="100%" class="table table-bordered table-hover" style="margin-top:2px" id="View_table">
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
                     <button type="submit" name="form_submit" style=" margin-left:35%; margin-top:1%" class="btn blue">Submit</button> 
                    </form>
                    </div>
                </div>
                        
                <div class="tab-pane fade" id="tab_1_2">
                  <div class="portlet light">
                    <div class="portlet-title">
                    <span style="margin-left:5%" class="caption-subject font-green-sharp bold uppercase">View NC kot</span>
                      <form method="post" id="">
                      <!--<a class="btn default btn-xs blue" style="margin-left:94%; margin-top:4% width:4%" href="room_reservation_excel" target="_blank">Excel</a>-->
                     <div style="overflow-y:scroll; max-height:400px">
     <table class="table table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr>
    	<th>S.No</th>
        
        <th>Outlets Name</th>
        <th>Session</th>
        <th>Date</th>
        <th>Table No.</th>
        <th>Room No. </th>
        <th>Guest Name</th>
        <th>Covers</th>
        <th>Steward</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		 foreach($fatch_NC_kot_data as $data){ 
		 $i++;
		 $id=$data['pos_kot'] ['id'] 
		 ?>
        <tr id="for_delete<?php echo $id; ?>">
        
        <td><?php echo $i; ?></td>
     <td><?php  echo $Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$data['pos_kot']['master_outlets_id']), array());?></td>
        <td><?php echo $data['pos_kot'] ['session'] ?></td>
        <td><?php echo $data['pos_kot'] ['date'] ?></td>
        <td><?php  echo $table_no=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$data['pos_kot']['master_tables_id']), array());?></td>
        <td><?php echo $data['pos_kot'] ['master_roomnos_id'] ?></td>
        
        <td><?php echo $data['pos_kot'] ['guest_name'] ?></td>
        <td><?php echo $data['pos_kot'] ['covers'] ?></td>
        <td><?php  echo $steward_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_steward_name_fetch',$data['pos_kot']['master_stewards_id']), array());?></td>
      
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
                    <tr>
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
	   ////////////////
	function check_tax()
		{	var ar = [];
			var item_id=$("select[id=id_attr_ftc]").val();
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
	function add_tax()
	{
		var gross=eval($("input[name=gross]").val());
		var taxes=eval($("input[name=taxes]").val());
		var tot_amt= eval(gross + taxes);
		tot_amt = Math.round(tot_amt);
		$("#amount").val(tot_amt);
	}
	/*function item_view()
		{
			
			var category_id=$("select[id=category]").val();
                $.ajax({ 
                url: "ajax_php_file?view_category_item_type=1&q="+category_id,
                type: "POST", 
				 success: function(data)
                { 
					if(data=='error')
					{ //alert("Please Fill any Item"); 
					$("#item").html('<option value="">--- Select ---</option>');
					
					 } else { 
					$("#item").html(data); 
					}
                }
                });	
		}*/
	function NC_kot_add_form()
			{
				var item_name=$("select[name=item]").val();
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
					url: "ajax_php_file?NC_kot_add_form=1&q="+myJsonString,
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
				   
					});
				}
				else
				{
					alert("Please select any Item");
				}
			
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
					$(".page-spinner-bar").addClass("hide");
					}
				}
				});
		}
		
		function delete_tr_id(id)
            { 
				$(".page-spinner-bar").removeClass("hide"); //show loading
					$.ajax({
						url: "ajax_php_file?delete_ncKOT_data=1&q="+id,
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
		
		function kot_NC_deleterow(id)
		{
			$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				$.ajax({
				url: "ajax_php_file?kot_NC_delete_row=1&q="+id,
				type: "POST",         
				success: function(data)
				{
					$("#"+id).remove();
					$(".page-spinner-bar").addClass(" hide");
				}
				})
		}
		function outlet_name_Tname()
		{
			//alert();
			var outlet_id=$("select[id=outlet_name]").val();
			$.ajax({ 
			url: "ajax_php_file?outlet_table_fetch=1&q="+outlet_id,
			type: "POST", 
			success: function(data)
			{ 
			//alert(data);
				$("#table_no").html(data);
				outlet_name_cat();
			}
			});
		}
		
		///////////////////
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
		/////////////////////
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
	////////////////////////////////////////
		
		
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
		/*function room_no_guest_ftc()
            {
                var room_no=$("select[id=room_no_idd]").val();
                $.ajax({ 
                url: "ajax_php_file?outlet_guest_fetch_NC=1&q="+room_no,
                type: "POST", 
                success: function(data)
                { 
					$("#guest_name").val(data);  
                }
                });
			}	*/
    ///////////////////////////////////////////////////////////////////////////////////////         
		
				
		/*$("#NC_kot_add_form").on('submit',(function(e) 
            {
				e.preventDefault();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				
				var item_name=$("select[name=item]").val();
				
				var quantity=$("input[name=quantity]").val();
				var rate=$("input[name=rate]").val();
				var gross=$("input[name=gross]").val();
				var taxes=$("input[name=taxes]").val();
				var amount=$("input[name=amount]").val();
				ar.push(item_name,quantity,rate,gross,taxes,amount);
				
				var myJsonString = JSON.stringify(ar);
				$.ajax({
				url: "ajax_php_file?NC_kot_add_form=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{
					$('#NC_kot_add_form')[0].reset();
					$("#View_table > tbody > tr:last").after(data);
					$(".page-spinner-bar").addClass(" hide");
				}
				});
			}));	*/
		
		  $(document).ready(function()
		 {
      		$('#room_no_idd').live('change',function(e){
			 			 $("#card_no").val($('option:selected', this).attr("card_no"));
						 $("#roomno_id").val($('option:selected', this).attr("roomno_id"));
						 $("#company_id").val($('option:selected', this).attr("company_id"));
						 $("#guest_name").val($('option:selected', this).attr("guest_name"));
			});
			shortcut.add("enter",function()
			{    
			NC_kot_add_form();
			// document.getElementById("frm1").submit();
			},{
			'type':'keydown',
			'propagate':true,
			'target':document
			});
			
			
		});
		$(document).ready(function()
        {
			
			$('#id_attr_ftc').live('change',function(e)
			{
				
			$("#quantity").val($('option:selected', this).attr("quantity"));
			
            var exact = $('input:radio[name=room_service]:checked').val();
			//alert(exact);
			if(exact==1)
			{
				var hh=$('option:selected', this).attr("amount");
				
				if(hh!='')
				{
					
				$("#rate").val($('option:selected', this).attr("amount"));
				$("#gross").val($('option:selected', this).attr("amount"));
				}
				else
				{
				$("#rate").val($('option:selected', this).attr("rate"));
			$("#gross").val($('option:selected', this).attr("rate"));
				}
			}
			else
			{
            $("#rate").val($('option:selected', this).attr("rate"));
			$("#gross").val($('option:selected', this).attr("rate"));
			}
			
			});
		});
			
	$(document).ready(function()
        {
		$('#id_club_member').live('change',function(e)
			{
			$("#guest_name").val($('option:selected', this).attr("guest_name"));			
			$("#card_no").val($('option:selected', this).attr("club_card"));

			});
	});
	
	$(document).ready(function(){
		$("#club_member_id").click(function(){
		$('#lb_cn').show();
		$('#lb_cn1').show();
		$('#lb_rn').hide();
		$('#lb_rn1').hide();
		$('#lb_rn2').hide();
		$('#lb_rn3').hide();
		});
		$("#club_member_id1").click(function(){
		$('#lb_cn').hide();
		$('#lb_cn1').hide();
		$('#lb_rn').show();
		$('#lb_rn1').show();
		$('#lb_rn2').show();
		$('#lb_rn3').show();
		});
	});
		</script>       