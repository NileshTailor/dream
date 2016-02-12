<?php
if(!empty($fetch_function_master_tax))
{
	foreach($fetch_function_master_tax as $value) 
	{
		$string_tax=$value['master_function_tax']['master_tax_id'];
	}
}
if(empty($active))
{ $active=0;
}
?>

<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title">Function booking TAX</div><div class="toast-message"> </div></div></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
        <div class="tab-content">
            <!--<ul class="nav nav-tabs">
               <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">
                    
<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong>Function Booking Tax</strong></h6></span>

                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">
                    
<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h6><strong>View</strong></h6></span>

                    </a>
                </li>
                
            </ul>
        <div class="tab-content">
        <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">-->
        
                    <span style="margin-left:10%" class="caption-subject font-green-sharp bold uppercase"> Function Booking Tax</span>
                    
        <form method="post">
         <div class="table-responsive">
            <table class="table self-table" style="width:50% !important; margin-left:10%">
            <tr><th>TAX Name</th><th>TAX Applicable</th></tr>
            <?php
            foreach($fetch_master_tax as $data)
            { $master_tax_id=$data['master_tax']['id'];
            if(!empty($string_tax)){
				$tax_id=explode(',', $string_tax);
				
            ?>
            <tr><td><div class="form-group"><label><?php echo $data['master_tax']['name'];?></label></div></td>
            <td><div class="form-group">
            <div class="checkbox-list">
            <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox1" <?php if(in_array($master_tax_id, $tax_id)){?> checked <?php }?>  name="master_tax_id[]" value="<?php echo $data['master_tax']['id'];?>"><?php echo $data['master_tax']['tax_applicable'];?>%</label>
            </div>
            </div>
            </td></tr>
            <?php
            	}
                else
                {
                 ?>
            <tr><td><div class="form-group"><label><?php echo $data['master_tax']['name'];?></label></div></td>
            <td><div class="form-group">
            <div class="checkbox-list">
            <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox1"  name="master_tax_id[]" value="<?php echo $data['master_tax']['id'];?>"><?php echo $data['master_tax']['tax_applicable'];?>%</label>
            </div>
            </div>
            </td></tr>
            <?php
                }
            }
            ?>
           </table>
           <button  type="submit" style="margin-left:20%;"  class="btn green" name="add_tax" value="add_tax"><i class="fa fa-plus"></i> Add</button>
           
         </div>
        </form>
        </div>
                
<!--                
 <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                
  
    </div></div></div></div>
    
     -->           
  </div>
  </div>
  </div>              
                
                        
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script>
		 $(document).ready(function(){
	<?php
	if($active==2 || $active==1)
	{ 
		if($active==2)
		{
			
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