
 
<div class="container-fluid" >
    <div >
        <div class="tabbable tabbable-custom tabbable-noborder">
           
            <div class="tab-content">
          

                     	 <div class="table-responsive">
                         
                         <table border="0" width="100%"><tr><td align="right"><a class="btn default btn-xs blue" style="margin-left:94%; margin-top:4% width:4%; text-align:right;" href="excel_companytariff_report" target="_blank">Excel</a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<td> <a class="btn default btn-xs blue" style="margin-left:4%; margin-top:4% width:4%; text-align:right" target="_blank" onclick="window.print()">Print</a></td></tr></table>
 
 
<!-- <div>
   <?php
		$i=0;
		 foreach($fetch_invoiceadd as $data){ 
		 $i++;
		 $id_invoiceaddress=$data['invoiceadd']['id'];
         
         ?>
         
         <?php echo $data['invoiceadd']['add']; ?>
         
         <?php }?>-->
 <span style="margin-left:5%; color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h2 align="center">Company Tariff Report</h2></span> 
 
 
<table width="100%" border="1" style="border-collapse:collapse; margin-top:1%" bordercolor="#10A062">                        
<thead>
<tr style="background-color:#DFF0D8;">
  
        <th>S. No</th>
        <th>Company Category</th>
        <th>Company Name</th>
        <th> Room Type</th>
        <th> Room Plan</th>
        <th> Date From</th>
        <th>Date To</th>
        <th>Special Rate</th>
        <th>Remarks</th>
    	
     </tr>
     </thead>
     <tbody>
     
     
     
     	<?php
		$i=0;
		 foreach($fetch_fo_room_booking as $data){ 
		 $i++;
		 $id_fo_room_booking=$data['fo_room_booking']['id'];
       $company_id=$data['fo_room_booking']['company_id'];
        $master_room_type_id=$data['fo_room_booking']['master_room_type_id'];
        $master_room_plan_id=$data['fo_room_booking']['master_room_plan_id'];
        $date_from=$data['fo_room_booking']['date_from']; 
        $date_to=$data['fo_room_booking']['date_to']; 
        $special_rate=$data['fo_room_booking']['special_rate']; 
        $remarks=$data['fo_room_booking']['remarks'];    
        
		 ?>
        <tr>
        
        <td align="center"><?php echo $i; ?></td>
       
       <td align="center"><?php echo @$company_category_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_category_fetch',$data['fo_room_booking']['company_category_id']), array()); ?></td>
       
        
       <td align="center"><?php echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$data['fo_room_booking']['company_id']), array()); ?></td>
       
       
       <td align="center"><?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['fo_room_booking']['master_room_type_id']), array()); ?></td>
                  
                <td align="center"><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['fo_room_booking']['master_room_plan_id']), array()); ?></td>
        
         <td align="center"><?php echo date('d-m-Y', strtotime($data['fo_room_booking']['date_from'])); ?></td>
          <td><?php echo date('d-m-Y', strtotime($data['fo_room_booking']['date_to'])); ?></td>

        <td><?php echo $data['fo_room_booking']['special_rate']; ?></td>
       
        <td align="center"><?php echo $data['fo_room_booking']['remarks']; ?></td>
        
         
        
        
        </tr>
        
<?php } ?>
        </tbody>
        </table> 
</div>
  
      </div>
            </div></div></div>
        