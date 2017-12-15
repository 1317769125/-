<?php
function myImageResize($source_path, $target_width = 200, $target_height = 200, $fixed_orig = ''){
	$source_info = getimagesize($source_path);//获取图片信息
	$source_width = $source_info[0];
	$source_height = $source_info[1];
	$source_mime = $source_info['mime'];
	$ratio_orig = $source_width / $source_height;//资源图片的宽高比例
	if ($fixed_orig == 'width'){
		//宽度固定
		$target_height = $target_width / $ratio_orig;//根据比例和设置的宽度计算高度
	}elseif ($fixed_orig == 'height'){
		//高度固定
		$target_width = $target_height * $ratio_orig;//根据比例和设置的高度计算宽度
	}else{
		//最大宽或最大高
		if ($target_width / $target_height > $ratio_orig){//判断设置的宽高和资源图片的宽高的大小，取最大宽或高
			$target_width = $target_height * $ratio_orig;
		}else{
			$target_height = $target_width / $ratio_orig;
		}
	}
	switch ($source_mime){
		case 'image/gif':
			$source_image = imagecreatefromgif($source_path);
			break;

		case 'image/jpeg':
			$source_image = imagecreatefromjpeg($source_path);
			break;

		case 'image/png':
			$source_image = imagecreatefrompng($source_path);
			break;

		default:
			return false;
			break;
	}
	$target_image = imagecreatetruecolor($target_width, $target_height);
	imagecopyresampled($target_image, $source_image, 0, 0, 0, 0, $target_width, $target_height, $source_width, $source_height);
	//header('Content-type: image/jpeg');
	$imgArr = explode('.', $source_path);
	$target_path = $imgArr[0] . '_new.' . $imgArr[1];
	imagejpeg($target_image, $target_path, 100);
}
myImageResize('43.jpeg');