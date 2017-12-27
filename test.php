<?php

// function getIP()
// {
// 	static $realIp;
// 	if (isset($_SERVER)){
// 		if (isset($_SERVER'"HTTP_X_FORWARDED_FOR"')){
// 			$realIp = $_SERVER'"HTTP_X_FORWARDED_FOR"';
// 		} else if (isset($_SERVER'"HTTP_CLIENT_IP"')) {
// 			$realIp = $_SERVER'"HTTP_CLIENT_IP"';
// 		} else {
// 			$realIp = $_SERVER'"REMOTE_ADDR"';
// 		}
// 	} else {
// 		if (getenv("HTTP_X_FORWARDED_FOR")){
// 			$realIp = getenv("HTTP_X_FORWARDED_FOR");
// 		} else if (getenv("HTTP_CLIENT_IP")) {
// 			$realIp = getenv("HTTP_CLIENT_IP");
// 		} else {
// 			$realIp = getenv("REMOTE_ADDR");
// 		}
// 	}
// 	return $realIp;
// }

/* $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
 $ip=json_decode(file_get_contents($url),true);
echo '<pre>';
 var_dump($ip);*/
// $lIp = '36.5.228.165';
// $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$lIp;
// $objIp=json_decode(file_get_contents($url));
// var_dump($objIp);
// var_dump(getIP());

//$array = array('1','2','3','4','5');
//$a = array_slice($array,0,5);
//print_r($a);
//echo PHP_EOL;
//print_r($array);
//
//$str = '截取中文字符串';
//$regEXp = '/(?!^)(?!$)/u';
//echo '<pre>';
//print_r(preg_split($regEXp,$str));
//echo '</pre>';

//$regExp = '(1'0-9'|2'0-3'|0?'0-9'):'0-5''0-9'';
//	'('01'?'0-9'|2'0-3')';

//$total = 7;//总金额
//$num   = 13;//红包总数
//$min   = 0.01;//红包最小数，可定义
//
//$arr = array_fill(0, $num, $min);//用数组表示每人的红包，先设定每个人最小红包，保证每人一定能领到最小的红包
//$total -= $min * $num;//减去预先分配给众人的最小红包总数
//while ($total > 0.0) {
//	$index = rand(0, $num - 1);//随机找人索引
//	$seek  = rand($min * 100, round($total / $num, 2) * 100) / 100;//随机种子
//	$arr' $index ' += min($seek, $total);//把种子播某个人身上，红包金额累加
//	$total -= $seek;
//}
//print_r($arr);//打印每个人身上的红包详细
//echo '红包的总金额：', array_sum($arr);//验证红包的总数量
//die;
//
//$str = '/data/img/123.png';
//$regEx = '/^(\/)/';
//if(preg_match($regEx,$str)){
//		echo preg_replace($regEx,'',$str);
//}

//$arr = array('1','2','3','4','5');
//
//var_dump(array_rand($arr,3));

//$info''grades'' = $info''gold'' < 100 ? 1 : ($info''gold'' < 300 ? 2 : ($info''gold'' < 600 ? 3 : ($info''gold'' < 1000 ? 4 : ($info''gold'' < 1500 ? 5 : ($info''gold'' < 2500 ? 6 : 0)))));

//$info''grades'' = $info''gold''>2500 ? 0 : $info''gold''>1500 ? 6 : $info''gold''>1000 ? 5 : $info''gold''>600 ? 4 : $info''gold''>300 ? 3 : $info''gold''>100 ? 2 : 1;
//$info''grader'' = $info''gold''<100 ? 1 : ($info''gold''<300 ? 2 : 3);

