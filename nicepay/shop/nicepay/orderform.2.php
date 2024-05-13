<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

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
$nicepay->m_EdiDate = date('YmdHis');

// 상품 가격을 설정하여 주십시요.
$nicepay->m_Price = $tot_price;

//초기 처리
$nicepay->requestProcess();

$goods = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $goods); // 특수문자제거
?>

<input type="hidden" name="good_mny"        value="<?php echo $tot_price; ?>"> <!-- 영카트 로직을 위한 값 -->

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
<input type="hidden" name="EncodeParameters"    value=""> <!-- EncodeParameter ? EncodeParameters -->

<input type="hidden" name="EdiDate"             value="<?php echo $nicepay->m_EdiDate;?>"> <!-- 전문 생성 일시 14 byte  -->
<input type="hidden" name="EncryptData"         value="<?php echo $nicepay->m_HashedString;?>"> <!-- 전문 생성 일시 14 byte  -->
<input type="hidden" name="TrKey"               value=""> <!-- 거래 고유키 -->
<input type="hidden" name="TransType"           value="<?php echo $default['de_escrow_use'] ? '1' : '0';?>"> <!-- 결제 타입 0:일반, 1:에스크로 -->

<!-- Mall Parameters : 선택 -->
<input type="hidden" name="GoodsCl"             value="<?php echo $g_conf_goodscl;?>"> <!-- 핸드폰 결제인 경우 필수 : 1:실물, 0:컨덴츠 -->
<input type="hidden" name="Moid"                value="<?php echo $od_id;?>"> <!-- 상품주문번호 -->
<input type="hidden" name="BuyerAuthNum"        value=""> <!-- 구매자인증번호 : 13 byte, 주민번호 또는 사업자번호 -->
<input type="hidden" name="BuyerEmail"          value=""> <!-- 구매자메일주소 -->
<input type="hidden" name="ParentEmail"         value=""> <!-- 보호자메일주소 -->
<input type="hidden" name="BuyerAddr"           value=""> <!-- 배송지주소 -->
<input type="hidden" name="BuyerPostNo"         value=""> <!-- 우편번호  -->
<input type="hidden" name="SUB_ID"              value=""> <!-- 서브몰 아이디 -->
<input type="hidden" name="MallUserID"          value="<?php echo $member['mb_id'] ? $member['mb_id'] : 'guest';?>"> <!-- 회원사고객아이디 -->
<input type="hidden" name="VbankExpDate"        value="<?php echo $nicepay->m_VBankExpDate;?>"> <!-- 가상계좌입금만료일 : 8자리 또는 12자리(ex :20110225) -->
<input type="hidden" name="OptionList"          value=""> <!-- 결제옵션 -->
<input type="hidden" name="SkinType"            value="blue"> <!-- 스킨 타입 : blue, purple, red, green -->
<input type="hidden" name="SelectQuota"         value=""> <!-- 카드사 할부개월 옵션 -->

<?php if($default['de_tax_flag_use']) { // 복합과세 ?>
    <input type="hidden" name="SupplyAmt"	    value="<?php echo $comm_tax_mny; ?>">   <!-- 공급가액    -->
    <input type="hidden" name="GoodsVat"        value="<?php echo $comm_vat_mny; ?>">   <!-- 부가세	    -->
    <input type="hidden" name="ServiceAmt"      value="0">                              <!-- 봉사료	    -->
    <input type="hidden" name="TaxFreeAmt"      value="<?php echo $comm_free_mny; ?>">  <!-- 비과세 금액 -->
<?php } ?>