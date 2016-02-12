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
	text-align:center;
}
td
{
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
                        <i class="fa fa-inbox"></i> Total Amount Report
                        </div>
                        </div>
                        
                        <div class="portlet-body flip-scroll">

           			   <form class="form-horizontal" id="form_sample_2"  method="post" role="form">                     
                        
                         <div class="form-group">
                            <label class="control-label col-md-3">Date Range</label>
                            <div class="col-md-4">
                                <div class="input-group input-large date-picker input-daterange" data-date="10-11-2012" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" name="from" placeholder="From" type="text" required="required">
                                    <span class="input-group-addon">
                                         to
                                    </span>
                                    <input class="form-control" name="to" placeholder="To"  type="text" required="required">
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
						   $depart_id=$_POST['depart_id'];
						   $from=$_POST['from'];
						   $to=$_POST['to'];
						   ?>
                           <hr/>
                            <div class="note note-success">
                            <p>
                           Showing <strong>Total Amount</strong> Report from <b><?php echo dateforview($from); ?></b> To <b><?php echo dateforview($to); ?></b>
                            </p>
                            </div>
                             <form method="post" action="docburner.php">
                            <button  type="submit" class="btn btn-success btn-xs diplaynone tooltips" title="Download in Excel"  data-placement="bottom"><i class="fa fa-download"></i> Download in Excel</button>
                            <input type="hidden" value="<?php echo $_POST['from']; ?>" name="date_from">
                            <input type="hidden" value="<?php echo $_POST['to']; ?>" name="date_to">
                            <input type="hidden" value="totalamount" name="excel_for">
                            </form>
                           <div class="table-scrollable">
                            <table width="100%" id="general_last" class="table table-bordered table-striped table-condensed table-hover flip-content">
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
                                  <tfoot>  
                               <tr>
                               <th>TOTAL</th>
                               <script src="assets/js/jquery-1.8.3.min.js"></script>	
                               <?php
								$tot_td=5;
								for($td=0; $td<=$tot_td; $td++)
								{
									?>
									<th style="text-align:center; font-size:16px" id="ver_id<?php echo $td; ?>"><strong>
									<script type="text/javascript">
										$(document).ready(function() {
											var td_data=0;
											$("#general_last >tbody >tr").each(function()
											{
												    
													td_data+=parseFloat($(this).find('td:eq(<?php echo $td; ?>)').html());
												
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