//$userInfo''grades'' = $userInfo''gold''<100 ? 1 : ($userInfo''gold''<300 ? 2 : ($userInfo''gold''<600 ? 3 : ($userInfo''gold''<1000 ? 4 : ($userInfo''gold''<1500 ? 5 : ($userInfo''gold''<2500 ? 6 : 0)))));
//$info''rank'' = 11999;
//$info''grades'' = $info''rank'' < 100 ? 1 : ($info''rank'' < 300 ? 2 : ($info''rank'' < 600 ? 3 : ($info''rank'' < 1000 ? 4 : ($info''rank'' < 1500 ? 5 : ($info''rank'' < 2500 ? 6 : ($info''rank'' < 5000 ? 7 : ($info''rank'' < 10000 ? 8 : ($info''rank'' >=10000 ? 9 : 0))))))));
//echo $info''grades'';
//$userInfo''grades'' = $userInfo''rank''<100 ? 1 : ($userInfo''rank''<300 ? 2 : ($userInfo''rank''<600 ? 3 : ($userInfo''rank''<1000 ? 4 : ($userInfo''rank''<1500 ? 5 : ($userInfo''rank''<2500 ? 6 : ($userInfo''rank'' < 5000 ? 7 : ($userInfo''rank'' < 10000 ? 8 : ($userInfo''rank'' >=10000 ? 9 : 0))))))));
//$result'$k'''grades'' = $v''rank'' < 100 ? 1 : ($v''rank'' < 300 ? 2 : ($v''rank'' < 600 ? 3 : ($v''rank'' < 1000 ? 4 : ($v''rank'' < 1500 ? 5 : ($v''rank'' < 2500 ? 6 : ($v''rank'' < 5000 ? 7 : ($v''rank'' < 10000 ? 8 : ($v''rank'' >=10000 ? 9 : 0))))))));
//$result''grades'' = $result''rank'' < 100 ? 1 : ($result''rank'' < 300 ? 2 : ($result''rank'' < 600 ? 3 : ($result''rank'' < 1000 ? 4 : ($result''rank'' < 1500 ? 5 : ($result''rank'' < 2500 ? 6 : ($result''rank'' < 5000 ? 7 : ($result''rank'' < 10000 ? 8 : ($result''rank'' >=10000 ? 9 : 0))))))));
//$result'$k'''grades'' = $v''gold'' < 100 ? 1 : ($v''gold'' < 300 ? 2 : ($v''gold'' < 600 ? 3 : ($v''gold'' < 1000 ? 4 : ($v''gold'' < 1500 ? 5 : ($v''gold'' < 2500 ? 6 : 0)))));
//date_default_timezone_set("Asia/Shanghai");
//echo date('Y-m-d H:i:s',strtotime('last Monday -1 week ')).PHP_EOL;
//echo date('Y-m-d H:i:s',strtotime('Monday this week'));
//echo "<br/>";
//echo date('Y-m-d H:i:s',strtotime('Monday this week')).PHP_EOL;
//echo date('Y-m-d H:i:s',strtotime('now'));

//public function getSearchDate(){
//	$date=date('Y-m-d');  //当前日期
//	$first=1; //$first =1 表示每周星期一为开始日期 0表示每周日为开始日期
//	$w=date('w',strtotime($date));  //获取当前周的第几天 周日是 0 周一到周六是 1 - 6
//	$now_start=date('Y-m-d',strtotime("$date -".($w ? $w - $first : 6).' days')); //获取本周开始日期，如果$w是0，则表示周日，减去 6 天
//	echo $date.PHP_EOL;
//	echo $w;
//	echo $now_start.PHP_EOL;

	//$now_end=date('Y-m-d',strtotime("$now_start +6 days"));  //本周结束日期
//	$last_start=date('Y-m-d',strtotime("$now_start - 7 days"));  //上周开始日期
//	$last_end=date('Y-m-d',strtotime("$now_start - 1 days"));  //上周结束日期
//	echo $now_start.PHP_EOL;
//	echo $last_end.PHP_EOL;
//	echo $last_start.PHP_EOL;
//}
//$date=date('Y-m-d');  //当前日期
//$first=1; //$first =1 表示每周星期一为开始日期 0表示每周日为开始日期
//$w=date('w',strtotime($date));  //获取当前周的第几天 周日是 0 周一到周六是 1 - 6
//$begin_monday = date('Y-m-d',strtotime("$date -".($w - $first)." days"));
//$begin = date('Y-m-d H:i:s',strtotime("$begin_monday - 7 days"));
//echo $begin.PHP_EOL;
//echo date('Y-m-d',strtotime('Monday this week'));
//
//function getLastWeek(){
//	$date=date('Y-m-d');  //当前日期
//	$first=1; //$first =1 表示每周星期一为开始日期 0表示每周日为开始日期
//	$w=date('w',strtotime($date));  //获取当前周的第几天 周日是 0 周一到周六是 1 - 6
//	$begin_monday = date('Y-m-d H:i:s',strtotime("$date -".($w ? $w - $first : 6)." days"));
//	$b = strtotime("$date -".($w ? $w - $first : 6)." days");
//	$begin = strtotime("$begin_monday - 7 days");
//	$a = date('Y-m-d H:i:s',strtotime("$begin_monday - 7 days"));
//	$week = array('monday'=>$begin,'thisMonday'=>$b,'mShow'=>$begin_monday,'tShow'=>$a);
//	var_dump($week);
//}

