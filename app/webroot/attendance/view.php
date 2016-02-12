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
        			
    						<form class="form-horizontal" method="post" action="Handler.php" role="form">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet">
                            
                            <div class="portlet-title">
                            <div class="caption">
                            <i class="fa fa-th"></i> View 
                            </div>
                            </div>
                            <div class="portlet-body">
                            
  <?php
if(isset($_GET['emp']) && isset($_GET['id']))
{
$result=@mysql_query("select * from `registration` where `id`='".$_GET['id']."'");
if(mysql_num_rows($result)>0)
{
	$row=mysql_fetch_array($result);
?>
    <h4><i class="icon-user"></i> Employee Detail:</h4>
    <div class="table-responsive">
    <table width="100%" class="table table-condensed table-hover">
  	<tr>
    <td><strong>name:</strong></td>
    <td><?php echo $row['name'];?></td>
    <td><strong>Mobile No:</strong></td>
    <td><?php echo $row['mobile_no'];?></td>
    </tr>
    
    <tr>
    <td><strong>Father's Name</strong></td>
    <td><?php echo $row['f_name'];?></td>
    <td><strong>Wages:</strong></td>
    <td><?php echo $row['wages'];?></td>
    </tr>
    
    <tr>
    <td><strong>Date of Registration</strong></td>
    <td><?php echo dateforview($row['current_date']); ?></td>
    <td><strong>Employee Code No.</strong></td>
    <th><?php echo $row['code']; ?></tg>
    </tr>
    
    <tr>
    <td><strong>Month:</strong></td>
    <td><?php echo $row['month'];?></td>
    <td><strong>Department:</strong></td>
    <td><?php echo fetchdepartmentname($row['depart_id']);?></td>
    </tr>
    
    <tr>
    <td><strong>Nature of work:</strong></td>
    <td ><?php echo $row['nature'];?></td>
    <td><strong>Address:</strong></td>
    <td ><?php echo $row['address']; ?></td>
    </tr>
    
    <tr>
    <td><strong>Working Time From:</strong></td>
    <td><?php echo $row['working_time_from'];?></td>
    <td><strong>Working Time To:</strong></td>
    <td><?php echo $row['working_time_to'];?></td>
    </tr>
    
    <tr>
    <td><strong>Interval Time From:</strong></td>
    <td><?php echo $row['interval_time_from'];?></td>
    <td><strong>Interval Time To:</strong></td>
    <td><?php echo $row['interval_time_to'];?></td>
    </tr>
    </table>
    </div>
    <?php
}
}
else if(isset($_GET['advance']) && isset($_GET['id']))
{
$result=@mysql_query("select * from `advance` where `id`='".$_GET['id']."'");
if(mysql_num_rows($result)>0)
{
	$row=mysql_fetch_array($result);
?>
    <h4><i class="fa fa-inr"></i> Advance Detail:</h4>
    <div class="table-responsive">
    <table width="100%" class="table table-condensed table-hover">
  	<tr>
    <td><strong>Name [code]:</strong></td>
    <td><?php echo fetchemployeename($row['reg_id']);?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    
    <tr>
    <td><strong>Amount:</strong></td>
    <td><?php echo $row['amount'];?></td>
    <td><strong>Advance Given Date:</strong></td>
    <td><?php echo dateforview($row['advance_given_date']);?></td>
    </tr>
    
    <tr>
    <td><strong>Remarks</strong></td>
    <td colspan="3"><?php echo $row['remarks']; ?></td>
    </tr>
    </table>
    </div>
    <?php
}
}
else if(isset($_GET['overtime']) && isset($_GET['id']))
{
$result=@mysql_query("select * from `overtime` where `id`='".$_GET['id']."'");
if(mysql_num_rows($result)>0)
{
	$row=mysql_fetch_array($result);
	
	$total_overtime=$row['total_overtime'];
	list($before_dot, $after_dot) = explode('.', $row['total_overtime']);
	$after_dot=round((".".$after_dot)*60);     // these are original miniutes.
	if(!empty($before_dot)&&!empty($after_dot))
	{
	$mytime=$before_dot. " Hours & ". $after_dot. " Miniute" ;
	}
	else if(!empty($after_dot)&&empty($before_dot))
	{
	$mytime= $after_dot. " Miniute" ;
	}
	else if(!empty($before_dot)&&empty($after_dot))
	{
	$mytime=$before_dot. " Hours";
	}
	
	$res_fname=mysql_query("select `mobile_no` from registration where `id`='".$row['reg_id']."'");
	$row_fname=@mysql_fetch_array($res_fname);
?>
    <h4><i class="fa fa-cloud"></i> Overtime Detail:</h4>
    <div class="table-responsive">
    <table width="100%" class="table table-condensed table-hover">
  	<tr>
    <td><strong>name:</strong></td>
    <td><?php echo fetchemployeename($row['reg_id']);?></td>
    <td><strong>Mobile No.</strong></td>
    <td><?php echo $row_fname['mobile_no'];	?></td>
    </tr>
    
    <tr>
    <td><strong>Overtime Date:</strong></td>
    <td><?php echo dateforview($row['overtime_date']);?></td>
    <td><strong>Total Overtime</strong></td>
    <th><?php echo $mytime; ?></th>
    </tr>
   
    </table>
    </div>
    <?php
}
}
?>            
                            
                         
                          
                            </div>
                            </div>
							</form>
							
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