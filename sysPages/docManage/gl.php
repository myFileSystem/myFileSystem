<?
$title="�ļ�����";
$thisprog="gl.php";
require ("../globalPages/global.php");
echo"<title>$title /$xtm</title>";
//if(($checkpower!=super)&($checkpower!=high)){
//echo "<script>alert(\"��Ǹ�������ڵ��û���û�и�Ȩ�ޣ�\");javascript:history.go(-1);</script>";
//exit;}
print "<tr><td bgcolor=#CBDED8 colspan=3><b>$xtm/ $title</b> </td></tr>";



extract($_POST);
if($_POST['ac']=="t")
{
    $page=$_POST['page'];
	}
	else $page=$_GET['page'];
if (empty($page)) $page=1;
if ($page <1)  $page=1;
settype($page, integer);
$perpage=10;
if($_POST['ac']=="t")
{
    $page=$_POST['page'];
	$name=$_POST['name'];
	$id=$_POST['id'];
	$url=$_POST['url'];
	$discription=$_POST['discription'];//����
	$bt=$_POST['bt'];//����
	$qx=$_POST['qx'];//����Ȩ��
	$ml=$_POST['ml'];//��������
	$categoryName=$_POST['categoryName'];
	$author=$_POST['author'];
	$price=$_POST['price'];
	$icon=$_POST['icon'];
	$download=$_POST['download'];
}
if ($actions=="edit")  {
function safe_convert($s) {
        $s=str_replace("|","��",$s);
        $s=str_replace("<","&lt;",$s);
        $s=str_replace(">","&gt;",$s);
        $s=str_replace("\r","",$s);
        $s=str_replace("\t","",$s);
        $s=str_replace("\n","<br>",$s);
        $s=str_replace(" ","&nbsp;",$s);
        return $s; }
 $discription=trim($discription);
 $discription=safe_convert($discription);
 $name=trim($name);
 $name=safe_convert($name);
 $qx=trim($qx);
 $qx=safe_convert($qx);
 $ml=trim($ml);
 $ml=safe_convert($ml);
 $categoryName=trim($categoryName);
 $categoryName=safe_convert($categoryName);
 $author=trim($author);
 $author=safe_convert($author);
 $price=trim($price);
 $price=safe_convert($price);
 $icon=trim($icon);
 $icon=safe_convert($icon);
 $download=trim($download);
 $download=safe_convert($download);
if($bt=="")
{
echo "<script>alert(\"���ⲻ��Ϊ�գ�\");javascript:history.go(-1);</script>";
exit();
}
if($ms=="")
{
echo "<script>alert(\"�ļ���������Ϊ�գ�\");javascript:history.go(-1);</script>";
exit();
}
if(strlen($ms)>200){
echo "<script>alert(\"�ļ�����̫����\");javascript:history.go(-1);</script>";
exit();
}
if($qx=="")
{
echo "<script>alert(\"������ѡ�����Ȩ�ޣ�лл��\");javascript:history.go(-1);</script>";
exit();
}
if($ml=="")
{
echo "<script>alert(\"��������д�������࣡\");javascript:history.go(-1);</script>";
exit();
}
if($categoryName=="")
{
echo "<script>alert(\"��������д���ͣ�\");javascript:history.go(-1);</script>";
exit();
}
if($author=="")
{
echo "<script>alert(\"��������д���ߣ�\");javascript:history.go(-1);</script>";
exit();
}
if($price=="")
{
echo "<script>alert(\"��������д�۸�\");javascript:history.go(-1);</script>";
exit();
}
if($icon=="")
{
echo "<script>alert(\"��������д���ӣ�\");javascript:history.go(-1);</script>";
exit();
}
if($download=="")
{
echo "<script>alert(\"��������д����·����\");javascript:history.go(-1);</script>";
exit();
}
	$conn = mysql_connect("localhost","root","2571151");
	mysql_select_db("app",$conn);
		if (!$conn)
	  {
	  	die ('could not connect :' . mysql_error());
	  	}

$book=$q;
$garray=@file($book);
$cog=count($garray);
$fp=@fopen($book,"w+");
for($i=0;$i<$cog;$i++){
$larray = explode("|",$garray[$i]);
$err="<meta http-equiv=refresh content=0;url=../><?exit;?>";
$settime=date("Y-m-d");
if(!($id==$larray[1])){@fwrite($fp,$garray[$i]);}
else{
$xinxi=array($err,$id,$url,$bt,$ms,$categoryName,$author,$price,$icon,$download,$username,$qx,$ml,$larray[14],$larray[15],$larray[16]);
$garray[$i] = implode("|", $xinxi)."|\r\n";
@fwrite($fp,$garray[$i]);
}
	$conn = mysql_connect("localhost","root","2571151");
	mysql_select_db("app",$conn);
		if (!$conn)
	  {
	  	die ('could not connect :' . mysql_error());
	  	}
	 mysql_query("UPDATE app SET categoryName='$categoryName',author='$author',price='$price',icon='$icon',download='$download',username='$username' WHERE sequence='$sequence'");
mysql_close($conn);
}
@fclose($fp);
echo "<script>alert(\"�޸ĳɹ���\");</script><meta http-equiv=refresh content=0;url=$thisprog>";
exit;
}
$id=$_GET['id'];
if ($_REQUEST[id])  {
$book="mydata/wj.dat";
$garray=@file($book);
$cog=count($garray);
$fp=@fopen($book,"w+");
for($i=0;$i<$cog;$i++){
$larray = explode("|",$garray[$i]); //ɾ������
if($id==$larray[1]){
if(file_exists("$file$larray[2]")) unlink("$file$larray[2]");
}
if(!($id==$larray[1])){
@fwrite($fp,$garray[$i]);}
}
$sequence= $id;
	$conn = mysql_connect("localhost","root","2571151");
	mysql_select_db("app",$conn);
		if (!$conn)
	  {
	  	die ('could not connect :' . mysql_error());
	  	}
	 mysql_query("Delete app WHERE sequence='$sequence'");
mysql_close($conn);
@fclose($fp);
echo "<script>alert(\"ɾ���ɹ���\");</script><meta http-equiv=refresh content=0;url=$thisprog>";
exit;}
?><script language=JavaScript>
function callml() {    window.open('mlm.php','callwrite','top=100,left=300,width=200,height=400,status=no,resizable=yes,scrollbars=no')
}</script><center><table width="98%">
       <tr>
