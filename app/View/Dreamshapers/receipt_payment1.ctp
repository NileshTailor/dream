<?php

if(empty($active))
{ $active="";
}
?>


<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button"class="toast-close-button">×</button><div class="toast-title">Payment</div><div class="toast-message"> </div></div></div>


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
                    <form method="post" name="add">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:40% !important;" border="0">
                        <tr>
                        <td><div class="form-group"><label>Category</label></div></td>
                      	<td><div class="form-group"><select class="form-control input-medium" name="ledger_category_id" onchange="ledger_name_fetch();" required>
                                            <option value="">-- Select Category --</option>
                                            <?php
                                            foreach($fetch_ledger_category as $data)
                                            {
                                            	?>
                                                <option value="<?php echo $data['ledger_category']['id'];?>"><?php echo $data['ledger_category']['name'];?></option>
                                                <?php
                                            }
                                            ?>
									</select></div>
                                    </td>
                        <td><div class="form-group"><label>Name</label></div></td>
                      	<td><div class="form-group"><select class="form-control input-medium" name="name_id" id="ledger_name_id" required>
                                            <option value=""></option>
                                            </select></div>
                                    </td>
                          </tr>
                          
                        <tr>
                        <td><label>Date:</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" value="<?php echo date("d-m-Y"); ?>" name="date"></div></td>
                        <td><label>Amount:</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Amount" name="amount" required></div></td>
                        </tr>
                        
                        
                        <tr>
                        <td><label>Discount:</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Discount" name="discount"></div></td>
                        <td><label>TDS:</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="TDS" name="tds"></div></td>
                        </tr>
                        <tr>
                        <td><label>Narration:</label></td>
                    <td colspan="3"><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Narrations" name="narration"></div></td>                    </tr>
                        
                        <tr>
                        <td colspan="4"><center><button name="add_receipt_payment1" value="add_receipt_payment1"  class="btn green"><i class="fa fa-plus"></i> Add</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                
                
                <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_payment))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>
                     	 <div class="table-responsive">

  <table class="table table-bordered table-hover" id="sample_1">
	<thead>
    <tr>
        <th>S. No</th>
         <th>Category</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Date</th>
       <th>Discount</th>
       <th>TDS</th>
        <th>Narration</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_payment as $data){ 
		 $i++;
		 $id=$data['payment'] ['id'];
		 $ledger_category_id=$data['payment'] ['ledger_category_id'];
		 $name_id=$data['payment'] ['name_id'];
		 $amount=$data['payment'] ['amount'];
		 $date=$data['payment'] ['date'];
		 $discount=$data['payment'] ['discount'];
		 $tds=$data['payment'] ['tds'];
		 $narration=$data['payment'] ['narration'];
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['payment'] ['ledger_category_id']; ?></td>
       <td><?php echo $data['payment'] ['name_id']; ?></td>
       <td><?php echo $data['payment'] ['amount']; ?></td>
       <td><?php echo $data['payment'] ['date']; ?></td>
       <td><?php echo $data['payment'] ['discount']; ?></td>
       <td><?php echo $data['payment'] ['tds']; ?></td>
       <td><?php echo $data['payment'] ['narration']; ?></td>
									</tr>
<?php } ?>
        </tbody>
        </table> 
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
function ledger_name_fetch()
		{
			//alert();
			var ledger_category_id=$("select[name=ledger_category_id]").val();
			$.ajax({ 
			url: "ajax_php_file?receipt_payment_mode_fetch=1&q="+ledger_category_id,
			type: "POST", 
			success: function(data)
			{ 
				$("#ledger_name_id").html(data);
			}
			});
		}
		
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
	  var myVar=setInterval(function(){myTimer()},5000);
	   function myTimer() 
	   { $("#toast-container").hide(); }  
	<?php } ?>
});

</script>