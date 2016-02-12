<div class="row">
<div style="width:85%; margin-left:50px">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Add Address
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab_1_1">
                   
<form method="post" enctype="multipart/form-data">


<table width="100%" border="0">
<tr><td width="30%">

   <label> Select image to upload:</label></td>
    <td style="padding-left:10px; padding-bottom:5px">
    <input type="file" name="file"></td></tr>
    <tr><td><label>Name</label></td>
    <td style="padding-bottom:5px"><input type="text" class="form-control" name="name" width="100%" /></td></tr>
    <tr><td><label>Address</label></td>
    <td style="padding-bottom:5px"><input type="text" class="form-control" name="add" width="100%" /></td></tr>
    <tr><td><label>Contact No.</label></td>
    <td style="padding-bottom:5px"><input type="text" class="form-control" name="contact" width="800px" /></td></tr>
    <tr><td><label>Email Address</label></td>
    <td style="padding-bottom:10px"><input type="text" class="form-control" name="email" width="800px" /></td></tr>
    <tr><td><label>Web Address</label></td>
    <td style="padding-bottom:10px"><input type="text" class="form-control" name="web" width="800px" /></td></tr>
    <tr><td><label>Service Tax No.</label></td>
    <td style="padding-bottom:10px"><input type="text" class="form-control" name="service_tax_no" width="800px" /></td></tr>
    <tr><td><label>TIN NO.</label></td>
    <td style="padding-bottom:10px"><input type="text" class="form-control" name="tin_no" width="800px" /></td></tr>
    
  <tr><td colspan="2" align="center"><button type="submit" class="btn green"  name="add_address" value="Submit"><i class="fa fa-plus"></i> Submit</button>
 <button type="reset" name="" class="btn red " value="add_address"><i class="fa fa-level-down"></i> Reset</button></td></tr>

    
    </table>
</form>

</div></div></div>
</div></div></div>

<div style="width:100%">
<div class="table-responsive">
  <table class="table table-bordered table-hover" id="sample_1">
	<thead>
    <tr>
        <th width="5%">S.No</th>
        <th>File</th>
        <th>Name</th>
        <th>Add</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Web</th>
        <th>Service TaxNo.</th>
        <th>TIN No.</th>
        <th>Edit</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_address as $data){ 
		 $i++;
		 $id=$data['address'] ['id'];
        $file=$data['address'] ['file'];
        $name=$data['address'] ['name'];
        $add=$data['address'] ['add'];
         $contact=$data['address'] ['contact'];
          $email=$data['address'] ['email'];
           $web=$data['address'] ['web'];
           $service_tax_no=$data['address'] ['service_tax_no'];
           $tin_no=$data['address'] ['tin_no'];
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['address'] ['file']; ?></td>
        <td><?php echo $data['address'] ['name']; ?></td>
        <td><?php echo $data['address'] ['add']; ?></td>
        <td><?php echo $data['address'] ['contact']; ?></td>
        <td><?php echo $data['address'] ['email']; ?></td>
        <td><?php echo $data['address'] ['web']; ?></td>
        <td><?php echo $data['address'] ['service_tax_no']; ?></td>
        <td><?php echo $data['address'] ['tin_no']; ?></td>
        
        
									<td><a class="btn blue btn-xs blue" data-toggle="modal" href="#poppupser_<?php echo $id; ?>"><i class="fa fa-edit"> </i>
								Edit </a>
								<div class="modal fade bs-modal-md" id="poppupser_<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
										<div class="modal-body">
                                        <form method="post" name="edit_<?php echo $id; ?>">
                                        <div class="table-responsive">
                        <table class="table self-table" style=" width:100% !important;" border="0" align="center">
                        <tr>   
                        <input type="hidden" name="logo" value="<?php echo $id; ?>" />
                           <td width="30%"><label> Select image to upload:</label></td>
    <td style="padding-left:10px; padding-bottom:5px">
    <input type="file" name="edit_file"></td></tr>
    <tr><td><label>Name</label></td>
    <td style="padding-bottom:5px"><input type="text" class="form-control" name="edit_name" width="100%" value="<?php echo $name;?>" /></td></tr>
    <tr><td><label>Address</label></td>
    <td style="padding-bottom:5px"><input type="text" class="form-control" name="edit_add" width="100%" value="<?php echo $add;?>" /></td></tr>
    <tr><td><label>Contact No.</label></td>
    <td style="padding-bottom:5px"><input type="text" class="form-control" name="edit_contact" width="800px" value="<?php echo $contact;?>" /></td></tr>
    <tr><td><label>Email Address</label></td>
    <td style="padding-bottom:10px"><input type="text" class="form-control" name="edit_email" width="800px" value="<?php echo $email;?>" /></td></tr>
    <tr><td><label>Web Address</label></td>
    <td style="padding-bottom:10px"><input type="text" class="form-control" name="edit_web" width="800px" value="<?php echo $web;?>" /></td></tr>
    <tr><td><label>Service Tax No.</label></td>
    <td style="padding-bottom:10px"><input type="text" class="form-control" name="edit_service_tax_no" value="<?php echo $service_tax_no;?>" width="800px" /></td></tr>
    <tr><td><label>TIN NO.</label></td>
    <td style="padding-bottom:10px"><input type="text" class="form-control" name="edit_tin_no" value="<?php echo $tin_no;?>" width="800px" /></td></tr>
    
  <tr><td colspan="2" align="center"><button type="submit" class="btn blue"  name="edit_address"><i class="fa fa-plus"></i> Update</td></tr>
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
            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                            
                        </div>
                       
                        <div class="modal-footer">
                             <form method="post" name="delete<?php echo $id; ?>">
                             <input type="hidden" name="delete_logo_id" value="<?php echo $id; ?>" />

                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_address" value="delete_address" class="btn blue">Delete</button>
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
</div></div>