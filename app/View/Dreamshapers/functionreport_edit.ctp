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
 foreach($fetch_function_booking as $data){ 
		 $id_function_booking=$data['function_booking']['id'];
        $b_date=$data['function_booking']['b_date'];
		if($b_date=='0000-00-00'){ $b_date='';}
		else {$b_date= date("d-m-Y", strtotime($b_date)); }
        $b_time=$data['function_booking']['b_time'];
        $res_no_id=$data['function_booking']['res_no_id'];
        $choice_menu=$data['function_booking']['choice_menu'];
        $rate_type=$data['function_booking']['rate_type']; 
        $ftp_no=$data['function_booking']['ftp_no']; 
         $name=$data['function_booking']['name'];
        $outlet_venue_id=$data['function_booking']['outlet_venue_id']; 
        $address=$data['function_booking']['address'];
        $t_number=$data['function_booking']['t_number'];    
        $email=$data['function_booking']['email'];
		$function_no=$data['function_booking']['function_no'];
        $rate=$data['function_booking']['rate'];
        $advance=$data['function_booking']['advance'];
        $tax_id=$data['function_booking']['tax_id'];
        $per_expected=$data['function_booking']['per_expected'];
        $tot_amt=$data['function_booking']['tot_amt']; 
        $pax=$data['function_booking']['pax'];
        $pax_amt=$data['function_booking']['pax_amt'];
        $no_of_person=$data['function_booking']['no_of_person'];    
        $shape=$data['function_booking']['shape'];
        $other_service=$data['function_booking']['other_service'];
		$menu_category_idd=$data['function_booking']['menu_category_idd'];
        $instruction=$data['function_booking']['instruction'];
        $itemtype_id=$data['function_booking']['itemtype_id'];
		
		$item_name_id=$data['function_booking']['item_name_id'];
		$pax_r=$data['function_booking']['pax_r'];
		$pax_o=$data['function_booking']['pax_o'];
        $other_service=explode(",",$other_service); 
        $explode_data=explode(",",$itemtype_id);
		$explode_dataa=explode(",",$item_name_id);
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
            
            <div class="tab-content">
               <span style="margin-left:10%" class="caption-subject font-green-sharp bold uppercase"> Edit Function Booking</span>
                    <form method="post" id="add_function_booking">
                    	<table class="table self-table" style=" width:100% !important;" border="0">
                        <tr>
                        <td align="left" width="12%"><label>Reservation No.</label></td> 
                            <td colspan="5" align="left">
                            <div class="form-group"><input type="text" class="form-control input-inline input-xsmall" placeholder="Card No." id="ccc" name="function_no" value="<?php echo $function_no; ?>" readonly/></div>
                            </td
                        ></tr>
                        
                         <tr>
                         <td><label>Resv S. No</label></td> 
                            <td><select class="form-control input-small select2me" name="res_no_id" id="res_no_id">
                            <option value=""></option>
                            <?php
                            foreach($fetch_room_reservation as $data)
                            {	 $room_id=$data['room_reservation']['id'];
                            
                                    $a_date=$data['room_reservation']['b_date'];
                                    if($a_date=='0000-00-00'){$a_date=date("d-m-Y");}else{ $a_date=date("d-m-Y",strtotime($a_date)); }
                                    ?>
                                    <option <?php if($room_id==$res_no_id){ ?> selected <?php } ?>
                                    value="<?php echo $data['room_reservation']['id'];?>" b_date="<?php echo $a_date ?>" 
                                    Name="<?php echo $data['room_reservation']['name_person'];?>" telephone="<?php echo $data['room_reservation']['telephone'];?>"
                                     email="<?php echo $data['room_reservation']['email_id'];?>"  outlet_id="<?php echo $data['room_reservation']['master_outlet_id'];?>"
                                     rate="<?php echo $data['room_reservation']['rate_per_night'];?>" advance="<?php echo $data['room_reservation']['advance'];?>">
                                    <?php echo $data['room_reservation']['id'];?> (<?php echo $data['room_reservation']['name_person'];?>)
                                    </option>
                                    <?php
                            }
                            ?>
                            </select></td>
                        <td style="width:20%"><label>Banquet Date</label></td>
                        <td><input type="text" class="form-control input-inline input-small date-picker"   placeholder="DD-MM-YYYY" data-date-format="dd-mm-yyyy" name="b_date" id="b_date" value="<?php echo $b_date; ?>">                     

                        </td>
                        <td style="width:26%"><label>Banquet Time</label></td>
                        <td><div class="input-group">
						<input class="form-control  input-inline input-small timepicker timepicker-no-seconds" type="text" value="<?php echo $b_time; ?>" name="b_time" >
						</div></td>
                    	 </tr>
                         
                        <tr>
                        <td><label>FTP No.</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="FTP NO." value="<?php echo $ftp_no; ?>" name="ftp_no" ></td>
                        
                        <td><label>Name <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" value="<?php echo $name; ?>" placeholder="Name" id="name" name="name" ></div></td>
                        <td><label>Outlet/Venue <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><select class="form-control input-small select2me" name="outlet_venue_id" id="outlet_venue_id" onchange="outlet_rate(this.value);">
                                            <option value=""></option>
                                                    <?php
                                    foreach($fetch_master_outlet as $data)
                                    {	
                                     $id=$data['master_outlet']['id'];
                                    $out=$data['master_outlet']['id'];
                                        if(in_array($out, $outlet_array))
                                        {
                                            ?>
                                                <option <?php if($id==$outlet_venue_id){?> selected <?php } ?> value="<?php echo $data['master_outlet']['id'];?>">
                                                <?php echo $data['master_outlet']['outlet_name'];?>
                                                </option>
                                                <?php
                                            }}
                                            ?>
											</select></div></td></tr>
                                            
                                            
                                            
                                            <tr>
                                            <td><label>Telephone No <span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" value="<?php echo $t_number; ?>" placeholder="Telephone No." id="telephone" name="t_number" maxlength="10" ></div></td>
                        <td><label>Email</label></td>
                        <td><div class="form-group">
                        <input type="text" class="form-control input-inline input-small" name="email" id="email_id" onkeyup="valid_email()"value="<?php echo $email; ?>"  placeholder="Email">
                        </div></td>
                        
                        <td><label>Address</label></td>
                         <td><input type="text" name="address" class="form-control input-inline input-small" value="<?php echo $address; ?>" /></td>
                        </tr>
                        
                        <tr>
                         <!--<td colspan="2" align="center" style="background-color:#D0CFF8">
                                <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="choice_menu" checked="checked"  id="gcm_choice" value="1" <?php if($choice_menu=='1'){ ?> checked <?php }?>>GCM </label>
                            <label class="radio-inline">
                            <input type="radio" name="choice_menu" id="hcm_choice" value="2" <?php if($choice_menu=='2'){ ?> checked <?php }?>>HCM</label>
                        </div>
                                </td>-->
                        
                        <td colspan="2" align="center">
                                <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="rate_type" checked="checked"  id="outlet" value="1" <?php if($rate_type=='1'){ ?> checked <?php }?> >Outlet Rate </label>
                            <label class="radio-inline">
                            <input type="radio" name="rate_type" id="perpax" value="2" 
                             <?php if($rate_type=='2'){ ?> checked <?php }?>>Per PAX</label>
                        </div>
                                </td>
                               
   <td><label>Rate Venue</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Rate" name="rate" id="rate" value="<?php echo $rate; ?>"></td>
                        <td><label>Per Pax Rate</label></td>
                         <td id="po"><input type="text"  class="form-control input-inline input-small" name="pax_o" id="pax_o" onkeyup="outlet_rate(this.value);" value="<?php echo $pax_o; ?>"></td>
                                </tr>
                                
                                <tr>
                            
                         <td><label>PAX Guaranteed</label></td>
                        <td><input type="text" class="form-control input-inline input-small" onkeyup="pax_chk()" value="<?php echo $pax; ?>" placeholder="PAX" name="pax" id="pax" ></td>
                        <td><label>PAX Expected</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="PAX Expected"  id="pax_expected" value="<?php echo $per_expected; ?>" name="per_expected" ></td>

                        <td><label></label></td>
                        <td style="display:none" id="py"><input type="text"  class="form-control input-inline input-small" name="pax_r" id="pax_r" onkeyup="calc();" value="<?php echo $pax_r; ?>"></td>
                            </tr>
                                
                        <input type="hidden"  name="totaltax" id="totaltax">
                       <input type="hidden"  name="gross" id="gross">
                       
                        
                        <tr>
                         <td><label>Rate Per Person</label></td>
                   <td><input type="text" class="form-control input-inline input-small" placeholder="PAX Amount" value="<?php echo $pax_amt; ?>" name="pax_amt" id="pax_amt" ></td>
                       <td><label>Advance</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Advance" name="advance" id="advance" value="<?php echo $advance; ?>"></td>
                        
                        <td><label>Approx Amount</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Total" name="tot_amt" id="tot_amt" value="<?php echo $tot_amt; ?>" ></td>
                        </tr>
                        
                        <tr>
                         <td><label></label></td>
                        <td><input type="hidden" disabled="disabled" class="form-control input-inline input-small" placeholder="Tax" name="tax_id" id="tax_id" 
                        value="<?php echo $tax_id; ?>"></td>
                         <td><label></label></td> <td><label></label></td> <td><label></label></td> <td><label></label></td>
                        
                        
                        </tr>
                        <tr style="background-color:#E26A6A">
                        <td colspan="6" align="left" style="font:Georgia, 'Times New Roman', Times, serif:"><font color="#000"><i class=" icon-magnet"></i> Conference Arrangement</font></td></tr>       
                        <tr>
                        <td><label>No. of Person</label></td>
                        <td colspan="5"><input type="text" class="form-control input-inline input-small" placeholder="No. of Persons" value="<?php echo $no_of_person; ?>"  name="no_of_person" ></td></tr>
                       
                         <tr>
                         <td colspan="6"><div class="form-group">
                        <div class="radio-list" >
                            <label class="radio-inline">
                            <input type="radio" name="shape" value="U Shape" <?php if($shape=="U Shape"){ echo 'checked'; } ?> style="margin-left:4px">'U' Shape</label>
                            <label class="radio-inline">
                            <input type="radio" name="shape"<?php if($shape=="O Shape"){ echo 'checked'; } ?> value="O Shape" >'O' Shape</label>
                            <label class="radio-inline">
                            <input type="radio" name="shape"<?php if($shape=="V Shape"){ echo 'checked'; } ?> value="V Shape" >'V' Shape</label>
                            <label class="radio-inline">
                            <input type="radio" name="shape"<?php if($shape=="E Shape"){ echo 'checked'; } ?> value="E Shape" >'E' Shape</label>
                            <label class="radio-inline">
                            <input type="radio" name="shape"<?php if($shape=='Board Meeting'){ echo 'checked'; } ?> value="Board Meeting" >Board Meeting</label>
                            <label class="radio-inline">
                            <input type="radio" name="shape"<?php if($shape=='Theater'){ echo 'checked'; } ?> value="Theater" >Theater</label>
                            <label class="radio-inline">
                            <input type="radio" name="shape"<?php if($shape=='Class RoomStyle'){ echo 'checked'; } ?> value="Class RoomStyle" >Class RoomStyle</label>
                            <label class="radio-inline">
                            <input type="radio" name="shape"<?php if($shape=='Casual Group Style'){ echo 'checked'; } ?> value="Casual Group Style" >Casual Group Style</label>
                        </div>
						</div>
                        </td>
                         </tr>
                        <tr style="background-color:#E26A6A">
                        <td colspan="5" style="font:Georgia, 'Times New Roman', Times, serif:"><font color="#000"><i class="icon-basket"></i>Other Services </font></td>
                        <td width="5%"><a class="btn green btn-xs" data-toggle="modal" href="#other" ><i class="fa fa-plus"></i> Add </a></td></tr>
                         
                         <!--<tr><td colspan="8" align="center">
                        <span id="view_data1"></span></td>
                        </tr>-->
                         
                         
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
                         <label><input name="other_service[]"  type="checkbox" <?php if(in_array($servise,$other_service)){ echo 'checked'; } ?> value="<?php echo $servise; ?>" /> <?php echo $servise; ?></label>
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
                        <input type="text" name="instruction" class="form-control input-inline" style="width:100%" value="<?php echo $instruction; ?>" />
                        </td>
                        </tr>
                        
                        <tr style="background-color:#E26A6A">
                        <td colspan="5" style="font:Georgia, 'Times New Roman', Times, serif:"><font color="#000"><i class="icon-emoticon-smile"></i> Menu Choices</font></td>
                        <td width="5%"><a class="btn green btn-xs" data-toggle="modal" href="#basic" ><i class="fa fa-plus"></i> SP </a></td></tr>
                                                <tr>
                                                <tr>
                        <td><label>Menu Category</label></td>
                        <td> <select class="form-control input-medium" required="required" name="menu_category_idd" id="menu_category_idd" onchange="view_dataa();">
                                <option value="">--- Select Menu category ---</option>
                                <?php
                                foreach($fetch_menu_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['menu_category']['id'];?>" <?php if ($data['menu_category']['id']== $menu_category_idd){ echo 'selected'; }?>>
                                <?php echo $data['menu_category']['menu_category_id'];?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                        </tr>
                        <td colspan="6" id="view_data1" >
                 <select class="form-control select2 select2_sample2" style="width:700px" name="item_name_id[]" data-placeholder="Selected Items..." multiple="multiple" >
                 </select>
                          </td>
                        </tr>
                        
                           
                            <tr>
                    <td colspan="6">
                  
                    <table class="table self-table" style=" width:100% !important;">
                             <?php  $j=0;
                        foreach($fetch_menu_category_item as $item_name)
                        { $j++;
                       	 $item_id=$item_name['menu_category_item']['master_item_type_id'];
                         $item_view=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fatch_function_book_select_maltipall',$item_id), array());
                         if($j==5){ $j=1;?></tr><tr><?php } 
                          	 //$item_name=$item_name['master_item_type']['itemtype_name'];
                         ?>
                         <td align="center">
                         <select class="form-control select2 select2_sample2" id="item_<?php echo $item_id; ?>" placeholder="Select"  style="width:150px" name="item_name_id[]" multiple>
                            <?php
                            foreach($item_view as $data)
                            { $idd=$data['master_item']['id'];
                            ?>
                            	<option value="<?php echo $data['master_item']['id'];?>"
                                <?php if (in_array($idd, $explode_dataa)){?> selected='selected' <?php  } ?>>
                                <?php echo $data['master_item']['item_name'];?></option>
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
                            	<td><?php echo $item_name; ?></td>
                         <td align="center">
                         <select class="form-control select2 select2_sample2" id="item_<?php echo $item_id; ?>" placeholder="Select"  style="width:150px" name="itemtype_id[]" multiple>
                            <?php
                            foreach($item_view as $data)
                            { $idd=$data['master_item']['id'];
                            ?>
                            	<option value="<?php echo $data['master_item']['id'];?>"
                                <?php if (in_array($idd, $explode_data)){?> selected='selected' <?php  } ?>>
                                <?php echo $data['master_item']['item_name'];?></option>
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
        <td colspan="6"><center><button type="submit" name="edit_function_booking" class="btn blue" ><i class="fa fa-plus"></i> Update</button></center></td>
        </tr>
                </table>
                    </form>
                    
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
											<h4 class="modal-title">Add Service</h4>
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
        </div>  
        </div></div>
    </div>
    <div id="hello" style=""></div>
    
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript"> 
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
	function pax_chk()
		{
			var pax_expected=$("input[id=pax_expected]").val();
			var pax_gur=$("input[id=pax]").val();
			var id=$("select[id=outlet_venue_id]").val();
			if(pax_expected < pax_gur ){
				alert("Invalid PAX Guaranteed");
				$("#pax").val(pax_expected);
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
var rate=$('#rate').val();
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
		$('#rate').val('');
		$('#rate').hide();
		$('#py').show();
		$('#po').hide();
		$('#po').val('');
		});
		$("#outlet").click(function(){
		$('#rate').show();
		$('#po').show();
		$('#py').hide();
		$('#py').val('');
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
							if($('#rate').val().length ==''){ 
							rate = '0';
						 }
							
var tax_id=tx.split("-");
						//alert(taxes);
							var total=rate;
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
			$('#res_no_id').live('change',function(e){
				$("#name").val($('option:selected', this).attr("Name"));
			 	$("#telephone").val($('option:selected', this).attr("telephone"));
			 	$("#email").val($('option:selected', this).attr("email"));
				$("#rate").val($('option:selected', this).attr("rate"));
				$("#advance").val($('option:selected', this).attr("advance"));
				$("#b_date").val($('option:selected', this).attr("b_date"));
				});
			});
            
          	
           <?php
            if($active==2 )
            { 
                        $contain="Update successful...!";
                        $cls='toast-info';
              
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