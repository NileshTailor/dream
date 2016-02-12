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
.upr
{
	text-transform:uppercase;
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
       						<form class="form-horizontal" method="post" action="Handler.php" role="form">
                            <div class="portlet">
                            <div class="portlet-title">
                            <div class="caption">
                            <i class="fa fa-sitemap"></i> Department Add|Edit
                            </div>
                            </div>
                            <div class="portlet-body">
                            
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Name</label>
                            <div class="col-md-4">
                            <input class="form-control upr"  name="d_name">
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label  class="col-md-3 control-label">Prefix</label>
                            <div class="col-md-4">
                            <div class="input-group">
                             <input class="form-control upr"  id="prefix" name="prefix">
                            <span class="input-group-btn">
                            <button class="btn btn-info" type="submit" name="depart_reg">NEXT <i class="fa fa-arrow-circle-right "></i></button>
                            </span>
                            </div>
                            </div>
                            </div>

								<div class="table-responive">
								<table width="100%" class="table table-condensed table-hover flip-content">
								<thead>
								<tr>
								<th>SL.</th>
								<th>Name</th>
                                <th>Prefix</th>
                                <th>Edit</th>
                                 </tr>
                                </thead>
                                <tbody>
                                <?php
								$sql="select * from `department` order by `id`";
								$result=mysql_query($sql);
								if($result)
								{
									while($row=@mysql_fetch_array($result))
									{$i++;
									?>
									<tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['prefix']; ?></td>
                                    <td>
                                     <a class="btn btn-xs btn-warning" data-placement="top" data-original-title="Tooltip in bottom"  title="Edit Department" data-toggle="modal" href="#myModal1<?php echo $i; ?>" ><b><i class="fa fa-edit"></i></b></a>
                                   
                                   <div style="display: none;" id="myModal1<?php echo $i ?>" class="modal fade" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"<span style="color:#FFB848"><i class="fa fa-refresh"></i> <b></b></span></h4>										</div>
                                            <div class="modal-body">
                                            
                                            <div class="form-group">
                                            <div class="col-md-12">
                                            <input type="text" class="form-control tooltips" value="<?php echo $row['name']; ?>" title="Department Name" placeholder="Department Name" name="d_name<?php echo $i; ?>" >
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="col-md-12">
                                            <input type="text" class="form-control tooltips"  value="<?php echo $row['prefix']; ?>" title="Prefix" placeholder="Prefix" name="p_name<?php echo $i; ?>" >
                                            </div>
                                            </div>
                                            </div>
									    <div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                            <input type="hidden" name="my_id<?php echo $i; ?>" value="<?php echo $row['id']; ?>" />
    										 <button type="submit" name="edit_depart<?php echo $i; ?>" class="btn btn-warning"><i class="fa fa-question"></i> Save Change</button>
										</div>
									</div>
							        </div>										
									</div>   
                                    </td>
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