<div class="portlet light">
<div class="portlet-title" align="center">

    <tr style="background-color:#FFF"><td colspan="5" align="center"><p><div><b><font size="+2">Summary of Sales</font></b></div></p></td></tr>


<table width="100%" border="1" style="border-collapse:collapse; margin-top:1%" bordercolor="#10A062">
<thead>


<tr style="background-color:#DFF0D8;">
   		<th>S.No</th>
        <th>Bill No.</th>
        <th>Date</th>
        <th>Guest Name</th>
        <th></th>
        <th>Table</th>
        <th>Covers</th></tr>
        
        <tr style="border-bottom:groove;" bgcolor="#DFF0D8">
        <th></th>
        <th>Item Name</th>
        <th></th>
        <th></th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Amount</th>
        </tr>
     </thead>
     <tbody>
   <?php
   
		$i=0;
		
		 foreach($fatch_billing_kot_data as $data){ 
		  
		 $i++;
		 $id=$data['pos_kot'] ['id'];
		 
		 ?>
       
<tr style="background-color:#DFF0D8;">
        <td><?php echo $i; ?></td>
        <td><?php echo $data['pos_kot']['id']; ?></td>
        <td><?php echo $data['pos_kot']['current_date']; ?></td>
        <td><?php echo $data['pos_kot']['guest_name']; ?></td>
        <td>&nbsp;</td>
        <td><?php  echo $table_no=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$data['pos_kot']['master_tables_id']), array());?></td>
        
            <td><?php echo $data['pos_kot']['covers']; ?></td>
            </tr>
            <?php $fatch_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fatch_pos_kot_item',$data['pos_kot']['id']), array());
            $grandtotal=0;
            foreach($fatch_pos_kot_item as $data1){ 
            $id=$data1['pos_kot_item'] ['id'] ;
            ?>
            
            <tr>
            <td>&nbsp;</td>
            <td><?php  echo $master_itemtype_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' =>          'master_itemtype_fetch',$data1['pos_kot_item']['master_items_id']), array());?>
            <?php  echo $master_planitemtype_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_planitemtype_fetch',$data1['pos_kot_item']['master_itemss_id']), array());?>
            <td>&nbsp;</td><td>&nbsp;</td>
            <td><?php echo $data1['pos_kot_item']['quantity']; ?></td>
            <td><?php echo $data1['pos_kot_item']['rate']; ?></td>
            <td><?php echo $data1['pos_kot_item']['amount']; ?></td></tr>
            <?php 
            $grandtotal=$grandtotal+$data1['pos_kot_item']['amount'];
            } 
            ?>
            <tr><td colspan="6" align="right"><label><b>Sub Total:</b></label>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b><?php echo number_format ("$grandtotal",2) ?></b></td></tr>
            <?php }  ?>   
            <div3></div3>
            </tbody>
            </table> 
            
            </div>
            </div>
            
            
