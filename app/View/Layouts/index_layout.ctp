<?php
$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'authentication'), array());

$login_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'index_layout_session'), array());
?>
<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<title>Dreamshapers</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<?php Configure::write('debug', 0); ?>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/pace/pace.min.js" type="text/javascript"></script>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/pace/themes/pace-theme-flash.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/global/css/fonts/font.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->webroot; ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->webroot; ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">

<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>assets/global/plugins/select2/select2.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>assets/global/plugins/jquery-multi-select/css/multi-select.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/global/css/demo-styles.css" />

<link href="<?php echo $this->webroot; ?>assets/global/css/components.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->webroot; ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">

<link href="<?php echo $this->webroot; ?>assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css">

<link href="<?php echo $this->webroot; ?>assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color">


<link rel="stylesheet" type="text/css"href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-toastr/toastr.min.css"/>

<link href="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>
<?php
$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'ajax_function'), array());
?>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico">
<style>

.self-table > tbody > tr > td, .self-table > tr > td
{
	border-top:none !important;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
 
    vertical-align:middle !important;
}

.Occupied{
background-color:#5365CC;
}
.Expected{
background-color:#85C030;
}
.Billing{
background-color:#1B4C95;
}
.Complimentary{
background-color:#9C58DB;
}
.Management_block{
background-color:#150402;
}
.Vacant{
background-color:#4AAD6E;
}
.Vacant_darty{
background-color:#C6BB3D;
}
.Out{
background-color:rgba(191, 54, 37, 0.98);
}
.blue{
background-color:#82A0D1;
}