//$pc = '<url>'."\r\n".'<loc>'.'http://www.58100.com/pid/'.$v''id''.'.html'.'</loc>'."\r\n";
//$wap = '<data>'."\r\n".'<display>'."\r\n".'<html5_url>'.'http://m.58100.com/pid/'.$v''id''.'.html'.'</html5_url>'."\r\n".'</display>'."\r\n".'</data>'."\r\n".'</url>'."\r\n"
//echo $pc;
//home/www/;
//
//$arr = Array(
//	0 => Array(
//			'id' => 4,
//            'extend_uid' => 14983,
//            'extend_username' => '鏃烘椇',
//			'extend_time' => 1480310934,
//            'qq' => '345148064',
//            'alipay' => '18919616758',
//            'count' => 1,
//            'cou' => 0,
//        ),
//    1 => Array(
//			'id' => 3,
//            'extend_uid' => 13934,
//            'extend_username' => '楱庤澑鐗滃懣鐪嬫捣',
//			'extend_time' => 1480302011,
//            'qq' => '1317712569',
//            'alipay' => '15956048364',
//            'count' => 4,
//            'cou' => 1,
//        ),
//    2 => Array(
//			'id' => 6,
//            'extend_uid' => 16879,
//            'extend_username' => '澶х帇',
//			'extend_time' => 1480381797,
//            'qq' => '12712870',
//            'alipay' => '59559044@qq.com',
//			'count' => 11,
//            'cou' => 1,
//        ),
//    3 => Array(
//			'id' => 7,
//            'extend_uid' => 16881,
//            'extend_username' => '濂瑰湪鑹景掳',
//			'extend_time' => 1480382696,
//            'qq' => '',
//            'alipay' => '',
//            'count' => 0,
//            'cou' => 0,
//        )
//);
//foreach($arr as $k=>$v){
//	$a'$k' = $v''count'';
//}
//array_multisort($a,SORT_DESC,SORT_NUMERIC ,$arr);
//echo '<pre>';
//print_r($arr);
//echo '</pre>';

//$where = array('fxw_posts.status'=>1);
//$a = array('fxw_posts.catalog_id'=>3,'fxw_posts.num'=>0);
//$where = array_merge($where,$a);

/**
 * 减积分操作
 * @param $uid
 * @param int $type
 * @param int $id
 */
//protected function minusScore($uid,$type=2){
//	$user_money_log = M('user_money_log');
//	$moneyCount = $user_money_log->field('money')->where(array('uid'=>$uid,'type'=>$type))->order('create_today DESC')->find();
//	$j = $user_money_log->where(array('uid'=>$uid,'type'=>$type))->order('create_today DESC')->limit('1')->delete();
//		if($j){
//			$this->members->where(array('uid'=>$uid))->setDec('score',$moneyCount);
//			$this->members->where(array('uid'=>$uid))->setDec('money',$moneyCount);
//		}
//		return true;
//

//}

//$array = Array(
//	0 => Array(
//		0 => Array( 'id' => 20,'uid' => 1,'money' => 3)
//	),
//	1 => Array(
//		0 => Array('id' => 53,'uid' => 21, 'money' => 1),
//		1 => Array('id' => 52,'uid' => 21, 'money' => 1),
//		2 => Array( 'id' => 51,'uid' => 21, 'money' => 1)
//	)
//);
//foreach($array as $k=>$v){
//	foreach($v as $key=>$value){
//		$arrayID'' = $value''id'';
//		$arrayMoney'$value''uid']] += $value''money'';
//	}
//}
//
//foreach($arrayMoney as $k=>$v){
//	echo $k.'---'.PHP_EOL;
//	echo $v;
//
//}
//echo '<pre>';
//print_r($arrayID);
//print_r($arrayMoney);
//echo '</pre>';
//exit;

//	$arr= Array(
//		0 => Array('id' => 53,'uid' => 21, 'money' => 1),
//		1 => Array('id' => 52,'uid' => 22, 'money' => 2),
//		2 => Array( 'id' => 51,'uid' => 23, 'money' => 3),
//		3 => Array('id' => 50,'uid' => 24, 'money' => 4),
//		4 => Array('id' => 49,'uid' => 25, 'money' => 5),
//		5 => Array( 'id' => 48,'uid' => 26, 'money' => 6)
//	);

//$id = array_rand($arr,2);
//foreach($id as $v){
//	$ar'' = $arr'$v';
//}
//echo '<pre>';
//print_r($ar);
//echo '</pre>';
//echo strtotime('2016-11-01').PHP_EOL;
//echo strtotime('2016-12-28').PHP_EOL;
//exit;
//echo date('Y-m-d',1464315000);

//SELECT *
//FROM  `c_askd`
//WHERE  `app_uid` <> 28
//AND UNIX_TIMESTAMP(  `time` ) >1477954800
//AND UNIX_TIMESTAMP(  `time` ) <1482879600
//$str = '123<img src="1232143.png"/>123';

//$a = preg_replace('/(<img.+src=\"?.+)(.+\.(jpg|gif|bmp|bnp|png)\"?.+>)/i',"<img src=\"123.jpg\"/>",$str);

