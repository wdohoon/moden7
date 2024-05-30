<?php
#------------------------------------------------------------------------------
# 작업내용	:	함수 관련
# 인    수	:
# 작성일자	:	2021-05-26
# 작 성 자	:	webtick@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

//	===========================================
//	strip_tags
function stripTags($data)
{
	//	strip_tags($user_input, '<img><b>');
	if ( $data ) {
		if ( is_array($data) ) {
			foreach ( $data as $key => $value ) {
				$data[$key]		=	strip_tags(trim($value));
			}
			return $data;
		} else {
			return strip_tags(trim($data));
		}
	} else {
		return $data;
	}
}

//	addslashes
function dataAddslashes($data)
{
	if ( $data ) {
		if ( is_array($data) ) {
			foreach ( $data as $key => $value ) {
				$data[$key]		=	addslashes(trim($value));
			}
			return $data;
		} else {
			return addslashes(trim($data));
		}
	} else {
		return $data;
	}
}

//	remove AllTags
function allTags($data)
{
	if ( $data ) {
		if (is_array($data) ) {
			foreach ( $data as $key => $value ) {
				$data[$key]		=	strip_tags(addslashes(trim($value)));
			}
			return $data;
		} else {
			return strip_tags(addslashes(trim($data)));
		}
	} else {
		return $data;
	}
}

//	remove HTML
function removeHTML($data)
{
	if ( $data ) {
		return htmlspecialchars(trim($data));
	} else {
		return $data;
	}
}

//	return HTML
function returnHTML($data)
{
	if ( $data ) {
		return htmlspecialchars_decode(trim($data));
	} else {
		return $data;
	}
}
//	===========================================

function strLenCut($str, $strLen)
{
	if ( mb_strlen($str, 'UTF-8') > $strLen ) {
		return mb_substr($str, 0, $strLen, 'utf-8') . '...';
	} else {
		return mb_substr($str, 0, $strLen, 'utf-8');
	}
}

//	윈쪽에서 문자열 자르기	=============================================
function left($str, $length)
{
	return substr($str, 0, $length);
}
//	윈쪽에서 문자열 자르기	=============================================

//	오른쪽에서 문자열 자르기	=========================================
function right($str, $length)
{
	return substr($str, -$length);
}
//	오른쪽에서 문자열 자르기	=========================================

//	전체 공백 제거	=====================================================
function aTrim($str)
{
	return preg_replace('/\s+/', '', $str);
}
//	전체 공백 제거	=====================================================

//	랜덤 문자열  생성 함수	=============================================
function getRandomString($type = '', $len = 10)
{
	$lowercase					=	'abcdefghijklmnopqrstuvwxyz';
	$uppercase					=	'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$numeric					=	'0123456789';
	$special					=	'`~!@#$%^&*()-_=+\\|[{]};:\'",<.>/?';
	$key						=	'';
	$token						=	'';

	if ( $type == '' ) {
		$key					=	$lowercase . $uppercase . $numeric;
	} else {
		if ( strpos($type,'09') > -1 ) $key			.=	$numeric;
		if ( strpos($type,'az') > -1 ) $key			.=	$lowercase;
		if ( strpos($type,'AZ') > -1 ) $key			.=	$uppercase;
		if ( strpos($type,'$') > -1 ) $key			.=	$special;
	}

	for ($i = 0; $i < $len; $i++)
	{
		$token					.=	$key[mt_rand(0, strlen($key) - 1)];
	}
	return $token;
}
//	랜덤 문자열  생성 함수	=============================================

//	파일 용량 변환	=====================================================
//	사용법 : bytesToSize($bytes, 0);
function bytesToSize($bytes, $decimals = 2)
{
	if ( $bytes > 0 ) {
		$size					=	array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
		$factor					=	floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f ", $bytes / pow(1024, $factor)) . @$size[$factor];
	} else {
		return 0;
	}
}
//	파일 용량 변환	=====================================================

//	암호화 / 복호화	=====================================================
function encrypt($string)
{
	$key						=	'webtick@gmail.com';
	$result						=	'';

	for ( $i=0; $i<strlen($string); $i++ )
	{
		$char					=	substr($string, $i, 1);
		$keychar				=	substr($key, ($i % strlen($key))-1, 1);
		$char					=	chr(ord($char)+ord($keychar));
		$result					.=	$char;
	}
	return base64_encode($result);
}

function decrypt($string)
{
	$key						=	'webtick@gmail.com';
	$result						=	'';
	$string						=	base64_decode($string);

	for ( $i=0; $i<strlen($string); $i++ )
	{
		$char					=	substr($string, $i, 1);
		$keychar				=	substr($key, ($i % strlen($key))-1, 1);
		$char					=	chr(ord($char)-ord($keychar));
		$result					.=	$char;
	}
	return $result;
}
//	암호화 / 복호화	=====================================================

