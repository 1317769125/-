<?php
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