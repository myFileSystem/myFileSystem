				<form method=post action=""><input type="hidden" name="ac" value="t">
        <tr>
            <td height="22" bgcolor="#FFFFFF" >
<hr size="1" noshade align="center" width="100%"><?
		if ($maxpageno <= 1)
			echo "<center>������Ϣ <font color=red><b>{$countnum}</b></font> ��  | ֻ��һҳ";
		else {
			$nextpage = $page +1;
			$previouspage = $page -1;
			echo "<center>������Ϣ <font color=red><b>{$countnum}</b></font> ��  | ";
			if ($page <= 1)
				echo " <a href=?page=$nextpage>��һҳ</a>��<a href=?page=$maxpageno>βҳ</a> ";
			elseif ($page >= $maxpageno) echo " <a href=?page=1>��ҳ</a>��<a href=?page=$previouspage>��һҳ</a> ";

			else
				echo " <a href=?page=1>��ҳ</a>��<a href=?page=$previouspage>��һҳ</a>��<a href=?page=$nextpage>��һҳ</a>��<a href=?page=$maxpageno>βҳ</a> ";
			echo " |  <font color=red> $perpage</font>��/ҳ&nbsp;&nbsp;ҳ�룺<font color=red>$page</font>/$maxpageno| ת����
			  <select name='page' size='1' style=\"border: 1px solid #429234; background-color: #FAFDF9\" onChange='javascript:submit()'>";
			for ($j = 1; $j <= $maxpageno; $j++) {
				echo "<option value='" . $j . "'>" . $j . "</option>";
			}
			echo "</select>ҳ";
		}
?></form>