<?php
if(empty($active))
{ $active="";
}
?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><button role="button" class="toast-close-button">×</button><div class="toast-title">Menu Category</div><div class="toast-message"> </div></div></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?> >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Category
                    

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
                    <form method="post" name="add"  id="roomtype_addform">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:40% !important;" border="0">
                        
                        <tr>
                        <td><label>Menu Category</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Menu Category" name="menu_category_id" id="menu_category_id" required></div></td>
                        </tr>
                        <tr>
                        <td><label>Rate</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Rate" name="rate" id="rate" required></div></td>
                        </tr>
                        
                        <tr>
                        <td colspan="2" style="padding-left:70px"><center><button name="add_menu_cat" value="add_menu_cat"  class="btn green"><i class="fa fa-plus"></i> Add</button>
                        <button type="reset" name="" class="btn red " value="add_menu_cat"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php } ?> id="tab_1_2">
                <?php if(empty($fetch_menu_category))
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
        <th width="10%">S. No</th>
        <th>Menu Category</th>
        <th>Rate</th>
        <th width="10%">Edit</th>
        <th width="10%">Delete</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_menu_category as $data){ 
		 $i++;
		 $id=$data['menu_category'] ['id'];
        $menu_category_id=$data['menu_category'] ['menu_category_id'];
		$rate=$data['menu_category'] ['rate'];
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['menu_category'] ['menu_category_id']; ?></td>
        <td><?php echo $data['menu_category'] ['rate']; ?></td>
        
        
									<td><a class="btn default btn-xs blue" data-toggle="modal" href="#poppupitem_<?php echo $id; ?>"><i class="fa fa-edit"></i>
								Edit </a>
								<div class="modal fade bs-modal-md" id="poppupitem_<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
										<div class="modal-body">
                                        <form method="post" name="edit_<?php echo $id; ?>">
                                        <div class="table-responsive">
										
                        <table class="table self-table" style=" width:50% !important;" border="0" align="center">
                        <tr>   
                        <input type="hidden" name="edit_menu_cat_id" value="<?php echo $id; ?>" />
                        <td><label>Menu Category</label></td>
                        <td align="left"><input type="text" class="form-control input-medium" placeholder="Category" value="<?php echo $menu_category_id; ?>" name="edit_menu_category_id" id="edit_menu_category_id" align="left" required></td>
                        </tr>
                        <tr>
                        <td><label>Rate</label></td>
                        <td><div class="form-group"><input type="text" class="form-control input-medium" placeholder="Rate" value="<?php echo $rate; ?>" name="edit_rate" id="edit_rate"  required></div></td>
                        </tr>
                        <tr><td colspan="3"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_menu_cat" value="edit_menu_cat" class="btn blue">Update</button>
										</div></center></td></tr>
                       
                        </table>

										</div></form></div>
										
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
                                </td>
                                
<td>
            <a class="btn default btn-xs red" data-toggle="modal" href="#delete<?php echo $id; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                        </div>
                        <div class="modal-footer">
                             <form method="post" name="delete<?php echo $id; ?>">
                             <input type="hidden" name="delete_menu_cat_id" value="<?php echo $id; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_menu_cat" value="delete_menu_cat" class="btn blue">Delete</button>
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
                     </div> <?php }?>   
			</div>  
    	</div>
    </div>
</div>



<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>

$(document).ready(function(){
	var myVar=setInterval(function(){myTimerr()},4000);
			function myTimerr() 
	   {
	   $("#success").hide();
	    }  
			
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


