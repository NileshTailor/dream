<?php
date_default_timezone_set('asia/kolkata');
/////////////////////////////////////////////////////////////////////////////////////////////
function title()//function to show title
{	
	echo "Attendance";
}

/////////////////////////////////////////////////////////////////////////////////////////////
function logo()//function to show title
{
//echo "<link rel='shortcut icon' href='assets/favicon.ico'/>";
}
/////////////////////////////////////////////////////////////////////////////////////////////
function header_image()//function to show header logo
{	
	echo "<img src='img/spsu.png' style='padding-left:10px; padding-bottom:10px;' />";
}
/////////////////////////////////////////////////////////////////////////////////////////////

function footer()//function to show footer
{?>
    <div class="footer displaynone white-color-print">
        <div class="footer-inner">
       <!--  <a href="http://php.net/"><img src="img/nmc.png"></a> 
             <a href="http://nmcorp.co.in/"><img src="img/nmcorp.png"></a> -->
        </div>
    </div>
<?php
}/////////////////////////////////////////////////////////////////////////////////////////////
function print_css()//function to call all the css files
{?>
<style media="print">
.displaynone
{
	display:none !important;
}
.white-color-print
{
	background-color:#FFF !important;
}
</style>

<style>
.table thead tr th {
    font-size: 14px;
    font-weight: 600;
}
.table tbody tr td {
    font-size: 15px;
    
}
.table thead > tr > th {
    border-bottom: 0px none;
}
.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
    border: 1px solid #DDD;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 4px;
    line-height: 1;
}
table {
    border-collapse: collapse;
    border-spacing: 0px;
}

body {
    color: #000;
    font-family: "Open Sans",sans-serif;
    font-size: 13px;
    direction:ltr;
}
</style>
<?php
}/////////////////////////////////////////////////////////////////////////////////////////////
function css()//function to call all the css files
{?>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<!--<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_conquer.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>-->
<link href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet"/>
<!--<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/gritter/css/jquery.gritter.css"/>-->
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_conquer.css"/>
<!--<link rel="stylesheet" type="text/css" href="assets/plugins/clockface/css/clockface.css"/>-->
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-timepicker/compiled/timepicker.css"/>
<!--<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-colorpicker/css/colorpicker.css"/>-->
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<!--<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/jquery-multi-select/css/multi-select.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-conquer.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/jquery-tags-input/jquery.tagsinput.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">-->

<link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="assets/plugins/data-tables/DT_bootstrap.css"/>
<!--<link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-conquer.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/pages/portfolio.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>

<!-- END THEME STYLES -->
<style>
input[type="radio"] {
    margin-left: 0px !important;
}
.white-color-display
{
	background-color:#FFF !important;
}
</style>
<style media="print">
.displaynone
{
	display:none;
}
.white-color-print
{
	background-color:#FFF !important;
}
</style>
<?php
}

