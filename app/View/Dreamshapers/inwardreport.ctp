<table class="table table-striped table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr style="background-color:#FFF"><td colspan="6" align="center"><p><div><b><font size="+3" style="font-family:Georgia, 'Times New Roman', Times, serif; color:#099">Inward Report</font></b></div></p></td></tr>
   
    <tr>
    	<th>NO.</th>
        <th>Date</th>
        <th>Category</th>
        <th>Item Type</th>
        <th>Quantity</th>
        <th>Remark</th>
     </tr>
     </thead>
     <tbody>
          
     <?php  
     $subtotal=0;
     $total=0;
     $i=0;
		 foreach($fetch_in_out_ward as $data){ 
		 $i++;
		 $id_fetch_in_out_ward=$data['in_out_ward']['id'];
         $date=$data['in_out_ward']['date'];
         $master_itemcategory_id=$data['in_out_ward']['master_itemcategory_id'];
         $master_item_type_id=$data['in_out_ward']['master_item_type_id'];
         $quantity=$data['in_out_ward']['quantity'];
         $remark=$data['in_out_ward']['remark'];
		 $inward_id=$data['in_out_ward']['inward_id'];         
         ?>
     <tr>
   
             <td><?php echo $i; ?></td>
             <td><?php echo $date; ?></td>
             <td><?php echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_inward_category_fatch',$data['in_out_ward']['master_itemcategory_id']),             array()); ?></td>
            <td> <?php
        echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_item_inward_fetch',$data['in_out_ward']['master_item_type_id']), array());?>
        </td>
             <td><?php echo $quantity; ?></td>
             <td><?php echo $remark; ?></td>
           </tr>


<?php
       }?>
     
     </tbody></table>	