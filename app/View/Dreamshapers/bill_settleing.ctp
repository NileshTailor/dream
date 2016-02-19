
<div class="table-responsive" style=" float:left; width:90%">
                        <div class="portlet box " style="border:#FFF !important; background-color:#E26A6A; color:#FFF">
                            <div class="portlet-title box white">
                                <div class="caption">
                                    <i class="fa fa-book" style="color:#FFF"></i><strong>Bill Settleing</strong>
                                </div>
                                </div></div></div>
                                <div style="float:right; background:#FFF"><table>
                                    	<tbody>
                                            <tr><td class="legendColorBox">
                                            <div style="width:4px;height:0;border:5px solid #FF0;overflow:hidden"></div></td>
                                            <td class="legendLabel">&nbsp; Club Member</td></tr>
                                    </tbody></table></div>
<?php
 if(!empty($outlet))
 {
 	$outlet_array=explode(',', $outlet);
     
 } 
?>
<?php 
foreach($fatch_billing_kot_query_string as $data){ 
		
        $id_qry=$data['pos_kot']['id'];     
        $Compny_name=$data['pos_kot']['master_outlets_id'];
        $master_stewards_id=$data['pos_kot']['master_stewards_id'] ;
        $table_no=$data['pos_kot']['master_tables_id'];
		$master_tables_id=$data['pos_kot']['master_tables_id'];
        $guest_name=$room_type=$data['pos_kot']['guest_name'];
        $master_roomnos_id=$data['pos_kot']['master_roomnos_id'];
        $maste= $data['pos_kot']['guest_name'] ;
        $master_stet= $data['pos_kot']['covers']; 
        
        $itemfor_ech=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_item_for_bill_query',$id_qry), array());
        }
