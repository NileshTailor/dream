<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Outstanding Bill
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab_1_1">
                   
<form method="post" enctype="multipart/form-data">


<table width="50%" border="0" align="">
    <tr><td align="right" style="padding-right:10px"><label>Select Company</label></td>
    <td style="padding-bottom:5px">
    
    <select class=" form-control input-small select2me" name="company_id" id="company_id" placeholder="Select...">
                        <option value=""></option>	
                        <?php
                        foreach($fetch_company_registration as $data)
                        {
                        ?>
                        <option  value="<?php echo $data['company_registration']['id'];?>"><?php echo $data['company_registration']['company_name'];?></option>
                        <?php
                        }
                        ?>
                        </select>
    </td></tr>
    
  <tr><td colspan="2" align="center" style="padding-top:10px"><button  type="submit" name="submit" class="btn green"><i class="fa fa-print"></i> Bill</button></td></tr>    
    </table>
</form>



</div></div>

</div></div></div>
