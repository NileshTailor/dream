<br/>
<!--------------------------->
<Div align="center"><table><tr style="background-color:#CFC">
<th colspan="3"><p align="center">Report From <?php echo date('d-m-y', strtotime($from));?> <b>To</b> <?php echo date('d-m-y', strtotime($to));?></p></th>
</tr></table></Div><br>
<table class="table  table-bordered " style="margin-top:1px" id="sample_1">
<thead>

                <tr style="background-color:#CFC">
               <?php
                foreach($fetch_ledger_category as $data1){
				// pr($result_ledger);
				$ledger_m_id=$data1['ledger_master']['id'];
				$name=$data1['ledger_master']['name'];
				?>
                <th><p align="center"><?php echo $name;?></p></th>
                <?php }?>
                </tr>
                
                </thead>
                
                
     <tbody>
    
	 <?php
			    foreach($fetch_ledger_category as $data1){
				// pr($result_ledger);
				$ledger_m_id=$data1['ledger_master']['id'];
				?>
                
			<?php
			 $total_cat_cr=0;$total_cat_cr1=0;$total_cat_cr2=0;
			    foreach($result_ledger as $data){
			   // pr($result_ledger);
				$ledger_id=$data['ledger']['id'];
				$ledger_category_id=$data['ledger']['ledger_category_id'];
				$transaction_date=$data['ledger']['transaction_date'];
				$transaction_date=date("d-m-Y",strtotime($transaction_date));
				$result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), 
				array($ledger_category_id));
				$category_name=$result_ledger_category[0]['ledger_category']['name'];
				$result_ledger_category=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_category_name_by_id'), 
				array($ledger_category_id));
				
				 $result_ledger_cr_dr=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_ledger_cr_dr_id'), array($ledger_id, $ledger_m_id));
				//pr($result_ledger_cr_dr);
                            foreach($result_ledger_cr_dr as $data){
							$ledger_master_id=$data['ledger_cr_dr']['ledger_master_id'];
							$cr=$data['ledger_cr_dr']['cr'];
							$fnb_array[$ledger_master_id][]=$cr;
							
			 $total_cat_cr+=$cr; 
			 } ?>
            
			<?php }?>
            <?php }
			
			?>
           
            <?php
			$jj=0;
			$max_size1=0;
			foreach($fetch_ledger_category as $data1)
			{
			 		$ledger_m_id=$data1['ledger_master']['id'];
					@$max_size=sizeof($fnb_array[$ledger_m_id]);
					if($max_size1<$max_size)
					{
						$max_size1=$max_size;
					}

			}
			for($i=0; $i<$max_size1; $i++)
			{
				?>
                <tr>
                <?php
				foreach($fetch_ledger_category as $data1)
				{
					$ledger_m_id=$data1['ledger_master']['id'];
					?>
                    <td align="center"><?php echo @$fnb_array[$ledger_m_id][$i];?></td>
					<?php
				}
				?>
                
                </tr>
                
                <?php  }				
				 ?>
            
            
            
            
            
            
     </tbody>
         </table>