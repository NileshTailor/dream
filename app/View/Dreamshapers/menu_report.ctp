<table class="table table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
     <?php  
		 foreach($fetch_menu_category as $data){ 
		 $idg=$data['menu_category']['id'];
		 $menu_category_id=$data['menu_category']['menu_category_id'];
		 $rate=$data['menu_category']['rate'];
         ?>
          <tr style="background-color:#FFF; color:#FFF"><td colspan="5" align="center" style="background-color:#066"><p><div><b><font size="+2"><?php echo $menu_category_id; ?>&nbsp;&nbsp; Rs. <?php echo $rate; ?></td></b></font></b></div></p></td></tr>
	 <?php }?>
     </thead>
     <tbody>
     
     
     <?php  
     $subtotal=0;
     $total=0;
    $i=0;
		 foreach($fetch_menu_category_item as $data){ 
		 //$i++;
		 $id=$data['menu_category_item']['id'];
		 $menu_category_idd=$data['menu_category_item']['menu_category_idd'];
		  $master_item_type_id=$data['menu_category_item']['master_item_type_id'];
         $item_name_id=$data['menu_category_item']['item_name_id'];
		 $explode_data=explode(',', $item_name_id);
         
		 ?>
         
         
         
      <tr>
     <td style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:15px; color:#000"><b>
        <?php	
        echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_item_fetch',$data['menu_category_item']['master_item_type_id']), array()); ?>
        <?php echo '<b>:</b>'?>
        </td></b></tr>
     <tr>
            <td><?php
			
            foreach($explode_data as $menuitem)
            {
				$i++;
				echo $i;
				echo '.  ';
            echo @$menu_item_cat_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'menu_item_cat_fetch',$menuitem), array());
			echo '<br>';
			
            }
            ?></td>
</tr>
	 <?php 
	}
		 ?>
		
     
         
         
         
         </tbody></table>