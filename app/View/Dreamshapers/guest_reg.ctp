<style type="text/css">
  table, tr.noBorder td {border:#CCC}
</style>

<style>
td {
    font-size: 106%;
}
p {
    font-size: 75%;
}
p1 {
    font-size: 90%;
}
</style>
<!--<style>
tr{
	line-height:30px;
}
</style>-->



<div class="container-fluid" >
    <div>
        <div class="tabbable tabbable-custom tabbable-noborder">
           
            <div class="tab-content">
          
                     	 <div class="table-responsive">
                         
<table width="100%" height="100%" border="0"><tr><td width="20%">&nbsp;</td>
<td align="center" width="60%"><h3><b><u>Hotel The Archi</u></b></h3>

</td>
<td width="20%" align="right"><a class="btn default btn-xs blue" style="margin-left:4%; margin-top:4% width:4%" target="_blank" onclick="window.print()">Print</a></td>
</tr></table>



<div>
   <?php
		$i=0;
		 foreach($fetch_invoiceadd as $data){ 
		 $i++;
		 $id_invoiceaddress=$data['invoiceadd']['id'];
         
         ?>
         
         <?php echo $data['invoiceadd']['add']; ?>
         
         <?php }?>




<table width="100%" height="100%" border="1" style="border-collapse:collapse; margin-top:1%; border-color:#000; border-style:solid" align="center">
 <tbody>

    <tr><td align="center"><font size="+2"><b>Guest Registration</b></font></td></tr>     
<tr><td>
<table width="100%" height="100%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">


<tr style="line-height:30px;"><td width="53%">Reservation Number: </td>
<td width="47%"> Reg. Card No.: </td></tr>
<tr  style="line-height:30px;">
<td>Name:</td><td>Purpose of Visit:</td>

</tr>
<tr style="line-height:30px;">
<td>Source/Agent:</td> 
<td>Arrived From:</td>

</tr>

	</table></td></tr> 
    
    
    
    <tr><td>
<table width="100%" height="90%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">

    <tr  style="line-height:30px;"><td width="53%">
<table width="136%" height="90%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">


<tr class="noBorder"><td width="69%">Permanent Address:</td></tr>
<tr  class="noBorder"><td>&nbsp;</td></tr>
<tr  class="noBorder"><td>E-Mail:</td> </tr>
<tr  class="noBorder"><td>Mobile No:</td> </tr>


	</table></td> 
    
    
    <td width="47%">
<table width="100%" height="90%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">


<tr class="noBorder"><td width="69%">Next Destination:</td></tr>
<tr><td>Date of Birth:</td></tr>
<tr><td>Nationality:</td> </tr>
<tr><td>Arrival Date: <?php echo date("d-M-Y"); ?> <br>Arrival Time: <?php echo date("h:i:s",time()); ?></td> </tr>

	</table></td></tr>
    
    
    </table></td></tr>         
    
          
    
<tr  style="line-height:30px;"><td>
<table width="100%" height="90%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">    
    
        <tr><td width="53%">
<table width="100%" height="90%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">


<tr class="noBorder"><td width="20%">Passport No.</td>
<td width="20%">Place of Issue.</td>
<td width="29%" style="padding-left:5px">Date of Issue.</td></tr>
<tr  class="noBorder"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table></td>

<td width="47%">
<table width="100%" height="90%" border="0" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">

<tr class="noBorder">
<td width="31%">Departure Date:</td>
</tr>
<tr class="noBorder"><td>Departure Time:</td></tr>

	</table></td></tr>
    </table></td></tr>                       
    
            
<tr style="line-height:30px;"><td colspan="2">
<table width="100%" height="90%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">

        <tr><td width="53%">
<table width="100%" height="90%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">

<tr class="noBorder">
<td width="16%"> Visa No.
</td> 
<td width="16%">Visa POI</td>
<td width="16%">Visa DOI</td>
<td width="21%">Visa Exp. Dt.</td>

</tr>
<tr class="noBorder"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>

</table></td>

<td width="47%">
<table width="100%" height="90%" border="0" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">
<tr><td width="31%">Date of Arrival in India:</td></tr>
<tr class="noBorder"><td width="31%">&nbsp;</td></tr>

</table></td></tr>
</table></td></tr>



<tr  style="line-height:30px;"><td colspan="2">
<table width="100%" height="90%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">


<tr>
<td width="53%">Billing Instruction:</td> 
<td width="47%">Purpose duration of stay in India:</td>
</tr>
<tr>
<td>Remarks:</td> 
<td>Registration Certificate No.:</td>
</tr>


	</table></td></tr>
    
    <tr style="line-height:30px;"><td>
<table width="100%" height="90%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">
    
    <tr><td width="53%">
<table width="100%" height="90%" border="0" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">


<tr class="noBorder">
<td width="25%">Room Type</td> 
<td width="44%">Persons:</td>

</tr>

<tr class="noBorder"><td>&nbsp;</td><td>&nbsp;</td></tr>
</table></td>


<td width="47%">
<table width="100%" height="90%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">

<tr class="noBorder">
<td width="18%">Place of Issue.</td> 
<td width="13%">Date of Issue.</td>
</tr>
<tr class="noBorder"><td>&nbsp;</td><td>&nbsp;</td></tr>


</table></td></tr>
</table></td></tr>


    
        <tr class="noBorder" class="hari"><td colspan="2">
<table width="100%" height="90%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">


<tr>
<td width="49%"><b>Terms are subject to change</b>
  
  <p> </br>Visitors are not permitted in guest room after 22:00 hrs. The hotel<br>
    is not responsible for the safty of any valuables left in the guest <br>
    room Electronic safe deposite lockers are available in the room. All<br>
    disputes are subject to the Udaipur courts only.
    
  </p>
<br>
<br><br><br></td> 
<td width="51%"><p>I agree to realease my room(s) by 0900 Hrs on the date of my
departure. should I fail to check out, I authorized the management to pack and remove my belongings to hotel cloak room so that my room(s) will be available for incoming guests.</p>
<br>
<br><br><br></td>

</tr>

	</table></td></tr>
    
    
    
    <tr class="noBorder">
      <td colspan="2">
<table width="100%" border="1" style="border-collapse:collapse; margin-top:0%; margin-bottom:0%" align="center" cellpadding="10" cellspacing="10">


<tr class="noBorder">
<td width="17%">Duty Manager</td> 
<td width="15%">FOA Initials</td>
<td width="17%">C/IN Initials</td> 
<td width="51%" align="right"><b>Guest's Signature&nbsp;&nbsp;&nbsp;</b></td>
</tr>

	</table></td></tr>
    </table></td></tr>



</tbody>
</table>



</div>
  
      </div>
            </div></div></div>
       