<?php  
include_once('./_common.php');
require_once(G5_SHOP_PATH.'/settle_nicepay.inc.php');

$Amt            = preg_replace('/[^0-9]/', '', $_POST['Amt']);
$edate          = preg_replace('/[^0-9]/', '', $_POST['edate']);

/**************************
 * 1. 라이브러리 인클루드 *
 **************************/
require_once(G5_SHOP_PATH.'/nicepay/lib/NicepayLite.php');

/***************************************
 * 2. NicepayLite 클래스의 인스턴스 생성 *
 ***************************************/
$nicepay = new NicepayLite;

// 상점 MID를 설정합니다. test시 nictest00m으로 설정하십시요.
$nicepay->m_MID = $g_conf_site_cd;

// 상점서명키 (꼭 해당 상점키로 바꿔주세요)
$nicepay->m_MerchantKey = $g_conf_mer_key;

// 거래 날짜
$nicepay->m_EdiDate = $edate;

// 상품 가격을 설정하여 주십시요.
$nicepay->m_Price = $Amt;

//초기 처리 
$nicepay->requestProcess();

$encryptData    = base64_encode(md5($edate.$g_conf_site_cd.$Amt.$g_conf_mer_key));

die('{"resdata":"'.$encryptData.'"}'); 