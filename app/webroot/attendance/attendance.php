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
ajax();
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
       
                            <form class="form-horizontal" method="post"  role="form">
                            <div class="portlet">
                            <div class="portlet-title">
                            <div class="caption">
                            <i class="fa fa-check"></i> Attendance
                            </div>
                            </div>
                            <div class="portlet-body">
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Attendance Date</label>
                                <div class="col-md-3">
                                <input name="attendance_date"  readonly class="form-control form-control-inline input-medium date-picker" data-date-format="dd-mm-yyyy" size="16" <?php if(!empty($_POST['attendance_date'])){ ?> value="<?php echo $_POST['attendance_date'] ?>"  <?php } else { ?> value="<?php echo date("d-m-Y"); ?>" <?php } ?> type="text">
                               </div>
                            </div>
                            

                            <div class="form-group">
                            <label  class="col-md-3 control-label">Section/Department</label>
                            <div class="col-md-4">
                            <div class="input-group">
                            <select name="depart_id"  class="form-control">
                            <option value="">---select department---</option>
                            <?php
                            $result=mysql_query("select distinct `id`,`name` from `department` order by `name`");
                            while($row=@mysql_fetch_array($result))
                            {
							if($_POST['depart_id']==$row['id'])	
                            echo '<option value="'.$row['id'].'" selected>'.$row['name'].'</option>';
							else
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                            ?>
                            </select>
                            <span class="input-group-btn">
                            <button class="btn btn-info" type="submit" name="attendance_fill">NEXT <i class="fa fa-arrow-circle-right "></i></button>
                            </span>
                            </div>
                            </div>
                            </div>

							<?php
							if(isset($_POST['attendance_fill']))
                            {
								?>		
								<div class="table-responsive" style="margin-top:5%;">
                                 <div class="note note-success">
                            <p>
Showing <strong><?php if(!empty($_POST['depart_id'])) { echo fetchdepartmentname(strtoupper($_POST['depart_id'])); } else { echo "All Department"; }  ?></strong> Attendance <strong>@ <?php echo dateforview($_POST['attendance_date']); ?></strong><span id="notification" style="margin-left:200px;color:#E35C59;font-weight:bold;font-size:14px;"></span>
                            </p>
                            </div>
                            
								<table width="100%" class="table table-bordered table-striped table-condensed table-hover flip-content">
								<thead>
								<tr>
								<th rowspan="2" style="vertical-align:middle; text-align:center;">SL.</th>
								<th rowspan="2" style="vertical-align:middle; text-align:center;">Name [code]</th>
                                <th style="text-align:center;">P</th>
                                <th style="text-align:center;">A</th>
                                <th style="text-align:center;">H</th>
                                 </tr>
                                  <tr>
                                <td style="text-align:center;" ><div class="radio-list"><label class="radio-inline" style="width: 100%;"><input what="P" type="radio"  class="attendance" name="for_p" ></label></div></td>
                                <td style="text-align:center;" ><div class="radio-list"><label class="radio-inline" style="width: 100%;"><input what="A" type="radio" class="attendance" id="second" name="for_p" ></label></div></td>
                                <td style="text-align:center;" ><div class="radio-list"><label class="radio-inline" style="width: 100%;"><input what="H" type="radio" class="attendance" id="third" name="for_p" ></label></div></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
								$q1="";	$qry=""; $q2=" order by `code` ASC";
								if(!empty($_POST['depart_id']))
								{
								$depart_id=$_POST['depart_id'];
								$q1="depart_id = '".$depart_id."'";
								}
								$qry="select * from `registration` where ";
								if($q1==""){
								$sql="select * from `registration` order by `code` ASC";
								$q3=" `status`='0' ";}
								else
								{
								$q3=" && `status`='0' ";	
								}
								$sql=$qry.$q1.$q3.$q2;
								$result= @mysql_query($sql);
								if($result)
								{
									while($row=@mysql_fetch_array($result))
									{$i++;
						$res_check=mysql_query("select `status` from `attendance` where `attendance_date`='".datefordb($_POST['attendance_date'])."' && `reg_id`='".$row['id']."'");
						$row_check=@mysql_fetch_array($res_check);
									?>
                                    <?php
									if($row['depart_id']==$mydepart)
									{
									}
									else
									{
										$mydepart=$row['depart_id'];
										?>
                                    <tr>
                                    <th colspan="5" style="background-color:#EBFCEE;"><?php echo fetchdepartmentname($row['depart_id']); ?> Employee</th>
                                    </tr>
                                    <?php
									}
									?>
									<tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['name'].' ['.$row['code'].']';?></td>
                       <td style="text-align:center;" class="has-success"><div id="show_p<?php echo $row['id']; ?>"><?php if($row_check['status']=='P') { ?> <div class="input-icon right"><i class="fa fa-check" data-original-title="success input!"></i></div><?php } ?></div><div class="radio-list"><label class="radio-inline" style="width: 100%;"><input class="P"  onClick="fetch_att(this.value,<?php echo $row['id']; ?>)" type="radio" <?php if($row_check['status']=='P') { ?> checked <?php } ?> value="P" myid="<?php echo $row['id']; ?>" name="all<?php echo $i; ?>" ></label></div></td>
                       
                        <td style="text-align:center;" class="has-error"><div id="show_a<?php echo $row['id']; ?>"><?php if($row_check['status']=='A' || empty($row_check['status'])) { ?> <div class="input-icon right"><i class="fa fa-check" data-original-title="success input!"></i></div><?php } ?></div><div class="radio-list"><label class="radio-inline"  style="width: 100%;"><input type="radio"  onClick="fetch_att(this.value,<?php echo $row['id']; ?>)" <?php if($row_check['status']=='A'||empty($row_check['status'])) { ?> checked <?php } ?> value="A" class="A" name="all<?php echo $i; ?>"  myid="<?php echo $row['id']; ?>"> </label></div></td>
                        
                        <td style="text-align:center;" class="has-warning"><div id="show_h<?php echo $row['id']; ?>"><?php if($row_check['status']=='H') { ?> <div class="input-icon right"><i class="fa fa-check" data-original-title="success input!"></i></div><?php } ?></div><div class="radio-list"><label class="radio-inline" style="width: 100%;"><input type="radio" class="H"  myid="<?php echo $row['id']; ?>" onClick="fetch_att(this.value,<?php echo $row['id']; ?>)" <?php if($row_check['status']=='H') { ?> checked <?php } ?> value="H" name="all<?php echo $i; ?>"  > </label></div></td>
									</tr>
									<?php
									}
								}
								?>
                                </tbody> 
                                <tr>
                                <td colspan="4" id="my_output"></td>
                                </tr>
                                </table>
                                </div>
                                <?php
							}
                            ?>
                            </div>
                            </div>
                            <input type="hidden" value="<?php echo datefordb($_POST['attendance_date']); ?>" id="att_date" />
                            </form>							

   
       			
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
footer();
?>
 <script src="assets/js/jquery-1.8.3.min.js"></script>	
<script type="text/javascript">
$(document).ready(function() {
	$(".attendance").live('click',function(){
		
	document.getElementById("notification").innerHTML="Processing...";
	var what=$(this).attr("what");
	var att_date=$('#att_date').val();  
	/*for(var i=1; i <=count; i++)
	{		
		alert(what['input[name=all'+i+']'].value);
		//value = +$('input[name=all'+i+']').is( ':checked' );
		//var auto_id = $('input[name=all'+i+']').attr("myid");
		//var value = $('.'+what+' input[name=all'+i+']').val();
		//alert(value);
		//alert('.'+what+' input[name=all'+i+']'); //alert('input[name=all'+i+']');
	}*/
   	    //e.preventDefault();
		var ar = [];
		ar.push(what);
		ar.push(att_date);
		var elements = document.getElementsByClassName(what);
		for(var i=1; i<=elements.length; i++) 
		{
			//if(elements["all"+i].checked==true)
			{
				//var value = elements["all"+i].value;
				var auto_id = $('input[name=all'+i+']').attr("myid");
				ar.push(auto_id);
			}
		}	
	//	alert(ar);
		var myJsonString = JSON.stringify(ar);
		$.ajax({
			url: "ajax_page.php?multidata=1&attend="+myJsonString,
			type: "GET", 
			success: function(data)   // A function to be called if request succeeds
			{
						var count=$('.'+what).length;
						$('.'+what).closest('span').addClass('checked');
						$('.'+what).prop('checked', true);
						//$('.'+what).closest('td').prepend('<div class="input-icon right"><i class="fa fa-check" data-original-title="success input!"></i></div>');
						if(what=='P')
						{
								$(".A, .H").closest('span').removeClass('checked');
								$(".A, .H").prop('checked', false);
								//$(".A, .H").closest('td').find('.input-icon,.right').remove('.input-icon,.right');
								for(var j=1; j <=count; j++)
								{	
								var id=$('input[name=all'+j+']').attr("myid");
								document.getElementById("show_p"+id).innerHTML='<div class="input-icon right"><i class="fa fa-check" data-original-title="success input!"></i></div>';
								document.getElementById("show_a"+id).innerHTML='';
								document.getElementById("show_h"+id).innerHTML='';
								}
						}
						else if(what=='A')
						{
								$(".P, .H").closest('span').removeClass('checked');
								$(".P, .H").prop('checked', false);
								//$(".P, .H").closest('td').find('.input-icon,.right').remove('.input-icon,.right');
								for(var j=1; j <=count; j++)
								{	
								var id=$('input[name=all'+j+']').attr("myid");
								document.getElementById("show_a"+id).innerHTML='<div class="input-icon right"><i class="fa fa-check" data-original-title="success input!"></i></div>';
								document.getElementById("show_p"+id).innerHTML='';
								document.getElementById("show_h"+id).innerHTML='';	
								}
						}
						else
						{
								$(".P, .A").closest('span').removeClass('checked');
								$(".P, .A").prop('checked', false);
								//$(".P, .A").closest('td').find('.input-icon,.right').remove('.input-icon,.right');
								for(var  j=1; j <=count; j++)
								{
								var id=$('input[name=all'+j+']').attr("myid");	
								document.getElementById("show_h"+id).innerHTML='<div class="input-icon right"><i class="fa fa-check" data-original-title="success input!"></i></div>';
								document.getElementById("show_a"+id).innerHTML='';
								document.getElementById("show_p"+id).innerHTML='';
								}
						}
							document.getElementById("notification").innerHTML="";

			}
			});
		
	});
});			
</script>			
 <?php js(); ?>
</body>
<!-- END BODY -->

</html>