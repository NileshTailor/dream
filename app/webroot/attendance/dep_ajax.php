<?php
require_once("function.php");
require_once("config.php");
require_once("auth.php");

  $dep_id=$_GET['con2'];
  $count=$_GET['con1'];
?>




<select name="reg_id"  class="form-control select2me-medium">
                        <option value="">---select employee name with their code---</option>
                        <?php
                        $result=mysql_query("select distinct `id`,`name`,`code` from `registration` where `depart_id`='".$dep_id."' && `status`='0' order by `name`");
                        while($row=mysql_fetch_array($result))
                        {
                        echo '<option value="'.$row['id'].'">'.$row['name']." [".$row['code']."]".'</option>';
                        }
                        ?>
                        </select>
                       	