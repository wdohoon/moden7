<?php
#------------------------------------------------------------------------------
# 작업내용	:	공용 함수 관련
# 인    수	:
# 작성일자	:	2021-05-26
# 작 성 자	:	webtick@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

class CommonManager
{
	private $dbm;

	//	함수 부분 =========================================================================================================
	public function __construct()
	{
		$this->dbm				=	new DBManager();
	}

	public function goBack($msg = '', $frame = '')
	{
		echo '<meta content="text/html" charset="utf-8">';
		echo '<script>';
		if ( $msg != '' ) echo 'alert(\'' . $msg . '\');';
		if ( $frame == '' ) echo 'history.go(-1);';
		echo '</script>';
		exit;
	}

	public function goPage($url = '', $msg = '', $frame = '')
	{
		if ( $url == '' ) {
			echo '<meta content="text/html" charset="utf-8">';
			echo '<script>';
			if ( $msg != '' ) echo 'alert(\'' . $msg . '\');';
			if ( $frame == 'frame' ) {
				echo 'parent.location.href = \'' . $_SERVER['HTTP_REFERER'] . '\'';
			} else if ($frame == 'top') {
				echo 'top.location.href = \'' . $_SERVER['HTTP_REFERER'] . '\'';
			} else {
				echo 'location.href = \'' . $_SERVER['HTTP_REFERER'] . '\'';
			}
			echo '</script>';
		} else {
			echo '<meta content="text/html" charset="utf-8">';
			echo '<script>';
			if ( $msg != '' ) echo 'alert(\'' . $msg . '\');';
			if ( $frame == 'frame' ) {
				echo 'parent.location.href = \'' . $url . '\';';
			} else if ( $frame == 'top' ) {
				echo 'top.location.href = \'' . $url . '\';';
			} else {
				echo 'location.href = \'' . $url . '\';';
			}
			echo '</script>';
		}
		exit;
	}

	public function openerGoPage($url = '', $msg = '')
	{
		if ( $url == '' ) {
			echo '<meta content="text/html" charset="utf-8">';
			echo '<script>';
			if ( $msg != '' ) echo 'alert(\'' . $msg . '\');';
			echo 'window.close();';
			echo '</script>';
		} else {
			echo '<meta content="text/html" charset="utf-8">';
			echo '<script>';
			if ( $msg != '' ) echo 'alert(\'' . $msg . '\');';
			echo 'opener.location.href = \'' . $url . '\';';
			echo 'window.close();';
			echo '</script>';
		}
		exit;
	}

	public function goBackDialog($msg = '', $frame = '')
	{
		echo '<meta content="text/html" charset="utf-8">' . PHP_EOL;
		echo '<script>' . PHP_EOL;
		if ( $msg ) {
			echo '$( "#dialog-message", parent.document ).html("' . $msg . '");' . PHP_EOL;
		}
		echo '$( "#dialog-message", parent.document ).dialog({' . PHP_EOL;
		echo '	resizable			:	false,' . PHP_EOL;
		echo '	title				:	"확인",' . PHP_EOL;
		echo '	modal				:	true,' . PHP_EOL;
		echo '	closeOnEscape		:	false,' . PHP_EOL;
		echo '	position			:	{ my : "center", at : "center", of : window.top, collision : "none" },' . PHP_EOL;
		echo '	open				:	function(event, ui) {' . PHP_EOL;
		echo '		$(".ui-widget-header").remove();' . PHP_EOL;
		echo '		$(".ui-dialog-titlebar-close", $(this).parent()).hide();' . PHP_EOL;
		echo '		$(".ui-dialog").css("z-index",10000);' . PHP_EOL;
		echo '		$(".ui-widget-overlay").css("z-index",9999);' . PHP_EOL;
		echo '		$("body").css("overflow","hidden");' . PHP_EOL;
		echo '	},' . PHP_EOL;
		echo '	close: function(event, ui) {' . PHP_EOL;
		echo '		$("body").css("overflow","auto");' . PHP_EOL;
		echo '	},' . PHP_EOL;
		echo '	buttons				:	{' . PHP_EOL;
		echo '		"확인" : function() {' . PHP_EOL;
		if ( $frame ) {
			echo '			$( this ).dialog( "close" );' . PHP_EOL;
		} else {
			echo '			history.go(-1);' . PHP_EOL;
		}
		echo '		}' . PHP_EOL;
		echo '	}' . PHP_EOL;
		echo '});' . PHP_EOL;
		echo '</script>' . PHP_EOL;
		exit;
	}

