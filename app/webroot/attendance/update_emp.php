<?php
require_once("function.php");
require_once("config.php");
require_once("auth.php");
require_once("myscript.php");
$idd=$_GET['id'];
$sql="SELECT * from `registration` where `id`='".$idd."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$num=mysql_num_rows($result);
if($num==0)
{
	echo "<script>alert('Entry not found in database.');window.close();</script>";
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title><?php title();?></title>
<?php
logo();
css();
?>
<script>
function working_time_set()
{
document.getElementById("time1_show").value=document.getElementById("time1").value;
document.getElementById("time2_show").value=document.getElementById("time2").value;
document.getElementById("time3_show").value=document.getElementById("time3").value;
document.getElementById("time4_show").value=document.getElementById("time4").value;
}
</script>
</head>

<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed" onLoad="working_time_set();">
<!-- BEGIN HEADER -->
<?php
nevibar_menu();
?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();?>
<?php temp(); ?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
        			
    						<form class="form-horizontal" method="post" action="Handler.php" role="form">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet">
                            
                            <div class="portlet-title">
                            <div class="caption">
                            <i class="fa fa-edit"></i> Edit Registration
                            </div>
                            </div>
                            
                            <div class="portlet-body">
                           
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Employee Code No.</label>
                            <div class="col-md-4">
                            <input class="form-control" type="text" name="code" value="<?php echo $row['code']; ?>">
                            </div>
                            </div>
                             
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Employee Name</label>
                            <div class="col-md-4">
                            <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['name']; ?>">
                            </div>
                            </div>
                            
                             
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Mobile No.</label>
                            <div class="col-md-4">
                            <input class="form-control" name="mobile_no" id="mobile_no" value="<?php echo $row['mobile_no']; ?>">
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Wages</label>
                            <div class="col-md-4">
                            <input class="form-control" name="wages" value="<?php echo $row['wages']; ?>">
                            </div>
                            </div>  
                            
                        <!--    <div class="form-group">
                            <label  class="col-md-3 control-label">Month</label>
                            <div class="col-md-4">

                            <div class="input-group date date-picker" data-date="10/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
                            <input type="text" name="month" class="form-control" readonly value="<?php echo $row['month']; ?>">
                            <span class="input-group-btn">
                            <button class="btn btn-info" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                            </div>                            
                            
                            </div>
                            </div>  
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Father's Name</label>
                            <div class="col-md-4">
                            <input class="form-control" name="f_name" value="<?php echo $row['f_name']; ?>">
                            </div>
                            </div>  
							-->
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Address</label>
                            <div class="col-md-4">
                            <textarea class="form-control" rows="2" style="resize:none;" name="address"><?php echo $row['address']; ?></textarea>
                            </div>
                            </div>  
                                                      
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Section/Department</label>
                            <div class="col-md-4">
                            <select name="depart_id" class="form-control">
                            <option value="">---select department---</option>
                            <?php
                            $result_dept=mysql_query("select distinct `id`,`name` from `department` order by `name`");
                            while($row_dept=mysql_fetch_array($result_dept))
                            {
							if($row_dept['id']==$row['depart_id'])	
                            echo '<option value="'.$row_dept['id'].'" selected>'.$row_dept['name'].'</option>';
							else
	                        echo '<option value="'.$row_dept['id'].'">'.$row_dept['name'].'</option>';
                            }
                            ?>
                            </select>
                            </div>
                            </div>                              
                            
                        <!--    <div class="form-group">
                            <label  class="col-md-3 control-label">Nature of Work</label>
                            <div class="col-md-4">
                            <input class="form-control" name="nature" value="<?php echo $row['nature']; ?>">
                            </div>
                            </div>  

                            <div class="form-group">
                            <label  class="col-md-3 control-label">Working Hours</label>
                            <div class="col-md-2">
                            <div class="input-group bootstrap-timepicker">
                            <input type="text" placeholder="From" name="working_time_from" id="time1_show" class="form-control timepicker-24" >
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                            </span>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="input-group bootstrap-timepicker">
                            <input type="text" placeholder="To" name="working_time_to" id="time2_show" class="form-control timepicker-24">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                            </span>
                            </div>
                            </div>  
                            </div>
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Interval Time</label>
                            <div class="col-md-2">
                            <div class="input-group bootstrap-timepicker">
                            <input type="text" placeholder="From" name="interval_time_from" id="time3_show" class="form-control timepicker-24">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                            </span>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="input-group bootstrap-timepicker">
                            <input type="text" placeholder="To" name="interval_time_to" id="time4_show" class="form-control timepicker-24">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                            </span>
                            </div>
                            </div>  
                            </div>
                            -->
                                                       
                            </div>
                            <div class="form-actions right" style="margin-top:0px !important;">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" name="emp_update" class="btn btn-info"><i class="fa fa-question"></i> Save Changes</button>
                            </div>
                            <input type="hidden" name="myid" value="<?php echo $idd; ?>" />
                            <input type="hidden" id="time1" value="<?php echo $row['working_time_from']; ?>" />
                            <input type="hidden" id="time2" value="<?php echo $row['working_time_to']; ?>" />
                            <input type="hidden" id="time3" value="<?php echo $row['interval_time_from']; ?>" />
                            <input type="hidden" id="time4" value="<?php echo $row['interval_time_to']; ?>" />
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