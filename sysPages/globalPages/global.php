<?php
error_reporting(7);

$userd = "use/"; //用户文件夹
$xtm = "欢迎进入文件管理系统 ";
$file = "C:/Apache/htdocs/myFileSystem/file/"; //上传文件存放目录
$jl = "record/"; //系统日志文件夹
$mail = "mailbox"; //用户信箱文件夹
$mailn = "30"; //用户信箱容量
$ip = "http://www.ip38.com/?ip="; //IP查询地址

session_start();
if(!isset($_SESSION['userName'])){
	header('location:../../loginManage/login.php');
}
$link = mysql_connect('127.0.0.1', 'root', 'squall') or die('Could not connect: ' . mysql_error());
mysql_select_db('app') or die('Could not select database');
mysql_query("SET NAMES gb2312");

admintitle();

function admintitle() {
	global $checkpower;
	print<<<EOT
     <html>
   <head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href="../images/cs.css" rel=stylesheet>　 <STYLE type="text/css">
　　 TD{
　　　　 word-break: break-all;
　　　　}
　　 </style>
 </head>
 <SCRIPT    LANGUAGE="JavaScript">
   document.onkeydown    =    function()    {
   if(event.keyCode==116)    {
   event.keyCode=0;
   event.returnValue    =    false;
   }
   }
   document.oncontextmenu    =    function()    {event.returnValue    =    false;}
   </SCRIPT> <body onkeydown='if(event.keyCode==78 && event.ctrlKey)return false;'>
<body bgcolor=#99CCFF topmargin=5 leftmargin=5><table width=98% cellpadding=0 cellspacing=1 border=0 bgcolor=#99CCFF align=center>
    <tr><td>
    <table width=100% cellpadding=0 cellspacing=1 border=0>
    <tr><td width=10% valign=top bgcolor=#FFFFFF>
    <table width=100% cellpadding=6 cellspacing=0 border=0>
    <tr><td bgcolor=#CBDED8><center><font color=red>
    <b>功 能 选 项</b>
    </td></tr>
    <tr>
    <td bgcolor=#FFFFFF valign=center><br>
<font color=red>◇◇<a href="http://$_SERVER[SERVER_NAME]" target=_blank>TO LOCALHOST</a><br><br>
◇ <a href=../globalPages/mainPage.php><font color="#339900"><b>系统首页</b></font></a><br> <br>
◇ <a href=../userManage/editProfile.php>个人信息</a><br> <br>
◇ <a href=../docManage/wj.php>文件列表</a><br> <br>
◇ <a href=../docManage/gl.php>文件管理</a><br> <br>
◇ <a href="javascript:void(0)" onClick="window.open ('../docManage/upfile.php','','top=0,left=0,width=700,height=363,status=no,resizable=yes,scrollbars=yes');">上传文件</a><br><br>
◇ <a href=jl.php>安全日志</a><br><br>
◇ <a href=../userManage/adminuser.php>用户管理</a> <br><br>
◇ <a href=../mailManage/sitemail.php>站内短信</a> <br><br>
◇ <a href=bfleasin.php>数据管理</a> <br><br>
◇ <a href=../globalPages/logout.php?login=$_SESSION[userName]><font color=red>退出系统</font></a> </p>
    </td></tr>
  </table>
    </td><td width=65% valign=top bgcolor=#FFFFFF>
    <table width=100% cellpadding=6 cellspacing=0 border=0  valign=top>
EOT;
}
