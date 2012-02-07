<?
$thisprog = "userlist.php";
$title = "用户列表";
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

		$use_info .= "<tr><td height=20 align=center>$line[userName]</td>
	<td align=center>$line[chineseName]</td><td align=center>$line[company]</td><td align=center>$line[phoneNumber]</td><td align=center><a href='mailto:$line[emailAddr]'>$line[emailAddr]</td>
	<td align=center>$userRight</td><td align=center> <a href=javascript:void(1) onClick=\"window.open ('writemail.php?recname=$line[userName]','','top=100,left=0,width=700,height=465,status=no,resizable=yes,scrollbars=yes');\" title=\"向 $line[userName] 发送消息\"><img src=images/write.gif border=0></a>
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
<b>用户名</b></td>
<td height="26" width="11%"align="center">
<b>姓   名</b></td>
<td height="26" width="11%" align="center">
<b>单   位</b></td>
<td height="26" width="12%" align="center">
<b>联系电话</b></td>
<td height="26" width="17%" align="center">
<b>E-mail</b></td>
<td height="26" width="10%"  align="center">
<b>管理权限</b></td>
<td height="26" width="12%"  align="center">
<b>发送站内消息</b></td>

</tr>
$use_info
	</table>
  </center>
</div> </td></tr></td></tr></table></body></html>
EOT;
exit;