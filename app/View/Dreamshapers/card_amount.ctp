<?php

if(empty($active))
{ $active="";
}
?>


<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title">Card Amount</div><div class="toast-message"> </div></div></div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            
<ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">
                    Add
                     </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">
                    View
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
                    <form method="post" name="add" id="add_company_category">
                   	 <div class="table-responsive">
                    	<table class="table self-table"  style="width:65% !important;" border="0">
                        <tr>
                                    <td><label> Registration NO.</label></td>
                <td><select class="form-control select2 select2_sample2 input-small" placeholder="Select..." name="registration_id" id="registration_id"  required>
                <option value="">--Select--</option>
                <?php
                foreach($fetch_registration as $data)
                {  
                ?>
                <option value="<?php echo $data['registration']['id']; ?>" name="<?php echo $data['registration']['name'];?> ">
                <?php echo $data['registration']['card_id_no']; ?></option>
                <?php
                }
                ?>
                </select></td>
                <td><label>Name</label></td>
                <td><input type="text" name="name" class="form-control input-inline input-small" id="name" disabled placeholder="Name"/></td>
               </tr>
                <tr>
                <td><label>Balance</label></td>
                <td><input type="text" name="balance_amount" class="form-control input-inline input-small" disabled placeholder="Balance"/></td>
                <td><label>Recharge Amount</label></td>
                <td><input type="text" name="recharge_amount" class="form-control input-inline input-small"  placeholder="Amount"/></td> 
                </tr>  
        <td colspan="2"><center><button type="submit" name="add_category_name" class="btn green" value="add_category_name"><i class="fa fa-plus"></i> Add</button>
        &nbsp;<button type="reset" name="add_category_name" class="btn green" value="add_category_name"><i class="fa fa-plus"></i> Add</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                
                
                
                <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_card_amount))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:25%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>
<table class="table table-bordered table-hover" id="sample_1">
<thead>
<tr>
<th width="10%">S. No</th>
<th>Registration NO</th>
<th>Recharge</th>
<th>Balance</th>
</tr>
</thead>
      
	 <tbody>
     	<?php
		$i=0;
		 foreach($fetch_card_amount as $data){ 
		 $i++;
		 $id=$data['card_amount']['id'];
         $registration_id=$data['card_amount']['registration_id'];
		 ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['card_amount']['registration_id'];?></td>
            <td><?php echo $data['card_amount']['recharge_amount'];?></td>
            <td><?php echo $data['card_amount']['balance_amount'];?></td>
            
        </tr>
        
        <?php } ?>
     </tbody>
</table> 
                  </div>

                </div>
                <?php } ?>
			</div>  
    	</div>
    </div>
</div>
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
	
	
	$(document).ready(function()
        {
		$('#registration_id').live('change',function(e)
			{
				
			$("#name").val($('option:selected', this).attr("name"));
			});
	});
	
	
	
	
	$(document).ready(function(){
	<?php
	if($active==2 || $active==1)
	{ 
		if($active==2)
		{
			if(@$active_delete==1)
			{
				$contain="Delete successful...!";
				$cls='toast-error';
			}
			else
			{
				$contain="Update successful...!";
				$cls='toast-info';
			}
		}
		else
		{
			$contain="Add successful...!";
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