</style>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body class=" page-header-fixed page-sidebar-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	
	<!-- BEGIN HEADER MENU -->
	<div class="page-header-inner">
   <div class="page-logo"><img src="expenset/SPECTRUM.png" align="left" style="margin-top:5px" width="100px"/></div>
		<div class="top-menu">
        
        
			<ul class="nav navbar-nav pull-right">
        
        
            <li><a data-toggle="modal" class="tooltips" data-placement="bottom" data-original-title="Room Status" href="#deletedis"><i class="fa fa-sitemap"></i></a> </li>
			<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username"><?php echo $login_name;?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
                    <li>
							<a class="tooltips" href="<?php echo $this->webroot; ?>my_profile" data-placement="bottom" data-original-title="Update Your Profile">
							<i class="icon-user"></i> My Profile </a>
						</li>
						<li>
							<a class="tooltips" href="<?php echo $this->webroot; ?>logout" data-placement="bottom" data-original-title="Logout">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
            </ul>
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
       <!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="" >
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<div class="page-sidebar navbar-collapse collapse">
				<!-- BEGIN SIDEBAR MENU -->
				
				<ul class="page-sidebar-menu tooltips" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                
                 <?php 
					$fetch_user_right=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'user_rights'), array());
					 foreach($fetch_user_right as $data)
					 {
						 $user_right1=$data['user_right']['module_id'];
					 }
					 $user_right=explode(',', $user_right1);
					 $fetch_menu=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'menu'), array());
					 $main_menu_arr[]='';
                     $page_name=$this->params['action'];
					 foreach($fetch_menu as $data)
					 {
						if(in_array($data['module']['id'], $user_right))
						{
							if(empty($data['module']['main_menu']) && empty($data['module']['sub_menu']))
							{
								?>
								<li class="<?php if($page_name==$data['module']['page_name_url']){ echo 'active'; } ?>">
								<a href="<?php echo $this->webroot; ?><?php echo $data['module']['page_name_url']; ?>" <?php if($data['module']['page_name_url']=='logout'){ }else{ ?>rel='tab' <?php } ?>> <i class="<?php echo $data['module']['icon_class_name']; ?>"></i><span class="title"> <?php echo $data['module']['name']; ?></span><?php if($page_name==$data['module']['page_name_url']){ ?> <span class="selected"></span> <?php } ?></a>
								</li>
								<?php
							}
							else
							{
								if(!in_array($data['module']['main_menu'], $main_menu_arr))
								{
									$main_menu_arr[]=$data['module']['main_menu'];
									$fetch_menu_submenu=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'menu_submenu',$data['module']['main_menu']), array());
									foreach($fetch_menu_submenu as $data_value1)
									{
										if($data_value1['module']['page_name_url'] == $page_name)
										{
											$class_active='active';
											$arrow_open='open';
											$class_selected='selected';
										}
										
									}
									
									?>
									<li class="<?php  echo @$class_active; ?> ">
										<a href="javascript:;">
										<i class="<?php echo $data['module']['main_menu_icon']; ?>"></i>
										<span class="title"><?php echo $data['module']['main_menu']; ?></span>
                                        <span class="<?php  echo @$class_selected; ?>"></span>
                                        <span class="arrow <?php  echo @$arrow_open; ?>"></span>
										</a>
										<ul class="sub-menu">
										<?php
										$class_active='';
										$arrow_open='';
										$class_selected='';
										foreach($fetch_menu_submenu as $data_value)
										{
											if(!empty($data_value['module']['sub_menu']))
											{
											$fetch_submenu=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'submenu',$data_value['module']['sub_menu']), array());
											if(!in_array($data_value['module']['sub_menu'], $main_menu_arr))
											{
												$main_menu_arr[]=$data_value['module']['sub_menu'];
												foreach($fetch_submenu as $data_value1)
												{
													if($data_value1['module']['page_name_url'] == $page_name)
													{
														$class_active='active';
														$arrow_open='open';
														$class_selected='selected';
													}
												}
												
												?>
										
												<li class="<?php  echo @$class_active; ?>">
												<a href=javascript:;>
												<i class="<?php echo $data_value['module']['sub_menu_icon']; ?>"></i>
												<span class="title"><?php echo $data_value['module']['sub_menu']; ?></span>
                                                <span class="<?php  echo @$class_selected; ?>"></span>
                                        		<span class="arrow <?php  echo @$arrow_open; ?>"></span>
                                                </a>
												<ul class="sub-menu">
												<?php
												foreach($fetch_submenu as $data_submenu)
												{
													
													if((in_array($data_submenu['module']['id'], $user_right))&& (!in_array($data_submenu['module']['name'], $main_menu_arr)))
													{
														$main_menu_arr[]=$data_submenu['module']['name'];
													 ?>
													<li class="<?php if($page_name==$data_submenu['module']['page_name_url']){ echo ' active'; } ?>">
														<a href="<?php echo $this->webroot; ?><?php echo $data_submenu['module']['page_name_url']; ?>" rel='tab'> <i class="<?php echo $data_submenu['module']['icon_class_name']; ?>"></i><span class="title"><?php echo $data_submenu['module']['name']; ?></span></a>
													</li>
													<?php
													}
												}
												$class_active='';
												$arrow_open='';
												$class_selected='';
												?>
												</ul>
											</li>
										
									
										<?php
											}
											}
										}
										
										foreach($fetch_menu_submenu as $data_value)
										{
											if(empty($data_value['module']['sub_menu']))
											{
												if((in_array($data_value['module']['id'], $user_right)) && (!in_array($data_value['module']['name'], $main_menu_arr)))
												{
													$main_menu_arr[]=$data_value['module']['name'];
												 ?>
														<li class="<?php if($page_name==$data_value['module']['page_name_url']){ echo ' active'; } ?>">
															<a href="<?php echo $this->webroot; ?><?php echo $data_value['module']['page_name_url']; ?>" rel='tab'> <i class="<?php echo $data_value['module']['icon_class_name']; ?>"></i><span class="title"><?php echo $data_value['module']['name']; ?></span></a>
														</li>
														<?php
												}
											}
										}
										?>
											</ul>	
									</li>
									<?php
									$class_active='';
									$arrow_open='';
									$class_selected='';
								}
							}
							
						}
					}
				?>  
					<li>
					<a href="<?php echo $this->webroot; ?>Dreamshapers/journal">Journal</a>
					</li>
					
					<li>
					<a href="<?php echo $this->webroot; ?>Dreamshapers/ledger_view">Ledger View</a>
					</li>
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<!-- END SIDEBAR -->
	<!-- BEGIN PAGE CONTENT -->
       <div class="page-content-wrapper">
        	<div class="page-content" >
            	
                	<div class="portlet light" style="padding:0px !important;">
                    	<?php echo $this->fetch('content'); ?>
                        
                         <div class="modal fade" id="deletedis" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                            <div class="modal-dialog modal-lg" >
                                <div class="modal-content" >
                                    <div class="modal-header" >
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <div >
                                    <table>
                                    	<tbody>
                                            <tr><td class="legendColorBox">
                                            <div style="width:4px;height:0;border:5px solid #5365CC;overflow:hidden"></div></td>
                                            <td class="legendLabel">&nbsp; Occupied Today's Arrival</td>
                                            
                                            <td class="legendColorBox">
                                            <div style="width:4px;height:0;border:5px solid #85C030;overflow:hidden"></div></td>
                                            <td class="legendLabel">&nbsp; Occupied Expected Departure</td></tr>
                                            
                                            <tr><td class="legendColorBox">
                                            <div style="width:4px;height:0;border:5px solid #1B4C95;overflow:hidden"></div></td>
                                            <td class="legendLabel">&nbsp; Occupied Billing</td>
                                            
                                            <td class="legendColorBox">
                                            <div style="width:4px;height:0;border:5px solid  #9C58DB;overflow:hidden"></div></td>
                                            <td class="legendLabel">&nbsp; Occupied Complimentary</td></tr>
                                            
                                            <tr><td class="legendColorBox">
                                            <div style="width:4px;height:0;border:5px solid #150402;overflow:hidden"></div></td>
                                            <td class="legendLabel">&nbsp; Occupied Management Block</td>
                                            
                                            <td class="legendColorBox">
                                            <div style="width:4px;height:0;border:5px solid #4AAD6E;overflow:hidden"></div></td>
                                            <td class="legendLabel">&nbsp; Vacant Ready/Clean</td></tr>
                                            
                                            <tr><td class="legendColorBox">
                                            <div style="width:4px;height:0;border:5px solid #C6BB3D;overflow:hidden"></div></td>
                                            <td class="legendLabel">&nbsp; Vacant Dirty</td>
                                            
                                            <td class="legendColorBox">
                                            <div style="width:4px;height:0;border:5px solid rgba(191, 54, 37, 0.98);overflow:hidden"></div></td>
                                            <td class="legendLabel">&nbsp; Out Of Order</td></tr>
                                            
                                		</tbody>
                                    </table>
                                    </div>
                                	<table width="100%" class="responcive" style="margin-top:2%;" border="0">
                                	<tbody>
                                
                                
									<?php  $i=0; 
                                    $fetch_master_roomno=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_index_layout'), array());
                                     foreach($fetch_master_roomno as $master_roomno)
                                     {
                                        foreach($master_roomno as $room_no)
                                        {	
                                            
                                            $room_no_ftc=$room_no['room_no'];
                                            $expload_data=explode(",", $room_no_ftc);
                                                foreach($expload_data as $all_room)
                                                {
                                                $i++;
                                                if($i==1)
                                                {echo '<tr style="border-bottom: solid #FFF 2px;">';}
                                                $room_vacant=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_room_report',$all_room), array());
                                                 $room_status=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_clean_room_report',$all_room), array());
                                                 ?>
                                                 <td>
                                                <li style="height:78px;  margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page" >
                                                <?php
                                                if(!empty($room_vacant) && $room_vacant[0]['room_checkin_checkout']['arrival_date']==date('Y-m-d'))
                                                {
                                                 ?>
                                                <div style="height:75px;" class="Occupied" ><p style="font-size:12px;">Room.No. <strong><br /><?php echo $all_room; ?></strong></p></div>
                                                <?php }
                                                else if(!empty($room_vacant))
                                                {
                                                 ?>
                                                <div style="height:78px;" class="Expected" ><p style="font-size:15px;">Room.No. <strong><br /><?php echo $all_room; ?></strong></p></div>
                                                <?php }
                                                 else if($room_status=='outoforder')
                                                 { ?>
                                                 
                                                <div style="height:76px;" class="Out" ><p style="font-size:15px;">Room.No. <strong><?php echo $all_room; ?></strong></p></div>
                                               <?php }
                                               
                                               else if($room_status=='Dirty')
                                                 { ?>
                                                 
                                                <div style="height:78px;" class="Vacant_darty" ><p style="font-size:15px;">Room.No. <strong><?php echo $all_room; ?></strong></p></div>
                                                <?php
                                                 }
                                                  else if($room_status=='clean')
                                                 {?>
                                                 
                                                <div style="height:76px;" class="Vacant" ><p style="font-size:15px;">Room.No. <strong><br /><?php echo $all_room; ?></strong></p></div>
                                               <?php 
                                                 }
                                                 else
                                                 { ?>
                                                
                                                <div style="height:76px;" class="Vacant" ><p style="font-size:15px;">Room.No. <strong><br /><?php echo $all_room; ?></strong></p></div>
                                                
                                                <?php
                                                }
                                                if(!empty($room_vacant))
                                                {
                                                $guest_name=$room_vacant[0]['room_checkin_checkout']['guest_name'];
                                                $in_date=$room_vacant[0]['room_checkin_checkout']['arrival_date'];
                                                echo'<div style="height:80px; width:100%" class="blue"><p style="font-size:15px;"><strong>'.$guest_name.'</strong></p></div>';
                                                }
                                                else if($room_status=='outoforder')
                                                 {
                                                ?>
                                                <div style="height:80px; width:100%" class="blue"><p style="font-size:15px;"> Out Of Order</p></div>
                                                <?php }
                                                else if($room_status=='Dirty')
                                                 {
                                                ?>
                                                <div style="height:80px; width:100%" class="blue"><p style="font-size:15px;">Dirty</p></div>
                                                <?php }
                                                else if($room_status=='clean')
                                                 {
                                                ?>
                                                <div style="height:80px; width:100%" class="blue"><p style="font-size:15px;"><strong>Clean</strong></p></div>
                                                <?php }
                                                 else
                                                 {
                                                ?>
                                                <div style="height:80px; width:100%" class="blue"><p style="font-size:15px;"><strong>Vacant</strong></p></div>
                                                <?php }?>
                                            </li>
                                     
                                                
                                                
                                                
                                                
                                           </td>
                                                 <?php 
                                                    if($i==10)
                                                    { $i=0; echo "</tr><tr>";}
                                                
                                                }
                                        }
                                        
                                     }
                                        
                                    ?>
                                    </tbody></table>
    
                           
                                           </div>  
                                     </div>
                           
                           	 	</div>
                            <!-- /.modal-content -->
                           	 </div>
                            <!-- /.modal-dialog -->
                           
                          
                 </div>
        	</div>
       </div>
 	</div>
 </div>
 
	<!-- END PAGE CONTENT -->