<td height="30" colspan="11" bgcolor="#FFFFFF"><div align="center"><font color="#FF6600" size="3" face="verdana"><b><?=$title?></b></font>&nbsp;&nbsp;&nbsp;<a href="ml.php">�������</a> &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="window.open ('upfile.php','','top=0,right=0,width=750,height=323,status=no,resizable=yes,scrollbars=yes');">�ϴ��ļ�</a> &nbsp;&nbsp;&nbsp;<a href="javascript:history.go(0)">ˢ��</a></div></td>
      </tr>
       <tr>
         <td height="30" colspan="11" bgcolor="#FFFFFF"><table width="100%" border="0">
           <tr>
            <tr>
    <td width="12%" height="24" bgcolor="#DAEFE1"><div align="center"><strong>����</strong></div></td>
    <td width="18%" bgcolor="#DAEFE1"><div align="center"><strong>����</strong></div></td>
    <td width="6%" bgcolor="#DAEFE1"><div align="center"><strong>����</strong></div></td>
    <td width="6%" bgcolor="#DAEFE1"><div align="center"><strong>����</strong></div></td>
    <td width="6%" bgcolor="#DAEFE1"><div align="center"><strong>�۸�</strong></div></td>
    <td width="6%" bgcolor="#DAEFE1"><div align="center"><strong>����</strong></div></td>
    <td width="6%" bgcolor="#DAEFE1"><div align="center"><strong>����·��</strong></div></td>
    <td width="12%" bgcolor="#DAEFE1"><div align="center"><strong>����Ȩ��</strong></div></td>
    <td width="6%" bgcolor="#DAEFE1"><div align="center"><strong>�滻�ļ�</strong></div></td>
    <td width="12%" bgcolor="#DAEFE1"><div align="center"><strong>��������</strong></div></td>
    <td width="10%" bgcolor="#DAEFE1"><div align="center"><strong>����</strong></div></td>
      </tr>
           </tr>
         </table></td>
       </tr>
    <tr>
      <td colspan="5" bgcolor="#DAEFE1">
<?

$conn = mysql_connect("localhost","root","2571151");
	mysql_select_db("app",$conn);
		if (!$conn)
	  {
	  	die ('could not connect :' . mysql_error());
	  	}

	$q = "SELECT * FROM app";
	mysql_query("SET NAMES gb2312");
	$rs = mysql_query($q,$conn);
	if(!$rs){
		die("Valid result!");}
		echo "<table>";
		echo "<tr><td>name</td><td>sequence</td><td>size</td><td>discription</td><td>time</td><td>categoryName</td><td>author</td><td>price</td><td>icon</td><td>download</td><td>truncation1</td><td>truncation2</td><td>truncation3</td><td>truncation4</td><td>software</td></tr>";
		while($row = mysql_fetch_row($rs))echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td><td><IMG SRC='$row[10]'/></td><td><IMG SRC='$row[11]'/></td><td><IMG SRC='$row[12]'/></td><td><IMG SRC='$row[13]'/></td><td><input type='image' src ='$row[14]' onclick='software()'/></a></td></tr>";
		echo "<table>";
		mysql_free_result($rs);
		mysql_close($conn);