?>
<div class="row">
	<div class="col-md-12">
    <div style="width:85%; margin-left:50px">
        <form method="post" name="add" id="add_bill_settlement">
            <div class="table-responsive">
                <table class="table self-table" style=" width:100% !important;">
                
                
                
                <tr style="text-align: center; background-color:#CFEFF1">
                <td>
                    <div class="form-group">
                        <div class="radio-list">
                            
                            <td><label>Steward </label></td>
                        
                       <div class="form-group"> <td><select class="form-control input-small select2me" onchange="steward_change();"  name="steward" id="steward_id" placeholder="Select...">
                            <option value=""></option>
                            <?php
                            foreach($fatch_master_steward as $data1)
                            {
                            $id=$data1['master_steward']['id'];
                                ?>
                            <option  value="<?php echo $data1['master_steward']['id'];?>" 
                            <?php if(!empty($fatch_billing_kot_query_string)){ if($id==$master_stewards_id){?>selected="selected" <?php } 
                            } ?> ><?php echo $data1['master_steward']['steward_name'];?></option>
                                                <?php
                            }
                            ?>
                            </select></td></div>
                        
                </td>
                <td ><label>Outlet Name</label>
                    </td> <td>
                     <div class="form-group" >
                    <select class="form-control input-inline input-small select2me" name="outlet_name" onchange="outlet_name_Tname()"  id="outlet_name" placeholder="Select..">
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
                            </select></div></td>
                            <td><label>Table No</label></td>
                    <td > <div class="form-group" >
                     <select class="form-control input-inline input-small select2me" name="table_no" id="table_no" onchange="table_change();" placeholder="Select..">
                           <option value=""></option>
                            </select>
                            </div>
                    </td>
                <!--<td>
                <div class="radio-list" style="float:left; width:49%" >
                            <label class="radio-inline">
                            <input type="radio" name="bills" checked="checked" value="selected_steward"> Select Table No. </label>
                        </div>
                     <div class="form-group" >
                     <select class="form-control input-inline input-small select2me" name="table_no" id="table_no" onchange="table_change();" placeholder="Select..">
                           <option value=""></option>
                           <?php
                        foreach($fetch_master_table as $data)
                        {
                        ?>
                          <option value="<?php echo $data['master_table']['id']; ?>"><?php echo $data['master_table']['table_no']; ?></option>
                            <?php }?> </select>
                            </div>
                    </td>-->
                <!--<td><label>Room No</label></td>
                        <td class="form-group"><select class=" form-control input-xsmall" name="room_no" id="room_no_idd" onchange="room_change();">
                        <option value="">Select No.</option>z
                        <?php
                        foreach($fetch_room_checkin_checkout as $data)
                        {
                        ?>
                        <option value="<?php echo $data['room_checkin_checkout']['id']; ?>" card_no="<?php echo $data['room_checkin_checkout']['card_no'];?>"
                        roomno_id="<?php echo $data['room_checkin_checkout']['master_roomno_id'];?>" guest_name="<?php echo $data['room_checkin_checkout']['guest_name'];?>">
                        <?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></option>
                        <?php 
                        }
                        ?>
                        </select>
                        </td>-->
                        
                            <td style="display:none;"><div class="form-group"><div class="input-group">
                            <input type="text" class="form-control input-inline input-small" readonly="readonly" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="date"  value="<?php echo date("d-m-Y"); ?>">
                            </div></div></td>
                </tr>
                </table>
            </div>
            
            <div id="kotsss_view">
               <table class="table table-striped table-hover" >
               <thead>
                <tr>
                <th>Check</th><th>Outlet</th><th>Bill No.</th><th>Guest Name</th><th>Table No. / Room No.</th><th>Steward</th>
                </tr>
                </thead>
                <?php if(!empty($fatch_billing_kot_query_string)){?>
                <tbody>
                <tr>
                    <th>
                    <div class="form-group"><div class="radio-list">
                    <label><input type="radio" name="bill" id="optionsRadios1" onclick="Item_name_replace(<?php echo $id_qry;?>)" value="<?php echo $id_qry;?>"></label>
                    </div></div></th>
                    <td><?php  echo $Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$Compny_name), array());?></td>
                    <td><?php echo $id_qry;?></td>
                    <td><?php echo $guest_name;?></td>
                    <td><?php echo $master_roomnos_id;?>
                     
 
                    
                    </td>
                    <td><?php  echo $steward_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_steward_name_fetch',$master_stewards_id), array());?></td>
                    </tr>
               
                </tbody>
               <?php } ?>
                </table>
                </div>
            <div id="replace_data">
            	
                <table class="table table-borderd" style=" width:100% !important;">
                <tr style="text-align: center;">
                <td>
                    Table No.
                </td>
                <td>
               <div class="form-group"> <input type="text" class="form-control input-inline input-small" value="<?php if(!empty($fatch_billing_kot_query_string)){ echo $master_roomnos_id; }?>" name="table_no" /></div>
                </td>
                <td>
                    Guest Name
                </td>
                <td>
                <div class="form-group"><input type="text" class="form-control input-inline input-small"  value="<?php if(!empty($fatch_billing_kot_query_string)){ echo $guest_name; } ?>"  name="guest_name" /></div>
                </td>
                <td>
                    Bill No.
                </td>
                <td>
               <div class="form-group"> <input type="text" class="form-control input-inline input-small"  value="<?php if(!empty($fatch_billing_kot_query_string)){ echo $id_qry; } ?>"  name="bill_no" /></div>
                </td>
                </tr>
                
                </table>
               
				<table class="table table-striped table-hover">
               	<thead>
                <tr>
                <th>Check</th><th>Item Name</th><th>Quantity</th><th>Rate</th><th>Gross Amount</th><th>Tax</th><th>Amount</th>
                </tr>
                </thead>
                <?php if(!empty($fatch_billing_kot_query_string)){ ?>
                <tbody>
                <?php 
                $total_amt='';
                $total_gross='';
                $total_tax=''; 
                foreach($itemfor_ech as $ftc_data)
                {
                	foreach($ftc_data as $item_two){?>
                <tr>
                    <td><div class="form-group"><div class="checkbox-list"><label><input  type="checkbox"/></label></div></div></td>
                    <td><?php  echo ucwords($item_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_item_fetch',$item_two['master_items_id']), array()))?></td>
                    <td><?php echo $item_two['quantity'];?></td>
                    <td><?php echo $item_two['rate'];?></td>
                    <td><?php echo $item_two['gross'];?></td>	
                    <td><?php echo $item_two['taxes'];?></td>
                    <td><?php echo $item_two['amount'];?></td>
                    </tr>
					<?php
					$total_amt+=$item_two['amount'];
					$total_gross+=$item_two['gross'];
					$total_tax+=$item_two['taxes'];
               } }
                ?>
                </tbody>
                <?php } ?>
                </table>
                
                <table class="table" style=" width:100% !important;">
                <tr style="text-align: center;">
               <td>
                    Gross
                </td>
                <td>
               <div class="form-group"> <input type="text" class="form-control input-inline input-xsmall" id="gross_id" readonly="readonly"  value="<?php if(!empty($fatch_billing_kot_query_string)){ echo $total_gross; } ?>" name="gross" /></div>
                </td>
                 
                <td>
                    Taxes
                </td>
                <td>
               <div class="form-group"> <input type="text" class="form-control input-inline input-xsmall" readonly="readonly"  value="<?php if(!empty($fatch_billing_kot_query_string)){ echo $total_tax; } ?>" name="taxes" /></div>
                </td>
                <td>
                    Amount
                </td>
                <td>
                <input type="text" class="form-control input-inline input-xsmall"  name="amount" id="amount_id" />
                </td>
                <td>
                    Service Charge
                </td>
                <td>
               <div class="form-group"> <input type="text" class="form-control input-inline input-xsmall" name="service_charge" id="service_charge" onkeypress="add_discount();"/></div>
                </td>
                 <td>
                    Tips
                </td>
                <td>
                <div class="form-group"> <input type="text" class="form-control input-inline input-xsmall" name="tips" id="tips" onkeypress="add_discount();"/></div>
                </td>
                </tr>
                <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td>
                     <td align="center">
                    Discount
                </td>
                <td align="center">
                  <div class="form-group" ><input type="text" class="form-control input-inline input-xsmall"  id="discount_id" name="discount" onkeyup="add_discount();" /></div>
                </td>
                <td align="center">
                   Net Amount
                </td>
                <td align="center">
                <input type="text" class="form-control input-inline input-xsmall" name="amountt" id="amount_idd" />
                </td>
                    
                     
                     </tr></thead></table></fieldset></td></tr>
                
                </table>
                </div>
               
            
                
                     <input type="hidden" name="dueamt" id="dueamt" class="form-control input-inline input-xsmall" onkeyup="add_discount();"  />
                     <input type="hidden" name="amtt" id="amtt" />
                     
                     
                     <table width="100%"><tr style="background-color:#FFC"><td align="center"><button type="submit" name="print_submit" class="btn green" value="print_submit"><i class="fa fa-plus"></i> Print Bill</button></td></tr></table><br/>
                     
                     
                     
                <fieldset>
                <legend>Payment Mode</legend>
                
                <table width="100%" border="0">
                     <tr><td width="25%"><label> Select Club Member Card No.</label></td>
                <td><select class="form-control select2 select2_sample2 input-small" placeholder="Select..."  name="registration_id" id="registration_id" onchange="balance_amt();" required>
                <option value="">--Select--</option>
                <?php
                foreach($fetch_registration as $data)
                {  
                ?>
                <option value="<?php echo $data['registration']['id']; ?>">
                <?php echo $data['registration']['card_id_no']; ?></option>
                <?php
                }
                ?>
                </select></td>
                <td><label>Balance</label></td>
                <td><input type="text" name="balance_amount" class="form-control input-inline input-small" id="balance_amount" disabled placeholder="Balance"/></td>
                </tr></table><br />
                
                
                <table class="table" style=" width:100% !important;">
                <thead>
                <tr>
                <td style="width:50%;" align="center">
                                     <div class="form-group" >
                        <div class="radio-list">
                        <div id="brm_id">
                           &nbsp;&nbsp; <label class="radio-inline">
                            <input type="radio" name="payment_mode" checked="checked"  value="Cash" id="cre"> Cash </label>
                            <label class="radio-inline">
                            <input type="radio" name="payment_mode" value="Credit Card" id="cre1"> Credit Card </label>
                            <label class="radio-inline">
                                        <input type="radio" name="payment_mode" value="NEFT" id="cre2">NEFT</label>
                                        <label class="radio-inline">
                                        <input type="radio" name="payment_mode" value="Cheque" id="cre3">Cheque</label>
                             </div>           
                                       <!-- <div style="display:none" id="include_advance"><label class="radio-inline">
                                        <input type="radio" name="payment_mode" value="Advance" checked="checked">Include in Advance</label></div>-->
                        </div>
                    </div>
                     </td>
                     <td align="right">Amount</td>
                     <td><input type="text" class="form-control input-inline input-small" name="amount" id="amounttt" onkeyup="add_discount();" /></td>
                       <td><input type="text" class="form-control input-inline input-small" placeholder="Narration" name="narration"/></td>
                     </tr>
                    
                     <tr id="cheque"  style="display:none">
                     <td colspan="6">
               <table class="table" style=" width:100% !important;">
             <thead>
                <tr>
                <td>
                Cheque No.
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" name="cheque_no" />
                </td>
                <td>
                Cheque Date
                </td>
                <td class="form-group"><div class="input-group"><label><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="cheque_date" data-date="12-08-2015" value="<?php echo  date("d-m-Y"); ?>"></label></div></td>
                 <td>
                Bank Name
                </td>
                <td>
                 <input type="text" class="form-control input-inline input-medium" name="bank_name" />
                </td>
                </tr>
                </thead>
                </table></td></tr>
                <!----------------------------------------------------->
                <tr id="neft"  style="display:none">
                     <td colspan="6">
               <table class="table" style=" width:100% !important;">
             <thead>
                <tr>
                <td>
                NEFT No.
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" name="neft_no" />
                </td>
                </tr>
                </thead>
                </table></td></tr>
                
                <!--------------------------------------------------------------------->
                <tr id="credit"  style="display:none">
                     <td colspan="6">
               <table class="table" style=" width:100% !important;">
             <thead>
                <tr>
                <td>
                Credit Card Name
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" name="credit_card_name" />
                </td>
                
                <td>
                Credit Card No.
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" name="credit_card_no" />
                </td>
                
                </tr>
                </thead>
                </table></td></tr></thead></table></fieldset>
                <br/>
                <div style="background-color:#FFC">
                <center>
                <button type="submit" name="submit" class="btn green" value="add_room_checkin_checkout"><i class="fa fa-plus"></i> Bill Settle</button>
                &nbsp;<button type="reset" name="" class="btn red " value="add_room_checkin_checkout"><i class="fa fa-level-down"></i> Reset</button>
                </center></div>
        </form></div>
    </div>
</div>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script>
	function steward_change()
	{
		$(".page-spinner-bar").removeClass("hide"); //show loading
		var stew_id=$("#steward_id").val();
		$.ajax({
			url: "ajax_php_file?Bill_settleing_kot_view=1&q="+stew_id,
			type: "POST",         
			success: function(data)
			{
				//alert(data);
				$(".page-spinner-bar").addClass(" hide");	
				$("#kotsss_view").html(data);
			}
			});
	}
	function table_change()
	{
		$(".page-spinner-bar").removeClass("hide"); //show loading
		var table_id=$("#table_no").val();
		$.ajax({
			url: "ajax_php_file?Bill_settleing_kot_view_table=1&q="+table_id,
			type: "POST",         
			success: function(data)
			{
				//alert(data);
				$(".page-spinner-bar").addClass(" hide");	
				$("#kotsss_view").html(data);
			}
			});
	}
	function room_change()
	{
		$(".page-spinner-bar").removeClass("hide"); //show loading
		var room_no_idd=$("#room_no_idd").val();
		$.ajax({
			url: "ajax_php_file?Bill_settleing_kot_view1=1&q="+room_no_idd,
			type: "POST",         
			success: function(data)
			{
				//alert(data);
				$(".page-spinner-bar").addClass(" hide");	
				$("#kotsss_view").html(data);
				}
			});
	}
	function Item_name_replace(id)
	{		
			$(".page-spinner-bar").removeClass("hide"); //show loading
			$.ajax({
			url: "ajax_php_file?Bill_settleing_replace_form=1&q="+id,
			type: "POST",         
			success: function(data)
			{
				$(".page-spinner-bar").addClass(" hide");
				$("#replace_data").html(data); 
				/*if($("#amount_id").val().length>0)
				{
					var amtt=$("#amount_id").val();
				}
				else
				{
					var amtt=0;
				}*/
				
				//$("#total_gross_amt").val(amtt);
			}
			
			});
	}
	//////////////
	function outlet_name_Tname()
		{
			//alert();
			var outlet_id=$("select[id=outlet_name]").val();
			$.ajax({ 
			url: "ajax_php_file?outlet_table_fetch=1&q="+outlet_id,
			type: "POST", 
			success: function(data)
			{ 
			//alert(data);
				$("#table_no").html(data);
				
			}
			});out_change();
		}
	//////////////
	function out_change()
	{
		$(".page-spinner-bar").removeClass("hide"); //show loading
		var outlet_name=$("#outlet_name").val();
		$.ajax({
			url: "ajax_php_file?Bill_settleing_kot_view_outlet=1&q="+outlet_name,
			type: "POST",         
			success: function(data)
			{
				//alert(data);
				$(".page-spinner-bar").addClass(" hide");	
				$("#kotsss_view").html(data);
			}
			});
	}
	////////////////////////
	function balance_amt()
	{
	var id=$("select[id=registration_id]").val();
			//alert(id);
              $.ajax({ 
                url: "ajax_php_file?view_card_balance_amount=1&q="+id,
                type: "POST", 
				 success: function(data)
					{ 
						//alert(data); 
						$("#balance_amount").val(data); 
					}
                });
		
	}
	//////////////////////////////////
	function add_discount()
	{
		var amount_id=eval($("#amount_id").val());
         if($('#amount_id').val().length ==''){ 
							amount_id = '0';
		}		
		
		var service_charge=eval($("#service_charge").val());
		if($('#service_charge').val().length ==''){ 
							service_charge = '0';
		}
				var tips=eval($("#tips").val());
		if($('#tips').val().length ==''){ 
							tips = '0';
		}
		var dis=eval($("#discount_id").val());
		if($('#discount_id').val().length ==''){ 
							dis = '0';
		}
		
		var after_discount=Math.round((amount_id + service_charge + tips) - dis);
		$("#amount_idd").val(after_discount);
		$("#amtt").val(after_discount);
		
		var amount_idd=eval($("#amount_idd").val());
         if($('#amount_idd').val().length ==''){ 
							amount_idd = '0';
		}	
		var dueamt=eval($("#dueamt").val());
		if($('#dueamt').val().length ==''){ 
							dueamt = '0';
		}
		var amt=eval($("#amounttt").val());
		if($('#amounttt').val().length ==''){ 
							amt = '0';
		}
		var due=parseInt(amount_idd) - parseInt(amt);
		$("#dueamt").val(due);
	}
	
	
	
	$(document).ready(function(){
	$("#cre").click(function(){
		$('#credit').hide();
		$('#neft').hide();
		$('#cheque').hide();
		
    });
	$("#cre1").click(function(){
		$('#credit').show();
		$('#neft').hide();
		$('#cheque').hide();
    });
	$("#cre2").click(function(){
		$('#credit').hide();
		$('#neft').show();
		$('#cheque').hide();
    });
	$("#cre3").click(function(){
		$('#credit').hide();
		$('#neft').hide();
		$('#cheque').show();
    });
	});
	
	$(document).ready(function(){
	$("#brm").click(function(){
		$('#include_advance').show();
		$('#brm_id').hide();
		$('#credit').hide();
		$('#neft').hide();
		$('#cheque').hide();
		
    });
	$("#fp").click(function(){
		$('#include_advance').hide();
		$('#brm_id').show();
		$('#credit').hide();
		$('#neft').hide();
		$('#cheque').hide();
		
    });
	});
	
	
	
	
	
	</script>