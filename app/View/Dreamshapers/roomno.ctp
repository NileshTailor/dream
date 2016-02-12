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
if(empty($wrong))
{ $wrong=0;
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Master Room No</div><div class="toast-message"> </div></div></div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs print-hide">
                
<li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Room No.
                    

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
                    	<table class="table self-table" style=" width:50% !important;">
                        <tr><td><label>Outlet Name</label></td>
                        <td><div class="form-group"><select class="form-control input-medium" name="master_outlet_id" required>
                                            <option value="">--Select--</option>
                                            <?php
                                            foreach($fetch_master_outlet as $data)
                                            {
                                            	?>
                                                <option value="<?php echo $data['master_outlet']['id'];?>"><?php echo $data['master_outlet']['outlet_name'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></div></td>
                        </tr>
                        <tr>
                        <td><label>Room Type</label></td>
                        <td><div class="form-group"><select class="form-control input-medium" name="room_type_id"required>
                                <option value="">--- Select Room Type ---</option>
									<?php
                                    foreach($fetch_master_room_type as $data)
                                    {
                                        ?>
                                        <option value="<?php echo $data['master_room_type']['id'];?>"><?php echo $data['master_room_type']['room_type'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select></div></td>
                        </tr>
                        <tr>
                        <td><label>Room From</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Room From" name="room_from" required></div></td>
                        </tr>
                        <tr>
                        <td><label>Room To</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Room To" name="room_to" required></div></td>
                        </tr>
                        <tr>
                        <td colspan="2"><center><button name="add_master_roomno" value="add_master_roomno"  class="btn green"><i class="fa fa-plus"></i> Add</button>
                        <button type="reset" name="" class="btn red " value="add_master_roomno"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                
              
<div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_master_roomno))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>
            <div class="table-responsive">
                        <div class="portlet box" style="border:#FFF !important; background-color:#066">
                            <div class="portlet-title box white">
                                <div class="caption">
                                    <i class="fa fa-book" style="color:#FFF"></i><strong>Room NO.</strong>
                                </div>
                            </div>
                                <div class="portlet-body">
                                
                                <table align="center" width="60%" border="0" style="float:center"><tr class="print-hide"><td>
                                <tr class="print-hide">
                                <td width="20%"><div class="form-group"><label>Outlet Name</label></div></td>
                        <td><div class="form-group"><select class="form-control input-small" name="master_outlet_id" id="master_outlet_idd" required>
                                            <option value="">--- Select ---</option>
                                            <?php
                                            foreach($fetch_master_outlet as $data)
                                            {
                                        	?>
                                                <option value="<?php echo $data['master_outlet']['id'];?>"><?php echo $data['master_outlet']['outlet_name'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></div></td>
                               <td><div class="form-group"><label style="margin-left:10px;"><button onclick="view_dataa();" class="btn green btn-sm"><i class="fa fa-search"></i> View</button></label></div></td>
             <td><div class="form-group"><label style="margin-left:10px;"><button class="btn red btn-sm" onclick="window.print()"><i class="fa fa-print"></i> Report</button></label></div></td>
             <td>&nbsp;&nbsp;</td>
              <td>&nbsp;&nbsp;</td>
               <td>&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;</td>
                  <td>&nbsp;&nbsp;</td>
                   <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                     <td>&nbsp;&nbsp;</td>
                      <td>&nbsp;&nbsp;</td>
                       <td>&nbsp;&nbsp;</td>
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
			var master_outlet_idd=$("#master_outlet_idd").val();
				$.ajax({
				url: "ajax_php_file?room_outlet_view_dateselect=1&q="+master_outlet_idd,
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
		///////////////////
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
			else if(@$wrong==1)
			{
				$contain="Data Already Exist...!";
				$cls='toast-error';
			}
			else
			{
				$contain="Update successfully...!";
				$cls='toast-info';
			}
		}
		else if(@$wrong==1)
			{
				$contain="Data Already Exist...!";
				$cls='toast-error';
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

</script>