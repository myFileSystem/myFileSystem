<?
ob_start();
$title="替换文件";
echo"<title>$title /$xtm</title>";
$thisprog="upnew.php";
require ("../globalPages/global.php");
//if(($checkpower!=super)&($checkpower!=high)){
//echo "<script>alert(\"抱歉，您所在的用户组没有该权限！\");javascript:history.go(-1);</script>";
//exit;}
$ID=$_GET["ID"];
$sequence=$ID;
//if(empty($ID)) { echo "<script>alert(\"错误的ID信息！\");javascript:window.close();</script>";exit;}
echo"<title>$xtm/ $title</title>";
print "<tr><td bgcolor=#CBDED8 colspan=3><b>$xtm/ $title</b> </td></tr>";
?>
</td>     <form enctype="multipart/form-data" action="" method="post"> <input type="hidden" name="action" value="edit">
 <td><div align="center">
   <table border="0" cellpadding="3" cellspacing="1" width="100%">
    <tr>
      <td height="45" colspan="2"><div align="center"><font color="#FF6600" face=verdana size=3><b>
        <?=$title?>
      </b></font></div></td>
      </tr>

        <tr>
      <td height="45" bgcolor="#DAEFE1"><div align="right">原截图1(格式)</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<?=$filen?>(<font color="blue"><b><?=$l2[1]?></b></font>)</td>
    </tr>
    <tr>
      <td width="370" height="60" bgcolor="#DAEFE1"><div align="right">替换截图1</div></td>
      <td width="1006" bgcolor="#DAEFE1">&nbsp; <input name="truncation1" size=45 type="file"> <input type="submit" size=450 value="替换" class=button> </td>
    </tr>
    <tr>
    <tr>
      <td height="45" bgcolor="#DAEFE1"><div align="right">原截图2(格式)</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<?=$filen?>(<font color="blue"><b><?=$l2[1]?></b></font>)</td>
    </tr>
    <tr>
      <td width="370" height="60" bgcolor="#DAEFE1"><div align="right">替换截图2</div></td>
      <td width="1006" bgcolor="#DAEFE1">&nbsp; <input name="truncation2" size=45 type="file"> <input type="submit" size=450 value="替换" class=button> </td>
    </tr>
    <tr>
    <tr>
      <td height="45" bgcolor="#DAEFE1"><div align="right">原截图3(格式)</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<?=$filen?>(<font color="blue"><b><?=$l2[1]?></b></font>)</td>
    </tr>
    <tr>
      <td width="370" height="60" bgcolor="#DAEFE1"><div align="right">替换截图3</div></td>
      <td width="1006" bgcolor="#DAEFE1">&nbsp; <input name="truncation3" size=45 type="file"> <input type="submit" size=1000 value="替换" class=button> </td>
    </tr>
    <tr>
    	    <tr>
      <td height="45" bgcolor="#DAEFE1"><div align="right">原截图4(格式)</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<?=$filen?>(<font color="blue"><b><?=$l2[1]?></b></font>)</td>
    </tr>
    <tr>
      <td width="370" height="60" bgcolor="#DAEFE1"><div align="right">替换文件</div></td>
      <td width="5000" bgcolor="#DAEFE1">&nbsp; <input name="truncation4" size=45 type="file"> <input type="submit" width="1000" value="替换" class=button> </td>
    </tr>
    <tr>
    <tr>
      <td height="45" bgcolor="#DAEFE1"><div align="right">原文件(格式)</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<?=$filen?>(<font color="blue"><b><?=$l2[1]?></b></font>)</td>
    </tr>
    <tr>
      <td width="370" height="45" bgcolor="#DAEFE1"><div align="right">替换文件</div></td>
      <td width="1006" bgcolor="#DAEFE1">&nbsp; <input name="software" size=45 type="file"> <input type="submit" value="替换" class=button> </td>
    </tr>
    <tr>
	      <td colspan="6" align="center" bgcolor="#DAEFE1">
	<table border="0" width="100%" id="table1" cellspacing=0>
	  <tr><td  width="27%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15%">
    <td width="85%" colspan="2">
      </table>
</td></table></td>
    </tr>
  </table>
<br>
</form>
</td>
  </tr>
<?
<<<EOD
EOD;


