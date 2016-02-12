   <div class="table-responsive">

                        <div class="portlet box blue" style="border:#FFF !important">
                            <div class="portlet-title box white">
                                <div class="caption">
                                    <i class="fa fa-book"></i><strong>Cashier Report</strong>
                                </div>
                            </div>
                                <div class="portlet-body">
                                <form method="post" enctype="multipart/form-data">
                                <table border="0" width="100%">
                                <tr><td align="center" style="padding-left:295px">
                                
                                
                                <table border="0" width="100%" align="center">
                                <tr>
                                <td>
                            <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="cash_report" value="0"  id="room_service2" checked="checked">Combine Report</label>
                                <label class="radio-inline">		
                               <input type="radio" name="cash_report" value="1"  id="room_service1">POS Report</label>
                               <label class="radio-inline">		
                               <input type="radio" name="cash_report" value="2"  id="room_service1">Room Report</label>
                               <label class="radio-inline">		
                               <input type="radio" name="cash_report" value="3"  id="room_service1">Function Report</label>
                               
                                </div>
                                </td>
                                </tr>
                                </table></td></tr>
                                <tr><td style="padding-left:100px">
                                
                               
                                <table align="center" width="50%" border="0" style="margin-top:20px"><tr class="print-hide"><td>
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
                                </table></td></tr></table>
                                </form>
                                <span style="margin-top:20px" id="view_data"></span>
                                </div>
                            </div>
                        </div>