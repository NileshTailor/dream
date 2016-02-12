<?php
 $add_row=$_GET['row'];

?>
<table width="100%" style="height:auto;" border="0" >
    <tr id="removeid<?php echo $add_row; ?>">  
        <td width="42%" height="50px">
            <input type="text" name="cardholder<?php echo $add_row; ?>" id="<?php echo $add_row; echo ","; ?>" class="form-control input-medium" autofocus  placeholder="Name of Cardholder" />
        </td>
        <td width="30%">
            <input type="text" name="applicant<?php echo $add_row; ?>" id="<?php echo $add_row; echo ","; ?>" class="form-control input-medium"   placeholder="Name of Applicant"  />
        </td>
        
        <td width="30%">&nbsp;
            <button type="button" onclick="registration_removerow(<?php echo $add_row;  ?>);"   class="btn btn-xs red">Remove</i></button>
        </td>
    </tr>
</table>
    