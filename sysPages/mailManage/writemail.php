<?php
$thisprog = "writemail.php";
$messageTo = $_GET['messageToArea'];
$systemMail = $_GET['systemMail'];
require ("../globalPages/global.php");

if ($systemMail == 'true') {
	$messageFrom = $_SESSION[userName];
	$users = mysql_query("select * from user where userName='$messageFrom'") or die(mysql_error());

	$user = mysql_fetch_array($users, MYSQL_ASSOC);
	if ($user[userRight] != 'super') {
		print "<script>alert(\"�˹���ֻ��ϵͳ����Ա����ʹ�ã�\");javascript:history.go(-1);</script>";
		exit;
	}
}

$title = "��д��Ϣ";
echo "<title>$title /$xtm</title>";
print "<tr><td bgcolor=#CBDED8 colspan=3><font color=black>    <b>$xtm/ $title</b>   </td></tr>";
?>
<p align="center">
<table bgcolor="#DAEFE1" width="100%" border="0" cellspacing="0" cellpadding="0"><form action=<? echo"$thisprog";?>?action=mail<? if($systemMail == 'true') echo "&systemMail=true" ?> method=POST>   <input type=hidden name="action" value="mail">
      <tr>
        <td width="6%"></td>
        <td width="16%"></td>
        <td width="78%"></td>
      </tr>
      <tr>
        <td height="56" colspan="3" style="color:#FF9900"><div align="center" class="STYLE2"><font color="#FF6600" size="4" face="verdana"><strong><?=$title?></strong></font> </div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr> <tr>
        <td height="28"></td>
        <td>�� �� ��</td>
        <td>
<?


if ($systemMail == 'true') {
	echo "�����û�</td>";
}
elseif ($messageTo == "") {
	echo "<select name=messageToArea size=1> <option>��ѡ���û�</option>";
	$query = 'SELECT * FROM user';
	$users = mysql_query($query) or die('Query failed: ' . mysql_error());
	while ($user = mysql_fetch_array($users, MYSQL_ASSOC)) {
		if ($user[userName] != $_SESSION['userName'])
			echo "<option value=$user[userName]>$user[chineseName][@$user[userName]]</option>";
	}
	echo "</select>";
} else
	echo "<input name=messageToArea value=$messageTo readonly><font color=blue>$messageTo</font>";
?></td>
      </tr>
      <tr>
        <td height="27"></td>
        <td>��Ϣ����</td>
        <td><input type="text" name="messageTitile" size="60" ></td>
      </tr>
      <tr>
        <td></td>
        <td>��Ϣ����</td>
        <td><textarea name="messageContent" cols="60" rows="15"></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input style="font-size:10pt" class=button type="submit" value="����"> &nbsp;&nbsp;&nbsp;   <input class=button style="font-size:10pt" type="reset" value="��д"> &nbsp;&nbsp;&nbsp;   <input class=button style="font-size:10pt" type="reset" value="ȡ��" onClick="javascript:window.close()"></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr></form>
    </table>
<?php


if ($_POST['action'] == "mail") {

	if ($systemMail == 'true')
		$messageGroup = mysql_query("select * from user") or die(mysql_error());
	else
		$messageTo = $_POST['messageToArea'];

	$messageTitile = $_POST['messageTitile'];
	$messageContent = $_POST['messageContent'];

	if ($systemMail != 'true') {
		if ($messageTo == "��ѡ���û�") {
			echo "<script>alert(\"��ѡ������û���\");</script>";
			exit;
		}
	}
	if ($messageTitile == "") {
		echo "<script>alert(\"����д��Ϣ���⣡\");</script>";
		exit ();
	}
	if ($messageContent == "") {
		echo "<script>alert(\"����д��Ϣ���ݣ�\");</script>";
		exit ();
	}

	//	if ($cog >= $mailn) {
	//		echo "<script>alert(\"����ʧ�ܣ���Ϊ $recname ������������\");javascript:history.go(-1);</script>";
	//		exit ();
	//	}

	$messageFrom = $_SESSION[userName];
	$users = mysql_query("select * from user where username='$messageFrom'");
	$userBean = mysql_fetch_object($users);
	$messageFrom = $userBean->id;

	if ($systemMail == 'true') {
		while($eachPerson = mysql_fetch_array($messageGroup, MYSQL_ASSOC)){
			if($messageFrom!=$eachPerson[id])
				mysql_query("INSERT INTO sitemessage (messageFrom, messageTo,messageTitle,messageContent,messageTime,isFromSys,isRead) VALUES ('$messageFrom', '$eachPerson[id]', '$messageTitile', '$messageContent', NOW(), 1,0)");
		}
		echo "<script>alert(\"ϵͳ��Ϣ���ͳɹ���\");javascript:window.close();</script>";
		exit;
	} else {
		$messageToName = $messageTo;
		$users = mysql_query("select * from user where userName='$messageTo'") or die(mysql_error());
		$user = mysql_fetch_array($users, MYSQL_ASSOC);
		$messageTo = $user[id];

		mysql_query("INSERT INTO sitemessage (messageFrom, messageTo,messageTitle,messageContent,messageTime,isFromSys,isRead) VALUES ('$messageFrom', '$messageTo', '$messageTitile', '$messageContent', NOW(), 0,0)");
		echo "<script>alert(\"�� $messageToName ����Ϣ���ͳɹ���\");javascript:window.close();</script>";
		exit;
	}
}
?>