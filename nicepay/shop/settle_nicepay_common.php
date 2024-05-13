<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/etc.lib.php');
include_once(G5_LIB_PATH.'/mailer.lib.php');
include_once(G5_SHOP_PATH.'/settle_nicepay.inc.php');

// 로그기록
$log_txt = date('Y-m-d H:i:s', time());
$log_txt .= '|IP : '.getenv("REMOTE_ADDR");
foreach($_POST as $uk=>$uv) {
    $log_txt .= "|POST:".$uk."=".$uv;
}

foreach($_GET as $uk=>$uv) {
    $log_txt .= "|GET:".$uk."=".$uv;
}

$log_dir = $g_conf_home_dir.'/log'; 

@mkdir($log_dir, G5_DIR_PERMISSION);
@chmod($log_dir, G5_DIR_PERMISSION);

wz_fwrite_log($log_dir."/nice_vacct_noti_result_".date("Ymd").".log", $log_txt);

@extract($_GET);
@extract($_POST);
@extract($_SERVER);

$Amt            = $Amt; // 금액
$TID            = $TID; // 거래번호
$MOID           = $MOID; // 주문번호
$AuthDate       = $AuthDate; // 입금일시 (yyMMddHHmmss)	
$ResultCode     = $ResultCode; // 결과코드 ('4110' 경우 입금통보)
$ResultMsg      = $ResultMsg; // 결과메시지	
$VbankNum       = $VbankNum; // 가상계좌번호
$FnCd           = $FnCd; // 가상계좌 은행코드
$VbankName      = $VbankName; // 가상계좌 은행명
$VbankInputName = $VbankInputName; // 입금자 명

// 가상계좌채번시 현금영수증 자동발급신청이 되었을경우 전달되며 
// RcptTID 에 값이 있는경우만 발급처리 됨	
$RcptTID        = $RcptTID; // 현금영수증 거래번호
$RcptType       = $RcptType; // 현금 영수증 구분(0:미발행, 1:소득공제용, 2:지출증빙용)
$RcptAuthCode   = $RcptAuthCode; // 현금영수증 승인번호


if ($ResultCode == '4110') { 

    $receipt_time = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3 \\4:\\5:\\6", $AuthDate);
    
    $sql = " select pp_id, od_id from {$g5['g5_shop_personalpay_table']} where pp_id = '$MOID' and pp_tno = '$TID' ";
    $row = sql_fetch($sql);

    $result = false;

    if($row['pp_id']) {
        // 개인결제 UPDATE
        $sql = " update {$g5['g5_shop_personalpay_table']}
                    set pp_receipt_price    = '$Amt',
                        pp_receipt_time     = '$receipt_time'
                    where pp_id = '$MOID'
                      and pp_tno = '$TID' ";
        sql_query($sql, false);

        if($row['od_id']) {
            // 주문서 UPDATE
            $sql = " update {$g5['g5_shop_order_table']}
                        set od_receipt_price = od_receipt_price + '$Amt',
                            od_receipt_time = '$receipt_time',
                            od_shop_memo = concat(od_shop_memo, \"\\n개인결제 ".$row['pp_id']." 로 결제완료 - ".$receipt_time."\")
                      where od_id = '{$row['od_id']}' ";
            $result = sql_query($sql, FALSE);
        }
    } else {
        // 주문서 UPDATE
        $sql = " update {$g5['g5_shop_order_table']}
                    set od_receipt_price = '$Amt',
                        od_receipt_time = '$receipt_time'
                  where od_id = '$MOID'
                    and od_tno = '$TID' ";
        $result = sql_query($sql, FALSE);
    }


    if($result) {
        if($row['od_id'])
            $od_id = $row['od_id'];
        else
            $od_id = $MOID;

        // 주문정보 체크
        $sql = " select count(od_id) as cnt
                    from {$g5['g5_shop_order_table']}
                    where od_id = '$od_id'
                      and od_status = '주문' ";
        $row = sql_fetch($sql);

        if($row['cnt'] == 1) {
            // 미수금 정보 업데이트
            $info = get_order_info($od_id);

            $sql = " update {$g5['g5_shop_order_table']}
                        set od_misu = '{$info['od_misu']}' ";
            if($info['od_misu'] == 0)
                $sql .= " , od_status = '입금' ";
            $sql .= " where od_id = '$od_id' ";
            sql_query($sql, FALSE);

            // 장바구니 상태변경
            if($info['od_misu'] == 0) {
                $sql = " update {$g5['g5_shop_cart_table']}
                            set ct_status = '입금'
                            where od_id = '$od_id' ";
                sql_query($sql, FALSE);
            }
        }

        die('OK');
    }
    else {
        
        die('FAIL');
    }
}