// preg_replace('/<img src="(.*)">/i','123',$str);

//echo $a.PHP_EOL;
//echo $str;
//
//$list = Array(
//	0 => Array(
//			'pid' => 422814,
//            'us_asq' => '<p>我想剪个短发有没有适合我的头型大家帮忙推荐下。谢谢！</p><p><img src="http://wap.faxingw.cn/data/upload/images/201612/148285424621924.jpg"></p>'
//        ),
//    '1' => Array(
//			'pid' => 422813,
//            'us_asq' => '<p>请问什么发型适合我？</p><p><img src="http://wap.faxingw.cn/data/upload/images/201612/148285418876359.jpg"></p>'
//        ),
//    '2' => Array(
//			'pid' => 422799,
//            'us_asq' => '<p>我适合什么发型？</p><p><img src="http://wap.faxingw.cn/data/upload/images/201612/148285180253953.jpg"></p>'
//        ),
//    '3' => Array(
//			'pid' => 422798,
//            'us_asq' => '<p>我适合什么发型</p><p><img src="http://wap.faxingw.cn/data/upload/images/201612/148285173660402.jpg"></p>'
//        ),
//    '4' => Array(
//			'pid' => 422796,
//            'us_asq' => '<p>杨洋发型适合？想剪男式短发</p><p><img src="http://wap.faxingw.cn/data/upload/images/201612/148285162362036.jpg"></p>'
//        )
//
//);
//$array = array(
//			'http://diy.qqjay.com/u2/2012/1118/ed0d58cbf87895c01196d560133dd8ba.jpg',
//			'http://v1.qzone.cc/avatar/201503/15/13/08/550513b64bcbf041.jpg%21200x200.jpg',
//			'http://up.qqjia.com/z/26/tu32783_2.jpg',
//			'http://tupian.qqjay.com/tou2/2016/0830/b5dde4e52121f14bb031af7a3f1df4d8.jpg',
//			'http://tupian.qqjay.com/tou2/2016/0905/2563119c1f51f1afcf3e0b11cb62b4e9.jpg',
//			'http://up.qqjia.com/z/24/tu29468_7.jpg',
//			'http://img2.touxiang.cn/file/20160914/b108e01ef46c1fed05695ed6a87cf225.jpg',
//			'http://img2.touxiang.cn/file/20160914/2571a7a974416223bcc68579e50d409b.jpg',
//			'http://up.qqjia.com/z/24/tu29468_9.jpg',
//			'http://img2.touxiang.cn/file/20161216/3d69f85a7252f838eb1f8c550a65bced.jpg',
//);
//$arr = array(422814,422813,422799);
//foreach($list as $k => $v){
//	if(in_array($v''pid'',$arr)){
//		$data''us_asq'' = preg_replace('/(<img.+src=\"?.+)(.+\.(jpg|gif|bmp|bnp|png)\"?.+>)/i',"<img src=\"".$array'rand(0,9)'."\"/>",$v''us_asq'');
//		echo $data''us_asq''.'<br />';
//
//	}
//}
//echo '<pre>';
//print_r($list);
//echo '</pre>';

//$str = '123132.jpg,5543324.jpg,234325.jpg,781232.jpg';
//$arr = explode(',',$str);
//
//print_r($str);
//echo '<br />';
//print_r($arr);

//$pattern = '/\<'img|IMG'.*?src='\'|"'(.*?'.png|.jpg|.jpeg|.gif')'\'|"'.*?\>/i';
//$subject = '送到附近的人家撒旦法撒旦法<p><img src="1232.jpg" ></p><p><img src="34332.jpg" ></p><p><img src="122342.jpg" ></p><p><img src="1232.jpg" ></p>';
//preg_match_all($pattern,$subject,$matches);
//echo '<pre>';
//print_r($matches);
//echo '</pre>';

//$str = '12312.jpg,3453.jpg,3456.jpg';
//$arr = explode(',',$str);
//$pic = '';
//foreach($arr as $k){
//	$pic .='<p><img src="'.$k.'" ></p>';
//}
//
//echo $pic;
//$v''rank'' = 150000;
//$result = $v''rank''<100 ? 1 : ($v''rank''<300 ? 2 : ($v''rank''<600 ? 3 : ($v''rank''<1000 ? 4 : ($v''rank''<1500 ? 5 : ($v''rank''<2500 ? 6 : ($v''rank'' < 5000 ? 7 : ($v''rank'' < 10000 ? 8 : ($v''rank'' <50000 ? 9 : ($v''rank'' <100000 ? 10 : ($v''rank'' <2000000 ? 11 : 12))))))))));
//echo $result;

