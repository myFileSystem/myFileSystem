<?php
ob_start();
$thisprog="superwrite.php";
$recname=$_GET['recname'];
$title="群发消息";
require("global.php");
echo"<title>$title /$xtm</title>";
print "<tr><td bgcolor=#CBDED8 colspan=3><font color=black>    <b>$xtm/ $title</b> </td></tr>";
if($checkpower !=super) {
print "<script>alert(\"此功能只有系统管理员才能使用！\");javascript:history.go(-1);</script>";
exit;}
?>
<style type="text/css">
.STYLE1 {font-size: 14px}
.STYLE2 {
	font-size: 16px;
	font-weight: bold;
}
</style>
<p align="center">
<table bgcolor="#DAEFE1" width="519" border="0" cellspacing="0" cellpadding="0"><form action=<?=$thisprog?> method=POST>   <input type=hidden name="action" value="mail">
      <tr>
        <td width="4%"></td>
        <td width="25%"></td>
        <td width="71%"></td>
      </tr>
      <tr>
        <td height="56" colspan="3" style="color:#FF9900"><div align="center" class="STYLE2"><?=$title?></div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr> <tr>
        <td height="28"></td>
        <td>接 收 方</td>
        <td>所有用户</td>
      </tr>
      <tr>
        <td height="27"></td>
        <td>消息标题</td>
        <td><input type="text" name="titlexx" size="40" /></td>
      </tr>
      <tr>
        <td></td>
        <td>消息内容</td>
        <td><textarea name="note" cols="39" rows="15"></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input style="font-size:10pt" class=button type="submit" value="发送"> &nbsp;&nbsp;&nbsp;   <input class=button style="font-size:10pt" type="reset" value="重写"> &nbsp;&nbsp;&nbsp;   <input class=button style="font-size:10pt" type="reset" value="取消" onClick="javascript:window.close()"></td>
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
$titlexx=$_POST['titlexx'];
$note=$_POST['note'];
}
if ($action=="mail") {
if($checkpower !=super) {
print "<script>alert(\"此功能只有系统管理员才能使用！\");javascript:history.go(-1);</script>";
exit;}
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
function myreaddir($dir) {
        $handle=opendir($dir);
        $i=0;
        while($file=readdir($handle)) {
                if (($file!=".")and($file!="..")) {
                        $list[$i]=$file;
                        $i=$i+1;
                        }
                }
        closedir($handle);
        return $list;
        }
$oldlist=myreaddir($userd);
sort($oldlist);
        $list=$oldlist;
        $posts=count($list);
$dh=opendir("$userd");
	while ($usernamefile=readdir($dh)) {
		if (($usernamefile!=".") && ($usernamefile!="..") && ($usernamefile!="") && strpos($usernamefile,".php")) {
				$usernamei=explode("|",readfrom("$userd$usernamefile"));
				$username_info.="$usernamei[1]";
$book="$mail/".$usernamei[1].".php";
$garray = file($book);
$cog=count($garray);
$larray = explode("|",$garray[0]);
$id=$larray[1]+1;
$zt="new";
$err="<meta http-equiv=refresh content=0;url=../><?exit;?>";
date_default_timezone_set('Asia/Shanghai');$settime=date("Y-m-d G:i:s");
$xinxi=array($err,$id,$settime,$username,$titlexx,$note,$zt,sys);
$newguest = implode("|", $xinxi)."|\r\n";
$f = fopen($book,"r+");
$msg = fread($f,filesize($book));
fclose($f);
$fp=@fopen($book,"w+");
@fwrite($fp,$newguest.$msg);
@fclose($fp);}}
echo "<script>alert(\"消息群发成功！共发送 $posts 份！\");javascript:window.close();</script>";
exit;
}
?>