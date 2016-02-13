
<!--<div style="text-align:center"">
<table align="center" width="100%" style="margin-top:20px;">
<tr><td align="center"><div class="page-logo"><img src="expenset/dremn.png" width="800px" /></div></td>
</tr></table></div>-->


<div style="text-align:center">
<table align="center" width="100%" style="margin-top:50px">
<tr><td>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								  <?php  
                              echo sizeof($fetch_room_reservationn)
							  ?>
								 
							</div>
							<div class="desc">
								 Today Reservation
							</div>
						</div>
						<a class="more tooltips" href="index1" data-placement="bottom" data-original-title="Reservation Status">
					View more<i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
                
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
                            <?php  
                              echo sizeof($fetch_room_checkin_checkout)
							  ?>
							</div>
							<div class="desc">
								 Today Checkin
							</div>
						</div>
						<a class="more tooltips" href="index2" data-placement="bottom" data-original-title="Checkin Status">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								  <?php  $gg=sizeof($fetch_master_roomno);
							   $hh=sizeof($fetch_room_checkin_checkout);?>
                               <font size="+1"><b><?php echo 'Total Room Vacant';   ?> <?php echo '&nbsp;&nbsp;';?><?php echo $rr=$gg-$hh;   ?></b></font>
							</div>
							<div class="desc">
								 
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
                 
                 
                 
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat" style="background-color:#0CC">
						<div class="visual">
							<i class=""></i>
						</div>
						<div class="details">
							<div class="number" style="font-family:Verdana, Geneva, sans-serif; color:#FFF">
								 <font size="+1"> Reserve Chart</font>
							</div>
							<div class="desc">
								 
							</div>
						</div>
						<a class="more tooltips" href="calendar" style="color:#FFF" data-placement="bottom" data-original-title="Reservation Chart">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
                 
                    
                    
</td></tr></table>
</div>