<!-- END PAGE CONTAINER -->

<!-- BEGIN FOOTER -->

<div class="page-footer">
		<div class="page-footer-inner">
			 2014 &copy; <a href="http://www.phppoets.com" target="_blank"> PHP POETS</a>. All Rights Reserved.
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
        
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/table-managed.js"></script>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>


<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>

<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<!--
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
-->
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<!-- END PAGE LEVEL PLUGINS -->

<!--<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/table-advanced.js"></script>-->

<!-- END PAGE LEVEL SCRIPTS -
-->
 <script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
 <script>
jQuery(document).ready(function(){
/*
   $("a[rel='tab']").live('click',function(e){
		e.preventDefault();
		$(".page-spinner-bar").removeClass("hide"); //show loading
		pageurl=$(this).attr('href');
		window.history.pushState({path:pageurl},'',pageurl);
		$.ajax({
			url:pageurl,

		}).done(function(responce){
			$(".page-spinner-bar").addClass(" hide"); //hide loading
			 
			$("#page-content").html(responce);
			$("html, body").animate({
				scrollTop:0
			},"slow");
			$('.date-picker').datepicker();
		});
		
		});

////////////////////////////////////


*/
var data=$("#response_menu").html();
$(".response_menu").html(data);
$(".response_menu").find('.dropdown-menu').each(function()
{
	$(this).attr('class','sub-menu');
});



		
});
</script>

<!------------------------------------------->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/form-fileupload.js"></script>
<!------------------------------------------->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $this->webroot; ?>assets/global/scripts/shortcut.js"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/ui-toastr.js"></script>
<script src="<?php echo $this->webroot; ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/components-dropdowns.js"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/components-pickers.js"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/form-validation.js"></script>



<script>
	jQuery(document).ready(function() 
	{    
		Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		Demo.init(); // init demo features
		ComponentsPickers.init();
		FormValidation.init();
			ComponentsDropdowns.init();
		UIToastr.init();
		//TableAdvanced.init();
		$('.select2').select2();
		

	});
   </script>
   
<!-- END PAGE LEVEL SCRIPTS -->
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>