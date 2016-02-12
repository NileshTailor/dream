<?php
require_once("config.php");
require_once("function.php");
require_once("auth.php");
 
if(!empty($_GET['delete_emp']))
{
	@mysql_query("update `registration` set `status`='1' where `id`='".$_GET['delete_emp']."'");
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if(!empty($_GET['delete_advance']))
{
	@mysql_query("delete from `advance` where `id`='".$_GET['delete_advance']."'");
}
 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if(!empty($_GET['delete_overtime']))
{
	@mysql_query("delete from `overtime` where `id`='".$_GET['delete_overtime']."'");
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if(!empty($_GET['status'])&&!empty($_GET['reg_id'])&&!empty($_GET['date']))
{
	session_start();
	$login_id=$_SESSION['id'];
	$time = date('h:i:s a', time());
	$check_first=mysql_query("select `id` from `attendance` where `reg_id`='".$_GET['reg_id']."' && `attendance_date`='".$_GET['date']."'");
	if(mysql_num_rows($check_first)>0)
	{
	$row_first=mysql_fetch_array($check_first);	
	$rs_up=@mysql_query("update `attendance` set `status`='".$_GET['status']."',`time`='".$time."' where `id`='".$row_first['id']."'");
	}
	else
	{
	$rs=mysql_query("insert into `attendance` set `attendance_date`='".$_GET['date']."',`time`='".$time."',`reg_id`='".$_GET['reg_id']."',`status`='".$_GET['status']."',`login_id`='".$login_id."'");
	}
	
}
/////////////////////////////////////////////////////////////////////////////////////////////////////

else if(!empty($_GET['depart_id']))
{
						
						?>
                        <label  class="col-md-3 control-label">Employee Name</label>
                        <div class="col-md-4">
                         <div class="input-icon right">
                               		 <i  class="fa"></i>
                        <select name="reg_id"  class="form-control select2me">
                        <option value="">---select employee name with their code---</option>
                        <?php
                        $result=mysql_query("select distinct `id`,`name`,`code` from `registration` where `depart_id`='".$_GET['depart_id']."' && `status`='0' order by `name`");
                        while($row=mysql_fetch_array($result))
                        {
                        echo '<option value="'.$row['id'].'">'.$row['name']." [".$row['code']."]".'</option>';
                        }
                        ?>
                        </select>
                       		</div>
                        </div>
                            <?php
}






/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

else if(!empty($_GET['depart_id2']))
{
						
						?>
                        <span style="float:right"><input type="button" value="ADD" ></span>
                        <table width="100%" class="table table-bordered table-striped table-condensed table-hover flip-content">
                        <thead>
                        <tr>
                        <th>Sr.No</th>
                        <th> Name</th>
                        <th>Ammount</th>
                        <th>Remarks</th>
                        <tr>
                        </thead>
                        <tr>
                        <td>1.</td>
                        <td>
                        <div class="col-md-4">
                         <div class="input-icon right">
                               		 <i  class="fa"></i>
                        <select name="reg_id"  class="form-control select2me-medium">
                        <option value="">---select employee name with their code---</option>
                        <?php
                        $result=mysql_query("select distinct `id`,`name`,`code` from `registration` where `depart_id`='".$_GET['depart_id2']."' && `status`='0' order by `name`");
                        while($row=mysql_fetch_array($result))
                        {
                        echo '<option value="'.$row['id'].'">'.$row['name']." [".$row['code']."]".'</option>';
                        }
                        ?>
                        </select>
                       		</div>
                        </div>
                        </td>
                        
                        <td>
                        
                                <div class="form-group">
                                
                                <div class="col-md-4">
                                <div class="input-icon right">
                                <i  class="fa"></i>
                                <input class="form-control" name="amount" id="amount" onKeyUp="allLetter(this.value,this.id)">
                                </div>
                                </div>
                                </div>
                        </td>
                        
                        <td>
                        
                         
                                <div class="form-group">
                                
                                <div class="col-md-4">
                                <textarea class="form-control-medium" name="remarks" rows="2" style="resize:none;"></textarea>
                                </div>
                                </div>  
      
                                <div class="form-group" id="emp_place_here">
                            
                                </div>
                               
                         </td>      
                        <tr>
                        </table>
                            <?php
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if(!empty($_GET['emp_depart_wise']))
{
		?>
        <table class="table table-bordered table-striped table-condensed table-hover flip-content" width="100%">
        <tr>
     	<th colspan="4" style="text-align:center;background-color:#EBFCEE;">please fill required info for <?php echo  fetchdepartmentname($_GET['emp_depart_wise']); ?>*</th>
        </tr>
        <?php
		for($i=1;$i<=10;$i++)
		{
			?>
            <tr>
            <td><input class="form-control" placeholder="<?php echo $i; ?> Employee Name: " name="name<?php echo $i; ?>"></td>
            <td><input class="form-control" placeholder="Mobile No." name="mobile_no<?php echo $i; ?>" id="mobile_no"></td>
            <td><input class="form-control" placeholder="Wages"  id="wages" name="wages<?php echo $i; ?>" onKeyUp="allLetter(this.value,this.id);"></td>
            <td><input class="form-control" placeholder="Address" name="address<?php echo $i; ?>"></td>
            </tr>
            <?php
		}
		?>
        </table>
        <input type="hidden" value="<?php echo $i; ?>" name="count" />
        <div class="form-actions right" style="margin-top:0px !important;">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" name="emp_reg" class="btn btn-info"><i class="fa fa-check"></i> Register Now</button>
        </div>
        <?php	
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if(!empty($_GET['attend']))
{
	 session_start();
	 $login_id=$_SESSION['id'];
	 $time = date('h:i:s a', time());
	 $all_attendance=$_GET['attend'];
	 print_r($all_attendance);
 	 $q = json_decode($all_attendance);
	 $status=$q[0];
	 $date=$q[1];
	 for($i=2;$i<=sizeof($q);$i++)
	 {
		
		 		if(!empty($q[$i]))
				{
				$check_first=mysql_query("select `id` from `attendance` where `reg_id`='".$q[$i]."' && `attendance_date`='".$date."'");
				if(mysql_num_rows($check_first)>0)
				{
				$row_first=mysql_fetch_array($check_first);	
				$rs_up=@mysql_query("update `attendance` set `status`='".$status."',`time`='".$time."' where `id`='".$row_first['id']."'");
				}
				else
				{
				$rs=mysql_query("insert into `attendance` set `attendance_date`='".$date."',`time`='".$time."',`reg_id`='".$q[$i]."',`status`='".$status."',`login_id`='".$login_id."'");
				}
				}
				
	 } 
}
?>
