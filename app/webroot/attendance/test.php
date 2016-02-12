<?php
if(isset($_POST['submit']))
{
	$name[]=$_POST['name'];
	$store=$_POST['store'];
	$exp_data=explode(',',$store);
	$all_data=array_merge($exp_data,$name);
	$uni_data=array_unique($all_data);
	$imp_store=implode(',',$uni_data);
	
	$diff_data=array_intersect($exp_data,$name);
	print_r($diff_data);
	exit;
}
?>
<form method="post" >
<input type="hidden" name="store" value="<?php echo $imp_store; ?>" placeholder="old data"/>
<input type="text" name="name" placeholder="current data" autofocus/>
<button type="submit" name="submit" >Submit</button>
</form>