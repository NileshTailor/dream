<?php
require_once("function.php");
require_once("config.php");
require_once("auth.php");

  $val=$_GET['q'];
  $id=$_GET['r'];
?>

 <table width="100%" id="my" class="table table-bordered table-striped table-condensed table-hover flip-content">
                            <thead>
                            <tr>
                             <th width="15%" >Employee</th>
                             <th width="20%" style="text-align:center">Name</th>
                            <th width="30%" style="text-align:center">Time</th>
                            <th style="text-align:center">Remarks</th>
                            <tr>
                            </thead>
                           <tbody>
<?php $result=mysql_query("select distinct `id`,`name`,`code` from `registration` where `depart_id`='".$_GET['r']."' && `status`='0' order by `code` ASC");
                        while($row=mysql_fetch_array($result))
                        {$k++;
						$name=$row['name'];
						$code=$row['code'];
						?>

 	<tr id="tr<?php echo $val; ?>">
		   
          <td width="15%" class="echo_flat">
           					<div class="input-icon right">
                               		 <i  class="fa"></i>
                                      <input class="form-control" name="name" id="name" readonly onKeyUp="allLetter(this.value,this.id)" value="<?php echo $code;?>">

                         	</div>
                      
          </td>
          <td width="20%">
          
         					 <div class="input-icon right">
                               		 <i  class="fa"></i>
                                      <input class="form-control" readonly value="<?php echo $name;?>">

                         	</div>
                      
        </td>
          
          <td width="30%">
          				<div class="form-group" style="float:left">
                             
                            <div class="col-md-2">
                            <select name="time" class="form-control select2me" style="width:80px; float:left">
                            <option value="">--HH--</option>
                                        <?php 
                                            for ($i = 0; $i <24; $i++) {
                                                if($i<10)
                                                    echo "<option value=\"0".$i."\">0".$i."</option>";
                                                else 
                                                    echo "<option value=\"".$i."\">".$i."</option>";
                                            }
                                        ?>
                                    </select>
                                  
                            </div>
                            </div>
                            <div style="float:right">
                            <div class="col-md-2">
                            <select name="hrs" class="form-control select2me" style="width:90px; float:right">
                            <option value="">--MM--</option>
                                        <?php 
                                            for ($i = 0; $i <=60; $i++) {
                                                if($i<10)
                                                    echo "<option value=\"0".$i."\">0".$i."</option>";
                                                else 
                                                    echo "<option value=\"".$i."\">".$i."</option>";
                                            }
                                        ?>
                                    </select>
                            </div>  
                            </div>
                            
          </td>
                            
                            
           <td>
           				 <div class="col-md-4">
                            <textarea class="form-control-medium" name="remarks" rows="2" style="resize:none;"></textarea>
                            </div>
                           
           </td>                 
                            </tr>
                            
                           <?php } ?>
                           </tbody>
                           </table>
						    <div>
                                    
                                    <button type="submit" name="advance_reg" class="btn btn-info sub"><i class="fa fa-check"></i> Save</button>
                                    
                            </div>
                           