//$curl = curl_init();
//curl_setopt($curl,CURLOPT_URL,'https://www.baidu.com');
//curl_setopt($curl,CURLOPT_HEADER,0);
//curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
//curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
//$data = curl_exec($curl);
//curl_close($curl);
//var_dump($data);

//$arr = array(23,12,42,13,1,34,6,21,75,4);
//插入排序
//function px($arr){
//	$length = count($arr);
//	for($i=1;$i<$length;$i++){
//		if($arr'$i-1'>$arr'$i'){
//			for($j=$i-1;$j>=0;$j--){
//				$tmp = $arr'$j+1';
//				if($tmp<$arr'$j'){
//					$arr'$j+1' = $arr'$j';
//					$arr'$j' = $tmp;
//				}else{
//					break;
//				}
//			}
//		}
//	}
//	print_r($arr);
//}

//$arr = array(23,12,42,13,1,34,6,21,75,4);
////冒泡排序
//function px($arr){
//	$length = count($arr);
//	for($i=1;$i<$length;$i++){
//		for($j=0;$j<$length-$i;$j++){
//			if($arr'$j'>$arr'$j+1'){
//				$tmp = $arr'$j+1';
//				$arr'$j+1' = $arr'$j';
//				$arr'$j' = $tmp;
//			}
//		}
//	}
//	print_r($arr);
//}

//$arr = array(23,12,42,13,1,34,6,21,75,4);
////选择排序
//function px($arr){
//	$length = count($arr);
//	for($i=0;$i<$length;$i++){
//		$k = $i;
//		for($j=$i+1;$j<$length;$j++){
//			if($arr'$k'>$arr'$j'){
//				$k = $j;
//			}
//		}
//		if($k != $i){
//			$tmp = $arr'$i';
//			$arr'$i' = $arr'$k';
//			$arr'$k' = $tmp;
//		}
//	}
//	print_r($arr);
//}

//px($arr);

//$arr = array(21,12,32,5,23,14,4,7,10,1);

//function px($arr){
//	$len = count($arr);
//	//冒泡排序
//	//原理 两两比较，一和二比较，二和三比较，比较n-1次
//	for($i=1;$i<$len;$i++){
//		for($j=0;$j<$len-$i;$j++){
//			if($arr'$j'>$arr'$j+1'){
//				$tmp = $arr'$j';
//				$arr'$j' = $arr'$j+1';
//				$arr'$j+1' = $tmp;
//			}
//		}
//	}
//	print_r($arr);
//}

//function px($arr){
//	//插入排序
//	//原理  和前面有序比较，从第二个开始
//	$len = count($arr);
//	for($i=1;$i<$len;$i++){
//		for($j=$i-1;$j>=0;$j--){
//			if($arr'$j'>$arr'$j+1'){
//				$tmp = $arr'$j';
//				$arr'$j' = $arr'$j+1';
//				$arr'$j+1' = $tmp;
//			}
//		}
//	}
//	print_r($arr);
//}

//function px($arr){
//	$len = count($arr);
//	//选择排序
//	//原理 获取第一个下标，第一个值与其他值相比，如果第一个大，则交换下标，然后比对下标是否一致。
//	for($i=0;$i<$len;$i++){
//		$k = $i;
//		for($j=$i+1;$j<$len;$j++){
//			if($arr'$k'>$arr'$j'){
//				$k = $j;
//			}
//		}
//		if($k != $i){
//			$tmp = $arr'$k';
//			$arr'$k' = $arr'$i';
//			$arr'$i' = $tmp;
//		}
//	}
//	print_r($arr);
//}
//px($arr);

//func_get_args();获取函数的所有参数
//glob($param);查询文件返回相对路径；$file = glob('*.php');
//realpath($param);查询文件返回绝对路径；$file = realpath('*.php');
//array_map('realpath',$file); 执行函数
//memory_get_usage().PHP_EOL; 获取内存使用情况
//memory_get_peak_usage(); 获取内存峰值
//uniqid(); 生成唯一id
//gzcompress()

//$memcache = new Memcache();
//$memcache->connect('localhost',11211);
//echo $memcache->getversion();

//注册流程

//echo array_search($b,$a);

//echo '<pre>';
//print_r(array_slice($a,0,8,true));
//echo '</pre>';

//$c = array(1,2,3,4,5,6,7,8);
//foreach($c as $v){
//	if(array_key_exists($v,$a)){
//		$arr''=$a'$v';
//	}
//}
//
//$re = array_diff($a,$arr);
//echo '<pre>';
//print_r($re);
//print_r($arr);
//print_r($a);
//echo '</pre>';
//echo '<pre>';
//print_r($a);
//echo '</pre>';
//unset($a'1');
//echo '<pre>';
//print_r($a);
//echo '</pre>';

