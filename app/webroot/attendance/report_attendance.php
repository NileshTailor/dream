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
th
{
	text-align:center;
}
/*::-webkit-input-placeholder {
   font-style: italic;
}
:-moz-placeholder {
   font-style: italic;  
}
::-moz-placeholder {
   font-style: italic;  
}
:-ms-input-placeholder {  
   font-style: italic; 
}
*/
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
                        <i class="fa fa-exchange"></i> Attendance Report
                        </div>
                        </div>
                        
                        <div class="portlet-body flip-scroll">
                         
                      	 <form class="form-horizontal"  id="form_sample_2" method="post" role="form">
                                                       
                        <div class="form-group">
                        <label  class="col-md-3 control-label">Section/Department</label>
                        <div class="col-md-4">
                       		 <div class="input-icon right">
                               		 <i  class="fa"></i>
                        <select name="depart_id" class="form-control">
                        <option value="">---select department---</option>
                        <?php
                        $result=mysql_query("select distinct `id`,`name` from `department` order by `name`");
                        while($row=mysql_fetch_array($result))
                        {
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        }
                        ?>
                        </select>
	                        </div>
                        </div>
                        </div>  
                        
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
						   $depart_id=$_POST['depart_id'];
						   $from=$_POST['from'];
						   $to=$_POST['to'];
						   ?>
                           <hr/>
                            <div class="note note-success">
                            <span>
                           Showing <strong><?php echo fetchdepartmentname(strtoupper($depart_id)); ?> Attendance</strong> Report from <b><?php echo dateforview($from); ?></b> To <b><?php echo dateforview($to); ?></b>
                           </span>
                           </div>
                        <form method="post" action="docburner.php">
                        <button  type="submit" class="btn btn-success btn-xs diplaynone tooltips" title="Download in Excel"  data-placement="bottom"><i class="fa fa-download"></i> Download in Excel</button>
                        <input type="hidden" value="<?php echo $_POST['from']; ?>" name="date_from">
                        <input type="hidden" value="<?php echo $_POST['to']; ?>" name="date_to">
                        <input type="hidden" value="<?php echo $_POST['depart_id']; ?>" name="depart_id">
                        <input type="hidden" value="attendance" name="excel_for">
                         <input type="text" id="search"  style="float:right;"  placeholder="search attendance"/>
                        </form>
                           <div class="table-scrollable">
                            <table width="100%"  id="load_More"  class="table table-bordered table-striped table-condensed table-hover flip-content">
                                <thead class="flip-content">
                                <tr>
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
                                   <td style="text-align:left !important;font-size:13px !important;"><strong><?php echo fetchemployeename($row['id']); ?></strong></td>
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
                                   <td><?php if($status=='P'){ ?> <span class="label label-success label-sm"> <?php echo $status; ?> </span> <?php } 
								   	else if($status=="A") { ?> <span class="label label-danger label-sm"> <?php echo $status; ?> </span>  <?php }
									else { ?> <span class="label label-warning label-sm"> <?php echo $status; ?> </span> <?php } ?></td>
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
								 $res_overtime=mysql_query("select `total_overtime` from `overtime` where `reg_id`='".$row['id']."' and  `overtime_date` between '".datefordb($from)."' AND '".datefordb($to)."' ");
								 while($row_time=@mysql_fetch_array($res_overtime))
								 {
								 $total_overtime=$row_time['total_overtime'];
								// $net_time+=get_time_difference($time1, $time2);
									$net_time+=$total_overtime;
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
                           </div>
                           
                           
  <!------------------------------------------------o v e r t i m e c a l c u l a t i o n s t a r t--------------------------------------------------------------------------->
  							<?php
							$all_dates='';
							?>
                             <div class="note note-success">
                                <span>
                               Showing <strong><?php echo fetchdepartmentname(strtoupper($depart_id)); ?> Overtime</strong> Report from <b><?php echo dateforview($from); ?></b> To <b><?php echo dateforview($to); ?></b>
                               </span>
                               </div>
                        <form method="post" action="docburner.php">
                        <button  type="submit" class="btn btn-success btn-xs diplaynone tooltips" title="Download in Excel"  data-placement="bottom"><i class="fa fa-download"></i> Download in Excel</button>
                        <input type="hidden" value="<?php echo $_POST['from']; ?>" name="date_from">
                        <input type="hidden" value="<?php echo $_POST['to']; ?>" name="date_to">
                        <input type="hidden" value="<?php echo $_POST['depart_id']; ?>" name="depart_id">
                        <input type="hidden" value="overtime" name="excel_for">
                          <input type="text" id="search_overtime"  style="float:right;"  placeholder="search overtime"/>
                        </form>
						   <div class="table-scrollable">
                            <table width="100%" id="general_over" class="table table-bordered table-striped table-condensed table-hover flip-content">
                                <thead class="flip-content">
                                <tr>
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
                                   <td style="text-align:left !important;font-size:13px !important;"><strong><?php echo fetchemployeename($row['id']); ?></strong></td>
                                   <?php
								   $all_time=0;
								for($k=0;$k<sizeof($all_dates);$k++)
						   		{
									$net_time=0;
								    $res_overtime=mysql_query("select `total_overtime` from `overtime` where `reg_id`='".$row['id']."' && `overtime_date`='".datefordb($all_dates[$k])."'");
   								 while($row_time=@mysql_fetch_array($res_overtime))
								 {
								 	$total_overtime=$row_time['total_overtime'];
								// $net_time+=get_time_difference($time1, $time2);
								// $all_time+=get_time_difference($time1, $time2);
									$net_time+=$total_overtime;
									$all_time+=$total_overtime;
								 }
								 ?>
                                 <td  <?php if($net_time>0){ ?> style="background-color:#EBFCEE;font-weight:bold;" <?php } ?>><?php if($net_time>0) { echo number_format($net_time,2); } else { echo '-'; }?></td>
                                 <?php
								}
		    				     $overtime_rate=(@$row['wages']/7);
								?>
                                    <td><?php echo number_format($all_time,2); ?></td>
                                    <td><?php echo number_format($overtime_rate,3); ?></td>
                                    <td style="font-weight:bold;"><?php echo round($all_time*$overtime_rate); ?></td>
                               </tr> 
                                <?php
							   }
							   ?>
                           </tbody>    
                             <tfoot>  
                               <tr>
                               <th style="text-align:left;">TOTAL</th>
                               <script src="assets/js/jquery-1.8.3.min.js"></script>	
                               <?php
								$tot_td=sizeof($all_dates)+2;
								for($td=1; $td<=$tot_td+1; $td++)
								{
									?>
									<th style="text-align:center; font-size:16px" id="ver_over<?php echo $td; ?>"><strong>
									<script type="text/javascript">
										$(document).ready(function() {
											var td_data=0;
											$("#general_over >tbody >tr").each(function()
											{
												    if($(this).find('td:eq(<?php echo $td; ?>)').html()!='-')
													td_data+=(parseFloat($(this).find('td:eq(<?php echo $td; ?>)').html()));
														
											});
											if(td_data>0)
											$('#ver_over<?php echo $td; ?>').text(td_data.toFixed(2));
											else
											$('#ver_over<?php echo $td; ?>').text(td_data);
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
                           
                           
                           
                           
  <!------------------------------------------------o v e r t i m e c a l c u l a t i o n e n d------------------------------------------------------------------------------->
  
  
  <!------------------------------------------------A d v a n c e a m o u n t c a l c u l a t i o n s t a r t------------------------------------------------------------------>
  
  
  							<?php
							$all_dates='';
							?>
                             <div class="note note-success">
                                <span>
                               Showing <strong><?php echo fetchdepartmentname(strtoupper($depart_id)); ?> Advance</strong> Report from <b><?php echo dateforview($from); ?></b> To <b><?php echo dateforview($to); ?></b>
                               </span>
                               </div>
                            <form method="post" action="docburner.php">
                            <button  type="submit" class="btn btn-success btn-xs diplaynone tooltips" title="Download in Excel"  data-placement="bottom"><i class="fa fa-download"></i> Download in Excel</button>
                            <input type="hidden" value="<?php echo $_POST['from']; ?>" name="date_from">
                            <input type="hidden" value="<?php echo $_POST['to']; ?>" name="date_to">
                            <input type="hidden" value="<?php echo $_POST['depart_id']; ?>" name="depart_id">
                            <input type="hidden" value="advance" name="excel_for">
                            <input type="text" id="search_advance"  style="float:right;"  placeholder="search advance"/>
                            </form>
						   <div class="table-scrollable">
                            <table width="100%" id="general" class="table table-bordered table-striped table-condensed table-hover flip-content">
                                <thead class="flip-content">
                                <tr>
                                <td style="text-align:left !important;font-size:13px;font-weight:bold;">Name [code]</td>
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
                                   <td style="text-align:left !important;font-size:13px;font-weight:bold"><?php echo fetchemployeename($row['id']); ?></td>
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
                                 <td  <?php if($advance_amnt1>0){ ?> style="background-color:#EBFCEE;font-weight:bold;" <?php } ?>><?php if($advance_amnt1>0) { echo $advance_amnt1;  } else { echo "-"; } ?></td>
                                 <?php
								}
								?>
                                    <td style="font-weight:bold;"><?php echo round($all_advance1); ?></td>
                               </tr> 
                                <?php
							   }
							   ?>
                              
                           </tbody>   
                            <tfoot>  
                               <tr>
                               <th  style="text-align:left;">TOTAL</th>
                               <?php
								$tot_td=sizeof($all_dates);
								for($td=1; $td<=$tot_td+1; $td++)
								{
									?>
									<th style="text-align:center; font-size:16px" id="ver_id_g<?php echo $td; ?>"><strong>
									<script type="text/javascript">
										$(document).ready(function() {
											var td_data=0;
											$("#general >tbody >tr").each(function()
											{
												    if($(this).find('td:eq(<?php echo $td; ?>)').html()!='-')
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
                           
  
  <!------------------------------------------------A d v a n c e a m o u n t c a l c u l a t i o n e n d-------------------------------------------------------------------->
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

<?php footer();?>
<script type="text/javascript">
$(document).ready(function() {
		$('#search').keyup(function() {
			searchTable($(this).val());
		});
		$('#search_overtime').keyup(function() {
			searchTable_over($(this).val());
		});
		$('#search_advance').keyup(function() {
			searchTable_advance($(this).val());
		});
	});
	function searchTable(inputVal) {
		var table = $('#load_More');
		table.find('tr').each(function(index, row) {
			var allCells = $(row).find('td');
			if (allCells.length > 0) {
				var found = false;
				allCells.each(function(index, td) {
					var regExp = new RegExp(inputVal, 'i');
					if (regExp.test($(td).text())) {
						found = true;
						return false;
					}
				});
				if (found == true)
					$(row).show();
				else
					$(row).hide();
			}
		});
	} 
	
	
	function searchTable_over(inputVal) {
		var table = $('#general_over');
		table.find('tr').each(function(index, row) {
			var allCells = $(row).find('td');
			if (allCells.length > 0) {
				var found = false;
				allCells.each(function(index, td) {
					var regExp = new RegExp(inputVal, 'i');
					if (regExp.test($(td).text())) {
						found = true;
						return false;
					}
				});
				if (found == true)
					$(row).show();
				else
					$(row).hide();
			}
		});
	} 
	
	function searchTable_advance(inputVal) {
		var table = $('#general');
		table.find('tr').each(function(index, row) {
			var allCells = $(row).find('td');
			if (allCells.length > 0) {
				var found = false;
				allCells.each(function(index, td) {
					var regExp = new RegExp(inputVal, 'i');
					if (regExp.test($(td).text())) {
						found = true;
						return false;
					}
				});
				if (found == true)
					$(row).show();
				else
					$(row).hide();
			}
		});
	} 

</script>
<?php js(); ?>
</body>
<!-- END BODY -->
</html>