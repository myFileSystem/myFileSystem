<?php
session_start();
$login = $_GET['login'];
$thisprog = "logout.php?login=$login";
$title = "�˳�ϵͳ";
require ("global.php");
echo "<title>$title /$xtm</title>";
?>
<title>$xtm/�˳�����</title><script>
setInterval("timer.innerText--;if(timer.innerText=='0')location='javascript:self.close()';",1000);
</script>
<?php

$nowdate = date("Y �� m �� d ��  H:m:s ");
$phpver = PHP_VERSION;
$phpos = PHP_OS;

if (isset ($_COOKIE))
	$testcookie = "<font color=000066>ͨ ��</font>";
else
	$testcookie = "<font color=990000>ʧ ��</font>";

$query = "SELECT * FROM user WHERE userName='$_SESSION[userName]'";
$users = mysql_query($query) or die('Query failed: ' . mysql_error());
$line = mysql_fetch_array($users, MYSQL_ASSOC);

print<<<EOT
<tr><td bgcolor=#80809b><font color=#ffffff></td></tr>
<tr>
<td bgcolor=#FFFFFF >
  <p><font color=#333333 face=verdana><br>
  &nbsp;</font>�װ��� </font><font size="5" color="#FF0000"><b>$line[userName]</b></font> <font color="#333333">���Ѿ��ɹ��˳�ϵͳ����ҳ�� </font> <font size="10" color="#FF0000"><span id="timer">5</span></font> ���Զ��ر�</font><font color=#333333 face=verdana>! </p>
  <p><font color=#333333 face=verdana></font></p>
  <table width="100%" height="256" border="0" cellpadding="1" cellspacing="0">
    <tr>
      <td colspan="2" width="100%" bgcolor="#eeeeee"  height="35" class="t2"><center><strong>���������Ϣ</strong></font></td>
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
          <td height="30" align="right">�� ����</td>
          <td class="t4"><font color="#3300FF" size="3">$line[userName]</font></td>
        </tr><tr>
          <td height="30" align="right">ʱ  �䣺</td>
          <td class="t4"><font color="#3300FF">$nowdate</font></td>
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
    </font><font color=#000000><a href="../../index.php"><font size=3 color=red>���µ�½</font></a></font><font color="blue">&nbsp;</font><font color="blue" face="verdana">&nbsp;
    </font>&nbsp;&nbsp; &nbsp;&nbsp; <a href="javascript:self.close();"><font size=3 color=red>�ر������ </font>
    </a> <font color=#000000><br>
    <br>
    <br>
    </font></div>
</table>


</table></body></html>
EOT;
exit;