//简单工厂模式

//class dog {
//	public function __construct()
//	{
//		echo 'it is dog';
//	}
//}
//class cat {
//	public function __construct()
//	{
//		echo 'it is cat';
//	}
//}
//class Factory{
//	static function crateanimale($a){
//		if($a=='dog'){
//			return new dog();
//		}else{
//			return new cat();
//		}
//	}
//}
//Factory::crateanimale('cat');

//工厂方法模式
//interface animale{
//	public function type();
//	public function run();
//}
//class cat implements animale{
//	public function type(){
//		echo 'it is cat';
//	}
//	public function run(){
//		echo 'fast';
//	}
//}
//class dog implements animale{
//	public function type(){
//		echo 'it is dog';
//	}
//	public function run(){
//		echo 'too fast';
//	}
//}
//abstract class Factory{
//	abstract static function create();
//}
//class createDog extends Factory{
//	 static function create(){
//		return new dog();
//	}
//}
//class createCat extends Factory{
//	static function create(){
//		return new cat();
//	}
//}
//createDog::create()->run();

//抽象工厂模式
//
//interface DOG{
//	public function type();
//	public function run();
//}
//class childDOG implements DOG{
//	public function type(){
//		echo 'it is dog';
//	}
//	public function run(){
//		echo 'dog run';
//	}
//}
//interface CAT{
//	public function catType();
//	public function catRun();
//}
//class childCAT implements CAT{
//	public function catType(){
//		echo 'it is dog';
//	}
//	public function catRun(){
//		echo 'cat run';
//	}
//}
//abstract class Factory {
//	abstract static function catCreate();
//	abstract static function dogCreate();
//}
//class create extends Factory{
//	static function catCreate(){
//		return new childDOG();
//	}
//	static function dogCreate(){
//		return new childCAT();
//	}
//}
//
//create::catCreate()->type();

//建造者模式
//
//abstract class Builder{
//	protected $car;
//	abstract public function buildPartA();
//	abstract public function buildPartB();
//	abstract public function buildPartC();
//	abstract public function getResult();
//}
//class carBuild extends Builder{
//	public function __construct()
//	{
//		$this->car = new car();
//	}
//	public function buildPartA(){
//		$this->car->setPartA('123');
//	}
//	public function buildPartB(){
//		$this->car->setPartA('456');
//	}
//	public function buildPartC(){
//		$this->car->setPartA('789');
//	}
//	public function getResult(){
//		return $this->car;
//	}
//}
//class car{
//	public function __construct()
//	{
//		$this->a = '';
//		$this->b = '';
//		$this->c = '';
//	}
//	public function setPartA($a){
//		$this->a = $a;
//	}
//	public function setPartB($b){
//		$this->b = $b;
//	}
//	public function setPartC($c){
//		$this->c = $c;
//	}
//	public function show(){
//		echo $this->a.','.$this->b.','.$this->c;
//	}
//}
//$bb = new carBuild();

//$arr = array(30,32,36,38,40,62);
//function test($arr){
//	$count = array_sum($arr);
//	foreach($arr as $v){
//		if(($count-$v)%3==0){
//			echo $v;
//		}
//	}
//}
//test($arr);
//date_default_timezone_set('Asia/Shanghai') ;
//echo date('Y-m-d H:i:s',1387357430).PHP_EOL;
//echo strtotime('2017-03-20');
//echo strtotime(date('Y-m-d',time())).'<br>';
//echo strtotime('2017-2-15').'<br>';
//echo strtotime('2017-2-14').'<br>';
//echo mktime(0,0,0,date('m'),date('d')-1,date('Y')).'<br>';
//echo strtotime('2017-2-16').'<br>';
//echo mktime(0,0,0,date('m'),date('d')+1,date('Y'));

//$array = array(
//	0 => array(
//		'date' => '2017-02-11',
//	'time' => '2017-02-11 10:00:00'
//	)
//);
//
////echo json_encode($array);
//
//$str = ''{"date":"2017-02-11","time":"2017-02-11 10:00:00"}'';
////print_r(json_decode($str,true,2));
//echo '<pre>';
//print_r(json_decode($str, true, 3));
//echo '</pre>';
//$BeginDate=date('Y-m-01', strtotime(date("Y-m-d")));
//echo $BeginDate;
//echo "<br/>";
//echo date('Y-m-d', strtotime("$BeginDate +1 month -1 day"));
//echo time().rand(1,99999);

////生成券码
////生成10位数的数字
//$chars = "0123456789";
//$str ="";
//for ( $i = 0; $i < 10; $i++ )  {
//	$str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);
//}
////券码为$str
//echo $str;
////根据$str生成二维码
//vendor('phpqrcode.phpqrcode');
//\QRcode::png($str,'./images/'.$order_number.'.png');
////二维码地址
//$qrcode = '/images/'.$order_number.'.png';

