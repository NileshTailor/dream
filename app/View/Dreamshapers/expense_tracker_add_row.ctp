<tr class="content_<?php echo $count; ?>">
 <td >
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
    <td>
<a class="btn green mini adrww" onclick="add_rowwwww()"><i class="fa fa-plus"></i></a><br>
<a  class="btn red mini" onclick="delete_row(<?php echo $count; ?>)"><i class=" fa fa-trash-o"></i></a><br>
</td>
</tr>