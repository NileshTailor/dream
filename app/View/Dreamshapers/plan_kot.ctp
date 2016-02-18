<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title"> Plan KOT </div><div class="toast-message"> </div></div></div>
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
 foreach($faatch_plan_kot_data as $data){ 
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
 foreach($faaatch_plan_kot_data as $data){ 
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
	 echo $table_no=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$data['pos_kot']['master_tables_id']), array());  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $pos_net_amount; 
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
 if(!empty($outlet))
 {
 	$outlet_array=explode(',', $outlet);
     
 } 
?>
  <div style="float:left; width:100%">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Plan KOT</a>
                </li>
                <li class="">
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View</a>
                </li>
               
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab_1_1">

  		<div class="portlet-title">
                    <span style="margin-left:5%" class="caption-subject font-green-sharp bold uppercase">Plan KOT</span>
                    
    <form method="post" enctype="multipart/form-data" id="add_plan_kot" >
                    <table id="myTable" style="margin-top:1%; width:100% !important;  height:120px !important" border="0">
                    <tbody>
                    <tr><td ><label>Outlet Name</label>
                    </td> <td>
                    <div class="form-group" >
                    <select class="form-control input-inline input-small select2me" required  name="outlet_name" onchange="outlet_name_Tname()" id="outlet_name" placeholder="Select...">
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
                            </select>
                           </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td><td></td>
                    </tr>
                    
                   <!-- <td><label>Club Member</label></td>
                    <td>
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
                    </select>                    </td>-->
                    
                    
                    
                    <tr>
                     <td><label>Room No</label></td>
                                            <td class="form-group"><select class=" form-control input-small" name="room_no" id="room_no_idd">
                                <option value="">Select No.</option>
									<?php
                                    foreach($fetch_room_checkin_checkout as $data)
                                    {
                                    ?>
                                    <option value="<?php echo $data['room_checkin_checkout']['id']; ?>" card_no="<?php echo $data['room_checkin_checkout']['card_no'];?>"
                                    roomno_id="<?php echo $data['room_checkin_checkout']['master_roomno_id'];?>" company_id="<?php echo $data['room_checkin_checkout']['company_id'];?>" plan_combo="<?php echo $data['room_checkin_checkout']['plan_combo'];?>" plid="<?php echo $data['room_checkin_checkout']['plan_id'];?>" guest_name="<?php echo $data['room_checkin_checkout']['guest_name'];?>">
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
                                    <input type="hidden" name="roomno_id" id="roomno_id" >

                <td><label>Card No.</label></td>
                <td>
                 <div class="form-group" >
                 
                <input name="card_no" id="card_no"  placeholder="Card No"   class="form-control input-inline input-small" type="text">
                </div>
                </td>
                <td><label>Guest Name </label></td>
                <td>
                 <div class="form-group" >
                <input name="guest_name" id="guest_name"  placeholder="Guest Name"   class="form-control input-inline input-small" type="text">
                </div>
                </td>
                    
                </tr>
                <tr>
                
                <td><label>Plan Name </label></td>
                    <td>
<select class=" form-control input-small" name="master_room_plans_id" onchange="planname();" id="plan_id" placeholder="">
                    <option value="">Select...</option>
                    
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
                    </select>                    </td>
                    <td><label>Plan Description</label></td>
                         <td colspan="5">
                <input name="plan_combo" class="form-control input-inline" style="width:400px" type="text" id="plan_combo" readonly="readonly">
                
                         </td>
                    </tr>
                   
                    <tr>
                <td><label>Covers</label></td>
                <td>
                <div class="form-group" >
                <input name="covers" placeholder="Covers"  class="form-control input-inline input-small" type="text">
                </div>
                </td>
                <td><label>Table No</label></td>
                    <td colspan="0"> <div class="form-group" >
                     <select class="form-control input-inline input-small select2me"  name="table_no" id="table_no" placeholder="Select...">
                           <option value=""></option>
                            </select></div>
                    </td> 
                    
                    
                <td><label>Steward</label></td>
                <td>
                <div class="form-group">
                <select class="form-control input-inline input-small select2me" name="steward" id="steward"  placeholder="Select...">
                        <option value=""></option>
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
               
                 <td colspan="2">
                 <div class="radio-list">
                 
                            <label class="radio-inline">
                            Room Service
                                <input type="radio" name="room_service" value="1"  id="room_service">Yes</label>
                                <label class="radio-inline">							
                                <input type="radio" name="room_service" value="0"  id="room_service1" checked="checked">No</label>
                                <label class="radio-inline">
                                </div>
                    </td>                         
                    </tr>
                         
                         <tr>
                         <!--<td><label>Plan Item</label></td>
                 <td><div style="width:70%; float:left" class="form-group"><select class="form-control input-small select2me" name="plan_item" id="plan_item" onchange="plan_amount();" placeholder="select...">
                                <option value=""></option>
                                <?php
                                foreach($fetch_plan_item as $data)
                                {
                                ?>
                                <option value="<?php echo $data['plan_item']['id'];?>"><?php echo $data['plan_item']['item_name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>-->
                          
                          <td><label>Session</label></td>
                        <td>
                         <select class="form-control input-small select2me"  onchange="planitem();"  id="category" name="session" placeholder="Select...">
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
                     </select></td>
                     
                      <td colspan="6" id="plan_replace" >
                 <select class="form-control select2 select2_sample2" style="width:700px" name="plan_item[]" data-placeholder="Selected Plan Items..." multiple="multiple" >
                 </select>
                          </td>
                     <input name="plan_rate" type="hidden" id="plan_rate">

                          </tr>
                          <tr><td><label>Remarks</label></td>
                          <td colspan="7">
                         <input type="text" name="remarks" class="form-control input-inline" style="width:400px" placeholder="Remarks Here...!"/>
                          </td>
                         </tr>
                </tbody>
                </table>
               <!--<table width="100%" style="margin-top:5px;">
                <tbody>
                <tr id="1">
                
                
                <td><label>Extra Item </label></td>
                <td>
                 <select class="form-control input-small select2me"  name="item" id="id_attr_ftc" onchange="check_tax();" data-placeholder="Select...">
                        <option value=""></option>
                                         <?php
                        foreach($fatch_master_items as $data)
                        {
                            ?>
                     <option quantity="1" rate="<?php echo $data['master_item']['billing_rate'];?>" amount="<?php echo $data['master_item']['item_cost'];?>"  value="<?php echo $data['master_item']['id'];?>"><?php echo $data['master_item']['item_name'];?></option>
                            <?php
                        }
                        ?>
                </select>
                </td>
                <td><a class="btn green btn-xs btn-primary" data-toggle="modal" href="#basic" ><i class="fa fa-plus"></i> SP</a>
             
                </td>
                <td align="right"><label>Quantity</label></td>
                        
                        <td>  
                         <input name="quantity" class="form-control input-inline input-xsmall" onkeyup="add_qty();" value="1" placeholder="Quantity" type="text" id="quantity">
                                   
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
                            <input name="taxes" class="form-control input-inline input-xsmall" placeholder="Taxes" id="taxx"  type="text">
                            </td>
                            <td ><label>Amount</label></td>
                        <td>
                            <input name="amount" class="form-control input-inline input-xsmall"  placeholder="Amount" type="text" id="amount">
                            </td>
                            <td><button type="button" class="btn btn-xs btn-primary" onclick="Plan_kot_add_form()">Add </button></td>
                        </tr>
                     
                        </tbody>
                        </table>
                        <div style="overflow-y:scroll;  max-height:150px">
                        <table width="100%" class="table table-bordered table-hover" style="margin-top:2px" id="View_table">
                        <thead>
                        <tr>
                        <th width="18%">Plan Item</th>
                            <th width="18%">Item</th>
                     
                            <th width="10%">Quantity </th>
                            <th width="10%"> Rate  </th>
                            <th width="10%">Gross  </th>
                            <th width="10%">Taxes</th>
                            <th width="15%">Amount </th>
                            <th width="10%">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr></tr>
                        </tbody>
                </table>-->
               
                
              
                 <button type="submit" style=" margin-left:35%; margin-top:1%" class="btn blue"><i class="fa fa-plus"></i> Submit</button>
<button type="reset" name="" class="btn red " value="" style="margin-top:1%"><i class="fa fa-level-down"></i> Reset</button> 
                
                </form>
        </div>
     </div>
                    
            <div class="tab-pane fade" id="tab_1_2">
              <div class="portlet light">
                <div class="portlet-title">
                <span style="margin-left:5%" class="caption-subject font-green-sharp bold uppercase">View plan kot</span>
                  <form method="post" id="">
                  <div style="overflow-y:scroll;  max-height:400px">
                <table class="table table-bordered table-hover" style="margin-top:1px" id="sample_1">
<thead>
<tr>
    <th>S.No</th>
    
    <th>Outlets Name</th>
    <th>Session</th>
    <th>Current Date</th>
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
     foreach($fatch_plan_kot_data as $data){ 
     $i++;
     $id=$data['pos_kot'] ['id'] 
     ?>
    <tr id="for_delete<?php echo $id; ?>" >
    <td><?php echo $i; ?></td>
 <td><?php  echo $Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$data['pos_kot']['master_outlets_id']), array());?></td>
    <td><?php  echo $master_session_no_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_session_no_fetch',$data['pos_kot']['session']), array());?></td>
    <td><?php echo $data['pos_kot'] ['date'] ?></td>
    <td><?php  echo $table_no=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$data['pos_kot']['master_tables_id']), array());?></td>
   <!--  <td><?php  echo $room_type=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['pos_kot']['master_room_types_id']), array());?></td>--->
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
    </div>              </div>                    
                
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
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
function item_view()
		{
			
			var category_id=$("select[id=category]").val();
                $.ajax({ 
                url: "ajax_php_file?view_category_item_type=1&q="+category_id,
                type: "POST", 
				 success: function(data)
                { 
					if(data=='error')
					{ alert("Please Fill any Item"); 
					$("#item").html('<option value="">--- Select ---</option>');
					
					 } else { 
					$("#item").html(data); 
					}
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
				//$("#id_attr_ftc1").html(data);  
                $(".page-spinner-bar").addClass(" hide");
                }
                
                
            }
            });
    }

