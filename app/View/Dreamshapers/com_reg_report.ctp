<style media="print">
.print-hide
{
	display:none;
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">
                    
                    <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong>Checkout Report</strong></h6></span>
                    
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab_1_1">
<div class="portlet box blue" style="border:#FFF !important">
                            <div class="portlet-title box white">
                                <div class="caption">
                                    <strong>Checkout Report</strong>
                                </div>
                            </div>
                                <div class="portlet-body" style="min-height:400px;">
                                <div class=" print-hide">
                                <table align="center" width="90%" border="0">
                                
                                <tr><td style="list-style-position:inside"><table align="left" border="0">
                                <tr style="width:40%;><td align="right"onClick="roomreport">
                                <div class="radio-list">
                                        
											<label class="radio-inline">
											<input type="radio" name="roomreport" value="datewise" id="dw" checked> Date Wise</label>
											<label class="radio-inline">
											<input type="radio" name="roomreport" value="roomwise" id="rw"> Room No. Wise</label>
                                            
										</div> 
						
                                </td></tr></table></td>
                                <td style="width:45%;list-style-position:inside"><table><tr id="dwise_id"><td>
                                <div class="form-group" style="text-align:center;">
                                    <div class="col-md-4">
                                            <div class="input-group input-large date-picker input-daterange" data-date-format="dd-mm-yyyy">
                                                <input type="text"  id="start_date" placeholder="Start Date" class="form-control" name="from" value="<?php echo date('d-m-Y'); ?>">
                                                <span class="input-group-addon">
                                                to </span>
                                                <input type="text" id="end_date" placeholder="End Date" class="form-control" name="to" value="<?php echo date('d-m-Y'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                <tr id="rwise_id" style="display:none;">
                                            <td align="center"><select class=" form-control input-medium" name="master_roomno_id" onchange="room_no();" disabled>
                                <option value="">---- Select Room No. ---</option>
									<?php
									foreach($fetch_master_roomno as $data)
                                    {
										$room_no=$data['master_roomno']['room_no'];
										$room_no_explode=explode(',', $room_no);
									   foreach($room_no_explode as $room_nos)
										{
											?>
											 <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
										<?php
										}
									}
                                   
                                    ?>
                                </select>
                                    </td>
                        <?php 
                        
                                    ?>
                                    </tr>
                                
                                </table></td>
                                    <td style="width:5%; list-style-position:inside">
                                    <table><tr>
                                    <td><label style="margin-left:10px;"><button onclick="view_data();" class="btn purple"><i class="fa fa-search"></i> View</button></label></td>
                               <td ><label style="margin-left:10px;"> <button class="btn blue" onclick="window.print()"><i class="fa fa-print"></i> Print</button></label></td>
                                
                                </tr></table></td>
                                
                                </tr>
                                
                                
                                
                                
                                
                                
                                </table>
                              </div>
                                <span style="margin-top:20px" id="view_data"></span>
                               
                                </div>
                            </div>
                        </div>
                    </div></div></div></div>
         
         
         <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">

         	$(document).ready(function(){
	
    $("#dw").click(function(){
		$('#dwise_id').show();
		$('#rwise_id').hide();
		$('#view_data').show();
		
    });
	$("#rw").click(function(){
		$('#dwise_id').hide();
		$('#rwise_id').show();
		$('#view_data').hide();
		
    });
	
	
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
				url: "ajax_php_file?room_servicing_view_dateselect=1&q="+myJsonString,
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
			{	alert("Please select first")
			}
		}
		function valid()
		{	var a_date=$("#a_date").val();
			var d_date=$("#d_date").val();
			
			var dateParts = a_date.split("-");
			var date = new Date(dateParts[2], (dateParts[1] - 1), dateParts[0]);
			var d=new Date(dateParts);
			var arival_date=d.getTime();
			
			var dateParts1 = d_date.split("-");
			var date1 = new Date(dateParts1[2], (dateParts1[1] - 1), dateParts1[0]);
			var d1=new Date(dateParts1);
			var dep_date=d1.getTime();
			
			if(arival_date>dep_date)
			{
				alert("Arrival Date should not be greater. Please Check.");
				$("#d_date").val('');
			}
		}
		
		
		
		
		function room_no()
	{
		
		
		var id=$("select[name=master_roomno_id]").val();
			$.ajax({
				url: "ajax_php_file?check_id_room_serviceinfo_ftc=1&q="+id,
				type: "POST",         
				success: function(data)
				{
					
					var da=data.split(",");
					
					//$("#master_roomno_id").val(data);
					$("#rno").val(da[0]);
					$("#dt").val(da[1])
					$("#rs").val(da[2]);
					$("#sb").val(da[3]);
					$("#rmk").val(da[4]);
					
				
			
				
			
			}
				
		
			})
			
	}
	
</script>