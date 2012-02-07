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
$perpage = 25;
print "<tr><td bgcolor=#CBDED8 colspan=3><b>$xtm/ $title</b> </td></tr>";
$del = $_GET['del'];
if ($_REQUEST[del]) {
	mysql_query("delete from user where userTo='$_SESSION[userName]'") or die (mysql_error());
	echo "<script>alert(\"成功清空信箱！\");</script><meta http-equiv=refresh content=0;url=$thisprog>";
	exit;
}
?>
<center><table width="95%">
       <tr>
<table class="leasin" width="95%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="20">&nbsp;</td>
        </tr>
        <tr bgcolor="#DAEFE1">
          <td height="20">
<center><a href="javascript:history.go(0)">刷新</a>  &nbsp;&nbsp;<a href="javascript:void(1)" onClick="window.open ('writemail.php','','top=100,left=0,width=700,height=465,status=no,resizable=yes,scrollbars=yes');">
<img src="images/write.gif" border=0>发送消息</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="?del=<?="".$username.".php"?>"  OnClick="JavaScript: if(confirm('确实要清空信箱吗？')) return true; else return false;"><img src="images/fol-over.jpg" border=0>清空</a>&nbsp;&nbsp;&nbsp;&nbsp;<?

if ($checkpower == super) {
	print "<a href=javascript:void(5) onClick=\"window.open ('superwrite.php','','top=100,left=0,width=700,height=503,status=no,resizable=yes,scrollbars=yes');\"><img src=images/write.gif border=0>发送系统消息</a> ";
}
?>
<?

if (file_exists("$mail/" . $username . ".php")) {
	$message_list = @ file("$mail/" . $username . ".php");
	$countnum = count($message_list);
	$count = $countnum;
	if ($maxpageno <= 1)
		echo "<p>容量/已用（$mailn/<font color=red><b>{$countnum}</b></font>）";

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

	if ($count != "") {
		if ($count % $perpage == 0)
			$maxpageno = $count / $perpage;
		else
			$maxpageno = floor($count / $perpage) + 1;
		if ($page > $maxpageno)
			$page = $maxpageno;
		$pagemin = min(($page -1) * $perpage, $count -1);
		$pagemax = min($pagemin + $perpage -1, $count -1);
		for ($i = $pagemin; $i <= $pagemax; $i++) {
			$detail = explode("|", $message_list[$i]);
			if (strlen($detail[4]) >= 36) {
				if (strlen($detail[4]) % 2 == 0)
					$detail[4] = substr($detail[4], 0, 34) . "...";
				else
					$detail[4] = substr($detail[4], 0, 33) . "...";
			}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
<td width="12%"><div align="left"><span>&nbsp;<?=$detail[3]?> </span></div>
<td width="42%"><div align="left"><? if($detail[7]=="sys")echo"[<font color=#FF0000 title=系统消息>系统</font>]";?>
<a href="mailview.php?id=<?=$detail[1];?>">
      <?=$detail[4];?>
      </a>
      <?

			if (($detail[6]) == "new") {
				echo "<img src=images/new.gif title=未阅读的个人消息>";
			}
?>
    </div>
</div>
<td width="21%"><div align="left"><?=$detail[2];?></div>
<td width="13%"><div align="center"><a href="javascript:void(3)" onClick="window.open ('writemail.php?recname=<?=$detail[3]?>','','top=100,left=0,width=700,height=465,status=no,resizable=yes,scrollbars=yes');" title="给 <?=$detail[3]?> 回信"><img src="images/mail.gif" border=0></a></div></td>
<td width="12%"> <div align="center"><a href="delmail.php?id=<?=$detail[1]?>" OnClick="JavaScript: if(confirm('确实要删除该条消息吗？')) return true; else return false;"><img src="images/fol-over.jpg" border=0></a></div></td>
  </tr>
</table>
<?

		}
	}
} else
	echo "<br><center><font color=blue>暂无个人消息";
include ("mydata/page.php");
?></td>
        </tr></form>
      </table>
