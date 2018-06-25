<?php
/**
 * 系统公共库文件
 * 主要定义系统公共函数库
 */

/**
 * 如果脚本已经在进程表中运行，函数返回true
 *
 * @return string
 */
if (! function_exists ( 'isTaskRunning' )) {
	function isTaskRunning($controler, $action, $num = 1) {
		$cmd = popen ( "ps -ef | grep -E \"cli.php {$controler} {$action}\" | grep -v grep | grep -v \"sh -c\" | wc -l", "r" );
		$runningNum = ( int ) fread ( $cmd, 512 );
		pclose ( $cmd );
		if ($runningNum > $num) {
			return true;
		} else {
			return false;
		}
	}
}

/**
 * 截取字符串 (不乱码)
 */
if (! function_exists ( 'truncate' )) {
	function truncate($string, $length = 10, $etc = '...') {
		$result = '';
		$string = html_entity_decode ( trim ( strip_tags ( $string ) ), ENT_QUOTES, 'UTF-8' );
		$strlen = strlen ( $string );
		for($i = 0; (($i < $strlen) && ($length > 0)); $i ++) {
			if ($number = strpos ( str_pad ( decbin ( ord ( substr ( $string, $i, 1 ) ) ), 8, '0', STR_PAD_LEFT ), '0' )) {
				if ($length < 1.0) {
					break;
				}
				$result .= substr ( $string, $i, $number );
				$length -= 1.0;
				$i += $number - 1;
			} else {
				$result .= substr ( $string, $i, 1 );
				$length -= 0.5;
			}
		}
		$result = htmlspecialchars ( $result, ENT_QUOTES, 'UTF-8' );
		if ($i < $strlen) {
			$result .= $etc;
		}
		return $result;
	}
}

/**
 * 获取phalcon框架自身依赖注入容器
 */
if (! function_exists ( 'service' )) {
	function service($di_name) {
		$method = 'get' . $di_name;
		return \Phalcon\Di::getDefault ()->$method ();
	}
}

/**
 * 数组取值包裹函数
 */
if (! function_exists ( 'array_fetch' )) {
	function array_fetch($array, $key, $default = '') {
		return isset ( $array [$key] ) ? $array [$key] : $default;
	}
}

/**
 * 密码Salt
 */
if (! function_exists ( 'encrypt_password' )) {
	function encrypt_password($password) {
		return sha1 ( substr ( $password, 1, 3 ) . $password . 'feeyo' );
	}
}

/**
 * 管理单例对象的依赖加载
 *
 * @return \App\Application
 */
if (! function_exists ( "application" )) {
	function application() {
		return \App\Application::instance ();
	}
}

/**
 *
 * @return bool (true 如果是生产环境)
 */
if (! function_exists ( "is_production" )) {
	function is_production() {
		return env ( 'ENVIRONMENT' ) == 'pro' || env ( 'ENVIRONMENT' ) == 'product';
	}
}

/**
 * 创建guid
 *
 * @param string $namespace        	
 * @return string
 */
if (! function_exists ( "create_guid" )) {
	function create_guid($namespace = '') {
		$guid = '';
		$uid = uniqid ( "", true );
		$data = $namespace;
		$data .= @$_SERVER ['REQUEST_TIME'];
		$data .= @$_SERVER ['HTTP_USER_AGENT'];
		$data .= @$_SERVER ['REMOTE_ADDR'];
		$data .= @$_SERVER ['REMOTE_PORT'];
		$hash = strtoupper ( hash ( 'ripemd128', $uid . $guid . md5 ( $data ) ) );
		$guid = substr ( $hash, 0, 8 ) . substr ( $hash, 8, 4 ) . substr ( $hash, 12, 4 ) . substr ( $hash, 16, 4 ) . substr ( $hash, 20, 12 );
		
		return $guid;
	}
}

if (!function_exists('is_english')) {
	function is_english() {
		$language = isset($_SESSION['language']) ? $_SESSION['language'] : '';
		return (strtolower($language) == 'en') ? true : false;
	}
}

/**
 * 判断是否是移动端访问
 *
 * @return boolean
 */
