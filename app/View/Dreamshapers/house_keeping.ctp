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
{ $active="";
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">House Keeping</div><div class="toast-message"> </div></div></div>
</div>


 <div id="message"></div>
  <div ng-spinner-bar="" class="page-spinner-bar hide">
		<div class="bounce1"></div>
		<div class="bounce2"></div>
		<div class="bounce3"></div>
	</div>
<div class="row">
    <div class="col-md-12">
    <div style="width:">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs print-hide">
                  <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">House Keeping
                    

                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View
                    

                    </a>
                </li>
            </ul>

            <div class="tab-content">
               <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                    <form method="post" name="add"  id="roomtype_addform">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:88% !important; background-color:#FFF;" border="0" align="center">
                        <tr class="well" style="background-color:#E26A6A; color:#FFF">
                        
                       <td><label style="margin-right:14px;">Room No.</label></td>
                                            <td class="form-group"><select class=" form-control input-small" name="master_roomno_id" id="master_roomno_idd">
                                <option value="">Select No.</option>
									<?php
                                    foreach($fetch_room_checkin_checkout as $data)
                                    {
                                    ?>
                                    <option value="<?php echo $data['room_checkin_checkout']['id']; ?>" card_no="<?php echo $data['room_checkin_checkout']['card_no'];?>"
                                    roomno_id="<?php echo $data['room_checkin_checkout']['master_roomno_id'];?>" 
                                    guest_name="<?php echo $data['room_checkin_checkout']['guest_name'];?>" company_id="<?php echo $data['room_checkin_checkout']['company_id'];?>">
                                    <?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></option>
                                   <?php
                                }
                                ?>
                                </select>
                                    </td>
                                    <td><label>Card No.</label></td>
                        <td align="left"><input type="text" class="form-control input-small" readonly="readonly" placeholder="Card No." name="card_no" id="card_no" ></td>
                        <input type="hidden" name="roomno_id" id="roomno_id" >
                        <td><label>Date</label></td>
                         <td class="form-group"><div class="input-group"><label><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="date" data-date="12-08-2015" value="<?php echo  date("d-m-Y"); ?>"></label></div></td>
                         <td><label>Time</label></td>
                        <td><input class="form-control  input-inline input-small timepicker timepicker-no-seconds" type="text" placeholder="Time" name="time" >
                            </td>
                        </tr>                    
                        <tr>
                        <td><label>Guest Name</label></td>
                        <td align="left"><input type="text" class="form-control input-small" readonly="readonly" placeholder="Guest" name="guest_name" id="guest_name" ></td>
                        
                        <td><label style="margin-right:8px;">Serviced By</label></td>
                        <td class="form-group" colspan="2"><label><select class=" form-control input-small" name="serviced_by" id="serviced_by">
                                <option value="">-- Select Caretaker Name --</option>
									<?php
                                    foreach($fetch_master_caretaker as $data)
                                    {
                                    	
                                        	?>
                                            <option  value="<?php echo $data['master_caretaker']['id'];?>"><?php echo $data['master_caretaker']['caretaker_name'];?></option>
                                        <?php
                                        }
                                    
                                    ?>
                                </select></label>
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
                        </td><td></td><td></td>
                        </tr>

<tr>
                        <td><label>Clothes No.<br>(Number of Clothes)</label></td>
                        
                        <input type="hidden" id="washhidden" name="washhidden" >
                        <input type="hidden" id="ironhidden" name="ironhidden" >
                       
                        <td align="right"><label>Wash & Iron</label></td>
                        <td><input type="text" class="form-control input-xsmall" placeholder="No." name="wash_iron_no" id="wash_iron_no" onKeyUp="house_keeping();" value="0"></td>
                       <td>
                       <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-rupee"></i>
											</span>
                        
                       
                       <input type="text" class="form-control input-xsmall" placeholder="/Rs."  name="wash_iron_price" id="wash_iron_price" onKeyUp="house_keeping();" value="0"></div></td>

                        </tr>
                        <tr>
                        <td></td>
                        <td align="right" style="padding-right:58px"><label>Iron</label></td>
                        <td><input type="text" class="form-control input-xsmall" placeholder="No." name="iron_no" id="iron_no" onKeyUp="house_keeping();" value="0"></td>
                        <td>
                        <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-rupee"></i>
											</span>
                        <input type="text" class="form-control input-xsmall input-icon center" placeholder="Right icon"  name="iron_price" id="iron_price" onKeyUp="house_keeping();" value="0"></div></td>
                        </tr>
                        <tr>
                        <td></td><td></td>
                        <td><label>Total Amount</label></td>
                        <td>
                        <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-rupee"></i>
											</span>
                        <input type="text" class="form-control input-xsmall" placeholder="Amount" name="total_amount" id="total_amount"></div></td>
                        
                        </tr>
                        <tr>
                       <td><label style="margin-right:14px;">Remark</label></td>
                        <td colspan="7"><input type="text" class="form-control input" width="90px" placeholder="Keeping Remarks" name="remarks" id="remarks"></td>
                         <input type="hidden" id="hk" />
                        </tr>
                        
                                <tr><td colspan="8" align="center">
                                
                                        <legend style="color:#FFF; background-color:#E26A6A; text-align:left; padding-left:15px">Payment Mode</legend>
                                        <table width="100%" border="0">
                                        <tr><td colspan="6" align="center" style="padding-bottom:20px">
                                <div class="form-group">
										<div class="radio-list" >
											<label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcc" checked="checked" value="Cash" style="margin-left:4px">Cash</label>
											<label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcq" value="Cheque">Cheque</label>
                                            <label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcn" value="NEFT">NEFT</label>
                                            <label class="radio-inline">
											<input type="radio" name="recpt_type" id="rcr" value="Credit Card">Credit Card</label>
										</div>
						                </div>
                        </td>
                        
                        <td>Amount</td>
                     <td><input type="text" class="form-control input-inline input-small" placeholder="Amount" name="house_amount" ></td>
                     
                        <td>Narration</td>
                     <td><input type="text" class="form-control input-inline input-small" placeholder="Narration" name="narration" ></td>

                        </tr>
                        
                        
                        <tr align="center" input style="display:none;" id="cheque_idd">
                        <td><label>Cheque No.</label></td>
                        <td ><input type="text" class="form-control input-inline input-small" placeholder="Cheque No." name="cheque_no" ></td>
                        <td><label>Date</label></td>
                         <td class="form-group"><div class="input-group"><label><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="cheque_date" data-date="12-08-2015" value="<?php echo  date("d-m-Y"); ?>"></label></div></td>
                         <td><label>Bank Name</label></td>
                        <td style="padding-right:10px"><input type="text" class="form-control input-inline input-small" placeholder="Bank Name" name="bank_name" ></td>
                        </tr>
                        
                        
                        <tr align="center" input style=" display:none;" id="neft_idd">
                         <td align="center"><label>NEFT No.</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="NEFT No." name="neft_no" ></td>
                        </tr>
                        
                        <tr align="center" input style="display:none;" id="credit_idd">
                          <td><select class=" form-control input-small select2me" name="credit_card_name">
                                <option value="">--Select Credit Card Name--</option>
											 <option>ICICI</option>
                                             <option>SBI</option>
                                             <option>HDFC</option>
						       </select>
                          </td>
                        <td><input type="text" class="form-control input-inline input-medium" placeholder="Credit Card No." name="credit_card_no" ></td>
                        </tr>
                        </table></fieldset></td></tr>
                        
                        
                        <tr>
                     <td colspan="8"><center><button " name="add_house_keeping" value="add_house_keeping"  class="btn green"><i class="fa fa-plus"></i> Submit</button>
                     <button type="reset" name="" class="btn red " value="add_house_keeping"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
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
        <div align="center" style="padding: 0px; font-size: 15px; font-family:Verdana, Geneva, sans-serif">House Keeping Report
        <br />
        <hr width="500px" size="40px" style="border:solid 1px #999" /></div>
        <?php }?>
