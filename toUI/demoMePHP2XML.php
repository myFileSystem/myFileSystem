<?PHP
$link = mysql_connect('127.0.0.1', 'root', 'squall');
mysql_select_db('app') or die('Could not select database');
mysql_query("set names 'gb2312'");

$pageNumber=$_GET['page'];
$itmesInEachpage=$_GET['itemsInEachpage'];
$category=$_GET['category'];

$limitLeft = ($pageNumber-1)*$itmesInEachpage;
$limitRight=$pageNumber*$itmesInEachpage;

//$query = "SELECT * FROM app WHERE categoryName='$category' ORDER BY download DESC limit $limitLeft,$limitRight";
$query = "SELECT * FROM app";
$apps = mysql_query($query) or die('Query failed: ' . mysql_error());
$data_array = array();
$itemTemp = array();
while ($eachApp = mysql_fetch_array($apps, MYSQL_ASSOC)) {
	$itemTemp['dis'] = $eachApp['discription'];
	$itemTemp['icon'] = $eachApp['icon'];
	$itemTemp['name'] = $eachApp['name'];
	$itemTemp['author'] = $eachApp['author'];
	$itemTemp['date'] = $eachApp['time'];
	$itemTemp['download'] = $eachApp['download'];
	$itemTemp['version'] = $eachApp['version'];
	$itemTemp['apkpath'] = $eachApp['software'];
	array_push($data_array,$itemTemp);
}

//  属性数组
$attribute_array = array(
    'test' => array('test' => 111)
);


//  创建一个XML文档并设置XML版本和编码。。
$dom=new DomDocument('1.0', 'utf-8');

//  创建根节点
$items = $dom->createElement('items');
$dom->appendchild($items);

$temp = 1000;

foreach ($data_array as $data) {
    $item = $dom->createElement('item');
    $items->appendchild($item);
	$item->setAttribute('serial',$temp);
	$temp=$temp+1;

//	if (isset($attribute_array['item'])) {
//
//            //  如果此字段存在相关属性需要设置
//                foreach ($attribute_array['item'] as $akey => $row) {
//                    //  创建属性节点
//                    $$akey = $dom->createAttribute($akey);
//                    $item->appendchild($$akey);
//
//                    // 创建属性值节点
//                    $aval = $dom->createTextNode($row);
//                    $$akey->appendChild($aval);
//                }
//            }   //  end if

    create_item($dom, $item, $data, $attribute_array);
}

$dom->formatOutput = true;
$printOut =  $dom->saveXML();
echo $printOut;

function create_item($dom, $item, $data, $attribute) {
    if (is_array($data)) {
        foreach ($data as $key => $val) {
            //  创建元素
            $$key = $dom->createElement($key);
            $item->appendchild($$key);

            //  创建元素值
            $text = $dom->createTextNode($val);
            $$key->appendchild($text);

            if (isset($attribute[$key])) {
            //  如果此字段存在相关属性需要设置
                foreach ($attribute[$key] as $akey => $row) {
                    //  创建属性节点
                    $$akey = $dom->createAttribute($akey);
                    $$key->appendchild($$akey);

                    // 创建属性值节点
                    $aval = $dom->createTextNode($row);
                    $$akey->appendChild($aval);
                }
            }   //  end if
        }
    }   //  end if
}   //  end function
?>