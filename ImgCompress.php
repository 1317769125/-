<?php

/**
 * ��Դ��http://www.vephp.com  ά��ѧԺ��
 * �����뱣����ַ�����ر����Ͷ��ɹ���лл��
 * ͼƬѹ���ࣺͨ��������ѹ�������Ҫ����Դͼ�������Ѳ���$percent����Ϊ1���ɡ�
 * ��ʹԭ����ѹ����Ҳ�ɴ������С���������4MͼƬ��Ҳ������Ϊ700KB���ҡ������С��������������С��
 * ������ɱ��桢��ֱ����ʾ��
 */
class imgcompress{

	private $src;
	private $image;
	private $imageinfo;
	private $percent = 0.5;

	/**
	 * ͼƬѹ��
	 * @param $src Դͼ
	 * @param float $percent  ѹ������
	 */
	public function __construct($src, $percent=1)
	{
		$this->src = $src;
		$this->percent = $percent;
	}


	/** ����ѹ��ͼƬ
	 * @param string $saveName  �ṩͼƬ�����ɲ�����չ������Դͼ��չ�������ڱ��档���ṩ�ļ���ֱ����ʾ
	 */
	public function compressImg($saveName='')
	{
		$this->_openImage();
		if(!empty($saveName)) $this->_saveImage($saveName);  //����
		else $this->_showImage();
	}

	/**
	 * �ڲ�����ͼƬ
	 */
	private function _openImage()
	{
		list($width, $height, $type, $attr) = getimagesize($this->src);
		$this->imageinfo = array(
			'width'=>$width,
			'height'=>$height,
			'type'=>image_type_to_extension($type,false),
			'attr'=>$attr
		);
		$fun = "imagecreatefrom".$this->imageinfo['type'];
		$this->image = $fun($this->src);
		$this->_thumpImage();
	}
	/**
	 * �ڲ�������ͼƬ
	 */
	private function _thumpImage()
	{
		$new_width = $this->imageinfo['width'] * $this->percent;
		$new_height = $this->imageinfo['height'] * $this->percent;
		$image_thump = imagecreatetruecolor($new_width,$new_height);
		//��ԭͼ���ƴ�ͼƬ�������棬���Ұ���һ������ѹ��,����ı�����������
		imagecopyresampled($image_thump,$this->image,0,0,0,0,$new_width,$new_height,$this->imageinfo['width'],$this->imageinfo['height']);
		imagedestroy($this->image);
		$this->image = $image_thump;
	}
	/**
	 * ���ͼƬ:����ͼƬ����saveImage()
	 */
	private function _showImage()
	{
		header('Content-Type: image/'.$this->imageinfo['type']);
		$funcs = "image".$this->imageinfo['type'];
		$funcs($this->image);
	}
	/**
	 * ����ͼƬ��Ӳ�̣�
	 * @param  string $dstImgName  1����ָ���ַ���������׺�����ƣ�ʹ��Դͼ��չ�� ��2��ֱ��ָ��Ŀ��ͼƬ������չ����
	 */
	private function _saveImage($dstImgName)
	{
		if(empty($dstImgName)) return false;
		$allowImgs = ['.jpg', '.jpeg', '.png', '.bmp', '.wbmp','.gif'];   //���Ŀ��ͼƬ���к�׺����Ŀ��ͼƬ��չ�� ��׺�����û�У�����Դͼ����չ��
		$dstExt =  strrchr($dstImgName ,".");
		$sourseExt = strrchr($this->src ,".");
		if(!empty($dstExt)) $dstExt =strtolower($dstExt);
		if(!empty($sourseExt)) $sourseExt =strtolower($sourseExt);

		//��ָ��Ŀ������չ��
		if(!empty($dstExt) && in_array($dstExt,$allowImgs)){
			$dstName = $dstImgName;
		}elseif(!empty($sourseExt) && in_array($sourseExt,$allowImgs)){
			$dstName = $dstImgName.$sourseExt;
		}else{
			$dstName = $dstImgName.$this->imageinfo['type'];
		}
		$funcs = "image".$this->imageinfo['type'];
		$funcs($this->image,$dstName);
	}

	/**
	 * ����ͼƬ
	 */
	public function __destruct(){
		imagedestroy($this->image);
	}

}