
<style>
#tbb th{
	font-size: 10px !important;background-color:#C8EFCE;padding:2px;border:solid 1px #55965F;white-space: nowrap !important; 
}
#tbb td{
	padding:2px;
	font-size: 12px;border:solid 1px #55965F;background-color:#FFF;white-space: nowrap !important; 
}
.text_bx{
	width: 50px;
	height: 15px !important;
	margin-bottom: 0px !important;
	font-size: 12px;
}
.text_rdoff{
	width: 50px;
	height: 15px !important;
	border: none !important;
	margin-bottom: 0px !important;
	font-size: 12px;
}
</style>




<!-------------------------------- Start New Expense Tracker Form------------------------->
<form method="post" id="form2">
<div id="main_url">
<div class="portlet box grey-cascade">
<div class="portlet-title">
<h4 class="block">Create New Expense Tracker Vouchers</h4>
</div>
<div class="portlet-body form">
                   
<table class="table"  id="main_table">
<tbody >
<tr>
<td>
                    
<table class="table table-bordered">
    
    <tr style="background-color:#E8EAE8;">
            <th >Transaction date</th>
            <th>Party Account Head</th>
            <th>Expense Head</th>
    </tr>
    
    <tr style="background-color:#E8F3FF;">
    
    <td>
    <input type="text" class="date-picker form-control input-medium" data-date-format="dd-mm-yyyy" name="transaction_date[]" value="<?php echo date("d-m-Y"); ?>" style="background-color:white !important;">
    </td>
    <td>
        <select class="form-control input-medium  select2 select2-offscreen" name="user_id[]">
        <option value="">Select</option>
        <?php 
        foreach($account_head_ledger_master as $data)
        {
        
        ?>
        <option value="<?php echo $data['ledger_master']['id']; ?>"><?php echo $data['ledger_master']['name']; ?> </option>	
        
        <?php }	?>
        </select>
    </td>
     <td>
        <select class="form-control input-medium  select2 select2-offscreen" name="ledger_master_id[]">
        <option value="">Select</option>
        <?php
        foreach($expenses_ledger_master as $data)
        {
        ?>
        <option value="<?php echo $data['ledger_master']['id']; ?>"><?php echo $data['ledger_master']['name']; ?> </option>	
        <?php  } ?>
        
        </select>
     </td>
    </tr>
    
    <tr style="background-color:#E8EAE8;">
      
      <th>Amount of Invoice</th>
      <th colspan="2">Naration</th>
    </tr>
     <tr style="background-color:#E8F3FF;">
    
     <td>
     <input type="text" class="form-control input-medium amt1" style="text-align:right; background-color:white !important;" onkeyup="amt_val(this.value,1)" maxlength="7" id="ammmttt1" name="amount[]">
     </td>
   
     <td colspan="2">
     <input type="text" class="form-control input-medium" maxlength="100" style="background-color:white !important;" name="narration[]">
     </td>
     </tr>
    
    </table>

</td>
<td >
<a class="btn green mini adrww" onclick="add_rowwwww()"><i class="fa fa-plus"></i></a><br>
</td>
</tr>
</tbody>
</table>
       
                          
<div class="form-actions">
<center>
<button type="submit" class="btn blue">Save</button>
<button type="button" class="btn">Cancel</button>
</center>
</div>
</div>
</div>
</div>
</form>
<!------------------------------ End New Expense Tracker Form ------------------------->



<script>
function amt_val(vv,dd)
{
if($.isNumeric(vv))
{
$("#output").html('');	
}
else
{
$("#output").html('<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">Amount Should be Numeric Value in row '+ dd +'</div>');
$("#ammmttt"+ dd).val("");
return false;		
}
}
</script>

<script>

function add_rowwwww()
{
$(".adrww").css("visibility", 'hidden');
var count = $("#main_table")[0].rows.length;
count++;
$.ajax({
url: 'expense_tracker_add_row?count=' + count,
}).done(function(response) {
$('#main_table').append(response);
$(".adrww").css("visibility", 'visible');
$('select').select2();
$('.date-picker').datepicker();
});
}
function delete_row(ttt)
{
$('.content_'+ttt).remove();	
}
</script>