//	날짜 유효성 검사	=================================================
function dateValidate($chkDate)
{
	$chkDates					=	explode('-', $chkDate);

	$chkYear					=	$chkDates[0];
	$chkMonth					=	$chkDates[1];
	$chkDay						=	$chkDates[2];

	if ( checkdate($chkMonth, $chkDay, $chkYear) ) {
		return 'Y';
	} else {
		return 'N';
	}
}
//	날짜 유효성 검사	=================================================

//	new 아이콘 표시
function newIcon($regDate, $interval)
{
	$currentTime				=	time();

	$date						=	substr($regDate, 0, 10);
	$time						=	substr($regDate, 11, 8);
	$date						=	explode('-', $date);
	$time						=	explode(':', $time);

	$timestamp					=	mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]);

	###### $interval 동안 New 버튼을 표시 한다. 참고 -> 24 * 3600 : 1일
	if ( $currentTime - $timestamp <= $interval * 3600 ) {
		return '<img src="/images/iconNew.gif" width="16" height="16" border="0" align="absmiddle">';
	}
}
//	new 아이콘 표시

//	정규식을 이용한 자동링크 걸기
function alink($data)
{
	// http
	$data						=	preg_replace("/http:\/\/([0-9a-z-.\/@~?&=_]+)/i", "<a href=\"http://\\1\" target='_blank'>http://\\1</a>", $data);
	// ftp
	$data						=	preg_replace("/ftp:\/\/([0-9a-z-.\/@~?&=_]+)/i", "<a href=\"ftp://\\1\" target='_blank'>ftp://\\1</a>", $data);
	// email
	$data						=	preg_replace("/([_0-9a-z-]+(\.[_0-9a-z-]+)*)@([0-9a-z-]+(\.[0-9a-z-]+)*)/i", "<a href=\"mailto:\\1@\\3\">\\1@\\3</a>", $data);
	return $data;
}
//	정규식을 이용한 자동링크 걸기

//	현재 접속이 모바일인지 PC인지 체크 코드
function mobileCheck()
{
	$userAgent					=	$_SERVER['HTTP_USER_AGENT'];
	//$MobileArray				=	array("iphone","lgtelecom","skt","mobile","samsung","nokia","blackberry","android","android","sony","phone");
	$MobileArray				=	array("iphone","ipod","android","blackberry","opera mini","windows ce","nokia","sony");

	$checkCount					=	0;
	for ( $i=0; $i<sizeof($MobileArray); $i++ )
	{
		if ( preg_match("/$MobileArray[$i]/", strtolower($userAgent)) ) {
			$checkCount++; break;
		}
	}
	//return ($checkCount >= 1) ? "Mobile" : "Computer";
	return ($checkCount >= 1) ? 'Y' : 'N';
}
//	현재 접속이 모바일인지 PC인지 체크 코드

//	현재 접속한 도메인이 모바일인지 PC인지 체크 코드
function domainCheck()
{
	$domain						=	$_SERVER['HTTP_HOST'];
	$arrDomain					=	explode('.', $domain);

	if ( $arrDomain[0] == 'm' ) {
		return 'Y';
	} else {
		return 'N';
	}
}
//	현재 접속한 도메인이 모바일인지 PC인지 체크 코드

//	접속 아이피
function getConnIP()
{
	if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) {														//	공용 IP 확인
		$connIP					=	$_SERVER['HTTP_CLIENT_IP'];
	} elseif ( !empty($_SERVER["HTTP_X_FORWARDED_FOR"]) ) {											//	프록시 사용하는지 확인
		$connIP					=	$_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$connIP					=	$_SERVER['REMOTE_ADDR'];
	}

	return $connIP;
}
//	접속 아이피

//	현재 시간 밀리세컨드 포함
function getMillisecond()
{
	list($microtime,$timestamp)	=	explode(' ',microtime());
	$time						=	$timestamp.substr($microtime, 2, 3);

	return $time;
}
//	현재 시간 밀리세컨드 포함

