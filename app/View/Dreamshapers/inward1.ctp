<?php
if(isset($_GET['mode']))
{
	if($_GET['mode']=='edit')
	{
		       ?>
               <div class="portlet bow blue">
                         <div class="portlet-title">
                            <div class="caption">
                            <i class="fa fa-edit"></i> Edit Stock
                            </div>
                            </div>
                            <div class="portlet-body form">
							<!-- BEGIN FORM-->
                                <div class="form-body">
								<form  class="form-horizontal" role="form" method="post">    
                                <div class="form-group">
                                <label class="control-label col-md-3">Date Range</label>
                                <div class="col-md-4">
                                <div class="input-group input-large date-picker input-daterange" data-date-format="dd-mm-yyyy">
                                <input class="form-control " name="from" placeholder="From" type="text">
                                <span class="input-group-addon" style="line-height:1 !important;">
                                to </span>
                                <input class="form-control " name="to" placeholder="To" type="text">
                                </div>
                                </div>
                                <div class="col-md-4">
                                <button type="submit" name="inward_search" class="btn red "><i class="fa fa-search"></i> Search</button>
                                </div>
                                </div>
                                </form>
                                <?php
								if(!empty($op_info)&&($op_info=='edit'))
								{ 
								?>
                                <table class="table table-striped table-condensed table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                <th>SL.</th>
                                <th>Item Name</th>
                                <th style="text-align:center;">Quantity</th>
                                <th>Date</th>
                                <th>Remarks</th>
                                <th>Edit|Delete</th>
                                </tr>
                                </thead>
                                <tbody>
									 <?php
                                    $i=0;
                                    foreach(@$update_inward_data as $row)
                                    {$i++;
                                    ?>
                                    
                                    <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $this->requestAction(array('controller' => 'Handler', 'action' => 'fetchmasteritemname',$row['item_inward']['master_item_id']), array()); ?></td>
                                    <th style="text-align:center;"><?php echo $row['item_inward']['quantitiy']; ?></th>
                                    <td><?php echo $this->requestAction(array('controller' => 'Handler', 'action' => 'dateforview',$row['item_inward']['date']), array()); ?></td>
                                    <td><?php echo $row['item_inward']['remarks']; ?></td>
                                    <td>
                                    <a href="#myModal_edit<?php echo $i; ?>" role="button" class="btn btn-xs yellow" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
                                   <div style="display: none;" id="myModal_edit<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">

								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <div class="caption caption-md">
                                        <span class="caption-subject font-yellow bold uppercase"><i class="fa fa-edit"></i> Edit Info for <?php echo  $this->requestAction(array('controller' => 'Handler', 'action' => 'fetchmasteritemname',$row['item_inward']['master_item_id']), array()); ?>:</span>
                                        </div>
         								</div>
                                       <form class="form-horizontal" role="form" method="post" id="form<?php echo $i; ?>"  name="myModal_edit<?php echo $i; ?>">   
										<div class="modal-body">
                                       <div class="form-group">
                                        <label class="control-label col-md-3">Item <span class="required">* </span></label>
                                        <div class="col-md-9">
                                        <select class="form-control " name="master_item_id">
                                        <option value="">---select item---</option>
                                        <?php
                                        foreach(@$master_item_fetch as $data)
                                        {
                                            ?>
                                        <option <?php if($row['item_inward']['master_item_id']==$data['master_item']['id']) { ?> selected="selected" <?php } ?> value="<?php echo $data['master_item']['id']; ?>"><?php echo $data['master_item']['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                        <span class="help-block"> Provide Item Name</span>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-3 control-label">Quantity <span class="required">* </span></label>
                                        <div class="col-md-9">
                                        <input class="form-control " name="quantitiy" value="<?php echo $row['item_inward']['quantitiy']; ?>"  type="text">
                                        <span class="help-block"> Provide your quantity</span>
                                        </div>
                                        </div>
                                         <div class="form-group">
                                        <label class="col-md-3 control-label">Date <span class="required">* </span></label>
                                        <div class="col-md-9">
                                        <input class="form-control  date-picker" name="date" data-date-format="dd-mm-yyyy" value="<?php echo $this->requestAction(array('controller' => 'Handler', 'action' => 'dateforview',$row['item_inward']['date']), array()); ?>"  type="text">
                                        <span class="help-block"> Provide your date</span>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-3 control-label">Remarks</label>
                                        <div class="col-md-9">
                                        <input class="form-control " name="remarks" value="<?php echo $row['item_inward']['remarks']; ?>"  type="text">
                                        </div>
                                        </div>
                                        </div>
										<div class="modal-footer">
											<button class="btn default " data-dismiss="modal" aria-hidden="true">Close</button>
                                            <input type="hidden" name="my_id" value="<?php echo $row['item_inward']['id']; ?>">
											<button type="submit" name="edit_inwards" class="btn yellow "><i class="fa fa-question"></i> Save Changes</button>
										</div>
                                        </form>
									</div>
								</div>
                                </div>
                                
                                 <a href="#myModal_del<?php echo $i; ?>" role="button" class="btn btn-danger btn-xs" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</a>
                                    <div style="display: none;" id="myModal_del<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <div class="caption caption-md">
                                        <span class="caption-subject font-red bold uppercase"><i class="fa fa-trash-o"></i> Delete Info for <?php echo $this->requestAction(array('controller' => 'Handler','action' => 'fetchmasteritemname',$row['item_inward']['master_item_id']), array());  ?>:</span>
                                        </div>
										</div>
									<!--	<div class="modal-body">
											<p>
												 Body goes here...
											</p>
										</div> -->
                                          <form class="form-horizontal" role="form" method="post"  name="myModal_del<?php echo $i; ?>"> 
										<div class="modal-footer">
											<button class="btn default " data-dismiss="modal" aria-hidden="true">Close</button>
											<button type="submit" name="delete_item" class="btn btn-danger "><i class="fa fa-trash-o"></i> Delete</button>
                                            <input type="hidden" name="my_id" value="<?php echo $row['item_inward']['id']; ?>">
										</div>
                                        </form>
									</div>
								</div>
							</div>
                                    
							</td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                        </tbody>
                        </table>
                                <?php
								}
								?>
                                    
                                </div>
                            </div>
                        </div>
               <?php
	}
}
else
{
	?>
                          <div class="portlet box green-meadow">
                            <div class="portlet-title">
                            <div class="caption">
                            <i class="icon-puzzle"></i> Add a new Stock
                            </div>
                            </div>
                            <div class="portlet-body form">
							<!-- BEGIN FORM-->
                                
                       
      							<form  class="form-horizontal" id="form_sample_2" role="form" method="post">    
                                
                                <div class="form-body">

                              
                                
                                		  <div class="form-group">
													<label class="control-label col-md-3">Item</label>
													<div class="col-md-4">
                                                       <div class="input-icon right">
														<i class="fa"></i>
														<select class="form-control " name="master_item_id">
                                                        <option value="">---select item---</option>
                                                        <?php
														foreach(@$master_item_fetch as $row)
														{
															?>
                                                        <option value="<?php echo $row['master_item']['id']; ?>"><?php echo $row['master_item']['name']; ?></option>
                                                       <?php
														}
														?>
                                                        </select>
                                                        </div>
														<span class="help-block">
														please select item category</span>
													</div>
												</div>
                                                
                                				
                                		  <div class="form-group">
													<label class="control-label col-md-3">Quantity</label>
													<div class="col-md-4">
                                                        <div class="input-icon right">
														<i class="fa"></i>
														<input class="form-control " id="quantity1" onkeyup="allLetter(this.value,this.id);" name="quantitiy" type="text">
                                                        </div>
														<span class="help-block">
														Provide your quantity in digits</span>
													</div>
												</div>
                                
                                
                                			<div class="form-group">
													<label class="control-label col-md-3">Date</label>
													<div class="col-md-4">
                                                        <input class="form-control  date-picker" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y"); ?>" name="date" type="text">
														<span class="help-block">
														Provide your date </span>
													</div>
												</div>
                                                
                                                	<div class="form-group">
													<label class="control-label col-md-3">Remarks</label>
													<div class="col-md-4">
                                                        <input class="form-control "  name="remarks" type="text">
														<span class="help-block">
														Provide your remarks </span>
													</div>
												</div>
                                                
                                                
                                </div>
                          		
            		             <div class="form-actions">
                                 <div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="inward_add" class="btn red "><i class="fa fa-check"></i> Submit</button>
														<button type="button" class="btn default ">Cancel</button>
													</div>
												</div>
								 </div>						
                                </form>
                             
                             </div>
    				    	 <!-- END FORM-->
                             </div>
                             <?php
}
?>
    
 <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function()
{
    <?php
    for($j=0; $j<=$i; $j++)
    { ?>
		var form2 = $('#form<?php echo $j; ?>');
		var error2 = $('.alert-danger', form2);
		var success2 = $('.alert-success', form2);

        form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
					master_item_id: {
						  required: true
                    },
					quantitiy: {
						required: true
					},
                    date: {
                        required: true,
                    },
                  
			},
				
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success2.hide();
                    error2.show();
                    Metronic.scrollTo(error2, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");  
                    icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
					if (element.attr("name") == "counter_id[]") { // for uniform checkboxes, insert the after the given container
                        error.insertAfter("#form_payment_error");
					}
                },

              
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                    var icon = $(element).parent('.input-icon').children('i');
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    icon.removeClass("fa-warning").addClass("fa-check");
					 if (label.attr("for") == "gender" || label.attr("for") == "counter_id[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success2.show();
                    error2.hide();
                    form[0].submit(); // submit the form
                }
            });
           
        <?php } ?>
       
});
</script>
                             
<script>
function allLetter(inputtxt,id)  
{  
//var numbers = /^[-+]?[0-9]+$/;
var numbers =  /^[0-9]*\.?[0-9]*$/;  
if(inputtxt.match(numbers))  
{  

}  
else  
{  
document.getElementById(id).value=""; 
return false;  
}  
} 
</script>                             
                             