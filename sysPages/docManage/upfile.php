<?
$thisprog="upfile.php";
$title="上传文件";
require("../globalPages/global.php");
//if(($checkpower!=super)&($checkpower!=high)){
//echo "<script>alert(\"抱歉，您所在的用户组没有该权限！\");javascript:window.close();</script>";
//exit;}
echo"<title>$title /$xtm</title>";
print "<tr><td bgcolor=#CBDED8 colspan=3><b>$xtm/ $title</b> </td></tr>";
$uptypes=array('image/jpg', 'image/jpeg', 'image/png', 'image/pjpeg', 'image/gif', 'image/bmp', 'image/x-png', 'application/octet-stream', 'application/msword', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint');
$max_pic_size=20000000;   //图片上传文件大小限制, 单位BYTE
$max_file_size=100000000;   //安装包上传文件大小限制, 单位BYTE
$path_parts=pathinfo($_SERVER['PHP_SELF']); //取得当前路径
$destination_folder="$file"; //上传文件路径
$pic1path = "truncation1/";
$pic2path = "truncation2/";
$pic3path = "truncation3/";
$pic4path = "truncation4/";
$filepath = "software/";

$path1 = "$destination_folder/$sequence/$pic1path";
$path2 = "$destination_folder/$sequence/$pic2path";
$path3 = "$destination_folder/$sequence/$pic3path";
$path4= "$destination_folder/$sequence/$pic4path";
$path5="$destination_folder/$sequence/$filepath"
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body>


<center><form enctype="multipart/form-data" method="post" name="upform" action="<?=$thisprog?>"><input type="hidden" name="ac" value="t">
  <table border="0" cellpadding="3" cellspacing="1" width="100%">
    <tr>
      <td colspan="5" bgcolor="#DAEFE1"><div align="center"><font color="#FF6600" face=verdana size=3>
   <b> 上传文件</b></font></div></td>
    </tr>
    <tr>
    	<td bgcolor="#DAEFE1"><div align="right">文件名</div></td>
    	<td width="1099" bgcolor="#DAEFE1">&nbsp;<input type="varchar(20)" name="name" size="50" maxlength="60">
      <font color="#FF0000">(60字符)</font> </td>
   </tr>
    <tr>
    	<td bgcolor="#DAEFE1"><div align="right">序号</div></td>
    	<td width="1099" bgcolor="#DAEFE1">&nbsp;<input type="int(10)" name="sequence" size="50" maxlength="60">
      <font color="#FF0000">(60字符)</font> </td>
   </tr>
 <tr>
      <td width="260" height="45" bgcolor="#DAEFE1"><div align="right">文字描述</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<textarea name="discription" rows="3" cols="48"></textarea>
      <font color="#FF0000">(200字符)</font></td>
    </tr>
    <tr>
    	<td bgcolor="#DAEFE1"><div align="right">版本</div></td>
    	<td width="1099" bgcolor="#DAEFE1">&nbsp;<input type="varchar(20)" name="version" size="50" maxlength="60">
      <font color="#FF0000">(60字符)</font> </td>
   </tr>
    <tr>
    	<td bgcolor="#DAEFE1"><div align="right">类型</div></td>
    	<td width="1099" bgcolor="#DAEFE1">&nbsp;<input type="varchar(20)" name="categoryName" size="50" maxlength="60">
      <font color="#FF0000">(60字符)</font> </td>
   </tr>
    <tr>
    	<td bgcolor="#DAEFE1"><div align="right">作者</div></td>
    	<td width="1099" bgcolor="#DAEFE1">&nbsp;<input type="varchar(20)" name="author" size="50" maxlength="60">
      <font color="#FF0000">(60字符)</font> </td>
   </tr>
    <tr>
      <td bgcolor="#DAEFE1"><div align="right">价格</div></td>
      <td width="1099" bgcolor="#DAEFE1">&nbsp;<input type="int(10)" name="price" size="50" maxlength="60">
        <font color="#FF0000">(60字符)</font> </td>
    </tr>
    <tr>
      <td bgcolor="#DAEFE1"><div align="right">链接</div></td>
      <td width="1099" bgcolor="#DAEFE1">&nbsp;<input type="varchar(20)" name="icon" size="50" maxlength="60">
        <font color="#FF0000">(60字符)</font> </td>
    </tr>
    <tr>
      <td bgcolor="#DAEFE1"><div align="right">下载路径</div></td>
      <td width="1099" bgcolor="#DAEFE1">&nbsp;<input type="varchar(20)" name="download" size="50" maxlength="60">
        <font color="#FF0000">(60字符)</font> </td>
    </tr>
    <tr>
      <td height="45" bgcolor="#DAEFE1"><div align="right">访问权限</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<select name="qx"><option value=all>所有用户</option><option value=high>高级用户</option>

<?
$dh=opendir("$userd");
while ($usefile=readdir($dh)) {
if (($usefile!=".") && ($usefile!="..") && ($usefile!="") && strpos($usefile,".php")) {
$usei=explode("|",readfrom("$userd$usefile"));
$use_info.="$usei[1]";
echo"<option value=$usei[1]>$usei[1][$usei[7]]</option>";
}}
?>
</select>  </td>
    </tr>
    <tr>
      <td height="45" bgcolor="#DAEFE1"><div align="right">所属分类</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<select name="ml">
      <?

if (empty($page)) $page=1;
if ($page <1)  $page=1;
settype($page, integer);
$perpage=1000;
if (file_exists("mydata/ml.dat"))
{
$message_list=@file("mydata/ml.dat");
$countnum=count($message_list);
$count=$countnum;
if($count!=""){
 if ($count%$perpage==0) $maxpageno=$count/$perpage;
		else $maxpageno=floor($count/$perpage)+1;
	if ($page>$maxpageno) $page=$maxpageno;
	$pagemin=min( ($page-1)*$perpage , $count-1);
	$pagemax=min( $pagemin+$perpage-1, $count-1);
	for ($i=$pagemin; $i<=$pagemax; $i++) {
	 $detail=explode("|",$message_list[$i]);

?>
        <option value="<?=$detail[1]?>"><?=$detail[2]?></option>
<? }}}?>

    </select></td>
    </tr>
    <tr>
      <td height="45" bgcolor="#DAEFE1"><div align="right">截图1</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<input style="width:350;border:1 solid #9a9999; font-size:9pt; background-color:#ffffff; height:18" size="45" name=truncation1 type=file onChange="javascript:FileChange(this.value);"></td>
    </tr>
      <td height="45" bgcolor="#DAEFE1"><div align="right">截图2</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<input style="width:350;border:1 solid #9a9999; font-size:9pt; background-color:#ffffff; height:18" size="45" name=truncation2 type=file onChange="javascript:FileChange(this.value);"></td>
    </tr>
      <td height="45" bgcolor="#DAEFE1"><div align="right">截图3</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<input style="width:350;border:1 solid #9a9999; font-size:9pt; background-color:#ffffff; height:18" size="45" name=truncation3 type=file onChange="javascript:FileChange(this.value);"></td>
    </tr>
      <td height="45" bgcolor="#DAEFE1"><div align="right">截图4</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<input style="width:350;border:1 solid #9a9999; font-size:9pt; background-color:#ffffff; height:18" size="45" name=truncation4 type=file onChange="javascript:FileChange(this.value);"></td>
    </tr>

    <tr>
      <td height="45" bgcolor="#DAEFE1"><div align="right">文件</div></td>
      <td bgcolor="#DAEFE1">&nbsp;<input style="width:350;border:1 solid #9a9999; font-size:9pt; background-color:#ffffff; height:18" size="45" name=software type=file onChange="javascript:FileChange(this.value);">        <input name="submit" type="submit" style="width:40;border:1 solid #9a9999; font-size:9pt; background-color:#ffffff; height:18" value="上传" size="17"></td>
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
<?php
$upload_pic1_temp = $_FILES['truncation1']['tmp_name'];
$upload_pic1_name = $_FILES['truncation1']['name'];
$upload_pic1_size = $_FILES['truncation1']['size'];

$upload_pic2_temp = $_FILES['truncation2']['tmp_name'];
$upload_pic2_name = $_FILES['truncation2']['name'];
$upload_pic2_size = $_FILES['truncation2']['size'];

$upload_pic3_temp = $_FILES['truncation3']['tmp_name'];
$upload_pic3_name = $_FILES['truncation3']['name'];
$upload_pic3_size = $_FILES['truncation3']['size'];

$upload_pic4_temp = $_FILES['truncation4']['tmp_name'];
$upload_pic4_name = $_FILES['truncation4']['name'];
$upload_pic4_size = $_FILES['truncation4']['size'];

$upload_software_temp = $_FILES['software']['tmp_name'];
$upload_software_name = $_FILES['software']['name'];
$upload_software_size = $_FILES['software']['size'];

if ($_POST['ac']=='t'){
$name = $_POST["name"];
$sequence = $_POST["sequence"];
$size = $_FILES['software']['size'];
$discription = $_POST["discription"];
$version = $_POST["version"];
$time = $_POST["time"];
$categoryName = $_POST["categoryName"];
$author = $_POST["author"];
$price = $_POST["price"];
$icon = $_POST["icon"];
$download = $_POST["download"];
$qx=$_POST['qx'];
$ml=$_POST['ml'];
$truncation1 = $store_dir . $upload_pic1_name;
$truncation2 = $store_dir . $upload_pic2_name;
$truncation3 = $store_dir . $upload_pic3_name;
$truncation4 = $store_dir . $upload_pic4_name;
$software = $store_dir . $upload_software_name;

if($name=="")
{
echo "<script>alert(\"文件名不能为空！\");javascript:history.go(-1);</script>";
exit();
}
if($sequence=="")
{
echo "<script>alert(\"序号不能为空！\");javascript:history.go(-1);</script>";
exit();
}
if($discription=="")
{
echo "<script>alert(\"文字描述不能为空！\");javascript:history.go(-1);</script>";
exit();
}
if(strlen($discription)>200){
echo "<script>alert(\"文字描述太长！\");javascript:history.go(-1);</script>";
exit();
}
if($categoryName=="")
{
echo "<script>alert(\"类型不能为空！\");javascript:history.go(-1);</script>";
exit();
}
if($author=="")
{
echo "<script>alert(\"作者不能为空！\");javascript:history.go(-1);</script>";
exit();
}
if($price=="")
{
echo "<script>alert(\"价格不能为空！\");javascript:history.go(-1);</script>";
exit();
}
if($icon=="")
{
echo "<script>alert(\"链接不能为空！\");javascript:history.go(-1);</script>";
exit();
}

if($ml=="")
{
echo "<script>alert(\"请选择归属分类！\");javascript:history.go(-1);</script>";
exit();
}

if($_FILES["software"]["size"] == 0)
{
echo "<script>alert(\"安装包不能为空！\");javascript:history.go(-1);</script>";
exit();
}
}

$conn = mysql_connect("localhost", "root", "squall");
mysql_select_db("app", $conn);
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_query("set names gb2312");
mysql_select_db("app", $conn);
$search="select * from app where sequence='$sequence'";
$sql = "replace INTO app (name, sequence, size, discription, version, time, categoryName, author, price, icon, download, truncation1, truncation2, truncation3, truncation4, software)
	VALUES
	('$name','$sequence','$size','$discription','$version',NOW(),'$categoryName','$author','$price','$icon','$download','$truncation1','$truncation2','$truncation3','$truncation4','$software')";

mysql_query($sql);


mysql_close($conn);

function safe_convert($s) {
        $s=str_replace("|","│",$s);
        $s=str_replace("<","&lt;",$s);
        $s=str_replace(">","&gt;",$s);
        $s=str_replace("\r","",$s);
        $s=str_replace("\t","",$s);
        $s=str_replace("\n","<br>",$s);
        $s=str_replace(" ","&nbsp;",$s);
        return $s;          }
$picbt=trim($picbt);
$picbt=safe_convert($picbt);
$picsm=trim($picsm);
$picsm=safe_convert($picsm);
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
if (!is_uploaded_file($_FILES["software"][tmp_name]))
{
echo "<script>alert(\"文件不存在！\");javascript:history.go(-1);</script>";
exit;
}
$file1 = $_FILES["truncation1"];
$file2 = $_FILES["truncation2"];
$file3 = $_FILES["truncation3"];
$file4 = $_FILES["truncation4"];
$file = $_FILES["software"];
 if($max_pic_size < $file1["size"])
 {
 echo "<script>alert(\"截图1太大，超过10M！\");javascript:history.go(-1);</script>";
 exit;
  }
 if($max_pic_size < $file2["size"])
 {
 echo "<script>alert(\"截图2太大，超过10M！\");javascript:history.go(-1);</script>";
 exit;
  }
 if($max_pic_size < $file3["size"])
 {
 echo "<script>alert(\"截图3太大，超过10M！\");javascript:history.go(-1);</script>";
 exit;
  }
  if($max_pic_size < $file4["size"])
 {
 echo "<script>alert(\"截图4太大，超过10M！\");javascript:history.go(-1);</script>";
 exit;
  }
 if($max_file_size < $file["size"])
 {
 echo "<script>alert(\"文件安装包太大，超过100M！\");javascript:history.go(-1);</script>";
 exit;
  }
if(!in_array($file1["type"], $uptypes))
{
 echo "<script>alert(\"截图1类型不允许！\");javascript:history.go(-1);</script>";
 exit;
}
if(!in_array($file2["type"], $uptypes))
{
 echo "<script>alert(\"截图2类型不允许！\");javascript:history.go(-1);</script>";
 exit;
}
if(!in_array($file3["type"], $uptypes))
{
 echo "<script>alert(\"截图3类型不允许！\");javascript:history.go(-1);</script>";
 exit;
}
if(!in_array($file4["type"], $uptypes))
{
 echo "<script>alert(\"截图4类型不允许！\");javascript:history.go(-1);</script>";
 exit;
}
if(!file_exists("$destination_folder/$sequence"))
mkdir("$destination_folder/$sequence");
$filename1=$file1["tmp_name"];
$image_size1 = getimagesize($filename);
$pinfo1=pathinfo($file1["name"]);
$ftype1=$pinfo[extension];
$destination1 = $destination_folder.time().".".$ftype1;
$filename2=$file2["tmp_name"];
$image_size2 = getimagesize($filename);
$pinfo2=pathinfo($file2["name"]);
$ftype2=$pinfo[extension];
$destination2 = $destination_folder.time().".".$ftype2;
$filename3=$file3["tmp_name"];
$image_size3 = getimagesize($filename);
$pinfo3=pathinfo($file3["name"]);
$ftype3=$pinfo[extension];
$destination3 = $destination_folder.time().".".$ftype3;
$filename4=$file4["tmp_name"];
$image_size4 = getimagesize($filename);
$pinfo4=pathinfo($file4["name"]);
$ftype4=$pinfo[extension];
$destination4 = $destination_folder.time().".".$ftype4;
$filename=$file["tmp_name"];
$image_size = getimagesize($filename);
$pinfo=pathinfo($file["name"]);
$ftype=$pinfo[extension];
$destination = $destination_folder.time().".".$ftype;
?>
<?php

 function deldir($dir)
{
  $dh=opendir($dir);
  while ($file=readdir($dh))
 {
    if($file!="." && $file!="..")
    {
      $fullpath=$dir."/".$file;
      if(!is_dir($fullpath))
      {unlink($fullpath); }
      else { deldir($fullpath);}
     }
  }

  closedir($dh);

  if(rmdir($dir))
   { return true;}
  else
   { return false;}

}
?>

<?
if(!file_exists("$destination_folder/$sequence/$pic1path"))
mkdir("$destination_folder/$sequence/$pic1path");
else {delDir($path1);mkdir($path1);}
if(!file_exists("$destination_folder/$sequence/$pic2path"))
mkdir("$destination_folder/$sequence/$pic2path");
 else {delDir($path2);mkdir($path2);}
if(!file_exists("$destination_folder/$sequence/$pic3path"))
mkdir("$destination_folder/$sequence/$pic3path");
else {delDir($path3);mkdir($path3);}
if(!file_exists("$destination_folder/$sequence/$pic4path"))
mkdir("$destination_folder/$sequence/$pic4path");
else {delDir($path4);mkdir($path4);}
if(!file_exists("$destination_folder/$sequence/$filepath"))
mkdir("$destination_folder/$sequence/$filepath");
else {delDir($path5);mkdir($path5);}

if (file_exists($destination) && $overwrite != true)
{
echo "<script>alert(\"文件不存在！\");javascript:history.go(-1);</script>";
exit;
}

move_uploaded_file($_FILES["truncation1"]["tmp_name"],
"$destination_folder/$sequence/$pic1path" . $_FILES["truncation1"]["name"]);
echo "Stored truncation1 in: " . "$destination_folder/$sequence/$pic1path" . $_FILES["truncation1"]["name"]. "<br />";
move_uploaded_file($_FILES["truncation2"]["tmp_name"],
"$destination_folder/$sequence/$pic2path" . $_FILES["truncation2"]["name"]);
echo "Stored truncation2 in: " . "$destination_folder/$sequence/$pic2path" . $_FILES["truncation2"]["name"]. "<br />";

move_uploaded_file($_FILES["truncation3"]["tmp_name"],
"$destination_folder/$sequence/$pic3path" . $_FILES["truncation3"]["name"]);
echo "Stored truncation3 in: " . "$destination_folder/$sequence/$pic3path" . $_FILES["truncation3"]["name"]. "<br />";

move_uploaded_file($_FILES["truncation4"]["tmp_name"],
"$destination_folder/$sequence/$pic4path" . $_FILES["truncation4"]["name"]);
echo "Stored truncation4 in: " . "$destination_folder/$sequence/$pic4path" . $_FILES["truncation4"]["name"]. "<br />";

move_uploaded_file($_FILES["software"]["tmp_name"],
"$destination_folder/$sequence/$filepath" . $_FILES["software"]["name"]);
echo "Stored software in: " . "$destination_folder/$sequence/$filepath" . $_FILES["software"]["name"]. "<br />";


echo "<script>alert(\"上传成功！请刷新文件列表\");</script><meta http-equiv=refresh content=0;url=\"upfile.php\">";
}
?>