	public function goPageDialog($url = '', $msg = '', $frame = '')
	{
		if ( $url ) {
			$goUrl				=	$url;
		} else {
			$goUrl				=	$_SERVER['HTTP_REFERER'];
		}

		echo '<meta content="text/html" charset="utf-8">' . PHP_EOL;
		echo '<script>' . PHP_EOL;
		if ( $msg ) {
			echo '$( "#dialog-message", parent.document ).html("' . $msg . '");' . PHP_EOL;
		}
		echo '$( "#dialog-message", parent.document ).dialog({' . PHP_EOL;
		echo '	resizable			:	false,' . PHP_EOL;
		echo '	modal				:	true,' . PHP_EOL;
		echo '	title				:	"확인",' . PHP_EOL;
		echo '	closeOnEscape		:	false,' . PHP_EOL;
		echo '	position			:	{ my : "center", at : "center", of : window.top, collision : "none" },' . PHP_EOL;
		echo '	open				:	function(event, ui) {' . PHP_EOL;
		echo '		$(".ui-widget-header").remove();' . PHP_EOL;
		echo '		$(".ui-dialog-titlebar-close", $(this).parent()).hide();' . PHP_EOL;
		echo '		$(".ui-dialog").css("z-index",10000);' . PHP_EOL;
		echo '		$(".ui-widget-overlay").css("z-index",9999);' . PHP_EOL;
		echo '		$("body").css("overflow","hidden");' . PHP_EOL;
		echo '	},' . PHP_EOL;
		echo '	close: function(event, ui) {' . PHP_EOL;
		echo '		$("body").css("overflow","auto");' . PHP_EOL;
		echo '	},' . PHP_EOL;
		echo '	buttons				:	{' . PHP_EOL;
		echo '		"확인" : function() {' . PHP_EOL;

		if ( $frame == 'frame' ) {
			echo '		parent.location.href = "' . $goUrl . '"' . PHP_EOL;
		} else if ($frame == 'top') {
			echo '		top.location.href = "' . $goUrl . '"' . PHP_EOL;
		} else {
			echo '		location.href = "' . $goUrl . '"' . PHP_EOL;
		}

		echo '		}' . PHP_EOL;
		echo '	}' . PHP_EOL;
		echo '});' . PHP_EOL;
		echo '</script>' . PHP_EOL;

		exit;
	}

	//	윈쪽에서 문자열 자르기	=============================================
	public function left($str, $length)
	{
		return substr($str, 0, $length);
	}
	//	윈쪽에서 문자열 자르기	=============================================

	//	오른쪽에서 문자열 자르기	=========================================
	public function right($str, $length)
	{
		return substr($str, -$length);
	}
	//	오른쪽에서 문자열 자르기	=========================================

	//	전체 공백 제거	=====================================================
	public function aTrim($str)
	{
		return preg_replace('/\s+/', '', $str);
	}
	//	전체 공백 제거	=====================================================

	//	날짜 차이 계산	=====================================================
	public function dateDiff($date1, $date2)
	{
		$_date1					=	explode('-',$date1); 
		$_date2					=	explode('-',$date2);
		$tm1					=	mktime(0,0,0,$_date1[1],$_date1[2],$_date1[0]); 
		$tm2					=	mktime(0,0,0,$_date2[1],$_date2[2],$_date2[0]);
		return ($tm1 - $tm2) / 86400;
	}
	//	날짜 차이 계산	=====================================================

	// 'HH:mm:ss' 형태의 시간을 초로 환산
	public function getSeconds($HMS)
	{
		$tmp					=	explode(':', $HMS);
		$std					=	mktime(0,0,0,date('n'),date('j'),date('Y'));
		$scd					=	mktime(intval($tmp[0]), intval($tmp[1]), intval($tmp[2]));

		return intval($scd-$std);
	}
	// 'HH:mm:ss' 형태의 시간을 초로 환산

	// 초를 'HH:mm:ss' 형태로 환산
	public function getTimeFromSeconds($seconds)
	{
		$h						=	sprintf('%02d', intval($seconds) / 3600);
		$tmp					=	$seconds % 3600;
		$m						=	sprintf('%02d', $tmp / 60);
		$s						=	sprintf('%02d', $tmp % 60);

		//return $h.':'.$m.':'.$s;
		if ( $h > 0 ) {
			return $h . '시간';
		} else {
			return $m . '분';
		}
	}
	// 초를 'HH:mm:ss' 형태로 환산

	// 글자수 자르기
	public function utf8_substr($str, $len=10)
	{
		$str_split				=	preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
		$str_slice				=	array_slice($str_split, 0, $len);
		$str					=	join('', $str_slice);

		if ( strlen($str) > $len ) $dot = '....';

		return $str.$dot;
	}

