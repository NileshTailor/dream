<?php
if(empty($active))
{ $active="";
}
?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Registrations</div><div class="toast-message"> </div></div></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            
<ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">
                    <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong>New Registrations</strong></h6></span>
                     </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">
                    <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong>View</strong></h6></span>
                    </a>
                </li>

                
            </ul>

<div class="tab-content">
    <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
    <form method="post" enctype="multipart/form-data" name="add" id="add_registration">
           <table style="margin-top:1%; width:100% !important" border="0">
               
                <tr height="40px"><td width="15%"><label>Name <span style="color:#E02222">* </span></label>
                 </td> <td width="20%">
                    <div class="form-group ">
                        <input type="text" name="name" placeholder="Name" autofocus class="form-control"/>
                    </div>
                     </td>
                 <td width="10%" align="center"><label>S/W/D of</label></td>
                <td>
                    <div class="form-group">
                     <input type="text" name="swd_of" class="form-control" placeholder="S/W/D of"/>
                    </div>
                    </td>
                 <td align="center"><label>Occupation</label></td><!-- Mr./Mrs./Ms. :-->
                 <td>
                    <div class="form-group">
                    <input class="form-control" autofocus  placeholder="Occupation" name="occupation" type="text">
                    </div>
                 </td>
                 </tr>
                <tr height="40px">
                <td><label>Permanent Adderss <span style="color:#E02222">* </span></label></td>
                 <td colspan="5">
                  <div class="form-group">
                    <input class="form-control" name="p_address" placeholder="Permanent Adderss" type="text">
                    </div>
                 </td>
                </tr>
                <tr height="40px"><td><label>Phone No. </label></td>
                    <td>
                    <div class="form-group">
                     <input name="p_phone" class="form-control input-small" placeholder="Phone No" type="text">
                     </div>
                    </td>
                <td><label>Fax </label></td>
                    <td>
                    <div class="form-group">
                     <input name="fax"  placeholder="Fax" class="form-control input-small" type="text">
                     </div>
                    </td>
                    <td><label>Office</label></td>
                 <td>
                 <div class="form-group">
              		<input name="office" placeholder="Office" class="form-control input-small" type="text">
                    </div>
                 </td>
                </tr>
                <tr height="40px">
                 <td ><label>Correspondence Address</label></td>
                 <td colspan="5">
                    <div class="form-group">
                     <input class="form-control" name="c_address" placeholder="Correspondence Adderss" type="text">
                    </div>
                 </td>
                </tr>
                <tr height="40px"><td><label>Phone No. (Home) </label></td>
                 <td>
                 <div class="form-group">
                	<input name="c_phone" class="form-control input-small" placeholder="Phone No" type="text">
                    </div>
                 </td>
                
                <td><label>Mobile No. <span style="color:#E02222">* </span></label> </td>
                 <td>
                 <div class="form-group">
               		<input name="mobile_no" maxlength="10" class="form-control input-small" placeholder="Mobile" type="text">
                 </div>
                 </td>
                <td><label>Email</label></td>
                 <td>
                 <div class="form-group">
                 <input name="email" type="text" class="form-control input-small" placeholder="Email Address"/>
                 </div>
                 </td>
                </tr>
                <tr height="40px"><td><label>Marital Status</label></td>
                	<td >
                    	<div class="form-group">
										<div class="radio-list">
											<label class="radio-inline">
											<input type="radio" name="marital_status" id="optionsRadios4" value="single" checked> Single </label>
											<label class="radio-inline">
											<input type="radio" name="marital_status" id="optionsRadios5" value="married"> Married </label>
										</div>
						</div>
                    </td>
               <td ><label>Residential Status</label></td>
                	<td>
                    	<div class="form-group">
										<div class="radio-list">
											<label class="radio-inline">
											<input type="radio" name="residential_status" id="optionsRadios4" value="resident" checked> Resident </label>
											<label class="radio-inline">
											<input type="radio" name="residential_status" id="optionsRadios5" value="non_resident"> Non</label>
										</div>
						</div>
                    </td>
                    <td><label> Card Id No.</label></td>
                    <td> <div class="form-group">
               				<input name="card_id_no" class="form-control input-small" placeholder="Card Id No." type="text">
                		 </div>
                 </td>
                
                </tr>
               
                 
                   <tr height="40px"><td><label>Income Tax Account No.</label></td><!-- Mr./Mrs./Ms. :-->
                 <td>
                    <div class="form-group">
                    <input class="form-control input-small" autofocus  placeholder=" Account No" name="tax_ac_no" type="text">
                    </div>
                 </td>
                 	<td><label>Nationality </label></td>
                	<td>
                    	<div class="form-group">
										<div class="radio-list">
											<label class="radio-inline">
											<input type="radio" name="nationality"  id="optionsRadios4" value="indian" checked> Indian </label>
											<label class="radio-inline">
											<input type="radio" name="nationality" id="optionsRadios5" value="non_indian"> Non-Indian</label>
										</div>
						</div>
                    </td>
                    <td><label>Date of Birth</label></td>
                    
                    <td colspan="3"><table width="100%"><tr><td><select class="form-control" name="dd" style="width:75px">
											<option>Day</option>
                                            <?php 
                                            for($i=1;$i<=31;$i++)
                                            {?>
											<option value="<?php echo $i; ?>"><?php echo $i ?></option>
                                            <?php } ?>
										</select> </td><td>                 
                    <select class="form-control" name="mm" style="width:92px">
											<option>Month</option>
                                           <option value = "1">Jan</option>
                                            <option value = "2">Feb</option>
                                            <option value = "3">March</option>
                                            <option value = "4">April</option>
                                            <option value = "5">May</option>
                                            <option value = "6">June</option>
                                            <option value = "7">July</option>
                                            <option value = "8">August</option>
                                            <option value = "9">Sept</option>
                                            <option value = "10">Oct</option>
                                            <option value = "11">Nov</option>
                                            <option value = "12">Dec</option>
                                            </select>
                                           </td><td>
                    <select class="form-control" name="yy" style="width:85px">
											<option>Year</option>
                                            <?php $cur=date('Y');
                                            $first_year=$cur-100;
                                            for($i=$first_year;$i<=$cur;$i++)
                                            {?>
											<option value="<?php echo $i; ?>"><?php echo $i ?></option>
                                            <?php } ?>
										</select></td></tr></table></td>
                    </tr>
                <tr height="40px"><td><label> Guest Type <span style="color:#E02222">* </span></label></td>
                 <td>
                  <div class="form-group">
                    <select class="form-control input-small" required name="guest_type" id="guest_type">
                        <option value="">-- Select --</option>
                        <option value="one year">One Year</option>
                        <option value="five year">Five Year</option>
                    </select>
                    </div>
                 </td>
                 <td><label>Date of Anniversary</label></td><!-- Mr./Mrs./Ms. :-->
                 <td>
                  <div class="form-group">
                    <input class="form-control input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="Date Anniversary" name="date_of_anniversary" type="text">
                    </div>
                   
                 </td>
                 <td><label> Registration Type <span style="color:#E02222">* </span></label></td>
                 <td>
                 <div class="form-group">
                    <select class="form-control input-small" required name="reg_type" onchange="reg_type()" id="reg_type_select">
                        <option value="">-- Select --</option>
                        <option value="main">Main</option>
                        <option value="dependant">Dependant </option>
                    </select>
                    </div>
                 </td>
                
                </tr>
                <tr id="flat_wing_view"></tr>
                <tr><td colspan="6" id="card_hold_view"></td></tr>
                
                </table>
            <button type="submit" name="add_registration" style=" margin-left:45%; margin-top:1%" class="btn blue">Submit</button>   
           </form>
                </div>
                
                
                
        <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
               <div class="portlet box blue" >
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-book"></i><strong>View Registration</strong>
                                </div>
                            </div>
                                <div class="portlet-body" style="max-height:380px; overflow-y:scroll">
                                
                                <table style="margin-left:30%" width="40%" border="0"><tr><td>
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
                                <td><button onclick="view_data();" class="btn green"><i class="fa fa-search"></i> View</button></td>
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
               
               
                
                
                
                

