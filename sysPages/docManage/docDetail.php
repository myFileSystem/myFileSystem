<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
$thisprog = "docDetail.php";
$itemNumber = $_GET['itemNumber'];

$link = mysql_connect('127.0.0.1', 'root', 'squall') or die('Could not connect: ' . mysql_error());
mysql_select_db('app') or die('Could not select database');
mysql_query("SET NAMES gb2312");
//mysql_query("set names 'GBK'");

$query = "SELECT * FROM app where sequence='1'";
$apps = mysql_query($query) or die('Query failed: ' . mysql_error());
$app = mysql_fetch_array($apps, MYSQL_ASSOC)
?>


<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<title><?php $app[name] ?></title>

<link rel="stylesheet" type="text/css" href="d:\web-storefront-base.css" />
<link rel="stylesheet" type="text/css" href="d:\web-storefront-preview.css" />
<script type="text/javascript" charset="utf-8" src="d:\web-storefront-base.css"></script>
<script type="text/javascript" charset="utf-8" src="d:\web-storefront-preview.css"></script>

</head>
<body>

 <div>���ƣ�<?php echo $app[name]; ?> </div>
  <br></br>

<div class="app-info">
    <table><tbody><tr>
        <td class="app-ico"><a href="http://3g.gfan.com/index.php?/index/download/182410"><img width="128" height="128" alt="Farm Frenzy 3 " class="artwork" src="pic1.jpg" /><br /><span><strong>   </a> <input title="�������: <?php echo $app[name]; ?>" type=image src="test.jpg" onclick="JavaScript:location.href='test.apk'"/></strong></span></a></td>
       <td class="info">
        	<span class="price">�۸�</span><span class="red"><?php echo "��"; echo nl2br($app[price]); ?></span><br />
            <span class="gry">���</span><?php echo nl2br($app[categoryName]); ?><br />
            <span class="gry">���ߣ�</span><?php echo $app[author]; ?><br />
            <span class="gry">�汾��<?php echo nl2br($app[version]); ?><br />
            <span class="gry">��С��</span><?php echo nl2br($app[size]); echo "MB"; ?><br />
              <span class="gry">���ش�����</span><?php echo nl2br($app[download])?> </td>

            </td>

    </tr></tbody></table>
</div>







<div id="main">
  <div id="desktopContentBlockId" class='platform-content-block display-block'>
    <div id="content">
      <div class="padder">
        <div id="title" class="intro has-gcbadge">
          <div class="left">

          </div>

        </div>
        <div class="center-stack">
          <div style="width:500px;">

          </div>
          <div metrics-loc="Swoosh_" rows="1" class="swoosh lockup-container application large screenshots">
            <div class="title">
              </br>
              <h4>�����ͼ</h4>
            </div>
            <div num-items="4" class="content">
              <div>
                <div class="lockup"><img width="160" height="240" alt="��ͼ 1" src="http://a4.mzstatic.com/us/r1000/117/Purple/c9/86/cb/mzl.qatgpdwh.320x480-75.jpg" />
                <img width="160" height="240" alt="��ͼ 2" src="http://a2.mzstatic.com/us/r1000/079/Purple/f7/3a/e3/mzl.udgnklxf.320x480-75.jpg" />
                <img width="160" height="240" alt="��ͼ 3" src="http://a4.mzstatic.com/us/r1000/063/Purple/f3/f2/6c/mzl.buhhmlnl.320x480-75.jpg" />
                <img width="160" height="240" alt="��ͼ 4" src="http://a2.mzstatic.com/us/r1000/078/Purple/d5/85/2a/mzl.mlaqftpc.320x480-75.jpg" /></div>

              </div>
            </div>
          </div>
        </div>







            <div class="app-rating"><a href="">����Ҫ��</a></div>
            <p><span class="app-requirements">ϵͳҪ��:</span>xxxxxxxxxxxxx</p>

			<p> <span> ���������<?php echo nl2br($app[discription]); ?></span> </p>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
