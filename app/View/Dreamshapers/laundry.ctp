<?php

if(empty($active))
{ $active="";
}
?>
<?php
 if(!empty($outlet))
 {
 	$outlet_array=explode(',', $outlet);
     
 } 
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title">Laundry Service</div><div class="toast-message"> </div></div></div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            
<ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">
                    <span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong>Laundry Service</strong></h6></span>
                     </a>
                </li>                
            </ul>

            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                <?php
                if(!empty($error))
				{
					echo "<div id='success' class='note note-danger alert-notification'><p><b>Sorry</b>, No Table is Running Right Now, You Can Not Change.!</p></div>";
				}
				?>
                    <form method="post" name="add" id="add_company_category">
                   	 <div class="table-responsive">
                    	<table class="table self-table"  style="width:65% !important;" border="0">
                         <tr>
                         <td><label>Room No.</label></td>
                    	 <td><select class="form-control input-small select2me" name="master_roomno_id" id="master_roomno_id" placeholder="Select..." required>
                                <option value=""></option>    
									<?php
                                    foreach($fetch_room_checkin_checkout as $data)
                                    {
                                    ?>
                                    <option value="<?php echo $data['room_checkin_checkout']['id']; ?>">
                                    <?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></option>
                                   <?php
                                }
                                ?>
                                </select></td>
                         <td><label>Extra Bed</label></td>
                        <td><input name="extra_bed" class="form-control input-inline input-small"  placeholder="Extra" type="text" id="extra_bed"></td>
                        <td><label>Charge</label></td>
                 <td><input name="extra_bed_charge" class="form-control input-inline input-small"  placeholder="Charge" type="text" id="extra_bed_charge"></td>
                         </tr>
                         <tr>
     <td colspan="6"><center><button type="submit" name="add_transfer_table" class="btn green" value="add_transfer_table"><i class="fa fa-plus"></i> Transfer</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
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
		
</script>