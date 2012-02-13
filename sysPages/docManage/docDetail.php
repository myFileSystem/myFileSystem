<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
$thisprog = "docDetail.php";
$itemNumber = $_GET['itemNumber'];

$link = mysql_connect('127.0.0.1', 'root', 'squall') or die('Could not connect: ' . mysql_error());
mysql_select_db('app') or die('Could not select database');
mysql_query("SET NAMES gb2312");

$query = "SELECT * FROM app where sequence='1'";
$apps = mysql_query($query) or die('Query failed: ' . mysql_error());
$app = mysql_fetch_array($apps, MYSQL_ASSOC)
?>


<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title><?php $app[name] ?></title>
<link rel="stylesheet" type="text/css" href="web-storefront-base.css" />
<link rel="stylesheet" type="text/css" href="web-storefront-preview.css" />
<script type="text/javascript" charset="utf-8" src="web-storefront-base.css"></script>
<script type="text/javascript" charset="utf-8" src="web-storefront-preview.css"></script>
</head>
<body>

<div id="main">
  <div id="desktopContentBlockId" class='platform-content-block display-block'>
    <div id="content">
      <div class="padder">
        <div id="title" class="intro has-gcbadge">
          <div class="left">
            <h1><?php echo $app[name]; ?></h1>
            <h2>开发：<?php echo $app[author]; ?></h2>
            <h5><font color="#FE9A2E">下载：<?php echo $app[download]; ?></font></h5>
          </div>

        </div>
        <div class="center-stack">
          <div style="width:500px;">
            <h4> 软体描述 </h4>
			  <?php echo nl2br($app[discription]); ?>
          </div>
          <div metrics-loc="Swoosh_" rows="1" class="swoosh lockup-container application large screenshots">
            <div class="title">
              </br>
              <h2>软件截图</h2>
            </div>
            <div num-items="3" class="content">
              <div>

                <div class="lockup"><img width="320" height="480" alt="截图 2" src="<?php echo $app[truncation2]; ?>" /></div>
                <div class="lockup"><img width="320" height="480" alt="截图 3" src="<?php echo $app[truncation3]; ?>" /></div>
                <div class="lockup"><img width="320" height="480" alt="截图 4" src="<?php echo $app[truncation4]; ?>" /></div>

              </div>
            </div>
          </div>
        </div>


        <div id="left-stack">
          <div rating-software="100,itunes-games" parental-rating="1" class="lockup product application">
            <div class="artwork"><img width="155" height="155" alt="titile" class="artwork" src="<?php echo $app[truncation1]; ?>" /><span class="mask"></span></div>
            </a> <input title="下载软件: <?php echo $app[name]; ?>" type=image src="../images/downloadButten.jpg" onclick="JavaScript:location.href='test.apk'"/>

            <ul class="list">
              <li>
                <div class="price"><?php echo "￥"; echo nl2br($app[price]); ?></div>
              </li>
              <li class="genre"><span class="label">类别: </span><?php echo nl2br($app[categoryName]); ?></li>
              <li class="release-date"><span class="label">日期：</span><?php echo nl2br($app[time]); ?></li>
              <li><span class="label">版本：</span><?php echo nl2br($app[version]); ?></li>
              <li><span class="label">大小: </span><?php echo nl2br($app[size]); echo "MB"; ?></li>
      		  <li></br>
              <li><?php echo nl2br($app[author]); ?></li>

            </ul>
            <div class="app-rating"><a href="">年龄要求</a></div>
            <p><span class="app-requirements">系统要求:</span>xxxxxxxxxxxxx</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