//	파일 MimeType 알아내기
function getMimeType($filename)
{
	$mime_types					=	array
										(
											'txt'			=>	'text/plain',
											'htm'			=>	'text/html',
											'html'			=>	'text/html',
											'php'			=>	'text/html',
											'css'			=>	'text/css',
											'js'			=>	'application/javascript',
											'json'			=>	'application/json',
											'xml'			=>	'application/xml',
											'swf'			=>	'application/x-shockwave-flash',
											'flv'			=>	'video/x-flv',

											// images
											'png'			=>	'image/png',
											'jpe'			=>	'image/jpeg',
											'jpeg'			=>	'image/jpeg',
											'jpg'			=>	'image/jpeg',
											'gif'			=>	'image/gif',
											'bmp'			=>	'image/bmp',
											'ico'			=>	'image/vnd.microsoft.icon',
											'tiff'			=>	'image/tiff',
											'tif'			=>	'image/tiff',
											'svg'			=>	'image/svg+xml',
											'svgz'			=>	'image/svg+xml',

											// archives
											'zip'			=>	'application/zip',
											'rar'			=>	'application/x-rar-compressed',
											'exe'			=>	'application/x-msdownload',
											'msi'			=>	'application/x-msdownload',
											'cab'			=>	'application/vnd.ms-cab-compressed',

											// audio/video
											'mp3'			=>	'audio/mpeg',
											'qt'			=>	'video/quicktime',
											'mov'			=>	'video/quicktime',

											// adobe
											'pdf'			=>	'application/pdf',
											'psd'			=>	'image/vnd.adobe.photoshop',
											'ai'			=>	'application/postscript',
											'eps'			=>	'application/postscript',
											'ps'			=>	'application/postscript',

											// ms office
											'doc'			=>	'application/msword',
											'rtf'			=>	'application/rtf',
											'xls'			=>	'application/vnd.ms-excel',
											'ppt'			=>	'application/vnd.ms-powerpoint',

											// open office
											'odt'			=>	'application/vnd.oasis.opendocument.text',
											'ods'			=>	'application/vnd.oasis.opendocument.spreadsheet',
										);

	$ext						=	strtolower(array_pop(explode('.', $filename)));

	if ( array_key_exists($ext, $mime_types) ) {
		return $mime_types[$ext];
	} elseif ( function_exists('finfo_open') ) {
		$finfo					=	finfo_open(FILEINFO_MIME);
		$mimetype				=	finfo_file($finfo, $filename);
		finfo_close($finfo);
		return $mimetype;
	} else {
		return 'application/octet-stream';
	}
}
//	파일 MimeType 알아내기

//	도메인 추출 정규식
function getDomainName($url)
{
	$value						=	strtolower(trim($url));
	$url_patten					=	'/^(?:(?:[a-z]+):\/\/)?((?:[a-z\d\-]{2,}\.)+[a-z]{2,})(?::\d{1,5})?(?:\/[^\?]*)?(?:\?.+)?$/i';
	$domain_patten				=	'/([a-z\d\-]+(?:\.(?:asia|info|name|mobi|com|net|org|biz|tel|xxx|kr|co|so|me|eu|cc|or|pe|ne|re|tv|jp|tw)){1,2})(?::\d{1,5})?(?:\/[^\?]*)?(?:\?.+)?$/i';

	if ( preg_match($url_patten, $value) ) {
		preg_match($domain_patten, $value, $matches);
		$host					=	(!$matches[1]) ? $value : $matches[1];
	}

	return $host;
}
//	도메인 추출 정규식

//	Debug 저장
function debugWrite($file, $noti)
{
	$logFile					=	'/home/ilooda/www/saveLog/debug/' . $file . '_' . date('ymd') . '.log';
	$logFile					=	fopen($logFile, 'a+');
	ob_start();
	print_r($noti);
	$obContent					=	ob_get_contents();
	ob_end_clean();
	fwrite($logFile, "\r\n" . $obContent . "\r\n");
	fclose($logFile);
}
//	Debug 저장

// api 통신
function makeApiCall( $endpoint, $type, $params ) {
    $ch = curl_init();

    if ( 'POST' == $type ) {
        curl_setopt( $ch, CURLOPT_URL, $endpoint );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $params ) );
        curl_setopt( $ch, CURLOPT_POST, 1 );
    } elseif ( 'GET' == $type ) {
        curl_setopt( $ch, CURLOPT_URL, $endpoint . '?' . http_build_query( $params ) );
    }

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

    $response = curl_exec( $ch );
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close( $ch );

    return $response;
}
// api 통신

// checkPlus에서 사용하는 함수
function GetValue($str , $name) 
{
	$pos1 = 0;  //length의 시작 위치
	$pos2 = 0;  //:의 위치

	while( $pos1 <= strlen($str) )
	{
		$pos2 = strpos( $str , ":" , $pos1);
		(int)$len = substr($str , $pos1 , $pos2 - $pos1);
		$key = substr($str , $pos2 + 1 , (int)$len);
		$pos1 = $pos2 + (int)$len + 1;
		if( $key == $name )
		{
			$pos2 = strpos( $str , ":" , $pos1);
			(int)$len = substr($str , $pos1 , $pos2 - $pos1);
			$value = substr($str , $pos2 + 1 , (int)$len);
			return $value;
		}
		else
		{
			// 다르면 스킵한다.
			$pos2 = strpos( $str , ":" , $pos1);
			(int)$len = substr($str , $pos1 , $pos2 - $pos1);
			$pos1 = $pos2 + (int)$len + 1;
		}            
	}
}
?>