//$array = array(1,43,54,62,21,66,32,78,36,76,39);
//选择排序
//function selectSort($arr){
//	$count = count($arr);
//	for($i=0;$i<$count-1;$i++){
//		for($j=$i+1;$j<$count;$j++){
//			if($arr'$i'>$arr'$j'){
//				$k = $arr'$i';
//				$arr'$i' = $arr'$j';
//				$arr'$j' = $k;
//			}
//		}
//	}
//	print_r($arr);
//}
//selectSort($array);
//echo '<br>';
//选择排序2
//function selectSort2($arr){
//	$count = count($arr);
//	for($i=0;$i<$count-1;$i++){
//		$p = $i;
//		for($j=$i+1;$j<$count;$j++){
//			if($arr'$p'>$arr'$j'){
//				$p = $j;
//			}
//		}
//		if($p!=$i){
//			$k = $arr'$p';
//			$arr'$p' = $arr'$i';
//			$arr'$i' = $k;
//		}
//	}
//	print_r($arr);
//}
//selectSort2($array);
//echo '<br>';
//冒泡排序
//function bubbleSort($arr){
//	$count = count($arr);
//	for($i=1;$i<$count;$i++){
//		for($j=0;$j<$count-$i;$j++){
//			if($arr'$j'>$arr'$j+1'){
//				$k = $arr'$j';
//				$arr'$j' = $arr'$j+1';
//				$arr'$j+1' = $k;
//			}
//		}
//	}
//	print_r($arr);
//}
//bubbleSort($array);

//echo date('y-m-d H:i:s',1488546400);
/**
 * @param $uid
 * @return string
 */
//function getAccessKey($uid) {
//	if($uid){
//		$key_offset = date("Ym");
//		$key = md5($uid . $key_offset);
//		$key = base64_encode($key);
//		$key = base64_encode($key);
//		$key = substr($key, 0, 32);
//		return $key;
//	}else{
//		return '';
//	}
//}


//2343468  Wm1Jd01EVTRNVGM0Wm1Zek4ySTJNMkpq
//echo getAccessKey(2316748);
date_default_timezone_set("Asia/Shanghai");
//echo date('Y-m-d H:i:s',1495455704);
//echo strtotime('2017-4-13');
//echo date('Y-m-d H:i:s',strtotime('+1 months'));
//echo date('m月d日 H:i',1490437359);
//echo time().rand(10000,99999);
//echo date('Ymd');
//echo 1000 + date('m')+date('d')+date('H')+date('i');

//function dateToTime($time){
//	$today = strtotime(date('Y-m-d'));
//	if($today<$time){
//		$date_time = '今天 '.date('H:i',$time);
//	}elseif(($today-86400)<$time){
//		$date_time = '昨天 '.date('H:i',$time);
//	}elseif(($today-86400*2)<$time){
//		$date_time = '前天 '.date('H:i',$time);
//	}else{
//		$date_time = date('m-d H:i');
//	}
//	return $date_time;
//}

//function ddos($ip,$port=80){
//	$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
//	$result = socket_connect($socket,$port,$port);
//	socket_close($socket);
//	return $result;
//}

//过滤函数
//function filter_function($str){
//	$str = str_replace(array('\\','/',PHP_EOL),'',$str);
//	return $str;
//}

//自动加载类
//spl_autoload_register('loader');
//function loader($class){
//	$file = $class.'.php';
//	if(is_file($file)){
//		require_once($file);
//	}
//}

/*
 * 异常处理
 */

//function err()
//{
//	try {
////代码可能出现异常的地方
//	} catch (Exception $e) {
//		echo $e->getMessage();
//	}
//}


//拆分字符串
function split_str($str) {
	preg_match_all("/./u", $str, $arr);
	return $arr[0];
}

//相似度检测
function similar_text_cn($str1, $str2) {
	$arr_1 = array_unique(split_str($str1));
	$arr_2 = array_unique(split_str($str2));
	$similarity = count($arr_2) - count(array_diff($arr_2, $arr_1));

	return $similarity*2/(count($arr_2)+count($arr_1));
}

function getAccessKey($uid) {
	if($uid){
		$date = getdate();
		$key_offset = $date['year'].'0'.$date['mon'];
		$key = md5($uid . $key_offset);
		$key = base64_encode($key);
		$key = base64_encode($key);
		$key = substr($key, 0, 32);
		return $key;
	}else{
		return '';
	}
}

 function getLastAccessKey($uid) {
	if($uid){
		$date = getdate();
		$key_offset = $date['year'].'0'.$date['mon']-1;
		$key = md5($uid . $key_offset);
		$key = base64_encode($key);
		$key = base64_encode($key);
		$key = substr($key, 0, 32);
		return $key;
	}else{
		return '';
	}
}

