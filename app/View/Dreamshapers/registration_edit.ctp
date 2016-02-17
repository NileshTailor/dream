<?php
foreach($registrations as $view_data)
{ 
	$id=$view_data['registration']['id'];
	$name=$view_data['registration']['name'];
	$card_type_id=$view_data['registration']['card_type_id'];
	$swd_of=$view_data['registration']['swd_of'];
	$p_address=$view_data['registration']['p_address'];
	$p_phone=$view_data['registration']['p_phone']; 
	$fax=$view_data['registration']['fax'];
	$c_address=$view_data['registration']['c_address'];
	$phone_home=$view_data['registration']['phone_home'];
	$office=$view_data['registration']['office'];
	$mobile_no=$view_data['registration']['mobile_no']; 
	$email=$view_data['registration']['email'];
	$marital_status=$view_data['registration']['marital_status'];
	$residential_status=$view_data['registration']['residential_status'];
	$nationality=$view_data['registration']['nationality'];
	$occupation=$view_data['registration']['occupation']; 
	$tax_ac_no=$view_data['registration']['tax_ac_no'];
	$wing_name=$view_data['registration']['wing_name'];
	$flat_no=$view_data['registration']['flat_no'];
	$floor=$view_data['registration']['floor'];
	$card_id_no=$view_data['registration']['card_id_no']; 
	$date_of_anniversary=$view_data['registration']['date_of_anniversary'];
			if($date_of_anniversary=='0000-00-00')
			{
				$date_of_anniversary="";				
			}
			else
			{
				$date_of_anniversary=date("d-m-Y",strtotime($date_of_anniversary));
                
			} 
	$reg_type=$view_data['registration']['reg_type']; 
	$guest_type=$view_data['registration']['guest_type'];
	$dob=$view_data['registration']['dob']; 
    $dd=date("d",strtotime($dob));
    $mm=date("m",strtotime($dob));
    $yy=date("Y",strtotime($dob));
	
	
    if($reg_type=='dependant')
    {
    $cardholder=$view_data['registration']['cardholder']; 
    $cardholder=explode("-",$cardholder);
    }

 
}
?>
 <div class="tabbable tabbable-custom tabbable-border"> 
