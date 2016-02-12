<?php
require_once("config.php");
function temp()
{
?>
<script src="assets/js/jquery-1.8.3.min.js"></script>	
<script src="maskinput/jquery.maskedinput-1.3.min.js" type="text/javascript"></script>
<script>
jQuery(function($){
   $("#dob").mask("99-99-9999");
   $("#year").mask("9999");
   $("#pin_code").mask("999999"); 
   $("#mobile_no").mask("9999999999");
});
</script>
<?php
}
function autocomplete()
{
	?>
<link rel="stylesheet" type="text/css" href="autocomplete/jquery.autocomplete.css" />
<script type='text/javascript' src='autocomplete/jquery.autocomplete.js'></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#name").autocomplete("autocomplete/emp_name_fetch.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
});
</script>
    <?php
}
