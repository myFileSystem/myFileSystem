<?php
//Database host name
$dbhost="localhost";
//Database username
$db_user="root";
//Database Password
$db_password="squall";
//Database name
$db_name="app";

$name = $_POST['name'];
$conn=mysql_connect ($dbhost, $db_user,$db_password)or die('Could not connect: ' . mysql_error());
mysql_select_db($db_name);
$result=mysql_query("select * from user where userName='$name'") or die (mysql_error());
if($rs=mysql_fetch_object($result)){ echo "Sorry your user name has been used.";}
else { echo "Congratulation, it can be used";}
?>

