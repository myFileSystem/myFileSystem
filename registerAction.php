<?php
//Database host name
$dbhost="localhost";
//Database username
$db_user="root";
//Database Password
$db_password="squall";
//Database name
$db_name="app";
$link = mysql_connect($dbhost, $db_user, $db_password)or die('Connection error!' . mysql_error());

echo 'Connected successfully';
mysql_select_db($db_name) or die('Could not select database');

echo 'this is to identify';
session_start();
unset($_SESSION['UserName']);
 ?>

<?php
$newName=$_POST["NewName"];
$newPass1=$_POST["NewPass1"];
$newPass2=$_POST["NewPass2"];
if($newPass1==$newPass2){
	mysql_query("INSERT INTO user (userName, password) VALUES ('$newName', '$newPass1')");
	echo "id:";
	echo $id;
	mysql_close($link);
	$_SESSION['UserName']=$newName;

 	Header("Location: adminuser.php");
}
else{
	Header("Location: register.php");
}


 ?>
