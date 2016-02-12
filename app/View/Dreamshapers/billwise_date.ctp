   <div class="table-responsive">

                        <div class="portlet box" style="border:#FFF !important; background-color:#E26A6A">
                            <div class="portlet-title box white">
                                <div class="caption">
                                    <i class="fa fa-book" style="color:#FFF"></i><strong>Bill Wise Report</strong>
                                </div>
                            </div>
                                <div class="portlet-body">
                                <form method="post" enctype="multipart/form-data">
                                <table align="center" width="40%" border="0"><tr class="print-hide"><td>
                                <div class="form-group">
                                    <div class="col-md-4">
                                            <div class="input-group input-large date-picker input-daterange" data-date-format="dd-mm-yyyy">
                                                <input type="text"  name="start_date"value="<?php echo date('d-m-Y'); ?>"  placeholder="Start Date" class="form-control">
                                                <span class="input-group-addon">
                                                to </span>
                                                <input type="text" name="end_date" value="<?php echo date('d-m-Y'); ?>" placeholder="End Date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                               <td><label style="margin-left:10px;"><button type="submit" name="submit" class="btn red btn-sm"><i class="fa fa-print"></i> Report</button></label></td>
           <!--  <td><label style="margin-left:10px;"><button class="btn red btn-sm" onclick="window.print()"><i class="fa fa-print"></i> Report</button></label></td>
             <td><label style="margin-left:10px;"><a class="btn blue btn-sm"  href="excel_companyreport" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a></label></td>-->
                                </tr>
                                </table>
                                </form>
                                </div>
                            </div>
                        </div>