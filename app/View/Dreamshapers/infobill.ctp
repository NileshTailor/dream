<?php

if(empty($active))
{ $active="";
}
?>


<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button"class="toast-close-button"></button><div class="toast-title">Create Account</div><div class="toast-message"> </div></div></div>


 <div id="message"></div>
  <div ng-spinner-bar="" class="page-spinner-bar hide">
		<div class="bounce1"></div>
		<div class="bounce2"></div>
		<div class="bounce3"></div>
	</div>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Information Bill
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                      <div class="table-responsive">
                                <div class="portlet box" style="border:#FFF !important; background-color:#E26A6A">
                            <div class="portlet-title box white">
                                <div class="caption">
                                    <i class="fa fa-book" style="color:#FFF"></i><strong>User's Information Bill</strong>
                                </div>
                            </div>
                                <div class="portlet-body" style="min-height:400px;">
                                <table align="center" width="40%" border="0"><tr class="print-hide">
                                 <div class="">
                                 
                                 <td><label style="margin-right:14px;">Room No. Wise</label></td>
                                 <td class="form-group"><select class=" form-control input-small select2me tooltips" title="Select Room No." name="master_roomno_id" onchange="view_data();" placeholder="Select..." id="master_roomno_id">
                                <option value=""></option>
									<?php
                                    foreach($fetch_room_checkin_checkout as $data)
                                    {
                                    ?>
                                    <option value="<?php echo $data['room_checkin_checkout']['id']; ?>" cno="<?php echo $data['room_checkin_checkout']['card_no']; ?>">
                                    <?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></option>
                                   <?php
                                }
                                ?>
                                </select>
                                    </td>
                                    <input type="hidden" name="card_no" id="rg_id" />
                                    <input type="hidden" name="grandamount1" id="grandamount1" />
                                    
                             </div></tr></table>
                                <span style="margin-top:20px" id="view_data"></span>
                              </div></div></div></div></div></div>
                              </div></div>
                              
                  
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
 
 function view_data()
		{
			//alert();
			var ar = [];
			var master_roomno_id=$("#master_roomno_id").val();
			//var card_no=$("#card_no").val();
			
			//alert(master_roomno_id);
				$(".page-spinner-bar").removeClass("hide"); //show loading
				//ar.push(master_roomno_id,card_no);
				//var myJsonString = JSON.stringify(ar);
				//alert(myJsonString);
				$.ajax({
				url: "ajax_php_file?infobill_account_fetch=1&q="+master_roomno_id,
				type: "POST",         
				success: function(data)
				{	//alert(data);
					$("#view_data").html(data);
					$(".page-spinner-bar").addClass(" hide"); //hide loading
				}
				});
			
		}
		////////////////////
		
		/*function kot_due()
	{
		//alert();
		var master_roomno_id=$("#master_roomno_id").val();
		//alert(myJsonString);
		$.ajax({
			url: "ajax_php_file?kot_due_amountttt=1&q="+master_roomno_id,
			type: "POST",         
			success: function(data)
			{			//var da=data.split(",");

				//alert(data);
						$("#grandamount1").val(data);
						//$("#kot_due_amount1").val(da[1]);
						
										
			}		
		});
}*/
		/* function view_data1()
		{
			//alert();
			var ar = [];
			var card_no=$("#card_no").val();
			//var card_no=$("#card_no").val();
			
			//alert(master_roomno_id);
				$(".page-spinner-bar").removeClass("hide"); //show loading
				//ar.push(master_roomno_id,card_no);
				//var myJsonString = JSON.stringify(ar);
				//alert(myJsonString);
				$.ajax({
				url: "ajax_php_file?infobill_account_fetch1=1&q="+card_no,
				type: "POST",         
				success: function(data)
				{	//alert(data);
					$("#view_data").html(data);
					$(".page-spinner-bar").addClass(" hide"); //hide loading
				}
				});
			
		}*/
		$(document).ready(function()
			{
				$('#master_roomno_id').live('change',function(e)
				{
				$("#rg_id").val($('option:selected', this).attr("cno"));
				});
	});
</script>