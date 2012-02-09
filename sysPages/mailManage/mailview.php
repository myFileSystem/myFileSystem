<?
$thisprog = "mailview.php";
$title = "查看消息";
require ("../globalPages/global.php");

$messageId = $_GET["messageId"];
$messages = mysql_query("select * from sitemessage where id='$messageId'");
$message = mysql_fetch_object($messages);

$messageFromId=$message->messageFrom;
$usersFrom = mysql_query("select * from user where id='$messageFromId'");
$userFrom=mysql_fetch_object($usersFrom);
$userFromName=$userFrom->userName;
$userToName=$_SESSION[userName];

if (empty ($message)) {
	echo "<script>alert(\"错误的ID信息！\");javascript:history.go(-1);</script>";
	exit;
}
echo "<title>$title /$xtm</title>";

print "<tr><td bgcolor=#CBDED8 colspan=3><b>$xtm/ $title</b> </td></tr>";
?>
<center>
<table width="95%">
       <tr>
<td width="100%" height="31" colspan="7" bgcolor="#FFFFFF"><div align="center"><font color="#FF6600" size="4" face="verdana"><strong><?=$title?></strong></font></div></td>
      </tr>

<table width="80%" border="1" cellspacing="0" cellpadding="0">           <tr>
            <td height="30" colspan="2" bgcolor="#DAEFE1"><div align="center"><a href="javascript:void(3)" onClick="window.open ('writemail.php?recname=<?=$mail[3]?>','','top=100,left=0,width=700,height=465,status=no,resizable=yes,scrollbars=yes');" title="给 <?=$mail[3]?> 回信"><img src="../images/mail.gif" border=0 height="18"></a>&nbsp;&nbsp; <a href="delmail.php?id=<?=$mail[1]?>" onClick="JavaScript: if(confirm('确实要删除该条消息吗？')) return true; else return false;"><img src="../images/fol-over.jpg" border=0 height="18" title="删除"></a>&nbsp;&nbsp; <a href="sitemail.php">返回列表</a> </div></td>
          </tr>
          <tr>
            <td width="20%" height="31" bgcolor="#DAEFE1"><div align="right">发 送 方&nbsp;</div></td>
            <td width="80%" bgcolor="#DAEFE1">&nbsp;
              <?=$userFromName?>
&nbsp;
<? if($message->isFromSys==1)echo"[<font color=#FF0000>系统消息</font>]";?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#DAEFE1"><div align="right">短信标题&nbsp;</div></td>
            <td bgcolor="#DAEFE1"><table width="100%" border="0">
                <tr>
                  <td width="2%">&nbsp;</td>
                  <td width="98%"><font color="#FF9933">
             <font color="#3399FF">
            <?=$message->messageTitle?>
            </font>
                  </font></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="65" bgcolor="#DAEFE1"><div align="right">消息内容&nbsp;</div></td>
            <td bgcolor="#DAEFE1">
              <table width="100%" border="0">
                <tr>
                  <td width="2%">&nbsp;</td>
                  <td width="98%"><font color="#FF9933">
                    <?php echo nl2br($message->messageContent)?>
                  </font></td>
                </tr>
            </table></td>
     </tr>
          <tr>
        <td></td>
        <?
<<<EOD
EOD
		;

?>
      </tr>
    </table>