$upload_pic1=$_FILES['truncation1']['tmp_name'];
$upload_pic1_name=$_FILES['truncation1']['name'];
$upload_pic1_size=$_FILES['truncation1']['size'];
$upload_pic2=$_FILES['truncation2']['tmp_name'];
$upload_pic2_name=$_FILES['truncation2']['name'];
$upload_pic2_size=$_FILES['truncation2']['size'];
$upload_pic3=$_FILES['truncation3']['tmp_name'];
$upload_pic3_name=$_FILES['truncation3']['name'];
$upload_pic3_size=$_FILES['truncation3']['size'];
$upload_pic4=$_FILES['truncation4']['tmp_name'];
$upload_pic4_name=$_FILES['truncation4']['name'];
$upload_pic4_size=$_FILES['truncation4']['size'];
$upload_file=$_FILES['software']['tmp_name'];
$upload_file_name=$_FILES['software']['name'];
$upload_file_size=$_FILES['software']['size'];

if($upload_pic1){
$file_size_max = 10000*10000;
$store_dir = "$file/$sequence/$pic1path/";
$accept_overwrite = 1;
if ($upload_pic1_size > $file_size_max) {
echo "抱歉，您的截图1太大";
exit;
}
	$conn = mysql_connect("localhost","root","squall");
	mysql_select_db("app",$conn);
		if (!$conn)
	  {
	  	die ('could not connect :' . mysql_error());
	  	}
	 mysql_query("UPDATE app SET truncation1='$upload_pic1' WHERE sequence='$sequence'");
mysql_close($conn);
echo "<script>alert(\"替换文件成功！\");javascript:window.close();</script>";exit;
}
if($upload_pic2){
$file_size_max = 10000*1000;
$store_dir = "$file/$sequence/$pic2path/";
$accept_overwrite = 1;
if ($upload_pic2_size > $file_size_max) {
echo "抱歉，您的截图2太大";
exit;
}
	$conn = mysql_connect("localhost","root","squall");
	mysql_select_db("app",$conn);
		if (!$conn)
	  {
	  	die ('could not connect :' . mysql_error());
	  	}
	 mysql_query("UPDATE app SET truncation2='$upload_pic2' WHERE sequence='$sequence'");
mysql_close($conn);

@fclose($fp);
echo "<script>alert(\"替换文件成功！\");javascript:window.close();</script>";exit;
}
if($upload_pic3){
$file_size_max = 10000*1000;
$store_dir = "$file/$sequence/$pic3path/";
$accept_overwrite = 1;
if ($upload_pic3_size > $file_size_max) {
echo "抱歉，您的截图3太大";
exit;
}
	$conn = mysql_connect("localhost","root","squall");
	mysql_select_db("app",$conn);
		if (!$conn)
	  {
	  	die ('could not connect :' . mysql_error());
	  	}
	 mysql_query("UPDATE app SET truncation3='$upload_pic3' WHERE sequence='$sequence'");
mysql_close($conn);
@fclose($fp);
echo "<script>alert(\"替换文件成功！\");javascript:window.close();</script>";exit;
}
if($upload_pic4){
$file_size_max = 10000*1000;
$store_dir = "$file/$sequence/$pic4path/";
$accept_overwrite = 1;
if ($upload_pic4_size > $file_size_max) {
echo "抱歉，您的截图4太大";
exit;
}
	$conn = mysql_connect("localhost","root","squall");
	mysql_select_db("app",$conn);
		if (!$conn)
	  {
	  	die ('could not connect :' . mysql_error());
	  	}
	 mysql_query("UPDATE app SET truncation4='$upload_pic4' WHERE sequence='$sequence'");
mysql_close($conn);
@fclose($fp);
echo "<script>alert(\"替换文件成功！\");javascript:window.close();</script>";exit;

}
if($upload_file){
$file_size_max = 100000*100000;
$store_dir = "$file/$sequence/$filepath/";
$accept_overwrite = 1;
if ($upload_file_size > $file_size_max) {
echo "抱歉，您的文件太大";
exit;
}
	$conn = mysql_connect("localhost","root","squall");
	mysql_select_db("app",$conn);
		if (!$conn)
	  {
	  	die ('could not connect :' . mysql_error());
	  	}
	 mysql_query("UPDATE app SET software='$upload_file' WHERE sequence='$sequence'");
mysql_close($conn);
@fclose($fp);
echo "<script>alert(\"替换文件成功！\");javascript:window.close();</script>";exit;
}





?>