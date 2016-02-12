<title>Billibg Report</title>
<div class="portlet light">
<div class="portlet-title" align="center">
<tr style="background-color:#FFF"><td colspan="5" align="center"><p><div><b><font size="+2" style="font-family:Georgia, 'Times New Roman', Times, serif">POS Plan Kot Summary </font></b></div></p></td></tr>
</div>
<div><table width="100%" height="10%" border="1" style="border-collapse:collapse; margin-top:0%" bordercolor="#10A062" cellpadding="5">
<thead>
<tr style="background-color:#DFF0D8;">
        <th style="text-align:center">S.No.</th>
        <th style="text-align:center"> Date</th>
        <th style="text-align:center">Guest Name</th>
        <th style="text-align:center"> Room No.</th>
        <th style="text-align:center"> Card No.</th>
        <th style="text-align:center"> Session</th>
        <th style="text-align:center"> Plan Combo Price</th>
        
        </tr>
     </thead>
     <tbody>
     
        <?php 
        
		
		$plan_tot='0';
		
        $i=0;
		 foreach($fetch_pos_kot as $data){ 
		 $i++;
		 $id=$data['pos_kot'] ['id'];
		 $discount=$data['pos_kot'] ['foo_discount'];
		 $tips=$data['pos_kot'] ['tips'];
		 $service_charge=$data['pos_kot'] ['service_charge'];
		 $bill_settle_amount=$data['pos_kot'] ['bill_settle_amount'];
		 $bill_settle_due=$data['pos_kot'] ['bill_settle_due'];
		 $plan_rate=$data['pos_kot'] ['plan_rate'];
		 ?>
               
        
       <div><tr>
       <td align="center"><?php echo $i; ?></td>
       <td align="center"><?php echo $data['pos_kot'] ['current_date'] ?></td>
       <td align="center"><?php echo $data['pos_kot'] ['guest_name'] ?></td>
       <td align="center"><b><?php echo $data['pos_kot'] ['master_roomnos_id'] ?></b></td>
       <td align="center"><b><?php echo $data['pos_kot'] ['card_no'] ?></b></td>
<td align="center"><?php  echo $master_session_no_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_session_no_fetch',$data['pos_kot']['session']), array());?></td>
	   <td align="center"><?php echo $data['pos_kot'] ['plan_rate'] ?></td>
        <?php 
		$plan_tot=$plan_tot+$plan_rate;
		} 	?> 
        
        <tr>
        <td align="center"><b></b></td>
        <td align="center"><b></td>
        <td align="center"><b></td>
        <td align="center"><b></td>
        <td align="center"><b>Total</b></td>
        <td align="center"><b><?php echo number_format ("$plan_tot",2) ?></td>
 </tr>
          </tbody>
          </table></div>
                    
            </div>
            </div>