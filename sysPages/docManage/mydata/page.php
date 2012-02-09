				<form method=post action=""><input type="hidden" name="ac" value="t">
        <tr>
            <td height="22" bgcolor="#FFFFFF" >
<hr size="1" noshade align="center" width="100%"><?
		if ($maxpageno <= 1)
			echo "<center>共有信息 <font color=red><b>{$countnum}</b></font> 条  | 只有一页";
		else {
			$nextpage = $page +1;
			$previouspage = $page -1;
			echo "<center>共有信息 <font color=red><b>{$countnum}</b></font> 条  | ";
			if ($page <= 1)
				echo " <a href=?page=$nextpage>下一页</a>　<a href=?page=$maxpageno>尾页</a> ";
			elseif ($page >= $maxpageno) echo " <a href=?page=1>首页</a>　<a href=?page=$previouspage>上一页</a> ";

			else
				echo " <a href=?page=1>首页</a>　<a href=?page=$previouspage>上一页</a>　<a href=?page=$nextpage>下一页</a>　<a href=?page=$maxpageno>尾页</a> ";
			echo " |  <font color=red> $perpage</font>条/页&nbsp;&nbsp;页码：<font color=red>$page</font>/$maxpageno| 转到第
			  <select name='page' size='1' style=\"border: 1px solid #429234; background-color: #FAFDF9\" onChange='javascript:submit()'>";
			for ($j = 1; $j <= $maxpageno; $j++) {
				echo "<option value='" . $j . "'>" . $j . "</option>";
			}
			echo "</select>页";
		}
?></form>