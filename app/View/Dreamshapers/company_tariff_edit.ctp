
<?php
if(empty($active))
{ $active='';
}

foreach($fetch_fo_room_booking as $view_data)
{ 
	$id=$view_data['fo_room_booking']['id'];
        $company_id=$view_data['fo_room_booking']['company_id'];
        $master_room_plan_id=$view_data['fo_room_booking']['master_room_plan_id'];
        $date_from=$view_data['fo_room_booking']['date_from']; 
        $date_to=$view_data['fo_room_booking']['date_to']; 
        $remarks=$view_data['fo_room_booking']['remarks'];
		$discount=$view_data['fo_room_booking']['discount'];
		$food_discount=$view_data['fo_room_booking']['food_discount'];
		 
		  $master_tax_id=$view_data['fo_room_booking']['master_tax_id'];
         $master_tax_id=explode(',', $master_tax_id);
		 
     if($date_from=='0000-00-00')
         {	$date_from='';}
         else
         { $date_from=date("d-m-Y", strtotime($date_from)); }
       		$date_to=$view_data['fo_room_booking']['date_to'];
          if($date_to=='0000-00-00')
         {	$date_to='';}
         else
         { $date_to=date("d-m-Y", strtotime($date_to)); }
         
        
        $special_rate_expload=$view_data['fo_room_booking']['special_rate'];
        $special_rate=explode(',',$special_rate_expload);
        
        $master_room_type_id_expload=$view_data['fo_room_booking']['master_room_type_id'];
        $master_room_type=explode(',',$master_room_type_id_expload);
		}

 
     
	?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title"> Company Tariff </div><div class="toast-message"> </div></div></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <div class="tab-content">
                    <form method="post" name="add" id="checkinaddform">
                   
                   	 <div class="table-responsive">
                     <table class="table self-table" style=" width:100% !important;" border="0">
                     <tr id="company_name_idd"><td><label>Company<span style="color:#E02222">* </span></label></td>
                        <td> <div class="form-group"><select class="form-control input-small" name="company_id" id="company_id">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_company_registration as $data)
                                {
                                ?>
                                <option value="<?php echo $data['company_registration']['id'];?>" <?php if($company_id==$data['company_registration']['id']){ ?> selected <?php }?>
                                 plann="<?php echo $data['company_registration']['master_plan_id'];?>"><?php echo $data['company_registration']['company_name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                            <td><label>Room Plan<span style="color:#E02222">* </span></label></td>
                        <td> <div class="form-group"><select class="form-control input-small" name="master_room_plan_id" onchange="room_tariff();" id="master_room_plan_id">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_master_room_plan as $data)
                                {
                                ?>
                                <option <?php if($master_room_plan_id==$data['master_room_plan']['id']){ ?> selected <?php }?> value="<?php echo $data['master_room_plan']['id'];?>"><?php echo $data['master_room_plan']['plan_name'];?></option>
                                <?php
                                }
                                ?>
                            </select></div></td>
                       
                        <td><label>Date From<span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="date_from" value="<?php echo $date_from; ?>"></div></td>
                        
                        <td><label>Date To<span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="date_to" value="<?php echo $date_to; ?>" ></div></td>
                        </tr>
                        <input type="hidden" value="<?php echo $id;?>" name="id" id="id" />
                        <tr>
                        <td><label>Tax Applicable<span style="color:#E02222">* </span></label></td>
                        <td colspan="3"> <select class="form-control select2 select2_sample2 input-large" placeholder="Select Tax..."  name="master_tax_id[]" multiple="multiple" required>
                                
                                <?php
                                foreach($fetch_master_tax as $data)
                                {$idd=$data['master_tax']['id'];
                                ?>
                                <option value="<?php echo $data['master_tax']['id'];?>" <?php if(in_array($idd,$master_tax_id)){ ?> selected <?php } ?>>
                                <?php echo $data['master_tax']['name'];?>
                                <?php echo " @ "; ?><?php echo $data['master_tax']['tax_applicable'];?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                        <td><label>Discount(%)<span style="color:#E02222">* </span></label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" required="required" placeholder="Discount (%)" name="discount" id="discount" value="<?php echo $discount; ?>"></div></td>
                        <td><label>Food Discount(%)</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Food Discount (%)" name="food_discount" value="<?php echo $food_discount; ?>"></div></td>
                       </tr>
                        <tr>
                         <td><label>Remarks</label></td>
                        <td colspan="7"><input type="text" class="form-control input-inline input-large" placeholder="Remarks" name="remarks" value="<?php echo $remarks; ?>" ></td>
                        </tr>
                      <tr><td colspan="8">
                      <table width="100%" style="margin-top:5px;" id="add_data">
                      <?php
                       $y=0;
                       $row_remove_id=0;
                       $expload=0;
                       $fetch_multipal_room_tr=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_checkin_out_room_for_edit_tr',$company_id), array());?>                       
					   <?php
                       foreach($fetch_multipal_room_tr as $room_edit)
                       { $y++;
                       $row_remove_id++;
                      // pr($room_edit);
                         $room_type_id=$room_edit['fo_room_booking']['master_room_type_id'];
                        $special_rate =$room_edit['fo_room_booking']['special_rate'];
                         $edit_idd=$room_edit['fo_room_booking']['id'];
                      	?>
                        <input type="hidden" name="hidd_edit_id[]" id="delete<?php echo $row_remove_id; ?>" value="<?php echo $edit_idd; ?>" />
                        <tr id="<?php echo $row_remove_id; ?>">
                        <td><label>Room Type</label></td>
                    <td class="form-group"><label><div style="float:left; width:60%"><select class=" form-control input-small" 
                    name="master_room_type_id[]" onchange="room_tariff();"  id="rtid<?php echo $row_remove_id; ?>" placeholder="Room Type">
                    <option value="">--Select--</option>
                    <?php
                    foreach($fetch_master_room_type as $data1)
                    {?>
                    <option value="<?php echo $data1['master_room_type']['id'];?>"
                    <?php if($data1['master_room_type']['id']==$room_type_id){ echo 'selected'; } ?>><?php echo $data1['master_room_type']['room_type'];?></option>
                    <?php
                    }
                    ?>
                    </select></div></label>
                    </td>
                    
                     <td><label>Tarriff Rate</label></td>
                        <td>
                        <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-rupee"></i>
                        </span>
                        <input type="text" class="form-control input-inline" style="width:57%" placeholder="Tarriff Rate" name="special_rate[]" id="special_rate<?php echo $row_remove_id; ?>" value="<?php echo $special_rate;?>"></div></td>
                    <?php if($row_remove_id==1){ ?>
                    <td><label><button type="button" onclick="add_data()" class="btn blue btn-sm" />Add Row </label></td></tr>
                    <?php } 
                    else
                    { $expload++; ?>
                   <td><label><button type="button" onclick="delete_row_data(<?php echo $row_remove_id; ?>)" class="btn red btn-sm">Delete</button></label></td>
<?php } } ?>
                    <input type="hidden" value="<?php echo $row_remove_id; ?>" id="next_id"/> 
            </table></td></tr>
                    <tr>
                    <td colspan="6"><center>
                    <button type="submit" name="edit_fo_room_booking" class="btn green" value="edit_fo_room_booking"><i class="fa fa-check-square"></i> Update</button>
                    <button type="reset" name="" class="btn red " value="edit_fo_room_booking"><i class="fa fa-level-down"></i> Cancel</button>
                    </center></td>
                     </tr>
                    </table></div></form>
                   
   			</div>
  		 </div>  
    </div>
</div>
   
    <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
	
	function delete_row_data(id)
	{ 
	var ar = [];
		var next_id = $("#next_id").val();
		var delete_data = $("#delete"+id).val();
		
		$.ajax({

		url: "ajax_php_file?checkin_data_deleteroww=1&delete="+delete_data,
		type: "POST",
		success: function(data)
		{ //alert(data);
			$("#"+id).remove();
			//$(".page-spinner-bar").addClass(" hide");
		}
		});
	}
	
	
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

