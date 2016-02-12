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
        <div class="rem">
        	<div class="portlet">
                            
            
            
            
            
            
             
                            <div class="portlet-title">
                            
                            <div class="caption">
                            <i class="fa fa-inr"></i> OverTime Add
                            </div>
                            </div>
                            
                            
                 </div>
                 <div style="margin-left:30%;width:80%">
            <table width="100%" style="margin:auto" cellpadding="10">
            <tr>
            <td width="20%">
            
                            Section/Department</td><td>
                            <div class="col-md-4">
                                <div class="input-icon right">
                               		 <i  class="fa"></i>
                            <select name="depart_id2" class="form-control wing" onChange="fetch_employee2(this.value);" dep="1">
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
              </td>              
            </tr>
            <tr>  
            <td>              
                              <div class="form-group">
                            OverTime Given Date</td><td>
                            <div class="col-md-4">
                            <div class="input-icon right">
                               		 <i  class="fa"></i>
                            <input class="form-control date-picker"  name="advance_given_date" id="dt_date" data-date-format="dd-mm-yyyy">
                            <div id="show"></div>
                            </div>
                            </div>
                            </div>  
                  </td>        
               </tr>
               </table>             
                            
                          </div>  
                           <form method="post" id="form2">
                            <div id="myTable">
                            
                            </div>
                            </form>
                            <br>
          
                            
                             
                            
                            <br>
                            </div>
                          
                            </div>
                            <div class="alert alert-block alert-success fade in" style="display:none">
	<h4 class="alert-heading">Success!</h4>
</div>
            				
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>

<!-- END CONTAINER -->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){

	$(".wing").bind('change',function(){
		var count = $("#myTable tr").length;
		
		var id= $(".wing").val();
	
		count++;
		$("#url_main").append();

		$.get('over_add.php?q='+count+'&r='+id, function(data){
			content= data;

			$('#myTable').html(content);
		});
		
	   });
	   
	   $(".wing").live('change',function(){
		   
		var c=this.value;
		var i=$(this).attr('dep');
	
		$('.echo_flat').html("Loading...").load('dep_ajax.php?con2='+c+'&con1='+i);
		
	});
	
$('form#form2').submit( function(ev){
	
	
		ev.preventDefault();
		var count = $("#my tbody tr").length;
		var ar = [];	
		
		var date=$("#dt_date").val();
	
		for(var i=1;i<=count;i++)
		{
		
		
		var n=$("#myTable table tbody tr:nth-child("+i+")  input[name=name]").val();
  
		var e=$("#myTable table tbody tr:nth-child("+i+")  td:nth-child(3) select[name=time]").val();
		var f=$("#myTable table tbody tr:nth-child("+i+")  td:nth-child(3) select[name=hrs]").val();
		var m=$("#myTable table tbody tr:nth-child("+i+")  textarea[name=remarks]").val();
		
		ar.push([n,e,f,m,date]);
		
  
		}
	
		var myJsonString = JSON.stringify(ar);
		myJsonString=encodeURIComponent(myJsonString);
		$.ajax({
			url: "over.php?q="+myJsonString,
			type: 'POST',
			dataType:'json',
		}).done(function(response){
	if(response.report_type=='error'){
		
		$("#show").html('<div class="alert alert-error" style="color:red">'+response.text+'</div>')
	}
			if(response.report_type=='submit'){
				$(".rem").remove();
				$(".alert-success").show().append("<p>"+response.text+"</p><p><a class='btn green' href='over_menu.php'>ok</a></p>");
				//$("#output").remove();
			}
			$("html, body").animate({
			scrollTop:0
			},"slow");
			
				});
			
		
		
		

	});
	   
	    });
	   
</script>	   
<?php
footer();


js();?>

</body>
<!-- END BODY -->

<!-- Mirrored from www.keenthemes.com/preview/conquer/layout_sidebar_fixed.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 Jan 2014 12:02:43 GMT -->
</html>
