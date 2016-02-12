<style type="text/css">
  table, tr.noBorder td {border:#CCC}
</style>

<style>
td {
    font-size: 103%;
}
p {
    font-size: 90%;
}
p1 {
    font-size: 103%;
}
</style>
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
                         


<table width="200" border="1" bordercolor="#999999" cellspacing="8" cellpadding="8" style="margin-top:1%; margin-left:1%; margin-right:1%; margin-bottom:1%">


<?php
		$i=0;
		 foreach($fetch_receipt_checkout as $data){ 
		 $i++;
		 $id_fetch_receipt_checkout=$data['receipt_checkout']['id'];
		 ?>

  <tr class="noBorder" style="border-bottom:ridge; border-bottom-color:#999;">
    <td colspan="2" scope="row" align="center">Cash Receipt</td>
    
  </tr>
  
  <tr class="noBorder">
    <td scope="row">Receipt Type:</td>
    <td><?php echo $data['receipt_checkout']['recpt_type']; ?></td>
  </tr>
  <tr class="noBorder">
    <td scope="row">Receipt Date:</td>
    <td><?php echo date('d-m-Y', strtotime($data['receipt_checkout']['recpt_date'])); ?></td>
  </tr>
  <tr class="noBorder">
    <td scope="row">Room No.:</td>
    <td><?php echo $data['receipt_checkout']['room_no']; ?></td>
  </tr>
  <tr class="noBorder">
    <td scope="row">Guest Name:</td>
    <td><?php echo $data['receipt_checkout']['guest_name']; ?></td>
  </tr>
  <tr class="noBorder">
    <td scope="row">Amount:</td>
    <td><?php echo $data['receipt_checkout']['amount']; ?></td>
  </tr>
  <tr class="noBorder">
  <td scope="row">Remark:</td>
    <td scope="row"><?php echo $data['receipt_checkout']['remark']; ?></td>
  </tr>
  
  <?php }?>
</table>






</div>
  
      </div>
            </div></div></div>
       