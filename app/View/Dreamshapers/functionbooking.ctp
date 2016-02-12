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
</style>


<?php
if(empty($active))
{ $active='';
}
?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title"> Function Booking </div><div class="toast-message"> </div></div></div>
</div>
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
		width:40% !important;
	}
}
</style>
<div class="row">
    <div class="col-md-12">
    <div style="width:98%; margin-left:15px">
        <div class="tabbable tabbable-custom tabbable-border">
            
            <ul class="nav nav-tabs print-hide">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Function Booking
                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_4" data-toggle="tab">View
                    </a>
                </li>
            </ul>
            
            <div class="tab-content">
                <div id="tab_1_1" <?php if(empty($active) || $active==1){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?> >
                    <form method="post" id="add_function_booking">
                    	<table class="table self-table" style=" width:100% !important;" border="0">
                        <tr>
                        
                        <?php
                            $i=1;
                            foreach($fetch_gr_no as $data){ 
                            $i++;
                            $id=$data['gr_no']['id'];
                            $function_no=$data['gr_no']['function_no'];
                            ?>
                            <?php $data['gr_no']['function_no']; ?>
                            <?php }?>
                            <td align="left" width="12%"><label><b>Function No.</b></label></td> 
                            <td colspan="5" align="left">
                            <div class="form-group"><input type="text" class="form-control input-inline input-xsmall" placeholder="Function No." name="function_no" value="<?php echo $function_no; ?>" readonly/></div>
                            </td>
                        
                        
                        </tr>
                        
                         <tr>
                         <td><label>Resv S. No</label></td> 
                            <td><select class="form-control input-small select2me" name="res_no_id" id="res_no_id">
                            <option value=""></option>
                            <?php
                            foreach($fetch_room_reservation as $data)
                            {	 $room_id=$data['room_reservation']['id'];
                             if(!empty($fetch_function_booking))
                             {  $resv_id=$fetch_function_booking[0]['function_booking']['res_no_id'];}
                                if($room_id != $resv_id){
                                        $a_date=$data['room_reservation']['b_date'];
                                        if($a_date=='0000-00-00'){$a_date=date("d-m-Y");}else{ $a_date=date("d-m-Y",strtotime($a_date)); }
                                        ?>
                                        <option value="<?php echo $data['room_reservation']['id'];?>" b_date="<?php echo $a_date ?>" 
                                        Name="<?php echo $data['room_reservation']['name_person'];?>" telephone="<?php echo $data['room_reservation']['telephone'];?>"
                                         email="<?php echo $data['room_reservation']['email_id'];?>" outlet_id="<?php echo $data['room_reservation']['master_outlet_id'];?>"
                                          rate="<?php echo $data['room_reservation']['rate_per_night'];?>" advance="<?php echo $data['room_reservation']['advance'];?>"
                                         >
                                        <?php echo $data['room_reservation']['id'];?>  (<?php echo $data['room_reservation']['name_person'];?>)
                                        </option>
                                        <?php
                                	}
                                 }
                            ?>
                            </select></td>
                        <td style="width:20%"><label>Banquet Date</label></td>
                        <td><input type="text" class="form-control input-inline input-small date-picker"   placeholder="DD-MM-YYYY" data-date-format="dd-mm-yyyy" name="b_date" id="b_date" value="<?php echo date("d-m-Y"); ?>">                     

                        </td>
                        <td style="width:26%"><label>Banquet Time</label></td>
                        <td><div class="input-group">
						<input class="form-control  input-inline input-small timepicker timepicker-no-seconds" type="text" placeholder="" name="b_time" >
						</div></td>
                    	 </tr>
                        <tr>
                        <td><label>FTP No.</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="FTP NO." name="ftp_no" ></td>
                        
                        <td><label>Name <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Name" id="name" name="name" ></div></td>
                        
                        <td><label>Outlet/Venue <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><select class="form-control input-small" name="outlet_venue_id" id="outlet_venue_id" onchange="outlet_rate(this.value);">
                                            <option value=""> Select...</option>
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
											</select></div></td></tr>
                                            <tr>
                        <td><label>Telephone No <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group">
                        <input type="text" class="form-control input-inline input-small" placeholder="Telephone No." id="telephone" name="t_number"  maxlength="10" ></div></td>
                        <td><label>Email</label></td>
                        <td><div class="form-group">
                        <input type="text" class="form-control input-inline input-small" name="email" id="email_id" onkeyup="valid_email()"  placeholder="Email">
                        </div></td>
                       
                        <td><label>Address</label></td>
                         <td><input type="text" name="address" class="form-control input-inline input-small" /></td></tr>
                        
                        <tr>
                       <!-- <td colspan="2" align="center">
                                <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="choice_menu" checked="checked"  id="gcm_choice" value="1">GCM </label>
                            <label class="radio-inline">
                            <input type="radio" name="choice_menu" id="hcm_choice" value="2">HCM</label>
                        </div>
                                </td>-->
                        
                        <td colspan="2" align="center">
                                <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="rate_type" checked="checked"  id="outlet" value="1">Outlet Rate </label>
                            <label class="radio-inline">
                            <input type="radio" name="rate_type" id="perpax" value="2">Per PAX</label>
                        </div>
                                </td>
                                <td id="rvn"><label>Rate Venue</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small ok" placeholder="Rate" name="rate" id="rate"></td>
                        <td><label>PerPax Rate</label></td>
                       <td id="po"><input type="text"  class="form-control input-inline input-small ok" name="pax_o" id="pax_o" onkeyup="outlet_rate(this.value);"></td></tr>

                                <tr>
                       <td><label>PAX Guaranteed</label></td>
                        <td><input type="text" class="form-control input-inline input-small ok" onkeyup="pax_chk()" placeholder="Guaranteed" name="pax" id="pax"></td>
                        <td><label>PAX Expected</label></td>
                        <td><input type="text" class="form-control input-inline input-small ok" placeholder="Expected" name="per_expected" id="pax_expected"></td>
                     <td><label></label></td> 
                     <td style="display:none" id="py">
                     <input type="text"  class="form-control input-inline input-small ok" name="pax_r" id="pax_r" onkeyup="calc();">
                     </td>
                                </tr>
                        <input type="text"  name="totaltax" id="totaltax">
                        <input type="hidden"  name="gross" id="gross">
                        <tr>
                        <td><label>Rate Per Person</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small ok" placeholder="PAX Amount" name="pax_amt" id="pax_amt" ></td>
                        
                         <td><label>Advance</label></td>
                        <td><input type="text" class="form-control input-inline input-small ok" placeholder="Advance" name="advance" id="advance"></td>
                        <td><label>Approx Amount</label></td>
                        <td><input type="text" class="form-control input-inline input-small ok" placeholder="Total" name="tot_amt" id="tot_amt" ></td>
                        </tr>
                        <tr>
                        <td><label></label></td>
              <td align="left"><input type="text" disabled="disabled" class="form-control input-inline input-small" placeholder="Tax" name="tax_id" id="tax_id"></td>
                        <td><label></label></td><td><label></label></td><td><label></label></td><td><label></label></td></tr>
                        
                        <tr style="background-color:#E26A6A">
                        <td colspan="6" align="left" style="font:Georgia, 'Times New Roman', Times, serif:"><font color="#FFFFFF"><i class=" icon-magnet">
                        </i> Conference Arrangement</font></td></tr>       
                        <tr>
                        <td><label>No. of Person</label></td>
                        <td colspan="5"><input type="text" class="form-control input-inline input-small" placeholder="No. of Persons" name="no_of_person" ></td></tr>
                       
                         <tr>
                         <td colspan="6"><div class="form-group">
										<div class="radio-list" >
											<label class="radio-inline">
											<input type="radio" name="shape" value="'U' Shape" checked="checked" style="margin-left:4px">&nbsp;&nbsp;&nbsp;&nbsp;'U' Shape</label>
											<label class="radio-inline">
											<input type="radio" name="shape" value="'O' Shape" >'O' Shape</label>
                                            <label class="radio-inline">
											<input type="radio" name="shape" value="'V' Shape" >'V' Shape</label>
											<label class="radio-inline">
											<input type="radio" name="shape" value="'E' Shape" >'E' Shape</label>
                                            <label class="radio-inline">
											<input type="radio" name="shape" value="Board Meeting" >Board Meeting</label>
											<label class="radio-inline">
											<input type="radio" name="shape" value="Theater" >Theater</label>
                                            <label class="radio-inline">
											<input type="radio" name="shape" value="Class RoomStyle" >Class RoomStyle</label>
											<label class="radio-inline">
											<input type="radio" name="shape" value="Casual Group Style" >Casual Group Style</label>
										</div>
						</div>
                        </td>
                         </tr>
                        <tr style="background-color:#E26A6A">
                        <td colspan="5" style="font:Georgia, 'Times New Roman', Times, serif:"><font color="#FFFFFF"><i class="icon-basket"></i> Other Services </font></td>
                        <td width="5%"><a class="btn green btn-xs" data-toggle="modal" href="#other" ><i class="fa fa-plus"></i> Add </a></td></tr>
                         
                         <tr><td colspan="6">
                         <div class="form-group">
                       <table class="table self-table" id="deta" style="width:100% !important;">
                     <tbody>
                        <tr><?php  $j=0; $x=0;
                        foreach($fetch_master_other_service as $item_name)
                        { $j++; $x++;
                        $servise=$item_name['master_other_service']['service'];
                        if($j==7){ $j=1;?></tr><tr><?php } 
                       	?>
                         <td id="data_view<?php echo $x; ?>" >
                         <label><input name="other_service[]" type="checkbox" value="<?php echo $servise; ?>" /> <?php echo $servise; ?></label>
                          </td>
                        <?php
                        }
                        ?>
                        <td></td>
                        </tr>
                        </tbody>
                    </table>
                       </div>  
                        
                          </td>
                         </tr>
                        <tr><td width="25%"><label>Special Instruction</label></td>
                        <td colspan="5">
                        <input type="text" name="instruction" class="form-control input-inline" style="width:100%">
                        </td>
                        </tr>
                        <tr style="background-color:#E26A6A">
                        <td colspan="5" style="font:Georgia, 'Times New Roman', Times, serif:"><font color="#FFFFFF"><i class="icon-emoticon-smile"></i> Menu Choices</font></td>
                        <td width="5%"><a class="btn green btn-xs" data-toggle="modal" href="#basic" ><i class="fa fa-plus"></i> SP </a></td></tr>
                        
                         <tr>
                        <td><label>Menu Category</label></td>
                        <td> <select class="form-control input-medium" required="required" name="menu_category_idd" id="menu_category_idd" onchange="view_dataa();">
                                <option value="">--- Select Menu category ---</option>
                                <?php
                                foreach($fetch_menu_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['menu_category']['id'];?>">
                                <?php echo $data['menu_category']['menu_category_id'];?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                        </tr>
                        
                        <tr>
                        <td colspan="6" id="view_data1" >
                 <select class="form-control select2 select2_sample2" style="width:700px" name="item_name_id[]" data-placeholder="Selected Items..." multiple="multiple" >
                 </select>
                          </td>
                        
                        </td>
                        </tr>
                        
                        <tr>
                    <td colspan="6">
                  
                    <table class="table self-table" style=" width:100% !important;">
                     
                        <tr>  <?php  $j=0;
                        foreach($fetch_master_item_type as $item_name)
                        { $j++;
                       	 $item_id=$item_name['master_item_type']['id'];
                         $item_view=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fatch_function_book_select_maltipal',$item_id), array());
                         if($j==5){ $j=1;?></tr><tr><?php } 
                          	 $item_name=$item_name['master_item_type']['itemtype_name'];
                         ?>
                            	<td ><?php echo $item_name; ?></td>
                         <td align="center">
                         <select class="form-control select2 select2_sample2" id="item_<?php echo $item_id; ?>" placeholder="Select"  style="width:150px" name="itemtype_id[]" multiple>
                            <?php
                            foreach($item_view as $data)
                            {
                            ?>
                            	<option value="<?php echo $data['master_item']['id'];?>"><?php echo $data['master_item']['item_name'];?></option>
                            <?php
                            }
                            ?>
                            </select>
                            </td>
                        <?php
                        }
                        ?>
                        </tr>
                    </table>
        
        </td></tr>
        <tr>
        <td colspan="6"><center><button type="submit" name="add_function_booking" class="btn green" value="add_function_booking"><i class="fa fa-plus"></i> Add</button></center></td>
        </tr>
                </table>
                    </form>
                    
   <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><strong>Add Item</strong></h4>
            </div>
            <div class="modal-body">
            <form method="post" name="add" >
                    <table class="table self-table"  style=" width:100% !important;">
                    <tr>
                    <td><label>Item Category</label></td>
                    <td> <select class="form-control input-medium select2me" required="required" onchange="item_view();" id="category" name="master_itemcategory_id">
                    <option value=""></option>
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
                    <td> <select class="form-control input-medium select2me" id="item" name="master_item_type_id">
                            <option value=""></option>
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
                            
                             <div class="modal fade" id="other" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><strong>Add Service</strong></h4>
										</div>
											<div class="modal-body">
											  
                                                       <table class="table self-table"  style=" width:60% !important;">
                                                        <tr>
                                                        <td width="20%"><div class="form-group">
                                                            <label class="control-label col-md-4">Service
                                                            </label>
                                                            </div>
                                                            </td>
                                                            <td><div class="form-group">
                                                                    <div class="col-md-8">
                                                                        <input type="text" placeholder="Service Name" required name="service" class="form-control input-medium"/>
                                                                    </div>
                                                                </div></td>
                                                        </tr>
                                                        </table> 
                                                         
                                                
                                            </div> 
										<div class="modal-footer">
                                        
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="button" onclick="function_service();" data-dismiss="modal" class="btn green" value="add_master_item"><i class="fa fa-plus"></i> Add</button>						
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>      
                 
             </div>
  
<div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_4">

<div class="portlet box" style="border:#FFF !important; background-color:#E26A6A;">
                            <div class="portlet-title box white">
                                <div class="caption">
                                    <strong>Function Booking</strong>
                                </div>
                            </div>
                                <div class="portlet-body" style="min-height:400px;">
                                <div class=" print-hide">
                                    <table align="center" width="85%" border="0">
            <tr><td><input type="text" id="res_id"  placeholder="Reseveration No" class="form-control input-small" onkeyup="view_data()" ></td>
            <td><select class="form-control input-small select2me" id="outlet_view" onchange="view_data();" placeholder="Select Outlet" >
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
			</select></td>
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
             <td><label style="margin-left:10px;"><button class="btn red btn-sm" onclick="view_report()"><i class="fa fa-print"></i> Report</button></label></td>
            </tr>
            </table></div>
          <div>
            <span style="margin-top:20px" id="view_data"></span>
           </div>
          </div>
                        </div>
                    </div></div></div></div>
    <div id="hello" style=""></div>
    
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript"> 
	/*function pax_amount()
	{
		var ar = [];
		var rate=$("#rate").val();
		var pax=$("#pax").val();
		ar.push(rate,pax);
		var myJsonString = JSON.stringify(ar);
		$.ajax({
				url: "ajax_php_file?function_book_pax_amount_calc=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{	
					$("#pax_amt").val(data);
					
					
				}
				
				});
					
		
	}*/
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
				
			window.open('function_book_report?start_date='+start_date+'&end_date='+end_date,'_newtab');
		
		}
	/////////////////
	function view_dataa()
		{
			var menu_category_idd=$("#menu_category_idd").val();
				$.ajax({
				url: "ajax_php_file?menu_cat_view_dateselect=1&q="+menu_category_idd,
				type: "POST",         
				success: function(data)
				{	
					$("#view_data1").html(data);
					$('select').select2();
					$(".page-spinner-bar").addClass(" hide"); //hide loading
					$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
					{
						$(this).alert('close'); 
						$(this).remove();
					});
				}
				});	
		}
		//////////////////////
		
	function pax_chk()
		{
			var pax_expected=$("input[id=pax_expected]").val();
			var pax_gur=$("input[id=pax]").val();
			var id=$("select[id=outlet_venue_id]").val();
			//alert(pax_expected);
			//alert(pax_gur);
			 if(pax_gur > pax_expected){
				alert("Invalid PAX Guaranteed");
				$("#pax").val('');
			}	
			
			
			calc();
			outlet_rate(id);
			
			
	
		}
		function calc()
		{
		var pax_wise=$("input:radio[name=rate_type]:checked").val();
			if(pax_wise==2)
			{
				var tx=$('#tax_id').val();
						if($('#tax_id').val().length ==''){ 
							tx = '0';
						 }
							 var tax_amnt=0;
							//var rate=$('#rate').val();
							var tot_amt=$('#tot_amt').val();
							var px=$('#pax').val();
							var gross=$('#gross').val();
							var pax_amt=$('#pax_amt').val();
							var pax_r=$('#pax_r').val();
							
							gross= Math.round(pax_r * px);
							$('#gross').val(gross);
							var tax_id=tx.split("-");
													//alert(taxes);
							var total=gross;
							$.each(tax_id, function( index, value) {
								value=parseInt(value);
								if($.isNumeric(value)==false){
								//alert("yes");	
								}else{
									total=parseInt(total);
									value=value/100;
									total=(value*total)+ total;
								}
							});

						tx1 = Math.round(total - gross);
						$('#totaltax').val(tx1);
						t=parseInt(gross) + parseInt(tx1);
						$('#pax_amt').val(t);
						$('#tot_amt').val(t);
			}
		}
		
		$(document).ready(function(){
		$("#perpax").click(function(){
		//$('#rate').val('');
		//$('#rate').hide();
		//$('#py').show();
		//$('#po').show();
		//$('#po').val('');
		$('.ok').val('');
		
		
		});
		$("#outlet").click(function(){
		//$('#rate').show();
		//$('#po').show();
		//$('#py').hide();
		$('.ok').val('');
		//$('#py').val('');
		});
			});
		
		function outlet_rate(id)
            {   
              $.ajax({
                url: "ajax_php_file?fatch_outlet_rate_fun=1&q="+id,
                type: "POST",
                success: function(data)
                {
					var da=data.split(",");
                    $("#rate").val(da[0]);
					$("#tax_id").val(da[1]);
					//alert(da[0]);
					//alert(da[1]);
					
			   
				
				 var tx=$('#tax_id').val();
						if($('#tax_id').val().length ==''){ 
							tx = '0';
						 }
						 var tax_amnt=0;
							var rate=$('#rate').val();
							var tot_amt=$('#tot_amt').val();
							var pax_amt=$('#pax_amt').val();
							var pax_r=$('#pax_r').val();
							var pax_o=$('#pax_o').val();
							var px=$('#pax').val();
							var gross=$('#gross').val();
							//alert(pax_r);
							if($('#rate').val().length ==''){ 
							rate = '0';
						 }
							
							
							
							var tax_id=tx.split("-");
							//alert(tax_id);
							var total=rate;
							$.each(tax_id, function( index, value) {
								value=parseInt(value);
								
								//alert(value);
								
								if($.isNumeric(value)==false){
								//alert("yes");	
								}else{
									total=parseInt(total);
									
									//alert(total);
									value=value/100;
									
									//alert(value);
									
									total=(value*total)+ total;
									
									//alert(total);
								}
							});
							
							gross= parseInt(pax_o * px) + parseInt(rate);
						tx1 = Math.round(total-rate);
						
						//nil=Math.round(tx1+rate+gross);
						
						$('#totaltax').val(tx1);
						$('#gross').val(gross);
						
						t=parseInt(gross) + parseInt(tx1);
						
						$('#pax_amt').val(t);
						$('#tot_amt').val(t);
					 }
                });
            }
			
			
	function view_data()
		{
			var ar = [];
			
			var res_id=$("#res_id").val();
			var start_date=$("#start_date").val();
			var end_date=$("#end_date").val();
			var outlet_id=$("#outlet_view").val();
			
				$(".page-spinner-bar").removeClass("hide"); //show loading
				ar.push(start_date,end_date,res_id,outlet_id);
				var myJsonString = JSON.stringify(ar);
				//alert(myJsonString);
				$.ajax({
				url: "ajax_php_file?function_book_view_dateselect=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{	//alert(data);
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
		
		function function_service()
		{
			var service=$("input[name=service]").val();
				if(service != '')
				{ $(".page-spinner-bar").removeClass("hide"); //show loading
					$.ajax({
					url: "ajax_php_file?function_book_service_add=1&q="+service,
					type: "POST",         
					success: function(data)
					{
						
						if(data=='error')
						{
							$(".page-spinner-bar").addClass(" hide");
						}else
						{
							//$("#deta >tbody >tr").append(data);
							var len=$("#deta >tbody >tr:last >td").length;
							$(".page-spinner-bar").addClass(" hide");
							$("#deta >tbody >tr:last >td:last").append(data);
							$("input[name=service]").val('');
						}
					}
					});
				}
				else
				{  alert("Please fill entry");
				}
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
				var billing_rate=$("input[name=billing_rate]").val();
				var billing_room_rate=$("input[name=billing_room_rate]").val();
				var item_cost=$("input[name=item_cost]").val();
				var status=$("input[name=status]").val();
				ar.push(master_item_type_id,item_name,billing_rate,billing_room_rate,item_cost,status,master_itemcategory_id);
				
				var myJsonString = JSON.stringify(ar);
				$.ajax({
				url: "ajax_php_file?function_book_item_add=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{
					$("#hello").html(data);
					var item_id=$("#item_id").val();
					var item_name=$("#item_name").val();
					var item_replace_id=$("#item_replace_id").val();
					
					if(data=='error')
					{
						$(".page-spinner-bar").addClass(" hide");
					}else
					{
						$("#item_" + item_replace_id).append('<option value="' + item_id + '">' + item_name + '</option>');
					$(".page-spinner-bar").addClass(" hide");
					}
					
					
				}
				});
		}     
		function valid_email()
		{
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
						$('#email_id').parents('.form-group').append('<span id="email_id-error" class="help-block help-block-error" style="color:#A94442">Please input valid email</span>');
						
					}  
				}
				else
				{
					$('#email_id').parents('.form-group').removeClass('has-error');
					$('#email_id-error').remove();
				}	
		}
			$(document).ready(function()
			{
				$('#res_no_id').live('change',function(e)
				{
				var outlet = $('option:selected', this).attr("outlet_id");
				$("#name").val($('option:selected', this).attr("Name"));
			 	$("#telephone").val($('option:selected', this).attr("telephone"));
			 	$("#email_id").val($('option:selected', this).attr("email"));
				$("#b_date").val($('option:selected', this).attr("b_date"));
				$("#rate").val($('option:selected', this).attr("rate"));
				$("#advance").val($('option:selected', this).attr("advance"));
				$('#outlet_venue_id option[value="' + outlet + '"]').prop('selected', true);
				outlet_rate(outlet);
				});
				
			});
           <?php
            if($active==2 || $active==1)
            { 
                if($active==2)
                {
                    if(@$active_delete==1)
                    {
                        $contain="Delete successful...!";
                        $cls='toast-error';
                    }
                    else
                    {
                        $contain="Update successful...!";
                        $cls='toast-info';
                    }
                }
                else
                {
                    $contain="Add successful...!";
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
       </script> 
          
            