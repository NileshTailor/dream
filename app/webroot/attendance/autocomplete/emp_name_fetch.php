<?php  
require_once("../config.php");
$q=$_GET['q'];
$rsd = mysql_query("SELECT DISTINCT `name` From `registration` where `name` LIKE '%$q%' ");
while($rs = mysql_fetch_array($rsd))
{
$name = $rs['name'];
echo "$name\n";
}
?>
  