<div class="tab-content">					
<form method="post" enctype="multipart/form-data" id="registration_edit_form">
    <table  style="margin-left:11%; font-size:14px"><tr><td>
                            <div class="caption">
                                <span  class="caption-subject font-green-sharp bold uppercase">Edit Registration</span>
                            </div>
                            </td></tr></table>	
           <table style="margin-top:1%; width:100% !important" border="0">
               <!-- Mr./Mrs./Ms. :-->
               
               
               
               <tr>
                            <td><label> Card No.</label></td>
                            <td>
                            <div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Card No." name="card_id_no" value="<?php echo $card_id_no; ?>" readonly/></div>
                            </td>
               
               
                <td><label> Card Type</label></td>
                <td><select class="form-control select2 select2_sample2 input-small" placeholder="Select..." name="card_type_id" id="card_type_id"  required>
                <option value="">--Select--</option>
                <?php
                foreach($fetch_card_type as $data)
                {
					$id=$data['card_type']['id'];
					  
                ?>
                <option value="<?php echo $data['card_type']['id']; ?>" <?php if($card_type_id==$id){ echo 'selected'; }?>>
                <?php echo $data['card_type']['card_name']; ?></option>
                <?php
                }
                ?>
                </select></td>
                
                <td></td><td></td>
               </tr>
               
               
               
               
               
               
               
                <tr><td width="15%"><label>Name</label>
                 </td> <td width="20%">
                    <div class="form-group ">
                        <input type="text" name="name_edit" placeholder="Name" value="<?php echo $name; ?>" autofocus class="form-control"/>
                    </div>
                     </td>
                 <td width="10%"><label>S/W/D of</label></td>
                <td>
                    <div class="form-group">
                     <input type="text" name="swd_of_edit" value="<?php echo $swd_of; ?>"  class="form-control" placeholder="S/W/D of"/>
                    </div>
                    </td>
                 <td><label>Occupation</label></td><!-- Mr./Mrs./Ms. :-->
                 <td>
                    <div class="form-group">
                    <input class="form-control" autofocus  value="<?php echo $occupation; ?>"  placeholder="Occupation" name="occupation_edit" type="text">
                    </div>
                 </td>
                 </tr>
                <tr>
                <td><label>Permanent Adderss</label></td>
                 <td colspan="5">
                  <div class="form-group">
                    <input class="form-control" name="p_address_edit" value="<?php echo $p_address; ?>"  placeholder="Permanent Adderss" type="text">
                    </div>
                 </td>
                </tr>
                <tr><td><label>Phone No. </label></td>
                    <td>
                    <div class="form-group">
                     <input name="p_phone_edit" class="form-control input-small" value="<?php echo $p_phone; ?>"  placeholder="Phone No" type="text">
                     </div>
                    </td>
                <td><label>Fax </label></td>
                    <td>
                    <div class="form-group">
                     <input name="fax_edit"  placeholder="Fax" value="<?php echo $fax; ?>"  class="form-control input-small" type="text">
                     </div>
                    </td>
                    <td><label>Office</label></td>
                 <td>
                 <div class="form-group">
              		<input name="office_edit" placeholder="Office" value="<?php echo $office; ?>"  class="form-control input-small" type="text">
                    </div>
                 </td>
                </tr>
                <tr>
                 <td ><label>Correspondence Address</label></td>
                 <td colspan="5">
                    <div class="form-group">
                     <input class="form-control" name="c_address_edit" value="<?php echo $c_address; ?>"  placeholder="Correspondence Adderss" type="text">
                    </div>
                 </td>
                </tr>
                <tr><td><label>Phone No. (Home) </label></td>
                 <td>
                 <div class="form-group">
                	<input name="c_phone_edit" class="form-control input-small" value="<?php echo $phone_home; ?>"  placeholder="Phone No" type="text">
                    </div>
                 </td>
                
                <td><label>Mobile No.</label> </td>
                 <td>
                 <div class="form-group">
               		<input name="mobile_no_edit" class="form-control input-small"  value="<?php echo $mobile_no; ?>" placeholder="Mobile" type="text">
                 </div>
                 </td>
                <td><label>Email</label></td>
                 <td>
                 <div class="form-group">
                 <input name="email_edit" type="text" class="form-control input-small" value="<?php echo $email; ?>"  placeholder="Email Address"/>
                 </div>
                 </td>
                </tr>
                <tr><td><label>Marital Status</label></td>
                	<td>
                    	<div class="form-group">
                        <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="marital_status_edit" <?php  if($marital_status=='single'){?> checked<?php }?> id="optionsRadios4" value="single" > Single </label>
                            <label class="radio-inline">
                            <input type="radio" name="marital_status_edit" <?php  if($marital_status=='married'){?> checked<?php }?> id="optionsRadios5" value="married"> Married </label>
                        </div>
						</div>
                    </td>
               <td ><label>Residential Status</label></td>
                	<td>
                    	<div class="form-group">
                    <div class="radio-list">
                        <label class="radio-inline">
                        <input type="radio" name="residential_status_edit" <?php  if($residential_status=='resident'){?> checked<?php }?> id="optionsRadios4" value="resident" checked> Resident </label>
                        <label class="radio-inline">
                        <input type="radio" name="residential_status_edit" <?php  if($residential_status=='non_resident'){?> checked<?php }?>  id="optionsRadios5" value="non_resident"> Non</label>
                    </div>
						</div>
                    </td>
                    <td><label> Card Id No.</label></td>
                    <td> <div class="form-group">
               				<input name="card_id_no_edit" class="form-control input-small" value="<?php echo $card_id_no; ?>"  placeholder="Card Id No." type="text">
                		 </div>
                 </td>
                
                </tr>
               
                 
                   <tr><td><label>Income Tax Account No.</label></td><!-- Mr./Mrs./Ms. :-->
                 <td>
                    <div class="form-group">
                    <input class="form-control input-small" autofocus  placeholder=" Account No" value="<?php echo $tax_ac_no; ?>"  name="tax_ac_no_edit" type="text">
                    </div>
                 </td>
                 	<td><label>Nationality </label></td>
                	<td>
                    	<div class="form-group">
										<div class="radio-list">
											<label class="radio-inline">
											<input type="radio" name="nationality_edit" <?php  if($nationality=='indian'){?> checked<?php }?> id="optionsRadios4" value="indian" > Indian </label>
											<label class="radio-inline">
											<input type="radio" name="nationality_edit" <?php  if($nationality=='non_indian'){?> checked<?php }?> id="optionsRadios5" value="non_indian"> Non-Indian</label>
										</div>
						</div>
                    </td>
                    <td><label>Date of Birth</label></td>
                    
                    
                    <td colspan="3"><table width="100%"><tr><td><select class="form-control" name="dd_edit" style="width:75px">
											<option>Day</option>
                                            <?php 
                                            for($i=1;$i<=31;$i++)
                                            {?>
											<option <?php  if($dd == $i){?> selected="selected" <?php }?> value="<?php echo $i; ?>"><?php echo $i ?></option>
                                            <?php } ?>
										</select></td> 
                                                      
                    <td><select class="form-control" name="mm_edit" style="width:92px">
											<option>Month</option>
                                           <option <?php  if($mm=='01'){?>selected="selected"  <?php }?> value = "01">Jan</option>
                                            <option <?php  if($mm=='02'){?> selected="selected" <?php }?> value = "02">Feb</option>
                                            <option <?php  if($mm=='03'){?> selected="selected" <?php }?> value = "03">March</option>
                                            <option <?php  if($mm=='04'){?> selected="selected" <?php }?>value = "04">April</option>
                                            <option <?php  if($mm=='05'){?> selected="selected" <?php }?> value = "05">May</option>
                                            <option <?php  if($mm=='06'){?> selected="selected" <?php }?> value = "06">June</option>
                                            <option <?php  if($mm=='07'){?> selected="selected" <?php }?>  value = "07">July</option>
                                            <option <?php  if($mm=='08'){?> selected="selected" <?php }?> value = "08">August</option>
                                            <option <?php  if($mm=='09'){?> selected="selected" <?php }?> value = "09">Sept</option>
                                            <option <?php  if($mm=='10'){?> selected="selected" <?php }?>value = "10">Oct</option>
                                            <option <?php  if($mm=='11'){?> selected="selected" <?php }?>value = "11">Nov</option>
                                            <option <?php  if($mm=='12'){?> selected="selected" <?php }?> value = "12">Dec</option>
                                            </select>
                                            </td>
                    <td><select class="form-control" name="yy_edit" style="width:85px">
											<option>Year</option>
                                            <?php $cur=date('Y');
                                            $first_year= $cur-100;
                                            for($i=$first_year;$i<=$cur;$i++)
                                            {?>
											<option <?php  if($yy==$i){?> selected="selected" <?php }?> value="<?php echo $i; ?>"><?php echo $i ?></option>
                                            <?php } ?>
										</select></td>
                    </tr>
                    </table> 
               				
                 </td>
                </tr>
          
                <tr><td><label> Guest Type</label></td>
                 <td>
                 <div class="form-group">
                    <select class="form-control input-small"  name="guest_type_edit" id="guest_type">
                        <option value="">-- Select --</option>
                        <option <?php  if($guest_type=='one year'){?> selected="selected" <?php }?> value="one year">One Year</option>
                        <option <?php  if($guest_type=='life time'){?> selected="selected"  <?php }?> value="life time">Life Time</option>
                    </select>
                    </div>
                 </td>
                 <td><label>Date of Anniversary</label></td><!-- Mr./Mrs./Ms. :-->
                 <td>
                    
                    <input class="form-control input-small date-picker"  value="<?php echo $date_of_anniversary; ?>" data-date-format="dd-mm-yyyy"   placeholder="Date Anniversary" name="date_of_anniversary_edit" type="text">
                   
                 </td>
                 <td><label> Registration Type</label></td>
                 <td>
                 <div class="form-group">
                    <select class="form-control input-small" name="reg_type_edit" id="reg_type_select">
                        <option value="">-- Select --</option>
                        <option <?php  if($reg_type=='main'){?> selected="selected" <?php }?> value="main">Main</option>
                        <option <?php  if($reg_type=='dependant'){?> selected="selected" <?php }?> value="dependant">Dependant </option>
                    </select>
                    </div>
                 </td>
                
                </tr>
                <tr id="flat_wing_view">
                <input  value="" name="wing_name" type="hidden">
                <input  value="" name="flat_no" type="hidden">
                <input  value="" name="floor" type="hidden">
                
                <?php 
                if($guest_type=='five year')
                {?>
                <td><label>Wing Name </label></td>
                 <td>
                    <div class="form-group">
                    <input class="form-control input-small"  value="<?php echo $wing_name; ?>"   placeholder="Wing Name" name="wing_name" type="text">
                    </div>
                 </td><td><label>Flat No.</label></td>
                 <td>
                    <div class="form-group">
                    <input class="form-control input-small"   value="<?php echo $flat_no; ?>"  placeholder="Flat No." name="flat_no" type="text">
                    </div>
                 </td>
                <td><label>Floor</label></td>
             	  <td>
                    <div class="form-group">
                    <input class="form-control input-small"  value="<?php echo $floor; ?>" autofocus  placeholder="Floor" name="floor" type="text">
                    </div>
               	 </td>
                 <?php } ?>
                 </tr>
                 </table>
                 <table id="removeid1">
                <tr><td  id="card_hold_view">
                 <input  value="" name="cardholder_edit" type="hidden">
                 <input  value="" name="applicant_edit" type="hidden">
                <?php 
                if($reg_type=='dependant')
                {
					$row=0;
						foreach($cardholder as $data)
						{	$row++;
							$data_d=explode(',', $data);
							?>
						<tr id="removeid<?php echo $row; ?>">
                         <td width="50%">
                            <div class="form-group">
                           <input class="form-control input-medium" value="<?php echo $data_d[0];  ?>"    placeholder="Cardholder" name="cardholder_edit<?php echo $row; ?>" type="text">
                            </div>
                         </td>
					 
                        <td width="30%">
                            <div class="form-group">
                            <input class="form-control input-medium"  value="<?php echo $data_d[1];  ?>"   placeholder="Applicant" name="applicant_edit<?php echo $row; ?>" type="text">
                            </div>
                        </td>
                        <td width="12%">
							 <?php if($row=='1'){ ?> 
                                <button type="button" onclick="registration_removerow(<?php echo $row;  ?>);"   class="btn btn-xs red">Remove all</i></button>
                                <?php } else
                                {
                                ?>
                            <button type="button" onclick="registration_removerow(<?php echo $row;  ?>);"   class="btn btn-xs red">Remove</i></button>
                            <?php } ?>
                        </td>
                      </tr>
						<?php $ext_row[]=$row;
						
						}	
					$ext_row=implode(",",$ext_row);
                    ?>
                    
                     <input type="hidden" name="total_row" value="<?php echo $row; ?>" id="next_row"/>
                <input type="hidden" name="exct_row" value="<?php echo $ext_row; ?>" id="exct_row"/>	
                    
                    <tr><td colspan="5" id="nxt_row"></td></tr>
                    <tr>
                      <td><button type="button" onclick="registration_addrow();"  id="add_btn"  class="btn btn-xs btn-primary"> Add Row </button></td>
                    </tr>
                  <?php  
                    }
					?>
                </td></tr>
                
                </table>       
             
               
                <button type="submit" style=" margin-left:45%" class="btn blue"><i class="fa fa-edit"></i> Update </button>   
    </form>
    </div>
   </div>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script>
		
        $(document).ready(function()
        {
          
         $("#guest_type").on('change',(function(e)
            {
                e.preventDefault();
                var ar = [];
                var guest_type=$("select[id=guest_type]").val();
				
                ar.push(guest_type);
                var myJsonString = JSON.stringify(ar);
				
                $.ajax({ 
                url: "ajax_php_file?reg_guest_type_ajax=1&q="+myJsonString,
                type: "POST", 
				          
                success: function(data)
                {
					 $("#flat_wing_view").html(data);  
                }
                });
            }));
			
			$("#reg_type_select").on('change',(function(e)
            {
						
                e.preventDefault();
                var ar = [];
                var reg_type_select=$("select[id=reg_type_select]").val();
				
                ar.push(reg_type_select);
                var myJsonString = JSON.stringify(ar);
				
                $.ajax({ 
                url: "ajax_php_file?reg_type_select_ajax=1&q="+myJsonString,
                type: "POST", 
				          
                success: function(data)
                {
					//alert(data);
					 $("#card_hold_view").html(data);  
                }
                });
            }));
		});
		</script>
  