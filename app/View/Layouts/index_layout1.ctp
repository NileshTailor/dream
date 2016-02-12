<?php
	$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'authentication'), array());
?>
<!DOCTYPE html><head>
<?php 
	$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'ajax_function'), array());
?>  
<?php 
 $login_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'index_layout_session'), array());

?>

<meta charset="utf-8">
<title>Dreamshapers</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<?php Configure::write('debug', 0); ?>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/pace/pace.min.js" type="text/javascript"></script>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/pace/themes/pace-theme-flash.css" rel="stylesheet" type="text/css"/>
<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">-->
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

<link href="<?php echo $this->webroot; ?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo $this->webroot; ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">

<link href="<?php echo $this->webroot; ?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">

<link href="<?php echo $this->webroot; ?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">

<link href="<?php echo $this->webroot; ?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css"href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-toastr/toastr.min.css"/>

<link href="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>


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
<body class="page-header-menu-fixed">
<!-- BEGIN HEADER -->
<div class="page-header">
	
	<!-- BEGIN HEADER MENU -->
	<div class="page-header-menu fixed">
		<div class="container-full">
        
       
			<!-- BEGIN HEADER SEARCH BOX -->
			<!--<form class="search-form" action="" method="GET">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="query">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form>-->
			<!-- END HEADER SEARCH BOX -->
			<!-- BEGIN MEGA MENU -->
			<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
			<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
			<div class="hor-menu" style="width:100%; padding-left:40px">
            
      		<ul class="nav navbar-nav">
           
               
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
								<a href="<?php echo $this->webroot; ?><?php echo $data['module']['page_name_url']; ?>" <?php if($data['module']['page_name_url']=='logout'){ }else{ ?>rel='tab' <?php } ?>> <i class="<?php echo $data['module']['icon_class_name']; ?>"></i> <?php echo $data['module']['name']; ?></a>
								</li>
								<?php
							}
							if(!empty($data['module']['main_menu']) && !empty($data['module']['sub_menu']))
							{
								if(in_array($data['module']['main_menu'], $main_menu_arr))
								{
									
								}
								else
								{
									$main_menu_arr[]=$data['module']['main_menu'];
									$fetch_menu_submenu=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'menu_submenu',$data['module']['main_menu'],1), array());
									?>
									<li class="menu-dropdown classic-menu-dropdown ">
										<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
										<i class="<?php echo $data['module']['main_menu_icon']; ?>"></i>
										 <?php echo $data['module']['main_menu']; ?> <i class="fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu pull-left">
										<?php
										
										foreach($fetch_menu_submenu as $data_value)
										{
											$fetch_submenu=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'submenu',$data_value['module']['sub_menu']), array());
										?>
										
											<li class=" dropdown-submenu">
												<a href=javascript:;>
												<i class="<?php echo $data_value['module']['sub_menu_icon']; ?>"></i>
												<?php echo $data_value['module']['sub_menu']; ?> </a>
												<ul class="dropdown-menu">
												<?php
												foreach($fetch_submenu as $data_submenu)
												{
													if(in_array($data_submenu['module']['id'], $user_right))
													{
													 ?>
													<li>
														<a href="<?php echo $this->webroot; ?><?php echo $data_submenu['module']['page_name_url']; ?>" rel='tab'> <i class="<?php echo $data_submenu['module']['icon_class_name']; ?>"></i> <?php echo $data_submenu['module']['name']; ?></a>
													</li>
													<?php
													}
												}
												
												?>
												</ul>
											</li>
										
									
										<?php
										}
										?>
											</ul>	
									</li>
									<?php
								}
							}
							if(!empty($data['module']['main_menu']) && empty($data['module']['sub_menu']))
							{
								if(in_array($data['module']['main_menu'], $main_menu_arr))
								{
									
								}
								else
								{
									$main_menu_arr[]=$data['module']['main_menu'];
									$fetch_menu_submenu=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'menu_submenu',$data['module']['main_menu'],0), array());
									foreach($fetch_menu_submenu as $data_value1)
									{
										
										if($data_value1['module']['page_name_url'] == $page_name)
										{
											$class_active='active';
										}
									}
									?>
									<li class="menu-dropdown classic-menu-dropdown <?php echo @$class_active; ?>">
										<a class="hover-initialized" data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
										<i class="<?php echo $data['module']['main_menu_icon']; ?>"></i>
										<?php echo $data['module']['main_menu']; ?> <i class="fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu pull-left">
										<?php
										foreach($fetch_menu_submenu as $data_value)
										{
											if(in_array($data_value['module']['id'], $user_right))
											{
											 ?>
													<li class="<?php if($page_name==$data_value['module']['page_name_url']){ echo ' active'; } ?>">
														<a href="<?php echo $this->webroot; ?><?php echo $data_value['module']['page_name_url']; ?>" rel='tab'> <i class="<?php echo $data_value['module']['icon_class_name']; ?>"></i> <?php echo $data_value['module']['name']; ?></a>
													</li>
													<?php
											}
										}
										?>
										</ul>
									</li>
									<?php
                                    $class_active='';
								}
							}
						}
					}
				?>  
                
	<li><a data-toggle="modal" class="tools" title="Room Status" href="#deletedis"><i class="fa fa-sitemap "></i></a></li>
        
    <li class="menu-dropdown classic-menu-dropdown  opend">
									<a class="hover-initialized" data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
									
								<span style="color:#FF0"><?php echo $login_name;?></span> <span style="color:#0F0"><i class="fa fa-angle-down"></i></span>
									</a>
									<ul class="dropdown-menu pull-left">
																					<li>
													<a href="/dreamshapers/my_profile" rel="tab"> <i class=""></i>My Profile</a>
												</li>
																								<li>
													<a href="/dreamshapers/logout" rel="tab"> <i class=""></i>Logout</a>
												</li>
									</ul>
                                </li>               

    
   
               
                </ul>
			</div>
			<!-- END MEGA MENU -->
		</div>
	</div>
	<!-- END HEADER MENU -->
