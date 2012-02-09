<?
$title = "用户管理";
$thisprog = "adminuser.php";
require ("../globalPages/global.php");
echo "<title>$title /$xtm</title>";

$link = mysql_connect('127.0.0.1', 'root', 'squall') or die('Could not connect: ' . mysql_error());
mysql_select_db('app') or die('Could not select database');
$query = 'SELECT * FROM user';
$users = mysql_query($query) or die('Query failed: ' . mysql_error());

$action=$_GET['action'];

print "<tr><td bgcolor=#CBDED8 colspan=3><b>$xtm/ 用户管理</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=userlist.php>切换到用户列表</a></td></tr>";
if (empty ($action)) {
	$use_info = '';
	$countOfUsers = 0;
	while ($line = mysql_fetch_array($users, MYSQL_ASSOC)) {
		$use_info .= "<tr> <form action=$thisprog?action=edit method=post>
    <input type=hidden  name=action value=\"edit\">
	<input type=hidden name=oldname value=\"$use[1]\">
	<td height=26 width=10% align=center><input type=text size=12 name=\"name\" value=\"$line[userName]\" readonly></td>
	<td height=26 width=10% align=center>
	<input type=text name=\"realname\" size=8 value=\"$line[chineseName]\"></td>
	<td height=26 width=10% align=center>
	<input type=text name=\"usrpwds\" size=12 maxlength=16 title=6-16个字符></td>
	<td height=26 width=10% align=center>
	<input type=text name=\"userabout\" size=20 value=\"$line[company]\"></td>
	<td height=26 width=10% align=center>
	<input type=text name=\"usertel\" size=15 value=\"$line[phoneNumber]\"></td>
	<td height=26 width=10% align=centeb>
	<input type=text name=\"email\" size=20 value=\"$line[emailAddr]\"></td>
	<td height=26 size=30  align=center>
	<input type=text name=\"ms\" size=6 title=用于忘记密码后重设密码，请牢记></td>
	<td height=26 size=30  align=center>
	<select name=\"usrpower\"><option value=low>普通用户</option><option value=test>测试用户</option><option value=high>高级用户</option><option value=super>系统管理</option></select></td>
	<td height=26 wiVth=100%  align=center><input name=Submit title=\"修改 $line[userName] 的资料\"  type=image src=../images/write.gif border=0>&nbsp; <a href=\"$thisprog?action=del&name=$line[userName]\" OnClick=\"JavaScript: if(confirm('确实要删除用户 $line[userName] 吗？')) return true; else return false;\"><img src=\"../images/fol-over.jpg\" title=\"删除 $line[userName]\" border=\"0\"></a></td></form>";
		$countOfUsers = $countOfUsers +1;
	}

	print<<<EOT
  <tr> <td bgcolor=#ffffff colspan=3>
    <form action=$thisprog?action=addnew method=post><input type=hidden name="action" value="addnew">
  <BR>    <b>1.新增用户</b> <font color=red>用户名、密码中不得包含空格</font> $tab_top
<table border="0" width="100%" cellspacing="1" cellpadding="0" bgcolor="#DAEFE1" height="52">
  <tr>
    <td width="11%" align="center" height="21">用户名</td>
    <td width="11%" align="center" height="21">密&nbsp; 码</td>
    <td width="11%" align="center" height="21">&nbsp;姓&nbsp; 名</td>
    <td width="11%" align="center" height="21">&nbsp; 单&nbsp; 位</td>
    <td width="12%" align="center" height="15">联系电话</td>
    <td width="14%" align="center" height="21">E-mail</td>
    <td width="9%" align="center" height="21">密钥</td>
    <td width="8%" align="center" height="21">权&nbsp; 限</td>
    <td width="13%" align="center" height="21"></td>
  </tr>
  <tr>
    <td width="11%" align="center"><input type=text name="nameNew" size=11 maxlength=12 title=5-12个字符> </td>
    <td width="11%" align="center"><input type=text name="usrpwdNew" size=13 maxlength=16 title=6-16个字符> </td>
    <td width="11%" align="center"><input type=text  name="realnameNew" size=13> </td>
    <td width="11%" align="center"><input type=text name="useraboutNew" size=14> </td>
    <td width="12%" align="center"><input type=text name="usertelNew" size=15>  </td>
    <td width="14%" align="center"><input type=text name="emailNew" size=20>  </td>
    <td width="9%" align="center"><input type=text name="msNew" size=10 title=用于忘记密码后重设密码，请牢记>  </td>
    <td width="11%" align="center"><select name="usrpowerNew"><option value=low>普通用户</option><option value=test>测试用户</option><option value=high>高级用户</option><option value=super>系统管理</option></select>
    </td>
    <td width="13%" align="center">
    <input type=submit class=button name=Submit value="提交"></td>
  </tr>
</table>
    $tab_bottom</form>

    <b>2.用户修改</b>(<font color=red>用户名、密码中不得包含空格</font>,密码经MD5加密，所以没有显示出来，对于不修改的内容，请不要填写)
      $tab_top
	<div align="center">
  <center>
<table width=100% border="0" cellspacing="0" cellpadding="0" bgcolor="#DAEFE1" >
<tr>
<td height="26" width="10%" align="center">
<b>用户名</b></td>
<td height="26" width="11%" align="center">
<b>姓  名</b></td>
<td height="26" width="11%" align="center">
<b>密码</b></td>
<td height="26" width="11%" align="center">
<b>单位</b></td>
<td height="26" width="14%"  align="center">
<b>联系电话</b></td>
<td height="26" width="15%"  align="center">
<b>E-mail</b></td>
<td height="26" width="6%"  align="center">
<b>密钥</b></td>
<td height="26" width="9%"  align="center">
<b>权限</b></td>
<td height="26" width="13%"  align="center">
<b>操作</b></td>
</tr>
$use_info
	</table>
  </center>
</div>
 $tab_bottom <br><center>
EOT;
	echo "&nbsp;共有  <font color=red><b>$countOfUsers</b></font> 位用户";
	echo "</center></td></tr></td></tr></table></body></html>";
	exit;
}
elseif ($action == "edit") {
	$nameEdit=$_POST["name"];
	$msEdit=$_POST["ms"];
	$usrpwdEdit=$_POST["usrpwds"];
	$realnameEdit=$_POST["realname"];
	$useraboutEdit=$_POST["userabout"];
	$usertelEdit=$_POST["usertel"];
	$emailEdit=$_POST["email"];
	$powerEdit=$_POST["usrpower"];
	if ($usrpwdEdit != "") {
		if ((strlen($usrpwdEdit) > 16) | (strlen($usrpwdEdit) < 6)) {
			echo "<scripd>alert(\"请认真填写6-16位密码！\");javascript:history.go(-1);</script>";
			exit ();
		}
	}
	if ($realnameEdit == "") {
		echo "<script>alert(\"姓名不能为空！\");javascript:history.go(-1);</script>";
		exit ();
	}
	if ($useraboutEdit == "") {
		echo "<script>alert(\"请认真填写单位信息！\");javascript:history.go(-1);</script>";
		exit ();
	}
	if ($usertelEdit == "") {
		echo "<script>alert(\"联系电话不能为空！\");javascript:history.go(-1);</script>";
		exit ();
	}
	if ($usertelEdit != "") {
		if ((strlen($usertelEdit) > 11) | (strlen($usertelEdit) < 7)) {
			echo "<script>alert(\"请认真填写联系电话！\");javascript:history.go(-1);</script>";
			exit ();
		}
	}
	if ($emailEdit != "") {
		if (!ereg("@", $emailEdit)) {
			echo "<script>alert(\"邮箱有误， 请更正！谢谢！\");javascript:history.go(-1);</script>";
			exit ();
		}
	}
	$usrpwdEditMD5 = md5($usrpwdEdit);
	$msEditMD5 = md5($msEdit);


	mysql_query("UPDATE user SET userRight='$powerEdit',password='$usrpwdEditMD5',chineseName='$realnameEdit',company='$useraboutEdit',phoneNumber='$usertelEdit',secretKey='$msEditMD5',emailAddr='$emailEdit' WHERE userName='$nameEdit'" );
	$use_info = "<meta http-equiv=refresh content=0;url=../><?exit;?>";

	echo "<script>alert(\"修改成功！\");</script><meta http-equiv=refresh content=0;url=$thisprog>";
}
elseif ($action == "addnew") {
	$nameNew=$_POST["nameNew"];
	$msNew=$_POST["msNew"];
	$usrpwdNew=$_POST["usrpwdNew"];
	$realnameNew=$_POST["realnameNew"];
	$useraboutNew=$_POST["useraboutNew"];
	$usertelNew=$_POST["usertelNew"];
	$emailNew=$_POST["emailNew"];
	$powerNew=$_POST["usrpowerNew"];

	$result=mysql_query("select * from user where userName='$nameNew'") or die (mysql_error());
	if ($rs=mysql_fetch_object($result)) {
		echo "<script>alert(\"抱歉！该用户名已经有人使用，请更换！\");javascript:history.go(-1);</script>";
		exit;
	}
	if ($nameNew == "") {
		echo "<script>alert(\"用户名不能为空！\");javascript:history.go(-1);</script>";
		exit ();
	}
	if ($msNew == "") {
		echo "<script>alert(\"密钥不能为空！\");javascript:history.go(-1);</script>";
		exit ();
	}
	if ($msNew != "") {
		if ((strlen($msNew) < 4)) {
			echo "<script>alert(\"密钥不能短于4个字符！\");javascript:history.go(-1);</script>";
			exit ();
		}
	}

	if ($nameNew != "") {
		if ((strlen($nameNew) > 12) | (strlen($nameNew) < 4)) {
			echo "<script>alert(\"用户名控制在4-12个字符！\");javascript:history.go(-1);</script>";
			exit ();
		}
	}
	if ($usrpwdNew == "") {
		echo "<script>alert(\"密码不能为空！\");javascript:history.go(-1);</script>";
		exit ();
	}
	if ($usrpwdNew != "") {
		if ((strlen($usrpwdNew) > 16) | (strlen($usrpwdNew) < 6)) {
			echo "<script>alert(\"请将密码控制在6-16字符！\");javascript:history.go(-1);</script>";
			exit ();
		}
	}
	if ($realnameNew == "") {
		echo "<script>alert(\"姓名不能为空！\");javascript:history.go(-1);</script>";
		exit ();
	}
	if ($useraboutNew == "") {
		echo "<script>alert(\" 单位不能为空！\");javascript:history.go(-1);</script>";
		exit ();
	}
	if ($usertelNew == "") {
		echo "<script>alert(\"联系电话不能为空！\");javascript:history.go(-1);</script>";
		exit ();
	}
	if ($usertelNew != "") {
		if ((strlen($usertelNew) > 11) | (strlen($usertelNew) < 7)) {
			echo "<script>alert(\"请认真填写联系电话！\");javascript:history.go(-1);</script>";
			exit ();
		}
	}
	if ($emailNew != "") {
		if (!ereg("@", $emailNew)) {
			echo "<script>alert(\"邮箱有误， 请更正！谢谢！\");javascript:history.go(-1);</script>";
			exit ();
		}
	}

	$usrpwdNewMD5 = md5($usrpwdNew);
	$msNewMD5 = md5($msNew);
	mysql_query("INSERT INTO user (userName, password,chineseName,company,phoneNumber,userRight,secretKey,emailAddr) VALUES ('$nameNew', '$usrpwdNewMD5', '$realnameNew', '$useraboutNew', '$usertelNew', '$powerNew','$msNewMD5', '$emailNew')" );
	$use_info = "<meta http-equiv=refresh content=0;url=../><?exit;?>";

	echo "<script>alert(\"操作成功！\");</script><meta http-equiv=refresh content=0;url=$thisprog>";
}
elseif ($action == "del") {
	$delName=$_GET['name'];
	mysql_query("delete from user where userName='$delName'") or die (mysql_error());
	echo "<script>alert(\"成功删除用户！\");</script><meta http-equiv=refresh content=0;url=$thisprog>";
}
print "</td></tr></table></body></html>";
exit;