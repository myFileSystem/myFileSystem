<?php
session_start();
$login = $_GET['login'];
$thisprog = "logout.php?login=$login";
$title = "退出系统";
require ("global.php");
echo "<title>$title /$xtm</title>";
?>
<title>$xtm/退出管理</title><script>
setInterval("timer.innerText--;if(timer.innerText=='0')location='javascript:self.close()';",1000);
</script>
<?php

$nowdate = date("Y 年 m 月 d 日  H:m:s ");
$phpver = PHP_VERSION;
$phpos = PHP_OS;

if (isset ($_COOKIE))
	$testcookie = "<font color=000066>通 过</font>";
else
	$testcookie = "<font color=990000>失 败</font>";

$query = "SELECT * FROM user WHERE userName='$_SESSION[userName]'";
$users = mysql_query($query) or die('Query failed: ' . mysql_error());
$line = mysql_fetch_array($users, MYSQL_ASSOC);

print<<<EOT
<tr><td bgcolor=#80809b><font color=#ffffff></td></tr>
<tr>
<td bgcolor=#FFFFFF >
  <p><font color=#333333 face=verdana><br>
  &nbsp;</font>亲爱的 </font><font size="5" color="#FF0000"><b>$line[userName]</b></font> <font color="#333333">您已经成功退出系统。此页面 </font> <font size="10" color="#FF0000"><span id="timer">5</span></font> 后将自动关闭</font><font color=#333333 face=verdana>! </p>
  <p><font color=#333333 face=verdana></font></p>
  <table width="100%" height="256" border="0" cellpadding="1" cellspacing="0">
    <tr>
      <td colspan="2" width="100%" bgcolor="#eeeeee"  height="35" class="t2"><center><strong>您的相关信息</strong></font></td>
    </tr>
    <tr>
      <td width="10"></td>
      <td valign="top" align="left">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="font1">
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td width="105" height="13" align="right">&nbsp;</td>
          <td width="833" class=t4>&nbsp;</td>
        </tr>     <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
          <td height="30" align="right">用 户：</td>
          <td class="t4"><font color="#3300FF" size="3">$line[userName]</font></td>
        </tr><tr>
          <td height="30" align="right">时  间：</td>
          <td class="t4"><font color="#3300FF">$nowdate</font></td>
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
      </table></td>
    </tr>
  </table>
  <font color=#333333 face=verdana><br>
&nbsp;&nbsp;&nbsp;&nbsp;</font>
<table width="90%">
  <tr><td bgcolor=#ffffff>
</td>
</tr>
<tr>
<td bgcolor=#ffffff valign=middle align=left>
  <div align="center"><font color=#000000>
    <br>
    </font><font color="blue" face="verdana">&nbsp;&nbsp;
    </font><font color=#000000><a href="login.php"><font size=3 color=red>重新登陆</font></a></font><font color="blue">&nbsp;</font><font color="blue" face="verdana">&nbsp;
    </font>&nbsp;&nbsp; &nbsp;&nbsp; <a href="javascript:self.close();"><font size=3 color=red>关闭浏览器 </font>
    </a> <font color=#000000><br>
    <br>
    <br>
    </font></div>
</table>


</table></body></html>
EOT;
exit;