if (file_exists("mydata/wj.dat"))
{
$message_list=@file("mydata/wj.dat");
$countnum=count($message_list);
$list_soft='';
$count=$countnum;
if($count!=0){
 if ($count%$perpage==0) $maxpageno=$count/$perpage;
		else $maxpageno=floor($count/$perpage)+1;
	if ($page>$maxpageno) $page=$maxpageno;
	$pagemin=min( ($page-1)*$perpage , $count-1);
	$pagemax=min( $pagemin+$perpage-1, $count-1);
	for ($i=$pagemin; $i<=$pagemax; $i++) {
$message_list=@file("mydata/wj.dat");
$detail=explode("|",$message_list[$i]);
        $detail[4]=str_replace("��","|",$detail[4]);
        $detail[4]=str_replace("&lt;","<",$detail[4]);
        $detail[4]=str_replace("&gt;",">",$detail[4]);
        $detail[4]=str_replace("","\r",$detail[4]);
        $detail[4]=str_replace("","\t",$detail[4]);
        $detail[4]=str_replace("<br>","\n",$detail[4]);
        $detail[4]=str_replace("&nbsp;"," ",$detail[4]);
?><table width="100%" cellpadding="3">
   <tr>
    <form method="post" action="" name="Action" id=Action>
       <td width="200" bgcolor="#DAEFE1"><div align="center">
         <input type="text" size="10" name="name" title="����д����Ƭ�ı���"/>
       </div></td>
      <td width="200" bgcolor="#DAEFE1"><div align="center">
        <textarea rows="3" cols="25" title="��д���ڴ��ļ�������˵����������200�ַ�"" name="discription"><?=$detail[4]?>
      </textarea></td>
       <td width="1" bgcolor="#DAEFE1"><div align="center">
         <input type="text" size="5" name="categoryName">
          </textarea></td>
       <td width="200" bgcolor="#DAEFE1"><div align="center">
         <input type="text" size="5" name="author">
          </textarea></td>
       <td width="200" bgcolor="#DAEFE1"><div align="center">
         <input type="text" size="5" name="price">
          </textarea></td>
       <td width="200" bgcolor="#DAEFE1"><div align="center">
         <input type="text" size="5" name="icon">
          </textarea></td>
       <td width="300" bgcolor="#DAEFE1"><div align="center">
         <input type="text" size="5" name="download">
          </textarea></td>

    <td width="400" bgcolor="#DAEFE1"><div align="center">��ǰΪ<font color="#3300FF">
        <? if($detail[9]==all){ echo"�����û�";}else if($detail[9]==high) echo"�߼�"; else echo"$detail[9]";?>
        </font> ����Ϊ
        <select name="qx"><option value=all>�����û�</option><option value=high>�߼�</option>



<?
$dh=opendir("$userd");
while ($usefile=readdir($dh)) {
if (($usefile!=".") && ($usefile!="..") && ($usefile!="") && strpos($usefile,".php")) {
$usei=explode("|",readfrom("$userd$usefile"));
$use_info.="$usei[1]";
echo"<option value=$usei[1]>$usei[1][$usei[7]]</option>";
}}
?>
</select>
    </div></td>
	<td width="600" bgcolor="#DAEFE1"><div align="center"><a href="javascript:void(0)" onClick="window.open ('upnew.php?ID=<?=$detail[1]?>','','top=0,left=0,width=1000,height=1000,status=no,resizable=yes,scrollbars=yes');">�滻</a></div></td>
	<td width="1000" bgcolor="#DAEFE1"><input type="text" size="3" name="ml" value="<?=$detail[10]?>" title="�����ڱ��Ϊ <?=$detail[10]?> �ķ���"/>&nbsp;<A href="javascript: callml()">�鿴Ŀ¼</A></td><td width="244" bgcolor="#DAEFE1"><div align="center">
	  <input type="button" value="�鿴"  title="<?=$detail[7]?>" class=button  onClick="window.open ('down.php?ID=<?=$detail[1]?>','','top=0,left=0,width=900,height=363,status=no,resizable=yes,scrollbars=yes');">
	<input type="submit" value="�޸�" class=button name="submit">
	<?	if (file_exists("$file$detail[2]"))
{ echo"<input type=button value=ɾ�� class=button onclick=\"javascript:window.location.href='?id=$detail[1]'\">";
}else echo"<input type=button value=*���* class=button onclick=\"javascript:window.location.href='?id=$detail[1]'\">";?>

	  </div></td></form>
  </tr>
</table>

<?
}
}}else {echo "<br><center><font color=blue>�����ļ�";}
include"mydata/page.php";
?></tr>
  </table>
