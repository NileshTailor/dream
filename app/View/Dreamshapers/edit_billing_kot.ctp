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
    $i=0;
 foreach($fatch_billing_kot_data as $data){ 
 $i++;
 $id=$data['pos_kot'] ['id'];
 $master_outlets_id=$data['pos_kot'] ['master_outlets_id'];
 $session=$data['pos_kot'] ['session'];
 $master_stewards_id=$data['pos_kot'] ['master_stewards_id'];
  $master_tables_id=$data['pos_kot'] ['master_tables_id'];
  $covers=$data['pos_kot'] ['covers'];
  $remarks=$data['pos_kot'] ['remarks'];
  $guest_name=$data['pos_kot'] ['guest_name'];
   $session=$data['pos_kot'] ['session'];
   $card_no=$data['pos_kot'] ['card_no'];
   $master_roomnos_id=$data['pos_kot'] ['master_roomnos_id'];
 }
	?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title"> bill </div><div class="toast-message"> </div></div></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <div class="tab-content">

                    
    <form method="post" enctype="multipart/form-data" id="add_billing_kot" >
                    
                    <table id="myTable" style="margin-top:1%; width:100% !important; height:120px !important" border="0">
                    
                    <tbody>
                    <tr>
                    <input type="hidden" name="bill_idd" value="<?php echo $id; ?>">
                    <td><label>Outlet Name</label>
                    </td> <td>
                     <div class="form-group" >
                    <select class="form-control input-inline input-small select2me"   name="outlet_name" onchange="outlet_name_Tname()"  id="outlet_name" placeholder="Select..">
                            <option value=""></option>
                            <?php
                            foreach($fetch_master_outlet as $data)
                            {	$out=$data['master_outlet']['id'];
                                if(in_array($out, $outlet_array))
                                {
                                    ?>
                                <option <?php if($data['master_outlet']['id']==$master_outlets_id){ echo 'selected'; } ?> value="<?php echo $data['master_outlet']['id'];?>"><?php echo $data['master_outlet']['outlet_name'];?></option>
                                    <?php
                                }
                            }
                            ?>
                            </select></div></td>

                        <td><label>Room No</label></td>
                        <td><input name="room_no" id="room_no"  placeholder="Card No"  class="form-control input-inline input-small" type="text" value="<?php echo $master_roomnos_id;?>"></td>

                       <!-- <td><select class=" form-control input-small" name="room_no" id="room_no_idd">
                        <option value="">Select No.</option>
                        <?php
                        foreach($fetch_room_checkin_checkout as $data)
                        {
                        ?>
                        <option <?php if($data['room_checkin_checkout']['master_roomno_id']==$master_roomnos_id){ echo 'selected'; } ?> value="<?php echo $data['room_checkin_checkout']['master_roomno_id']; ?>>
                        <?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></option>
                        <?php 
                        }
                        ?>
                        </select>
                        </td>-->
                        
                        
                                                <input type="hidden" name="roomno_id" id="roomno_id" >

                        
                        <td><label>Card No.</label></td>
                        <td>
                        <div class="form-group" >
                        <input name="card_no" id="card_no"  placeholder="Card No"  class="form-control input-inline input-small" type="text" value="<?php echo $card_no;?>">
                        </div>
                        </td><td></td><td></td> 
                     
                     <tr>
                     <td><label>Session</label></td>
                        <td>
                         <select class="form-control input-small select2me"  id="session" name="session" placeholder="Select...">
                                <option value=""></option>
                                <?php
                                foreach($fetch_plan_item_category as $data)
                                {
                                ?>
                                <option <?php if($data['plan_item_category']['id']==$session){ echo 'selected'; } ?> value="<?php echo $data['plan_item_category']['id'];?>">
                                <?php echo $data['plan_item_category']['item_category'];?></option>
                                <?php
                                }
                                ?>
                     </select></td>
                    <td><label>Table No</label></td>
                    <td > <div class="form-group" >
                     <select class="form-control input-inline input-small select2me"  name="table_no" id="table_no" placeholder="Select..">
                           <option value="<?php echo $master_tables_id;?>" ></option>
                            </select>
                            </div>
                    </td>
                    <!--<td><label>Room Type</label></td>
                    <td>
                    <select class="form-control input-inline input-small" name="room_type_id" id="room_type_id"  >
                            <option value="">--- Select ---</option>
                            <?php
                            foreach($fatch_master_room_type as $data)
                            {
                                ?>
                                <option value="<?php echo $data['master_room_type']['id'];?>"><?php echo $data['master_room_type']['room_type'];?></option>
                                <?php
                            }
                            ?>
                            </select>
                    </div>
                    </td>-->
                    <td colspan="2">
                    <div class="radio-list">
                 
                            <label class="radio-inline">
                            Club Member
                                <input type="radio" name="club_member_id" value="1"  id="club_member_id">Yes</label>
                                <label class="radio-inline">							
                                <input type="radio" name="club_member_id" value="0"  id="club_member_id1" checked="checked">No</label>
                                <label class="radio-inline">
                                </div>
                    </td>
                     <td colspan="2"><div id="cmid" style="display:none">
                   
                   <label> <select class="form-control input-small select2me" name="club_member_id" id="id_club_member" placeholder="Select...">
                    <option value=""></option>
                    
                    <?php
                    foreach($fetch_registration as $data)
                    {
                        ?>
                        <option  guest_name="<?php echo $data['registration']['name'];?>"  value=
                        "<?php echo $data['registration']['id'];?>">
                        <?php echo $data['registration']['id'];?> (<?php echo $data['registration']['name'];?>)</option>
                        <?php
                    }
                    ?>
                    </select></label></div> 
                    </td>
                    
                   <!-- <td ><label>Room No </label></td>
                    <td width="30%"> <div class="form-group" >
                     <select class="form-control input-inline input-small"  name="room_no" id="room_no_idd">
                            <option value="">--- Select ---</option>
                            <?php
                            foreach($fatch_master_roomno as $rooms)
                            {
                            	$total_room=$rooms['master_roomno']['room_no'];
                                $romm_no=explode("," ,$total_room);
                                    foreach($romm_no as $romm_view)
                                    {
                                    ?>
                             			<option value="<?php echo $romm_view;?>"><?php echo $romm_view;?></option>
                                    <?php
                                    }
                            }
                            ?>
                            </select></div>
                    </td>--->
                     </tr>
                   
                    <td ><label>Guest Name </label></td>
                    <td>
                     <div class="form-group" >
                    <input name="guest_name" id="guest_name"  placeholder="Guest Name" value="<?php echo $guest_name;?>"   class="form-control input-inline input-small" type="text">
                    </div>
                    </td>
                     <td><label>Covers</label></td>
                    <td>
                    <div class="form-group" >
                    <input name="covers" placeholder="Covers"  class="form-control input-inline input-small" value="<?php echo $covers;?>" type="text">
                    </div>
                    </td>
                    
                    

                    <td ><label>Steward</label></td>
                    <td>
                     <div class="form-group" >
                    <select class="form-control input-inline input-small select2me" name="steward" id="steward" placeholder="Select..">
                            <option value=""></option>
                            <?php
                            foreach($fatch_master_steward as $data)
                            {
                                ?>
                                <option <?php if($data['master_steward']['id']==$master_stewards_id){ echo 'selected'; } ?> value="<?php echo $data['master_steward']['id'];?>"><?php echo $data['master_steward']['steward_name'];?></option>
                                <?php
                            }
                            ?>
                            </select>
                   </div>
                    </td>
                    
                       
                    <td><label>Remarks</label></td>
                     <td colspan="1">
                        <input type="text" name="remarks" class="form-control input-small" value="<?php echo $remarks;?>" />
                     </td>
                    
                   
                    </tr>
                    </tbody>
                    </table>
                   
                    <table width="100%" style="margin-top:5px;">
                    <tbody>
                    <tr id="1">
                    <td><label>Item </label> </td>
                    <td><select class="form-control input-small select2me"  name="item" id="id_attr_ftc" onchange="check_tax();" data-placeholder="Select..." placeholder="Select..">
							<option value=""></option>
											 <?php
                            foreach($fatch_master_items as $data)
                            {
                                ?>
                         <option quantity="1" rate="<?php echo $data['master_item']['billing_rate'];?>" amount="<?php echo $data['master_item']['item_cost'];?>"  value="<?php echo $data['master_item']['id'];?>"><?php echo $data['master_item']['item_name'];?></option>
                                <?php
                            }
                            ?>
						</select>
                    </td>
                    <td><a class="btn green btn-xs btn-primary" data-toggle="modal" href="#basic" ><i class="fa fa-plus"></i> SP</a>
                    </td>
                     <td><label>Quantity</label></td>
                    <td>  
                        <input name="quantity" class="form-control input-inline input-xsmall" onkeyup="add_qty();"  placeholder="Quantity" type="text" id="quantity">
                    </td>
                     <td><label>Rate</label></td>
                     <td>
                        <input name="rate" class="form-control input-inline input-xsmall" readonly  placeholder="Rate" type="text" id="rate">
                    </td>
                    <td><label>Gross</label></td>
                    <td>
                        <input name="gross"  class="form-control input-inline input-xsmall" readonly id="gross" placeholder="Gross" type="text">
                        </td>
                    <td><label>Taxes</label></td>
                    <td>
                        <input name="taxes" class="form-control input-inline input-xsmall" readonly placeholder="Taxes" id="taxx"   type="text">
                        </td>
                        <td ><label>Amount</label></td>
                    <td>
                        <input name="amount" class="form-control input-inline input-xsmall" readonly  placeholder="Amount" type="text" id="amount">
                        </td>
                        <td><button type="button" class="btn btn-xs btn-primary" onclick="billing_kot_add_form()">Add </button></td>
                    </tr>
                          
                            </tbody>
                            </table>
                            <div style="overflow-y:scroll;   max-height:150px"><!--// height:150px !important"-->
                            <table width="100%" class="table table-bordered table-hover" style="margin-top:5px" id="View_table">
                            <thead>
                            <tr>
                           		<th width="18%">Item</th>
                         
                                <th width="10%">Quantity </th>
                                <th width="10%"> Rate  </th>
                                <th width="10%">Gross  </th>
                                <th width="10%">Taxes</th>
                                <th width="15%">Amount </th>
                                <th width="10%">Delete</th>
                            </tr>
                            </thead>
                            <tr></tr>
                           	</tbody>
                    </table>
                    </div>
                     <button type="submit" name="edit_form_submit" style=" margin-left:35%; margin-top:1%" class="btn blue">Submit</button> &nbsp; 
                     <button class="btn green" name="bill_settle" style="margin-top:1%" type="submit">Bill Settle</button>
                    </form>
                    
                    </div>
                </div>
             
                
                    
                                              
                    </div>
                    </div>
 			</div>  
    	</div>
    </div>
