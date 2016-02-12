<style type="text/css">
  table, tr.noBorder td {border:#CCC}
</style>

<style>
td {
    font-size: 105%;
}

</style>

<div class="container-fluid" >
    <div>
        <div class="tabbable tabbable-custom tabbable-noborder">
           
            <div class="tab-content">
          
                     	 <div class="table-responsive">
                         
<table width="100%" height="100%" border="0"><tr>


<td width="20%" align="right"><a class="btn default btn-xs blue" style="margin-left:4%; margin-top:4% width:4%" target="_blank" onclick="window.print()">Print</a></td>
</tr></table>



<div>
        <?php
        $i=0;
        foreach($fetch_address as $data){ 
        $i++;
        $id=$data['address']['id'];
        ?>
        <div align="center" style="padding: 0px; font-size: 25px; font-family:Verdana, Geneva, sans-serif">
        <b><?php echo $data['address']['name']; ?></b></div>
        <div align="center" style="padding: 0px;font-size: 12px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
        <?php echo $data['address']['add']; ?></div>
        <div align="center" style="padding: 0px;font-size: 12px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
        Tel:&nbsp;<?php echo $data['address']['contact']; ?></div>
        
        <div align="center" style="padding: 0px;font-size: 12px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
        Email:&nbsp;</label><?php echo $data['address']['email']; ?>,&nbsp;&nbsp;web:&nbsp;<?php echo $data['address']['web']; ?><br />
        <hr width="500px" size="40px" style="border:solid 1px #999" /></div>
        <?php }?>

                 
<span style="margin-left:5%; color:#4DB3A2 !important" class="caption-subject font-green-sharp bold uppercase"><h2 align="center">Information Bill</h2></span>                         

</div>
 


<table width="100%" height="100%" border="1" style="border-collapse:collapse; margin-top:1%"  align="center">
<tbody>


<?php 
       $grandamount=0;
        $grandtax=0;
        $grandtax1=0;
        $grandservice=0;
        $grandtotal=0;
        
        $i=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
		 $id=$data['room_checkin_checkout'] ['id'];
         
		 
		 ?>
<tr><td>
<table width="100%" height="50%" border="0" style="border-collapse:collapse; margin-top:1%; margin-bottom:1%" align="center" cellpadding="10" cellspacing="10">
<tr><td width="20%"><b>Room No.:</b></td>
<td width="21%"><b><?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></b></td>
<td width="4%">&nbsp;</td>
<td>&nbsp;</td>
<td width="12%">&nbsp;</td>
<td width="2%">&nbsp;</td>
<td width="12%">&nbsp;</td>
<td width="13%">&nbsp;</td>
<td width="3%">&nbsp;</td></tr>
<tr>

<tr><td><b>Reg. No.:</b></td>
<td><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
<td><b>&nbsp;</b></td>
<td width="13%"><b>Guest Name:</b></td>
<td><?php echo $data['room_checkin_checkout']['guest_name']; ?></td>
<td>&nbsp;</td>
<td><b>Plan:</b></td>
<td align="center"><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['room_checkin_checkout']['plan_id']), array()); ?></td>
<td>&nbsp;</td></tr>
<tr>
<td><b>Checkin:</b></td>
<td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?> &nbsp; <?php echo $data['room_checkin_checkout']['arrival_time']; ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><b>Checkout:</b></td>
<td align="center"><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['checkout_date'])); ?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td><b>Booked By:</b></td>
<td><?php echo $data['room_checkin_checkout']['source_of_booking']; ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><b>Pax:</b></td>
<td align="center"><?php echo $data['room_checkin_checkout']['pax']; ?></td>
<td>&nbsp;</td>
</tr>

<tr>
<td><b>Billing Ins:</b></td><td><?php echo $data['room_checkin_checkout']['billing_instruction']; ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
<td><b>Accomodation:</b></td><td></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
	</table></td></tr>                                       

