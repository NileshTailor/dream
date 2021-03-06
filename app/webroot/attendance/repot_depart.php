<?php
require_once("function.php");
require_once("config.php");
require_once("auth.php");
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title><?php title();?></title>
<?php
logo();
css();
?>
<style>
/*.verticalTableHeader {
    -webkit-transform: rotate(270deg);
    -moz-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    -o-transform: rotate(270deg);
    transform: rotate(270deg);   
}
*/
.table > thead > tr > th {
	vertical-align:middle;
}
td
{
	text-align:center;
	font-size:15px;
}
</style>
</head>
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
<?php
nevibar_menu();
?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
  
                       
                        <div class="portlet">
                        <div class="portlet-title">
                        <div class="caption">
                        <i class="fa fa-sitemap"></i> Department Report
                        </div>
                        </div>
                        
                        <div class="portlet-body flip-scroll">
                       
                        <form class="form-horizontal" id="form_sample_2" method="post" role="form">
                     
                         <div class="form-group">
                            <label class="control-label col-md-3">Date Range</label>
                            <div class="col-md-4">
                                <div class="input-group input-large date-picker input-daterange" data-date="10-11-2012" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" name="from" placeholder="From" type="text">
                                    <span class="input-group-addon">
                                         to
                                    </span>
                                    <input class="form-control" name="to" placeholder="To"  type="text">
                                </div>
                            </div>
                             <div class="col-md-4">
                       <button type="submit" name="done" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                       </div>
                        </div>
                               
                        
                       
                       </form>
                       
                       <?php
					   if(isset($_POST['done']))
					   {
						   $from=$_POST['from'];
						   $to=$_POST['to'];
						   ?>
                           <hr/>
                            <div class="note note-success">
                            <p>
                           Showing <strong>Department</strong> Report from <b><?php echo dateforview($from); ?></b> To <b><?php echo dateforview($to); ?></b>
                            </p>
                            </div>
                             <form method="post" action="docburner.php">
                            <button  type="submit" class="btn btn-success btn-xs diplaynone tooltips" title="Download in Excel"  data-placement="bottom"><i class="fa fa-download"></i> Download in Excel</button>
                            <input type="hidden" value="<?php echo $_POST['from']; ?>" name="date_from">
                            <input type="hidden" value="<?php echo $_POST['to']; ?>" name="date_to">
                            <input type="hidden" value="department" name="excel_for">
                            </form>
                           <div class="table-scrollable">
							   <?php
							   $datePeriod_1 = returnDates($from, $to);
								foreach($datePeriod_1 as $date_1) {
								//$date->format('d-m-Y'), PHP_EOL;
								$all_dates_1[]=$date_1->format('d-m-Y');}
                               ?>
                            <table width="100%" id="general" class="table table-bordered table-striped table-condensed table-hover flip-content">
                                <thead class="flip-content">
                                <tr>
                                <th colspan="<?php echo sizeof($all_dates_1)+2; ?>" style="text-align:center;background-color:#EBFCEE;">Attendance</th>
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
	                                 <td><?php echo $attend_per_day; ?></td>
                                 <?php
								}
								?>
                             <!--   <th style="text-align:center !important;"><?php echo round($amount_all_month); ?></th> -->
                             		<td style="text-align:center !important; font-weight:bold;"><?php echo $attend_all_day; ?></td>
                               </tr> 
                                <?php
							   }
							   ?>
                               </tbody>  
                               <tfoot>  
                               <tr>
                               <th>TOTAL</th>
                               <script src="assets/js/jquery-1.8.3.min.js"></script>	
                               <?php
								$tot_td=sizeof($all_dates);
								for($td=0; $td<=$tot_td; $td++)
								{
									?>
									<th style="text-align:center; font-size:16px" id="ver_id<?php echo $td; ?>"><strong>
									<script type="text/javascript">
										$(document).ready(function() {
											var td_data=0;
											$("#general >tbody >tr").each(function()
											{
												//if(this.id != 'last_gen_tr')
												{     
													td_data+=parseFloat($(this).find('td:eq(<?php echo $td; ?>)').html());
												}
											});
											$('#ver_id<?php echo $td; ?>').text(td_data);
										});
										</script>
										</strong>
                                       </th>
									<?php
								}
    						?>
                               </tr>
                               <tr>
                               <td colspan="<?php echo sizeof($all_dates)+2; ?>">&nbsp;</td>
                               </tr>
                               </tfoot>
                           </table>
                           </div>
                           
                           <hr/>
                           
                              <div class="table-scrollable" style="margin-top:2% !important;">
                              <table width="100%" id="general1" class="table table-bordered table-striped table-condensed table-hover flip-content" >
                                <thead class="flip-content">
                                <tr>
								<?php
                                $datePeriod_2 = returnDates($from, $to);
                                foreach($datePeriod_2 as $date_2) {
                                $all_dates_2[]=$date_2->format('d-m-Y');}
                                ?>
                                <th colspan="<?php echo sizeof($all_dates_2)+2; ?>" style="text-align:center;background-color:#EBFCEE;">Overtime Hours</th>
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
												//$net_time+=get_time_difference($time1, $time2);
												$net_time+=$total_overtime;
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
                             		<td style="text-align:center !important;font-weight:bold;"><?php echo number_format($mytime,2); ?></td>
                               </tr> 
                                <?php
							   }
							   ?>
                               </tbody>
                             
                             <tfoot>  
                               <tr>
                               <th>TOTAL</th>
                               <?php
								$tot_td=sizeof($all_dates_ot);
								for($td=0; $td<=$tot_td; $td++)
								{
									?>
									<th style="text-align:center; font-size:16px" id="ver_id_g<?php echo $td; ?>"><strong>
									<script type="text/javascript">
										$(document).ready(function() {
											var td_data=0;
											$("#general1 >tbody >tr").each(function()
											{
												    
													td_data+=parseFloat($(this).find('td:eq(<?php echo $td; ?>)').html());
												
											});
											$('#ver_id_g<?php echo $td; ?>').text(td_data);
										});
										</script>
										</strong>
                                       </th>
									<?php
								}
    							?>
                               </tr>
                               <tr>
                               <td colspan="<?php echo sizeof($all_dates)+2; ?>">&nbsp;</td>
                               </tr>
                               </tfoot>
                           </table>
                           </div>
                           <hr/>
                           
                              
                              <div class="table-scrollable" style="margin-top:2% !important;">
                              <table width="100%" id="general_last" class="table table-bordered table-striped table-condensed table-hover flip-content" >
                                <thead class="flip-content">
                                <tr>
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
                                <td style="text-align:center !important;font-weight:bold;"><?php echo round($amount_all_month_at); ?></td>
                               </tr> 
                                <?php
							   }
							   ?>
                           </tbody>    
                            <tfoot>  
                               <tr>
                               <th>TOTAL</th>
                               <?php
								$tot_td=sizeof($all_dates_at);
								for($td=0; $td<=$tot_td; $td++)
								{
									?>
									<th style="text-align:center; font-size:16px" id="ver_id_g_last<?php echo $td; ?>"><strong>
									<script type="text/javascript">
										$(document).ready(function() {
											var td_data=0;
											$("#general_last >tbody >tr").each(function()
											{
												    
													td_data+=parseFloat($(this).find('td:eq(<?php echo $td; ?>)').html());
												
											});
											$('#ver_id_g_last<?php echo $td; ?>').text(td_data);
										});
										</script>
										</strong>
                                       </th>
									<?php
								}
    							?>
                               </tr>
                               <tr>
                               <td colspan="<?php echo sizeof($all_dates)+2; ?>">&nbsp;</td>
                               </tr>
                               </tfoot>
                           </table>
                           </div>
                           <?php
					   }
					   ?>
          </div>
          </div>   
                   
  	
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
footer();
js();?>

</body>
<!-- END BODY -->
</html>