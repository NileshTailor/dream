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
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Company Tariff</div><div class="toast-message"> </div></div></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs print-hide">
                 <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">
                    Add Company Tariff
                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab"> View
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
                    <form method="post" name="add"  id="addt_company_tariff">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:100% !important;" align="left">
                       
                        
                            
                        <tr id="company_name_idd"><td><label>Company<span style="color:#E02222">* </span></label></td>
                        <td> <div class="form-group"><select class="form-control input-small select2me" name="company_id" id="company_id" placeholder="Select...">
                                <option value=""></option>
                                <?php
                                foreach($fetch_company_registration as $data)
                                {
                                ?>
                                <option value="<?php echo $data['company_registration']['id'];?>"
                                 plann="<?php echo $data['company_registration']['master_plan_id'];?>"><?php echo $data['company_registration']['company_name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                            <td><label>Room Plan<span style="color:#E02222">* </span></label></td>
                        <td> <div class="form-group"><select class="form-control input-small" name="master_room_plan_id" onchange="room_tariff();" id="master_room_plan_id" placeholder="Select...">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_master_room_plan as $data)
                                {
                                ?>
                                <option value="<?php echo $data['master_room_plan']['id'];?>"><?php echo $data['master_room_plan']['plan_name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                       
                        <td><label>Date From<span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="date_from" ></div></td>
                        
                        <td><label>Date To<span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="date_to" ></div></td>
                        
                        </tr>
                        
                        <tr>
                        <td><label>Tax Applicable<span style="color:#E02222">* </span></label></td>
                        <td colspan="3"> <div class="form-group"><select class="form-control select2 select2_sample2 input-large" placeholder="Select Tax..."  name="master_tax_id[]" multiple="multiple" required>
                                
                                <?php
                                foreach($fetch_master_tax as $data)
                                {
                                ?>
                                <option value="<?php echo $data['master_tax']['id'];?>">
                                <?php echo $data['master_tax']['name'];?>
                                <?php echo " @ "; ?><?php echo $data['master_tax']['tax_applicable'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                        <td><label>Discount(%)<span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" required="required" placeholder="Discount (%)" name="discount" id="discount"></div></td>
                        <td><label>Food Discount(%)</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Food Discount (%)" name="food_discount"></div></td>
                       </tr>
                        
                        <tr>
                         <td><label>Remarks</label></td>
                        <td colspan="7"><input type="text" class="form-control input-inline input-large" placeholder="Remarks" name="remarks" ></td>
                        </tr>
                        
                      <tr id="hide_room" style="border-top:groove #0FC"><td colspan="8">
                      <table width="100%" style="margin-top:5px;" border="0" id="add_data">
                       <tr id="1">
                   <td><label>Room Type</label></td>
                    <td class="form-group"><div class="form-group"><label><div style="float:left; width:60%"><select class=" form-control input-small select2me" 
                    name="master_room_type_id[]" onchange="room_tariff();"  id="rtid1" placeholder="Select...">
                    <option value=""></option>
                    <?php
                    foreach($fetch_master_room_type as $data)
                    {
                    ?>
                    <option value="<?php echo $data['master_room_type']['id'];?>"><?php echo $data['master_room_type']['room_type'];?></option>
                    <?php
                    }
                    ?>
                    </select></div></label></div>
                    </td>
                    
                    <td><label>Tarriff Rate</label></td>
                        <td>
                        <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-rupee"></i>
                        </span>
                        <input type="text" class="form-control input-inline" style="width:57%" placeholder="Tarriff Rate" name="special_rate[]" id="special_rate1" ></div></td>
                        
                       
                    
                    <td><label><button type="button" onclick="add_data()" class="btn blue btn-xsmall" />Add Row </label></td></tr>
                    <input type="hidden" value="1" id="next_id"/>
                    </table></td></tr>
                        
                        <tr>
                        <td colspan="8"><center><button type="submit" name="add_fo_room_booking" class="btn green" value="add_fo_room_booking"><i class="fa fa-plus"></i> Add</button> <button type="reset" name="" class="btn red " value="add_fo_room_booking"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_fo_room_booking))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>
            <div class="table-responsive">
                        <div class="portlet box" style="border:#FFF !important; background-color:#099">
                            <div class="portlet-title box white">
                                <div class="caption">
                                    <i class="fa fa-book" style="color:#FFF"></i><strong>Company Tariff</strong>
                                </div>
                            </div>
                                <div class="portlet-body">
                                
                                <table align="center" width="100%" border="0" style="float:left"><tr class="print-hide"><td>
                                <tr class="print-hide">
                                
                                 <td width="10%"><label></label></td>
                                 <td width="10%"><label></label></td>
                                 <td width="10%"><label></label></td>
                                <td width="10%"><label>Company Name</label></td>
                        <td> <div class="form-group" style="width:15%"><select class="form-control input-small" name="company_id" id="company_idd">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_company_registration as $data)
                                {
                                ?>
                                <option value="<?php echo $data['company_registration']['id'];?>"
                                 plann="<?php echo $data['company_registration']['master_plan_id'];?>"><?php echo $data['company_registration']['company_name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                         
                                
                                </td>
                               <td><label style="margin-left:10px;"><button onclick="view_dataa();" class="btn green btn-sm"><i class="fa fa-search"></i> View</button></label></td>
             <td><label style="margin-left:10px;"><button class="btn red btn-sm" onclick="window.print()"><i class="fa fa-print"></i> Report</button></label></td>
             <td width="10%"><label></label></td>
             <td width="10%"><label></label></td>
             <td width="10%"><label></label></td>
                                </tr>
                               
     </table>
                                <span style="margin-top:20px" id="view_data1"></span>
                                </div>
                            </div>
                        </div>
            </div>
            </div>  
    	</div>
    </div>
</div>

 <?php }?>
      </div>

			</div>  
    	</div>
    </div>
    
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>

function view_dataa()
		{
			var company_id=$("#company_idd").val();
				$.ajax({
				url: "ajax_php_file?company_tarif_view_dateselect=1&q="+company_id,
				type: "POST",         
				success: function(data)
				{	
					$("#view_data1").html(data);
					$(".page-spinner-bar").addClass(" hide"); //hide loading
					$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
					{
						$(this).alert('close'); 
						$(this).remove();
					});
				}
				});
			
		}
	
$(document).ready(function(){
	
    $("#rcn").click(function(){
		$('#company_name_idd').show();
		$('#company_category_idd').hide();
    });
	$("#rcc").click(function(){
		$('#company_name_idd').hide();
		$('#company_category_idd').show();
    });
});
$(document).ready(function()
        {
			var myVar=setInterval(function(){myTimerr()},4000);
			function myTimerr() 
	   {
	   $("#success").hide();
	    } 
		
	});
$(document).ready(function()
		 {
      		$('#company_id').live('change',function(e){
				//alert();
			 			 $("#master_room_plan_id").val($('option:selected', this).attr("plann"));
						 //alert($('option:selected', this).attr("plann"));
			});});

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
//////////////////
/*function room_tariff()
	{ 
		var ar = [];
		var next_id = $("#next_id").val();
		var master_room_type_id=$("select[name=master_room_type_id]").val();
		var master_room_plan_id=$("select[name=master_room_plan_id]").val();
		ar.push(master_room_type_id,master_room_plan_id);
		var myJsonString = JSON.stringify(ar);
		$.ajax({
		url: "ajax_php_file?fatch_room_vacantchecking=1&q="+myJsonString,
		type: "POST",
		success: function(data)
		{
		var da=data.split(",");
			$("#special_rate").val(da[0]);
			$("#extra_bed").val(da[1]);
			$("#discount").val(da[2]);
		}
		});
	}*/
//////////////////////////
function room_tariff()
	{ 
		var ar = [];
		var next_id = $("#next_id").val();
		var master_room_type_id=$("#rtid"+next_id).val();
		ar.push(master_room_type_id);
		var myJsonString = JSON.stringify(ar);
		$.ajax({
		url: "ajax_php_file?fatch_room_vacantchecking=1&q="+myJsonString,
		type: "POST",
		success: function(data)
		{
		var da=data.split(",");
			$("#special_rate"+ next_id).val(da[0]);
		}
		});
	}
	function add_data()
	{	
		var next_id=$("#next_id").val();
		$.ajax({
			url: "ajax_php_file?checkin_add_dt_tr=1&q="+next_id,
			type: "POST",         
			success: function(data)
			{	
			var da = parseInt(next_id) + parseInt(1);
				$("#add_data tr:last").after(data);
				$("#next_id").val(da);
				$('select').select2();
			}
			});
		
	}
	function checkin_data_deleterow(id)
	{ 
	$(".page-spinner-bar").removeClass("hide"); //show loading
		var ar = [];
		$.ajax({
		url: "ajax_php_file?checkin_data_deleterowww=1&q="+id,
		type: "POST",         
		success: function(data)
		{
			$("#"+id).remove();
			$(".page-spinner-bar").addClass(" hide");
		}
		})
	}
	function delete_row_data(id)
	{
		var nax =  parseInt(id) -  parseInt(1) ;
		var tot= $("#tg"+id).val();
		var gross_amount= $("#gross_amount").val();
		var total_gross =  parseInt(gross_amount) -  parseInt(tot) ;
		$("#gross_amount").val(total_gross);
			$("#"+id).remove();
			$("#next_id").val(nax);
	}
	
	


</script>