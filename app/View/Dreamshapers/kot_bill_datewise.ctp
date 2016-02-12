   <div class="table-responsive">

                        <div class="portlet box" style="border:#FFF !important; background-color:#E26A6A">
                            <div class="portlet-title box white">
                                <div class="caption">
                                    <i class="fa fa-book" style="color:#FFF"></i><strong>Kot Summary</strong>
                                </div>
                            </div>
                                <div class="portlet-body">
                                <form method="post" enctype="multipart/form-data">
                                <table border="0" width="50%" style="float:left">
                                <tr>
                                <td colspan="2">
                            <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="cash_report" value="0"  id="room_service2" checked="checked">Combine</label>
                                <label class="radio-inline">		
                               <input type="radio" name="cash_report" value="1"  id="room_service1">Bill</label>
                               <label class="radio-inline">		
                               <input type="radio" name="cash_report" value="2"  id="room_service3">NC</label>
                               <label class="radio-inline">		
                               <input type="radio" name="cash_report" value="3"  id="room_service4">Plan</label>
                               <label class="radio-inline">		
                               <input type="radio" name="cash_report" value="4"  id="room_service5"> Gym & Pool </label>
                                </div>
                                </td>
                                </tr></table>
                                <table align="center" width="50%" border="0" style="float:right;"><tr class="print-hide"><td>
                                <div class="form-group">
                                    <div class="col-md-4">
                                            <div class="input-group input-large date-picker input-daterange" data-date-format="dd-mm-yyyy">
                                                <input type="text"  name="start_date"value="<?php echo date('d-m-Y'); ?>" placeholder="Start Date" class="form-control">
                                                <span class="input-group-addon">
                                                to </span>
                                                <input type="text" name="end_date" value="<?php echo date('d-m-Y'); ?>" placeholder="End Date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                               <td><label style="margin-left:0px;"><button type="submit1" name="submit1" class="btn red btn-sm"><i class="fa fa-print"></i> Report</button></label></td>
            <!-- <td><label style="margin-left:10px;"><button class="btn red btn-sm" onclick="window.print()"><i class="fa fa-print"></i> Report</button></label></td>
             <td><label style="margin-left:10px;"><a class="btn blue btn-sm"  href="excel_companyreport" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a></label></td>-->
                                </tr>
                                </table>
                                </form>
                                <span style="margin-top:20px" id="view_data"></span>
                                </div>
                            </div>
                        </div>