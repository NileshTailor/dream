<tr class="content_<?php echo $count; ?>">
 <td >

        <table class="table table-bordered" id="sub_table2">
                    
                    <tr style="background-color:#E8EAE8;">
                            <th style="width:20%;">Transaction date</th>
                            <th style="width:20%;">Date of Invoice</th>
                            <th style="width:20%;">Due Date</th>
                            <th style="width:20%;">Party Account Head</th>
                            <th style="width:20%;">Invoice Reference</th>
		    </tr>
                    
                    <tr style="background-color:#E8F3FF;">
                    
                    <td>
                    <input type="text" class="date-picker form-control input-small" data-date-format="dd-mm-yyyy"                     value="<?php echo date("d-m-Y"); ?>" style="background-color:white !important;">
                    </td>
                    
                    
                    <td>
                    <input type="text" class="date-picker form-control input-small" data-date-format="dd-mm-yyyy" style="background-color:white !important;">
                    </td>
                    
                    
                    <td>
                    <input type="text" class="date-picker form-control input-small" data-date-format="dd-mm-yyyy" style="background-color:white !important;">
                    </td>
                    
                    
                    <td>
                                <select name="party_head" class="form-control input-small  select2">
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
                    <input type="text" class="form-control input-small" style="text-align:right; background-color:white !important;">
                    </td>
                        
                    </tr>
                    
                    <tr style="background-color:#E8EAE8;">
                      <th>Expense Head</th>
                      <th>Amount of Invoice</th>
                      <th>Attachment</th>
                      <th colspan="2">Description</th>
                    </tr>
             
                     <tr style="background-color:#E8F3FF;">
                     
                     <td>
                                <select class="form-control input-small  select2">
                                <option value="">Select</option>
                                <?php
                        foreach($expenses_ledger_master as $data)
                        {
                        ?>
                        <option value="<?php echo $data['ledger_master']['id']; ?>"><?php echo $data['ledger_master']['name']; ?> </option>	
                        <?php  } ?>
                                </select>
                     </td>
                     
                     
                     <td>
                     <input type="text" class="form-control input-small amt1" style="text-align:right; background-color:white !important;" maxlength="7" id="ammmttt<?php echo $count; ?>" onkeyup="amt_val(this.value,<?php echo $count; ?>)">
                     </td>
                     
                     
                     <td>
                                <input type="file" class="default">
                            
                               
                     </td>
                     
                     
                     <td colspan="2">
                     <input type="text" class="form-control input-medium" maxlength="100" style="background-color:white !important;">
                     </td>
                     </tr>
                    
                    </table>
                    </td>
                    <td>
<a class="btn green mini adrww" onclick="add_rowwwww()"><i class="fa fa-plus"></i></a><br>
<a  class="btn red mini" onclick="delete_row(<?php echo $count; ?>)"><i class=" fa fa-trash-o"></i></a><br>
</td>
</tr>