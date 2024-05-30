<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if($od['od_pg'] != 'nicepay') return;

/**************************
* 1. 라이브러리 인클루드 *
**************************/
require_once(G5_SHOP_PATH.'/settle_nicepay.inc.php');
require_once(G5_SHOP_PATH.'/nicepay/lib/NicepayLite.php');

/***************************************
* 2. NicepayLite 클래스의 인스턴스 생성 *
***************************************/
$nicepay = new NicepayLite;

// 로그를 설정하여 주십시요.
$nicepay->m_NicepayHome = $g_conf_home_dir.'/log';

$amount = (int)$tax_mny; // 부분취소 금액
$nicepay->m_ssl                 = 'true';
$nicepay->m_ActionType          = 'CLO';			// 취소 요청 선언
$nicepay->m_CancelAmt           = $amount;			// 취소 금액 설정
$nicepay->m_TID                 = $od['od_tno'];    // 취소 TID 설정
$nicepay->m_CancelMsg           = iconv_euckr($mod_memo); // 취소 사유
$nicepay->m_PartialCancelCode   = '1';    		    // 0:전체 취소, 1:부분 취소 여부 설정 - 부분 취소는 가맹점 계약시 별도 요청해야 사용 가능합니다
$nicepay->m_CancelPwd           = $g_conf_cancelpw;	// 취소 비밀번호 설정

// PG에 접속하여 취소 처리를 진행.
// 취소는 2001 또는 2211이 성공입니다.
$nicepay->startAction();

/** 4. 취소결과 */
$resultCode = $nicepay->m_ResultData['ResultCode']; // 결과코드 (정상 :2001(취소성공), 2211(환불성공), 그 외 에러)
$resultMsg  = $nicepay->m_ResultData['ResultMsg'];  // 결과메시지
$cancelAmt  = $nicepay->m_ResultData['CancelAmt'];  // 취소금액
$cancelTime = $nicepay->m_ResultData['CancelTime']; // 취소시간
$tid        = $nicepay->m_ResultData['TID'];        // TID

$res_cd     = $resultCode;
$res_msg    = $resultMsg;

if($res_cd == '2001' || $res_cd == '2211') {

    $mod_memo .= ", tid :".$tid."\n";

    $sql = " update {$g5['g5_shop_order_table']}
                set od_refund_price = od_refund_price + '$cancelAmt',
                    od_shop_memo = concat(od_shop_memo, \"$mod_memo\")
                where od_id = '{$od['od_id']}'
                  and od_tno = '{$od['od_tno']}' ";
    sql_query($sql);

    // 미수금 등의 정보 업데이트
    $info = get_order_info($od_id);

    $sql = " update {$g5['g5_shop_order_table']}
                set od_misu     = '{$info['od_misu']}',
                    od_tax_mny  = '{$info['od_tax_mny']}',
                    od_vat_mny  = '{$info['od_vat_mny']}',
                    od_free_mny = '{$info['od_free_mny']}'
                where od_id = '$od_id' ";
    sql_query($sql);
}
else {
    alert(iconv_utf8($res_msg).' 코드 : '.$res_cd);
}