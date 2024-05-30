<?php
#------------------------------------------------------------------------------
# 작업내용	:	파일 관리
# 인    수	:
# 작성일자	:	2021-05-26
# 작 성 자	:	webtick@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

class FileManager
{
	//	디렉토리 생성
	public function setMakeDir($defaultPath, $corpCode, $basePath='', $optionPath1='', $optionPath2='', $dirPermission='')
	{
		$msg					=	new Message();

		$uploadPath				=	$defaultPath . '/' . $corpCode . '/';
		if ( !is_dir($uploadPath) ) @mkdir($uploadPath, $dirPermission);

		if ( $basePath ) {
			$uploadPath			=	$uploadPath . $basePath . '/';
			if (!is_dir($uploadPath)) @mkdir($uploadPath, $dirPermission);
		}

		if ( $optionPath1 ) {
			$uploadPath			=	$uploadPath . $optionPath1 . '/';
			if ( !is_dir($uploadPath) ) @mkdir($uploadPath, $dirPermission);
		}

		if ( $optionPath2 == 'Ymd' ) {
			$uploadPath			=	$uploadPath . date('Y') . '/';
			if ( !is_dir($uploadPath) ) @mkdir($uploadPath, $dirPermission);

			$uploadPath			=	$uploadPath . date('Ym') . '/';
			if ( !is_dir($uploadPath) ) @mkdir($uploadPath, $dirPermission);

			$uploadPath			=	$uploadPath . date('Ymd') . '/';
			if ( !is_dir($uploadPath) ) @mkdir($uploadPath, $dirPermission);
		} else if ( $optionPath2 == 'Ym' ) {
			$uploadPath			=	$uploadPath . date('Y') . '/';
			if ( !is_dir($uploadPath) ) @mkdir($uploadPath, $dirPermission);

			$uploadPath			=	$uploadPath . date('Ym') . '/';
			if ( !is_dir($uploadPath) ) @mkdir($uploadPath, $dirPermission);
		} else if ( $optionPath2 == 'Y' ) {
			$uploadPath			=	$uploadPath . date('Y') . '/';
			if ( !is_dir($uploadPath) ) @mkdir($uploadPath, $dirPermission);
		} else if ( $optionPath2 ) {
			$uploadPath			=	$uploadPath . $optionPath2 . '/';
			if ( !is_dir($uploadPath) ) @mkdir($uploadPath, $dirPermission);
		}

		return $uploadPath;
	}

