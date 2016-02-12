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
                         
<table width="100%" height="100%" border="0"><tr><td width="20%">&nbsp;</td>
<!--<td align="center" width="60%"><h3><b><u>PHP POETS</u></b></h3>

</td>-->
<td width="20%" align="right"><a class="btn default btn-xs blue" style="margin-left:4%; margin-top:4% width:4%" target="_blank" onclick="window.print()">Print</a></td>
</tr></table>


<table width="100%" height="100%" border="1" style="border-collapse:collapse; margin-top:1%" bordercolor="#CCCCCC" align="center">
<tbody>
         <tr><td height="10%" bgcolor="#999999"><h4 align="center"><font color="#FFFFFF"><b>Room Statics Report</b></font></h4></td></tr>
         
<tr><td>
<table width="100%" height="100%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:1%" bordercolor="#CCCCCC" align="center" cellpadding="10" cellspacing="10">


<tr style="border-bottom:ridge; border-bottom-color:#000">

<td>Room</td>
<td>Guest Name</td>
<td>Arr Date</td>
<td>Plan</td>
<td>Tariff</td>
<td>Total</td>
<td>Reg No.</td>
</tr>

<?php 
        
        $grandamount=0;
        $grandtotal=0;
        $i=0;
		 foreach($fetch_room_checkin_checkout as $data){ 
		 $i++;
		 $id=$data['room_checkin_checkout'] ['id'];
         
		 
		 ?>
<tr class="noBorder">
<td><?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></td>
<td><?php echo $data['room_checkin_checkout']['guest_name']; ?></td>
<td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
<td><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['room_checkin_checkout']['plan_id']), array()); ?></td>
<td><?php echo $data['room_checkin_checkout']['room_charge']; ?></td>
<td><?php echo $data['room_checkin_checkout']['room_charge']; ?></td>
<td><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
</tr>
<?php }
		$grandamount=$grandamount+$data['room_checkin_checkout'] ['room_charge'];
		$grandtotal=$grandtotal+$data['room_checkin_checkout'] ['room_charge'];
 ?>
 
 <tr class="noBorder" style="border-top:ridge; border-top-color:#000; border-bottom:ridge; border-bottom-color:#000">
<td width="13%">&nbsp;</td>
<td width="20%">&nbsp;</td>
<td width="17%">&nbsp;</td>
<td width="23%"><b>Total</b></td>
<td width="10%"><b><?php echo number_format ("$grandamount",2) ?></b></td>
<td width="9%"><b><?php echo number_format ("$grandtotal",2) ?></b></td>
<td width="8%">&nbsp;</td>
</tr>
</table></td></tr>

<!--<tr><td>
<table width="100%" height="100%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:1%" bordercolor="#CCCCCC" align="center" cellpadding="10" cellspacing="10>
<tr style="border-bottom:ridge; border-bottom-color:#000">
<td>S. No.</td>
<td>Room</td>
<td>Bill No.</td>
<td>Date</td>
<td>Amount</td>
<td>Tax</td>
<td>Service Charge</td>
<td>Service Tax</td>
<td>Bill Amount</td>
</tr>
<tr class="noBorder">
<td><?php echo $i; ?></td>
<td><?php echo $data['room_checkin_checkout']['master_roomno_id']; ?></td>
<td><?php echo $data['room_checkin_checkout']['id']; ?></td>
<td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
<td><?php echo $data['room_checkin_checkout']['room_charge ']; ?></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
-->


</tbody>
</table>
		
        

</div>
  
      </div>
            </div></div></div>
        