/////////////////////////////////////////////////******  js   ***********////////////////////////////////////////////
function js()//function to call all the css files
{?>
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>


<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/jquery-mixitup/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<!-- END CORE PLUGINS -->
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!--<script src="assets/plugins/jquery.peity.min.js" type="text/javascript"></script>-->
<!--<script src="assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<!--<script src="assets/plugins/jquery-knob/js/jquery.knob.js" type="text/javascript"></script>
<script src="assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>-->
<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<!--<script src="assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>-->
<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/jquery-validation/dist/additional-methods.min.js"></script><!--RICHTEXTBOX JS 2 FILE-->
<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!--<script src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js" type="text/javascript"></script>
<script src="assets/scripts/form-validation.js"></script>
<script src="assets/scripts/table-editable.js"></script>
<script src="assets/scripts/index.js" type="text/javascript"></script>
<script src="assets/scripts/tasks.js" type="text/javascript"></script>

<script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="assets/scripts/table-advanced.js"></script>
<script src="assets/scripts/form-components.js"></script>
<script src="assets/scripts/portfolio.js"></script>
<script src="assets/plugins/dropzone/dropzone.js"></script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   App.init();      FormValidation.init();

   TableEditable.init();
   FormComponents.init();

   Portfolio.init();
   FormDropzone.init();
});
</script>
<?php
}
function rightclick_disabled()
{
	?>
    <script type="text/javascript">
 var message="This Function is not allowed here";
///////////////////////////////////
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers)
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")
</script>
<?php
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 function nevibar_menu()
{
	$lid=$_SESSION['id'];
	$result=mysql_query("select `username` from login where `id`='".$lid."'");
	$row=mysql_fetch_array($result);
	$username=$row['username'];
	?>
<!-- BEGIN HEADER -->

<div class="header navbar navbar-inverse navbar-fixed-top displaynone white-color-print">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
	
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a class="navbar-brand" href="index.php">
			<img  alt="logo" class="img-responsive" width="70%"  style="margin-top:-5%">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN NOTIFICATION DROPDOWN -->
			<!-- END TODO DROPDOWN -->
			<li class="devider">
				 &nbsp;
			</li>
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user">
              <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
			<!--	<img alt="IMG" src="img/spsu.png"  width="30"/>  -->
				<span class="username">
					 <b>WELCOME: <span style="padding-left:2px;"><?php echo strtoupper($username); ?></span></b>
				</span>
				<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					
				<li>
					<a href="logout.php"><i class="fa fa-key"></i> Log Out</a>
				</li>
			</ul>
		</li>
        <a class="navbar-toggle" href="javascript:;" data-toggle="collapse" data-target=".navbar-collapse">
		<img alt="" src="assets/img/menu-toggler.png">
		</a>
		<!-- END USER LOGIN DROPDOWN -->
	</ul>
	<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<?php
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function datefordb($date)
{$date_new=date("Y-m-d",strtotime($date));return($date_new);}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function dateforview($date)
{
$date_no='N/A';	
$date_new=date("d-m-Y",strtotime($date));
if($date_new=='01-01-1970')
return($date_no);
else
return($date_new);}///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function fetchdepartmentname($id)
{
$result=mysql_query("select `name` from `department` where `id`='".$id."'");
$row=mysql_fetch_array($result);
$name = $row['name'];
return($name);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function fetchemployeename($id)
{
$result=mysql_query("select `name`,`code` from `registration` where `id`='".$id."'");
$row=mysql_fetch_array($result);
$name = $row['name'];
$code = $row['code'];
return($name." [".$row['code']."]");
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function returnDates($fromdate, $todate) {
    $fromdate = \DateTime::createFromFormat('d-m-Y', $fromdate);
    $todate = \DateTime::createFromFormat('d-m-Y', $todate);
    return new \DatePeriod(
        $fromdate,
        new \DateInterval('P1D'),
        $todate->modify('+1 day')
    );
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function get_time_difference($time1, $time2)
{
    $time1 = strtotime("1/1/1980 $time1");
    $time2 = strtotime("1/1/1980 $time2");
    if ($time2 < $time1)
    {   
	 	$time2 = $time2 + 86400;
    }
    return ($time2-$time1) / 3600;
}  
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function fetchprefix($depart_id,$max_emp_code)
{
$result_prefix=mysql_query("select `prefix` from `department` where `id`='".$depart_id."'");
$row_prefix=mysql_fetch_array($result_prefix);
$prefix=$row_prefix['prefix'];
$len=strlen($max_emp_code);
$mylen="";
if($len==1)
$mylen="000";
else if($len==2)
$mylen="00";
else if($len==3)
$mylen="0";
return($prefix.$mylen.$max_emp_code);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function menu()//function to call all the css files
{
	
?>
 <div class="page-sidebar-wrapper displaynone">
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
         
			<ul class="page-sidebar-menu" style="overflow: hidden; width: auto; height: 405px;">
            
            <li  class="">
            <a  style="background:#1CAF9A !important" href="index.php"><i class="fa fa-dashboard" style="color:#FFF !important;"></i>
            <span  class="title">Dashboard</span>
            </a> 
            </li>
 

      
            <li>
            <a  href="javascript:;"><i class="fa fa-comments-o" style="color:#FFF !important;"></i>Employee Registration
            <span class="title"></span>
            <span class="arrow"></span>
            </a>
            <ul class="sub-menu">                        
            <li><a href="emp_menu.php"> <i class="fa fa-plus" style="color:#FFF !important;"></i> Add</a></li>
            <li><a href="emp_menu.php?mode=edit"> <i class="fa fa-edit" style="color:#FFF !important;"></i> Edit</a></li>
            <li><a href="emp_menu.php?mode=del"> <i class="fa fa-trash-o" style="color:#FFF !important;"></i> Delete</a></li>
            <li><a href="emp_menu.php?mode=view"> <i class="fa fa-th" style="color:#FFF !important;"></i> View</a></li>
            </ul>
            </li>   
            
            <li>
            <a  href="javascript:;"><i class="fa fa-rupee" style="color:#FFF !important;"></i>Advance Paid
            <span class="title"></span>
            <span class="arrow"></span>
            </a>
            <ul class="sub-menu">                        
            <li><a href="menu.php"> <i class="fa fa-plus" style="color:#FFF !important;"></i> Add</a></li>
            <li><a href="advance_menu.php?mode=edit"> <i class="fa fa-edit" style="color:#FFF !important;"></i> Edit</a></li>
            <li><a href="advance_menu.php?mode=del"> <i class="fa fa-trash-o" style="color:#FFF !important;"></i> Delete</a></li>
            <li><a href="advance_menu.php?mode=view"> <i class="fa fa-th" style="color:#FFF !important;"></i> View</a></li>
            </ul>
            </li>  
           
            <li>
            <a  href="javascript:;"><i class="fa fa-cloud" style="color:#FFF !important;"></i>Overtime Record
            <span class="title"></span>
            <span class="arrow"></span>
            </a>
            <ul class="sub-menu">                        
            <li><a href="over_menu.php" style="color:#FFF !important;"> <i class="fa fa-plus"></i> Add</a></li>
            <li><a href="overtime_menu.php?mode=edit" style="color:#FFF !important;"> <i class="fa fa-edit"></i> Edit</a></li>
            <li><a href="overtime_menu.php?mode=del" style="color:#FFF !important;"> <i class="fa fa-trash-o"></i> Delete</a></li>
            <li><a href="overtime_menu.php?mode=view" style="color:#FFF !important;"> <i class="fa fa-th"></i> View</a></li>
            </ul>
            </li>   
            
                                   
            <li><a href="attendance.php"> <i class="fa fa-check" style="color:#FFF !important;"></i> Attendance</a></li> 
      		
       		 <li>
            <a href="setup.php"><i class="fa fa-cog" style="color:#FFF !important;"></i>
            <span  class="title">Department Master</span>
            </a> 
            </li>
 
             
            <li>
            <a  href="javascript:;"><i class="fa fa-bar-chart-o" style="color:#FFF !important;"></i> 
            <span class="title">Reports</span>
            <span class="arrow"></span>
            </a>
            <ul class="sub-menu">                        
            <li><a href="report_attendance.php"><i class="fa fa-exchange" style="color:#FFF !important;"></i> Attendance</a></li>
            <li><a href="repot_depart.php"><i class="fa fa-sitemap" style="color:#FFF !important;"></i> Department</a></li>
            <li><a href="repot_totamnt.php"><i class="fa fa-inbox" style="color:#FFF !important;"></i> Total Amount</a></li>
            </ul>
            </li> 
            
            
             
			</ul>
				
                </div>
                </div>
                </div>
                
<?php
}
/////////////////////////////////////////////////////////////////////////////////////////////
function ajax()
{
	?>
<script type="text/javascript">
   var xobj;
   //modern browers
   if(window.XMLHttpRequest)
    {
	  xobj=new XMLHttpRequest();
	  }
	  //for ie
	  else if(window.ActiveXObject)
	   {
	    xobj=new ActiveXObject("Microsoft.XMLHTTP");
		}
		else
		{
		  alert("Your broweser doesnot support ajax");
		  }
	
	function delete_emp(id,i)
	{
 		if(xobj)
       	{
           var query="?delete_emp=" + id;
		   xobj.open("GET","ajax_page.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {      
				document.getElementById(i).innerHTML="";
			   	/* var my_activity='<h4 class="alert-heading"  ><i class="icon-thumbs-up"></i> Employee Deleted!</h4>';
				 var my_details='<p >Employee Deleted Successfully</p>';
			     my_notification(my_activity,my_details);
				 */
			   }
			  }
             }
             xobj.send(null);
		}
		
	function delete_advance(id,i)
	{
		if(xobj)
       	{
           var query="?delete_advance=" + id;
		   xobj.open("GET","ajax_page.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {      
				document.getElementById(i).innerHTML="";
			   	/* var my_activity='<h4 class="alert-heading"  ><i class="icon-thumbs-up"></i> Employee Deleted!</h4>';
				 var my_details='<p >Employee Deleted Successfully</p>';
			     my_notification(my_activity,my_details);
				 */
			   }
			  }
             }
             xobj.send(null);
	}
		 
		
		function delete_overtime(id,i)
		{
		  if(xobj)
       	  {
           var query="?delete_overtime=" + id;
		   xobj.open("GET","ajax_page.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {      
				document.getElementById(i).innerHTML="";
			   	/* var my_activity='<h4 class="alert-heading"  ><i class="icon-thumbs-up"></i> Employee Deleted!</h4>';
				 var my_details='<p >Employee Deleted Successfully</p>';
			     my_notification(my_activity,my_details);
				 */
			   }
			  }
             }
             xobj.send(null);
		}
		
		
		function fetch_employee(val)
		{
		 if(xobj)
			   {
	  			   document.getElementById("emp_place_here").innerHTML="<img style='margin-left:30%;' src='maskinput/ajax-loader-5.gif'></img>";		    
  				   var query="?depart_id=" + val;
				 
				   xobj.open("GET","ajax_page.php" +query,true);
				   xobj.onreadystatechange=function()
					  {
					  if(xobj.readyState==4 && xobj.status==200)
					   {      
						document.getElementById("emp_place_here").innerHTML=xobj.responseText;
					   }
					  }
					 }
					 xobj.send(null);
		}




function fetch_employee2(val)
		{
		 if(xobj)
			   {
	  			   document.getElementById("emp_place_here").innerHTML="<img style='margin-left:30%;' src='maskinput/ajax-loader-5.gif'></img>";		    
  				   
				   var query="?depart_id2=" + val;
				   xobj.open("GET","ajax_page.php" +query,true);
				   xobj.onreadystatechange=function()
					  {
					  if(xobj.readyState==4 && xobj.status==200)
					   {      
						document.getElementById("emp_place_here").innerHTML=xobj.responseText;
					   }
					  }
					 }
					 xobj.send(null);
		}




		function fetch_emp_name(val)
		{
			 if(xobj)
			   {
	  			   document.getElementById("emp_place_here").innerHTML="<img style='margin-left:30%;' src='maskinput/ajax-loader-5.gif'></img>";		    
  				   var query="?emp_depart_wise=" + val;
				   xobj.open("GET","ajax_page.php" +query,true);
				   xobj.onreadystatechange=function()
					  {
					  if(xobj.readyState==4 && xobj.status==200)
					   {      
						document.getElementById("emp_place_here").innerHTML=xobj.responseText;
					   }
					  }
					 }
					 xobj.send(null);
		}
	
		
		function fetch_att(status,id)
		{
		if(xobj)
       	  {
			if(status=='P')
			{
			document.getElementById("show_p"+id).innerHTML='<div class="input-icon right"><i class="fa fa-check" data-original-title="success input!"></i></div>';
			document.getElementById("show_a"+id).innerHTML='';
			document.getElementById("show_h"+id).innerHTML='';
			}
			else if(status=='H')
			{
			document.getElementById("show_h"+id).innerHTML='<div class="input-icon right"><i class="fa fa-check" data-original-title="success input!"></i></div>';
			document.getElementById("show_a"+id).innerHTML='';
			document.getElementById("show_p"+id).innerHTML='';
			}
			else
			{
			document.getElementById("show_a"+id).innerHTML='<div class="input-icon right"><i class="fa fa-check" data-original-title="success input!"></i></div>';
			document.getElementById("show_p"+id).innerHTML='';
			document.getElementById("show_h"+id).innerHTML='';	
			}
		  var att_date=$('#att_date').val();  
          var query="?status=" + status + "&reg_id=" + id + "&date=" +att_date;
		   xobj.open("GET","ajax_page.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
					
			   }
			  }
             }
             xobj.send(null);
		}
		
		
		
		function allLetter(inputtxt,id)  
			{  
			//var numbers = /^[-+]?[0-9]+$/;
			var numbers =  /^[0-9]*\.?[0-9]*$/;  
			if(inputtxt.match(numbers))  
			{  
			
			}  
			else  
			{  
			document.getElementById(id).value=""; 
			return false;  
			}  
			} 
		
</script>
  <?php
}
