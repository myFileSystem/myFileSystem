<?
$thisprog = "mainPage.php";
$title = "ϵͳ��ҳ";
require ("global.php");
echo "<title>$title /$xtm</title>";
date_default_timezone_set('Asia/Shanghai');
$nowdate = date("Y �� m �� d �� G:i:s");
$phpver = PHP_VERSION;
$phpos = PHP_OS;
if (isset ($_COOKIE))
	$testcookie = "<font color=000066>ͨ ��</font>";
else
	$testcookie = "<font color=990000>ʧ ��</font>";

$query = "SELECT * FROM user WHERE userName='$_SESSION[userName]'";
$users = mysql_query($query) or die('Query failed: ' . mysql_error());

$line = mysql_fetch_array($users, MYSQL_ASSOC);

if ($line[userRight] == "super") {
	$userRight = "<font color=red>ϵͳ����Ա</font>";
}
if ($line[userRight] == 'high') {
	$userRight = "<font color=red>�߼��û�</font>";
}
if ($line[userRight] == 'low') {
	$userRight = "<font color=red>��ͨ�û�</font>";
}
if ($line[userRight] == 'test') {
	$userRight = "<font color=red>�����û�</font>";
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
//	echo "<script>alert(\"����������������������Ҫ���ż���\");</script>";
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
    <td colspan=2 width="100%" bgcolor="#eeeeee" height="25" class="t2"><div align="center"><strong>���������Ϣ</strong></div></td>
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
          <td height="30" align="right">�� ����</td>
          <td class="t4"><font color="#3300FF" size="3">$line[userName]</font>&nbsp;&nbsp;$xj</td>
        </tr>
        <tr>
          <td height="30" align="right">ʱ  �䣺</td>
          <td class="t4"><font color="#3300FF">$nowdate</font></td>
        </tr>
        <tr>
          <td height="30" align="right">Ȩ  �ޣ�</td>
          <td class="t4"><div>$userRight</div></td>
        </tr><tr>
          <td height="30" align="right">��ǰIP��</td>
          <td class="t4"><font color="#3300FF">$_SERVER[REMOTE_ADDR]</font></td>
        </tr><tr>
          <td height="30" align="right">����ϵͳ��</td>
          <td class="t4"><font color="#3300FF">$phpos</font></td>
        </tr><tr>
          <td height="30" align="right">��ʽ�汾��</td>
           <td class="t4"><font color="#3300FF">$phpver</font></td>
        </tr><tr>
          <td height="30" align="right">Cookie ���ԣ�</td>
           <td class="t4"><font color="#3300FF">$testcookie</font></td>
        </tr>
      </table>    </td>
  </tr>
</table>
<p><center>
ϵͳ���¼��ÿһ�εĲ����������ʹ������Ȩ��!����Υ����������ǽ����������׷����Ӧ���Ρ��뿪ʱ�ǵõ��  <a href="logout.php?login=$line[userName]"><font color=red>�˳�ϵͳ</font></a>
<p>
EOT;
exit;