	/**
	 * uploadFileCopy($source_file, $target_file)
	 *
	 * 업로드 받은 파일을 검증하고 목표 위치로 이동시킵니다.
	 **/
	public function uploadFileCopy($source_file, $target_file)
	{
		$msg					=	new Message();

		if ( !$source_file || !$target_file ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( file_exists($target_file) ) {
			$msg->setMessage('이미 해당 경로에 존재하는 파일 이름입니다.');
			return $msg;
		}

		if ( file_exists($source_file) ) {
			if ( copy($source_file, $target_file) ) {
				$msg->setResult(true);
				$msg->setMessage("파일이 복사되었습니다.");
				return $msg;
			}
		}
	}

	/**
	 * uploadFile($source_file, $target_file)
	 *
	 * 업로드 받은 파일을 검증하고 목표 위치로 이동시킵니다.
	 **/
	public function uploadFile($source_file, $target_file)
	{
		$msg					=	new Message();

		if ( !$source_file || !$target_file ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( file_exists($target_file) ) {
			$msg->setMessage('이미 해당 경로에 존재하는 파일 이름입니다.');
			return $msg;
		}

		//	파일 검사
		$source_info			=	pathinfo($target_file);
		$fileExt				=	$source_info['extension'];
		$notExt					=	'php, php3, php4, php5, php7, exe, cgi, phtml, html, htm, pl, sh, asp, aspx, jar, jsp, inc, dll';

		if ( strpos($notExt, $fileExt) !== false ) {
			$msg->setMessage('올바르지 못한 파일입니다.');
			return $msg;
		}

		if ( file_exists($source_file) ) {
			if ( move_uploaded_file($source_file, $target_file) ) {
				$msg->setResult(true);
				$msg->setMessage("파일이 업로드되었습니다.");
				return $msg;
			}
		}
	}

	/**
	 * uploadImg(string SOURCE_FILE, string TARGET_FILE[, string THUMB_FILE][, int THUMB_WIDTH][, int THUMB_HEIGHT])
	 *
	 * 업로드 받은 이미지를 검증하고 목표 위치로 이동시킵니다.
	 * 썸네일 경로/이름이 존재하면 썸네일을 생성합니다.
	 *
	 * @param string $source_file	: $_FILES[tmp_name]
	 * @param string $target_file	: 저장될 파일 (경로포함)
	 * @param string $thumb_file	: 썸네일 저장될 파일 (경로포함)
	 * @param int $thumb_width, int $thumb_height : 썸네일 가로/세로 (default 150px * 100px)
	 * @return Message obj
	 **/
	public function uploadImg($source_file, $target_file, $thumb_file='', $thumb_width=150, $thumb_height=100)
	{
		$msg					=	new Message();

		if ( !$source_file || !$target_file ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( file_exists($target_file) ) {
			$msg->setMessage('이미 해당 경로에 존재하는 파일 이름입니다.');
			return $msg;
		}

		if ( file_exists($source_file) && list($source_width, $source_height, $source_type, $source_attr) = getimagesize($source_file) ) {
			if ( $source_width < 1 || $source_height < 1 ) {
				$msg->setMessage('올바르지 못한 이미지 파일입니다.');
				return $msg;
			}

			if ( $source_type > 3 ) {												//	1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order, 9 = JPC, 10 = JP2, 11 = JPX, 12 <br>= JB2, 13 = SWC, 14 = IFF
				$msg->setMessage('이미지 파일은 gif, jpg, png만 가능합니다.');
				return $msg;
			}

//			if ( $thumb_file ) {
//				$thumb_result_msg = $this->createThumbnailImg($source_file, $thumb_file, $thumb_width, $thumb_height);
//			}

			if ( move_uploaded_file($source_file, $target_file) ) {
				if ( $thumb_file ) {
					$thumb_result_msg = $this->createThumbnailImg($target_file, $thumb_file, $thumb_width, $thumb_height);
				}

				$msg->setResult(true);
				$msg->setMessage("이미지 파일이 업로드되었습니다.");
				return $msg;
			}
		} else {
			$msg->setMessage('올바르지 못한 파일입니다.');
			return $msg;
		}
	}

	/**
	 * createThumbnailImg(string SOURCE_FILE, string TARGET_FILE, int WIDTH, int HEIGHT)
	 *
	 * 이미지 파일로부터 썸네일 이미지를 생성합니다.
	 *
	 * @param string $source_file	: 원본 이미지 파일 (경로포함)
	 * @param string $target_file	: 생성될 썸네일 파일 (경로포함)
	 * @param int $thumb_width, int $thumb_height : 썸네일 가로/세로
	 * @return Message obj
	 **/
	public function createThumbnailImg($source_file, $target_file, $width, $height)
	{
		$msg					=	new Message();

		if ( file_exists($source_file) && list($source_width, $source_height, $source_type, $source_attr) = getimagesize($source_file) ) {
			if ($source_width<1 || $source_height<1) {
				$msg->setMessage('올바르지 못한 이미지 파일입니다.');
				return $msg;
			}

			if ( function_exists('imagecreatetruecolor') ) {
				$thumb			=	imagecreatetruecolor($width, $height);
			} else if ( function_exists('imagecreate') ) {
				$thumb			=	imagecreate($width, $height);
			} else {
				$msg->setMessage('썸네일 생성 중 오류가 발생했습니다.');
				return $msg;
			}

			if ( !$thumb ) {
				$msg->setMessage('썸네일 생성 중 오류가 발생했습니다.');
				return $msg;
			}

			$white				=	imagecolorallocate($thumb, 255, 255, 255);
			imagefilledrectangle($thumb, 0, 0, $width-1, $height-1, $white);

			switch ( $source_type )
			{
				case '1' :
					if ( !function_exists('imagecreatefromgif') ) return $msg;
					$source		=	@imagecreatefromgif($source_file);
					break;
				case '2' :
					if ( !function_exists('imagecreatefromjpeg') ) return $msg;
					$source		=	@imagecreatefromjpeg($source_file);
					break;
				case '3' :
					if ( !function_exists('imagecreatefrompng') ) return $msg;
					$source		=	@imagecreatefrompng($source_file);
					break;
				default :
					imagedestroy($thumb);
					$msg->setMessage('이미지 파일은 gif, jpg, png만 가능합니다.');
					return $msg;
			}

			if ( $source ) {
				if ( function_exists('imagecopyresampled') ) imagecopyresampled($thumb, $source, 0, 0, 0, 0, $width, $height, $source_width, $source_height);
				else imagecopyresized($thumb, $source, 0, 0, 0, 0, $width, $height, $width, $height);
			} else {
				$msg->setMessage('썸네일 생성 중 오류가 발생했습니다.');
				return $msg;
			}

			$path				=	dirname($target_file);
			if ( !is_dir($path) ) mkdir($path, 0755);

			switch ( $source_type )
			{
				case '1' :
					if ( !function_exists('imagegif') ) return $msg;
					$output		=	imagegif($thumb, $target_file);
					break;
				case '2' :
					if ( !function_exists('imagejpeg') ) return false;
					$output		=	imagejpeg($thumb, $target_file, 100);
					break;
				case '3' :
					if ( !function_exists('imagepng') ) return false;
					$output		=	imagepng($thumb, $target_file, 9);
					break;
			}

			imagedestroy($thumb);
			imagedestroy($source);

			@chmod($target_file, 0644);

			if ( !$output ) {
				$msg->setMessage('썸네일 생성 중 오류가 발생했습니다.');
				return $msg;
			}

			$msg->setResult(true);
			$msg->setMessage("$target_file 썸네일이 생성되었습니다.");
			return $msg;
		}
	}

	/**
	 * fileDownload(string SOURCE_FILE, string DOWN_FILE_NAME)
	 *
	 * 파일 다운로드 시 임의의 파일명으로 내려받게 합니다.
	 *
	 * @param string $source_file		: 서버에 저장된 파일 (경로포함)
	 * @param string $down_file_name	: 클라이언트에서 내려받을 파일명
	 **/
	public function fileDownload($source_file, $down_file_name)
	{
		$msg					=	new Message();

		if ( !$source_file || !file_exists($source_file) || !$down_file_name ) {
			echo '<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">';
			//echo '<script type="text/javascript">alert("파일을 내려받는 중 오류가 발생했습니다.");history.go(-1);</script>';
			//echo $source_file.'<br>'; 
			//echo $down_file_name;
			//echo file_exists($source_file);
			echo '<script type="text/javascript">alert("파일을 내려받는 중 오류가 발생했습니다.");</script>';
			exit;
		}

		//	$source_file 내에 저장된 파일 풀 경로를 가지고 있다고 가정
		$filepath				=	str_replace('\\', '/', realpath($source_file));
		$filesize				=	filesize($filepath);
		$source_file			=	substr(strrchr('/'.$filepath, '/'), 1);
		$extension				=	strtolower(substr(strrchr($filepath, '.'), 1));

		$down_file_name			=	urldecode($down_file_name);
		if ( preg_match('/^utf/i', mb_detect_encoding($down_file_name)) ) {
			$down_file_name		=	urlencode($down_file_name);
		} else {
			$down_file_name		=	$down_file_name;
		}

		//	IE인가 HTTP_USER_AGENT로 확인
		$ie						=	isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false; 

		//	IE인경우 한글파일명이 깨지는 경우를 방지하기 위한 코드 
		if ( $ie ) {
			$down_file_name		=	iconv('utf-8', 'UTF-8', urldecode($down_file_name));
		}

		//기본 헤더 적용
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="' . $down_file_name . '"');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: '.sprintf('%d', $filesize));
		header('Expires: 0');

		//	IE를 위한 헤더 적용
		if ( $ie ) {
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
		} else {
			header('Pragma: no-cache');
		}

		//	해당 파일을 binary로 읽어와 출력
		$handle					=	fopen($filepath, 'rb');
		fpassthru($handle);
		fclose($handle);
	}

	// 리사이즈 할 이미지 width, height 구하기
	public function getImageResizeInfo($file)
	{
		list($width, $height, $source_type, $source_attr) = getimagesize($file);

		$newwidth = $width;
		$newheight = $height;

		if($width > 746) {
			$dst_w = 746;
			$dst_h = 484;

			$ratio = $width / $height;

			if ($dst_w/$dst_h > $ratio) {
				$newwidth = $dst_w;
				$newheight = ceil(($dst_w/$width) * $height);
			} else {
				$newheight = $dst_w/$ratio;
				$newwidth = $dst_w;
			}
		}

		return ['width' => $newwidth, 'height' => $newheight];
	}
}
?>