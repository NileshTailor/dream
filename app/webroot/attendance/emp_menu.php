<?php
require_once("function.php");
require_once("config.php");
require_once("myscript.php");
require_once("auth.php");
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title><?php title();?></title>
<?php logo(); ?>
<?php css(); ?>
<?php ajax(); ?>
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
<?php temp(); ?>
<div class="page-content-wrapper">
<div class="page-content">
<div class="row">				
				<?php
				if(isset($_POST['employee_edit']))
				{
					      ?>
                                            <div class="portlet">
                                                <div class="portlet-title">
                                                   <div class="caption">
                                                   <?php
                                                    if(isset($_GET['emp_view']))
													{
													?>  
                                                      <i class="fa fa-th"></i> View
                                                     <?php
													}
													else if(isset($_GET['emp_del']))
													{
													?>
                                                      <i class="fa fa-trash-o"></i> Delete
                                                    <?php
													}
													else 
													{
													?>
                                                      <i class="fa fa-edit"></i> Edit
                                                    <?php	
													}
													?>
                                                   </div>
                                                 </div>
                                               <div class="portlet-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-bordered table-condensed table-hover"  id="sample_editable_1">
                        <thead class="flip-content">
                        <tr>
                        <th>SL.</th>
                        <th>Name [code]</th>
                        <th>Mobile No</th>
                        <th>Wages</th>
                        <th>Section/Department</th>
						<?php
                        if(isset($_GET['emp_view']))
                        {
                        ?>  
                         <th>View</th>
                         <?php
                        }
                        else if(isset($_GET['emp_del']))
                        {
                        ?>
                         <th>Delete</th>
                        <?php
                        }
                        else 
                        {
                        ?>
                         <th>Edit</th>
                        <?php	
                        }
                        ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
						$q1="";	$q2="";	$q3=""; $q4=""; $qry="";
						if(!empty($_POST['name']))
						{
						$name=$_POST['name'];
						$q1="name LIKE '%".$name."%'";
						}
						if(!empty($_POST['mobile_no']))
						{
						$mobile_no=$_POST['mobile_no'];
						if($q1=="")
						$q2=" mobile_no='".$mobile_no."'";
						else 
						$q2=" AND mobile_no='".$mobile_no."'";
						}
						if(!empty($_POST['depart_id']))
						{
						$depart_id=$_POST['depart_id'];
						if($q1=="" && $q2=="")
						$q3=" depart_id='".$depart_id."'";
						else 
						$q3=" AND depart_id='".$depart_id."'";
						}
						$qry="select * from `registration` where ";
						if($q1=="" && $q2=="" && $q3=="") {
						$sql="select * from `registration`";
						$q4=" `status`='0' ";
						}
						else
						{
						$q4=" && `status`='0' ";	
						}
						$sql=$qry.$q1.$q2.$q3.$q4;
                        $result= @mysql_query($sql);
                        if($result)
                        {
                        while($row=mysql_fetch_array($result))
                        {$i++;
                        	$idd=$row['id'];
					?>
                      		<tr id="<?php echo $i; ?>">
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['name']." [".$row['code']."]";?></td>
                            <td><?php echo $row['mobile_no'];?></td>
                            <td><?php echo $row['wages'];?></td>
                            <td><?php echo fetchdepartmentname($row['depart_id']);?></td>
                         <?php
							if(isset($_GET['emp_view']))
							{
								?>
                                <td>
                               <a class="btn btn-success btn-xs"  role="button" href="view.php?emp=true&id=<?php echo $idd;?>"target="_blank" style="text-decoration:none;">
                                <i class="fa fa-th"></i></a>
                                </td>
                                 <?php
							}
							else if(isset($_GET['emp_del']))
							{
								?>
                                <td>   
                                   <a class="btn btn-xs btn-danger" title="Permanently Delete"  role="button"  data-toggle="modal" href="#responsive_rej<?php echo $i ?>" style="text-decoration:none;">
                                    <i class="fa fa-trash-o"></i></a> 
                                    
                         	  <div style="display: none;" id="responsive_rej<?php echo $i ?>" class="modal fade" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header" style="color:#E02222 !important;border-bottom:0px !important;">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><strong><i class="fa fa-trash-o"></i> W</strong>ould you like to delete <?php echo $row['name']; ?> info. ?</h4>
										</div>
									    <div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
											<button  onClick="delete_emp(<?php echo $idd; ?>,<?php echo $i; ?>);" id="refresh"  data-dismiss="modal" class="btn btn-danger" ><i class="fa fa-trash-o"></i> Delete</button>
										</div>
									</div>
							        </div>										
									</div>   
                                   
		                        </td>  
                                 <?php
							}
							else 
							{
								?>
                                 <td>
                                 <a class="btn btn-warning btn-xs"  role="button" href="update_emp.php?id=<?php echo $idd;?>"target="_blank" style="text-decoration:none;">
                                <i class="fa fa-edit"></i></a>
                                 </td>
                                 <?php
							}
							?>
                            </tr>
                            <?php
						}
						}
						?>
                        </tbody>
                        </table>
                                               
                                              </div>
                                            </div>  
                                          </div>
                                         <?php
			
				}
				else if(isset($_GET['mode']))
				{
					if($_GET['mode']=='edit')
					{
						?>
                         	
       						<form class="form-horizontal" action="emp_menu.php?emp_edit=true" method="post" role="form">
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
                            <input class="form-control" name="name">
                            </div>
                            </div>
                            
                             <div class="form-group">
                            <label  class="col-md-3 control-label">Mobile No.</label>
                            <div class="col-md-4">
                            <input class="form-control" name="mobile_no" id="mobile_no">
                            </div>
                            </div>  
                            
                             <div class="form-group">
                            <label  class="col-md-3 control-label">Section/Department</label>
                            <div class="col-md-4">
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
                            <div class="form-actions right" style="margin-top:0px !important;">
                            <button type="submit" name="employee_edit" title="Click to see result" class="btn btn-info">Proceed <i class="fa fa-arrow-circle-right "></i></button>
                            </div>
                            </div>
                            </form>
                        <?php
					}
					else if($_GET['mode']=='del')
					{
						?>
                        <form class="form-horizontal" action="emp_menu.php?emp_del=true" method="post" role="form">
                        <div class="portlet">
                        <div class="portlet-title">
                        <div class="caption">
                        <i class="fa fa-trash-o"></i> Delete
                        </div>
                        </div>
                        
                        <div class="portlet-body">
                        
                        <div class="form-group">
                        <label  class="col-md-3 control-label">Employee Name</label>
                        <div class="col-md-4">
                        <input class="form-control" name="name">
                        </div>
                        </div>
                        
                        <div class="form-group">
                        <label  class="col-md-3 control-label">Mobile No.</label>
                        <div class="col-md-4">
                        <input class="form-control" name="mobile_no" id="mobile_no">
                        </div>
                        </div>  
                        
                        <div class="form-group">
                        <label  class="col-md-3 control-label">Section/Department</label>
                        <div class="col-md-4">
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
                        <div class="form-actions right" style="margin-top:0px !important;">
                        <button type="submit" name="employee_edit" title="Click to see result" class="btn btn-info">Proceed <i class="fa fa-arrow-circle-right "></i></button>
                        </div>
                        </div>   
                         </form>
                        <?php
					}
					else
					{
						?>
                           <form class="form-horizontal" action="emp_menu.php?emp_view=true" method="post" role="form">
                            <div class="portlet">
                            <div class="portlet-title">
                            <div class="caption">
                            <i class="fa fa-th"></i> View
                            </div>
                            </div>
                            
                            <div class="portlet-body">
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Employee Name</label>
                            <div class="col-md-4">
                            <input class="form-control" name="name">
                            </div>
                            </div>
                            
                             <div class="form-group">
                            <label  class="col-md-3 control-label">Mobile No.</label>
                            <div class="col-md-4">
                            <input class="form-control" name="mobile_no" id="mobile_no">
                            </div>
                            </div>  
                            
                             <div class="form-group">
                            <label  class="col-md-3 control-label">Section/Department</label>
                            <div class="col-md-4">
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
                            <div class="form-actions right" style="margin-top:0px !important;">
                            <button type="submit" name="employee_edit" title="Click to see result" class="btn btn-info">Proceed <i class="fa fa-arrow-circle-right "></i></button>
                            </div>
                            </div>
                            </form>
                        <?php
					}
				}
				else
				{
					?>
    						<form class="form-horizontal" method="post" action="Handler.php" role="form">
                            <div class="portlet">
                            <div class="portlet-title">
                            <div class="caption">
                            <i class="fa fa-bookmark"></i> Employee Registration
                            </div>
                            </div>
                            <div class="portlet-body">
                            
                             <div class="form-group">
                            <label  class="col-md-3 control-label">Section/Department</label>
                            <div class="col-md-4">
                            <select name="depart_id"  class="form-control" required="required" onChange="fetch_emp_name(this.value)">
                            <option value="">---select department---</option>
                            <?php
                            $result=mysql_query("select distinct `id`,`name` from `department` order by `name`");
                            while($row=@mysql_fetch_array($result))
                            {
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                            ?>
                            </select>
                            </div>
                            </div>
                            
                      <!--      <div class="form-group">
                            <label  class="col-md-3 control-label">Employee Name</label>
                            <div class="col-md-4">
                            <input class="form-control" required id="name" name="name">
                            </div>
                            </div>
                            
                             
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Mobile No.</label>
                            <div class="col-md-4">
                            <input class="form-control" name="mobile_no" id="mobile_no">
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Wages</label>
                            <div class="col-md-4">
                            <input class="form-control" name="wages" id="wages" onKeyUp="allLetter(this.value,this.id);" required="required">
                            </div>
                            </div>  
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Month</label>
                            <div class="col-md-4">

                            <div class="input-group date date-picker" data-date="10/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
                            <input type="text" name="month" class="form-control" readonly>
                            <span class="input-group-btn">
                            <button class="btn btn-info" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                            </div>                            
                            
                            </div>
                            </div>  
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Father's Name</label>
                            <div class="col-md-4">
                            <input class="form-control" name="f_name">
                            </div>
                            </div>  

                            <div class="form-group">
                            <label  class="col-md-3 control-label">Address</label>
                            <div class="col-md-4">
                            <textarea class="form-control" rows="2" style="resize:none;" name="address"></textarea>
                            </div>
                            </div>  
                                                      
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Section/Department</label>
                            <div class="col-md-4">
                            <select name="depart_id" required class="form-control">
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
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Nature of Work</label>
                            <div class="col-md-4">
                            <input class="form-control" name="nature">
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
                			
                           <div  id="emp_place_here">
                           
                           </div>   
                           
                           
                            </div>
							</form>							
				<?php
				}
				?>

							
</div>
</div>
</div>
</div>
<?php footer(); js();?>
</body>
<!-- END BODY -->
</html>