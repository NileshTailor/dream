<?php

if(empty($active))
{ $active="";
}
?>


<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button"class="toast-close-button">×</button><div class="toast-title">ledger Category</div><div class="toast-message"> </div></div></div>


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
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Group Master

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
                        <td><label>Group Category:</label></td>
                        <td>
						<div class="form-group">
						
						<select class="form-control input-medium" name="group_category_id" id="" required>
						<option value="">-- Select Group category --</option>
						<?php foreach($fetch_group_category as $data){
									$group_category_id=$data['group_category'] ['id'];
									$group_name=$data['group_category'] ['name'];
									?>
								<option value="<?php echo $group_category_id; ?>"><?php echo $group_name; ?></option>
								<?php } ?>
						
						</select>						
						</div>
						</td>
                        </tr>
						
                        <tr>
                        <td><label>Name:</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Name" name="name" required></div></td>
                        </tr>
                        
                        <tr>
                        <td colspan="6"><center><button name="add_group_master" value="add_group_master"  class="btn green"><i class="fa fa-plus"></i> Add</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                
                
                
                
                
                <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_group_master))
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
        <th>Group Category</th>
        <th>Name</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_group_master as $data){ 
		 $i++;
		 $group_master_id=$data['group_master'] ['id'];
		 $group_category_id=$data['group_master'] ['group_category_id'];
		 $result_group_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_group_category_name_by_id'), array($group_category_id));
		
		 $group_category_name=$result_group_category[0]['group_category']['name'];
         $name=$data['group_master'] ['name'];
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $group_category_name ?></td>
		<td><?php echo $name ?></td>					
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