</div>
                        <div class="portlet box" style="border:#FFF !important; background-color:#E26A6A">
                            <div class="portlet-title box white print-hide">
                                <div class="caption">
                                    <i class="fa fa-book" style="color:#FFF"></i><strong>House Keeping</strong>
                                </div>
                            </div>
                                <div class="portlet-body">
                                
                                <table align="center" width="40%" border="0"><tr class="print-hide"><td>
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
             <!--<td><label style="margin-left:10px;"><a class="btn blue btn-sm"  href="excel_functionreport" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a></label></td>-->
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
</div>

<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>

    <script>
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
				url: "ajax_php_file?house_keeping_view_dateselect=1&q="+myJsonString,
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
	
		
$(document).ready(function()
        {
			$("#dlt").click(function(){
			 //setInterval(function(){
				 $('#delete').hide();
			 //},5000);
			 
    });
		});
			
		$(document).ready(function()
		{
      		$('#master_roomno_idd').live('change',function(e){
			 			 $("#card_no").val($('option:selected', this).attr("card_no"));
						 $("#roomno_id").val($('option:selected', this).attr("roomno_id"));
                         $("#company_id").val($('option:selected', this).attr("company_id"));
                         $("#guest_name").val($('option:selected', this).attr("guest_name"));
			});
		});
			
			
			/*$("#master_roomno_idd").on('change',(function(e)
            {
                e.preventDefault();
                var ar = [];
                var room_no=$("select[id=master_roomno_idd]").val();
                ar.push(room_no);
                var myJsonString = JSON.stringify(ar);
				
                $.ajax({ 
                url: "ajax_php_file?outlet_guest_fetch=1&q="+myJsonString,
                type: "POST", 
				          
                success: function(data)
                { 
				alert(data);
					$("#card_no").val(data);  
                }
                });
            }));	*/
            
            
           
			
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
			
            
            
            
            $(document).ready(function(){
	
    $("#rcc").click(function(){
		$('#cash_idd').show();
		$('#cheque_idd').hide();
		$('#neft_idd').hide();
		$('#credit_idd').hide();
    });
	$("#rcq").click(function(){
		$('#cash_idd').hide();
		$('#cheque_idd').show();
		$('#neft_idd').hide();
		$('#credit_idd').hide();
    });
	$("#rcn").click(function(){
		$('#cash_idd').hide();
		$('#cheque_idd').hide();
		$('#neft_idd').show();
		$('#credit_idd').hide();
    });
	$("#rcr").click(function(){
		$('#cash_idd').hide();
		$('#cheque_idd').hide();
		$('#neft_idd').hide();
		$('#credit_idd').show();
    });
	
});


function house_keeping()
{
	
	
	var wash_iron_no=eval($('#wash_iron_no').val());
	var wash_iron_price=eval($('#wash_iron_price').val());
	var iron_no=eval($('#iron_no').val());
	var iron_price=eval($('#iron_price').val());
    var total_amount=eval($('#total_amount').val());
    var washhidden=eval($('#washhidden').val());
    var ironhidden=eval($('#ironhidden').val());
    var i=0;
	
    
    $('#washhidden').val(wash_iron_no*wash_iron_price);
    $('#ironhidden').val(iron_no*iron_price);

	$('#total_amount').val((wash_iron_no*wash_iron_price)+(iron_no*iron_price)+i);
}
        
		</script>       
		