</div>
<!-- END HEADER -->
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content" style="background-color:rgba(124, 125, 126, 0.36); min-height:573px !important;">
    <div ng-spinner-bar="" class="page-spinner-bar hide">
		<div class="bounce1"></div>
		<div class="bounce2"></div>
		<div class="bounce3"></div>
	</div>
		<div class="container" id="page-content">
        	<div class="portlet light tools">
          
            <?php echo $this->fetch('content'); ?>
             <div class="modal fade" id="deletedis" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-header" >
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<div >
    <table><tbody>


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

</tbody></table>
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
			if(!empty($room_vacant) && $room_vacant[0]['room_checkin_checkout']['arrival_date']==date('Y-m-d'))
			{
			 ?><td>
            <li style="height:75px;  margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page" >
            <div style="height:75px;" class="Occupied" ><p style="font-size:12px;">Room.No. <strong><br /><?php echo $all_room; ?></strong></p></div>
            <?php }
            else if(!empty($room_vacant))
			{
			 ?><td>
            <li style="height:78px;  margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page" >
            <div style="height:78px;" class="Expected" ><p style="font-size:15px;">Room.No. <strong><br /><?php echo $all_room; ?></strong></p></div>
            <?php }
             else if($room_status=='outoforder')
             { ?>
             <td>
            <li style="height:78px;  margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page" >
            <div style="height:76px;" class="Out" ><p style="font-size:15px;">Room.No. <strong><?php echo $all_room; ?></strong></p></div>
           <?php }
           
           else if($room_status=='dirty')
             { ?>
             <td>
            <li style="height:78px;  margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page" >
            <div style="height:78px;" class="Vacant_darty" ><p style="font-size:15px;">Room.No. <strong><?php echo $all_room; ?></strong></p></div>
            <?php
             }
              else if($room_status=='clean')
             {?>
             <td>
            <li style="height:76px;  margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page" >
            <div style="height:76px;" class="Vacant" ><p style="font-size:15px;">Room.No. <strong><br /><?php echo $all_room; ?></strong></p></div>
           <?php 
             }
             else
             { ?>
            <td>
            <li style="height:76px;  margin-left:5%; width:90%;" class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page" >
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
            else if($room_status=='dirty')
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
	<div class="container">
    <p style="color:#A2ABB7"><a href="http://www.phppoets.com" target="_blank">© PHP Poets</a>| All Rights Reserved</p>
	</div>
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
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
<script src="<?php echo $this->webroot; ?>ssets/admin/pages/scripts/table-managed.js"></script>

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
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $this->webroot; ?>assets/global/scripts/shortcut.js"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/ui-toastr.js"></script>
<script src="<?php echo $this->webroot; ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/components-dropdowns.js"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/components-pickers.js"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/form-validation.js"></script>
<!--<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/table-advanced.js"></script>-->

<!-- END PAGE LEVEL SCRIPTS -

 <script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
 <script>
jQuery(document).ready(function(){

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





		
});
</script>----------->

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
	});
   </script>
   
<!-- END PAGE LEVEL SCRIPTS -->
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>