</div>
    
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
                    <td> <select class="form-control input-medium" required="required" onchange="item_view();" id="category" name="master_itemcategory_id">
                    <option value="">--- Select ---</option>
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
                    <td> <select class="form-control input-medium" id="item" name="master_item_type_id">
                            <option value="">--- Select ---</option>
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
	<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script>
	function check_tax()
		{	var ar = [];
			var item_id=$("select[id=id_attr_ftc]").val();
			ar.push(item_id);
			var myJsonString = JSON.stringify(ar);
                $.ajax({ 
                url: "ajax_php_file?view_tax_item_type_kot=1&q="+myJsonString,
                type: "POST", 
				 success: function(data)
                {
					$("#taxx").val(data); 
					add_tax();
                }
                });	
				
		}
	function add_qty()
	{
	var quantity=eval($("input[name=quantity]").val());
	var rate=eval($("input[name=rate]").val());
	var after_qty=quantity * rate;
	$("#gross").val(after_qty);
	
		var ar = [];
		var item_id=$("select[id=id_attr_ftc]").val();
		ar.push(item_id,after_qty);
		var myJsonString = JSON.stringify(ar);
				$.ajax({ 
				url: "ajax_php_file?view_tax_item_type_kot=1&q="+myJsonString,
				type: "POST", 
				 success: function(data)
				{ 
					$("#taxx").val(data); 
					add_tax();
				}
				});
	
	}
		function add_tax()
		{
		var gross=eval($("input[name=gross]").val());
		var taxes=eval($("input[name=taxes]").val());
		var tot_amt= eval(gross + taxes);
		tot_amt = Math.round(tot_amt);
		$("#amount").val(tot_amt);
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
				url: "ajax_php_file?billing_kot_item_add=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{
					if(data=='error')
					{
						$(".page-spinner-bar").addClass(" hide");
					}else
					{
					$("#id_attr_ftc").html(data);  
					$(".page-spinner-bar").addClass(" hide");
					}
					
				}
				});
		}
		
		function delete_tr_id(id)
            { 
				$(".page-spinner-bar").removeClass("hide"); //show loading
					$.ajax({
						url: "ajax_php_file?delete_billingKOT_data=1&q="+id,
						type: "POST", 
						success: function(data)   // A function to be called if request succeeds
						{
							$("#for_delete" + id).remove();
							
							$(".toast").addClass("toast-error");
							$(".toast-message").html("Delete successful...");
							 $("#toast-container").show();
							  var myVar=setInterval(function(){myTimer()},5000);
							   function myTimer() 
							   { $("#toast-container").hide(); } 
							
							$(".page-spinner-bar").addClass(" hide"); //hide loading
							
							
						}
				   
					});
			}
		function kot_billing_deleterow(id)
		{
			$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				$.ajax({
				url: "ajax_php_file?kot_billing_delete_row=1&q="+id,
				type: "POST",         
				success: function(data)
				{
					
					$("#"+id).remove();
					$(".page-spinner-bar").addClass(" hide");
				}
				})
		}
		
		function billing_kot_add_form()
			{
				var item_name=$("select[name=item]").val();
				if(item_name!='')
				{
					$(".page-spinner-bar").removeClass("hide"); //show loading
					var ar = [];
					
					//var item_name=$("select[name=item]").val();
					//alert(item_name);
					var quantity=$("input[name=quantity]").val();
					var rate=$("input[name=rate]").val();
					var gross=$("input[name=gross]").val();
					var taxes=$("input[name=taxes]").val();
					var amount=$("input[name=amount]").val();
					ar.push(item_name,quantity,rate,gross,taxes,amount);
					
					var myJsonString = JSON.stringify(ar);
					
					$.ajax({
					url: "ajax_php_file?billing_kot_add_form=1&q="+myJsonString,
					type: "POST",         
					success: function(data)
					{
						
						//$('#billing_kot_add_form')[0].reset();
						$("#View_table > tbody > tr:last").after(data);
						$(".page-spinner-bar").addClass(" hide");
						
						$("select[name=item]").val('');
						$("input[name=quantity]").val('');
						$("input[name=rate]").val('');
						$("input[name=gross]").val('');
						$("input[name=taxes]").val('');
						$("input[name=amount]").val('');
					}
				   
					});
				}
				else
				{
					alert("Please select any Item");
				}
			
			}
		
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
			});
		}
		function outlet_name_Tnamee()
		{
			//alert();
			var outlet_id=$("select[id=outlet_name]").val();
			$.ajax({ 
			url: "ajax_php_file?outlet_table_fetchh=1&q="+outlet_id,
			type: "POST", 
			success: function(data)
			{ 
			//alert(data);
				$("#table_no1").html(data);
				
			}
			});
		}
		
    /////////////////////////////////////////////////////////////////////////////////////// 
	        
		$(document).ready(function()
        {
	////
			/*$("#room_no_idd").on('change',(function(e)
            {
                e.preventDefault();
                var ar = [];
                var room_no=$("select[id=room_no_idd]").val();
                ar.push(room_no);
                var myJsonString = JSON.stringify(ar);
				//alert(myJsonString);
                $.ajax({ 
                url: "ajax_php_file?outlet_guest_fetch=1&q="+myJsonString,
                type: "POST", 
				          
                success: function(data)
                { 
				
					$("#guest_name").val(data);  
                }
                });
            }));	*/
			///
	     $(document).ready(function()
		 {
      		$('#room_no_idd').live('change',function(e){
			 			 $("#card_no").val($('option:selected', this).attr("card_no"));
						 $("#roomno_id").val($('option:selected', this).attr("roomno_id"));
						 $("#guest_name").val($('option:selected', this).attr("guest_name"));
			});
		});
			
			$('#id_attr_ftc').live('change',function(e)
			{
			$("#quantity").val($('option:selected', this).attr("quantity"));
            $("#rate").val($('option:selected', this).attr("rate"));
			$("#gross").val($('option:selected', this).attr("rate"));
			});
			
			
		});
		$(document).ready(function()
        {
		$('#id_club_member').live('change',function(e)
			{
			$("#guest_name").val($('option:selected', this).attr("guest_name"));
			});
	});
	
	$(document).ready(function(){
		$("#club_member_id").click(function(){
		$('#cmid').show();
		});
		$("#club_member_id1").click(function(){
		$('#cmid').hide();
		});
	});
		</script>       