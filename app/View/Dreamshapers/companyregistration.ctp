<style media="print">
.print-hide
{
	display:none;
}
</style>

<?php
if(empty($active))
{ $active="";
}
?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Company Registration</div><div class="toast-message"> </div></div></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs print-hide">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">
                    Company Registration
                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">
                    View
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                <?php
                if(!empty($error))
				{
					echo "<div id='success' class='note note-danger alert-notification'><p>Data Already Exist</p></div>";
					
				}
				?>
                    <form method="post" name="add" id="add_company_registration">
                   	 <div class="table-responsive">
                    	<table class="table self-table" border="0" style=" width:90% !important;">
                        <tr>
                        <td width="20%"><div class="form-group"><label>Company Name <span style="color:#E02222">* </span></label></div></td>
                        <td width="25%"><div class="form-group">
                              <input type="text" class="form-control input-inline input-medium" placeholder="Company Name" name="company_name"  >
                              </div></td>
                        <td width="20%"><div class="form-group"><label>Company Category <span style="color:#E02222">* </span></label></div></td>
                      	<td width="30%"><div class="form-group" style="float:left; width:60%"><select class="form-control" style="width:120%" name="company_category_id">
                                            <option value="">-- Select Category --</option>
                                            <?php
                                            foreach($fetch_company_category as $data)
                                            {
                                            	?>
                                                <option value="<?php echo $data['company_category']['id'];?>"><?php echo $data['company_category']['category_name'];?></option>
                                                <?php
                                            }
                                            ?>
									</select></div>
                                    <div style="width:23%; float:right"><a class="btn green"  data-toggle="modal" href="#popupcat"><i class="fa fa-plus"></i></a></div>
                                    </td>
                          </tr>
                        <tr>
                        <td><label>PAN No.</label></td>
                      	<td><input type="text" class="form-control input-inline input-medium" width="80px" placeholder="PAN No." name="pan_no" maxlength="10"></td>
                       
                        
                         
                        <td ><label>Service Tax No.</label></td>
                        <td ><input type="text" class="form-control input-inline input-medium" placeholder="Service Tax No." name="service_tax_no"  ></td>
                        </tr>
                        <tr>
                        <td><label>Authorized Person Name</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" placeholder="Authorized Person Name" name="authorized_person_name"  ></td>
                        
                        <td><label>Contact No.</label></td>
                        <td>
                        <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-phone"></i>
											</span>
                        
                        <input type="text" class="form-control input-inline" style="width:81%" onkeypress="javascript:return isNumber (event)" placeholder="Contact No." name="authorized_contact_no" maxlength="10"></div></td>
                        </tr>
                        <tr>
                        <td><label>Mobile No.</label></td>
                        <td>
                        <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-mobile-phone"></i>
											</span>
                        <input type="text" class="form-control input-inline" style="width:94%" onkeypress="javascript:return isNumber (event)"  placeholder="Mobile No." name="mobile_no"  maxlength="10"/></div></td>
                        
                        <td><label>Authorized Email id</label></td>
                        
                        <td class="form-group">
                        <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-envelope"></i>
											</span>
                        <input type="text" class="form-control" style="width:81%" placeholder="Authorized Email id" name="authorized_email_id" >
                        	
                            </div></td>
                        </tr>
                        <tr>
                        <td><div class="form-group"><label>Master Plan <span style="color:#E02222">* </span></label></div></td>
                        <td>
                        <div class="form-group">
                    <select class="form-control input-medium" name="master_plan_id" id="plan_id"  >
                            <option value="">-- Select Plan --</option>
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
                        <td></td><td></td>
                        </tr>
                        <tr>
                        <td colspan="5">
                        <div style="width:52%; float:left; ">
                             <div style="width:70%; float:left ">
                            <label>Correspondence Address</label>
                          
                            <textarea class="form-control" rows="2" cols="3" id="c_address" name="c_address" style="resize:none"></textarea>
                            </div>
                            <div style="width:20%; float:right ">
                            <br/>

                            <label class="checkbox-inline" >
                            
                            <input type="checkbox" name="same" onclick="same_as()" id="same" />Same as
                            Correspondence
                            </label>
                            </div>
                        </div>
                       
                        <div style="width:35%; float:right">
                        <label>Permanent Address</label>
                        
                        <textarea class="form-control" cols="3" rows="2" id="p_address"  name="p_address" style="resize:none"></textarea>
                        </div></td>
                        </tr>
                        <tr>
                        <td colspan="4"><center><button type="submit" name="add_company_registration" class="btn green" value="add_company_registration"><i class="fa fa-plus"></i> Add</button>
                         <button type="reset" name="" class="btn red " value="add_company_registration"><i class="fa fa-level-down"></i> Reset</button></center></td>

                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                
            <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
            <div class="table-responsive">
            <div class="portlet box" style="border:#FFF !important; background-color:#099">
                            <div class="portlet-title box white">
                                <div class="caption">
                                    <i class="fa fa-book"></i><strong>Company Registration</strong>
                                </div>
                            </div>
                                <div class="portlet-body">
                                
                                <table align="center" width="40%" border="0" style="float:right"><tr class="print-hide"><td>
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
             <td><label style="margin-left:10px;"><button class="btn red btn-sm" onclick="window.print()"><i class="fa fa-print"></i> Report</button></label></td>
             <!--<td><label style="margin-left:10px;"><a class="btn blue btn-sm"  href="excel_companyreport" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a></label></td>-->
                                </tr>
                                </table>
                                
                                <table width="40%" style="float:left" border="0"><tr class="print-hide">
                                <div class="input-group">
                                <td align="right" style="padding-right:5px"><b>My Search:</b></td>
                                <td>
                                
					<input class="form-control" placeholder="Search Company Name Here." name="s_querys" id="s_querys" type="text" onkeyup="view_data1();">
                   
					
				</td></div></tr></table>
                                
                                <span style="margin-top:20px" id="view_data"></span>
                                </div>
                            </div>
                        </div>
            </div>
            
                
            </div>  
    	</div>
    </div>
