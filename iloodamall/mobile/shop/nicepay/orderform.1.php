<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$edit_date          = date('YmdHis');
$hash_string        = $edit_date.$g_conf_site_cd.$tot_price.$g_conf_mer_key;
$nicepay_hashdata   = base64_encode(md5($hash_string));

// 가상계좌 입금 예정일 설정
$tomorrow           = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
$vbankexpdate       = date("Ymd",$tomorrow);

$goods = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $goods); // 특수문자제거
?>

<form name="sm_form" method="POST" action="https://web.nicepay.co.kr/smart/paySmart.jsp" accept-charset="euc-kr">

<input type="hidden" name="good_mny"    value="<?php echo $tot_price; ?>"> <!-- javascript 오류 방지 -->

<!-- Mall Parameters : 필수 -->
<input type="hidden" name="PayMethod"           value="">
<input type="hidden" name="GoodsCnt"            value="<?php echo (int)$goods_count + 1; ?>"> <!-- 상품 갯수 -->
<input type="hidden" name="GoodsName"           value="<?php echo $goods;?>"> <!-- 결제상품명 -->
<input type="hidden" name="Amt"                 value="<?php echo $tot_price;?>"> <!-- 결제상품금액 -->
<input type="hidden" name="MID"                 value="<?php echo $g_conf_site_cd;?>"> <!-- 상점아이디 -->
<input type="hidden" name="BuyerName"           value="">
<input type="hidden" name="BuyerTel"            value=""> <!-- 40 byte-없이 입력 -->
<input type="hidden" name="UserIP"              value="<?php echo $_SERVER['REMOTE_ADDR'];?>"> <!-- 회원사고객IP -->
<input type="hidden" name="MallIP"              value="<?php echo ($_SERVER['SERVER_ADDR']?$_SERVER['SERVER_ADDR']:$_SERVER['LOCAL_ADDR']);?>"> <!-- 상점서버IP -->

<input type="hidden" name="EdiDate"             value="<?php echo $edit_date;?>"> <!-- 전문 생성 일시 14 byte  -->
<input type="hidden" name="EncryptData"         value="<?php echo $nicepay_hashdata;?>"> <!-- 전문 생성 일시 14 byte  -->
<input type="hidden" name="TransType"           value="<?php echo $default['de_escrow_use'] ? '1' : '0';?>"> <!-- 결제 타입 0:일반, 1:에스크로 -->

<!-- Mobile -->
<input type="hidden" name="MallReserved"        value="param1^param2^param3"> <!-- 상점에서 여분으로 사용할 값을 지정하여 주십시요. 그대로 전달됩니다 -->
<input type="hidden" name="ReturnURL"           value="<?php echo G5_MSHOP_URL; ?>/nicepay/order_approval_form.php">
<input type="hidden" name="CharSet"             value="utf-8">

<!-- Mall Parameters : 선택 -->
<input type="hidden" name="GoodsCl"             value="<?php echo $g_conf_goodscl;?>"> <!-- 핸드폰 결제인 경우 필수 :  상품구분 1:실물, 0:컨텐츠 -->
<input type="hidden" name="Moid"                value="<?php echo $od_id;?>"> <!-- 상품주문번호 -->

<input type="hidden" name="BuyerEmail"          value=""> <!-- 구매자메일주소 -->
<input type="hidden" name="BuyerAddr"           value=""> <!-- 배송지주소 -->
<input type="hidden" name="BuyerPostNo"         value=""> <!-- 우편번호  -->
<input type="hidden" name="MallUserID"          value="<?php echo $member['mb_id'] ? $member['mb_id'] : 'guest';?>"> <!-- 회원사고객아이디 -->
<input type="hidden" name="VbankExpDate"        value="<?php echo $vbankexpdate;?>"> <!-- 가상계좌입금만료일 : 8자리 또는 12자리(ex :20110225) -->
<input type="hidden" name="SelectQuota"         value=""> <!-- 카드사 할부개월 옵션 -->

<?php if($default['de_tax_flag_use']) { // 복합과세 ?>
    <input type="hidden" name="SupplyAmt"	    value="<?php echo $comm_tax_mny; ?>">   <!-- 공급가액    -->
    <input type="hidden" name="GoodsVat"        value="<?php echo $comm_vat_mny; ?>">   <!-- 부가세	    -->
    <input type="hidden" name="ServiceAmt"      value="0">                              <!-- 봉사료	    -->
    <input type="hidden" name="TaxFreeAmt"      value="<?php echo $comm_free_mny; ?>">  <!-- 비과세 금액 -->
<?php } ?>

</form>