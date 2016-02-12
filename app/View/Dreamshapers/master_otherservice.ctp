<?php

if(empty($active))
{ $active=1;
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            
<ul class="nav nav-tabs">
                <li <?php if($active=='1'){?> class="active"<?php } else {?>class=""<?php }?> >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add
</a>
                </li>
                <li <?php if($active=='2'){?> class="active"<?php } else {?>class=""<?php }?>>
                    <a aria-expanded="false" href="#tab_1_2" data-toggle="tab">View</a>
                </li>
               
            </ul>

            <div class="tab-content">
                <div <?php if($active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                <?php
                if(!empty($error))
				{
					echo "<div id='success' class='note note-danger alert-notification'><p>Data Already Exist</p></div>";
					
				}
				?>
                    <form method="post" name="add" id="add_company_category">
                   	 <div class="table-responsive">
                    	<table class="table self-table"  style=" width:60% !important;" border="0">
                        <tr>
                        <td width="25%" align="center" ><div class="form-group">
                            <label >Service Name
                            </label>
                            </div>
                            </td>
                            <td><div class="form-group">
                                    <div class="col-md-8">
                                        <input type="text" placeholder="Service Name" name="service" class="form-control input-medium"/>
                                        <span class="help-block">Addones Services eg: LCD, MIC etc.</span> 
                                        
                                    </div>
                                </div></td>
                                </tr>
                                <tr>
        	<td colspan="2" style="padding-right:125px"><center><button type="submit" name="add_category_name" class="btn green" value="add_category_name"><i class="fa fa-plus"></i> Add</button>
            <button type="reset" name="" class="btn red " value="add_category_name"><i class="fa fa-level-down"></i> Reset</button></center></td>
                        </tr>
                        </table>
                     </div>
                    </form>
                </div>
                        
                <div <?php if($active=='2'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_2">
					
                     <div class="table-responsive">
                    	<table class="table table-bordered table-hover" style=" width:100% !important;">
                        <tr>
                        <th>S. No.</th>
                        <th>Srevice Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                       <?php $i=0; 
                       foreach($fetch_company_category as $data)
                        { $i++;
                         $id=$data['master_other_service']['id'];
                         $service=$data['master_other_service']['service'];
                        ?><tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $service; ?></td>
                        <td><a class="btn blue btn-xs" data-toggle="modal" href="#other<?php echo $i;?>" ><i class="fa fa-edit"></i> Edit </a>
                        <div class="modal fade" id="other<?php echo $i;?>" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
                                   <form method="post">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Edit Service</h4>
										</div>
											<div class="modal-body">
                                                <table class="table self-table"  style=" width:60% !important;">
                                                <tr>
                                                <td width="20%"><div class="form-group">
                                                <label class="control-label col-md-4">Service
                                                </label>
                                                </div>
                                                </td>
                                                <td><div class="form-group">
                                                    
                                                <input type="text" placeholder="Service Name" value="<?php echo $data['master_other_service']['service']; ?>"
                                                 required name="edit_service" class="form-control input-medium"/>
                                         			
                                                </div></td>
                                                </tr>
                                                </table> 
                                            </div> 
										<div class="modal-footer">
                                        
                                <input type="hidden" value="<?php echo $id; ?>" name="id" />
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
								<button type="submit"   class="btn green" name="edit_category_name" value="edit_category_name" ><i class="fa fa-plus"></i> Update</button>						                                      
                                        </div>					
								</form> 		 
								</div>
                                </div>
                                </div>
                                
                            </td>
                        <td><a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $i;?>" ><i class="fa fa-trash-o"></i> Delete </a>
                        <div class="modal fade" id="delete<?php echo $i;?>" tabindex="-1" role="delete" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                                 </div>
        
                                
                               
                                <div class="modal-footer">
                                    <form method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $id; ?>" />
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
                            
                       <?php }
                        ?>
											
                            
                        </tr>
                        
                        </table>
                        </div>
                        
                    
               </div>

               
                    	
                     
			</div>  
    	</div>
    </div>
</div>


<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script>
		$(document).ready(function()
		{
			$('#editoption_category').live('change',function(e){
			$("#edit_category").val($('option:selected', this).attr("edit_cat"));
		});
		
    });
	$(document).ready(function()
        {
			var myVar=setInterval(function(){myTimerr()},4000);
			function myTimerr() 
	   {
	   $("#success").hide();
	    } 
		
	});
		</script>