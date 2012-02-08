<?php
ob_start();
$thisprog="writemail.php";
$recname=$_GET['recname'];
$title="书写消息";
require("global.php");
echo"<title>$title /$xtm</title>";
print "<tr><td bgcolor=#CBDED8 colspan=3><font color=black>    <b>$xtm/ $title</b>   </td></tr>";
?>
<p align="center">
<table bgcolor="#DAEFE1" width="100%" border="0" cellspacing="0" cellpadding="0"><form action=<? echo"$thisprog";?> method=POST>   <input type=hidden name="action" value="mail">
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
        <td>接 收 方</td>
        <td>
<?
if($recname=="") 
{
echo"<select  name=recname size=1> <option>请选择用户</option>";
$dh=opendir("$userd");
while ($usernamefile=readdir($dh)) {
if (($usernamefile!=".") && ($usernamefile!="..") && ($usernamefile!="") && strpos($usernamefile,".php")) {
$usernamei=explode("|",readfrom("$userd$usernamefile"));
$username_info.="$usernamei[1]";
echo"<option value=$usernamei[1]>$usernamei[1][$usernamei[7]]</option>";
}}
echo"</select>";}
else echo"<input type=hidden name=recname value=$recname><font color=blue>$recname</font>";
?></td>
      </tr>
      <tr>
        <td height="27"></td>
        <td>消息标题</td>
        <td><input type="text" name="titlexx" size="60" ></td>
      </tr>
      <tr>
        <td></td>
        <td>消息内容</td>
        <td><textarea name="note" cols="60" rows="15"></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input style="font-size:10pt" class=button type="submit" value="发送"> &nbsp;&nbsp;&nbsp;   <input class=button style="font-size:10pt" type="reset" value="重写"> &nbsp;&nbsp;&nbsp;   <input class=button style="font-size:10pt" type="reset" value="取消" onClick="javascript:window.close()"></td>
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
<?
extract($_POST);
if($_POST['action'] == "mail")
{
$recname=$_POST['recname'];
$titlexx=$_POST['titlexx'];
$note=$_POST['note'];
}
if ($action=="mail") {
if($recname=="$username")
{
echo "<script>alert(\"别玩了！哪能给自己发消息啊！\");javascript:history.go(-1);</script>";
exit();
}
if (!(file_exists("$userd$recname.php")) )
{ 
echo "<script>alert(\"请选择接收用户！\");javascript:history.go(-1);</script>";
exit;
}
if($titlexx=="")
{
echo "<script>alert(\"请填写消息标题！\");javascript:history.go(-1);</script>";
exit();
}
if($note=="")
{
echo "<script>alert(\"请填写消息内容！\");javascript:history.go(-1);</script>";
exit();
}
$book="$mail/".$recname.".php";
$garray = file($book);
$cog=count($garray);
function safe_convert($s) {
        $s=str_replace("|","│",$s);
        $s=str_replace("<","&lt;",$s);
        $s=str_replace(">","&gt;",$s);
        $s=str_replace("\r","",$s);
        $s=str_replace("\t","",$s);
        $s=str_replace("\n","<br>",$s);
        $s=str_replace(" ","&nbsp;",$s);
        return $s;          }
$titlexx=trim($titlexx);
$titlexx=safe_convert($titlexx);
$note=trim($note);
$note=safe_convert($note);
if ($cog>=$mailn) {
echo "<script>alert(\"发送失败，因为 $recname 的信箱已满！\");javascript:history.go(-1);</script>";
exit();
}
$larray = explode("|",$garray[0]);
$id=$larray[1]+1;
$zt="new";
$err="<meta http-equiv=refresh content=0;url=../><?exit;?>";
date_default_timezone_set('Asia/Shanghai');$settime=date("Y-m-d G:i:s");
$xinxi=array($err,$id,$settime,$username,$titlexx,$note,$zt,$sys);
$newguest = implode("|", $xinxi)."|\r\n";
$f = fopen($book,"r+");
$msg = fread($f,filesize($book));
fclose($f);
$fp=@fopen($book,"w+");
@fwrite($fp,$newguest.$msg);
@fclose($fp);
echo "<script>alert(\"给 $recname 的消息发送成功！\");javascript:window.close();</script>";
exit;
}
?>