if (!function_exists('is_mobile_request')) {
	function is_mobile_request() {
		if (! isset ( $_SERVER ['HTTP_USER_AGENT'] )) {
			return false;
		}
		$_SERVER ['ALL_HTTP'] = isset ( $_SERVER ['ALL_HTTP'] ) ? $_SERVER ['ALL_HTTP'] : '';
		$mobile_browser = '0';
		if (preg_match ( '/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower ( $_SERVER ['HTTP_USER_AGENT'] ) ))
			$mobile_browser ++;
		if ((isset ( $_SERVER ['HTTP_ACCEPT'] )) and (strpos ( strtolower ( $_SERVER ['HTTP_ACCEPT'] ), 'application/vnd.wap.xhtml+xml' ) !== false))
			$mobile_browser ++;
		if (isset ( $_SERVER ['HTTP_X_WAP_PROFILE'] ))
			$mobile_browser ++;
		if (isset ( $_SERVER ['HTTP_PROFILE'] ))
			$mobile_browser ++;
		$mobile_ua = strtolower ( substr ( $_SERVER ['HTTP_USER_AGENT'], 0, 4 ) );
		$mobile_agents = array (
			'w3c ',
			'acs-',
			'alav',
			'alca',
			'amoi',
			'audi',
			'avan',
			'benq',
			'bird',
			'blac',
			'blaz',
			'brew',
			'cell',
			'cldc',
			'cmd-',
			'dang',
			'doco',
			'eric',
			'hipt',
			'inno',
			'ipaq',
			'java',
			'jigs',
			'kddi',
			'keji',
			'leno',
			'lg-c',
			'lg-d',
			'lg-g',
			'lge-',
			'maui',
			'maxo',
			'midp',
			'mits',
			'mmef',
			'mobi',
			'mot-',
			'moto',
			'mwbp',
			'nec-',
			'newt',
			'noki',
			'oper',
			'palm',
			'pana',
			'pant',
			'phil',
			'play',
			'port',
			'prox',
			'qwap',
			'sage',
			'sams',
			'sany',
			'sch-',
			'sec-',
			'send',
			'seri',
			'sgh-',
			'shar',
			'sie-',
			'siem',
			'smal',
			'smar',
			'sony',
			'sph-',
			'symb',
			't-mo',
			'teli',
			'tim-',
			'tosh',
			'tsm-',
			'upg1',
			'upsi',
			'vk-v',
			'voda',
			'wap-',
			'wapa',
			'wapi',
			'wapp',
			'wapr',
			'webc',
			'winw',
			'winw',
			'xda',
			'xda-'
		);
		if (in_array ( $mobile_ua, $mobile_agents )) {
			$mobile_browser ++;
		}
		if (strpos ( strtolower ( $_SERVER ['ALL_HTTP'] ), 'operamini' ) !== false) {
			$mobile_browser ++;
		}
		// Pre-final check to reset everything if the user is on Windows
		if (strpos ( strtolower ( $_SERVER ['HTTP_USER_AGENT'] ), 'windows' ) !== false) {
			$mobile_browser = 0;
		}
		// But WP7 is also Windows, with a slightly different characteristic
		if (strpos ( strtolower ( $_SERVER ['HTTP_USER_AGENT'] ), 'windows phone' ) !== false) {
			$mobile_browser ++;
		}
		if ($mobile_browser > 0) {
			return true;
		} else {
			return false;
		}
	}
}


/**
 * 二维数组根据某个字段排序
 * @param array $array 要排序的数组
 * @param string $keys   要排序的键字段
 * @param int $sort  排序类型  SORT_ASC     SORT_DESC
 * @return array 排序后的数组
 */
if (!function_exists('array_sort')) {
	function array_sort($array, $keys, $sort = SORT_DESC) {
		$keysValue = [];
		foreach ($array as $k => $v) {
			$keysValue[$k] = $v[$keys];
		}
		array_multisort($keysValue, $sort, $array);
		return $array;
	}
}



if (!function_exists('omission_string')) {
	function omission_string($str, $length) {
		$str = trim($str);
		$string = "";
		if (strlen($str) > $length) {
			for ($i = 0; $i < $length; $i++) {
				if (ord($str) > 127) {
					$string .= $str[$i] . $str[$i + 1] . $str[$i + 2];
					$i = $i + 2;
				} else {
					$string .= $str[$i];
				}
			}
			$string .= "...";
			return $string;
		}
		return $str;
	}
}


if (!function_exists('for_test')) {
	function for_test() {
		if (isset($_GET['test'])) {
			return $_GET['test'] == 1 ? true : false;
		} else {
			return false;
		}
	}
}
