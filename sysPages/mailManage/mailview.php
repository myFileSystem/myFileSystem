<?
$thisprog = "mailview.php";
$title = "�鿴��Ϣ";
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
	echo "<script>alert(\"�����ID��Ϣ��\");javascript:history.go(-1);</script>";
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
            <td height="30" colspan="2" bgcolor="#DAEFE1"><div align="center"><a href="javascript:void(3)" onClick="window.open ('writemail.php?recname=<?=$mail[3]?>','','top=100,left=0,width=700,height=465,status=no,resizable=yes,scrollbars=yes');" title="�� <?=$mail[3]?> ����"><img src="../images/mail.gif" border=0 height="18"></a>&nbsp;&nbsp; <a href="delmail.php?id=<?=$mail[1]?>" onClick="JavaScript: if(confirm('ȷʵҪɾ��������Ϣ��')) return true; else return false;"><img src="../images/fol-over.jpg" border=0 height="18" title="ɾ��"></a>&nbsp;&nbsp; <a href="sitemail.php">�����б�</a> </div></td>
          </tr>
          <tr>
            <td width="20%" height="31" bgcolor="#DAEFE1"><div align="right">�� �� ��&nbsp;</div></td>
            <td width="80%" bgcolor="#DAEFE1">&nbsp;
              <?=$userFromName?>
&nbsp;
<? if($message->isFromSys==1)echo"[<font color=#FF0000>ϵͳ��Ϣ</font>]";?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#DAEFE1"><div align="right">���ű���&nbsp;</div></td>
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
            <td height="65" bgcolor="#DAEFE1"><div align="right">��Ϣ����&nbsp;</div></td>
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
