<div id="message"></div>
<div ng-spinner-bar="" class="page-spinner-bar hide">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
</div>
<div class="portlet light">
    <div class="portlet-body">
    	 <div class="table-responsive">
            <center>
            <form id="add_outlet_item_mapping">
            <table class="table self-table" style=" width:70% !important;">
            <tr>
            <td><label>Outlet</label></td>
            <td> <select class="form-control input-medium" name="master_outlet_id">
                    <option value="">--- Select ---</option>
                    <?php
                    foreach($fetch_master_outlet as $data)
                    {
                    ?>
                    <option value="<?php echo $data['master_outlet']['id'];?>"><?php echo $data['master_outlet']['outlet_name'];?></option>
                    <?php
                    }
                    ?>
                </select></td>
           
            <td><label>Item Type</label></td>
            <td> <select class="form-control input-medium" name="master_item_type_id">
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
                <td><button type="button" id="next" class="btn btn-primary"> Next <i class="fa fa-arrow-circle-right"></i></button></td>
                </tr>
            </table>
            <table id="myTable" class="table " style=" width:100% !important;">
            <thead>
            <tr>
            <th>Check/Uncheck </th><th>Item Name</th><th>Billing Rate</th><th>Billing Room Rate</th><th>Urgent Rate</th><!--<th>Add/Delete Row</th>-->
            </tr>
            </thead>
            <tbody>
           <!-- <tr>
            <td><select class="form-control input-medium" name="master_item_id_1">
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_master_item as $data)
                                {
                                ?>
                                <option value="<?php echo $data['master_item']['id'];?>"><?php echo $data['master_item']['item_name'];?></option>
                                <?php
                                }
                                ?>
                            </select>
             </td>
             <td><input type="text" class="form-control input-small" placeholder="Billing Rate" name="billing_rate_1"></td>
             <td><input type="text" class="form-control input-small" placeholder="Billing Room Rate" name="billing_room_rate_1"></td>
             <td><input type="text" class="form-control input-small" placeholder="Urgent Rate" name="urgent_rate_1"></td>
             <td><button type="button"  onclick="outlet_addrow()" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Add Row</button></td>
            </tr>-->
            </tbody>
            </table>
            <button name="add_outlet_item_mapping" class="btn green" value="add_outlet_item_mapping"><i class="fa fa-plus"></i> Add</button>
            &nbsp;&nbsp;<button type="reset" name="" class="btn red " value="add_outlet_item_mapping"><i class="fa fa-level-down"></i> Reset</button>
            </form>
            </center>
        </div>
    </div>
</div>
 <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script>
		/*function outlet_addrow()
		{
			var rowCount = $('#myTable >tbody >tr').length;
			$(".page-spinner-bar").removeClass("hide"); //show loading
			var ar = [];
			ar.push(rowCount);
			var myJsonString = JSON.stringify(ar);
			$.ajax({
			url: "ajax_php_file?outlatemapping_addrow=1&q="+myJsonString,
			type: "POST",         
			success: function(data)
			{
				$("#myTable > tbody > tr:last > td:last").empty();
				$("#myTable > tbody > tr:last").after(data);
				$(".page-spinner-bar").addClass(" hide"); //hide loading
			}
			});
		}
		
		function outlet_deleterow()
		{
			var rowCount = $('#myTable >tbody >tr').length;
			$(".page-spinner-bar").removeClass("hide"); //show loading
			
				//$("#myTable > tbody > tr:last > td:last").empty();
				
				$("#myTable > tbody > tr:last").remove();
				if(rowCount==2)
				{
				$("#myTable > tbody > tr:last > td:last").html('<button type="button" class="btn btn-xs btn-primary" onclick="outlet_addrow()"><i class="fa fa-plus"></i> Add Row</button>');
				}
				else
				{
					$("#myTable > tbody > tr:last > td:last").html('<button type="button" class="btn btn-xs btn-danger" onclick="outlet_deleterow()"><i class="fa fa-trash-o"></i> Delete Row</button><button type="button" class="btn btn-xs btn-primary" onclick="outlet_addrow()"><i class="fa fa-plus"></i> Add Row</button>');
				}
				$(".page-spinner-bar").addClass(" hide"); //hide loading
			
		}*/
		$(document).ready(function()
		{
			$("#add_outlet_item_mapping").on('submit',(function(e) 
            {
				var rowCount = $('#myTable >tbody >tr').length;
				e.preventDefault();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				var outlet_id=$("select[name=master_outlet_id]").val();
				var master_item_type_id=$("select[name=master_item_type_id]").val();
				ar.push([outlet_id,master_item_type_id]);
				for(var i=1; i<=rowCount; i++)
				{
					if($("input[name=check_"+ i +"]").is(":checked")==true)
					{
						var master_item_id=$("select[name=master_item_id_"+ i +"]").val();
						var billing_rate=$("input[name=billing_rate_"+ i +"]").val();
						var billing_room_rate=$("input[name=billing_room_rate_"+ i +"]").val();
						var urgent_rate=$("input[name=urgent_rate_"+ i +"]").val();
						ar.push([master_item_id,billing_rate,billing_room_rate,urgent_rate]);
					}
				}
				var myJsonString = JSON.stringify(ar);
				$.ajax({
				url: "ajax_php_file?add_outlet_item_mapping_form=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{
					//$('#add_outlet_item_mapping')[0].reset();
					
					if(data != 'error')
					{
						$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Submited Successfully...!!</p></div>");
						$("#editoption_service").html(data);
						$("#deleteoption").html(data);
					}
					else
					{
						$("#message").html("<div id='success' class='note note-danger alert-notification'><p>This data already exist...!!</p></div>");
					}
					
					$(".page-spinner-bar").addClass(" hide"); //hide loading
					$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
					{
						$(this).alert('close'); 
						$(this).remove();
					});
				}
			   
				});
			
			}));
			
			$("#next").on('click',(function(e) 
            {
				e.preventDefault();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				var outlet_id=$("select[name=master_outlet_id]").val();
				var master_item_type_id=$("select[name=master_item_type_id]").val();
				ar.push(outlet_id,master_item_type_id);
				var myJsonString = JSON.stringify(ar);
				$.ajax({
				url: "ajax_php_file?fetch_outlet_item_mapping=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{
					$("#myTable > tbody").html(data);
					$(".page-spinner-bar").addClass(" hide"); //hide loading
					$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
					{
						$(this).alert('close'); 
						$(this).remove();
					});
				}
			   
				});
			
			}));
			
			
		});
		</script>
		