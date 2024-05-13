<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

/**************************
* 1. 라이브러리 인클루드 *
**************************/
require_once(G5_SHOP_PATH.'/settle_nicepay.inc.php');
require_once(G5_SHOP_PATH.'/nicepay/lib/NicepayLite.php');

/***************************************
* 2. NicepayLite 클래스의 인스턴스 생성 *
***************************************/
$nicepay = new NicepayLite;

//로그를 저장할 디렉토리를 설정하십시요.
$nicepay->m_NicepayHome = $g_conf_home_dir.'/log';

/**************************************
* 3. 결제 요청 파라미터 설정	      *
***************************************/
$nicepay->m_GoodsName       = $GoodsName;
$nicepay->m_GoodsCnt        = $GoodsCnt;
$nicepay->m_Price           = $Amt;
$nicepay->m_Moid            = $Moid;
$nicepay->m_BuyerName       = $BuyerName;
$nicepay->m_BuyerEmail      = $BuyerEmail;
$nicepay->m_BuyerTel        = $BuyerTel;
$nicepay->m_MallUserID      = $MallUserID;
$nicepay->m_GoodsCl         = $GoodsCl;
$nicepay->m_MID             = $MID;
$nicepay->m_MallIP          = $MallIP;
$nicepay->m_TrKey           = $TrKey; // 거래 고유키
$nicepay->m_EncryptedData   = $EncryptData;
$nicepay->m_PayMethod       = $PayMethod;
$nicepay->m_TransType       = $TransType;
$nicepay->m_ActionType      = 'PYO';

// 상점키를 설정하여 주십시요.
$nicepay->m_LicenseKey      = $g_conf_mer_key;

// UTF-8일 경우 아래와 같이 설정하십시요.
$nicepay->m_charSet         = 'UTF8';

$nicepay->m_NetCancelAmt    = $Amt; //결제 금액에 맞게 수정
$nicepay->m_NetCancelPW     = $g_conf_cancelpw;	// 결제 취소 패스워드 설정
$nicepay->m_ssl             = 'true';

// PG에 접속하여 승인 처리를 진행.
$nicepay->startAction();

/**************************************
* 4. 결제 결과					      *
***************************************/
/*
결제 수단별 결제 성공 코드 값
신용카드 – 3001
계좌이체 – 4000
가상계좌 – 4100
휴대폰 – A000
현금영수증 - 7001
*/
$resultCode     = $nicepay->m_ResultData['ResultCode'];	// 결과 코드
$resultMsg      = $nicepay->m_ResultData['ResultMsg'];	// 결과메시지
$mid            = $nicepay->m_ResultData['MID'];  // 상점ID
$tid            = $nicepay->m_ResultData['TID'];  // 거래ID
$amt            = $nicepay->m_ResultData['Amt'];  // 결제상품금액
$moid           = $nicepay->m_ResultData['Moid'];  // 주문번호
$authDate       = $nicepay->m_ResultData['AuthDate']; // 승인 시간
$authCode       = $nicepay->m_ResultData['AuthCode']; // 승인 번호

$tno            = $tid;
$amount         = $amt;
$res_cd         = $resultCode;
$res_msg        = iconv('euc-kr', 'utf-8', $resultMsg);
$res_msg2       = $resultMsg;

$paySuccess = false;		// 결제 성공 여부
if ($PayMethod == 'CARD') { //신용카드

    $card_cd        = $nicepay->m_ResultData['CardCode']; // 카드사 코드
    $card_name      = $nicepay->m_ResultData['CardName']; // 카드 종류
    $app_time       = $authDate; // 승인 시간
    $app_no         = $authCode; // 승인 번호
    $card_mny       = $amt; // 카드결제금액

	if ($resultCode == '3001')
        $paySuccess = true;	// 결과코드 (정상 :3001 , 그 외 에러)

} else if ($PayMethod == 'BANK') { // 계좌이체

    $app_time       = $authDate; // 승인 시간
    $bankname       = $nicepay->m_ResultData['BankName']; // 은행명
    $bank_code      = $nicepay->m_ResultData['BankCode']; // 은행코드
    $bk_mny         = $amt; // 계좌이체결제금액

	if ($resultCode == '4000')
        $paySuccess = true;	// 결과코드 (정상 :4000 , 그 외 에러)

} else if ($PayMethod == 'CELLPHONE') { // 휴대폰

    $app_time       = $authDate; // 승인 시간
    $commid         = $nicepay->m_ResultData['Carrier']; //  통신사 코드
    $mobile_no      = $nicepay->m_ResultData['DstAddr']; // 휴대폰 번호

	if ($resultCode == 'A000')
        $paySuccess = true;	//결과코드 (정상 : A000, 그 외 비정상)

} else if ($PayMethod == 'VBANK') { // 가상계좌

    $bankname       = $nicepay->m_ResultData['VbankBankName']; // 입금할 은행 이름
    $depositor      = ''; // 입금할 계좌 예금주
    $account        = $nicepay->m_ResultData['VbankNum']; // 입금할 계좌 번호
    $va_date        = $nicepay->m_ResultData['VbankExpDate']; // 가상계좌 입금마감시간

	if ($resultCode == '4100')
        $paySuccess = true;	// 결과코드 (정상 :4100 , 그 외 에러)

}


if ($paySuccess == true) { // 결제성공

}
else {
    alert($res_cd.' : '.$res_msg.' : '.$res_msg2);
}
?>