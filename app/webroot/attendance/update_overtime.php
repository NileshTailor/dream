<?php
require_once("function.php");
require_once("config.php");
require_once("auth.php");
$idd=$_GET['id'];
$sql_overtime="SELECT * from `overtime` where `id`='".$idd."'";
$result_overtime=mysql_query($sql_overtime);
$row_data=mysql_fetch_array($result_overtime);
$num=mysql_num_rows($result_overtime);
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
document.getElementById("start_time").value=document.getElementById("time1").value;
document.getElementById("end_time").value=document.getElementById("time2").value;
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
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
        			
    						<form class="form-horizontal" method="post" id="form_sample_2" action="Handler.php" role="form">
                            <div class="portlet">
                            <div class="portlet-title">
                            <div class="caption">
                            <i class="fa fa-edit"></i> Edit
                            </div>
                            </div>
                            <div class="portlet-body">
                            
                      
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Employee Name</label>
                            <div class="col-md-4">
                               <div class="input-icon right">
                               		 <i  class="fa"></i>
                            <select name="reg_id" class="form-control select2me">
                            <option value="">---select employee name with their code---</option>
                            <?php
                            $result=mysql_query("select distinct `id`,`name`,`code` from `registration` order by `name`");
                            while($row=mysql_fetch_array($result))
                            {
							if($row_data['reg_id']==$row['id'])	
                            echo '<option value="'.$row['id'].'" selected>'.$row['name']." [".$row['code']."]".'</option>';
							else
	                        echo '<option value="'.$row['id'].'">'.$row['name']." [".$row['code']."]".'</option>';
                            }
                            ?>
                            </select>
                            	</div>
                            </div>
                            </div>
                            
                                                        
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Overtime Date</label>
                            <div class="col-md-4">
                               <div class="input-icon right">
                               		 <i  class="fa"></i>
                            <input class="form-control date-picker" name="overtime_date" value="<?php echo dateforview($row_data['overtime_date']); ?>" data-date-format="dd-mm-yyyy">
                            	</div>
                            </div>
                            </div>  
                            
                         
                         	 <div class="form-group">
                            <label  class="col-md-3 control-label">Total Overtime</label>
                            <div class="col-md-2">
                            <select name="total_overtime_hh" class="form-control select2me">
                            <option value="">--HH--</option>
                                        <?php 
										   list($before_dot, $after_dot) = explode('.', $row_data['total_overtime']);
                                            for ($i = 0; $i <24; $i++) {
                                                if($i<10)
													if($before_dot=="0".$i)
                                                    	 echo "<option value=\"0".$i."\" selected=\"selected\">0".$i."</option>";
                                                	else 
                                                    	echo "<option value=\"0".$i."\">0".$i."</option>";
												else 
													if($before_dot==$i)
														echo "<option value=\"".$i."\" selected=\"selected\">".$i."</option>";
													else 
														echo "<option value=\"".$i."\">".$i."</option>";
                                            }
											
											
                                        ?>
                                    </select>
                            </div>
                            <div class="col-md-2">
                            <select name="total_overtime_mm" class="form-control select2me">
                            <option value="">--MM--</option>
                                        <?php 
										 list($before_dot, $after_dot) = explode('.', $row_data['total_overtime']);
									     $after_dot=round((".".$after_dot)*60);     // these are original miniutes.
                                            for ($i = 0; $i <=60; $i++) {
                                                if($i<10)
													if($after_dot=="0".$i)
                                                   		echo "<option value=\"0".$i."\" selected=\"selected\">0".$i."</option>";
                                               		else 
                                                   		 echo "<option value=\"0".$i."\">0".$i."</option>";
												else
													if($after_dot==$i)
														echo "<option value=\"".$i."\" selected=\"selected\">".$i."</option>";
													else 
														echo "<option value=\"".$i."\">".$i."</option>";
                                            }
                                        ?>
                                    </select>
                            </div>  
                            </div>
                            
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Remarks</label>
                            <div class="col-md-4">
                            <textarea class="form-control" name="remarks" rows="2" style="resize:none;"><?php echo $row_data['remarks']; ?></textarea>
                            </div>
                            </div>  

                           
                            
                                                        
                            </div>
                             <div class="form-actions right" style="margin-top:0px !important;">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" name="overtime_update_" class="btn btn-info"><i class="fa fa-question"></i> Save Change</button>
                            <input type="hidden" name="myid" value="<?php echo $idd; ?>" />
                            <input type="hidden" id="time1" value="<?php echo $row_data['start_time']; ?>" />
                            <input type="hidden" id="time2" value="<?php echo $row_data['end_time']; ?>" />
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