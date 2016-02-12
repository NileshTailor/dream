<?php
if(empty($active))
{ $active=0;
}
?>
<div id="toasthide">
<div role="alert" aria-live="polite" class="toast-top-right" id="toast-container" style="display:none; padding-top:40px"><div style="" class="toast " id="hide"><div class="toast-title">Menu Item</div><div class="toast-message"> </div></div></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-border">
            <ul class="nav nav-tabs">
               <li <?php if(empty($active) || $active==1){?> class="active"<?php } else {?>class=""<?php }?>  >
                    <a aria-expanded="true" href="#tab_1_1" data-toggle="tab">Menu Report
                    

                    </a>
                </li>
               
                
            </ul>
            <div class="tab-content">
                <div <?php if(empty($active) || $active=='1'){?> class="tab-pane fade active in"<?php } else {?>class="tab-pane fade"<?php }?>  id="tab_1_1">
                <?php
                if(!empty($error))
				{
					echo "<div id='success' class='note note-danger alert-notification'><p>Data Already Exist</p></div>";
					
				}
				?>
                    <form method="post" name="add" id="add_master_item_type">
                   	 <div class="table-responsive">
                    	<table class="table self-table" style=" width:50% !important;">
                         <tr>
                        <td><label>Menu Category</label></td>
                        <td> <select class="form-control input-medium" required="required" name="menu_category_idd">
                                <option value="">--- Select Menu category ---</option>
                                <?php
                                foreach($fetch_menu_category as $data)
                                {
                                ?>
                                <option value="<?php echo $data['menu_category']['id'];?>">
                                <?php echo $data['menu_category']['menu_category_id'];?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                        </tr>
                  
                        </table>
                       <button  type="submit" style="margin-left:20%;"  class="btn green" name="submit" value="submit"><i class="fa fa-print"></i> Report</button>
                       <button type="reset" name="" class="btn red " value="submit"><i class="fa fa-level-down"></i> Reset</button>
                       
                     </div>
                    </form>
                </div>
               </div></div></div></div>
               
               
               
               
            