<tr style="border-top:ridge; border-bottom-color:#000"><td>
<table width="100%" height="100%" border="0" style="border-collapse:collapse; margin-top:0%; margin-bottom:2%" bordercolor="#CCCCCC" align="center" cellspacing="15">
<tr class="noBorder" style="border-bottom:ridge; border-bottom-color:#000">
<td>Bill Date:</td>
<td>Bill No:</td>
<td>&nbsp;&nbsp;Service</td>
<td>&nbsp;</td>
<td>Amount</td>
<td>Tax</td>
<td>Service Tax</td>
<td>Service Charge</td>
<td>Total</td>
</tr>
<tr>
<td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
<td><?php echo $data['room_checkin_checkout']['id']; ?></td>
<td>Room:&nbsp;<?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['room_checkin_checkout']['room_type_id']), array()); ?></td>
<td>&nbsp;</td>
<td><?php echo $data['room_checkin_checkout']['room_charge']; ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><?php echo $data['room_checkin_checkout']['room_charge']; ?></td>

</table></td></tr>

<?php } $grandamount=$grandamount+$data['room_checkin_checkout'] ['room_charge'];
        $grandtotal=$grandtotal+$data['room_checkin_checkout'] ['room_charge'];
        ?>
</tbody>
</table>

<table border="0" width="100%"><tr class="noBorder" style="border-bottom:ridge 2px; border-bottom-color:#000">
<td width="11%">&nbsp;</td>
<td width="12%">&nbsp;</td>
<td width="4%">&nbsp;</td>
<td width="12%" align="center"><b>Main Bill</b></td>
<td width="12%" align="center"><?php echo number_format ("$grandamount",2) ?></td>
<td width="9%">&nbsp;</td>
<td width="12%">&nbsp;</td>
<td width="19%">&nbsp;</td>
<td width="9%" align="center"><?php echo number_format ("$grandtotal",2) ?></td>
</tr>
<tr class="noBorder" style="border-bottom:ridge 2px; border-bottom-color:#000">
<td width="11%">&nbsp;</td>
<td width="12%">&nbsp;</td>
<td width="4%">&nbsp;</td>
<td width="12%" align="center"><b>Sub Total</b></td>
<td width="12%" align="center"><?php echo number_format ("$grandamount",2) ?></td>
<td width="9%">&nbsp;</td>
<td width="12%">&nbsp;</td>
<td width="19%">&nbsp;</td>
<td width="9%" align="center"><?php echo number_format ("$grandtotal",2) ?></td>
</tr>
<tr class="noBorder" style="border-bottom:ridge 2px; border-bottom-color:#000">
<td width="11%">&nbsp;</td>
<td width="12%">&nbsp;</td>
<td width="4%">&nbsp;</td>
<td width="12%" align="center"><b>Total</b></td>
<td width="12%" align="center"><?php echo number_format ("$grandamount",2) ?></td>
<td width="9%">&nbsp;</td>
<td width="12%">&nbsp;</td>
<td width="19%">&nbsp;</td>
<td width="9%" align="center"><?php echo number_format ("$grandtotal",2) ?></td>
</tr>
<tr class="noBorder" style="border-bottom:ridge 2px; border-bottom-color:#000">
<td width="11%">&nbsp;</td>
<td width="12%">&nbsp;</td>
<td width="4%">&nbsp;</td>
<td width="12%" align="center"><b>Grand Total</b></td>
<td width="12%" align="center"><?php echo number_format ("$grandamount",2) ?></td>
<td width="9%">&nbsp;</td>
<td width="12%">&nbsp;</td>
<td width="19%">&nbsp;</td>
<td width="9%" align="center"><?php echo number_format ("$grandtotal",2) ?></td>
</tr></table>


<br><br>

<table width="95%" align="center" height="10%" border="1"><tr ><td align="center"><b>This statement is for your Information only, Please do collect Receipt or Main Bill(If you have paid).</b></td></tr></table>



</div>
  
      </div>
            </div></div></div>
        
        