	//	외부 서버 이미지 가져오기
	public function getWebImg($hostURL, $imgUrl, $savePath)
	{
		$saveImgUrl				=	'';
		$hostURL1				=	str_replace('http://', '', $hostURL);
		$pos					=	strpos($imgUrl, $hostURL1);

		//echo('hostURL : ' . $hostURL . '<br>');
		//echo('hostURL1 : ' . $hostURL1 . '<br>');
		//echo('imgUrl : ' . $imgUrl . '<br>');
		//echo('savePath : ' . $savePath . '<br>');

		if ( $pos > 0 ) {
			$imgUrl				=	str_replace($hostURL, '', $imgUrl);
			//echo('imgUrl : ' . $imgUrl . '<br>');
			$imgUrlArr			=	explode('/', $imgUrl);
			$saveImgUrl			=	'';

			for ( $i = 0; $i < count($imgUrlArr); $i++ )
			{
				if ( $i == count($imgUrlArr)-1 ) {
					$saveImg	=	$imgUrlArr[$i];
				}
			}

			//echo('saveImg : ' . $saveImg . '<br><br>');

			$fp					=	fsockopen($hostURL1, 80, $errno, $errstr, 30);
			if ( !$fp ) {
				echo "$errstr ($errno)<br>\n";
			} else {
				fputs ($fp, "GET $imgUrl HTTP/1.0\r\n\r\n");
				while ( !feof($fp) )
				{
					$img_source .= fgets($fp, 128);
				}
				$img_split		=	explode("\r\n\r\n", $img_source);
				$content		=	$img_split[1];

				fclose($fp);
				file_put_contents($savePath.$saveImg,$content);
			}
		}
		return $saveImg;
	}
	//	외부 서버 이미지 가져오기

	//	임의(Random)의 문자열 생성 하는 함수
	public function getRandomString($type = '', $len = 10)
	{
		$lowercase				=	'abcdefghijklmnopqrstuvwxyz';
		$uppercase				=	'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$numeric				=	'0123456789';
		$special				=	'`~!@#$%^&*()-_=+\\|[{]};:\'",<.>/?';
		$key					=	'';
		$token					=	'';

		if ( $type == '' ) {
			$key				=	$lowercase.$uppercase.$numeric;
		} else {
			if ( strpos($type, '09') > -1 ) $key	.=	$numeric;
			if ( strpos($type, 'az') > -1 ) $key	.=	$lowercase;
			if ( strpos($type, 'AZ') > -1 ) $key	.=	$uppercase;
			if ( strpos($type, '$') > -1 ) $key		.=	$special;
		}

		for ($i = 0; $i < $len; $i++)
		{
			$token				.=	$key[mt_rand(0, strlen($key) - 1)];
		}
		return $token;
	}

	// 사용예
	// echo '기본 : ' . getRandomString() . '<br />';
	// echo '숫자만 : ' . getRandomString('09') . '<br />';
	// echo '숫자만 30글자 : ' . getRandomString('09', 30) . '<br />';
	// echo '소문자만 : ' . getRandomString('az') . '<br />';
	// echo '대문자만 : ' . getRandomString('AZ') . '<br />';
	// echo '소문자+대문자 : ' . getRandomString('azAZ') . '<br />';
	// echo '소문자+숫자 : ' . getRandomString('az09') . '<br />';
	// echo '대문자+숫자 : ' . getRandomString('AZ09') . '<br />';
	// echo '소문자+대문자+숫자 : ' . getRandomString('azAZ09') . '<br />';
	// echo '특수문자만 : ' . getRandomString('$') . '<br />';
	// echo '숫자+특수문자 : ' . getRandomString('09$') . '<br />';
	// echo '소문자+특수문자 : ' . getRandomString('az$') . '<br />';
	// echo '대문자+특수문자 : ' . getRandomString('AZ$') . '<br />';
	// echo '소문자+대문자+특수문자 : ' . getRandomString('azAZ$') . '<br />';
	// echo '소문자+대문자+숫자+특수문자 : ' . getRandomString('azAZ09$') . '<br />';
	//	임의(Random)의 문자열 생성 하는 함수
	//	함수 부분 =========================================================================================================

	//	요일 구하기	=========================================
	public function getDayName($week)
	{
		switch ($week) { 
			case ('0') : $nm_week = '일요일'; break;
			case ('1') : $nm_week = '월요일'; break;
			case ('2') : $nm_week = '화요일'; break;
			case ('3') : $nm_week = '수요일'; break;
			case ('4') : $nm_week = '목요일'; break;
			case ('5') : $nm_week = '금요일'; break;
			case ('6') : $nm_week = '토요일'; break;
			default :
		}

		return $nm_week;
	}
	//	요일 구하기	=========================================
	//	함수 부분 =========================================================================================================

	public function debugWrite($debugData)
	{
		$logfile				=	fopen($_SERVER['DOCUMENT_ROOT'] . '/saveLog/debug/debug_' . date('Y-m-d',time()) . '.log', 'a+');
		fwrite( $logfile, "\r\n\r\n");
		fwrite( $logfile, "======================================================================\r\n");
		fwrite( $logfile, date('Y-m-d H:i:s',time()) . "\r\n" . $_SERVER['PHP_SELF'] . "\r\n");
		fwrite( $logfile, "\r\n" . $debugData . "\r\n");
		fclose( $logfile );
	}
}
?>