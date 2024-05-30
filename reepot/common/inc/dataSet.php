<?php
#------------------------------------------------------------------------------
# 작업내용	:	기초 환경 설정 정보
# 인    수	:
# 작성일자	:	2021-05-26
# 작 성 자	:	webtick@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

if(!isset($_SERVER["HTTPS"])) { header('Location: https://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']);}

//	기초 데이터 배열 선언
$common							=	array();
//$common['DOCUMENTROOT']			=	'/home/ilooda/www';
$common['DOCUMENTROOT']			=	'';

@header('Content-Type: text/html; charset=UTF-8');
@header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
@header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT');
@header('Content-Type: text/html; charset=UTF-8; P3P: CP="ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC"');
@header('Cache-Control: no-store, no-cache, must-revalidate');
@header('Cache-Control: post-check=0, pre-check=0', false);
@header('Pragma: no-cache');

@session_save_path($_SERVER['DOCUMENT_ROOT'] . '/_session');													//	이 옵션에서 LG U+ 전자결제 에러.
@session_cache_limiter('nocache, must-revalidate');																//	캐시가 유지되어 폼값이 보존
@ini_set('session.gc_maxlifetime', 7200);																		//	초 - 세션 만료시간을 12시간으로 설정
@ini_set('session.cache_expire', 7200);																			//	12시간
@ini_set('session.gc_probability', 1);
@ini_set('session.gc_divisor', 100);
//if ( !isset($set_time_limit) ) $set_time_limit = 0;
//@set_time_limit($set_time_limit);
@session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST']);														//	해당 도메인만 세션 생성
@ini_set('session.cookie_domain', $_SERVER['HTTP_HOST']);														//	세션이 활성화 될 도메인
@ini_set('session.use_trans_sid', 0);
@ini_set('url_rewriter.tags', '');
session_start();																								//	세션 시작

//	메모리 제한 늘리기
//ini_set('memory_limit','512M');

if ( function_exists('date_default_timezone_set') )
	date_default_timezone_set('Asia/Seoul');

//	에러 메세지 화면 노출(1 : 활성화, 0 : 비활성화)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL & ~E_NOTICE);
//error_reporting(E_ALL);

//	로그 파일에 에러 기록(1 : 활성화, 0 : 비활성화)
@ini_set('log_errors', 1);

//	에러 기록할 로그파일 위치 지정
@ini_set('error_log', $common['DOCUMENTROOT'] . '/saveLog/error/error_' . date('Y-m-d', time()) . '.log');

//	클래스 포함	=========================================================================================================
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/DBManager.class.php';									//	DB 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/BasicManager.class.php';								//	기초 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/CommonManager.class.php';								//	공통 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/FileManager.class.php';								//	파일 업로드 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/BoardManager.class.php';								//	게시판 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/MemberManager.class.php';								//	회원관리(관리자)

$common['DBManager']			=	New DBManager();															//	DB 관리
$common['BasicManager']			=	New BasicManager();															//	기초 관리
$common['CommonManager']		=	New CommonManager();														//	공통 관리
$common['FileManager']			=	New FileManager();															//	파일 업로드 관리
$common['BoardManager']			=	New BoardManager();															//	게시판 관리
$common['MemberManager']		=	New MemberManager();														//	회원관리(관리자)

$common['wwwURL']				=	$_SERVER['HTTP_HOST'];
//$common['wwwPath']				=	$common['DOCUMENTROOT'];
$common['wwwPath']				=	$_SERVER['DOCUMENT_ROOT'];
$common['defaultUrl']			=	$common['wwwURL'] . '/uploadFiles';
$common['defaultPath']			=	$common['wwwPath'] . '/uploadFiles';
$common['tempPath']				=	$common['defaultPath'] . '/tempFiles';
$common['uploadVirDir']			=	'/uploadFiles';
$common['dirPermission']		=	0777;

if ( $_SERVER['SERVER_PORT'] == '80' ) {
	$common['http']				=	'http://';
} else {
	$common['http']				=	'https://';
}
$common['mailURL']				=	$common['http'] . $common['wwwURL'];

//	관리자 정보
$common['userIdx']				=	decrypt($_SESSION['userIdx']);

$common['adminPath']			=	$_SERVER['DOCUMENT_ROOT'] . '/admin/dist/public';
$common['adminURL']				=	'/admin/dist/public/';
$common['sendMail']				=	'info@ilooda.com';															//	메일 발송용 메일 주소
$common['sendName']				=	'이루다';																	//	메일 발송용 보낸이

$common['positionCode1']		=	'1';																		//	tbl_pubCode의 직급
$common['positionCode2']		=	'2';																		//	tbl_pubCode의 직책
$common['boardCategory']		=	'20';																		//	tbl_pubCode의 게시판 카테고리
$common['boardState']			=	'158';																		//	tbl_pubCode의 게시판 상태
$common['countryCode']			=	'166';																		//	tbl_pubCode의 국가 코드

$selfPage						=	$_SERVER['PHP_SELF'];														//	자기의 페이지
$pageQueryString				=	$_SERVER['QUERY_STRING'];
$refererPage					=	$_SERVER['HTTP_REFERER'];													//	이전 페이지
$adminLoginPage					=	'/login.php';

$common['connIP']				=	getConnIP();
$common['sessionID']			=	session_id();

//$common['usaURL']	=	'https://ilooda-en.triupcorp.com';  // 미국 사이트 도메인
//$common['sgpURL']	=	'https://ilooda-sg.triupcorp.com';  // 싱가폴 사이트 도메인

$common['usaURL']	=	'https://eng.ilooda.com';  // 미국 사이트 도메인

defined(	'webticktock'		)	OR	define(	'webticktock',				true				);				//	개별페이지 접근불가

?>