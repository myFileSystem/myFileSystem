<?
$thisprog = "userlist.php";
$title = "�û��б�";
require ("global.php");
echo "<title>$title /$xtm</title>";
print "<tr><td bgcolor=#CBDED8 colspan=3><b>$xtm/ $title</b>    </td></tr>";

$link = mysql_connect('127.0.0.1', 'root', 'squall') or die('Could not connect: ' . mysql_error());
mysql_select_db('app') or die('Could not select database');
$query = 'SELECT * FROM user';
$users = mysql_query($query) or die('Query failed: ' . mysql_error());

if (empty ($action)) {
	$use_info = '';

	while ($line = mysql_fetch_array($users, MYSQL_ASSOC)) {

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

		$use_info .= "<tr><td height=20 align=center>$line[userName]</td>
	<td align=center>$line[chineseName]</td><td align=center>$line[company]</td><td align=center>$line[phoneNumber]</td><td align=center><a href='mailto:$line[emailAddr]'>$line[emailAddr]</td>
	<td align=center>$userRight</td><td align=center> <a href=javascript:void(1) onClick=\"window.open ('writemail.php?recname=$line[userName]','','top=100,left=0,width=700,height=465,status=no,resizable=yes,scrollbars=yes');\" title=\"�� $line[userName] ������Ϣ\"><img src=images/write.gif border=0></a>
	<td align=center>$use[10]</td></tr>";
	}
}

print<<<EOT
     $tab_top
    $tab_bottom   <br>
    $tab_top
  <center>
<table border="1" cellspacing="0" width="100%" bordercolorlight="#405028" bordercolordark="#FFFFFF">
<tr>
<td height="26" width="12%"align="center">
<b>�û���</b></td>
<td height="26" width="11%"align="center">
<b>��   ��</b></td>
<td height="26" width="11%" align="center">
<b>��   λ</b></td>
<td height="26" width="12%" align="center">
<b>��ϵ�绰</b></td>
<td height="26" width="17%" align="center">
<b>E-mail</b></td>
<td height="26" width="10%"  align="center">
<b>����Ȩ��</b></td>
<td height="26" width="12%"  align="center">
<b>����վ����Ϣ</b></td>

</tr>
$use_info
	</table>
  </center>
</div> </td></tr></td></tr></table></body></html>
EOT;
exit;