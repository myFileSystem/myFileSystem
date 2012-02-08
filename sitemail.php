<?
$thisprog = "sitemail.php";
$title = "站内信";
require ("global.php");
echo "<title>$title /$xtm</title>";
extract($_POST);
$page = $_GET['page'];
if ($_POST['ac'] == "t") {
	$page = $_POST['page'];
}
if (empty ($page))
	$page = 1;
if ($page < 1)
	$page = 1;
settype($page, integer);
$perpage = 20;
print "<tr><td bgcolor=#CBDED8 colspan=3><b>$xtm/ $title</b> </td></tr>";
$del = $_GET['del'];
if ($del == 'all') {
	mysql_query("delete * from sitemessage where messageTo='$_SESSION[userId]'") or die(mysql_error());
	echo "<script>alert(\"成功清空信箱！\");</script><meta http-equiv=refresh content=0;url=$thisprog>";
	exit;
}
elseif (!empty ($del)) {
	mysql_query("delete * from sitemessage where id='$del'") or die(mysql_error());
	echo "<script>alert(\"成功删除信息！\");</script><meta http-equiv=refresh content=0;url=$thisprog>";
	exit;
}
?>
<center><table width="95%">
       <tr>
<table  width="95%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="20">&nbsp;</td>
        </tr>
        <tr bgcolor="#DAEFE1">
          <td height="20">
<center><a href="javascript:history.go(0)">刷新</a>  &nbsp;&nbsp;<a href="javascript:void(1)" onClick="window.open ('writemail.php','','top=100,left=0,width=700,height=465,status=no,resizable=yes,scrollbars=yes');">
<img src="images/write.gif" border=0>发送消息</a>&nbsp;&nbsp;&nbsp;&nbsp; <form><a href="<?php $thisprog ?>?del=all"  OnClick="JavaScript: if(confirm('确实要清空信箱吗？')) return true; else return false;"><img src="images/fol-over.jpg" border=0>清空</a></form>&nbsp;&nbsp;&nbsp;&nbsp;
<?


$query = "SELECT * FROM user where id='$_SESSION[userId]'";
$users = mysql_query($query) or die('Query failed: ' . mysql_error());
$line = mysql_fetch_array($users, MYSQL_ASSOC);
if ($line[userRight] == 'super') {
	echo "<a href=javascript:void(5) onClick=\"window.open ('superwrite.php','','top=100,left=0,width=700,height=503,status=no,resizable=yes,scrollbars=yes');\"><img src=images/write.gif border=0>发送系统消息</a> ";
}
?>
<?


$countMessages = 0;
$messages = mysql_query("SELECT * FROM sitemessage where messageTo='$_SESSION[userId]'") or die('Query failed: ' . mysql_error());
while ($line = mysql_fetch_array($messages, MYSQL_ASSOC)) {
	$countMessages = $countMessages +1;

}
if ($countMessages != 0) {
	if ($maxpageno <= 1)
		echo "<p>容量/已用（$mailn/<font color=red><b>{$countMessages}</b></font>）";

	echo "&nbsp;&nbsp;信箱满后将不能接收个人消息，但可接收系统消息。";
?>
</center>
<hr size="1" noshade align="center" width="100%"><table bgcolor="#DAEFE1" width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr bgcolor="#DAEFE1" >
          	<td width="12%" height="24"><div align="left"><strong>&nbsp;发送者</strong></div></td>
          	<td width="42%"><div align="left"><strong>&nbsp;消息主题</strong></div></td>
          	<td width="21%"><div align="left"><strong>&nbsp;发送时间</strong></div></td>
          	<td width="13%"><div align="left" class="STYLE2">
          	  <div align="center">回复</div>
          	</div></td>
            <td width="12%"><div align="left" class="STYLE2">
              <div align="center">删除</div>
            </div></td>
          </tr>
          </table></td>
        </tr>
        <tr bgcolor="#DAEFE1"><td >
<?


	if ($countMessages != 0) {
		if ($countMessages % $perpage == 0)
			$maxpageno = $countMessages / $perpage;
		else
			$maxpageno = floor($countMessages / $perpage) + 1;
		if ($page > $maxpageno)
			$page = $maxpageno;
		$pagemin = min(($page -1) * $perpage, $countMessages -1);
		$pagemax = min($pagemin + $perpage -1, $countMessages -1);
		$messages = mysql_query("SELECT * FROM sitemessage where messageTo='$_SESSION[userId]'") or die('Query failed: ' . mysql_error());
		$i = 0;
		while ($message = mysql_fetch_array($messages, MYSQL_ASSOC)) {
			if ($i >= $pagemin) {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
<td width="12%"><div align="left"><span>&nbsp;<?php $items=mysql_query("select * from user where id='$message[messageFrom]'") or die (mysql_error()); $item=mysql_fetch_object($items); echo $item->userName; ?> </span></div>
<td width="42%"><div align="left"><? if($message[isFromSys]==1)echo"[<font color=#FF0000 title=系统消息>系统</font>]";?>
<a href="mailview.php?messageId=<?=$message[id];?>">
      <?=$message[messageTitle];?>
      </a>
      <?


				if (($message[isRead]) == 0) {
					echo "<img src=images/new.gif title=未阅读的个人消息>";
				}
?>
    </div>
</div>
<td width="21%"><div align="left"><?=$message[messageTime];?></div>
<td width="13%"><div align="center"><a href="javascript:void(3)" onClick="window.open ('writemail.php?recname=<?=$message[messageFrom]?>','','top=100,left=0,width=700,height=465,status=no,resizable=yes,scrollbars=yes');" title="给 <?=$message[messageFrom]?> 回信"><img src="images/mail.gif" border=0></a></div></td>
<td width="12%"> <div align="center"><form><a href="<?php $thisprog ?>?del=<?php $message[id] ?>" OnClick="JavaScript: if(confirm('确实要删除该条消息吗？')) return true; else return false;"><img src="images/fol-over.jpg" border=0></a></form></div></td>
  </tr>
</table>
<?


			}
			$i = $i +1;
		}
	}
} else
	echo "<br /><br /><br /><center><font color=blue>暂无个人消息";
?></td>
        </tr></form>
      </table>
