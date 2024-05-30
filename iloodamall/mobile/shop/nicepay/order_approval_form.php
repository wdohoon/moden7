<?php
include_once('./_common.php');

/**************************
* 1. 라이브러리 인클루드 *
**************************/
require_once(G5_SHOP_PATH.'/settle_nicepay.inc.php');
require_once(G5_SHOP_PATH.'/nicepay/lib/NicepayLite.php');

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

wz_fwrite_log($log_dir."/query_mobile_".date("Ymd").".log", $log_txt);

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


// 개인 결제 인지 확인해야함 시작

$sqc = sql_fetch("select pp_id from g5_shop_personalpay where pp_id='".$_POST['Moid']."'");


// 개인 결제 인지 확인해야함 끝

if($sqc['pp_id']){ //개인결제면 검사 무시
}else{
	if (get_session('ss_direct'))
		$tmp_cart_id = get_session('ss_cart_direct');
	else
		$tmp_cart_id = get_session('ss_cart_id');

	if (get_cart_count($tmp_cart_id) == 0) {    // 장바구니에 담기
		if(function_exists('add_order_post_log')) add_order_post_log('장바구니가 비어 있습니다.');   

		//uandio_mail($member['mb_id']."장바구니가 비어있습니다1.");
		alert('장바구니가 비어 있습니다.\\n\\n이미 주문하셨거나 장바구니에 담긴 상품이 없는 경우입니다.', G5_SHOP_URL.'/cart.php');
	}
}


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
$res_msg        = $resultMsg;

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

$result_txt = "";
$result_txt .= "resultCode:".$resultCode."|";
$result_txt .= "resultMsg:".$resultMsg."|";
$result_txt .= "authDate:".$authDate."|";
$result_txt .= "authCode:".$authCode."|";
$result_txt .= "mid:".$mid."|";
$result_txt .= "tid:".$tid."|";
$result_txt .= "moid:".$moid."|";
$result_txt .= "amt:".$amt."|";
wz_fwrite_log($log_dir."/result_mobile_".date("Ymd").".log", $result_txt);

/** 위의 응답 데이터 외에도 전문 Header와 개별부 데이터 Get 가능 */

$tno            = $tid;
$amount         = $amt;
$res_cd         = $resultCode;
$res_msg        = $resultMsg;

// 세션 초기화
set_session('P_TID',  '');
set_session('P_AMT',  '');
set_session('P_HASH', '');

$oid  = trim($moid);

$sql = " select * from {$g5['g5_shop_order_data_table']} where od_id = '$oid' ";
$row = sql_fetch($sql);

$data = unserialize(base64_decode($row['dt_data']));

if(isset($data['pp_id']) && $data['pp_id']) {
    $order_action_url = G5_HTTPS_MSHOP_URL.'/personalpayformupdate.php';
    $page_return_url  = G5_SHOP_URL.'/personalpayform.php?pp_id='.$data['pp_id'];
} else {
    $order_action_url = G5_HTTPS_MSHOP_URL.'/orderformupdate.php';
    $page_return_url  = G5_SHOP_URL.'/orderform.php';
    if($_SESSION['ss_direct'])
        $page_return_url .= '?sw_direct=1';
}

if ($paySuccess == true) { // 결제성공
    
    $hash = md5($tno.$g_conf_site_cd.$amount);
    set_session('P_TID',  $tno);
    set_session('P_AMT',  $amount);
    set_session('P_HASH', $hash);

}
else {
    alert('오류 : '.$res_msg.' 코드 : '.$res_cd, $page_return_url);
}

$g5['title'] = '나이스페이 결제';
include_once(G5_PATH.'/head.sub.php');

$exclude = array('res_cd', 'P_HASH', 'P_TYPE', 'P_AUTH_DT', 'P_AUTH_NO', 'P_HPP_CORP', 'P_APPL_NUM', 'P_VACT_NUM', 'P_VACT_NAME', 'P_VACT_BANK', 'P_CARD_ISSUER', 'P_UNAME');

echo '<form name="forderform" method="post" action="'.$order_action_url.'" autocomplete="off">'.PHP_EOL;

echo make_order_field($data, $exclude);

echo '<input type="hidden" name="res_cd"        value="'.$res_cd.'">'.PHP_EOL;
echo '<input type="hidden" name="P_HASH"        value="'.$hash.'">'.PHP_EOL;
echo '<input type="hidden" name="P_TYPE"        value="'.$PayMethod.'">'.PHP_EOL;
echo '<input type="hidden" name="P_AUTH_DT"     value="'.$app_time.'">'.PHP_EOL;
echo '<input type="hidden" name="P_AUTH_NO"     value="'.$app_no.'">'.PHP_EOL;
echo '<input type="hidden" name="P_HPP_CORP"    value="'.$commid.'">'.PHP_EOL;
echo '<input type="hidden" name="P_APPL_NUM"    value="'.$mobile_no.'">'.PHP_EOL;
echo '<input type="hidden" name="P_VACT_NUM"    value="'.$account.'">'.PHP_EOL;
echo '<input type="hidden" name="P_VACT_NAME"   value="">'.PHP_EOL;
echo '<input type="hidden" name="P_VACT_BANK"   value="'.$bankname.'">'.PHP_EOL;
echo '<input type="hidden" name="P_CARD_ISSUER" value="'.$card_name.'">'.PHP_EOL;
echo '<input type="hidden" name="P_UNAME"       value="">'.PHP_EOL;

echo '</form>'.PHP_EOL;
?>

<div id="show_progress">
    <span style="display:block; text-align:center;margin-top:120px"><img src="<?php echo G5_MOBILE_URL; ?>/shop/img/loading.gif" alt=""></span>
    <span style="display:block; text-align:center;margin-top:10px; font-size:14px">주문완료 중입니다. 잠시만 기다려 주십시오.</span>
</div>

<script type="text/javascript">
function setPAYResult() {
    setTimeout( function() {
        document.forderform.submit();
    }, 300);
}
window.onload = function() {
    setPAYResult();
}
</script>

<?php
include_once(G5_PATH.'/tail.sub.php');
?>