function delete_tr_id(id)
        { 
            $(".page-spinner-bar").removeClass("hide"); //show loading
                $.ajax({
                    url: "ajax_php_file?delete_planKOT_data=1&q="+id,
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
    
    function kot_plan_deleterow(id)
    { 
        $(".page-spinner-bar").removeClass("hide"); //show loading
            var ar = [];
            $.ajax({
            url: "ajax_php_file?kot_plan_deleterow=1&q="+id,
            type: "POST",         
            success: function(data)
            {
                $("#"+id).remove();
                $(".page-spinner-bar").addClass(" hide");
            }
            })
    }
    function Plan_kot_add_form()
        {
            var item_name=$("select[name=item]").val();
		    var plan_item=$("select[name=plan_item]").val();
			 
            if($("select[name=item]").val().length>0 || $("#plan_item").val().length>0)
            {
			
                $(".page-spinner-bar").removeClass("hide"); //show loading
                var ar = [];
                 //var item_name=$("select[name=item]").val();
                //alert(item_name);
				//alert(plan_item);
				//var plan_item=$("select[name=plan_item]").val();
                var quantity=$("input[name=quantity]").val();
                var rate=$("input[name=rate]").val();
                var gross=$("input[name=gross]").val();
                var taxes=$("input[name=taxes]").val();
                var amount=$("input[name=amount]").val();
                ar.push(item_name,plan_item,quantity,rate,gross,taxes,amount);
                
                var myJsonString = JSON.stringify(ar);
                
                $.ajax({
                url: "ajax_php_file?Plan_kot_add_form=1&q="+myJsonString,
                type: "POST",         
                success: function(data)
                {
                    
                    //$('#billing_kot_add_form')[0].reset();
                    $("#View_table > tbody > tr:last").after(data);
                    $(".page-spinner-bar").addClass(" hide");
                    $("select[name=item]").val('');
					$("select[name=plan_item]").val('');
                    $("input[name=quantity]").val('');
                    $("input[name=rate]").val('');
                    $("input[name=gross]").val('');
                    $("input[name=taxes]").val('');
                    $("input[name=amount]").val('');
                }
               
                });
				
				
			}
			
        }
    
	/*function Plan_kot_add_form1()
        {
            var item_name=$("select[name=item]").val();
            if(item_name!='')
            {
                $(".page-spinner-bar").removeClass("hide"); //show loading
                var ar = [];
                
                //var item_name=$("select[name=item]").val();
                //alert(item_name);
				var item_name=$("select[name=item_name]").val();
                var amt=$("input[name=amt]").val();
               ar.push(item_name,amount);
                
               var myJsonString = JSON.stringify(ar);
                
                $.ajax({
                url: "ajax_php_file?Plan_kot_add_form1=1&q="+myJsonString,
                type: "POST",         
                success: function(data)
                {
                    
                    //$('#billing_kot_add_form')[0].reset();
                    $("#View_table > tbody > tr:last").after(data);
                    $(".page-spinner-bar").addClass(" hide");
                    
                    $("select[name=item_name]").val('');
                    $("input[name=amt]").val('');
                }
               
                });
            }
            else
            {
                alert("Please select any Item");
            }
        
        }*/
    
		function outlet_name_Tname()
		{
			
			var outlet_id=$("select[id=outlet_name]").val();
			$.ajax({ 
			url: "ajax_php_file?outlet_table_fetch_plan=1&q="+outlet_id,
			type: "POST", 
			success: function(data)
			{ 
				$("#table_no").html(data);  
			}
			});
		}
		///////////////////////	
		function room_no_guest_ftc()
            {
              
                var room_no=$("select[id=room_no_idd]").val();
                $.ajax({ 
                url: "ajax_php_file?outlet_guest_fetch_plan=1&q="+room_no,
                type: "POST", 
                success: function(data)
                { 
				//alert(data);
				
				var da=data.split(",");
					$("#guest_name").val(da[0]);
					$("#card_no").val(da[1]);
					$("#plan_id").val(da[2]);
					$("#plan_combo").val(da[3]);  
                }
                });
			}
			
    ///////////////////////////////////////////////////////////////////////////////////////   
	
	function plan_amount()
            {
              //alert();
                var item=$("select[name=item]").val();
				//alert(item);
                $.ajax({ 
                url: "ajax_php_file?plan_amount_item=1&q="+item,
                type: "POST", 
                success: function(data)
                { 
				//alert(data);
				
				var da=data.split(",");
					$("#rate").val(da[0]);
					
						var quantity=eval($('#quantity').val());
						var rate=eval($('#rate').val());
						var gross=eval($('#gross').val());
						/*if($('#grandamt1').val().length ==''){ 
							houseamount = '0';
						 }*/
						var amount=eval($('#amount').val());
						var gr=0;
						var amt=0;
						
						
						var gr=Math.round(quantity*rate);
						var amt=Math.round(quantity*rate);
						$('#gross').val(gr);
						$('#amount').val(amt);
					}
                });
			}
			//////////////////////////////////////////
		function planitem()
            {
             // alert();
                var session=$("select[name=session]").val();
				//alert(session);
                $.ajax({ 
                url: "ajax_php_file?plan_item_amountt=1&q="+session,
                type: "POST", 
                success: function(data)
                { 
				var da=data.split(",");
					$("#plan_replace").html(da[0]);
					$("#plan_rate").val(da[1]);
					$('select').select2();
					}
                });
			}
			//////////////////////////////////////////
		$(document).ready(function()
        {
		$('#id_attr_ftc').live('change',function(e)
			{
			$("#quantity").val($('option:selected', this).attr("quantity"));
            $("#rate").val($('option:selected', this).attr("rate"));
			$("#gross").val($('option:selected', this).attr("rate"));
			});
	});
	$(document).ready(function()
		{
      		$('#room_no_idd').live('change',function(e){
			 			 $("#card_no").val($('option:selected', this).attr("card_no"));
						 $("#roomno_id").val($('option:selected', this).attr("roomno_id"));
						 $("#guest_name").val($('option:selected', this).attr("guest_name"));
						 $("#company_id").val($('option:selected', this).attr("company_id"));
						 $("#plan_id").val($('option:selected', this).attr("plid"));
						 $("#plan_combo").val($('option:selected', this).attr("plan_combo"));
			});
			
		});
		
		
		/*function planname()
		{
			var plan_id=$("select[id=plan_id]").val();
			$.ajax({ 
			url: "ajax_php_file?fetch_plannamee=1&q="+plan_id,
			type: "POST", 
			success: function(data)
			{ 
				$("#plan_combo").val(data);  
			}
			});
		}*/
			
	
		/*$(document).ready(function()
        {
		$('#id_club_member').live('change',function(e)
			{
			$("#guest_name").val($('option:selected', this).attr("guest_name"));
			});
	});*/
	
			
			
			
		</script>       