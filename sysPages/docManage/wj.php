<?
$thisprog = "wj.php";
$title = "文件列表";
require ("../globalPages/global.php");
echo "<title>$title/$xtm</title>";
$page = $_GET['page'];

$pid = $_GET['pid'];
$page = $_POST['page'];
if (empty ($page))
	$page = 1;
if ($page < 1)
	$page = 1;
settype($page, integer);
$perpage = 10;

print "<tr><td bgcolor=#CBDED8 colspan=3><b>$xtm/ $title</b> </td></tr>";

session_start();
?>

<center>
<table  cellSpacing="0" cellPadding="0" width="95%" align="center" border="0" height="193">
    <tr>
    <td width="95%" height="31" colspan="7"><div align="center"><font color="#FF6600" size="4" face="verdana"><strong><?=$title?></strong></font> &nbsp;&nbsp;<a href="javascript:history.go(0)">刷新</a></div></td>
  <tr>
    <td vAlign="top" height="53"><br>
      <div align="center"><a href="<?=$thisprog?>">全部</a>&nbsp;&nbsp;&nbsp;
        <?

$classs = "";
$list = file("mydata/ml.dat");
$count = count($list) - 1;
for ($i = 0; $i <= $count; $i++) {
	$list_info = explode("|", $list[$i]);
	$classs .= "<a href=\"?pid=$list_info[1]\"><b>$list_info[2]</b></a>&nbsp;&nbsp;&nbsp;";
}
echo "$classs";
?>
          </div>
  <tr>
<td class="2" width="100%" valign="top" height="64">
<table class="leasin" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#DAEFE1" height="20">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr bgcolor="#DAEFE1">
             <td align=center width="10%" height="5" bgcolor="#DAEFE1"><font size="2"><strong> &nbsp;文件 </strong></font></td>
             <td align=center width="4%" bgcolor="#DAEFE1"><font size="2"><strong>序号</strong></font></td>
             <td align=center width="6%" bgcolor="#DAEFE1"><font size="2"><strong>大小</strong></font></td>
             <td align=center width="4%" bgcolor="#DAEFE1"><font size="2"><strong>版本</strong></font></td>
             <td align=center width="5%" bgcolor="#DAEFE1"><font size="2"><strong>时间</strong></font></td>
             <td align=center width="5%" bgcolor="#DAEFE1"><font size="2"><strong>类型</strong></font></td>
             <td align=center width="5%" bgcolor="#DAEFE1"><font size="2"><strong>作者</strong></font></td>
             <td align=center width="5%" bgcolor="#DAEFE1"><font size="2"><strong>价格</strong></font></td>
             <td align=center width="6%" bgcolor="#DAEFE1"><font size="2"><strong>详情</strong></font></td>

          </tr>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#DAEFE1" height="20"><?

$q = "SELECT * FROM app";
mysql_query("SET NAMES gb2312");
$rs = mysql_query($q);
if (!$rs) {
	die("Valid result!");
}
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
$count=0;
while ($row = mysql_fetch_array($rs,MYSQL_ASSOC)){
	echo "</tr></tr><tr><center>
		<td align=center width=\"10%\" height=\"40\" bgcolor=\"#DAEFE1\"><font size=\"2\"><strong> &nbsp;$row[name] </strong></font></td>
		<td align=center width=\"4%\" bgcolor=\"#DAEFE1\"><font size=\"2\"><strong>$row[sequence]</strong></font></td>
		<td align=center width=\"6%\" bgcolor=\"#DAEFE1\"><font size=\"2\"><strong>$row[size]</strong></font></td>
		<td align=center width=\"4%\" bgcolor=\"#DAEFE1\"><font size=\"2\"><strong>$row[version]</strong></font></td>
		<td align=center width=\"5%\" bgcolor=\"#DAEFE1\"><font size=\"2\"><strong>$row[time]</strong></font></td>
		<td align=center width=\"5%\" bgcolor=\"#DAEFE1\"><font size=\"2\"><strong>$row[categoryName]</strong></font></td>
		<td align=center width=\"5%\" bgcolor=\"#DAEFE1\"><font size=\"2\"><strong>$row[author]</strong></font></td>
		<td align=center width=\"5%\" bgcolor=\"#DAEFE1\"><font size=\"2\"><strong>$row[price]</strong></font></td>
		<td align=center width=\"6%\" bgcolor=\"#DAEFE1\"><font size=\"2\"><strong><a href=\"javascript:void(1)\" onClick=\"window.open (\'writemail.php\',\'\',\'top=100,left=0,width=700,height=465,status=no,resizable=yes,scrollbars=yes\');\">点击查看</a</strong></font></td>
		</center></tr>";
		$count=$count+1;
}
echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
mysql_free_result($rs);

//if ($count != "") {
//	if ($count % $perpage == 0)
//		$maxpageno = $count / $perpage;
//	else
//		$maxpageno = floor($count / $perpage) + 1;
//	if ($page > $maxpageno)
//		$page = $maxpageno;
//	$pagemin = min(($page -1) * $perpage, $count -1);
//	$pagemax = min($pagemin + $perpage -1, $count -1);
//	for ($i = $pagemin; $i <= $pagemax; $i++) {