</div>

<!-------------------------------------------------------->

<div class="modal fade" id="popupcat" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Add New Category</h4>
        </div>
        <div class="modal-body">
        <div class="tab-pane fade active in" id="tab_1_2">
        <form method="post" id="add_company_category">
        <div class="table-responsive">
        <table class="table self-table" style=" width:70% !important;" border="0">
        <tr>
                                <td width="50%"><div class="form-group">
                            <label class="control-label col-md-8">Category Name
                            </label>
                            </div>
                            </td>
                            
                            <td><div class="form-group">
                                <div class="col-md-8">
                                <input type="text"placeholder="Category Name" name="category_name" id="category_name" class="form-control input-medium"/>
                                </div>
                            </div></td>
                        </tr>
         <tr><td colspan="3"><center><div class="modal-footer">
                                                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="add_company_category" value="add_company_category" class="btn blue"><i class="fa fa-plus"></i> Add</button>
                                                </div></center></td></tr>      
                        </table>
                </div>
                </form>
                </div></div>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
<!-------------------------------------------------------->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>

    <script>
	$(document).ready(function()
        {
			var myVar=setInterval(function(){myTimerr()},4000);
			function myTimerr() 
	   {
	   $("#success").hide();
	    } 
		
	});
	
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
				url: "ajax_php_file?company_reg_view_dateselect=1&q="+myJsonString,
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
		
		function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
		
		/////////////////////
		
	function view_data1()
	{
		//alert();
		//var ar = [];
		var s_querys=$("#s_querys").val();
		
			
			$.ajax({
			url: "ajax_php_file?c_reg_view_search=1&q="+s_querys,
			type: "POST",         
			success: function(data)
			{	
			//alert();
				$("#view_data").html(data);
			}
			});
		
		
	}
	///////////////////////////
	function allLetter(inputtxt,id)  
	{  //alert();
		var letters ='[0-9]';
		
		if(inputtxt.match(letters))  
		{  
		}  
		else  
		{ 
			$('#'+id).val(''); 
			return false;  
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
	
	function same_as_edit(id,valu)
	{ 
			if($("#"+id).is(":checked"))
			{ 
				var edit_c_address=$("#edit_c_address"+valu).val();
				$("#edit_p_address"+valu).val(edit_c_address);
			}
			else
			{ 
				$("#edit_p_address"+valu).val('');
			}
	}
	
	
	$(document).ready(function(){
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
			$contain="Add successfully...!";
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