<script>
$(document).ready(function(){
	
	
$("#new_party_acc").live('click',function(){	
	$('#party_acc_popup').show();
});	

$("#close_div").live('click',function(){	
	$('#party_acc_popup').hide();
});	

$(".submit_btn").bind('click',function(){	
	var party_acc_head=encodeURI($('#party_acc_head').val());
	$.ajax({
		url: "<?php echo $webroot_path; ?>Expensetrackers/add_new_party_account_head/"+party_acc_head,
		}).done(function(response) {
			if(response=="OK"){
				$('#party_acc_head_body').html('<br/><div class="alert alert-block alert-success fade in"><p>New party account head added.</p><p><a class="btn green" role="button" rel="tab" href="<?php echo $webroot_path; ?>Expensetrackers/expense_tracker_add">OK</a></p></div>');
			}
		});	
});	
	
	
	


$(".delete").live('click',function(){	
var id = $(this).attr("id");
$('.content_'+id).remove();
});

$("#import").bind('click',function(){
	$("#myModal3").show();
 });
	 
$("#close_div").bind('click',function(){
	$("#myModal3").hide();
});

$('form#form1').submit( function(ev){ 
ev.preventDefault();
im_name=$("#image-file").val();

    if(im_name==""){
	$("#vali").html("<span style='color:red;'>Please Select a Csv File</span>");	
	return false;
    }

var ext = $('#image-file').val().split('.').pop().toLowerCase();
if($.inArray(ext, ['csv']) == -1) {
	$("#vali").html("<span style='color:red;'>Please Select a Csv File</span>");
	return false;
}
$(".import_btn").text("Importing...");
var m_data = new FormData();
m_data.append( 'file', $('input[name=file]')[0].files[0]);

		$.ajax({
		url: "<?php echo $this->webroot;?>Expensetrackers/import_expense_tracker_ajax",
		data: m_data,
		processData: false,
		contentType: false,
		type: 'POST',
		}).done(function(response) {
			
		$("#myModal3").hide();
		$('#show_import_data').html(response);

});
});




$('form#form2').submit( function(ev){ 
	ev.preventDefault();	
	var m_data = new FormData(); 
	var count = $("#main_table")[0].rows.length;
	
	var ar=[];
	
	for(var i=1; i<=count; i++){
var posting_date=$("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table2 tr:nth-child(2) td:nth-child(1) input").val();
var date_of_invoice=$("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table2 tr:nth-child(2) td:nth-child(2) input").val();
var due_date=$("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table2 tr:nth-child(2) td:nth-child(3) input").val();
var ex_head=$("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table2 tr:nth-child(2) td:nth-child(4) select").val();
var invoice_ref=$("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table2 tr:nth-child(2) td:nth-child(5) input").val();
var party_ac=$("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table2 tr:nth-child(4) td:nth-child(1) select").val();
var amt_inv=$("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table2 tr:nth-child(4) td:nth-child(2) input").val();
var description=$("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table2 tr:nth-child(4) td:nth-child(4) input").val();
 m_data.append('file'+i,$('#main_table tr:nth-child('+i+') td:nth-child(1) #sub_table2 tr:nth-child(4) td:nth-child(3) input[type=file]')[0].files[0]);

ar.push([posting_date,date_of_invoice,due_date,ex_head,invoice_ref,party_ac,amt_inv,description]);
			}
	var myJsonString = JSON.stringify(ar);
	m_data.append('myJsonString',myJsonString);
	$.ajax({
			url: "expense_tracker_json",
			data: m_data,
			processData: false,
			contentType: false,
			type: 'POST',
			dataType:'json',
			}).done(function(response) {
				//alert(response);
				$("#output").html(response);
			if(response.report_type=='error'){
			
					$("#output").html('<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">'+response.text+'</div>');
					 //setInterval(function(){ $("#output").html(''); }, 10000);
					//$("#output").html('');
			}
			if(response.report_type=='submit'){
				$(".portal").remove();
				$("#shwd").show();
				$(".swwtxx").html(response.text);
				$("#output").remove();
			}
			$("html, body").animate({
			scrollTop:0
			},"slow");
			//$("#output").html(response);
			
	});
	
});

});
</script> 

<div id="shwd" class="hide">
<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-body">
<h4><b>Thank You!</b></h4>
<p class="swwtxx"></p>
</div>
<div class="modal-footer">
<a href="<?php echo $webroot_path; ?>Expensetrackers/expense_tracker_view" class="btn red" rel='tab'>OK</a>
</div>
</div>
</div> 