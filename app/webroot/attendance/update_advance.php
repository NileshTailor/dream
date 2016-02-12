<?php
require_once("function.php");
require_once("config.php");
require_once("auth.php");
$idd=$_GET['id'];
$sql_advance="SELECT * from `advance` where `id`='".$idd."'";
$result_advance=mysql_query($sql_advance);
$row_data=mysql_fetch_array($result_advance);
$num=mysql_num_rows($result_advance);
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
        			
    						<form class="form-horizontal" id="form_sample_2" method="post" action="Handler.php" role="form">
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
							if($row['id']==$row_data['reg_id'])	
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
                            <label  class="col-md-3 control-label">Amount</label>
                            <div class="col-md-4">
                                 <div class="input-icon right">
                                         <i  class="fa"></i>
                                <input class="form-control" name="amount" value="<?php echo $row_data['amount']; ?>" id="amount" onKeyUp="allLetter(this.value,this.id)">
                                </div>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Advance Given Date</label>
                            <div class="col-md-4">
                             <div class="input-icon right">
                               		 <i  class="fa"></i>
                            <input class="form-control date-picker" value="<?php echo dateforview($row_data['advance_given_date']); ?>" name="advance_given_date" data-date-format="dd-mm-yyyy">
                            	</div>
                            </div>
                            </div>  
                            
                         
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Reason/Remarks</label>
                            <div class="col-md-4">
                            <div class="input-icon right">
                               		 <i  class="fa"></i>
                            <textarea class="form-control" name="remarks" rows="2" style="resize:none;"><?php echo $row_data['remarks']; ?></textarea>
                            </div>
                            </div>
                            </div>  

                           
                            
                                                        
                            </div>
                             <div class="form-actions right" style="margin-top:0px !important;">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" name="update_advance" class="btn btn-info"><i class="fa fa-question"></i> Save Change</button>
                            <input type="hidden" name="myid" value="<?php echo $idd; ?>" />
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