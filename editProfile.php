<?
$title = "��������";
$thisprog = "editProfile.php";
require ("global.php");
echo "<title>$title /$xtm</title>";

//test
//test2
$link = mysql_connect('127.0.0.1', 'root', 'squall') or die('Could not connect: ' . mysql_error());
mysql_select_db('app') or die('Could not select database');
$query = "SELECT * FROM user WHERE userName='$_SESSION[userName]'";


$users = mysql_query($query) or die('Query failed: ' . mysql_error());
if ($users == 0) {
	echo ("<script>alert('There is no user, please check the user name.');window.history.back();</script>");
	exit ();
} else {
	$line = mysql_fetch_array($users, MYSQL_ASSOC);
}


print "<tr><td bgcolor=#CBDED8 colspan=3><b>$xtm/ $title</b> </td></tr>";

print<<<EOT
    <tr><td bgcolor=#ffffff colspan=3>
    <br> <center><font color="#FF6600" size="3" face="verdana"><b>$title</b></font>
    <form action=$thisprog?action=edit method=POST>
    <table border="0" width="95%" cellspacing="1" cellpadding="0" bgcolor="#DAEFE1" height="289">
  <tr>
    <td width="15%" align="center" height="45"><div align="right">�û���</div></td>
    <td width="1%" align="center">&nbsp;</td>
    <td width="30%" align="center" height="45"><div align="left"><strong><font color="#0000FF">$line[userName]</font></strong>    </div></td>

    <td width="9%" height="45" align="center"><div align="right">����</div></td>
    <td width="1%" align="center">&nbsp;</td>
    <td width="44%" height="45" colspan="3" align="center"><div align="left">
      <div align="left"><input type=text name="chineseName" size=20 maxlength=25 value=$line[chineseName] ></div>
    </div></td>
  </tr>
  <tr>
    <td align="center" height="45"><div align="right">�� λ</div></td>
    <td align="center">&nbsp;</td>
    <td align="center" height="45"><div align="left"><input type=text name="userCompany" nsize=20 value=$line[company]></div></td>
    <td height="45" align="center"><div align="right">��ϵ�绰</div></td>
    <td align="center">&nbsp;</td>
    <td height="45" colspan="3" align="center"><div align="left">
      <input type=text name="usertel" size=20 value=$line[phoneNumber]>
    </div></td>
  </tr>
  <tr>
    <td align="center"><div align="right">E-mail</div></td>
    <td align="center">&nbsp;</td>
    <td height="35" align="center"><div align="left">
      <input type=text name="email" size=20 maxlength=25 value=$line[emailAddr] >
    </div></td>
        <td height="35" align="center"><div align="right">������</div></td>
        <td align="center">&nbsp;</td>
        <td height="35" colspan="3" align="center"><div align="left">
      <input type="password" name="password" size=22>
    </div></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td height="38" align="center">&nbsp;</td>
    <td height="38" align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td height="38" colspan="3" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td height="38" align="center"><font color="red">�粻�޸��������������벻Ҫ��д</font></td>
    <td height="38" align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td height="38" colspan="3" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><div align="right">������</div></td>
    <td align="center">&nbsp;</td>
    <td height="38" align="center"><div align="left">
      <input name="newpwd" size=22 type="password" maxlength=16 title=6-16���ַ�>
    </div></td>
    <td height="38" align="center"><div align="right">�ظ�����</div></td>
    <td align="center">&nbsp;</td>
    <td height="38" colspan="3" align="center"><div align="left">
      <input name="newpwd1" size=22 type="password" maxlength=16 title=6-16���ַ�>
    </div></td>
  </tr>
  <tr>
    <td height="42" align="right"></td>
    <td align="right"></td>
    <td height="10" colspan="4" align="left"><div align="center">
      <input type=Submit class=button name=Submit value="�ύ">
      &nbsp;&nbsp;</div></td>
  </tr>
</table>
</form>

EOT;

if ($_GET['action'] == "edit") {

	$userName = $line[userName];
	$oldpwd = md5($_POST['password']);
//	echo "<script>alert(\"$oldpwd\");</script>";
//	echo "<script>alert(\"$line[password]\");</script>";
	$chineseName = $_POST['chineseName'];
	$newpwd = $_POST['newpwd'];
	$newpwd1 = $_POST['newpwd1'];
	$userCompany = $_POST['userCompany'];
	$userTel = $_POST['usertel'];
	$userEmail = $_POST['email'];

	if ($oldpwd != $line[password]) {
		echo "<script>alert(\"�����������������������룡\");javascript:history.go(-1);</script>";
		exit ();
	}
	if ($userTel == "") {
		echo "<script>alert(\"��ϵ�绰����Ϊ�գ�\");javascript:history.go(-1);</script>";
		exit ();
	}
	if ($userTel != "") {
		if ((strlen($userTel) > 11) | (strlen($userTel) < 7)) {
			echo "<script>alert(\"��������д��ϵ�绰��\");javascript:history.go(-1);</script>";
			exit ();
		}
	}
	if ($userCompany == "") {
		echo "<script>alert(\"��ϵ��˾���Ʋ���Ϊ�գ�\");javascript:history.go(-1);</script>";
		exit ();
	}
	if ($userEmail != "") {
		if (!ereg("@", $userEmail)) {
			echo "<script>alert(\"�������� �������лл��\");javascript:history.go(-1);</script>";
			exit ();
		}
	}
	if ($newpwd != $newpwd1) {
		echo "<script>alert(\"�����������벻һ�£� �������лл��\");javascript:history.go(-1);</script>";
		exit ();
	}

	$usrpwdEditMD5 = md5($newpwd);

	if ($newpwd != "") {
		mysql_query("UPDATE user SET password='$usrpwdEditMD5',chineseName='$chineseName',company='$userCompany',phoneNumber='$userTel',emailAddr='$userEmail' WHERE userName='$userName'");
		session_destroy();
		echo "<script>alert(\"�����ɹ�����Ϊ�����Ѿ��޸ģ������µ�¼��\");</script><meta http-equiv=refresh content=0;url=index.php>";
	} else {
		mysql_query("UPDATE user SET chineseName='$chineseName',company='$userCompany',phoneNumber='$userTel',emailAddr='$userEmail' WHERE userName='$userName'");
		echo "<script>alert(\"�����ɹ���\");javascript:history.go(-1);</script>";
	}
}

print "</td></tr></table></body></html>";
exit;