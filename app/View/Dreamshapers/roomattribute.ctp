<?php

if(empty($active))
{ $active="";
}
?>


 
 <div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Master Rom Attribute</div><div class="toast-message"> </div></div></div>
</div>
 
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
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Attribute
                    

                    </a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab"> View
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
                    <form method="post" name="add"  id="roomattribute_addform">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:50% !important;">
                        <tr>
                        <td><label>Attribute Name</label></td>
                        <td><input type="text" class="form-control input-medium" placeholder="Attributes" name="name" required></td>
                        </tr>
                        <tr>
                        <td colspan="2"><center><button name="add_master_room_attribute"  class="btn green"><i class="fa fa-plus"></i> Add</button>
                        <button type="reset" name="" class="btn red " value="add_master_room_attribute"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                
                
                
                <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_master_room_attribute))
                {?>
                <div class="alert alert-danger" style="width:50%; margin-left:15%">
								<strong>Sorry.!</strong> You have No records.
							</div>
                            <?php
                }else
                { ?>

<table class="table table-bordered table-hover" id="sample_1">
<thead>
<tr>
<th width="10%">S. No</th>
<th>Attribute Name</th>
<th  width="10%">Edit</th>
<th width="10%">Delete</th>
</tr>
</thead>
      
	 <tbody>
     	<?php
		$i=0;
		 foreach($fetch_master_room_attribute as $data){ 
		 $i++;
		 $id=$data['master_room_attribute']['id'];
         $name=$data['master_room_attribute']['name'];
		 ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php
            echo $data['master_room_attribute']['name'];?></td>         
            <td><a class="btn blue btn-xs" data-toggle="modal" href="#popupatt<?php echo $id ;?>"><i class="fa fa-edit"></i> Edit </a>
            
                                
                                        
        <div class="modal fade" id="popupatt<?php echo $id ;?>" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Update Here.!</h4>
        </div>
        
        <div class="modal-body">
        <div class="tab-pane fade active in" id="tab_1_2">
        <form method="post" name="popupatt<?php echo $id ;?>">
        <div class="table-responsive">
        <table class="table self-table" style=" width:100% !important;" border="0">
        <tr>
        
        <input type="hidden" name="roomatt_id" value="<?php echo $id; ?>" />
        
        <td><label>Attribute Name</label></td> 
        <td>
        <input type="text" class="form-control input-inline input-medium" placeholder="Attribute Name" name="edit_name" id="edit_name"
        value="<?php echo $name;?>" required></td>
        </tr>
        
         <tr><td colspan="3"><center><div class="modal-footer">
                                                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="edit_master_room_attribute" value="edit_master_room_attribute" class="btn blue">Update</button>
                                                </div></center></td></tr>      
                        </table>
                </div>
                </form>
                </div></div>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div></td>
                
                
                
                            
        <td>
            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete<?php echo $id ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                        </div>
                        <div class="modal-footer">
                        <form method="post" name="delete<?php echo $id ;?>">
                        <input type="hidden" name="delete_roomatt_id" value="<?php echo $id; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_master_room_attribute" value="delete_master_room_attribute" class="btn blue">Delete</button>
</form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
       </td>
        </tr>
        
        <?php } ?>
     </tbody>
</table> 
                  </div>

                </div>
                <?php }?>
			</div>  
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




		/*$(document).ready(function()
		{
			//////////////////////////////////////////////////
			$('#room_att_edit').bind('change',function(){
				//var br_name=$('#branch').val();
				 $("#edit_name").val($('option:selected', this).attr("edit_room_at"));
				
			});
			
			//////////////////////////////////////////////////
			$("#dlt").click(function(){
			 //setInterval(function(){
				 $('#delete').hide();
			 //},5000);
			 
    });
			//////////////////////////////////////////////////
			
			$("#roomattribute_addform").on('submit',(function(e) 
            {
				e.preventDefault();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				var name=$("input[name=name]").val();
				ar.push(name);
				var myJsonString = JSON.stringify(ar);
				$.ajax({
				url: "ajax_php_file?roomattribute_addform=1&q="+myJsonString,
				type: "POST",         
				success: function(data)
				{
					$('#roomattribute_addform')[0].reset();
					$('#roomattribute_editform')[0].reset();
					if(data != 'error')
					{
						$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Submited Successfully...!!</p></div>");
						$("#room_att_edit").html(data);
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
			
			$("#roomattribute_editform").on('submit',(function(e) 
            {
				e.preventDefault();
				$(".page-spinner-bar").removeClass("hide"); //show loading
				var ar = [];
				var edit_name=$("input[name=edit_name]").val();
				var room_att_edit=$("select[name=room_att_edit]").val();
				ar.push(edit_name,room_att_edit);
				var myJsonString = JSON.stringify(ar);
				$.ajax({
				url: "ajax_php_file?roomattribute_editform=1&q="+myJsonString,
				type: "POST",            
				success: function(data)
				{
					
					$('#roomattribute_editform')[0].reset();
					if(data != 'error')
					{
						$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Updated Successfully...!!</p></div>");
						$("#room_att_edit").html(data);
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
			
			$("#roomattribute_deleteform").on('submit',(function(e) 
            {
				e.preventDefault();
				
					$(".page-spinner-bar").removeClass("hide"); //show loading
					var ar = [];
					var deleteoption=$("select[name=deleteoption]").val();
					ar.push(deleteoption);
					var myJsonString = JSON.stringify(ar);
					$.ajax({
						url: "ajax_php_file?roomattribute_deleteform=1&q="+myJsonString,
						type: "POST", 
						success: function(data)   // A function to be called if request succeeds
						{
							$('#roomattribute_editform')[0].reset();
							$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Deleted Successfully...!!</p></div>");
							$("#room_att_edit").html(data);
							$("#deleteoption").html(data);
							$(".page-spinner-bar").addClass(" hide"); //hide loading
							$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
							{
								$(this).alert('close'); 
								$(this).remove();
							});
						}
				   
					});
				
			
			}));
			
		});*/
		$(document).ready(function()
        {
			var myVar=setInterval(function(){myTimerr()},4000);
			function myTimerr() 
	   {
	   $("#success").hide();
	    } 
		
	});

		</script>
		