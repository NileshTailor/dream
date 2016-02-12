<table class="table table-striped table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr style="background-color:#FFF"><td colspan="6" align="center"><p><div><b><font size="+3" style="font-family:Georgia, 'Times New Roman', Times, serif; color:#099">Available Inventory</font></b></div></p></td></tr>
    <tr>
    	<th>NO.</th>
        <th>Category</th>
        <th>Item Type</th>
        
     </tr>
     </thead>
     
     <tr><td>
     <tbody style="float:left">
     <?php  
     $subtotal=0;
     $total=0;
     $i=0;
		 foreach($fetch_stock as $data){ 
		 $i++;
		 $id=$data['stock']['id'];
         $master_itemcategory_id=$data['stock']['master_itemcategory_id'];
         $itemtype_name=$data['stock']['itemtype_name'];
         ?>
     <tr>
             <td><?php echo $i; ?></td>
             <td><?php echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_inward_category_fatch',$data['stock']['master_itemcategory_id']),             array()); ?></td>
            <td><?php echo $itemtype_name;?></td>
		</tr><?php }?>
     </tbody>
     </td>
     
     <td>
     <tbody style="float:right">
          
     <?php  
     $subtotal=0;
     $total=0;
     $i=0;
		 foreach($fetch_stock as $data){ 
		 $i++;
		 $id=$data['stock']['id'];
         $master_itemcategory_id=$data['stock']['master_itemcategory_id'];
         $itemtype_name=$data['stock']['itemtype_name'];
         ?>
     <tr>
             <td><?php echo $i; ?></td>
             <td><?php echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_inward_category_fatch',$data['stock']['master_itemcategory_id']),             array()); ?></td>
            <td><?php echo $itemtype_name;?></td>
		</tr><?php }?>
     </tbody></td></tr>
     </table>	