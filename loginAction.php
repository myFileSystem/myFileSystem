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
mysql_select_db($db_name) or die('Could not select database');
session_start();
?>


<?php
$userName = $_POST['userName'];
$userPassword = $_POST['userPassword'];

if ($userName == "" or $userPassword == ""){Header("Location: login.php");}
$users = mysql_query("select * from user where username='$userName'");
$userBean = mysql_fetch_object($users);
if($userBean == 0){
 echo ("<script>alert('There is no user, please check the user name.');window.history.back();</script>");
 exit();
}
else{
 if ($userBean->password != md5($userPassword)){
  echo ("<script>alert(' Invalid password.Please check your user name and password.');window.history.back();</script>");
  exit();
 }else{
 }
}
  $_SESSION['userName'] = $userName;
  $_SESSION['userId'] = $userBean->id;
  $_SESSION['IsLogin'] = "YES";

mysql_close($link);
 Header("Location: index.php");
?>