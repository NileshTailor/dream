
<div class="portlet light">
						<div class="portlet-title">
							
           								<span style="margin-left:11%" class="caption-subject font-green-sharp bold uppercase">Report</span>
 <form method="post" enctype="multipart/form-data" >
<table width="100%" height="100px" border="0">
	<tr>
    	<td align="center"><label>Start Date</label></td>
            <td>
            <input name="start_date" placeholder="Arrival Date"   class="form-control input-small date-picker" type="text">
            </td>
		<td align="center"><label>End Date</label></td>
            <td>
            <input name="end_date" placeholder="End Date" onchange="datewise_view();"  class="form-control input-small date-picker" type="text">
            </td>
            <td align="center">
            <input type="checkbox" name="safari_required" id="inlineCheckbox1" value="yes">
            </td>
        <td><label>Show Waitlisted Room</label></td>
        </tr>
        <tr>
            <td align="center">
            <input type="checkbox" name="safari_required" id="inlineCheckbox1" value="yes">
            </td>
         <td><label>Show Rate of The Day</label></td>
        	<td align="center">
            <input type="checkbox" name="safari_required" id="inlineCheckbox1" value="yes">
            </td>
        <td><label>Show Venue Booking </label></td>
        	<td align="center">
            <input type="checkbox" name="safari_required" id="inlineCheckbox1" value="yes">
            </td>
        <td><label>Roomwise Details for Occupied Room</label></td>
    </tr>
        
</table>
<span id="report_view"></span>
        </form>
        
    </div>

</div>









<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script>
			function datewise_view()
			{
				var ar = [];
				var start_date=$("input[name=start_date]").val();
				
				var end_date=$("input[name=end_date]").val();
				//$(".page-spinner-bar").removeClass("hide");
				ar.push(start_date,end_date);
				var myJsonString = JSON.stringify(ar);
				$.ajax({
						url: "ajax_php_file?view_room_avaliablity_status_ajax=1&q="+myJsonString,
						type: "POST", 
						success: function(data)   // A function to be called if request succeeds
						{
							//alert(data);
							$("#report_view").html(data);
							
							
						}
				   
					});	
					
			}
		 $(document).ready(function()
        {
			
		$("#room_reseveration_add_form").on('submit',(function(e) 
            {
				e.preventDefault();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				var company_name=$("select[name=company_name]").val();
				var name_person=$("input[name=name_person]").val();
				var nationality=$("input[name=nationality]").val();
				var telephone=$("input[name=telephone]").val();
				var fax=$("input[name=fax]").val();
				var email_id=$("input[name=email_id]").val();
				var arrival_date=$("input[name=arrival_date]").val();
				var departure_date=$("input[name=departure_date]").val();
				var plan_id=$("select[name=plan_id]").val();
				var billing_instruction=$("input[name=billing_instruction]").val();
				var source_of_booking=$("input:radio[name=source_of_booking]:checked").val();
				var booking_thru_sales=$("input[name=booking_thru_sales]:checked").val();
				if(booking_thru_sales=='yes')
				{				}
				else
				{var booking_thru_sales='no';
				}
				var safari_required=$("input[name=safari_required]:checked").val();
				if(safari_required=='yes')
				{		}
				else
				{ var safari_required='no';
				}
				
				var reservation_status=$("input:radio[name=reservation_status]:checked").val();
				
				var room_type=$("select[name=room_type]").val();
				var requested=$("input[name=requested]").val();
				var granted=$("input[name=granted]").val();
				var rate_per_night=$("input[name=rate_per_night]").val();
				var advance=$("input[name=advance]").val();
				var remarks=$("textarea[name=remarks]").val();
				
				ar.push(company_name,nationality,telephone,fax,email_id,arrival_date,departure_date,plan_id,billing_instruction,source_of_booking,safari_required,booking_thru_sales,reservation_status,room_type,requested,granted,rate_per_night,remarks,name_person,advance);
				var myJsonString = JSON.stringify(ar);
				//alert(myJsonString);
				//alert(myJsonString);
				$.ajax({
				url: "ajax_php_file?room_reseveration_add_form=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{
					
					$('#room_reseveration_add_form')[0].reset();
					
						$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Submited Successfully...!!</p></div>");
						
					$(".page-spinner-bar").addClass(" hide"); //hide loading
					$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
					{
						$(this).alert('close'); 
						$(this).remove();
					});
				}
			   
				});
			
			}));
			/////////////
			
			
			
			
		});
		
	
		
		</script>
        
  