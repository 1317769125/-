<?php
//$city = $_GET['city'];
//if(!strpos($city,'市',1)){
//	$city .= '市';
//}
//$str = file_get_contents('./list.json');
//$array = json_decode($str,true);
//$code = array_search($city,$array);
//if($code){
//	$codeB = $code+100;
//	foreach($array as $k=>$v){
//		if($k>$code&&$k<$codeB){
//			$area[$k] = $v;
//		}
//	}
//	$info['code'] = 101;
//	$info['msg'] = '获取成功';
//	$info['data'] = (array)array_values($area);
//}else{
//	$info['code'] = 102;
//	$info['msg'] = '获取失败';
//	$info['data'] = array();
//}


$str = file_get_contents('./list.json');
$array = json_decode($str,true);
foreach($array as $k=>$v){
	if($k%10000==0){
		$a[$k] = $v;
	}
}
$code = array_search('安徽省',$array);
if($code) {
	$codeB = $code + 10000;
	foreach ($array as $k => $v) {
		if ($k > $code && $k < $codeB&&$k%100==0) {
			$city[$k] = $v;
		}
	}
}
echo '<pre>';
print_r($city);
echo '</pre>';