<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script>
		function view_data()
		{
			var ar = [];
			var start_date=$("#start_date").val();
			var end_date=$("#end_date").val();
			//alert(end_date);
			if($("#start_date").val()!='' ||$("#end_date").val()!='' ){
				//alert(start_date);
				$(".page-spinner-bar").removeClass("hide"); //show loading
				ar.push(start_date,end_date);
				var myJsonString = JSON.stringify(ar);
				//alert(myJsonString);
				$.ajax({
				url: "ajax_php_file?registration_view_dateselect=1&q="+myJsonString,
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
			else
			{	alert("Please select date first")
			}
		}
        $(document).ready(function()
        {
         $("#guest_type").on('change',(function(e)
            {
                var ar = [];
                var guest_type=$("select[id=guest_type]").val();
				if($("select[id=guest_type]").val()=='five year')
				{
				$("#flat_wing_view").html('<td><label>Wing Name </label></td><td><div class="form-group"><input class="form-control input-small"   placeholder="Wing Name" name="wing_name" type="text"></div></td><td><label>Flat No.</label></td><td><div class="form-group"><input class="form-control input-small"   placeholder="Flat No." name="flat_no" type="text"></div></td><td><label>Floor</label></td><td><div class="form-group"><input class="form-control input-small" autofocus  placeholder="Floor" name="floor" type="text"></div></td>');
				}
				else
				{
				$("#flat_wing_view").html('<input name="wing_name" value="0" type="hidden"><input name="flat_no" value="0" type="hidden"><input name="floor" value="0" type="hidden">');
				}
				
			 }));
			
			$("#reg_type_select").on('change',(function(e)
            {
                e.preventDefault(); 
                var ar = [];
                var reg_type_select=$("select[id=reg_type_select]").val();
					
				if($("select[id=reg_type_select]").val()=='dependant')
				{	
			 $("#card_hold_view").html('<table width="60%" id="myTable" style="margin-top:1%;height:auto; margin-left:10%;" border="0"><tr><td width="40%"><div class="form-group"><input class="form-control input-medium"   placeholder="Name of Cardholder" name="cardholder1" type="text"></div></td><td width="40%"><div class="form-group"><input class="form-control input-medium"  placeholder="Name of Applicant" name="applicant1" type="text"></div></td><td></td></tr><tr><td colspan="5" id="nxt_row"></td></tr><tr><td colspan="2"><button type="button" onclick="registration_addrow();" id="add_btn" class="btn btn-xs btn-primary">Add Row</button></td></tr><input type="hidden" name="total_row" value="1" id="next_row"/><input type="hidden" name="exct_row" value="1" id="exct_row"/></table>');	
			}
			else
			{
				 $("#card_hold_view").html('<input type="hidden" name="total_row" value="0" id="next_row"/><input type="hidden" name="exct_row" value="0" id="exct_row"/>');
			}
			
            }));
		});
	
	
	$(document).ready(function(){
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
			$contain="Successfully Register...!";
			$cls='toast-success';
		}
	?>
	$(".toast").addClass("<?php echo $cls; ?>");
	$(".toast-message").html("<?php echo $contain; ?>");
	 $("#toast-container").show();
	  var myVar=setInterval(function(){myTimer()},5000);
	   function myTimer() 
	   { $("#toast-container").hide(); }  
	<?php } ?>
});



	
		</script>