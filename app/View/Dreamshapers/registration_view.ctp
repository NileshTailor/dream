
						
							<span style="margin-left:11%" class="caption-subject font-green-sharp bold uppercase">Registration View</span>

<!--<a class="btn default btn-xs blue" style="margin-left:94%; margin-top:4% width:4%" href="excel_registration" target="_blank">Excel</a>-->
<div style="overflow-y:scroll; max-height:420px">
<table class="table table-striped table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr>
    	<th>S.No</th>
        <th>Name</th>
        <th>S/W/D of</th>
        <th>Permanent Adderss</th>
        <th>Mobile No.</th>
        <th>Email</th>
        <th>Nationality</th>
        <th>Occupation</th>
        <th>Card No</th>
        <th>Edit</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		 foreach($registrations as $data){ 
		 $i++;
		 $id=$data['registration'] ['id'] 
		 ?>
        <tr>
        
        <td><?php echo $i; ?></td>
        <td><?php echo $data['registration'] ['name'] ?></td>
        <td><?php echo $data['registration'] ['swd_of'] ?></td>
        <td><?php echo $data['registration'] ['p_address'] ?></td>
        <td><?php echo $data['registration'] ['mobile_no'] ?></td>
        <td><?php echo $data['registration'] ['email'] ?></td>
        <td><?php echo $data['registration'] ['nationality'] ?></td>
        <td><?php echo $data['registration'] ['occupation'] ?></td>
        <td><?php echo $data['registration'] ['card_id_no'] ?></td>
        <!--<td><a href="registration_pdf?id_pdf=<?php echo $id; ?>" target="_blank" class="btn green btn-xs"><i class="fa fa-print"></i> PDF</a></td>-->
        <td><a href="registration_edit?id=<?php echo $id; ?>" target="_blank" class="btn blue btn-xs"><i class="fa fa-edit"></i> Edit</a></td>
        <td>
            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete<?php echo $id ?>" tabindex="-1" role="delete" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            <a href="registration_delete?deleteId=<?php echo $id; ?>" class="btn default btn-xl red"><i class="fa fa-trash-o"></i> Delete</a>
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

  