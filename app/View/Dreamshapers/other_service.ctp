<?php
if(empty($active))
{ $active=0;
}
?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title">Checkin Services</div><div class="toast-message"> </div></div></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
               <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add
                    

                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View
                    

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
                    <form method="post" name="add" id="add_other_services">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:100% !important;">
                         <tr>
                       <td><label>Card No.</label></td>
                                <td><select class=" form-control input-small select2me" required style="width:90px;" name="card_no" id="c_no" onchange="roomfunction();" placeholder="Select No...">
                                <option value=""></option>
									<?php
									foreach($fetch_room_checkin_checkout as $data)
                                    {
											?>
											 <option vlue="<?php echo $data['room_checkin_checkout']['id'];?>"><?php echo $data['room_checkin_checkout']['card_no']?></option>
										<?php
									}
                                    ?>
                                </select>
                                    </td><td></td><td></td><td></td><td></td></tr>
                                    <tr>
                       <td><label>Room No</label></td>
                        <td class="form-group"><select class=" form-control input-small select2me" required name="master_roomno_id" id="master_roomno_id" placeholder="Select No...">
                        <option value=""></option>
                        <?php
                        foreach($fetch_room_checkin_checkouut as $data)
                        {
                        ?>
                        <option value="<?php echo $data['room_checkin_checkout']['master_roomno_id']; ?>" jj=" <?php echo $data['room_checkin_checkout']['guest_name']; ?>" company_id="<?php echo $data['room_checkin_checkout']['company_id'];?>">
                        <?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></option>
                        <?php 
                        }
                        ?>
                        </select>
                        </td>
                        
                        <input type="hidden" name="jj" id="jj" />
                        <td><label>Select Service</label></td>
                                            <td colspan="2">
                                           <select class="form-control select2 select2_sample2 select2me" required style="width:60%;" name="service_name_id" placeholder="Select Service...">
                                            <option value=""></option>
											<?php
                                            foreach($fetch_master_service as $data)
                                            {
                                            	?>
												<option value="<?php echo $data['master_service']['id'];?>">
                                                <?php echo $data['master_service']['service_name'];?>
                                                </option>
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
                                            </tr>
                                            
                                             <tr>
                                             <td><label>Quantity<span style="color:#E02222">* </span></label></td> 
                         <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Enter Qty." onKeyUp="other_service();" name="quantity" id="quantity"></div>                         </td>
                         <td><label>Charge<span style="color:#E02222">* </span></label></td> 
                         <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Enter Charge" onKeyUp="other_service();" name="charge" id="charge"></div></td>
                          <td><label>Total<span style="color:#E02222">* </span></label></td> 
                         <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Amount" name="total" id="total"></div></td>
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
                        
                         
                         
                         
                         
            <tr><td colspan="6" align="center"> <button  type="submit"   class="btn green" name="add_other_service" value="add_other_service"><i class="fa fa-plus"></i> Add</button>
                       <button type="reset" name="" class="btn red " value="add_other_service"><i class="fa fa-level-down"></i> Reset</button></center></td></tr>
  
                        </table>
                     </div>
                    </form>
                </div>
                
                
 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_other_service))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>
  <table class="table table-bordered table-hover" id="sample_1">
	<thead>
    <tr>
    <th width="10%">S.No</th>
    <th>Card No.</th>
    <th>Room No.</th>
    <th>Service</th>
    <th>Quantity</th>
    <th>Charge</th>
    <th>total</th>
    <th width="10%">Edit</th>
    <th width="10%">Delete</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		 foreach($fetch_other_service as $data){ 
		 $i++;
		 $id=$data['other_service']['id'];
         $card_no=$data['other_service']['card_no'];
         $master_roomno_id=$data['other_service']['master_roomno_id'];
		  $quantity=$data['other_service']['quantity'];
		   $charge=$data['other_service']['charge'];
		   $total=$data['other_service']['total'];
		   $service_name_id=$data['other_service']['service_name_id'];
		 ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $card_no;?></td>
            <td><?php echo $master_roomno_id;?></td>
            <td><?php
        echo @$master_servicee_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_service_fetch',$data['other_service']['service_name_id']), array()); ?>
        </td>
            <td><?php echo $quantity;?></td>
            <td><?php echo $charge;?></td>
            <td><?php echo $total; ?></td>
            <td><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" href="#edit<?php echo $id ;?>"><i class="fa fa-edit"></i> Edit </a>
                              <div class="modal fade" id="edit<?php echo $id ;?>" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="submit" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here.!</h4>
										</div>
										<div class="modal-body">
                     <form method="post" name="edit<?php echo $id ;?>">
                   		 <div class="table-responsive">
                     
                    	<table class="table self-table" style=" width:100% !important;" border="0">
                         <input type="hidden" name="editoption_service_name" value="<?php echo $id; ?>" />
                          <tr>
                       <td><label>Card No.</label></td>
                                <td><select class=" form-control input-small" required style="width:90px;" name="edit_card_no" id="c_no" onchange="roomfunction();" placeholder="Select No...">
                                <option value=""></option>
									<?php
									foreach($fetch_room_checkin_checkout as $data2)
                                    {
											?>
											 <option vlue="<?php echo $data2['room_checkin_checkout']['id'];?>"
                                             <?php if ($card_no==$data2['room_checkin_checkout']['card_no']) { echo 'selected' ;}?>>
                                             <?php echo $data2['room_checkin_checkout']['card_no']?></option>
										<?php
									}
                                   
                                    ?>
                                </select>
                                    </td>
                                  
                       <td><label>Room No</label></td>
                        <td class="form-group"><select class=" form-control input-small" required name="edit_master_roomno_id" id="edit_master_roomno_id" placeholder="Select No...">
                        <option value=""></option>
                        <?php
                        foreach($fetch_room_checkin_checkout as $data3)
                        {
                        ?>
                        <option value="<?php echo $data3['room_checkin_checkout']['master_roomno_id']; ?>"
                        <?php if ($master_roomno_id==$data3['room_checkin_checkout']['master_roomno_id']) { echo 'selected' ;}?>>
                        <?php echo $data3['room_checkin_checkout']['master_roomno_id']; ?></option>
                        <?php 
                        }
                        ?>
                        </select>
                        </td>
                        <td><label>Select Service</label></td>
                                            <td>
                                           <select class="form-control select2 select2_sample2" required style="width:60%;" name="edit_service_name_id" placeholder="Select Service...">
                                            <?php
                                            foreach($fetch_master_service as $data)
                                            {
                                            	?>
												<option value="<?php echo $data['master_service']['id'];?>" <?php if ($service_name_id == $data['master_service']['id'] ) { echo 'selected' ;}?> >
                                                <?php echo $data['master_service']['service_name'];?>
                                                </option>
												<?php
                                            }
                                            ?>
											</select>
										</td>
                                            </tr>
                                            
                                             <tr>
                                             <td><label>Quantity<span style="color:#E02222">* </span></label></td> 
                         <td><div class="form-group"><input type="text" class="form-control input-inline input-small" onKeyUp="other_service();" value="<?php echo $quantity; ?>" placeholder="Enter Qty." name="edit_quantity" id="quantity"></div>                         </td>
                         <td><label>Charge<span style="color:#E02222">* </span></label></td> 
                         <td><div class="form-group"><input type="text" class="form-control input-inline input-small" onKeyUp="other_service();" value="<?php echo $charge; ?>" placeholder="Enter Charge" name="edit_charge" id="charge"></div> </td>

                  <td><label>Total<span style="color:#E02222">* </span></label></td> 
                         <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Amount" name="edit_total"  value="<?php echo $total;?>" id="total"></div></td>
                         </tr>
                         
  				
                     <tr><td colspan="3"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_other_service" value="edit_other_service" class="btn blue">Update</button>
										</div></center></td></tr>
                       
                        </table>

										</div></form></div>
										
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
                                </td>
        <td>
<a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id; ?>"><i class="fa fa-trash-o"></i> Delete</a>
<div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
</div>
<div class="modal-footer">
<form method="post" name="delete<?php echo $id; ?>">
<input type="hidden" name="deleteoption_service_name" value="<?php echo $id; ?>" />
<button type="button" class="btn default" data-dismiss="modal">Cancel</button>
<button type="submit" name="delete_menu_item" value="delete_menu_item" class="btn blue">Delete</button>
</form>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</td>
        </tr>
        
        <?php } ?>
    </tbody></table></div>
    
    <?php }?>
    </div></div></div></div>
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
	  var myVar=setInterval(function(){myTimer()},4000);
	   function myTimer() 
	   { $("#toast-container").hide();
	   $("#toast-container").hide();
	   
	   
	    }  
	<?php } ?>
});

function other_service()
{
	var quantity=eval($('#quantity').val());
	var charge=eval($('#charge').val());
	var total=eval($('#total').val());
    $('#total').val(quantity*charge);
}

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



$(document).ready(function()
		{
      		$('#master_roomno_id').live('change',function(e){
			 			 $("#jj").val($('option:selected', this).attr("jj"));
						 $("#company_id").val($('option:selected', this).attr("company_id"));
			});
		});
			



        </script>