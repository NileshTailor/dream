<div class="portlet light">
<div class="portlet-title" align="center">

    <tr style="background-color:#FFF"><td colspan="5" align="center"><p><div><b><font size="+2">Cover Statement Report</font></b></div></p></td></tr>

<table width="100%" border="1" style="border-collapse:collapse; margin-top:1%" bordercolor="#10A062">
<thead>
<tr height="30px" style="background-color:#DFF0D8;" >
    	<th rowspan="2">Outlet Name</th>
       
        <th colspan="3">Breakfast</th>
        <th colspan="3">Lunch</th>
        <th colspan="3">Snacks</th>
        <th colspan="3">Dinner</th>
        <th colspan="3"> TOTAL </th>
</tr>
<tr style="background-color:#DFF0D8;">
		<th>Covers</th><th>Amount</th><th>Average</th> 
        <th>Covers</th><th>Amount</th><th>Average</th> 
        <th>Covers</th><th>Amount</th><th>Average</th> 
        <th>Covers</th><th>Amount</th><th>Average</th>        
        <th>Covers</th><th>Amount</th><th>Average</th>  
</tr>
</thead>
 <tbody>
 <?php
        $total_cover_b='';
        $total_prize_b='';
        $total_cover_l='';
        $total_prize_l='';
        $total_cover_s='';
        $total_prize_s='';
        $total_cover_d='';
        $total_prize_d='';
        
  
 		 foreach($fetch_master_outlet as $ftc_data){ 
         ?>
 		<tr>
 		<th><?php echo $outlet_name=$ftc_data['master_outlet']['outlet_name'];?> </th>
       <?php
     $master_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action'=>'func_cover_statment',$ftc_data['master_outlet']['id']), array());
            $total_cover_breakFst='';
            $total_cover_lunch='';
            $total_cover_snck='';
            $total_cover_dinner='';
            $grand_total_cover='';
            $total_break_amt='';
            $total_lunch_amt='';
            $total_sneck_amt='';
            $total_dinner_amt='';
            $average='';
            $grand_total_amount='';
            $total_average='';
          
     foreach($master_pos_kot_item as $count_data)
     {
    
          $cover=$count_data['pos_kot']['covers'];
          $time=$count_data['pos_kot']['time'];
          $time_conv=strtotime($time);
      // echo"<br />";
    	?>
        <?php
       
          	$form_conv1=strtotime('05:00:00 AM');
            $to_conv1=strtotime('10:00:00 AM');////////////////
            $form_conv2=strtotime('10:00:00 AM');
            $to_conv2=strtotime('03:00:00 PM');////////////
            $form_conv3=strtotime('03:00:00 PM');
            $to_conv3=strtotime('07:00:00 PM');/////////////
            $form_conv4=strtotime('07:00:00 PM');
            $to_conv4=strtotime('04:00:00 AM');///////////
           if($time_conv>=$form_conv1 && $time_conv<=$to_conv1)
            {
                $cover=$count_data['pos_kot']['covers'];
                $total_cover_breakFst+=$cover;
                $master_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action'=>'func_pos_kot_items',$count_data['pos_kot']['id']), array());
                foreach($master_pos_kot_item as $payment)
                {
                	$amount=$payment['pos_kot_item']['amount'];
                    $total_break_amt+=$amount;
                }
            }
            else if($time_conv>=$form_conv2 && $time_conv<=$to_conv2)
            {
                $cover=$count_data['pos_kot']['covers'];
                $total_cover_lunch+=$cover;
                $master_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action'=>'func_pos_kot_items',$count_data['pos_kot']['id']), array());
                foreach($master_pos_kot_item as $payment)
                {
                	$amount=$payment['pos_kot_item']['amount'];
                    $total_lunch_amt+=$amount;
                }
            }
            else if($time_conv>=$form_conv3 && $time_conv<=$to_conv3)
            {
                $cover=$count_data['pos_kot']['covers'];
                $total_cover_snck+=$cover;
                $master_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action'=>'func_pos_kot_items',$count_data['pos_kot']['id']), array());
                foreach($master_pos_kot_item as $payment)
                {
                	$amount=$payment['pos_kot_item']['amount'];
                    $total_sneck_amt+=$amount;
                }
            }
            else if(($time_conv>=$form_conv4 && $time_conv>$to_conv4) || ($time_conv<=$to_conv4 && $time_conv<=$to_conv4) )
            {
                $cover=$count_data['pos_kot']['covers'];
                $total_cover_dinner+=$cover;
                $master_pos_kot_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action'=>'func_pos_kot_items',$count_data['pos_kot']['id']), array());
                foreach($master_pos_kot_item as $payment)
                {
                	$amount=$payment['pos_kot_item']['amount'];
                    $total_dinner_amt+=$amount;
                }
            }
      }
  
?>
<th><?php echo $total_cover_breakFst; ?></th>
<th><?php echo $total_break_amt; ?></th>
<th><?php if(!empty($total_cover_breakFst) && !empty($total_break_amt)){echo $average=$total_break_amt/$total_cover_breakFst;}else {}?></th>

<th><?php echo $total_cover_lunch ?></th>
<th><?php echo $total_lunch_amt; ?></th>
<th><?php if(!empty($total_cover_lunch) && !empty($total_lunch_amt)){echo $average=$total_lunch_amt/$total_cover_lunch;} else {}?></th>

<th><?php echo $total_cover_snck ?></th>
<th><?php echo $total_sneck_amt; ?></th>
<th><?php if(!empty($total_cover_snck) && !empty($total_sneck_amt)){echo $average=$total_sneck_amt/$total_cover_snck;}else{}?></th>

<th><?php echo $total_cover_dinner ?></th>
<th><?php echo $total_dinner_amt; ?></th>
<th><?php if(!empty($total_cover_dinner) && !empty($total_dinner_amt)){echo $average=$total_dinner_amt/$total_cover_dinner;}else{}?></th>

<th><?php echo $grand_total_cover=$total_cover_breakFst+$total_cover_lunch+$total_cover_snck+$total_cover_dinner; ?></th>
<th><?php echo $grand_total_amount=$total_break_amt+$total_lunch_amt+$total_sneck_amt+$total_dinner_amt;?></th>
<th><?php  if(!empty($grand_total_cover) && !empty($grand_total_amount)){ echo $total_average=$grand_total_amount/$grand_total_cover;} else {}?></th>
</tr>
<?php 
$total_cover_b+=$total_cover_breakFst;
$total_prize_b+=$total_break_amt;

$total_cover_l+=$total_cover_lunch;
$total_prize_l+=$total_lunch_amt;

$total_cover_s+=$total_cover_snck;
$total_prize_s+=$total_break_amt; 

$total_cover_d+=$total_cover_dinner;
$total_prize_d+=$total_dinner_amt;

        } ?>
        <tr>
        <th>Total</th>
        <th><?php echo $total_cover_b;?></th>
        <th><?php echo $total_prize_b;?></th>
        <th><?php if(!empty($total_cover_b) && !empty($total_prize_b)){ echo $total_prize_b/$total_cover_b;} else{}?></th>
        
         <th><?php echo $total_cover_l;?></th>
        <th><?php echo $total_prize_l;?></th>
        <th><?php if(!empty($total_cover_l) && !empty($total_prize_l)){ echo $total_prize_l/$total_cover_l;} else{}?></th>
        
         <th><?php echo $total_cover_s;?></th>
        <th><?php echo $total_prize_s;?></th>
        <th><?php if(!empty($total_cover_s) && !empty($total_prize_s)){ echo $total_prize_s/$total_cover_s;} else{}?></th>
        
         <th><?php echo $total_cover_d;?></th>
        <th><?php echo $total_prize_d;?></th>
        <th><?php if(!empty($total_cover_d) && !empty($total_prize_d)){ echo $total_prize_d/$total_cover_d;} else{}?></th>
        
         <th><?php echo $total_all=$total_cover_b+$total_cover_l+$total_cover_s+$total_cover_d;?></th>
        <th><?php echo $total_all_AMt=$total_prize_b+$total_prize_l+$total_prize_s+$total_prize_d;?></th>
        <th><?php if(!empty($total_all) && !empty($total_all_AMt)){ echo $total_all_AMt/$total_all;} else{}?></th>
        </tr>
        </tbody>
        
        </table>
</div>
</div>
       
        