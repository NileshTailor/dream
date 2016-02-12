<?php
require_once("function.php");
require_once("config.php");
require_once("auth.php");

if(isset($_POST['delete_all_advance']))
{
	
	$all_delete=$_POST['all_delete'];
	
	$advance_all_del=explode(',', $all_delete);
	foreach($advance_all_del as $value)
	{
		 //echo "delete from `advance` where `id`='$value'";
		
		@mysql_query("delete from `advance` where `id`='$value'");
		
	}
	 
  
header('Location: advance_menu.php?mode=del');
	
}
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
<div class="page-content-wrapper">
<div class="page-content">
<div class="row">				
				<?php
				if(isset($_POST['advance_edit']))
				{
					      ?>
                                            <div class="portlet">
                                                <div class="portlet-title">
                                                   <div class="caption">
                                                   <?php
                                                    if(isset($_GET['advance_view']))
													{
													?>  
                                                      <i class="fa fa-th"></i> View
                                                     <?php
													}
													else if(isset($_GET['advance_del']))
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
                        <th>Name</th>
                        <th>Advance Given Date</th>
                        <th>Mobile No.</th>
                        <th>Amount</th>
						<?php
                        if(isset($_GET['advance_view']))
                        {
                        ?>  
                         <th>View</th>
                         <?php
                        }
                        else if(isset($_GET['advance_del']))
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
						$q1="";	$q2="";	$q3=""; $qry=""; $q4=" order by `id` desc ";
						if(!empty($_POST['reg_id']))
						{
						$reg_id=$_POST['reg_id'];
						$q1="reg_id='".$reg_id."'";
						}
						if(!empty($_POST['from'])&&!empty($_POST['to']))
						{
						$from=datefordb($_POST['from']);
						$to=datefordb($_POST['to']);
						if($q1=="")
						$q2=" advance_given_date between '".$from."' and '".$to."' ";
						else 
						$q2=" AND advance_given_date  between '".$from."' and '".$to."' ";
						}
						if(!empty($_POST['depart_id']))
						{
						$depart_id=$_POST['depart_id'];
						$res_reg="(select `id` from `registration` where `depart_id`=".$depart_id.")";
					    if($q1=="" && $q2=="")
						$q3=" `reg_id` in ".$res_reg." ";
						else
						$q3=" AND `reg_id` in ".$res_reg." ";
						}
						$qry="select * from `advance` where ";
						if($q1=="" && $q2=="" && $q3=="")
						$sql="select * from `advance` order by `id` desc ";
						else
						$sql=$qry.$q1.$q2.$q3.$q4;
                        $result= @mysql_query($sql);
                        if($result)
                        {
                        while($row=mysql_fetch_array($result))
                        {$i++;
                        	$idd=$row['id'];
							$res_fname=mysql_query("select `mobile_no` from registration where `id`='".$row['reg_id']."'");
							$row_fname=@mysql_fetch_array($res_fname);
					?>
                      		<tr id="<?php echo $i; ?>">
                            <td><?php echo $i;?></td>
                            <td><?php echo fetchemployeename($row['reg_id']); ?></td>
                            <td><?php echo dateforview($row['advance_given_date']);?></td>
                            <td><?php echo $row_fname['mobile_no'];?></td>
                            <td><?php echo $row['amount'];?></td>
                         <?php
							if(isset($_GET['advance_view']))
							{
								?>
                                <td>
                               <a class="btn btn-success btn-xs"  role="button" href="view.php?advance=true&id=<?php echo $idd;?>"target="_blank" style="text-decoration:none;">
                                <i class="fa fa-th"></i></a>
                                </td>
                                 <?php
							}
							else if(isset($_GET['advance_del']))
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
											<h4 class="modal-title"><strong><i class="fa fa-trash-o"></i> W</strong>ould you like to delete <?php echo fetchemployeename($row['reg_id']); ?> info. ?</h4>
										</div>
									    <div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
											<button  onClick="delete_advance(<?php echo $idd; ?>,<?php echo $i; ?>);" id="refresh"  data-dismiss="modal" class="btn btn-danger" ><i class="fa fa-trash-o"></i> Delete</button>
										</div>
									</div>
							        </div>										
									</div>   
                                   <?php $all_del[]=$idd;
								  
								   ?>
		                        </td>  
								
                                 <?php
							}
							else 
							{
								?>
                                 <td>
                                 <a class="btn btn-warning btn-xs"  role="button" href="update_advance.php?id=<?php echo $idd;?>"target="_blank" style="text-decoration:none;">
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
						<?php 
						if(isset($_GET['advance_del']))
							{
								
								
								?>
								 <span style="margin-left:40%"><a class="btn btn-xs btn-danger" title="Permanently Delete"  role="button"  data-toggle="modal" href="#responsive_rej<?php echo $all_del ?>" style="text-decoration:none;">
                                    <i class="fa fa-trash-o"></i>Delete ALL</a> </span>
                                    
                         	  <div style="display: none;" id="responsive_rej<?php echo $all_del ?>" class="modal fade" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header" style="color:#E02222 !important;border-bottom:0px !important;">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><strong><i class="fa fa-trash-o"></i> W</strong>ould you like to delete ALL Advance info. ?</h4>
										</div>
									    <div class="modal-footer">
										<form method="post">
										<?php 
										$del_data=implode(',',$all_del);
										?>
											<input type="hidden" name="all_delete" value="<?php echo $del_data; ?>">
											<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
											<button type="submit" name="delete_all_advance" class="btn btn-danger" ><i class="fa fa-trash-o"></i> Delete</button>
										</form>
										</div>
									</div>
							        </div>										
									</div>   
                             <?php     
							}
							?>
                                               
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
                         	
       						<form class="form-horizontal" action="advance_menu.php?advance_edit=true" method="post" role="form">
                             <div class="portlet">
                            <div class="portlet-title">
                            <div class="caption">
                            <i class="fa fa-edit"></i> Edit
                            </div>
                            </div>
                            
                            <div class="portlet-body">
                            
                         	 <div class="form-group">
                            <label  class="col-md-3 control-label">Section/Department</label>
                            <div class="col-md-4">
                            <select name="depart_id" class="form-control" onChange="fetch_employee(this.value);" >
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
                            
                             
                            <div class="form-group" id="emp_place_here">
                        
                            </div>
                            
                            
                        
                            
                             <div class="form-group">
                            <label class="control-label col-md-3">Advance Given Date</label>
                            <div class="col-md-4">
                                <div class="input-group input-large date-picker input-daterange" data-date="10-11-2012" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" name="from" placeholder="From" type="text" >
                                    <span class="input-group-addon">
                                         to
                                    </span>
                                    <input class="form-control" name="to" placeholder="To"  type="text" >
                                </div>
                            </div>
                        </div>
                        
                        
                         
                            
                            
                            </div>
                            <div class="form-actions right" style="margin-top:0px !important;">
                            <button type="submit" name="advance_edit" title="Click to see result" class="btn btn-info">Proceed <i class="fa fa-arrow-circle-right "></i></button>
                            </div>
                            </div>
                            </form>
                        <?php
					}
					else if($_GET['mode']=='del')
					{
						?>
                        <form class="form-horizontal" action="advance_menu.php?advance_del=true" method="post" role="form">
                        <div class="portlet">
                        <div class="portlet-title">
                        <div class="caption">
                        <i class="fa fa-trash-o"></i> Delete
                        </div>
                        </div>
                        
                        <div class="portlet-body">
                        
                        	 <div class="form-group">
                            <label  class="col-md-3 control-label">Section/Department</label>
                            <div class="col-md-4">
                            <select name="depart_id" class="form-control" >
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
                            
                             
                            <div class="form-group" id="emp_place_here">
                        
                            </div>
                            
                            
                             <div class="form-group">
                            <label class="control-label col-md-3">Advance Given Date</label>
                            <div class="col-md-4">
                                <div class="input-group input-large date-picker input-daterange" data-date="10-11-2012" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" name="from" placeholder="From" type="text" >
                                    <span class="input-group-addon">
                                         to
                                    </span>
                                    <input class="form-control" name="to" placeholder="To"  type="text" >
                                </div>
                            </div>
                        </div>
                            
                        </div>
                        <div class="form-actions right" style="margin-top:0px !important;">
                        <button type="submit" name="advance_edit" title="Click to see result" class="btn btn-info">Proceed <i class="fa fa-arrow-circle-right "></i></button>
                        </div>
                        </div>   
                         </form>
                        <?php
					}
					else
					{
						?>
                           <form class="form-horizontal"  action="advance_menu.php?advance_view=true" method="post" role="form">
                            <div class="portlet">
                            <div class="portlet-title">
                            <div class="caption">
                            <i class="fa fa-th"></i> View
                            </div>
                            </div>
                            
                            <div class="portlet-body">
                            
                               
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Section/Department</label>
                            <div class="col-md-4">
                            <select name="depart_id" class="form-control" onChange="fetch_employee(this.value);" >
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
                            
                             
                            <div class="form-group" id="emp_place_here">
                        
                            </div>
                            
                            <div class="form-group">
                            <label class="control-label col-md-3">Advance Given Date</label>
                            <div class="col-md-4">
                                <div class="input-group input-large date-picker input-daterange" data-date="10-11-2012" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" name="from" placeholder="From" type="text" >
                                    <span class="input-group-addon">
                                         to
                                    </span>
                                    <input class="form-control" name="to" placeholder="To"  type="text" >
                                </div>
                            </div>
                        </div> 
                            
                            
                            </div>
                            <div class="form-actions right" style="margin-top:0px !important;">
                            <button type="submit" name="advance_edit" title="Click to see result" class="btn btn-info">Proceed <i class="fa fa-arrow-circle-right "></i></button>
                            </div>
                            </div>
                            </form>
                        <?php
					}
				}
				else
				{
					?>
    						<form class="form-horizontal" method="post" id="form_sample_2" action="Handler.php" role="form">
                            <div class="portlet">
                            <div class="portlet-title">
                            <div class="caption">
                            <i class="fa fa-inr"></i> Advance Paid
                            </div>
                            </div>
                            <div class="portlet-body">
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Section/Department</label>
                            <div class="col-md-4">
                                <div class="input-icon right">
                               		 <i  class="fa"></i>
                            <select name="depart_id2" class="form-control" onChange="fetch_employee2(this.value);" >
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
                            
                            
                             
                            <!--div class="form-group">
                            <label  class="col-md-3 control-label">Amount</label>
                            <div class="col-md-4">
                            	<div class="input-icon right">
                               		 <i  class="fa"></i>
                            <input class="form-control" name="amount" id="amount" onKeyUp="allLetter(this.value,this.id)">
                            	</div>
                            </div>
                            </div-->
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Advance Given Date</label>
                            <div class="col-md-4">
                            <div class="input-icon right">
                               		 <i  class="fa"></i>
                            <input class="form-control date-picker" name="advance_given_date" data-date-format="dd-mm-yyyy">
                            </div>
                            </div>
                            </div>  
                            
                         
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Reason/Remarks</label>
                            <div class="col-md-4">
                            <textarea class="form-control" name="remarks" rows="2" style="resize:none;"></textarea>
                            </div>
                            </div>  
  
                            <div class="form-group" id="emp_place_here">
                        
                            </div>
                           
                           
                            
                                                        
                            </div>
                             <div class="form-actions right" style="margin-top:0px !important;">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" name="advance_reg" class="btn btn-info"><i class="fa fa-check"></i> Save</button>
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