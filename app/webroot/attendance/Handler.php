<?php 
require_once("config.php");
require_once("function.php");
require_once("auth.php");
if(isset($_POST['emp_reg']))
{
	extract($_POST);
	
	$result_max_code=mysql_query("select `code` from `registration` where `depart_id`='".$depart_id."' ORDER BY `id` DESC LIMIT 1");
	$row_max_code=mysql_fetch_array($result_max_code);
	$max_emp_code=$row_max_code['code'];
	if(empty($max_emp_code))
	{
	$max_emp_code++;	
	$myemp_code=fetchprefix($depart_id,$max_emp_code);
	}
	else
	{
	$max_emp_code++;
	$myemp_code=$max_emp_code;	
	}
	$count=$_POST['count'];
	$s=0;
	for($i=1;$i<=$count;$i++)
	{
		if(!empty($_POST['name'.$i]))
		{	$s++;
		if($s!=1)
		{ $myemp_code++; }
		$rs=@mysql_query("insert into `registration` set `name`='".$_POST['name'.$i]."',`code`='".$myemp_code."',`mobile_no`='".$_POST['mobile_no'.$i]."',`wages`='".$_POST['wages'.$i]."',`address`='".$_POST['address'.$i]."',`depart_id`='".$_POST['depart_id']."',`current_date`='".date("Y-m-d")."'");
		}
	}
	$code_no=mysql_insert_id();
	if($rs)
	echo "<script language=\"javascript\">alert('Entry Updated Successfully.');location='emp_menu.php';</script>";		
	else
	echo "<script language=\"javascript\">alert('Something went wrong. Try Again.');location='emp_menu.php'</script>";	 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['emp_update']))
{
	extract($_POST);
	$myid=$_POST['myid'];
	$rs=mysql_query("update `registration` set `name`='".$name."',`code`='".$code."',`mobile_no`='".$mobile_no."',`wages`='".$wages."',`address`='".$address."',`depart_id`='".$depart_id."' where `id`='".$myid."'");
	if($rs)
	echo "<script language=\"javascript\">alert('Entry Updated Successfully.');location='update_emp.php?id=".$myid."';</script>";		
	else
	echo "<script language=\"javascript\">alert('Something went wrong. Try Again.');location='update_emp.php?id=".$myid."'</script>";	 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*if(isset($_POST['advance_reg']))
{
	extract($_POST);
	session_start();
	$login_id=$_SESSION['id'];
	$rs=mysql_query("insert into `advance` set `reg_id`='".$reg_id."',`amount`='".$amount."',`remarks`='".$remarks."',`advance_given_date`='".datefordb($advance_given_date)."',`login_id`='".$login_id."',`current_date`='".date("Y-m-d")."'");
	if($rs)
	echo "<script language=\"javascript\">alert('Entry Updated Successfully.');location='advance_menu.php';</script>";		
	else
	echo "<script language=\"javascript\">alert('Something went wrong. Try Again.');location='advance_menu.php'</script>";
}*/
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
if(isset($_POST['overtime_reg']))
{
	extract($_POST);
	session_start();
	$login_id=$_SESSION['id'];
	$total_overtime = $_POST['total_overtime_hh'].":".$_POST['total_overtime_mm'].":00";
	
	list($hours,$mins,$secs) = explode(':',$total_overtime);
	$seconds = mktime($hours,$mins,$secs) - mktime(0,0,0);
	
	$hours  = number_format(($seconds / 3600),3);
	
	$rs=mysql_query("insert into `overtime` set `reg_id`='".$reg_id."',`total_overtime`='".$hours."',`remarks`='".$remarks."',`overtime_date`='".datefordb($overtime_date)."',`login_id`='".$login_id."',`current_date`='".date("Y-m-d")."'");
	if($rs)
	echo "<script language=\"javascript\">alert('Entry Updated Successfully.');location='overtime_menu.php';</script>";		
	else
	echo "<script language=\"javascript\">alert('Something went wrong. Try Again.');location='overtime_menu.php'</script>";
}*/
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['update_advance']))
{
	extract($_POST);
	$myid=$_POST['myid'];
	$rs=mysql_query("update `advance` set `reg_id`='".$reg_id."',`amount`='".$amount."',`advance_given_date`='".datefordb($advance_given_date)."',`remarks`='".$remarks."' where `id`='".$myid."'");
	if($rs)
	echo "<script language=\"javascript\">alert('Entry Updated Successfully.');location='update_advance.php?id=".$myid."';</script>";		
	else
	echo "<script language=\"javascript\">alert('Something went wrong. Try Again.');location='update_advance.php?id=".$myid."'</script>";	 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['overtime_update_']))
{
extract($_POST);
$myid=$_POST['myid'];
$reg_id=$_POST['reg_id'];

		$total_overtime = $_POST['total_overtime_hh'].":".$_POST['total_overtime_mm'].":00";
		
		list($hours,$mins,$secs) = explode(':',$total_overtime);
		$seconds = mktime($hours,$mins,$secs) - mktime(0,0,0);
		
		$hours  = number_format(($seconds / 3600),3);
		
$rs=mysql_query("update `overtime` set `reg_id`='".$reg_id."',`overtime_date`='".datefordb($overtime_date)."',`total_overtime`='".$hours."',`remarks`='".$remarks."' where `id`='".$myid."'");
if($rs)
echo "<script language=\"javascript\">alert('Entry Updated Successfully.');location='update_overtime.php?id=".$myid."';</script>";		
else
echo "<script language=\"javascript\">alert('Something went wrong. Try Again.');location='update_overtime.php?id=".$myid."'</script>";
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['depart_reg']))
{
	
	$check_first=mysql_query("select `name` from `department` where `name`='".$_POST['d_name']."'");
	if(mysql_num_rows($check_first)>0)
	{
		echo "<script language=\"javascript\">alert('Entry Already Exist.');location='setup.php';</script>";		
	}
	else
	{
	$rs=mysql_query("insert into `department` set `name`='".$_POST['d_name']."',`prefix`='".$_POST['prefix']."'");
	}
	if($rs)
	echo "<script language=\"javascript\">alert('Entry Updated Successfully.');location='setup.php';</script>";		
	else
	echo "<script language=\"javascript\">alert('Something went wrong. Try Again.');location='setup.php'</script>";
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$i=0;
$reg_ll=@mysql_query("select `id` from `department` ");
while ($row = mysql_fetch_array($reg_ll)) 											
	{
		$i++;
	if(isset($_POST['edit_depart'.$i]))
	{
			$d_name=$_POST['d_name'.$i];
			$p_name=$_POST['p_name'.$i];
			$idd=$_POST['my_id'.$i];
			if(!empty($d_name)||!empty($p_name))
			{
				$rs=@mysql_query("update `department` set `name`='".$d_name."',`prefix`='".$p_name."' where `id`='".$idd."'");
			}
			if($rs){
			echo "<script language=\"javascript\">alert('Entry Updated Successfully.');location='setup.php';</script>";		
			}
			else{
			echo "<script language=\"javascript\">alert('Something went wrong. Try Again.');location='setup.php';</script>";
			}
			
	}
	}
?>