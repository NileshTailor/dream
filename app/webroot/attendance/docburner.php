<?php
require_once("connect.php");
@header("Content-type: application/vnd.ms-excel" );
@header("Content-Disposition: attachment; filename=".$_POST['excel_for'].".xls" );
header("Pragma: ");  
header("Cache-Control: ");  
date_default_timezone_set('asia/kolkata');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function datefordb($date)
{$date_new=date("Y-m-d",strtotime($date));return($date_new);}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function dateforview($date)
{
$date_no='N/A';	
$date_new=date("d-m-Y",strtotime($date));
if($date_new=='01-01-1970')
return($date_no);
else
return($date_new);}///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function fetchdepartmentname($id)
{
$result=mysql_query("select `name` from `department` where `id`='".$id."'");
$row=mysql_fetch_array($result);
$name = $row['name'];
return($name);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function fetchemployeename($id)
{
$result=mysql_query("select `name`,`code` from `registration` where `id`='".$id."'");
$row=mysql_fetch_array($result);
$name = $row['name'];
$code = $row['code'];
return($name." [".$row['code']."]");
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function returnDates($fromdate, $todate) {
    $fromdate = \DateTime::createFromFormat('d-m-Y', $fromdate);
    $todate = \DateTime::createFromFormat('d-m-Y', $todate);
    return new \DatePeriod(
        $fromdate,
        new \DateInterval('P1D'),
        $todate->modify('+1 day')
    );
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function get_time_difference($time1, $time2)
{
    $time1 = strtotime("1/1/1980 $time1");
    $time2 = strtotime("1/1/1980 $time2");
    if ($time2 < $time1)
    {   
	 	$time2 = $time2 + 86400;
    }
    return ($time2-$time1) / 3600;
} 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_POST['excel_for']=='attendance')
	{
							$depart_id=$_POST['depart_id'];
							$from=$_POST['date_from'];
							$to=$_POST['date_to'];
		?>
        					 <table width="100%" border="1" style="border-collapse:collapse;"  bordercolor="#10A062" cellpadding="0" cellspacing="0">
                            <thead>
                            <tr style="background-color:#DFF0D8;" >
                            <th style="text-align:left !important;">Name [code]</th>
                            <?php
                            $datePeriod = returnDates($from, $to);
                            foreach($datePeriod as $date) {
                            //$date->format('d-m-Y'), PHP_EOL;
                            $all_dates[]=$date->format('d-m-Y');						  
                            ?>
                            <th class="verticalTableHeader"><?php echo $date->format('d'); ?></th>
                            <?php  
						   }
                           ?>
                           <th>TOTAL</th>
                           <th>WAGES</th>
                           <th>AMOUNT</th>
                           <th>ADVANCE</th>
                           <th>BALANCE</th>
                           <th>O.T. Rate</th>
                           <th>TOTAL O.T. Hours</th>
                           <th>O.T. WAGES</th>
                           <th>TOTAL SALARY</th>
                           </tr>
                          </thead>
                          <tbody>
                           <?php
						   	   $s=0;
							   $result=mysql_query("select `id`,`name`,`wages` from `registration` where `depart_id`='".$depart_id."' ");
							   while($row=mysql_fetch_array($result))
							   {
								   $total_days=0;
								   $total_half=0;
								   ?>
                                   <tr>
                                   <th style="text-align:left !important;"><?php echo fetchemployeename($row['id']); ?></th>
                                   <?php
								for($k=0;$k<sizeof($all_dates);$k++)
						   		{
								   $result_attend=mysql_query("select `status` from `attendance` where `reg_id`='".$row['id']."' && `attendance_date`='".datefordb($all_dates[$k])."'");
								   $row_attend=@mysql_fetch_array($result_attend);
								   $status=$row_attend['status'];
								   if(empty($status))
								   {$status='A';}
								   if($status=='P')
								   {
									   $total_days++;
								   }
								   else if($status=='H')
								   {
									   $total_half+=0.5;
								   }
								   ?>
                                   <td><?php if($status=='P'){ ?> <?php echo $status; ?>  <?php } 
								   	else if($status=="A") { ?> <?php echo $status; ?>  <?php }
									else { ?>  <?php echo $status; ?>  <?php } ?></td>
                                   <?php
								}
		    				     $amount=round(($total_days+$total_half)*$row['wages']);
								 $advance_amnt=0;
								 $res_advance=mysql_query("select `amount` from `advance` where `reg_id`='".$row['id']."' and  `advance_given_date` between '".datefordb($from)."' AND '".datefordb($to)."' ");
								 while($row_advance=@mysql_fetch_array($res_advance))
								 {
								 $advance_amnt+=$row_advance['amount'];
								 }
								 $balance=$amount-$advance_amnt;
								 $overtime_rate=(@$row['wages']/7);
								 
								 $net_time=0;
								 $res_overtime=mysql_query("select  `total_overtime`  from `overtime` where `reg_id`='".$row['id']."' and  `overtime_date` between '".datefordb($from)."' AND '".datefordb($to)."' ");
								 while($row_time=@mysql_fetch_array($res_overtime))
								 {
								 $total_overtime=$row_time['total_overtime'];
								 $net_time+=$total_overtime;
								// $net_time+=get_time_difference($time1, $time2);
								 }
								 $overtime_amnt=round($net_time*$overtime_rate);
								?>
                                    <td><?php echo $total_days+$total_half; ?></td>
                                    <td><?php echo $row['wages']; ?></td>
                                    <td><?php echo $amount; ?></td>
                                    <td><?php echo $advance_amnt; ?></td>
                                    <td><?php echo $balance; ?></td>
                                    <td><?php echo number_format($overtime_rate,3); ?></td>
                                    <td><?php echo number_format($net_time,2); ?></td>
                                    <td><?php echo $overtime_amnt; ?></td>
                                    <td><strong><?php echo $balance+$overtime_amnt; ?></strong></td>
                               </tr> 
                                <?php
							   }
							   ?>
                               <tr>
                               <td colspan="<?php echo sizeof($all_dates)+10; ?>">&nbsp;</td>
                               </tr>
                           </tbody>    
                           </table>
                           <?php
	}
    
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($_POST['excel_for']=='overtime')
{
								$depart_id=$_POST['depart_id'];
								$from=$_POST['date_from'];
								$to=$_POST['date_to'];
	?>
	 							<table width="100%" border="1" style="border-collapse:collapse;"  bordercolor="#10A062" cellpadding="0" cellspacing="0">
                                <thead class="flip-content">
                                <tr style="background-color:#DFF0D8;">
                                <th style="text-align:left !important;">Name [code]</th>
                                <?php
								$datePeriod = returnDates($from, $to);
								foreach($datePeriod as $date) {
								//$date->format('d-m-Y'), PHP_EOL;
								$all_dates[]=$date->format('d-m-Y');						  
							 	?>
                                <th class="verticalTableHeader"><?php echo $date->format('d'); ?></th>
                                <?php  
						   }
                           ?>
                           <th>TOTAL O.T. Hours</th>
                           <th>O.T. Rate</th>
                           <th>O.T. Amount</th>
                           </tr>
                          </thead>
                          <tbody>
                           <?php
						   	   $s=0;
							   $result=mysql_query("select `id`,`name`,`wages` from `registration` where `depart_id`='".$depart_id."' ");
							   while($row=mysql_fetch_array($result))
							   {
								   $total_days=0;
								   $total_half=0;
								   ?>
                                   <tr>
                                   <th style="text-align:left !important;"><?php echo fetchemployeename($row['id']); ?></th>
                                   <?php
								   $all_time=0;
								for($k=0;$k<sizeof($all_dates);$k++)
						   		{
									$net_time=0;
								    $res_overtime=mysql_query("select  `total_overtime` from `overtime` where `reg_id`='".$row['id']."' && `overtime_date`='".datefordb($all_dates[$k])."'");
   								 while($row_time=@mysql_fetch_array($res_overtime))
								 {
								 $total_overtime=$row_time['total_overtime'];
								$net_time+=$total_overtime;
								$all_time+=$total_overtime;
								 }
								 ?>
                                 <td <?php if($net_time>0){ ?> style="background-color:#EBFCEE;" <?php } ?>><strong><?php if($net_time>0) { echo number_format($net_time,2); } else { echo '-'; }?></strong></td>
                                 <?php
								}
		    				     $overtime_rate=(@$row['wages']/7);
								?>
                                    <td><?php echo number_format($all_time,2); ?></td>
                                    <td><?php echo number_format($overtime_rate,3); ?></td>
                                    <td><strong><?php echo round($all_time*$overtime_rate); ?></strong></td>
                               </tr> 
                                <?php
							   }
							   ?>
                               <tr>
                               <td colspan="<?php echo sizeof($all_dates)+4; ?>">&nbsp;</td>
                               </tr>
                           </tbody>    
                           </table>
                           <?php
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($_POST['excel_for']=='advance')
{
								$depart_id=$_POST['depart_id'];
								$from=$_POST['date_from'];
								$to=$_POST['date_to'];
	?>
	 							 <table width="100%" border="1" style="border-collapse:collapse;"  bordercolor="#10A062" cellpadding="0" cellspacing="0">
                                <thead class="flip-content">
                                <tr style="background-color:#DFF0D8;">
                                <th style="text-align:left !important;">Name [code]</th>
                                <?php
								$datePeriod = returnDates($from, $to);
								foreach($datePeriod as $date) {
								//$date->format('d-m-Y'), PHP_EOL;
								$all_dates[]=$date->format('d-m-Y');						  
							 	?>
                                <th class="verticalTableHeader"><?php echo $date->format('d'); ?></th>
                                <?php  
						   }
                           ?>
                           <th>TOTAL AMOUNT</th>
                           </tr>
                          </thead>
                          <tbody>
                           <?php
						   	   $s=0;
							   $result=mysql_query("select `id`,`name`,`wages` from `registration` where `depart_id`='".$depart_id."' ");
							   while($row=mysql_fetch_array($result))
							   {
								   $total_days=0;
								   $total_half=0;
								   ?>
                                   <tr>
                                   <th style="text-align:left !important;"><?php echo fetchemployeename($row['id']); ?></th>
                                   <?php
								   $all_advance1=0;
								for($k=0;$k<sizeof($all_dates);$k++)
						   		{
									 $advance_amnt1=0;
								     $res_advance1=mysql_query("select `amount` from `advance` where `reg_id`='".$row['id']."' and  `advance_given_date`='".datefordb($all_dates[$k])."'");
								 while($row_advance1=@mysql_fetch_array($res_advance1))
								 {
								 $advance_amnt1+=$row_advance1['amount'];
								 $all_advance1+=$row_advance1['amount'];
								 }
								 ?>
                                 <td <?php if($advance_amnt1>0){ ?> style="background-color:#EBFCEE;" <?php } ?>><strong><?php if($advance_amnt1>0) { echo $advance_amnt1;  } else { echo "-"; } ?></strong></td>
                                 <?php
								}
								?>
                                    <td><strong><?php echo round($all_advance1); ?></strong></td>
                               </tr> 
                                <?php
							   }
							   ?>
                               <tr>
                               <td colspan="<?php echo sizeof($all_dates)+2; ?>">&nbsp;</td>
                               </tr>
                           </tbody>    
                           </table>
                           <?php
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($_POST['excel_for']=='department')
{
							
							$from=$_POST['date_from'];
							$to=$_POST['date_to'];
	?>
    							<?php
								 $datePeriod_1 = returnDates($from, $to);
								foreach($datePeriod_1 as $date_1) {
								//$date->format('d-m-Y'), PHP_EOL;
								$all_dates_1[]=$date_1->format('d-m-Y');}
								?>
                                <table  width="100%" border="1" style="border-collapse:collapse;"  bordercolor="#10A062" cellpadding="0" cellspacing="0">
                                <thead>
                                <tr style="background-color:#DFF0D8;">
                                <th colspan="<?php echo sizeof($all_dates_1)+2; ?>" style="text-align:center;background-color:#EBFCEE;">Attendance Amount</th>
                                </tr>
                                <tr>
                                <th>Name</th>
                                <?php
								$datePeriod = returnDates($from, $to);
								foreach($datePeriod as $date) {
								//$date->format('d-m-Y'), PHP_EOL;
								$all_dates[]=$date->format('d-m-Y');						  
							 	?>
                                <th class="verticalTableHeader" style="text-align:center !important;"><?php echo $date->format('d'); ?></th>
                                <?php  
						   }
                           ?>
	                           <th style="text-align:center !important;">Total</th>
                           </tr>
                          </thead>
                          <tbody>
                           <?php
						   	   $s=0;
							   $result=mysql_query("select * from `department` order by `id`");
							   while($row=mysql_fetch_array($result))
							   {
								 $all_reg="";  
								 $all_emp=mysql_query("select distinct `id` from `registration` where `depart_id`='".$row['id']."'");
								 while($row_emp=@mysql_fetch_array($all_emp))
								 {
									 $all_reg[]=$row_emp['id'];
								 }
								   ?>
                                   <tr>
                                   <th><?php echo $row['name']; ?></th>
                                   <?php
								    $amount_all_month=0;
									$attend_all_day='';
								for($i=0;$i<sizeof($all_dates);$i++)
						   		{
									$amnt_per_day=0;
									$attend_per_day='';
									for($j=0;$j<sizeof($all_reg);$j++)
									{
										   $amount=0;
										   $attend=0;
										   $result_attend=mysql_query("select `status` from `attendance` where `reg_id`='".$all_reg[$j]."' && `attendance_date`='".datefordb($all_dates[$i])."'");
										   $row_attend=@mysql_fetch_array($result_attend);
										   $status=$row_attend['status'];
										   if(mysql_num_rows($result_attend)>0)
										   {
										   $result_wages=mysql_query("select `wages` from `registration` where `id`='".$all_reg[$j]."'");
										   $row_wages=@mysql_fetch_array($result_wages);
										   
										   if($status=='P')
										   {
											   $amount=$row_wages['wages'];
											   $attend+=1;
										   }
										   else if($status=='H')
										   {
											   $amount=$row_wages['wages']/2;
											   $attend+=0.5;
										   }
										   else
										   {
											   $amount=0;
											   $attend=0;
										   }
										   }
										   $amnt_per_day+=$amount;
										   $attend_per_day+=$attend;
									}
								 		   $amount_all_month+=$amnt_per_day;
										   $attend_all_day+=$attend_per_day;
								?>
                                <!-- <td><?php echo round($amnt_per_day); ?></td> -->
	                                 <td><?php echo $attend_all_day; ?></td>
                                 <?php
								}
								?>
                             <!--   <th style="text-align:center !important;"><?php echo round($amount_all_month); ?></th> -->
                             		<th style="text-align:center !important;"><?php echo $attend_all_day; ?></th>
                               </tr> 
                                <?php
							   }
							   ?>
                               <tr>
                               <td colspan="<?php echo sizeof($all_dates)+2; ?>">&nbsp;</td>
                               </tr>
                           </tbody>    
                           </table>
                           </div>
                           
                           <hr/>
                              <table width="100%" border="1" style="border-collapse:collapse;"  bordercolor="#10A062" cellpadding="0" cellspacing="0" >
                                <thead>
                                <tr style="background-color:#DFF0D8;">
								<?php
                                $datePeriod_2 = returnDates($from, $to);
                                foreach($datePeriod_2 as $date_2) {
                                $all_dates_2[]=$date_2->format('d-m-Y');}
                                ?>
                                <th colspan="<?php echo sizeof($all_dates_2)+2; ?>" style="text-align:center;background-color:#EBFCEE;">Overtime Amount</th>
                                </tr>
                                <tr>
                                <th>Name</th>
                                <?php
								$datePeriod_ot = returnDates($from, $to);
								foreach($datePeriod_ot as $date_ot) {
								$all_dates_ot[]=$date_ot->format('d-m-Y');						  
							 	?>
                                <th class="verticalTableHeader" style="text-align:center !important;"><?php echo $date_ot->format('d'); ?></th>
                                <?php  
						   }
                           ?>
	                           <th style="text-align:center !important;">Total</th>
                           </tr>
                          </thead>
                          <tbody>
                           <?php
							   $result_ot=mysql_query("select * from `department` order by `id`");
							   while($row_ot=mysql_fetch_array($result_ot))
							   {
								 $all_reg_ot="";  
								 $all_emp_ot=mysql_query("select distinct `id` from `registration` where `depart_id`='".$row_ot['id']."'");
								 while($row_emp_ot=@mysql_fetch_array($all_emp_ot))
								 {
									 $all_reg_ot[]=$row_emp_ot['id'];
								 }
								   ?>
                                   <tr>
                                   <th><?php echo $row_ot['name']; ?></th>
                                   <?php
								    $amount_all_month_ot=0;
									$mytime=0;
								for($k=0;$k<sizeof($all_dates_ot);$k++)
						   		{
									$amnt_per_day_ot=0;
   								    $time_per_day=0;
									for($l=0;$l<sizeof($all_reg_ot);$l++)
									{
										   $net_time=0;
										   $result_time=mysql_query("select `total_overtime` from `overtime` where `reg_id`='".$all_reg_ot[$l]."' && `overtime_date`='".datefordb($all_dates_ot[$k])."'");
										   if(mysql_num_rows($result_time)>0)
										   {
											   while($row_time=@mysql_fetch_array($result_time))
											   {
												$total_overtime=$row_time['total_overtime'];
												$net_time+=$total_overtime;
												//$net_time+=get_time_difference($time1, $time2);
											   }
												$result_wages=mysql_query("select `wages` from `registration` where `id`='".$all_reg_ot[$l]."'");
												$row_wages=@mysql_fetch_array($result_wages);
												$wages_amnt=$row_wages['wages']/7;
										   }
										   
										   $amnt_per_day_ot+=($net_time*$wages_amnt);
										   $mytime+=$net_time;
										   $time_per_day+=$net_time;
									}
								 		   $amount_all_month_ot+=$amnt_per_day_ot;
								?>
                              <!--   <td><?php echo round($amnt_per_day_ot); ?></td> -->
                              		<?php
									if($time_per_day>0){ ?>
                              		 <td><?php echo number_format($time_per_day,2); ?></td>
                                     <?php } else { ?> <td>0</td> <?php } ?>
                                 <?php
								}
								?>
                             <!--   <th style="text-align:center !important;"><?php echo round($amount_all_month_ot); ?></th> -->
                             		<th style="text-align:center !important;"><?php echo number_format($mytime,2); ?></th>
                               </tr> 
                                <?php
							   }
							   ?>
                               <tr>
                               <td colspan="<?php echo sizeof($all_dates)+2; ?>">&nbsp;</td>
                               </tr>
                           </tbody>    
                           </table>
                           <hr/>
                           
                              
                              <table  width="100%" border="1" style="border-collapse:collapse;"  bordercolor="#10A062" cellpadding="0" cellspacing="0" >
                                <thead >
                                <tr style="background-color:#DFF0D8;">
								<?php
                                $datePeriod_3 = returnDates($from, $to);
                                foreach($datePeriod_3 as $date_3) {
                                $all_dates_3[]=$date_3->format('d-m-Y');}
                                ?>
                                <th colspan="<?php echo sizeof($all_dates_3)+2; ?>" style="text-align:center;background-color:#EBFCEE;">Advance Amount</th>
                                </tr>
                                <tr>
                                <th>Name</th>
                                <?php
								$datePeriod_at = returnDates($from, $to);
								foreach($datePeriod_at as $date_at) {
								$all_dates_at[]=$date_at->format('d-m-Y');						  
							 	?>
                                <th class="verticalTableHeader" style="text-align:center !important;"><?php echo $date_at->format('d'); ?></th>
                                <?php  
						   }
                           ?>
	                           <th style="text-align:center !important;">Total</th>
                           </tr>
                          </thead>
                          <tbody>
                           <?php
							   $result_at=mysql_query("select * from `department` order by `id`");
							   while($row_at=mysql_fetch_array($result_at))
							   {
								 $all_reg_at="";  
								 $all_emp_at=mysql_query("select distinct `id` from `registration` where `depart_id`='".$row_at['id']."'");
								 while($row_emp_at=@mysql_fetch_array($all_emp_at))
								 {
									 $all_reg_at[]=$row_emp_at['id'];
								 }
								   ?>
                                   <tr>
                                   <th><?php echo $row_at['name']; ?></th>
                                   <?php
								    $amount_all_month_at=0;
								for($m=0;$m<sizeof($all_dates_at);$m++)
						   		{
									$amnt_per_day_at=0;
									for($n=0;$n<sizeof($all_reg_at);$n++)
									{
										   $advance_amnt=0;
										   $result_advance=mysql_query("select `amount` from `advance` where `reg_id`='".$all_reg_at[$n]."' && `advance_given_date`='".datefordb($all_dates_at[$m])."'");
										   if(mysql_num_rows($result_advance)>0)
										   {
											   while($row_advance=@mysql_fetch_array($result_advance))
											   {
 												 $advance_amnt+=$row_advance['amount'];
											   }
										   }
										   
										   $amnt_per_day_at+=$advance_amnt;
									}
								 		   $amount_all_month_at+=$amnt_per_day_at;
								?>
                                 <td><?php echo round($amnt_per_day_at); ?></td>
                                 <?php
								}
								?>
                                <th style="text-align:center !important;"><?php echo round($amount_all_month_at); ?></th>
                               </tr> 
                                <?php
							   }
							   ?>
                               <tr>
                               <td colspan="<?php echo sizeof($all_dates)+2; ?>">&nbsp;</td>
                               </tr>
                           </tbody>    
                           </table>
    <?php
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($_POST['excel_for']=='totalamount')
{	
							$from=$_POST['date_from'];
							$to=$_POST['date_to'];
							?>
                              <table width="100%" id="general_last" border="1" style="border-collapse:collapse;"  bordercolor="#10A062" cellpadding="0" cellspacing="0">
                                <thead class="flip-content">
                                <tr>
                                <th style="text-align:left;">Name of Department</th>
                                <th>Attendance</th>
                                <th>Salary</th>
                                <th>Overtime</th>
                                <th>Total</th>
                                <th>Advance</th>
                                <th>Balance</th>
                           		</tr>
                           		</thead>
                           		<tbody>
                               	   <?php
									$datePeriod = returnDates($from, $to);
									foreach($datePeriod as $date) 
									{
									$all_dates[]=$date->format('d-m-Y');						  
									}

								   $result=mysql_query("select * from `department` order by `id`");
								   while($row=mysql_fetch_array($result))
								   {$i++;
								   		
										$all_reg="";  
										$all_emp=mysql_query("select distinct `id` from `registration` where `depart_id`='".$row['id']."'");
										while($row_emp=@mysql_fetch_array($all_emp))
										{
										$all_reg[]=$row_emp['id'];
										}
									    $amount_all_month=0;
										$amount_all_month_ot=0;
										$amount_all_month_at=0;
										$attend_per_day=0;
								for($i=0;$i<sizeof($all_dates);$i++)
						   		{
									$amnt_per_day=0;
									$amnt_per_day_ot=0;
									$amnt_per_day_at=0;
									for($j=0;$j<sizeof($all_reg);$j++)
									{
										
										
/////////////////////////////////////////////////////////////////////////---calculate total---///////////////////////////////////////////////////////////////////////////////////////										
										   $amount=0;
										   $net_time=0;
 										   $advance_amnt=0;
 									       $attend=0;
										   $result_attend=mysql_query("select `status` from `attendance` where `reg_id`='".$all_reg[$j]."' && `attendance_date`='".datefordb($all_dates[$i])."'");
										   $row_attend=@mysql_fetch_array($result_attend);
										   $status=$row_attend['status'];
										   if(mysql_num_rows($result_attend)>0)
										   {
										   $result_wages=mysql_query("select `wages` from `registration` where `id`='".$all_reg[$j]."'");
										   $row_wages=@mysql_fetch_array($result_wages);
										   
										   if($status=='P')
										   {
											   $amount=$row_wages['wages'];
											   $attend+=1;
										   }
										   else if($status=='H')
										   {
											   $amount=$row_wages['wages']/2;
											   $attend+=0.5;
										   }
										   else
										   {
											   $amount=0;
											   $attend=0;
										   }
										   }
 									       $attend_per_day+=$attend;
										   $amnt_per_day+=$amount;
									       $attend_all_day+=$attend_per_day;
/////////////////////////////////////////////////////////////////////////Ending Total///////////////////////////////////////////////////////////////////////////////////////////////										

////////////////////////////////////////////////////////////////////////Calculate Overtime////////////////////////////////////////////////////////////////////////////////////////   
										   $result_time=mysql_query("select  `total_overtime` from `overtime` where `reg_id`='".$all_reg[$j]."' && `overtime_date`='".datefordb($all_dates[$i])."'");
										   if(mysql_num_rows($result_time)>0)
										   {
											   while($row_time=@mysql_fetch_array($result_time))
											   {
													$total_overtime=$row_time['total_overtime'];
												//$net_time+=get_time_difference($time1, $time2);
													$net_time+=$total_overtime;
											   }
												$result_wages=mysql_query("select `wages` from `registration` where `id`='".$all_reg[$j]."'");
												$row_wages=@mysql_fetch_array($result_wages);
												$wages_amnt=$row_wages['wages']/7;
										   }
										   
										   $amnt_per_day_ot+=($net_time*$wages_amnt); 
										   
/////////////////////////////////////////////////////////////////////////Ending Overtime////////////////////////////////////////////////////////////////////////////////////////   

////////////////////////////////////////////////////////////////////////Calculate Advance////////////////////////////////////////////////////////////////////////////////////////   
										   $result_advance=mysql_query("select `amount` from `advance` where `reg_id`='".$all_reg[$j]."' && `advance_given_date`='".datefordb($all_dates[$i])."'");
										   if(mysql_num_rows($result_advance)>0)
										   {
											   while($row_advance=@mysql_fetch_array($result_advance))
											   {
 												 $advance_amnt+=$row_advance['amount'];
											   }
										   }
										   
										   $amnt_per_day_at+=$advance_amnt;
/////////////////////////////////////////////////////////////////////////Ending Advance////////////////////////////////////////////////////////////////////////////////////////   
									   
									}
								 		   $amount_all_month+=$amnt_per_day;
										   $amount_all_month_ot+=$amnt_per_day_ot;
										   $total=$amount_all_month+$amount_all_month_ot;
  									       $amount_all_month_at+=$amnt_per_day_at;
										   $net_amnt=$total-$amount_all_month_at;
										
								}
								?>
                                       <tr>
                                       <th><?php echo $row['name']; ?></th>
                                       <td style="font-weight:bold;text-align:center;"><?php echo $attend_per_day; ?></td>
                                       <td style="font-weight:bold;text-align:center;"><?php echo round($amount_all_month); ?></td>
                                       <td style="font-weight:bold;text-align:center;"><?php echo round($amount_all_month_ot); ?></td>
                                       <td style="font-weight:bold;text-align:center;"><?php echo round($total); ?></td>
                                       <td style="font-weight:bold;text-align:center;"><?php echo round($amount_all_month_at); ?></td>
                                       <td style="font-weight:bold;text-align:center;"><?php echo round($net_amnt); ?></td>
                                       </tr>
                                       <?php
								   }
									?>
                           		</tbody>    
                           		</table>
                            <?php

}
?>