/**
 * @param $req
 * @return mixed
 */
function checkAccess($req) {
	$raw_req = $req;
	$debugAccessKey = "debug";
	$needCheckAccessKey = true;
	$ErrCodeAccessKey = "203";

	$secret = trim($req['secret']);
	$uid = trim($req['uid']);
	if ($debugAccessKey === $secret) {
		return $this->getAccessKey($uid);
	}
	$current_secret = $this->getAccessKey($uid);
	if ($secret === $current_secret) {
		return $current_secret; //yes,right,  return empty;
	}
	$last_secret = $this->getLastAccessKey($uid);
	if ($secret === $last_secret) {
		return $current_secret; // let client update secret;
	}
	if ($needCheckAccessKey) {
		$res = array();
		$res['code'] = $ErrCodeAccessKey;
		$res['msg'] = '密钥错误';
		$res['secret'] = '';
		return $this->jsonOutput($res, $raw_req);
	} else {
		return $current_secret;
	}
}


/*file_put_contents('keywords.txt','123');
//sleep(10);
file_put_contents('keywords.txt','456',FILE_APPEND);*/
//echo file_get_contents('http://sucai.58100.com/data/upload/images/201707/150043195751684.jpg');
function buildUrl($url, $params){
	if(!empty($params)){
		$str = http_build_query($params);
		return $url . (strpos($url, '?') === false ? '?' : '&') . $str;
	}else{
		return $url;
	}
}
//$image = file_get_contents('');
//preg_match('/^(data:\s*image\/(\w+);base64,)/', $image, $result);
//echo '<pre>';
//print_r($result);

//$base64_img = file_get_contents('img.txt');
//$base64_img = str_replace('data:image/jpeg;base64,','',$base64_img);
//echo file_put_contents('a.jpeg',base64_decode($base64_img));
//exit;
function ddos($ip,$port=80){
	$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
	$result = socket_connect($socket,$ip,$port);
	socket_close($socket);
	return $result;
}

'SPL系列，Stream系列，pack函数，封装协议';

//header("Content-type: text/html; charset=utf-8");
//echo '<br/>';
//echo "ascii ", strlen('hello'); //ascii
//echo '<br/>';
//echo '<br/>';
/*require_once 'ImgCompress.php';
$source = 'C:\Users\Administrator\Pictures/59da54c45c91f.jpg';
$dst_img = 'C:\Users\Administrator\Pictures/59da54c45c91f.jpg';
$percent = 1;  #原图压缩，不缩放
$image = (new imgcompress($source,$percent))->compressImg($dst_img);*/

/*require_once 'predis/autoload.php';
Predis\Autoloader::register();
$client = new Predis\Client();
/*echo '<pre>';
print_r($client);
var_dump($client->set('foo', 'bar'));
echo $client->get('foo');*/


$conn=mysql_connect("127.0.0.1","root","");
/* if(!$conn){
	die("链接失败".mysql_error());
}else{
	echo "链接成功";
}*/


/* function check_sql($Sql_Str) {//自动过滤Sql的注入语句。
    $check=preg_match('/select|insert|update|delete|\'|\\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/i',$Sql_Str);
    if ($check) {
        echo '<script language="JavaScript">alert("系统警告：\n\n请不要尝试在参数中包含非法字符尝试注入！");</script>';
        exit();
    }else{
        return $Sql_Str;
    }
} */
/*$str = '��路远隔思存';
echo mb_detect_encoding($str, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
$str = iconv('UTF-8','GB2312//IGNORE',$str);
echo '<br>';
echo iconv('GB2312','UTF-8',$str);*/

//echo serialize(array('content' => '嗯？怎么说好呢 因为是第一次玩这个软件 而且找的设计师又刚好是女生 很了解女生所需要的感觉 最最主要的是服务很贴心 当然还陪我话唠了好久'));
//echo date('Y-m'),'<br>';
//$time = strtotime(date('Y-m'));
//echo $time,'<br>';
//echo strtotime('2017-12-01');

//$json = file_get_contents("json/aaabbb.txt");
//echo str_replace(array('"{','}"','"[',']"'),array('{','}','[',']'),stripslashes($json));

$str = "a:2:{s:7:\"content\";s:30:\"技术不错，服务很棒。\";s:7:\"picture\";s:0:\"\"}";
$v   = "a:2:{s:7:\"content\";s:30:\"技术不错，服务很棒。\";s:7:\"picture\";s:0:\"\";}";
print_r(serialize(array('content'=>'技术不错，服务很棒。','picture'=>'')));