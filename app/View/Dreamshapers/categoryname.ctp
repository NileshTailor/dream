<?php

if(empty($active))
{ $active="";
}
?>


<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title">Company Category</div><div class="toast-message"> </div></div></div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            
<ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">
                    Add Category
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
                        <td width="35%" align="right" class="form-group">
                            <label>Company Category
                            </label>
                            
                            </td>
                            <td width="35"><div class="form-group">
										<div class="col-md-8">
											<input type="text" placeholder="Category Name" name="category_name" required class="form-control input-medium"/>
										</div>
									</div></td>
        <td colspan="2"><center><button type="submit" name="add_category_name" class="btn green" value="add_category_name"><i class="fa fa-plus"></i> Add</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                
                
                
                <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_company_category))
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
<th>Category Name</th>
<th  width="10%">Edit</th>
<th width="10%">Delete</th>
</tr>
</thead>
      
	 <tbody>
     	<?php
		$i=0;
		 foreach($fetch_company_category as $data){ 
		 $i++;
		 $id=$data['company_category']['id'];
         $category_name=$data['company_category']['category_name'];
		 ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['company_category']['category_name'];?></td>
               
            <td><a class="btn blue btn-xs" data-toggle="modal" href="#popupcat<?php echo $id ;?>"><i class="fa fa-edit"></i>
            Edit </a>
                                      
        <div class="modal fade" id="popupcat<?php echo $id ;?>" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Update Here.!</h4>
        </div>
        
        <div class="modal-body">
        <div class="tab-pane fade active in" id="tab_1_2">
        <form method="post" name="popupcat<?php echo $id ;?>">
        <div class="table-responsive">
        <table class="table self-table" style=" width:100% !important;" border="0">
        <tr>
        
        <input type="hidden" name="editoption_category" value="<?php echo $id; ?>" />

                        <td width="50%"><div class="form-group">
                            <label class="control-label col-md-8">Category Name
                            </label>
                            </div>
                            </td>
                            <td><div class="form-group">
                                <div class="col-md-8">
                                <input type="text"placeholder="Category Name" name="edit_category" id="edit_category"class="form-control input-medium" value="<?php echo $category_name;?>"/>
                                </div>
                            </div></td>
                        </tr>
                        
         <tr><td colspan="3"><center><div class="modal-footer">
                                                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="edit_category_name" value="edit_category_name" class="btn blue">Update</button>
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
                        <input type="hidden" name="deleteoption_category_name" value="<?php echo $id; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_category_name" value="delete_category_name" class="btn blue">Delete</button>
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
		/*$(document).ready(function()
		{
			
			$('#editoption_category').live('change',function(e){
			//var br_name=$('#branch').val();
 $("#edit_category").val($('option:selected', this).attr("edit_cat"));
				 //  $("#pincode").val($('option:selected', this).attr("pincodename"));
			});
			
			 
			
			
$("#delete_company_category").on('submit',(function(e) 
            {
				e.preventDefault();
				
					$(".page-spinner-bar").removeClass("hide"); //show loading
					
					var deleteoption=$("select[name=deleteoption]").val();
					$.ajax({
						url: "ajax_php_file?delete_company_category=1&q="+deleteoption,
						type: "POST", 
						success: function(data)   // A function to be called if request succeeds
						{
							
													$(".page-spinner-bar").addClass(" hide"); //hide loading
	
							
							$('#edit_company_category')[0].reset();
							$("#message").html("<div id='success' class='note note-success alert-notification'><p>Form Deleted Successfully...!!</p></div>");
							$("#editoption_category").html(data);
							$("#deleteoption").html(data);
							$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
							{
								$(this).alert('close'); 
								$(this).remove();
							});
							
						}
				   
					});
				
			}));
		});
		 
		 $("#dlt").click(function(){
			 //setInterval(function(){
				 $('#delete').hide();
			 //},5000);
			 
    });*/
	
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