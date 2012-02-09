<?
$thisprog = "mainPage.php";
$title = "系统首页";
require ("global.php");
echo "<title>$title /$xtm</title>";
date_default_timezone_set('Asia/Shanghai');
$nowdate = date("Y 年 m 月 d 日 G:i:s");
$phpver = PHP_VERSION;
$phpos = PHP_OS;
if (isset ($_COOKIE))
	$testcookie = "<font color=000066>通 过</font>";
else
	$testcookie = "<font color=990000>失 败</font>";

$query = "SELECT * FROM user WHERE userName='$_SESSION[userName]'";
$users = mysql_query($query) or die('Query failed: ' . mysql_error());

$line = mysql_fetch_array($users, MYSQL_ASSOC);

if ($line[userRight] == "super") {
	$userRight = "<font color=red>系统管理员</font>";
}
if ($line[userRight] == 'high') {
	$userRight = "<font color=red>高级用户</font>";
}
if ($line[userRight] == 'low') {
	$userRight = "<font color=red>普通用户</font>";
}
if ($line[userRight] == 'test') {
	$userRight = "<font color=red>测试用户</font>";
}

//$mail = "$mail/" . $username . ".php";
//$garray = @ file($mail);
//$cog = count($garray);
//for ($i = 0; $i < $cog; $i++) {
//	$larray = explode("|", $garray[$i]);
//	if (($larray[6] == "new")) {
//		echo "<bgsound src=mydata/mail.mp3 loop=1>";
//		$xj = "<a href=sitemail.php><img border=\"0\" src=images/mail.gif></a>";
//	}
//}
//if ($cog >= $mailn) {
//	echo "<script>alert(\"您的信箱已满，请清理不需要的信件！\");</script>";
//}

//if (file_exists("$userd" . $username . ".php")) {
//	$use = explode("|", readfrom("$userd$username.php"));
//	$dlsj = "$use[0]|$use[1]|$use[2]|$use[3]|$use[4]|$use[5]|$use[6]|$use[7]|$use[8]|$use[9]|$settime|";
//	writeto("$userd" . $username . ".php", $dlsj);
//}

print<<<EOT
<tr><td bgcolor=#CBDED8 colspan=3><b>$xtm</b>
</td></tr>
<tr><SCRIPT language=JavaScript><!--
if (top.location != location) top.location.href = location.href;
self.moveTo(0,0);
self.resizeTo(screen.availWidth,screen.availHeight);
// --></SCRIPT>
<td bgcolor=#FFFFFF align=left>
<font color=#333333 face=verdana>
<br><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="20" class="t2"><div align="center"><span class="font1"><font color="#FF0000" size="4"><strong>$xtm</strong></font></span></div></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="20">
  <tr>
    <td class="font1">&nbsp;</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="1" height="180">
  <tr>
    <td colspan=2 width="100%" bgcolor="#eeeeee" height="25" class="t2"><div align="center"><strong>您的相关信息</strong></div></td>
  </tr>
  <tr>
    <td width="10"><img src="../images/admin_p.gif" /></td>
    <td valign="top" align="left">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="font1">
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td width="105" height="13" align="right">&nbsp;</td>
          <td width="833" class=t4>&nbsp;</td>
        </tr>
        <tr>
          <td height="30" align="right">用 户：</td>
          <td class="t4"><font color="#3300FF" size="3">$line[userName]</font>&nbsp;&nbsp;$xj</td>
        </tr>
        <tr>
          <td height="30" align="right">时  间：</td>
          <td class="t4"><font color="#3300FF">$nowdate</font></td>
        </tr>
        <tr>
          <td height="30" align="right">权  限：</td>
          <td class="t4"><div>$userRight</div></td>
        </tr><tr>
          <td height="30" align="right">当前IP：</td>
          <td class="t4"><font color="#3300FF">$_SERVER[REMOTE_ADDR]</font></td>
        </tr><tr>
          <td height="30" align="right">操作系统：</td>
          <td class="t4"><font color="#3300FF">$phpos</font></td>
        </tr><tr>
          <td height="30" align="right">程式版本：</td>
           <td class="t4"><font color="#3300FF">$phpver</font></td>
        </tr><tr>
          <td height="30" align="right">Cookie 测试：</td>
           <td class="t4"><font color="#3300FF">$testcookie</font></td>
        </tr>
      </table>    </td>
  </tr>
</table>
<p><center>
系统会记录您每一次的操作，请谨慎使用您的权限!对于违规操作者我们将视情节轻重追究相应责任。离开时记得点击  <a href="logout.php?login=$line[userName]"><font color=red>退出系统</font></a>
<p>
EOT;
exit;