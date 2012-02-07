<? 
$title="删除个人消息";
$id=$_GET['id'];
$thisprog="delmail.php?id=$id";
require("global.php");
echo"<title>$title /$xtm</title>";
$book=$mail."/".$username.".php";
$garray=@file($book);
$cog=count($garray);
$fp=@fopen($book,"w+");
for($i=0;$i<$cog;$i++){
$larray = explode("|",$garray[$i]);
if(!($id==$larray[1])){@fwrite($fp,$garray[$i]);}
}
@fclose($fp);
print "<tr><td bgcolor=#CBDED8 colspan=3><font color=black>
    <b>$xtm/ $title</b>    </td></tr>";
	echo "<script>alert(\"删除信息成功！\");</script><meta http-equiv=refresh content=0;url=sitemail.php>";
exit;
?>