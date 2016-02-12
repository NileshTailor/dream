 
<div class="container-fluid" >
    <div >
        <div class="tabbable tabbable-custom tabbable-noborder">
           
            <div class="tab-content">
          

                     	 <div class="table-responsive">
   
   
   <table border="0" width="100%"><tr><td align="right"><a class="btn default btn-xs blue" style="margin-left:94%; margin-top:4% width:4%" href="excel_companyreport" target="_blank">Excel</a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <td align="right"><a class="btn default btn-xs blue" style="margin-left:4%; margin-top:4% width:4%" target="_blank" onclick="window.print()">Print</a></td></tr></table>
   
 <!-- <div>
   <?php
		$i=0;
		 foreach($fetch_invoiceadd as $data){ 
		 $i++;
		 $id_invoiceaddress=$data['invoiceadd']['id'];
         
         ?>
         
         <?php echo $data['invoiceadd']['otheradd']; ?>
         
         <?php }?>-->
                 
<span style="margin-left:5%; color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h2 align="center">Company Report</h2></span>
	
 


<div ><table width="100%" border="1" style="border-collapse:collapse; margin-top:1%" bordercolor="#10A062">
<thead>
<tr style="background-color:#DFF0D8;">
    
        <th>S. No</th>
        <th>Company Name</th>
        <th>Company Category</th>
        <th>Authorized Person Name</th>
        <th>Authorized Contact No.</th>
        <th>Authorized Email id</th>
        <th>Telephone No.</th>
        <th>Mobile No.</th>
        <th>Permanent Adderss</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_company_registration as $data){ 
		 $i++;
		 $id_company_registration=$data['company_registration']['id'];
         
         
            $company_name=$data['company_registration']['company_name'];
            $company_category_id=$data['company_registration']['company_category_id'];
            $pan_no=$data['company_registration']['pan_no'];
            $service_tax_no=$data['company_registration']['service_tax_no'];
            $authorized_person_name=$data['company_registration']['authorized_person_name'];
            $telephone_no=$data['company_registration']['telephone_no'];
            $authorized_contact_no=$data['company_registration']['authorized_contact_no'];
            $mobile_no=$data['company_registration']['mobile_no'];
            $authorized_email_id=$data['company_registration']['authorized_email_id'];
            $c_address=$data['company_registration']['c_address'];
            $master_plan_id=$data['company_registration']['master_plan_id'];
            $p_address=$data['company_registration']['p_address'];
		 ?>
        <tr>
        <td align="center"><?php echo $i;?></td>
                <td align="center"><?php echo $data['company_registration']['company_name']; ?></td>
                <td align="center">
        <?php
        
        echo @$company_category_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_category_fetch',$data['company_registration']['company_category_id']), array()); ?>
        </td>
        <td align="center"><?php echo $data['company_registration'] ['authorized_person_name']; ?></td>
        <td align="center"><?php echo $data['company_registration'] ['authorized_contact_no']; ?></td>
        <td align="center"v><?php echo $data['company_registration'] ['authorized_email_id']; ?></td>
        
        
        <td align="center"><?php echo $data['company_registration'] ['telephone_no']; ?></td>
        <td align="center"><?php echo $data['company_registration'] ['mobile_no']; ?></td>
        <td align="center"><?php echo $data['company_registration'] ['c_address']; ?></td>
        </tr>
        
<?php } ?>
        </tbody>
        </table> 
</div>
      </div>
            </div></div></div>
        
           
        	