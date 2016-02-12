<?php
require_once("function.php");
require_once("config.php");
require_once("auth.php");

session_start();
$login_id=$_SESSION['id'];

$s=$_GET['q'];
$current_date=date("Y-m-d");


$all=$_POST['date'];


$myarray=json_decode($s, true);
//print_r($myarray);

foreach($myarray as $data)
{
	
  $code=$data[0];
  $amount=$data[1];
  $remarks=$data[2];
  $date=$data[3];
  
  if(empty($data[3])){
						
						$output=json_encode(array('report_type'=>'error','text'=>'Please Select Date'));
						die($output);
				}
 
  
  $set=mysql_query("select `id` from `registration` where `code`='$code'");
  $fet=mysql_fetch_array($set);
  
  $emp_id=$fet['id'];

  $dt_cnvrt=date("Y-m-d", strtotime($date));
 mysql_query("insert into `advance` SET `reg_id`='$emp_id',`amount`='$amount',`advance_given_date`='$dt_cnvrt',`remarks`='$remarks',`current_date`='$current_date',`login_id`='$login_id'");

	
	}
$output=json_encode(array('report_type'=>'submit','text'=>'Submit successfully.'));
		die($output);
	
?>