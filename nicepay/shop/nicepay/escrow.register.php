<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if($od['od_pg'] != 'nicepay') return;

include_once(G5_SHOP_PATH.'/settle_nicepay.inc.php');
include_once(G5_SHOP_PATH.'/nicepay/lib/NicepayLite.php');

$nicepay = new NicepayLite;
$nicepay->m_NicepayHome = $g_conf_home_dir.'/log';
$ReqType = '03'; // 01 : 구매확인, 02 : 구매거절, 03 : 배송등록
$RegisterName = '관리자'; // 등록자 이름
$BuyerAuthNum  = ''; // 구매자 식별번호(주민번호)
$PayMethod = 'ESCROW';
$ConfirmMail = '1'; // 구매결정 메일 발송 여부 (1:발송/0:미발송)

$nicepay->m_MID = $g_conf_site_cd;
$nicepay->m_TID = $escrow_tno;
$nicepay->m_DeliveryCoNm = $escrow_corp;
$nicepay->m_InvoiceNum = preg_replace('/[^0-9]/', '', $escrow_numb);
$nicepay->m_BuyerAddr = $od['od_b_addr1'].' '.$od['od_b_addr2'];
$nicepay->m_RegisterName = $RegisterName;
$nicepay->m_BuyerAuthNum = $BuyerAuthNum;
$nicepay->m_PayMethod = $PayMethod;
$nicepay->m_ReqType = $ReqType;
$nicepay->m_ConfirmMail = $ConfirmMail;
$nicepay->m_ActionType = 'PYO';
$nicepay->m_LicenseKey = $g_conf_mer_key;

$nicepay->startAction();

$resultCode = $nicepay->m_ResultData['ResultCode'];	// 결과 코드
$escrowSuccess = false;		// 에스크로 처리 성공 여부
if ($ReqType == '01') { // 구매확인
    if ($resultCode == 'D000') $escrowSuccess = true; // 결과코드 (정상 :D000 , 그 외 에러)
} else if ($ReqType == '02') { // 구매거절
    if ($resultCode == 'E000') $escrowSuccess = true; // 결과코드 (정상 :E000 , 그 외 에러)
} else if ($ReqType == '03') { // 배송등록
    if ($resultCode == 'C000') $escrowSuccess = true; // 결과코드 (정상 :C000 , 그 외 에러)
}

$res_cd = '';
if ($escrowSuccess == true) {
   $res_cd = '0000';
}
else {
   // 에스크로 실패시 DB처리 하세요.
}
?>